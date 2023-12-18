<h2>Xin chào {{ $data['name'] }}, Cảm ơn bạn đã sử dụng hệ thống của chúng tôi</h2> 
<br>
    
<div class="bg-white max-w-md mx-auto p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-center mb-4">Phiếu Khám Bệnh </h1>
    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Thông Tin Phòng Khám: {{   $data['hospital']}}</label>
        <p class="text-black font-medium"></p>
    </div>
    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Chuyên Khoa: {{   $data['specialty']}}</label>
        <p class="text-black font-medium"></p>
    </div>
    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Bác Sĩ: {{   $data['doctor']}}</label>
        <p class="text-black font-medium"></p>
    </div>
    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Họ và Tên Bệnh Nhân: {{   $data['name']}}</label>
        <p class="text-black font-medium"> </p>
    </div>

    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Ngày Sinh: {{   $data['age']}}</label>
        <p class="text-black font-medium"></p>
    </div>      

    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Ngày Khám: {{   $data['day']}}</label>
        <p class="text-black font-medium"></p>
    </div>
    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Giờ Khám: {{   $data['start_time']}}</label>
        <p class="text-black font-medium"></p>
    </div>
    <div class="mb-4">
        <label class="text-gray-600 font-semibold">Địa Chỉ Phòng Khám:: {{   $data['address']}}</label>
        <p class="text-black font-medium"></p>
    </div>
    <h1>Chúc bạn sức khỏe!</h1>
  
