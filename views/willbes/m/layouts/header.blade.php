<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>{{ $__cfg['HeadTitle'] }}</title>
    <meta name="keywords" content="{{ $__cfg['MetaKeyword'] }}">
    <meta name="description" content="{{ $__cfg['MetaDesc'] }}">
    {!! (empty($__cfg['HeaderInfo']) === true) ? ''  : base64_decode($__cfg['HeaderInfo']) !!}
    <!-- CSS -->
    <!-- Slider -->
    <link rel="stylesheet" href="/public/vendor/jquery/swiper/swiper.min.css">
    <!-- bootstrap-datepicker -->
    <link rel="stylesheet" href="/public/vendor/bootstrap/datepicker/css/bootstrap-datepicker.standalone.min.css">
    <!-- Custom Theme Style -->
    <link href="/public/css/willbes/basic.css?ver={{time()}}" rel="stylesheet">
    {{-- TODO : 최종 오픈할 경우 환경변수 제어조건 및 이전 소스 제거 요망 --}}
    @if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
        {{-- 신규버전 --}}
        <link href="/public/css/willbes/m/style_v2.css?ver={{time()}}" rel="stylesheet">
    @else
        <link href="/public/css/willbes/m/style.css?ver={{time()}}" rel="stylesheet">
    @endif
    <!--// CSS -->
    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
    <script src="/public/vendor/jquery/form/jquery.form.js"></script>
    <!--// JAVASCRIPT -->
</head>