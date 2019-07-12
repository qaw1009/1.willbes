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

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/06/1257_top_bg.jpg) no-repeat center top}
        .evtTop span {position:absolute; left:50%; z-index:1; }
        .evtTop span.img1 {top:75px; margin-left:-307px; width:615px; animation:iptimg1 0.5s ease-out;-webkit-animation:iptimg1 0.5s ease-out;}
        .evtTop span.img2 {top:875px; margin-left:-13px; width:134px;}
        .evtTop span.img2 img {width:134px; animation:iptimg2 0.5s infinite;-webkit-animation:iptimg2 0.5s infinite;}
        @@keyframes iptimg1{
        from{margin-left:-507px; opacity: 0;}
        to{margin-left:-307px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-507px; opacity: 0;}
        to{margin-left:-307px; opacity: 1;}
        }
        @@keyframes iptimg2{
        0{transform:scale(1);}
        50%{transform:scale(0.8);}
        100%{transform:scale(1);}
        }
        @@-webkit-keyframes iptimg2{
        0{transform:scale(1);}
        50%{transform:scale(0.8);}
        100%{transform:scale(1);}
        } 

        .evt01 {position:relative; background:url(https://static.willbes.net/public/images/promotion/2019/06/1257_01_bg.jpg) no-repeat center top;}              

        .evt02 {background:#fff; padding:0 0 100px; position:relative}
        .slide_con1 {position:absolute; width:1055px; top:2445px; left:50%; margin-left:-527px}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .slide_con1 p a {cursor:pointer}
        .slide_con1 p.leftBtn1 {left:-62px; top:50%; width:62px; height:62px; margin-top:-30px; opacity:0.9; filter:alpha(opacity=90);}
        .slide_con1 p.rightBtn1 {right:-62px;top:50%; width:62px; height:62px;  margin-top:-30px; opacity:0.9; filter:alpha(opacity=90);}  

        #tabwrap2 {width:977px; margin:0 auto; height:466px; background:url(https://static.willbes.net/public/images/promotion/2019/06/1257_02_03_bg.jpg) no-repeat;}
        .tab2 {width:977px; margin:0 auto; padding-top:108px; margin-bottom:30px; margin-left:50px}
        .tab2 li {display:inline; float:left;}
        .tab2 li a {display:block; text-align:center; margin-right:10px}
        .tab2 li:last-child a {margin-right:0}
        .tab2 li img.off {display:block}
        .tab2 li img.on {display:none}
        .tab2 li a.active img.off {display:none}
        .tab2 li a.active img.on {display:block}
        .tab2:after {content:""; display:block; clear:both}
        .tab_inner2 {width:957px !important; margin:0 auto; height:150px; text-align:center !important;}

        .evtTab {width:984px; margin:50px auto 140px;}
        .evtTab ul li {display:inline; float:left; width:33.33333%}
        .evtTab ul li a {display:block; text-align:center; padding:20px 0; font-weight:bold; color:#fff; font-size:18px; background:#898989; margin-right:10px; line-height:1.4}
        .evtTab ul li a:hover,
        .evtTab ul li a.active {background:#b39d6c}
        .evtTab ul li:last-child a {margin:0}
        .evtTab ul:after {content:""; display:block; clear:both}
        .evtTabCts {margin-top:10px}

        .evt03 {background:#36374d}
        .evt03 div {width:930px; margin:0 auto}
        .evt03 div li {display:inline; float:left; width:50%}
        .evt03 div li a {display:block; text-align:center; background:#5a5b6d; color:#36374d; border-radius:10px; margin-right:10px; height:80px; line-height:80px; font-size:35px}
        .evt03 div li a.active,
        .evt03 div li a:hover {background:#ebebeb}
        .evt03 div li:last-child a {margin-right:0}
        .evt03 div ul:after {content:""; display:block; clear:both}       
        
        .evt06 {width:980px !important; margin:100px auto; text-align:left}
        .evt06Box {border:1px solid #000; padding:30px}

        /* 유의사항 */
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%}
        .tab02 li a {display:block; text-align:center; font-size:14px; font-weight:bold; background:#e4e4e4; color:#666; padding:15px 0; border:1px solid #e4e4e4; margin-right:1px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#242424; color:#fff;}
        .tab02 li:last-child a {margin:0} 
        .tab02:after {content:""; display:block; clear:both}
        
        .tab02Cts strong {font-weight:bold; color:#000; display:block; margin-bottom:5px}
        .tab02Cts span {padding-left:10px;}
        .tab02Cts p {font-size:14px !important; font-weight:bold; margin:20px 0 10px; color:#000}
        .tab02Cts ol li {margin-bottom:10px; line-height:1.3; list-style:disc; margin-left:20px}
        .tab02Cts table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto; margin-top:10px}
        .tab02Cts th,
        .tab02Cts td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4; font-size:100% !important}
        .tab02Cts th {font-weight:bold; color:#333; background:#f4f4f4}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_skybanner.png" alt="" usemap="#Mapskybanner" border="0">
            <map name="Mapskybanner" id="Mapskybanner">
                <area shape="rect" coords="38,69,155,120" href="https://pass.willbes.net/pass/promotion/index/cate/3050/code/1256" target="_blank" alt="공채반" />
                <area shape="rect" coords="40,131,153,187" href="#evt01" alt="경채반" />
				<area shape="rect" coords="36,245,156,310" href="https://pass.willbes.net/pass/promotion/index/cate/3050/code/1282"  target="_blank" />
            </map>
        </div>
        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_top.jpg" usemap="#Map1256A" title="불꽃소방 기본이론 완성반" border="0">
            <map name="Map1256A" id="Map1256A">
                <area shape="rect" coords="338,1058,484,1148" href="https://pass.willbes.net/pass/promotion/index/cate/3050/code/1256" target="_blank" alt="공채반" />
                <area shape="rect" coords="706,1059,827,1148" href="#evt01" alt="경채반"/>
            </map>
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2019/05/1256_top_img1.png" alt="화살표"></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2019/05/1256_top_img2.png" alt="손"></span>
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
           <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_01.jpg" title="">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_01.jpg" title="파이널 문제풀이 특징" /><br/>          
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_02.jpg" title="" />
            <div class="slide_con1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_02A.png" alt="후기"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_02B.png" alt="후기"/></li>
                </ul>
                <p class="leftBtn1"><a id="imgBannerLeft1"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_l.png"></a></p>
                <p class="rightBtn1"><a id="imgBannerRight1"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_r.png"></a></p>
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_03.jpg" title="" />
            
            <div id="tabwrap2">
                <ul class="tab2">
                    <li>
                        <a href data-slide-index="0" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab01.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab01_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="1">
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab02.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab02_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="2">
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab03.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab03_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="3">
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab04.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab04_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="4">
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab05.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab05_on.png" title="" class="on" />
                        </a>
                    </li>
                    <li>
                        <a href data-slide-index="5">
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab06.png" title="" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab06_on.png" title="" class="on" />
                        </a>
                    </li>
                </ul>
                <div class="tab_inner2">
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab01_img.jpg" alt="기초및기초이론"/></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab02_img.jpg" alt="심화이론"/></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab03_img.jpg" alt="기출문제풀이"/></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab04_img.jpg" alt="단원동형문제풀이" /></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab05_img.jpg" alt="최종마무리" /></div>
                    <div class="tabcont"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_tab06_img.jpg" alt="최종마무리" /></div>
                </div>
            </div>           

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_02_04.jpg" title="" /></div>
        </div>

        <div class="evtCtnsBox evt03" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_03_01.jpg" title="" />
            <div>
                <ul class="NSK-Black">
                    <li><a href="#lec1" class="active">7월 기본이론 완성반</a></li>
                    <li><a href="#lec2">19.7월 ~ 20.3월 연간반</a></li>
                </ul>
                <div class="mt10" id="lec1">
                    <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_03_tab1.jpg" title="7월 기본이론 완성반"></a>
                </div>  
                <div class="mt10" id="lec2">
                    <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1257_03_tab2.jpg" title="연간종합반"/></a>
                </div>             
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1257_03_1.jpg" usemap="#Map1256B" title="" border="0" />
            <map name="Map1256B" id="Map1256B">
                <area shape="rect" coords="169,1009,946,1087" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=336" target="_blank" alt="설명회신청하기" />
            </map>
        </div>

        <div class="evt06">
            <div class="evt06Box">
                <ul class="tab02">
                    <li><a href="#txt1" class="active">유의사항</a></li>
                    <li><a href="#txt2">수강혜택</a></li>
                    <li><a href="#txt3">기타</a></li>  
                </ul>
                <div id="txt1" class="tab02Cts">
                    <ol>
                        <li><strong>수강료 환불규정 (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</strong>
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
                                    <td>총 교습 시간의 1/2 경과 후</td>
                                    <td>이미 납부한수강료의 1/2 해당</td>
                                </tr>
                                <tr>
                                    <td>총 교습 시간의 1/2 경과 수</td>
                                    <td>반환하지아니함</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">1개월 초과인 경우</td>
                                    <td>교습 개시 이전</td>
                                    <td>이미 납부한 수강료 전액</td>
                                </tr>
                                <tr>
                                    <td>교습 개시 이후</td>
                                    <td>반환 사유가발생한 당해 월의 반환대상 수강료와 나머지 월의 수강료 전액을 합산한 금액</td>
                                </tr>
                            </table>
                            <br />
                            <br />
                            1) 총 교습 시간은 개강달로부터 종강달까지 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                            2) 개강 이후 환불 접수는 기간 내 직접 방문해주셔야 합니다. (유선 접수 불가/ 수강증 미반납시 환불 불가) <br />
                            3) 환불 요청 시, 결제 하셨던 카드, 수강증, 영수증을 지참하셔야 결제취소가 가능하며, 현금으로 결제하신 경우, 수강생 본인 명의의 통장으로 입금됩니다.<br />
                            4) 환불 기준일은 실제 수강여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다<br />
                            5) 수강 기간 동안 제공받은 사물함, 동영상 강좌, 자습실 등 혜택으로 제공된 서비스는 환불 즉시 이용이 정지 및 회수되며, 기사용된 부분은 환불신청하신<br />
                            해당월의 말일까지 사용한 것으로 간주하고 사용료를 환불금액에서 공제합니다. <br />
                            <span>- 사물함 사용료: 1개월-5,000원</span> <br />
                            <span>- 동영상 강좌: 1개월-35,000원<span> <br />
                            <span>- 자습실: 월 150,000원</span>  <br />                            
                            6) 무료로 제공받은 교재 등 혜택으로 제공된 물품류(전자제품 제외)의 경우 미반환되거나, 기사용흔적/훼손이 있는 경우 환불금액에서 해당 물품류의 정가를 환불금에서 공제합니다.<br />
                            7) 태블릿 PC 등 혜택으로 제공된 전자제품류 개봉/기사용 흔적 있는 경우 환불금액에서 해당 전자제품류의 정가를 환불금에서 공제합니다<br />
                            8) 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록하셔야합니다.<br />
                            9) 친구추천할인 이벤트 적용 대상자의 경우 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결재 해야 환불이 진행됩니다.<br />
                        </li>
                    </ol>
                </div>
                <div id="txt2" class="tab02Cts">
                    <ol>
                        <li>
                        <strong>윌비스 전국 모의고사</strong>
                        - 윌비스 고시학원에서 진행되는 유료 모의고사가 제공됩니다. 개인 사유에 의해 신청/응시하지 못한 경우에 대해서는 학원에서 보상하지 않습니다.<br />
                        </li>
                        <li>
                        <strong>개인 사물함</strong>
                        - 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다.<br />
                        - 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                        - 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                        - 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                        - 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                        - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li>
                        <strong>전용 자습실</strong>
                        - 지정좌석제로 제공되며, 지정된 좌석 이외의 좌석은 원칙적으로 사용이 불가능합니다. <br />
                        - 중도 수강 취소 시 지정된 좌석은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                        - 개인 물품의 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                        - 제공된 책상, 의자는 학원의 재산입니다. 임의 이동 및 분실/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                        - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li>
                        <strong>복습 동영상</strong>
                        - 직급별 온라인PASS와 단강좌가 지급됩니다.<br />
                        - 수강기간 동안만 수강이 가능한 혜택이며, 중도환불 시 즉시 회수됩니다.<br />
                        - 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li>
                        <strong>면접반 할인권</strong>
                        - 제공되는 혜택은 윌비스 공무원 학원 면접반에서만 사용가능합니다.- 지원되는 시험은 9급 지방직/서울시 시험입니다. (그 외 다른 시험 해당X)<br />
                        - 중도 수강취소 시 제공되지 않습니다.- 개인 사유에 의해 수강하지 못한 경우에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                        </li>
                        <li>
                        <strong>추가 할인</strong>
                        - 추가 할인은 수강료 정가에서 적용됩니다.<br />
                        - 학원 방문 등록 시에만 추가 할인이 적용됩니다.
                        </li>
                    </ol>
                </div>
                <div id="txt3" class="tab02Cts">
                    <ol>
                        <li><strong>학원 운영시간</strong>
                            - 학원 운영 시간: 월~일 06:30~23:30<br />
                            - 자습실 운영시간은 학원 운영 시간과 동일합니다. 다만, 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.<br />
                        </li>
                        <li><strong>기타</strong>
                            - 반드시 등록한 강좌 및 등록한 수업만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다<br />
                            - 등록하신 강좌는 본인만 수강이 가능하며, 타인에게 판매/양도 할 수 없습니다.<br />
                            - 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다.<br />
                            - 강의는 학원 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다.(폐강 시, 환불규정에 의거 환불 진행)<br />
                            - 개인사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                            - 수강확인은 수강증을 통한 검사로 진행되오니 꼭 지참하시고 수강하시기 바랍니다. (수강증 분실 및 미발급으로 발생되는 손해의 책임은 수강생 본인에게 있습니다.)<br />
                            - 수강료에 교재 비용은 포함되어 있지 않으며, 커리큘럼에 따라 추가 교재를 구매 하실 수 있습니다.<br />
                            - 수업자료는 수업 종료 후 3일 이내로 수령하셔야하며, 이후에는 개인적으로 출력하셔야합니다.<br />
                            - 연간 종합반 수업은 2019년 5월부터 2020년 3월 둘째주 까지 진행되며, 자습실 사용은 시험주까지 사용 가능합니다.<br />
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!--wb_cts04//-->
        
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
            $(".evtTabCts img").hide();
            $(".evtTabCts img:first").show();

            $(".evtTab ul li a").click(function(){

                var activeTab = $(this).attr("href");
                $(".evtTab ul li a").removeClass("active");
                $(this).addClass("active");
                $(".evtTabCts img").hide();
                $(activeTab).fadeIn();

                return false;
            });
        });  


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
            $('.evt03 ul').each(function(){
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

    </script>

@stop