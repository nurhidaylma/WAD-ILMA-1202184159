<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $products = Product::all();
        return view('order/order', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('order/proses_order', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {        
        $this->validate($request, [                  
            'buyer_quant'   => 'required',  
            'buyer_name'    => 'required',
            'buyer_contact' => 'required'                      
        ]);

        $product = Product::findOrFail($request->id_pro);      
        $order = new Order();
        $order->product_id = $product->id;
        $order->amount = request('buyer_quant');
        $order->buyer_name = request('buyer_name');
        $order->buyer_contact = request('buyer_contact');
        $order->save();        

        $stock = Product::findOrFail($request->stock_pro);
        $amount = $request->buyer_quant;
        $stock_left = $stock-$amount;
        echo $stock_left;
        $update = DB::table('products')
            ->where('id', $product->id)
            ->update(
                ['stock' => $stock_left]
            );
        
        if($update){                                    
            return redirect()->route('order.create')->with(['success' => 'Data berhasil disimpan']);
        } else{
            return redirect()->route('order.create')->with(['error' => 'Data gagal disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
