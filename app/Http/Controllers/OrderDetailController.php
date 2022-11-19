<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
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
    public function store(Request $request)
    {
        $ord = new Order_detail();
        $ord -> cantidad = $request -> cantidad;
        $ord -> precio_unitario = $request -> precio_unitario;
        $ord -> precio_total = $request -> precio_total;
        $ord -> producto_id = $request -> producto_id;
        $ord -> save();

        return response()->json([
            'message' => 'success',
            'info' => 'order detail creado',
            'order_detail' => $ord,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Order_detail $order_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_detail $order_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_detail $order_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_detail $order_detail)
    {
        //
    }
}
