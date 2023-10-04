<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogListController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\ContactSettingController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterInformationController;
use App\Http\Controllers\Admin\HelpLinkController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\UsefulLinkController;
use App\Http\Controllers\BlogSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});


Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('portfolio-details/{id}',[HomeController::class,'showPortfolio'])->name('show.portfolio');

Route::get('blog-details/{id}',[HomeController::class,'showBlog'])->name('show.blog');
Route::get('blogs',[HomeController::class,'blog'])->name('blog');
Route::post('contact',[HomeController::class,'contact'])->name('contact');

// Admin Routes

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){

   Route::resource('hero',HeroController::class);
   Route::resource('type-title', TyperTitleController::class);
   Route::resource('services',ServiceController::class);
   Route::get('resume/download',[AboutController::class,'resumeDownload'])->name('resume.download');
   Route::resource('about',AboutController::class);

   // this is portfolio category route

   Route::resource('category',CategoryController::class);

   // this is portfolio item route

   Route::resource('portfolio-item',PortfolioItemController::class);
  
   // portfolio section setting
   Route::resource('portfolio-section-setting',PortfolioSectionSettingController::class);
  
   // skill setting section

   Route::resource('skill-setting',SkillSectionSettingController::class);

   // skill item

   Route::resource('skill-items',SkillItemController::class);

   // Experinece section
   Route::resource('experience', ExperienceController::class);

   //feedback section
   Route::resource('feedback', FeedbackController::class);
   
   //feedback section setting
   Route::resource('feedback-setting', FeedbackSectionSettingController::class);
   //Blog Category 
   Route::resource('blog-category', BlogCategoryController::class);
   //Blog Category 
   Route::resource('blog-list', BlogListController::class);
   //Blog Setting 
   Route::resource('blog-setting', BlogSectionSettingController::class);
   Route::resource('contact-setting', ContactSettingController::class);
   // footer 

   Route::resource('social-link', SocialLinkController::class);
   Route::resource('footer-information', FooterInformationController::class);
   Route::resource('contact-info', ContactInfoController::class);
   Route::resource('useful-link', UsefulLinkController::class);
   Route::resource('help-link', HelpLinkController::class);
});
