@extends('layouts.app')

@section('content')

    @if (session('msg') != '')
        <x-toast message="{{ session('msg') }}" />
    @endif

    <main class="max-w-5xl mx-auto space-y-4 ">

        <!-- header -->
        <header class="flex justify-between">
            <p class="text-2xl font-bold">Musics</p>

            @if (!empty($singers))
                <a href="{{ route('musics.create') }}"
                    class="flex items-center text-lg text-gray-600 transition-colors hover:text-black">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p>New Music</p>
                </a>
            @endif
        </header>

        <!-- main content -->
        <div class="space-y-4">
            @forelse ($singers as $singer)
                <!-- singer card -->
                <article class="w-full p-3 bg-white divide-y-2 divide-gray-300 rounded-md shadow-xl divide-solid">

                    <!-- card header -->
                    <header class="flex items-center pb-2 space-x-3">
                        <img src="{{ $singer->profile }}" alt="img" class="w-12 rounded-full aspect-square">
                        <div class="font-bold">{{ $singer->name }}</div>
                    </header>

                    <!-- card body -->
                    <div class="grid grid-cols-2 sm:grid-cols-3  md:grid-cols-4 gap-6 pt-2">
                        @forelse ($singer->musics as $music)
                            <!-- music card -->
                            <a href="{{ route('musics.edit', ['music' => $music->name, 'singer' => $singer->name]) }}">
                                <article
                                    class="relative flex-none block w-full rounded-md shadow-md cursor-pointer select-none aspect-video group ring-1 ring-gray-200">
                                    <!-- card image -->
                                    <img src="{{ $music->thumbnail }}" alt="img"
                                        class="object-cover w-full rounded-md aspect-video">
                                    <!-- card title -->
                                    <span
                                        class="absolute top-0 grid w-full h-full text-center text-white transition bg-gray-800 rounded-md opacity-0 group-hover:opacity-[0.85] text-sm md:text-base place-content-center">
                                        {{ $music->name }}
                                    </span>
                                </article>
                            </a>
                        @empty
                            <div>No songs!</div>
                        @endforelse
                    </div>

                </article>
            @empty
                <div>No singer</div>
            @endforelse
        </div>
    </main>
@endsection
