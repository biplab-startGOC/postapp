@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
            <div class="mb-4">
                <label for="username" class="sr-only">Userame</label>
                <input type="text" name="username" id="username" placeholder="Enter your username"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username')
                        border-red-500
                    @enderror" value="{{ old('username') }}">
            </div>
            @error('username')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')
                    border-red-500
                @enderror" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
                
         
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your Email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                    border-red-500
                @enderror" value="{{ old('email') }}">
            </div>
            @error('email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')
                    border-red-500
                @enderror" value="">
            </div>
            @error('password')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-4">
                <label for="password" class="sr-only">Confirm your password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation')
                    border-red-500
                @enderror" value="">
            </div>
            @error('password_confirmation')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Register
              </button>
        </form>
        </div>
    </div>





@endsection
