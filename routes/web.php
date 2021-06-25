<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/', function () {
    return view('auth.login');
});
Route::post('register-user', "AuthController@signup");
Route::post('login-user', "AuthController@login");
Route::post('findprotectedwork', "AuthController@findprotectedwork");
Route::post('sendmessage', "AuthController@sendmessage");
Route::get('download-certificate-file/{certificateId}/{fileId}', "DashboardController@downloadCertificateFile");
Route::get('show-image/{fileId}', "DashboardController@showImage");
Route::get('about', "AuthController@about");
Route::get('user-agreement', "AuthController@userAgreement");
Route::get('privacy-policy', "AuthController@privacyPolicy");
Route::get('view-user-file/{id}', "AuthController@viewUserFile");
Route::get('view-user-company-file/{id}', "AuthController@viewUserCompanyFile");
Route::get('logout-user', function (){
    \Illuminate\Support\Facades\Session::flush();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout-user');



//dashboard routes
Route::get('dashboard', "DashboardController@dashboard")->middleware('dashboard');
Route::get('manage-offices', "DashboardController@manageOffices")->middleware('dashboard');
Route::get('manage-destinations', "DashboardController@manageDestinations")->middleware('dashboard');
Route::get('delete-office/{id}', "DashboardController@deleteOffice")->middleware('dashboard');
Route::get('delete-destination/{id}', "DashboardController@deleteDestination")->middleware('dashboard');
Route::post('add-new-office', "DashboardController@addNewOffice")->middleware('dashboard');
Route::post('add-new-destination', "DashboardController@addNewDestination")->middleware('dashboard');
Route::get('add-more-tokens', "DashboardController@addMoreTokens")->middleware('dashboard');
Route::get('personal-details', "DashboardController@personalDetails")->middleware('dashboard');
Route::get('billing', "DashboardController@billing")->middleware('dashboard');
Route::get('delete-certificate/{id}', "DashboardController@deleteCertificate")->middleware('dashboard');
Route::post('saving-new-work', "DashboardController@savingNewWork")->middleware('dashboard');
Route::post('set-certificate-password', "DashboardController@resetCertificatePassword")->middleware('dashboard');
Route::post('save-new-token', "DashboardController@saveNewToken")->middleware('dashboard');
Route::post('save-profile-info', "DashboardController@saveProfileInfo")->middleware('dashboard');
Route::post('update-card-info', "DashboardController@updateCardInfo")->middleware('dashboard');
Route::get('my-protected-work', "DashboardController@showMyProtectedWorksPage")->middleware('dashboard');
Route::get('cancel-auto-renew', "DashboardController@cancelAutoRenew")->middleware('dashboard');
Route::get('turnon-auto-renew', "DashboardController@turnOnAutoRenew")->middleware('dashboard');
Route::get('view-certificate/{id}', "DashboardController@viewCertificate")->middleware('dashboard');
Route::get('download-logo/{userId}/{fileId}', "DashboardController@downloadLogo")->middleware('dashboard');
Route::get('tours', "DashboardController@tours")->middleware('dashboard');
Route::get('/add-tour', function () {
    return view('dashboard.add-tour');
});
Route::post('add-tour', "DashboardController@addTour")->middleware('dashboard');
Route::get('show-tour-image/{id}', "DashboardController@showTourImage")->middleware('dashboard');
Route::get('view-tour-icon/{id}', "DashboardController@showTourIconOnLandingPage");
Route::get('view-tour-cover-photo/{id}', "AuthController@viewTourCoverPhoto");
Route::get('show-tour-photos/{id}', "AuthController@showTourPhotos");
Route::get('bids', "DashboardController@bids")->middleware('dashboard');
Route::get('bookings', "DashboardController@bookings")->middleware('dashboard');
Route::get('reviews', "DashboardController@reviews")->middleware('dashboard');
Route::get('reject-bid/{id}', "DashboardController@rejectBid")->middleware('dashboard');
Route::get('accept-bid/{id}', "DashboardController@acceptBid")->middleware('dashboard');
Route::get('completed-bid/{id}', "DashboardController@completedBid")->middleware('dashboard');
Route::get('customer-payment/{token}', "DashboardController@customerPayment");
Route::post('customer-post-payment', "DashboardController@customerPostPayment");
Route::post('/admin-signin', 'AdminController@login');
Route::post('/admin-logout', 'AdminController@signout');
Route::post('/approve-review', 'AdminController@approveReview');
Route::post('/reject-review', 'AdminController@rejectReview');
