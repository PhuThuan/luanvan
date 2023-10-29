<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <A rel="preconnect" href="https://fonts.bunny.net">
        <A href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased text-black ">

        <!-- Header -->
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-10 bg-blue-800 ">
            <div
                class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800  border-none">
                <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
                    src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                <span class="hidden md:block">ADMIN</span>
            </div>
            <div class="flex justify-between items-center h-14 ">
                <div
                    class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
                    <button class="outline-none focus:outline-none">
                        <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <input type="search" name="" id="" placeholder="Search"
                        class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent">
                </div>
                <ul class="flex items-center">
                    <li>
                        <A :href="#"
                            class="static flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600   hover:border-blue-500">
                            <span class="inline-flex justify-center items-center ml-1 relative">
                                <svg style="font-size: x-large;" class="w-7 h-7  " fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                <span style="font-size: x-small;top: -8px;right: -3px;"
                                    class="absolute  px-1 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full"></span>

                            </span>
                        </A>
                    </li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center mx-2 hover:text-blue-100">
                            <span class="inline-flex mr-1">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                            </span>
                            Logout
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./Header -->

        <!-- Sidebar -->
        <div
            class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900  h-full text-white transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5 hidden md:block">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                        </div>
                    </li>
                    <!-- <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Trang chủ</span>
                </a>
              </li> -->
                    <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-tag  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tổng quan</span>
                            <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                        </a>
                    </li>
                    <li>

                        <A href="DoctorAccount"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Thông tin bác sĩ</span>
                        </A>
                    </li>
                    <li>
                        <A href="workSchedule"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-shopping-cart   w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Lịch làm việc</span>
                        </A>
                    </li>
                    <li>
                        <A href="/admin/service"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-tag  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Thống kê</span>
                        </A>
                    </li>
                    <li>
                        <A href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500   pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg> -->
                                <i class="fas fa-file-alt w-5 h-5"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Báo cáo</span>
                            <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> -->
                        </A>
                    </li>
                    <li class="px-5 hidden md:block">
                        <div class="flex flex-row items-center mt-5 h-8">
                            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
                        </div>
                    </li>
                    <!-- <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800   text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500   pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                </a>
              </li>-->
                    <li>
                        <A :href="route('setting_premission')"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800   text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500   pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </span>

                            <span class="ml-2 text-sm tracking-wide truncate">Permission</span>
                        </A>
                    </li>
                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2023</p>
            </div>
        </div>
        <!-- ./Sidebar -->

        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

            <div class="mt-4 mx-4">

                <div class="container mx-auto p-4">
                    <div class="mb-4 flex justify-end">
                        <!-- Nút "Thêm Bác sĩ" -->
                        <button id="addDoctorBtn"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Thêm Bác sĩ
                        </button>
                    </div>

                    <!-- Khung thông tin thêm bác sĩ (ẩn mặc định) -->
                    <div id="addDoctorForm" class="hidden fixed inset-0 ml-[450px] items-center justify-center z-10 overflow-y-auto">
                        <div class="bg-blue-500 p-4 rounded-lg shadow-lg max-w-screen-md w-full" style="z-index: 9999;">
                            <div class="max-h-screen-md overflow-y-auto">
                                <h1> Thêm bác sĩ</h1>
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/DoctorAccount"
                                    method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                            Tài khoản
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="email" name='email' type="text" placeholder="Nhập email">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                            Mật khẩu
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="password" name='password' type="text"
                                            placeholder="Nhập mật khẩu">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="full_name">
                                            Tên Bác sĩ
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="full_name" name='full_name' type="text"
                                            placeholder="Nhập tên bác sĩ">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="sex">
                                           Giới tính
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="sex" name='sex' type="text"
                                            placeholder="Nhập giới tính">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="specialty">
                                            Chuyên ngành
                                        </label>
                                        <select
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="specialty" name="specialty">
                                            <option value="">Chọn chuyên ngành</option>
                                            @foreach($specialty as $specialties)
                                                <option value="{{ $specialties->name }}">{{ $specialties->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="experience">
                                            Kinh nghiệm
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name='experience' id="experience" type="text"
                                            placeholder="Nhập kinh nghiệm">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">
                                            Địa chỉ
                                        </label>
                                        <!-- Dropdown cho tỉnh/thành phố -->
                                        <select id="city" name='province'
                                            class="mb-4 block appearance-none w-full bg-white border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="" selected>Chọn tỉnh thành</option>
                                        </select>
                                        <select id="district" name='district'
                                            class="mb-4 block appearance-none w-full bg-white border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="" name='district' selected>Chọn quận huyện</option>
                                        </select>
                                        <select id="ward" name='commune'
                                            class="mb-4 block appearance-none w-full bg-white border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="" name='ward' selected>Chọn phường x</option>
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2"
                                            for="street_address">
                                            Tên đường/Số nhà
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name='street_address' id="street_address" type="text"
                                            placeholder="Nhập số nhà">
                                    </div>


                                    <div class="flex items-center justify-between">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            type="submid">
                                            Lưu thông tin
                                        </button>
                                        <button id="closeFormBtn"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded  focus:outline-none focus:shadow-outline "
                                            type="button">
                                            Đóng
                                        </button>
                                    </div>

                            </div>
                            <!-- Ví dụ: Tên bác sĩ, chuyên ngành, kinh nghiệm, v.v. -->

                            </form>
                        </div>
                    </div>




                    <div class="flex flex-wrap -m-4">
                        <!-- Thông tin của Bác sĩ 1 -->
                        @foreach ($doctors as $doctor)
                            <div class="w-1/2 p-4">
                                <div class="bg-white shadow-md rounded-lg p-4">
                                    <h2 class="text-xl font-semibold mt-2">{{ $doctor['full_name'] }}</h2>
                                    <p class="text-gray-600">Chuyên ngành: {{ $doctor['id_specialty'] }}</p>
                                    <p class="text-gray-600">Kinh nghiệm: {{ $doctor['Qualifications'] }} năm</p>
                                    <form action="{{ route('delete-doctor', $doctor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                            
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Xóa
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        

                        <!-- Thông tin của Bác sĩ 2 -->


                        <!-- Thêm thông tin của các bác sĩ khác tại đây -->
                    </div>
                </div>



            </div>



        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        // Lắng nghe sự kiện click trên nút "Thêm Bác sĩ"
        const addDoctorBtn = document.getElementById('addDoctorBtn');
        const addDoctorForm = document.getElementById('addDoctorForm');
        const closeFormBtn = document.getElementById('closeFormBtn');

        addDoctorBtn.addEventListener('click', function() {
            // Hiển thị khung thông tin thêm bác sĩ
            addDoctorForm.classList.remove('hidden');
        });

        // Lắng nghe sự kiện click trên nút "Đóng" trong khung thông tin thêm bác sĩ
        closeFormBtn.addEventListener('click', function() {
            // Ẩn khung thông tin thêm bác sĩ
            addDoctorForm.classList.add('hidden');
        });


        // Lấy dữ liệu về các tỉnh/thành phố từ API (đây là một ví dụ API giả)
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "/get-address",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                var opt = document.createElement('option');
                opt.value = x.Name;
                opt.text = x.Name;
                opt.setAttribute('data-id', x.Id);
                citis.options.add(opt);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                    for (const k of result[0].Districts) {
                        var opt = document.createElement('option');
                        opt.value = k.Name;
                        opt.text = k.Name;
                        opt.setAttribute('data-id', k.Id);
                        district.options.add(opt);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex]
                        .dataset.id)[0].Wards;

                    for (const w of dataWards) {
                        var opt = document.createElement('option');
                        opt.value = w.Name;
                        opt.text = w.Name;
                        opt.setAttribute('data-id', w.Id);
                        wards.options.add(opt);
                    }
                }
            };
        }
    </script>

</body>

</html>
