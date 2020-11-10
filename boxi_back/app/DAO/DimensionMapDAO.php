<?php

namespace App\Dao;
use App\Models\DimensionMap;

class DimensionMapDAO
{
    function all(){
        return Dimesion::all();
    }

    function get($id){
        return Dimesion::where('id', $id)->first();
    }

    function insert($data){
        return Dimesion::insert($data);
    }

    function update($id, $data){
        return Dimesion::update($data)->where('id', $id);
    }

    function delete($id){
        return Dimesion::update(['deleted' => 1])->where('id', $id);
    }
}