<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     //many to many */*
     public function dishes(){
        return $this->belongsToMany(Dish::class);
    }
}