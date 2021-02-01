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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
   
        .eventTop {background:#67c0c1}

        .event01 {background:#429697;}

        .event01_1 {background:#fff; width:1120px; margin:0 auto; padding:100px 0; font-size:14px}
        .event01_1 .title { font-size:40px; color:#67c0c1; margin-bottom:50px}
        .event01_1 span {vertical-align:top}

        .event02 {background:#65bebf; position:relative; padding-bottom:100px}
        .evt_table{position:absolute; top:1170px; width:800px; left:50%; margin-left:-400px}
        .evt_table table{width:100%;}
        .evt_table table th,
        .evt_table table td {margin:10px 0}
        .evt_table table th div{background:#67c0c1; color:#fff; font-size:20px; font-weight:300; height:80px; line-height:80px}
        .evt_table table td div{font-size:20px; font-weight:300; height:80px; line-height:80px} 
        .evt_table table td{font-size:20px; color:#000; font-weight:300; text-align:left; padding:10px}   
        .evt_table table tr:nth-child(2) td div {border-bottom:2px solid #67c0c1}     
        .evt_table table tr:last-child td div {line-height:1.4; padding-top:15px}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:top; font-size:16px}
        .evt_table td div a {vertical-align:top; line-height:1}
        .evt_table select {font-size:20px; font-weight:300; height:80px; padding:0 10px}
        .evt_table .btns {margin-top:50px}
        .evt_table .btns a {display:inline-block; width:260px; text-align:center; height:80px; line-height:80px; font-size:30px; color:#000; background:#f6f859}
        .evt_table .btns a:last-child {background:#000; color:#fff; margin-left:30px;}

        .event02 .imgSlider {position:relative; width:100%; margin:100px auto 0;}
        .event02 .imgSlider > div {width:980px; margin:0 auto; height:228px; overflow:hidden;}
        .event02 .imgSlider li {display:inline-block; float:left; width:180px}
        .event02 .imgSlider p {position:absolute; top:50%; left:50%; width:38px; height:72px; margin-top:-36px; z-index:100}
        .event02 .imgSlider p a {cursor:pointer}
        .event02 .imgSlider p.leftBtn {margin-left:-588px}
        .event02 .imgSlider p.rightBtn {margin-left:550px}

        .event02 .imgSlider .imgWrap {background:#fff; border-radius:20px; width:180px; padding:0 15px 15px}
        .event02 .imgSlider .imgWrap .listTitle {color:#333; padding:15px 0; font-size:16px}
        .event02 .imgSlider .imgWrap .listTitle span {color:#3b9091; vertical-align:top}
        .event02 .imgSlider .imgWrap .listTitle a {display:inline-block; background:#333; color:#fff; font-size:14px; width:20px; line-height:20px;  border-radius:4px; float:right}
        .event02 .imgSlider .imgWrap .imgBox {width:150px; height:165px; margin:0 auto; overflow:hidden}

        .event02 .imgSlider > div {width:980px; margin:0 auto; height:auto; overflow:hidden;}
        .event02 .imgSlider .list ul {margin-right:-20px}
        .event02 .imgSlider .list li {display:inline-block; float:left; width:180px; margin-right:20px; margin-bottom:20px;}

        .event02 .Paging a {color:#fff}
        .event02 .Paging a.on {color:#f6f859; text-decoration:none}

        .event03 {background:#4ea5a6;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2052_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2052_01.jpg" alt="이벤트 하나"/>
        </div>

        <div class="evtCtnsBox event01_1">
            <div class="title NSK-Black">합격수기 등록하기</div>

            {{--글목록--}}
            <div class="willbes-Leclist c_both NSK">
                <div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 f_left">
                        <select id="" name="" title="">
                            <option selected="selected">카테고리</option>
                            <option value="교육학">교육학</option>
                            <option value="유아">유아</option>
                            <option value="초등">초등</option>
                            <option value="중등">중등</option>
                        </select>
                        <select id="" name="" title="">
                            <option selected="selected">과목</option>
                            <option value="과목1">과목1</option>
                            <option value="과목2">과목2</option>
                            <option value="과목3">과목3</option>
                        </select>
                    </span>
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해주세요." maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </span>
                    <div class="subBtn blue f_right"><a href="#none" onclick="openWin('profNotice')">등록하기 ></a></div>
                </div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 65px;">
                            <col style="width: 120px;">
                            <col>
                            <col style="width: 60px;">
                            <col style="width: 90px;">
                            <col style="width: 100px;">
                            <col style="width: 90px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>과목<span class="row-line">|</span></th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>첨부<span class="row-line">|</span></th>
                                <th>작성자<span class="row-line">|</span></th>
                                <th>작성일<span class="row-line">|</span></th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td class="w-no">12</td>
                                <td class="w-campus">유아</td>
                                <td class="w-list tx-left pl20"><a href="#none">2020학년도 최종합격수기</a></td>
                                <td class="w-file">
                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                </td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">123</td>
                            </tr>
                            <tr>
                                <td class="w-no">11</td>
                                <td class="w-campus">영어</td>
                                <td class="w-list tx-left pl20"><a href="#none">2020 전남 합격 수기 </a></td>
                                <td class="w-file">
                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                </td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">244</td>
                            </tr>
                            <tr>
                                <td class="w-no">10</td>
                                <td class="w-campus">영어</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">9</td>
                                <td class="w-campus">도덕윤리</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">8</td>
                                <td class="w-campus">유아</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">7</td>
                                <td class="w-campus">체육</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">6</td>
                                <td class="w-campus">전기전자통신</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">5</td>
                                <td class="w-campus">생물</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">4</td>
                                <td class="w-campus">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">3</td>
                                <td class="w-campus">유아</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">2</td>
                                <td class="w-campus">수학</td>
                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td>홍*동</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="Paging">
                        <ul>
                            <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
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
                            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- willbes-Layer-Notice -->
            <div id="profNotice" class="willbes-Layer-Board">
                <a class="closeBtn" href="#none" onclick="closeWin('profNotice')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black tx-left">합격수기 등록하기</div>
                <div class="Layer-Cont">
                    <div class="willbes-Leclist c_both mt20">
                        <div class="LecWriteTable">                        
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-tit bg-light-white strong">과정선택<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-selected tx-left pl30">
                                            <select id="process" name="process" title="process" class="seleProcess" style="width: 250px;">
                                                <option selected="selected">카테고리</option>
                                                <option value="교육학">교육학</option>
                                                <option value="초등">초등</option>
                                                <option value="중등">중등</option>
                                            </select>
                                            <select id="div" name="div" title="div" class="seleDiv" style="width:250px;">
                                                <option selected="selected">과목</option>
                                                <option value="영어">영어</option>
                                                <option value="유아">유아</option>
                                                <option value="국어">국어</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white strong">제목<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-text tx-left pl30">
                                            <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white strong">내용<span class="tx-light-blue">(*)</span></td>
                                        <td class="w-textarea write tx-left pl30">
                                            <textarea placeholder="* 500자 이상 입력해 주세요.
                                            &#13;&#10;* 합격수기와 관련없는 내용은 삭제할 수 있습니다.
                                            &#13;&#10;* 합격인증 및 파일첨부는 필수사항이 아닙니다."></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-tit bg-light-white strong">첨부</td>
                                        <td class="w-file answer tx-left">
                                            <ul class="attach">
                                                <li>
                                                    <input type="file" class="input-file" size="3">
                                                </li>
                                                <li>
                                                    <input type="file" class="input-file" size="3">
                                                </li>
                                                <li>
                                                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tx-left" colspan="2">                                                    
                                            <div class="info">
                                                <h5>개인정보 수집 및 이용에 대한 안내<span class="tx-light-blue">(*)</span></h5>
                                                <ul>
                                                    <li>
                                                        개인정보 수집 이용 목적<br>
                                                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대
                                                        - 이벤트 참여에 따른 강의 수강자 목록에 활용
                                                    </li>
                                                    <li>
                                                        개인정보 수집 항목<br>
                                                        - 신청인의 이름
                                                    </li>
                                                    <li>
                                                        개인정보 이용기간 및 보유기간<br>
                                                        - 본 수집, 활용목적 달성 후 바로 파기
                                                    </li>
                                                    <li>
                                                        개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                                                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은
                                                        이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                                                    </li>
                                                </ul>                                        
                                                <div>
                                                    위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에
                                                    <label class="ml10"><input type="radio"> 동의함</label> <label class="ml10"><input type="radio"> 동희하지 않습니다.</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="search-Btn mt20 h36 p_re">
                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                    <span class="tx-purple-gray">취소</span>
                                </button>
                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                                    <span>저장</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <br/><br/><br/>

                    <!-- View -->
                    <div class="willbes-Leclist c_both">
                        <div class="LecViewTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col>
                                    <col style="width: 90px;">
                                    <col style="width: 180px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th colspan="4" class="w-list tx-left pl20 strong">
                                            <img src="{{ img_url('prof/icon_HOT.gif') }}" class="mr5"> 2020학년도 최종합격수기
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="w-acad tx-left pl20">
                                            <dl>
                                                <dt>중등<span class="row-line">|</span></dt>
                                                <dt>영어</dt>
                                            </dl>
                                            <span class="row-line">|</span>
                                        </td>
                                        <td>홍길*<span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00 00:00:00<span class="row-line">|</span></td>
                                        <td class="w-click"><strong>조회수</strong> 123</td>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    <tr>
                                        <td class="w-txt tx-left" colspan="4">
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-file tx-left pl20" colspan="4">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 2020_중등_영어_합격수기.hwp</a>
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 20200914_100432.jpg</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                                    <span>수정</span>
                                </button>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 150px;">
                                    <col style="width: 640px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[개강] 황남기 헌법, 행정법 리마인드 핵심 이론 + 기출문풀</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[헌법] 5~6월 강의안내</a></td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02.jpg" alt="이벤트 둘"/>
            <div class="evt_table">
                <table>
                    <col width="35%" />
                    <col  />
                    <tbody>
                        <tr>
                            <th><div>과목</div></th>
                            <td>
                                <select id="div" name="div" title="div" class="seleDiv" style="width:100%;">
                                    <option selected="selected">과목선택</option>
                                    <option value="영어">영어</option>
                                    <option value="유아">유아</option>
                                    <option value="국어">국어</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><div>이름</div></th>
                            <td><div>{{ sess_data('mem_name') }} 홍길동</div></td>
                        </tr>
                        <tr>
                            <th><div>합격 인증 파일 첨부</div></th>
                            <td colspan="3">
                                <div>
                                    <input type="file" id="attach_file" name="attach_file" style="width:60%"/>&nbsp;&nbsp;
                                    <a onclick="javascript:del_file();">
                                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제">
                                    </a>
                                    <p class="tx12 mt10">*파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등) 또는 PDF 파일 첨부</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btns">
                    <a href="#none">확인</a>
                    <a href="#none">취소</a>
                </div>
            </div>

            {{--20개까지 롤링형식--}}
            <div class="imgSlider">
                <div>
                    <ul id="sliderImg">
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동<a href="#none">X</a></div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>전기전자통신</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2021/01/2052_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2021/01/2052_arrowR.png"></a></p>
            </div>

            {{--21개이상 리스트 형식--}}
            <div class="imgSlider">
                <div class="list">
                    <ul>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동<a href="#none">X</a></div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>전기전자통신</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="imgWrap">
                                <div class="listTitle"><span>영어</span> | 홍*동</div>
                                <div class="imgBox">
                                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="Paging">
                <ul>
                    <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
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
                    <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox event03">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2052_03.jpg" alt="합격을 진심으로 축하합니다."/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <ul>
                    <li>합격 수기와 합격 인증은 중복 참여 가능합니다.</li>
                    <li>합격 인증에 1, 2차 모두 올렸을 경우 1회만 인정됩니다.</li>
                    <li>무성의한 글은 당첨에서 제외될 수 있습니다.</li>
                    <li>이벤트 인원이 적을 경우, 일부 상품이 지급되지 않을 수 있습니다.</li>
                    <li>이벤트는 3월 23일(화) 종료됩니다.</li>
                    <li>당첨자 발표는 3월 26일(금)에 진행하며, 상품은 3월 30일(화)에 일괄 발송됩니다.</li>
                </ul>
            </div>
        </div>  
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var sliderImg = $("#sliderImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:5,
                maxSlides:5,
                slideWidth: 180,
                slideMargin:20,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft").click(function (){
                sliderImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                sliderImg.goToNextSlide();
            });
        });
    </script>

@stop