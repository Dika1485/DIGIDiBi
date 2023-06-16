<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Paket;
use App\Models\Progres;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PesananController extends Controller
{
    public function delete(Request $request){
    	if(Auth::user()->role=="Admin"){
			$pesanan = Pesanan::where('pesanans.timefinish','!=',NULL)->where('pesanans.id',$request->post('id'))->get();
		}
    	else {
            if(Auth::user()->deadline<now()) return redirect(url('/dashboard#rent_now'));
            $pesanan = Pesanan::where('pesanans.timefinish','!=',NULL)->where('pesanans.id',$request->get('id'))->join('pakets','pakets.id','pesanans.packagetype_id')
            ->where('pakets.user_id',Auth::user()->id)->get();
        }
        if($pesanan->count()==0) return abort(404);
        $pesanan = Pesanan::findOrFail($request->post('id'));
        if(Auth::user()->role=="Admin"){
            $progress=Progres::where('order_id',$request->post('id'));
            $progress->delete();
            $pesanan=Pesanan::where('id',$request->post('id'))->delete();
        }
        else{ 
            $pesanan->deleted=1;
            $pesanan->save();
        }
    	return redirect(url('/dashboard/order'));
    }
    public function read_id(Request $request){
        if(Auth::user()->role=="Admin"){
			$pesanan = Pesanan::where('pesanans.id',$request->get('id'))->join('pakets','pakets.id','pesanans.packagetype_id')
            ->select('pakets.name as namapaket','pesanans.*')->get();
		}
    	else{
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
            $pesanan = Pesanan::where('pesanans.id',$request->get('id'))->join('pakets','pakets.id','pesanans.packagetype_id')
            ->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pesanans.*')->get();
        }

        if($pesanan->count()==0) return abort(404);
        if(Auth::user()->role=="Admin"){
            $paket = Paket::where('pakets.deleted',0)->get();
        }
        else $paket = Paket::where('pakets.user_id',Auth::user()->id)->where('pakets.deleted',0)->get();
        return view('updateorder', ['pesanan' => $pesanan,'paket' => $paket]);
    }
    public function read_history(){
        if(Auth::user()->role=="Admin"){
            $pesanan = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->select('pakets.name as namapaket','pakets.price','pesanans.*')->orderBy('timefinish', 'desc')->get();
        }
    	else{
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
            $pesanan = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->where('pesanans.deleted',0)->select('pakets.name as namapaket','pakets.price','pesanans.*')->orderBy('timefinish', 'desc')->get();
        }
    	return view('history', ['pesanan' => $pesanan]);
    }
    public function read(){
        if(Auth::user()->role=="Admin"){
			$pesanan = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
            ->join('progres','pesanans.id','progres.order_id')->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
            ->get()->unique('order_id');
		}
    	else{
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
            $pesanan = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
            ->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
            // ->groupBy('progress')
            ->get()->unique('order_id');
        }
    	return view('order', ['pesanan' => $pesanan]);
    }
    public function read_packagetype(){
        if(Auth::user()->role=="Admin"){
            $paket = Paket::where('pakets.deleted',0)->get();
        }
        else{
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
            $paket = Paket::where('pakets.user_id',Auth::user()->id)->where('pakets.deleted',0)->get();
        }
        return view('createorder', ['paket' => $paket]);
    }
    public function create(Request $request){
        if(Auth::user()->role!="Admin"){
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
        }
    	$pesanan=new Pesanan();
        $paket = Paket::findOrFail($request->post('packagetype_id'));
    	$pesanan->packagetype_id=$request->post('packagetype_id');
    	$pesanan->name=$request->post('name');
    	$pesanan->phonenumber=$request->post('phonenumber');
    	$pesanan->weight=$request->post('weight');
    	$pesanan->address=$request->post('address');
    	$pesanan->timeestimation=Carbon::now()->addHours($paket->estimation);
    	$pesanan->timeorder=now();
    	$pesanan->deleted=0;
    	$pesanan->isshuttle=($request->post('isshuttle')==NULL)?0:1;
        $date = Carbon::now();
        $pesanan->check_id=$date->year.$date->month.$date->day.$pesanan->packagetype_id.$pesanan->id;
		$pesanan->save();
        $progress=new Progres();
        $progress->order_id=$pesanan->id;
        $progress->time=now();
        $progress->progress="In Queue";
		$progress->save();
    	return redirect(url('/dashboard/order'));
    }
    public function update(Request $request){
        if(Auth::user()->role!="Admin"){
            if(Auth::user()->deadline < now()) return redirect(url('/dashboard#rental_now'));
        }
    	$pesanan = Pesanan::findOrFail($request->post('id'));
    	$pesanan->name=$request->post('name');
    	$pesanan->packagetype_id=$request->post('packagetype_id');
    	$pesanan->phonenumber=$request->post('phonenumber');
    	$pesanan->weight=$request->post('weight');
    	$pesanan->address=$request->post('address');
    	$pesanan->isshuttle=($request->post('isshuttle')==NULL)?0:1;
		$pesanan->save();
    	return redirect(url('/dashboard/order'));
    }
}
