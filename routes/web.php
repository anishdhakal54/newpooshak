<?php

use App\Http\Controllers\Controller;

Route::livewire('/', 'welcome')->name('welcome');
Route::livewire('/', 'welcome')->name('home');
Route::livewire('/cart', 'update-cart')->name('cart.index');
Route::livewire('/shop', 'shop')->name('shop');
Route::livewire('/category/{slug}', 'shop-category')->name('shop.category');
Route::livewire('/search', 'search')->name('search');
Route::livewire('/product/{slug}', 'product-detail')->name('product.show');
Route::livewire('/checkout', 'checkout')->name('checkout')->middleware('auth');
Route::livewire('/my-account', 'account.index')->name('my-account.index')->middleware('auth');
Route::livewire('/wishlist', 'account.wishlist')->name('wishlist');
Route::livewire('/order', 'account.order')->name('account.order')->middleware('auth');
Route::livewire('/order/view/{id}', 'account.order-view')->name('order.view');

//pages
Route::livewire('/contact-us', 'contact-us')->name('contact-us');
Route::livewire('/about-us', 'about-us')->name('about-us');
Route::livewire('/blog', 'blog')->name('blog');
Route::livewire('/blog/{slug}', 'blog-detail')->name('blog.show');
Route::livewire('/get-quote', 'get-quote')->name('getquote');
Route::livewire('/get-quotess', 'getquotes')->name('getquotes');


Route::get('/privacy-policy', function () {
  return view('privacy-policy');
});
Route::get('/terms-and-conditions', function () {
  return view('terms-and-conditions');
});
Route::get('/lang-change/{lang}', function ($lang) {

  if (array_key_exists($lang, Config::get('languages'))) {
    Session::put('applocale', $lang);
  }
  return Redirect::back();
})->name('switch.lang');

/*Route::group([
  'middleware' => 'auth'
], function () {
  Route::livewire('/checkout', 'checkout')->name('checkout')->middleware('auth');
//  Route::get('/checkout', 'CheckoutController@getCheckout')->name('checkout');
  Route::post('/checkout', 'CheckoutController@handleCheckout')->name('checkout.store');
  Route::get('/checkout/order-received', 'CheckoutController@handleOrderStatus')->name('checkout.order-status');
});*/


//Route::get('/', 'WelcomeController@index')->name('welcome');
Route::post('/upload_embroidery', 'CheckoutController@upload_embroidery');
Route::get('/about-messages', 'WelcomeController@about')->name('about-message');
Route::get('/vertification', 'WelcomeController@get')->name('vertification');
Route::get('/pending', 'WelcomeController@pending')->name('pending');

Auth::routes();
Route::get('resendmail/{email}', 'WelcomeController@send');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('/request-confirmed', 'WelcomeController@request')->name('request.confirmed');


Route::post('/suscriber', 'WelcomeController@addSuscriber')->name('suscriber');

/*Route::get('/shop', 'ProductController@getShop')->name('shop');*/

Route::get('/brand', 'NavController@brand')->name('brand');
Route::get('/best_selling', 'NavController@best_selling')->name('best.selling');
Route::get('/flash_deals', 'NavController@flash_deals')->name('flash.deals');
Route::get('/tech_discovery', 'NavController@tech_discovery')->name('tech_discovery');
Route::get('/trending_style', 'NavController@trending_style')->name('treding.style');


//Route::get('/product/{slug}', 'ProductController@getProduct')->name('product.show');
Route::get('/product2/{id}', 'ProductController@getProduct2');

Route::get('/product-quick-view', 'ProductController@getQuickView')->name('product.quick.view');

Route::get('/brands', 'BrandController@index')->name('brands');

/*Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{slug}', 'BlogController@show')->name('post.show');*/

//Route::get('/category/{slug}', 'CategoryController@index')->name('category');

Route::post('contact-us', 'ContactController@postContact')->name('contact-us');
//Route::get('contact-us', 'ContactController@contact')->name('request-new-product');
Route::post('contact-us-add', 'ContactController@contactAdd')->name('contact.post');

