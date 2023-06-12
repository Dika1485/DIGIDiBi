<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
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
		$snapToken = \Midtrans\Snap::getSnapToken($params);
    	return view('index',['snapToken'=>$snapToken,'all'=>$all,'inqueue'=>$inqueue,'wash'=>$wash,'ironing'=>$ironing,'packing'=>$packing,'delivered'=>$delivered]);
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
		$sewa=User::join('sewas','users.id','sewas.user_id')->orderBy('time','desc')->get();
		return view('rent',['sewa'=>$sewa]);
	}
}
