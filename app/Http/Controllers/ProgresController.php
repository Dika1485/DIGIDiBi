<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\Progres;

class ProgresController extends Controller
{
    public function update(Request $request){
    	$progres = new Progres();
        $next="";
        if ($request->post('progress')=="In Queue") {
            $next="Wash";
        }
        elseif ($request->post('progress')=="Wash") {
            if ($request->post('isironing')==1) {
                $next="Ironing";
            }
            else{
                $next="Packing";
            }
        }
        elseif ($request->post('progress')=="Ironing") {
            $next="Packing";
        }
        elseif ($request->post('progress')=="Packing") {
            if ($request->post('isshuttle')==1) {
                $next="Being Delivered";
            }
            else{
                $next="Finish";
            }
        }
        elseif ($request->post('progress')=="Being Delivered") {
            $next="Finish";
        }
        $progres->progress=$next;
        $progres->order_id=$request->post('id');
        $progres->time=now();
    	$progres->save();
        if ($next=="Finish") {
            $pesanan=Pesanan::findOrFail($request->post('id'));
            $pesanan->timefinish=now();
            $pesanan->save();
        }
    	return redirect(url('/dashboard/order'));
    }
    public function check(Request $request){
        $cekisset=$request->get('id');
        if (isset($cekisset)){
            $pesanan = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pesanans.check_id',$request->get('id'))->select('pakets.name as namapaket','pakets.isironing','pakets.price','pesanans.*')->get();
            if ($pesanan->count()!=1) {
                return redirect(url('/check'));
            }
            foreach($pesanan as $pesanan){
                $progres = Progres::where('order_id',$pesanan->id)->orderBy('time', 'desc')->get();
            }
            $pesanan = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pesanans.check_id',$request->get('id'))->select('pakets.name as namapaket','pakets.isironing','pakets.price','pesanans.*')->get();
            return view('checkit', ['pesanan' => $pesanan,'progres' => $progres]);
        }
        else{
            return view('check');
        }
        
    }
}
