@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
     
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a {border:1px solid #000}

        /************************************************************/   

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}
   
        .sky {position:fixed;top:100px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0A0A0A}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2456_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#1a2940;} 

        .evt02 {background:#fff;}

        .evt03 {background:#3f2626;}

        .evt04 {background:#fff;}
        
        /*유의사항*/
        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px; color:#c4feff}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_sky01.jpg" alt="구독 & 팔로우" >
            </a>
            <a href="#evt02" >
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_sky02.jpg" alt="수강후기 남기장" >
            </a>
            <a href="#evt03" >
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_sky03.jpg" alt="상담" >
            </a>
            <a href="#evt04" >
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_sky04.jpg" alt="응시표" >
            </a>  
        </div>       
     

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        12!12! Winter School<br>&수능 이벤트 마감
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
        
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/police.jpg" title="경찰학원 1위">
        </div>
       
        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_top.jpg" title="12! 12! Event">                    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap" data-aos="fade-up" id="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_01.jpg" title="유튜브">
                <a href="https://bit.ly/3Ggr6v8" title="신광은 경찰팀" target="_blank" style="position: absolute; left: 14.91%; top: 38.54%; width: 12.86%; height: 3.34%; z-index: 2;"></a>
                <a href="https://bit.ly/31rTZFK" title="신광은 형사법" target="_blank" style="position: absolute; left: 28.3%; top: 38.54%; width: 12.86%; height: 3.34%; z-index: 2;"></a>
                <a href="https://bit.ly/31udn4Q" title="장정훈 경찰학" target="_blank" style="position: absolute; left: 43.75%; top: 38.54%; width: 12.86%; height: 3.34%; z-index: 2;"></a>
                <a href="https://bit.ly/3dfCQ4V" title="김원욱 헌법" target="_blank" style="position: absolute; left: 57.95%; top: 38.54%; width: 12.86%; height: 3.34%; z-index: 2;"></a>
                <a href="https://bit.ly/3lxVOYZ" title="이국령 헌법" target="_blank" style="position: absolute; left: 72.5%; top: 38.54%; width: 12.86%; height: 3.34%; z-index: 2;"></a>

                <a href="https://bit.ly/3DhEwFD" title="인스타 신광은 경찰" target="_blank" style="position: absolute; left: 31.61%; top: 65.99%; width: 16.79%; height: 3.34%; z-index: 2;"></a>
                <a href="https://bit.ly/3GahKkM" title="인스타 장정훈 경찰학" target="_blank" style="position: absolute; left: 50.54%; top: 65.99%; width: 16.79%; height: 3.34%; z-index: 2;"></a>
            </div> 

            <div class="wrap" data-aos="fade-up" id="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_02.jpg" title="온라인강의 듣고, 수강후기 작성하자">
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180748" title="형사법" style="position: absolute; left: 10.45%; top: 58.61%; width: 26.16%; height: 3.3%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180566" title="경찰학" style="position: absolute; left: 36.61%; top: 58.61%; width: 26.16%; height: 3.3%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180567" title="헌법 김원욱" style="position: absolute; left:62.68%; top: 58.61%; width: 26.16%; height: 3.3%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/183520" title="헌법 이국령" style="position: absolute; left: 23.48%; top: 62.3%; width: 26.16%; height: 3.3%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/187329" title="범죄학 박상민" style="position: absolute; left: 50%; top: 62.3%; width: 26.16%; height: 3.3%; z-index: 2;"></a>
            </div> 

            <div class="wrap" data-aos="fade-up" id="evt03">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_03.jpg" title="상담 받고 할인받자">
                <a href="https://police.willbes.net/pass/consult/visitConsult/index" target="_blank" title="상담예약" style="position: absolute; left: 29.2%; top: 54.87%; width: 13.57%; height: 5.16%; z-index: 2;"></a>
            </div>     
        </div>              

        <div class="evtCtnsBox evt02" data-aos="fade-up" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2456_04.jpg" title="패스 프로그램" />
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">MISSION 진행시 유의사항</h4>
				<ul>
					<li>본 이벤트에 대한 할인혜택은 오프라인(실강) 수업에만 적용 됩니다.</li>
                    <li>모든 미션은 학원방문시에만 할인되며 미션완료 확인후 할인 적용됩니다.</li>
                    <li>미션1. 유튜브 구독, 인스타 팔로우 확인 (페이지에 나와 있는 계정 전부 구독, 팔로우 하여야 합니다.)</li>
                    <li>미션2 . 수강후기 작성 (3과목[형사법, 경찰학, 헌법] 전부 작성해야 합니다.)<br>
                        * 초시생은 입문강의 수강후기 작성여부를 확인합니다. (8, 9개월 PASS와 기본종합반 할인가능)<br>
                        * 재시생은 심화강의 수강후기 작성여부를 확인합니다. (3개월 필합PASS와 문제풀이 1+2+3 종합반 할인가능)<br>
                    <li>미션3. 방문상담 예약을 반드시 하여야 하고 당일 등록해야만 할인이 적용됩니다.</li>
                    <li>보너스 이벤트는 3가지 미션 중 2가지 이상을 클리어 하면 자동으로 참여되는 이벤트 입니다.</li>
                    <li>보너스 이벤트 지급방법 안내<br>
                        → 기초입문서, 헌법워크북(이) 현장에서 체크 후 배부<br>
                        → 슈퍼패스 재등록권, 심화종합반 실강 50% 할인권 접수처에서 대상자 확인 후 할인진행<br>
                        → 온라인패스 20% 할인권 해당 수강생 ID로 발송</li>
                    <li>인강패스 할인쿠폰은 경찰간부 상품에는 할인적용 되지 않습니다.</li>
                    <li>인강패스 할인쿠폰은 22년 2차패스에만 적용됩니다.</li>
                </ul>         
		
			</div>
		</div>
        
	</div>
   <!-- End Container -->

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop