<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header id="body-header" class=" grid grid-cols-3 gap-3 ">
        <div class=" relative group w-40 p-6 text-3xl ">
            <div class="  text-white py-2 px-4 cursor-pointer  ">
                <h1
                    class=" text-right text-slate-500 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    MEDPRO</h1>
            </div>
        </div>
        <div class="  grid grid-cols-4 gap-4">
            <div class="relative group w-40 p-6">
                <div class="  text-white py-2 px-4 cursor-pointer ">
                    <h1 class="text-slate-500"> Cơ sở y tế</h1>
                </div>
                <ul class="hidden absolute   text-white group-hover:block">
                    <li>
                        <a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Bệnh viện công</h1>
                        </a>
                    </li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Bệnh viện tư</h1>
                        </a></li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Phòng khám</h1>
                        </a></li>
                </ul>
            </div>
            <div class="relative group w-40 p-6">
                <div class="  text-white py-2 px-4 cursor-pointer ">
                    <h1 class="text-slate-500"> Hướng dẫn</h1>
                </div>
                <ul class="hidden absolute   text-white group-hover:block">
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Đặt lịch khám</h1>
                        </a></li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Quy trình hoàn phí</h1>
                        </a></li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Câu hỏi thường gặp</h1>
                        </a></li>
                </ul>
            </div>
            <div class="relative group w-40 p-6">
                <div class="  text-white py-2 px-4 cursor-pointer ">
                    <h1 class="text-slate-500"> Tin tức</h1>
                </div>
                <ul class="hidden absolute   text-white group-hover:block">
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Tin dịch vụ</h1>
                        </a></li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Tin y tế</h1>
                        </a></li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class="text-slate-500"> Y học thường thức</h1>
                        </a></li>
                </ul>
            </div>
            <div class="relative group w-48 p-6">
                <div class="  text-white py-2 px-4 cursor-pointer ">
                    <h1 class="text-slate-500"> Về chúng tôi</h1>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="text-3xl font-bold ">
                @if (Route::has('login'))
                    <div class="p-6 text-right ">
                        @auth
                            <a href="{{ url('/home') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Tài
                                Khoản</a>

                        @endauth
                    </div>
                @endif
            </div>
            <div class="relative group w-48  p-4  text-3xl ">
                <div
                    class=" font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ">
                    <h1 class=" text-slate-500"> Đặt lịch khám</h1>
                </div>
            </div>
        </div>
    </header>
    <div class=" inset-0    bg-cover bg-center h-[48rem] "
        style="background-image: url('{{ asset('images/bg_new.png') }}');">

        <h1 class="px-[250px] pt-[250px] text-2xl">Nền tảng công nghệ </h1>
        <h1 class=" px-[250px] text-[40px]">Kết nối người dân với</h1>
        <h1 class=" px-[250px] text-[40px]">Cơ sở - Dịch vụ y tế</h1>
        <h1 class=" px-[250px] text-[20px]">Đặt khám nhanh- lấy số thứ tự trực tuyến</h1>
        <div class="px-[250px] pt-[50px]">
            <button type="button"
                class="px-6 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                Đặt khám ngay
            </button>
        </div>


    </div>
    <div class="bg-gray-100 ml-[550px] mt-[30px] pt-[30px]  grid grid-cols-2 gap-2 h-[44rem] w-[56rem] ">
        <div class="ml-[50px]">
            <h1>
                MEDPRO<br>
                Đặt lịch khám bệnh
            </h1>
        </div>
        <div>
            <h1>

                Medpro cung cấp dịch vụ đặt khám nhanh, lấy số thứ tự trực tuyến và tư vấn sức khỏe từ xa tại các Cơ sở
                Y tế
                hàng đầu Việt Nam như Bệnh viện Đại học Y Dược TP.HCM, Bệnh viện Chợ Rẫy và Bệnh viện Nhi Đồng...
            </h1>
        </div>
        <div
            class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <a href="#!">
                <img class="rounded-t-lg" src="{{ asset('images/6.png') }}" alt="" />
            </a>
            <div class="p-6">
                <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                    Đặt khám nhanh
                </h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    Đặt khám nhanh, thanh toán và lấy số thứ tự trực tuyến tiết kiệm thời gian công sức.
                </p>
                <button type="button"
                    class="px-6 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Xem thêm
                </button>
            </div>
        </div>
        <div
            class=" ml-[50px] block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <a href="#!">
                <img class="rounded-t-lg" src="{{ asset('images/7.png') }}" alt="" />
            </a>
            <div class="p-6">
                <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                    Cơ sở Y tế rộng khắp
                </h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    Mạng lưới bệnh viện, phòng khám, phòng mạch phủ khắp toàn quốc
                </p>
                <button type="button"
                    class="px-6 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Xem thêm
                </button>
            </div>
        </div>
    </div>
    <div>
        <div>
         <h1>Số liệu thống kê</h1>
        </div>
        <div class=" grid grid-cols-6 gap-6 ">
            <div>
                <img src="{{asset('images/img1.svg')}}">
                <h1>lượt khám</h1>
            </div>
            <div>
                <img src="{{asset('images/img2.svg')}}">
                <h1>lượt khám</h1>
            </div>
            <div>
                <img src="{{asset('images/img3.svg')}}">
                <h1>lượt khám</h1>
            </div>
            <div>
                <img src="{{asset('images/img4.svg')}}">
                <h1>lượt khám</h1>
            </div>
            <div>
                <img src="{{asset('images/img5.svg')}}">
                <h1>lượt khám</h1>
            </div>
            <div>
                <img src="{{asset('images/img6.svg')}}">
                <h1>lượt khám</h1>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector(".bg-blue-500");
            var container = document.querySelector(".container");

            // Check if the user has scrolled past the header's original position
            if (window.scrollY > header.offsetTop + header.clientHeight) {
                header.classList.add("z-10");
                container.style.paddingTop = header.clientHeight +
                    "px"; // Add padding to the container to avoid content overlap
            } else {
                header.classList.remove("z-10");
                container.style.paddingTop = "0"; // Reset container padding
            }
        });
    </script>
</body>

</html>
