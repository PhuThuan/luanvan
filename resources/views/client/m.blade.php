<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy</title>

   

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header id="body-header" class="grid grid-cols-3 gap-3 text-black bg-zinc-50 ">
        <div class="relative group w-40 p-6 text-3xl">
            <div class="text-white py-2 px-4 cursor-pointer">
                <a href="{{ url('/') }}">
                    <h1
                        class="text-right text-black font-semibold  text-black hover:text-slate-900 dark:text-slate-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Easy
                    </h1>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 ">
            <div class="relative group w-40 p-6 ">
                <div class="text-white py-2 px-4 cursor-pointer">
                    <a href="{{ route('Schedule') }}">
                        <h1 class=" text-black text-lg">Cơ sở y tế</h1>
                    </a>
                </div>
            </div>
            <div class="relative group w-48 p-6">
                <div class="text-white py-2 px-4 cursor-pointer ">
                    <a href="{{ route('instruct') }}">
                        <h1 class="text-black text-lg ">Hướng dẫn</h1>
                    </a>
                    <ul class="hidden absolute text-white group-hover:block top-full left-0   bg-zinc-50 ">
                        <li> <a href="{{ route('instruct') }}" class="block py-2 px-4">
                                <h1 class="text-black text-lg">Đặt lịch khám</h1>
                            </a></li>
                        <li> <a href="{{ route('refundprocess') }}"class="block py-2 px-4">
                                <h1 class="text-black text-lg">Quy trình hoàn phí</h1>
                            </a></li>
                        <li><a href="{{ route('frequentlyaskedquestions') }}" class="block py-2 px-4">
                                <h1 class="text-black text-lg">Câu hỏi thường gặp</h1>
                            </a></li>
                    </ul>
                </div>
            </div>

            <div class="relative group w-40 p-6">
                <div class="text-white py-2 px-4 cursor-pointer">
                    <a href="{{ route('servicenews') }}">
                        <h1 class=" text-black text-lg">Tin tức</h1>
                    </a>
                </div>
                <ul class="hidden absolute text-white group-hover:block  bg-zinc-50 ">
                    <li>
                        <a href="{{ route('servicenews') }}" class="block py-2 px-4">
                            <h1 class=" text-black text-lg">Tin dịch vụ</h1>
                        </a>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('service') }}" class="block py-2 px-4">
                            <h1 class=" text-black text-lg">Tin y tế</h1>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="relative group w-48 p-6">
                <div class="text-white py-2 px-4 cursor-pointer ">
                    <a href="{{ route('aboutus') }}">
                    <h1 class=" text-black text-lg">Về chúng tôi</h1>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="text-3xl font-bold">
                @if (Route::has('login'))
                    <div class="p-6 text-right">
                        @auth
                            <a href="{{ url('/home') }}"
                                class="font-semibold text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Tài
                                Khoản</a>
                        @endauth
                    </div>
                @endif
            </div>
            <div class="relative group w-48 p-4">
                <div
                    class="font-semibold text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    <h1 class=" text-black">Hỗ trợ đặt khám 0123456789</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container mx-auto mt-4">
        <h1 class=" font-bold mb-4"><a href="{{ url('/') }}">Trang chủ </a> &#62;
            <a>{{ $hospital['name'] }} </a> &#62; <a>
                <a> Chọn bác sĩ </a>

        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Left Section for Information -->
            <div class=" p-4 w-[40%] ml-[50%] border  ">
                <h5 class="text-lg text-center font-semibold bg-blue-200 mb-[3%]">Thông tin</h5>
                <p class="text-gray-700">Phòng khám: {{ $hospital->name }}</p>
                <p class="text-gray-700">Địa chỉ: {{ $address}}</p>
                <p class="text-gray-700">Bác sĩ: {{ $doctors->full_name}}</p>
                <p class="text-gray-700">Chuyên khoa: {{ $speacialty->name}}</p>
            </div>
            <!-- Right Section for Doctors -->
            <div class="bg-white p-4 shadow-md">
                <div class="container mt-4">
                    <div class="row">
                        <!-- Left Section for Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Vui lòng chọn ngày và giờ khám</h5>
                                 
                
                                </div>
                            </div>
                        </div>
                
                        <!-- Right Section for Doctors -->
                        <div class="col-md-6 max-h-[500px] overflow-y-auto">
                            @foreach ($workSchedules as $item)
                            
                            <div class="border border-gray-200 p-4 hover:shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1">
                                <a href="{{ route('formOfChoiceeduleByDoctorBookingid', ['slug' => $slug, 'booking' => $booking, 'idchs' => $item['id']]) }}" >
                                <h3 class="text-lg font-semibold">{{ $item['day'] }}</h3>
                                <p class="text-gray-600">{{ $item['start_time'] }} - {{ $item['end_time'] }}</p>
                           </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            
        </div>
        <a href="{{route('Schedule')}} " class="ml-[50%] ">Quay lại</a>
    </div> 
    </div>
    <footer class="bg-gray-800 text-white py-4 mt-[138px]">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <p>&copy; 2023 Your Company. All rights reserved.</p>
            </div>
            <div>
                <a href="#" class="text-gray-300 hover:text-white px-2">Privacy Policy</a>
                <a href="#" class="text-gray-300 hover:text-white px-2">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>

</html>
