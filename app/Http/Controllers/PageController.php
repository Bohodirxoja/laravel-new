<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function mini(){
        return view('mini');
    }
    public function about(){
        return view("About");
    }
    public function service(){
        return view('service');
    }
    public function project(){
        return view('Project');
    }
    public function contact(){
        return view('Contact');
    }


//    public function welcom(){
//        return view('welcome' ,[
//            'records'=>[1,2,3,4,5],
//        ]);
//    }
}