Route::post('request-us-add', 'ContactController@NewRequestAdd')->name('request-product.post');

//Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/mini-cart', 'CartController@getMiniCart')->name('cart.mini');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::post('/cart/destroy/{rowId}', 'CartController@destroyRow')->name('cart.destroy.row');
Route::post('/cart/destroy', 'CartController@destroy')->name('cart.destroy');

Route::post('/wishlist', 'WishlistController@store')->name('wishlist.store');

Route::get('/compare', 'CompareController@getCompare')->name('compare');
Route::post('/compare', 'CompareController@postCompare')->name('compare.store');
Route::get('/mini-comparelist', 'CompareController@getMiniCompareList')->name('comparelist.mini');
Route::post('/compare/clear/{product}', 'CompareController@clear')->name('compare.clear');
Route::post('/compare/clear', 'CompareController@clearAll')->name('compare.clearall');

Route::post('/enquiry-list', 'ProductEnquiryController@postEnquiryList')->name('enquiry.list.store');

//Route::group( [ 'middleware' => 'auth' ], function () {
Route::post('/review', 'ReviewController@storeReview')->name('review.store');

Route::post('/comment/{postId}', 'CommentController@storeComment')->name('comment.store');

Route::get('/enquiry', 'ProductEnquiryController@getEnquiry')->name('enquiry');
Route::post('/enquiry-list/update', 'ProductEnquiryController@updateEnquiry')->name('enquiry.row.update');
Route::post('/enquiry-list/delete', 'ProductEnquiryController@deleteEnquiry')->name('enquiry.row.destroy');
Route::post('/enquiry', 'ProductEnquiryController@handleEnquiry')->name('enquiry.store');
Route::get('/enquiry/enquiry-received', 'ProductEnquiryController@handleEnquiryStatus')->name('enquiry.enquiry-status');
Route::get('contact_us', 'ContactController@testimional')->name('testimional.add');


