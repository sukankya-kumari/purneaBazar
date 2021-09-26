<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
   
    public function bitem()
    {
        return $this->hasOne(BItem::class, 'id', 'b_id');
    }
}
