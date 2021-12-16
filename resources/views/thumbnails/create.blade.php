@extends('layouts.app')

@section('content')
    <main class="max-w-5xl mx-auto space-y-4 ">
        <!-- page header -->
        <header class="text-2xl font-bold">
            <p>Thumbnail</p>
        </header>

        <!-- hidden tag -->
        <canvas id="canvas" width="320" height="180" class="hidden"></canvas>


        <!-- page content -->
        <div class="space-y-4">

            <!-- generate thumbnail -->
            <div class=" space-y-6 md:space-y-0 md:grid grid-cols-3 gap-6 ">
                <div class="col-span-2 card ">
                    <video id="video" class="aspect-video rounded-md " controls>
                        <source src="{{ $singer->music->video }}">
                    </video>
                </div>

                <div class="card space-y-3">
                    <img id="imgConverted" src="/images/default-thumbnail.jpg" alt="img"
                        class="w-full rounded-md ring-2 ring-gray-300 aspect-video">

                    <button id="btnDownload" class="btn w-full bg-blue-600 hover:bg-blue-700">DOWNLOAD</button>
                </div>
            </div>


            <!-- upload thumbnail -->
            <form action="{{ route('thumbnails.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" name="singer" value="{{ $singer->name }}">
                <input type="hidden" name="songname" value="{{ $singer->music->name }}">

                <div class="card flex items-center justify-between">
                    <input type="file" name="video" accept="image/jpeg" class="input-file">

                    <button class="btn bg-amber-600 hover:bg-amber-700">UPLOAD</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        let btnDownload = document.getElementById("btnDownload");
        let video = document.getElementById("video");
        let canvas = document.getElementById("canvas");
        let imgConverted = document.getElementById("imgConverted");

        video.volume = 0.3;

        btnDownload.addEventListener("click", function() {
            downloadImage();
        });

        video.addEventListener("seeked", function() {
            displayImage();
        });

        video.addEventListener("pause", function() {
            displayImage();
        });

        let downloadImage = function() {
            const a = document.createElement("a");
            document.body.appendChild(a);
            a.href = canvas.toDataURL("image/jpeg");
            a.download = "<?= $singer->music->name ?>";
            a.click();
            document.body.removeChild(a);
        }

        let displayImage = function() {
            let ctx = canvas.getContext("2d");
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height)
            imgConverted.src = canvas.toDataURL("image/jpeg");
        }
    </script>

@endsection
