@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .quick {display:none !important}

        .btnBox a {width:500px; margin:0 auto; display:inline-block; color:#fff; background:#b9689d; font-size:30px; font-weight:bold; height:80px; line-height:80px; border-radius:40px; border-bottom:10px solid #682c53}
        .btnBox a:hover {background:#682c53;}
    
        .evtCtnsBox input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2020/10/200608_free_top_bg.jpg) repeat-x center top;}

        .event01 {background:#9b94d9; padding-bottom:100px}

        .event02 {background:#211f46}

        .event03 {background:url(https://static.willbes.net/public/images/promotion/2020/10/200608_free_03_bg.jpg) repeat-x center top; position:relative}
        .event03 .btnBox {position:absolute; bottom:100px; left:50%; margin-left:-210px; z-index:10}

        .event04 {background:#ebebeb; padding:80px 0;}
        .event04Box {width:1100px; margin:0 auto; background:#fff; padding:50px}
        .event04Box h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .event04Box h5 {font-size:24px; color:#49569e; text-align:left; padding-bottom:10px; border-bottom:2px solid #49569e; margin:50px 0 20px}
        .event04Box h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .event04-txt01 {text-align:left;}
        .event04-txt01 ul {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .event04 li {margin-bottom:10px; list-style-type:decimal; margin-left:20px; text-align:left; font-size:14px}

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

        .evt_tableA {margin-bottom:30px;}
        .evt_tableA table{width:100%;}
        .evt_tableA table tr{border-bottom:1px solid #c1c1c1}
        .evt_tableA table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_tableA table thead th,
        .evt_tableA table tbody th{color:#49569e; font-size:16px; font-weight:300; padding:10px; text-align:center; border-bottom:2px solid #49569e}
        .evt_tableA table tbody td{padding:0 10px; font-size:14px; color:#000; text-align:center; padding:10px}
        .evt_tableA table tbody td:nth-child(4){color:#C00; text-align:left}
        .evt_tableA table tbody td:last-child {text-align:left}

        .event04 .btnBox a {width:300px; color:#fff; background:#49569e; font-size:24px; font-weight:bold; height:70px; line-height:70px; border-radius:40px; border-bottom:5px solid #27305e}
        .event04 .btnBox a:hover {background:#27305e;}

        .event05 {background:#49569e; padding-bottom:50px}
        .event05 ul {width:740px; margin:30px auto 0}
        .event05 li {display:inline; float:left; width:50%; text-align:center}
        .event05 li .on {display:none}
        .event05 li .off {display:block}
        .event05 li:hover .on {display:block}
        .event05 li:hover .off {display:none}
        .event05 ul:after {content:""; display:block; clear:both}

        .event06 {background:#f1ce63; padding-bottom:50px}

        .event07 {background:#ebebeb url(https://static.willbes.net/public/images/promotion/2020/10/200608_free_06_bg.jpg) no-repeat center top; padding:80px 0; position:relative}
        .snsShare {position:absolute; top:710px; left:50%; margin-left:-550px; width:1100px; z-index:10}
        .snsShare input {width:800px; height:40px; vertical-align:middle}
        .snsShare a {float:right; display:inline-block; width:280px; vertical-align:middle; background:#49569e; color:#fff; border-radius:30px; height:40px; line-height:40px; font-size:16px;}
        .snsShare a:hover {background:#000}
        .snsShare:after {content:""; display:block; clear:both}

        .event07Box {width:1217px; margin:0 auto; padding:30px; background:#fff}
        .event07 .evt_tableA table {border-top:2px solid #49569e}
        .event07 .evt_tableA table tbody td:nth-child(2) {text-align:left;}
        .event07 .evt_tableA table tbody td:nth-child(4) {text-align:center; color:inherit}
        .event07 .evt_tableA table tbody td:last-child {text-align:center}
        .event07 .evt_tableA table tbody td a {background:#49569e; color:#fff; border-radius:30px; height:36px; line-height:36px; font-size:14px; display:inline-block; width:80px}
        .event07 .evt_tableA table tbody td a:hover {background:#000}

        .event08 {background:#9b94d9; padding-bottom:80px}
        .event08Box {width:1218px; margin:0 auto; padding:30px; background:#fff}
        .event08Box input[type=text] {width:90%}
        .event08Box textarea {padding:10px; color:#494a4d; border:1px solid #b8b8b8; width:calc(100% - 22px); height:150px; margin-top:20px}
        .event08Box .btnBox {margin-top:30px}
        .event08Box .btnBox ul {width:500px; margin:0 auto}
        .event08Box .btnBox li {display:inline; float:left; width:50%}
        .event08Box .btnBox a {width:230px; margin:0 auto; display:inline-block; color:#fff; background:#49569e; font-size:24px; font-weight:bold; height:60px; line-height:60px; border-radius:30px; border:0}
        .event08Box .btnBox li:last-child a {color:#666; background:#b7b7b7;}
        .event08Box .btnBox li:last-child a:hover,
        .event08Box .btnBox a:hover {background:#000; color:#fff}
        .event08Box .btnBox ul:after {content:""; display:block; clear:both}
        .event08Box .evt_tableA {margin-top:50px}
        .event08Box .evt_tableA table {border:0; border-top:2px solid #49569e;}
        .event08Box .evt_tableA th {background:#fff; border-right:0}
        .event08Box .evt_tableA td {border-right:0;}
        .event08Box .evt_tableA td:nth-child(2) {text-align:left}
        .event08Box .evt_tableA td:nth-child(4) {text-align:center; color:inherit}
        .event08Box .evt_tableA td:last-child {text-align:center}
        .event08Box .evt_tableA td a {font-size:16px; display:block}
        .event08Box .evt_tableA td p {font-size:14px; color:#888}

        .event09 {background:#222; padding:80px 0; line-height:1.4}
        .event09Box {width:1100px; margin:0 auto; padding:50px; background:#f0f1f2; text-align:left; letter-spacing:normal}
        .event09Box .tabs {background:#fff; border-bottom:2px solid #49569e}
        .event09Box .tabs li {display:inline; float:left; width:33.33333%;}
        .event09Box .tabs li a {display:block; font-size:20px; font-weight:bold; height:60px; line-height:60px; text-align:center}
        .event09Box .tabs li a:hover,
        .event09Box .tabs li a.active { background:#49569e; color:#fff}
        .event09Box .tabs:after {content:""; display:block; clear:both}
        .tabCts {padding:30px; background:#fff; font-size:14px}
        .tabCts div {color:#000; font-size:18px; font-weight:bold; margin-bottom:10px}
        .tabCts li { list-style:decimal; margin-left:20px; margin-bottom:10px}

        .passImg {position:relative; width:100%; text-align:left; margin-top:30px}
        .passImgWrap {background:#a2a3a5; min-height:150px; border:5px solid #d0d0d0; padding:30px 0}
        #slide_banner li {display:inline; float:left; text-align:center; background:#fff; padding:20px 0;}
        #slide_banner li div {font-size:14px; margin-bottom:20px}
        #slide_banner li div span {padding:0 15px; color:#CCC}
        #slide_banner:after {content:""; display:block; clear:both}
        #slide_banner2 li {display:inline; float:left; text-align:center; background:#fff; padding:20px 0;}
        #slide_banner2 li div {font-size:14px; margin-bottom:20px;}
        #slide_banner2 li div span {padding:0 15px; color:#CCC}
        #slide_banner2:after {content:""; display:block; clear:both}
        .passImg p {position:absolute; top:50%; width:51px; z-index:100}
        .passImg li img {width:186px; height:120px}

        .passImg p {top:50%; margin-top:-25px; width:39px; height:51px}
        .passImg p.prevBtn {left:5px}
        .passImg p.nextBtn {right:5px}
        .passImg p a {cursor:pointer; display:block}


        .passImg20 {margin-top:30px}
        .passImg20 ul {width:1130px; margin:0 auto}
        .passImg20 li {display:inline; float:left; text-align:center; background:#fff; padding:20px 0; margin:07px; width:210px; border:1px solid #adadad;
        box-shadow: 5px 5px 0 rgba(240,240,240,1);
        }
        .passImg20 li div {font-size:14px; margin-bottom:20px}
        .passImg20 li div span {padding:0 15px; color:#CCC}
        .passImg20 li img {width:186px; height:120px}
        .passImg20 ul:after {content:""; display:block; clear:both}

        .programPage a {background:#fff; color:#343434}
        .programPage a:hover,
        .programPage a.active{background:#333; color:#fff}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
        <div class="eventWrap eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/10/200608_free_top.jpg" alt="인강무료체험"/>
        </div>

        <div class="eventWrap event01">
        	<img src="https://static.willbes.net/public/images/promotion/2020/10/200608_free_01.gif" alt="인강무료체험"/>
            <div class="btnBox">
            	<a href="/promotion/index/cate/3140/code/1811" target="_blank">과목별 설명회 자세히 보기</a>
            </div>
        </div>

        <div class="eventWrap event02">
        	<img src="https://static.willbes.net/public/images/promotion/2020/10/200608_free_02.jpg" alt="인강무료체험"/>
        </div>

        <div class="eventWrap event03">
        	<img src="https://static.willbes.net/public/images/promotion/2020/10/200608_free_03.jpg" alt="인강무료체험"/>
            <div class="btnBox">
            	<a href="{{ front_url('support/review/index') }}">합격수기 자세히 보기</a>
            </div>
        </div>

        <div class="eventWrap event04">
          <form id="brdpost" name="brdpost" method="post" action="" enctype="multipart/form-data">
        	<div class="event04Box">
            	<h4>인강 무료체험 신청하기</h4>
                <h5>이벤트참여 대상자</h5>
                <ul>
                	<li><strong>대학(원)의 재학생</strong> (* 재학생 인증파일 제출이 가능한 분)</li>
				  <li><strong>윌비스 임용고시학원에 수강등록이 처음인 분</strong> (* 환불강의 포함)</li>                    
                </ul>
              <h5 class="mT20">이벤트참여에 따른 사전 동의사항 <span>* 윌비스임용의 본 이벤트 참여를 위해서는 아래 명시된 사항을 자세히 읽어 보시고 동의를 해주셔야 가능합니다.</span></h5>
                <div class="event04-txt01 mB50">
                	<ul>
                    	<li>개인정보 수집 이용 목적  <br />
                        - 본 이벤트의 대상자(대학교(원)의 재학생) 확인 및 각종 문의사항 응대<br />
                        - 통계분석 및 기타 마케팅에 활용<br />
                        - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li>
                        <li>개인정보 수집 항목<br />
                        - 필수항목 : 성명, 본사ID, 연락처, 재학중인 학교와 학과(학부), 재학생임을 인증할 수 있는 서류(재학증명서, 성적증명서 등) </li>
                        <li>개인정보 이용기간 및 보유기간<br />
                        - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기</li>
                        <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br />
                        - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.</li>
                        <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                        <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                    </ul>
                    <input name="is_chk" type="checkbox" value="Y" id="is_chk"/> <label for="is_chk"> 이벤트참여에 따른 개인정보 및 마케팅 활용 동의하기(필수)</label>
				</div>

              	<h5>재학생 인증 <span>* 윌비스임용의 본 이벤트의 대상자는 임용시험준비를 시작하는 대학교(원)의 재학생입니다.</span></h5>
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
                        <input type="hidden" id="userid" name="userid" maxlength="100" title="아이디" value="${loginVO.USER_ID }" />
                        <th>윌비스ID</th>
                        <td>willbes</td>
                        <th>연락처</th>
                        <td><input type="text" id="subjectText" name="subjectText" value="" style="width:90%" /></td>
                      </tr>
                      <tr>
                        <th>대학교(원) / <br />
						(학부)학과</th>
                        <td>
                        <input type="text" id="subject" name="subject" maxlength="100" style="width:90%" />
                        </td>
                        <th>재학생인증<br />파일</th>
                        <td colspan="3">
                        <input type="file" id="uploadFile" name="uploadFile" style="width:60%"/>&nbsp;&nbsp;<a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/10/1851_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a> <br />
                        *파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등) 또는 PDF 파일 첨부
                        </td>
                      </tr>
                      </tbody>
                        <input type="hidden" id="event_code" name="event_code" value="200413"/>
                    </table>
                </div>
              	<h5 class="mB0">강좌 선택<span>* 윌비스임용의 본 이벤트에서 진행하고 있는 인강무료체험은 강좌는 2강좌(교육학1, 전공1)까지만 가능합니다.</span></h5>
              	<div class="evt_tableA">
                    <table>
                      <col />
                      <col />
                      <col />
                      <col />
                      <col />
                      <col />
                      <col />
                      <tr>
                        <th>선택</th>
                        <th>과목명</th>
                        <th>교수명</th>
                        <th>강좌명</th>
                        <th>강의수</th>
                        <th>직강시기</th>
                        <th>교재명</th>
                      </tr>
                      <tr>
                        <td><input name="hits" type="checkbox" value="11" id="hits"/></td>
                        <td>교육학</td>
                        <td>김차웅</td>
                        <td>교육학 입문-102알짜 정리 </td>
                        <td>30강</td>
                        <td>2020년 1~2월 </td>
                        <td>스토리텔링 교육학 1.2</td>
                      </tr>
                      <tr>
                        <td><input name="hits" type="checkbox" value="12" id="hits"/></td>
                        <td>교육학</td>
                        <td>이인재</td>
                        <td>교육학[입문] 기초 논술 이론반</td>
                        <td>12강</td>
                        <td>2020년 1~2월 </td>
                        <td>모둠 이인재 교육학 논술[이론편]</td>
                      </tr>
                      <tr>
                        <td><input name="hits" type="checkbox" value="13" id="hits"/></td>
                        <td>교육학</td>
                        <td>이인재</td>
                        <td>교육학 기초 심화반 </td>
                        <td>13강</td>
                        <td>2020년 3~4월</td>
                        <td>모둠 이인재 교육학 논술[이론편]</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="21" id="eventType"/></td>
                        <td>전공국어</td>
                        <td>권보민</td>
                        <td>현대국어 문법 디딤돌 기초반</td>
                        <td>8강</td>
                        <td>2020년 1~2월 </td>
                        <td>프린트</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="22" id="eventType"/></td>
                        <td>전공국어</td>
                        <td>권보민</td>
                        <td>중세국어 문법 디딤돌 기초반</td>
                        <td>4강</td>
                        <td>2020년 3~4월</td>
                        <td>프린트</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="23" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>김유석</td>
                        <td>영미문학 영미시의 이해</td>
                        <td>9강</td>
                        <td>2020년 1~2월 </td>
                        <td>영미시의 이해 4판 (2020년판)</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="24" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>김유석</td>
                        <td>일반영어     Power Reading Skills</td>
                        <td>5강</td>
                        <td>2020년 1~2월 </td>
                        <td>Power Reading Skills 4th&nbsp;</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="25" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>김유석</td>
                        <td>영미문학 영미소설의 이해 </td>
                        <td>6강</td>
                        <td>2020년 3~4월</td>
                        <td>영미단편소설의 이해 (2020년판)</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="26" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>김유석</td>
                        <td>일반영어 Power Prose Writing</td>
                        <td>5강</td>
                        <td>2020년 3~4월</td>
                        <td>Power Prose Writing&nbsp;(프린트 제공)</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="27" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>김영문</td>
                        <td>영어학 기본이론(통사론)</td>
                        <td>3강</td>
                        <td>2020년 1~2월 </td>
                        <td>2020) 김영문 영어학개론</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="28" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>김영문</td>
                        <td>영어학 기본이론(음운론, 음성학, …)</td>
                        <td>4강</td>
                        <td>2020년 3~4월</td>
                        <td>2020) 김영문 영어학개론</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="29" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>공훈</td>
                        <td>영어학 기본이론</td>
                        <td>4강</td>
                        <td>2020년 1~2월 </td>
                        <td>2020) 공훈 영어학</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="210" id="eventType"/></td>
                        <td>영어교육론</td>
                        <td>공훈</td>
                        <td>영어교육론 기본이론반 Ⅰ(PLLT)</td>
                        <td>4강</td>
                        <td>2020년 1~2월 </td>
                        <td>Principles of Language Learning and Teaching (6판)</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="211" id="eventType"/></td>
                        <td>전공영어</td>
                        <td>공훈</td>
                        <td>음성/음운론 심화이론반(TBP)</td>
                        <td>4강</td>
                        <td>2020년 3~4월</td>
                        <td>Teaching By    Principles</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="212" id="eventType"/></td>
                        <td>영어교육론</td>
                        <td>공훈</td>
                        <td>공훈 음성/음운론 심화이론반(AEP)</td>
                        <td>4강</td>
                        <td>2020년 3~4월</td>
                        <td>Appliend English    Phonology</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="213" id="eventType"/></td>
                        <td>전공수학</td>
                        <td>김철홍</td>
                        <td>미분기하학 마스터반</td>
                        <td>25강</td>
                        <td>2020년 1~2월 </td>
                        <td>미분기하학</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="214" id="eventType"/></td>
                        <td>수학교육론</td>
                        <td>박태영</td>
                        <td>신기한(신론과 기출을 결합한) 이론반</td>
                        <td>6강</td>
                        <td>2020년 1~2월 </td>
                        <td>수학교육신론 1,2</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="215" id="eventType"/></td>
                        <td>수학교육론</td>
                        <td>박태영</td>
                        <td>수학교육과정과 교재연구</td>
                        <td>5강</td>
                        <td>2020년 3~4월</td>
                        <td>수학교육과정과 교재연구 / 자료</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="216" id="eventType"/></td>
                        <td>도덕윤리</td>
                        <td>김병찬</td>
                        <td>교과 내용학 Ⅰ(서양ㆍ동양ㆍ한국윤리)</td>
                        <td>14강</td>
                        <td>2020년 1~2월 </td>
                        <td>서양·동양·한국윤리 (2020년 개정판)</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="217" id="eventType"/></td>
                        <td>도덕윤리</td>
                        <td>김병찬</td>
                        <td>교과 내용학 Ⅱ(응용윤리ㆍ정치사회사상)</td>
                        <td>14강</td>
                        <td>2020년 3~4월</td>
                        <td>응용윤리·정치·사회사상 (2020년 개정판)</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="218" id="eventType"/></td>
                        <td>전공음악</td>
                        <td>다이애나</td>
                        <td>전공음악 기본이론</td>
                        <td>22강</td>
                        <td>2020년 1~2월 </td>
                        <td>마인드뱁(한끝맵)/종음셋/한줄정리(기본)</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="219" id="eventType"/></td>
                        <td>전공음악</td>
                        <td>다이애나</td>
                        <td>전공음악 화성학 </td>
                        <td>8강</td>
                        <td>2020년 1~2월 </td>
                        <td>연주자를 위한 조성음악 분석 1,2</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="220" id="eventType"/></td>
                        <td>전공역사</td>
                        <td>최용림</td>
                        <td>임용역사 이론반</td>
                        <td>17강</td>
                        <td>2020년 1~2월 </td>
                        <td>전공역사 이론서</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="221" id="eventType"/></td>
                        <td>전공역사</td>
                        <td>최용림</td>
                        <td>임용역사 심화이론</td>
                        <td>16강</td>
                        <td>2020년 3~4월</td>
                        <td>임용역사 기출한자</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="222" id="eventType"/></td>
                        <td>전기전자통신</td>
                        <td>최우영</td>
                        <td>기초전기전자반</td>
                        <td>18강</td>
                        <td>2020년 1~2월 </td>
                        <td>기초전기전자</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="223" id="eventType"/></td>
                        <td>정보컴퓨터</td>
                        <td>송광진</td>
                        <td>정보컴퓨터 내용학 일반과정 </td>
                        <td>6강</td>
                        <td>2020년 1~3월</td>
                        <td>알기 쉽게 풀어가는 정보컴퓨터 일반과정 Ⅰ,Ⅱ</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="224" id="eventType"/></td>
                        <td>전공중국어</td>
                        <td>정경미</td>
                        <td>중국어 기본이론반(Part1)</td>
                        <td>26강</td>
                        <td>2020년 1~2월 </td>
                        <td>중국어 어학 기본이론서</td>
                      </tr>
                      <tr>
                        <td><input name="eventType" type="checkbox" value="225" id="eventType"/></td>
                        <td>전공중국어</td>
                        <td>정경미</td>
                        <td>중국어 기본독해반(Part1)</td>
                        <td>23강</td>
                        <td>2020년 1~2월 </td>
                        <td>中国现当代文学史教程외    2종</td>
                      </tr>
                    </table>
              	</div>
                  <div class="tR">* 강의 신청전 페이지 하단의 유의사항을 반드시 확인하시기 바랍니다. </div>
                  <div class="btnBox mt20">
                     <a href="#none">신청하기</a>
                  </div>
            </div>
          </form>
        </div><!--//event04-->


        <div class="eventWrap event09">
        	<div class="event09Box">
                <div id="tab01" class="tabCts">
                	<div>[필독] 인강무료체험 이벤트 유의사항</div>
                    <ul>
                    	<li>본 이벤트는 교원임용시험을 처음 도전하는 대학교(원) 재학생만 참여 가능한 이벤트 입니다.(기존 수강생은 참여할 수 없습니다)<br />
                            - 본 이벤트는 상단의 “재학생 인증창”에 학교명과 학과명을 표기하고, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br />
                            - 재학생임을 인증하는 서류로 학생증은 인정되지 않으며, 1개월 이내 발급된 재학증명서, 성적증명서 등 본인이 현재 재학생임을 입증하는 서류여야 합니다.</li>
                        <li>강의제공방식<br />
                            - 재학생 인증절차 후, 체험하고자 하는 강의를 신청하시면 됩니다. (강의는 최대 2개까지만 가능하며, 교육학 1강좌, 전공 1강좌로 제한됩니다)<br />
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
        </div>
    </div>
    <!-- End Container -->
@stop