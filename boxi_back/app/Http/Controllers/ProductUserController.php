<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DAO\ProductUserDAO;
use App\Services\EmailService;
use App\Services\CaptchaService;
use Guzzle\Http\Client;

class ProductUserController extends Controller
{

    public function all(){
    	$dao = new ProductUserDAO();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new ProductUserDAO();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function getByUser($id){
    	$dao = new ProductUserDAO();
        $res = $dao -> getByUser($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function insert(Request $request){
        $data = array(
            'product' => $request['product'],
            'user' => $request['user'],
        );
        $dao = new ProductUserDAO();
        $res = $dao -> insert($data);

        
        if($res == true){
        EmailService::SEND_ADVICE(); 
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }

    public function update(Request $request){
        $id = $request['id'];
        $data = array(
            'product' => $request['product'],
            'user' => $request['user']
        );
        $dao = new ProductUserDAO();
        $res = $dao -> update($id, $data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new ProductUserDAO();
        $res = $dao -> delete($id);
        if ($res === true) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}