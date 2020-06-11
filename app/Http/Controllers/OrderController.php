<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    function index(Request $request){
        $data = $request->only('orderDate');
        if(empty($data)){
            $data['orderDate']  = date('Y-m-d');
        }
        $data['orders'] = DB::table('orders')
                                ->whereDate('created_at', '=', $data['orderDate'])
                                ->get();
        return view('orderList',$data);
    }

    function show($id){
        $orderData = DB::table('order_details')
                                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                                ->join('delivery_codes', 'orders.delivery_status_code', '=', 'delivery_codes.id')
                                ->join('catalogs', 'order_details.item_id', '=', 'catalogs.id')
                                ->select('orders.*','order_details.*', 'catalogs.item_name','delivery_codes.delivery_status')
                                ->where('order_details.order_id', '=', $id)
                                ->get();
        $data['orderData'] = json_decode(json_encode($orderData), true);
    
        return view('orderData',$data);
    }

    function markDelivered(Request $request){
        $data = $request->only('orderID');
        
        $data['result'] = DB::table('orders')
                            ->where('id', $data['orderID'])
                            ->update(array('delivery_status_code' => '2'));;
        error_log(json_encode($data['result']));
        
        echo json_encode($data['result']);
    }

    function markCancelled(Request $request){
        $data = $request->only('orderID');
        
        $data['result'] = DB::table('orders')
                            ->where('id', $data['orderID'])
                            ->update(array('delivery_status_code' => '3'));;
        error_log(json_encode($data['result']));
        
        echo json_encode($data['result']);
    }
}
