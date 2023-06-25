<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Verify(Request $request){
        $data=$request->all();

        $oleg=User::where([
                'phone'=>$data['phone'],
                'password'=>$data['password']
            ])->get();

        if (!$oleg->isEmpty()){
            session_start();
            $_SESSION['id']=$oleg[0]->id;
            return true;
        } else return false;
    }
}
