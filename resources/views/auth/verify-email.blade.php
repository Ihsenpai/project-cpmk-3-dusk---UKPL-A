@extends('layouts.guest-main')

@section('title', 'Verifikasi Email')

@section('content')
<div class="max-w-md w-full space-y-8">
    <div>
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900 dark:text-white">
            Verifikasi Email
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
            Terima kasih telah mendaftar! Silakan verifikasi alamat email Anda dengan mengklik link yang telah kami kirimkan.
        </p>
    </div>
    
    @if (session('status') == 'verification-link-sent')
        <div class="bg-green-100 dark:bg-green-900/20 border border-green-400 dark:border-green-800 text-green-700 dark:text-green-300 px-4 py-3 rounded relative" role="alert">
            Link verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.
        </div>
    @endif
    
    <div class="bg-white dark:bg-gray-800 p-8 shadow-md rounded-lg">
        <div class="flex items-center justify-between space-x-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kirim Ulang Email
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
