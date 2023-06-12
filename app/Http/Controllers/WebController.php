<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
	public function index(Request $request){
		return view('welcome');
	}
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
		        	'quantity'=> 2,
		        	'name'=> 'Rental DIGIDiBi Platform'
		        ]
		    ),
		    'customer_details' => array(
		        // 'first_name' => $request->get('name'),
		        // 'last_name' => '',
		        // 'email' => $request->get('email'),
		        // 'phone' => $request->get('nohp'),
				'username' => Auth::user()->username,
				'email' => Auth::user()->email,
		    ),
		);
		
		$snapToken = \Midtrans\Snap::getSnapToken($params);
    	return view('index',['snapToken'=>$snapToken]);
    }
    public function payment_post(Request $request){
    	$json=json_decode($request->get('json'));
    	$order=new Order();
    	$order->status=$json->transaction_status;
    	$order->transaction_id=$json->transaction_id;
    	$order->order_id=$json->order_id;
    	$order->gross_amount=$json->gross_amount;
    	$order->payment_type=$json->payment_type;
    	$order->payment_code=isset($json->payment_code)?$json->payment_code:null;
    	$order->pdf_url=isset($json->pdf_url)?$json->pdf_url:null;
    	$order->user_id=Auth::user()->id;
    	// $order->email=$request->get('email');
    	// $order->nohp=$request->get('nohp');
    	return $order->save()?redirect(url('/'))->with('alert-success','Order berhasil dibuat'):redirect(url('/'))->with('alert-failed','Terjadi kesalahan');
    }
}
