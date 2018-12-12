@extends('willbes.app.layouts.master')

@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            var app = new StarPlayerBridge();
            app.login('{{$token}}');
            location.replace('{{$rtnUrl}}');
        });
    </script>
@stop