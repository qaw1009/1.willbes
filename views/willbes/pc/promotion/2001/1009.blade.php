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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_pop2 {background:#252525 url(https://static.willbes.net/public/images/promotion/zeropass/1009_top_bg.jpg) no-repeat center top}

        .wb_pop3 {background:#1e1e1e url(https://static.willbes.net/public/images/promotion/zeropass/EV_on_pass_20181214_02_bg.jpg) no-repeat center top}

        .wb_top {background:#282828; padding-bottom:120px}
        .wb_top .passLecBuy {position:relative; width:1210px; margin:0 auto}
        .wb_top .passLecBuy ul {position:absolute; bottom:340px; left:128px; z-index:10}
        .wb_top .passLecBuy li {display:inline; float:left; text-align:left; line-height:30px; font-size:16px; color:#000; padding-left:30px}
        .wb_top .passLecBuy li h5 {font-size:20px; font-weight:600; margin-top:10px}
        .wb_top .passLecBuy li:nth-child(1) {width:232px}
        .wb_top .passLecBuy li:nth-child(2) {width:232px; padding-left:60px}
        .wb_top .passLecBuy li:nth-child(3) {width:400px; padding-left:140px}
        .wb_top .passLecBuy li div {margin:30px 0 0 0; font-size:20px; font-weight:bold; background:#000; color:#fff; text-align:center; padding:16px 0; border-radius:0 40px 40px 40px}
        .wb_top .passLecBuy li:last-child div {background:#96232c;} /*평생0원PASS가격배경컬러변경*/
        .wb_top .passLecBuy li:last-child p {font-weight:bold; font-size:20px}
        .wb_top strong {font-family:Verdana, Geneva, sans-serif; font-size:30px}
        .wb_top .passLecBuy ul:after {content:""; display:block; clear:both}
        .wb_top input[type="checkbox"] {height:20px; width:20px;}
        .wb_top label {border-bottom:1px dashed #000}
        .wb_top input[type="checkbox"]:checked+label {color:#676ef3; border-bottom:1px dashed #676ef3}
        .wb_top .check input[type="checkbox"]:checked+label {color:#000; border-bottom:1px dashed #000}
        .wb_top .passLecBuy span {position:absolute; top:1130px; left:222px; z-index:10; font-size:16px; color:#000}
        .wb_top .passLecBuy span label {border-bottom:0}
        .wb_top .passLecBuy span input[type="checkbox"]:checked+label {color:#009ef5; border-bottom:0}

        .wb_top .check {width:980px; margin:0 auto; background:#898989; padding:20px; font-size:16px; color:#fff; text-align:left; letter-spacing:-1px}
        .wb_top .check a {display:inline-block; padding:5px 10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .wb_top .check p {font-size:12px; padding:10px 0 0 20px; line-height:1.4}

        .wb_top .passLecbtn {width:980px; margin:0 auto; padding:40px 20px; background:#898989}
        .wb_top .passLecbtn ul {border:1px solid #000; background:#fff; box-shadow: 0 5px 10px rgba(0,0,0,.5);}
        .wb_top .passLecbtn li {display:inline; float:left; width:100%; color:#000; font-size:20px; height:80px; line-height:80px}
        .wb_top .passLecbtn li a {background:#000; color:#fff; display:block}
        .wb_top .passLecbtn li a:hover {background:#06C}
        .wb_top .passLecbtn span {margin-left:50px}
        .wb_top .passLecbtn ul:after {content:""; display:block; clear:both}

        .wb_new {background:#baadff; height:200px}
        .wb_cts01 {background:#fff;}
        .wb_cts02 {background:#252424 url(http://file3.willbes.net/new_cop/2018/02/EV180201_p3_bg.jpg) no-repeat center top;}
        .wb_cts03 {background:#eee;}
        .wb_cts04 {background:#f3f3f3;}
        .wb_cts05 {background:#eee;}
        .wb_cts06 {background:#c4c4c4;}


        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-50px}
        .slide_con p.rightBtn {right:-50px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:50px 0}
        .content_guide_wrap .guide_tit{width:1210px;margin:0 auto;text-align:center; }
        .content_guide_wrap .tabs {width:960px; margin:0 auto;}
        .content_guide_wrap .tabs li {display:inline; float:left; width:320px}
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
        .Pstyle .content {height:auto; width:auto;}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>윌비스신광은경찰 PASS</span><br />
                        <span style="line-height:40px;font-size:22pt;color:#000">2019-74기</span>
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
                        <span style="line-height:40px;">4.23(화) 24:00 마감!</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--타이머//-->

        <div class="evtCtnsBox wb_pop2" id="main">
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_top.jpg"  alt="평생0원 PASS" usemap="#rebound"/>
            <map name="rebound" id="rebound">
                <area shape="rect" coords="370,1172,545,1215" href="javascript:certOpen();" alt="수강생인증"/>
                <area shape="rect" coords="567,1171,742,1214" href="javascript:goDesc('tab3')" alt="이용안내"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_pop3">
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_01.png"  alt="열공지원" />
        </div>

        <div class="evtCtnsBox wb_top" id="pass">
            <div class="passLecBuy">
                <ul>
                    <li>
                        <h5>일반</h5>
                        <p><input type="radio" id="y_pkg1" name="y_pkg" value="152010" onClick=""/> <label for="y_pkg1">(선택) 오태진 한국사</label></p>
                        <p><input type="radio" id="y_pkg2" name="y_pkg" value="152009" onClick=""/> <label for="y_pkg2">(선택) 원유철 한국사</label></p>
                        <h5>특채</h5>
                        <p><input type="radio" id="y_pkg3" name="y_pkg" value="149193" onClick=""/> <label for="y_pkg3">경행경채</label></p>
                        <div><strong>61</strong>만원</div>
                    </li>
                    <li>
                        <h5>일반</h5>
                        <p><input type="radio" id="y_pkg4" name="y_pkg" value="152007" onClick=""/> <label for="y_pkg4">(선택) 오태진 한국사</label></p>
                        <p><input type="radio" id="y_pkg5" name="y_pkg" value="152008" onClick=""/> <label for="y_pkg5">(선택) 원유철 한국사</label></p>
                        <h5>특채</h5>
                        <p><input type="radio" id="y_pkg6" name="y_pkg" value="149195" onClick=""/> <label for="y_pkg6">경행경채</label></p>
                        <div><strong>73</strong>만원</div>
                    </li>
                    <li>
                        <h5>&nbsp;</h5>
                        <h5>&nbsp;</h5>
                        <p>&nbsp;</p>
                        <p><input type="radio" id="y_pkg7" name="y_pkg" value="149107" onClick=""/> <label for="y_pkg7">일반</label></p>
                        <p><input type="radio" id="y_pkg8" name="y_pkg" value="149108" onClick=""/> <label for="y_pkg8">특채 경행경채</label></p>
                        <div><strong>143</strong>만원</div>
                    </li>
                </ul>
                <span style="color:#fff">
                    <label for="j_pkg">PASS 구매 시 할인 쿠폰이 자동 지급 됩니다.</label>
                </span>
                <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_03_01.jpg"  alt="신광은경찰PASS 수강료" usemap="#Map190123"><br />
                <map name="Map190123" id="Map190123">
                    <area shape="rect" coords="178,546,243,565" href="javascript:go_popup()" alt="6개월과목" />
                    <area shape="rect" coords="439,545,502,564" href="javascript:go_popup()" alt="12개월과목" />
                    <area shape="rect" coords="733,546,794,565" href="javascript:go_popup1()" alt="평생목팝업" />
                </map> 
                <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_03_02.jpg"  alt="체력" usemap="#Map190117A"/>                
                <map name="Map190117A" id="Map190117A">
                    <area shape="rect" coords="656,183,776,227" href="{{ site_url('promotion/index/cate/3001/code/1030') }}" target="_blank" alt="경찰체력패키지" />
                </map>                               
            </div>

            <!--레이어팝업-->
            <div id="popup" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_pop01.jpg" />
                </div>
            </div>

            <div id="popup1" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_pop02.jpg" />
                </div>
            </div>

            <div class="check">
                <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="z1">페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정 사용 적발 시, 평생 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br />
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                    ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.
                </p>
            </div>

            <div class="passLecbtn">
                <ul>
                    <!--li><div id="sum_y">합계 <span><strong>0</strong>원</span></div></li-->
                    <li><a href="#none" onclick="goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">신광은경찰 PASS 신청하기 ☞</a></li>
                </ul>
            </div>

            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_03_03.jpg"  alt="추가특전" />
        </div>
        <!-- wb_top//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_04.jpg"  alt="신광은경찰팀 교수진" />
        </div>


        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_05.jpg"  alt="영향력있는 언론이 먼저 찾는 윌비스 신광은경찰팀" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_06.jpg"  alt="맞춤커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_07.jpg"  alt="밀착관리 단계별 합격 프로그램" />
        </div>

        <div class="evtCtnsBox wb_cts05">
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_08_01.jpg"  alt="왕초보영어탑재" /><br />
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_08_02.jpg"  alt="경찰체력" usemap="#Map190117B" border="0" />
            <map name="Map190117B" id="Map190117B">
                <area shape="rect" coords="554,583,676,626" href="{{ site_url('promotion/index/cate/3001/code/1030') }}" target="_blank" alt="경찰체력 상세보기" />
            </map>
            <br />
            <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_08_03.jpg"  alt="많은 수험생들의 꿈을 현실로 만드는 신광은 경찰팀" />
        </div>

        <div class="content_guide_wrap" id="tab">
            <p class="guide_tit"><img src="https://static.willbes.net/public/images/promotion/zeropass/1009_09.jpg" alt="신광은경찰 PASS 이용안내"> </p>
            <ul class="tabs">
                <li><a href="#tab1">6,12개월 PASS</a></li>
                <li><a href="#tab2">평생 0원 PASS</a></li>
                <li><a href="#tab3">합격 환승 이벤트</a></li>
            </ul>

            <!--6,12개월-->
            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 일반경찰/경행경채로 구분하여 강좌를 선택하여야 됩니다.</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 전 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>일반경찰 PASS의 경우 한국사과목은 교수님을 1분 선택하여야 합니다.(변경불가)</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 프리패스존으로 접속합니다.</li>
                            <li>구매하신 신광은경찰PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰PASS 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>신광은경찰PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile 신광은경찰PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP 신광은경찰PASS는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
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
                        <h3>체력동영상 수강안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>체력 강좌 별 수강 기간은 구매한 패스의 수강기간과 동일한 상품으로 구매가능합니다(단, 평생 0원은 12개월 체력 구매 가능)</li>
                            <li>체력 동영상 강좌는 매년 차수마다 업데이트 예정이오나, 제휴 등 사정에 따라 신규 강좌 업데이트가 불가할 수 있습니다.</li>
                            <li>결제 완료 즉시 수강가능하며, 재수강, 일시정지,연장 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로  간주됩니다.</li>
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
                            <li>온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사(올빼미, 옹달샘)는 혜택에서 제외됩니다.</li>
                            <li>온.오프라인 동시 시행되는 이벤트, 무료특강의 경우 해당강좌는 미지급되거나 이벤트 종료 후 제공될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>
            <!--6,12개월//-->

            <!--평생0원PASS-->
            <div class="content_guide_box" id="tab2">
                <dl>
                    <dt>
                        <h3>상품설명: 갱신안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>평생PASS는 갱신형 상품이며, 일반경찰/경행경채로 구분되는 상품입니다.<br />
                                시험 응시 후 불합격 인증하여야 수강기간이 갱신됩니다. 갱신시 다음 시험까지 무료 연장됩니다.
                            </li>
                            <li>수강기간 갱신이 필요한 경우 불합격 증빙(응시표, 성적표)자료를 제출하셔야 합니다.</li>
                            <li>불합격 인증시에 전과목 0점일 경우 수강기간 갱신은 불가능합니다.</li>
                            <li>시험 접수 후 개인사정으로 시험에 응시하지 못한 경우 수강기간 갱신 불가합니다.</li>
                            <li>수강기간 갱신(연장) 신청은 매회 시험 최종합격자 발표 후 1개월이내에 연장 신청가능하며, 별도공지 및 문자 안내할 예정입니다.</li>
                            <li>갱신 가능 직렬은 순경 채용에 한합니다.(승진,해경제외)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>상품설명: 환급안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>환급시 상품 결제금액에서 제세공과금 22% 제외 후 환급됩니다.(포인트가 지급된 경우에는 실결제 금액에서 포인트 금액을 차감 후 제세공과금 22%를 공제한 금액으로 환급됩니다.) </li>
                            <li>구매 후 유료 수강기간인 12개월 이내에 최종 합격 및 인증 자료를 제출하여야 환급금 지급 대상이 됩니다.<br />
                                (12개월 이내에만 가능하며, 무료 수강기간 연장은 최종합격 인증 기간과 관련이 없습니다.)
                            </li>
                            <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 3개월 이내에만 가능합니다. <br />
                                최종합격자 발표일로부터 3개월 경과 후 요청 시에는 환급이 불가합니다.<br />
                                유료 수강기간(12개월)이 최종합격자 발표일로부터 3개월 이내에 종료될 시에는 인증기한은 수강기간일 마지막 일 까지 입니다.
                            </li>
                            <li>교재비는 환급 대상이 아닙니다. </li>
                            <li>패스 수강기간 내에 합격예측 서비스 1회 이상 참여해주셔야 합니다. (해당 서비스는 시즌성 이벤트로 일정 시험에 확인이 불가하니, 참여 후 캡쳐해서 저장해 놓으셔야 합니다.)</li>
                            <li>패스 수강기간 내에 모의고사를 1회 이상 응시하여야 합니다.(온/오프 무관하며, 추후 응시내역 파일 첨부 제출해 주셔야 합니다.)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>상품설명: 포인트안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>별도 제공되는 20만 포인트는 결제일로부터 1년 이내 사용 가능하며, 해당 기간내 사용하지 않을 경우 자동 소멸됩니다.</li>
                            <li>환불 시 사용한 포인트 금액만큼 차감 후 환불이 진행되며 남은 포인트는 회수됩니다.</li>
                            <li>포인트를 사용하여 구매한 교재는 환불 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강기간</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>구매일로부터 12개월(365일)간 유료 수강 가능하며, 합격 할 때 까지 무료 무제한 수강할 수 있습니다. </li>
                            <li>갱신되어 제공되는 기간의 강의는 무료서비스이며, 환불대상이 아닙니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 프리패스존으로 접속합니다.</li>
                            <li>구매하신 신광은경찰평생PASS 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰평생PASS 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>신광은경찰평생PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile 신광은경찰평생PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP 신광은경찰PASS는 제공하지 않습니다.)
                            </li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은경찰평생PASS는 교재를 별도로 구매하셔야 하며,.각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다. </li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>체력동영상 수강안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>체력 강좌 별 수강 기간은 구매한 패스의 수강기간과 동일한 상품으로 구매가능합니다(단, 평생 0원은 12개월 체력 구매 가능)</li>
                            <li>체력 동영상 강좌는 매년 차수마다 업데이트 예정이오나, 제휴 등 사정에 따라 신규 강좌 업데이트가 불가할 수 있습니다.</li>
                            <li>결제 완료 즉시 수강가능하며, 재수강, 일시정지,연장 불가합니다.</li>
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
                            <li>온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사(올빼미, 옹달샘)는 혜택에서 제외됩니다.</li>
                            <li>온.오프라인 동시 시행되는 이벤트, 무료특강의 경우 해당강좌는 미지급되거나 이벤트 종료 후 제공될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>
            <!--평생0원PASS//-->

            <!--환승이벤트-->
            <div class="content_guide_box" id="tab3">
                <dl>
                    <dt>
                        <img src="https://static.willbes.net/public/images/promotion/zeropass/1009_09_01.jpg">
                    </dt>
                </dl>
            </div>
            <!--환승이벤트//-->
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

        /*타이머*/
        var DdayDiff = { //타이머를 설정합니다.
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },

            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },

            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },

            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        function daycountDown() {
            // 한달 전 날짜로 셋팅
            var event_day = new Date(2019,3,23,23,59,59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));

            var Monthleft = event_day.getMonth() - now.getMonth();
            var Dateleft = DdayDiff.inDays(now, event_day);
            var Hourleft = timeGap.getHours();
            var Minuteleft = timeGap.getMinutes();
            var Secondleft = timeGap.getSeconds();

            if((event_day.getTime() - now.getTime()) > 0) {
                $("#dd1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft/10) + ".png");
                $("#dd2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft%10) + ".png");

                $("#hh1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft/10) + ".png");
                $("#hh2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft%10) + ".png");

                $("#mm1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft/10) + ".png");
                $("#mm2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft%10) + ".png");

                $("#ss1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft/10) + ".png");
                $("#ss2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft%10) + ".png");
                setTimeout(daycountDown, 1000);
            }
            else{
                $("#newTopDday").hide();
            }

        }
        daycountDown();

        /*레이어팝업*/
        function go_popup() {
            $('#popup').bPopup();
        }

        function go_popup1() {
            $('#popup1').bPopup();
        }
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop