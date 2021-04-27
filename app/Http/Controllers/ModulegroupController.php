<?php

namespace App\Http\Controllers;

use Auth;
Use Alert;
use Ramsey\Uuid\Uuid;
use App\Accessmodule;
use App\Module;
use App\Submodule;
use App\Modulegroup;
use Illuminate\Http\Request;

class ModulegroupController extends Controller
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
        $modulegroups = Modulegroup::with('user')->get();
        $accGroupId = auth()->user()->name;
        $accessmodule = Accessmodule::all();

        return view('admin.settings.module-group',compact('modulegroups','accessmodule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all()->sortBy('module_order');
        $submodules = Submodule::all()->sortBy('order_number');
        $modulegroups = Modulegroup::all();
        $accessmodule = Accessmodule::all();
        return view('admin.settings.add-module-group',compact('modules','submodules','modulegroups','accessmodule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'module_id'          =>  'required',
            'module_id.required'    => 'Module Name cannot be null',
        ]);
        mt_srand((double) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
       
        $unik_id = substr($charid,  0, 8) . '-' .
                substr($charid,  8, 4) . '-' .
                substr($charid, 12, 4) . '-' .
                substr($charid, 16, 4) . '-' .
                substr($charid, 20, 12);
        Modulegroup::create([
            'access_group_id'   => $unik_id,
            'access_group_name' => $request->access_group_name,
            'created_by'        => $request->created_by,
            'is_active'        => $request->is_active,

        ]);
        if($request->module_id != ''){
            for ($module=0; $module < count($request->module_id) ; $module++) { 
                Accessmodule::create([
                    'access_group_id'   => $unik_id,
                    'module_id'         => $request->module_id[$module],
                    'submodule_id'      => "",
                    'created_by'        => $request->created_by,
               ]);
            }
        }

        if($request->submodule_id != ''){
            for ($submodule=0; $submodule < count($request->submodule_id) ; $submodule++) { 
                $getSubmodule = Submodule::where('submodule_id', $request->submodule_id[$submodule])->first();

                Accessmodule::create([
                    'access_group_id'   => $unik_id,
                    'module_id'         => $getSubmodule->module_id,
                    'submodule_id'      => $request->submodule_id[$submodule],
                    'created_by'        => $request->created_by,
               ]);
            }
        }
        return redirect()->route('module-group')
                        ->with('success','Berhasil Menambahkan Group Access');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulegroup  $modulegroup
     * @return \Illuminate\Http\Response
     */
    public function show(Modulegroup $modulegroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulegroup  $modulegroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appAccessGroup = Accessmodule::where('access_group_id', $id)
        ->first();
        $getId = Modulegroup::where('access_group_id', $id)
        ->get();
        $modules = Module::all()->sortBy('module_order');
        $submodules = Submodule::all()->sortBy('order_number');
        $modulegroups = Modulegroup::all();
        $accessmodule = Accessmodule::all();

        return view('admin.settings.edit-module-group', compact('appAccessGroup','modules','submodules','modulegroups','accessmodule','getId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulegroup  $modulegroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'module_id'          =>  'required',
            'module_id.required'    => 'Module Name cannot be null',

        ]);
        Modulegroup::where('access_group_id', $request->access_group_id)
        ->delete();
        Accessmodule::where('access_group_id', $request->access_group_id)
        ->delete();

        Modulegroup::create([
            'access_group_id'   => $request->access_group_id,
            'access_group_name' => $request->access_group_name,
            'created_by'        => $request->created_by,
            'is_active'        => $request->is_active,

        ]);
         if($request->module_id != ''){
            for ($module=0; $module < count($request->module_id) ; $module++) { 
                Accessmodule::create([
                    'access_group_id'   => $request->access_group_id,
                    'module_id'         => $request->module_id[$module],
                    'submodule_id'      => "",
                    'created_by'        => $request->created_by,
                    'updated_by'        => $request->updated_by,

               ]);
            }
        }

        if($request->submodule_id != ''){
            for ($submodule=0; $submodule < count($request->submodule_id) ; $submodule++) { 
                $getSubmodule = Submodule::where('submodule_id', $request->submodule_id[$submodule])->first();

                Accessmodule::create([
                    'access_group_id'   => $request->access_group_id,
                    'module_id'         => $getSubmodule->module_id,
                    'submodule_id'      => $request->submodule_id[$submodule],
                    'created_by'        => $request->created_by,
                    'updated_by'        => $request->updated_by,

               ]);
            }
        }

        return redirect()->route('module-group')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulegroup  $modulegroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Modulegroup::where('access_group_id', $request->id)->update([
            'is_active'    => $request->is_active,
       ]);
       // $pengaduan->update($request->all());
       return redirect()->route('module-group')
                        ->with('success','Status berhasil diubah');
    }
}
