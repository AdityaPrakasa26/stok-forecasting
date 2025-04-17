<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Aplikasi Stok Forecasting' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Tambahkan link FontAwesome -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('-ml-64');
            mainContent.classList.toggle('ml-64');
        }
    </script>
    <style>
        /* Border lebih transparan ketika menu diklik */
        .bg-red-300 {
            border: 2px solid rgba(255, 0, 0, 0.5); /* transparansi pada border */
        }

        .bg-gray-200:hover {
            border: 2px solid rgba(255, 0, 0, 0.3); /* transparansi pada border saat hover */
        }
    </style>
</head>
<body class="h-screen bg-gray-100 flex overflow-hidden">
    <!-- Sidebar -->
    <div id="sidebar" class="w-64 bg-red-600 text-white shadow-md transition-all duration-300 z-10 flex flex-col">
        <div class="p-4 text-white font-bold text-xl border-b flex items-center">
            <!-- Logo Image -->
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-8 w-8 mr-2"> <!-- Menambahkan logo -->
            Admin Panel
        </div>
        <nav class="p-4 space-y-2 flex-1">
            <a href="/" class="block px-4 py-2 rounded hover:bg-red-100 {{ request()->is('/') ? 'bg-red-200' : '' }}">Dashboard</a>

            <!-- Data Menu -->
            <div>
                <button type="button" class="w-full text-left px-4 py-2 rounded hover:bg-red-100 flex justify-between items-center" onclick="document.getElementById('data-submenu').classList.toggle('hidden')">
                    Data
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div id="data-submenu" class="ml-4 mt-1 space-y-1 {{ request()->is('data/*') ? '' : 'hidden' }}">

                    <!-- Stok Menu with dynamic circle color -->
                    <a href="/data/stok" class="block px-2 py-1 rounded-full text-sm {{ request()->is('data/stok') ? 'bg-red-300 border-2 border-red-600' : 'bg-gray-200' }}">
                        <i class="fas fa-circle {{ request()->is('data/stok') ? 'text-green-600' : 'text-red-600' }} mr-2"></i> Stok
                    </a>

                    <!-- Penjualan Menu with dynamic circle color -->
                    <a href="/data/penjualan" class="block px-2 py-1 rounded-full text-sm {{ request()->is('data/penjualan') ? 'bg-red-300 border-2 border-red-600' : 'bg-gray-200' }}">
                        <i class="fas fa-circle {{ request()->is('data/penjualan') ? 'text-green-600' : 'text-red-600' }} mr-2"></i> Penjualan
                    </a>
                </div>
            </div>

            <!-- Perhitungan Menu -->
            <a href="/perhitungan" class="block px-4 py-2 rounded hover:bg-red-100 {{ request()->is('perhitungan') ? 'bg-red-200' : '' }}">Perhitungan</a>

            <!-- Laporan Menu -->
            <div>
                <button type="button" class="w-full text-left px-4 py-2 rounded hover:bg-red-100 flex justify-between items-center" onclick="document.getElementById('laporan-submenu').classList.toggle('hidden')">
                    Laporan
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div id="laporan-submenu" class="ml-4 mt-1 space-y-1 {{ request()->is('laporan/*') ? '' : 'hidden' }}">
                    <a href="/laporan/stok" class="block px-2 py-1 rounded-full text-sm {{ request()->is('laporan/stok') ? 'bg-red-300' : 'bg-gray-200' }}">
                        <i class="fas fa-circle text-red-600 mr-2"></i> Stok
                    </a>
                    <a href="/laporan/penjualan" class="block px-2 py-1 rounded-full text-sm {{ request()->is('laporan/penjualan') ? 'bg-red-300' : 'bg-gray-200' }}">
                        <i class="fas fa-circle text-red-600 mr-2"></i> Penjualan
                    </a>
                </div>
            </div>
        </nav>
        <!-- Logout Button (moved to the bottom) -->
        <form method="POST" action="#" class="mt-auto">
            <button type="submit" class="w-full text-center px-4 py-2 rounded hover:bg-red-100 text-red-500">Logout</button>
        </form>
    </div>


    <!-- Main Content -->
    <div id="main-content" class="flex-1 ml-64 transition-all duration-300 flex flex-col overflow-y-auto">
        <header class="bg-red-600 text-white p-4 flex items-center">
            <button onclick="toggleSidebar()" class="mr-4 text-white text-xl focus:outline-none">☰</button>
            <span class="text-lg font-semibold">{{ $title ?? '' }}</span>
        </header>
        <main class="p-4 flex-1 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
