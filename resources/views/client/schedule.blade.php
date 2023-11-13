<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Easy</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        <div class="   pl-[13%] border border-gray-200 bg-blue-50 ">
            <div class="text-left  pl-[2%]">
                <h1 class=" font-bold mb-4"><a href="{{ url('/') }}">Trang chủ </a> &#62; <a>Cơ sở y tế</a></h1>
            </div>


            <div class="text-center">
                <h1 class="text-3xl font-bold mb-4">Cơ Sở Y Tế</h1>
                <p class="text-xl text-gray-600">Với những cơ sở Y Tế hàng đầu sẽ giúp trải nghiệm khám, chữa bệnh của
                    bạn
                    tốt hơn</p>
            </div>

            <div class="mb-4    ml-[10%] w-[80%]">
                <label for="ten_benh_vien" class="block text-gray-700 text-sm font-bold mb-2">Tên Bệnh viện:</label>
                <input type="text" id="ten_benh_vien" name="ten_benh_vien" required
                    class="w-full border border-gray-300 rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4    ml-[10%] w-[80%]">
                <label for="tinh_thanh" class="block text-gray-700 text-sm font-bold mb-2">Tỉnh/Thành phố:</label>
                <!-- Dropdown cho tỉnh/thành phố -->
                <select id="city" name="province"
                    class="w-full border border-gray-300 rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" selected>Chọn tỉnh thành</option>
                </select>
            </div>


            <div class="mt-6   pl-[10%] w-[80%]">

                <div id="items">
                    <ul class="space-y-2 h-[700px]">
                        @foreach ($hospitals as $hospital)
                        <li class="p-4 border border-gray-200 w-[70%] pl-[10%]" onclick="showDetails({{$hospital->id -1 }})">
                            <div class="flex">
                                <div class="w-1/5 mt-[5%]">
                                    <img src="{{ asset($hospital['logo']) }}" alt="Logo Bệnh Viện" class="w-10 h-10">
                                </div>
                                <div class="w-3/5">
                                    <h1 class="text-xl font-semibold">{{ $hospital->name }}</h1>
                                    <p class="text-gray-600">{{ $hospital->id_address }}</p>
                                </div>
                                <div class='w-1/5 mt-[5%]'>
                                    <a href="{{ route('formOfChoiceedule', ['slug' => $hospital->slug]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 mt-2">
                                        Đặt khám
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>                    
                </div>
              
                <div id="pagination" class="mt-4">
                    <button id="prev" class="px-4 py-2 bg-blue-500 text-white rounded-md " disabled>Quay
                        lại</button>
                    <button id="next" class="px-4 py-2 bg-blue-500 text-white rounded-md float-right mr-[10%]">Tiếp
                        tục</button>
                </div>

            </div>
        </div>
        <div class=" bg-cover bg-center relative    pl-[13%] "
            style="background-image: url('{{ asset('images/bg_contact.png') }}');">
         
                <div class="text-center pr-[10%]">
                    <form action="{{route('contact')}}" class="pl-[50%] h-[50%] pt-[3%]" method="POST">
                        @csrf
                        <h1 class="text-center mb-4">Liên hệ hợp tác</h1>
                        <div class="mb-4">
                            <input type="text" id="name" name="name" placeholder="Tên đơn vị/ Người liên hệ" required
                                class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <input type="email" id="email" name="email" placeholder="Email" required
                                class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <input type="text" id="sdt" name="sdt" placeholder="Số điện thoại" required
                                class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <input type="textarea" id="note" name="note" placeholder="Ghi chú" required
                                class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-6">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Gửi
                            </button>
                        </div>
                    </form>
                </div>
           
        </div>
        
        <footer class="bg-gray-800 text-white py-4  mb-[1%]">
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const itemsPerPage = 5;
                const items = document.querySelectorAll("#items li");
                const pagination = document.getElementById("pagination");
                const prevButton = document.getElementById("prev");
                const nextButton = document.getElementById("next");

                let currentPage = 1;

                function showPage(page) {
                    for (let i = 0; i < items.length; i++) {
                        items[i].style.display = i >= (page - 1) * itemsPerPage && i < page * itemsPerPage ? "block" :
                            "none";
                    }
                }

                function updateButtons() {
                    prevButton.disabled = currentPage === 1;
                    nextButton.disabled = currentPage === Math.ceil(items.length / itemsPerPage);
                }

                showPage(currentPage);
                updateButtons();

                prevButton.addEventListener("click", () => {
                    if (currentPage > 1) {
                        currentPage--;
                        showPage(currentPage);
                        updateButtons();
                    }
                });

                nextButton.addEventListener("click", () => {
                    if (currentPage < Math.ceil(items.length / itemsPerPage)) {
                        currentPage++;
                        showPage(currentPage);
                        updateButtons();
                    }
                });
            });




            $(document).ready(function() {
                $('#ten_benh_vien').on('input', function() {
                    var enteredName = $(this).val().trim().toLowerCase();

                    // Lặp qua danh sách bệnh viện và kiểm tra tên
                    $('.border.p-4').each(function() {
                        var hospitalName = $(this).find('.text-xl').text().trim().toLowerCase();

                        // So sánh tên bệnh viện với giá trị nhập vào
                        if (hospitalName.includes(enteredName)) {
                            $(this).show(); // Hiển thị bệnh viện nếu tên phù hợp
                        } else {
                            $(this).hide(); // Ẩn bệnh viện nếu tên không phù hợp
                        }
                    });
                });
            });




            $(document).ready(function() {
                // Lắng nghe sự kiện khi sự lựa chọn thay đổi
                $('#city, #ten_benh_vien').change(function() {
                    var selectedCity = $('#city').val();
                    var selectedHospital = $('#ten_benh_vien').val();

                    // Lặp qua danh sách bệnh viện và ẩn hiện dựa trên lựa chọn
                    $('.border.p-4').each(function() {
                        var hospitalCity = $(this).find('.text-gray-600').text();
                        var hospitalName = $(this).find('.text-xl').text();

                        if (selectedCity === '' || hospitalCity.includes(selectedCity)) {
                            if (selectedHospital === '' || hospitalName.includes(selectedHospital)) {
                                $(this).show(); // Hiển thị bệnh viện
                            } else {
                                $(this).hide(); // Ẩn bệnh viện
                            }
                        } else {
                            $(this).hide(); // Ẩn bệnh viện
                        }
                    });
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script>
            // Lấy dữ liệu về các tỉnh/thành phố từ API (đây là một ví dụ API giả)
            var citis = document.getElementById("city");
            var districts = document.getElementById("district");
            var wards = document.getElementById("ward");
            var Parameter = {
                url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
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


            }
            function showDetails(id) {
    // Sử dụng AJAX để gửi yêu cầu GET đến route '/admin/patient-information'
    $.ajax({
        url: '/co-so-y-te',
        method: 'GET',
        dataType: 'json',
        data: { id: id }, // Gửi id như một tham số
        success: function (data) {
            // Xử lý dữ liệu nhận được từ server
            console.log('Data received from the server:');
            console.log(data[id]);

            var details = "Tên: " + data[id].name  + "<br>Ngày sinh: " + data[id].date_of_birth + "<br>Số điện thoại: " + data[id].phone + "<br>Giới tính: " + data[id].gender + "<br>Công việc: " + data[id].job + "<br>CCCD: " + data[id].CCCD + "<br>Email: " + data[id].email;
            document.getElementById('patientDetails').innerHTML = details;

            // Hiển thị modal
            document.getElementById('patientModal').style.display = 'block';
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}
        </script>

    </body>

</html>
