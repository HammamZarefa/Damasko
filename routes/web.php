<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BannerController, CategoryController, FaqController, FrontController, GeneralController, LinkController, PageController, PartnerController, PcategoryController, PortfolioController, PostController, ServiceController, TagController, TestimonialController, TeamController, UserController};

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
Route::get('/', [FrontController::class, 'home'])->name('homepage');
Route::post('/', [FrontController::class, 'subscribe'])->name('subscribe');
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

    // Manage Banner
    Route::get('banner', [BannerController::class, 'index'])->name('admin.banner');
    Route::get('banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('banner/create', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::post('banner/edit/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
    Route::delete('banner/destroy/{id}',[BannerController::class, 'destroy'])->name('admin.banner.destroy');

     // Manage Portfolio Categories
     Route::get('portfolio-categories', [PcategoryController::class, 'index'])->name('admin.pcategory');
     Route::post('portfolio-categories', [PcategoryController::class, 'store'])->name('admin.pcategory.store');
     Route::get('Portfolio-categories/edit/{id}', [PcategoryController::class, 'edit'])->name('admin.pcategory.edit');
     Route::post('Portfolio-categories/edit/{id}', [PcategoryController::class, 'update'])->name('admin.pcategory.update');
     Route::delete('Portfolio-categories/destroy/{id}',[PcategoryController::class, 'destroy'])->name('admin.pcategory.destroy');

     // Manage Portfolio
    Route::get('portfolio', [PortfolioController::class, 'index'])->name('admin.portfolio');
    Route::get('portfolio/create', [PortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('portfolio/create', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::get('portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::post('portfolio/edit/{id}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('portfolio/destroy/{id}',[PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');

     // Manage Categories
     Route::get('categories', [CategoryController::class, 'index'])->name('admin.category');
     Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
     Route::post('categories/create', [CategoryController::class, 'store'])->name('admin.category.store');
     Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
     Route::post('categories/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
     Route::delete('categories/destroy/{id}',[CategoryController::class, 'destroy'])->name('admin.category.destroy');

     // Manage Tags
     Route::get('tags', [TagController::class, 'index'])->name('admin.tag');
     Route::get('tags/create', [TagController::class, 'create'])->name('admin.tag.create');
     Route::post('tags/create', [TagController::class, 'store'])->name('admin.tag.store');
     Route::get('tags/edit/{id}', [TagController::class, 'edit'])->name('admin.tag.edit');
     Route::post('tags/edit/{id}', [TagController::class, 'update'])->name('admin.tag.update');
     Route::delete('tags/destroy/{id}',[TagController::class, 'destroy'])->name('admin.tag.destroy');

     // Manage Blog
    Route::get('post',[PostController::class, 'index'])->name('admin.post');

    Route::get('post/create',[PostController::class, 'create'])->name('admin.post.create');

    Route::post('post/create',[PostController::class, 'store'])->name('admin.post.store');

    Route::get('post/edit/{id}',[PostController::class, 'edit'])->name('admin.post.edit');

    Route::post('post/edit/{id}',[PostController::class, 'update'])->name('admin.post.update');

    Route::get('post/trash',[PostController::class, 'trash'])->name('admin.post.trash');

    Route::post('post/{id}/restore',[PostController::class, 'restore'])->name('admin.post.restore');

    Route::delete('post/trash/{id}',[PostController::class, 'destroy'])->name('admin.post.destroy');

    Route::delete('post/destroy/{id}',[PostController::class, 'deletePermanent'])->name('admin.post.deletePermanent');

    // Manage Testimonials
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('admin.testi');
    Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('admin.testi.create');
    Route::post('testimonials/create', [TestimonialController::class, 'store'])->name('admin.testi.store');
    Route::get('testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testi.edit');
    Route::post('testimonials/edit/{id}', [TestimonialController::class, 'update'])->name('admin.testi.update');
    Route::delete('testimonials/destroy/{id}',[TestimonialController::class, 'destroy'])->name('admin.testi.destroy');

    // Manage Pages
    Route::get('pages', [PageController::class, 'index'])->name('admin.page');
    Route::get('pages/create', [PageController::class, 'create'])->name('admin.page.create');
    Route::post('pages/create', [PageController::class, 'store'])->name('admin.page.store');
    Route::get('pages/edit/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
    Route::post('pages/edit/{id}', [PageController::class, 'update'])->name('admin.page.update');
    Route::delete('pages/destroy/{id}',[PageController::class, 'destroy'])->name('admin.page.destroy');

    // Manage Links
    Route::get('links', [LinkController::class, 'index'])->name('admin.link');
    Route::get('links/create', [LinkController::class, 'create'])->name('admin.link.create');
    Route::post('links/create', [LinkController::class, 'store'])->name('admin.link.store');
    Route::get('links/edit/{id}', [LinkController::class, 'edit'])->name('admin.link.edit');
    Route::post('links/edit/{id}', [LinkController::class, 'update'])->name('admin.link.update');
    Route::delete('links/destroy/{id}',[LinkController::class, 'destroy'])->name('admin.link.destroy');

    // Manage FAQ
    Route::get('faq', [FaqController::class, 'index'])->name('admin.faq');
    Route::get('faq/create', [FaqController::class, 'create'])->name('admin.faq.create');
    Route::post('faq/create', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::get('faq/edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::post('faq/edit/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('faq/destroy/{id}',[FaqController::class, 'destroy'])->name('admin.faq.destroy');

    // Manage Partners
    Route::get('partners', [PartnerController::class, 'index'])->name('admin.partner');
    Route::get('partners/create', [PartnerController::class, 'create'])->name('admin.partner.create');
    Route::post('partners/create', [PartnerController::class, 'store'])->name('admin.partner.store');
    Route::get('partners/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
    Route::post('partners/edit/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
    Route::delete('partners/destroy/{id}',[PartnerController::class, 'destroy'])->name('admin.partner.destroy');

    // Manage Services
    Route::get('services', [ServiceController::class, 'index'])->name('admin.service');
    Route::get('services/create', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::post('services/create', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('services/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('services/edit/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('services/destroy/{id}',[ServiceController::class, 'destroy'])->name('admin.service.destroy');

    // Manage Team
    Route::get('teams', [TeamController::class, 'index'])->name('admin.team');
    Route::get('teams/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('teams/create', [TeamController::class, 'store'])->name('admin.team.store');
    Route::get('teams/edit/{id}', [TeamController::class, 'edit'])->name('admin.team.edit');
    Route::post('teams/edit/{id}', [TeamController::class, 'update'])->name('admin.team.update');
    Route::delete('teams/destroy/{id}',[TeamController::class, 'destroy'])->name('admin.team.destroy');

     // Manage Admin
     Route::get('users', [UserController::class, 'index'])->name('admin.user');
     Route::post('users/{id}', [UserController::class, 'changepassword'])->name('admin.user.changepassword');
     Route::get('users/create', [UserController::class, 'create'])->name('admin.user.create');
     Route::post('users/create', [UserController::class, 'store'])->name('admin.user.store');
     Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
     Route::post('users/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');
     Route::delete('users/destroy/{id}',[UserController::class, 'destroy'])->name('admin.user.destroy');
});
