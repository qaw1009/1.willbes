<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <meta name="viewport" content="width=1460">
    <title>{{ $__cfg['HeadTitle'] }}</title>
    <meta name="keywords" content="{{ $__cfg['MetaKeyword'] }}">
    <meta name="description" content="{{ $__cfg['MetaDesc'] }}">
    <link rel="shortcut icon" href="{{ $__cfg['Favicon'] }}"/>
    {!! (empty($__cfg['HeaderInfo']) === true) ? ''  : base64_decode($__cfg['HeaderInfo']) !!}
    <!-- CSS -->
    <!-- Slider jQuery -->
    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <!-- bootstrap-datepicker -->
    <link rel="stylesheet" href="/public/vendor/bootstrap/datepicker/css/bootstrap-datepicker.standalone.min.css">
    <!-- PNotify -->
    <link href="/public/vendor/pnotify/pnotify.css" rel="stylesheet">
    <link href="/public/vendor/pnotify/pnotify.buttons.css" rel="stylesheet">
    <link href="/public/vendor/pnotify/pnotify.nonblock.css" rel="stylesheet">
    <link href="/public/css/willbes/pnotify.custom.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/public/css/willbes/basic.css?ver={{time()}}" rel="stylesheet">
    <link href="/public/css/willbes/style.css?ver={{time()}}" rel="stylesheet">
    <!--// CSS -->
    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
    <script src="/public/vendor/jquery/form/jquery.form.js"></script>

    <!--// JAVASCRIPT -->
</head>