@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto" x-data="app">


        <!-- header page -->
        <header class="flex justify-center w-full mb-8">
            <!-- search button -->
            <button @click="toogle()" class="flex items-center p-2 space-x-2 bg-white rounded-lg shadow-md w-80">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>

                <p class="text-base lg:text-lg">Search singer</p>
            </button>
        </header>

        <!-- video player -->
        <div class="w-full aspect-video">
            <video id="video" src="/" poster=" {{ asset('images/default-thumbnail.jpg') }}" class="w-full rounded-lg" loop>
            </video>
        </div>

        <!-- search modal -->
        <div x-show="open" class="fixed top-0 left-0 z-40 flex items-center justify-center w-screen h-screen bg-black/40">

            <div class="w-full max-w-5xl bg-gray-100 shadow-md md:rounded-xl h-[100vh] md:h-[95vh] divide-y divide-solid divide-gray-300 flex flex-col"
                @click.away="open = false">

                <!-- search -->
                <div>
                    <header class="flex items-center w-full px-3">
                        <!-- input -->
                        <div class="flex items-center w-full">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>

                            <input type="text" placeholder="Search singer / music title" x-model="search" id="searchbox"
                                class="w-full h-full p-2 my-1 text-lg bg-transparent focus:outline-none ">
                        </div>

                        <!-- close button -->
                        <button @click="open = false">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                    </header>
                </div>

                <!--   list musics -->
                <div class="h-full px-10 py-5 overflow-y-auto">
                    <!--  exists -->
                    <div class="grid grid-cols-2 gap-3 place-items-center md:grid-cols-3 md:gap-6 xl:grid-cols-4">
                        <template x-for="music in filteredMusics">

                            <!-- music card -->
                            <article @click="setVideo(music.video)"
                                class="relative flex-none block w-full rounded-md shadow-md cursor-pointer select-none aspect-video group ring-1 ring-gray-200">
                                <!-- card image -->
                                <img :src="music.thumbnail" alt="img" class="object-cover w-full rounded-md aspect-video">
                                <!-- card title -->
                                <span
                                    class="absolute top-0 grid w-full h-full text-center text-white transition bg-gray-800 rounded-md opacity-0 group-hover:opacity-[0.85] text-sm md:text-base place-content-center"
                                    x-text="music.title">
                                </span>
                            </article>

                        </template>

                    </div>

                    <!-- not exists -->
                    <template x-if="filteredMusics.length === 0">
                        <div class="grid w-full h-[80vh] place-content-center">
                            <p class="text-lg">Not Found</p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </main>

    <script>
        const video = document.getElementById("video");
        const searchbox = document.getElementById("searchbox");


        document.addEventListener('alpine:init', () => {
            Alpine.data('app', () => ({
                search: "",
                open: false,
                musics: @json($musics),

                toogle() {
                    if (this.open === false) {
                        searchbox.value = "";
                        this.search = "";
                    }
                    this.open = !this.open;
                },

                setVideo(vid) {
                    video.src = vid;
                    video.poster = "";
                    video.controls = true;
                    video.play();

                    this.open = false;
                },

                get filteredMusics() {
                    if (this.search === "") {
                        return this.musics;
                    }

                    return this.musics.filter((item) => {
                        return item.title.toLowerCase().includes(this.search
                            .toLowerCase()) || item.artist.toLowerCase().includes(this
                            .search
                            .toLowerCase());
                    });
                }
            }))
        });
    </script>
@endsection
