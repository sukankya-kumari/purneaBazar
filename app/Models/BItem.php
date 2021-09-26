<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BItem extends Model
{
    use HasFactory;
  
  public function review()
  {
      return $this->hasMany(Review::class, 'b_id', 'id');
  }


 public function business()
 {
     return $this->hasOne(Business::class, 'id','business_id');
 }
 
}

