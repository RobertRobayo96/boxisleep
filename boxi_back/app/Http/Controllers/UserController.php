<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\UserDAO;
use App\Services\CryptService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function all(){
    	$dao = new UserDAO();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new UserDAO();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function login(Request $request){
        $dao = new UserDAO();
        $username = $request['username'];
        $user = $dao -> getByUsername($username);
        $hashedPassword = $user -> password;

        if (Hash::check($request['password'], $hashedPassword)) {

            // Update Token

            return response() -> json($user, 200);
        }else{
            return response() -> json([], 400);
        }
    }
   
    public function insert(Request $request){
        $data = array(
            'lastName'=> $request['lastName'],
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => Hash::make( $request['password']),
            'rol' => $request['rol']
        );
        $dao = new UserDAO();
        $res = $dao -> insert($data);
        if($res == true)
            return response() -> json($res, 200);
        else
            return response() -> json($res, 400);
    }

    public function update(Request $request){
        $id = $request['id'];
        $data = array(
            'lastName'=> $request['lastName'],
            'name' => $request['name'],
            'username' => $request['username'],
            'rol' => $request['rol']
        );
        $dao = new UserDAO();
        $res = $dao -> update($data, $id);
        if($res == true)
            return response() -> json($res, 200);
        else
            return response() -> json($res, 400);
    }

    public function updatePassword(Request $request){
        $id = $request['id'];
        $data = array(
            'password' => Hash::make( $request['password'])
        );
        $dao = new UserDAO();
        $res = $dao -> update($data, $id);
        if($res == true)
            return response() -> json($res, 200);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new UserDAO();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 200);
        }else{
            return response() -> json($res, 400);
        }
    }


}