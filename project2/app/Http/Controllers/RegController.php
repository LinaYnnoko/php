<?php

 
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegController extends Controller
{
    public function index(){
        return view('reg');
    }

    public function Verify(Request $request){
        dd($request->all());
    }

}

