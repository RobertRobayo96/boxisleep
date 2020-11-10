<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DimensionMap extends Model
{
    protected $table = 'dimensions_map';
    protected $fillable = [
        'id',
        'size', 
        'measurement',
        'firmness',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
