<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<header class="max-w-5xl mx-auto mb-6">
    <div class="flex justify-between">

        <p class="text-2xl">Musics</p>

        <?php if (!empty($singers)) : ?>
            <a href="<?= route_to('music_create') ?>" class="flex items-center text-lg text-gray-600 transition-colors hover:text-black">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                <p>New Music</p>
            </a>
        <?php endif ?>

    </div>
</header>

<main class="max-w-5xl mx-auto space-y-8">

    <?php if (!empty($singers)) : ?>

        <?php foreach ($singers as $singer) : ?>

            <article class="grid grid-cols-12 gap-4 ">
                <header class="col-span-2 bg-white rounded-lg p-3 grid place-items-center">

                    <div class=" w-full">
                        <div class="mb-2">
                            <img src="<?= $singer->profile ?>" alt="img" class="mx-auto singer-image ">
                        </div>

                        <div class="font-bold text-center line-clamp-2">
                            <?= $singer->name ?>
                        </div>
                    </div>

                </header>

                <?php if (!empty($singer->musics)) : ?>

                    <div class="col-span-10">

                        <div class="flex space-x-2 overflow-x-visible overflow-y-hidden p-2">
                            <?php foreach ($singer->musics as $music) : ?>

                                <a href="<?= route_to('music_edit', $music->name, $singer->name) ?>" class="flex-shrink-0 w-48 h-40 bg-white rounded-lg shadow-md transition-all transform hover:text-black hover:scale-105">
                                    <img src="<?= $music->thumbnail ?>" alt="img" class="w-48 h-28 rounded-t-lg">
                                    <p class="px-2 py-3 text-sm line-clamp-1"><?= $music->name ?></p>
                                </a>

                            <?php endforeach ?>
                        </div>

                    </div>

                <?php else : ?>
                    <div>No songs!</div>
                <?php endif ?>

            </article>

        <?php endforeach ?>

    <?php else : ?>
        <div>No songs!</div>
    <?php endif ?>


</main>

<?= $this->endSection() ?>