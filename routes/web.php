<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PCategoryController,BannerController, CategoryController, FaqController, FrontController, GeneralController, LinkController, PageController, PartnerController,  PortfolioController, PostController, ServiceController, TagController, TestimonialController, TeamController, UserController,PricingController,LocalizationController};

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index'])->name('lang');
Route::get('/', [FrontController::class, 'home'])->name('homepage');
Route::post('subscribe', [FrontController::class, 'subscribe'])->name('subscribe');
Route::get('about-us', [FrontController::class, 'about'])->name('about');
Route::get('testimonials', [FrontController::class, 'testi'])->name('testi');
Route::get('services', [FrontController::class, 'service'])->name('service');
Route::get('services/{slug}', [FrontController::class, 'serviceshow'])->name('serviceshow');
Route::get('portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('portfolio/{slug}', [FrontController::class, 'portfolioshow'])->name('portfolioshow');
Route::get('blog', [FrontController::class, 'blog'])->name('blog');
Route::get('blog/search',[FrontController::class, 'search'])->name('search');
Route::get('blog/{slug}', [FrontController::class, 'blogshow'])->name('blogshow');
Route::get('categories/{category:slug}',[FrontController::class, 'category'])->name('category');
Route::get('tags/{tag:slug}',[FrontController::class, 'tag'])->name('tag');
Route::get('pages/{slug}', [FrontController::class, 'page'])->name('page');
Route::get('dish/{id}', [FrontController::class, 'dish'])->name('dish');
Route::post('comment', [FrontController::class, 'addComment'])->name('comment.create');




Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [GeneralController::class, 'dashboard'])->name('admin.dashboard');
    // General settings
    Route::get('general-settings', [GeneralController::class, 'general'])->name('admin.general');
    Route::post('general-settings', [GeneralController::class, 'generalUpdate'])->name('admin.general.update');
    // About
    Route::get('about', [GeneralController::class, 'about'])->name('admin.about');
    Route::post('about', [GeneralController::class, 'aboutUpdate'])->name('about.update');
     // Manage Portfolio
    Route::get('portfolio', [PortfolioController::class, 'index'])->name('admin.portfolio');
    Route::get('portfolio/create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('portfolio/create', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::get('portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::post('portfolio/edit/{id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('portfolio/destroy/{id}',[PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');
    // Manage pricing
    Route::get('pricing', [PricingController::class, 'index'])->name('admin.pricing');
    Route::get('pricing/create', [PricingController::class, 'create'])->name('admin.pricing.create');
    Route::post('pricing/create', [PricingController::class, 'store'])->name('admin.pricing.store');
    Route::get('pricing/edit/{id}', [PricingController::class, 'edit'])->name('admin.pricing.edit');
    Route::post('pricing/edit/{id}', [PricingController::class, 'update'])->name('admin.pricing.update');
    Route::delete('pricing/destroy/{id}',[PricingController::class, 'destroy'])->name('admin.pricing.destroy');
     // Manage Admin
     Route::get('users', [UserController::class, 'index'])->name('admin.user');
     Route::post('users/{id}', [UserController::class, 'changepassword'])->name('admin.user.changepassword');
     Route::get('users/create', [UserController::class, 'create'])->name('admin.user.create');
     Route::post('users/create', [UserController::class, 'store'])->name('admin.user.store');
     Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
     Route::post('users/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');
     Route::delete('users/destroy/{id}',[UserController::class, 'destroy'])->name('admin.user.destroy');
     //Mange Dishes
    Route::resource('dishes',\App\Http\Controllers\DishController::class);
    //Mange Comments
    Route::get('comments', [ReviewController::class, 'index'])->name('admin.comments');
    Route::post('comments/status/{id}',[ReviewController::class, 'changeStatus'])->name('admin.comment.status');

    Route::get('contacts',[\App\Http\Controllers\SubscriberController::class,'index'])->name('admin.contacts');

});
