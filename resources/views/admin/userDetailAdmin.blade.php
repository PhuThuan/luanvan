<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased text-black ">

        <!-- Header -->
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-10 bg-green-800 ">
            <div
                class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-green-800  border-none">
                <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
                    src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                <span class="hidden md:block">

                    @php
                        $user = Auth::user(); // Lấy thông tin người dùng đăng nhập
                        if ($user) {
                            $name = $user->name; // Truy cập trường 'name' của người dùng
                            // Sử dụng biến $name cho mục đích bạn cần
                        } else {
                            // Người dùng chưa đăng nhập
                        }

                    @endphp
                    {{ $name }}
                </span>
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
                        <a href="#"
                            class= "static flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:border-blue-500">
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
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="flex items-center mx-2 hover:text-blue-100">
                            <span class="inline-flex mr-1">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
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
            class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-green-900  h-full text-white transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5 hidden md:block">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                        </div>
                    </li>
                    <!-- <li>
            <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
              <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
              </span>
              <span class="ml-2 text-sm tracking-wide truncate">Trang chủ</span>
            </a>
          </li> -->
                    <li>
                        <a href="{{ route('adminSys') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-tag  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tổng quan</span>
                            <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('hospital') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Thông tin phòng khám</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('questions') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Câu hỏi thường gặp</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('News') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tin tức</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('admincontac') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Hợp tác</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('adminpatientinformation') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Thông tin bệnh nhân</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('adminappointment') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Lượt khám</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('adminstatistics') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Thống kê</span>
                        </a>
                    </li>
                    <li>

                        <a href="{{ route('adminuser') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users  w-5 h-5"></i>
                                <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tài khoản người dùng</span>
                        </a>
                    </li>
                    <li class="px-5 hidden md:block">
                        <div class="flex flex-row items-center mt-5 h-8">
                            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
                        </div>
                    </li>
                    <!-- <li>
            <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800   text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500   pr-6">
              <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
              </span>
              <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
            </a>
          </li>-->
                    <li>
                        <a href="{{ route('setting.index') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800   text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500   pr-6">
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

                            <span class="ml-2 text-sm tracking-wide truncate">Mail Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminpermissions') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-800   text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500   pr-6">
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

                            <span class="ml-2 text-sm tracking-wide truncate">Quyền truy cập</span>
                        </a>
                    </li>
                </ul>
                <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2023</p>
            </div>
        </div>
        <!-- ./Sidebar -->

        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

            <div class="mt-4 mx-4">



                <div>Tên tài khoản: <span class="text-slate-400">{{ $dataResult['name'] }}</span></div>

                <form id="groupForm" action="{{ route('changegroup', ['user_id' => $dataResult['user_id']]) }}"
                    method="POST">
                    @csrf <!-- Laravel CSRF protection token -->

                    <select class="select select-bordered w-full max-w-xs mb-5" id="gr"
                        name="selectedGroupId">
                        <option selected>Current Group ID: {{ $dataResult['currentGroup'] }}</option>
                        @foreach ($dataResult['group'] as $group)
                            <option value="{{ $group['id'] }}" name='id_gr'>ID: {{ $group['id'] }}, Name:
                                {{ $group['name'] }}</option>
                        @endforeach
                    </select>
                </form>

                <form id="roleForm" action="{{ route('changegroup', ['user_id' => $dataResult['user_id']]) }}"
                    method="POST">
                    @csrf <!-- Laravel CSRF protection token -->

                    <div class="...">
                        <select class="select select-bordered w-full max-w-xs mb-5" id="rl"
                            name="selectedRole">
                            <option selected>Current Role ID: {{ $dataResult['currentRole'] }}</option>
                            @foreach ($dataResult['role'] as $index => $role)
                                <option value="{{ $role }}">{{ $index }} - {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <h1 class="text-center text-4xl font-extrabold  ">
                    Hồ sơ bệnh nhân
                </h1>
                <br>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Họ tên</th>
                            <th class="py-2 px-4 border-b">Ngày sinh</th>
                            <th class="py-2 px-4 border-b">SDT</th>
                            <th class="py-2 px-4 border-b">Số lần đặt lịch</th>
                            <th class="py-2 px-4 border-b">Địa chỉ</th>
                            <th class="py-2 px-4 border-b">Trạng thái</th>
                            <th class="py-2 px-4 border-b">Hành động</th>
                            <!-- Thêm các cột khác tương tự -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu từ Laravel Controller sẽ được lặp qua và hiển thị ở đây -->
                        @foreach ($patients as $id => $patient)
                            <tr class="patient-row">
                                <td class="py-2 px-4 border-b">{{ $id + 1 }}</td>
                                <td class="py-2 px-4 border-b">{{ $patient['name'] }}</td>
                                <td class="py-2 px-4 border-b">{{ $patient['date_of_birth'] }}</td>
                                <td class="py-2 px-4 border-b">{{ $patient['phone'] }}</td>
                                <td class="py-2 px-4 border-b">{{ $patient['app'] }}</td>
                                <td class="py-2 px-4 border-b">{{ $patient['fullAddress'] }}</td>
                                @if ($patient['status'] == 0)
                                    <td class="py-2 px-4 border-b">Đã xóa</td>
                                @else
                                    <td class="py-2 px-4 border-b">Tồn tại</td>
                                @endif
                                <td class="py-2 px-4 border-b">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded-full"
                                        onclick="showDetails({{ $id }})">Chi Tiết</button>
                                </td>
                                <!-- Thêm các cột khác tương tự -->
                            </tr>
                        @endforeach


                        <!-- Lặp qua dữ liệu khác -->
                    </tbody>
                </table>





            </div>

        </div>



    </div>
    <div id="patientModal" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden">
        <div class="max-w-lg mx-auto mt-20 p-4 bg-white rounded-md">
            <h2 class="text-2xl font-bold mb-4">Thông tin chi tiết</h2>
            <div id="patientDetails"></div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded-full mt-4" onclick="hideDetails()">Đóng</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
     
    function showDetails(id) {
    // Sử dụng AJAX để gửi yêu cầu GET đến route '/admin/patient-information'
    $.ajax({
        url: '/admin/patient-information',
        method: 'GET',
        dataType: 'json',
        data: { id: id }, // Gửi id như một tham số
        success: function (data) {
            // Xử lý dữ liệu nhận được từ server
            console.log('Data received from the server:');
            console.log(data[id]);

            var details = `
    <div class="p-4 border border-gray-300 mb-4 bg-white">
        <p class="font-bold">Tên: ${data[id].name}</p>
        <p class="font-semibold">Ngày sinh: ${data[id].date_of_birth}</p>
        <p class="font-semibold">Số điện thoại: ${data[id].phone}</p>
        <p class="font-semibold">Giới tính: ${data[id].gender}</p>
        <p class="font-semibold">Công việc: ${data[id].job}</p>
        <p class="font-semibold">CCCD: ${data[id].CCCD}</p>
        <p class="font-semibold">Email: ${data[id].email}</p>
    </div>
`;
            document.getElementById('patientDetails').innerHTML = details;

            // Hiển thị modal
            document.getElementById('patientModal').style.display = 'block';
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}
function hideDetails() {
            // Hide the modal
            document.getElementById('patientModal').style.display = 'none';
        }
        $(document).ready(function() {
            $('#rl').change(function() {
                // Submit the form when the value changes
                $('#roleForm').submit();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#gr').change(function() {
                // Submit the form when the value changes
                $('#groupForm').submit();
            });
        });
    </script>



</body>

</html>
