<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ThumbnailController;

Route::get('/', [PageController::class, 'home'])->name('home');


/**
 * singer route
 */
Route::group(['prefix' => 'singers'], function () {
    Route::get('/', [SingerController::class, 'index'])->name('singers.index');
    Route::get('/create', [SingerController::class, 'create'])->name('singers.create');
    Route::get('/{singer}/edit', [SingerController::class, 'edit'])->name('singers.edit');
    Route::post('/', [SingerController::class, 'store'])->name('singers.store');
    Route::patch('/{singer}', [SingerController::class, 'update'])->name('singers.update');
    Route::delete('/{singer}', [SingerController::class, 'destroy'])->name('singers.destroy');
});


/**
 * music route
 */
Route::group(['prefix' => 'musics'], function () {
    Route::get('/', [MusicController::class, 'index'])->name('musics.index');
    Route::get('/create', [MusicController::class, 'create'])->name('musics.create');
    Route::get('/{music}/singers/{singer}/edit', [MusicController::class, 'edit'])->name('musics.edit');
    Route::post('/', [MusicController::class, 'store'])->name('musics.store');

    Route::patch('/{singer}/{music}', [MusicController::class, 'update'])->name('musics.update');
    Route::delete('/{singer}/{music}', [MusicController::class, 'destroy'])->name('musics.destroy');
});


/**
 * thumbnail route
 */
Route::group(['prefix' => 'thumbnails'], function () {
    Route::get('/{singer}/{music}/edit', [ThumbnailController::class, 'create'])->name('thumbnails.create');
    Route::post('/', [ThumbnailController::class, 'store'])->name('thumbnails.store');
});
