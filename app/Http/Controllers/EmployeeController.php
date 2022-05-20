<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\createRequestEmployee;
use App\Http\Requests\updateRequestEmployee;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $data = array();
        foreach($employees as $row){
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
    public function saveUpdate(createRequestEmployee $createRequest, updateRequestEmployee $updateRequest)
    {
        if(isset($updateRequest->id)){

            $employees = $this->update($updateRequest);            
            $response = ['code' => 200, 'data' => $employees, 'msg' => 'update success', 'status' => true];

        }else{

            $employees = $this->create($createRequest);
            $response = ['code' => 200, 'data' => $employees, 'msg' => 'save success', 'status' => true];

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
        $employees = new Employee;

        $employees->username        = $request->username;
        $employees->password        = Hash::make($request->password);
        $employees->first_name      = $request->first_name;
        $employees->last_name       = $request->last_name;
        $employees->date_of_birth   = $request->date_of_birth;
        $employees->gender          = $request->gender;
        $employees->marital_status  = $request->marital_status;
        $employees->nationality     = $request->nationality;
        $employees->identity_number = $request->identity_number;
        $employees->photo           = $request->photo;
        $employees->address         = $request->address;
        $employees->city            = $request->city;
        $employees->mobile          = $request->mobile;
        $employees->email           = $request->email;
        $employees->positions_id    = $request->positions_id;
        $employees->joining_date    = $request->joining_date;
        $employees->status          = $request->status;
        $employees->bank_account    = $request->bank_account;
        $employees->bank_name       = $request->bank_name;
        $employees->type_employe    = $request->type_employe;
        $employees->type_payrol     = $request->type_payrol;
        $employees->notes           = $request->notes;
        $employees->nik             = $request->nik;
        $employees->npwp            = $request->npwp;
        $employees->bpjs            = $request->bpjs;
        
        try{
            $employees->save();
            return $employees;
        }catch (Exception $e) {
            $response = ['code' => 500, 'data' => null, 'msg' => 'error', 'status' => true];
            return $response;
        }     

    }

    public function update($request)
    {
        $employees = Employee::find($request->id);

        $employees->username        = $request->username;
        $employees->password        = Hash::make($request->password);
        $employees->first_name      = $request->first_name;
        $employees->last_name       = $request->last_name;
        $employees->date_of_birth   = $request->date_of_birth;
        $employees->gender          = $request->gender;
        $employees->marital_status  = $request->marital_status;
        $employees->nationality     = $request->nationality;
        $employees->identity_number = $request->identity_number;
        $employees->photo           = $request->photo;
        $employees->address         = $request->address;
        $employees->city            = $request->city;
        $employees->mobile          = $request->mobile;
        $employees->email           = $request->email;
        $employees->positions_id    = $request->positions_id;
        $employees->joining_date    = $request->joining_date;
        $employees->status          = $request->status;
        $employees->bank_account    = $request->bank_account;
        $employees->bank_name       = $request->bank_name;
        $employees->type_employe    = $request->type_employe;
        $employees->type_payrol     = $request->type_payrol;
        $employees->notes           = $request->notes;
        $employees->nik             = $request->nik;
        $employees->npwp            = $request->npwp;
        $employees->bpjs            = $request->bpjs;        

        try{
            $employees->save();
            return $employees;
        }catch (Exception $e) {
            $response = ['code' => 500, 'data' => null, 'msg' => 'error', 'status' => true];
            return $response;
        }

    }
}
