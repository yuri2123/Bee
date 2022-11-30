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
        "nombre_producto" ,
        "descripcion_prod",
        "imagen_producto",
        "precio"
     ];
}
