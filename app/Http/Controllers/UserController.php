<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request){
        $user=User::where('email', $request->post('email'))->orWhere('username', $request->post('email'))->get();
        if($user->count()>1){
            $hasil="Whoops! Something went wrong. The username or email has already been taken.";
        }
        else{
            $user = User::findOrFail(Auth::user()->id);
            $user->username=$request->post('username');
            $user->email=$request->post('email');
            $user->phonenumber=$request->post('phonenumber');
            $user->laundryname=$request->post('laundryname');
            $user->address=$request->post('address');
            $user->save();
            return redirect(url('/dashboard/profile/edit'));
        }
    	return view('editprofile', ['hasil' => $hasil]);
    }
    public function updatepassword(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        // $current_password=Hash::make($request->post('current_password'));
        // var_dump(Hash::check($request->post('current_password'), $user->password));
        if(Hash::check($request->post('current_password'), $user->password)){
            if (strlen($request->post('password'))>=8) {
                if($request->post('password')==$request->post('password_confirmation')){
                    $user = User::findOrFail(Auth::user()->id);
                    $user->password=Hash::make($request->post('password'));
                    $user->save();
                    return redirect(url('/dashboard/profile/editpassword'));
                }
                else $hasil="Whoops! Something went wrong. The password confirmation does not match.";
            }
            else $hasil="Whoops! Something went wrong. The password must be at least 8 characters.";
        }
        else $hasil="Whoops! Something went wrong. These credentials do not match our records.";
    	
    	return view('editpassword', ['hasil' => $hasil]);
    }
	public function read(){
		$user = User::all();
		return view('users',['user'=>$user]);
	}
    
}
