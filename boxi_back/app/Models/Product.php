<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name', 
        'description',
        'category',
        'linkId',
        'metaTagDescription',
        'refId',
        'title',
        'main_picture',
        'picture_one',
        'picture_two',
        'picture_three',
        'dimensionsMap',
        'deleted'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function category(){
        return $this->belongsTo(Category::class, 'category');
    }

    public function dimensionsMap(){
        return $this->belongsTo(DimensionMap::class, 'dimensionsMap');
    }
}
