<footer>
    <div class="pull-left">
        @if(SUB_DOMAIN == 'lms' && ($__auth['Role']['RoleIdx'] == '1030'  || $__auth['Role']['RoleIdx'] == '1005' ) && empty($__gdata['ActiveVisitor']) === false)
            <a href="/stats/statsVisitor/" target="_blank">
            <span class="pr-5">[오늘접속]</span>
            비회원 : {{ number_format($__gdata['ActiveVisitor']['GuestCnt']) }} <span class="pl-5 pr-5">|</span>
            회원 : {{ number_format($__gdata['ActiveVisitor']['MemCnt']) }} <span class="pl-5 pr-5">|</span>
            현재 : {{ number_format($__gdata['ActiveVisitor']['ActiveCnt']) }}
            </a>
        @endif
    </div>
    <div class="pull-right">
        <span class="white">{{$_SERVER["SERVER_ADDR"]}}</span>
        Copyright ⓒ 2019 (주)윌비스. All Rights Reserved.
    </div>
    <div class="clearfix"></div>
</footer>
