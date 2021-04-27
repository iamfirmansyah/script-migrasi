<?php


namespace App\Http\Controllers;
use Auth;
use Ramsey\Uuid\Uuid;
use App\User;
use App\Mail\NotifPendaftaranAkun;
use App\Modulegroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ManagementUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        $get_group = Modulegroup::where('is_active',true)->get();
        $getProfile = User::all();
        return view('admin.user.user-management',compact('users','get_group','getProfile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_number = Uuid::uuid4()->getHex();
        mt_srand((double) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $id_unik = substr($charid,  0, 8) . '-' .
                substr($charid,  8, 4) . '-' .
                substr($charid, 12, 4) . '-' .
                substr($charid, 16, 4) . '-' .
                substr($charid, 20, 12);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'id'                    => $id_unik,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'images'                 => "avatar.jpg",
            'is_active'             => 1,
            'access_group_id'       => $request->access_group_id,
            'password'              => Hash::make($request->password),
            'created_by'            => $request->created_by,

        ]);
        // \Mail::raw('Akun Anda Berhasil Dibuat', function ($message) {
        //     $message->from('perdoski.dev@gmail.com', 'Perdoski Developer');
        //     $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to('john@johndoe.com', 'John Doe');
        //     $message->subject('Pendaftaran Akun Perdoski');
        // });
        $getUser = [
            'data' => $request->email,
            'password' => $request->password,
        ];
        Mail::to($request->email)
            ->send(new NotifPendaftaranAkun,'emails.sites.register',["getUser"=>$getUser]);
       return redirect()->route('user-management')
                        ->with('success','Berhasil Menambah User');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getUser = User::where('id',$id)->first();
        return view('admin.user.edit-user',compact('getUser'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user, $id)
    {
        $user = User::find($id);
        // dd($user);
        // dd($request->all());

        if($user->email === $request['email']){
            
            $request->validate([
                'email' => 'required|string|email|max:255|'
            ]);

            if($request->password == "" )
            {
                
                User::where('id', $request->id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'access_group_id'       => $request->access_group_id,
                'updated_by'            => $request->updated_by,
            ]);
            }
            if($request->password != "" )
            {
                $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
       
                ]);
                User::where('id', $request->id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'access_group_id'       => $request->access_group_id,
                'password'              => Hash::make($request->password),
                'updated_by'            => $request->updated_by,
            ]);
            }
            return back()
                        ->with('success','Berhasil Mengubah User');
            }
            // if($user->email != $request['email']){
            //     $request->validate([
            //         'email' => 'required|string|email|max:255|unique:users,email,'
            //     ]);
            
            // }

            if($user->email != $request['email']){
                $request->validate([
                            'email' => 'required|string|email|max:255|unique:users,email,'
                        ]);
                if($request->password == "" )
                {
                    
                    User::where('id', $request->id)->update([
                    'name'                  => $request->name,
                    'email'                 => $request->email,
                    'access_group_id'       => $request->access_group_id,
                    'updated_by'            => $request->updated_by,
                ]);
                }
                if($request->password != "" )
                {
                    $request->validate([
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
           
                    ]);
                    User::where('id', $request->id)->update([
                    'name'                  => $request->name,
                    'email'                 => $request->email,
                    'access_group_id'       => $request->access_group_id,
                    'password'              => Hash::make($request->password),
                    'updated_by'            => $request->updated_by,
                ]);
            }
            return back()
                ->with('success','Berhasil Merubah Email');
            }
        

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        User::where('id', $request->id)->update([
            'is_deleted'    => $request->is_deleted,
       ]);
       return redirect()->route('user-management')
                        ->with('success','Berhasil Menghapus Data');
    }
    public function update_status(Request $req,$id)
    {
        User::where('id', $req->id)->update([
            'is_active'    => $req->is_active,
       ]);
       return redirect()->route('user-management')
                        ->with('success','Berhasil Mengubah Status');
    }
}
