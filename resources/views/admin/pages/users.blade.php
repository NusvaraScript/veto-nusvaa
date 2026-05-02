@extends('layout.admin')
@section('title', 'Kelola User Admin — VetoNusvaa')

@section('content')
    {{-- Header Section --}}
    <div class="mb-8">
        <h1 class="text-3xl font-black uppercase italic tracking-tighter text-black">
            Kelola User<span class="text-red-600">.</span>
        </h1>
        <div class="mt-2 h-1 w-12 bg-black"></div>
    </div>

    {{-- Alert Errors --}}
    @if ($errors->any())
        <div class="mb-6 border-2 border-black bg-red-50 p-4 shadow-[4px_4px_0px_#000]">
            <div class="flex items-center gap-2 mb-2">
                <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
                <p class="font-black uppercase text-xs italic text-red-800">Gagal menyimpan perubahan:</p>
            </div>
            <ul class="list-disc pl-5 text-xs font-bold text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah User --}}
    <div class="mb-8 border-2 border-black bg-white p-6 shadow-[4px_4px_0px_#000]">
        <h2 class="text-xs font-black uppercase tracking-widest mb-4 text-gray-400 italic">// Tambah User Baru</h2>
        <form method="POST" action="{{ route('admin.users.store') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @csrf
            <div class="flex flex-col gap-1">
                <label class="text-[10px] font-black uppercase italic">Nama Lengkap</label>
                <input name="name" type="text" required placeholder="NAMA..." value="{{ old('name') }}"
                    class="w-full border-2 border-black px-3 py-2 text-sm font-bold focus:ring-0 focus:border-red-600 outline-none transition-all">
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-[10px] font-black uppercase italic">Alamat Email</label>
                <input name="email" type="email" required placeholder="EMAIL@EXAMPLE.COM..." value="{{ old('email') }}"
                    class="w-full border-2 border-black px-3 py-2 text-sm font-bold focus:ring-0 focus:border-red-600 outline-none transition-all">
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-[10px] font-black uppercase italic">Password</label>
                <input name="password" type="password" required placeholder="********"
                    class="w-full border-2 border-black px-3 py-2 text-sm font-bold focus:ring-0 focus:border-red-600 outline-none transition-all">
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-[10px] font-black uppercase italic">Konfirmasi</label>
                <input name="password_confirmation" type="password" required placeholder="********"
                    class="w-full border-2 border-black px-3 py-2 text-sm font-bold focus:ring-0 focus:border-red-600 outline-none transition-all">
            </div>
            <div class="sm:col-span-2 lg:col-span-4 mt-2">
                <button type="submit"
                    class="border-2 border-black bg-black px-6 py-3 text-xs font-black uppercase text-white shadow-[2px_2px_0px_0px_rgba(220,38,38,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all">
                    Tambah User
                </button>
            </div>
        </form>
    </div>

    {{-- Tabel User --}}
    <div class="border-2 border-black bg-white shadow-[4px_4px_0px_#000] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b-2 border-black">
                    <tr>
                        <th class="p-4 text-[10px] font-black uppercase tracking-widest w-16 text-center">No</th>
                        <th class="p-4 text-[10px] font-black uppercase tracking-widest">Identitas</th>
                        <th class="p-4 text-[10px] font-black uppercase tracking-widest">Role</th>
                        <th class="p-4 text-[10px] font-black uppercase tracking-widest">Bergabung</th>
                        <th class="p-4 text-[10px] font-black uppercase tracking-widest">Ganti Password</th>
                    </tr>
                </thead>
                <tbody class="divide-y-2 divide-black">
                    @forelse($recentUsers as $index => $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4 text-xs font-bold text-center bg-gray-50/50 border-r-2 border-black">{{ $index + 1 }}</td>
                            <td class="p-4">
                                <p class="text-xs font-black uppercase">{{ $user->name }}</p>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-tight">{{ $user->email }}</p>
                            </td>
                            <td class="p-4">
                                <p class="text-xs font-black uppercase"></p>
                                @if($user->role == 'admin')
                                    <span class="inline-block bg-red-500 border-2 border-black text-white text-[10px] font-bold uppercase px-2 py-1 mt-1">Admin</span>
                                @elseif($user->role == 'user')
                                    <span class="inline-block bg-white border-2 border-black text-black text-[10px] font-bold uppercase px-2 py-1 mt-1">User</span>
                                @endif
                                </p>
                            </td>
                            <td class="p-4">
                                <span class="text-[10px] font-black uppercase border-2 border-black px-2 py-1 bg-white">
                                    {{ $user->created_at->format('d / m / Y') }}
                                </span>
                            </td>
                            <td class="p-4">
                                <form method="POST" action="{{ route('admin.users.password.update', $user) }}"
                                    class="flex flex-col lg:flex-row gap-2">
                                    @csrf @method('PATCH')
                                    <input type="password" name="password" placeholder="BARU..." required
                                        class="w-full lg:w-32 border-2 border-black px-2 py-1 text-[10px] font-bold focus:border-red-600 outline-none">
                                    <input type="password" name="password_confirmation" placeholder="ULANGI..." required
                                        class="w-full lg:w-32 border-2 border-black px-2 py-1 text-[10px] font-bold focus:border-red-600 outline-none">
                                    <button type="submit"
                                        class="border-2 border-black bg-white px-4 py-1 text-[10px] font-black uppercase shadow-[2px_2px_0px_#000] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center">
                                <p class="text-xs font-black uppercase text-gray-400 italic">Belum ada user terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection