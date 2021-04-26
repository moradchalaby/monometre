<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
/*
aşağıda kısalttık
Route::get('nedmin/settings', 'Backend\SettingsController@index')->name('settings.Index');
Route::post('nedmin/sortable', 'Backend\SettingsController@sortable')->name('settings.Sortable');
Route::get('nedmin/settings/delete/{id}', 'Backend\SettingsController@destroy')->name('settings.Destroy');
Route::get('nedmin/settings/edit/{id}', 'Backend\SettingsController@edit')->name('settings.Edit');
Route::post('nedmin/update/{id}', 'Backend\SettingsController@update')->name('settings.Update');



Verb	          URI	                     Action	         Route Name
GET	             /photos	                index	         photos.index
GET	             /photos/create	            create	         photos.create
POST	         /photos	                store	         photos.store
GET	             /photos/{photo}    	    show	         photos.show
GET	             /photos/{photo}/edit	    edit	         photos.edit
PUT/PATCH	     /photos/{photo}     	    update	         photos.update
DELETE	         /photos/{photo}         	    destroy	         photos.destroy
 */

/*
Route::get('/', function () {
    return view('welcome');
});*/








Route::namespace('Backend')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::prefix('nedmin/settings')->group(function () {

            Route::get('/', 'SettingsController@index')->name('settings.Index');
            Route::post('', 'SettingsController@sortable')->name('settings.Sortable');
            Route::get('/delete/{id}', 'SettingsController@destroy')->name('settings.Destroy');
            Route::get('/edit/{id}', 'SettingsController@edit')->name('settings.Edit');
            Route::post('/{id}', 'SettingsController@update')->name('settings.Update');

        });
    });
});


Route::namespace('Frontend')->group(
    function () {
        Route::get('/', 'DefaultController@index')->name('home.Index');

        //BLOG
        Route::get('/blog', 'BlogController@index')->name('blog.Index');
        Route::get('/blog/{slug}', 'BlogController@detail')->name('blog.Detail');

        //PAGE

        Route::get('/page/{slug}', 'PageController@detail')->name('page.Detail');


    }
);


Route::namespace('Backend')->group(function () {

    Route::prefix('nedmin')->group(function () {
        Route::get('/register', 'RegistrationController@create')->name('register.create');
        Route::post('register', 'UserController@store')->name('register.store');


        Route::get('/dashboard', 'DefaultController@index')->name('nedmin.Index')->middleware('admin');
        Route::get('/', 'DefaultController@login')->name('nedmin.Login');
        Route::get('/logout', 'DefaultController@logout')->name('nedmin.Logout');

        Route::post('/login', 'DefaultController@authenticate')->name('nedmin.Authenticate');
    });
    Route::middleware(['admin'])->group(function () {
        Route::prefix('nedmin')->group(function () {
            //BLOG
            Route::post('/blog/sortable', 'BlogController@sortable')->name('blog.Sortable');
            Route::resource('blog', 'BlogController');


            //PAGE
            Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
            Route::resource('page', 'PageController');

            //SLIDER
            Route::post('/slider/sortable', 'SliderController@sortable')->name('slider.Sortable');
            Route::resource('slider', 'SliderController');

            //BRAND
            Route::post('/brand/sortable', 'BrandController@sortable')->name('brand.Sortable');
            Route::resource('brand', 'BrandController');
            //Product
            Route::post('/product/sortable', 'ProductController@sortable')->name('product.Sortable');
            Route::resource('product', 'ProductController');
            //Category
            Route::post('/category/sortable', 'CategoryController@sortable')->name('category.Sortable');
            Route::resource('category', 'CategoryController');

            //USER
            Route::post('/user/sortable', 'UserController@sortable')->name('user.Sortable');
            Route::resource('user', 'UserController');
        });
    });
});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
