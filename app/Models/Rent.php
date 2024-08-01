<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    
     public function klijent() 
    {
        return $this->belongsTo(Klijent::class); 
    }
    
    public function auto() 
    {
        return $this->belongsTo(Auto::class); 
    }
}
