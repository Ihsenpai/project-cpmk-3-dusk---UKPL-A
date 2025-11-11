@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- Page Header -->
<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mb-6">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Selamat datang di sistem manajemen produk!</p>
    </div>
</div>

<!-- Welcome Card -->
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
    <div class="p-6 text-gray-900 dark:text-white">
        <h3 class="text-lg font-semibold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
        <p class="text-gray-600 dark:text-gray-400">
            Anda berhasil login ke sistem. Silakan pilih menu yang tersedia untuk mengelola data produk.
        </p>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <!-- Manajemen Produk -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
        <div class="p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Manajemen Produk</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kelola data produk (CRUD)</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('produk.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Tambah Produk Baru -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
        <div class="p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Tambah Produk</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Tambahkan produk baru</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('produk.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Tambah Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Profile -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
        <div class="p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">Profil Saya</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kelola profil akun</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Statistics -->
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Statistik Sistem</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-100 dark:border-blue-800">
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                    {{ \App\Models\Produk::count() }}
                </div>
                <div class="text-sm text-blue-500 dark:text-blue-300 font-medium">Total Produk</div>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-100 dark:border-green-800">
                <div class="text-2xl font-bold text-green-600 dark:text-green-400">
                    {{ \App\Models\User::count() }}
                </div>
                <div class="text-sm text-green-500 dark:text-green-300 font-medium">Total User</div>
            </div>
            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg border border-purple-100 dark:border-purple-800">
                <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">
                    Rp {{ number_format(\App\Models\Produk::sum('harga'), 0, ',', '.') }}
                </div>
                <div class="text-sm text-purple-500 dark:text-purple-300 font-medium">Total Nilai Produk</div>
            </div>
        </div>
    </div>
</div>
@endsection
