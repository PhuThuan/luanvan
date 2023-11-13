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
    <div class="bg-white max-w-md mx-auto p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center mb-4">Phiếu Khám Bệnh </h1>
        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Thông Tin Phòng Khám</label>
            <p class="text-black font-medium">{{   $phieukhambenh['hospital']}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Chuyên Khoa:</label>
            <p class="text-black font-medium">{{   $phieukhambenh['specialty']}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Bác Sĩ:</label>
            <p class="text-black font-medium">{{   $phieukhambenh['doctor']}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Họ và Tên Bệnh Nhân:</label>
            <p class="text-black font-medium">{{   $phieukhambenh['name']}} </p>
        </div>

        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Ngày Sinh:</label>
            <p class="text-black font-medium">{{   $phieukhambenh['age']}}</p>
        </div>      

        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Ngày Khám:</label>
            <p class="text-black font-medium">{{   $phieukhambenh['day']}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Giờ Khám:</label>
            <p class="text-black font-medium">{{   $phieukhambenh['start_time']}}</p>
        </div>
        <div class="mb-4">
            <label class="text-gray-600 font-semibold">Địa Chỉ:</label>
            <p class="text-black font-medium">{{   $phieukhambenh['address']}}</p>
        </div>

        <div class="mt-6">
            <p class="text-center text-gray-700">Chúc bạn sức khỏe!</p>
        </div>
    </div>
</body>
</html>