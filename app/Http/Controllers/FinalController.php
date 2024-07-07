<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinalController extends Controller
{
    //
    public function index(){
        return view("frontend.home");
    }
    public function master(){
        return view("layout.master");
    }
    public function indexBack(){
        return view("frontend.backend");
    }

}