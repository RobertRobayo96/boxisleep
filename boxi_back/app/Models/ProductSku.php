<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $table = 'products_sku';
    protected $fillable = [
        'id',
        'product', 
        'sku',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class, 'product');
    }

    public function sku(){
        return $this->belongsTo(SKU::class, 'sku');
    }
}
