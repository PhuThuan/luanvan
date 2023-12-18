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
                    <h1 class=" text-black text-lg">Tin tức</h1>
                </div>
                <ul class="hidden absolute text-white group-hover:block  bg-zinc-50 ">
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class=" text-black text-lg">Tin dịch vụ</h1>
                        </a></li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class=" text-black text-lg">Tin y tế</h1>
                        </a></li>
                    <li><a href="#" class="block py-2 px-4">
                            <h1 class=" text-black text-lg">Y học thường thức</h1>
                        </a></li>
                </ul>
            </div>
            <div class="relative group w-48 p-6">
                <div class="text-white py-2 px-4 cursor-pointer ">
                    <h1 class=" text-black text-lg">Về chúng tôi</h1>
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
            <div class="relative group w-48 p-4">
                <div
                    class="font-semibold text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    <h1 class=" text-black">Hỗ trợ đặt khám 0123456789</h1>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div class="w-[1200px] ml-[300px] mt-[25px] h-[770px]">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <a href="{{ route('patientrecords') }}">
                    <button class=" bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg w-[200px]">
                        Thêm hồ sơ
                    </button>
                </a>
                <br>
                <br>
                <!-- Nút 1 -->
                <button id="button1" class=" bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg w-[200px]">
                    Hồ Sơ bệnh nhân
                </button>
                <br>
                <!-- Nút 2 -->
                <button id="button2"
                    class="w-[200px] bg-green-500 text-white font-semibold py-2 px-4 rounded-lg mt-4">
                    Phiếu khám bệnh
                </button>
                <br>
                <!-- Nút 3 -->
                <button id="button3" class="w-[200px] bg-red-500 text-white font-semibold py-2 px-4 rounded-lg mt-4">
                    Thông báo
                </button>
                <br>
                @if ($phieukhambenh != 0)
                    <button id="button4"
                        class="w-[200px] bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg mt-4">
                        Hủy đặt lịch
                    </button>
                @endif
                <br>
            </div>

            <div class="col-span-1">
                <!-- Khung nhìn 1 -->
                <div id="view1" class="bg-blue-100 p-4 rounded-lg overflow-y-auto" style="max-height: 500px;">

                    @if (count($patientrecords) === 0)
                        <p>Không có hồ sơ bệnh</p>
                    @else
                        @foreach ($patientrecords as $patientrecord)
                            <div class="p-4 border border-gray-300 mb-4 bg-white">
                                <p class="font-bold">Họ và tên: {{ $patientrecord['name'] }}</p>
                                <p class="font-semibold">Ngày sinh: {{ $patientrecord['date_of_birth'] }}</p>
                                <p class="font-semibold">Số điện thoại: {{ $patientrecord['phone'] }}</p>
                                <p class="font-semibold">Giới tính: {{ $patientrecord['gender'] }}</p>
                                <p class="font-semibold">Nghê nghiệp: {{ $patientrecord['job'] }}</p>
                                <p class="font-semibold">CCCD: {{ $patientrecord['CCCD'] }}</p>
                                <p class="font-semibold">Email: {{ $patientrecord['email'] }}</p>
                                <p class="font-semibold">Dân tộc: {{ $patientrecord['ethnic'] }}</p>
                                <p class="font-semibold">Địa chỉ: {{ $patientrecord['address'] }}</p>
                                <div class="font-semibold mt-[10px]">
                                    <a href="{{ route('patientrecordsupdate', $patientrecord['id']) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Chỉnh
                                        sửa</a>
                                    <form action="{{ route('patientrecordsdelete', $patientrecord['id']) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Xóa
                                        </button>
                                    </form>
                                </div>


                            </div>
                        @endforeach
                    @endif
                </div>





                <!-- Khung nhìn 2 -->
                <div id="view2" class="hidden bg-green-100 p-4 rounded-lg mt-4 overflow-y-auto"
                    style="max-height: 700px;">
                    @if ($phieukhambenh != 0)
                        @foreach ($phieukhambenh as $phieukhambenhs)
                            <a href="{{ route('medicalBill', ['id' => $phieukhambenhs['id']]) }}">
                                <div class="bg-white max-w-md mx-auto p-8 rounded-lg shadow-md mb-[50px]">
                                    <h1 class="text-2xl font-semibold text-center mb-4">Phiếu Khám Bệnh </h1>
                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Thông Tin Phòng Khám</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['hospital'] }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Chuyên Khoa:</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['specialty'] }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Bác Sĩ:</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['doctor'] }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Họ và Tên Bệnh Nhân:</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['name'] }} </p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Ngày Sinh:</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['age'] }}</p>
                                    </div>

                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Ngày Khám:</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['day'] }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Giờ Khám:</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['start_time'] }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-gray-600 font-semibold">Địa Chỉ Phòng Khám::</label>
                                        <p class="text-black font-medium">{{ $phieukhambenhs['address'] }}</p>
                                    </div>

                                    <div class="mt-6">
                                        <p class="text-center text-gray-700">Chúc bạn sức khỏe!</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        Không có lịch khám
                    @endif
                </div>

                <!-- Khung nhìn 3 -->
                <div id="view3" class="hidden bg-red-100 p-4 rounded-lg mt-4">
                    @if ($Notification != null)
                        <h1>Bạn có {{ $Notification }} lịch khám sắp đến</h1>
                    @else
                        <h1>Bạn không có lịch khám</h1>
                    @endif
                </div>
                <div id="view4" class="hidden bg-green-100 p-4 rounded-lg mt-4 overflow-y-auto"
                    style="max-height: 700px;">
                    @if ($phieukhambenh != 0)
                        @foreach ($phieukhambenh as $phieukhambenhs)
                            <?php
                    // Chuyển đổi ngày từ chuỗi sang đối tượng Carbon
                    $appointmentDate = \Carbon\Carbon::parse($phieukhambenhs['day']);
                    
                    // Kiểm tra xem ngày hẹn có lớn hơn ngày hiện tại không
                    if ($appointmentDate->greaterThan(\Carbon\Carbon::now())) {
                ?>
                            <div class="bg-white max-w-md mx-auto p-8 rounded-lg shadow-md mb-[50px]">
                                <h1 class="text-2xl font-semibold text-center mb-4">Phiếu Khám Bệnh </h1>
                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Thông Tin Phòng Khám</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['hospital'] }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Chuyên Khoa:</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['specialty'] }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Bác Sĩ:</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['doctor'] }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Họ và Tên Bệnh Nhân:</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['name'] }} </p>
                                </div>

                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Ngày Sinh:</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['age'] }}</p>
                                </div>

                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Ngày Khám:</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['day'] }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Giờ Khám:</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['start_time'] }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="text-gray-600 font-semibold">Địa Chỉ:</label>
                                    <p class="text-black font-medium">{{ $phieukhambenhs['address'] }}</p>
                                </div>


                                <form class="yourFormClass" method="post" action="/huy-dat-lich">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Các trường thông tin -->
                                    <!-- ... -->
                                    <input type="hidden" name="appointment_id" class="appointmentId"
                                        value="{{ $phieukhambenhs['id'] }}">
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                        id="confirmCancelBtn">Xác Nhận Hủy Lịch</button>
                                </form>
                            </div>




                            <?php
                    }
                ?>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-4 ">
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
    <!-- Đặt script trước thẻ đóng body -->

    <script>
        document.getElementById('confirmCancelBtn').addEventListener('click', function(event) {
            // Ngăn chặn hành động mặc định của nút submit
            event.preventDefault();

            // Sử dụng hộp thoại confirm để xác nhận hành động
            var confirmation = confirm('Bạn có chắc chắn muốn hủy lịch không?');

            // Nếu người dùng chọn "OK" trong hộp thoại xác nhận
            if (confirmation) {
                // Lấy ID từ nút đã nhấp và đặt giá trị cho trường ẩn trong form
                // Tự động kích hoạt sự kiện submit của form
                document.querySelector('.yourFormClass').submit();
            } else {
                // Ngược lại, nếu người dùng chọn "Cancel", bạn có thể thực hiện các hành động khác ở đây
                console.log('Hủy thao tác');
            }
        });
    </script>

    <script>
        // Xử lý sự kiện khi nút được nhấn
        document.getElementById("button1").addEventListener("click", function() {
            // Hiển thị khung nhìn 1 và ẩn các khung nhìn khác
            document.getElementById("view1").style.display = "block";
            document.getElementById("view2").style.display = "none";
            document.getElementById("view3").style.display = "none";
            document.getElementById("view4").style.display = "none";
        });


        document.getElementById("button2").addEventListener("click", function() {
            // Hiển thị khung nhìn 2 và ẩn các khung nhìn khác
            document.getElementById("view1").style.display = "none";
            document.getElementById("view2").style.display = "block";
            document.getElementById("view3").style.display = "none";
            document.getElementById("view4").style.display = "none";
        });

        document.getElementById("button3").addEventListener("click", function() {
            // Hiển thị khung nhìn 3 và ẩn các khung nhìn khác
            document.getElementById("view1").style.display = "none";
            document.getElementById("view2").style.display = "none";
            document.getElementById("view3").style.display = "block";
            document.getElementById("view4").style.display = "none";
        });
        document.getElementById("button4").addEventListener("click", function() {
            // Hiển thị khung nhìn 3 và ẩn các khung nhìn khác
            document.getElementById("view1").style.display = "none";
            document.getElementById("view2").style.display = "none";
            document.getElementById("view3").style.display = "none";
            document.getElementById("view4").style.display = "block";
        });
    </script>
</body>

</html>
