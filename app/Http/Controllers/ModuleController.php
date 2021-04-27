<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use App\Accessmodule;
use App\Module;
use App\Submodule;
use App\Modulegroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModuleController extends Controller
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

        $modules = Module::all()->sortBy('module_order');
        $submodules = Submodule::all()->sortBy('order_number');
        $modulegroups = Modulegroup::all();
        $accessmodule = Accessmodule::all();
        return view('admin.settings.module',compact('modules','submodules','modulegroups','accessmodule'));
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
        return view('admin.settings.add-module',compact('modules','submodules','modulegroups','accessmodule'));
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
            'module_name'       =>  'required',
            'module_order'      => 'required',
            'module_icon'       => 'required',
            'module_url'        => 'required',
            'is_parent'         => 'required',
            'created_by'        => 'required',
        ]);

       Module::create([
            'module_name'       => $request->module_name,
            'module_order'      => $request->module_order,
            'module_icon'       => $request->module_icon,
            'module_url'        => $request->module_url,
            'is_parent'         => $request->is_parent,
            'created_by'        => $request->created_by,
       ]);
        return redirect()->route('module')
                        ->with('success','Berhasil Menambahkan Module');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $module = Module::find($id);
         $request->validate([
            'module_id'         => 'required',
            'module_name'       => 'required',
            'module_order'      => 'required',
            'module_icon'       => 'required',
            'module_url'        => 'required',
            'is_parent'         => 'required',
            'updated_by'        => 'required',
        ]);
            $module->update([
            'module_id'         => $request->input('module_id'),
            'module_name'       => $request->input('module_name'),
            'module_order'      => $request->input('module_order'),
            'module_icon'       => $request->input('module_icon'),
            'module_url'        => $request->input('module_url'),
            'is_parent'         => $request->input('is_parent'),
            'updated_by'        => $request->input('updated_by'),
       ]);
       // $pengaduan->update($request->all());
       return redirect()->route('module')
                        ->with('success','Berhasil Mengubah Module');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(Accessmodule::where('module_id',$id)->first()){
            $module = Module::where('module_id',$id)->first();
            $accessmodule = Accessmodule::where('module_id',$id)->first();
            $submodule = Submodule::where('module_id',$id)->first();
            $submodule->delete();
            $accessmodule->delete();
            $module->delete();
        }else
        {
            $module = Module::where('module_id',$id)->first();
            $submodule = Submodule::where('module_id',$id)->first();
            $submodule->delete();
            $module->delete();
        }
        
        return redirect()->route('module')
                        ->with('success','Berhasil Menghapus Module');
    }
    public function showing($id){
        $modules = Module::all()->sortBy('module_order');
        $submodules = Submodule::all()->sortBy('order_number');
        $modulegroups = Modulegroup::all();
        $accessmodule = Accessmodule::all();
        $module = Module::where('module_id',$id)->first();;
        return view('admin.settings.edit-module',compact('modules','submodules','modulegroups','accessmodule','module'));  
    }
}
