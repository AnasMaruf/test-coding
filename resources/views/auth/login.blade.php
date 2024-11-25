@extends('layout.authLayout') @section('content')
<div class="bg-white w-full max-w-md p-8 rounded-md shadow-lg">
    <h1 class="text-2xl font-bold text-center mb-8">Login</h1>
    @if (session()->has('success'))
    <div
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
        role="alert"
    >
        <span class="block sm:inline">{{ session("success") }}</span>
        <button
            type="button"
            class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-500 focus:outline-none"
            aria-label="Close"
            onclick="this.parentElement.style.display='none';"
        >
            &times;
        </button>
    </div>
    @endif @if (session()->has('error'))
    <div
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
        role="alert"
    >
        <span class="block sm:inline">{{ session("error") }}</span>
        <button
            type="button"
            class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-500 focus:outline-none"
            aria-label="Close"
            onclick="this.parentElement.style.display='none';"
        >
            &times;
        </button>
    </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label
                for="username"
                class="block text-sm font-medium text-gray-700 mb-2"
                >Username</label
            >
            <input
                type="text"
                id="username"
                name="username"
                class="w-full px-4 py-2 border rounded-md @error('username') border-red-500 bg-red-50 @else border-gray-300 @enderror focus:ring focus:ring-indigo-200 focus:outline-none"
                placeholder="johndoe"
                value="{{ old('username') }}"
            />
            @error('username')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label
                for="password"
                class="block text-sm font-medium text-gray-700 mb-2"
                >Password</label
            >
            <input
                type="password"
                id="password"
                name="password"
                class="w-full px-4 py-2 border rounded-md @error('password') border-red-500 bg-red-50 @else border-gray-300 @enderror focus:ring focus:ring-indigo-200 focus:outline-none"
                placeholder="Enter password here"
            />
            @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button
                type="submit"
                class="w-full px-4 py-2 bg-gray-800 text-white font-semibold rounded-md hover:bg-gray-900"
            >
                Login
            </button>
            <p class="text-sm font-light pt-3 text-gray-500 dark:text-gray-400">
                Don’t have an account yet?
                <a
                    href="/register-page"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                    >Sign up</a
                >
            </p>
        </div>
    </form>
</div>
@endsection
