<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-gray-200">

    <div class=" bg-cover bg-center relative  w-[50%] ml-[25%] mt-[5%]"
        style="background-image: url('{{ asset('images/bg_contact.png') }}');">
        <div class="mb-6 pt-[5%] pl-[5%]">
            <a href="{{ url('/') }}" class="w-full  ">
                <i class="fas fa-sign-in-alt"></i> Quay lại
            </a>
        </div>

        <div class="float-center pr-[10%] ">
            <h2 class="text-2xl mb-6 pl-[50%]">Đăng nhập </h2>
            <form method="POST" action="{{ route('login') }}" class="pl-[50%] h-[50%] pt-[3%] pb-[5%]">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ Email</label>
                    <input id="email" type="email" class="form-input w-full h-[35px]" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu</label>
                    <input id="password" type="password" class="form-input  w-full h-[35px]" name="password" required
                        autocomplete="current-password">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="text-sm text-gray-600">
                        <input class="mr-2 leading-tight " type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-sm">Ghi nhớ tài khoản</span>
                    </label>
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Đăng nhập
                    </button>
                </div>

                <div class="container relative">
                    <!-- ... (other code remains the same) ... -->
                    <div class="mb-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:text-blue-700 mr-4" href="{{ route('password.request') }}">
                            Quên mật khẩu
                        </a>
                        @endif
                
                        @if (Route::has('register'))
                        <a class="text-sm text-blue-500 hover:text-blue-700 float-right" href="{{ route('register') }}">
                            Đăng ký
                        </a>
                        @endif
                    </div>
                </div>
                
                
             

               
            </form>
        </div>

    </div>


</body>

</html>