Route::group([
  'prefix' => 'my-account',
  'as' => 'my-account.',
  'middleware' => 'auth'
], function () {
  /*Route::get('/', 'AccountController@index')->name('index');*/
  Route::get('/edit-account', 'AccountController@editAccount')->name('edit-account');
  Route::post('/edit-account/{id}', 'AccountController@updateAccount')->name('update-account');
  Route::get('/change-password', 'AccountController@editPassword')->name('change-password');
  Route::post('/change-password', 'AccountController@updatePassword')->name('update-password');

  Route::get('/enquiries', 'AccountController@getProductEnquiries')->name('enquiries');
  Route::post('/enquiries/order', 'AccountController@postProductEnquiryOrder')->name('enquiries.order');
  Route::post('/enquiries/order', 'AccountController@deleteProductEnquiryOrder')->name('enquiries.cancel');

  Route::get('/orders', 'AccountController@getOrders')->name('orders');
  Route::get('/order/cancel/{id}', 'AccountController@cancelOrder')->name('order.cancel');
  /*Route::get('/order/view/{id}', 'AccountController@viewOrder')->name('order.view');*/

  Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
  Route::delete('/wishlist/{productId}', 'WishlistController@destroy')->name('wishlist.destroy');

  Route::get('/edit-address', 'AccountController@editAddress')->name('edit-address');
  Route::get('/edit-address/shipping', 'AccountController@editShippingAddress')->name('edit-address.shipping');
  Route::post('/edit-address/shipping', 'AccountController@updateShippingAddress')->name('update-address.shipping');
  Route::get('/my-quotes', 'AccountController@myQuotes')->name('myquotes');
  Route::get('/getcheckout', 'CartController@getcheckout')->name('getcheckout');
});
Route::group([
  'prefix' => 'dashboard',
  'as' => 'dashboard.',
  'namespace' => 'Backend',
  'middleware' => 'role:admin|manager|shop-manager'
], function () {

  Route::get('/', 'DashboardController@index')->name('index');
  Route::resource('/product', 'ProductController', ['except' => ['show']]);
  Route::get('/products/json', 'ProductController@getProductsJson')->name('products.json');
  Route::get('/search-product', 'ProductController@searchProduct')->name('search.product');
  Route::get('/categories/json', 'CategoryController@getCategoriesJson')->name('categories.json');
  Route::resource('sizes', 'SizeController', ['except' => ['create', 'show']]);


  Route::get('/order/add-product', 'OrderController@addProduct')->name('order.add.product');
  Route::get('/order/update-product', 'OrderController@updateProduct')->name('order.update-product');
  Route::get('/order/update-product-summary', 'OrderController@updateProductSummary')->name('order.update-product-summary');
  Route::get('/order/update-user-address', 'OrderController@updateUserAddress')->name('order.update-user-address');
  Route::get('/order/{order}/invoice', 'OrderController@generateInvoice')->name('order.invoice');
  Route::resource('order', 'OrderController', ['except' => ['show']]);

  Route::get('/orders/json', 'OrderController@getOrdersJson')->name('orders.json');

  Route::resource('enquiries', 'ProductEnquiryController', ['except' => ['create', 'show']]);
  Route::get('/get-enquiries', 'ProductEnquiryController@getEnquiriesJson')->name('enquiries.json');


  Route::get('/request', 'RequestController@index')->name('request.index');
  Route::delete('/request/{id}', 'RequestController@destroy')->name('request.destroy');
  Route::get('/get-request', 'RequestController@getReviewsJson')->name('request.json');
  Route::get('/message', 'MessageController@index')->name('message.index');
  Route::delete('/message/{id}', 'MessageController@destroy')->name('message.destroy');
  Route::get('/get-message', 'MessageController@getReviewsJson')->name('message.json');
  Route::get('/get-quotes', 'GetQuoteController@getQuotes')->name('getquotes');
  Route::post('/delete-quotes', 'GetQuoteController@delete')->name('deleteQuote');
    Route::get('/get-requested-product', 'RequstedProductController@getRequestedProduct')->name('getRequestedProduct');
    Route::post('/delete-requestedproduct', 'RequstedProductController@delete')->name('deleteRequestedProduct');
});
Route::group([
  'prefix' => 'dashboard',
  'as' => 'dashboard.',
  'namespace' => 'Backend',
  'middleware' => 'role:admin|manager'
], function () {


  Route::resource('/categories', 'CategoryController', ['except' => ['show']]);


  Route::post('/product/image/upload', 'ProductController@uploadImage')->name('product.image.upload-image');
  Route::post('/product/image/delete', 'ProductController@deleteImage')->name('product.image.delete-image');
  Route::post('/product/faq/delete', 'ProductController@deleteFaq')->name('product.faq.delete');
  Route::post('/product/specification/delete', 'ProductController@deleteSpecification')->name('product.specification.delete');
  Route::post('/product/color/delete', 'ProductController@deleteColor')->name('product.color.delete');
  Route::post('/product/download/delete', 'ProductController@deleteDownload')->name('product.download.delete');
  Route::post('/product/download/file/upload', 'ProductController@downloadFileUpload')->name('product.download.file.upload');

  Route::resource('category', 'CategoryController', ['except' => ['create', 'show']]);


  Route::resource('brands', 'BrandController', ['except' => ['show']]);
  Route::get('/get-brands', 'BrandController@getBrandsJson')->name('brands.json');

  Route::resource('gallerys', 'GalleryController', ['except' => ['show']]);
  Route::get('/get-gallerys', 'GalleryController@getGalleriesJson')->name('gallerys.json');


  Route::resource('testimonials', 'TestimonialController', ['except' => ['show']]);
  Route::get('/get-testimonials', 'TestimonialController@getTestimonialsJson')->name('testimonials.json');


  Route::get('/review', 'ReviewController@index')->name('review.index');
  Route::delete('/review/{id}', 'ReviewController@destroy')->name('review.destroy');
  Route::post('/review/status/{id}', 'ReviewController@updateStatus')->name('review.status');
  Route::get('/get-reviews', 'ReviewController@getReviewsJson')->name('reviews.json');

  Route::post('/mail', 'MailController@sendMail')->name('mail');
});

