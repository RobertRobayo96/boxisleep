<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dao\AllianceDao;
use App\Models\PayLog;
use App\Dao\StudentDao;
use App\Services\EmailService;
use App\Dao\StudentTrainingDao;
class PayController extends Controller
{

    public function pay(Request $request){
            
        if($request['transactionState'] == 4){
            $email = $request['buyerEmail'];
            $dao = new StudentDao();
            $student = $dao->getByEmail($email);
            $reference = explode("#", $request['referenceCode'])[0];
            $dao = new StudentTrainingDao();
            $data = array(
                'student' => $student['id'],
                'training' => $reference
            );

            EmailService::SEND_ADVICE($data, $file);  

            $res = $dao -> insert($data);
            return response() -> json($res, 200);
        }else{
            return response() -> json([], 400);
        }
            
    }

}