<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('lang', 'App\Http\Controllers\LangController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contacts', [App\Http\Controllers\FrontEndController::class, 'contacts'])->name('contacts');
Route::get('/faq', [App\Http\Controllers\FrontEndController::class, 'faq'])->name('faq');
Route::get('/policy', [App\Http\Controllers\FrontEndController::class, 'policy'])->name('policy');
Route::post('get-employee',[\App\Http\Controllers\Manager\MeetingParticipantController::class,'getEmployees']);
Route::resource('comment', 'App\Http\Controllers\GeralCommentsController');
Route::resource('tickets-message', 'App\Http\Controllers\GeralMessageTicketController');
Route::resource('knowledge', 'App\Http\Controllers\KnowledgeBaseController');

Route::get('/invoicegenerate', [App\Http\Controllers\Organization\InvoiceController::class, 'generate']);
Route::resource('invoice', 'App\Http\Controllers\Organization\InvoiceController');
Route::post('/mpesa-payment',[\App\Http\Controllers\Organization\InvoiceController::class,'mpesapayment']);



Route::group(['middleware'=>['auth','organization','active']], function(){
    
    Route::resource('tickets', 'App\Http\Controllers\Organization\TicketsController');
    Route::resource('department', 'App\Http\Controllers\Organization\DepartmentController');
    Route::resource('calendar', 'App\Http\Controllers\Organization\CalendarController');
    Route::resource('configuration', 'App\Http\Controllers\Organization\ConfigurationController');
    Route::resource('employee', 'App\Http\Controllers\Organization\EmployeeController');
    Route::resource('type-meeting', 'App\Http\Controllers\Organization\TypeMeetingController');
    Route::resource('meeting', 'App\Http\Controllers\Organization\MeetingController');
    Route::resource('notification', 'App\Http\Controllers\Organization\NotificationController');
    Route::get('/deleteall-organization',[\App\Http\Controllers\Organization\NotificationController::class,'deleteall']);
    Route::post('/organization-changepassword',[\App\Http\Controllers\Organization\ConfigurationController::class,'changepassword']);
    Route::get('/organization-download-ata/{meeting}',[\App\Http\Controllers\Organization\MeetingController::class,'download']);
    
   

});

Route::group(['middleware'=>['auth','manager','active']], function(){
    Route::resource('manager-tickets', 'App\Http\Controllers\Manager\TicketsController');
    Route::resource('manager-attachment', 'App\Http\Controllers\Manager\MeetingAttachmentController');
    Route::resource('manager-configuration', 'App\Http\Controllers\Manager\ConfigurationController');
    Route::resource('manager-employee', 'App\Http\Controllers\Manager\EmployeeController');
    Route::resource('manager-meeting', 'App\Http\Controllers\Manager\MeetingController');
    Route::resource('manager-meetingparticipant', 'App\Http\Controllers\Manager\MeetingParticipantController');
    Route::resource('manager-meetingtask', 'App\Http\Controllers\Manager\MeetingTaskController');
    Route::get('/download-ata/{meeting}',[\App\Http\Controllers\Manager\MeetingController::class,'download']);
    Route::post('/sendmail/participant', [App\Http\Controllers\Manager\MeetingController::class, 'sendmail'])->name('home');
    Route::post('/manager-changepassword',[\App\Http\Controllers\Manager\ConfigurationController::class,'changepassword']);
    Route::resource('manager-notification', 'App\Http\Controllers\Manager\NotificationController');
    Route::get('/deleteall-manager',[\App\Http\Controllers\Manager\NotificationController::class,'deleteall']);
   

});

Route::group(['middleware'=>['auth','employee','active']], function(){
    Route::resource('employee-tickets', 'App\Http\Controllers\Employee\TicketsController');
    Route::resource('employee-configuration', 'App\Http\Controllers\Employee\ConfigurationController');
    Route::resource('employee-meeting', 'App\Http\Controllers\Employee\MeetingController');
    Route::resource('employee-other-meeting', 'App\Http\Controllers\Employee\OtherMeetingController');
    Route::resource('employee-other-meetingtask', 'App\Http\Controllers\Employee\OtherMeetingTaskController');
    Route::resource('employee-meetingtask', 'App\Http\Controllers\Employee\MeetingTaskController');
    Route::resource('employee-notification', 'App\Http\Controllers\Employee\NotificationController');
    
    Route::get('/employee-download-ata/{meeting}',[\App\Http\Controllers\Employee\MeetingController::class,'download']);
   
    Route::post('/employee-changepassword',[\App\Http\Controllers\Employee\ConfigurationController::class,'changepassword']);
    Route::get('/deleteall-employee',[\App\Http\Controllers\Employee\NotificationController::class,'deleteall']);
   

});
