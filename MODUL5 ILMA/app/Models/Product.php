<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function orders(){
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'name', 'price', 'description', 'stock', 'img_path'
    ];
}
