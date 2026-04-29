@extends('layout.app')
@section('title', 'VetoNusvaa - Landing')
@section('content')
<x-section section="Selamat Datang di VetoNusvaa">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm space-y-4">
        <p class="text-slate-700">Platform pelacakan kebiasaan buruk dan relapse agar kamu bisa membangun hidup yang lebih sehat secara konsisten.</p>
        <div class="flex gap-3 flex-wrap">
            <x-button route="{{ route('login') }}">Masuk</x-button>
            <x-button variant="outline" route="{{ route('register') }}">Daftar Akun</x-button>
        </div>
    </div>
</x-section>
@endsection
