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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

         /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#eee; width:100%; padding:10px 0 35px}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%;}
        .newTopDday ul li:first-child span {font-size:17px;margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%;line-height:60px;}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .sky {position:fixed;top:200px;right:0;z-index:1;}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:#363A43 url(https://static.willbes.net/public/images/promotion/2020/06/1699_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#F8F8F8}

        .evt02 {background:#ddd; padding-bottom:150px}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; margin-top:-23px; width:27px; height:46px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px;}
        .slide_con p.rightBtn {right:-40px;}

        .evt03 {background:#fff;}
        
        .evt04 {background:#2F2F2D url(https://static.willbes.net/public/images/promotion/2020/06/1699_04_bg.jpg) no-repeat center top;}
        
        .evt05 {background:#ddd;}       

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>문제풀이 종합반</span><br />
                        <span style="line-height:40px;font-size:25px;color:#000;font-wieght:bold;">사전접수 이벤트</span>
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
                        <span>남았습니다.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sky">
            <a href="#to_go"><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_sky.png" alt="필합생 전용 이벤트"></a>
        </div>

        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">    
        </div>       

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1699_top.jpg" title="문제풀이 풀패키지">
        </div>

        <div class="evtCtnsBox evt03" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1699_03.jpg" usemap="#Map1699a" title="전용 패키지 방문접수" border="0">
            <map name="Map1699a" id="Map1699a">
              <area shape="rect" coords="388,859,730,926" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1699_01.jpg" title="2차 시험채용일정">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1699_02.jpg" title="합격으로 증명">
            <div class="slide_con">
                <ul id="slidesImg">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_02_tab01.jpg" alt="1단계" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_02_tab02.jpg" alt="2단계" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_02_tab03.jpg" alt="3단계" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_arrowR.png"></a></p>
            </div>
        </div>        

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1699_04.jpg" title="핸리 포드">
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1699_05.jpg" title="상품 구성">
        </div>

        {{--
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_04.jpg" title="영어집중관리반이 답이다!">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_03.jpg" title="영어집중 관리반이란?">            
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02.jpg" title="생생 후기">
            <div class="slide_con">
                <ul id="slidesImg">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c1.jpg" alt="생생 후기1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c2.jpg" alt="생생 후기2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c3.jpg" alt="생생 후기3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_02_c4.jpg" alt="생생 후기4" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/09/1386_arrowR.png"></a></p>
            </div>
        </div>     

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_06.jpg" title="영어집중 관리반이란?">            
        </div>        

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1386_05.gif" usemap="#Map1386A" title="영어 집중 관리반 신청하기" border="0">
            <map name="Map1386A" id="Map1386A">
                <area shape="rect" coords="316,886,800,965" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1102" target="_blank" alt="신청하기" />
            </map>
        </div>
        --}}
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg = $("#slidesImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft").click(function (){
                    slidesImg.goToPrevSlide();
                });
            
                $("#imgBannerRight").click(function (){
                    slidesImg.goToNextSlide();
                });
        });

    /*디데이카운트다운*/
    $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
            @endif
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop