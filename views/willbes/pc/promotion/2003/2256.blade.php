@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;  
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:225px; width:137px; right:5px; z-index:200;}
        .sky a {display:block; margin-bottom:5px;}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
        .newTopDday ul {width:1120px; margin:0 auto;}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:1.3;}
        .newTopDday ul li:first-child span { font-size:28px; color:#000; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}
         
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2256_top_bg.jpg) no-repeat center top;}   
        .wb_cts00 {background:#000;}    

        .wb_cts02 {background:#f4f4f4;}  

        .wb_cts04 {background:url(https://static.willbes.net/public/images/promotion/2022/06/2256_04_bg.jpg) no-repeat center top;}

        .wb_cts05 {padding-bottom:150px; background:#fff;}
        .wb_cts05 {padding-bottom:150px; background:#fff; width:1120px; margin:0 auto}
        .wb_cts05 .title {font-size:50px; line-height:1.2; margin-bottom:40px; color:#373737;}
        .wb_cts05 .title span {vertical-align:top;color:#C23227;}

        .lecWrap {display:flex; flex-wrap: wrap; width:1120px; margin:auto; line-height:1.5; font-size:14px}
        .lecWrap .pass {/*width:calc(25% - 10px);*/ margin-bottom:10px; margin-right:10px; flex: 1 1 24%; position: relative;}
        .lecWrap .pass:nth-child(4),
        .lecWrap .pass:last-child {margin-right:0}
        .lecWrap .pass div {font-size:22px}
        .lecWrap .pass div:nth-child(1) {font-size:20px; font-weight:600; color:#c23227; letter-spacing:-1px}
        .lecWrap .pass div:nth-child(2) {font-weight:600; margin-bottom:20px}
        .lecWrap .pass div:nth-child(3) {font-weight:600; color:#c23227}
        .lecWrap .pass div:nth-child(4) strong {font-size:30px;}
        .lecWrap .pass div span {box-shadow:inset 0 -10px 0 #fde1df; color:#c23227}
        .lecWrap .pass ul {margin-top:30px}
        .lecWrap .pass li {list-style:disc; margin-left:20px; margin-bottom:5px; font-weight:bold}
        .lecWrap .pass li span {font-weight:normal; color:#666; vertical-align:top}

        .lecWrap .pass input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
        .lecWrap .pass label{display:block; border:1px solid #d7d7d7; padding:20px; text-align:left;  box-sizing: border-box; height: 100%; }
        .lecWrap .pass label:hover {cursor: pointer;}
        .lecWrap .pass input:checked + label {border:1px solid #c23227; background:#c23227; color:#fff; box-shadow:5px 5px 10px rgba(0,0,0,.3)}
        .lecWrap .pass input:checked + label div,
        .lecWrap .pass input:checked + label span{color:#fff; box-shadow:none}
        .lecWrap .pass p {position: absolute; width:70%; left:50%; top:-15px; margin-left:-35%; color:#fff; background:#c23227; padding:5px; border-radius:20px; font-size:16px; z-index: 10;}

        .check {width:980px; margin:50px auto;}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:4px;font-size:12px;} 

        .wb_cts05 .passbuy a {display:block; width:400px; margin:0 auto; background:#1c2127; color:#fff; font-size:30px; border-radius:50px; padding:20px 0; font-weight:bold}  
        .wb_cts05 .passbuy a:hover {background:#c23227; color:#fff;}

        .wb_cts06 {background:#ebebeb;}
        
        

        /* 이용안내 */
        .evtInfo {padding:80px 0; background:#f4f4f4; color:#3a3a3a; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:16px; margin-bottom:10px;}
        .evtInfoBox .infoTit strong {padding:5px 20px; border-radius:50px; background:#333; color:#fff}
        .evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#certification"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2256_sky1.jpg" alt="대학생" >
            </a>   
            <a href="#certification"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2256_sky2.jpg" alt="재도전" >
            </a>
            <a href="#certification"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2256_sky3.jpg" alt="환승시" >
            </a>                   
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>
                    최우영 T-PASS - {{$arr_promotion_params['turn']}}기<br />
                        <span class="NGEB">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</span>
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
                        남았습니다
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2256_top.jpg" alt="최우영 T-PASS" />
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2256_01.jpg" alt="시간 단축" />
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2256_02.jpg" alt="커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2256_03.jpg" alt="믿고 따라만 오세요" />
        </div>

        <div class="evtCtnsBox wb_cts06" id="certification" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2256_06.jpg" alt="바로 신청하기" />
                <a href="javascript:certOpen();" title="재도전&환승하기" style="position:absolute; left:29.91%; top:77.06%; width:39.46%; height:5.85%; z-index:2;"></a>
                <a href="#careful" title="유의사항" style="position:absolute; left:41.25%; top:84.37%; width:14.64%; height:3.84%; z-index:2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2256_04.jpg" alt="절호의 기회" />
        </div>

        <div class="evtCtnsBox wb_cts05" id="transfer" data-aos="fade-up">
            <div class="title" data-aos="fade-down">
                2023~2024년도, <span class="NSK-Black">통신/전기/전자직의 대세<br>
                최우영 교수님</span>과 함께 하세요!
            </div>
            <div>
                <div class="lecWrap">

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass09" value="198399">
                        <label for="pass09">
                            <div>2023 통신직 9급</div>
                            <div>전과목 T-PASS</div>                           
                            <div><strong class="NSK-Black">120</strong>만원</div>
                            <ul>
                                <li>2023. 7월까지 수강</li>
                                <li>통신직 9급 전 강좌제공</li>
                                <li>국가직/지방직/군무원 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                        
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass10" value="198398">
                        <label for="pass10">
                            <div>2023 전기직 9급</div>
                            <div>전과목 T-PASS</div>                           
                            <div><strong class="NSK-Black">76</strong>만원</div>
                            <ul>
                                <li>2023. 6월까지 수강</li>
                                <li>전기직 9급 전 강좌제공</li>
                                <li>국가직/지방직 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                        
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass11" value="198401">
                        <label for="pass11">
                            <div>2023 전기직 7/9급</div>
                            <div>전과목 T-PASS</div>                           
                            <div><strong class="NSK-Black">100</strong>만원</div>
                            <ul>
                                <li>2023. 10월까지 수강</li>
                                <li>전기직 7/9급 전 강좌제공</li>
                                <li>7/9급 국가직/지방직대비 </li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                        
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass12" value="198400">
                        <label for="pass12">
                            <div>2023전자직 7/9급</div>
                            <div>전과목 T-PASS</div>                           
                            <div><strong class="NSK-Black">70</strong>만원</div>
                            <ul>
                                <li>2023. 7월까지 수강</li>
                                <li>전자직 관련 강좌제공</li>
                                <li>9급 군무원 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                        
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass01" value="204384">
                        <label for="pass01">
                            <div>23~24 대비 통신직</div>
                            <div>전공과목 이론 T-PASS</div>                           
                            <div><strong class="NSK-Black">79</strong>만원</div>
                            <ul>
                                <li>2024. 7월까지 수강</li>
                                <li>통신직 9급 전 강좌제공</li>
                                <li>국가직/지방직/군무원 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                        
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass02" value="204193">
                        <label for="pass02">
                            <div>23~24 대비 9급 전기직</div>
                            <div>전공과목 이론 T-PASS</div>                          
                            <div><strong class="NSK-Black">44</strong>만원</div>
                            <ul>
                                <li>2024. 6월까지 수강</li>
                                <li>전기직 9급 전 강좌제공</li>
                                <li>국가직/지방직 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                        
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass03" value="204382">
                        <label for="pass03">
                            <div>23~24 대비 7/9급 전기직</div>
                            <div>전공과목 이론 T-PASS</div>                          
                            <div><strong class="NSK-Black">59</strong>만원</div>
                            <ul>
                                <li>2024. 10월까지 수강</li>
                                <li>전기직 7/9급 전 강좌제공</li>
                                <li>7/9급 국가직/지방직 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                    
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass04" value="204383">
                        <label for="pass04">
                            <div>23~24 대비 군무원 전자직</div>
                            <div>전공과목 이론 T-PASS</div>                           
                            <div><strong class="NSK-Black">49</strong>만원</div>
                            <ul>
                                <li>2024. 7월까지 수강</li>
                                <li>전자직 관련 강좌제공</li>
                                <li>9급 군무원 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>                       
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass05" value="203640">
                        <label for="pass05">
                            <div>2023 방송통신직 9급</div>
                            <div>문제풀이 T-PASS</div>                           
                            <div><strong class="NSK-Black">69</strong>만원</div>
                            <ul>
                                <li>2023. 4월 국가직까지 수강</li>
                                <li>9급 문풀 강좌제공</li>
                                <li>국가직 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass06" value="203646">
                        <label for="pass06">
                            <div>2023 통신직 9급</div>
                            <div>문제풀이 T-PASS</div>                           
                            <div><strong class="NSK-Black">79</strong>만원</div>
                            <ul>
                                <li>2023. 6월까지 수강</li>
                                <li>9급 문풀 강좌제공</li>
                                <li>지방직 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass07" value="203639">
                        <label for="pass07">
                            <div>2023 전기직 9급</div>
                            <div>문제풀이 T-PASS</div>                           
                            <div><strong class="NSK-Black">59</strong>만원</div>
                            <ul>
                                <li>2023. 6월까지 수강</li>
                                <li>9급 문풀 강좌제공</li>
                                <li>국가직/지방직 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass08" value="203650">
                        <label for="pass08">
                            <div>2023 통신 9급/군무원</div>
                            <div>문제풀이 T-PASS</div>                           
                            <div><strong class="NSK-Black">99</strong>만원</div>
                            <ul>
                                <li>2023. 7월까지 수강</li>
                                <li>통신직 관련 강좌제공</li>
                                <li>9급 군무원 대비</li> 
                                <li>PC+모바일 총 2대</li>
                                <li>3배수 제한</li>                               
                            </ul>
                        </label>
                    </div>
                </div>

                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#careful">이용안내확인하기 ↓</a>
                </div>

                <div class="passbuy">
                    <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
                </div>

            </div>
        </div>



        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">T-PASS 이용안내 및 유의사항</h4>

				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
                    <li>최우영 T-PASS 제공 과정<br>
                    - 통신직, 전기직, 전자직 이론 패스는 2023 및 2024 대비 과정을 제공하는 이론패스입니다.<br>
                    - 통신직, 전기직, 전자직 문제풀이 패스 2023년 대비 과정을 제공하는 이문재풀이 패스입니다.</li>
                    <li>개강 일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                    <li>본 T-PASS 내 제공되는 과정 중 신규 개강이 진행되지 않는 경우, 전년도 진행 과정으로 대체 제공될 수 있습니다.</li>
                    <li>본 T-PASS를 통한 강의 수강 시, 각 과정당 3배수 제한이 적용됩니다.</li>
                    <li>본 상품의 이용기간은 수강신청 상세 안내화면에 표시된 기간 만큼 제공됩니다.</li>
				</ul>
                <div class="infoTit"><strong>교재안내</strong></div>
				<ul>
                    <li>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 강좌소개 및 홈페이지 상단의 [교재구매] 메뉴에서 별도로 구매 가능합니다.</li>       
				</ul>
				<div class="infoTit"><strong>기기제한</strong></div>
				<ul>
					<li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                        - PC+모바일 수강 시 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                    </li>
                    <li>계정당 최초 1회에 한해 직접 기기정보 초기화 진행 가능하며, 별도 기기정보 초기화가 추가로 필요하신 경우 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>       
				</ul>
                <div class="infoTit"><strong>수강안내</strong></div>
				<ul>
                    <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 PASS 이용 중에는 일시정지/재수강/연장 기능을 사용할 수 없습니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불</strong></div>
				<ul>
					<li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                        - 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                        * 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다.
                    </li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>             				
				</ul>

                <div class="infoTit"><strong>재도전&환승 인증 이벤트 유의사항</strong></div>
				<ul>
					<li>본 이벤트는 1아이디당 1회만 참여 가능합니다.</li>
                    <li>인증 완료 처리는 신청 후, 24시간 이내에 처리됩니다. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중으로 처리됩니다.</li>
                    <li><strong>1) 재도전 인증</strong><br>
                        - 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능합니다.<br>
                        <strong>2) 환승 인증</strong><br>
                        - 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증이 가능합니다.<br>
                        (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명이 필수로 기재되어 있어야 합니다.)</li>
                    <li>본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
                    <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                    <li>발급된 쿠폰의 사용 기간은 3일로, 본 페이지 내에서 판매 중인 PASS 상품에만 적용 가능합니다.</li>             				
				</ul>

                <div class="infoTit"><strong>윌비스 고객만족센터 1544-5006</strong></div>
			</div>
		</div> 

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});
    </script>   

    <script>    
        /* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        /*수강신청 동의*/ 
        function go_PassLecture(){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            code = $('input[name="y_pkg"]:checked').val();
            if (typeof code == 'undefined' || code == '') {
                alert('강좌를 선택해 주세요.');
                return;
            }
            location.href = "{{ front_url('/periodPackage/show/cate/3028/pack/648001/prod-code/') }}" + code;
        }     
        
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop