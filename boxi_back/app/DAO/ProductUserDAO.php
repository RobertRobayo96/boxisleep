<?php

namespace App\Dao;
use App\Models\ProductUser;

class ProductUserDAO
{
    function all(){
        return ProductUser::with('user')->with('product')->get();
    }

    function get($id){
        return ProductUser::where('id', $id)->with('user')->with('product')->with('product.dimensionsMap')->first();
    }

    function getByUser($user){
        return ProductUser::where('user', $user)->with('user')->with('product')->with('product.dimensionsMap')->get();
    }

    function insert($data){
        return ProductUser::insert($data);
    }

    function update($id, $data){
        return ProductUser::update($data)->where('id', $id);
    }

    function delete($id){
        return ProductUser::update(['deleted' => 1])->where('id', $id);
    }
}