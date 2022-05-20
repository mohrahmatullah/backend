<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Reimbursment;
use App\Models\ReimbursementType;

class AjaxController extends Controller
{
    public function selectItemId(Request $request){
        if($request->params == 'employee_list'){
            $data = Employee::where('id',$request->id)->delete();
            if($data){
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 
                return response()->json($response);           
            }
        }elseif($request->params == 'reimburse_list'){
            $data = Reimbursment::where('id',$request->id)->delete();
            if($data){
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 
                return response()->json($response);           
            }
        }elseif($request->params == 'reimburse_type_list'){
            $data = ReimbursementType::where('id',$request->id)->delete();
            if($data){
                $response = ['code' => 200, 'data' => null, 'msg' => 'delete success', 'status' => true]; 
                return response()->json($response);           
            }
        }
    }
}
