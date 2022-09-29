<?php

namespace App\Http\Controllers;

use App\Models\Reimbursment;
use Illuminate\Http\Request;
use App\Http\Requests\createRequestReimbursment;
use App\Http\Requests\updateRequestReimbursment;
use Illuminate\Support\Facades\Storage;

class ReimbursmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reimbursment = Reimbursment::all();
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
    public function saveUpdate(createRequestReimbursment $createRequest, updateRequestReimbursment $updateRequest)
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
        $reimbursment = new Reimbursment;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = Storage::disk('public')->put('reimbursments', $file);
            $reimbursment->photo = $path;
        }

        $reimbursment->reimb_amount       = $request->reimb_amount;
        $reimbursment->reimb_submitted    = $request->reimb_submitted;
        $reimbursment->id_employment      = auth()->user()->id;
        $reimbursment->description        = $request->description;
        $reimbursment->is_approved        = $request->is_approved;
        $reimbursment->approved_by        = $request->approved_by;        
        $reimbursment->reimb_type_id      = $request->reimb_type_id;       
        $reimbursment->date_use           = $request->date_use;
        
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
        $reimbursment = Reimbursment::find($request->id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = Storage::disk('public')->put('reimbursments', $file);
            $reimbursment->photo = $path;
        }

        $reimbursment->reimb_amount       = $request->reimb_amount;
        $reimbursment->reimb_submitted    = $request->reimb_submitted;
        $reimbursment->id_employment      = auth()->user()->id;
        $reimbursment->description        = $request->description;
        $reimbursment->is_approved        = $request->is_approved;
        $reimbursment->approved_by        = $request->approved_by;        
        $reimbursment->reimb_type_id      = $request->reimb_type_id;       
        $reimbursment->date_use           = $request->date_use;

        try{
            $reimbursment->save();
            return $reimbursment;
        }catch (Exception $e) {
            $response = ['code' => 500, 'data' => null, 'msg' => 'error', 'status' => true];
            return $response;
        }

    }
}
