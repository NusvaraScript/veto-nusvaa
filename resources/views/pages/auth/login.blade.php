@extends('layout.app')
@section('title', 'Login - VetoNusvaa')
@section('content')
<x-section section="Login">
    <form action="{{ route('login.submit') }}" method="POST" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm space-y-4 max-w-xl">
        @csrf
        <div>
            <label class="block text-sm font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-lg border-slate-300" required>
            @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Password</label>
            <input type="password" name="password" class="w-full rounded-lg border-slate-300" required>
        </div>
        <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="remember"> Ingat saya</label>
        <button class="rounded-lg bg-black px-4 py-2 text-white">Masuk</button>
    </form>
</x-section>
@endsection
