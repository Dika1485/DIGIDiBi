<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\Progres;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{
    public function read(){
        if(Auth::user()->role!="Admin"){
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
        }
		if(Auth::user()->role=="Admin"){
			$paket = Paket::all();
		}
		else $paket = Paket::where('pakets.user_id',Auth::user()->id)->where('pakets.deleted',0)->get();
    	return view('packagetype', ['paket' => $paket]);
    }
    public function read_id(Request $request){
        if(Auth::user()->role!="Admin"){
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
        }
		if(Auth::user()->role=="Admin"){
    		$paket = Paket::where('pakets.id',$request->get('id'))->get();
		}
		else{
			$paket = Paket::where('pakets.id',$request->get('id'))->where('pakets.user_id',Auth::user()->id)->where('pakets.deleted',0)->get();
		}
		// if ($paket->id==NULL) {
		// 	return redirect(url('/dashboard/packagetype'));
		// }
		if($paket->count()==0) return abort(404);
    	return view('updatepackagetype', ['paket' => $paket]);
    }
    public function delete(Request $request){
        if(Auth::user()->role!="Admin"){
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
        }
		if(Auth::user()->role=="Admin"){
			$paket = Paket::where('id',$request->post('id'))->get();
		}
		else $paket = Paket::where('id',$request->post('id'))->where('pakets.user_id',Auth::user()->id)->get();
    	if($paket->count()==0) return abort(404);
        $paket = Paket::findOrFail($request->post('id'));
		if(Auth::user()->role=="Admin"){
			$pesanan = Pesanan::where('packagetype_id',$request->post('id'))->where('timefinish',NULL)->get();
			if($pesanan->count()==0){
				foreach ($pesanan as $pesanan) {
					$progress=Progres::where('order_id',$pesanan->id)->delete();
				}
				$pesanan = Pesanan::where('packagetype_id',$request->post('id'))->delete();
				$paket->delete();
				return redirect(url('/dashboard/packagetype'));
			}
		}
    	$paket->deleted = 1;
    	$paket->save();
    	return redirect(url('/dashboard/packagetype'));
    }
    public function create(Request $request){
        if(Auth::user()->role!="Admin"){
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
        }
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
        if(Auth::user()->role!="Admin"){
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
        }
    	$paket = Paket::findOrFail($request->post('id'));
    	$paket->name=$request->post('name');
    	$paket->price=$request->post('price');
    	$paket->estimation=$request->post('estimation');
    	$paket->isironing=($request->post('isironing')==NULL)?0:1;
		$paket->save();
    	return redirect(url('/dashboard/packagetype'));
    }
}
