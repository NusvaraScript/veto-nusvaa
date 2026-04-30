@extends('user.layout.app') {{-- Atau layout publik lainnya --}}
@section('title', 'VetoNusvaa — Ambil Kendali Atas Hidupmu')

@section('content')
<div class="bg-white text-black font-sans selection:bg-red-600 selection:text-white">
    
    {{-- Hero Section --}}
    <header class="min-h-[80vh] flex flex-col items-center justify-center text-center px-4 border-b-8 border-black bg-slate-50 relative overflow-hidden">
        {{-- Aksen Latar Belakang --}}
        <div class="absolute top-10 left-10 text-slate-200 -z-0 select-none">
            <i class="fa-solid fa-ban text-[20rem] rotate-12"></i>
        </div>

        <div class="relative z-10">
            <div class="inline-block border-2 border-black bg-red-600 text-white px-4 py-1 mb-6 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] uppercase font-black italic tracking-widest animate-bounce">
                Hentikan Relapse Sekarang.
            </div>
            <h1 class="text-5xl md:text-8xl font-black uppercase italic tracking-tighter leading-none">
                BUANG KEBIASAAN<br>
                <span class="text-red-600 underline decoration-black underline-offset-8">BURUKMU.</span>
            </div>
            <p class="mt-8 max-w-xl mx-auto text-sm md:text-base font-bold text-gray-500 uppercase leading-relaxed">
                VetoNusvaa adalah alat disiplin untuk mencatat, memantau, dan menghancurkan pola hidup yang merusak. Karena pemulihan dimulai dari kejujuran mencatat kekalahan.
            </p>
            
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="border-4 border-black bg-black text-white px-8 py-4 font-black uppercase italic text-xl shadow-[8px_8px_0px_0px_rgba(220,38,38,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                    Mulai Berhenti
                </a>
                <a href="#features" class="border-4 border-black bg-white text-black px-8 py-4 font-black uppercase italic text-xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                    Pelajari Fitur
                </a>
            </div>
        </div>
    </header>

    {{-- Features Section --}}
    <section id="features" class="py-20 px-4 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            
            {{-- Feature 1 --}}
            <div class="border-4 border-black p-8 bg-white shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] group">
                <div class="w-16 h-16 bg-yellow-400 border-4 border-black flex items-center justify-center mb-6 group-hover:-rotate-6 transition-transform">
                    <i class="fa-solid fa-skull-crossbones text-2xl"></i>
                </div>
                <h3 class="text-2xl font-black uppercase italic mb-4">Catat Relapse</h3>
                <p class="text-sm font-bold text-gray-500 leading-relaxed uppercase">
                    Jangan lari dari kegagalan. Catat kapan, kenapa, dan bagaimana kamu goyah untuk mengenali pola pemicu.
                </p>
            </div>

            {{-- Feature 2 --}}
            <div class="border-4 border-black p-8 bg-white shadow-[10px_10px_0px_0px_rgba(220,38,38,1)] group">
                <div class="w-16 h-16 bg-red-600 border-4 border-black text-white flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                    <i class="fa-solid fa-fire text-2xl"></i>
                </div>
                <h3 class="text-2xl font-black uppercase italic mb-4">Streak Tracker</h3>
                <p class="text-sm font-bold text-gray-500 leading-relaxed uppercase">
                    Pantau berapa lama kamu bertahan. Setiap hari adalah kemenangan, dan setiap kemenangan layak dijaga.
                </p>
            </div>

            {{-- Feature 3 --}}
            <div class="border-4 border-black p-8 bg-white shadow-[10px_10px_0px_0px_rgba(0,0,0,1)] group">
                <div class="w-16 h-16 bg-black border-4 border-black text-white flex items-center justify-center mb-6 group-hover:-rotate-6 transition-transform">
                    <i class="fa-solid fa-chart-line text-2xl"></i>
                </div>
                <h3 class="text-2xl font-black uppercase italic mb-4">Analisis Pola</h3>
                <p class="text-sm font-bold text-gray-500 leading-relaxed uppercase">
                    Lihat statistik keparahan kebiasaanmu. Sadari di mana titik terlemahmu dan perbaiki strategi pertahananmu.
                </p>
            </div>

        </div>
    </section>

    {{-- Call to Action --}}
    <section class="bg-black text-white py-20 px-4 text-center border-t-8 border-red-600">
        <h2 class="text-4xl md:text-6xl font-black uppercase italic leading-none mb-8">
            WAKTU TERBAIK UNTUK BERHENTI<br> ADALAH <span class="text-red-600 underline">SEKARANG.</span>
        </h2>
        <p class="mb-10 text-gray-400 font-bold uppercase tracking-widest text-xs md:text-sm">
            Jangan menunggu hari senin. Jangan menunggu tahun depan.
        </p>
        <a href="{{ route('register') }}" class="inline-block bg-white text-black border-4 border-white px-10 py-5 font-black uppercase italic text-2xl hover:bg-red-600 hover:text-white hover:border-black transition-all">
            Join VetoNusvaa Gratis
        </a>
    </section>

    {{-- Footer Landing --}}
    <footer class="py-10 text-center bg-white border-t-4 border-black">
        <p class="text-[10px] font-black uppercase tracking-[0.5em]">
            VetoNusvaa &copy; 2026 — Disiplin adalah Kebebasan.
        </p>
    </footer>
</div>
@endsection