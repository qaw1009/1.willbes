<!-- aside -->
<div id="aside">
    <ul class="NG">
        @if(sess_data('is_login') == true)
            <li class="ListBox">
                <div class="List NGEB">{{sess_data('mem_name')}} ({{sess_data('mem_id')}})</div>
            </li>
        @endif
        <li class="ListTit"><h1 class="NGEB">내강의실</h1></li>
        <li class="ListBox">
            <div class="List NGEB"><a href="{{front_app_url('/classroom/pass/index','www')}}">무한 PASS존</a></div>
        </li>
        <li class="ListBox">
            <div class="List NGEB">온라인강좌</div>
            <div class="List-Depth">
                <ul>
                    <li><a href="{{front_app_url('/classroom/on/list/standby','www')}}">· 수강대기 강좌</a></li>
                    <li><a href="{{front_app_url('/classroom/on/list/ongoing','www')}}">· 수강중인 강좌</a></li>
                    <li><a href="{{front_app_url('/classroom/on/list/pause','www')}}">· 일시정지 강좌</a></li>
                    <li><a href="{{front_app_url('/classroom/on/list/end','www')}}">· 수강종료 강좌</a></li>
                </ul>
            </div>
        </li>
        <li class="ListTit"><h1 class="NGEB">고객센터</h1></li>
        <li class="ListBox">
            <div class="Depth">
                <ul>
                    <li><a href="{{ front_url('/support/notice/index') }}">· 공지사항</a></li>
                    <li><a href="{{ front_url('/support/faq/index') }}">· 자주하는 질문</a></li>
                    <li><a href="{{ front_url('/support/qna/index') }}">· 동영상 상담실</a></li>
                </ul>
            </div>
        </li>
        @if(sess_data('is_login') == true)
            <li class="ListBox">
                <div class="List NGEB"><a href="{{front_url('/member/logout/','www')}}">로그아웃</a></div>
            </li>
        @endif
    </ul>
</div>