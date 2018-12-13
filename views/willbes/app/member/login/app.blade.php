@extends('willbes.app.layouts.master')
@section('content')
    <script type="text/javascript">
        var app = null;
        $(document).ready(function() {
            app = new StarPlayerBridge();
            app.bindEvent("initEvent", onInitEvent);
        });

        function onInitEvent() {
            app.login("{{$token}}");
            alert("로그인되었습니다.");
            location.replace('{{(empty($rtnUrl) == true) ? front_url('/app/classroom/on/list/ongoing/') : rawurldecode($rtnUrl) }}');
        }
    </script>
@stop