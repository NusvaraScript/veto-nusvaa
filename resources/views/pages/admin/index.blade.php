@extends('layout.app')
@section('title', 'Admin Dashboard - VetoNusvaa')
@section('content')
<x-section section="Admin Overview">
    <div class="grid md:grid-cols-4 gap-4 mb-6">
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm"><p class="text-sm text-gray-500">Users</p><p class="text-3xl font-bold">{{ $totalUsers }}</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm"><p class="text-sm text-gray-500">Admins</p><p class="text-3xl font-bold">{{ $totalAdmins }}</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm"><p class="text-sm text-gray-500">Kebiasaan</p><p class="text-3xl font-bold">{{ $totalVices }}</p></div>
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm"><p class="text-sm text-gray-500">Relapse</p><p class="text-3xl font-bold">{{ $totalRelapses }}</p></div>
    </div>
</x-section>
@endsection
