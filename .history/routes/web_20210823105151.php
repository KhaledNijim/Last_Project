<?php

use Illuminate\Support\Facades\app;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::resource('/', 'ThirdController');


Route::get('1', function () {
    return 'welcome';
});


//  قمنا بوضع براميتر أجباري
Route::get('2/{id}', function ($id) {

    echo "هنا براميتر أجباري ولن يتم عرض الصفحة إلا مع البراميت";

    return $id;
});


//مثال على براميتر اختياري

Route::get('3/{id?}', function () {
    return 'هنا براميتر ليس أجباري';
});


// مثال على استخدام  (Route_prefix)

Route::group([ 'prefix' => '4'], function(){

   Route::get('/', function () {
    return 'هنا مثال على استخدام (Route_prefix)';
});

    Route::get('/1', function () {
        return 'هنا مثال آخر على استخدام (Route_prefix2)';
});


});

// مثال على الكنترولر واستدعاءه


Route::get('5', 'SecondController@ShowString2');

Route::get('6', 'NewControllers\FirstController@ShowString');


// مثال على namespace
// مثال على
Route::group(['namespace' => 'newControllers'], function(){

    Route::get('7', 'FirstController@ShowString') -> middleware ('auth'); // مثال على مديل وير هنا
    Route::get('8', 'FirstController@ShowString'); // مثال على مديل وير في الكنترولر
    Route::get('9', 'FirstController@ShowString1');
    Route::get('10', 'FirstController@ShowString2');
    Route::get('11', 'FirstController@ShowString3');

});

Route::resource ('news', 'ThirdController@');



////////////////////////////////////////////////

Route::group(['prefix' =>LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function(){

    Route::get ('offer/1', 'ThirdController@offer_create');
    Route::post('post', 'ThirdController@offer_post' )-> name ('offer-Post');

    Route::get ('offer/3', 'ThirdController@store');

    Route::get ('offer/2', 'ThirdController@create')-> name ('offer_all');
    Route::get ('edit/{offer_id}', 'ThirdController@editoffer');
    Route::post ('update/{offer_id}', 'ThirdController@updateoffer')-> name ('offer_update');
    Route::get ('delete/{offer_id}', 'ThirdController@deleteoffer')-> name ('offer_delete');

    Route::get ('youtube', 'ThirdController@getvideo');


    /////////////////////////////////////////////// AJAX ///////////////////////////////////////////////


    Route::get('ajaxoffer/1', 'offercontroller@create');
    Route::post('ajaxoffer/2', 'offercontroller@store')-> name ('ajax-offers-store');
    Route::get('ajaxoffer/3', 'offercontroller@ajaxShow')-> name ('ajax-offers-show');
    Route::get('deleteAjax/{offer_id', 'offercontroller@deleteAjax')-> name ('ajax-offers-delete');


   //////////////////////////////////////////////// AJAX ///////////////////////////////////////////////

});



///////////////////////////////////////////////



Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


