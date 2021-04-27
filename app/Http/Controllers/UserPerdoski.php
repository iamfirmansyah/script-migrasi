<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\DataUser;
use App\Identitas;
use App\Kerja;
use App\Mail\NotifPendaftaranAkun;
use App\Studygroup;
use App\User;
use App\Visibility;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Ramsey\Uuid\Uuid;
class UserPerdoski extends Controller
{

    public function cek_db(){
        $data = DB::select("SELECT * FROM `cpd_buku_log_t` WHERE `tanggal_kegiatan` >= '2016-01-01' AND `tanggal_kegiatan` <= '2016-12-31'");
        dd($data);
    }
    public function getUser()
    {
        ob_end_clean(); // this
        ob_start(); // and this
        $table = DB::table('member_m')->join('person_m', 'person_m.id_person', '=', 'member_m.id_person')->select('person_m.*','id_cabang','no_idi','no_anggota','status_anggota')->orderBy('mdd','ASC')->get();
        $data = [];
        foreach($table as $item){
            // INI CEK PROFILE
            // $detailProfile = DB::table('person_m')->where('id_person',$item->id_person)->first();

            // INI CEK KOTA
                $city = DB::table('city_m')->where('id_city',$item->id_city)->first();
                if($city !== NULL){
                    $item->city = $city->name_city; // INI OUTPUT KOTA
                }else{
                    $item->city = NULL;
                }

                // CEK AKES GROUP SEMUA DIJADIKAN AB
                if($item->status_anggota === "AM"){
                    $item->access_group = "Anggota Muda";
                }else{
                    $item->access_group = "Anggota Biasa";
                }

                // BUAT USERNAME EMAIL & PASSWORD
                $cariUser = DB::table('sys_user_m')->where('id_person',$item->id_person)->first();
                $item->username = $cariUser->userid;
                $item->email =  $cariUser->email;
                $item->password = "12345678";
                // INI CEK IURAN
                $cekIuran = DB::table('iuran_semester_m')->where('id_person',$item->id_person)->where('status_pelunasan',"yes")->orderBy('tahun','DESC')->first();
                if($cekIuran !== NULL){
                    $item->last_iuran = $cekIuran->tahun;
                }else{
                    $item->last_iuran = NULL;
                }


            $data[] = [$item];
        }
        return Excel::download(new DataUser($data), '19-03-2021 Data User'. ' - 2596 Anggota Perdoski '.'.xlsx');

    }
    public function view_import(){
        return view('admin.import-user');
    }
    public function import_excel(Request $request){
        $datas = Excel::toArray([], $request->user);
        $array = [];
        foreach($datas[0] as $key => $data){
            if($key !== 0){
                $array[] =  $data;
            }
        }
        dd($datas);
      foreach($array as $item){
        $tahunGabung = $item[20];
        $tahunGabung = ltrim($tahunGabung, '2'); //HASILNYA = 020
        $noUrutAkhir = User::count();
        $cabang =  $item[17];
        $generateId  = sprintf(  $cabang." ". $tahunGabung ." "."%04s", ($noUrutAkhir + 1)) ;
        // GENERATE ID
        $id_number = Uuid::uuid4()->getHex();
        $id_unik = $item[1];

        if($item[12] === "Anggota Muda"){
            $membership_status = "DC81A04F-1C82-7E71-55A1-2B3C93E69F8B";
            $access = "7B9DDE80-FD62-AA94-331F-CCEE794AA490";
        }else{
            $membership_status = "76571066";
            $access = "15747031";
        }
        Studygroup::create([
            'id_user' => $id_unik,
       ]);
        Visibility::create([
            'id'                => $id_number,
            'user_id'           => $id_unik,
            'created_by'        => $id_unik,
       ]);
        Kerja::create([
            'id'                => $id_number,
            'user_id'           => $id_unik,
            'created_by'        => $id_unik,
       ]);
       Identitas::create([
        'id'                    => $id_number,
        'user_id'               => $id_unik,
        'full_name'             => $item[2],
        "birth_place"           => $item[8],
        'birth_date'            => $item[9],
        'sex'                   => $request->sex,
        'religion'              => $request->religion,
        'front_degree'          => $item[6],
        'back_degree'           => $item[7],
        'photo_profile'         => 'avatar.jpg',
        'address'               => $item[15],
        'city'                  => $item[14],
        'land_phone'            => $item[16],
        'mobile_phone'          => $item[16],
        'idi_number'            => $item[11],
        'organization_number'   => $item[10],
        'branch'                => $cabang,
        'membership_status'     => $membership_status,
        'created_by'            => $id_unik,
        ]);
        User::create([
            'id'                    => $id_unik,
            'email'                 => $item[3],
            'username'              => $item[4],
            'access_group_id'       => $access,
            'password'              => Hash::make($item[5]),
            'created_by'            => $id_unik,

        ]);

        $user = Identitas::where('user_id',$id_unik)->first();
        $email = $item[3];
        $password = $item[5];
        Mail::to($item[3])
            ->send(new NotifPendaftaranAkun($user,$email,$password));
      }
    }
}
