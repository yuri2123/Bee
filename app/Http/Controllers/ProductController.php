<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductResquestt;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Session\Store;

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

        return response()->json([
            'message' => 'success',
            'info' => 'Lista de productos',
            'producto' => $products,

        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductResquestt $request)
    {
        
        $product = new Product() ;
        $product -> nombre_producto = $request -> nombre_producto;
        $product -> descripcion_producto = $request -> descripcion_producto;
        $product -> precio = $request -> precio;

        //1. llevar la foto como archivo
        $fotografia = $request->file('imagen_producto');
        // 2. mover la caarpeta img y getClientOriginal  solo paso el nombre de la foto         
         $fotografia ->move('img', $fotografia->getClientOriginalName());
                  
         //3. guardo el nombre del archivo 
        $product->imagen_producto = $fotografia-> getClientOriginalName();
       
    /*  if($request-> hasFile('imagen_producto')){

        //aqui se comprueba qque exista la imagen anterior 

        if(Storage::exists($product->imagen_producto)){

            //aqui la borro

            Storage::delete($product->imagen_producto);
          }
        
          $product->imagen_producto = Storage::putFile('storage', $request->file('imagen_producto'));
      }*/
        /*$imagen_producto = $request->file('imagen_producto');
        $imagen_producto->move('img', $imagen_producto->getClientOriginalName());
        $product->imagen_producto = $imagen_producto->getClientOriginalName();*/
        $product -> save();

        return response()->json([
            'message' => 'success',
            'info'=> 'producto creado',
            'categoria' => $product,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = Product::find($id);

        return response()->json([
            'message' => 'success',
            'info' => 'busqueda exitosa',
            'producto_find' => $product

        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product -> nombre_producto = $request -> nombre_producto;
        $product -> descripcion_producto = $request -> descripcion_producto;
        $product -> precio = $request -> precio;
        
        if($request->hasFile('imagen_producto')){
            Storage::delete($product->imagen_producto);
        $product->imagen_producto = $request->imagen_producto->store('public/img');
        }
       /* $file = $request->file('imagen_producto')->store('public/img');
        //$file = $request->file('image_producto')->storage_path('app/public');
        $product->imagen_producto = $file;*/
        $product -> save();

        return response()->json([
            'message' => 'success',
            'info'=> 'producto actualizado',
            'categoria' => $product,
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'success' => true,
            'messaje'=> 'producto eliminado',
        ],200);
    }
}
