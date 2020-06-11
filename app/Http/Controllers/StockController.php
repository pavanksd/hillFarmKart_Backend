<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    function index(){
        $data['stockList'] = DB::table('order_details')
        ->select(DB::raw('SUM(order_details.quantity) as quantity'), 'catalogs.item_name')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->join('catalogs', 'order_details.item_id', '=', 'catalogs.id')
        ->where('orders.delivery_status_code', '=','1')
        ->groupBy('catalogs.id')
        ->get();
        return view('stockList',$data);
    }
}
