@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Task</h1>
    
    <form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            
            <!-- Description -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $task->description }}</textarea>
            </div>
            
            <!-- Deadline -->
            <div>
                <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline *</label>
                <input type="datetime-local" name="deadline" id="deadline" value="{{ $task->deadline->format('Y-m-d\TH:i') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            
            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category *</label>
                <select name="category" id="category" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="work" {{ $task->category == 'work' ? 'selected' : '' }}>Work</option>
                    <option value="personal" {{ $task->category == 'personal' ? 'selected' : '' }}>Personal</option>
                    <option value="education" {{ $task->category == 'education' ? 'selected' : '' }}>Education</option>
                    <option value="health" {{ $task->category == 'health' ? 'selected' : '' }}>Health</option>
                </select>
            </div>
            
            <!-- Priority -->
            <div>
                <label for="priority" class="block text-sm font-medium text-gray-700">Priority *</label>
                <select name="priority" id="priority" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>
            
            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            
            <!-- Progress -->
            <div>
                <label for="progress" class="block text-sm font-medium text-gray-700">Progress *</label>
                <input type="range" name="progress" id="progress" min="0" max="100" value="{{ $task->progress }}" required
                    class="mt-1 block w-full"
                    oninput="document.getElementById('progress-value').textContent = this.value + '%'">
                <span id="progress-value" class="text-sm text-gray-500">{{ $task->progress }}%</span>
            </div>
        </div>
        
        <div class="mt-6 flex justify-end">
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 mr-2">
                Cancel
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Update Task
            </button>
        </div>
    </form>
</div>
@endsection