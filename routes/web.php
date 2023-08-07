<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\PagesController as Settings;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\FootNoteController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\PagesController as UserPages;
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

Route::get('/', [PageController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $category = App\Models\Category::all();
    return redirect()->to('/');
})->name('dashboard');

Route::get('/admin-home',[HomeController::class,'index'])->name('admin.dashboard');
//----------------------------------Front End Controller ---------------------------------------------------------------
Route::get('/', [PageController::class,'index']);
Route::get('/login', [PageController::class,'login'])->name('user-login');
Route::get('/register', [PageController::class,'login'])->name('register');
Route::post('/login', [PageController::class,'login_process'])->name('login');
Route::get('/admin-password-request', [AdminLoginController::class,'password_reset'])->name('admin.password.request');
Route::get('/admin-login',[AdminLoginController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin-login',[AdminLoginController::class,'login'])->name('admin.login.submit');
Route::post('/admin-logout',[AdminLoginController::class,'logout'])->name('admin.logout');
Route::get('/goods', [PageController::class,'goods']);
Route::post('/add-wishlist', [PageController::class,'add_wishlist'])->name('add-wishlist');
Route::post('/wishlist/{product}', [PageController::class,'wishlist_saveforlater'])->name('wishlist');
Route::get('/wishlist', [PageController::class,'wishlist'])->name('wishlist.index');
Route::delete('/wishlist/{product}', [PageController::class,'wishlist_destroy'])->name('wishlist.destroy');
Route::post('/switchtocart/{product}', [PageController::class,'switchToCart'])->name('switch-to-cart');
Route::get('/update-cart-quantity', [PageController::class,'update_cart'])->name('update-cart-quantity');
Route::get('/about', [PageController::class,'about'])->name('about');
Route::get('/history', [PageController::class,'history'])->name('history');
Route::get('/vision-mission', [PageController::class,'vision_mission'])->name('vision-mission');
Route::get('/board', [PageController::class,'board'])->name('board');
Route::get('/management', [PageController::class,'management'])->name('management');
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::post('/contact-us', [PageController::class,'contact_us'])->name('contact-us');
Route::get('/terms-conditions', [PageController::class,'terms_conditions'])->name('terms-conditions');
Route::get('/delivery-information', [PageController::class,'delivery_information'])->name('delivery-information');
Route::get('/privacy-policy', [PageController::class,'privacy_policy'])->name('privacy-policy');
Route::get('/return-policy', [PageController::class,'return_policy'])->name('return-policy');
Route::get('/my-product/{id}', [PageController::class,'my_product'])->name('my-product');
Route::post('find-product', [PageController::class,'find_product'])->name('find-product');
Route::get('/select-state',[PageController::class,'select_state']);
Route::get('/frequently-asked-questions',[PageController::class,'frequently_asked_questions'])->name('frequently-asked-questions');
Route::get('/delete-cart',[PageController::class,'delete_cart'])->name('delete-cart');
//----------------------------------------------------------------------------------------------------------------------


//----------------------------User Backend Route ----------------------------------------------------------------------
Route::get('transaction-verification',[UserPages::class,'transaction_verification'])->name('transaction-verification');
Route::get('order',[UserPages::class,'order'])->name('order');
Route::resource('/cart',CartController::class);
Route::resource('/checkout',CheckoutController::class);
//----------------------------------------------------------------------------------------------------------------------
//----------------------------Admin Backend Route ----------------------------------------------------------------------
Route::get('/admin-change-password',[AdminController::class,'change_password'])->name('admin-change-password');
Route::post('/admin-update-password',[AdminController::class,'update_password'])->name('admin-update-password');
Route::get('/admin-change-picture',[AdminController::class,'change_picture']);
Route::post('/admin-change-picture',[AdminController::class,'update_picture']);
Route::post('/change-role',[AdminController::class,'change_role'])->name('change-role');
Route::get('/update-terms',[FootNoteController::class,'terms'])->name('update-terms');
Route::get('/update-privacy',[FootNoteController::class,'privacy'])->name('update-privacy');
Route::get('/update-delivery',[FootNoteController::class,'delivery'])->name('update-delivery');
Route::get('/update-return-policy',[FootNoteController::class,'return_policy'])->name('update-return-policy');
Route::put('/update-terms/{id}',[FootNoteController::class,'post_terms'])->name('update-term');
Route::put('/update-policies/{id}',[FootNoteController::class,'post_policy'])->name('update-policies');
Route::put('/update-delivery-info/{id}',[FootNoteController::class,'post_delivery'])->name('update-delivery-info');
Route::put('/update-policies-return/{id}',[FootNoteController::class,'post_return'])->name('update-policies-return');
Route::get('/confirm-payment',[FootNoteController::class,'confirm_payment'])->name('confirm-payment');
Route::get('/add-faq',[FootNoteController::class,'add_faq'])->name('faq.create');
Route::get('/view-order',[Settings::class,'order'])->name('view-order');
Route::get('/order-details',[Settings::class,'order_details'])->name('order-details');
Route::get('/complete-order',[Settings::class,'complete_order'])->name('complete-order');
Route::post('/create-faq',[FootNoteController::class,'faq_save'])->name('faq.store');

Route::resource('/admin',AdminAccountController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/product',ProductController::class);
//----------------------------------------------------------------------------------------------------------------------

//status=successful&tx_ref=NVG-895664276&transaction_id=1856160
//status=successful&tx_ref=NVG-64181035&transaction_id=1857602
//http://navigand.net/transaction-verification?status=successful&tx_ref=NVG-257312196&transaction_id=1857717