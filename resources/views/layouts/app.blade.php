<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('tasks.index') }}" class="text-xl font-bold flex items-center">
                <i class="fas fa-tasks mr-2"></i> Task Manager
            </a>
            <div class="flex items-center space-x-4">
                {{-- <span class="hidden sm:inline">{{ auth()->user()->name }}</span> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-indigo-700 hover:bg-indigo-800 px-3 py-1 rounded-md">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden sm:inline ml-1">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
            {{ session('success') }}
            <button class="ml-4" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Scripts -->
    <script>
        // Delete confirmation
        function confirmDelete(taskId) {
            if (confirm('Are you sure you want to delete this task?')) {
                document.getElementById('delete-form-' + taskId).submit();
            }
        }
        
        // Status badge colors
        const statusColors = {
            pending: 'bg-yellow-500',
            completed: 'bg-green-500'
        };
        
        // Priority badge colors
        const priorityColors = {
            low: 'bg-blue-500',
            medium: 'bg-indigo-500',
            high: 'bg-red-500'
        };
        
        // Apply colors on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-status]').forEach(el => {
                el.classList.add(statusColors[el.dataset.status]);
            });
            
            document.querySelectorAll('[data-priority]').forEach(el => {
                el.classList.add(priorityColors[el.dataset.priority]);
            });
        });
    </script>
</body>
</html>