<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\Progres;
use App\Models\Sewa;
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
	public function read_all(){
        if (Auth::user()->role!="Admin") {
            return abort(404);
        }
		$user = User::all();
		return view('users',['user'=>$user]);
	}
	public function read_id(Request $request){
        if (Auth::user()->role!="Admin") {
            return abort(404);
        }
		$user = User::where('id',$request->get('id'))->get();
		return view('updateuser',['user'=>$user]);
	}
	public function read(){
        if (Auth::user()->role!="Admin") {
            return abort(404);
        }
		$user = User::where('users.role','!=','Admin')->get();
		return view('createrent',['user'=>$user]);
	}
    public function create(Request $request){
        $user=User::where('email', $request->post('email'))->orWhere('username', $request->post('email'))->get();
        if($user->count()>1){
            $hasil="Whoops! Something went wrong. The username or email has already been taken.";
        }
        else{
            if (strlen($request->post('password'))>=8) {
                if($request->post('password')==$request->post('password_confirmation')){
                    $user = new User();
                    $user->username=$request->post('username');
                    $user->email=$request->post('email');
                    $user->role=$request->post('role');
                    $user->laundryname=$request->post('laundryname');
                    $user->phonenumber=$request->post('phonenumber');
                    $user->address=$request->post('address');
                    $user->deadline=$request->post('deadline');
                    $user->password=Hash::make($request->post('password'));
                    if (($request->post('role')!=Admin) and ($request->post('deadline')==NULL)) {
                        $user->deadline=now();
                    }
                    $user->save();
                    return redirect(url('/dashboard/users'));
                }
                else $hasil="Whoops! Something went wrong. The password confirmation does not match.";
            }
            else $hasil="Whoops! Something went wrong. The password must be at least 8 characters.";
        }
    	
    	return view('createuser', ['hasil' => $hasil]);
    }
    public function updateuser(Request $request){
        $user=User::where('email', $request->post('email'))->orWhere('username', $request->post('email'))->get();
        if($user->count()>1){
            $hasil="Whoops! Something went wrong. The username or email has already been taken.";
        }
        else{
            $user = User::findOrFail($request->post('id'));
            $user->username=$request->post('username');
            $user->email=$request->post('email');
            $user->phonenumber=$request->post('phonenumber');
            $user->laundryname=$request->post('laundryname');
            $user->address=$request->post('address');
            $user->role=$request->post('role');
            $user->deadline=$request->post('deadline');
            $user->save();
            return redirect(url('/dashboard/users'));
        }
    	return view('updateuser', ['hasil' => $hasil]);
    }
    public function read_it(Request $request){
        if(Auth::user()->role!="Admin"){
            return abort(404);
        }
        $id=$request->get('id');
    	return view('edituserpassword', ['id' => $id]);
    }
    public function updateuserpassword(Request $request){
        $id=$request->post('id');
        $user = User::findOrFail($request->post('id'));
        // $current_password=Hash::make($request->post('current_password'));
        // var_dump(Hash::check($request->post('current_password'), $user->password));
        // if(Hash::check($request->post('current_password'), $user->password)){
            if (strlen($request->post('password'))>=8) {
                if($request->post('password')==$request->post('password_confirmation')){
                    $user = User::findOrFail($request->post('id'));
                    $user->password=Hash::make($request->post('password'));
                    $user->save();
                    return redirect(url('/dashboard/users'));
                }
                else $hasil="Whoops! Something went wrong. The password confirmation does not match.";
            }
            else $hasil="Whoops! Something went wrong. The password must be at least 8 characters.";
        // }
        // else $hasil="Whoops! Something went wrong. These credentials do not match our records.";
    	
    	return view('edituserpassword', ['hasil' => $hasil,'id' => $id]);
    }
    public function delete(Request $request){
		if(Auth::user()->role!="Admin"){
            return abort(404);
		}
        $user = User::where('id',$request->post('id'))->get();
        if ($user->count()!=1) {
            return abort(404);
        }
		$paket = Paket::where('pakets.user_id',$request->post('id'))->get();
        foreach ($paket as $paket) {
            $pesanan = Pesanan::where('packagetype_id',$paket->id)->get();
            foreach ($pesanan as $pesanan) {
                $progress=Progres::where('order_id',$pesanan->id)->delete();
			}
            $pesanan = Pesanan::where('packagetype_id',$paket->id)->delete();
        }
        $paket = Paket::where('pakets.user_id',$request->post('id'))->delete();
        $sewa = Sewa::where('user_id',$request->post('id'))->delete();
        $user = User::where('id',$request->post('id'))->delete();
    	return redirect(url('/dashboard/users'));
    }
}
