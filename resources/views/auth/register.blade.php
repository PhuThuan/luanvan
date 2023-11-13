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
            <a href="{{ url('login') }}" class="w-full  ">
                <i class="fas fa-sign-in-alt"></i> Quay lại
            </a>
        </div>

        <div class="float-center pr-[10%] ">
            <h2 class="text-2xl mb-6 pl-[50%]">Đăng ký </h2>
            <form method="POST" action="{{ route('register') }}"  class="pl-[50%] h-[50%] pt-[3%] pb-[5%]">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Tên</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control  w-full h-[35px] @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Địa chỉ Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control  w-full h-[35px] @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Mật khẩu</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control  w-full h-[35px]  @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">Nhập lại mật khẩu</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control  w-full h-[35px]" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                           Đăng ký
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>


</body>

</html>
