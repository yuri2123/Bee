<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductResquestt;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $product -> cantidad_producto = $request -> cantidad_producto;
        $product -> fecha_producto = $request -> fecha_producto;
        $product -> precio = $request -> precio;
        $product -> fecha_ven_producto= $request -> fecha_ven_producto;
        $product -> estado_producto = $request -> estado_producto;
        $product -> categoria_id = $request -> categoria_id;
        $file = $request->image->store('public/img');
        $file = $request->file('imagen_producto')->store('public/img');
        $$product->imagen_producto = $file;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
