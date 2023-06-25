<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller{

    public function create()
    {
        return view('auth.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
            'surname' => ['required','string'],
            'phone' => ['required'],
            'password' => ['required','min:7']
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'password' =>   Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect('/cabinet');
    }
}
