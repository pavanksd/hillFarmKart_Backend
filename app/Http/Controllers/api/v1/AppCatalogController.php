<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AppCatalogController extends Controller
{
    //
    function getAllItems(){
        $items = DB::table('catalogs')->select('id','item_name', 'price')->where('is_enabled',1)->get();
        if(!empty($items)){
            return response()->json(['items'=>$items, 'code'=>200],200);   
        }else{
            return response()->json(['items'=>array(), 'code'=>503],503);
        }
    }
}
