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
            position:relative;
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
            top:250px;
            right:0;
            z-index:1;
        }
        .skybanner2{
            position:fixed;
            top:270px;
            left:190px;
            z-index:1;
        }

        .wb_mp4 {background:#000;}

        .wb_cts00 {background:#404040}
        .wb_cts01 {background:#191c22 url(https://static.willbes.net/public/images/promotion/2019//10/1325_top_bg.jpg) no-repeat center top; }   

        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#abb1b9}
        .wb_cts04 {background:#696d73}
		.wb_cts05 {background:#fff;}
        .wb_cts06 {background:#f8f9fa}
        .wb_cts07 {background:#292b31}
        
        /*타이머*/
        .time {width:100%; text-align:center; background:#e1e1e1; padding:20px 0}
        .time ul {width:1000px; margin:0 auto}     
        .time li {display:inline; float:left; font-size:30px; line-height:70px; letter-spacing:-1px; color:#000;}   
        .time li img {width:70%}
        .time li span {color:#d63e4d; font-size:30px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time li:first-child {text-align:left; line-height:1; font-size:20px; padding:10px 20px 0}
        .time li:last-child {text-align:right: padding:0 20px}
        .time ul:after { content:""; display:block; clear:both}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        } 

        .tabContaier{width:100%; text-align:center; padding-bottom:20px;}
        .tabContaier ul {width:1120px;margin:0 auto;}		
        .tabContaier li {display:inline; float:left;}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}


    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB"  id="newTopDday">
            <ul>
                <li>마감까지<br><span>남은 시간은</span></li>
                <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li>일</li>
                <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li>:</li>
                <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li>:</li>
                <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</li>
            </ul>
        </div>
        <!-- 타이머 //-->
        <div class="skybanner" >
            <a href="#lect"><img src="https://static.willbes.net/public/images/promotion/2019//10/1325_skybanner.png" alt="스카이베너" usemap="#Map1325c" border="0" ></a>
        </div>

        <div class="skybanner2" >
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1053" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1053_popup.png" alt="통합생활관리반" ></a>
        </div>               

		<div class="evtCtnsBox wb_cts00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="슈퍼pass"/>            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019//10/1325_top.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019//10/1325_01.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019//10/1325_02.gif" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_03.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts05" id="lect">
            <img src="https://static.willbes.net/public/images/promotion/2019//10/1325_04.jpg" alt="슈퍼pass" usemap="#Map1325A" border="0"/>
            <map name="Map1325A" id="Map1325A">
                <area shape="rect" coords="369,1317,748,1415" href="https://police.willbes.net/pass/OffVisitPackage?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1085" target="_blank" alt="신청하기" />
            </map> 
        </div>
		
		<div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019//10/1325_05.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2019//10/1325_06.jpg" alt="슈퍼pass"  />
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop