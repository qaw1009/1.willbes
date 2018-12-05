@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

<div class="willbes-Mypage-EDITZONE mt60 c_both p_re">
    <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
        · 과제확인 및 답안제출
    </div>
    <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
        <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
        <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
            <tbody>
            <tr>
                <td>
                    <div class="SubTit">- 제출상태</div>
                    <div class="Txt">
                        <span class="aBox answerBox NSK f_left">과제제출</span>
                        <div class="SubTxt">'과제제출'을 클릭하여 과제를 확인하고 답안을 제출하세요. (과제제출 이후에는 수정할 수 없습니다.)</div>
                    </div>
                    <div class="SubTit pt20">- 채점확인</div>
                    <div class="Txt">
                        <span class="aBox finishBox NSK f_left">채점중</span>
                        <div class="SubTxt">
                            채점이 진행중입니다. 채점은 매일 진행예정이며, 부득이한 경우 1-2일 소요될 수 있습니다.<br/>
                            '채점중'을 클릭하여 제출한 답안을 확인할 수 있습니다.
                        </div>
                    </div>
                    <div class="Txt mt10">
                        <span class="aBox waitBox_block NSK f_left">채점완료</span>
                        <div class="SubTxt">채점이 완료되었습니다. '채점완료'를 클릭하여 채점 결과를 확인하세요.</div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="LeclistTable mt35 c_both">
        <table cellspacing="0" cellpadding="0" class="listTable editTable under-gray bdt-gray tx-gray">
            <colgroup>
                <col style="width: 60px;">
                <col style="width: 480px;">
                <col style="width: 100px;">
                <col style="width: 100px;">
                <col style="width: 100px;">
                <col style="width: 100px;">
            </colgroup>
            <thead>
            <tr>
                <th>No<span class="row-line">|</span></th>
                <th>과제제목<span class="row-line">|</span></th>
                <th>제출상태<span class="row-line">|</span></th>
                <th>과제제출일<span class="row-line">|</span></th>
                <th>채점상태<span class="row-line">|</span></th>
                <th>채점완료일</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center" colspan="6">등록된 내용이 없습니다.</td>
                </tr>
            @endif
            @foreach($list as $row)
                <tr>
                    <td class="w-no">4회</td>
                    <td class="w-list tx-left pl20">온라인 독해 첨삭지도 과제4</td>
                    <td class="w-status-send"><a href="#none" onclick="openWin('EDITPASS')"><span class="aBox waitBox_block NSK">과제제출</span></a></td>
                    <td class="w-date">&nbsp;</td>
                    <td class="w-status-mark">&nbsp;</td>
                    <td class="w-date-fin">&nbsp;</td>
                </tr>
            @endforeach

            {{--<tr>
                <td class="w-no">4회</td>
                <td class="w-list tx-left pl20">온라인 독해 첨삭지도 과제4</td>
                <td class="w-status-send"><a href="#none" onclick="openWin('EDITPASS')"><span class="aBox waitBox_block NSK">과제제출</span></a></td>
                <td class="w-date">&nbsp;</td>
                <td class="w-status-mark">&nbsp;</td>
                <td class="w-date-fin">&nbsp;</td>
            </tr>
            <tr>
                <td class="w-no">3회</td>
                <td class="w-list tx-left pl20">온라인 독해 첨삭지도 과제3</td>
                <td class="w-status-send"><span class="aBox NSK">제출완료</span></td>
                <td class="w-date">2018-00-00</td>
                <td class="w-status-mark"><a href="#none" onclick="markInfoModal('MARKPASS', 'edit2')"><span class="aBox answerBox NSK">채점중</span></a></td>
                <td class="w-date-fin">&nbsp;</td>
            </tr>
            <tr>
                <td class="w-no">2회</td>
                <td class="w-list tx-left pl20">온라인 독해 첨삭지도 과제2</td>
                <td class="w-status-send"><span class="aBox NSK">제출완료</span></td>
                <td class="w-date">2018-00-00</td>
                <td class="w-status-mark"><a href="#none" onclick="markInfoModal('MARKPASS', 'edit3')"><span class="aBox finishBox NSK">채점완료</span></a></td>
                <td class="w-date-fin">2018-00-00</td>
            </tr>
            <tr>
                <td class="w-no">1회</td>
                <td class="w-list tx-left pl20">온라인 독해 첨삭지도 과제1</td>
                <td class="w-status-send"><span class="aBox NSK">제출완료</span></td>
                <td class="w-date">2018-00-00</td>
                <td class="w-status-mark"><span class="aBox finishBox NSK">채점완료</span></td>
                <td class="w-date-fin">2018-00-00</td>
            </tr>--}}
            </tbody>
        </table>
    </div>

    <div id="EDITPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h920 abs">
        <a class="closeBtn" href="#none" onclick="closeWin('EDITPASS')">
            <img src="{{ img_url('sub/close.png') }}">
        </a>
        <div class="Layer-Tit NG tx-dark-black">과제제출</div>
        <div class="Layer-Cont">
            <ul class="passzoneInfo tx-gray NGR mt20 mb20">
                <li>· 모든 답안이 완료된 후 [제출하기] 버튼을 눌러 답안을 제출할 수 있습니다.</li>
                <li>· [임시저장] 은 과제 제출이 완료된 상황이 아니므로, 교수님 채점이 불가합니다.</li>
                <li>· 답안제출 이후에는 답안을 수정할 수 없습니다.</li>
            </ul>
            <div class="PASSZONE-Lec-Section">
                <div class="LeclistTable editTableList editTableList-overflow">
                    <div class="Search-Result strong mt10 mb20 tx-gray">· 과제확인</div>
                    <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                        <colgroup>
                            <col style="width: 115px;">
                            <col style="width: 585px;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="w-tit bg-light-white strong">과제제목</th>
                            <td class="w-data tx-left tx-gray pl15">
                                제목이 노출됩니다.
                                <span class="MoreBtn"><a class="arrow" href="#none"><span class="txt">열기</span> <span class="arrow-Btn">></span></a></span>
                            </td>
                        </tr>
                        <tr>
                            <th class="w-tit bg-light-white strong">과제첨부</th>
                            <td class="w-file tx-left pt-zero pb-zero">
                                <ul class="up-file">
                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                <!-- 최대 5개까지 노출
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일4가 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일5가 노출됩니다.docx</a></li>-->
                                </ul>
                            </td>
                        </tr>
                        <tr class="editCont" style="display: none;">
                            <th class="w-tit bg-light-white strong">과제내용</th>
                            <td class="w-file tx-left pl15">
                                A. 다음 각 문장을 끊어진 대로 해석하시오.<br/><br/>
                                1. Everyone's nose is a different shape.// <br/><br/>
                                2. Researchers may know why.// <br/><br/>
                                3. Researchers say / it could be because of the climate.//<br/><br/>
                                4. People with wider noses / live / in warm, humid areas.// <br/><br/>
                                5. People with narrower noses / live / in colder, drier places.// <br/><br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="Search-Result strong mt30 mb20 tx-gray">· 답안작성</div>
                    <div class="EditWriteTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                            <colgroup>
                                <col style="width: 115px;">
                                <col style="width: 585px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">답안제목<span class="tx-red">(*)</span></td>
                                <td class="w-text tx-left pl10 pr10">
                                    <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">답안내용<span class="tx-red">(*)</span></td>
                                <td class="w-textarea write tx-left pl10 pr10">
                                    <textarea></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">답안첨부</td>
                                <td class="w-file answer tx-left">
                                    <ul class="attach">
                                        <li>
                                            <div class="filetype">
                                                <input type="text" class="file-text" />
                                                <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                <span class="file-select"><input type="file" class="input-file" size="3"></span>
                                                <input class="file-reset NSK" type="button" value="X" />
                                            </div>
                                        </li>
                                        <li>
                                            <div class="filetype">
                                                <input type="text" class="file-text" />
                                                <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                <span class="file-select"><input type="file" class="input-file" size="3"></span>
                                                <input class="file-reset NSK" type="button" value="X" />
                                            </div>
                                        </li>
                                        <li>
                                            • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                            • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="search-Btn mt20 h36 p_re">
                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <span class="tx-purple-gray">임시저장</span>
                        </button>
                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-blue bd-dark-blue center">
                            <span>제출하기</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- willbes-Layer-PassBox : 과제제출 -->

    <div id="MARKPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h920 abs">
        <a class="closeBtn" href="#none" onclick="closeWin('MARKPASS')">
            <img src="{{ img_url('sub/close.png') }}">
        </a>
        <div class="Layer-Tit NG tx-dark-black">채점결과</div>
        <div class="Layer-Cont">
            <div class="PASSZONE-Lec-Section">
                <div class="LeclistTable editTableList mt20">
                    <table cellspacing="0" cellpadding="0" class="listTable editTable bdt-gray bdb-gray upper-gray fc-bd-none tx-gray">
                        <colgroup>
                            <col style="width: 115px;">
                            <col style="width: 235px;">
                            <col style="width: 115px;">
                            <col style="width: 235px;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="w-tit bg-light-white strong">과제제목</th>
                            <td class="w-data tx-left tx-gray pl15" colspan="3">온라인 독해 첨삭지도1</td>
                        </tr>
                        <tr>
                            <th class="w-tit bg-light-white strong">첨삭교수</th>
                            <td class="w-data tx-left pl15">한덕현</td>
                            <th class="w-tit bg-light-white strong">채점완료일</th>
                            <td class="w-data tx-left pl15">2018-00-00</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="editDetailWrap p_re mt30 mb60">
                        <ul class="tabWrap tabDepth2">
                            <li><a id="edit1" href="#ch1">과제보기</a></li>
                            <li><a id="edit2" href="#ch2">작성답안</a></li>
                            <li><a id="edit3" href="#ch3">채점결과</a></li>
                        </ul>
                        <div class="tabBox mt30">
                            <div id="ch1" class="tabLink">
                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                    <colgroup>
                                        <col style="width: 100%;">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td class="w-file tx-left pt-zero pb-zero">
                                            <ul class="up-file">
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일4가 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일5가 노출됩니다.docx</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-file tx-left pt20 pl30 pr30">
                                            A. 다음 각 문장을 끊어진 대로 해석하시오.<br/><br/>
                                            1. Everyone's nose is a different shape.// <br/><br/>
                                            2. Researchers may know why.// <br/><br/>
                                            3. Researchers say / it could be because of the climate.//<br/><br/>
                                            4. People with wider noses / live / in warm, humid areas.// <br/><br/>
                                            5. People with narrower noses / live / in colder, drier places.// <br/><br/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="ch2" class="tabLink">
                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 550px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th class="w-list tx-left pl30"><strong>답안 제목이 노출됩니다.</strong><span class="row-line">|</span></th>
                                        <th class="w-date normal">2018-00-00 00:00</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                            <ul class="up-file">
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                            A. 다음 각 문장을 끊어진 대로 해석하시오.<br/>
                                            1. Riyadh, / the Saudi capital, / offers cheap cost of living / in a more stable environment, / with price controls on staples in Saudi Arabia continuing to guarantee low prices for many goods.//<br/>
                                            Riyadh는 / 사우디의 수도인 / 낮은 생계비를 요구한다 / 보다 안정적인 환경에서, / 사우디 아라비아에서 주 요품목 가격 통제를 통해 / 많은 상폼의 낮은 가격 보장을 지속하면서.<br/><br/>

                                            2. Saudi Arabia has / enough recoverable oil / to maintain current levels of production for 90 years.<br/>
                                            사우디 아라비아는 가지고 있다 / 충분한 원유를 / 90년 간 현재 생산 수준을 유지할.<br/><br/>

                                            3. Trends / in oil output and the global oil market / will remain a key determinant of the country's long-term prospects.<br/>
                                            석유 생산과 국제 석유 시작의 경향은 / 유지될 것이다 / 국가의 장기적 전망의 핵심 결정 요인으로서.<br/><br/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="ch3" class="tabLink">
                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 550px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th class="w-list tx-left pl30"><strong>답안 제목이 노출됩니다.</strong><span class="row-line">|</span></th>
                                        <th class="w-date normal">2018-00-00 00:00</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                            <ul class="up-file">
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                            A. 다음 각 문장을 끊어진 대로 해석하시오.<br/>
                                            1. Riyadh, / the Saudi capital, / offers cheap cost of living / in a more stable environment, / with price controls on staples in Saudi Arabia continuing to guarantee low prices for many goods.//<br/>
                                            Riyadh는 / 사우디의 수도인 / 낮은 생계비를 요구한다 / 보다 안정적인 환경에서, / 사우디 아라비아에서 주 요품목 가격 통제를 통해 / 많은 상폼의 낮은 가격 보장을 지속하면서.<br/><br/>

                                            2. Saudi Arabia has / enough recoverable oil / to maintain current levels of production for 90 years.<br/>
                                            사우디 아라비아는 가지고 있다 / 충분한 원유를 / 90년 간 현재 생산 수준을 유지할.<br/><br/>

                                            3. Trends / in oil output and the global oil market / will remain a key determinant of the country's long-term prospects.<br/>
                                            석유 생산과 국제 석유 시작의 경향은 / 유지될 것이다 / 국가의 장기적 전망의 핵심 결정 요인으로서.<br/><br/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdb-gray tx-gray fc-bd-none">
                                    <colgroup>
                                        <col style="width: 115px;">
                                        <col style="width: 585px;">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">첨삭첨부</th>
                                        <td class="w-file tx-left pt-zero pb-zero">
                                            <ul class="up-file">
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- willbes-Layer-PassBox : 채점결과 -->
</div>
@stop