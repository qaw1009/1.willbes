<footer>
    <div class="pull-left">
        @if($__auth['Role']['RoleIdx'] == '1030' && empty($__gdata['ActiveVisitor']) === false)
            <span class="pr-5">[현재접속]</span>
            비회원 : {{ number_format($__gdata['ActiveVisitor']['GuestCnt']) }} <span class="pl-5 pr-5">|</span>
            회원 : {{ number_format($__gdata['ActiveVisitor']['MemCnt']) }} <span class="pl-5 pr-5">|</span>
            현재 : {{ number_format($__gdata['ActiveVisitor']['VisitorCnt']) }}
        @endif
    </div>
    <div class="pull-right">
        <span class="white">{{$_SERVER["SERVER_ADDR"]}}</span>
        Copyright ⓒ 2019 (주)윌비스. All Rights Reserved.
    </div>
    <div class="clearfix"></div>
</footer>
