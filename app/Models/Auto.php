<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    
     protected $fillable = [
       'marka',
         'model'
    ];
      public function rent()
    {
        return $this->hasMany(Rent::class , "auto_id");
    }
}
