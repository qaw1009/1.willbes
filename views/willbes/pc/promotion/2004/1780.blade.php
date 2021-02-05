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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:214px;
            text-align:center;
            z-index:1;
        }
        .skybanner a {margin-bottom:5px}

        .evt_irona {background:}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/08/1780_top_bg.jpg) no-repeat center top}

        .evt01s {background:#e4e4e4;padding-bottom:50px}
        .evt01s .slide_con {position:relative; width:950px; margin:0 auto}
        .evt01s .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt01s .slide_con p.leftBtn {left:-80px}
        .evt01s .slide_con p.rightBtn {right:-80px}             

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/08/1780_02_bg.jpg) no-repeat center top}

        .evt03 {background:#ebebeb; padding-bottom:100px;}
        .evt03 .slide_con1 {width:789px; margin:0 auto; position:relative}
        .evt03 .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .evt03 .slide_con1 img {width:100%;}
        .evt03 .slide_con1 p a {cursor:pointer}
        .evt03 .slide_con1 p.leftBtn1 {left:-80px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .evt03 .slide_con1 p.rightBtn1 {right:-80px; top:50%; width:62px; height:62px; margin-top:-30px;}  

            .tabMenu {width:800px; margin:0 auto 30px}
            .tabMenu li {display:inline; float:left; width:50%}
            .tabMenu li a {display:block; padding:15px 0; text-align:center; border-radius:10px; background:#333; color:#fff; font-size:22px}
            .tabMenu li span {display:block; font-size:14px}
            .tabMenu li a:hover,
            .tabMenu li a.active {background:#e41f00;}
            .tabMenu:after {content:""; display:block; clear:both}
        .evt03 iframe {width:800px; height:450px; margin:0 auto;} 

        #tabwrap2 {width:976px; margin:0 auto; padding:50px 0; border:10px solid #ff635d; background:#fff}
        .tab2 {width:800px; margin:0 auto 50px;}
        .tab2 li {display:inline; float:left; width:25%;text-align:center !important;} 
        .tab2 li a {display:block}
        .tab2 li img {margin:0 auto}
        .tab2 li img.off {display:block}
        .tab2 li img.on {display:none}
        .tab2 li a.active img.off {display:none}
        .tab2 li a.active img.on {display:block}
        .tab2:after {content:""; display:block; clear:both}
        .tab_inner2 {text-align:center; height:150px}

        .evtTab {width:984px; margin:0 auto;}
        .evtTab ul li {display:inline; float:left; width:50%}
        .evtTab ul li a {display:block; text-align:center; padding:20px 0; font-weight:bold; color:#252525; border:1px solid #252525; 
            font-size:18px; background:#fff; margin-right:10px; line-height:1.4; }
        .evtTab ul li a:hover,
        .evtTab ul li a.active {background:#252525; color:#fff}
        .evtTab ul li:last-child a {margin:0}
        .evtTab ul:after {content:""; display:block; clear:both}
        .evtTabCts {margin-top:10px}

        .evt04 {background:#36374d; padding:100px 0;}
        .evt04 div {width:930px; margin:0 auto}
        .evt04 div li {display:inline; float:left; width:50%}
        .evt04 div li a {display:block; text-align:center; background:#5a5b6d; color:#36374d; padding:20px 0; line-height:1.4; font-size:18px; margin-right:1px}
        .evt04 div li a.active,
        .evt04 div li a:hover {background:#ebebeb}
        .evt04 div li:last-child a {margin-right:0}
        .evt04 div ul:after {content:""; display:block; clear:both}    

        /* tip */
        .wb_cts09 {background:#fff; text-align:left; padding:100px 0}
        .wb_tipBox {border:1px solid #333; padding:30px; width:980px; margin:0 auto; }
        .wb_tipBox > strong {font-size:16px !important; font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin:30px 0 10px; color:#111}	
        .wb_tipBox ol li {margin-bottom:10px; line-height:1.3; list-style:decimal; margin-left:15px}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {font-size:12px; color:#c03011;}

        /*TAB_tip*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%;}
        .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff;}
        .tab02 li:last-child a {margin:0}
        .tab02:after {content:""; display:block; clear:both}   
        
        #Popup {position:fixed; top:220px; margin-left:-350px; display:block;}

        .evtLive {background:#011135;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        {{--
        <div class="skybanner">
            <a href="#play"><img src="https://static.willbes.net/public/images/promotion/2020/09/1780_sky.png" alt=""></a>
        </div>
        --}}

        <div class="evtCtnsBox evt_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_top.jpg">
        </div>

        <div class="evtCtnsBox evtLive">            
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1780_live.jpg" alt="라이브" usemap="#Map1780_live" border="0" />
            <map name="Map1780_live">
                <area shape="rect" coords="216,1101,911,1216" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM" target="_blank" alt="라이브모드 구매하기">
            </map>               
        </div>

        <div class="evtCtnsBox evt01s">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/thank.jpg"  alt="소방직 합격"/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/thanks01.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/thanks02.jpg" /></li>     
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1699_arrowR.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/06/thanks_emo.jpg"  alt="이모티콘"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1780_02.gif" title="파이널 문제풀이 특징" />
        </div>

        <div class="evtCtnsBox evt03">                 
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1780_03_01.jpg" title="" />
            <div class="slide_con1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_01_a.png" alt="후기"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_01_b.png" alt="후기"/></li>
                </ul>
                <p class="leftBtn1"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/2020/08/1780_arr_l.png"></a></p>
                <p class="rightBtn1"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/2020/08/1780_arr_r.png"></a></p>
            </div>
            
            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_01_01.jpg" title="" />
            </div>

            <ul class="tabMenu" id="play">
                <li>
                    <a href="#tab1" class="active">
                        <span>소방 합격 전문가</span>
                        이종오 교수님을 소개합니다.
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <span>불꽃 같은 합격 커리큘럼</span>
                        이종오 소방직 공개설명회
                    </a>
                </li>
            </ul>  
            <div id="tab1" class="tabcts">
                <iframe src="https://www.youtube.com/embed/xBWCniTv_Ro?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>
            <div id="tab2" class="tabcts">
                <iframe src="https://www.youtube.com/embed/b06AI4w38gY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_02.jpg" title="" />            
            
            <div id="tabwrap2">
                <ul class="tab2">
                    <li>
                        <a href data-slide-index="0" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab01.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab01_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="1">
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab02.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab02_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="2">
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab03.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab03_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="3">
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab04.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab04_on.png" title="" class="on" />
                        </a>
                    </li>
                </ul>
                <div class="tab_inner2">
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab01_img.jpg" alt="기초및기초이론"/></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab02_img.jpg" alt="심화이론"/></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2020/12/1780_02_tab03_img.jpg" alt="기출문제풀이"/></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2020/08/1780_02_tab04_img.jpg" alt="단원동형문제풀이" /></div>
                </div>
            </div> 

            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_03.jpg" title="" />
                <div class="evtTab">
                    <ul>
                        <li><a href="#tab3" class="active">효율 100%<br>복습 TEST SYSTEM</a></li>
                        <li><a href="#tab4">DOUBLE CARE<br>PROGRAM</a></li>
                    </ul>
                    <div class="evtTabCts" id="tab3">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_04.jpg" title=""/>
                    </div>
                    <div class="evtTabCts" id="tab4">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_05.jpg" title=""/>
                    </div>
                </div>
            <div> 
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1780_03_06.jpg" title="" />  
        </div>

        <div class="evtCtnsBox evt04" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1780_03_07.jpg" title="" />
            <div>
                <ul class="NSK-Black">
                    <li><a href="#lec1">[실강전용]<br> 3월 FINAL 실전동형모고 PASS</a></li>
                    <li><a href="#lec2">[라이브전용]<br> 3월 FINAL 실전동형모고 PASS</a></li>
                </ul>
                <div id="lec1">
                    <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/1780_03_08.jpg" title="실강전용">
                    </a>
                </div>  
                <div id="lec2">
                    <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/1780_live_01.jpg" title="라이브전용"/>
                    </a>
                </div>            
            </div>
        </div>

        <!--유의사항-->
        <div class="evtCtnsBox wb_cts09">
            <div class="wb_tipBox">
            <ul class="tab02">
                <li><a href="#txt1">수강료 환불규정</a></li>
                <li><a href="#txt2">수강생 혜택상세</a></li>
                <li><a href="#txt3">기타</a></li>
            </ul>
            <div id="txt1">
                <p>수강료 환불규정</p>
                <ol>
                <li><strong>수강료 환불규정<span class="wb_tip_gray"> (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</span></strong><br />
                    <br />
                    <table>
                    <col />
                    <col />
                    <col />
                    <tr>
                        <th>수강료징수기간</th>
                        <th>반환 사유발생일</th>
                        <th>반환금액</th>
                    </tr>
                    <tr>
                        <td rowspan="4">1개월 이내인 경우</td>
                        <td>교습개시 이전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/3 경과 전</td>
                        <td>이미 납부한수강료의 2/3 해당</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/2 경과 전</td>
                        <td>이미 납부한수강료의 1/2 해당</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/2 경과 후</td>
                        <td>반환하지아니함</td>
                    </tr>
                    <tr>
                        <td rowspan="2">1개월 초과인 경우</td>
                        <td>교습 개시 이전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>교습 개시 이후</td>
                        <td>반환 사유가발생한 당해 월의 반환대상 수강료와</br />
                        나머지 월의 수강료 전액을 합산한 금액</td>
                    </tr>
                    </table>
                    <br />
                    ▷ 총 교습 시간은 개강월로부터 종강월까지의 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                    ▷ 환불 접수는 학원 방문 접수만 가능하며, 수강증을 필히 제출하여야 합니다.<br />
                    ▷ 카드로 결제하신 경우 결제 하셨던 카드를 지참하셔야 하며, 현금/계좌이체로 결제하신 경우 수강생 본인 명의의 통장으로만 환불금 입금 처리됩니다.<br />
                    ▷ 환불 기준일은 실제 수강 여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.<br />           		
                    ▷ 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.<br />
                    ▷ 친구추천할인 이벤트 적용 대상자의 경우, 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결제 해야 환불이 진행됩니다.<br />
                    ▷ 개강일이 지난 후에 강의 결제시, 지난 강의는 동영상으로 제공이 되며, 이후 강의 환불은 결제일과 상관없이 개강일을 기준으로 환불금이 산정됩니다.<br />
                    ▷ 이미 개강한 강의를 구매하더라도 수강료는 동일합니다.<br />	
                </li>
                </ol>
            </div>
            <div id="txt2">
                <p>수강생 혜택상세</p>
                <ol>        
                <li><strong>복습 동영상</strong><br />
                ▷ 종합반 수강 기간 내에 신청 가능합니다.<br />
                ▷ 현재 진행중인 실강에 대한 복습동영상이 제공되며, 다른 과정은 제공되지 않습니다.<br />
                ▷ 복습동영상은 최대 30일까지 신청할 수 있습니다.<br />
                ▷ 복습 동영상은 학원에 직접 방문하여 신청하는 것이 원칙이며, 전화로는 신청이 불가합니다.<br />
                </li>
                <li><strong>전국 모의고사</strong><br />
                ▷ 윌비스 고시학원에서 진행되는 윌비스 Real 모의고사가 제공됩니다.<br />
                ▷ 선택과목/응시직렬에 따라 몇몇 과목의 모의고사가 제공되지 않을 수 있습니다.<br />
                </li>
                <li><strong>사물함</strong><br />           
                ▷ 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                ▷ 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                ▷ 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                ▷ 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                </li>		 
                <li><strong>공통 사항</strong><br />
                ▷ 개인 사유에 의해 이용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                ▷ 제공된 혜택은 수강생 본인만 사용할 수 있습니다. 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다<br />
                </li>
                </ol>
            </div>
            <div id="txt3">
                <p>기타</p>
                <ol>
                <li><strong>커리큘럼</strong><br />
                ▷ 커리큘럼은 시험일정이나 학원/강사의 사정에 따라 일부 수정될 수 있습니다.<br />
                </li>
                <li><strong>강사진</strong><br />
                ▷ 강사진은 강사 개인사정이나 학원사정에 따라 변경될 수 있습니다.<br />
                </li>
                <li><strong>자습실 및 학원 운영시간</strong><br />
                ▷ 학원 운영 시간: <span class="wb_tip_orange">월 ~ 금 06:30 ~ 22:50, 토 07:30 ~ 22:00, 일 08:00 ~ 21:00  </span> (자습실 운영시간은 학원 운영 시간과 동일합니다.)<br />
                ▷ 데스크 운영 시간: <span class="wb_tip_orange"> 평일 08:30 ~ 20:00, 토요일 08:30 ~ 18:00 </span><br />
                ▷ 사물함 등록/연장/반납, 교재구매, 수강환불 관련 업무시간 : <span class="wb_tip_orange"> 평일 09:00 ~ 18:00 </span><br />
                ▷ 연휴 당일은 건물 휴무로 운영되지 않습니다.<br />
                ▷ 기술직 강의는 남강빌딩에서 진행 됩니다.<br />
                </li>
                <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                ▷ TEST 프로그램은 일일, 월간 TEST가 제공됩니다.<br />
                ▷ DAILY, MONTHLY TEST 의 경우, 강사의 강의 계획에 따라 제공되지 않을 수 있습니다.<br />
                ▷ 전국모의고사는 2019. 11월 이후 2~3개월에 한번 진행 될 예정이나, 학원사정이나 시험 일정에 따라 기간이 변경될 수 있습니다.<br />
                ▷ 전국모의고사는 학원에서 진행되는 올백모의고사반과 다른 프로그램입니다.<br />
                </li>
                <li><strong>강의 수강</strong><br />
                ▷ 수강 신청한 강의만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
                ▷ 등록하신 강좌는 본인만 수강이 가능하며, 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다. <br />
                ▷ 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다. <br />
                ▷ 강의는 학원/강사 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다. <br />(폐강 시, 환불 규정에 의거 환불 처리됩니다.)<br />
                ▷ 개인 사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                ▷ 수강 확인은 수강증 검사가 수시로 진행되니 꼭 지참하시고 수강하시기 바랍니다.  (수강증 분실 및 미지참 등으로 강의 수강에 불편함이 발생할 수 있습니다.)<br />
                </li>
                <li><strong>교재</strong><br />
                ▷ 교재는 별도 구매입니다. <br />
                ▷ 강사의 강의계획에 따라 추가적인 교재가 사용될 수도 있습니다.<br />
                </li>
                </ol>
            </div>
            
            </div>
        </div>
        <!--wb_tip//-->

        {{--
        <div id="Popup" class="PopupWrap modal willbes-Layer-popBox" style="display: none;">
            <div class="Layer-Cont">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1780_popup.jpg" usemap="#PopupImgMap860">
            </div>
            <ul class="btnWrapbt popbtn mt10">
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="1">하루 보지않기</a></li>
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="">Close</a></li>
            </ul>
        </div>
        <div id="PopupBackWrap" class="willbes-Layer-Black"></div>    
        --}}
        
    </div>
    <!-- End Container -->

    <script type="text/javascript">
         $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
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

        $(document).ready(function() {
            var slider2=$('.tab_inner2').bxSlider({ //롤링 슬라이드
                sliderMargin:0,
                speed: 600,
                pager: true,
                auto: true,
                controls: false,
                mode:'fade',
                pagerCustom: '.tab2',
                onSlideAfter: function(){
                    slider2.stopAuto();
                    slider2.startAuto();
                }
            });
        });



        $(document).ready(function(){
            $('.evtTab').each(function(){
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


        $(document).ready(function(){
            $('#tabwrap2').each(function(){
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

        $(document).ready(function(){
            $('.evt04 ul').each(function(){
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

        $(document).ready(function(){
            $('.tab02').each(function(){
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

        var tab1_url = "https://www.youtube.com/embed/xBWCniTv_Ro?rel=0";
		var tab2_url = "https://www.youtube.com/embed/b06AI4w38gY?rel=0";

		$(document).ready(function(){
            $(".tabcts").hide(); 
            $(".tabcts:first").show();
            $(".tabMenu li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
                }
                $(".tabMenu li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabcts").hide(); 
                $(".tabcts").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
            });


            //레이어팝업 close 버튼 클릭        
            $('.PopupWrap').on('click', '.btn-popup-close', function() {
                var popup_idx = $(this).data('popup-idx');
                var hide_days = $(this).data('popup-hide-days');

                // 팝업 close
                $(this).parents('.PopupWrap').fadeOut();

                //하루 보지않기
                if (hide_days !== '') {
                    var domains = location.hostname.split('.');
                    var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

                    $.cookie('_wb_client_popup_' + popup_idx, 'done', {
                        domain: domain,
                        path: '/',
                        expires: hide_days
                    });
                }

                // 모달팝업창이 닫힐 경우 백그라운드 레이어 숨김 처리 
                if ($(this).parents('.PopupWrap').hasClass('modal') === true) {
                    $('#PopupBackWrap').fadeOut();
                }
            });            

            // 백그라운드 클릭 --}}
            $('#PopupBackWrap.willbes-Layer-Black').on('click', function() {
                $('.PopupWrap.modal').fadeOut();
                $(this).fadeOut();
            });

            // 팝업 오늘하루안보기 하드코딩
            if($.cookie('_wb_client_popup_860') !== 'done') {
                $('#Popup').show();
                $('.PopupWrap').fadeIn();
                $('#PopupBackWrap').fadeIn();
            }
        });
    </script>

@stop