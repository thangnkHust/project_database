<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Cảm ơn {{$data['fullname']}} đã phản hồi cho chúng tôi!</h3>
    <p>Từ feadback của bạn: </p>
    <blockquote>
        {{$data['content']}}
    </blockquote>
    <p>Chúng tôi sẽ tiếp thu, và điều chỉnh để website e-learning trở nên tốt hơn</p>
    <p>---------------------------------------------------------------------------------------------------</p>
    <p>From Admin of Website E-Learning</p>
</body>
</html>