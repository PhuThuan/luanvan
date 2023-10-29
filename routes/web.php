<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\hospitalController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\client\ChuyenKhoaController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\formOfChoiceeduleController;
use App\Http\Controllers\client\instructController;
use App\Http\Controllers\client\medicalBillController;
use App\Http\Controllers\client\PatientRecordController;
use App\Http\Controllers\client\PayController;
use App\Http\Controllers\client\scheduleController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\workScheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['checklogin'])->group(function () {
    // Define your routes here.
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::middleware([])->group(function () {
    // Define your routes here.

    Route::get('/doctor', [DoctorController::class, 'zindex'])->name('Admin');
    Route::get('/DoctorAccount', [DoctorController::class, 'index'])->name('Doctor');
    Route::post('/DoctorAccount', [DoctorController::class, 'adddoctor']);
    Route::delete('/delete-doctor/{id}', [DoctorController::class, 'delete'])->name('delete-doctor');
    Route::get('/workSchedule', [workScheduleController::class, 'index'])->name('workSchedule');
    Route::get('/createWorkSchedule', [workScheduleController::class, 'createindex'])->name('createworkSchedule');
    Route::post('/settingCreateWorkSchedule', [workScheduleController::class, 'settingCreateindex'])->name('settingcreateworkSchedule');
    Route::delete('/delete-setting-create-work-schedule/{id}', [workScheduleController::class, 'delete'])->name('delete-setting-create-work-schedule');
    Route::post('doctor/addcreateWorkSchedule', [workScheduleController::class, 'addcreateWorkSchedule'])->name('addcreateworkSchedule');
});
Route::get('/loginAdmin', [LoginAdminController::class, 'index']);
Route::post('/loginAdmin', [LoginAdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('/co-so-y-te', [scheduleController::class, 'index'])->name('Schedule');
Route::get('/{slug}/hinh-thuc-dat-kham', [formOfChoiceeduleController::class, 'index'])->name('formOfChoiceedule');
Route::get('/{slug}/hinh-thuc-dat-kham/dat-kham-theo-bac-si', [formOfChoiceeduleController::class, 'indexdoctor'])->name('formOfChoiceeduleByDoctor');
Route::get('/{slug}/hinh-thuc-dat-kham/dat-kham-theo-bac-si/{booking}', [formOfChoiceeduleController::class, 'bookingdoctor'])->name('formOfChoiceeduleByDoctorBooking');
Route::get('/{slug}/hinh-thuc-dat-kham/dat-kham-theo-bac-si/{booking}/{idchs}', [formOfChoiceeduleController::class, 'bookingdoctorid'])->name('formOfChoiceeduleByDoctorBookingid');
Route::get('/{slug}/hinh-thuc-dat-kham/dat-kham-theo-bac-si/{booking}/{idchs}/{idrc}', [formOfChoiceeduleController::class, 'bookingdoctoridrc'])->name('formOfChoiceeduleByDoctorBookingidrc');
Route::get('{slug}/hinh-thuc-dat-kham/dat-kham-theo-chuyen-khoa',[ChuyenKhoaController::class,'index'])->name('chonchuyenkhoa');
Route::post('/thanhtoan/{idrc}/{idws}', [PayController::class, 'index'])->name('thanhtoan');
Route::get('/huong-dan', [instructController::class, 'index'])->name('instruct');

Route::get('/kenh-tao-moi-ho-so', [PatientRecordController::class, 'create'])->name('patientrecords');

Route::post('/kenh-tao-moi-ho-so1', [PatientRecordController::class, 'stores'])->name('patientrecords1');


Route::get('/admin',[AdminController::class,'index'])->name('adminSys');
Route::get('/admin/phong-kham', [hospitalController::class, 'index'])->name('hospital');
Route::post('/admin/them-phong-kham', [hospitalController::class, 'store'])->name('addhospital');
Route::delete('/delete-hospital/{id}', [hospitalController::class, 'delete'])->name('delete-hospital');

Route::get('/phieu-kham/{id}',[medicalBillController::class,'index'])->name('medicalBill');

Route::post('/hop-tac',[ContactController::class,'store'])->name('contact');










Route::get('/error', function () {
    return '404';
})->name('error');

Route::get('/get-address', function () {

    $json = File::get(public_path('addressData.json'));
    return response($json)->header('Content-Type', 'application/json');
});
