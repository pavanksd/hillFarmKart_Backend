<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Catalog;

class CatalogController extends Controller
{
    function index(){

        $data['items'] = Catalog::  orderBy('is_enabled', 'DESC')
                                    ->orderBy('id', 'DESC')
                                    ->get();
        return view('catalog',$data);
    }

    function create(){
        return view('catalogAdd');
    }

    function store(Request $request){
        $rules = [
            'itemName' => ['required', 'string', 'max:255'],
            'itemPrice' => ['required', 'Numeric'],
        ];
        $input  = $request->only('itemName', 'itemPrice');
        $itemImage = $request->file('itemImage')->getClientOriginalName();
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            echo json_encode(['status' => false, 'error' => $validator->messages()]);
            return;
        }

        $catalog = new Catalog;

        $catalog['item_name'] = $input['itemName'];
        $catalog['price'] = $input['itemPrice'];
        $catalog['image_name'] = $itemImage;

        $result =  $catalog->save();
        echo json_encode(['status'=>$result]);
    }

    function update(Request $request){
        $rules = [
            'itemName' => ['required', 'string', 'max:255'],
            'itemPrice' => ['required', 'Numeric'],
            'enabled'=>['required','Boolean']
        ];

        $input  = $request->only('itemName', 'itemPrice','enabled','itemId');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            echo json_encode(['status' => false, 'error' => $validator->messages()]);
            return;
        }

        $result = Catalog::   where('id', $input['itemId'])
                                ->update(array( 'item_name' =>  $input['itemName'],
                                                'price' => $input['itemPrice'],
                                                'is_enabled' => $input['enabled'] )
                                        );
        echo json_encode(['status'=>$result]);
    }
}
