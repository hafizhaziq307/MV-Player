<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<header class="max-w-5xl mx-auto mb-6">
    <p class="text-2xl text-black">Edit singer</p>
</header>

<main class="max-w-5xl mx-auto">
    <div class="space-y-4">

        <form action="<?= route_to('singer_update', $singer->name) ?>" method="POST">

            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PATCH">

            <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500">
                <p class="mb-1 text-sm font-bold text-gray-500 ">Name</p>
                <input type="text" name="newName" placeholder="singer name" value="<?= $singer->name ?>" class="w-full text-lg text-black focus:outline-none">

                <div class="flex justify-end">
                    <button class="px-5 py-2 font-semibold text-gray-100 bg-blue-600 rounded-lg" name="type" value="name">SAVE</button>
                </div>
            </div>

        </form>

        <form action="<?= route_to('singer_update', $singer->name) ?>" method="POST" enctype="multipart/form-data">

            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PATCH">

            <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500">
                <p class="mb-1 text-sm font-bold text-gray-500 ">Profile image</p>
                <input type="file" name="profile" accept="image/jpeg" class="w-full">

                <div class="flex justify-end">
                    <button class="px-5 py-2 font-semibold text-gray-100 bg-yellow-600 rounded-lg" name="type" value="profile">UPLOAD</button>
                </div>
            </div>
        </form>

        <form action="<?= route_to('singer_delete', $singer->name) ?>" method="POST">
            <input type="hidden" name="singerName" value="<?= $singer->name  ?>">

            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">

            <div class="bg-white rounded-lg p-2 flex justify-end ring-2 ring-gray-300">
                <button class="px-5 py-2 font-semibold text-gray-100 bg-red-600 rounded-lg">DELETE</button>
            </div>
        </form>

    </div>
</main>

<?= $this->endSection() ?>