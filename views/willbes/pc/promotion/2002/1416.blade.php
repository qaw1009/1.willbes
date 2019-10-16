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
        .skyBanner {position:fixed; top:350px;right:0;z-index:10;}
        .skyBanner2 {position:fixed; top:300px;left:180px; z-index:10;}
        .wb_cts00 {background:#404040}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1416_top_bg.jpg) no-repeat center top;}   
        .evt01,
        .evt04 {background:#fff}
        .evt02 {background:#464646}
        .evt03 {background:#161d2c}
        .evt05 {background:#555}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}
     
    </style>

<div class="p_re evtContent NSK" id="evtContainer">
    <!-- 타이머 -->
    <div id="newTopDday" class="newTopDday">
        <div>
            <ul>
                <li>
                    이벤트<br>최종마감까지
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
    <div class="skyBanner">
        <a href="#to_go"><img src="https://static.willbes.net/public/images/promotion/2019/10/1416_skybanner.png" title="4개월 필합 패스"></a>      
    </div> 
    <div class="skyBanner2">
        <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1053" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1416_popup.png" title="4개월 필합 패스"></a>      
    </div>

    <div class="evtCtnsBox wb_cts00">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="슈퍼pass"/>            
    </div>

    <div class="evtCtnsBox evtTop">
		<img src="https://static.willbes.net/public/images/promotion/2019/10/1416_top.jpg" title="필합 4개월 pass">
	</div>

	<div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/10/1416_01.jpg" title="">
	</div>

	<div class="evtCtnsBox evt02">
		<img src="https://static.willbes.net/public/images/promotion/2019/10/1416_02.jpg" title="">
	</div>

	<div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1416_03.jpg" title="">
	</div>

    <div class="evtCtnsBox evt04" id="to_go">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1416_04.jpg" usemap="#Map1416a" title="" border="0">
        <map name="Map1416a" id="Map1416a">
            <area shape="rect" coords="380,1336,744,1426" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&course_idx=1042&campus_ccd=605001" target="_blank" />
        </map>
	</div>

    <div class="evtCtnsBox evt05">
		<img src="https://static.willbes.net/public/images/promotion/2019/10/1416_05.jpg" title="">
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