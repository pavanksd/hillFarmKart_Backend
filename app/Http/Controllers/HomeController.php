<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orderData = DB::table('orders')                        
                        ->get();
        
        $data['new_order']      = 0;
        $data['packed']         = 0;
        $data['cancelled']      = 0;

        foreach($orderData as $order){
            if($order->delivery_status_code==1) $data['new_order']++;
            else if($order->delivery_status_code==2) $data['packed']++;
            else if($order->delivery_status_code==3) $data['cancelled']++;
        }

        return view('home',$data);
    }
}
