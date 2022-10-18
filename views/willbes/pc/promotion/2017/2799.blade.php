@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /************************************************************/

        .sky {position:fixed;top:250px;right:10px; width:120px; z-index:100;}
        .sky a {display:block; margin-bottom:10px; background:#fff; border:3px solid #ff384f; color:#ff384f; padding:15px; text-align:center; font-size:16px}
        .sky a:hover {color:#fff; background:#ff384f}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/10/2799_top_bg.jpg) no-repeat center top;}
        .evt01 {}
        .evt01 .wrap .choice {position:absolute; top:461px; width:1000px; left:65px; z-index: 2; display:flex; flex-wrap: wrap;}
        .evt01 .wrap .choice label {width:190px; height:88px; text-align:left; cursor: pointer; margin-right:10px; margin-bottom:35px; display:block; align-self: auto;}
        .evt01 .wrap .choice input {width:20px; height:20px; margin:8px 0 0 20px;}
        .evt01 .wrap .btn01 {display:block; position:absolute; top:842px; width:40%; left:50%; margin-left:-20%; padding:15px 0; font-size:24px; text-align:center; background:#333; color:#fff; border-radius:30px}
        .evt01 .wrap .btn01:hover {background:#3c8340;}
        .evt01 .wrap p {position:absolute; top:905px; width:100%; font-size:14px; text-align:center; z-index: 2;}
        .evt01 .wrap01 h4 {font-size:30px; color:#000; text-align:left; margin:50px 0 20px; padding-left:20px}

        .evt02 {width:1120px; margin:0 auto 50px; position:relative; text-align:left}
        .evt02 h5 {font-size:30px; margin-bottom:20px}
        .evtMenu ul {display:flex; flex-wrap: wrap; justify-content: space-between; margin-bottom:20px; width:1120px; margin:0 auto}
        .evtMenu li a {display:block; border:1px solid #fc384c; background:#ff6376; color:#fff; font-size:14px; text-align:center; margin-right:1px; padding:15px 10px; line-height:1.4}
        .evtMenu li a:hover,
        .evtMenu li a.on {border-bottom:1px solid #fff; color:#454545; background:#fff}
        .evtMenu li:last-child a {margin:0}
       
        .tabCts {width:1120px; margin:0 auto; /*margin-top:100px;*/ padding-top:100px}
        .tabCts .sTitle {font-size:18px; font-weight:bold; margin-bottom:10px}
        .tabCts:first-child {margin-top:30px; padding-top:0}

        .fixed {position:fixed; top:0; left:50%; width:1120px; margin-left:-560px; background:#fff; z-index:10}
        
        .evt03 {width:1120px; margin:100px auto 150px; position:relative; text-align:left}
        .evt03 h5 {font-size:30px; margin-bottom:20px; border-bottom:1px solid #333; padding-bottom:10px}
        .evt03 h5 strong {color:#ff6376}
        .evt03 h5 span {font-size:14px; vertical-align:bottom}
        .evt03 .infotext {height:200px; padding:30px; border:1px solid #ccc; overflow-y:scroll; margin-bottom:10px}
        .evt03 .infotext li {list-style: demical; margin-left:20px; margin-bottom:10px}
        .evt03 .checkinfo {font-size:16px; color:#b62335}
        .evt03 input[type=checkbox] {width:18px; height:18px}
        .evt03 table{width:100%; border:1px solid #c1c1c1}
        .evt03 table tr{border-bottom:1px solid #c1c1c1}
        .evt03 table th{background:#e4e4e4; color:#333; font-size:16px; padding:10px; text-align:center}
        .evt03 table td{font-size:14px; color:#000; font-weight:300; text-align:left; padding:10px}
        .evt03 table td:last-of-type{border-right:0}
        .evt03 input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt03 input[type=file] {height:30px; color:#494a4d; vertical-align:middle;}
        .evt03 .btns {margin-top:40px; text-align:center}
        .evt03 .btns a {display:inline-block; width:260px; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#7f7f7f; margin:0 10px; border-radius:40px}
        .evt03 .btns a:first-child {background:#ff6376; }
        .evt03 .btns a:hover {background:#000}
        .freelecList {margin-top:100px}        
        .freelecwrap {display:flex; flex-flow: row wrap; justify-content: space-between; padding-left:40px; background:url(https://static.willbes.net/public/images/promotion/2022/10/2799_04.jpg) no-repeat 90% 85%;}   
        .freelecbox  {margin-bottom:30px; width:25%}   
        .freelecbox .lecimg {position: relative;}
        .freelecbox .lecimg div {position: absolute; top:15px; left:15px}
        .freelecbox .lecimg div p {margin-bottom:10px; color:#010101; text-shadow:1px 1px 1px #fff}
        .freelecbox .lecimg div p:nth-child(2) {font-size:18px; color:#b42235; font-weight:bold}
        .freelecbox .lecimg div p:nth-child(3) {font-size:18px; font-weight:bold}
        .freelecbox ul {margin-top:10px; font-size:16px}
        .freelecbox li {margin-bottom:5px;}
        .freelecbox label:hover {cursor:pointer}    
        
        .evt04 {margin-bottom:150px}

        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#warm_up">
                Warm-up<br>
                class<br>
                수강신청<br>
                👇
            </a>  
            <a href="#freelec">
                인강 7일<br>
                무료체험<br>
                신청하기<br>
                👇
            </a>  
        </div>  

        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2022/10/2799_top.jpg" alt="웜업 클래스"/>
        </div>

        <div class="evtCtnsBox evt01">
        	<img src="https://static.willbes.net/public/images/promotion/2022/10/2799_01.jpg" alt="웜업 클래스란?"/>
        </div>

        <div class="evtCtnsBox evt02" id="warm_up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/10/2799_02.jpg" alt="웜업 클래스 수강신청"/>
            <h5 class="NSK-Black">강좌선택</h5>
        </div>

        <nav class="evtMenu">
            <ul>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab01')" class="tab">전공국어<br>송원영 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab02')" class="tab">전공국어<br>권보민 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab03')" class="tab">전공국어<br>구동언 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab04')" class="tab">전공영어<br>김유석 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab05')" class="tab">전공영어<br>김영문 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab06')" class="tab">전공수학<br>김철홍 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab07')" class="tab">수학교육론<br>박태영 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab08')" class="tab">전공화학<br>강 철 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab09')" class="tab">도덕윤리<br>김병찬 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab10')" class="tab">전공역사<br>김종권 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab11')" class="tab">전기.전자.통신<br>최우영 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab12')" class="tab">전공중국어<br>장영희 교수</a></li>
            </ul>
        </nav>

        <div>
            <section class="tabCts tab01">
                <div class="sTitle">전공국어 송원영 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif    
            </section>

            <section class="tabCts tab02">
                <div class="sTitle">전공국어 권보민 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif    
            </section>

            <section class="tabCts tab03">
                <div class="sTitle">전공국어 구동언 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif    
            </section>
            
            <section class="tabCts tab04">
                <div class="sTitle">전공영어 김유석 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                @endif    
            </section>

            <section class="tabCts tab05">
                <div class="sTitle">전공영어 김영문 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))
                @endif    
            </section>

            <section class="tabCts tab06">
                <div class="sTitle">전공수학 김철홍 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>6))
                @endif    
            </section>

            <section class="tabCts tab07">
                <div class="sTitle">수학교육론 박태영 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>7))
                @endif    
            </section>

            <section class="tabCts tab08">
                <div class="sTitle">전공화학 강 철 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>8))
                @endif    
            </section>

            <section class="tabCts tab09">
                <div class="sTitle">도덕윤리 김병찬 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>9))
                @endif    
            </section>

            <section class="tabCts tab10">
                <div class="sTitle">전공역사 김종권 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>10))
                @endif    
            </section>

            <section class="tabCts tab11">
                <div class="sTitle">전기.전자.통신 최우영 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>11))
                @endif    
            </section>

            <section class="tabCts tab12">
                <div class="sTitle">전공중국어 장영희 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>12))
                @endif    
            </section>
        </div>

        <div class="evtCtnsBox evt03" id="freelec">
        	<img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03.jpg" alt="인강 무료체험 신청"/>
            <h5 class="NSK-Black">이벤트참여 사전 동의사항 <span class="NSK">* 윌비스임용의 본 이벤트 참여를 위해서는 아래 명시된 사항을 자세히 읽어 보시고 동의를 해주셔야 가능합니다.</span></h5>
            <ul class="infotext">
                <li>개인정보 수집 이용 목적<br>
                - 본 이벤트의 대상자(대학교(원)의 재학생) 확인 및 각종 문의사항 응대<br>
                - 통계분석 및 기타 마케팅에 활용<br>
                - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공 </li>
                <li>개인정보 수집 항목<br>
                - 필수 항목 : 성명, 본사ID, 연락처, 재학중인 학교와 학과(학부)의 재학생 임을 인증할 수 있는 서류(재학증명서, 성적증명서 등)<br>
                - 문화상품권 수령자: 주민등록증 사본 </li>
                <li>개인정보 이용기간 및 보유기간<br>
                - 본사의 이용 목적 달성되었거나, 신청자의 해지 요청 및 삭제요청 시 바로 파기 </li>
                <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
                <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
            </ul>
            <div class="checkinfo"><label><input type="checkbox"> 이벤트참여에 따른 개인정보 및 마케팅활용 동의하기(필수)</lebal></div>
            <h5 class="NSK-Black mt50">재학생 인증 <span class="NSK">* 윌비스임용의 본 이벤트의 대상자는 임용시험준비를 시작하는 대학교(원)의 재학생입니다.</span></h5>
            <div>
                <table>
                    <col width="18%">
                    <col width="25%">
                    <col width="15%">
                    <col width="20%">
                    <col width="15%">
                    <col>
                    <tr>
                        <th>이름</th>
                        <td>&nbsp;</td>
                        <th>윌비스 ID</th>
                        <td>&nbsp;</td>
                        <th>연락처</th>
                        <td><input type="text" placeholder="{{sess_data('mem_phone')}}" readonly></td>
                    </tr>
                    <tr>
                        <th>대학교(원)/학부(학과)</th>
                        <td><input type="text" style="width:100%" name="register_data2" id="register_data2" disabled maxlength="10"></td>
                        <th>재학생인증 파일</th>
                        <td colspan="3">
                            <div>
                                <input type="file" id="attach_file" name="attach_file" onchange="chkUploadFile(this);" style="width:60%"/>&nbsp;&nbsp;
                                <a href="javascript:void(0);" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a>

                                <p class="tx12 mt10">*파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등)만 가능합니다.</p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mt10">* 재학생 인증 파일은 <strong>재학증명서, 성적증명서 등 재학생임을 인증할 수 있는 서류</strong>만 인정됩니다. (학생증 X)</div>
            <div class="btns">
                <a href="javascript:void(0);" onclick="fn_submit();">확인</a>
                <a href="javascript:void(0);" onclick="reset_form(this);">취소</a>
            </div>
            <div class="freelecList">
                <h5 class="NSK-Black">인강 <strong>7일 무료체험</strong> 강좌 <span class="NSK">* 본 무료체험 최대 4개강좌까지 신청이 가능합니다.</span></h5>
                <div class="freelecwrap">
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t01.jpg" alt=""/>
                            <div>
                                <p>합격할 수 있는<br> 구체적 방법 제시!!</p>
                                <p>국어교육론<br> 문학교육론</p>
                                <p>송원영 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 문학교육론 이론정리</label></li>
                            <li><label><input type="checkbox"> 국어교육론 이론정리</label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t02.jpg" alt=""/>
                            <div>
                                <p>시험 출제 교수진의<br> 의도가 잘 반영된 강의! </p>
                                <p>국어문법</p>
                                <p>권보민 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 현대 국어문법 기초 </label></li>
                            <li><label><input type="checkbox"> 중세 국어 문법 기초 </label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t03.jpg" alt=""/>
                            <div>
                                <p>지금, 여기!!<br> 깨어있는 국어교육!</p>
                                <p>전공국어</p>
                                <p>구동언 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 학교문법의 이해</label></li>
                            <li><label><input type="checkbox"> 국어교육의 이해</label></li>
                            <li><label><input type="checkbox"> 문학교육의 이해</label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t04.jpg" alt=""/>
                            <div>
                                <p>합격생이 추천하는<br> 명품강의!!</p>
                                <p>일반영어<br> 영미문학</p>
                                <p>김유석 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 영미문학, 영미시의 이해</label></li>
                            <li><label><input type="checkbox"> 일반영어 Power Reading Skills</label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t05.jpg" alt=""/>
                            <div>
                                <p>영어학의 정석!<br>합격의 가장 빠른 길!!</p>
                                <p>영어학</p>
                                <p>김영문 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 영어학 기본이론 </label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t06.jpg" alt=""/>
                            <div>
                                <p>합격 전략에 기반을 둔,<br> 명쾌한 전공수학!</p>
                                <p>전공수학</p>
                                <p>김철홍 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 대수학과 정수론</label></li>
                            <li><label><input type="checkbox"> 해석학</label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t07.jpg" alt=""/>
                            <div>
                                <p>학습방법. 시기,<br>학습량의 균형!!<br>최적의 커리큘럼!</p>
                                <p>수학교육론</p>
                                <p>박태영 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 신론과 기출을 결합한 이론 </label></li>
                            <li><label><input type="checkbox"> 수학교육론 지도서 정리반 </label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t08.jpg" alt=""/>
                            <div>
                                <p>학적중!<br> 신뢰의 이름!!</p>
                                <p>전공역사</p>
                                <p>김종권 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 전공역사 개념 구조화 </label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t09.jpg" alt=""/>
                            <div>
                                <p>합격으로 가는<br>가장 빠르고<br> 안전한 방법!!</p>
                                <p>전기.전자.통신</p>
                                <p>최우영 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 기초 전기전자/회로이론</label></li>
                        </ul>
                    </div>
                    <div class="freelecbox">
                        <div class="lecimg">
                            <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_03_t10.jpg" alt=""/>
                            <div>
                                <p>20년 강의 경력,<br> 임용 중국어<br> 합격의 기준!!</p>
                                <p>전공중국어</p>
                                <p>장영희 <span>교수</span></p>
                            </div>
                        </div>
                        <ul>
                            <li><label><input type="checkbox"> 임용 중국어 입문반</label></li>
                            <li><label><input type="checkbox"> 중국어 독해 입문반</label></li>
                        </ul>
                    </div>
                    <div class="freelecbox"></div>
                    <div class="freelecbox"></div>
                </div>
                <div class="btns">
                    <a href="#none">인강 무료체험 신청하기</a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <div class="wrap">
        	    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_05.jpg" alt="웜업 클래스란?"/>
                <a href="https://ssam.willbes.net/landing/show/lcode/1035/cate/3134/preview/Y" target="_blank" title="임용시험이란?" style="position: absolute; left: 40.89%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
                <a href="https://ssam.willbes.net/examInfo/notice" target="_blank" title="시험공고문 확인" style="position: absolute; left: 54.02%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
                <a href="https://ssam.willbes.net/support/examQuestion/index" target="_blank" title="임용시험 기출문제" style="position: absolute; left: 67.23%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
                <a href="https://ssam.willbes.net/examInfo/trend" target="_blank" title="최근 10년 동향" style="position: absolute; left: 81.07%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[Warm-Up class 수강] 시 유의사항</h4>
                <ul>
                    <li>본 강좌는 2024학년도 시험을 대비하기 위한 선행학습 과정으로 결제일(또는 수강 시작일)에 관계없이 2022년 12월31일[토]까지 수강할 수 있습니다.</li>
                    <li>본 강좌는 할인율이 큰 강좌로 모든 강의는 1배수로 제공됩니다.</li>
                    <li>본 강좌는 일시정지 및 유료 연장이 불가하며, 12월31일 이후 자동 종료됩니다. 학습 일정에 참고해 주시기 바랍니다.</li>
                    <li>환불 정책 <br>
                        - 본 강좌는  결제 후, 7일 이내의 강의 시작 전인 경우에는 100% 환불이 가능합니다.<br>
                        - 하지만, 결제 후 7일 이내임에도 불구하고, 강의가 시작되었다면 환불이 불가한 특별할인 강좌입니다. (신중하게 결정하시기 바랍니다.)</li>
                    <li>본 강좌에 필요한 교재는 별도로 구매하셔야 합니다. </li>
                    <li>본 이벤트로 인한 할인 결제한 강의는 양도 및 매매가 불가능하며, 위반(적발)시 처벌받을 수 있습니다.</li>
                </ul>
                <h4 class="NSK-Black mt100">[인강 무료 체험하기] 유의사항</h4>
                <ul>
                    <li>본 이벤트는 교원임용시험을 처음 도전하는 대학교(원) 재학생만 참여 가능한 이벤트 입니다. (기존 수강생은 참여할 수 없습니다)<br>
                        - 본 이벤트는 상단의 “재학생 인증창”에 학교명과 학과명을 표기하고, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br>
                        - 재학생임을 인증하는 서류로 학생증은 인정되지 않으며, 1개월 이내 발급된 재학증명서, 성적증명서 등 본인이 현재 재학생임을 입증하는 서류여야 합니다.</li>
                    <li>강의제공 방식<br>
                        - 재학생 인증절차 후, 체험하고자 하는 강의를 신청하시면 됩니다. (강의는 최대 4개 까지만 가능합니다)<br>
                        - 강좌별 체험기간은 7일이며, 강의시간은 1배수로 제공됩니다. (※ 1배수란? 강의진행 시간만큼만 재생이 가능합니다)<br>
                        - 강좌체험을 신청하면, 일정기간 심사 후, 개별 ID에 신청하신 과목의 강의가 7일간 제공됩니다.</li>
                    <li>본 이벤트는 재학중인 학과와 관련된 강좌만 제공받을 수 있습니다. </li>
                    <li>본 이벤트는 중등과정만 진행됩니다. (유치원, 초등은 진행되지 않습니다)</li>
                    <li>본 강의체험에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 이벤트의 무료체험강의를 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        let section02 = document.querySelector('.tab01');
        let evt03 = document.querySelector('.evt03');
        let navBar = document.querySelector('nav');
        window.addEventListener('scroll', function(){
            // nav 아래로 스크롤시 nav 상단고정
            if ( window.pageYOffset > section02.offsetTop ) {
                navBar.classList.add('fixed');
                if(window.pageYOffset > evt03.offsetTop){
                    $('.evtMenu').css('opacity', '0');
                }
                else{
                    $('.evtMenu').css('opacity', '1');
                }
            } else {
                navBar.classList.remove('fixed'); 
            }

            let tabs = $('.tab');
            let sections = $('section')
            sections.each( function(i,el){
                if(window.pageYOffset >= el.offsetTop && window.pageYOffset < el.offsetTop + el.offsetHeight){
                    tabs.eq(i).addClass('on');
                    tabs.eq(i).parent('li').siblings().children().removeClass('on');
                }
            })
        })
        
        function scrolling(target){
            $('html, body').stop().animate({scrollTop: $(target).offset().top});
        }
        
    </script>


@stop