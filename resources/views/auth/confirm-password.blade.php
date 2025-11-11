@extends('layouts.guest-main')

@section('title', 'Konfirmasi Password')

@section('content')
<div class="max-w-md w-full space-y-8">
    <div>
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900 dark:text-white">
            Konfirmasi Password
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
            Area aman aplikasi. Konfirmasi password untuk melanjutkan.
        </p>
    </div>
    
    <div class="bg-white dark:bg-gray-800 p-8 shadow-md rounded-lg">
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Password
                </label>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                           class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('password') border-red-300 @enderror"
                           placeholder="Masukkan password Anda">
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Konfirmasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
