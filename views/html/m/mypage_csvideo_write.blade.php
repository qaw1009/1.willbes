@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        동영상 상담실
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="process" name="process" title="process" class="seleProcess width50p">
            <option selected="selected">과정선택</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="cate" name="cate" title="카테고리" class="seleCate width49p ml1p">
            <option selected="selected">카테고리선택</option>
            <option value="학원">학원</option>
            <option value="온라인">온라인</option>
        </select>
        <select id="A" name="A" title="A" class="seleLecA width34p mt1p">
            <option selected="selected">상담유형선택</option>
            <option value="기타">기타</option>
            <option value="강좌내용">강좌내용</option>
            <option value="학습상담">학습상담</option>
        </select>
        <select id="s_campus" name="s_campus" title="캠퍼스" class="seleCampus width34p ml1p mt1p">
            <option value="">캠퍼스 선택</option> 
        </select>
        <span class="chkBox line2">
            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <span>비밀글 여부</span>
        </span>
        <div class="willbes-Lec-Search NG width100p mt1p">
            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목" maxlength="30">
        </div>
    </div>

    <div class="willbes-WriteBox NG tx-gray pb20">
        <textarea></textarea>
        <div class="filetype p_re mt10">
            <input type="text" class="file-text"/>
            <span class="file-btn reset-Btn f_right width25p ml1p">Search</span>
            <span class="file-select"><input type="file" class="input-file" size="3"></span>
        </div>
    </div>
                                 
    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    <div id="Fixbtn" class="Fixbtn two">
        <ul>
            <li class="btn_blue"><a href="#none">등록</a></li>
            <li class="btn_gray"><a href="#none">취소</a></li>
        </ul>
    </div>
    <!-- Fixbtn -->

</div>
<!-- End Container -->
@stop