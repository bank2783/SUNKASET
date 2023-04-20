<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function EditProducts(Request $request){
        $product_id = $request->product_id;
        $product = Warehouse::find($product_id)->first();

        return view('Admin.Warehouse.warehouse_edit_form',compact('product'));
    }
    public function ProductUpdate(Request $request){
        $product_id = $request->product_id;
        $request -> validate(
            [
                'product_name' => 'required|string|max:80',
                'product_price' => 'required|numeric|min:1',
                'product_amount' => 'required|numeric|min:1',
                'product_detail' => 'required|string|max:255',
            ]
            );
            Warehouse::find($product_id)->update([
                'product_name' => $request->product_name,
                'product_amount' => $request->product_amount,
                'product_price' => $request->product_price,
                'product_detail' => $request->product_detail,
            ]);
            return redirect('admin/wearhouse/view');
    }
    public function DeleteProduct(Request $request){
        $product_id = $request->product_id;
        Warehouse::find($product_id)->update([
            'product_status' => $request->delete_product,
        ]);
        return redirect('admin/wearhouse/view');

    }

    public function SellProductListView(){
        $warehouse = Warehouse::paginate(10);
        return view('Admin.Warehouse.product_sell_update',compact('warehouse'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function SellProduct(Request $request){
        $product_id = $request->product_id;
        Warehouse::find($product_id)->update([
            'product_status' => $request->selling_status
        ]);
        return redirect('admin/warehouse/product/sell/list');
    }

    public function AddProductDescriptionFrom(Request $request){
        $product_id = $request->product_id;
        return view('Admin.Warehouse.add_front_descript',compact('product_id'));
    }
    public function AddProductDescriptionInsert(Request $request){
        $product_id = $request->product_id;

        Warehouse::where('id','=',$product_id)->update([

            'product_status' => 'selling'
        ]);
        return redirect('admin/warehouse/product/sell/list');
    }
    public function CancelProductSelling(Request $request){
        $product_id = $request->product_id;
        Warehouse::find($product_id)->update([
            'product_status' => 'wait'
        ]);
        return redirect()->back();
    }

}
