<?php

namespace App\Dao;
use App\Models\Category;

class CategoryDAO
{
    function all(){
        return Category::where('deleted', 0)->get();
    }

    function get($id){
        return Category::where('deleted', 0)->where('id', $id)->first();
    }

    function getByEmail($email){
        return Category::where('deleted', 0)->where('email', $email)->first();
    }

    function insert($data){
        return Category::insert($data);
    }

    function update($id, $data){
        return Category::where('id', $id)->update($data);
    }

    function delete($id){
        return Category::where('id', $id)->update(['deleted' => 1]);
    }
}