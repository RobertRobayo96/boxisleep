<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\CategoryDao;
use App\Services\CaptchaService;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{

    public function all(){
    	$dao = new CategoryDao();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new CategoryDao();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function updatePassword(Request $request){
        $dao = new CategoryDao();
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
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make( $request['password'] ),
            'token' => $token
        );
        $dao = new CategoryDao();
        $res = $dao -> insert($data);
        $data['password'] = null;
        if($res == true)
            return response() -> json($data, 201);
        else
            return response() -> json($res, 400);
    }

    public function insertAdmin(Request $request){
        $token = md5(date("Y/m/d hh:mm:ss") . rand(1, 100000));
        $data = array(
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make( $request['password'] ),
            'token' => $token
        );
        $dao = new CategoryDao();
        $res = $dao -> insert($data);
        $data['password'] = null;
        if($res == true)
            return response() -> json($data, 201);
        else
            return response() -> json($res, 400);
    }

    public function update(Request $request){
        $id = $request['id'];
        $data = array(
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        );
        $dao = new CategoryDao();
        $res = $dao -> update($id, $data);
    
        if($res == 1)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new CategoryDao();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}