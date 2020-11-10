<?php

namespace App\Dao;
use App\Models\Slider;

class SliderDao
{
    function all(){
        return Slider::where('deleted', 0)->get();
    }

    function get($id){
        return Slider::where('deleted', 0)->where('id', $id)->first();
    }

    function insert($data){
        return Slider::insert($data);
    }

    function update($id, $data){
        return Slider::where('id', $id)->update($data);
    }

    function delete($id){
        return Slider::where('id', $id)->update(['deleted' => 1]);
    }
}