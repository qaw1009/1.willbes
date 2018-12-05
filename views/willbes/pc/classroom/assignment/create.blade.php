@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h920 abs" style="display: block">
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
@stop