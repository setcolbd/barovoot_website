<?php
Route::middleware('FrontendMiddleware')->group(function () {
  Route::get('/', 'FrontController@index')->name('homePage');
  Route::get('/photo', 'FrontController@photo')->name('photo');
  Route::get('/videos', 'FrontController@videos')->name('videos');
  Route::get('/blog', 'FrontController@blog')->name('blog');
  Route::get('/blog/{id}', 'FrontController@blog_details')->name('blog');
  Route::get('/event_details/{id}', 'FrontController@event_details')->name('event_details');
  Route::get('/about_us', 'FrontController@about_us')->name('about_us');
  Route::get('/contact_us', 'FrontController@contact_us')->name('contact_us');
  Route::get('/events', 'FrontController@events')->name('events');
});
Route::get('/get_audio', 'FrontController@GetAudio');
Route::post('admin/comment/list/{id}', 'FrontController@GetComment');
Route::post('admin/subscriber/add', 'FrontController@AddSubscriber');
