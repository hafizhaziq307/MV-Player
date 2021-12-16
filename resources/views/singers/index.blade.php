@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-4 ">

        <!-- header -->
        <header class="flex justify-between">
            <p class="text-2xl font-bold">Musics</p>

            @if (!empty($singers))
                <a href="{{ route('singers.create') }}"
                    class="flex items-center text-lg text-gray-600 transition-colors hover:text-black">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p>New Singer</p>
                </a>
            @endif
        </header>

        <div class="space-y-4">
            @forelse ($singers as $singer)
                <a href="{{ route('singers.edit', ['singer' => $singer->name]) }}"
                    class="flex items-center w-full p-2 space-x-2 transition transform bg-white rounded-lg shadow-md hover:scale-105 hover:text-black">
                    <img src="{{ $singer->profile }}" alt="img" class="singer-image">
                    <p class="text-lg font-bold">{{ $singer->name }}</p>
                </a>
            @empty
                <div>No singer!</div>
            @endforelse

        </div>
    </main>
@endsection
