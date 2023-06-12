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
    public function read_all(){
    	$pesanan = Pesanan::where('waktuselesai',NULL)->join('pakets','pakets.id','pesanans.paket_id')->select('pakets.name as namapaket','pesanans.*')->get();
    	return view('order', ['pesanan' => $pesanan]);
    }
    public function read_all_history(){
    	$pesanan = Pesanan::join('pakets','pakets.id','pesanans.paket_id')->select('pakets.name as namapaket','pesanans.*')->orderBy('timefinish', 'desc')->get();;
    	return view('history', ['pesanan' => $pesanan]);
    }
    public function read_history(){
    	$pesanan = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pesanans.*')->orderBy('timefinish', 'desc')->get();;
    	return view('history', ['pesanan' => $pesanan]);
    }
    public function read(){
    	$pesanan = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
        ->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
        // ->groupBy('progress')
        ->get()->unique('order_id');
        // foreach ($pesanan as $pesanan) {
            // if ($pesanan->progress=="In Queue") {
            //     $pesanan->next="Wash";
            // }
            // elseif ($pesanan->progress=="Wash") {
            //     if ($pesanan->isironing==1) {
            //         $pesanan->next="Ironing";
            //     }
            //     else{
            //         $pesanan->next="Packing";
            //     }
            // }
            // elseif ($pesanan->progress=="Ironing") {
            //     $pesanan->next="Packing";
            // }
            // elseif ($pesanan->progress=="Packing") {
            //     if ($pesanan->isshuttle==1) {
            //         $pesanan->next="Being Delivered";
            //     }
            //     else{
            //         $pesanan->next="Finish";
            //     }
            // }
            // elseif ($pesanan->progress="Being Delivered") {
            //     $pesanan->next="Finish";
            // }
        // }
    	return view('order', ['pesanan' => $pesanan]);
    }
    public function read_packagetype(){
        $paket = Paket::where('pakets.user_id',Auth::user()->id)->where('pakets.deleted',0)->get();
        return view('createorder', ['paket' => $paket]);
    }
    public function create(Request $request){
    	$pesanan=new Pesanan();
        $paket = Paket::findOrFail($request->post('packagetype_id'));
    	$pesanan->packagetype_id=$request->post('packagetype_id');
    	$pesanan->name=$request->post('name');
    	$pesanan->phonenumber=$request->post('phonenumber');
    	$pesanan->weight=$request->post('weight');
    	$pesanan->address=$request->post('address');
    	$pesanan->timeestimation=Carbon::now()->addHours($paket->estimation);
    	$pesanan->timeorder=now();
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
}
