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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#575787 url(https://static.willbes.net/public/images/promotion/2020/02/1536_top_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#fff;}
        .wb_cts02 {background:#435165; padding-bottom:100px;}
        .wb_cts03 {background:#fff; padding-bottom:100px;}
        .wb_cts03 ul{width:100%; margin:0 auto; max-width:980px}
        .wb_cts03 div {width:932px; margin:0 auto; background:#fff; border:24px solid #f4f4f4; padding:20px 0}
        .wb_cts03 table {width:95%; margin:0 auto}
        .wb_cts03 td {font-size:18px; padding:10px 15px; border-bottom:1px solid #EBEBEB; color:#666;font-weight:bold;line-height:35px;}
        .wb_cts03 div a {display:block; background:#000; color:#fff; padding:5px 10px; font-size:90%}
        .wb_cts03 div tr:hover td {color:#000}
        .wb_cts03 div a:hover {background:#c83438; color:#fff}

        .wb_cts04 {background:#ececec;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-30px; top:50%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-35px;top:50%; width:67px; height:67px;}

        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

        /* 탭 */
        .tabContaier{width:100%; text-align:center;}
        .tabContaier ul {width:100%; max-width:980px; text-align:center; margin:0 auto  }
        .tabContaier li {display:inline; float:left; }
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}

        .content_guide_wrap{min-width:1210px; margin:0 auto 50px; font-size:12px}
        .content_guide_box{ position:relative; width:980px; margin:0 auto; padding:0 0 50px 0;}
        .content_guide_box .guide_tit{margin-bottom:20px;}
        .content_guide_box dl{ margin:0 ; word-break:keep-all;border:2px solid #e0e0e0;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:14px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}

        .skybanner {position:fixed;top:250px;right:10px;width:170px;z-index:1;}       

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <div><a href="javascript:certOpen();"><img src="https://static.willbes.net/public/images/promotion/2020/02/1536_sky01.png" alt="현직경찰 인증하기"></a></div>
            <div style="margin-top:15px;"><a href="#go"><img src="https://static.willbes.net/public/images/promotion/2020/02/1536_sky02.png" alt="프리패스 구매하기"></a></div>
        </div>

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1536_top.jpg" alt="경찰승진 패스" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1536_01.jpg" alt="경찰승진시험 변경" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1536_02.jpg" alt="경찰승진 지금 시작할때" />
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1536_02_01.png" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1536_02_02.png" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1536_02_03.png" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1536_02_04.png" alt="4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1536_02_05.png" alt="5" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/03/EV170306_p_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03 NSK" id="go">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1536_03_01.jpg"  alt="계급별"/>
            <div>
                <table cellspacing="0" cellpadding="0">
                    <col />
                    <col width="15%"/>
                    <tr>
                        <td class="tx-left">【경장,경사,경위 승진대비】<br>&nbsp; 2021 신광은 형소법 &amp; 김원욱 형법 PASS</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/161785') }}" target="_blink">수강신청   ></a></td>
                    </tr>
                    <tr>
                        <td class="tx-left">【경장,경사,경위 승진대비】<br>&nbsp; 2021 신광은 형소법 &amp; 김원욱 형법 PASS &amp; 송광호 실무종합</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/161786') }}" target="_blink">수강신청   ></a></td>
                    </tr>
                    <tr>
                        <td class="tx-left">【경장,경사,경위 승진대비】<br>&nbsp; 2021 신광은 형소법 &amp; 김원욱 형법 PASS &amp; 오현웅 실무종합</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/161795') }}" target="_blink">수강신청   ></a></td>
                    </tr>
                </table>
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2020/02/1536_03_02.jpg"  alt="교수별" />

            <div>
                <table cellspacing="0" cellpadding="0">
                    <col />
                    <col width="15%"/>
                    <tr>
                        <td class="tx-left">【2021 승진대비 형소법 12개월 동영상 PASS】&nbsp;&nbsp;&nbsp;&nbsp; 신광은 교수</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/161776') }}" target="_blink">수강신청   ></a></td>
                    </tr>
                    <tr>
                        <td class="tx-left">【2021 승진대비 형법 12개월 동영상 PASS】&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 김원욱 교수</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/161778') }}" target="_blink">수강신청   ></a></td>
                    </tr>
                    <tr>
                        <td class="tx-left">【2021 승진대비 실무종합 12개월 동영상 PASS】 송광호 교수</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/161782') }}" target="_blink">수강신청   ></a></td>
                    </tr>
                    <tr>
                        <td class="tx-left">【2021 승진대비 실무종합 12개월 동영상 PASS】 오현웅 교수</td>
                        <td><a href="{{ site_url('/periodPackage/show/cate/3006/pack/648001/prod-code/161784') }}" target="_blink">수강신청   ></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_p5.png"  alt="인증방법"  />
        </div>

        <div class="content_guide_wrap NG">
            <div class="content_guide_box">
                <p class="guide_tit"> <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_p6.png" alt="이용안내"> </p>
                <dl>
                    <dt>
                        <h3>상품안내</h3>
                    </dt>
                    <dd>
                        <p>승진PASS는 현직경찰 인증이 완료 된 후 관련 PASS 수강신청이 가능합니다. 상품 구매전 상단 현직경찰 인증하기를 진행해주세요.</p>
                    </dd>
                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 2021년 승진시험대비로 계급별 , 교수님별 강좌로 제공합니다.</p>
                        <p>2. 수강기간은 상품에 표시된 기간에 따라 구매일로부터 365일 제공되며 결제가 완료되는 즉시 수강 가능합니다.</p>
                        <p>3. 일부강좌는 경찰채용(일반공채)강좌와 동일한 강좌로 구성될 수있습니다.</p>
                        <p>4. 실무종합 강의일정은 2020년 5월 또는 6월 따로 공지됩니다.</p>
                        <p>5. 승진PASS는 강의 변경 불가 상품입니다.</p>                          
                    </dd>
                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <p>1. 먼저 내 강의실 메뉴에서 프리패스존로 접속합니다.</p>
                        <p>2. 구매하신 경찰승진PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후  수강하실 수 있습니다.</p>
                        <p>3. 경찰승진PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</p>
                        <p>4. 경찰승진PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.</p>
                        <p class="guide_txt_01"><strong>PC+Mobile 경찰승진PASS 수강 시</strong> : PC 2대 또는 PC 1대 + 모바일 1대 또는 모바일2대 (PMP 경찰승진PASS는 제공하지 않습니다.)</p>
                        <p>5. PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</p>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <p>경찰승진PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및  [교재구매] 메뉴에서 별도 구매 가능합니다. </p>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <p>1. 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</p>
                        <p>2. 고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.<br>&nbsp;&nbsp;&nbsp;&nbsp;(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</p>
                        <p>3. 차감액이 결제 금액을 초과할 시 환불 불가합니다.</p>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</p>
                        <p>2. 경찰승진PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</p>
                        <p>3. 아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</p>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
             @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>
@stop