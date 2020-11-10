<?php

namespace App\Dao;
use App\Models\ProductSku;

class ProductSkuDAO
{
    function all(){
        return ProductSku::with('sku')->with('sku.dimensions')->with('product')->get();
    }

    function get($id){
        return ProductSku::where('id', $id)->with('sku')->with('sku.dimensions')->with('product')->first();
    }

    function getByProduct($product){
        return ProductSku::where('product', $product)->with('sku')->with('sku.dimensions')->with('product')->with('product.dimensionsMap')->first();
    }

    function insert($data){
        return ProductSku::insert($data);
    }

    function update($id, $data){
        return ProductSku::update($data)->where('id', $id);
    }

    function delete($id){
        return ProductSku::update(['deleted' => 1])->where('id', $id);
    }
}