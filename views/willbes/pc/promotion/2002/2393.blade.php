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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed;top:225px; width:206px; right:0; z-index:1;} 
        .sky a {display:block; margin-bottom:10px}
       
        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2393_top_bg.jpg) no-repeat center top;}
        
        .evt01 {padding-bottom:150px}
        .evt01 div {width:400px; margin:0 auto}
        .evt01 div a {display:block; background:#383838; color:#fff; border-radius:10px; font-size:30px; padding:20px 0;}
        .evt01 div a:hover {background:#ff4b4a}

        .evt02 {background:#eee; padding-bottom:150px}

        .evtCtnsBox .slide_con {width:848px; margin:0 auto; text-align:center; position:relative;}
        .evtCtnsBox .slide_con p {position:absolute; top:50%; margin-top:-39px; width:42px !important; height:78px !important; z-index:10}
        .evtCtnsBox .slide_con p.leftBtn {left:-100px}
        .evtCtnsBox .slide_con p.rightBtn {right:-100px}

        .evt03 {padding-top:150px; width:1120px; margin:0 auto}
        .evt03 .title {font-size:36px; color:#383838; line-height:1.4}
        .evt03 .title  p {font-size:60px}
        .evt03 .tabs {display:flex; justify-content: center; margin-top:100px}
        .evt03 .tabs a {display:inline-block; padding:30px 0; color:#393535; background:#eee; width:calc(25% - 1px); margin-right:1px; font-size:24px; font-weight:bold}
        .evt03 .tabs a:hover,
        .evt03 .tabs a.active {color:#fff; background:#ff4b4a}

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:decimal; margin-left:20px; margin-bottom:5px}

    </style>
    
    <div class="evtContent NSK" id="evtContainer">     
        <div class="sky" id="QuickMenu">               
            <a href="#event01"><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_sky01.png" title="초시생"></a>
            <a href="#event02"><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_sky02.png" title="유튜브"></a>
            <a href="#event03"><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_sky03.png" title="합격 설명회"></a>
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_top.jpg" alt="신규가입 이벤트" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up" id="event01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_01.jpg" alt="2022년 경찰시험 개편"/>
            <div><a href="https://police.willbes.net/pass/consult/visitConsult/index" target="_blank">상담신청하기 ></a></div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up" id="event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02.jpg" alt="혜택" />
            <div class="slide_con">
                <div id="slidesImg">
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_01.jpg" alt="1" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_02.jpg" alt="2" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_03.jpg" alt="3" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_04.jpg" alt="4" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_05.jpg" alt="5" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_06.jpg" alt="6" /></div>
                </div>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_arrL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_arrR.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up" id="event03">
            <div class="title">
                2022년 경찰합격 역시,
                <p class="NSK-Black">신광은경찰팀과 함께^^</p>
            </div>
            <div class="tabs">
                <a href="#tab01">10개월<br>슈퍼PASS</a>
                <a href="#tab02">4개월<br>슈퍼PASS</a>
                <a href="#tab03">심화기출<br>패키지</a>
                <a href="#tab04">기본이론<br>종합반</a>
            </div>      
            <div class="wrap">
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_01.jpg" alt="10개월 슈퍼패스" />
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186105" target="_blank" title="김원욱 헌법" style="position: absolute; left: 16.52%; top: 51.98%; width: 10.63%; height: 4.14%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186107" target="_blank" title="이국령 헌법" style="position: absolute; left: 45.27%; top: 51.98%; width: 10.63%; height: 4.14%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186109" target="_blank" title="경행경채" style="position: absolute; left: 72.77%; top: 51.98%; width: 10.63%; height: 4.14%; z-index: 2;"></a>
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_02.jpg" alt="4개월 슈퍼패스" />
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186101" target="_blank" title="김원욱 헌법" style="position: absolute; left: 16.07%; top: 52.44%; width: 10.63%; height: 4.14%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/pass/offPackage/show/prod-code/186103" target="_blank" title="이국령 헌법" style="position: absolute; left: 44.73%; top: 52.44%; width: 10.63%; height: 4.14%; z-index: 2;"></a>

                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_03.jpg" alt="심화기술 패키지" />
                    <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" title="" style="position: absolute; left: 32.32%; top: 74.52%; width: 35.80%; height: 8%; z-index: 2;"></a>
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_04.jpg" alt="기본이론 종합반" />
                    <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2364" target="_blank" title="" style="position: absolute; left: 29.38%; top: 75.71%; width: 41.96%; height: 8%; z-index: 2;"></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <ul>
                    <li>본 이벤트는 오프라인(노량진 본원) 전용입니다.</li>
                    <li>당첨 경품은 뽑기 추첨 후 즉시 지급됩니다.</li>
                    <li>뽑기 추첨권은 최대 3회 지급됩니다.(방문 상담 후 등록 시 1회 제공)</li>
                    <li>수강생이 친구를 추천할 경우 추천한 수강생도 1회 뽑기 추첨권을 드립니다.</li>
                    <li>10개월 패스 등록 시 1회 추첨권이 추가 지급됩니다.</li>
                    <li>수강증 발권 시 추첨 대상이 됩니다.</li>
                    <li>경품 소진 시까지 진행합니다.</li>              
                </ul>                      
            </div>
        </div>

    </div>
    <!-- End evtContainer -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );


        /* 슬라이드 */
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
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });       

        /*탭*/
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
        });
      
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop