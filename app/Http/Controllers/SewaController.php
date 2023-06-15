<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SewaController extends Controller
{
    public function payment(Request $request){
    	/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
		composer require midtrans/midtrans-php  
		                            
		Alternatively, if you are not using **Composer**, you can download midtrans-php library 
		(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
		the file manually.   
		
		require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
		
		//SAMPLE REQUEST START HERE
		
		// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = 'SB-Mid-server-RzyhHLrbAEtlPuE9v66YnQUK';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;
		
		$params = array(
		    'transaction_details' => array(
		        'order_id' => rand(),
		        'gross_amount' => 10000,
		    ),
		    "item_details" => array( 
		        // [
		        // 	'id'=> 'a01',
		        // 	'price'=> 7000,
		        // 	'quantity'=> 1,
		        // 	'name'=> 'Apple'
		        // ],
		        [
		        	'id'=> rand(),
		        	'price'=> 10000,
		        	'quantity'=> 1,
		        	'name'=> 'Rental DIGIDiBi Platform for Next One Month'
		        ]
		    ),
		    'customer_details' => array(
		        'first_name' => Auth::user()->username,
		        'last_name' => Auth::user()->laundryname,
		        // 'email' => $request->get('email'),
		        'phone' => Auth::user()->phonenumber,
				// 'username' => Auth::user()->username,
				'email' => Auth::user()->email,
		    ),
		);
		if(Auth::user()->role=="Admin"){
			$all = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->count();
			$inqueue = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','In Queue')->count();
			$wash = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Wash')->count();
			$ironing = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Ironing')->count();
			$packing = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Packing')->count();
			$delivered = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Being Delivered')->count();
			$year = Sewa::whereYear('sewas.time',Carbon::now()->year)->sum('amount');
			$month = Sewa::whereMonth('sewas.time',Carbon::now()->month)->sum('amount');
			$jan = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',1)->sum('amount');
			$feb = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',2)->sum('amount');
			$mar = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',3)->sum('amount');
			$apr = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',4)->sum('amount');
			$mei = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',5)->sum('amount');
			$jun = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',6)->sum('amount');
			$jul = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',7)->sum('amount');
			$aug = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',8)->sum('amount');
			$sep = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',9)->sum('amount');
			$oct = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',10)->sum('amount');
			$nov = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',11)->sum('amount');
			$dec = Sewa::whereYear('sewas.time',Carbon::now()->year)->whereMonth('sewas.time',12)->sum('amount');
		}
		else{
			$all = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->count();
			$inqueue = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','In Queue')->count();
			$wash = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Wash')->count();
			$ironing = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Ironing')->count();
			$packing = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Packing')->count();
			$delivered = Pesanan::where('timefinish',NULL)->join('pakets','pakets.id','pesanans.packagetype_id')
			->join('progres','pesanans.id','progres.order_id')->where('pakets.user_id',Auth::user()->id)->select('pakets.name as namapaket','pakets.price','pakets.isironing','pesanans.*','progres.progress','progres.order_id','progres.time')->orderBy('time', 'desc')
			->get()->unique('order_id')->where('progress','Being Delivered')->count();
			$year = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->sum(DB::raw('pakets.price * pesanans.weight'));
			$month = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereMonth('pesanans.timeorder',Carbon::now()->month)->sum(DB::raw('pakets.price * pesanans.weight'));
			$jan = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',1)->sum(DB::raw('pakets.price * pesanans.weight'));
			$feb = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',2)->sum(DB::raw('pakets.price * pesanans.weight'));
			$mar = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',3)->sum(DB::raw('pakets.price * pesanans.weight'));
			$apr = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',4)->sum(DB::raw('pakets.price * pesanans.weight'));
			$mei = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',5)->sum(DB::raw('pakets.price * pesanans.weight'));
			$jun = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',6)->sum(DB::raw('pakets.price * pesanans.weight'));
			$jul = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',7)->sum(DB::raw('pakets.price * pesanans.weight'));
			$aug = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',8)->sum(DB::raw('pakets.price * pesanans.weight'));
			$sep = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',9)->sum(DB::raw('pakets.price * pesanans.weight'));
			$oct = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',10)->sum(DB::raw('pakets.price * pesanans.weight'));
			$nov = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',11)->sum(DB::raw('pakets.price * pesanans.weight'));
			$dec = Pesanan::join('pakets','pakets.id','pesanans.packagetype_id')->where('pakets.user_id',Auth::user()->id)->whereYear('pesanans.timeorder',Carbon::now()->year)->whereMonth('pesanans.timeorder',12)->sum(DB::raw('pakets.price * pesanans.weight'));
		}
		$snapToken = \Midtrans\Snap::getSnapToken($params);
    	return view('index',['snapToken'=>$snapToken,'all'=>$all,'inqueue'=>$inqueue,'wash'=>$wash,'ironing'=>$ironing,'packing'=>$packing,'delivered'=>$delivered,'year'=>$year,'month'=>$month
		,'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,'apr'=>$apr,'mei'=>$mei,'jun'=>$jun,'jul'=>$jul,'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec
		]);
    }
    public function payment_post(Request $request){
    	$json=json_decode($request->get('json'));
    	$sewa=new Sewa();
    	$sewa->status=$json->transaction_status;
    	$sewa->midtrans_id=$json->order_id;
    	$sewa->user_id=Auth::user()->id;
    	$sewa->amount=$json->gross_amount;
    	$sewa->method=$json->payment_type;
    	$sewa->time=now();
		if($sewa->status=="settlement"){
			$user = User::findOrFail(Auth::user()->id);
			if($user->deadline<now()){
				$user->deadline=Carbon::now()->addMonths(1);
			}
			else{
				$user->deadline=Carbon::parse($user->deadline)->addMonths(1);
			}
			$user->save();
		}
    	// $order->payment_code=isset($json->payment_code)?$json->payment_code:null;
    	// $order->pdf_url=isset($json->pdf_url)?$json->pdf_url:null;
    	// $order->email=$request->get('email');
    	// $order->nohp=$request->get('nohp');
    	return $sewa->save()?redirect(url('/dashboard'))->with('alert-success','Order berhasil dibuat'):redirect(url('/'))->with('alert-failed','Terjadi kesalahan');
    }
	public function read(){
        if (Auth::user()->role!="Admin") {
            return abort(404);
        }
		$sewa=User::join('sewas','users.id','sewas.user_id')->orderBy('time','desc')->get();
		return view('rent',['sewa'=>$sewa]);
	}
    public function create(Request $request){
    	$sewa=new Sewa();
    	$sewa->status="settlement";
    	$sewa->midtrans_id=$request->post('midtrans_id');
    	$sewa->user_id=$request->post('user_id');
    	$sewa->amount=10000;
    	$sewa->method=$request->post('method');
    	$sewa->time=$request->post('time');
		$user = User::findOrFail($request->post('user_id'));
		if($user->deadline<now()){
			$user->deadline=Carbon::now()->addMonths(1);
		}
		else{
			$user->deadline=Carbon::parse($user->deadline)->addMonths(1);
		}
		$user->save();
		$sewa->save();
    	return redirect(url('/dashboard/rent'));
    }
	public function read_id(Request $request){
        if (Auth::user()->role!="Admin") {
            return abort(404);
        }
		$user = User::where('users.role','!=','Admin')->get();
		$sewa=User::join('sewas','users.id','sewas.user_id')->where('sewas.id',$request->get('id'))->get();
		return view('updaterent',['sewa'=>$sewa,'user'=>$user]);
	}
    public function update(Request $request){
    	$sewa=Sewa::findOrFail($request->post('id'));
    	$sewa->midtrans_id=$request->post('midtrans_id');
    	$sewa->user_id=$request->post('user_id');
    	$sewa->method=$request->post('method');
    	$sewa->time=$request->post('time');
		$sewa->save();
    	return redirect(url('/dashboard/rent'));
    }
    public function delete(Request $request){
        if (Auth::user()->role!="Admin") {
            return abort(404);
        }
    	$sewa=Sewa::findOrFail($request->post('id'));
    	$sewa->delete();
    	return redirect(url('/dashboard/rent'));
    }
}
