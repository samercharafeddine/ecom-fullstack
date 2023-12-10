<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get_transactions(){
        $transactions = Transaction::all();

        return response()->json([
            "transactions" => $transactions
        ]);
    }
}
