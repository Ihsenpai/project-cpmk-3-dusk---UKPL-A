@extends('layouts.main')

@section('title', 'Tambah Produk')

@section('content')
<!-- Page Header -->
<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mb-6">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Produk Baru</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Isi form di bawah untuk menambahkan produk baru ke sistem</p>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <form method="POST" action="{{ route('produk.store') }}" class="space-y-6">
            @csrf

            <!-- Nama Produk -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nama Produk <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <input id="nama" 
                           name="nama" 
                           type="text" 
                           value="{{ old('nama') }}"
                           class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('nama') border-red-300 @enderror" 
                           placeholder="Masukkan nama produk"
                           required 
                           autofocus>
                </div>
                @error('nama')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Harga -->
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Harga <span class="text-red-500">*</span>
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 dark:text-gray-400 sm:text-sm">Rp</span>
                    </div>
                    <input id="harga" 
                           name="harga" 
                           type="number" 
                           min="0"
                           step="1"
                           value="{{ old('harga') }}"
                           class="block w-full pl-12 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('harga') border-red-300 @enderror" 
                           placeholder="0"
                           required>
                </div>
                @error('harga')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('produk.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Batal
                </a>
                
                <button type="submit" 
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection