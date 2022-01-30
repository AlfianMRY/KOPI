<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('child.dashboard',compact('user'));
    }
}
