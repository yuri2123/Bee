<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    protected $table = "order_details";

    protected $fillable =[

        'cantidad',
        'precio_unitario',
        'precio_total',
    ];


}
