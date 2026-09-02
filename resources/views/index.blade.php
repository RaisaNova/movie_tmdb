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
                class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300"
            >

                {{-- Poster --}}
                @if (!empty($movie['poster_path']))

                    <img
                        src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                        alt="{{ $movie['title'] }}"
                        class="w-full aspect-[2/3] object-cover"
                    >

                @else

                    <div class="w-full aspect-[2/3] bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-sm">
                            Tidak ada poster
                        </span>
                    </div>

                @endif

                {{-- Informasi film --}}
                <div class="p-4">

                    <h2 class="font-semibold text-lg line-clamp-2">
                        {{ $movie['title'] }}
                    </h2>

                    <p class="text-sm text-gray-500 mt-2">
                        {{ $movie['release_date'] ?? 'Tanggal tidak tersedia' }}
                    </p>

                    <p class="text-sm mt-3 text-gray-600 line-clamp-3">
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