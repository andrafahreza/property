<?php

use App\Http\Controllers\Back\AbilityController;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\HomeController;
use App\Http\Controllers\Back\MessageController;
use App\Http\Controllers\Back\PackageController;
use App\Http\Controllers\Back\ProfileController;
use App\Http\Controllers\Back\ProjectsController;
use App\Http\Controllers\Back\TestimoniController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, "index"])->name("index");
Route::post('/', [FrontController::class, "message"])->name('send-message');
Route::get('loginlur', [AuthController::class, "index"]);
Route::post('loginlur', [AuthController::class, "auth"])->name('loginlur');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::group(["prefix" => "profile"], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::post('/', [ProfileController::class, 'save_profile'])->name('save_profile');
        Route::post('change-pass', [ProfileController::class, 'change_pass'])->name('change-pass');
    });

    Route::group(["prefix" => "ability"], function () {
        Route::get('/', [AbilityController::class, 'index'])->name('ability');
        Route::post('list-ability', [AbilityController::class, 'list_ability'])->name('list-ability');
        Route::get('show-ability/{id?}', [AbilityController::class, 'show_ability'])->name('show-ability');
        Route::post('save-ability/{id?}', [AbilityController::class, 'save_ability'])->name('save-ability');
        Route::get('delete-ability/{id?}', [AbilityController::class, 'delete_ability'])->name('delete-ability');
        Route::post('save-clients', [AbilityController::class, 'save_clients'])->name('save-clients');
    });

    Route::group(["prefix" => "projects"], function () {
        Route::get('/', [ProjectsController::class, 'index'])->name('projects');
        Route::post('list-projects', [ProjectsController::class, 'list_projects'])->name('list-projects');
        Route::post('save-projects/{id?}', [ProjectsController::class, 'save_projects'])->name('save-projects');
        Route::get('delete-projects/{id?}', [ProjectsController::class, 'delete_projects'])->name('delete-projects');
    });

    Route::group(["prefix" => "testimoni"], function () {
        Route::get('/', [TestimoniController::class, 'index'])->name('testimoni');
        Route::post('list-testimoni', [TestimoniController::class, 'list_testimoni'])->name('list-testimoni');
        Route::post('save-testimoni/{id?}', [TestimoniController::class, 'save_testimoni'])->name('save-testimoni');
        Route::get('delete-testimoni/{id?}', [TestimoniController::class, 'delete_testimoni'])->name('delete-testimoni');
    });

    Route::group(["prefix" => "package"], function () {
        Route::get('/', [PackageController::class, 'index'])->name('package');
        Route::post('list-package', [PackageController::class, 'list_package'])->name('list-package');
        Route::post('save-package/{id?}', [PackageController::class, 'save_package'])->name('save-package');
        Route::get('delete-package/{id?}', [PackageController::class, 'delete_package'])->name('delete-package');

        Route::group(["prefix" => "sub-package"], function () {
            Route::get('sub/{id}', [PackageController::class, 'sub_package'])->name('sub-package');
            Route::post('list/{id?}', [PackageController::class, 'list_sub_package'])->name('list-sub-package');
            Route::post('save/{id?}', [PackageController::class, 'save_sub_package'])->name('save-sub-package');
            Route::get('delete/{id?}', [PackageController::class, 'delete_sub_package'])->name('delete-sub-package');
        });
    });

    Route::group(["prefix" => "message"], function () {
        Route::get('/', [MessageController::class, 'index'])->name('message');
        Route::get('read/{id?}', [MessageController::class, 'read'])->name('read-message');
        Route::get('star/{id?}', [MessageController::class, 'star'])->name('star-message');
        Route::get('trash/{id?}', [MessageController::class, 'trash'])->name('trash-message');
    });
});
