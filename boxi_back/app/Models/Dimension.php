<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $table = 'dimensions';
    protected $fillable = [
        'id',
        'cubicweight', 
        'height',
        'length',
        'weight',
        'width',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

    

}
