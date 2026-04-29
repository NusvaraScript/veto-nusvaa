@extends('layout.app')
@section('title', 'Register - VetoNusvaa')
@section('content')
<x-section section="Register">
    <form action="{{ route('register.submit') }}" method="POST" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm space-y-4 max-w-xl">
        @csrf
        <div><label class="block text-sm font-semibold mb-1">Nama</label><input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-lg border-slate-300" required></div>
        <div><label class="block text-sm font-semibold mb-1">Email</label><input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-lg border-slate-300" required></div>
        <div><label class="block text-sm font-semibold mb-1">Password</label><input type="password" name="password" class="w-full rounded-lg border-slate-300" required></div>
        <div><label class="block text-sm font-semibold mb-1">Konfirmasi Password</label><input type="password" name="password_confirmation" class="w-full rounded-lg border-slate-300" required></div>
        <button class="rounded-lg bg-black px-4 py-2 text-white">Daftar</button>
    </form>
</x-section>
@endsection
