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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2484_top_bg.jpg) no-repeat center top;}
        
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
        .evt03 .tabs a {display:inline-block; padding:30px 0; color:#393535; background:#eee; width:calc(33.3% - 1px); margin-right:1px; font-size:24px; font-weight:bold}
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
            <a href="#event01"><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_sky01.png" title="상담"></a>
            <a href="#event02"><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_sky02.png" title="후기"></a>
            <a href="#event03"><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_sky03.png" title="강의 신청"></a>
        </div>
      
        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2484_top.jpg" alt="상담자 뽑기" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up" id="event01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2484_01.jpg" alt="상담이란"/>
            <div><a href="https://police.willbes.net/pass/consult/visitConsult/index" target="_blank">상담신청하기 ></a></div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up" id="event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2484_02.jpg" alt="상담후기" />
            <div class="slide_con">
                <div id="slidesImg">
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_02_01.png" alt="1" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_02_02.png" alt="2" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_02_03.png" alt="3" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_02_04.png" alt="4" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_02_05.png" alt="5" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/12/2484_02_06.png" alt="6" /></div>
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
                <a href="#tab01">8개월<br>슈퍼PASS</a>
                <a href="#tab02">문제풀이<br>패키지</a>
                <a href="#tab03">기본이론<br>종합반</a>                
            </div>      
            <div class="wrap">
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2021/12/2484_03_01.jpg" alt="8개월 슈퍼패스" />
                    <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" title="" style="position: absolute;left: 23.32%;top: 67.78%;width: 53.63%;height: 9.14%;z-index: 2;"></a>        
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/12/2484_03_02.jpg" alt="문제풀이 풀패키지" />
                    <a href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/188139" target="_blank" title="" style="position: absolute;left: 24.32%;top: 67.28%;width: 18.63%;height: 5.14%;z-index: 2;"></a>
                    <a href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/188140" target="_blank" title="" style="position: absolute;left: 57.32%;top: 67.28%;width: 18.63%;height: 5.14%;z-index: 2;"></a>
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/12/2484_03_03.jpg" alt="기본이론 종합반" />
                    <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank" title="" style="position: absolute;left: 17.32%;top: 72.28%;width: 27.63%;height: 5.14%;z-index: 2;"></a>
                    <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1040" target="_blank" title="" style="position: absolute;left: 55.32%;top: 72.28%;width: 27.63%;height: 5.14%;z-index: 2;"></a>
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
                    <li>8개월 슈퍼패스 등록 시 1회 추첨권이 추가 지급됩니다.</li>
                    <li>수강증 발권 시 추첨 대상이 됩니다.</li>
                    <li>경품 소진 시까지 진행합니다.</li>     
                    <li>경품뽑기 100% 당첨선물<br>
                        1등 : 포돌이 또는 포순이 인형<br>                   
                        2등 : 경찰 석고방향제<br>
                        3등 : 경찰 뺏지<br>
                        4등 : 포돌이 포순이 볼펜<br>
                        5등 : 콘푸로스트 컵시리얼
                    </li>
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