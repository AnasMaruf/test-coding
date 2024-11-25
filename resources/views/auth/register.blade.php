@extends('layout.authLayout') @section('content')
<div class="bg-white w-full max-w-md p-8 rounded-md shadow-lg">
    <h1 class="text-2xl font-bold text-center mb-8">Register</h1>

    <form action="/register" method="POST">
        @csrf
        <div class="mb-6">
            <label
                for="nama"
                class="block text-sm font-medium text-gray-700 mb-2"
                >Nama</label
            >
            <input
                type="text"
                id="nama"
                name="nama"
                class="w-full px-4 py-2 border rounded-md @error('nama') border-red-500 bg-red-50 @else border-gray-300 @enderror focus:ring focus:ring-indigo-200 focus:outline-none"
                placeholder="john doe"
                value="{{ old('nama') }}"
            />
            @error('nama')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
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
                for="email"
                class="block text-sm font-medium text-gray-700 mb-2"
                >email</label
            >
            <input
                type="text"
                id="email"
                name="email"
                class="w-full px-4 py-2 border rounded-md @error('email') border-red-500 bg-red-50 @else border-gray-300 @enderror focus:ring focus:ring-indigo-200 focus:outline-none"
                placeholder="example@gmail.com"
                value="{{ old('email') }}"
            />
            @error('email')
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
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 focus:outline-none"
                placeholder="********"
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
                Register
            </button>
            <p class="text-sm p-3 font-light text-gray-500 dark:text-gray-400">
                Already have an account?
                <a
                    href="{{ route('login') }}"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                    >Login here</a
                >
            </p>
        </div>
    </form>
</div>
@endsection
