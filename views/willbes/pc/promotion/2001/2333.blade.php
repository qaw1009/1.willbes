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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .wrap a {display:block; color:#fff; font-size:24px; background:#1f2223; padding:20px 0; width:450px; margin:50px auto 30px; border-radius:40px}
        .wrap a:hover{box-shadow:0 10px 20px rgba(0,0,0,.3); background:#2d6ad1}

        .skybanner {position:fixed;top:200px; width:179px; right:0; z-index:100;}        
        .skybanner a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:center; padding-left:110px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/08/2333_top_bg.jpg) no-repeat center;}

        @@keyframes blink {
            50% {opacity: 0;}
        }

        .wb_01 > div,
        .wb_03 > div,
        .wb_04 > div{position:relative; width:1120px; margin:0 auto}

        .wb_01 {background:#dbe8ed} 
        .wb_01 a:hover{box-shadow:0 10px 20px rgba(0,0,0,.3);}

        .wb_02 {background:#fff;}	
        
        .wb_02 .youtube iframe {width:640px; height:360px} 
        .wb_02 .youtube {position:absolute; top:457px; left:49.45%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .wb_02 .youtube.yu02 {top:905px; margin-left:-139px;}
        .wb_02 .youtube.yu03 {top:1356px;}   
        .wb_02 .youtube.yu04 {top:1806px; margin-left:-139px;}

        .wb_03 {background:#e5e5e5;}               

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="skybanner">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2333_sky01.png" alt="검정제 선행" ></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2021/08/2333_sky02.png" alt="개편과목" ></a>
        </div>      

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                    사전접수<br>EVENT 마감까지
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
        
        <div class="evtCtnsBox wb_top"  data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2333_top.jpg"  alt="2022 기본종합반" />
		</div>

        <div class="evtCtnsBox wb_01"   data-aos="fade-right">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2333_01.jpg"  alt="기본환성 기출반" />
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1839" title="경찰시험 개편과목 전략" target="_blank" style="position: absolute; left: 15.45%; top: 78.62%; width: 32.14%; height: 11.24%; z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1966" title="G-TELP 단기간전략!" target="_blank" style="position: absolute; left: 50.27%; top: 78.47%; width: 32.14%; height: 11.24%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_02"  data-aos="fade-left">
			<img src="https://static.willbes.net/public/images/promotion/2021/08/2333_02.jpg"  alt="빠르게 준비 및 유튜브 영상"/><br>	
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
		</div>

        <div class="evtCtnsBox wb_03"  data-aos="fade-right">
            <divv class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2333_03.jpg"  alt="기본종합반 스케줄"/>    
            </divv>
        </div>

        <div class="evtCtnsBox wb_04" id="evt_01"  data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2333_04.jpg"  alt="온라인 단과 사전접수 할인 이벤트" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
		</div>

        <div class="evtCtnsBox wb_05" id="evt_02"  data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2333_05.jpg"  alt="온라인 종합반 사전접수 할인 이벤트" />
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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop