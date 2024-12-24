<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produits extends Model
{ use HasFactory;
    
    protected $fillable=['nom','prix','photo','user_id'];

    public function commandes()
    {
        return $this->hasMany(commandes::class,);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
