@extends('layouts.guest-main')

@section('title', 'Lupa Password')

@section('content')
<div class="max-w-md w-full space-y-8">
    <div>
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900 dark:text-white">
            Lupa Password?
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
            Masukkan email Anda dan kami akan mengirimkan link reset password.
        </p>
    </div>
    
    @if (session('status'))
        <div class="bg-green-100 dark:bg-green-900/20 border border-green-400 dark:border-green-800 text-green-700 dark:text-green-300 px-4 py-3 rounded relative" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="bg-white dark:bg-gray-800 p-8 shadow-md rounded-lg">
        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus 
                           class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('email') border-red-300 @enderror"
                           placeholder="Masukkan alamat email Anda">
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kirim Link Reset
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
