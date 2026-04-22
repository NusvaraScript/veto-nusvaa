<div class="w-full block p-4">
    <div class="flex flex-col gap-4">
        <div>
            <div class="flex text-sm items-center gap-2 mb-2">
                <x-button route="{{ route('vice.create') }}">
                    <i class="fa-solid fa-plus-circle"></i> Tambah Habit
                </x-button>
            </div>
            <div class="flex text-sm items-center gap-2 mb-2">
                <x-button route="{{ route('vice.index') }}">
                    <i class="fa-solid fa-search"></i> Cari Habit
                </x-button>
            </div>
        </div>
        <hr>
        <div>
            <div class="flex text-sm items-center gap-2 mb-2">
                <i class="fa-solid fa-arrow-right"></i>
                <p class="font-bold">Pages</p>
            </div>
            <div class="grid grid-cols-1 gap-2 text-center">
                <x-button route="{{ route('home') }}">Beranda</x-button>
            </div>
        </div>
        <div>
            <div class="flex text-sm items-center gap-2 mb-2">
                <i class="fa-solid fa-arrow-right"></i>
                <p class="font-bold">List</p>
            </div>
            <div class="grid grid-cols-1 gap-2 text-center">
                <x-button route="{{ route('vice.index') }}">Kebiasaan Buruk</x-button>
                <x-button route="{{ route('relapse.index') }}">Relapse</x-button>
            </div>
        </div>
        <hr>
    </div>
</div>
