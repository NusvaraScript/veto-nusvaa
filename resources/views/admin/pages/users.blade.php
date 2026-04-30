@extends('admin.layout.app')
@section('title', 'Kelola User Admin — VetoNusvaa')

@section('content')
<h1 class="text-3xl font-bold uppercase mb-6">Kelola User</h1>

@if ($errors->any())
<div class="mb-6 border-2 border-red-700 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-[4px_4px_0px_#000]">
    <p class="font-bold mb-1">Gagal menyimpan perubahan:</p>
    <ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form method="POST" action="{{ route('admin.users.store') }}" class="mb-8 border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000] grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
@csrf
<input name="name" type="text" required placeholder="Nama" value="{{ old('name') }}" class="w-full border-2 border-black px-3 py-2 text-sm">
<input name="email" type="email" required placeholder="Email" value="{{ old('email') }}" class="w-full border-2 border-black px-3 py-2 text-sm">
<input name="password" type="password" required placeholder="Password" class="w-full border-2 border-black px-3 py-2 text-sm">
<input name="password_confirmation" type="password" required placeholder="Konfirmasi Password" class="w-full border-2 border-black px-3 py-2 text-sm">
<div class="sm:col-span-2 lg:col-span-4"><button type="submit" class="border-2 border-black bg-black px-4 py-2 text-xs font-bold uppercase text-white">Tambah User</button></div>
</form>

<div class="border-2 border-black bg-white shadow-[4px_4px_0px_#000] overflow-x-auto">
<table class="w-full text-sm">
<thead class="bg-black text-white"><tr><th class="p-3 text-left">No</th><th class="p-3 text-left">Nama</th><th class="p-3 text-left">Email</th><th class="p-3 text-left">Bergabung</th><th class="p-3 text-left">Edit Password</th></tr></thead>
<tbody>
@forelse($recentUsers as $index => $user)
<tr class="border-t-2 border-black even:bg-gray-50"><td class="p-3">{{ $index + 1 }}</td><td class="p-3">{{ $user->name }}</td><td class="p-3">{{ $user->email }}</td><td class="p-3">{{ $user->created_at->format('d M Y') }}</td>
<td class="p-3">
<form method="POST" action="{{ route('admin.users.password.update', $user) }}" class="flex flex-col sm:flex-row gap-2">@csrf @method('PATCH')
<input type="password" name="password" placeholder="Password baru" required class="w-full border-2 border-black px-2 py-1 text-xs">
<input type="password" name="password_confirmation" placeholder="Konfirmasi" required class="w-full border-2 border-black px-2 py-1 text-xs">
<button type="submit" class="border-2 border-black bg-white px-3 py-1 text-xs font-bold uppercase">Update</button>
</form>
</td></tr>
@empty
<tr><td colspan="5" class="p-8 text-center text-gray-400">Belum ada user terdaftar.</td></tr>
@endforelse
</tbody></table></div>
@endsection
