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

           
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-4">
                        <div class="bg-white shadow-md rounded my-6 p-8">
                           
                            <div class="flex items-center">
                                <p class="text-2xl mb-4 font-bold text-gray-800">Mail Setting</p>
                                <button  class="ml-[75%] bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ml-4 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                    <a href="{{route('setting.show',['setting'=>'1'])}}">Trờ về mặc định</a>
                                </button>
                            </div>
                            <form method="POST" action="{{route('setting.store')}}">
                                @csrf                              
                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2" for="mail_transport">Mail Transport</label>
                                        <input class="input border border-gray-300 w-full  py-3 px-4 mb-3" id="mail_transport" type="text" name="mail_transport" value="{{ old('mail_transport', $mail->mail_transport) }}">
                                    </div>
                
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2" for="mail_host">Mail Host</label>
                                        <input class="input border border-gray-300 w-full  py-3 px-4 mb-3" id="mail_host" type="text" name="mail_host" value="{{ old('mail_host', $mail->mail_host) }}">
                                    </div>
                                </div>
                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2" for="mail_port">Mail Port</label>
                                        <input class="input border border-gray-300 w-full  py-3 px-4 mb-3" id="mail_port" type="text" name="mail_port" value="{{ old('mail_port', $mail->mail_port) }}">
                                    </div>
                
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2" for="mail_username">Mail Username</label>
                                        <input class="input border border-gray-300 w-full  py-3 px-4 mb-3" id="mail_username" type="text" name="mail_username" value="{{ old('mail_username', $mail->mail_username) }}">
                                    </div>
                                </div>
                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2" for="mail_password">Mail Password</label>
                                        <input class="input border border-gray-300 w-full  py-3 px-4 mb-3" id="mail_password" type="text" name="mail_password" value="{{ old('mail_password', $mail->mail_password) }}">
                                    </div>
                
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2" for="mail_encryption">Mail Encryption</label>
                                        <input class="input border border-gray-300 w-full  py-3 px-4 mb-3" id="mail_encryption" type="text" name="mail_encryption" value="{{ old('mail_encryption', $mail->mail_encryption) }}">
                                    </div>
                                </div>
                
                                <div class="mt-4">
                                    <label class="block text-gray-700 font-medium mb-2" for="mail_from">Mail From</label>
                                    <input class="input border border-gray-300 w-1/2  py-3 px-4 mb-3" id="mail_from" type="text" name="mail_from" value="{{ old('mail_from', $mail->mail_from) }}">
                                </div>
                
                                <div class="text-center mt-8">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                       Cập nhật
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                



        </div>
    </div>




</body>

</html>
