@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="bg-blue-100 min-h-screen p-10">
        <h1 class="font-bold text-4xl">Minhas Correções</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4 my-8">
            @foreach ($corrections as $correction)
                @php
                    $nota = $correction->nota_geral ?? 0;
                    $notaLimitada = max(100, min($nota, 1000)); // limita entre 100 e 1000
                    $hue = ($notaLimitada - 100) * (120 / 900); // mapeia para 0~120 (vermelho -> verde)
                @endphp

                <div
                    class="w-64 bg-white p-9 space-y-3 relative overflow-hidden transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-xl">
                    <a href="{{ route('site.correction', $correction->id) }}">
                        <div class="w-24 h-24 rounded-full absolute -right-5 -top-7 transition-colors duration-300 ease-in-out"
                            style="background-color: hsl({{ $hue }}, 85%, 50%);">
                            <p class="absolute bottom-6 left-7 text-white text-2xl">
                                {{ $correction->nota_geral }}
                            </p>
                        </div>

                        <div class="fill-violet-500 w-12">
                            <svg class="w-16 h-16 text-gray-800 dark:text-black" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023" />
                            </svg>
                        </div>

                        <h1 class="font-bold text-md">{{ $correction->redaction->title }}</h1>
                        <p class="text-sm text-zinc-500 leading-6">
                            {{ $correction->redaction->description }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection