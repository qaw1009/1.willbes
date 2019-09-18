@extends('willbes.m.layouts.master')

@section('content')
    <script>
        document.location.replace('{{site_url(config_item('app_pass_site_prefix').'/home/index?viewPC=1')}}');
    </script>
@stop