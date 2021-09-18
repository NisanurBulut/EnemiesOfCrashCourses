@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        @if (session('status'))
        <div class="bg-red-500 p-4 rounded-lg text-white text-center">
            {{session('status')}}
        </div>
        @endif
        <form method="POST" action="{{route('login')}}">
            @csrf

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" class="bg-gray-100 border-2 w-full p-4 @error('email') border-red-500 @enderror"
                    id="email" name="email" placeholder="email" value="{{old('email')}}" />
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password"
                    class="bg-gray-100 border-2 w-full p-4 @error('password') border-red-500 @enderror" id="email"
                    name="password" placeholder="password" value="{{old('password')}}" />
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" class="mr-2" name="remember"/>
                <label for="remember">Remember Me</label>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
