<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $table = 'skus';
    protected $fillable = [
        'id',
        'name', 
        'listPrice',
        'specifications',
        'dimensions',
        'is_active',
        'listPriceFormatted',
        'basePriceFormatted'

    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function dimensions(){
        return $this->belongsTo(Dimension::class, 'dimensions');
    }
}
