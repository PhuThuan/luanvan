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