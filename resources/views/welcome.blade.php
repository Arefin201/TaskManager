@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block">Task Management</span>
            <span class="block text-indigo-600">Made Simple</span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Organize your tasks, track progress, and meet deadlines with our intuitive task management system.
        </p>
    </div>
    
    <div class="mt-10 flex justify-center">
        <div class="rounded-md shadow">
            {{-- <a href="{{ route(name: 'login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                Get Started
            </a> --}}
            <a href="" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                Get Started
            </a>
        </div>
        <div class="ml-3 rounded-md shadow">
            <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                Learn More
            </a>
        </div>
    </div>
    
    <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <div class="pt-6">
            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                <div class="-mt-6">
                    <div>
                        <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                            <i class="fas fa-tasks text-white text-2xl"></i>
                        </span>
                    </div>
                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Task Organization</h3>
                    <p class="mt-5 text-base text-gray-500">
                        Categorize tasks by work, personal, education, or health to keep everything organized.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="pt-6">
            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                <div class="-mt-6">
                    <div>
                        <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </span>
                    </div>
                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Progress Tracking</h3>
                    <p class="mt-5 text-base text-gray-500">
                        Visualize your progress with percentage tracking to see how close you are to completion.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="pt-6">
            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                <div class="-mt-6">
                    <div>
                        <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                            <i class="fas fa-bell text-white text-2xl"></i>
                        </span>
                    </div>
                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Deadline Management</h3>
                    <p class="mt-5 text-base text-gray-500">
                        Set deadlines and get visual indicators when tasks are approaching or past due.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection