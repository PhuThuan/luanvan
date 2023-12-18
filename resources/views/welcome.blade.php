<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy</title>

   
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header id="body-header" class="grid grid-cols-3 gap-3 text-black bg-zinc-50  ">
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
                        <h1 class="text-black text-lg " >Hướng dẫn</h1>
                    </a>
                    <ul class="hidden absolute text-white group-hover:block top-full left-0   bg-zinc-50 ">
                        <li><a href="#" class="block py-2 px-4">
                                <h1 class="text-black text-lg">Đặt lịch khám</h1>
                            </a></li>
                        <li><a href="#" class="block py-2 px-4">
                                <h1 class="text-black text-lg">Quy trình hoàn phí</h1>
                            </a></li>
                        <li><a href="#" class="block py-2 px-4">
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
                    <li><a href="{{ route('servicenews') }}" class="block py-2 px-4">
                            <h1 class=" text-black text-lg">Tin dịch vụ</h1>
                        </a>
                    </li>
                    <li><a href="{{ route('service') }}" class="block py-2 px-4">
                            <h1 class=" text-black text-lg">Tin y tế</h1>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <div class="relative group w-48 p-6">
                <div class="text-white py-2 px-4 cursor-pointer ">
                    <h1 class=" text-black text-lg">Về chúng tôi</h1>
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
    <div class=" inset-0  bg-cover bg-center h-[48rem] "
        style="background-image: url('{{ asset('images/bg_new.png') }}');">

        <h1 class="px-[250px] pt-[250px] text-2xl">Nền tảng công nghệ </h1>
        <h1 class=" px-[250px] text-[40px]">Kết nối người dân với</h1>
        <h1 class=" px-[250px] text-[40px]">Cơ sở - Dịch vụ y tế</h1>
        <h1 class=" px-[250px] text-[20px]">Đặt khám nhanh- lấy số thứ tự trực tuyến</h1>
        <div class="px-[250px] pt-[50px]">
            <a href="{{ route('Schedule') }}"
                class="px-6 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                Đặt khám ngay
            </a>
        </div>


    </div>
    <div class="bg-gray-100 ml-[25%]  pt-[30px]   w-[56rem] ">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1">
                <h1 class="text-3xl font-semibold">Easy</h1>
                <h1 class="text-2xl font-semibold mt-4">Đặt lịch khám bệnh</h1>
            </div>
            <div class="col-span-2">
                <p class="text-lg text-gray-700">
                    Easy cung cấp dịch vụ đặt khám nhanh, lấy số thứ tự trực tuyến và tư vấn sức khỏe từ xa tại các Cơ
                    sở Y tế hàng đầu Việt Nam như phòng khám Đại học Y Dược TP.HCM, phòng khám Chợ Rẫy và phòng khám Nhi
                    Đồng...
                </p>
            </div>
        </div>


        <div class=" grid grid-cols-2 gap-2  pt-[30px]">
            <div
                class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('images/6.png') }}" alt="" />
                </a>
                <div class="p-6">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 text-center">
                        Đặt khám nhanh
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Đặt khám nhanh, thanh toán và lấy số thứ tự trực tuyến tiết kiệm thời gian công sức.
                    </p>
                    <button type="button"
                        class="px-6 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                        <a href="{{ route('Schedule') }}"> Xem thêm</a>
                    </button>
                </div>
            </div>
            <div
                class=" ml-[50px] block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <a href="#!">
                    <img class="rounded-t-lg" src="{{ asset('images/7.png') }}" alt="" />
                </a>
                <div class="p-6">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 text-center ">
                        Cơ sở Y tế rộng khắp
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Mạng lưới  phòng khám, phòng mạch phủ khắp toàn quốc
                    </p>
                    <button type="button"
                        class="px-6 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                        <a href="{{ route('Schedule') }}"> Xem thêm</a>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="border p-4 rounded-lg bg-white shadow-md ml-[25%]   mt-[30px] w-[56rem]">
        <div class="text-center">
            <h1 class="text-xl font-semibold">Số liệu thống kê</h1>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 mt-4">
            <div class="text-center rounded-lg border p-4">
                <img src="{{ asset('images/img1.svg') }}" class="w-16 h-16 mx-auto" alt="Hình 1">
                <h1 class="text-sm mt-2">Lượt khám: {{$appointmentSchedule}}</h1>
            </div>
            <div class="text-center rounded-lg border p-4">
                <img src="{{ asset('images/img3.svg') }}" class="w-16 h-16 mx-auto" alt="Hình 3">
                <h1 class="text-sm mt-2">Cơ sở Y tế: {{$hospital}}</h1>
            </div>
            <div class="text-center rounded-lg border p-4">
                <img src="{{ asset('images/img4.svg') }}" class="w-16 h-16 mx-auto" alt="Hình 4">
                <h1 class="text-sm mt-2">Bác sĩ: {{$doctor}}</h1>
            </div>
            <div class="text-center rounded-lg border p-4">
                <img src="{{ asset('images/img5.svg') }}" class="w-16 h-16 mx-auto" alt="Hình 5">
                <h1 class="text-sm mt-2">Lượt truy cập tháng: {{$turnsofusemonth}}</h1>
            </div>
            <div class="text-center rounded-lg border p-4">
                <img src="{{ asset('images/img6.svg') }}" class="w-16 h-16 mx-auto" alt="Hình 6">
                <h1 class="text-sm mt-2">Lượt truy cập trong ngày: {{$turnsofuse}}</h1>
            </div>
        </div>
    </div>

    <div class="h-32 bg-cover bg-center relative"
        style="background-image: url('{{ asset('images/background.png') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-white flex items-center justify-center pt-[20px]">
            <div class="text-center">
                <h1 class="text-3xl font-semibold">Hình thức hỗ trợ</h1>
                <h1 class="text-3xl font-semibold">0123456789</h1>
            </div>
        </div>
    </div>

   



  
    <footer class="bg-gray-800 text-white py-4">
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
