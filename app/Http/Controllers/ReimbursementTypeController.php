<?php

namespace App\Http\Controllers;

use App\Models\ReimbursementType;
use Illuminate\Http\Request;
use App\Http\Requests\createRequestReimbursmentType;
use App\Http\Requests\updateRequestReimbursmentType;

class ReimbursementTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reimbursment = ReimbursementType::all();
        $data = array();
        foreach($reimbursment as $row){
            $data[] = $row;
        }
        $response = ['code' => 200, 'data' => $data, 'msg' => null, 'status' => true];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUpdate(createRequestReimbursmentType $createRequest, updateRequestReimbursmentType $updateRequest)
    {
        if(isset($updateRequest->id)){

            $data = $this->update($updateRequest);            
            $response = ['code' => 200, 'data' => $data, 'msg' => 'update success', 'status' => true];

        }else{

            $data = $this->create($createRequest);
            $response = ['code' => 200, 'data' => $data, 'msg' => 'save success', 'status' => true];

        }

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $reimbursment = new ReimbursementType;

        $reimbursment->reimb_type  = $request->reimb_type;
        
        try{
            $reimbursment->save();
            return $reimbursment;
        }catch (Exception $e) {
            $response = ['code' => 500, 'data' => null, 'msg' => 'error', 'status' => true];
            return $response;
        }     

    }

    public function update($request)
    {
        $reimbursment = ReimbursementType::find($request->id);


        $reimbursment->reimb_type  = $request->reimb_type;

        try{
            $reimbursment->save();
            return $reimbursment;
        }catch (Exception $e) {
            $response = ['code' => 500, 'data' => null, 'msg' => 'error', 'status' => true];
            return $response;
        }

    }
}
