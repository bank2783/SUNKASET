<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function Rice_type(){
        $products = Warehouse::where('product_status','=','selling')->where('product_type_id','=','2')->paginate(10);
        return view('Type.rice',compact('products'))
        ->with('i',(request()->input('page',1)-1)*10);
    }
}
