<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminpatientInformationController;
use App\Http\Controllers\admin\hospitalController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\AdminDoctor\AdminDoctorController;
use App\Http\Controllers\client\aboutUsController;
use App\Http\Controllers\client\ChuyenKhoaController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\formOfChoiceeduleController;
use App\Http\Controllers\client\instructController;
use App\Http\Controllers\client\medicalBillController;
use App\Http\Controllers\client\PatientRecordController;
use App\Http\Controllers\client\PayController;
use App\Http\Controllers\client\scheduleController;
use App\Http\Controllers\client\ServiceNewsController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\workScheduleController;
use App\Http\Requests\patientrecordsResquest;
use App\Models\appointmentScheduleModel;
use App\Models\CostModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\patientsModel;
use App\Models\turnsofusemodel;
use App\Models\User;
use Carbon\Carbon;
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
    $users = User::whereDate('last_accessed', Carbon::today())->get();
    $appointmentSchedule = appointmentScheduleModel::get();
    $hospital = hospitalModel::get();
    $doctor = DoctorModel::get();
    $turnsofuse = User::whereDate('last_accessed',  Carbon::today())->get();
    $startDate = Carbon::now()->startOfMonth(); // Lấy ngày đầu tiên của tháng hiện tại
    $endDate = Carbon::now()->endOfMonth(); // Lấy ngày cuối cùng của tháng hiện tại

    $data = turnsofusemodel::whereBetween('created_at', [$startDate, $endDate])->get();
    $turnsofusemonth = 0;
    foreach ($data as $key) {
        $turnsofusemonth =  $key['turnsofuse'] + $turnsofusemonth;
    }

    return view('welcome', ['users' => count($users), 'appointmentSchedule' => count($appointmentSchedule), 'hospital' => count($hospital), 'doctor' => count($doctor), 'turnsofuse' => count($turnsofuse), 'turnsofusemonth' => $turnsofusemonth]);
});

Auth::routes();

