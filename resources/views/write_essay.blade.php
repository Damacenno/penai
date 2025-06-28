@extends('layout')

@section('title', 'New')


@section('content')
    <form method="POST" action="{{ route('send.redaction') }}" class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="tema" class="block text-lg font-semibold mb-2">Escolha um dos tema diários para ganhar pontos extras!</label>
            <select name="tema_id" id="tema" required
                class="w-full border border-gray-300 p-3 rounded bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Selecione um tema</option>
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->theme_title }}</option>
                @endforeach
            </select>
        </div>
        <label for="texto" class="block text-lg font-semibold mb-2">Digite sua redação:</label>
        <textarea name="texto" id="texto" rows="10" class="w-full border border-gray-300 p-3 rounded mb-4"
            required>{{ old('texto') }}</textarea>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
            Enviar para correção
        </button>
    </form>
@endsection