<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
  

public function bitem()
{
    return $this->hasMany(BItem::class, 'business_id', 'id');
}

}