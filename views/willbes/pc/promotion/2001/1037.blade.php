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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_main {background:#754c24 url(http://file3.willbes.net/new_cop/2018/08/EV180809_p1_bg.jpg) no-repeat center;}


        .wb_top {background:#f3f3f3; padding-bottom:100px;}
        .wb_top .check {width:980px; margin:0 auto; background:#f3f3f3; padding:20px 0; font-size:120%; color:#000; font-weight:bold}
        .wb_top .check input {border:2px solid #000; height:24px; width:24px; }
        .wb_top .check a {display:inline-block; padding:10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .wb_top .red {width:980px; margin:0 auto; background:#f3f3f3; padding:0 0 20px 0; font-size:120%; color:#ff0000; font-weight:bold;letter-spacing:-1px}

        .wb01 {background:#2c2c2c;}
        .wb02 {background:#f3f3f3; font-size:120%;}


        /* 이용안내 */
        .content_guide_wrap{background:#ffffff; margin:0;min-width:1210px;}
        .content_guide_box{ position:relative; width:980px; margin:0 auto; padding:50px 0;}
        .content_guide_box .guide_tit{margin-bottom:20px;}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_main" id="main">
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180809_p1.png"  alt="해양경찰 T-pass"  />
        </div>

        <div class="evtCtnsBox wb01">
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180809_p2.png"  alt="교수님+커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_top" id="pass">
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180809_p3_.jpg"  alt="T-PASS" usemap="#Map1" border="0" />
            <map name="Map1" id="Map1">
                <area shape="rect" coords="913,464,1022,504" href="javascript:go_PassLecture(1);" alt="해사법규"/>
                <area shape="rect" coords="915,574,1021,615" href="javascript:go_PassLecture(3);" alt="해사영어"/>
                <area shape="rect" coords="914,684,1020,725" href="javascript:go_PassLecture(4);" alt="항해술"/>
                <area shape="rect" coords="914,805,1020,843" href="javascript:go_PassLecture(5);" alt="기관술"/>
            </map>
            <div class="check"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label><a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a></div>
            <div class="red">※ 강의공유, 콘텐츠 부정 사용 적발 시, 평생 0원 패스의 수강기간 갱신 및 환급이 불가합니다.</div>
        </div>

        <div class="content_guide_wrap" id="tab">
            <div class="content_guide_box">
                <p class="guide_tit"> <img src="http://file3.willbes.net/new_cop/2018/02/EV170205_p4.png" alt="이용안내"> </p>
                <dl>

                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 과목별 강좌로 구성되어 있습니다.</p>
                        <p>2. 선택한 T-PASS 상품의 표기된 기간 동안 동영상 전 강좌를 3배수 수강 할 수 있습니다. </p>
                        <p>3. 윌비스해양경찰 T-PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.</p>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <p>1. 먼저 내 강의실 메뉴에서 프리패스존으로 접속합니다.</p>
                        <p>2. 구매하신 T-PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</p>
                        <p>3. T-PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</p>
                        <p>4. T-PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.</p>
                        <p class="guide_txt_01"><strong>PC+Mobile T-PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 (PMP PASS는 제공하지않습니다.)</p>
                        <p>5. PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</p>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <p> T-PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다. </p>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <p>1. 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</p>
                        <p>2. 고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, T-PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</p>
                        <p>3. 수강시작일로부터 60일 초과 또는 차감액이 결제 금액을 초과할 시 환불 불가합니다.</p>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</p>
                        <p>2. T-PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</p>
                        <p>3. 아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</p>
                        <p>4. 온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사는 혜택에서 제외됩니다.</p>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>

                </dl>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">

        function go_PassLecture(no){

            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            if(no == 1){
                lUrl = "http://www.willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=088&topMenuName=&topMenuType=O&searchCategoryCode=088&searchLeccode=Y201800008&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 2){
                lUrl = "http://www.willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=088&topMenuName=&topMenuType=O&searchCategoryCode=088&searchLeccode=Y201800009&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 3){
                lUrl = "http://www.willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=088&topMenuName=&topMenuType=O&searchCategoryCode=088&searchLeccode=Y201800011&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 4){
                lUrl = "http://www.willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=088&topMenuName=&topMenuType=O&searchCategoryCode=088&searchLeccode=Y201800010&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 5){
                lUrl = "http://www.willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=088&topMenuName=&topMenuType=O&searchCategoryCode=088&searchLeccode=Y201800012&leftMenuLType=M0001&lecKType=Y";
            }
            location.href = lUrl;
        }

        function goDesc(tab){
            location.href = '#tab';
        }
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