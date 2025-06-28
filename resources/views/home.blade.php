@extends('layout')

@section('title', 'Home')

@section('content')

    <a href="{{ route('site.redaction')}}">
            <button
                class=" px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform
        bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
        Nova Redação
        </button>
    </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($corrections as $correction)
            <div class="w-full max-w-sm px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <span
                        class="text-sm font-light text-gray-800 dark:text-gray-400">{{$correction->redaction->created_at}}</span>
                    <a href="{{ route('site.correction', $correction->id) }}">
                        <span
                            class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">correção</span>
                    </a>
                </div>
                <div>
                    <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{$correction->redaction->title}}</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{$correction->redaction->description}}</p>
                </div>
                <div>
                    <div class="flex items-center mt-2 text-gray-700 dark:text-gray-200">
                        <span><b>Nota Geral: </b> {{$correction->nota_geral}}/1000</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection