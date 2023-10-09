<header id="body-header" class=" grid grid-cols-3 gap-3 fixed top-0 ">
    <div class=" relative group w-40 p-6 text-3xl ">
        <div class="  text-white py-2 px-4 cursor-pointer  ">
            <h1 class=" text-right text-slate-500 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> MEDPRO</h1>
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
        <div class="text-3xl font-bold ">
            @if (Route::has('login'))
                <div class="p-6 text-right ">
                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Tài
                            Khoản</a>

                    @endauth
                </div>
            @endif
        </div>
        <div class="relative group w-48  p-4  text-3xl ">
            <div class=" font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ">
                <h1 class=" text-slate-500"> Đặt lịch khám</h1>
            </div>
        </div>
    </div>
</header>
