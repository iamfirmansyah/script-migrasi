<?php

namespace App\Http\Controllers;

use App\Identitas;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AkunPribadiController extends Controller
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
        return view('admin.user.account-settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $user = User::where('id', $request->id)->first();
        if($user->email ==  $request->email){
            $request->validate([
                'email' => 'required|string|email|max:255|'
            ]);
            if($request->password == "" )
            {
                User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_by' => auth()->user()->id,
                ]);
            }
            if($request->password != "" )
            {
                $request->validate([
                     'password' => ['required', 'string', 'min:8', 'confirmed'],
                 ]);
                User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'updated_by' => auth()->user()->id,
                ]);
            }
    
           return redirect()->route('account-settings')
                            ->with('success','Berhasil Mengubah User');
        }
        if($user->email !== $request->email){
            // dd($request->all());
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users'
                ]);
            if($request->password == "" )
            {
                User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_by' => auth()->user()->id,
                ]);
            }
            if($request->password != "" )
            {
                $request->validate([
                     'password' => ['required', 'string', 'min:8', 'confirmed'],
                 ]);
                User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'updated_by' => auth()->user()->id,
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
    public function destroy($id)
    {
        //
    }
}
