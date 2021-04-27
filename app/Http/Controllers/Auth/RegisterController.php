<?php

namespace App\Http\Controllers\Auth;
use Ramsey\Uuid\Uuid;
use App\User;
use App\Mail\NotifPendaftaranAkun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $id_number = Uuid::uuid4()->getHex();
        mt_srand((double) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $id_unik = substr($charid,  0, 8) . '-' .
                substr($charid,  8, 4) . '-' .
                substr($charid, 12, 4) . '-' .
                substr($charid, 16, 4) . '-' .
                substr($charid, 20, 12);
        // $getUser = [
        //     'data' => $data['email'],
        //     'password' => $data['password'],
        // ];
        Mail::to($data['email'])
            ->send(new NotifPendaftaranAkun,'emails.sites.register');
        return User::create([
            'id'                    => $id_unik,
            'name'                  => $data['name'],
            'email'                 => $data['email'],
            'access_group_id'       => '9206137E-2CF4-D7B2-4886-BCA32B3906DE',
            'password'              => Hash::make($data['password']),
            'images'                => "avatar.jpg",
            'is_active'             => "1",
        ]);
    }
}
