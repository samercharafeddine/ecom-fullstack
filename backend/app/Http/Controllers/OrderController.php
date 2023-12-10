<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function insert_order(Request $req)
    {
        $order = new Order;
        $order->status = $req->status;
        $order->save();
    }
    public function update_product(Request $req)
    {
        $id_order = $req->id_order_item;
        $order = Order::where('id', $id_order)->get()[0];
        $order->user_id = $req->user_id;
        $order->status = $req->status;
        $order->save();

        $order->update([
            "description" => $req->description ?? $order->description
        ]);


        return response()->json([
            "orders" => $order
        ]);
    }

    public function delete_order(Request $req){
        $id_order = $req->id_order_item;
        $order = Order::where("id", $req->id_order_item)->first();
        $id_order
        && $order->delete();
        return response()->json([
            "order"=> $order
            ]);
    }
    public function get_order()

    {
        $order = Order::all();
        return response()->json([
            "order" => $order
        ]);
    }

}
