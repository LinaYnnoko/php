<?php

namespace App\Http\Controllers\Ajax;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxRegController extends Controller
{
    public function Verify(Request $request)
    {
        $data=$request->all();

        $valid = Validator::make($request->all(), [
            'name' => ['alpha','max:30', 'required'],
            'surname' => ['alpha','max:30', 'required'],
            'password' => ['confirmed', 'required', 'min:8'],
            'phone' => ['digits_between:9,12']
        ]);

        $oleg=\App\User::where('phone', $data['phone'])->get();
        if (($oleg->isEmpty())&&$valid->errors()->isEmpty()){
            $newuser=\App\User::create([
                'name'=>$data['name'],
            'surname'=>$data['surname'],
            'password'=>$data['password'],
            'phone'=>$data['phone']
            ]);

            session_start();
            $_SESSION['id']=$newuser->id;

        }
        else{
            $valid->errors()->add('phone', 'User with that number already registered');
        }

        return json_encode($valid->errors());
    }
}
