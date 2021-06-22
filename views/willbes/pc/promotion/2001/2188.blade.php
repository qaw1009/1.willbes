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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:120px; right:10px; z-index:1;}        
        .skybanner a {display:block; margin-bottom:10px}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2188_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#fff;}	
        .wb_01 .youtube iframe {width:640px; height:360px} 
        .wb_01 .youtube {position:absolute; top:457px; left:49.45%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .wb_01 .youtube.yu02 {top:905px; margin-left:-139px;}
        .wb_01 .youtube.yu03 {top:1356px;}   
        .wb_01 .youtube.yu04 {top:1805px; margin-left:-139px;}

        .wb_02 {background:#015275} 
        .wb_03 {padding-bottom:150px} 

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

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2021/04/2188_sky01.jpg" alt="기본완성 기출반 단과"></a>
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2021/04/2188_sky02.jpg" alt="기본완성 기출반 종합반"></a>
        </div>   

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        기본완성기출반<br>사전접수 EVENT
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
        
        <div class="evtCtnsBox wb_police">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2188_top.jpg"  alt="기본완성 기출반" />
		</div>

        <div class="evtCtnsBox wb_01">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2188_01_01.jpg"  alt="빠르게 준비 및 유튜브 영상"/><br>	
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu03">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="youtube yu04">
                <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
  
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2188_01_02.jpg"  alt="3번과목 중요성" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2188_01_03.jpg"  alt="과목비중 및 출제비율" />
		</div>

		<div class="evtCtnsBox wb_02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2188_02.jpg"  alt="자격증.기초입문 선행 스케줄"/>       
        </div>

        <div class="evtCtnsBox wb_03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2188_03_01.jpg"  alt="기본완성기출반 단과"/> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2188_03_02.jpg"  alt="기본완성기출반 종합반"/> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
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