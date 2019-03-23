<div id="Footer" class="c_both">
    <div class="ft-Link">
        <div class="widthAuto">
            <ul>
                <li>
                    <a href="javascript:;" onclick="popupOpen('http://www.willbes.net/company/agreementAll.asp', 'profPlayer', '1000', '600', null, null, 'yes');">이용약관</a>
                    <span class="row-line">|</span>
                </li>
                <li>
                    <a href="javascript:;" onclick="popupOpen('http://www.willbes.net/company/protectAll.asp', 'profPlayer', '1000', '600', null, null, 'yes');">개인정보 취급방침</a>
                    <span class="row-line">|</span>
                </li>
                <li>
                    <a href="{{ front_url('/profRecruit/index') }}">강사모집</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="widthAuto">
        {!! $__cfg['FooterInfo'] !!}
    </div>
</div>