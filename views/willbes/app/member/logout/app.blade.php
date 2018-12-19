@extends('willbes.app.layouts.master')

@section('content')
    <script type="text/javascript">
        var app = null;
        $(document).ready(function() {
            app = new StarPlayerBridge();
            app.bindEvent("initEvent", onInitEvent);
        });

        function onInitEvent() {
            app.logout();
            alert("로그아웃되었습니다.");
            location.replace('{{front_url('/')}}');
        }
    </script>
@stop