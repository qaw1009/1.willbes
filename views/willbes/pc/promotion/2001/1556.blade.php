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
            position:relative;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed;top:220px;right:10px;z-index:1;}
        
        .evt_top {background:#040814 url(https://static.willbes.net/public/images/promotion/2020/03/1556_top_bg.jpg) no-repeat center top; padding-bottom:150px; position:relative;}      
        .evt_top span {position:absolute; left:50%; z-index:100}
        .evt_top span.imgA {margin-left:-529px; top:1207px; -webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        .evt_top span.imgB {margin-left:321px; top:1350px; -webkit-animation:swing2 1s linear infinite;animation:swing2 1s linear infinite}
        .evt_top span.imgC {margin-left:-296px; top:309px}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            50%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }
        @@keyframes swing2{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            50%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }


        .evt_top01 {background:#4f7bf6}

        .evt05 {background:#242b35; padding-bottom:150px}
        .evt05 .passLecBuy {position:relative; width:1120px; margin:0 auto}
        .evt05 .passLecBuy ul {position:absolute; top:1250px; width:954px; left:50%; margin-left:-477px; z-index:10}
        .evt05 .passLecBuy li {display:inline; float:left; text-align:left; line-height:30px; font-size:14px; color:#000; }
        .evt05 .passLecBuy li:nth-child(1) {width:312px}
        .evt05 .passLecBuy li:nth-child(2) {width:312px}
        .evt05 .passLecBuy li:nth-child(3) {width:328px}
        .evt05 .passLecBuy li div {font-size:14px; font-weight:bold; background:#000; color:#fff; text-align:left; padding:15px; border-radius:0 10px 10px 10px; margin:0 10px}
        .evt05 .passLecBuy li:last-child div {background:#0d3692;} /*컬러변경*/
        .evt05 .passLecBuy li:last-child p {font-size:16px}
        .evt05 strong {font-family:Verdana, Geneva, sans-serif; font-size:30px}
        .evt05 .passLecBuy ul:after {content:""; display:block; clear:both}        
        .evt05 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt05 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evt05 input:checked + label {border-bottom:1px dashed #fff} /*컬러변경*/
        .evt05 .passLecBuy span {position:absolute; top:1070px; left:222px; z-index:10; font-size:16px; color:#000}
        .evt05 .passLecBuy span label {border-bottom:0}
        .evt05 .passLecBuy span input:checked + label {border-bottom:0}

        .evt05 .check {width:980px; margin:0 auto; background:#898989; padding:20px; font-size:16px; color:#fff; text-align:left; letter-spacing:-1px}
        .evt05 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt05 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}

        .evt05 .passLecbtn {width:980px; margin:0 auto; padding:40px 20px 80px; background:#898989}
        .evt05 .passLecbtn ul {border:1px solid #000; background:#fff; box-shadow: 0 5px 10px rgba(0,0,0,.5);}
        .evt05 .passLecbtn li {display:inline; float:left; width:100%; color:#000; height:80px; line-height:80px}
        .evt05 .passLecbtn li a {background:#000; color:#fff; display:block; font-size:26px;}
        .evt05 .passLecbtn li a:hover {background:#0d3692}
        .evt05 .passLecbtn span {margin-left:50px}
        .evt05 .passLecbtn ul:after {content:""; display:block; clear:both}

        .wb_cts01 {background:#fff;}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2020/03/1556_07_bg.jpg) no-repeat center top;}
        .wb_cts03 {background:#eee;}
        .wb_cts04 {background:#f3f3f3;}
        .wb_cts05 {background:#eee;}


        /* 슬라이드배너 */
        .slide_con {position:relative; width:1120px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0}
        .slide_con p.rightBtn {right:0}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

        .evt01 {padding-bottom:100px}
        .evt01 .slide_con {position:relative; width:900px; margin:0 auto}
        .evt01 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt01 .slide_con p.leftBtn {left:-80px}
        .evt01 .slide_con p.rightBtn {right:-80px}

        .evt03 {background:#576b83}
        .evt04 {background:#313131; padding-bottom:100px}
        .evt04 iframe {width:853px; height:480px}


        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:100px 0}
        .content_guide_wrap .guide_tit{width:960px;margin:0 auto; font-size:30px; margin-bottom:40px}
        .content_guide_wrap .tabs {width:960px; margin:0 auto;}
        .content_guide_wrap .tabs li {display:inline; float:left; width:25%}
        .content_guide_wrap .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box{width:960px; margin:0 auto; border:2px solid #202020; border-top:0; padding-top:30px}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-weight:bold; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px}
        .content_guide_box .step {display:inline-block; float:left; width:23%; border:1px solid #c4c4c4; margin-top:10px; margin-right:2%; text-align:center; line-height:1.2}
        .content_guide_box .step h4 {color:#fff; font-size:18px; background:#c4c4c4; padding:10px 0}
        .content_guide_box .step h5 {font-size:18px; color:#333; font-weight:bold; margin-bottom:20px}
        .content_guide_box .step div {padding:20px; min-height:200px; font-size:14px}
        .content_guide_box .step span {color:#fd4e3d; font-size:10px;}
        .content_guide_box dd:after {content:""; display:block; clear:both}

        .passMsg {width:930px; margin:0 auto 10px; border:0px solid #999; padding:10px}
        .passMsg strong {position:absolute; font-size:16px !important; color:#008bc2; display:inline; border-right:1px solid #008bc2; padding-right:10px; line-height:30px; line-height:30px; z-index:10;}
        .passMsg ul {width:800px; margin-left:250px; height:30px;}
        .passMsg li,
        .passMsg li span {font-size:12px}
        .passMsg li span {color:#fff !important; margin-right:10px;}
        .passMsg li {height:30px; line-height:30px; overflow:hidden; text-align:left;}

        .passMsg .bx-pager{display:none}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:12px; color:#999;margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul:after {content:""; display:block; clear:both}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            background-color: #fff;
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        {{--
        <ul class="skybanner">
            <li>
                <a href="#event">
                    <img src="https://static.willbes.net/public/images/promotion/2020/01/1009_sky.png" alt="pass구매하기">
                </a>
            </li>
        </ul> 
        --}}

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>윌비스신광은경찰 PASS</span><br />
                        <span style="line-height:40px;font-size:22pt;color:#000">{{$arr_promotion_params['turn']}}기</span>
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
                        <a href="#pass" target="_self">수강하기 &gt;</a><br />
                        <span style="line-height:40px;">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 24:00 마감!</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_top.jpg"  alt="PASS"/>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/8hB3UhcoihY?rel=0" frameborder="0" allowfullscreen class="mt30"></iframe>
            <span class="imgA"><img src="https://static.willbes.net/public/images/promotion/2020/01/1009_top_img1.png"  alt="PASS"/></span>
            <span class="imgB"><img src="https://static.willbes.net/public/images/promotion/2020/01/1009_top_img2.png"  alt="PASS"/></span>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01.jpg"  alt=""/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01_txt01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01_txt02.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01_txt03.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01_txt04.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01_txt05.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01_txt06.png" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_01_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/03//1556_01_arrowR.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_02.jpg"  alt="" usemap="#Map190911" border="0"/>
            <map name="Map190911" id="Map190911">
                <area shape="rect" coords="416,284,706,338" href="https://police.willbes.net/promotion/index/cate/3001/code/1022" target="_blank" alt="적중내역보기" />
            </map>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_04.gif"  alt="열공지원" />
            <iframe width="853" height="480" src="https://www.youtube.com/embed/4947Jur0ZP4?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox evt05" id="pass">
            <div class="passLecBuy">
                <ul>
                    <li>
                        <div>
                        <strong>69</strong>만원<br>
                        <input type="radio" id="y_pkg1" name="y_pkg" value="162531" onClick=""/> <label for="y_pkg1">6개월 패스</label>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>89</strong>만원<br>
                            <input type="radio" id="y_pkg4_1" name="y_pkg" value="162534" onClick=""/> <label for="y_pkg4_1">12개월 패스</label>                           
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>115</strong>만원<br>
                            <input type="radio" id="y_pkg3_1" name="y_pkg" value="163814" onClick=""/> <label for="y_pkg3_1">18개월 패스</label>                           
                        </div>
                    </li>
                </ul>
                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_05.jpg"  alt="신광은경찰PASS 수강료" usemap="#Map1009A" id="event">
                    <map name="Map1009A" id="Map1009A">
                        <area shape="rect" coords="853,620,1034,686" href="javascript:go_popup()" alt="교수진보기" />
                        <area shape="rect" coords="375,493,552,533" href="javascript:certOpen();" alt="환승이벤트 참여하기" />
                        <area shape="rect" coords="566,492,742,535" href="javascript:goDesc('tab4')" alt="환승이벤트 참여방법" />
                    </map>
                </div>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_05_01.jpg"  alt="추가특전"/>
                </div>
            </div>

            <!--레이어팝업-->
            <div id="popup" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1009_pop01.jpg" />
                </div>
            </div>

            <div id="popup1" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1009_pop01.jpg" />
                </div>
            </div>

            <div class="check">
                <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br />
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.
                </p>
            </div>

            <div class="passLecbtn NGEB">
                <ul>
                    <li><a href="#none" onclick="goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">신광은경찰 PASS 신청하기 ☞</a></li>
                </ul>
            </div>
        </div>
        <!-- wb_top//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_06.jpg"  alt="신광은경찰팀 교수진" />
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_06_01.jpg" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_06_02.jpg" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_06_03.jpg" alt="3" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/03/1556_p_next.png"></a></p>
            </div>
        </div>


        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_07.jpg"  alt="영향력있는 언론이 먼저 찾는 윌비스 신광은경찰팀" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_08.jpg"  alt="맞춤커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_09.jpg"  alt="밀착관리 단계별 합격 프로그램" />
        </div>

        <div class="evtCtnsBox wb_cts05">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_09_01.jpg"  alt="왕초보영어탑재" /><br />
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1556_09_03.jpg"  alt="많은 수험생들의 꿈을 현실로 만드는 신광은 경찰팀" />
        </div>

        <div class="content_guide_wrap" id="tab">
            <p class="guide_tit NSK-Thin">윌비스 <strong class="NSK-Black">신광은 경찰 PASS</strong> 이용안내</p>
            <ul class="tabs">
                <li><a href="#tab1">6개월 PASS</a></li>
                <li><a href="#tab2">12개월 PASS</a></li>
                <li><a href="#tab3">18개월 0원 PASS</a></li>
                <li><a href="#tab4">합격 환승 이벤트</a></li>
            </ul>

            <!--8개월-->
            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>6개월 상품구성</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 <span class="tx-red">2배수</span> 수강 할 수 있습니다.</li>
                            <li>2배수 수강 후에는 수강이 불가합니다. ( <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.(결제완료자에 한함)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 신광은경찰PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰PASS 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>신광은경찰PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile 신광은경찰PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP 신광은경찰PASS는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.(무한PASS존 등록기기정보 확인)</li>
                            <li>일부 강좌 자료 출력 횟수 제한 적용됩니다.(2단계 동형모의고사, 3단계 파이널 모의고사 강좌등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은경찰PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및  [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>                 

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로  간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</li>
                            <li>차감액이 결제 금액을 초과할 시 환불 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                            <li>온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘)는 혜택에서 제외됩니다.</li>
                            <li>온.오프라인 동시 시행되는 이벤트, 무료특강의 경우 해당강좌는 미지급되거나 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                        </ol>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>

            <!--14개월-->
            <div class="content_guide_box" id="tab2">
                <dl>
                    <dt>
                        <h3>12개월 상품구성</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.(결제완료자에 한함)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 신광은경찰PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰PASS 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>신광은경찰PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile 신광은경찰PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP 신광은경찰PASS는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.(무한PASS존 등록기기정보 확인)</li>
                            <li>일부 강좌 자료 출력 횟수 제한 적용됩니다.(2단계 동형모의고사, 3단계 파이널 모의고사 강좌등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은경찰PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및  [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>                  

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로  간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</li>
                            <li>차감액이 결제 금액을 초과할 시 환불 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                            <li>온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘)는 혜택에서 제외됩니다.</li>
                            <li>온.오프라인 동시 시행되는 이벤트, 무료특강의 경우 해당강좌는 미지급되거나 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                        </ol>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>


            <!--0원PASS-->
            <div class="content_guide_box" id="tab3">
                <dl>
                    <dt>
                        <h3>18개월 상품설명</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>18개월 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.(결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            <li>모든 제출 서류는 반드시 윌비스 신광은경찰 아이디 본인 명의이여야 합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>상품설명: 환급안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>환급 요청시에는 최종합격 인증 자료 및 추가 자료 제출이 완료 된 회원에게 환급급이 지급됩니다.  (수강기간이 남아 있지 않은 회원은 환급 불가합니다.)
</li>
                            <li>환급시 상품 결제금액에서 제세공과금 22% 제외 후 환급됩니다. </li> 
                            &nbsp;&nbsp;&nbsp;&nbsp;- 포인트가 지급된 경우에는 실결제 금액에서 포인트 금액을 차감 후 제세공과금 22%를 공제한 금액으로 환급됩니다. <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;- 교재 및 부가 제공된 혜택에 따라서 추가 차감 후 환급됩니다.
                            <li>최종합격자 발표일로부터 3개월 경과 후 요청 시에는 환급이 불가합니다. (수강기간이 남아있지 않은 상태에서 환급 신청은 환급신청 불가합니다.)<br />
                                수강기간이 최종합격자 발표일로부터 3개월 이내에 종료될 시에는 인증기한은 수강기간일 마지막 일 까지 입니다. 
                            </li>
                            <li>패스 수강기간 내에 합격예측 서비스 1회 이상 참여해주셔야 합니다. (해당 서비스는 시즌성 이벤트로 일정 시험에 확인이 불가하니, 참여 후 캡쳐해서 저장해 놓으셔야 합니다.)</li>
                            <li>패스 수강기간 내에 모의고사를 1회 이상 응시하여야 합니다.(온/오프 무관하며, 추후 응시내역 파일 첨부 제출해 주셔야 합니다.)</li>
                            <li>모든 제출 서류는 반드시 윌비스 신광은경찰 아이디 본인 명의이여야 합니다.</li>
                            <li>환급은 순경일반공채,경행,전의경경채,101경비단만 적용됩니다 (기타 직렬및경력채용은 환급대상에 포함되지 않습니다)</li>
                            <li>환급금 수령 후 패스 잔여 수강기간에 관계없이 수강 종료됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 신광은경찰PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰PASS 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>신광은경찰PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile 신광은경찰PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP 신광은경찰PASS는 제공하지 않습니다.)
                            </li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.(무한PASS존 등록기기정보 확인)</li>
                            <li>일부 강좌 자료 출력 횟수 제한 적용됩니다.(2단계 동형모의고사, 3단계 파이널 모의고사 강좌등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은경찰PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다. </li>
                        </ol>
                    </dd>                  

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</li>
                            <li>수강시작일로부터 60일 초과 또는 차감액이 결제 금액을 초과할 시 환불 불가합니다.</li>
                        </ol>
                    </dd>
                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                            <li>온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘)는 혜택에서 제외됩니다.</li>
                            <li>온.오프라인 동시 시행되는 이벤트, 무료특강의 경우 해당강좌는 미지급되거나 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>


            <!--환승이벤트-->
            <div class="content_guide_box" id="tab4">
                <dl>
                    <dt>
                        <h3>이벤트 참여방법 안내</h3>
                    </dt>
                    <dd>
                        <div class="step">
                            <h4>STEP 1</h4>
                            <div>
                                <h5>합격 환승이벤트<br>
                                참여하기</h5>
                                로그인후<br>
                                <strong>타사 수강생 인증</strong><br>
                                버튼 클릭 <br>
                                <br>
                                온/오프라인수강이력
                            </div>                            
                        </div>
                        <div class="step">
                            <h4>STEP 2</h4>
                            <div>
                                <h5>수강이력 캡쳐<br>
                                이미지 첨부</h5>
                                타사 사이트에서<br>
                                수강이력을 확인 할 수<br>
                                있는 화면 캡쳐<br>
                                <br>
                                <span>* PASS 수강이력(단과강의 제외)</span>
                            </div>                            
                        </div>
                        <div class="step">
                            <h4>STEP 3</h4>
                            <div>
                                <h5>관리자 인증</h5>
                                관리자 인증 완료 시<br>
                                수강생 휴대폰으로<br>
                                SMS 개별알림
                            </div>                            
                        </div>
                        <div class="step">
                            <h4>STEP 4</h4>
                            <div>
                                <h5>PASS 구매</h5>
                                합격 환승 회원<br>
                                전용 쿠폰으로<br>
                                PASS 구매
                            </div>                            
                        </div>
                    </dd>

                    <dt>
                        <h3>혜택적용안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>환승 인증완료 시, 쿠폰 즉시 발급 (내강의실 쿠폰함)</li>
                            <li>쿠폰 사용기간: 발급일로부터 3일, 일반/경행 PASS 구매시에 사용가능</li>                            
                        </ol>
                    </dd>

                    <dt>
                        <h3>주의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>ID당 1회만 참여 가능합니다.</li>
                            <li>인증 완료 처리는 신청 후, 24시간 이내에 처리 됩니다.<br/>
                            단, 주말 및 공휴일 인증건의 경우, 휴일 다음 날 22시 이전에 일괄 처리 됩니다.</li>
                            <li>정확하게 본인의 이름, 수강중인 강좌 수강내역, 결제내역을 캡쳐하여 업로드 해주셔야 인증이 완료됩니다.(경찰직렬에 한함)<br/>
                            (결제내역 인증 시, 수강자 이름과 결제 금액, 강좌명이 보여야 합니다.)</li>
                            <li>유료단과, 무료강의 및 0원 수강이력, PASS 수강종료 6개월이 넘은 경우는 환승제외 대상입니다.</li>
                            <li>2019. 12 이후 구입한 상품은 적용되지 않습니다.</li>
                            <li>본 이벤트는 이벤트에 참여한 당사자가 결제한 상품에 한합니다.<br/>
                            수강 내역 확인이 어려운 증빙서류를 첨부하거나 부정한 방법으로 이벤트에 참여 했을 경우 별도 통보 없이<br/>
                            즉시 제공된 혜택 회수 및 환불조치 됩니다.</li>
                            <li>본 혜택은 강좌에 한하며, 교재는 별도 구매 하셔야 합니다.</li>
                            <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                            <li>발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>

        </div>
        <!-- content_guide_wrap //-->
    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
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

        /*tab*/
        $(document).ready(function(){
            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });

            var url = window.location.href;
            if(url.indexOf("tab4") > -1){
                var activeTab = "#tab4";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab4']").addClass("active");
                $(".tabContents").hide();
                $(activeTab).show();
                return false;
            }else{
                $(".tabs li a").removeClass("active");
                $(".tabs li a[href='#tab1']").addClass("active");
                $(".content_guide_box").hide();
                $(".content_guide_box:first").show();
            }
        });

        function goDesc(tab){
            location.href = '#tab';
            var activeTab = "#"+tab;
            $(".tabs li a").removeClass("active");
            $(".tabs li a[href='#"+tab+"']").addClass("active");
            $(".content_guide_box").hide();
            $(activeTab).show();
        }

        /*레이어팝업*/
        function go_popup() {
            $('#popup').bPopup();
        }

        function go_popup1() {
            $('#popup1').bPopup();
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop 