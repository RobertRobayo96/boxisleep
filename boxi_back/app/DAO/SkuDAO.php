<?php

namespace App\Dao;
use App\Models\Sku;

class SkuDAO
{
    function all(){
        return Sku::where('deleted', 0)->with('dimensions')->get();
    }

    function get($id){
        return Sku::where('id', $id)->where('deleted', 0)->with('dimensions')->first();
    }

    function insert($data){
        return Sku::insert($data);
    }

    function update($id, $data){
        return Sku::where('id', $id)->update($data);
    }

    function delete($id){
       return Sku::where('id', $id)->update(['deleted' => 1]);
    }
}