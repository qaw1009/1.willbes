@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="willbes-Leclist mt40 c_both">
        <div class="LecWriteTable">
            <div>수강생정보</div>
            <table cellspacing="0" cellpadding="0" class="listTable upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                <tbody>
                    <tr>
                        <td class="w-selected full tx-left">
                            <label>이름</label> <input type="text" id="name" name="name" class="iptName" maxlength="30">
                            <label>아이디</label> <input type="text" id="id" name="id" class="iptId" maxlength="30">
                            <label>전화번호</label> <input type="text" id="tel" name="tel" class="iptTel" maxlength="30">
                            <div>* 전화번호를 꼭 확인해 주세요. 인증완료시 SMS로 발송될 예정입니다.</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-radio tx-left">
                            <div>인증파일등록</div>
                            <ul>
                                <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>경찰공무원</label></li>
                                <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>의무경찰</label></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="tx-left">
                            <label>소속</label> <input type="text" id="nm" name="nm" class="iptNm" maxlength="30">
                            <label>직위/직급</label> <input type="text" id="rank" name="rank" class="iptRank" maxlength="30">
                        </td>
                    </tr>
                    <tr>
                        <td class="w-file answer tx-left pl-zero">
                            인증파일업로드
                            <ul class="attach">
                                <li>
                                    <!--div class="filetype">
                                        <input type="text" class="file-text" />
                                        <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                        <span class="file-select"-->
                                            <input type="file" class="input-file" size="3">
                                        <!--/span>
                                        <input class="file-reset NSK" type="button" value="X" />
                                    </div-->
                                </li>
                                <li>• 2MB까지 업로드 가능하며, 이미지파일 (jpg,png등) 또는 PDF파일 형태로 첨부</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="search-Btn mt20 h36 p_re">
                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                    <span>인증완료</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
@stop