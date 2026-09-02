@extends('layouts.app')

@section('content')

<div class="relative min-h-screen">
{{-- Backdrop --}}
@if (!empty($movie['backdrop_path']))
    <div class="absolute inset-0">
        <img
            src="https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}"
            alt="{{ $movie['title'] }}"
            class="w-full h-full object-cover"
        >

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/80"></div>
    </div>
@else
    <div class="absolute inset-0 bg-gray-900"></div>
@endif

{{-- Content --}}
<div class="relative max-w-7xl mx-auto px-6 py-10">

    {{-- Tombol kembali --}}
    <a
        href="{{ url()->previous() }}"
        class="inline-flex items-center gap-2 text-white/80 hover:text-white mb-8 transition"
    >
        ← Kembali
    </a>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 items-start">

        {{-- Poster --}}
        <div class="md:col-span-1">

            @if (!empty($movie['poster_path']))
                <img
                    src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                    alt="{{ $movie['title'] }}"
                    class="w-full max-w-sm mx-auto rounded-xl shadow-2xl"
                >
            @else
                <div class="w-full aspect-[2/3] max-w-sm mx-auto bg-gray-700 rounded-xl flex items-center justify-center">
                    <span class="text-gray-300">
                        Tidak ada poster
                    </span>
                </div>
            @endif

        </div>

        {{-- Informasi film --}}
        <div class="md:col-span-2 lg:col-span-3 text-white">

            {{-- Judul --}}
            <h1 class="text-4xl md:text-5xl font-bold">
                {{ $movie['title'] }}
            </h1>

            {{-- Tagline --}}
            @if (!empty($movie['tagline']))
                <p class="text-lg text-gray-300 italic mt-3">
                    "{{ $movie['tagline'] }}"
                </p>
            @endif

            {{-- Rating & tanggal --}}
            <div class="flex flex-wrap items-center gap-4 mt-6">

                @if (isset($movie['vote_average']))
                    <div class="flex items-center gap-2">
                        <span class="text-yellow-400 text-xl">★</span>

                        <span class="font-semibold">
                            {{ number_format($movie['vote_average'], 1) }}/10
                        </span>
                    </div>
                @endif

                @if (!empty($movie['release_date']))
                    <span class="text-gray-300">
                        {{ $movie['release_date'] }}
                    </span>
                @endif

                @if (!empty($movie['runtime']))
                    <span class="text-gray-300">
                        {{ floor($movie['runtime'] / 60) }}j
                        {{ $movie['runtime'] % 60 }}m
                    </span>
                @endif

            </div>

            {{-- Genre --}}
            @if (!empty($movie['genres']))
                <div class="flex flex-wrap gap-2 mt-6">

                    @foreach ($movie['genres'] as $genre)
                        <span
                            class="px-3 py-1 rounded-full bg-white/10 border border-white/20 text-sm"
                        >
                            {{ $genre['name'] }}
                        </span>
                    @endforeach

                </div>
            @endif

            {{-- Overview --}}
            <div class="mt-8">

                <h2 class="text-2xl font-bold mb-3">
                    Sinopsis
                </h2>

                <p class="text-gray-300 leading-relaxed max-w-4xl">
                    {{ $movie['overview'] ?: 'Tidak ada deskripsi untuk film ini.' }}
                </p>

            </div>

            {{-- Informasi tambahan --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">

                @if (!empty($movie['original_title']))
                    <div>
                        <p class="text-sm text-gray-400">
                            Judul Asli
                        </p>

                        <p class="font-medium mt-1">
                            {{ $movie['original_title'] }}
                        </p>
                    </div>
                @endif

                @if (!empty($movie['original_language']))
                    <div>
                        <p class="text-sm text-gray-400">
                            Bahasa
                        </p>

                        <p class="font-medium mt-1 uppercase">
                            {{ $movie['original_language'] }}
                        </p>
                    </div>
                @endif

                @if (isset($movie['popularity']))
                    <div>
                        <p class="text-sm text-gray-400">
                            Popularitas
                        </p>

                        <p class="font-medium mt-1">
                            {{ number_format($movie['popularity'], 2) }}
                        </p>
                    </div>
                @endif

                @if (isset($movie['vote_count']))
                    <div>
                        <p class="text-sm text-gray-400">
                            Jumlah Vote
                        </p>

                        <p class="font-medium mt-1">
                            {{ number_format($movie['vote_count']) }}
                        </p>
                    </div>
                @endif

            </div>

        </div>

    </div>

</div>

</div>

@endsection