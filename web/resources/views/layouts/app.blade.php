<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold text-blue-600">📦 Inventory System</a>
            <div class="flex gap-6">
                <a href="{{ route('items.index') }}"
                   class="text-gray-600 hover:text-blue-600 font-medium {{ request()->routeIs('items.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Items
                </a>
                <a href="{{ route('categories.index') }}"
                   class="text-gray-600 hover:text-blue-600 font-medium {{ request()->routeIs('categories.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Categories
                </a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>