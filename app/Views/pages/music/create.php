<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<header class="max-w-5xl mx-auto mb-6">
    <p class="text-2xl text-black">New Music</p>
</header>

<main class="max-w-5xl mx-auto">

    <form action="<?= route_to('music_save') ?>" method="POST" enctype="multipart/form-data" class="space-y-4">

        <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500">
            <header class="mb-1 text-sm font-bold text-gray-500 ">Music File</header>
            <input type="file" name="file" accept="video/webm" class="w-full">
        </div>

        <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500">
            <p class="mb-1 text-sm font-bold text-gray-500 ">Name</p>
            <input type="text" name="name" placeholder="music name" class="w-full text-lg text-black focus:outline-none">
        </div>

        <div>
            <header class="mb-1 text-sm font-bold text-gray-500 ">Choose singer</header>
            <div class="grid grid-cols-3 gap-4">
                <?php foreach ($singers as $key => $singer) : ?>

                    <div>
                        <input type="radio" name="singer" value="<?= $singer->name ?>" id="<?= $key ?>" class="hidden peer">

                        <label for="<?= $key ?>" class="flex items-center p-2 space-x-2 bg-white rounded-lg shadow-md cursor-pointer select-none peer-checked:bg-blue-600 peer-checked:text-white">
                            <img src="<?= $singer->profile ?>" alt="img" class="singer-image">
                            <p class="font-bold sm:text-lg"><?= $singer->name ?></p>
                        </label>
                    </div>

                <?php endforeach ?>
            </div>
        </div>

        <div class="flex justify-end">
            <button class="px-5 py-2 font-semibold text-gray-100 bg-blue-600 rounded-lg">SAVE</button>
        </div>

    </form>

</main>

<?= $this->endSection() ?>