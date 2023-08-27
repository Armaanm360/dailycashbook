<?php

use App\Http\Controllers\Expenses\ExpensesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('registration', 'Admin\UserRegistrationController@userRegisterController');


Route::post('staff-signin', 'Admin\UserRegistrationController@userLoginController');





Route::resource('expense', Expenses\ExpensesController::class);
Route::get('expense/expense-list/{expense_type}/{expense_created_by}', 'Expenses\ExpensesController@userParamWise');

Route::resource('earning', Earning\EarningController::class);
Route::get('earning/earning-list/{earning_type}/{earning_created_by}', 'Earning\EarningController@userParamWise');


//expense earning

Route::resource('expense-earning', ExpenseEarning\ExpenseEarningController::class);
Route::get('expense-earning/list/{created_by}/{type}/{ex_ear_type}', 'ExpenseEarning\ExpenseEarningController@userParamWise');
Route::get('expense-earning/expense-earning-total/{created_by}/{ex_ear_type}/{date?}', 'ExpenseEarning\ExpenseEarningController@dateWise');
Route::get('datewise-expense-earning', 'ExpenseEarning\ExpenseEarningController@getdateWise');

//ex


Route::get('send-mail', 'Admin\UserRegistrationController@sendEmailCode');

Route::get('send-mail-delete/{email}', 'Admin\UserRegistrationController@deletEmailWithCode');


Route::get('send-mail-confirmation', 'Admin\UserRegistrationController@mailConfirmation');


Route::get('resend-otp', 'Admin\UserRegistrationController@resenOtp');


// Route::get('send-mail', function () {

//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];

//     \Mail::to('armaan.codecyber@gmail.com')->send(new \App\Mail\VerifiedEmailTester($details));

//     dd("Email is Sent.");
// });
