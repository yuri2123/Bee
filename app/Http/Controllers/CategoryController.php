<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'message' => 'success',
            'info' => 'Lista de catgorias',
            'categoria' => $categories,

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
    public function store(Request $request)
    {
        
        $category = new Category();
        $category->  nombre_categoria = $request->  nombre_categoria;
        $category->  descripcion_categoria = $request->  descripcion_categoria;
        $category -> save();

        return response()->json([
            'message' => 'success',
            'info' => 'Categoria generada',
            'categoria' => $category,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->  nombre_categoria = $request->  nombre_categoria;
        $category->  descripcion_categoria = $request->  descripcion_categoria;
        $category-> save();

        return response()->json([
            'message' => 'success',
            'info' => 'categoria actualizada',
            'categoria' => $category,
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'messaje'=> 'categoria eliminada',
        ],200);
    }
}
