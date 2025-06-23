<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Get all tasks
    public function index()
    {
        $tasks = Task::with('user')->paginate(10);
        return response()->json([
            'status' => true,
            'message' => 'Tasks retrieved successfully',
            'data' => $tasks,
        ], 200);
    }

    // public function userTasks()
    // {
    //     $tasks = Task::where('user_id', auth()->id())->paginate(10);
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'User tasks retrieved successfully',
    //         'data' => $tasks,
    //     ], 200);
    // }

    // Show task creation form
    public function create()
    {
        return view('tasks.create');
    }

    // Create new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'category' => 'required|in:work,personal,education,health',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,completed',
            'progress' => 'required|integer|between:0,100'
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

    // Get single task
    public function show(Task $task)
    {
        return response()->json([
            'status' => true,
            'message' => 'Task retrieved successfully',
            'data' => $task->load('user'),
        ], 200);
    }

    // Show task edit form
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }


    // Update task
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'sometimes|date',
            'category' => 'sometimes|in:work,personal,education,health',
            'priority' => 'sometimes|in:low,medium,high',
            'status' => 'sometimes|in:pending,completed',
            'progress' => 'sometimes|integer|between:0,100'
        ]);

        $task->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Task updated successfully',
            'data' => $task,
        ], 200);
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'status' => true,
            'message' => 'Task deleted successfully',
        ], 200);
    }



}