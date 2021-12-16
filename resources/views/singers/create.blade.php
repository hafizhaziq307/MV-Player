@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-4 ">
        <header class="text-2xl font-bold">
            <p>Musics</p>
        </header>

        <form action="{{ route('singers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">
                <div class="relative p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500">
                    <p class="mb-1 text-sm font-bold text-gray-500 ">Name</p>
                    <input type="text" name="name" placeholder="singer name"
                        class="w-full text-lg text-black focus:outline-none ">
                </div>

                <div class="relative p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500">
                    <p class="mb-1 text-sm font-bold text-gray-500 ">Profile image</p>
                    <input type="file" name="profile" accept="image/jpeg" class="w-full">
                </div>

                <div class="flex justify-end">
                    <button class="px-5 py-2 font-semibold text-gray-100 bg-blue-600 rounded-lg">SAVE</button>
                </div>
            </div>
        </form>
    </main>
@endsection
