<div id="Footer" class="c_both">
    <div class="ft-Link">
        <div class="widthAuto">
            <ul>
                <li>
                    <a href="javascript:;" onclick="popupOpen('{{app_url('/company/agreement', 'www')}}', 'agreement', '1000', '600', null, null, 'yes');">이용약관</a>
                    <span class="row-line">|</span>
                </li>
                <li>
                    <a href="javascript:;" onclick="popupOpen('{{app_url('/company/protect', 'www')}}', 'protect', '1000', '600', null, null, 'yes');">개인정보 취급방침</a>
                    @if($__cfg['SiteCode'] != '2017') {{--임용제외--}}
                    <span class="row-line">|</span>
                    @endif
                </li>
                @if($__cfg['SiteCode'] != '2017') {{--임용제외--}}
                <li>
                    <a href="{{ front_url('/profRecruit/index') }}">강사모집</a><span class="tx-white">&nbsp;{{@(explode('.',$_SERVER["SERVER_ADDR"])[3])}}</span>
                </li>
                @endif
                @if(isMobile() == true)
                    <li class="mobileView">
                        <a href="{{site_url('/?viewPC=0')}}">모바일버전</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="widthAuto">
        {!! $__cfg['FooterInfo'] !!}
    </div>
    <a href="#" class="top NSK">Top</a>
</div>