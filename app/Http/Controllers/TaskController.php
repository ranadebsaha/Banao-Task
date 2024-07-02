<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class TaskController extends Controller
{
    public function add(Request $request){
        $validator= Validator::make($request->all(),[
            'user_id'=>'required',
            'task' => "required|max:255",
        ]);
        if($validator->fails()){

            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ],400);
        }
        $data=User::find($request->user_id);
        if($data){
            $task=Task::create([
                'user_id' => $request->user_id,
                'task' => $request->task
            ]);
            return response()->json([
                'data' => $task,
                'status' => '1',
                'message' => 'Successfully created a task'
            ],200);
        }else{
            return response()->json([
                'status' => '0',
                'message' => 'User is not Registered'
            ],300);
        }
        
    }
    public function status(Request $request){
        $validator= Validator::make($request->all(),[
            'task_id'=>'required',
            'status' => "required",
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ],400);
        }
        if($request->status=="done"){
            $message="Marked task as Done";
        }elseif($request->status=="pending"){
            $message="Marked Task as Pending";
        }else{
            return response()->json([
                'status' => '0',
                'message' => "Status fill with only done or pending"
            ],200);
        }
        $data=Task::find($request->task_id);
        if($data){
            $data->update([
                'status' => $request->status
            ]);
            return response()->json([
                'data' => $data,
                'status' => '1',
                'message' => $message
            ],200);
        }else{
            return response()->json([
                'status' => '0',
                'message' => 'Task id not Registered'
            ],300);
        }
    }
}
