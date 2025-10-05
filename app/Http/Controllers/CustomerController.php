<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    //index for read
    public function index(){
        $data = Customer::all();
        //select * from customer
        return response()->json([
            'status'=>'view All data',
            'data'=>$data,
        ],200);
    }

    //store for add
public function store(Request $request){
    try{
        $request->validate([
        'cus_name'  => ['required', 'string'],
        'cus_email' => ['required', 'email'],
        'cus_psw'   => ['required'],
        ]);
            $insert = Customer::create($request->all());

        return response()->json([
            'status'=> 'add successfully',
            'data'  => $insert
        ], 201);

    }catch(\Exception $e){
        return response()->json([
            'status'=>['add not success'],
            'message'=>$e->getMessage(),
        ]);

    }


}

// make function destroy to remove

public function destroy($id){
    try{
        $cus = Customer::destroy($id);
        return response()->json([
            'status'=>'Remove successfully',
            'data'=>$cus
        ]);

    }catch(\Exception $e){
        return response()->json([
            'message'=>$e->getMessage(),
        ]);
    }
}


// update
public function update(Request $request,$id){
    try{
        $request->validate([
            'cus_name'=>['required'],
            'cus_email'=>['required'],
            'cus_psw'=>['required']
        ]);
        $cus = Customer::findOrFail($id);
        $cus->update($request->all());
        return response()->json([
            'status'=>'successfully',


            'data'=>$cus,
        ]);
    }catch(\Exception $e){
        return response()->json([
            'message'=>$e->getMessage(),
        ]);
    }
}










}
