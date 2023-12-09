<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $productId = $request->input('id_product');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);

        if(!$product){
            return response()->json(['error' => 'Product not found.'], 404);
        }

        
    }
}
