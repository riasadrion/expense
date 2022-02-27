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
    public function store(Request $request){
        $request->validate([
            'user_group_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = new User;
        $user->user_group_id = $request->user_group_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()){
            toast('User added!','success');
            return back();
        }else{
            toast('Failed!','error');
            return back();
        }
    }
    public function update(Request $request, User $user){
        $request->validate([
            'user_group_id' => 'required',
            'email' => 'required|email',
        ]);
        $user->user_group_id = $request->user_group_id;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        if(Auth::user()->user_group_id == 1){
            if($user->save()){
                toast('User Updated!','success');
                return back();
            }else{
                toast('Failed!','error');
                return back();
            }
        }else{
            if(Auth::user()->id == $user->id){
                if($user->save()){
                    toast('User Updated!','success');
                    return back();
                }else{
                    toast('Failed!','error');
                    return back();
                }
            }
        }
    }
        public function destroy(User $user)
    {
        if($user->delete()){
            toast('Deleted!', 'warning');
            return back();
        }
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

    public function account(){
        return view('users.account');
    }

    public function search(Request $request)
    {
        $items = User::where('name', 'LIKE', '%' . $request->keyword . '%')->orWhere('name', 'LIKE', '%' . $request->keyword . '%')->paginate(10);
        return view('users.index', compact('items'));
    }
}
