@extends('willbes.app.layouts.master')

@section('content')
    <script type="text/javascript">
        var app = null;
        $(document).ready(function() {
            app = new StarPlayerBridge();
            app.login('{{$token}}');
            location.replace('{{(empty($rtnUrl) == true) ? '/app/classroom/on/list/ongogin/' : $rtnUrl }}');
        });
    </script>
    로그인 완료페이지...
    {{$token}}
@stop