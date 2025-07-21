@extends('layouts.app')
@section('title', 'Sign Up')
@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <div class="flex justify-center mb-6">
            <img src="https://1000logos.net/wp-content/uploads/2017/03/Nike-Logo.png" alt="Nike Logo" class="h-12">
        </div>
        <h2 class="text-2xl font-bold text-center mb-6">Sign Up</h2>
        <form method="POST" action="{{ url('/signup') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 mb-2">Name</label>
                <input type="text" id="name" name="name" required placeholder="Your name"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black" />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required placeholder="you@example.com"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black" />
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black" />
            </div>
            <button type="submit"
                class="w-full bg-black text-white py-2 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                Sign Up
            </button>
            @if ($errors->any())
                <div class="text-red-600 mt-4 text-center">
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
        <div class="mt-6 text-center text-gray-400 text-xs">This is a UI clone for educational purposes.</div>
    </div>
</div>
@endsection