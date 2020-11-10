<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    protected $fillable = [
        'id',
        'name', 
        'description',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

   
}
