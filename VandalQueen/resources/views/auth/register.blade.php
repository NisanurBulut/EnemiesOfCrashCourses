@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
    <form method="POST" action="{{route('register')}}">
    @csrf
    <div class="mb-4">
        <label for="name" class="sr-only">Name</label>
        <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" id="name" name="name" placeholder="Name"  value="{{old('name')}}"/>
        @error('name')
           <div class="text-red-500 mt-2 text-sm">
               {{$message}}
           </div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="username" class="sr-only">Username</label>
        <input type="text" class="bg-gray-100 border-2 w-full p-4 @error('username') border-red-500 @enderror" id="username" name="username" placeholder="username"  value="{{old('surname')}}"/>
        @error('username')
           <div class="text-red-500 mt-2 text-sm">
               {{$message}}
           </div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="email" class="sr-only">Email</label>
        <input type="email" class="bg-gray-100 border-2 w-full p-4 @error('email') border-red-500 @enderror" id="email" name="email" placeholder="email"  value="{{old('email')}}"/>
        @error('email')
           <div class="text-red-500 mt-2 text-sm">
               {{$message}}
           </div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="password" class="sr-only">Password</label>
        <input type="password" class="bg-gray-100 border-2 w-full p-4 @error('password') border-red-500 @enderror" id="email" name="password" placeholder="password"  value="{{old('password')}}"/>
        @error('password')
           <div class="text-red-500 mt-2 text-sm">
               {{$message}}
           </div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="sr-only">Password</label>
        <input type="password" class="bg-gray-100 border-2 w-full p-4" id="password_confirmation" name="password_confirmation" placeholder="Repeat password"  value=""/>
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Save</button>
    </div>
    </form>
</div>
</div>
@endsection
