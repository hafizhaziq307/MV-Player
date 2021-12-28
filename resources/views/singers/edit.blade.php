@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-4 ">

        <!-- name -->
        <div class="card space-y-2">
            <p class="font-bold">Name</p>

            <div x-data="{ open : false }">
                <div x-show="!open" class="flex justify-between items-center">
                    <div class="ml-2">{{ $singer->name }}</div>
                    <button type="button" class="btn bg-gray-200 hover:bg-gray-300 text-gray-800"
                        @click="open = !open">Edit</button>
                </div>

                <form action="{{ route('singers.update', ['singer' => $singer->name]) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- container after clicked "EDIT" -->
                    <div x-show="open" class="flex justify-between items-center">
                        <input type="text" name="newname" class="w-full bg-gray-200 rounded p-2 mr-4"
                            value="{{ $singer->name }}">

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

        <!-- profile -->
        <form action="{{ route('singers.update', ['singer' => $singer->name]) }}" method="POST"
            enctype="multipart/form-data" x-data="{ open : false }">
            @csrf
            @method('PATCH')
            <div class="card flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <img src="{{ $singer->profile }}" alt="img"
                        class="rounded-full aspect-square w-24 ring-1 ring-gray-200">
                    <div class="font-bold">
                        <p>Image Size: Maximum 1 MB</p>
                        <P>Image Format: JPEG, PNG</P>
                    </div>
                </div>

                <button type="button" @click="open = !open"
                    class="btn bg-gray-200 hover:bg-gray-300 text-gray-800">Edit</button>
            </div>

            <!-- modal background -->
            <div x-show="open"
                class="fixed top-0 left-0 z-40 flex items-center justify-center w-screen h-screen bg-black/40">

                <!-- modal box -->
                <div @click.away="open = false"
                    class="w-[20rem] bg-gray-100 rounded h-[30vh] border p-4 flex flex-col justify-between">

                    <p class="text-center font-bold text-xl">Edit Image</p>

                    <input type="file" name="profile" accept="image/jpeg" class="input-file">

                    <button name="type" value="image" class="btn bg-blue-600 hover:bg-blue-700">Save</button>
                </div>
            </div>
        </form>

        <!-- delete button -->
        <form action="{{ route('singers.destroy', ['singer' => $singer->name]) }}" method="POST">
            @csrf
            @method('delete')
            <div class="card flex justify-end">
                <button class="btn bg-red-600 hover:bg-red-700">Delete</button>
            </div>
        </form>
    </main>
@endsection
