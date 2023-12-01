<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'photo',
        'piva'
    ];
    
    // 1 a 1 user/restaurant
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //many to many */* restaurants /typologies
    public function typologies(){
	    return $this->belongsToMany(Typology::class);
    }
    //one to many 1/* restaurant più piatti
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

   
}