<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\ProductDAO;
use App\Services\CaptchaService;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{

    public function all(){
    	$dao = new ProductDAO();
        $res = $dao -> all();
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function get($id){
    	$dao = new ProductDAO();
        $res = $dao -> get($id);
        if (!empty($res)) {
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 204);
        }
    }

    public function insert(Request $request){
        $main_picture = "main_picture";
        $picture_one = "picture_one";
        /* $picture_two = "picture_two";
        $picture_three = "picture_three";
 */
        if ($request->hasFile($main_picture,$picture_one))
        {
            if($request->file($main_picture)->isValid())
            {
                $file= $request ->file($main_picture);
                $file1= $request ->file($picture_one);
                /* $file2= $request ->file($picture_two);
                $file3= $request ->file($picture_three); */
                
                $extension = $file -> getClientOriginalExtension();
                $extension1 = $file -> getClientOriginalExtension();
                /* $extension2 = $file -> getClientOriginalExtension();
                $extension3 = $file -> getClientOriginalExtension(); */

                    if(
                        //Pictures Format 
                        $extension == "jpg"  ||
                        $extension == "jpeg" ||
                        $extension == "svg"  ||
                        $extension == "png"  ||

                        $extension1 == "jpg"  ||
                        $extension1 == "jpeg" ||
                        $extension1 == "svg"  ||
                        $extension1 == "png"  

                       /*  $extension2 == "jpg"  ||
                        $extension2 == "jpeg" ||
                        $extension2 == "svg"  ||
                        $extension2 == "png"  ||

                        $extension3 == "jpg"  ||
                        $extension3 == "jpeg" ||
                        $extension3 == "svg"  ||
                        $extension3 == "png"  */
                    )
                    {
                    $productName = $request['name'];  
                    $pictureMain = $productName . "." . $extension;
                    $picture1 = $productName . "_1." . $extension1;

                    $data = array(
                        'main_picture' => $pictureMain,
                        'picture_one' =>$picture1
                    );

                    $destinationPath = "./uploads/img/products/".$productName."/";

                    $request->file($image)->move($destinationPath, $pictureMain);
                    $request->file($image)->move($destinationPath, $picture1);

                    $dao = new ProductDAO();
                    $res = $dao -> update($id, $data);
                        if($res == true){
            
                            return response() -> json($res, 201);  
                        }else{
                            unlink($destinationPath . $pictureMain) or die("el archivo se elimina porque no se cargo"); 
                            return response() -> json($res, 400);
                        }
                    }else{
                        return response() -> json(["message " => "Extension invalida"], 400);
                    }  
            }else{
                return response() -> json(["message" => "No se cargaron archivos"], 400);
            }
        }
        $data = array(
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $request['category'],
            'linkId' => $request['linkId'],
            'metaTagDescription' => $request['metaTagDescription'],
            'refId' => $request['refId'],
            'title' => $request['title'],
            'dimensionsMap' => $request['dimensionsMap'],
            'main_picture'=> $request['dimensionsMap'],
            'picture_one'=> $request['dimensionsMap'],
            'picture_two'=> $request['dimensionsMap'],
            'picture_three'=> $request['dimensionsMap'],
        );
        $dao = new ProductDAO();
        $res = $dao -> insert($data);
        if($res == true)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function update(Request $request){
        $id = $request['id'];
        $data = array(
            'name' => $request['name'],
            'description' => $request['description'],
            'category' => $request['category'],
            'linkId' => $request['linkId'],
            'metaTagDescription' => $request['metaTagDescription'],
            'title' => $request['title'],
            'dimensionsMap' => $request['dimensionsMap']
        );
        $dao = new ProductDAO();
        $res = $dao -> update($data, $id);
        if($res == 1)
            return response() -> json($res, 201);
        else
            return response() -> json($res, 400);
    }

    public function delete($id){
        $dao = new ProductDAO();
        $res = $dao -> delete($id);
        if ($res === 1) {
            return response() -> json($res, 201);
        }else{
            return response() -> json($res, 400);
        }
    }


}