@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="NG c_both"> 
        <div class="introBox3 NSK">
            <div class="menuGroup">
                <div>
                    <h4 class="NSK"><img src="{{ img_url('m/intro/icon_playlec.png') }}" alt="신광은경찰"> 동영상 수강신청 바로가기</h4>
                    <ul class="bigType">
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=3001', 'police') }}" target="_blank">신광은경찰</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=3094', 'gosi') }}" target="_blank">5급행정</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=regist&cate_code=3019', 'pass') }}" target="_blank">공무원</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=3095', 'gosi') }}" target="_blank">국립외교원</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=309002', 'job') }}" target="_blank">공인노무사</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=3096', 'gosi') }}" target="_blank">PSAT</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=309003', 'job') }}" target="_blank">감정평가사</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=3097', 'gosi') }}" target="_blank">5급헌법</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=309004', 'job') }}" target="_blank">변리사</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=3098', 'gosi') }}" target="_blank">법원행시</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=309006', 'job') }}" target="_blank">세무사</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=3099', 'gosi') }}" target="_blank">변호사시험</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=309005', 'job') }}" target="_blank">관세사</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only', 'spo') }}" target="_blank">경찰간부(간부후보생)</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only', 'lang') }}" target="_blank">어학</a></li>
                        <li><a href="{{ front_app_url('/lecture/index/pattern/only', 'work') }}" target="_blank">취업</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'njob') }}" target="_blank">N잡 e-커머스</a></li>
                    </ul>
                    <div class="etc">
                        <a href="#none" class="btnMainToggle">기타자격증 <span>+</span></a>
                        <ul class="smallType">
                            <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=309001', 'job') }}" target="_blank">스포츠지도사</a></li>
                            <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=310101', 'job') }}" target="_blank">소프트웨어자산관리사</a></li>
                            <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=308902', 'job') }}" target="_blank">전기(산업)기사</a></li>
                            <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=308901', 'job') }}" target="_blank">소방(산업)기사</a></li>
                            <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=309101', 'job') }}" target="_blank">한국사능력시험</a></li>
                            <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=310102', 'job') }}" target="_blank">경제교육지도사</a></li>
                            <li><a href="{{ front_app_url('/lecture/index/pattern/only?search_order=course&cate_code=310103', 'job') }}" target="_blank">진로직업체험지도사</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(function() {
            $(".etc > a").click(function(){
                $(".smallType").slideToggle("slow"); //옵션 "slow", "fast", "normal", "밀리초(1000=1초)"
                if($(this).hasClass('btnMainToggle')) {
                    var $toggle_span = $(this).find('span');
                    switch ($toggle_span.html()) {
                        case '+' : $toggle_span.html('-');
                            break;
                        case '-' : $toggle_span.html('+');
                            break;
                    }
                }
            })
        });
    </script>
@stop