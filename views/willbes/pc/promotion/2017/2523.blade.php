@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .evtTop  {background:url("https://static.willbes.net/public/images/promotion/2022/02/2523_top_bg.jpg") no-repeat center top; height:950px;
        background-size:2000px;}
        .evtTop span {position: absolute; top:182px; left:50%; margin-left:-342px; width:661px; z-index: 2;}

        .evt01 {background:#216a4f; padding-bottom:100px}
        .evt01 > a {background:#ffff66; color:#363636; padding:20px 0; display:block; width:600px; margin:0 auto; font-size:30px; border-radius:20px}
        .evt01 > a:hover {background:#000; color:#ffff66;}

        .evt02 {padding:100px 0;}
        .postWrap {width:1000px; margin:0 auto; line-height:1.5; text-align:left; font-size:12px}
        .postList > h4 {font-size:14px; padding:10px 50px 0 0; position: relative; color:#216a4f}
        .postList > h4 strong {background:#216a4f; color:#fff; padding:3px 6px; border-radius:0 4px 4px 0; margin-right:10px}
        .postList > h4 a {position: absolute; top:10px; right:10px; font-size:12px; background:#333; color:#fff; padding:3px 6px; border-radius:4px}
        .postList .postSub {padding:10px 0; border-bottom:1px solid #e0e0e0; color:#666; display:flex; justify-content: space-between;}
        .postList .postSub span {padding:0 10px; border-right:1px solid #ccc}
        .postList .postSub span:last-child {border:0}
        .postWrap .postContent {border-bottom:1px solid #999; background:#fafafa; padding:10px}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .willbes-Layer-Board {
            display: none;
            background: #fff;
            position:fixed;
            top:100px;
            left: 50%;
            margin-left: -560px;
            z-index: 110;
            width: 1120px;
            height: auto;
            border: 1px solid #2f2f2f;
            padding: 20px 25px 30px;
            text-align:left;
        }
        .willbes-Layer-Board .Layer-Tit {padding: 20px 0 10px;}
        .willbes-Layer-Board .Layer-Cont {padding:0; margin:0}
        .willbes-Layer-Board input[type=radio],
        .willbes-Layer-Board input[type=checkbox] {width:20px; height:20px; vertical-align:middle}
        
        .willbes-Layer-Board .info {margin-bottom:20px}
        .willbes-Layer-Board .info ul {width:100%; border:1px solid #e4e4e4; padding:10px; height:100px; overflow-y:auto; margin-bottom:10px; font-size:13px; color:#666}
        .willbes-Layer-Board .info li {margin-bottom:10px; list-style-type:decimal; margin-left:20px}
        .willbes-Layer-Board .psotSort {margin-bottom:10px; font-size:18px}
        .willbes-Layer-Board .psotSort label {margin:0 30px 0 5px}
        .willbes-Layer-Board .psotSort input:checked + label {border-bottom:1px dashed #0075ff; color:#0075ff;}
        .listTable th span {color:red}
        .listTable td {text-align:left !important; padding:5px !important}
        .listTable td textarea,
        .listTable td input[type=text] {width:98% !important; border:1px solid #d4d4d4}

        .willbes-Layer-Board .Layer-Cont .btn a {display:block; width:150px; margin:auto; background:#000; color:#fff; font-size:20px; text-align:center; padding:15px 0; border-radius:6px}


    </style>

    <div class="evtContent NSK">
        <div class="evtCtnsBox evtTop">
        	<span data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/02/2523_top_img.png" alt="합격축하 이벤트"/></span>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2523_01.jpg"/>
            <a href="#none" onclick="openWin('Layerprof'),openWin('postWrite')" class="NSK-Black">합격수기&수강후기 등록하기</a>

            <!--팝업 S-->
            <div id="postWrite" class="willbes-Layer-Board">
                <a class="closeBtn" href="#none" onclick="closeWin('Layerprof'),closeWin('postWrite')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>


                <div class="Layer-Cont">                   
                    <div class="psotSort">
                        <input type="radio" id="sortA"><label for="sortA">합격수기</label>
                        <input type="radio" id="sortB"><label for="sortB">수강수기</label>
                    </div>
                    
                    <div class="willbes-Leclist">
                        <div class="LeclistTable">
                            {{-- 합격수기 --}}
                            <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col>
                                    <col style="width: 100px;">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th>응시지역 <span>*</span></th>
                                        <td>
                                            <select id="" name="" title="응시지역" class="seleAcad">
                                                <option selected="selected">응시지역</option>
                                                <option value="서울">서울</option>
                                                <option value="경기">경기</option>
                                                <option value="인천">인천</option>
                                            </select>
                                        </td>
                                        <th>합격과목 <span>*</span></th>
                                        <td>
                                            <select id="" name="" title="과목선택" class="seleAcad">
                                                <option selected="selected">과목선택</option>
                                                <option value="가정">가정</option>
                                                <option value="건설">건설</option>
                                                <option value="관광">관광</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>제목 <span>*</span></th>
                                        <td colspan="3">
                                            <input type="text" id="" name="">
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>내용 <span>*</span></th>
                                        <td colspan="3">
                                            <textarea id="psot_comment" name="psot_comment" rows="5" placeholder="500자 이상 입력해 주세요.  &#13;&#10;합격수기와 관련없는 내용은 삭제될 수 있습니다.  &#13;&#10;파일첨부(합격인증)는 필수사항이 아닙니다."></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>첨부파일<br>(합격인증)</th>
                                        <td colspan="3">
                                            <ul class="attach">
                                                <li><input type="file" size="3"></li>                                                                                           
                                                <li>
                                                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
                                                    • hwp, doc, pdf, jpg, gif, png, zip만 등록 가능합니다.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>                                  
                                </tbody>
                            </table>

                            {{-- 수강수기 --}}
                            <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col>
                                    <col style="width: 100px;">
                                    <col>
                                    <col style="width: 100px;">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th>수강과목 <span>*</span></th>
                                        <td>
                                            <select id="" name="" title="과목선택" class="seleAcad">
                                                <option selected="selected">과목선택</option>
                                                <option value="가정">교육학</option>
                                                <option value="건설">유아</option>
                                                <option value="관광">초등</option>
                                            </select>
                                        </td>
                                        <th>담당교수 <span>*</span></th>
                                        <td>
                                            <select id="" name="" title="담당교수" class="seleAcad">
                                                <option value="민정선">민정선</option>
                                                <option value="배재민">배재민</option>
                                                <option value="이경범">이경범</option>
                                            </select>
                                        </td>
                                        
                                        <th>평점 <span>*</span></th>
                                        <td>
                                            <select id="" name="" title="평점" class="seleAcad">
                                                <option value="5" selected="selected">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>제목 <span>*</span></th>
                                        <td colspan="5">
                                            <input type="text" id="" name="">
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>내용 <span>*</span></th>
                                        <td colspan="5">
                                            <textarea id="psot_comment" name="psot_comment" rows="5" placeholder="100자 이상 입력해 주세요.  &#13;&#10;수강후기와 관련없는 내용은 삭제될 수 있습니다."></textarea>
                                        </td>
                                    </tr>                                  
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="info">
                        <ul>
                            <li>개인정보 수집 이용 목적<br>
                            - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대 - 이벤트 참여에 따른 강의 수강자 목록에 활용</li>
                            <li>개인정보 수집 항목<br>
                            - 신청인의 이름</li>
                            <li>개인정보 이용기간 및 보유기간<br>
                            - 본 수집, 활용목적 달성 후 바로 파기</li>
                            <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                            - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다. </li>
                        </ul>
                        <label><input type="checkbox"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>

                    <div class="btn"><a href="#none">등록하기</a></div>

                </div>
            </div>
            <div id="Layerprof" class="willbes-Layer-Black"></div>
            <!--팝업 E-->
        </div>
        
        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="postWrap">
                <div class="postList">
                    <h4>
                        <strong>합격수기</strong>
                        제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 
                        <a href="#none">삭제</a>
                    </h4>
                    <div class="postSub">
                        <div><span>서울</span><span>유아</span></div>
                        <div><span>lil****</span><span>2022.02.03</span></div>
                    </div>
                    <div class="postContent">
                        저의 합격수기가 임용을 시작하시는 선생님들, 그리고 다시 시작하시는 선생님들에게 도움이 되었으면 합니다.<br>
                        먼저, 합격수기를 쓰기 전에 제가 공부하면서 힘이 되었던 글들입니다.<br>
                        - 지금 내가 할 수 있는 일은 함부로 살지 않는 일, 그래, 함부로 살지 말자, 할 수 있는데 안하지는 말자. 이것이 내가 삶에게 보일 수 있는 최고의 적극성이다.<br>
                        - 다시 시작하는 마음 결국은 다 된다.<br>
                        <br>
                        ▶ 공부기간<br>
                        (2017 - 2020)<br>
                        2017 올인 민쌤 연간 패키지 (1차불합)<br>
                        2018 학업병행 민쌤 연간패키지 (최종 불합)<br>
                        2019 올인 / 추시 있던 해에는 독학했습니다. (추시 1차불합 / 정시 최종불합)<br>
                        2020 일병행(누리보조) 하반기부터 공부시작 / 민쌤 연간 패키지 (최종합격)<br>
                    </div>
                </div>

                <div class="postList">
                    <h4>
                        <strong>수강후기</strong>
                        제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다.
                    </h4>
                    <div class="postSub">
                        <div><span>유아</span><span>민정선</span><span>5점</span></div>
                        <div><span>lil****</span><span>2022.02.03</span></div>
                    </div>
                    <div class="postContent">
                        안녕하세요. 올해 초수 수험생입니다.<br>
                        하나씩 천천히 꼼꼼하게 설명해 주시고, 설명을 들으면서 공부했었습니다. !!<br>
                        이번 특강은 넓게 펼쳐저 있었던 지식들을.. 한 곳으로 모아 주는 느낌적인 느낌?.. 인것 같습니다.<br>
                        남은 준비 기간 동안 열심히 따라가며 합격수기 남기러 오도록 하겠습니다!!<br>
                        감사합니다.
                    </div>
                </div>

                <div class="postList">
                    <h4>
                        <strong>합격수기</strong>
                        제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 제목이 출력됩니다. 
                    </h4>
                    <div class="postSub">
                        <div><span>서울</span><span>유아</span></div>
                        <div><span>lil****</span><span>2022.02.03</span></div>
                    </div>
                    <div class="postContent">
                        저의 합격수기가 임용을 시작하시는 선생님들, 그리고 다시 시작하시는 선생님들에게 도움이 되었으면 합니다.<br>
                        먼저, 합격수기를 쓰기 전에 제가 공부하면서 힘이 되었던 글들입니다.<br>
                        - 지금 내가 할 수 있는 일은 함부로 살지 않는 일, 그래, 함부로 살지 말자, 할 수 있는데 안하지는 말자. 이것이 내가 삶에게 보일 수 있는 최고의 적극성이다.<br>
                        - 다시 시작하는 마음 결국은 다 된다.<br>
                        <br>
                        ▶ 공부기간<br>
                        (2017 - 2020)<br>
                        2017 올인 민쌤 연간 패키지 (1차불합)<br>
                        2018 학업병행 민쌤 연간패키지 (최종 불합)<br>
                        2019 올인 / 추시 있던 해에는 독학했습니다. (추시 1차불합 / 정시 최종불합)<br>
                        2020 일병행(누리보조) 하반기부터 공부시작 / 민쌤 연간 패키지 (최종합격)<br>
                    </div>
                </div>
            </div>
            <div class="Paging">
                <ul>
                    <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"> </a></li>
                    <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                    <li><a href="#none">2</a><span class="row-line">|</span></li>
                    <li><a href="#none">3</a><span class="row-line">|</span></li>
                    <li><a href="#none">4</a><span class="row-line">|</span></li>
                    <li><a href="#none">5</a><span class="row-line">|</span></li>
                    <li><a href="#none">6</a><span class="row-line">|</span></li>
                    <li><a href="#none">7</a><span class="row-line">|</span></li>
                    <li><a href="#none">8</a><span class="row-line">|</span></li>
                    <li><a href="#none">9</a><span class="row-line">|</span></li>
                    <li><a href="#none">10</a></li>
                    <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"> </a></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">합격수기&수강후기 이벤트 유의사항</h4>
                <ul>
                    <li>윌비스임용의 합격수기/수강후기 작성 이벤트 참여는 3/13(일)까지 진행됩니다.  
                    <li>본 이벤트는 홈페이지 로그인 후 참여 가능합니다. 
                    <li>작성해 주신 합격수기 및 수강후기는 윌비스 임용에 귀속되며, 마케팅에 활용될 수 있습니다. 
                    <li>본 이벤트1, 이벤트2는 중복 참여 가능합니다.
                    <li>당첨 인원 미달 시 상품의 일부만 제공될 수 있습니다.
                    <li>당첨자는 소득신고를 위해 신분증 사본의 제출을 요구할 수 있습니다. (5만원이상 상품) 
                    <li>무성의한 글은 당첨에서 제외됩니다.</li>
                </ul>
            </div>
        </div>  


    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function(){
        AOS.init();
      });
    </script>


@stop