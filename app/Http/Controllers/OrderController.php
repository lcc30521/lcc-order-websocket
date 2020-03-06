<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Events\OrderStatus;
class OrderController extends Controller
{
    //

    
    public function index(User $user){
    	$ststuses = Order::statuses;
    	$orders = $user->orders()->with('statuses')->paginate(12);
    	//dd($orders);

    	return view('orders.index',compact('orders','ststuses'));
    }
    public function admin(){
       $ststuses = Order::statuses;
       $orders = Order::with('user','statuses')->paginate(10);
     // dd($orders);

       return view('orders.admin',compact('orders','ststuses'));
    }

    public function update(Request $request,Order $order){
        
         $order->setStatus($request->status);
         event(new OrderStatus($order));
        /* return back();*/
    }
}
