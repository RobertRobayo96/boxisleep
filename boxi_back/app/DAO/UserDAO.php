<?php

namespace App\Dao;
use App\Models\User;

class UserDAO
{
    function all(){
        return User::where('deleted', 0)->with('rol')->get();
    }

    function get($id){
        return User::where('id', $id)->with('rol')->first();
    }

    function getByUsername($username){
        return User::where('deleted', 0)->with('rol')->where('username', $username)->first();
    }

    function insert($data){
        return User::insert($data);
    }

    function update($id, $data){
        return User::where('id', $id)->update($data);
    }

    function delete($id){
        return User::where('id', $id)->update(['deleted' => 1]);
    }
}