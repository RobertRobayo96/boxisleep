<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'id',
        'lastName', 
        'name',
        'username',
        'password',
        'rol',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol');
    }


}
