<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy</title>

    <!-- Fonts -->



    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-200">
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

    <div class="flex  items-center  mt-[50px]">
        <div class="container mx-auto p-4 bg-white rounded-lg shadow-lg">
            <h1 class="text-3xl font-semibold mb-4 text-center">Quy trình hoàn phí</h1>
            <p>Để hỗ trợ Quý khách hàng thuận tiện trong vấn đề chi phí,
                Easy xin hướng dẫn Quy trình hoàn phí như sau:</p>
            <div class="mb-4">
                <div class="font-semibold">ĐIỀU KIỆN ĐỂ ĐƯỢC HOÀN TIỀN</div>
                <p>Bạn chỉ được hoàn tiền khi thực hiện thành công yêu cầu Hủy Phiếu Khám Bệnh trên phần mềm theo theo
                    quy định</p>
            </div>

            <div class="mb-4">
                <div class="font-semibold">CÁC BƯỚC HOÀN TIỀN</div>
                <p>Khi bạn thực hiện việc thanh toán bằng phương thức nào, thì phần mềm sẽ hoàn tiền lại cho bạn bằng
                    đúng phương thức và số tài khoản đã dùng để thanh toán đó.</p>
            </div>

            <div class="mb-4">
                <div class="font-semibold">THỜI GIAN HOÀN TIỀN</div>

                <p> Thẻ khám bệnh: 1 - 30 ngày làm việc</p>
                <p>Thẻ ATM nội địa: 1 - 30 ngày làm việc</p>
                <p>Thẻ tín dụng Visa, MasterCard: 1 - 45 ngày làm việc</p>
                <p>Tính từ thời điểm bạn thực hiện Hủy Phiếu Khám Bệnh thành công, nếu quá thời gian trên bạn vẫn chưa
                    nhận được tiền hoàn, vui lòng liên hệ tổng đài 1900 2115 chúng tôi sẽ hỗ trợ bạn.</p>
            </div>


        </div>
    </div>

    <footer class="bg-gray-800  py-4 mt-[350px]">
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
