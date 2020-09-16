@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">임용<span class="row-line">|</span></li>
                <li class="subTit">윌비스임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li>
                    <a href="#none">강의안내/신청</a>
                </li>
                <li>
                    <a href="#none">무료강의</a>
                </li>
                <li>
                    <a href="#none">임용정보</a>
                </li>
                <li>
                    <a href="#none">고객센터</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth"><span class="depth-Arrow">></span><strong>임용정보</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>합격수기</strong></span>
    </div>
    <div class="Content p_re">
        <div class="willbes-AcadInfo c_both">
            <div class="Acad_info">
                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                            <select id="acad" name="acad" title="카테고리" class="seleAcad">
                                <option selected="selected">카테고리</option>
                                <option value="카테고리1">카테고리1</option>
                                <option value="카테고리2">카테고리2</option>
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
                        <div class="subBtn blue NSK f_right"><a href="#none">등록하기 ></a></div>
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
                                    <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                    <td class="w-campus">유아</td>
                                    <td class="w-list tx-left pl20"><a href="#none">2020학년도 최종합격수기</a></td>
                                    <td class="w-file">
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                    </td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">123</td>
                                </tr>
                                <tr>
                                    <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                    <td class="w-campus">영어</td>
                                    <td class="w-list tx-left pl20"><a href="#none">2020 전남 합격 수기 </a></td>
                                    <td class="w-file">
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                    </td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">244</td>
                                </tr>
                                <tr>
                                    <td class="w-no">10</td>
                                    <td class="w-campus">영어</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">9</td>
                                    <td class="w-campus">도덕윤리</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">8</td>
                                    <td class="w-campus">유아</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">7</td>
                                    <td class="w-campus">체육</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">6</td>
                                    <td class="w-campus">전기전자통신</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">5</td>
                                    <td class="w-campus">생물</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">4</td>
                                    <td class="w-campus">국어</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">3</td>
                                    <td class="w-campus">유아</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">2</td>
                                    <td class="w-campus">수학</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td>홍길*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-list tx-center" colspan="7">검색 결과가 없습니다.</td>
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

                <br/><br/><br/><br/><br/><br/>
                
                <!-- Write -->
                <div class="willbes-Leclist c_both">
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
                                        <textarea></textarea>
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

                <br/><br/><br/><br/><br/><br/>

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
                                        <div class="mb20"><img src="http://file1.willbes.net/datassam/event/200911_top.jpg" alt="첨부이미지명"></div>
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
                            <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                <span>목록</span>
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
        <!-- willbes-AcadInfo -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop