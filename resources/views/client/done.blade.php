<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

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

    <div class="container mx-auto p-4 flex">
        <div class="w-1/2 p-4">
            <!-- Content for the first column -->
            <h2 class="text-2xl font-semibold">Thông tin phòng khám</h2>
            <p class="mt-2 text-gray-700">{{$hospital['name']}}</p>
        </div>
        <div class="w-1/2 p-4">
            <div class="bg-gray-100 p-4 mb-4">
                <!-- Content for the top box -->
                <h2 class="text-2xl font-semibold">Xác nhận thông tin khám</h2>
                <table class="w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Chuyên khoa</th>
                            <th class="px-4 py-2">Bác sĩ</th>
                            <th class="px-4 py-2">Thời gian khám</th>
                            <th class="px-4 py-2">Tiền khám</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">1</td>
                            <td class="border px-4 py-2">{{$Specialty['name']}}</td>
                            <td class="border px-4 py-2">{{$doctor['full_name']}}</td>
                            <td class="border px-4 py-2">{{$Workkingtime['start_time']}} - {{$Workkingtime['end_time']}}</td>
                            @if ($cost->cost==0)
                            <td class="border px-4 py-2">Miễn phí</td>
                            @else
                            <td class="border px-4 py-2">{{$cost->cost}}</td>
                            @endif
                          
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-100 p-4">
                <!-- Content for the bottom box -->
                <h2 class="text-2xl font-semibold">Thông tin bệnh nhân</h2>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <p class="text-gray-700">Họ và tên: {{$patientRecords['name']}}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Ngày sinh: {{$patientRecords['date_of_birth']}}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Email: {{$patientRecords['email']}}</p>
                    </div>
                   
                    <div>
                        <p class="text-gray-700">Giới tính: {{$patientRecords['gender']}}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">CMND: {{$patientRecords['date_of_birth']}}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Dân tộc: {{$patientRecords['ethnic']}}</p>
                    </div>
                    
                </div>
                <div>
                    <p class="text-gray-700">Địa chỉ: {{$address['province']}}, {{$address['district']}}, {{$address['commune']}}, {{$address['street_address']}}</p>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <div class="bg-gray-100 p-4">
                @if ($cost->cost==0)
                <h2 class="text-2xl font-semibold">Đặt lịch</h2>
                <form method="POST" action="{{ route('datlich',['idrc'=>$Schedule['id'],'idws'=>$patientRecords['id']]) }}">
                    @csrf
                    
                    <!-- Thêm các trường thông tin khác cần thiết cho thanh toán -->
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full mt-4">Đặt lịch</button>
                </form>
                @else
                <h2 class="text-2xl font-semibold">Thanh toán VNPAY</h2>
                <form method="POST" action="{{ route('thanhtoan',['idrc'=>$Schedule['id'],'idws'=>$patientRecords['id']]) }}">
                    @csrf
                    <select name="tnh" class="border rounded px-4 py-2 focus:outline-none focus:border-blue-500">
                        <option class="py-2">Chọn ngân hàng</option>
                        <option value="acb" class="py-2">ACB</option>
                        <option value="ncb" class="py-2">NCB</option>
                    </select>
                    <br>
                    <!-- Thêm các trường thông tin khác cần thiết cho thanh toán -->
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full mt-4">Thanh toán</button>
                </form>
                @endif
               
            </div>
        </div>
    </div>
    
</body>
</html>
