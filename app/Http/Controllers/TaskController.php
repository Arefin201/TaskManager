<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Get all tasks
    public function index()
    {
        $tasks = Task::all();
         return response()->json([
            'status'=> true,
            'message'=> 'Tasks data',
            'data'=> $tasks,
        ], 200);
    }

    // Create new task
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required',
            'deadline' => 'required|date',
            'priority' => 'required',
        ]);

        $task = Task::create(array_merge(
            $validated,
            ['user_id' => auth()->id()]
        ));

        return response()->json([
            'status' => true,
            'message' => 'Task created successfully',
            'data' => $task,
        ], 201);
    }

    public function taskDelete(Request $request){
        $id = $request->id;
        Task::destroy($id);
        return response()->json(['message'=>'Delete success', 'data' => '']);
    }

    public function getSingleTask(Request $request){
        $taskId = $request->id;

        $task = Task::find($taskId);

        return response()->json([
            'status' => true,
            'message' => "Single Task",
            'data' => $task
        ], 200);

    }

    public function updateTask(Request $request){
         $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'priority' => 'required',
            'deadline' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'validation error',
                'errors'=> $validation->errors()
            ], 400);
        }

        $task = Task::findOrFail($request->id);

        $task->update($request->all());

        return response()->json(['message' => 'update success', 'data' => $task]);

    }

    public function updateStatus(Request $request){
        $id = $request->id;
        $task = Task::findOrFail($id);
        $task->update(['status' => 'in-progress']);
        return response()->json(['message' => 'Status Updated', 'data'=>$task]);
    }

    public function undoTaskFromInProgress(Request $request){
        $id = $request->id;
        $task = Task::findOrFail($id);
        $task->update(['status' => 'start']);
        return response()->json(['message' => 'Status Updated', 'data'=>$task]);
    }
    public function undoTaskFormInDone(Request $request){
        $id = $request->id;
        $task = Task::findOrFail($id);
        $task->update(['status' => 'in-progress']);
        return response()->json(['message' => 'Status Updated', 'data'=>$task]);
    }

    public function taskDone(Request $request){
        $id = $request->id;
        $task = Task::findOrFail($id);
        $task->update(['status' => 'done']);
        return response()->json(['message' => 'Status Updated', 'data'=>$task]);
    }

}