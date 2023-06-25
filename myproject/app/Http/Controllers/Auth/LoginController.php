<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller{
    public function destroy(Request $request){
        Auth::logout();

        return redirect()->route('index');
    }
}
