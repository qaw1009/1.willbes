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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

		/************************************************************/         

        .evt_top {background:#2AC4EB url(https://static.willbes.net/public/images/promotion/2020/07/1726_top_bg.jpg) no-repeat center top;}    
        .evt_top span {position:absolute; width:258px; left:50%; margin-left:270px; top:230px; z-index:10; -webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000; line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:5px; width:28%;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%;}
        .newTopDday ul:after {content:""; display:block; clear:both}
   
    </style> 
	<div class="evtContent NGR">
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        한정판매 마감일까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1726_top.jpg" alt="gs1순환" />
            <span><img src="https://static.willbes.net/public/images/promotion/2020/07/1726_top_img01.png" alt="gs1순환" /></span>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1726_01.jpg" alt="gs1순환과정" usemap="#Map1726A" border="0" />
            <map name="Map1726A">
                <area shape="rect" coords="211,366,911,468" href="#evt_02">
            </map>
		</div>       

        <div class="evtCtnsBox evt_02" id="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1726_02.jpg" alt="수강신청" usemap="#Map1704B" border="0" />
            @if(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3094')
            <map name="Map1704B">
                <area shape="rect" coords="159,450,480,535" href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?search_order=course&course_idx=1311') }}" target="_blank"/>
                <area shape="rect" coords="546,450,955,535" href="{{ site_url('/m/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?search_order=course&course_idx=1311') }}" target="_blank"/>
            </map>
            @elseif(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3095')
            <map name="Map1704B">
                <area shape="rect" coords="159,450,480,535" href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?search_order=course&course_idx=1311') }}" target="_blank"/>
                <area shape="rect" coords="546,450,955,535" href="{{ site_url('/m/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?search_order=course&course_idx=1311') }}" target="_blank"/>
            </map>
            @endif         
        </div> 
        
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop