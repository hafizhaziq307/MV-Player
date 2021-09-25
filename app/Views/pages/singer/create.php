<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<header class="max-w-5xl mx-auto mb-6">
    <p class="text-2xl text-black">New singer</p>
</header>

<main class="max-w-5xl mx-auto">

    <form action="<?= route_to('singer_save') ?>" method="POST" enctype="multipart/form-data" class="space-y-4">

        <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500 relative">
            <p class="mb-1 text-sm font-bold text-gray-500 ">Name</p>
            <input type="text" name="name" placeholder="singer name" class="w-full text-lg text-black focus:outline-none ">
        </div>

        <div class="p-3 bg-white rounded-md group ring-2 ring-gray-300 focus-within:ring-gray-500 relative">
            <p class="mb-1 text-sm font-bold text-gray-500 ">Profile image</p>
            <input type="file" name="profile" accept="image/jpeg" class="w-full">
        </div>

        <div class="flex justify-end">
            <button class="px-5 py-2 font-semibold text-gray-100 bg-blue-600 rounded-lg">SAVE</button>
        </div>

    </form>
</main>

<?= $this->endSection() ?>