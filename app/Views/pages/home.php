<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div x-data="app">
    <header class="max-w-5xl mx-auto mb-10">

        <div class="flex justify-center h-full ">
            <button class="flex items-center w-1/3 p-2 text-gray-400 bg-white rounded-lg shadow-md" @click="toggle()">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>

                <p class="ml-4">Search singer</p>
            </button>
        </div>

        <!-- search modal -->
        <div x-show="open" class="fixed top-0 left-0 z-10 flex items-center justify-center w-screen h-screen bg-black bg-opacity-40">

            <div class="w-1/2 bg-gray-200 shadow-md rounded-xl h-5/6" @click.away="open = false">

                <header class="flex items-center p-2 m-6 bg-white rounded-lg shadow-md">
                    <svg class="text-blue-600 w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="search" placeholder="Search singer" x-model="search" class="w-full h-full ml-4 text-xl focus:outline-none">
                </header>

                <div class="h-5/6 space-y-8 overflow-y-auto px-2">

                    <template x-for="singer in filteredSingers">

                        <article class="grid grid-cols-12 gap-4">

                            <header class="col-span-2 bg-white rounded-lg p-3 grid place-items-center">

                                <div class=" w-full">
                                    <div class="mb-2">
                                        <img :src="singer.profile" alt="img" class="mx-auto singer-image ">
                                    </div>

                                    <p class="font-bold text-center line-clamp-2" x-text="singer.name">
                                    </p>
                                </div>

                            </header>


                            <div class="col-span-10 flex space-x-2 overflow-x-visible overflow-y-hidden p-2">

                                <template x-for="music in singer.musics">

                                    <div @click="setCurrentVideo(music.video)" class="w-32 h-32 flex-shrink-0 bg-white rounded-lg shadow-md transition-all transform hover:text-black hover:scale-105 select-none cursor-pointer">
                                        <img :src="music.thumbnail" alt="img" class="w-32 h-20 rounded-t-lg">
                                        <p class="px-2 py-1 text-sm line-clamp-2" x-text="music.name"></p>
                                    </div>

                                </template>

                                <template x-if="singer.musics.length === 0">
                                    <div>No musics!</div>
                                </template>

                            </div>
                        </article>
                    </template>

                    <template x-if="filteredSingers.length === 0">
                        <div class="ml-4">No singer!</div>
                    </template>
                </div>
            </div>
        </div>
    </header>


    <main class="max-w-5xl mx-auto">
        <video class="w-full rounded-lg" id="currentVid" poster="<?= "/images/default-thumbnail.jpg" ?>" controls>
            <source src="">
        </video>
    </main>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('app', () => ({
            open: false,
            search: "",
            singers: <?= json_encode($singers); ?>,

            toggle() {
                this.open = !this.open;
            },

            setCurrentVideo(vid) {
                let currentVid = document.getElementById("currentVid");
                currentVid.src = vid;
                currentVid.poster = "";
                currentVid.play();

                this.open = false;
            },

            get filteredSingers() {
                if (this.search === "") {
                    return this.singers;
                }

                return this.singers.filter((item) => {
                    return item.name
                        .toLowerCase()
                        .includes(this.search.toLowerCase());
                });
            }

        }))
    });
</script>

<?= $this->endSection() ?>