<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory; 
    
    protected $table = "identities";

    // Mendefinisikan fillable untuk memastikan kolom yang bisa diisi dengan mass assignment
    
}
