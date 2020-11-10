<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\SkuDAO;
class SkuController extends Controller
{

    public function all(){
    	$DAO = new SkuDAO();
        $res = $DAO -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$DAO = new SkuDAO();
        $res = $DAO -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function insert(Request $request){
        $data = array(
            'name' => $request['name'],
            'listPrice' => $request['listPrice'],
            'basePrice' => $request['basePrice'],
            'specifications' => $request['specifications'],
            'dimensions' => $request['dimensions'],
            'listPriceFormatted' => $request['listPriceFormatted'],
            'basePriceFormatted' => $request['basePriceFormatted'],

        );
        $DAO = new SkuDAO();
        $res = $DAO -> insert($data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function update(Request $request){
        $id = $request['id'];
        $data = array(
            'name' => $request['name'],
            'listPrice' => $request['listPrice'],
            'basePrice' => $request['basePrice'],
            'specifications' => $request['specifications'],
            'dimensions' => $request['dimensions'],
            'listPriceFormatted' => $request['listPriceFormatted'],
            'basePriceFormatted' => $request['basePriceFormatted'],
        );
        $DAO = new SkuDAO();
        $res = $DAO -> update($data, $id);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $DAO = new SkuDAO();
        $res = $DAO -> delete($id);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}