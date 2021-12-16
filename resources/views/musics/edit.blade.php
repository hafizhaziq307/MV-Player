@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-6">

        <!-- thumbnail container -->
        <div class="p-3 space-y-2 bg-white rounded-md shadow-lg ring-1 ring-gray-200">
            <div class="text-sm font-bold text-gray-500 ">Thumbnail</div>

            <div class="space-y-3">
                <div>
                    <img src="{{ $singer->music->thumbnail }}" alt="img"
                        class="w-40 rounded-md md:w-56 aspect-video ring-1 ring-gray-200">
                </div>
                <div>
                    <a href="" class="text-blue-600 hover:font-semibold hover:underline">Change thumbnail</a>
                </div>

            </div>
        </div>


        <form action="{{ route('musics.update', ['music' => $singer->music->name, 'singer' => $singer->name]) }}"
            method="POST">
            @csrf
            <!-- title music container -->
            <div class="p-3 space-y-2 bg-white rounded-md shadow-lg ring-1 ring-gray-200">
                <!-- container header -->
                <div class="mb-1 text-sm font-bold text-gray-500 ">Title</div>

                <div class="space-y-3">
                    <div>
                        <input type="text" name="newName" placeholder="music name" value="{{ $singer->music->name }}"
                            class="w-full text-lg text-black focus:outline-none">
                    </div>

                    <div class="flex justify-end">
                        <button
                            class="px-4 py-2 font-semibold text-gray-100 bg-blue-600 rounded-md hover:bg-blue-700">Save</button>
                    </div>
                </div>
            </div>
        </form>


        <form action="" method="POST">
            @csrf
            <!-- delete container -->
            <div class="flex items-center justify-end p-3 bg-white rounded-md shadow-lg ring-1 ring-gray-200">
                <button class="px-4 py-2 font-semibold text-gray-100 bg-red-600 rounded-md hover:bg-red-700">Delete</button>
            </div>
        </form>

    </main>
@endsection
