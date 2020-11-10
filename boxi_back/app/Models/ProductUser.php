<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    protected $table = 'products_user';
    protected $fillable = [
        'id',
        'product', 
        'user',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class, 'product');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user');
    }
}
