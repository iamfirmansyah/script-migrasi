<?php

namespace App\Http\Controllers;

use Auth;
use App\Accessmodule;
use App\Module;
use App\Submodule;
use App\Modulegroup;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('admin.layouts.sidebar');
    }
}
