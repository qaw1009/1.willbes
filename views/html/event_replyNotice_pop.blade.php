@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<div class="willbes-Layer-PassBox NGR">
    <!-- Write -->
    <div class="willbes-Leclist c_both">
        <div class="LecWriteTable">
            
            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                <colgroup>
                    <col style="width:15%;">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-tit bg-light-white strong">제목</td>
                        <td class="w-text tx-left pl30" colspan="3">
                            <input type="text" id="TITLE" name="TITLE" class="iptTitle" style="width: 90%;" maxlength="30">
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white strong">내용</td>
                        <td class="w-textarea write tx-left pl30" colspan="3">
                            <textarea style="width: 90%;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white strong">첨부</td>
                        <td class="w-file answer tx-left" colspan="4">
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


    <div class="willbes-Leclist mt20 c_both">
        <div class="LecViewTable">
            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                <colgroup>
                    <col style="width: 645px;">
                    <col style="width: 135px;">
                    <col style="width: 160px;">
                </colgroup>
                <thead>
                    <tr>
                        <td class="w-list tx-left pl20">
                            <strong>안녕하세요. 커리질문입니다~</strong>
                            <span class="row-line">|</span>
                        </td>
                        <td class="w-write">작성자명<span class="row-line">|</span></td>
                        <td class="w-date">2018-00-00 00:00</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="w-file tx-left pl20" colspan="3">
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-txt answer tx-left" colspan="3">
                            기승전결문제에서가부분이인믈과배경제시나,<br/>
                            다부분이주인공이동라,마부분이문제발샹및해결바부분이<br/>
                            후일담여기까지는이해가되는데선택지4번이왜정답인지모르겠어요.....<br/>
                            4번답이가ㅡ나, 다ㅡ라,마ㅡ바입니다ㅠㅠ
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="search-Btn mt20 h36 p_re">
                <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                    <a href="#none" class="tx-purple-gray">삭제</a>
                </div>
                <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                    <a href="#none" class="tx-purple-gray">수정</a>
                </div>
                <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                    <a href="#none">목록</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!--willbes-Layer-PassBox//-->

@stop