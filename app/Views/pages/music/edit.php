<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<header class="max-w-5xl mx-auto mb-6">
    <p class="text-2xl text-black">Edit music</p>
</header>

<main class="max-w-5xl mx-auto">
    <div class="space-y-4">

        <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 ">
            <p class="mb-1 text-sm font-bold text-gray-500 ">Thumbnail</p>

            <img src="<?= $singer->music->thumbnail ?>" alt="img" class="w-40 h-28 rounded-lg ring-2 ring-gray-300">

            <a href="<?= route_to('thumbnail_create', $singer->music->name, $singer->name) ?>" class="font-bold text-blue-600 hover:underline">Click Here to Change Thumbnail</a>
        </div>


        <form action="<?= route_to('music_update', $singer->music->name, $singer->name) ?>" method="POST">

            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PATCH">

            <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500">
                <p class="mb-1 text-sm font-bold text-gray-500 ">Name</p>
                <input type="text" name="newName" placeholder="music name" value="<?= $singer->music->name ?>" class="w-full text-lg text-black focus:outline-none">

                <div class="flex justify-end">
                    <button class="px-5 py-2 font-semibold text-gray-100 bg-blue-600 rounded-lg">SAVE</button>

                </div>
            </div>

        </form>

        <form action="<?= route_to('music_delete', $singer->music->name, $singer->name) ?>" method="POST">

            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">

            <div class="bg-white rounded-lg p-2 flex justify-end ring-2 ring-gray-300">
                <button class="px-5 py-2 font-semibold text-gray-100 bg-red-600 rounded-lg">DELETE</button>
            </div>

        </form>

    </div>
</main>

<?= $this->endSection() ?>