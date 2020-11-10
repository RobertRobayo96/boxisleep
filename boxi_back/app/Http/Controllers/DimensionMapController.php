<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\DimensionMapDao;
use App\Services\CaptchaService;
use Illuminate\Support\Facades\Hash;

class DimensionMapController extends Controller
{

    public function all(){
    	$dao = new DimensionMapDao();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new DimensionMapDao();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function insert(Request $request){
        $data = array(
            'name' => $request['name'],
            'description' => $request['description'],
            
        );
        $dao = new DimensionMapDao();
        $res = $dao -> insert($data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function update(Request $request){
        $id = $request['id'];
        $data = array(
            'student' => $request['student'],
            'training' => $request['training']
        );
        $dao = new DimensionMapDao();
        $res = $dao -> update($data, $id);
        if($res == 1)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new DimensionMapDao();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}