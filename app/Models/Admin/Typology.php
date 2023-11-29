<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    //many to many */* restaurants /typologies
    public function restaurants(){
        return $this->belongsToMany(Restaurant::class);
    }
}