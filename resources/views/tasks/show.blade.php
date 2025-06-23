@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">{{ $task->title }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('tasks.edit', $task) }}" class="bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">
                <i class="fas fa-edit mr-1"></i> Edit
            </a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" id="delete-form-{{ $task->id }}">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete({{ $task->id }})" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                    <i class="fas fa-trash mr-1"></i> Delete
                </button>
            </form>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Description</h3>
                <p class="mt-1">{{ $task->description ?: 'No description' }}</p>
            </div>
            
            <div>
                <h3 class="text-sm font-medium text-gray-500">Assigned To</h3>
                <p class="mt-1">{{ $task->user->name }}</p>
            </div>
            
            <div>
                <h3 class="text-sm font-medium text-gray-500">Deadline</h3>
                <p class="mt-1 {{ $task->deadline->isPast() ? 'text-red-500' : '' }}">
                    {{ $task->deadline->format('M d, Y H:i') }}
                </p>
            </div>
            
            <div>
                <h3 class="text-sm font-medium text-gray-500">Category</h3>
                <p class="mt-1 capitalize">{{ $task->category }}</p>
            </div>
            
            <div>
                <h3 class="text-sm font-medium text-gray-500">Priority</h3>
                <span class="mt-1 px-2 py-1 text-xs rounded-full text-white" data-priority="{{ $task->priority }}">
                    {{ ucfirst($task->priority) }}
                </span>
            </div>
            
            <div>
                <h3 class="text-sm font-medium text-gray-500">Status</h3>
                <span class="mt-1 px-2 py-1 text-xs rounded-full text-white" data-status="{{ $task->status }}">
                    {{ ucfirst($task->status) }}
                </span>
            </div>
        </div>
        
        <div class="mb-6">
            <h3 class="text-sm font-medium text-gray-500 mb-2">Progress</h3>
            <div class="flex items-center">
                <div class="w-full bg-gray-200 rounded-full h-2.5 mr-3">
                    <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $task->progress }}%"></div>
                </div>
                <span class="text-sm">{{ $task->progress }}%</span>
            </div>
        </div>
        
        <div class="flex justify-end">
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                <i class="fas fa-arrow-left mr-1"></i> Back to Tasks
            </a>
        </div>
    </div>
</div>
@endsection