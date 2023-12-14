<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'address',
        'phone',
        'status',
        'totalprice'
    ];
    protected $attributes = [
        'name' => 'Valore di default', // Puoi impostare qui il valore di default che preferisci
        'lastname'=> 'Valore di default',
        'address'=> 'Valore di default',
        'phone'=> 'Valore di default',
        'status'=> '0',
        'totalprice'=> '0.99',

    ];
     //many to many */*
     public function dishes(){
        return $this->belongsToMany(Dish::class,'dish_order', 'order_id', 'dish_id')
        ->withPivot('quantity');
    }
}