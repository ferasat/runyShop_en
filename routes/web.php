<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});

//  ---------- SlideShow ---------
Route::group(['prefix' => '/dashboard/slideshow'], function () {
    Route::get('/', 'SlideShowController@index')->name('listSlides')->middleware('status');
    Route::get('/new', 'SlideShowController@new')->name('newSlide');
    Route::post('/new', 'SlideShowController@save')->name('saveNewSlide');
    Route::get('/delete/{id}', 'SlideShowController@delete');
    Route::get('/edit/{id}', 'SlideShowController@edit');
    Route::get('/to/{id}', 'SlideShowController@to  ');
    Route::post('/update/{id}', 'SlideShowController@update');
    Route::get('/removePicOfSlide', 'SlideShowController@removePicSlide')->name('removePicOfSlide');
});

//  ---------- Profile ---------
Route::group(['prefix' => '/dashboard/profile'], function () {
    Route::get('/', 'ProfileController@myAcount')->name('myAcount');
    Route::get('/new', 'ProfileController@new');
    Route::get('/save', 'ProfileController@save');
});

//   ------------   Product -----
Route::group(['prefix' => '/dashboard/product'], function () {
    Route::get('/', 'ProductController@index')->name('listProduct')->middleware('status');
    Route::get('/new', 'ProductController@new')->middleware('status');
    Route::post('/store', 'ProductController@store')->middleware('status');
    Route::get('/edit/{id}', 'ProductController@edit')->middleware('status');
    Route::post('/update', 'ProductController@update')->middleware('status');
    Route::get('/delete/{id}', 'ProductController@delete')->name('deleteProduct')->middleware('status');
    Route::get('/copy/{id}', 'ProductController@copy')->middleware('status');
    Route::get('/category', 'ProductController@category')->middleware('status');
});

Route::group(['prefix' => '/product'], function () {
    Route::get('/shop', 'ProductController@shop')->name('shop');
    Route::get('/{slug}', 'ProductController@showSlug');
//    Route::get('/{id}', 'ProductController@show');
    Route::get('/', 'ProductController@showIdPro');
});
Route::group(['prefix' => '/tag/product'], function () {
    Route::get('/n/{slug}', 'TagProductController@show');
    Route::get('/i/{id}', 'TagProductController@showId');
});

//  -----------  Cart  ---------
Route::group(['prefix' => '/cart'], function () {
    Route::get('/', 'CartController@index');
    Route::get('/addToCart', 'CartController@addToCart')->name('addToCart');
    Route::post('/saveCart', 'CartController@saveCart')->name('saveCart');
    Route::get('/saveOrder', 'CartController@saveOrder')->name('saveOrder');
});

//   ------------   Settings -----
Route::group(['prefix' => '/dashboard/settings'], function () {
    Route::get('/', 'SettingController@index')->name('publicSettings')->middleware('status');
    Route::post('/publicSettings/save', 'SettingController@publicSave')->name('publicSettingsSave')->middleware('status');

    Route::get('/HomePage', 'ThemeController@HomePage')->name('setHomePage')->middleware('status');
    Route::post('/HomePage/save', 'ThemeController@update')->name('saveHomePage');
});

///  -------------- Category Product ------------
Route::group(['prefix' => '/dashboard/category'], function () {
    Route::get('/', 'CategoryProductCotroller@index')->name('catPro')->middleware('auth')->middleware('status');
    Route::post('/save', 'CategoryProductCotroller@save')->name('saveCatPro')->middleware('status');
    Route::get('/delete/{id}', 'CategoryProductCotroller@delete')->middleware('status');
    Route::get('/edit/{id}', 'CategoryProductCotroller@edit')->middleware('status');
    Route::post('/update/', 'CategoryProductCotroller@updateCat')->middleware('status')->name('updateCatPro');
});

///  -------------- Category Product For Customer------------
Route::group(['prefix' => '/cat-product'], function () {
    Route::get('', 'CategoryProductCotroller@showId');
    Route::get('/{category_products:slug}', 'CategoryProductCotroller@showSlug');
});

///  -------------- Post For User ------------
Route::group(['prefix' => '/dashboard/posts'], function () {
    Route::get('/', 'PostController@index')->name('indexPost')->middleware('status');
    Route::get('/new', 'PostController@new')->name('newPost');
    Route::post('/save', 'PostController@save')->name('savePost')->middleware('status');
    Route::get('/edit/{id}', 'PostController@edit');
    Route::post('/update', 'PostController@update')->name('update')->middleware('status');
    Route::get('/copy/{id}', 'PostController@copy');
    Route::get('/delete/{id}', 'PostController@delete');

    Route::get('/category', 'PostController@category')->name('categoryPost')->middleware('status');
    Route::post('/category/saveCat', 'PostController@saveCat')->name('saveCatPost');
    Route::get('/category/delete/{id}', 'PostController@delCat');
    Route::get('/category/edit/{id}', 'PostController@editCat');
});

///  -------------- Post For Customer ------------
Route::group(['prefix' => '/blog'], function () {
    Route::get('/posts', 'PostController@blog')->name('blogPosts');
    Route::get('/post?id=', 'PostController@showId');
    //Route::get('/post/{url}', 'PostController@showUrl');
    Route::get('/post/{post:slug}', 'PostController@showSlug');
    Route::get('/cat-post', 'PostController@showCat');
});

///  --------------- Off Line Order --------------
Route::group(['prefix' => '/dashboard/offlineOrder'], function () {
    Route::get('/', 'OflineOrderController@index')->name('indexOffLine');
    Route::get('/calledd', 'OflineOrderController@calledd')->name('calledd');
    Route::get('/notcall', 'OflineOrderController@notcall')->name('notcall');
});
Route::group(['prefix' => '/offlineOrder'], function () {
    Route::get('/save/', 'OflineOrderController@save');
});

Route::group(['prefix' => '/s'], function () {
    Route::get('/', 'SearchController@general');
});


/// ----------------- Page For User  -----------------
Route::prefix('/dashboard/pages')->middleware('auth')->group( function () {
    Route::get('/', 'PageController@index')->name('indexPage')->middleware('status');
    Route::get('/new', 'PageController@newPage')->name('newPage')->middleware('status');
    Route::post('/save', 'PageController@save')->name('savePage')->middleware('status');
    Route::get('/edit/{id}', 'PageController@edit');
    Route::post('/update', 'PageController@update')->name('updatePage')->middleware('status');
    Route::get('/copy/{id}', 'PageController@copy');
    Route::get('/delete/{id}', 'PageController@delete');
});

///  -------------- Page For Customer ----------------
Route::group(['prefix' => '/'], function () {
    Route::get('/page?id=', 'PageController@showId');
    Route::get('{page:slug}', 'PageController@showSlug');
});
///  -------------- Comments For Customer ----------------
Route::group(['prefix' => '/comment'], function () {
    Route::get('/save', 'CommentController@save');
});


Route::group(['prefix' => '/test'], function () {
    Route::get('/', 'TestController@index');
    Route::get('/theme3', 'TestController@theme3');
    Route::get('/search', 'TestController@search');
    Route::get('/t', 'TestController@test');
    Route::get('/searcht', 'TestController@searchTest');
});
