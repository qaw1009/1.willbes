@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        br { font-family:dotum;}  

        /************************************************************/        
        .sky {position:fixed;top:150px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .evt_wrap {width:1120px; margin:0 auto; position: relative;}
        .evt_wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.25);}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/05/2220_top_bg.jpg) repeat-y center top;}  

        .evtTop .main_img {
            position:absolute;
            top:600px;
            left:50%;
            margin-left:-419px;
            z-index:10;
            animation:flipInX 2s infinite;
            -webkit-animation:flipInX 2s infinite;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @@keyframes flipInX {
             from {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;                
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
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
                
             }
             80% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             to {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);  
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;               
             }
         }
         .evtTop .flipInX {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            -webkit-animation-name: flipInX;
            animation-name: flipInX;
        }

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/05/2220_01_bg.jpg) repeat-y center top;}  

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/05/2220_02_bg.jpg) repeat-y center top;}  

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/05/2220_03_bg.jpg) repeat-y center top;}  

        /*이용안내*/
        .evtInfo {padding:100px 0; background:#555; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:35px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:20px;margin-bottom:15px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:decimal; margin-left:20px; margin-bottom:5px}
       
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#mission01">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_sky01.png" alt="미션1" >
            </a>
            <a href="#mission02">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_sky02.png" alt="미션2" >
            </a>
            <a href="#mission03">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_sky03.png" alt="마션3" >
            </a>
            <a href="#bonus">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_sky04.png" alt="보너스" >
            </a>
        </div>            

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        6월 COOL<br>여름맞이 이벤트 마감
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
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_top.jpg" title="6월 cool">     
            <div class="main_img flipInX">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_top_ani.png" alt="6월 한달간" />
            </div>               
        </div>

        <div class="evtCtnsBox evt01" id="mission01">
            <div class="evt_wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_01.jpg" title="미션1">     
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180566" target="_blank" title="" style="position: absolute;left: 22.77%;top: 64.28%;width: 17.27%;height: 6.8%;z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180748" target="_blank" title="" style="position: absolute;left: 41.77%;top: 64.28%;width: 17.27%;height: 6.8%;z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180567" target="_blank" title="" style="position: absolute;left: 60.77%;top: 64.28%;width: 17.27%;height: 6.8%;z-index: 2;"></a>
            </div>      
        </div>

        <div class="evtCtnsBox evt02" id="mission02">
            <div class="evt_wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_02.jpg" title="미션2">
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" title="" style="position: absolute;left: 7.77%;top: 42.28%;width: 10.27%;height: 10.8%;z-index: 2;"></a>
                <a href="https://www.youtube.com/channel/UCz_3g63yWTYjg6_Ko5QRK1g" target="_blank" title="" style="position: absolute;left: 22.77%;top: 42.28%;width: 10.27%;height: 10.8%;z-index: 2;"></a>
                <a href="https://www.youtube.com/channel/UCjxTXvi1hPxz32wr031U7jw" target="_blank" title="" style="position: absolute;left: 36.77%;top: 42.28%;width: 10.27%;height: 10.8%;z-index: 2;"></a>
                <a href="https://www.instagram.com/willbescop/" target="_blank" title="" style="position: absolute;left: 56.77%;top: 42.28%;width: 10.27%;height: 10.8%;z-index: 2;"></a>
                <a href="https://www.instagram.com/jhoonj3874/" target="_blank" title="" style="position: absolute;left: 77.77%;top: 42.28%;width: 10.27%;height: 10.8%;z-index: 2;"></a>
            </div>      
        </div>    

        <div class="evtCtnsBox evt03" id="mission03">
            <div class="evt_wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_03.jpg" title="미션3">
                <a href="https://police.willbes.net/pass/consult/visitConsult/index" target="_blank" title="" style="position: absolute;left: 17.77%;top: 41.28%;width: 12.27%;height: 3.8%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt04" id="bonus">
            <div class="evt_wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2220_04.jpg" title="보너스">
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank" title="" style="position: absolute;left: 25.77%;top: 70.28%;width: 48.27%;height: 12.8%;z-index: 2;"></a>
            </div>
        </div>    

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">MISSION 진행시 유의사항</h4>
				<div class="infoTit"><strong>이용안내</strong></div>
				<ul>
					<li>본 이벤트에 대한 할인혜택은 오프라인(실강)수업에만 적용 됩니다.</li>
                    <li>모든 미션은 학원방문시에만 할인되며 미션완료 확인후 할인 적용됩니다.<br>
                        미션1<br> 
                        * 수강후기 작성여부 확인(3과목[형사법, 경찰학, 헌법] 전부 작성 하여야 합니다.)<br>
                        미션2<br>
                        * 유튜브 구독, 인스타 팔로우 확인(페이지에 나와 있는 계정 전부 구독, 팔로우 하여야 합니다.)<br>
                        미션3<br>
                        * 방문상담 예약을 반드시 하여야 하고 10:00시~12:00시 예약자만 할인 적용됩니다.<br>
                        보너스 이벤트<br>
                        * 기본완성+기출 종합반 결제 등록자에게만 적용되는 이벤트입니다.
                    </li>
                    <li>인강패스 할인쿠폰은 21년에 과정에 할인적용 되지 않습니다.(2022년 패스상품 전용)</li>  
                    <li>인강패스 할인쿠폰은 T패스 상품에 할인적용 되지 않습니다.</li>     
                    <li>인강패스 할인쿠폰은 무제한패스, 15개월패스에만 적용됩니다.</li>         
				</ul>
			</div>
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