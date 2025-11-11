@extends('layouts.main')

@section('title', 'Edit Profil')

@section('content')
<!-- Page Header -->
<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mb-6">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Pengaturan Profil</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola informasi profil dan keamanan akun Anda</p>
    </div>
</div>

<div class="space-y-6">
    <!-- Update Profile Information -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Update Password -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Delete User -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
