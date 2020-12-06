<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $products = Product::all();        
        return view('product/product', compact('products'));            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/insert_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'input_nama' => 'required',
            'input_price' => 'required',
            'input_desc' => 'required',
            'input_stock' => 'required',
            'input_img' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        //upload image
        $image = $request->file('input_img');
        $image->storeAs('public/images', $image->hashName());

        $product = Product::create([
            'name'        => $request->input_nama,
            'price'       => $request->input_price,
            'description' => $request->input_desc,
            'stock'       => $request->input_stock,
            'img_path'    => $image->hashName()
        ]);
        
        if($product){                        
            return redirect()->route('product.index')->with(['success' => 'Data berhasil disimpan']);
        } else{
            return redirect()->route('product.index')->with(['error' => 'Data gagal disimpan']);
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
        // return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product/update_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'input_nama' => 'required',
            'input_price' => 'required',
            'input_desc' => 'required',
            'input_stock' => 'required',                        
        ]);
    
        //get data product by ID
        $product = Product::findOrFail($product->id);
    
        if($request->file('input_img') == "") {
    
            $product->update([                
                'name'        => $request->input_nama,
                'price'       => $request->input_price,
                'description' => $request->input_desc,
                'stock'       => $request->input_stock,                
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/images/'.$product->img_path);
    
            //upload new image
            $image = $request->file('input_img');
            $image->storeAs('public/images', $image->hashName());
    
            $product->update([
                'name'        => $request->input_nama,
                'price'       => $request->input_price,
                'description' => $request->input_desc,
                'stock'       => $request->input_stock,
                'img_path'    => $image->hashName()
            ]);
    
        }
    
        if($product){
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrfail($id);
        Storage::disk('local')->delete('public/images/'.$product->img_path);
        $product->delete();

        if($product){
            return redirect()->route('product.index')->with(['success' => 'Data berhasil dihapus']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
