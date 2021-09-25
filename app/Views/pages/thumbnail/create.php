<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<header class="max-w-5xl mx-auto mb-6">
    <p class="text-2xl text-black">Thumbnail</p>
</header>

<main class="max-w-5xl mx-auto">

    <!-- generate -->
    <section>
        <canvas id="canvas" width="320" height="180" class="hidden"></canvas>

        <div class="flex justify-between mb-4">
            <!-- input -->
            <video id="video" class="max-w-2xl rounded-lg" controls>
                <source src="<?= $singer->music->video ?>">
            </video>

            <!-- output -->
            <div class="p-3 space-y-2 bg-white rounded-lg shadow-md " style="width: 330px">
                <img id="imgConverted" src="/images/default-thumbnail.jpg" alt="img" class="w-full rounded-lg ring-2 ring-gray-300" style="height: 180px;">

                <button id="btnDownload" class="w-full py-3 text-lg font-bold text-white bg-blue-600 rounded-lg">DOWNLOAD</button>
            </div>

        </div>
    </section>

    <!-- Upload -->
    <form action="<?= route_to('thumbnail_save') ?>" enctype="multipart/form-data" method="POST">

        <input type="hidden" name="singer" value="<?= $singer->name ?>">
        <input type="hidden" name="songname" value="<?= $singer->music->name ?>">

        <div class="p-2 bg-white rounded-lg shadow-md flex items-center justify-between2">
            <input type="file" name="file" accept="image/jpeg" class="w-full">

            <button class="px-3 py-2 font-bold text-white bg-yellow-600 rounded-lg ">UPLOAD</button>
        </div>

    </form>

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

<?= $this->endSection() ?>