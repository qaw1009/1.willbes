<!-- aside -->
<div id="aside">
    <ul class="NG">
        {{--<h1><a href="{{front_url('/home/index')}}"><img src="{{img_url('m/main/logo.png')}}" alt="logo"/></a></h1>
        <h2 class="NGEB">
            <img src="{{ img_url('m/main/icon_' . $__cfg['SiteGroupId'] . '.png') }}" class="clogo" alt=""/>
            {{str_replace_array(['윌비스', '온라인', '학원', ' '], '', $__cfg['HeadTitle'])}}
        </h2>
        <li class="ListTit"><h1 class="NGEB">수강신청</h1></li>
        <li class="ListBox">
            <div class="List NGEB"><a href="{{front_url('/lecture/index/pattern/only')}}">단강좌</a></div>
        </li>
        <li class="ListBox">
            <div class="List NGEB"><a href="{{front_url('/package/index/pack/648001')}}">추천패키지</a></div>
        </li>
        <li class="ListBox">
            <div class="List NGEB"><a href="{{front_url('/package/index/pack/648002')}}">선택패지키</a></div>
        </li>
        <li class="ListBox">
            <div class="List NGEB"><a href="{{front_url('/lecture/index/pattern/only')}}">DIY패키지</a></div>
        </li>--}}
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
        <li class="ListBox">
            <div class="List NGEB">학원강좌</div>
            <div class="List-Depth">
                <ul>
                    <li><a href="{{front_app_url('/classroom/off/list/ongoing','www')}}">· 수강신청 강좌</a></li>
                    <li><a href="{{front_app_url('/classroom/off/list/end','www')}}">· 수강종료 강좌</a></li>
                </ul>
            </div>
        </li>
        {{--<li class="ListBox">
            <div class="List NGEB"><a href="{{front_app_url('/classroom/order/index','www')}}">주문/배송조회</a></div>
        </li>
        <li class="ListBox">
            <div class="List NGEB"><a href="{{front_app_url('/classroom/point/index','www')}}">포인트 관리</a></div>
        </li>
        <li class="ListBox">
            <div class="List NGEB"><a href="{{front_app_url('/classroom/coupon/index','www')}}">쿠폰/수강권 관리</a></div>
        </li>--}}
        <li class="ListTit"><h1 class="NGEB">고객센터</h1></li>
        <li class="ListBox">
            <div class="Depth">
                <ul>
                    <li><a href="{{front_url('/support/notice/index')}}">· 공지사항</a></li>
                    <li><a href="{{front_url('/support/faq/index')}}">· 자주하는 질문</a></li>
                    <li><a href="{{front_url('/support/qna/index')}}">· 동영상 상담실</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>