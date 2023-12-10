<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{

    /*$table->id();
            $table->foreignId('id_order')->constrained('orders');
            $table->foreignId('id_product')->constrained('products');
            $table->integer('quantity');
            $table->float('price',8,2);
            $table->timestamps();
        });*/
    public function insert_order_item(Request $req)
    {
        $order_item = new OrderItem;
        $order_item->id_order = $req->id_order_item;
        $order_item->id_product =$req->id_product;
        $order_item->quantity = $req->quantity;
        $order_item->price = $req->price;
        $order_item->save();
    }
    public function update_order_item(Request $req)
    {
        $id_order_item = $req->id_order_item;
        $order_item = OrderItem::find($id_order_item);

        $order_item = OrderItem::where('id', $req->id_order_item)->get()[0];
        $order_item->name = $req->name;
        $order_item->save();

        $order_item->update([
            "description" => $req->description ?? $order_item->description
        ]);


        return response()->json([
            "order_item" => $order_item,
        ]);
    }

    public function delete_order_item(Request $req){
        $id_order_items = $req->id_order_item;
        $order_item = OrderItem::find($id_order_items);
        $req->id_order_item
        && $order_item->delete();
        return response()->json([
            "order_item"=> $order_item
            ]);
    }
    public function get_order_item()

    {
        $order_items = OrderItem::all();
        return response()->json([
            "order_items" => $order_items
        ]);
    }
}
