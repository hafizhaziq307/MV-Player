@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-4 ">
        <header class="text-2xl font-bold">
            <p>Musics</p>
        </header>

        <form action="{{ route('singers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">
                <div class="card space-y-2">
                    <p class="font-bold">Name</p>
                    <input type="text" name="name" placeholder="singer name"
                        class="w-full text-lg text-black focus:outline-none ">
                </div>

                <div class="card space-y-2">
                    <p class="font-bold">Profile image</p>
                    <input type="file" name="profile" accept="image/jpeg" class="input-file">
                </div>

                <div class="card flex justify-end">
                    <button class="btn bg-blue-600 hover:bg-blue-700">SAVE</button>
                </div>
            </div>
        </form>
    </main>
@endsection
