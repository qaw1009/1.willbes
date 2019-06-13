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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_mp4 {background:#000;}

        .wb_cts00 {background:#404040}
        .wb_cts01 {background:#191c22 url(https://static.willbes.net/public/images/promotion/2019/06/1283_top_bg.jpg) no-repeat center top; position:relative;}
        .wb_cts01 span {position:absolute; top:260px; left:50%; margin-left:250px; z-index:10; animation:img1 0.5s ease-in;-webkit-animation:img1 0.5s ease-in;}
        @@keyframes img1{
             from{margin-left:500px; opacity: 0;}
             to{margin-left:250px; opacity: 1; transform:rotate(360deg);}
         }
        @@-webkit-keyframes img1{
            from{margin-left:500px}
            to{margin-left:250px; opacity: 1; transform:rotate(360deg);}
         }

        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#abb1b9}
        .wb_cts04 {background:#696d73}
		.wb_cts05 {background:#ebecef}
        .wb_cts06 {background:#f8f9fa}
        .wb_cts07 {background:#4d5258}
        
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

		<div class="evtCtnsBox wb_cts00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="슈퍼pass"/>            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_top.jpg" alt="슈퍼pass"  />
            <span><img src="https://static.willbes.net/public/images/promotion/2019/06/1283_top_img1.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_01.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_02.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_03.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts05" id="lect">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_04.jpg" alt="슈퍼pass"  usemap="#pass"/>
            <map name="pass">
                <area shape="rect" coords="380,1202,741,1285"  href="{{ site_url('/pass/OffVisitPackage?cate_code=3010&campus_ccd=605001&course_idx=1085') }}" alt="" target="_blank">       
            </map>
        </div>
		
		<div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_05.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_06.jpg" alt="슈퍼pass"  />
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