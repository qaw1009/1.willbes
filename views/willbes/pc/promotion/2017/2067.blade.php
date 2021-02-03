@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .btnBox a {width:500px; margin:0 auto; display:inline-block; color:#1c1c1c; background:#d96b30; font-size:30px; font-weight:bold; height:80px; line-height:80px; border-radius:40px;}
        .btnBox a:hover {background:#fff;}
    
        .evtCtnsBox input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2034_top_bg.jpg) no-repeat center top;}

        .event01 {background:#1c1c1c; padding-bottom:100px}

        .event02 {background:#e3e4e6}

        .event03 {background:#425cbb; position:relative}
        .event03 .btnBox {position:absolute; bottom:100px; left:50%; margin-left:-210px; z-index:10}
        .event03 .btnBox a {color:#fff; background:#222;}
        .event03 .btnBox a:hover {color:#222; background:#fff;}

        .onLecFree {background:#fff; padding:100px 0;}
        .onLecFreeBox {width:1100px; margin:0 auto; background:#fff; padding:50px; text-align:left}
        .onLecFreeBox h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .onLecFreeBox h5 {font-size:24px; color:#49569e; text-align:left; padding-bottom:10px; border-bottom:2px solid #49569e; margin:50px 0 20px}
        .onLecFreeBox h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .onLecFree-txt01 {text-align:left; line-height:1.3}
        .onLecFree-txt01 ul {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .onLecFreeInfo li,
        .onLecFree-txt01 li {margin-bottom:10px; list-style-type:decimal; margin-left:20px; text-align:left; font-size:14px}

        
        .onLecFreeBox .evtMenu {background:#fff; width:1000px; margin:0 auto}
        .onLecFreeBox .tabs li {display:inline; float:left; width:9.090909%}
        .onLecFreeBox .tabs li a {display:block; border:1px solid #49569e; background:#49569e; color:#fff; font-size:14px; height:40px; line-height:40px; text-align:center; margin-right:1px}
        .onLecFreeBox .tabs li a:hover,
        .onLecFreeBox .tabs li a.active {border-bottom:1px solid #fff; color:#49569e; background:#fff}
        .onLecFreeBox .tabs:after {content:''; display:block; clear:both}
        

        .onLecFreeBox .evtMenu .infotxt {font-size:14px; margin:10px 0; height:30px; line-height:30px;}
        .onLecFreeBox .evtMenu .infotxt a {float:right; display:inline-block; background:#1a8ccc; color:#fff;  padding:0 30px}
        .onLecFreeBox .evtMenu .infotxt:after {content:''; display:block; clear:both}
        .onLecFreeBox .evtMenu .choiceLec {border-top:1px solid #000; border-bottom:1px solid #000; padding:10px; line-height:1.4; font-size:12px; height:90px; overflow-y:scroll}
        .onLecFreeBox .evtMenu .choiceLec div {margin-bottom:8px}
        .onLecFreeBox .evtMenu .choiceLec span:nth-child(1) {display:inline-block; width:80px; color:#1a8ccc}
        .onLecFreeBox .evtMenu .choiceLec span:nth-child(2) {display:inline-block; width:80px;}

        .onLecFreeBox .tabCts {padding-top:160px}
        .onLecFreeBox #tab01 {padding-top:20px;}

        .evt_table{margin-bottom:30px;}
        .evt_table table{width:100%; border:1px solid #c1c1c1}
        .evt_table table tr{border-bottom:1px solid #c1c1c1}
        .evt_table table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_table table thead th,
        .evt_table table tbody th{background:#f5f5f5; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:10px}
        .evt_table table tbody td{padding:0 10px; font-size:14px; color:#000; font-weight:300; text-align:left; padding:10px}
        .evt_table table tbody td:last-of-type{border-right:0}
        .evt_table table tbody td.num{color:#999; font-weight:200}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:middle;}

        .onLecFree .btnBox a {color:#fff; background:#49569e;}
        .onLecFree .btnBox a:hover {background:#27305e;}        

        .willbes-Layer-Box{left:50% !important; margin-left:-490px; border:2px solid #000 !important;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .event09 {background:#222; padding:80px 0; line-height:1.4}
        .event09Box {width:1100px; margin:0 auto; padding:50px; background:#f0f1f2; text-align:left; letter-spacing:normal}
        .event09Box {background:#fff; border-bottom:2px solid #49569e}

        .fixed {position:fixed !important; width:1000px; background:#fff !important; z-index:100 !important;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_top.jpg" alt="인강무료체험"/>
        </div>

        <div class="evtCtnsBox event01">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_01.gif" alt="인강무료체험"/>
            <div class="btnBox">
            	<a href="#none">과목별 설명회 자세히 보기</a>
            </div>
        </div>

        <div class="evtCtnsBox event02">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_02.jpg" alt="인강무료체험"/>
        </div>

        <div class="evtCtnsBox event03">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_03.jpg" alt="인강무료체험"/>
            <div class="btnBox">
            	<a href="#none">합격수기 자세히 보기 ></a>
            </div>
        </div>


        <div class="evtCtnsBox onLecFree">
            <div class="onLecFreeBox">
            	<h4>인강 무료체험 신청하기</h4>
                <h5>이벤트참여 대상자</h5>
                <ul class="onLecFreeInfo">
                	<li><strong>대학(원)의 재학생</strong> (* 재학생 인증파일 제출이 가능한 분)</li>
				    <li><strong>윌비스 임용고시학원에 수강등록이 처음인 분</strong> (* 환불강의 포함)</li>                    
                </ul>

                <h5 class="mt100">
                    이벤트참여에 따른 사전 동의사항 <span>* 재학생 인증 서류에는 성명/학교/학과/학번이 반드시 기재되어 있어야 합니다. (미 충족시 반려될 수 있습니다.)</span>
                </h5>

                <div class="onLecFree-txt01 mB50">
                	<ul>
                    	<li>개인정보 수집 이용 목적 <br> 
                            - 본 이벤트의 대상자(대학교(원)의 재학생) 확인 및 각종 문의사항 응대<br>
                            - 통계분석 및 기타 마케팅에 활용 <br>
                            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공 </li>
                        <li>개인정보 수집 항목 <br>
                            - 필수항목 : 성명, 본사ID, 연락처, 재학중인 학교와 학과(학부), 재학생임을 인증할 수 있는 서류(재학증명서, 성적증명서 등)  </li>
                        <li>개인정보 이용기간 및 보유기간<br>
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기</li> 
                        <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
                        <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                        <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                    </ul>

                    <input name="is_chk" type="checkbox" value="Y" id="is_chk" /> <label for="is_chk"> 이벤트참여에 따른 개인정보 및 마케팅 활용 동의하기(필수)</label>
				</div>

              	<h5 class="mt100">재학생 인증 <span>* 윌비스임용의 본 이벤트의 대상자는 임용시험준비를 시작하는 대학교(원)의 재학생입니다.</span></h5>
                <div class="evt_table">
                	<table>
                        <col width="15%" />
                        <col width="20%" />
                        <col width="15%" />
                        <col width="15%"/>
                        <col width="15%" />
                        <col  />
                        <tbody>
                            <tr>
                                <th>이름</th>
                                <td>홍길동</td>
                                <th>윌비스ID</th>
                                <td>willbes</td>
                                <th>연락처</th>
                                <td><input type="text" id="register_tel" name="register_tel" value="{{ sess_data('mem_phone') }}" maxlength="11" style="width:90%" /></td>
                            </tr>
                            <tr>
                                <th>대학교(원) / <br />
                                (학부)학과</th>
                                <td>
                                <input type="text" id="register_data1" name="register_data1" maxlength="50" style="width:90%" />
                                </td>
                                <th>재학생인증<br />파일</th>
                                <td colspan="3">
                                <input type="file" id="attach_file" name="attach_file" style="width:60%"/>&nbsp;&nbsp;
                                <a onclick="javascript:del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a> <br />
                                *파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등) 또는 PDF 파일 첨부
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <h5 class="mt100">강좌 선택</h5>
                <div class="evtMenu NG">
                    <ul class="tabs">
                        <li><a href="#tab01" data-tab="tab01" class="top-tab">교육학</a></li>
                        <li><a href="#tab02" data-tab="tab02" class="top-tab">전공국어</a></li>
                        <li><a href="#tab03" data-tab="tab03" class="top-tab">전공영어</a></li>
                        <li><a href="#tab04" data-tab="tab04" class="top-tab">전공수학</a></li>
                        <li><a href="#tab05" data-tab="tab05" class="top-tab">수학교육론</a></li>
                        <li><a href="#tab06" data-tab="tab06" class="top-tab">전공역사</a></li>
                        <li><a href="#tab07" data-tab="tab07" class="top-tab">전공음악</a></li>
                        <li><a href="#tab08" data-tab="tab08" class="top-tab">전기전자</a></li>
                        <li><a href="#tab09" data-tab="tab09" class="top-tab">정보컴퓨터</a></li>
                        <li><a href="#tab10" data-tab="tab10" class="top-tab">정컴교육론</a></li>
                        <li><a href="#tab11" data-tab="tab11" class="top-tab">전공중국어</a></li>
                    </ul>

                    <div class="infotxt">
                        ⊙ 윌비스임용의 본 이벤트에서 진행하고 있는 인강무료체험 강좌는 3강좌 (교육학1, 전공2까지만 가능합니다.)
                        <a href="#none">신청하기</a>
                    </div>

                    <div class="choiceLec">
                        <div>
                            <span>교육학</span> 
                            <span>이인재 교수</span>
                            <span>
                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                <a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                            </span>                             
                        </div>
                        <div>
                            <span>전기전자통신</span> 
                            <span>최우영 교수</span>
                            <span>
                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                <a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                            </span>                             
                        </div>
                        <div>
                            <span>정보컴퓨터</span> 
                            <span>이인재 교수</span>
                            <span>
                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                <a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                            </span>                             
                        </div>
                        <div>
                            <span>교육학</span> 
                            <span>이인재 교수</span>
                            <span>
                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                <a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                            </span>                             
                        </div>
                    </div>
                </div>

                <div id="tab01" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 교육학
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        교육학
                                    </div>
                                    <div class="Name">이인재 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">교육한<br/><span class="tx-blue">이인재</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->

                            {{--상세정보팝업--}}
                            <div id="InfoForm" class="willbes-Layer-Box">
                                <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                                    <img src="{{ img_url('sub/close.png') }}">
                                </a>
                                <div class="Layer-Tit tx-dark-black NG">
                                    2018 기미진 국어 아침 실전 동형모의고사 특강[국가직 ~서울시] (3-6월)
                                </div>
                                <div class="lecDetailWrap">
                                    <ul class="tabWrap tabDepth1 NG">
                                        <li><a id="hover1" href="#ch1" class="on">강좌상세정보</a></li>
                                        <li><a id="hover2" href="#ch2">교재상세정보 (총 2권)</a></li>
                                    </ul>
                                    <div class="tabBox">
                                        <div id="ch1" class="tabLink">
                                            <div class="classInfo">
                                                <dl class="w-info NG">
                                                    <dt>학원실강의 : 2020년 1월</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">2배수</span>
                                                        <span class="nBox n2">진행중</span>
                                                        <span class="nBox n3">예정</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </div>
                                            <div class="classInfoTable">
                                                <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                                                    <colgroup>
                                                        <col style="width: 140px;">
                                                        <col width="*">
                                                    </colgroup>
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-list bg-light-white">
                                                                강좌유의사항<br/>
                                                                <span class="tx-red">(필독)</span>
                                                            </td>
                                                            <td class="w-data tx-left pl20">
                                                                LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                                                자동출력됩니다. (온라인상품기준)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-list bg-light-white">강좌소개</td>
                                                            <td class="w-data tx-left pl20">
                                                                LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                                                자동출력됩니다. (온라인상품기준)
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-list bg-light-white">강좌특징</td>
                                                            <td class="w-data tx-left pl20">
                                                                LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                                                자동출력됩니다. (온라인상품기준)
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="ch2" class="tabLink book2">
                                            <div class="bookWrap">
                                                <div class="bookInfo">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                    <div class="bookDetail">
                                                        <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                                        <div class="book-Author tx-gray">
                                                            <ul>
                                                                <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                                                <li>저자 : 저자명 <span class="row-line">|</span></li>
                                                                <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                                                <li>판형/쪽수 : 190*260 / 769</li>
                                                            </ul>
                                                            <ul>
                                                                <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                                                <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong></li>
                                                            </ul>
                                                        </div>
                                                        <div class="bookBoxWrap">
                                                            <ul class="tabWrap tabDepth2">
                                                                <li><a href="#info1" class="on">교재소개</a></li>
                                                                <li><a href="#info2">교재목차</a></li>
                                                            </ul>
                                                            <div class="tabBox">
                                                                <div id="info1" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        2018년재신정판을내면서..<br/>
                                                                        첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                                        둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                                        셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                                        기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                                    </div>
                                                                    <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                                                </div>
                                                                <div id="info2" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학<br/>
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="bookInfo">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                    <div class="bookDetail">
                                                        <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집2 (전5권)</div>
                                                        <div class="book-Author tx-gray">
                                                            <ul>
                                                                <li>분야 : 7급공무원 <span class="row-line">|</span></li>
                                                                <li>저자 : 저자명 <span class="row-line">|</span></li>
                                                                <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                                                <li>판형/쪽수 : 190*260 / 348</li>
                                                            </ul>
                                                            <ul>
                                                                <li>출판일 : 2018-12-25 <span class="row-line">|</span></li>
                                                                <li>교재비 : <strong class="tx-light-blue">40,000원</strong> (↓15%) <strong class="tx-black">[판매중]</strong></li>
                                                            </ul>
                                                        </div>
                                                        <div class="bookBoxWrap">
                                                            <ul class="tabWrap tabDepth2">
                                                                <li><a href="#info3" class="on">교재소개</a></li>
                                                                <li><a href="#info4">교재목차</a></li>
                                                            </ul>
                                                            <div class="tabBox">
                                                                <div id="info3" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        2018년재신정판을내면서..<br/>
                                                                        첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                                        둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                                        셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                                        기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                                    </div>
                                                                    <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                                                </div>
                                                                <div id="info4" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학<br/>
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                             
                        </div>
                        <!-- willbes-Lec-Table -->           

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">교육한<br/><span class="tx-blue">이인재</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                        
                        </div>
                        <!-- willbes-Lec-Table -->                         
                    </div>
                    <!-- willbes-Lec -->
                </div>    
                
                <div id="tab02" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 전공국어
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        전공국어
                                    </div>
                                    <div class="Name">송원영 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공국어<br/><span class="tx-blue">송원영</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->     

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        전공국어
                                    </div>
                                    <div class="Name">권보민 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공국어<br/><span class="tx-blue">권보민</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->        
                       
                    </div>
                    <!-- willbes-Lec -->
                </div>  

                <div id="tab03" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 전공영어
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        전공영어
                                    </div>
                                    <div class="Name">김유석 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공영어<br/><span class="tx-blue">김유석</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->     

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        전공영어
                                    </div>
                                    <div class="Name">김영문 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공영어<br/><span class="tx-blue">김영문</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->        
                       
                    </div>
                    <!-- willbes-Lec -->
                </div> 

                <div id="tab04" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 전공수학
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                    전공수학
                                    </div>
                                    <div class="Name">김철홍 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공수학<br/><span class="tx-blue">김철홍</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div> 

                <div id="tab05" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 수학교육론
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        수학교육론
                                    </div>
                                    <div class="Name">박태영 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">수학교육론<br/><span class="tx-blue">박태영</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div> 

                <div id="tab06" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 전공역사
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        전공역사
                                    </div>
                                    <div class="Name">최용림 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공역사<br/><span class="tx-blue">최용림</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab07" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 전공음악
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        전공음악
                                    </div>
                                    <div class="Name">다이애나 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공음악<br/><span class="tx-blue">다이애나</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab08" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 전기전자
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        전기전자
                                    </div>
                                    <div class="Name">최우영 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전기전자<br/><span class="tx-blue">최우영</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab09" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 정보컴퓨터
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                        정보컴퓨터
                                    </div>
                                    <div class="Name">송광진 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">정보컴퓨터<br/><span class="tx-blue">송광진</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab10" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 정컴교육론
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                    정컴교육론
                                    </div>
                                    <div class="Name">정순선 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">정컴교육론<br/><span class="tx-blue">정순선</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div>

                <div id="tab11" class="tabCts">
                    <div class="willbes-Lec NG c_both">
                        <div class="willbes-Lec-Subject tx-dark-black">
                            · 전공중국어
                            <div class="selectBoxForm">
                                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                            </div>
                        </div>
                        <!-- willbes-Lec-Subject -->

                        <div class="willbes-Lec-Profdata tx-dark-black">
                            <ul>
                                <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                <li class="ProfDetail">
                                    <div class="Obj">
                                    전공중국어
                                    </div>
                                    <div class="Name">정경미 교수</div>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-Profdata -->            

                        <div class="willbes-Lec-Line">-</div>
                        <!-- willbes-Lec-Line -->

                        <div class="willbes-Lec-Table">        
                            <table cellspacing="0" cellpadding="0" class="lecTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 85px;">
                                    <col width="*">
                                    <col style="width: 200px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list">이론반</td>
                                        <td class="w-name">전공중국어<br/><span class="tx-blue">정경미</span></td>
                                        <td class="w-data tx-left pl20 p_re">
                                            <div class="w-tit">
                                                [무료강의] 2021 1~2월 이인재 교육학 기초 이론반
                                            </div>
                                            <dl class="w-info">
                                                <dt>강의촬영(실강) : 2021년 1월</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-blue">2강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강기간 : <span class="tx-blue">7일</span></dt>
                                                <dt class="NSK ml15">
                                                    <span class="nBox n1">2배수</span>
                                                    <span class="nBox n2">완강</span>
                                                </dt><br>
                                                <dt class="mr10">
                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                        <strong>강좌상세정보</strong>
                                                    </a>
                                                </dt>
                                            </dl>
                                        </td>
                                        <td class="w-notice p_re">
                                            <input type="checkbox">                              
                                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecTable -->

                            <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                <colgroup>
                                    <col style="width: 75px;">
                                    <col style="width: 925px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                <span class="chk buybtn p_re">
                                                    <label>[판매중]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">30,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">주교재</span> 
                                                <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                <span class="chk">
                                                    <label class="soldout">[품절]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">20,000원</span>
                                                    <span class="discount">(↓10%)</span>
                                                </span>
                                            </div>
                                            <div class="w-sub">
                                                <span class="w-obj tx-blue tx11">부교재</span> 
                                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                <span class="chk">
                                                    <label class="press">[출간예정]</label>
                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                </span>
                                                <span class="priceWrap">
                                                    <span class="price tx-blue">0원</span>
                                                </span>
                                            </div>
                                            <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                            <div class="w-sub">
                                                <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- lecInfoTable -->                            
                        </div>
                        <!-- willbes-Lec-Table -->    
                       
                    </div>
                    <!-- willbes-Lec -->
                </div>

            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[필독] 인강무료체험 이벤트 유의사항</h4>
                <ul>
                    <li>본 이벤트는 교원임용시험을 처음 도전하는 대학교(원) 재학생만 참여 가능한 이벤트 입니다.(기존 수강생은 참여할 수 없습니다)<br />
                        - 본 이벤트는 상단의 “재학생 인증창”에 학교명과 학과명을 표기하고, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br />
                        - 재학생임을 인증하는 서류로 학생증은 인정되지 않으며, 1개월 이내 발급된 재학증명서, 성적증명서 등 본인이 현재 재학생임을 입증하는 서류여야 합니다.</li>
                    <li>강의제공방식<br />
                        - 재학생 인증절차 후, 체험하고자 하는 강의를 신청하시면 됩니다. (강의는 최대 3개까지만 가능하며, 교육학 1강좌, 전공 2강좌로 제한됩니다)<br />
                        - 강좌별 강의체험기간은 14일이며, 강의시간은 1배수 형태로 제공됩니다.  (※ 1배수란? 강의진행 시간만큼만 재생이 가능합니다) <br />
                        - 일정기간 심사 후, 개별 ID에 신청하신 과목의 2주분량의 강의가 2주간 제공됩니다. </li>
                    <li>본 체험이벤트는 재학중인 학과와 관련된 강좌만 제공받을 수 있습니다. (교육학은 공통)</li>
                    <li>본 인강체험이벤트는 중등과정만 진행됩니다. (유치원, 초등은 진행되지 않습니다)</li>
                    <li>강의체험에 필요한 교재는 별도로 구매하셔야 합니다. </li>
                    <li>무료체험강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다. </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });
    </script>
@stop