<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    

    //many to one  */1  più piatti un ristorante
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
    //many to many */*
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}