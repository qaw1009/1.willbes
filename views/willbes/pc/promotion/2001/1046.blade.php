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
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .main_slide {background:#888}
        .wb_main {background:#11141c url(http://file3.willbes.net/new_cop/2018/05/EV180504_p1_bg.jpg) no-repeat center;}
        .wb_00 {background:#fff}
        .wb_01 {background:#f6f6f6}
        .wb_02 {background:#565334; padding-bottom:80px;}
        .prof_slide {background:#565334 center; padding-bottom:100px;}
        .wb_03 {background:#f6f6f6;}
        .wb_04 {background:#4b4b4b;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:30px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:30px;top:46%; width:67px; height:67px;}

        #slidesImg li {display:inline; float:left}
        #slidesImg li img {width:980px;}
        #slidesImg:after {content::""; display:block; clear:both}

        .slide_con2 {position:relative; width:980px; margin:0 auto}
        .slide_con2 p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con2 p a {cursor:pointer}
        .slide_con2 p.leftBtn {left:-80px; top:46%; width:67px; height:67px;}
        .slide_con2 p.rightBtn {right:-80px;top:46%; width:67px; height:67px;}

        #slidesImg2 li {display:inline; float:left}
        #slidesImg2 li img {width:980px;}
        #slidesImg2:after {content::""; display:block; clear:both}

        /* 이용안내 */
        .content_guide_wrap{background:#ffffff; margin:0;min-width:1210px;}
        .content_guide_box{ position:relative; width:980px; margin:0 auto; padding:50px 0;}
        .content_guide_box .guide_tit{margin-left:20px;margin-bottom:20px;font-size:160%; font-weight:bold;}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}

        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            border: 5px solid #fff;
            padding: 20px;
            background-color: #fff;
        }

        .b-close {
            position: absolute;
            right: 5px;
            top: 5px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .content {width:auto; height:auto}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox main_slide" id="main">
            <div class="slide_con">
                <ul id="slidesImg">
                    <li><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_slide01.png" alt="1" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_slide02.png" alt="2" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="http://file3.willbes.net/new_cop/2017/07/EV170704_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="http://file3.willbes.net/new_cop/2017/07/EV170704_arrow_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_main" >
            <img src="http://file3.willbes.net/new_cop/2018/05/EV180504_p1.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_00" >
            <a onclick="go_popup()"><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_p2.jpg"  alt="공략" usemap="#lay" alt="응시자격상세보기"/></a>
        </div>

        <!--레이어-->
        <div id="popup" class="Pstyle">
            <span class="b-close"><img src="http://willbescop.net/assets/img/common/ly_close.png" alt="닫기"/></span>
            <div class="content">
                <img src="http://file3.willbes.net/new_cop/2018/05/EV180504_p_popup.jpg" />
            </div>
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="http://file3.willbes.net/new_cop/2018/05/EV180504_p3.jpg"  alt="why 01" />
        </div>

        <div class="evtCtnsBox wb_02" >
            <img src="http://file3.willbes.net/new_cop/2018/05/EV180504_p4.png"  alt="why 02" />
        </div>

        <div class="evtCtnsBox prof_slide" id="main">
            <div class="slide_con2">
                <ul id="slidesImg2">
                    <li><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_slide_01.jpg" alt="신광은" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_slide_02.jpg" alt="장정훈" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_slide_03.jpg" alt="김원욱" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_slide_04.jpg" alt="김동진" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/05/EV180504_slide_05.jpg" alt="이국령" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft2"><img src="http://file3.willbes.net/new_cop/2017/07/EV170704_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight2"><img src="http://file3.willbes.net/new_cop/2017/07/EV170704_arrow_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="http://file3.willbes.net/new_cop/2018/05/EV180504_p5.png"  alt="why 03" />
        </div>

        <div class="evtCtnsBox wb_04" id="lect">
            <img src="http://file3.willbes.net/new_cop/2018/05/EV180504_p6_2.jpg" alt="수강신청" usemap="#short" />
        </div>

        <div class="content_guide_wrap">
            <div class="content_guide_box">
                <p class="guide_tit">법학경채 PASS 이용안내 </p>
                <dl>

                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 패스 상품의 표기된 기간 동안 동영상 전 강좌를 무제한 수강 할 수 있습니다. </p>
                        <p>2. 패스 강좌는 결제 완료되는 즉시 수강이 시작됩니다.</p>
                        <p>3. 민법과목의 강의는 완강 후 총론파트까지 편집되어 제공됩니다. </p>
                        <p>4. 민법,헌법 과목의 교재는 내 강의실 패스존의 [강좌추가하기] 버튼 클릭 후에만 교재 구매 가능합니다.</p>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <p>1. 먼저 내 강의실 메뉴에서 패스존으로 접속합니다.</p>
                        <p>2. 구매하신 법학경채 PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</p>
                        <p>3. PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</p>
                        <p>4. PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.</p>
                        <p class="guide_txt_01"><strong>PC+Mobile PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP는 제공하지 않습니다.)</p>
                        <p>5. PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</p>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <p>1. <strong>법학경채 PASS</strong>는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다. </p>
                        <p>2. 민법,헌법 과목의 교재는 내강의실 패스존의 [강좌추가하기] 버튼 클릭 후에만 교재 구매 가능합니다.</p>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <p>1. 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로  간주됩니다.</p>
                        <p>2. 고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 법학경채 PASS는 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</p>
                        <p>3. 수강시작일로부터 60일 초과 또는 차감액이 결제 금액을 초과할 시 환불 불가합니다.</p>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</p>
                        <p>2. PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</p>
                        <p>3. 아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</p>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-6219</p>
                    </dd>

                </dl>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        function go_popup() {
            $('#popup').bPopup();
        };
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
                slideWidth:980,
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

        /**/
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg2").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft2").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
                }
                else {
                    $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
                }
            });
        } );

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>
@stop