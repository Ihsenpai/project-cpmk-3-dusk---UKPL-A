@extends('layouts.guest-main')

@section('title', 'Selamat Datang')

@section('content')
<div class="max-w-md w-full space-y-8 text-center">
    <div>
        <div class="mx-auto h-24 w-24 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900">
            <svg class="h-12 w-12 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
        </div>
        <h2 class="mt-6 text-3xl font-bold text-gray-900 dark:text-white">
            Sistem Manajemen Produk
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Project Ujian CPMK03 – Otomatisasi dan Browser Test dengan Laravel Dusk
        </p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Fitur Aplikasi:</h3>
        <ul class="text-left space-y-2 text-sm text-gray-600 dark:text-gray-400">
            <li class="flex items-center">
                <svg class="h-4 w-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                CRUD (Create, Read, Update, Delete) Produk
            </li>
            <li class="flex items-center">
                <svg class="h-4 w-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Sistem Authentication (Login/Register)
            </li>
            <li class="flex items-center">
                <svg class="h-4 w-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Automated Testing dengan Laravel Dusk
            </li>
            <li class="flex items-center">
                <svg class="h-4 w-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Responsive Design dengan Tailwind CSS
            </li>
        </ul>
    </div>

    <div class="space-y-4">
        @guest
            <p class="text-gray-600 dark:text-gray-400">
                Silakan login atau daftar untuk mengakses sistem manajemen produk
            </p>
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('login') }}" class="flex-1 inline-flex justify-center items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Masuk ke Sistem
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="flex-1 inline-flex justify-center items-center px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-md font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Daftar Akun Baru
                    </a>
                @endif
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">
                Selamat datang kembali! Anda sudah login.
            </p>
            <a href="{{ url('/dashboard') }}" class="inline-flex justify-center items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Menuju Dashboard
            </a>
        @endguest
    </div>
</div>
@endsection