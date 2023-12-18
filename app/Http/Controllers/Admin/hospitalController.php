<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\CostModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\SpecialtyModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class hospitalController extends Controller
{
    public function index()
    {
        $hospitals = hospitalModel::where('status',1)->get();

        $Special = [];
        $doctors = [];
        foreach ($hospitals as $hospital) {
            $address = AddressModel::where('id', $hospital['id_address'])->first();

            // Tạo một chuỗi mới chứa thông tin địa chỉ
            $newAddress = $address['province'] . ' ' . $address['district'] . ' ' . $address['commune'] . ' ' . $address['street_address'];
            $Specialty =    SpecialtyModel::where('id_hospital', $hospital['id'])->get();
            $Special = array_merge($doctors, $Specialty->toArray());
            foreach ($Specialty as  $Specialties) {
                $doctorsForSpecialty = DoctorModel::where('id_specialty', $Specialties['id'])->get();
                $doctors = array_merge($doctors, $doctorsForSpecialty->toArray());
            }
            // Gán chuỗi mới vào trường id_address của bệnh viện
            $hospital['id_address'] = $newAddress;
            $hospital['doctors'] = $doctors;
            $hospital['Special'] = $Special;
            $Special = [];
            $doctors = [];
        }


        return view('admin.hospital', ['hospitals' => $hospitals]);
    }
    function checkAddress($s1, $s2, $s3, $s4)
    {
        $address = AddressModel::where('province', $s1)
            ->where('district', $s2)
            ->where('commune', $s3)
            ->where('street_address', $s4)
            ->first();

        // Kiểm tra xem kết quả của truy vấn có tồn tại hay không
        if ($address) {
            $address = AddressModel::select('id')->where('province', $s1)
                ->where('district', $s2)
                ->where('commune', $s3)
                ->where('street_address', $s4)->first();

            return $address;
        } else {
            $data = [
                'province' => $s1,
                'district' => $s2,
                'commune' => $s3,
                'street_address' => $s4,
            ];

            return  AddressModel::create($data);
        }
    }
    public function store(Request $request)
    {

        $address = $request->only('province', 'district', 'commune', 'street_address');
        $id_address =   $this->checkAddress($address['province'], $address['district'], $address['commune'], $address['street_address'],);
        $data = [];
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $imagePath = 'image/hospital/' . $uploadedFile->getClientOriginalName(); // Define the file path and name

            // Move the uploaded file to the desired location
            $uploadedFile->move(public_path('image/hospital'), $imagePath);

            // Now, $imagePath contains the relative path to the uploaded file
            $data['image_url'] = $imagePath;
        }
        $user = User::create([
            'email' => $request->input('user'),
            'password' => Hash::make($request->input('password')),
            'name' => 'Admin',
            'role' => '2',
            'gr_id' => '5',
        ]);
    
        $dd = hospitalModel::create([
            'id_address' => $id_address['id'],
            'name' => $request->input('name'),
            'hospital_type' => 'Phòng Khám',
            'logo' =>  $data['image_url'],
            'introduce' => $request->input('introduce'),
            'status' => 1,
            'slug' =>Str::slug($request->input('name')) 
        ]);
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        CostModel::create([
            'id_hospital'=>$dd['id'],
            'cost'=> 100000 * 100,
            'day'=> $today ,
        ]);
        $specialty = SpecialtyModel::create([
            'id_hospital' => $dd['id'],
            'name' => $request->input('specialty'),
            'slug' => Str::slug($request->input('specialty')),
        ]);
        $doctor = DoctorModel::create([
            'id_address' => $id_address['id'],
            'id_user' => $user['id'],
            'id_specialty' => $specialty['id'],
            'full_name' => 'admin',
            'sex' => 'nam',
            'Qualifications' => '0',
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $hospital = hospitalModel::find($id);
        if ($hospital) {
            $hospital->update(['status' => 0]);
        }

        return redirect()->back();
    }    
}
