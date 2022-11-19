<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    //llama los campos de la tabla
    protected $fillable =[
       "nombre_categoria" ,
       "descripcion_categoria"
    ];

}
