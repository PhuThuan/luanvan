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
      <div class="fixed w-full flex items-center justify-between h-14 text-white z-10 bg-blue-800 ">
        <div
            class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800  border-none">
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
                {{-- <li>
                    <a href="{{ route('admindoctor') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-tag  w-5 h-5"></i>
                            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg> -->
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Tổng quan</span>
                        <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admindoctorinformation') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-tag  w-5 h-5"></i>
                            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg> -->
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Thông tin của phòng khám</span>
                        <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                    </a>
                </li>
                <li>
                    <a href="{{ route('Doctor') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-users  w-5 h-5"></i>
                            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Thông tin bác sĩ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admindoctorspecialist') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-users  w-5 h-5"></i>
                            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Chuyên ngành</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminworkSchedule') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-users  w-5 h-5"></i>
                            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Lịch Làm việc</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminstatistical') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-users  w-5 h-5"></i>
                            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Thống kê</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admindoctorappointment') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <i class="fas fa-users  w-5 h-5"></i>
                            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg> -->
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Danh sách đặt lịch</span>
                    </a>
                </li>
              



                <!-- <li>
    <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800   text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500   pr-6">
      <span class="inline-flex justify-center items-center ml-4">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
      </span>
      <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
    </a>
  </li>-->
                
            </ul>
            <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2023</p>
        </div>
    </div>
    <!-- ./Sidebar -->

        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
            <div class="mt-4 mx-4">
                <!-- resources/views/specialties/index.blade.php -->


                <h1 class="text-3xl font-bold mb-6">Quản lý Chuyên Ngành</h1>

                <!-- Nút hiển thị biểu mẫu thêm chuyên ngành -->
                <button id="showAddFormBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Thêm Chuyên
                    Ngành</button>

                <!-- Biểu mẫu thêm chuyên ngành (ban đầu ẩn đi) -->
                <form id="addSpecialtyForm" action="{{route('admindoctorstorespecialist')}}" method="post"
                    class="mt-4 hidden">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tên Chuyên
                            Ngành</label>
                        <input type="text" id="name" name="name" class="border rounded w-full py-2 px-3">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Lưu</button>
                    <button type="button" onclick="closeForm('addSpecialtyForm')"
                        class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Đóng</button>
                </form>

                <!-- Danh sách chuyên ngành -->
                <h2 class="text-2xl font-bold mt-6">Danh Sách Chuyên Ngành</h2>
                <table class="table-auto mt-6">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Tên Chuyên Ngành</th>
                            <th class="px-4 py-2">Số Bác Sĩ</th>
                            <th class="px-4 py-2">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($specialty as $id => $specialty)
                            <tr>
                                <td class="border px-4 py-2">{{ $id+1}}</td>
                                <td class="border px-4 py-2">{{ $specialty['name'] }}</td>
                                <td class="border px-4 py-2">{{ $specialty['doctor'] }}</td>
                                <td class="border px-4 py-2">
                                    <button onclick="editSpecialty({{ $specialty['id'] }}, '{{ $specialty['name'] }}')"
                                        class="bg-yellow-500 text-white px-2 py-1 rounded">Sửa</button>
                                    <form action="{{route('admindoctordeletespecial',['id'=>$specialty['id']])}}" method="post"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa chuyên ngành này không?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Không có chuyên ngành nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Biểu mẫu cập nhật chuyên ngành (ban đầu ẩn đi) -->
                <form id="editSpecialtyForm" action="{{route('admindoctorputspecial',['id'=>$specialty['id']])}}" method="post"
                    class="mt-4 hidden">
                    @method('PUT')
                    @csrf

                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-4">
                        <label for="edit_name" class="block text-gray-700 text-sm font-bold mb-2">Tên Chuyên
                            Ngành</label>
                        <input type="text" id="edit_name" name="name" class="border rounded w-full py-2 px-3">
                    </div>

                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Cập Nhật</button>
                    <button type="button" onclick="closeForm('editSpecialtyForm')"
                        class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Đóng</button>
                </form>
            </div>


        </div>




    </div>
    <script>
        function editSpecialty(id, name) {
            // Đặt giá trị cho biểu mẫu cập nhật
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_name').value = name;

            // Ẩn biểu mẫu thêm và hiển thị biểu mẫu cập nhật
            document.getElementById('addSpecialtyForm').classList.add('hidden');
            document.getElementById('editSpecialtyForm').classList.remove('hidden');
        }

        function closeForm(formId) {
            // Ẩn biểu mẫu khi nút "Đóng" được nhấn
            document.getElementById(formId).classList.add('hidden');
        }

        document.getElementById('showAddFormBtn').addEventListener('click', function() {
            // Ẩn biểu mẫu cập nhật nếu đang hiển thị
            document.getElementById('editSpecialtyForm').classList.add('hidden');
            // Hiển thị hoặc ẩn đi biểu mẫu thêm chuyên ngành
            document.getElementById('addSpecialtyForm').classList.toggle('hidden');
        });
    </script>

</body>

</html>
