<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Product;
use App\Http\Resources\PurchaseCollection;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PurchaseCollection(Purchase::all());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->items;

        $purchase = new Purchase();
        $purchase->data = json_encode($items);

        $total = 0;

        foreach ($items as $item) {
            $product = Product::findOrFail($item['id']);

            $product->decrement('quantity', $item['quantity']);
            $product->save();

            $total += $product->price * $item['quantity'];
        }

        $purchase->total = $total;
        $purchase->save();

        return new PurchaseCollection(Purchase::all());
    }
}
