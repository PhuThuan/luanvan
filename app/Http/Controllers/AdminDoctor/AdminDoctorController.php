<?php

namespace App\Http\Controllers\AdminDoctor;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\CostModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\User;
use App\Models\WorkkingtimeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminDoctorController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();

        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = hospitalModel::find($specialties['id_hospital']);

        $specialty = SpecialtyModel::where('id_hospital', $hospital['id'])->get();


        $doctors = [];

        foreach ($specialty as $specialties) {
            $tempDoctors = DoctorModel::where('id_specialty', $specialties['id'])->get();
            $namespecialty = $specialties['name'];

            foreach ($tempDoctors as $doctor) {
                $doctor['specialty'] = $namespecialty;
                $doctors[] = $doctor->toArray();
            }
        }

        $temptSchedule = [];
        foreach ($doctors as $doctor) {
            $tempSchedule = ScheduleModel::where('id_doctor', $doctor['id'])->where('status', 1)->get();
            if ($tempSchedule->isEmpty()) {
                continue; // Bỏ qua bác sĩ nếu không có lịch trình
            }
            $temptSchedule[] = $tempSchedule;
        }


        return view('admindoctor.index', ['doctor' => count($doctors)]);
    }

    public function infomation()
    {
        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();

        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = hospitalModel::find($specialties['id_hospital']);

        $address = AddressModel::find($hospital['id_address']);
        $hospital['address'] =  $address['street_address'] . ' ' . $address['commune'] . ' ' . $address['district'] . ' ' . $address['province'];

        $cost =   CostModel::where('id_hospital', $hospital['id'])->first();

        return  view('admindoctor.infomation', ['hospital' => $hospital, 'cost' => $cost]);
    }

    public function  updatecost(Request $request)
    {
        //  dd($request);
        // Lấy giá trị mới từ yêu cầu AJAX
        $id_hospital = $request->input('id_hospital');
        $today =  Carbon::today();
        if ($request->input('newCost') != null) {
            $newCost = $request->input('newCost');

            CostModel::where('id_hospital',  $id_hospital)->update([
                'cost' =>  $newCost,
                'id_hospital' =>  $id_hospital,
                'day' =>  $today,
            ]);
        }
        if ($request->file('newLogo')) {

            $uploadedFile = $request->file('newLogo');
            $imagePath = 'image/hospital/' . $uploadedFile->getClientOriginalName(); // Define the file path and name

            // Move the uploaded file to the desired location
            $uploadedFile->move(public_path('image/hospital'), $imagePath);

            // Now, $imagePath contains the relative path to the uploaded file


            $a =  hospitalModel::where('id',  $id_hospital)->update([
                'logo' =>  $imagePath,
            ]);
        }
        //
        if ($request->input('newIntroduce')) {

            $newCost = $request->input('newIntroduce');
            $a =  hospitalModel::where('id',  $id_hospital)->update([
                'introduce' => $request->input('newIntroduce'),
            ]);
        }

        // Thực hiện cập nhật dữ liệu vào cơ sở dữ liệu ở đây

        // Trả về kết quả (có thể là JSON response)
        return redirect()->back();
    }


    public function specialist()
    {
        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();

        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = hospitalModel::find($specialties['id_hospital']);

        $specialty = SpecialtyModel::where('id_hospital', $hospital['id'])->get();
        foreach ($specialty as $id) {
            $doctor = DoctorModel::where('id_specialty', $id['id'])->get();
            $id['doctor'] = count($doctor);
        }
        return view('admindoctor.specialist', ['specialty' => $specialty]);
    }

    public function storespecialist(Request $request)
    {

        $slug = Str::slug($request->input('name'));

        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();

        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = hospitalModel::find($specialties['id_hospital']);

        SpecialtyModel::create([
            'id_hospital' => $hospital['id'],
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);
        return redirect()->back();
    }
    public function deletespecial($id)
    {

        SpecialtyModel::find($id)->delete();

        return redirect()->back();
    }
    public function putspecial($id, Request $request)
    {
        $slug = Str::slug($request->input('name'));
        SpecialtyModel::find($id)->update([
            'name' => $request->input('name'),
            'slug' => $slug,
        ]);
        return redirect()->back();
    }
    public function detaildoctor($id, $day = null)
    {
        $doctor = DoctorModel::where('id', $id)->first();
        $role =   ['Bác sĩ' => 1, 'Quản lý bệnh viện' => 2];
        $nameDoctor= $doctor['full_name'];

        $idRoute = 0;
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $date = $today->toDateString();
        $dayN = $today->format('l');
        $startOfWeek = $today->startOfWeek()->toDateString(); // Lấy ngày đầu tuần
        $endOfWeek = $today->endOfWeek()->toDateString(); // Lấy ngày cuối tuần// Lấy ngày cuối tuần
        $startOfWeek = $today->startOfWeek()->toDateString(); // Start of the week
        $startOfWeek = $today->startOfWeek()->toDateString(); // Start of the week
        $endOfWeek = $today->endOfWeek()->toDateString(); // End of the week
        $workSchedules = [];
        if ($id != null) {


            $idRoute = $day;

            $endOfWeek = $today->copy()->addDays(7 * $day)->endOfWeek()->toDateString();
            $startOfWeek = $today->copy()->addDays(7 * $day)->startOfWeek()->toDateString();
        }

        // Retrieve working times for the specific week
        //lay thoi gian
      //  dd($doctor);
        $scheduleItems = ScheduleModel::where('id_doctor', $doctor['id'])
            ->get();
        foreach ($scheduleItems as $scheduleItem) {
            $workingTime = WorkkingtimeModel::whereBetween('Day', [$startOfWeek, $endOfWeek])
                ->where('id', $scheduleItem->id_working_time) // Assuming 'id' is the correct column name
                ->first(); // Use first() to retrieve a single record

            $workSchedule = [];

            if ($workingTime) {
                $workSchedule = [
                    'id' => $scheduleItem['id'],
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
        $user = User::where('id',$doctor['id_user'])->first();
        $dataResult = [
            'name'=> $user['name'],
            'user_id' => $user['id'],
            'currentRole' => $user['role'],
            'role' =>  $role,
           
        ];
       
        return view('admindoctor/AdminDoctorDetail', ['dataResult'=>$dataResult,'nameDoctor'=>$nameDoctor,'idDoctor'=>$id,'startOfWeek' => $startOfWeek, 'endOfWeek' => $endOfWeek, 'today' => $date, 'todayN' => $dayN, 'name' => $doctor['full_name'], 'workSchedules' => $workSchedules, 'dateRanges' => $dateRange, 'idRoute' => $idRoute,]);
    }
    public function appointment()
    {
        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();

        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = hospitalModel::find($specialties['id_hospital']);
        $appointments = appointmentScheduleModel::where('hospital',$hospital['name'])->with('patientRecord')->paginate(10);
        $appointments1 = appointmentScheduleModel::where('hospital',$hospital['name'])->with('patientRecord')->get()->toArray();
        foreach ($appointments1 as &$item) {
            // Kiểm tra xem 'patient_record' có tồn tại trong $item không
            if (isset($item['patient_record'])) {
                // Kiểm tra xem 'id_address' có tồn tại trong 'patient_record' không
                if (isset($item['patient_record']['id_address'])) {
                    $address = AddressModel::where('id', $item['patient_record']['id_address'])->first();
                    if ($address) {
                        $nameAddress = $address['street_address'] . ' ' . $address['commune'] . ' ' . $address['district'] . ' ' . $address['province'];
                        $item['address'] = $nameAddress;
                    } else {
                        // Xử lý trường hợp không tìm thấy địa chỉ
                        $item['address'] = 'Không tìm thấy địa chỉ';
                    }
                } else {
                    // Xử lý trường hợp 'id_address' không tồn tại trong 'patient_record'
                    $item['address'] = 'Không có thông tin địa chỉ';
                }
            } else {
                // Xử lý trường hợp 'patient_record' không tồn tại trong $item
                $item['address'] = 'Không có thông tin địa chỉ';
            }
        }
        
        // In ra mảng sau vòng lặp
        // dd($appointments1);
        
        if (request()->wantsJson()) {

            return response()->json($appointments1);
        }
        return view('Admindoctor.appointment', ['appointments' => $appointments]);
    }
}
