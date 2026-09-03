<?php

use App\Http\Controllers\Admin\AccessoryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CarClubEventController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DealerController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\InstallController;
use App\Http\Controllers\Admin\MagazineController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\NavItemController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\PartnerLinkController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.attempt');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('nav-items', NavItemController::class)->except(['show']);

        Route::middleware('can:manage-admins')->group(function () {
            Route::resource('users', AdminUserController::class)->except(['show']);
        });

        Route::resource('industries', IndustryController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('news', NewsController::class)->except(['show']);
        Route::resource('faqs', FaqController::class)->except(['show']);
        Route::resource('accessories', AccessoryController::class)->except(['show']);
        Route::resource('dealers', DealerController::class)->except(['show']);
        Route::resource('partner-links', PartnerLinkController::class)->except(['show']);

        Route::resource('magazines', MagazineController::class)->except(['show']);
        Route::delete('magazine-pages/{page}', [MagazineController::class, 'destroyPage'])->name('magazines.pages.destroy');

        Route::resource('installs', InstallController::class)->except(['show']);
        Route::delete('install-photos/{photo}', [InstallController::class, 'destroyPhoto'])->name('installs.photos.destroy');

        Route::resource('car-club-events', CarClubEventController::class)->except(['show']);
        Route::delete('car-club-event-photos/{photo}', [CarClubEventController::class, 'destroyPhoto'])->name('car-club-events.photos.destroy');

        Route::resource('cms-pages', CmsPageController::class)->except(['show']);

        Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('enquiries/{enquiry}', [EnquiryController::class, 'show'])->name('enquiries.show');
        Route::put('enquiries/{enquiry}', [EnquiryController::class, 'update'])->name('enquiries.update');
        Route::delete('enquiries/{enquiry}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

        Route::get('pages/landing', [PageContentController::class, 'editLanding'])->name('pages.landing.edit');
        Route::put('pages/landing', [PageContentController::class, 'updateLanding'])->name('pages.landing.update');
        Route::get('pages/home', [PageContentController::class, 'editHome'])->name('pages.home.edit');
        Route::put('pages/home', [PageContentController::class, 'updateHome'])->name('pages.home.update');
        Route::get('pages/about', [PageContentController::class, 'editAbout'])->name('pages.about.edit');
        Route::put('pages/about', [PageContentController::class, 'updateAbout'])->name('pages.about.update');
        Route::get('pages/contact', [PageContentController::class, 'editContact'])->name('pages.contact.edit');
        Route::put('pages/contact', [PageContentController::class, 'updateContact'])->name('pages.contact.update');
        Route::get('pages/systems', [PageContentController::class, 'editSystems'])->name('pages.systems.edit');
        Route::put('pages/systems', [PageContentController::class, 'updateSystems'])->name('pages.systems.update');
        Route::get('pages/advantages', [PageContentController::class, 'editAdvantages'])->name('pages.advantages.edit');
        Route::put('pages/advantages', [PageContentController::class, 'updateAdvantages'])->name('pages.advantages.update');
        Route::get('pages/prelube', [PageContentController::class, 'editPrelube'])->name('pages.prelube.edit');
        Route::put('pages/prelube', [PageContentController::class, 'updatePrelube'])->name('pages.prelube.update');
        Route::get('pages/applications-hub', [PageContentController::class, 'editApplicationsHub'])->name('pages.applications-hub.edit');
        Route::put('pages/applications-hub', [PageContentController::class, 'updateApplicationsHub'])->name('pages.applications-hub.update');
        Route::get('pages/accessories', [PageContentController::class, 'editAccessories'])->name('pages.accessories.edit');
        Route::put('pages/accessories', [PageContentController::class, 'updateAccessories'])->name('pages.accessories.update');
        Route::get('pages/custom-house', [PageContentController::class, 'editCustomHouse'])->name('pages.custom-house.edit');
        Route::put('pages/custom-house', [PageContentController::class, 'updateCustomHouse'])->name('pages.custom-house.update');
    });
});
