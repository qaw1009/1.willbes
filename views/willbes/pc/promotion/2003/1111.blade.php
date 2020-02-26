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
            background:#323335 url(https://static.willbes.net/public/images/promotion/2020/02/1111_top_bg.jpg) no-repeat center top;
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
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1111_top.jpg" alt="전역 인증센터"/>
        </div>
        <div class="evtCtnsBox LAeventZ02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1111_01.jpg" alt="학원실강/온라인동영상 교육과정" usemap="#Map1111a" border="0">
            <map name="Map1111a" id="Map1111a">
                <area shape="rect" coords="388,668,517,698" href="https://pass.willbes.net/promotion/index/cate/3019/code/1550" target="_blank" />
                <area shape="rect" coords="387,872,515,901" href="https://pass.willbes.net/promotion/index/cate/3019/code/1116" target="_blank" />
                <area shape="rect" coords="776,859,903,886" href="https://pass.willbes.net/promotion/index/cate/3019/code/1113" target="_blank" />
            </map>        
        </div>

    </div>
    <!-- End Container -->
@stop