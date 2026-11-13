@extends('layouts.app')

@section('title', 'Login admin')

@section('content')
<div class="mx-auto max-w-sm px-6 py-16">
    <h1 class="font-display text-3xl font-extrabold">Masuk admin</h1>

    <form method="POST" action="{{ route('login.attempt') }}" class="mt-6 space-y-4 border-2 border-ink bg-white p-6">
        @csrf
        <label class="block font-semibold">Email
            <input type="email" name="email" value="{{ old('email') }}" class="field mt-1" required autofocus>
        </label>
        <label class="block font-semibold">Password
            <input type="password" name="password" class="field mt-1" required>
        </label>
        @error('email')
            <p class="font-semibold text-red-700">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn w-full">Masuk</button>
    </form>
</div>
@endsection