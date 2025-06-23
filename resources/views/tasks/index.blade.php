@extends('layouts.app')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Your Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
        <i class="fas fa-plus mr-1"></i> New Task
    </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deadline</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($tasks as $task)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('tasks.show', $task) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                        {{ $task->title }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $task->category }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full text-white" data-priority="{{ $task->priority }}">
                        {{ ucfirst($task->priority) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full text-white" data-status="{{ $task->status }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap {{ $task->deadline->isPast() ? 'text-red-500' : '' }}">
                    {{ $task->deadline->format('M d, Y H:i') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $task->progress }}%"></div>
                    </div>
                    <span class="text-xs text-gray-500">{{ $task->progress }}%</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" id="delete-form-{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $task->id }})" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                    No tasks found. Create your first task!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($tasks->hasPages())
<div class="mt-4">
    {{ $tasks->links() }}
</div>
@endif
@endsection