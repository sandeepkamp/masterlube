<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CarClubController;
use App\Http\Controllers\CmsPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerLinkController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';

Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/systems', [PageController::class, 'systems'])->name('systems');
Route::get('/our-advantages', [PageController::class, 'advantages'])->name('our-advantages');
Route::get('/prelube', [PageController::class, 'prelube'])->name('prelube');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [EnquiryController::class, 'storeContact'])->name('contact.store');
Route::post('/enquiries/quick', [EnquiryController::class, 'storeQuick'])->name('enquiries.quick.store');

Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/applications/{industry:slug}', [ApplicationController::class, 'show'])->name('applications.show');

Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/new-stuff', [NewsController::class, 'index'])->name('new-stuff.index');
Route::get('/new-stuff/{news:slug}', [NewsController::class, 'show'])->name('new-stuff.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faqml', fn (FaqController $c) => $c->category('masterlube'))->name('faq.ml');
Route::get('/faqtl', fn (FaqController $c) => $c->category('turbolube'))->name('faq.tl');
Route::get('/faqquick', fn (FaqController $c) => $c->category('quick_connect'))->name('faq.quick');
Route::get('/faqcommercial', fn (FaqController $c) => $c->category('commercial'))->name('faq.commercial');

Route::get('/staff', [AccessoryController::class, 'index'])->name('staff.index');
Route::get('/custom-house', [AccessoryController::class, 'customHouse'])->name('custom-house.show');
Route::get('/dealers', [DealerController::class, 'index'])->name('dealers.index');
Route::get('/link', [PartnerLinkController::class, 'index'])->name('link.index');

Route::get('/magazines', [MagazineController::class, 'index'])->name('magazines.index');
Route::get('/installs', [InstallController::class, 'index'])->name('installs.index');
Route::get('/carclubs', [CarClubController::class, 'index'])->name('carclubs.index');

// Flexible CMS pages catch-all — must stay last so it never shadows a named route above.
Route::get('/{cmsPage:slug}', [CmsPageController::class, 'show'])->name('cms.show');
