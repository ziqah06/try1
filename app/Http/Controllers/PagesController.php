<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        //return view('welcome'); //view by direct folder
        return view('pages/about'); //view by under sub folder
    }
}
