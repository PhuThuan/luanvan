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
                   <a href="{{ url('/') }}">MEDPRO</a></h1>
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
            <div class="text-3xl  ">
                @if (Route::has('login'))
                    <div class="p-6 text-right ">
                        @auth
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Thoát') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Tài
                                Khoản</a>

                        @endauth
                    </div>
                @endif
            </div>
            <div class="relative group w-48  p-4   ">
                <div
                    class=" font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ">
                    <h1 class=" text-slate-500">Hỗ trợ đặt khám 0123456789</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="w-[1200px] ml-[300px] mt-[100px] mg">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <!-- Nút 1 -->
                <button id="button1" class=" bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg w-[200px]">
                  Hồ Sơ bệnh nhân
                </button>
                <br>
                <!-- Nút 2 -->
                <button id="button2" class="w-[200px] bg-green-500 text-white font-semibold py-2 px-4 rounded-lg mt-4">
                 Phiếu khám bệnh
                </button>
                <br>
                <!-- Nút 3 -->
                <button id="button3" class="w-[200px] bg-red-500 text-white font-semibold py-2 px-4 rounded-lg mt-4">
                  Thông báo
                </button>
                <br>
            </div>
        
            <div class="col-span-1">
                <!-- Khung nhìn 1 -->
                <div id="view1" class="bg-blue-100 p-4 rounded-lg">
                    <div class="overflow-x-auto">
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($patientrecords as $patientrecord)
                            <div class="p-4 border border-gray-300 mb-4">
                                <p class="font-bold">Name: {{ $patientrecord['name'] }}</p>
                                <p class="font-semibold">Date of Birth: {{ $patientrecord['date_of_birth'] }}</p>
                                <p class="font-semibold">Phone: {{ $patientrecord['phone'] }}</p>
                                <p class="font-semibold">Gender: {{ $patientrecord['gender'] }}</p>
                                <p class="font-semibold">Job: {{ $patientrecord['job'] }}</p>
                                <p class="font-semibold">CCCD: {{ $patientrecord['CCCD'] }}</p>
                                <p class="font-semibold">Email: {{ $patientrecord['email'] }}</p>
                                <p class="font-semibold">Ethnic: {{ $patientrecord['ethnic'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                
                
        
                <!-- Khung nhìn 2 -->
                <div id="view2" class="hidden bg-green-100 p-4 rounded-lg mt-4">
                    <div class="bg-white max-w-md mx-auto p-8 rounded-lg shadow-md">
                        <h1 class="text-2xl font-semibold text-center mb-4">Phiếu Khám Bệnh</h1>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Họ và Tên Bệnh Nhân:</label>
                            <p class="text-black font-medium">Nguyễn Văn A</p>
                        </div>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Ngày Sinh:</label>
                            <p class="text-black font-medium">10/01/1990</p>
                        </div>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Chuyên Khoa:</label>
                            <p class="text-black font-medium">Nhi Khoa</p>
                        </div>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Bác Sĩ:</label>
                            <p class="text-black font-medium">Nguyễn Thị B</p>
                        </div>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Ngày Khám:</label>
                            <p class="text-black font-medium">15/11/2023</p>
                        </div>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Giờ Khám:</label>
                            <p class="text-black font-medium">08:30 AM</p>
                        </div>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Mã Số BHYT:</label>
                            <p class="text-black font-medium">1234567890</p>
                        </div>
                
                        <div class="mb-4">
                            <label class="text-gray-600 font-semibold">Địa Chỉ:</label>
                            <p class="text-black font-medium">123 Đường ABC, Quận XYZ, TP. HCM</p>
                        </div>
                
                        <div class="mt-6">
                            <p class="text-center text-gray-700">Chúc bạn sức khỏe!</p>
                        </div>
                    </div>
                </div>
        
                <!-- Khung nhìn 3 -->
                <div id="view3" class="hidden bg-red-100 p-4 rounded-lg mt-4">
                    Chưa có thông báo
                </div>
            </div>
        </div>
        
        
        
    </div>
    <script>
        // Xử lý sự kiện khi nút được nhấn
        document.getElementById("button1").addEventListener("click", function () {
            // Hiển thị khung nhìn 1 và ẩn các khung nhìn khác
            document.getElementById("view1").style.display = "block";
            document.getElementById("view2").style.display = "none";
            document.getElementById("view3").style.display = "none";
        });
    
        document.getElementById("button2").addEventListener("click", function () {
            // Hiển thị khung nhìn 2 và ẩn các khung nhìn khác
            document.getElementById("view1").style.display = "none";
            document.getElementById("view2").style.display = "block";
            document.getElementById("view3").style.display = "none";
        });
    
        document.getElementById("button3").addEventListener("click", function () {
            // Hiển thị khung nhìn 3 và ẩn các khung nhìn khác
            document.getElementById("view1").style.display = "none";
            document.getElementById("view2").style.display = "none";
            document.getElementById("view3").style.display = "block";
        });
    </script>
</body>

</html>
