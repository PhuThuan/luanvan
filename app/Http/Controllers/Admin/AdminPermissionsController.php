<?php

namespace App\Http\Controllers\admin;
use App\Models\hospitalModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\PermissionModel;
use App\Models\turnsofusemodel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

class AdminPermissionsController extends Controller
{
    //
    public function index()
    {
        $data_group = PermissionModel::all();
        $data_url = [];
        // Artisan::call('route:list');
        // return Artisan::output();
        $dataRoute = Route::getRoutes();

        foreach ($dataRoute as $data) {

            array_push($data_url, $data->getName());
        }
        //dd($dataRoute);
        $data_user = [];

        foreach (User::all() as $data) {
            array_push($data_user, $data['email']);
        }
        $data = [
            'group' =>  $data_group,
            'user' => $data_user,
            'url' => $data_url,
        ];
        //  dd(  $data);
        return view('admin/Permission', ['data' => $data]);
    }
    public function store(Request $request)
    {
        $name = $request->input('name');

        // Thêm mới dữ liệu vào cơ sở dữ liệu hoặc thực hiện xử lý tùy thuộc vào yêu cầu của bạn
        PermissionModel::create([
            'name' => $name,
            'permission' => '',
            //Thêm các trường khác nếu cần
        ]);

        // Trả về phản hồi (nếu cần)
        return redirect()->back();
    }
    public function put(Request $request)
    {

        $gr = PermissionModel::find($request->group);

        $items = $request->input('items');
        $string = implode(', ', $items);
        if (substr($string, -2) !== ', ') {
            $string .= ',';
        }

        // dd(  $string);
        $gr->permission = $string; // Gán giá trị của $string cho cột 'permission'
        $gr->save();
        //   dd( $gr->save());
        return redirect()->back();
    }
    public function statistics(){
    $monthlyCounts = [];

    // Loop through the last 12 months
    for ($i =10 ; $i > -2; $i--) {
        $startDate = Carbon::now()->subMonths($i + 1)->startOfMonth();
        $endDate = Carbon::now()->subMonths($i)->endOfMonth();
    
        // Get the count of appointments for the current month
        $count = appointmentScheduleModel::whereBetween('created_at', [$startDate, $endDate])->count();
        
        // Store the count in the array
        $monthlyCounts[$startDate->format('M ')] = $count;
    }
    
    $turnsofuse = turnsofusemodel::get();
    $turnsofuseCounts = [];
    
    // Loop through the last 12 months
    for ($i = 11; $i >= 0; $i--) {
        $startDate = Carbon::now()->subMonths($i)->startOfMonth();
        $endDate = Carbon::now()->subMonths($i)->endOfMonth();
      
    
        // Initialize count for the current month
        $count = 0;
    
        // Loop through each turnsofuse item
        foreach ($turnsofuse as $item ) {
            // Check if the item's created_at is within the current month
            $itemDate = Carbon::parse($item->day);
            if ($itemDate->between($startDate, $endDate)) {
                // Increment count by the turnsofuse value
                $count += $item->visit;
              
            }
        }
    
        // Store the count in the array
        $turnsofuseCounts[$startDate->format('M')] = $count;
    
        // Dump debugging information
       
    }
    
    // Dump the final results
  
    $hospitalCounts = hospitalModel::leftJoin('appointmentschedule', 'hospital.name', '=', 'appointmentschedule.hospital')
    ->select('hospital.name as hospital', DB::raw('count(appointmentschedule.hospital) as count'))
    ->groupBy('hospital.name')
    ->get()->toArray();

// Now $hospitalCounts contains counts for each unique "benh_vien"
//  dd($hospitalCounts);
$provinceData  = AppointmentScheduleModel::join('patientRecords', 'appointmentschedule.id_patient_records', '=', 'patientRecords.id')
->select('appointmentschedule.*', 'patientRecords.id_address') // Chọn các cột bạn muốn hiển thị từ cả hai bảng
->get()->toArray();

$provinceCounts= [];

foreach ($provinceData  as $appointment) {
    // Lấy tỉnh hoặc thành phố từ trường "dia_chi"
    $address = AddressModel::find($appointment['id_address']);
    $nameAddress = $address['street_address'] . ' ' . $address['commune'] . ' ' . $address['district'] . ' ' . $address['province'];
    // $province = $appointment->address;
    // $address = "765 Đ. Lê Hồng Phong Phường 12 Quận 10 Thành phố Hồ Chí Minh";
    // Sử dụng biểu thức chính quy để lấy phần sau từ "Tinh" hoặc "Thanh pho"
    if (preg_match('/(?:Thành phố|Tỉnh)\s*([\p{L}\s]+)/u', $nameAddress, $matches)) {
        $cityOrProvince = $matches[1];
        // dd($cityOrProvince);
    
        if (isset($provinceCounts[$cityOrProvince])) {
            // Nếu đã có, tăng số lượng lên 1
            $provinceCounts[$cityOrProvince] += 1;
        } else {
            // Nếu chưa có, thêm mới với số lượng là 1
            $provinceCounts[$cityOrProvince] = 0;
        }
    }
}

// Hiển thị kết quả
// dd($provinceCounts);
        return view('admin/statistics',['monthlyCounts'=>$monthlyCounts,'turnsofuseCounts'=>$turnsofuseCounts,'hospitalCounts'=>$hospitalCounts,'provinceCounts'=>$provinceCounts]);
    }
}
