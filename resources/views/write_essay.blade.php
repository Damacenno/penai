@extends('layout')

@section('title', 'New')


@section('content')
    <h1>Vou escrever uma nova redação</h1>
    <form method="POST" action="{{ route('send.redaction') }}"
        class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        @csrf
        <label for="texto" class="block text-lg font-semibold mb-2">Digite sua redação:</label>
        <textarea name="texto" id="texto" rows="10" class="w-full border border-gray-300 p-3 rounded mb-4"
            required>{{ old('texto') }}</textarea>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
            Enviar para correção
        </button>
    </form>
@endsection