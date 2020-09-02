<?php

Auth::routes();
 //Start Font end............................
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/photo', 'HomeController@photo')->name('photo');
Route::get('/video', 'HomeController@video')->name('video');
Route::get('/promotion', 'HomeController@promotion')->name('promotion');
Route::get('/contact-us', 'HomeController@contact')->name('contact');
Route::get('/user-profile', 'HomeController@profile')->name('profile');
Route::get('/photos/view/{id}/{category_id}', 'HomeController@photoView')->name('photos');
Route::get('/author-profile/{id}', 'HomeController@authorProfile')->name('author.profile');
Route::post('/search/photo','HomeController@searchPhoto')->name('search.photo');
Route::get('/terms-and-condition','HomeController@terms')->name('terms');
Route::get('/privacy-policy','HomeController@policy')->name('policy');
Route::post('/like','HomeController@like')->name('like');

// End fontend............................


// Start Admin site.....................

Route::post('photo/save','UserController@savePhoto')->name('save.photo');
Route::get('/photo/delete/{id}', 'UserController@deletePhoto')->name('delete.photo');
Route::get('/update-profile', 'UserController@updateProfile')->name('update.profile');
Route::post('/update-profile-info', 'UserController@updateProfileInfo')->name('update.profile.info');
Route::get('/user/profile/{id}', 'UserController@userProfile');


Route::get('/admin/dashboard', 'AdminController@index')->name('admin');
Route::get('/admin/slider', 'AdminController@slider')->name('slider');
Route::post('/admin/save', 'AdminController@sliderSave')->name('slider.save');
Route::get('/admin/slider/delete/{id}', 'AdminController@sliderDelete')->name('slider.delete');

Route::get('/admin/all-photos', 'AdminController@allPhoto')->name('all_photo');
Route::get('/admin/my-photos', 'AdminController@myPhoto')->name('my_photo');
// Route::post('/admin/save', 'AdminController@sliderSave')->name('slider.save');
// Route::get('/admin/slider/delete/{id}', 'AdminController@sliderDelete')->name('slider.delete');

Route::get('/admin/category', 'AdminController@category')->name('category');
Route::post('/admin/category/save', 'AdminController@categorySave')->name('category.save');
Route::get('/admin/catgory/delete/{id}', 'AdminController@categoryDelete')->name('category.delete');

Route::get('/admin/users', 'AdminController@Users')->name('users');
Route::get('/admin/admins', 'AdminController@Admins')->name('admins');
Route::post('/admin/add/admin', 'AdminController@saveAdmin')->name('add.admin');
Route::get('/admin/admin/delete/{id}', 'AdminController@adminDelete')->name('admin.delete');

Route::get('/admin/promotion', 'AdminController@Promotion')->name('admin.promotion');
Route::post('/admin/promotion/save', 'AdminController@promotionSave')->name('promotion.save');
Route::get('/admin/promotion/delete/{id}', 'AdminController@promotionDelete')->name('promotion.delete');

Route::get('/admin/setting', 'AdminController@setting')->name('setting');
Route::post('admin/setting/update','AdminController@settingUpdate')->name('setting.update');

Route::get('/admin/movie', 'AdminController@movie')->name('movie');
Route::post('admin/movie/update','AdminController@settingMovie')->name('movie.update');

Route::get('/admin/terms', 'AdminController@terms')->name('admin.terms');
Route::post('admin/terms/update','AdminController@updateTerms')->name('update.terms');

Route::get('/admin/policy', 'AdminController@policy')->name('admin.policy');
Route::post('admin/policy/update','AdminController@updatePolicy')->name('update.policy');

// End Admin Site....................................
