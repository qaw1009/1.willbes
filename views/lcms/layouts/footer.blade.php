<footer>
    <div class="pull-right">
        <font color="white">{{$_SERVER["SERVER_ADDR"]}}</font>
        Copyright ⓒ {{ date('Y') }} (주)윌비스. All Right Reserved.
        {{--@if(array_get(sess_data('admin_auth_data'), 'Role.RoleIdx') == '1005')
            <a href="{{ site_url('/lcms/logs/viewer') }}" class="blue" target="_blank">[로그뷰어]</a>
        @endif--}}
    </div>
    <div class="clearfix"></div>
</footer>
