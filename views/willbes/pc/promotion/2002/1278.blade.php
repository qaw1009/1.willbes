@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:280px;
            right:0;
            z-index:1;
        }

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#2784d2}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#2784d2}
        to{color:#000}
        }

        .wb_00 {background:#404040}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/06/1278_top_bg.jpg) no-repeat center top; position:relative}
        .wb_top span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_top span.img1 {top:80px; margin-left:100px; width:366px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:0; opacity: 0;}
        to{margin-left:100px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:0; opacity: 0;}
        to{margin-left:100px; opacity: 1;}
        }

        .wb_01 {background:#8a8a8a}
        .wb_02 {background:#7d7d7d}
        .wb_03 {background:#f3f3f3}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner" >
            <a href="#wb_03"><img src="https://static.willbes.net/public/images/promotion/2019/06/1278_skybanner.png" alt="스카이배너" ></a>
        </div>

        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1278_00.jpg" alt="대한민국 경찰학원 1위" />
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1278_top.jpg" alt="영어 독해 고득점 특강"/>
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1278_top_img1.png" alt="패키지 할인"></span>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1278_01.jpg" alt="김준기 교수님 하이힐 독해특강" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1278_02.jpg" alt="김현정 교수님 독해특강" />
        </div>

        <div class="evtCtnsBox wb_03" id="wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1278_03.jpg" alt="신청하기" usemap="#Map1278A" border="0"/>
            <map name="Map1278A" id="Map1278A">
                <area shape="rect" coords="753,541,889,581" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1046&subject_idx=1054" target="_blank" alt="학원강의" />
                <area shape="rect" coords="899,481,1031,524" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/155177" target="_blank" alt="김준기" />
                <area shape="rect" coords="896,543,1034,582" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/155405" target="_blank" alt="김현정" />
            </map>
        </div>
    </div>
    <!-- End Container -->
@stop