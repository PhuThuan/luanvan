<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\client\scheduleController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWorkscheduleResquest;
use App\Http\Requests\SettingCreateWorkscheduleRequest;
use App\Models\createSettingWorkScheduleModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\WorkkingtimeModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Psy\Command\HistoryCommand;

class workScheduleController extends Controller
{
  //
  public function index()
  {
    $today = Carbon::now('Asia/Ho_Chi_Minh');
    $date = $today->toDateString();
    $dayN = $today->format('l');
    $startOfWeek = $today->startOfWeek()->toDateString(); // Lấy ngày đầu tuần
    $endOfWeek = $today->endOfWeek()->toDateString(); // Lấy ngày cuối tuần// Lấy ngày cuối tuần
    $startOfWeek = $today->startOfWeek()->toDateString(); // Start of the week
    $startOfWeek = $today->startOfWeek()->toDateString(); // Start of the week
    $endOfWeek = $today->endOfWeek()->toDateString(); // End of the week
    $workSchedules = [];

    // Retrieve working times for the specific week
    //lay thoi gian

    $userId = Auth::id();
    $doctor = DoctorModel::where('id_user', $userId)->first();
    $scheduleItems = ScheduleModel::where('id_doctor', $doctor['id'])
      ->get();
    foreach ($scheduleItems as $scheduleItem) {
      $workingTime = WorkkingTimeModel::whereBetween('Day', [$startOfWeek, $endOfWeek])
        ->where('id', $scheduleItem->id_working_time) // Assuming 'id' is the correct column name
        ->first(); // Use first() to retrieve a single record

      $workSchedule = [];

      if ($workingTime) {
        $workSchedule = [
          'start_time' => $workingTime->start_time,
          'end_time' => $workingTime->end_time,
          'day' => $workingTime->day, // Assuming 'Day' is the correct column name
          'schedules' => $scheduleItem['status'], // Store schedules as a collection
        ];
      }
      $workSchedules[] = $workSchedule;
    }
   
    $startDate = Carbon::createFromFormat('Y-m-d', $startOfWeek);
    $dateRange = [];

    // Generate the next 7 days
    for ($i = 0; $i < 7; $i++) {
      $dateRange[] = $startDate->copy()->addDays($i)->format('Y-m-d');
    }

    return view('doctor/workSchedule', ['startOfWeek' => $startOfWeek, 'endOfWeek' => $endOfWeek, 'today' => $date, 'todayN' => $dayN, 'name' => $doctor['full_name'], 'workSchedules' => $workSchedules, 'dateRanges' => $dateRange]);
  }
  public function createindex()
  {
    $userId = Auth::id();

    $doctor = DoctorModel::where('id_user', $userId)->first();

    $speciatly =  SpecialtyModel::find($doctor['id_specialty']);

    $hospital =  hospitalModel::find($speciatly['id_hospital']);

    $settings = $sortedSettings = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
      ->orderBy('start_time')
      ->get();

    $specialties = SpecialtyModel::where('id_hospital', $hospital['id'])->get();
    $doctors = [];

    foreach ($specialties as $specialty) {
      $doctorsForSpecialty = DoctorModel::where('id_specialty', $specialty->id)->get();
      $doctors = array_merge($doctors, $doctorsForSpecialty->toArray());
    }
    $today = Carbon::now('Asia/Ho_Chi_Minh');
    $startDate = $today->startOfWeek();
    $days = 7; // Số ngày bạn muốn tạo

    $dateArray = [];
    $dates = [];
    $daysOfWeek = [
      '1' => 'Thứ Hai',
      '2' => 'Thứ Ba',
      '3' => 'Thứ Tư',
      '4' => 'Thứ Năm',
      '5' => 'Thứ Sáu',
      '6' => 'Thứ Bảy',
      '7' => 'Chủ Nhật',
    ];
    for ($i = 1; $i <= $days; $i++) {
      $date = $startDate->copy()->addDays($i);
      $dateArray[] = $daysOfWeek[$i];
      $dates[] = $date->toDateString();
    }
    $settings = $sortedSettings = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
      ->orderBy('start_time')
      ->get();


    $timework = [];

    foreach ($settings as $setting) {
      if (strtotime($setting->start_time) >= strtotime('07:00:00') && strtotime($setting->start_time) <= strtotime('11:00:00')) {
        $timework['1'] = 'Buổi sáng';
      }
      if (strtotime($setting->start_time) >= strtotime('13:00:00') && strtotime($setting->start_time) <= strtotime('16:00:00')) {
        $timework['2'] = 'Buổi chiều';
      }
      if (strtotime($setting->start_time) >= strtotime('17:00:00') || (strtotime($setting->start_time) >= strtotime('00:00:00') && strtotime($setting->start_time) <= strtotime('05:00:00'))) {
        $timework['3'] = 'Buổi tối';
      }
     
    }
    $today1 = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek();
    $today2 = $today1->copy()->endOfWeek();
    $nextWeek = [];

    for ($i = 0; $i <= 8; $i++) {
      $nextWeek[] = $today1->toDateString() . ' đến ' . $today2->toDateString();
      $today1->addDays(7);
      $today2->addDays(7);
    }

   if($timework==null){
    $time = [
      '8' => 'Không làm việc',
    ];
    return  view('doctor/addworkSchedule', ['settings' => $settings, 'doctors' => $doctors, 'dateArrays' => $dateArray, 'timework' => $time, 'dates' => $dates, 'nextWeek' => $nextWeek]);
   }
    if (count($timework) == 3) {
      $time = [
        '1' => 'Buổi sáng',
        '2' => 'Buổi chiều',
        '3' => 'Buổi tối',
        '4' => 'Buổi sáng và buổi chiều',
        '5' => 'Buổi sáng và buổi tối',
        '6' => 'Buổi chiều và buổi tối',
        '7' => 'Buổi sáng và buổi chiều và buổi tối',
        '8' => 'Không làm việc',
      ];
    } else if (count($timework) == 2) {
      if ($timework['1'] == 'Buổi sáng' &&  $timework['2'] == 'Buổi chiều') {
        $time = [
          '1' => 'Buổi sáng',
          '2' => 'Buổi chiều',
          '4' => 'Buổi sáng và buổi chiều',
          '8' => 'Không làm việc',
        ];
      } else if ($timework['1'] == 'Buổi sáng' &&     $timework['3'] == 'Buổi tối') {
        $time = [
          '1' => 'Buổi sáng',
          '3' => 'Buổi tối',
          '5' => 'Buổi sáng và buổi tối',
          '6' => 'Buổi chiều và buổi tối',
          '8' => 'Không làm việc',
        ];
      } else {
        $time = [
          '2' => 'Buổi chiều',
          '3' => 'Buổi tối',
          '6' => 'Buổi chiều và buổi tối',
          '8' => 'Không làm việc',
        ];
      }
    } else {
      if ($timework['1'] == 'Buổi sáng') {
        $time = [
          '1' => 'Buổi sáng',
          '8' => 'Không làm việc',
        ];
      } else if ($timework['2'] == 'Buổi chiều') {
        $time = [
          '2' => 'Buổi chiều',
          '8' => 'Không làm việc',
        ];
      } else {
        $time = [
          '3' => 'Buổi tối',
          '8' => 'Không làm việc',
        ];
      }
    }
  



    return  view('doctor/addworkSchedule', ['settings' => $settings, 'doctors' => $doctors, 'dateArrays' => $dateArray, 'timework' => $time, 'dates' => $dates, 'nextWeek' => $nextWeek]);
  }

