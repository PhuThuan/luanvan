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
    
    <div class="text-left  pl-[2%]">
        <h1 class=" font-bold mb-4"><a href="{{ url('/') }}">Trang chủ </a> &#62; <a href=" {{url('/tin-dich-vu') }}">Tin dịch vụ</a></h1>
    </div>
                <div class=" mx-auto p-4">
                    <div class="bg-white p-4 rounded-lg w-[70%] ml-[15%]">


                        <h1 class="text-2xl font-bold text-gray-800">{{ $new['title'] }}</h1>

                        <p class="text-gray-600">Ngày đăng:{{ $new['published_at'] }}</p>
                         
                        @if ($new['author'] != 'Hệ thống')
                            <p class="text-gray-600">Tác giả: {{ $new['author'] }}</p>
                        @endif
                        <p class="text-gray-600 mt-4">{{ $new['category'] }}</p>
                        <img src="{{ asset($new['image_url']) }}" alt="Các Dấu Hiệu Suy Giãn Tĩnh Mạch"
                            class=" h-[50%] rounded-lg mb-4">
                        <ul>
                            @foreach (explode("\n", $new['content']) as $line)
                                <li>{{ $line }}</li>
                            @endforeach
                        </ul>

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
