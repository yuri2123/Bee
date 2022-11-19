<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

       //llama los campos de la tabla
       protected $fillable =[
        "nombre_produucto" ,
        "descripcion_prod",
        //"imagen_producto",
        "cantidad_producto",
        "fecha_producto",
        "precio",
        "fecha_ven_producto",
        "estado_producto"
     ];
}
