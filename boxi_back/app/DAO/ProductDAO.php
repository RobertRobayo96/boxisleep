<?php

namespace App\Dao;
use App\Models\Product;

class ProductDAO
{
    function all(){
        return Product::all();
    }

    function get($id){
        return Product::where('id', $id)->with('category')->first();
    }

    function insert($data){
        return Product::insert($data);
    }

    function update($id, $data){
        return Product::update($data)->where('id', $id);
    }

    function delete($id){
        return Product::update(['deleted' => 1])->where('id', $id);
    }
}