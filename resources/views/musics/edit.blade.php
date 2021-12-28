@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-6">

        <!-- thumbnail container -->
        <div class="card flex items-center justify-between">
            <img src="{{ $singer->music->thumbnail }}" alt="img"
                class="rounded aspect-video w-40 md:w-60 ring-1 ring-gray-200">
            <a href="{{ route('thumbnails.create', ['music' => $singer->music->name, 'singer' => $singer->name]) }}"
                class="btn bg-gray-200 hover:bg-gray-300 text-gray-800">Edit</a>
        </div>


        <!-- title -->
        <div class="card space-y-2">
            <p class="font-bold">Title</p>

            <div x-data="{ open : false }">
                <div x-show="!open" class="flex justify-between items-center">
                    <div class="ml-2">{{ $singer->music->name }}</div>
                    <button type="button" class="btn bg-gray-200 hover:bg-gray-300 text-gray-800"
                        @click="open = !open">Edit</button>
                </div>

                <form action="{{ route('musics.update', ['music' => $singer->music->name, 'singer' => $singer->name]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- container after clicked "EDIT" -->
                    <div x-show="open" class="flex justify-between items-center">
                        <input type="text" name="newname" class="w-full bg-gray-200 rounded p-2 mr-4"
                            value="{{ $singer->music->name }}">

                        <div class="flex justify-center items-center space-x-2">
                            <button type="submit" name="type" value="name"
                                class="rounded bg-emerald-500 hover:bg-emerald-600 px-3 py-2 text-white">
                                <svg class="w-6 h-6 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </button>
                            <button type="button" class="rounded bg-red-600 hover:bg-red-700 px-3 py-2 text-white"
                                @click="open = false">
                                <svg class="w-6 h-6 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <form action="{{ route('musics.destroy', ['music' => $singer->music->name, 'singer' => $singer->name]) }}"
            method="POST">
            @method('delete')
            @csrf
            <!-- delete container -->
            <div class="flex items-center justify-end p-3 bg-white rounded-md shadow-lg ring-1 ring-gray-200">
                <button class="btn bg-red-600 hover:bg-red-700">Delete</button>
            </div>
        </form>

    </main>
@endsection
