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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .layer {width:100%;height:971px; -ms-overflow:hidden;}
        .video {width:100%; height:971px; margin:0 auto; overflow:hidden;position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg {width:1000px; margin:0 auto; position:relative; top:-971px;}
        .pngimg-real {width:1000px; height:971px; position:absolute;top:0;}

        .wb_mp4 {background:#000}

        .wb_main {background:#020000 url(http://file3.willbes.net/new_cop/2018/05/180523_EV00_bg.jpg) no-repeat center top;}
        .wb02 {background:#0c1523 url(http://file3.willbes.net/new_cop/2017/07/EV170707_p3_bg_.jpg) no-repeat center top}

        .wb06 {background:#484c57; padding-bottom:100px; }
        .wb06 .check {width:980px; margin:0 auto; background:#484c57; padding:20px 0; font-size:120%; color:#fff; font-weight:bold}
        .wb06 .check input {border:2px solid #000; height:24px; width:24px}
        .wb06 .check a {display:inline-block; padding:10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:50px 0}
        .content_guide_wrap .guide_tit{margin-left:130px;margin-bottom:20px;font-size:160%ortant;; font-weight:bold;}
        .content_guide_wrap ul {width:960px; margin:0 auto;}
        .content_guide_wrap ul li {display:inline; float:left; width:480px}
        .content_guide_wrap ul li a {display:block; text-align:center; height:60px; line-height:60px; font-size:160%; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap ul li a:hover,
        .content_guide_wrap ul li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap ul:after {content:""; display:block; clear:both}
        .content_guide_box{width:960px; margin:0 auto; border:2px solid #202020; border-top:0; padding-top:30px}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-weight:bold; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="http://file3.willbes.net/new_cop/EV180523.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="http://file3.willbes.net/new_cop/2017/07/EV180901_p1_.png"  alt="event"  />
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb02">
            <img src="http://file3.willbes.net/new_cop/2017/07/EV180901_p3.png"  alt="공득인" />
        </div>

        <div class="evtCtnsBox wb06" id="pass">
            <img src="http://file3.willbes.net/new_cop/2017/07/EV180901_p4_1.jpg"  alt="PASS 수강료" usemap="#Map180523" border="0" />
            <map name="Map180523" id="Map180523">
                <area shape="rect" coords="295,1059,402,1097" href="javascript:go_PassLecture('149020');" alt="6개월항해술"/>
                <area shape="rect" coords="291,1106,399,1140" href="javascript:go_PassLecture('149021');" alt="6개월기관술"/>
                <area shape="rect" coords="614,1061,715,1099" href="javascript:go_PassLecture('149174');"  alt="12개월 3배수 항해술"/>
                <area shape="rect" coords="611,1102,715,1143" href="javascript:go_PassLecture('149175');"  alt="12개월 3배수 기관술"/>
                <area shape="rect" coords="927,1064,1037,1097" href="javascript:go_PassLecture('149132');"  alt="12개월 무제한 항해술"/>
                <area shape="rect" coords="931,1103,1034,1142" href="javascript:go_PassLecture('149131');" alt="12개월 무제한기관술"/>
                <area shape="rect" coords="949,1532,1059,1574" href="javascript:go_PassLecture('149063');" alt="해사법규"/>
                <area shape="rect" coords="942,1643,1052,1689" href="javascript:go_PassLecture('149064');" alt="경찰학개론"/>
                <area shape="rect" coords="942,1750,1052,1794" href="javascript:go_PassLecture('149066');" alt="해사영어"/>
                <area shape="rect" coords="941,1865,1051,1914" href="javascript:go_PassLecture('149065');" alt="항해술"/>
                <area shape="rect" coords="939,1980,1049,2028" href="javascript:go_PassLecture('149067');" alt="기관술"/>
            </map>
            <div class="check"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label><a href="#intropass">이용안내확인하기 ↓</a></div>
        </div>

        <div class="content_guide_wrap" id="intropass">
            <p class="guide_tit">PASS 이용안내 </p>
            <ul class="tabs">
                <li><a href="#tab1">해경특채 PASS 이용안내</a></li>
                <li><a href="#tab2">교수님 T-PASS 이용안내</a></li>
            </ul>
            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>선택한 PASS 상품의 표기된 기간동안 동영상 전 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>윌비스 KCG 해양경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>
                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 프리패스존으로 접속합니다.</li>
                            <li>구매하신 PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP PASS는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다. </li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</li>
                            <li>수강시작일로부터 60일 초과 또는 차감액이 결제 금액을 초과할 시 환불 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                            <li>PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-6219</p>
                    </dd>
                </dl>
            </div>
            <!--tab1//-->

            <div class="content_guide_box" id="tab2">
                <dl>
                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 과목별 강좌로 구성되어 있습니다.</li>
                            <li>선택한 T-PASS 상품의 표기된 기간 동안 동영상 전 강좌를 3배수 수강 할 수 있습니다. </li>
                            <li>윌비스해양경찰 T-PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 프리패스존으로 접속합니다.</li>
                            <li>구매하신 T-PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>T-PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>T-PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP PASS는 제공하지 않습니다.)
                            </li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>T-PASS는 교재를 별도로 구매하셔야 하며,.각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다. </li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, T-PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</li>
                            <li>수강시작일로부터 60일 초과 또는 차감액이 결제 금액을 초과할 시 환불 불가합니다.</li>
                            <li>이벤트 기간으로 제공되는 수강기간은 무료서비스이며, 환불대상이 아닙니다.</li>
                        </ol>
                    </dd>
                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                            <li>T-PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-6219</p>
                    </dd>
                </dl>
            </div>
            <!--tab2//-->
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*tab*/
        $(document).ready(function(){
            $('ul.tabs').each(function(){
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


        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/periodPackage/show/cate/3008/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>
    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        });
    </script>
@stop