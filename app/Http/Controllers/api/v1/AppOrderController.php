<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Order;
use DB;

class AppOrderController extends Controller
{
    function checkoutOrder(Request $request){
        $data = $request->only('userData', 'cartItems');        
        $orderId = Order::create(
            [
                'user_id'           => $data['userData']['userId'], 
                'user_name'         => $data['userData']['userName'], 
                'user_address'      => $data['userData']['userAddress'],
                'user_contact'      => $data['userData']['userContact'],
                'order_details'     => json_encode($data['cartItems'])
            ]
        );

        foreach($data['cartItems'] as $cartItem){
            DB::insert('insert into order_details (created_at,updated_at,item_id,order_id,quantity,price) 
                        values (?, ?, ?, ?, ?, ?)', 
                        [date('Y-m-d H:i:s'),date('Y-m-d H:i:s'), $cartItem['id'], $orderId['id'], $cartItem['qty'], $cartItem['price']]);
        }

        return response()->json(['status'=>TRUE, 'id'=>$orderId['id'],'code'=>201],201);
    }
}
