<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy</title>

    <!-- Fonts -->
   

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
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
    <div class="container mx-auto mt-4 mb-[190px]">
        <h1 class=" font-bold mb-4"><a href="{{ url('/') }}">Trang chủ </a> &#62;
            <a>{{ $hospital['name'] }} </a> &#62; <a>
                <a> Chọn chuyên khoa </a>

        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            <!-- Left Section for Information -->
            <div class=" p-4 w-[40%] ml-[50%] h-auto border ">
                <h5 class="text-lg text-center font-semibold bg-blue-200 mb-[3%] ">Thông tin</h5>
                <p class="text-gray-700 bg-white">Phòng khám: {{ $hospital->name }}</p>
                <p class="text-gray-700 bg-white">Địa chỉ: {{ $address}}</p>
            </div>

            <!-- Right Section for Doctors -->
            <div class="p-4 w-full border h-[500px] overflow-y-auto bg-white">
                <h5 class="text-lg text-center font-semibold bg-blue-200 mb-[3%]">Vui lòng chọn chuyên khoa</h5>
            
                @foreach ($doctors as $doctor)
                    <div class="flex items-center border border-gray-200 ml-[50]">
                        <a href="{{ route('chuyenkhoa1', ['slug' => $slug, 'khoa' => $doctor['id']]) }}" class="text-sm mb-2 border border-red-200 w-full h-[50px]">
                            <div class="ml-3 mt-[15px]">
                                <h6 class="font-semibold text-blue-600">{{ $doctor['name'] }}</h6>
                               
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>
        <a href="{{route('Schedule')}} " class="ml-[25%] ">Quay lại</a>
    </div> 
     
    <footer class="bg-gray-800 text-white py-4 mb-[25%]">
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
