<?php
Route::middleware('AdminLoginCheck')->group(function () {
  Route::get('/admin','Admin\LoginController@loginForm')->name('admin.login');
  Route::post('/admin','Admin\LoginController@DoLogin')->name('admin.login.submit');
});

Route::middleware('AdminAuthCheck')->prefix('admin')->group(function () {

    Route::get('/home','Admin\AdminController@AdminDashboard')->name('admin.home');
    Route::get('/update/password','Admin\AdminController@AdminDashboard')->name('admin.password.update');
    Route::get('/logout','Admin\AdminController@AdminLogout')->name('admin.logout');

    Route::prefix('profile')->group(function () {
        Route::get('/home','Admin\AdminController@AdminDashboard')->name('admin.profile.update');
    });

    //CONFIGURATION

  //Route::get('/configuration_edit/{id}','Admin\AdminController@ConfigurationEdit')->name('admin.configuration_edit');

    Route::group(['prefix'=>'configuration'], function (){
      Route::get('/','Admin\AdminController@Configuration')->name('admin.configuration');
      Route::get('/configuration.list','Admin\AdminController@ConfigurationList')->name('admin.configuration.list');

      Route::post('/add','Admin\AdminController@AddConfiguration')->name('admin.configuration.add');
      Route::get('/edit/{id}','Admin\AdminController@ConfigurationEdit')->name('admin.configuration.edit');
      Route::get('/view/{id}','Admin\AdminController@ConfigurationView')->name('admin.configuration.view');
      Route::post('/update','Admin\AdminController@UpdateConfiguration')->name('admin.configuration.update');
      Route::get('/delete/{id}','Admin\AdminController@DeleteConfiguration')->name('admin.configuration.delete');
    });
    //SOCIAL
    Route::group(['prefix'=>'social'], function (){
      Route::get('/','Admin\AdminController@Social')->name('admin.social');
      Route::get('/edit/{id}','Admin\AdminController@SocialEdit')->name('admin.social.edit');
      Route::get('/view/{id}','Admin\AdminController@SocialView')->name('admin.social.view');

      Route::post('/add','Admin\AdminController@AddSocial')->name('admin.social.add');
      Route::post('/update','Admin\AdminController@UpdateSocial')->name('admin.social.update');
      Route::get('/delete/{id}','Admin\AdminController@DeleteSocial')->name('admin.social.delete');
    });

  //EVENTS
  Route::group(['prefix'=>'events'], function (){
    Route::get('/','Admin\AdminController@Events')->name('admin.events');
    Route::get('/edit/{id}','Admin\AdminController@EventsEdit')->name('admin.events.edit');
    Route::get('/view/{id}','Admin\AdminController@EventsView')->name('admin.events.view');

    Route::post('/add','Admin\AdminController@AddEvents')->name('admin.events.add');
    Route::post('/update','Admin\AdminController@UpdateEvents')->name('admin.events.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteEvents')->name('admin.events.delete');
  });

  //BLOG
  Route::group(['prefix'=>'blog'], function (){
    Route::get('/','Admin\AdminController@Blog')->name('admin.blog');
    Route::get('/edit/{id}','Admin\AdminController@BlogEdit')->name('admin.blog.edit');
    Route::get('/view/{id}','Admin\AdminController@BlogView')->name('admin.blog.view');

    Route::post('/add','Admin\AdminController@AddBlog')->name('admin.blog.add');
    Route::post('/update','Admin\AdminController@UpdateBlog')->name('admin.blog.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteBlog')->name('admin.blog.delete');
  });


  //========Slide Route=======================
  Route::group(['prefix'=>'slide'], function (){
    Route::get('/','Admin\AdminController@Slides')->name('admin.slide');
    Route::get('/edit/{id}','Admin\AdminController@SlideEdit')->name('admin.slide.edit');
    Route::get('/view/{id}','Admin\AdminController@SlideView')->name('admin.slide.view');

    Route::post('/add','Admin\AdminController@AddSlide')->name('admin.slide.add');
    Route::post('/update','Admin\AdminController@UpdateSlide')->name('admin.slide.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteSlide')->name('admin.slide.delete');
  });

//  Package
  Route::group(['prefix'=>'package'], function (){
    Route::get('/','Admin\AdminController@Package')->name('admin.package');
    Route::get('/edit/{id}','Admin\AdminController@PackageEdit')->name('admin.package.edit');
    Route::get('/view/{id}','Admin\AdminController@PackageView')->name('admin.package.view');

    Route::post('/add','Admin\AdminController@AddPackage')->name('admin.package.add');
    Route::post('/update','Admin\AdminController@UpdatePackage')->name('admin.package.update');
    Route::get('/delete/{id}','Admin\AdminController@DeletePackage')->name('admin.package.delete');
  });

//  Package
  Route::group(['prefix'=>'customer_feedback'], function (){
    Route::get('/','Admin\AdminController@CustomerFeedBack')->name('admin.customer_feedback');
    Route::get('/edit/{id}','Admin\AdminController@CustomerFeedBackEdit')->name('admin.customer_feedback.edit');
    Route::get('/view/{id}','Admin\AdminController@CustomerFeedBackView')->name('admin.customer_feedback.view');

    Route::post('/update','Admin\AdminController@UpdateCustomerFeedBack')->name('admin.customer_feedback.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteCustomerFeedBack')->name('admin.customer_feedback.delete');
    Route::get('/status/{id}','Admin\AdminController@StatusCustomerFeedBack')->name('admin.customer_feedback.status');
  });

//  Booking
  Route::group(['prefix'=>'booking'], function (){
    Route::get('/','Admin\AdminController@Booking')->name('admin.booking');
    Route::get('/edit/{id}','Admin\AdminController@BookingEdit')->name('admin.booking.edit');
    Route::get('/view/{id}','Admin\AdminController@BookingView')->name('admin.booking.view');


    Route::post('/update','Admin\AdminController@UpdateBooking')->name('admin.booking.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteBooking')->name('admin.booking.delete');
  });

  Route::group(['prefix'=>'pages'], function (){
    Route::get('/','Admin\AdminController@Pages')->name('admin.pages');
    Route::get('/edit/{id}','Admin\AdminController@PagesEdit')->name('admin.pages.edit');
    Route::get('/view/{id}','Admin\AdminController@PagesView')->name('admin.pages.view');
    Route::post('/add','Admin\AdminController@AddPages')->name('admin.pages.add');

    Route::post('/update','Admin\AdminController@UpdatePages')->name('admin.pages.update');
    Route::get('/delete/{id}','Admin\AdminController@DeletePages')->name('admin.pages.delete');
  });

  Route::group(['prefix'=>'album'], function (){
    Route::get('/','Admin\AdminController@Album')->name('admin.album');
    Route::get('/edit/{id}','Admin\AdminController@AlbumEdit')->name('admin.album.edit');
    Route::get('/view/{id}','Admin\AdminController@AlbumView')->name('admin.album.view');
    Route::post('/add','Admin\AdminController@AddAlbum')->name('admin.album.add');

    Route::post('/update','Admin\AdminController@UpdateAlbum')->name('admin.album.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteAlbum')->name('admin.album.delete');
  });

  Route::group(['prefix'=>'gallery'], function (){
    Route::get('/','Admin\AdminController@Gallery')->name('admin.gallery');
    Route::get('/edit/{id}','Admin\AdminController@GalleryEdit')->name('admin.gallery.edit');
    Route::get('/view/{id}','Admin\AdminController@GalleryView')->name('admin.gallery.view');
    Route::post('/add','Admin\AdminController@AddGallery')->name('admin.gallery.add');


    Route::post('/update','Admin\AdminController@UpdateGallery')->name('admin.gallery.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteGallery')->name('admin.gallery.delete');
  });

  Route::group(['prefix'=>'customer_message'], function (){
    Route::get('/','Admin\AdminController@CustomerMessage')->name('admin.customer_message');
    Route::get('/edit/{id}','Admin\AdminController@CustomerMessageEdit')->name('admin.customer_message.edit');
    Route::get('/view/{id}','Admin\AdminController@CustomerMessageView')->name('admin.customer_message.view');
    Route::post('/add','Admin\AdminController@AddCustomerMessage')->name('admin.customer_message.add');
    Route::post('/update','Admin\AdminController@UpdateCustomerMessage')->name('admin.customer_message.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteCustomerMessage')->name('admin.customer_message.delete');
  });

  Route::group(['prefix'=>'comments'], function (){
    Route::get('/{id}','Admin\AdminController@Comment')->name('admin.comments');
    Route::get('/status/{id}','Admin\AdminController@CommentStatus')->name('admin.comments.status');
    Route::get('/view/{id}','Admin\AdminController@CommentView')->name('admin.comments.view');
    Route::get('/delete/{id}','Admin\AdminController@DeleteComment')->name('admin.comments.delete');
  });

  Route::group(['prefix'=>'map'], function () {
    Route::get('/','Admin\AdminController@Map')->name('admin.map');
    Route::post('/update','Admin\AdminController@MapUpdate')->name('admin.map.update');
  });

  Route::group(['prefix'=>'subscriber'], function () {
    Route::get('/','Admin\AdminController@Subscriber')->name('admin.subscriber');
    Route::get('/status/{id}','Admin\AdminController@SubscriberStatus')->name('admin.subscriber.status');
    Route::get('/view/{id}','Admin\AdminController@SubscriberView')->name('admin.subscriber.view');
    Route::get('/delete/{id}','Admin\AdminController@DeleteSubscriber')->name('admin.subscriber.delete');
  });

  //  Offer
  Route::group(['prefix'=>'offer'], function (){
    Route::get('/','Admin\AdminController@Offer')->name('admin.offer');
    Route::get('/edit/{id}','Admin\AdminController@OfferEdit')->name('admin.offer.edit');
    Route::get('/view/{id}','Admin\AdminController@OfferView')->name('admin.offer.view');

    Route::post('/add','Admin\AdminController@AddOffer')->name('admin.offer.add');
    Route::post('/update','Admin\AdminController@UpdateOffer')->name('admin.offer.update');
    Route::get('/delete/{id}','Admin\AdminController@DeleteOffer')->name('admin.offer.delete');
  });

});
Route::post('admin/booking/add','Admin\AdminController@AddBooking')->name('admin.booking.add');
Route::post('admin/customer_feedback/add','Admin\AdminController@AddCustomerFeedBack')->name('admin.customer_feedback.add');
Route::post('admin/customer_message/add','Admin\AdminController@AddCustomerMessage')->name('admin.customer_message.add');
Route::post('admin/comment/add','Admin\AdminController@AddComment')->name('admin.comment.add');

