@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if (session('status'))
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                {{ session('status') }}
            </div>
            @endif
            <br>
            <form action="{{ route('login') }}" method="POST">
                @csrf



                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your Email"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                    border-red-500
                @enderror"
                        value="">
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
                @enderror"
                        value="">
                </div>
                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
               

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                  <div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Login
                </button>
                  </div>
            </div>
            </form>
        </div>
    </div>





@endsection
