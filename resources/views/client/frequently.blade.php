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
    <div class="flex w-[80%] ml-[10%]">
        <div class="w-4/12 h-full">
            <div class="p-4">
                <ul class="p-4 space-y-4 relative  ">
                    <!-- Danh sách các nút và biểu mẫu -->
                   

                    <!-- Danh sách các nút -->
                    @foreach ($questionCategories as $questionCategory)
                        <li class="flex items-center justify-between shadow-md p-4 rounded-lg">
                            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                                data-content="content{{ $questionCategory['id'] }}">{{ $questionCategory['name'] }}</button>
                        </li>
                    @endforeach
                    <!-- Thêm nút khác tại đây -->
                </ul>

                <!-- Danh sách các nút -->

            </div>
        </div>
        <div class="w-8/12 h-full ">
          

       
            @foreach ($questionCategories as $questionCategorie)
            <div id="content{{ $questionCategorie['id'] }}" class="p-4 hidden">
                @foreach ($questions as $question)
                    @if ($questionCategorie['id'] == $question['id_questionCategories'])
                        <div class="relative">
                            <div class="cursor-pointer bg-gray-200 p-2 question-name">
                                {{ $question['name'] }}
                            </div>
                            <div class="hidden question-answer">{!! nl2br($question['Answer']) !!} </div>
                           
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
           

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".question-name").on("click", function() {
                $(this).next(".question-answer").toggleClass("hidden");
            });
        });
    </script>
    <script>
        // Lấy các phần tử cần thao tác
        const questionForm = document.getElementById("questionForm");
        const addQuestionButton = document.getElementById("addQuestionButton");
        const submitQuestionButton = document.getElementById("submitQuestionButton");
        const cancelQuestionButton = document.getElementById("cancelQuestionButton");

        // Bắt sự kiện khi nút "Thêm câu hỏi" được nhấp
        addQuestionButton.addEventListener("click", function() {
            questionForm.style.display = "block"; // Hiển thị biểu mẫu
        });

        // Bắt sự kiện khi nút "Hủy" được nhấp
        cancelQuestionButton.addEventListener("click", function() {
            questionForm.style.display = "none"; // Ẩn biểu mẫu
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addCategoryButton = document.getElementById("addCategoryButton");
            const categoryForm = document.getElementById("categoryForm");
            const submitCategoryButton = document.getElementById("submitCategoryButton");
            const cancelCategoryButton = document.getElementById("cancelCategoryButton");

            addCategoryButton.addEventListener("click", function() {
                categoryForm.classList.remove("hidden");
            });

            cancelCategoryButton.addEventListener("click", function() {
                categoryForm.classList.add("hidden");
            });

            // Đối với biểu mẫu, bạn có thể thêm sự kiện submit để xử lý việc gửi dữ liệu.
            submitCategoryButton.addEventListener("click", function() {
                categoryForm.classList.add("hidden");

                // Thêm mã JavaScript để gửi dữ liệu biểu mẫu tại đây.
                // Sử dụng fetch hoặc XMLHttpRequest để gửi dữ liệu đến máy chủ.
            });
        });
    </script>
    <script>
        const buttons = document.querySelectorAll('[data-content]');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const contentId = button.getAttribute('data-content');
                const content = document.getElementById(contentId);

                // Ẩn tất cả các khung hình
                document.querySelectorAll('[id^="content"]').forEach(item => {
                    item.classList.add('hidden');
                });

                // Hiển thị nội dung của khung hình tương ứng
                content.classList.remove('hidden');
            });
        });
    </script>

</body>

</html>