Route::group([
  'prefix' => 'dashboard',
  'as' => 'dashboard.',
  'namespace' => 'Backend',
  'middleware' => 'role:admin'
], function () {
  Route::get('/profile', 'ProfileController@getProfile')->name('profile');

  Route::post('/profile', 'ProfileController@postProfile')->name('profile.update');
  Route::resource('slideshows', 'SlideshowController', ['except' => ['show']]);
  Route::resource('college', 'CollegeController', ['except' => ['show']]);
  Route::get('/get-slideshows', 'SlideshowController@getSlideshowsJson')->name('slideshows.json');

  Route::post('/background', 'BackgroundController@save')->name('background.save');
  Route::get('/search-user', 'UserController@searchUser')->name('search.user');

  Route::resource('page', 'PageController', ['except' => ['show']]);
  Route::get('/get-pages', 'PageController@getPagesJson')->name('pages.json');
  Route::resource('/posts', 'PostController', ['except' => ['show']]);
  Route::get('/get-posts', 'PostController@getPostsJson')->name('posts.json');

  Route::get('/menus', 'MenuController@index')->name('menus.show');
  Route::post('harimayco/addmenu', 'MenuController@addmenu')->name('haddmenu');
  Route::get('/settings', 'ConfigurationController@getConfiguration')->name('settings');
  Route::post('/settings', 'ConfigurationController@postConfiguration')->name('settings.update');
  Route::get('/suscriber', 'RequestController@getSuscriber')->name('suscriber');

  Route::delete('/suscriber/{id}', 'RequestController@suscriberdestroy')->name('suscriber.destroy');

  Route::get('/users/admin', 'UserController@getAdminUsersJson')->name('users.admin.json');
  Route::get('/users/manager', 'UserController@getManagerUsersJson')->name('users.manager.json');
  Route::get('/users/client', 'UserController@getClientUsersJson')->name('users.client.json');
  Route::get('/users/shop-manager', 'UserController@getShopManagerUsersJson')->name('users.shop-manager.json');

  Route::resource('users', 'UserController');
  Route::get('/get-users', 'UserController@getUsersJson')->name('users.json');

  Route::resource('team', 'TeamController', ['except' => ['show']]);
  Route::get('/get-team', 'TeamController@getTeamJson')->name('team.json');

  Route::resource('about', 'AboutController', ['except' => ['show']]);

  Route::get('/get-about', 'AboutController@getReviewsJson')->name('about.json');
  Route::get('/get-suscriber', 'RequestController@getSuscriberJson')->name('suscriber.json');
});
Route::group([
  'prefix' => 'dashboard',
  'as' => 'dashboard.',
  'namespace' => 'Backend',
  'middleware' => 'role:shop-manager'
], function () {
});
//} );

Route::get('storage/{folder}/{filename}', function ($folder, $filename) {
  $path = storage_path('app/public/' . $folder . '/' . $filename);

  if (!File::exists($path)) {
    abort(404);
  }

  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);

  return $response;
});

// Catch all PageController (place at the very bottom)
Route::get('/page/{slug}', ['uses' => 'PageController@getPage'])->where('slug', '([A-Za-z0-9\-\/]+)');
Route::get('/get-quote', 'Controller@getquote')->name('getquote');
Route::get('/checkout/zone/', 'CheckoutController@zonechange')->name('checkout.zone');
Route::get('autocomplete', 'SearchController@autocomplete');
Route::get('/getRequest','RequestProductController@getProductRequest')->name('getProductRequest');
Route::post('/storeRequestProduct','RequestProductController@storeRequestProduct')->name('storeRequestProduct');