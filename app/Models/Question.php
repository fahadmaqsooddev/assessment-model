<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function choices(){
        return $this->hasMany(Choice::class);
    }
    public function responses(){
        return $this->hasMany(Response::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
