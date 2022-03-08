@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/             
        .sky {position:fixed; top:200px; width:216px; text-align:center; right:10px;z-index:10;}
        .sky a {display:block; margin-bottom:20px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2568_top_bg.jpg) no-repeat center top;}	    
        .evt01 {background:#c0ff92}

        .evt02 {padding-bottom:100px;}

        .tabs {width:783px; margin:25px auto 0;}
        .tabs ul{margin:0 auto 20px; display: flex; justify-content: space-around;}
        .tabs li {width:20%}
        .tabs li a {display:block; text-align:center; height:45px; line-height:45px; background:#b7b7b7; color:#fff; font-size:16px; margin-right:4px;border-radius:16px;}
        .tabs li a:hover,
        .tabs li a.active {background:#c0ff92; color:#89443f; font-weight:bold}
        .tabs li:last-child a {margin:0}
        
        .tabs .map > div {background:#f5f5f3; padding:30px; font-size:14px; text-align:left; line-height:1.4; margin-top:10px}
        .tabs .map .area {font-size:15px; margin-bottom:15px}
        .tabs .map .area a {padding:5px 10px; background:#464646; color:#fff}
        .tabs .map .area a:hover {background:#000}  

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/03/2568_03_bg.jpg) repeat-x left top; padding-bottom:100px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <div class="evtContent NSK" id="evtContainer">             

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_sky01.png" alt="윌비스 전국모의고사 접수하기" >
            </a>   
            <a href="#event03"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_sky02.png" alt="윌비스 전국모의고사 접수하기" >
            </a>                   
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_top.jpg" alt="전국 모의고사" />
                <a href="#event03" title="모의고사 신청" style="position: absolute;left: 35.66%;top: 59.18%;width: 31.16%;height: 9.24%;z-index: 2;"></a>
            </div>
        </div>
      
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_01.jpg" alt="시험 미리 만나기" /> 
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_02.jpg" alt="접수 및 시행일정" />
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">서울(노량진)</a></li>
                    <li><a href="#tab02">인천</a></li>                
                    <li><a href="#tab03">광주</a></li>
                    <li><a href="#tab04">대구</a></li>
                    <li><a href="#tab05">부산</a></li>
                    {{--<li><a href="#tab06">전북</a></li>--}}
                </ul>
                <div id="tab01" class="map">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_01_map01.jpg" alt="서울(노량진)" />
                    <div>
                        <div class="area"><a href="http://naver.me/5HUAqXha" target="_blank">노량진 학원 오시는 길 🔗</a></div>
                        🚩 주소 : 서울시 동작구 노량진로 196 노량빌딩(구 JH빌딩) 10층 / 노량진동 143-2<br>
                        📲 연락처 : 1544 - 0330
                    </div>
                </div>
                <div id="tab02" class="map">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_01_map02.jpg" alt="인천" />
                    <div>
                        <div class="area"><a href="http://naver.me/5CbXbASe" target="_blank">인천 학원 오시는 길 🔗</a></div>
                        🚩 주소 : 인천 부평구 경원대로 1395 부평1번가 11층<br>
                        📲 연락처 : 1544 - 1661
                    </div>
                </div>    
                <div id="tab03" class="map">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_01_map03.jpg" alt="광주" />
                    <div>
                        <div class="area"><a href="http://naver.me/5THcHZv2" target="_blank">광주 학원 오시는 길 🔗</a></div>
                        🚩 주소 : 광주 북구 호동로 6-11<br>
                        📲 연락처 : 1566-3864 / 070-5154-4811
                    </div>
                </div>
                <div id="tab04" class="map">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_01_map04.jpg" alt="대구" />
                    <div>
                        <div class="area"><a href="http://naver.me/5thHhVZF" target="_blank">대구 학원 오시는 길 🔗</a></div>
                        🚩 주소 : 대구 중구 중앙대로 412(남일동) CGV 2층<br>
                        📲 연락처 : 1522 - 6112
                    </div>
                </div>
                <div id="tab05" class="map">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_01_map05.jpg" alt="부산" />
                    <div>
                        <div class="area"><a href="http://naver.me/5jYFYzg2" target="_blank">부산 학원 오시는 길 🔗</a></div>
                        🚩 주소 : 부산 진구 부전동 223-8<br>
                        📲 연락처 : 1522 - 8112
                    </div>
                </div>
                {{--
                <div id="tab06" class="map">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_01_map06.jpg" alt="전북" />
                    <div>
                        <div class="area"><a href="http://naver.me/585A59V6" target="_blank">전주 학원 오시는 길 🔗</a></div>
                        🚩 주소 : 전북 전주시 덕진구 떡전5길 22 전북대학교 산학협력단 별관 인재개발센터 3층 305호<br>
                        📲 연락처 : 063-272-9946
                    </div>
                </div>
                --}}
            </div>	       
        </div>

        <div class="evtCtnsBox evt03" id="event03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2568_03.jpg" alt="시험 미리 만나기"  data-aos="fade-up"/> 
                <a href="javascript:;" onclick="giveCheck()" title="쿠폰" style="position: absolute;left: 12.66%;top: 68.12%;width: 37.23%;height: 8.14%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" title="모의고사 신청" target="_blank" style="position: absolute;left: 50.66%;top: 68.12%;width: 37.23%;height: 8.14%;z-index: 2;"></a>
            </div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>
        
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    <script type="text/javascript">
        $regi_form = $('#regi_form');
         /*tab*/
         $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });

        /*쿠폰발급*/
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('온라인 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }

    </script>    
@stop