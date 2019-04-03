@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')

    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative; 
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .rLnb {
            position:fixed; width:190px; bottom:100px; right:10px; z-index:1;
        }
        .rLnb ul {background:#fff; border:1px solid #2f2f2f; margin-bottom:10px;
            -webkit-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.21);
            -moz-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.21);
            box-shadow:5px 5px 10px 0px rgba(0,0,0,0.21);
        }
        .rLnb li {}
        .rLnb li:first-child {
            background:#cdcdcd;
            color:#000;
            text-align:center;
            padding:12px 0;
            font-weight:bold;
            font-size:15px;
            letter-spacing:-1px
        }
        .rLnb .typeA a {
            border-bottom:1px solid #bfbfbf; display:block; padding:10px 10px 10px 15px; line-height:1.4; font-weight:bold;
            background:url(https://static.willbes.net/public/images/promotion/leave_army/leaveArmylnb_arrow.jpg) no-repeat 93% center;}
        .rLnb .typeA a:hover {
            font-weight: 600;
            background:#ebebeb url(https://static.willbes.net/public/images/promotion/leave_army/leaveArmylnb_arrow.jpg) no-repeat 93% center;
        }
        .rLnb .typeA li:last-child a {border:0}
        .rLnb .typeB li {
            text-align:center;
            padding:15px 0;
            line-height: 1.4;
        }
        .rLnb .typeB a {display:block; background:#000; color:#fff; border-radius: 20px; padding:8px 0; margin:0 20px}
 

        .LAeventA01 {background:url(https://static.willbes.net/public/images/promotion/leave_army/la_on_top_bg.jpg) no-repeat center top; position:relative;}
        /*플립 애니메이션*/
        .LAeventA01 .main_img {position:absolute; width:601px; top:1000px; left:50%; margin-left:-488px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
        @@keyframes flipInX {
            from {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
                opacity: 0;
            }
            40% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
            }
            60% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                opacity: 1;
            }
            80% {
                -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
                transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
            }
            to {
                -webkit-transform: perspective(400px);
                transform: perspective(400px);
            }
        }

        .LAeventA01 .flipInX {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            -webkit-animation-name: flipInX;
            animation-name: flipInX;
        }

        .LAeventA02 {width:100%; text-align:center; background:#ececec}
        .LAeventA02 ul {width:1034px; margin:0 auto; }
        .LAeventA02 li {margin-bottom:13px; margin-right:13px; display:inline; float:left;}
        .LAeventA02 li:nth-child(3n+3) {margin:0}
        .LAeventA02 ul:after {
            content:'';
            display:block;
            clear:both;
        }
        .LAeventA03 {width:100%; text-align:center; background:#252525}
    </style>

    <div class="p_re evtContent" id="evtContainer">
        <div class="rLnb">
            <ul class="typeA">
                <li class="NSK-Black">서비스 바로가기</li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1111') }}" class="menu1" target="_blank">인증센터</a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1116') }}" class="menu2" target="_blank">서울 노량진 교육과정</a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1115') }}" class="menu3" target="_blank">인천 부평 교육과정</a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1117') }}" class="menu4" target="_blank">부산 서면 교육과정</a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1113') }}" class="menu5">윌비스 PASS</a></li>
            </ul>            <ul class="typeB">
                <li class="NSK-Black">전역(예정)간부 인증</li>
                @if(empty($cert_apply))
                    <li><a href="javascript:certOpen();">인증하기 &gt;</a></li>
                @else
                    <li><strong>{{sess_data('mem_name')}}</strong>님은<br /><span>인증완료</span><br />상태입니다.</li>
                @endif
            </ul>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/leave_army/la_q_bnr02.jpg" alt=""/>
            </div>
        </div>

        <div class="evtCtnsBox LAeventA01">
            <div class="main_img flipInX animated" style="opacity:1;">
                <img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_top_txt.png" alt="윌비스 PASS 혜택">
            </div>
            <img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_top.jpg" alt="윌비스 PASS">
        </div>

        <div class="LAeventA02">
            <img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_01.jpg" alt=""/>
            <ul>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1113') }}"><img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_01_m1.jpg" alt="군문원"/></a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1113') }}"><img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_01_m2.jpg" alt="소방직"/></a></li>
                <li><a href="{{ app_url('/promotion/index/cate/3001/code/1121', 'police') }}" target="_blank"><img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_01_m3.jpg" alt="경찰직"/></a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1113') }}"><img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_01_m4.jpg" alt="기술직"/></a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1113') }}"><img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_01_m5.jpg" alt="일반행정직"/></a></li>
                <li><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1113') }}"><img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_01_m6.jpg" alt="소방(산업)기사 자격증"/></a></li>
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_02.jpg"  alt="" usemap="#Mappass02"/>
            <map name="Map" id="Mappass02">
                <area shape="rect" coords="194,1063,398,1102" href="javascript:certOpen();" alt="빠른 간편가입 및 인증"/>
                <area shape="rect" coords="714,1063,922,1102" href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1113') }}" alt="윌비스 pass 구매"/>
            </map>
        </div>
        <div class="LAeventA03">
            <img src="https://static.willbes.net/public/images/promotion/leave_army/la_on_03.jpg" alt="합격을 위한 너무나 다영한 선택! 윌비스 PASS"/>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($cert_apply) === false)
                alert("이미 인증이 완료된 상태입니다.");return;
            @endif

            @if(empty($arr_promotion_params) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
@stop