Route::middleware(['checklogin', 'auth'])->group(function () {
    // Define your routes here.
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::middleware(['checklogin', 'auth'])->group(function () {
    // Define your routes here.  
    Route::get('/{slug}/hinh-thuc-dat-kham', [formOfChoiceeduleController::class, 'index'])->name('formOfChoiceedule');
    Route::get('/{slug}/hinh-thuc-dat-kham/dat-kham-theo-bac-si', [formOfChoiceeduleController::class, 'indexdoctor'])->name('formOfChoiceeduleByDoctor');



    Route::get('/{slug}/hinh-thuc-dat-kham/dat-kham-theo-chuyen-khoa',[formOfChoiceeduleController::class,'chuyenkhoa'])->name('chuyenkhoa');
    Route::get('/{slug}/hinh-thuc-dat-kham/dat-kham-theo-chuyen-khoa/{khoa}',[formOfChoiceeduleController::class, 'chuyenkhoa1'])->name('chuyenkhoa1');


    Route::get('/{slug}/a/{booking}', [formOfChoiceeduleController::class, 'bookingdoctor'])->name('formOfChoiceeduleByDoctorBooking');
    Route::get('/{slug}/a/{booking}/{idchs}', [formOfChoiceeduleController::class, 'bookingdoctorid'])->name('formOfChoiceeduleByDoctorBookingid');
    Route::get('/{slug}/a/{booking}/{idchs}/{idrc}', [formOfChoiceeduleController::class, 'bookingdoctoridrc'])->name('formOfChoiceeduleByDoctorBookingidrc');
   



    Route::post('/thanhtoan/{idrc}/{idws}', [PayController::class, 'index'])->name('thanhtoan');

    Route::get('/kenh-tao-moi-ho-so', [PatientRecordController::class, 'create'])->name('patientrecords');

    Route::get('/kenh-tao-moi-ho-so/{id}', [PatientRecordController::class, 'update'])->name('patientrecordsupdate');

    Route::post('kenh-tao-moi-ho-so/{id}', [PatientRecordController::class, 'updateid'])->name('patientrecordsupdateid');
    Route::post('/kenh-tao-moi-ho-so1', [PatientRecordController::class, 'stores'])->name('patientrecords1');

    Route::get('/phieu-kham/{id}', [medicalBillController::class, 'index'])->name('medicalBill');

    Route::post('/hop-tac', [ContactController::class, 'store'])->name('contact');
});
Route::get('/huong-dan', [instructController::class, 'index'])->name('instruct');
Route::get('/quy-trinh-hoan-phi', [instructController::class, 'refund'])->name('refundprocess');
Route::get('cau-hoi-thuong-gap', [instructController::class, 'frequently'])->name('frequentlyaskedquestions');
Route::get('tin-tuc', [ServiceNewsController::class, 'index'])->name('servicenews');
Route::get('tin-dich-vu', [ServiceNewsController::class, 'service '])->name('service');
Route::get('tin-tuc/{id}', [ServiceNewsController::class, 'indexid'])->name('servicenewsid');
Route::get('tin-dich-vu/{id}', [ServiceNewsController::class, 'serviceid'])->name('serviceid');
Route::get('ve-chung-toi', [aboutUsController::class, 'index'])->name('aboutus');

Route::middleware([ 'auth'])->group(function () {
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


Route::get('/co-so-y-te', [scheduleController::class, 'index'])->name('Schedule');

Route::middleware(['authAdmin'])->group(function () {



    Route::get('/admin/patient-information', [AdminpatientInformationController::class, 'index'])->name('adminpatientinformation');

    Route::get('/admin', [AdminController::class, 'index'])->name('adminSys');
    Route::get('/admin/phong-kham', [hospitalController::class, 'index'])->name('hospital');
    Route::post('/admin/them-phong-kham', [hospitalController::class, 'store'])->name('addhospital');
    Route::delete('/delete-hospital/{id}', [hospitalController::class, 'delete'])->name('delete-hospital');
    
    Route::get('/admin/questions', [QuestionsController::class, 'index'])->name('questions');
    Route::post('admin/questionCategories', [QuestionsController::class, 'storequestionCategories'])->name('questionCategories');
    Route::delete('admin/questionCategories/{id}', [QuestionsController::class, 'deletequestionCategories'])->name('deleteCategory');
    Route::post('admin/questions/', [QuestionsController::class, 'storequestion'])->name('storequestion');
    Route::delete('admin/question/{id}', [QuestionsController::class, 'deletequestion'])->name('deletequestion');

    Route::get('admin/news', [NewsController::class, 'index'])->name('News');
    Route::post('admin/newsCategories', [NewsController::class, 'newsCategories'])->name('newsCategories');


    Route::delete('admin/newCategories/{id}', [NewsController::class, 'deletenewCategories'])->name('deletenewCategories');
    Route::post('admin/news', [NewsController::class, 'storenews'])->name('storenews');

    Route::delete('admin/new/{id}', [NewsController::class, 'deletenew'])->name('detelenew');

    Route::get('admin/new/details/{id}', [NewsController::class, 'details'])->name('detailsnews');


    Route::get('admin/contact', [AdminContactController::class, 'index'])->name('admincontac');


    Route::post('/admin/contact/{id}', [AdminContactController::class, 'update'])->name('admincontactupdate');
    Route::delete('admin/contact{id}', [AdminContactController::class, 'delete'])->name('admincontactdelete');




    Route::get('/admin-doctor/index', [AdminDoctorController::class, 'index'])->name('admindoctor');
    Route::get('/admin-doctor/infomation',[AdminDoctorController::class, 'infomation'])->name('admindoctorinformation');





});





Route::get('/loginAdmin', [LoginAdminController::class, 'index']);
Route::post('/loginAdmin', [LoginAdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('/error', function () {
    return '404';
})->name('error');


Route::get('save-data', function () {
    $today =  Carbon::today();
    $users = User::whereDate('last_accessed',  $today)->get();
    $appointmentSchedule = appointmentScheduleModel::whereDate('day', $today)->get();

    CostModel::create([
        'id_hospital'=>4,
        'cost'=> 100000 * 100,
        'day'=> $today ,
    ]);
    turnsofusemodel::create([
        'turnsofuse' =>  count($users),
        'day' => $today,
        'visit' => count($appointmentSchedule),
    ]);
});
Route::get('/get-address', function () {

    $json = File::get(public_path('addressData.json'));
    return response($json)->header('Content-Type', 'application/json');
});
