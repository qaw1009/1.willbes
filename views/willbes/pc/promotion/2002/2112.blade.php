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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .sky {position:fixed; width:160px; top:200px;right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt00 {background:#0a0a0a}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2021/03/2112_top_bg.jpg") no-repeat center top;} 

        .evt02 {background:#013b72;}   

        .evt03 {background:#ececec;padding-bottom:100px;}
        .evt03 .passLecBuy {position:relative; width:1120px; margin:0 auto;  }
        .evt03 .passLecBuy .price {background:url(https://static.willbes.net/public/images/promotion/2020/12/1976_01_bg.jpg) repeat-y center;} 
        .evt03 .passLecBuy ul {width:100%;margin-left:90px;}
        .evt03 .passLecBuy li {display:inline; float:left; text-align:left; line-height:30px; font-size:14px; color:#000;width:28%;}
        .evt03 .passLecBuy li div {font-size:14px; font-weight:bold; background:#151426; color:#fff; text-align:left; padding:15px 30px; 
            border-radius:10px; margin:0 20px}
        .evt03 .passLecBuy li:last-child {margin-right:0}
        .evt03 .passLecBuy li:last-child p {font-size:16px}
        .evt03 .passLecBuy .price strong {font-family:Verdana, Geneva, sans-serif; font-size:30px}
        .evt03 .passLecBuy ul:after {content:""; display:block; clear:both}        
        .evt03 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt03 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evt03 input:checked + label {border-bottom:1px dashed #0d3692} /*컬러변경*/
        .evt03 .passLecBuy span {position:absolute; top:1070px; left:222px; z-index:10; font-size:16px; color:#000}
        .evt03 .passLecBuy span label {border-bottom:0}
        .evt03 .passLecBuy span input:checked + label {border-bottom:0}

        .evt03 .passLecBuy .liveBox input {position:absolute; top:218px; left:230px; width:30px; height:30px;}
        .evt03 .passLecBuy .totalPrice {width:930px; margin:100px auto; font-size:36px; color:#fff; background:#000; border-radius:60px; height:80px; line-height:80px}
        .evt03 .passLecBuy .totalPrice strong {color:#ffe500}
        .evt03 .passLecBuy .totalPrice a {background:#c00d0d; display:inline-block; padding:0 30px; float:right;border-radius:0 60px 60px 0; }
        .evt03 .passLecBuy .totalPrice:after {content:''; display:block; clear:both}

        .evt03 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; text-align:left; letter-spacing:-1px;}
        .evt03 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt03 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}

        .evt03 .passLecbtn {width:980px; margin:0 auto; padding:40px 20px 80px; background:#898989}
        .evt03 .passLecbtn ul {border:1px solid #000; background:#fff; box-shadow: 0 5px 10px rgba(0,0,0,.5);}
        .evt03 .passLecbtn li {display:inline; float:left; width:100%; color:#000; height:80px; line-height:80px}
        .evt03 .passLecbtn li a {background:#000; color:#fff; display:block; font-size:26px;}
        .evt03 .passLecbtn li a:hover {background:#0d3692}
        .evt03 .passLecbtn span {margin-left:50px}
        .evt03 .passLecbtn ul:after {content:""; display:block; clear:both}

        .evt05 {background:#1a1a1a;}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1000px; margin:0 auto; padding:100px 0; font-size:14px}
        .content_guide_wrap .guide_tit{margin-bottom:50px; text-align:left; font-size:30px;}

        .content_guide_wrap .tabs {width:1000px; margin:0 auto;} 
        .content_guide_wrap .tabs li {display:inline; float:left; width:33.3333%}
        .content_guide_wrap .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box {width:1000px; margin:0 auto; border:2px solid #202020; border-top:0; padding-top:30px}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px; line-height:1.5}
        .content_guide_box dd li span {vertical-align: top;}
        .content_guide_box .step {display:inline-block; float:left; width:23%; border:1px solid #c4c4c4; margin-top:10px; margin-right:2%; text-align:center; line-height:1.2}
        .content_guide_box .step h4 {color:#fff; font-size:18px; background:#c4c4c4; padding:10px 0}
        .content_guide_box .step h5 {font-size:18px; color:#333; font-weight:bold; margin-bottom:20px}
        .content_guide_box .step div {padding:20px; min-height:200px; font-size:14px}
        .content_guide_box .step span {color:#fd4e3d; font-size:10px;}
        .content_guide_box dd:after {content:""; display:block; clear:both}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday div {font-size:22pt;color:#000; margin-top:10px;}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:12px; color:#999; margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul li:last-child span {display:block; margin-top:10px}
        .newTopDday ul:after {content:""; display:block; clear:both}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" id="chk_price" name="chk_price" value="0"/>
    </form>

    <div class="evtContent NSK" id="evtContainer">        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>윌비스 신광은 경찰 2021~22대비</span>
                        <div class="NSK-Black">0원 PASS {{$arr_promotion_params['turn']}}기</div>
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
                        <a href="#pass" target="_self">수강하기 &gt;</a>
                        <span class="NSK-Black">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_top.jpg" alt="스파르타 온라인 패스 관리반" />               
        </div>

        <div class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_01.jpg" alt="지금 당장 필요한건?" />               
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_02.jpg" alt="스페셜 혜택" />               
        </div>

        <div class="evtCtnsBox evt03" id="pass">
            <div class="passLecBuy">
                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_03_01.jpg"  alt="신광은경찰PASS">
                </div>   

                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_03_02.jpg"  alt="신광은경찰PASS">
                </div>    

                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_03_03.jpg"  alt="온라인 PASS 바로가기" usemap="#Map2112_pass" border="0">
                    <map name="Map2112_pass" id="Map2112_pass">
                        <area shape="rect" coords="301,367,817,474" href="javascript:go_PassLecture('1074');" alt="온라인 pass 바로가기" />
                    </map>
                </div>           

                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 신광은 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                    <p>
                        ※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br />
                        ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                        ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br />
                        ※ 재수강 & 환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
                    </p>
                </div>

            </div>
        </div>  
        
        <div class="evtCtnsBox evt01_04" id="coupon_box">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_04.jpg" alt="쿠폰 받기" />
                <a href="javascript:void(0);" title="쿠폰받기" onclick="giveCheck();" style="position: absolute; left: 39.59%; top: 78.87%; width: 20.82%; height: 5.8%; z-index: 2;"></a>
            </div>
        </div>       

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2112_05.jpg"  alt="최정예 교수진" />
        </div>

        <div class="content_guide_wrap" id="tab">
            <p class="guide_tit">윌비스 <span class="NSK-Black tx-blue">신광은경찰 PASS </span>유의사항 </p>
            <ul class="tabs">
                <li><a href="#tab1">0원 무제한 PASS</a></li>
                <li><a href="#tab2">12개월 PASS</a></li>
                <li><a href="#tab3">2021년 대비 PASS</a></li>
            </ul>

            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>0원 무제한 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 2021년 시험 최종합격 시 수강료 전액 환급, 불합격 시 다음시험까지 1회 수강기간 연장되는 상품입니다.</li>
                            <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.<br>
                            (수강가능 교수진 확인하기 > 형사소송법/형사법/수사 : 신광은 교수님, 형법/헌법 : 김원욱 교수님, 경찰학개론/행정법 : 장정훈 교수님, 영어 : 하승민 교수님/김현정 교수님/김준기 교수님, 한국사/한능검 : 원유철 교수님, 오태진 교수님, G-TELP : 김준기 교수님, 실용글쓰기 : 박우찬 교수님)</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            <li>최종합격 인증 후 환급 시 보유한 PASS 수강기간은 종료됩니다. (수강기간 갱신 불가)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은경찰PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>교재 포인트가 포함된 상품을 구매할 경우 결제 완료되는 즉시 포인트가 지급됩니다.</li>
                            <li class="tx-red">교재 포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>최종합격 시 환급 안내 (2021년 시험 최종합격 시)</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>환급 시 상품 결제 금액에서 지급된 혜택만큼 차감 후 환급됩니다. (제세공과금 22% 제외)<br>
                                ※지급된 혜택(포인트 등)을 사용하지 않았어도 지급된 만큼 차감 후 환급금 책정</li>
                            <li>2021년 순경 공채 시험 최종합격 및 인증자료를 제출하여야 환급금 지급 대상이 됩니다.<br>
                                ※환급 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                            <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 <span class="tx-red">1개월 이내</span>에만 가능합니다.</li>
                            <li>패스 수강 기간 내에 합격예측 서비스 1회 이상 참여해주셔야 합니다. <br>
                                (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야합니다.)</li>
                            <li>패스 수강기간 내에 전국 모의고사 및 빅매치 모의고사를 <span class="tx-red">모두</span> 응시하여야 합니다.<br>
                                (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)</li>
                            <li>환급 신청 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게 환급 가능합니다.<br>
                                - 제출 서류 (모든 제출 서류는 반드시 윌비스 신광은 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                                ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                                ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                                ③ 신분증 사본 : 제세공과금 세무증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                                ④ 통장사본 : 수강료 환급 받을 수강생 본인 명의 통장<br>
                                ⑤ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                                ⑥ 개인정보 수집 및 활용 동의서  : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                                ⑦ 윌비스신광은경찰 합격예측서비스 & 모의고사 내역  : 시험 후 오픈되는 합격예측서비스 참여 인증 캡쳐 및 윌비스신광은경찰 모의고사 전체 응시 내역<br>
                                * 전국모의고사 및 빅매치 모의고사 중 온라인 경행경채직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다. (* 학원모의고사에 따라 진행)</li>
                            <li>최종합격자 발표일로부터 1개월경과 후 요청 시에는 환급이 불가합니다.</li>
                            <li>유료 수강기간(12개월)이 최종합격자 발표일로부터 1개월 이내에 종료될 시에는 인증기한은 수강기간일 마지막 일까지입니다.</li>
                            <li>자세한 환급신청 방법은 <span class="tx-red">공지사항</span>에서 확인 바랍니다. </li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강기간 연장</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>0원 무제한 PASS는 갱신형 상품입니다. 시험 응시 후 불합격 인증하여야 수강기간이 갱신되며, 1회 다음 시험 최종합격자 발표일까지 무료 연장됩니다.</li>
                            <li>수강기간 갱신이 필요한 경우 갱신 신청 기간 내에 직전 시험 불합격 증빙(응시표, 성적표)자료를 제출하셔야 합니다.</li>
                            <li>불합격 인증 시에 전과목 0점일 경우 수강기간 갱신은 불가능합니다.</li>
                            <li>시험 접수 후 시험에 응시하지 못한 경우 수강기간 갱신 불가합니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            <li>상품에 등록된 과목 이외의 다른 강의는 추가 제공되지 않습니다.</li>
                            <li>구매일로부터 12개월(365일)간 유료 수강 가능하며, 갱신 신청한 수강생에 한하여 1회 다음 차수 시험 최종합격자 발표일까지 무료 연장됩니다.</li>
                            <li>갱신되어 제공되는 기간의 강의는 무료서비스이며, 환불대상이 아닙니다.</li>
                            <li>자세한 수강기간 갱신 방법은 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. 
                                (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>교재 포인트를 사용했을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.(교재 포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 
                                ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 초기화 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <div class="content_guide_box" id="tab2">
                <dl>
                    <dt>
                        <h3>12개월 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 12개월간 수강 가능한 상품입니다.</li>
                            <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.<br>
                            (수강가능 교수진 확인하기 > 형사소송법/형사법/수사 : 신광은 교수님, 형법/헌법 : 김원욱 교수님, 경찰학개론/행정법 : 장정훈 교수님, 영어 : 하승민 교수님/김현정 교수님/김준기 교수님, 한국사/한능검 : 원유철 교수님, 오태진 교수님, G-TELP : 김준기 교수님, 실용글쓰기 : 박우찬 교수님)</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은경찰PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>                                 

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.
                                 (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>교재 포인트를 사용했을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.(교재 포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 
                                ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 초기화 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>
                    
                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>
                    
                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <div class="content_guide_box" id="tab3">
                <dl>
                    <dt>
                        <h3>2021년 대비 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 21년 2차 시험일 8/21까지 수강 가능한 상품입니다.</li>
                            <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.<br>
                            (수강가능 교수진 확인하기 > 형사소송법/수사 : 신광은 교수님, 형법 : 김원욱 교수님, 경찰학개론/행정법 : 장정훈 교수님, 영어 : 하승민 교수님, 한국사 : 원유철 교수님, 오태진 교수님, 실용글쓰기 : 박우찬 교수님)</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수 수강 할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>  

                    <dt>
                        <h3>교재</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은경찰PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>교재 포인트를 사용했을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.(교재 포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 
                                ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 초기화 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>

                </dl>
            </div>

        </div>
        <!-- content_guide_wrap //-->
    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        {{-- 패스, 총 결제금액 --}}
        function fnChkPrice(obj,depth){
            var add_price = 0;
            var total_price;
            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            var order_yn = 'Y';

            switch (depth){
                case 1: // 무제한 pass, 12개월 pass
                    if($(obj).is(':checked') === true){
                        $("input[name='y_pkg']").prop("checked", false);
                        $(obj).prop("checked", true);
                        $('#chk_price').val($(obj).data('sale-price'));

                        $("#add_prod_wrap").removeClass('d_none');
                    }else{
                        $('#chk_price').val(0);
                        $("input[name='y_pkg']").prop("checked", false);
                    }
                    break;

                case 2: // 2021년대비 pass
                    if($(obj).is(':checked') === true){
                        $("input[name='y_pkg']").prop("checked", false);
                        $(obj).prop("checked", true);
                        $('#chk_price').val($(obj).data('sale-price'));

                        $("#add_prod_wrap").addClass('d_none');
                    }else{
                        $('#chk_price').val(0);
                    }
                    break;

                case 3: // 한정판매
                    if($(obj).is(':checked') === true){
                        if(order_cnt === 0 && $("#y_pkg1").is(':checked') === false && $("#y_pkg2").is(':checked') === false){
                            order_yn = 'N';
                        }else{
                            add_price = $(obj).data('sale-price');
                        }
                    }
                    break;

                default: break;
            }

            if(order_yn === 'N'){
                $("#y_pkg4").prop("checked", false);
                alert('0원 무제한 PASS 또는 12개월 PASS 상품을 구매하셔야 합니다.');
            }else{
                total_price = parseInt($('#chk_price').val()) + parseInt(add_price);
                $("#total_price").html(addComma(total_price));
            }
        }

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($arr_promotion_params) === false)

            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';

            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
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
        
        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605005&course_idx=&subject_idx=/') }}' + code;
            location.href = url;
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
            if(url.indexOf("tab3") > -1){
                var activeTab = "#tab3";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab3']").addClass("active");
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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or ""}}');
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