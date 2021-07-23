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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1); border-radius:8px}

        /************************************************************/

        .wb_top {background:#B9DDFD;}

        .wb_cts01 {background:#6683AB;}

        .wb_cts02 {background:#fff;padding-bottom:150px;}
        .wb_cts02 .tabBox {position:relative; width:1120px; margin:0 auto 40px;}
        .wb_cts02 .tab li {display:inline; float:left; width:33.333333%;}
        .wb_cts02 .tab li a {display:block; text-align:center; font-size:22px; font-weight:600; background:#6583ab; color:#fff; height:60px; line-height:60px; border:1px solid #1a1a1a; margin-right:1px}
        .wb_cts02 .tab li a:hover,
        .wb_cts02 .tab li a.active {background:#182f4f; color:#fff;}
        .wb_cts02 .tab li:last-child a {margin:0}
        .wb_cts02 .tab:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#F3F3F3;}

        .wb_cts04 {padding-bottom:150px;}
        .wb_cts04 .slide_con {width:954px; margin:0 auto; position:relative}
        .wb_cts04 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .wb_cts04 .slide_con p a {cursor:pointer}
        .wb_cts04 .slide_con p.leftBtn {left:-115px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts04 .slide_con p.rightBtn {right:-85px; top:50%; width:62px; height:62px; margin-top:-30px;}  

        .wb_cts05 {background:#F3F3F3;}    

        .wb_cts06 {background:#F3F3F3;}

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1120px; margin:0 auto; border:2px solid #202020;padding:50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd strong {color:#555}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
        .guide_box dd:after {content:""; display:block; clear:both}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}   
        .guide_box .infoTit {font-size:20px;} 

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_top.jpg" alt="전격개설" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_01.jpg" alt="명성"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_02.jpg" alt="시작부터 다릅니다."/>
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab01" class="active">자료해석</a></li>
                    <li><a href="#tab02">상황판단</a></li>
                    <li><a href="#tab03">언어논리</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_tab01.jpg" alt="석치수">
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_tab02.jpg" alt="박준범">
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_tab03.jpg" alt="이나우"><br><br>
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_tab04.jpg" alt="한승아">
                </div>
            </div> 
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_03.jpg" alt="윌비스 한림법학원"/>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_04.jpg" alt="psat so easy"/>  
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2297_cts01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2297_cts02.png" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2297_cts03.png" /></li>    
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2297_cts04.png" /></li>   
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/07/2297_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/07/2297_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_05.jpg" alt="커리큘럼"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2297_06.jpg" alt="9월개강"/>
        </div>

        <div class="evtCtnsBox wb_info" id="notice">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 한림법학원 Perfect PSAT Program 온라인 PASS반 이용안내</h2>
                <dl>

                    <dt>이용안내</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 2022년 7급공무원 1차시험(PSAT)을 준비하시는 분을 위해 준비되었습니다.[과목별 교수님] <br>
                                자료해석 : 석치수, 상황판단 : 박준범, 언어논리(택1) : 이나우/한승아
                            </li>
                            <li>수강기간 : 본 상품에 등록된 강의는 2022년  7급공무원 1차시험(PSAT)일까지 수강하실 수 있습니다.</li>
                            <li>무제한수강 : 본 상품은 수강기간 동안 강의배수제한 없이 무제한 수강하실 수 있습니다.</li>
                            <li>CORE 특강 무료제공 : 과목별 4~5회 CORE특강이 무료 업로드되어 수강할 수 있습니다.(언어논리 : 신청과목 교수님 강의제공)</li>
                            <li>진행(업로드) 강좌 순차 업로드 : OPEN CLASS(기본, 21년 9~10월), ADVANCED CLASS(심화, 22년 1~2월),<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MASTER CLASS(실전모강, 22년 4~5월)강의가 수강하실 수 있게 순차적으로 업로드 될 예정입니다.
                            </li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>교재</dt>
                    <dd>
                        <ol>
                            <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, Perfect PSAT Program 온라인 PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.<br>(환불시 CORE 특강 수강료도 정가기준 수강부분만큼 차감 후 환불됩니다.)</li>
                        </ol>
                    </dd>

                    <dt>PASS 수강</dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>Perfect PSAT Program 온라인 PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>Perfect PSAT Program 온라인 PASS반 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                - 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대
                            </li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.<br>
                                (수강기간동안 3회 신청가능)
                            </li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>Perfect PSAT Program 온라인 PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 Perfect PSAT Program 온라인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                        </ol>
                    </dd>
                    <div class="infoTit NG"><strong>※ 이용문의 : 고객센터 1566-4770 / 사이트 내 1:1 상담 게시판</strong></div>

                </dl>
            </div>
        </div>

    </div>
    <!-- End Container -->
    <script type="text/javascript">
        /*탭*/
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );
        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
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

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });     


    </script>
    
@stop