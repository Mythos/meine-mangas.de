<?php

use App\Http\Livewire\Administration\Pages\CreatePage;
use App\Http\Livewire\Administration\Pages\EditPage;
use App\Http\Livewire\Administration\Pages\PagesTable;
use App\Http\Livewire\Administration\Pages\ShowPage;
use App\Http\Livewire\Home;
use App\Http\Livewire\User\Profile\ChangePassword;
use App\Http\Livewire\User\Profile\DeleteProfile;
use App\Http\Livewire\User\Profile\ShowProfile;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('pages/{page}', ShowPage::class)->name('pages.show');
Route::middleware(['auth'])->group(function (): void {
    Route::get('/', Home::class)->name('home');

    Route::get('files/{filename}', function ($filename) {
        $file = Storage::disk('local')->get($filename);
        $image = Image::make($file);

        $response = Response::make($image->encode());
        $response->header('Content-Type', $image->mime());
        $expires = 60 * 60 * 24 * 30;
        $response->setMaxAge($expires);

        return $response;
    });

    Route::get('profile', ShowProfile::class)->name('profile');
    Route::get('profile/change-password', ChangePassword::class)->name('change-password');
    Route::get('profile/delete', DeleteProfile::class)->name('delete-profile');

    Route::prefix('admin')->group(function (): void {
        Route::get('pages', PagesTable::class)->name('pages.index');
        Route::get('pages/new', CreatePage::class)->name('pages.create');
        Route::get('pages/{page}', EditPage::class)->name('pages.edit');
    });
});
