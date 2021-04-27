<?php

namespace App\Http\Controllers;

use Auth;
use App\Accessmodule;
use App\Module;
use App\Submodule;
use App\Modulegroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmoduleController extends Controller
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


        return view('admin.settings.submodule',compact('submodules','modules','modulegroups','accessmodule'));
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

        return view('admin.settings.add-submodule',compact('submodules','modules'));
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
            'submodule_name'     =>  'required',
            'submodule_url'         => 'required',
            'module_id'         => 'required',
            'order_number'         => 'required',
            'created_by'         => 'required',
        ]);

       Submodule::create([
            'submodule_name' => $request->submodule_name,
            'submodule_url' => $request->submodule_url,
            'module_id' => $request->module_id,
            'order_number' => $request->order_number,
            'created_by' => $request->created_by,
       ]);
        return redirect()->route('submodule')
                        ->with('success','Berhasil Menambahkan Submodule');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submodule  $submodule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $submodule = Submodule::find($id);
         $request->validate([
            'submodule_name'    => 'required',
            'submodule_url'     => 'required',
            'module_id'         => 'required',
            'order_number'      => 'required',
            'updated_by'        => 'required',
        ]);
            $submodule->update([
            'submodule_name'    => $request->input('submodule_name'),
            'submodule_url'     => $request->input('submodule_url'),
            'module_id'       => $request->input('module_id'),
            'order_number'        => $request->input('order_number'),
            'updated_by'         => $request->input('updated_by'),
       ]);
       // $pengaduan->update($request->all());
       return redirect()->route('submodule')
                        ->with('success','Berhasil Mengubah Sub Module');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submodule  $submodule
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $getSubId = Accessmodule::where('submodule_id',$id)->first();

        if($getSubId == ""){
            $submodule = Submodule::where('submodule_id',$id)->first();
            $submodule->delete();
        }else
        {
            $accessmodule = Accessmodule::where('submodule_id',$id)->first();
            $accessmodule->delete();
            $submodule = Submodule::where('submodule_id',$id)->first();
            $submodule->delete();
        }
        return redirect()->route('submodule')
                        ->with('success','Berhasil Menghapus Sub Module');
    }
    public function showing($id){
        $modules = Module::all()->sortBy('module_order');
        $submodules = Submodule::all()->sortBy('order_number');
        $modulegroups = Modulegroup::all();
        $accessmodule = Accessmodule::all();
        $submodule = Submodule::where('submodule_id',$id)->first();
        return view('admin.settings.edit-submodule',compact('modules','submodules','modulegroups','accessmodule','submodule'));  
    }
}
