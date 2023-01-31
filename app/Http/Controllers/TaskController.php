<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller{
  
    public function index(){
        $tasks = Task::latest()->get();
        return view('welcome', compact('tasks'));
    }

    public function fetch(){

        $tasks = Task::all();
        return response()->json([
            'tasks' => $tasks,
        ]);

    }

    // public function create(){
    //     return view('admin.departments.create');
    // }

    public function store(Request $request){

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400, 
                'errors' => $validator->messages(),
            ]);
        }

        $task = new Task();

        $task->name = $request->input('name');

        $task->save();

        return response()->json([
            'status' => 200, 
            'message' => 'Task added successfully',
        ]);

    }

    public function edit($id){
        $task = Task::find($id);
        if($task){
            return response()->json([
                'status' => 200, 
                'task' => $task,
            ]);
        }
        else{
            return response()->json([
                'status' => 404, 
                'message' => 'Task not found',
            ]);
        }
    }

    public function update(Request $request, $id){

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400, 
                'errors' => $validator->messages(),
            ]);
        }

        $task = Task::find($id);

        if ($request->has('name')) {
            $task->name = $request->input('name');
        }
        
        $task->save();

        return response()->json([
            'status' => 200, 
            'message' => 'Task updated successfully',
        ]);
    }

    public function destroy($id){

        $task = Task::find($id);
        
        $task->delete();

        return response()->json([
            'status' => 200, 
            'message' => 'Task deleted successfully',
        ]);
    }

}