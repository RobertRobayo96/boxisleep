<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DAO\ProductSkuDAO;
use App\Services\CaptchaService;
use Guzzle\Http\Client;

class ProductSkuController extends Controller
{

    public function all(){
    	$dao = new ProductSkuDAO();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new ProductSkuDAO();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function getByProduct($id){
    	$dao = new ProductSkuDAO();
        $res = $dao -> getByProduct($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function insert(Request $request){
        $data = array(
            'product' => $request['product'],
            'sku' => $request['sku'],
        );
        $dao = new ProductSkuDAO();
        $res = $dao -> insert($data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function update(Request $request){
        $id = $request['id'];
        $data = array(
            'product' => $request['product'],
            'sku' => $request['sku']
        );
        $dao = new ProductSkuDAO();
        $res = $dao -> update($id, $data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new ProductSkuDAO();
        $res = $dao -> delete($id);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}