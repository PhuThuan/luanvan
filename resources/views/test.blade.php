<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Chỉnh Sửa Như Word</title>
    <link rel="stylesheet" href="/node_modules/quill/dist/quill.snow.css">
</head>
<body>
    <h1>Trang Web Chỉnh Sửa Như Word</h1>

    <div id="editor-container"></div>

    <script src="/node_modules/quill/dist/quill.js"></script>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],        // định dạng văn bản
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],    // danh sách
                    [{ 'indent': '-1' }, { 'indent': '+1' }],         // thụt đầu dòng
                    [{ 'align': [] }],                                // canh lề
                    ['link', 'image'],                               // liên kết và hình ảnh
                    ['clean']                                        // xóa định dạng
                ]
            },
            placeholder: 'Nhập nội dung của bạn ở đây...',
            readOnly: false // để chỉ đọc hoặc không
        });
    </script>
</body>
</html>
