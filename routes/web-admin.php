<?php
Route::middleware(['init'])->group(function () {
Auth::routes();
Route::middleware(['checkLogin'])->group(function () {
    Route::get('login', 'AdminAuthController@login');
});
Route::middleware(['adminAuth'])->group(function () {
    Route::get('/dashboard', 'AdminDashboardController@dashboard');
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
    Route::resource('auction','AuctionController');
    Route::resource('sales','SalesController');
    Route::resource('customer','CustomerController');
    Route::resource('shipping-cost','ShippingCostController');
    Route::resource('promotion','PromotionController');
    Route::resource('package','PackageController');
    Route::resource('cms','CmsController');
    Route::resource('setting','SettingController');
    Route::get('/show-product/{id}','ProductController@showProduct');
    Route::get('/show-auction/{id}','AuctionController@showAuction');
    Route::get('/show-customer/{id}','CustomerController@showCustomer');
    Route::get('/adjust-credit','CustomerController@adjustCredit');
    Route::post('/credit-update','CustomerController@updateCredit');
    Route::get('/manage-auto-bid','AutoBidController@manageAutoBid');
    Route::get('/manage-bid-history','BidController@manageBid');
    Route::get('/update-order-status/{orderId}/{status}','SalesController@updateOrderStatus');
    Route::get('/update-customer-status/{userId}/{status}','CustomerController@updateCustomerStatus');
    Route::get('/change-password','AdminAuthController@changePassword');
    Route::post('/update-password','AdminAuthController@UpdatePassword');
    Route::get('/show-credit-sales','SalesController@ShowCreditSales');

    Route::get('/quiz', 'AdminDashboardController@quizindex');
    Route::post('/create-quiz', 'QuizController@create')->name('quiz.create');
    Route::get('/edit-quiz/{quiz}', 'QuizController@edit')->name('quiz.editForm');
    Route::delete('/delete-quiz/{quiz}', 'QuizController@destroy')->name('quiz.delete');
    Route::post('/edit-quiz/{quiz}', 'QuizController@store')->name('quiz.edit');


    Route::get('/question/{quiz}', 'QuestionController@redirect')->name('question.create');
    Route::post('/create-question/{quiz}', 'QuestionController@store')->name('question.store');
    Route::get('/edit-quiz/{quiz}/question/{question}', 'QuestionController@edit')->name('question.editForm');
    Route::post('/edit-quiz/{quiz}/question/{question}', 'QuestionController@editStore')->name('question.edit');
    Route::delete('/delete-quiz/{quiz}/question/{question}', 'QuestionController@destroy')->name('question.delete');
    Route::post('/create-prize', 'PrizeController@store')->name('create.prize');
    Route::post('/prize-update/{prize}', 'PrizeController@prizeupdates')->name('prize.prizeupdate');
    Route::delete('/prize-delete/{prize}', 'PrizeController@destroy')->name('prize.delete');
    Route::get('/publish-result/{id}', 'PrizeController@publishresult')->name('publish.result');
});

});

