@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="NG c_both"> 
        <div class="introBox3 NSK">
            <div class="menuGroup">
                <div>
                    <ul class="bigType">
                        <li><a href="{{ front_app_url('/home/index', 'police') }}" target="_blank">신광은경찰</a></li>
                        <li><a href="{{ front_app_url('/home/index/cate/3094', 'gosi') }}" target="_blank">5급행정</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'pass') }}" target="_blank">공무원</a></li>
                        <li><a href="{{ front_app_url('/home/index/cate/3095', 'gosi') }}" target="_blank">국립외교원</a></li>
                        <li><a href="{{ front_app_url('/home/index/cate/3035', 'pass') }}" target="_blank">법원직</a></li>
                        <li><a href="{{ front_app_url('/home/index/cate/3096', 'gosi') }}" target="_blank">5급PSAT</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'ssam') }}" target="_blank">교원임용 <span>N</span></a></li>
                        <li><a href="{{ front_app_url('/home/index/cate/309002', 'job') }}" target="_blank">공인노무사</a></li>   
                        <li><a href="{{ front_app_url('/home/index/cate/3097', 'gosi') }}" target="_blank">5급헌법</a></li>                    
                        <li><a href="{{ front_app_url('/home/index/cate/309003', 'job') }}" target="_blank">감정평가사</a></li>   
                        <li><a href="{{ front_app_url('/home/index/cate/3098', 'gosi') }}" target="_blank">법원행시</a></li>                     
                        <li><a href="{{ front_app_url('/home/index/cate/309004', 'job') }}" target="_blank">변리사</a></li>
                        <li><a href="{{ front_app_url('/home/index/cate/3099', 'gosi') }}" target="_blank">변호사시험</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">세무사</a></li>
                        <li><a href="{{ front_app_url('/home/index/cate/3100', 'spo') }}" target="_blank">경찰간부·일반경찰</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">관세사</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'work') }}" target="_blank">취업</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'lang') }}" target="_blank">어학</a></li>              
                        <li><a href="{{ front_app_url('/home/index', 'njob') }}" target="_blank">N잡/e창업 e-커머스</a></li>
                        <li><a href="{{ front_app_url('/home/index', 'willbesedu') }}" target="_blank">인천학원</a></li>
                        <li class="full"><a href="{{ front_app_url('/home/index', 'book') }}" target="_blank">온라인서점</a></li>
                    </ul>
                    <div class="etc">
                        <a href="#none" class="btnMainToggle">기타자격증 <span>+</span></a>
                        <ul class="smallType">
                            <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">스포츠지도사</a></li>
                            <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">소프트웨어자산관리사</a></li>
                            <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">전기(산업)기사</a></li>
                            <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">소방(산업)기사</a></li>
                            <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">한국사능력시험</a></li>
                            <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">경제교육지도사</a></li>
                            <li><a href="{{ front_app_url('/home/index', 'job') }}" target="_blank">진로직업체험지도사</a></li>
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

        // 백그라운드 이미지
        var images = ['gate_m_bg1.png', 'gate_m_bg2.png', 'gate_m_bg3.png'];
        $('.introBox3').css({'background-image': 'url({{ img_static_url('promotion/m/') }}' + images[Math.floor(Math.random() * images.length)] + ')'});
    </script>
@stop