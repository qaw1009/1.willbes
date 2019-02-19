@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        body{width:100%; min-width:1240px; margin:auto; background:none}
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important; 
            margin-top:0 !important;
            padding:0 !important;
        }	
        .rLnb {position:absolute; width:170px; top:20px; right:10px; z-index:1;
        }
        .rLnb ul {padding:6px 12px; background:#fff; border:3px solid #2f2f2f; margin-bottom:10px;
            -webkit-box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
            -moz-box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
            box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
        }
        .rLnb li {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb_arrow.jpg) no-repeat 100% center}
        .rLnb a {border-bottom:1px solid #bfbfbf; display:block; padding:10px 0; line-height:1.4;}
        .rLnb a:hover {border-bottom:1px solid #000;
            font-weight: 600;
        }
        .rLnb li:last-child a {border:0}
        .rLnb div {
            text-align:center;
            padding:20px 0;
            background:#fff;   
            border:3px solid #2f2f2f;  
        }
        .rLnb_sectionFixed {position:fixed; top:20px}
        
        .LAeventA01 {
            position:relative;
            width:100%; 
            text-align:center; 
            background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01_bg.jpg) no-repeat center top; 
            background-size:auto;         
        }
        .LAeventA01 .main_img {position:absolute; width:980px; top:474px; left:50%; margin-left:-490px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
        @@keyframes flipInX {
        from {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
            transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
            opacity: 0;
        }
        40% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
        }
        60% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            opacity: 1;
        }
        80% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
            transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        }
        to {
            -webkit-transform: perspective(400px);
            transform: perspective(400px);
        }
        }
        .LAeventA01 .flipInX {
        -webkit-backface-visibility: visible !important;
        backface-visibility: visible !important;
        -webkit-animation-name: flipInX;
        animation-name: flipInX;
        }
        
        .LAeventA02 {width:100%; text-align:center; background:#ececec; padding-bottom:120px}
        .LAeventA02 div {width:904px; margin:0 auto; text-align:center}
        .LAeventA02 a {margin-bottom:10px; margin-right:10px; display:inline-block}
        
        .LAeventB03 {width:100%; background:#ececec; padding:0 0 70px; color:#555 !important}
        .LAeventB03 .LAeventB03img {width:980px; margin:0 auto 50px}
        .LAeventB03 h3 {font-size:160%; font-weight:500; color:#000; background:url(http://file3.willbes.net/new_gosi/2017/01/ico01.png) no-repeat left center; margin-bottom:30px; padding-left:30px}
        .LAeventB03 .FreepassLec {width:980px; margin:0 auto 40px}
        .LAeventB03 .FreepassLec .fpLecinfo {width:978px; margin:0 auto; background:#FFF; padding:40px; border:1px solid #dedede}
        .LAeventB03 .FreepassLec .fpLecinfo p {line-height:1.5; font-size:120%; padding-bottom:40px}
        .LAeventB03 table {border-top:1px solid #b7b7b7; width:100%}
        .LAeventB03 table tr {border-bottom:1px solid #b7b7b7;}
        .LAeventB03 table th {text-align:center; padding:15px 0; font-weight:bold}
        .LAeventB03 table td {text-align:center; padding:15px 0}
        .LAeventB03 table td.before {background:#898989; color:#fff; font-size:160%}
        .LAeventB03 .price {margin-left:30px}
        .LAeventB03 .price li {display:inline-block; float:left; font-family:Verdana, Geneva, sans-serif; text-align:left}
        .LAeventB03 .price li.liSty1 {font-size:140%; text-decoration:line-through; background:url(http://file3.willbes.net/new_gosi/2017/01/ico02.png) no-repeat right center; padding:10px 30px 10px 0; margin-right:10px}
        .LAeventB03 .price li.liSty2 {font-size:160%; color:#ed1c24; font-weight:bold}
        .LAeventB03 .price li.liSty2 div {font-size:60%; color:#555; font-weight:normal}
        .LAeventB03 .price:after {content:""; display:block; clear:both}
        .LAeventB03 .golink {border-top:3px solid #353535; border-bottom:3px solid #353535; text-align:center; padding:48px 0; margin-top:80px}
        .LAeventB03 .golink ul {border-left:1px solid #000; width:800px; margin:40px auto 0}
        .LAeventB03 .golink li {display:inline; float:left; width:33%; border-right:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000; height:38px; line-height:38px}
        .LAeventB03 .golink li.liSty1 {background:#fff; width:33%}
        .LAeventB03 .golink li img {vertical-align:middle}
        .LAeventB03 .golink a {display:block}
        .LAeventB03 .golink ul:after {content:""; display:block; clear:both}
        
        .LAeventB04 {width:100%; background:#252525; padding:70px 0; color:#ccc !important}
        .LAeventB04 .fpinfo {position:relative; width:900px; margin:0 auto; line-height:1.5;}
        .LAeventB04 .fpinfo a {cursor:pointer;}
        .LAeventB04 .fpinfo .fpinfoBtn {position:absolute; top:0; right:0; width:30%; text-align:right}
        .LAeventB04 .fpinfo .fpinfoBtn a { display:inline-block; margin-left:10px; border:1px solid #fff; padding:5px 10px; color:#fff}
        .LAeventB04 ol {margin:30px 0 0 30px}
        .LAeventB04 ol > li {list-style:decimal; margin-bottom:30px}
        .LAeventB04 ol li ul {margin-top:10px}
        .LAeventB04 ol li li {list-style:none;}
        .LAeventB04 ol li a {display:inline; padding:3px 5px 2px; color:#252525; background:#8ac349; font-size:95%}
        .LAeventB04 ol li a.btnSty1 {background:#fac716}
        
        .Pstyle {opacity:0; display:none; position:relative; width:640px; padding:40px 20px 20px; background-color:#fff}
        .Pstyle .fpcontent {height:auto; width:auto; border:1px solid #000}
        .Pstyle .fpcontent h3 {text-align:center; background:#000; padding:15px}
        .Pstyle  .fpcontentinfo1 {padding:30px}
        .Pstyle  .fpcontentinfo1 p {font-size:120%; font-weight:bold; margin-bottom:15px; color:#000}
        .Pstyle  .fpcontentinfo1 ol {margin-bottom:30px}
        .Pstyle  .fpcontentinfo1 ol:last-child {margin:0}
        .Pstyle  .fpcontentinfo1 li {list-style:decimal; margin-left:20px; margin-bottom:5px; line-height:1.3}
        .Pstyle  .fpcontentinfo1 li span {color:#F00}
        .Pstyle  .fpcontentinfo1 .infoTxt {color:#F00; margin-bottom:10px}
        .b-close {position:absolute; right:15px; top:5px; display:inline-block; cursor:pointer}
    </style>


    <div id="Container" class="subContainer widthAuto c_both ">    
        <div class="Menu NSK c_both">
            <h3>
                <ul class="menu-Tit">
                    <li class="Tit">경찰<span class="row-line">|</span></li>
                    <li class="subTit">경찰학원</li>
                </ul>
                <ul class="menu-List">
                    <li>
                        <a href="#none">교수진소개</a>
                    </li>
                    <li>
                        <a href="#none">종합반</a>
                    </li>
                    <li>
                        <a href="#none">단과</a>
                    </li>
                    <li>
                        <a href="#none">수험정보</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ site_url('/home/html/acad_info1') }}">학원안내</a>
                        <div class="drop-Box list-drop-Box">
                            <ul>
                                <li class="Tit">학원안내</li>
                                <li><a href="{{ site_url('/home/html/acad_info1_1') }}">학원강의정보</a></li>
                                <li><a href="{{ site_url('/home/html/acad_info2') }}">모의고사성적공지</a></li>
                                <li><a href="{{ site_url('/home/html/acad_info3') }}">학원갤러리</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#none">학원소개</a>
                    </li>
                    <li class="Acad">
                        <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="Depth">
            <img src="{{ img_url('sub/icon_home.gif') }}"> 
            <span class="1depth"><span class="depth-Arrow">></span><strong>학원안내</strong></span>
            <span class="1depth"><span class="depth-Arrow">></span><strong>학원강의정보</strong></span>
        </div>
    </div>
    <!-- 고정 메뉴 //-->

    <div class="p_re evtContent" id="evtContainer">       
        @include('html.event_onLeaveArmyPassRlnb')        

        <div class="LAeventA01">
		  	<div class="main_img flipInX animated" style="opacity:1;">
				<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01_txt.png" alt="혜택">
			</div>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01.jpg" alt="전역(예정)군인 인증센터"/>                           
		</div>        

        <div class="LAeventB03">
            <div class="LAeventB03img">
                <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_5.jpg" alt="자격증 교육과정의 경우, 일부 혜택 제외"/>
            </div>

            <!--경찰-->
            <div class="FreepassLec NG">
            	<h3>경찰직</h3>
                <div class="fpLecinfo">
					<p>
                    경찰 공무원 합격의 메카!<br />
                    수강생 수가 입증한 부동의 1위! 신광은 경찰팀<br />
                    노량진 수험가를 지배하는 강의로 합격을 예약하세요!     
                    </p>
                    <table>
                        <col width="20%" />
                        <col width="*" />
                        <col width="25%" /> 
                        <tr>
                            <th>교재 미포함<br />
                                구매가격</th>
                            <td>
                                <ul class="price">
                                    <li class="liSty1">990,000원</li>
                                    <li class="liSty2">본인부담 : 198,000원
                                    <div>(* 취업역량교육비/바우처 792,000원 지원)</div> 
                                    </li>
                                </ul>
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn2.jpg" alt="결제하기"/></a></td>
                        </tr>
                        <tr>
                            <th>교재 포함<br />
                                구매가격<br />
                                (기본이론서)</th>
                            <td>
                                <ul class="price">
                                    <li class="liSty1">1,190,000원</li>
                                    <li class="liSty2">본인부담 : 238,000원
                                    <div>(* 취업역량교육비/바우처 952,000원 지원)</div> 
                                    </li>
                                </ul>
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn2.jpg" alt="결제하기"/></a></td>
                        </tr>
                        <tr>
                            <th>교재 미포함<br />
                            구매가격</th>
                            <td class="before">
                                가입/인증 완료 시<br />
                                윌비스 PASS 금액이 공개됩니다.
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn1.jpg" alt="가입인증하기"/></a></td>
                            </tr>
                            <tr>
                            <th>교재 포함<br />
                                구매가격<br />
                                (기본이론서)</th>
                            <td class="before">
                                가입/인증 완료 시<br />
                                윌비스 PASS 금액이 공개됩니다.
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn1.jpg" alt="가입인증하기"/></a></td>
                        </tr>             
                    </table>
                </div>                
            </div>
            <!--FreepassLec//-->  
            
            <!--일반행정직-->
            <div class="FreepassLec NG">
            	<h3>일반행정직</h3>
                <div class="fpLecinfo">
					<p>
                    경찰 공무원 합격의 메카!<br />
                    수강생 수가 입증한 부동의 1위! 신광은 경찰팀<br />
                    노량진 수험가를 지배하는 강의로 합격을 예약하세요!     
                    </p>
                    <table>
                        <col width="20%" />
                        <col width="*" />
                        <col width="25%" /> 
                        <tr>
                            <th>교재 미포함<br />
                                구매가격</th>
                            <td>
                                <ul class="price">
                                    <li class="liSty1">990,000원</li>
                                    <li class="liSty2">본인부담 : 198,000원
                                    <div>(* 취업역량교육비/바우처 792,000원 지원)</div> 
                                    </li>
                                </ul>
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn2.jpg" alt="결제하기"/></a></td>
                        </tr>
                        <tr>
                            <th>교재 포함<br />
                                구매가격<br />
                                (기본이론서)</th>
                            <td>
                                <ul class="price">
                                    <li class="liSty1">1,190,000원</li>
                                    <li class="liSty2">본인부담 : 238,000원
                                    <div>(* 취업역량교육비/바우처 952,000원 지원)</div> 
                                    </li>
                                </ul>
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn2.jpg" alt="결제하기"/></a></td>
                        </tr>
                        <tr>
                            <th>교재 미포함<br />
                            구매가격</th>
                            <td class="before">
                                가입/인증 완료 시<br />
                                윌비스 PASS 금액이 공개됩니다.
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn1.jpg" alt="가입인증하기"/></a></td>
                            </tr>
                            <tr>
                            <th>교재 포함<br />
                                구매가격<br />
                                (기본이론서)</th>
                            <td class="before">
                                가입/인증 완료 시<br />
                                윌비스 PASS 금액이 공개됩니다.
                            </td>
                            <td><a href="#none"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB_btn1.jpg" alt="가입인증하기"/></a></td>
                        </tr>             
                    </table>
                </div>
                <!--fpLecinfo//-->
                
                <div class="golink">
                    <img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB05.png" alt="혹시, 원하시는 교육과정을 찾지 못하셨나요?"/>
                    <ul>
                        <li class="liSty1"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB05_t1.png" alt="교육과정바로가기"/></li>
                        <li><a target="_blank" href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB05_t2.png" alt="공무원"/></a></li>
                        <li><a target="_blank" href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB05_t3.png" alt="경찰"/></a></li>
                    </ul>
                </div>
            </div>
            <!--FreepassLec//--> 

            

        </div>
        <!-- LAeventB03 //-->

        <div class="LAeventB04">
        	<div class="fpinfo">
            	<p><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyB06.png" alt="자격증 교육과정의 경우, 일부 혜택 제외"/></p>
                <div class="fpinfoBtn">
                	<a onclick="go_popup()">이용안내</a><a onclick="go_popup1()">환불안내</a>      
                </div>
                <ol>
                	<li><strong>대상자</strong>
                    	<ul>
                        	<li>- 주소지 관할 보훈(지)청 또는 vnet에 등록된 중,장기복무 제대(예정)군인 으로 신청일 현재 직업능력개발 교육비 지원대상으로 결정된 사람<br />
                            (전역 예정자 : vnet에 등록된 회원으로, 국방전직교육원 전직 기본 교육 수료자 / <br />
							전역자 : vnet 및 보훈(지)청에 등록된 회원으로 전역 후 3년이내 미취업자 또는 비정규직 취업자)</li>
                            <li>- 장교 및 준사관 또는 부사관 전역예정자 및 전역자<br />
                               (취업역량교육비 : 전역 1년 전부터 사용가능 / 바우처 : 전역 후 3년 이내 사용가능)
                            </li>
                        </ul>
                    </li>
                    <li><strong>제대군인지원센터 직업훈련비 지급</strong>
                    	<ul>
                        	<li>중,장기 복무 전역(예정)자 최대 150만원 한도 <a onclick="go_popup2()">직업훈련비 신청절차 ▶</a></li>
                            <!--li>※ 취업역량교육비, 바우처 합산하여 장기복무전역(예정)자 250만원 | </li>
							<li>중기복무전역(예정)자 200만원 범위 내 지원가능 </li-->                            
                        </ul>
                    </li>
                    <li><strong>제대군인지원센터 직업훈련비 제출서류</strong>
                    	<ul>
                        	<li>① 직업훈련계획서 <a href="javascript:goFileDownload('board/201801/20180125132811107.hwp','직업훈련계획서_2018년.hwp');" class="btnSty1">다운로드</a></li>
                            <li>② 교육비 지원신청서  <a href="javascript:goFileDownload('board/201801/20180125132811139.hwp','교육비지원신청서_2018년.hwp');" class="btnSty1">다운로드</a></li>
                            <li>③ 교육비납부 영수증(카드명세표 또는 현금영수증) 1부</li>
                            <li>※ ①~③번 제출서류의 경우 교육시작일로부터 7일 이내 서류제출</li>
							<li>교육과정 이수,  교육훈련과정 수료 후 14일 이내에 수료증 또는 교육수료 확인서 제출</li>
							<li>※ 교육훈련과정 교육수료확인서</li>
							<li>&nbsp;&nbsp;&nbsp;&nbsp;<span>발급시기</span> : 윌비스 PASS 상품은 수강일로부터 180일(6개월) 이후</li>
							<li>&nbsp;&nbsp;&nbsp;&nbsp;<span>발급방법</span> : 전역(예정)간부 전용 상담센터 문의 (070-4006-7176)</li>                       
						</ul>
                    </li>
                </ol>
            </div>
        </div><!--LAeventB04//-->


        <div id="popup" class="Pstyle">
            <span class="b-close"><img src="http://file3.willbes.net/new_gosi/2017/01/btn_close.jpg" alt="창닫기"/></span>  
            <div class="fpcontent">    
            	<h3><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyP01.png" alt="윌비스 PASS 이용안내"/></h3>
                <div class="fpcontentinfo1">
                    <p>상품구성</p>
                    <ol>
                        <li>본 상품은 '일반행정직/ 기술직/ 경찰직/ 소방직/ 군무원'를 구분하여 상품을 선택하셔야 합니다.</li>
                        <li>선택한 윌비스 PASS 상품의 표기된 기간 동안 동영상 전 강좌를 무제한 수강 할  수 있습니다.</li>
                        <li>경찰직 윌비스 PASS의 경우 한국사 과목은 교수님 1명을 선택하셔야 합니다.(변경불가)</li>
                        <li>윌비스 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.  </li>
                        <li>학원 운영상 과목별 교수진 변동이 있을 수 있습니다.</li>
                    </ol>
                    <p>수강관련</p>
                    <ol>
                        <li>먼저 내 강의실 (또는 나의 강의실) 메뉴로 접속합니다.</li>
                        <li>구매하신 윌비스 PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후 수강하실 수 있습니다.</li>
                        <li>윌비스 PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                        <li>윌비스 PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                            <strong>PC+Mobile 윌비스 PASS 수강 시</strong> : PC 2대 또는 PC 1대 + 모바일 1대 (PMP 윌비스 PASS는 제공하지 않습니다.)</li>
                        <li>모바일 강좌는 스마트폰, 태블릿PC 등의 수강기기로 각 사이트의 모바일웹에 접속하여 수강하실 수 있습니다.</li>
                        <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
                    </ol>
                    <p>이벤트 상품</p>
                    <ol>
                        <li>갤럭시 탭 포함 <br />
                            갤럭시 탭 포함 상품을 구매한 경우 결제일로부터 3~4일 이내(주말 및 공휴일 제외) 받아보실 수 있습니다.<br />
                            갤럭시 탭 A/S는 가까운 삼성전자 서비스센터를 방문하시면 A/S가 가능합니다.(상품 A/S 문의전화 : 1588-3366)</li>
                        <li>교재(기본이론서) 구매지원 포함<br />
                            교재 구매지원 상품을 구매한 경우  윌비스 PASS 수강강좌의 기본이론서 교재구매가능 20만 포인트가 제공됩니다.<br />
                            해당 포인트로 해당 교수님 기본이론서 교재를 별도로 신청하셔야 합니다.</li>
                    </ol>
                    <p>교재구매</p>
                    <ol>
                        <li>교재 미포함 윌비스 PASS 상품 구매<br />
                            본 상품은 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
                    </ol>
                    <p>유의사항</p>
                    <ol>
                        <li>본 상품은 특별할인기획 상품으로 쿠폰할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                        <li>윌비스 PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다</li>
                        <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                        <li>온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사는 혜택에서 제외됩니다.</li>
                    </ol>
                </div>         
			</div>
    	</div>
        <!--이용안내 팝업//-->        

        <div id="popup1" class="Pstyle">
            <span class="b-close"><img src="http://file3.willbes.net/new_gosi/2017/01/btn_close.jpg" alt="창닫기"/></span>    
            <div class="fpcontent">    
            	<h3><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyP04.png" alt="윌비스 PASS 환불안내"/></h3>
                <div class="fpcontentinfo1">
                    <p>환불안내</p>
                    <div class="infoTxt">본 상품은 특별상품으로 단과 및 기타 상품의 환불규정과는 별도로 운영됩니다.</div>
                    <ol>
                        <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용 시 수강한 것으로 간주됩니다.</li>
                        <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 윌비스 PASS 수강을 위해 선택한 강좌의 각각 단과 정가 기준 수강료를 차감하고 환불됩니다. (특강, 온라인모의고사 등 이용 시에도 차감)</li>
                        <li>수강시작일로부터 60일 초과 또는 차감액이 결제 금액을 초과할 시 환불 불가합니다.<br />
                            ※ 갤럭시 탭, 교재포함 상품을 구매한 경우 미개봉에 한하며 왕복 배송료 차감 후 환불. <br />
                               상품 개봉시(랩핑 및 스티커 제거 포함) 해당금액(갤럭시 탭의 경우 300,000원) 차감 후 환불. <br />
                               도서의 경우 윌비스 출판 환불규정을 따릅니다.</li>
                    </ol>
                    <p>유의사항</p>
                    <ol>
                        <li>먼저 내 강의실 (또는 나의 강의실) 메뉴로 접속합니다.</li>
                        <li>구매하신 윌비스 PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후 수강하실 수 있습니다.</li>
                        <li>윌비스 PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                        <li>윌비스 PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                            PC+Mobile 윌비스 PASS 수강 시 : PC 2대 또는 PC 1대 + 모바일 1대 (PMP 윌비스 PASS는 제공하지 않습니다.)</li>
                        <li>모바일 강좌는 스마트폰, 태블릿PC 등의 수강기기로 각 사이트의 모바일웹에 접속하여 수강하실 수 있습니다.</li>
                        <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
                    </ol>
                </div>         
			</div>
    	</div>
        <!--환불안내 팝업//-->
        

        <div id="popup2" class="Pstyle">
            <span class="b-close"><img src="http://file3.willbes.net/new_gosi/2017/01/btn_close.jpg" alt="창닫기"/></span>   
            <div class="fpcontent">    
            	<h3><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyP02.png" alt="직업훈련비 신청절차"/></h3>
                <div class="fpcontentinfo1">
                    <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyP03.jpg" alt="직업훈련비 신청절차"/>
                </div>         
			</div>
    	</div>
        <!--직업훈련비 신청절차 팝업//-->
    </div>
    <!-- End Container -->     
    
    <script src="/public/js/willbes/jquery.nav"></script>    
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });
        $( document ).ready( function() {
            var jbOffset = $( '.rLnb' ).offset();
            $( window ).scroll( function() {
            if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.rLnb' ).addClass( 'rLnb_sectionFixed' );
            }
            else {
                $( '.rLnb' ).removeClass( 'rLnb_sectionFixed' );
            }
            });
        } );
        $(document).ready(function() {
            $('.rLnb').onePageNav({
                currentClass: 'hvr-shutter-out-horizontal_active'
            });
        });

    </script>
    
    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>        
        function go_popup() {       
            $('#popup').bPopup();            
        };
        function go_popup1() {       
            $('#popup1').bPopup();            
        };
        function go_popup2() {       
            $('#popup2').bPopup();            
        };	      
        $(function(e){
            var targetOffset= $("#gridContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
        });
        
    </script>   

@stop