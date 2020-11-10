<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'id',
        'title', 
        'description',
        'image',
        'link',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
