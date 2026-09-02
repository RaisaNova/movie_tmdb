@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">
<h1 class="text-3xl font-bold mb-8">
    Film Popular
</h1>

@if (empty($movies))

    <div class="text-center py-10">
        <p class="text-gray-500">
            Tidak ada film yang ditemukan.
        </p>
    </div>

@else

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        @foreach ($movies as $movie)

            <a
                href="{{ route('movie.detail', $movie['id']) }}"
                class="group block bg-white rounded-lg shadow-md overflow-hidden
                       hover:shadow-2xl hover:-translate-y-2
                       transition-all duration-300 ease-in-out"
            >

                {{-- Poster --}}
                <div class="relative overflow-hidden">

                    @if (!empty($movie['poster_path']))

                        <img
                            src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                            alt="{{ $movie['title'] }}"
                            class="w-full aspect-[2/3] object-cover
                                   transition-transform duration-500
                                   group-hover:scale-110"
                        >

                    @else

                        <div class="w-full aspect-[2/3] bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500 text-sm">
                                Tidak ada poster
                            </span>
                        </div>

                    @endif

                    {{-- Overlay ketika hover --}}
                    <div
                        class="absolute inset-0 bg-black/0
                               group-hover:bg-black/60
                               transition-all duration-300
                               flex items-center justify-center"
                    >

                        {{-- Teks Detail --}}
                        <span
                            class="text-white font-semibold text-lg
                                   opacity-0 scale-75
                                   group-hover:opacity-100
                                   group-hover:scale-100
                                   transition-all duration-300"
                        >
                            Lihat Detail
                        </span>

                    </div>

                </div>

                {{-- Informasi film --}}
            <div class="p-4 flex flex-col flex-1">

                {{-- Judul --}}
                <h2 class="font-semibold text-lg line-clamp-2 min-h-[56px]">
                    {{ $movie['title'] }}
                </h2>

                {{-- Tanggal --}}
                <p class="text-sm text-gray-500 mt-2 min-h-[20px]">
                    {{ $movie['release_date'] ?? 'Tanggal tidak tersedia' }}
                </p>

                {{-- Deskripsi --}}
                <p class="text-sm mt-3 text-gray-600 line-clamp-3 min-h-[60px]">
                    {{ !empty($movie['overview'])
                        ? $movie['overview']
                        : 'Tidak ada deskripsi.' }}
                </p>

            </div>



            </a>

        @endforeach

    </div>

@endif

</div>

@endsection