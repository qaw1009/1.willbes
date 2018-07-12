<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<a href="{{ app_url('/member/mailAuth', 'www') }}/{{$CertKey}}/{{$CertMail}}/Auth">여기를 눌러서 인증하세요</a>
위버튼이 작동안하면 아래 경로를 복사해서 주소 창에 입력해주십시요
경로 : {{ app_url('/member/mailAuth', 'www') }}/{{$CertKey}}/{{$CertMail}}/Auth
</body>
</html>
