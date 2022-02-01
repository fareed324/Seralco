<?php

use Illuminate\Support\Facades\Route;
use App\Affiliate;

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

Route::get('/', function () {
    return view('welcome');
});
// Merchants Routes
Route::get('/Merchant', function () {
    return view('merchant.index');
});
// Affiliates Routes
Route::get('/Affiliate', function () {
    return view('affiliate.index');
})->name('Affiliate.index');

// affiliates adjustmoney
// Route::get('/Affiliates_Adjustmoney',function(){
//     return view('affiliate.adjustmoney');
// })->name('Affiliate.adjustmoney');

// Affiliates Payment History
// Route::get('/Affiliates_paymenthistory',function(){
//     return view('affiliate.paymenthistory');
// })->name('Affiliate.paymenthistory');

// // Affiliates Transaction
// Route::get('/Affiliates_Transaction',function(){
//     return view('affiliate.transaction');
// })->name('Affiliate.transaction');

// Affiliates Approve
// Route::get('/Affiliates_Approve',function(){
//     return view('affiliate.approve');
// })->name('Affiliate.approve');

// Affiliates SetCommession
Route::get('/Affiliates_Setcommission',function(){
    return view('affiliate.Setcommission');
})->name('Affiliate.Setcommission');

// Affiliates Reject
// Route::get('/Affiliates_Reject/{id}',function(Affiliate $affiliate,$id){
//     $affiliate=Affiliate::find($id);
//     return view('affiliate.Reject', compact('affiliate'));
// })->name('Affiliate.Reject');

// Route::get('/Affiliates_changepassword',function(){
//     return view('affiliate.changepassword');
// })->name('Affiliate.changepassword');
route::get('Affiliates_Reject/{id}','AffiliateController@Reject')->name('Affiliate.Reject');
// route::get('Affiliates_Remove/{id}','AffiliateController@Remove')->name('Affiliate.Remove');

route::get('Affiliate/changepassword/{id}','AffiliateController@changePasswordForm')->name('Affiliate.changePasswordForm');
route::post('Affiliate/changepassword/{Login}','AffiliateController@changePassword')->name('Affiliate.changePassword');

Route::get('AdjustMoneyForm/{id}', 'AffiliateController@adjustMoneyForm')->name('Affiliate.adjustMoneyForm');
Route::post('AdjustMoney/{id}', 'AffiliateController@adjustMoney')->name('Affiliate.adjustMoney');

Route::get('TransactionForm/{id}', 'AffiliateController@transactionForm')->name('Affiliate.transactionForm');

Route::get('PaymentHistoryForm/{id}', 'AffiliateController@paymentHistoryForm')->name('Affiliate.paymentHistoryForm');
Route::post('PaymentHistoryByDate/{id}', 'AffiliateController@paymentHistoryByDate')->name('Affiliate.paymentHistoryByDate');

Route::get('approve/{id}', 'AffiliateController@approve')->name('Affiliate.approve');
Route::post('setcommission/{id}', 'AffiliateController@setcommission')->name('Affiliate.setcommission');

Route::get('suspend/{id}', 'AffiliateController@suspend')->name('Affiliate.suspend');

Route::get('removeAffiliateForm/{id}', 'AffiliateController@removeAffiliateForm')->name('Affiliate.removeAffiliateForm');
Route::get('removeAffiliate/{id}', 'AffiliateController@removeAffiliate')->name('Affiliate.removeAffiliate');

#Custom Approve
Route::post('approveIt', 'AffiliateController@approveIt')->name('approveIt');


# Payments Routes
Route::get('PaymentHistoryForm1', 'PaymentsController@paymentHistoryForm')->name('payment.paymentHistoryForm');
Route::post('PaymentHistoryByDate1', 'PaymentsController@paymentHistoryByDate1')->name('Payments.paymentHistoryByDate1');


Route::get('RecuringReverseSale', 'PaymentsController@RecuringReverseSale')->name('payment.RecuringReverseSale');

// Merchants Routes
Route::get('/Program', function () {
    return view('program.index');
})->name('Program.index');

// // Payment Routes
// Route::get('/Payment', function () {
//     return view('payment.index');
// })->name('Payment.index');


// Options Routes
Route::get('/Options', function () {
    return view('options.index');
})->name('Options.index');

// PGMStatus Routes
Route::get('/PGMStatus', function () {
    return view('pgmstatus.index');
})->name('PGMStatus.index');

// Report Routes
Route::get('/Report', function () {
    return view('report.index');
})->name('Report.index');


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::resource('Merchant','MerchantController');
Route::resource('Affiliate','AffiliateController');


