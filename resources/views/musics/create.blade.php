@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-4 ">

        <p class="text-2xl text-black">New Music</p>

        <form action="{{ route('musics.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">

            @csrf

            <!-- file -->
            <div class="p-3 space-y-2 bg-white rounded-md shadow-lg ring-1 ring-gray-200">
                <!-- container header -->
                <div class="mb-1 text-sm font-bold text-gray-500 ">Music file</div>

                <div>
                    <input type="file" name="file" accept="video/webm"
                        class="file:cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
            </div>

            <!-- title -->
            <div class="p-3 space-y-2 bg-white rounded-md shadow-lg ring-1 ring-gray-200">
                <!-- container header -->
                <div class="mb-1 text-sm font-bold text-gray-500 ">Title</div>

                <div>
                    <input type="text" name="name" placeholder="music name"
                        class="w-full text-lg text-black focus:outline-none">
                </div>
            </div>

            <div class="space-y-2 h-full max-h-[50vh] md:max-h-[50vh] flex flex-col">
                <div class="mb-1 text-sm font-bold text-gray-500 ">Choose singer</div>

                <div class="grid grid-cols-1 gap-4 px-2 overflow-y-auto sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($singers as $key => $singer)
                        <article>
                            <input type="radio" name="singer" value="{{ $singer->name }}" id="{{ $key }}"
                                class="hidden peer">

                            <label for="{{ $key }}"
                                class="flex items-center p-2 space-x-2 bg-white rounded-md shadow-md cursor-pointer select-none ring-2 ring-gray-200 peer-checked:bg-blue-700 peer-checked:text-white group">
                                <img src="{{ $singer->profile }}" alt="img"
                                    class="object-cover w-16 rounded-full aspect-square ring-2 ring-white">
                                <p class="font-bold sm:text-lg">{{ $singer->name }}</p>
                            </label>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end">
                <button class="px-4 py-2 font-semibold text-gray-100 bg-blue-600 rounded-md" type="submit">SAVE</button>
            </div>
        </form>
    </main>
@endsection
