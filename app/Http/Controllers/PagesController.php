<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    //public function index(){
        //return view('welcome'); //view by direct folder
        //return view('pages/about'); //view by under sub folder
    //    return view('pages.index');
    //}

    public function index(){ 
        $title = 'Welcome to Ziqablog!';
        return view('pages.index')->with('title', $title);
    }

    public function about(){ 
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }
    
    /*
    public function service(){ 
        $title = 'Our Service';
        return view('pages.service')->with('title', $title);
    }
    */
    public function service(){ 
        //passed as array
        $data = array(
            'title' => 'Our Service',
            'services' => ['AI recruitment/evaluation platform 
           for software developers.', 'Outsourcing for web & mobile app.
            ', 'Technical training for web, mobile app & data
           science.']
        );        
        return view('pages.service')->with($data);
    }
}
 