@extends('willbes.app.layouts.master')

@section('content')
    <script type="text/javascript">
        var app = null;
        $(document).ready(function() {
            app = new StarPlayerBridge();
            app.login('{{$token}}');
            alert(app.getToken());
            //location.replace('{{$rtnUrl}}');
        });
    </script>
@stop