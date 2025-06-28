@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-8">

        <section class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-semibold mb-4">Área principal</h3>
            <div x-data="{ temaSelecionado: '' }" class="flex flex-wrap items-center gap-2 mx-4 my-2">
                <select name="tema_id" id="tema" x-model="temaSelecionado" required
                    class="w-48 border border-gray-300 px-2 py-1 rounded text-sm bg-white text-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-400">
                    <option value="">Tema</option>
                    @foreach ($daily_themes as $theme)
                        <option value="{{ $theme->id }}">{{ $theme->theme_title }}</option>
                    @endforeach
                </select>
            </div>
            <h4>Introdução</h4>
            <input type="email"
                class="flex h-28 m-2 w-full rounded-sm border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />
            <h4>Desenvolvimento</h4>
            <input type="email"
                class="flex h-28 m-2 w-full rounded-sm border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />
            <h4>Desenvolvimento (Opcional)</h4>
            <input type="email"
                class="flex h-28 m-2 w-full rounded-sm border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />
            <h4>Conclusão</h4>
            <input type="email"
                class="flex h-28 m-2 w-full rounded-sm border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mx-8 my-4">
                <a href="{{ route('site.redaction') }}">
                    <button
                        class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
                                   bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-80">
                        Fazer Correção
                    </button>
                </a>

                <select name="tema_id" id="tema" required
                    class="w-full sm:w-72 border border-gray-300 p-3 rounded bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Selecione um tema</option>
                    @foreach ($daily_themes as $theme)
                        <option value="{{ $theme->id }}">{{ $theme->theme_title }}</option>
                    @endforeach
                </select>
            </div>

        </section>

        <div class="flex flex-col gap-6">
            <section class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Você tem:</h3>
                <h1>{{ auth()->user()->accumulated_points }} Pontos</h1>
            </section>

            <section class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Super-Temas de Hoje!</h3>
                <ul class="list-disc pl-6 pb-6">
                    @foreach($daily_themes as $theme)
                        <li>{{ $theme->theme_title }}</li>
                    @endforeach
                </ul>
                <p>Faça redações com estes temas para ganhar <span class="font-bold color-blue-300">PenPoints</span> extras!
                </p>
            </section>
        </div>

    </div>
@endsection