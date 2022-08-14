<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Throwable;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function processLogin(Request $request)
    {
        try{
            $user = Users::query()
                 ->where('email', $request->email)
                 ->where('password', $request->password)
                 ->firstOrFail();
                session()->put('id', $user->id);
                session()->put('name', $user->name);
                session()->put('avatar', $user->avatar);
                session()->put('level', $user->level);

                return redirect()->route('courses.index');
        }catch (Throwable $e){
            return redirect()->route('login')->with('error', 'Email or password is incorrect');
        }
    }
    public function logout()
    {
        session()->forget('id');
        session()->forget('name');
        session()->forget('avatar');
        session()->forget('level');
        return redirect()->route('login');
    }
}
