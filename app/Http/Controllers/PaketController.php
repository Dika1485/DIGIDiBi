<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{
    public function readadmin(){
    	$paket = Paket::all();
    	return view('packagetypeadmin', ['paket' => $paket]);
    }
    public function read(){
    	$paket = Paket::where('pakets.user_id',Auth::user()->id)->where('pakets.deleted',0)->get();
    	return view('packagetype', ['paket' => $paket]);
    }
    public function read_id(Request $request){
    	$paket = Paket::where('pakets.id',$request->get('id'))->where('pakets.user_id',Auth::user()->id)->where('pakets.deleted',0)->get();
		// if ($paket->id==NULL) {
		// 	return redirect(url('/dashboard/packagetype'));
		// }
    	return view('updatepackagetype', ['paket' => $paket]);
    }
    public function delete(Request $request){
    	$paket = Paket::findOrFail($request->post('id'));
    	$paket->deleted = 1;
    	$paket->save();
    	return redirect(url('/dashboard/packagetype'));
    }
    public function create(Request $request){
    	$paket=new Paket();
    	$paket->name=$request->post('name');
    	$paket->price=$request->post('price');
    	$paket->estimation=$request->post('estimation');
    	$paket->isironing=($request->post('isironing')==NULL)?0:1;
    	$paket->deleted=0;
    	$paket->user_id=Auth::user()->id;
		$paket->save();
    	return redirect(url('/dashboard/packagetype'));
    }
    public function update(Request $request){
    	$paket = Paket::findOrFail($request->post('id'));
    	$paket->name=$request->post('name');
    	$paket->price=$request->post('price');
    	$paket->estimation=$request->post('estimation');
    	$paket->isironing=($request->post('isironing')==NULL)?0:1;
    	$paket->deleted=0;
    	$paket->user_id=Auth::user()->id;
		$paket->save();
    	return redirect(url('/dashboard/packagetype'));
    }
}
