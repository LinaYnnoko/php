<?php

namespace App\Http\Controllers\Ajax;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AjaxAuthController extends Controller
{

    public function Verify(Request $request)
    {
//        dd($request->all());
        $data=$request->all();

        $oleg=\App\User::where([
            'phone'=>$data['phone'],
            'password'=>$data['password']
        ])->get();

        if (!$oleg->isEmpty()){
            session_start();
            $_SESSION['id']=$oleg[0]->id;
            return json_encode(['resp'=> true]);
        } else return json_encode(['resp'=> false]);;
    }
}
