<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Chúng tôi có 1 bài viết mới</h3>
    <p>Môn: {{$data['subject']}}</p>
    <p>Tiêu đề: {{$data['name']}}</p>
    <p>Truy cập {{route('news')}} để truy cập bài mới</p>
    <p>---------------------------------------------------------------------------------------------------</p>
    <p>From Admin of Website E-Learning</p>
</body>
</html>