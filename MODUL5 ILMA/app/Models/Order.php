<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id', 'amount', 'buyer_name', 'buyer_contact'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
