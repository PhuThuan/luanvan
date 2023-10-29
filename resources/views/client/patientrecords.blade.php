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
    <header id="body-header" class="grid grid-cols-3 gap-3 text-black bg-zinc-50 ">
        <div class="relative group w-40 p-6 text-3xl">
            <div class="text-white py-2 px-4 cursor-pointer">
                <a href="{{ url('/') }}">
                    <h1
                        class="text-right text-black font-semibold  text-black hover:text-slate-900 dark:text-slate-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        MEDPRO
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
    <h1 class="text-3xl font-semibold">Tạo hồ sơ mới</h1>
    <p class="text-lg">Nhập thông tin bệnh nhân</p>
    <p class="text-lg">Vui lòng cung cấp thông tin chính xác để được phục vụ tốt nhất. Trong trường hợp cung cấp sai
        thông tin bệnh nhân & điện thoại, việc xác nhận cuộc hẹn sẽ không hiệu lực trước khi đặt khám.</p>
    <p class="text-lg text-red-500">(*) Thông tin bắt buộc nhập</p>
    <form  class="mt-6 grid grid-cols-2 gap-4" action="{{route('patientrecords1')}}"
    method="POST">
    @csrf
        <!-- First Column -->
        <div>
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 text-sm font-bold mb-2">Họ và tên</label>
                <input type="text" id="full_name" name="full_name" placeholder="Nhập họ và tên" required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Số điện thoại</label>
                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            
            <div class="mb-4">
                <label for="occupation" class="block text-gray-700 text-sm font-bold mb-2">Nghề nghiệp</label>
                <input type="text" id="occupation" name="occupation" placeholder="Nhập nghề nghiệp"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ Email</label>
                <input type="text" id="email" name="email" placeholder="Nhập địa chỉ Email"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="province" class="block text-gray-700 text-sm font-bold mb-2">Tỉnh/Thành phố</label>
                <select id="city" name="province"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
                    <option value="" selected>Chọn tỉnh/thành phố</option>
                </select>
            </div> 
             <div class="mb-4">
                <label for="ward" class="block text-gray-700 text-sm font-bold mb-2">Phường/Xã</label>
                <select id="ward" name="ward"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
                    <option value="" selected>Chọn phường/xã</option>
                </select>
            </div>
        </div>
        <!-- Second Column -->
        <div>
            <div class="mb-4">
                <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">Ngày tháng năm sinh</label>
                <input type="text" id="dob" name="dob" placeholder="Nhập ngày tháng năm sinh"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Giới tính</label>
                <input type="text" id="gender" name="gender" placeholder="Nhập giới tính"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="id_number" class="block text-gray-700 text-sm font-bold mb-2">Số CMND/Passport</label>
                <input type="text" id="id_number" name="id_number" placeholder="Nhập số CMND/Passport"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="ethnicity" class="block text-gray-700 text-sm font-bold mb-2">Dân tộc</label>
                <input type="text" id="ethnicity" name="ethnicity" placeholder="Nhập dân tộc"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            
            <div class="mb-4">
                <label for="district" class="block text-gray-700 text-sm font-bold mb-2">Quận/Huyện</label>
                <select id="district" name="district"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
                    <option value="" selected>Chọn quận/huyện</option>
                </select>
            </div>
          
            <div class="mb-6">
                <label for="street_address" class="block text-gray-700 text-sm font-bold mb-2">Tên đường/Số
                    nhà</label>
                <input type="text" id="street_address" name="street_address" placeholder="Nhập tên đường/số nhà"  required
                    class="w-full px-3 py-2 text-gray-700 border rounded focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Lưu thông tin
                </button>
            </div>
            </div>



           
        </div>
    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
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
