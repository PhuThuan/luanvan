<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <h1 class='text-center bg-blue-200'>  Đăng nhập </h1>
<br>
  <form method="POST" action="{{ route('loginAdmin') }}" class="p-12 md:p-24 max-w-[500px] mx-auto bg-white shadow-md rounded-lg">
    @csrf
    <div class="relative mb-6">
        <div class="flex items-center text-lg">
            <svg class="absolute ml-3" width="24" viewBox="0 0 24 24">
                <path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/>
            </svg>
            <input type="text" id="username" name="email" class="bg-gray-200 pl-12 py-2 focus:outline-none w-full rounded" placeholder="Username" />
        </div>
        @error('email')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <div class="relative mb-6">
        <div class="flex items-center text-lg">
            <svg class="absolute ml-3" viewBox="0 0 24 24" width="24">
                <path d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z"/>
            </svg>
            <input type="password" id="password" name="password" class="bg-gray-200 pl-12 py-2 focus:outline-none w-full rounded" placeholder="Password" />
        </div>
        @error('password')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>
    <button class="bg-gradient-to-b from-gray-700 to-gray-900 font-medium py-2 md:py-4 text-white uppercase w-full rounded">Login</button>
</form>

</body>

</html>