  public function settingCreateindex(SettingCreateWorkscheduleRequest $request)
  {
    $userId = Auth::id();

    $doctor = DoctorModel::where('id_user', $userId)->first();

    $speciatly =  SpecialtyModel::find($doctor['id_specialty']);

    createSettingWorkScheduleModel::create([
      'id_hospital' => $speciatly['id_hospital'],
      'start_time' => $request->input('startTime'),
      'end_time' => $request->input('endTime'),
    ]);
    return redirect()->back();
  }
  public function delete($id)
  {
    $setting = createSettingWorkScheduleModel::find($id);
    if ($setting) {
      $setting->delete();
    }

    return redirect()->back();
  }

  public function addcreateWorkSchedule(CreateWorkscheduleResquest $request)
  {
    $userId = Auth::id();

    $doctor = DoctorModel::where('id_user', $userId)->first();

    $speciatly =  SpecialtyModel::find($doctor['id_specialty']);

    $hospital =  hospitalModel::find($speciatly['id_hospital']);

    $dateRange = $request->input('time');

    // Split the date range using the "đến" keyword
    $dateParts = explode(" đến ", $dateRange);

    // Get the start date, which is the first element in the array
    $startDate = $dateParts[0];

    // Define the number of days to add
    // For example, adding 7 days

    // Add days to the start date



    $settings = $sortedSettings = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
      ->orderBy('start_time')
      ->get();

    for ($i = 0; $i <= 6; $i++) {
      $newDate = date('Y-m-d', strtotime($startDate . ' + ' . $i . ' days'));
      if ($request->input('t' . $i) == 1) {
        $tempts = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
          ->whereTime('start_time', '>=', '07:00:00')
          ->whereTime('start_time', '<=', '11:00:00')
          ->orderBy('start_time')
          ->get();
        foreach ($tempts as $tempt) {
          $newWorkkingtime =   WorkkingtimeModel::create(
            [
              'start_time' => $tempt['start_time'],
              'end_time' => $tempt['end_time'],
              'Day' => $newDate,
            ],
          );
          $newWorkkingtimeID = $newWorkkingtime->id;
          ScheduleModel::create([
            'id_working_time' => $newWorkkingtimeID,
            'id_doctor' => $request->input('e_name'),
            'status' => 0,
          ],);
        }
      } else  if ($request->input('t' . $i) == 2) {
        $tempts = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
          ->whereTime('start_time', '>=', '13:00:00')
          ->whereTime('start_time', '<=', '16:00:00')
          ->orderBy('start_time')
          ->get();
        foreach ($tempts as $tempt) {
          $newWorkkingtime =   WorkkingtimeModel::create(
            [
              'start_time' => $tempt['start_time'],
              'end_time' => $tempt['end_time'],
              'Day' => $newDate,
            ],
          );
          $newWorkkingtimeID = $newWorkkingtime->id;
          ScheduleModel::create([
            'id_working_time' => $newWorkkingtimeID,
            'id_doctor' => $request->input('e_name'),
            'status' => 0,
          ],);
        }
      } else  if ($request->input('t' . $i) == 3) {

        $tempts = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
          ->whereTime('start_time', '>=', '17:00:00')
          ->whereTime('start_time', '<=', '05:00:00')
          ->orderBy('start_time')
          ->get();
        foreach ($tempts as $tempt) {
          $newWorkkingtime =   WorkkingtimeModel::create(
            [
              'start_time' => $tempt['start_time'],
              'end_time' => $tempt['end_time'],
              'Day' => $newDate,
            ],
          );
          $newWorkkingtimeID = $newWorkkingtime->id;
          ScheduleModel::create([
            'id_working_time' => $newWorkkingtimeID,
            'id_doctor' => $request->input('e_name'),
            'status' => 0,
          ],);
        }
      } else  if ($request->input('t' . $i) == 4) {

        $tempts = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
          ->where(function ($query) {
            $query->whereTime('start_time', '>=', '07:00:00')
              ->whereTime('start_time', '<=', '11:00:00');
          })
          ->orWhere(function ($query) {
            $query->whereTime('start_time', '>=', '13:00:00')
              ->whereTime('start_time', '<=', '16:00:00');
          })
          ->orderBy('start_time')
          ->get();
        foreach ($tempts as $tempt) {
          $newWorkkingtime =   WorkkingtimeModel::create(
            [
              'start_time' => $tempt['start_time'],
              'end_time' => $tempt['end_time'],
              'Day' => $newDate,
            ],
          );
          $newWorkkingtimeID = $newWorkkingtime->id;
          ScheduleModel::create([
            'id_working_time' => $newWorkkingtimeID,
            'id_doctor' => $request->input('e_name'),
            'status' => 0,
          ],);
        }
      } else  if ($request->input('t' . $i) == 5) {
        $tempts = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
          ->where(function ($query) {
            $query->whereTime('start_time', '>=', '07:00:00')
              ->whereTime('start_time', '<=', '11:00:00');
          })
          ->orWhere(function ($query) {
            $query->whereTime('start_time', '>=', '17:00:00')
              ->whereTime('start_time', '<=', '05:00:00');
          })
          ->orderBy('start_time')
          ->get();
        foreach ($tempts as $tempt) {
          $newWorkkingtime =   WorkkingtimeModel::create(
            [
              'start_time' => $tempt['start_time'],
              'end_time' => $tempt['end_time'],
              'Day' => $newDate,
            ],
          );
          $newWorkkingtimeID = $newWorkkingtime->id;
          ScheduleModel::create([
            'id_working_time' => $newWorkkingtimeID,
            'id_doctor' => $request->input('e_name'),
            'status' => 0,
          ],);
        }
      } else  if ($request->input('t' . $i) == 6) {
        $tempts = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
          ->where(function ($query) {
            $query->whereTime('start_time', '>=', '13:00:00')
              ->whereTime('start_time', '<=', '16:00:00');
          })
          ->orWhere(function ($query) {
            $query->whereTime('start_time', '>=', '17:00:00')
              ->whereTime('start_time', '<=', '05:00:00');
          })
          ->orderBy('start_time')
          ->get();
        foreach ($tempts as $tempt) {
          $newWorkkingtime =   WorkkingtimeModel::create(
            [
              'start_time' => $tempt['start_time'],
              'end_time' => $tempt['end_time'],
              'Day' => $newDate,
            ],
          );
          $newWorkkingtimeID = $newWorkkingtime->id;
          ScheduleModel::create([
            'id_working_time' => $newWorkkingtimeID,
            'id_doctor' => $request->input('e_name'),
            'status' => 0,
          ],);
        }
      } else  if ($request->input('t' . $i) == 7) {
        $tempts = createSettingWorkScheduleModel::where('id_hospital', $hospital['id'])
          ->orderBy('start_time')
          ->get();
        foreach ($tempts as $tempt) {
          $newWorkkingtime =   WorkkingtimeModel::create(
            [
              'start_time' => $tempt['start_time'],
              'end_time' => $tempt['end_time'],
              'Day' => $newDate,
            ],
          );
          $newWorkkingtimeID = $newWorkkingtime->id;
          ScheduleModel::create([
            'id_working_time' => $newWorkkingtimeID,
            'id_doctor' => $request->input('e_name'),
            'status' => 0,
          ],);
        }
      } else  if ($request->input('t' . $i) == 8) {
      }
    }







    return redirect()->back();
  }
}
