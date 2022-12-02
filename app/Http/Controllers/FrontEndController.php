<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //


    public function contacts(){
        return view('contacts');
    }

    public function faq(){
        return view('faq');
    }

    public function policy(){
        return view('policy');
    }
}
