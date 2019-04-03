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
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
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
        .rLnb_sectionFixed {position:fixed; top:20px}

        .LAeventZ01 {
            background:url(https://static.willbes.net/public/images/promotion/leave_army/la_00_top_bg.jpg) no-repeat center top;
            margin-top:10px;
            position:relative
        }

        /*플립 애니메이션*/
        .LAeventZ01 .main_img {position:absolute; width:601px; top:534px; left:50%; margin-left:-300px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
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

        .flipInX {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            -webkit-animation-name: flipInX;
            animation-name: flipInX;
        }

        .LAeventZ02 {background:#ececec;}
    </style>



    <div class="p_re evtContent" id="evtContainer">

        <div class="evtCtnsBox LAeventZ01">
            <div class="main_img flipInX animated" style="opacity:1;">
                <img src="https://static.willbes.net/public/images/promotion/leave_army/la_00_top_txt.png" alt="전역(예정)간부인증센터">
            </div>
            <img src="https://static.willbes.net/public/images/promotion/leave_army/la_00_top.jpg" alt="2년연속공식지정 국방부.보훈처 전문교육기관"/>
        </div>
        <div class="evtCtnsBox LAeventZ02">
            <img src="https://static.willbes.net/public/images/promotion/leave_army/la_00_01.jpg" alt="학원실강/온라인동영상 교육과정" usemap="#Map180123" border="0"/>
            <map name="Map180123" id="Map180123">
                <area shape="rect" coords="67,835,197,864" href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1116') }}" alt="학원실강 서울 노량진"/>
                <area shape="rect" coords="215,835,346,864" href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1115') }}" alt="학원실강 인천 부평"/>
                <area shape="rect" coords="365,835,494,864" href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1117') }}" alt="학원실강 부산 서면"/>
                <area shape="rect" coords="776,835,905,864" href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1112') }}" alt="온라인 교육과정"/>
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop