<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $items = User::orderBy('created_at', 'desc')->paginate(10);
        return view('users.index', compact('items'));
    }
    public function loginPage(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
            toast('Successfully logged in!','success');
            return redirect()->route('dashboard');
        }else{
            toast('Invalid email or password!','error');
            return redirect()->route('login-page');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login-page');
    }
}
