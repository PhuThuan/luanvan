<?php

namespace App\Http\Controllers\AdminDoctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\WorkkingtimeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminworkScheduleController extends Controller
{
    //
    public function index($id=null)
    {

        $idRoute=0;
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $date = $today->toDateString();
        $dayN = $today->format('l');
        $startOfWeek = $today->startOfWeek()->toDateString(); // Lấy ngày đầu tuần
        $endOfWeek = $today->endOfWeek()->toDateString(); // Lấy ngày cuối tuần// Lấy ngày cuối tuần
        $startOfWeek = $today->startOfWeek()->toDateString(); // Start of the week
        $startOfWeek = $today->startOfWeek()->toDateString(); // Start of the week
        $endOfWeek = $today->endOfWeek()->toDateString(); // End of the week
        if($id!=null){

  
            $idRoute=$id;
          
            $endOfWeek = $today->copy()->addDays(7 * $id)->endOfWeek()->toDateString();
            $startOfWeek = $today->copy()->addDays(7* $id)->startOfWeek()->toDateString();
           
          
          
          }
        $workSchedules = [];

        // Retrieve working times for the specific week
        //lay thoi gian

        $userId = Auth::id();
        $doctor = DoctorModel::where('id_user', $userId)->first();
        $Specialty = SpecialtyModel::find($doctor->id_specialty);
        $hospital = hospitalModel::find($Specialty->id_hospital);

        $Specialty1 = SpecialtyModel::where('id_hospital', $hospital['id'])->get()->toArray();
        $validSpecialties = [];

        foreach ($Specialty1 as $specialty) {
            // Lấy id từ chuyên ngành
            $userId = $specialty['id'];

            // Thực hiện truy vấn để lấy thông tin bác sĩ
            $doctors = DoctorModel::where('id_specialty', $userId)->get()->toArray();

            // Thêm thông tin bác sĩ vào mỗi chuyên ngành nếu có bác sĩ
            if (!empty($doctors)) {
                $specialty['doctors'] = $doctors;
                $validSpecialties[] = $specialty;
            }
        }

        //   dd($validSpecialties);
        $scheduleItems = [];
        foreach ($validSpecialties as $validSpecial) {

            foreach ($validSpecial['doctors'] as $specialty) {
                $scheduleItem = ScheduleModel::where('id_doctor', $specialty['id'])
                    ->get()->toArray();
                if ($scheduleItem) {
                    // Thêm mục vào mảng nếu nó tồn tại
                    $scheduleItems[] = $scheduleItem;
                }
            }
        }

     
        foreach ($scheduleItems as &$scheduleItem) {
            foreach ($scheduleItem as &$item) { // Use &$item to get a reference to the original array
        
                // Lấy thông tin từ bảng WorkkingtimeModel
                $workingTime = WorkkingtimeModel::whereBetween('Day', [$startOfWeek, $endOfWeek])
                    ->where('id', $item['id_working_time'])
                    ->first();
                $doctor = DoctorModel::where('id', $item['id_doctor'])
                    ->first();
        
                if ($workingTime) {
                    // Thêm thông tin từ WorkkingtimeModel vào $item
                    $item = array_merge($item, [
                        'name' => $doctor['full_name'],
                        'start_time' => $workingTime['start_time'],
                        'end_time' => $workingTime['end_time'],
                        'day' => $workingTime['day'],
                        'schedules' => $item['status'], // Assuming 'status' is the correct column name
                    ]);
                }
            }
            // No need to dd($scheduleItem) inside the outer loop
        }
        
        // Ensure to unset the references to avoid potential issues with later code
        unset($scheduleItem, $item);
    //   dd($scheduleItems);
    $workSchedules = [];
    $currentDaySchedules = ['morning' => null, 'afternoon' => null, 'evening' => null];
    $currentDay = null;
    
    foreach ($scheduleItems as $id) {
        foreach ($id as $id1) {
            if (isset($id1['day'])) {
                $day = Carbon::parse($id1['day']);
                $id1StartTime = Carbon::parse($id1['start_time']);
    
                // Check if the start time falls within any of the specified time ranges
                if (
                    ($id1StartTime->between('07:00', '11:00')) ||
                    ($id1StartTime->between('13:00', '16:30')) ||
                    ($id1StartTime->between('17:00', '23:59'))
                ) {
                    // Check if the day is different from the current day
                    if (!$day->isSameDay($currentDay)) {
                        // If the current day is different, add the current day's schedules to $workSchedules
                        foreach ($currentDaySchedules as $timeSlot => $schedule) {
                            if ($schedule) {
                                $workSchedules[] = $schedule;
                            }
                        }
    
                        // Reset the current day schedules
                        $currentDaySchedules = ['morning' => null, 'afternoon' => null, 'evening' => null];
    
                        // Update the current day
                        $currentDay = $day;
                    }
    
                    // Determine the time slot based on the start time
                    $timeSlot = ($id1StartTime->between('07:00', '11:00')) ? 'morning' :
                                (($id1StartTime->between('13:00', '16:30')) ? 'afternoon' : 'evening');
    
                    // Add the schedule to the current day's schedules if it's the first one for that time slot
                    if (!$currentDaySchedules[$timeSlot]) {
                        $currentDaySchedules[$timeSlot] = [
                            'name' => $id1['name'],
                            'start_time' => $id1['start_time'],
                            'end_time' => $id1['end_time'],
                            'day' => $day->toDateString(),
                            'schedules' => $id1['status'], // Assuming 'status' is the correct column name
                        ];
                    }
                }
            }
        }
    }
    
    // Add the schedules of the last day to $workSchedules
    foreach ($currentDaySchedules as $timeSlot => $schedule) {
        if ($schedule) {
            $workSchedules[] = $schedule;
        }
    }
    
    // dd($workSchedules);
    
       
      // dd($workSchedules);
       
    
     //dd($workSchedules);
    
    



        $startDate = Carbon::createFromFormat('Y-m-d', $startOfWeek);
        $dateRange = [];

        // Generate the next 7 days
        for ($i = 0; $i < 7; $i++) {
            $dateRange[] = $startDate->copy()->addDays($i)->format('Y-m-d');
        }

        return view('admindoctor/adminWorkSchedule', ['startOfWeek' => $startOfWeek, 'endOfWeek' => $endOfWeek, 'today' => $date, 'todayN' => $dayN, 'name' => $doctor['full_name'], 'workSchedules' => $workSchedules, 'dateRanges' => $dateRange,'idRoute'=>$idRoute]);
    }
}
