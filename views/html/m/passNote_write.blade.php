@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        합격수기
    </div>
    <div class="willbes-Lec-Selected tx-gray">
        <select id="cate" name="cate" title="과목" class="seleCate width50p">
            <option selected="selected">카테고리선택</option>
            <option value="학원">학원</option>
            <option value="온라인">온라인</option>            
        </select>
        <select id="process"  name="process" title="process" class="seleProcess width49p ml1p">
            <option selected="selected">과목선택</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <div class="willbes-Lec-Search width100p mt1p">
            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목" maxlength="30">
        </div>
    </div>

    <div class="willbes-WriteBox tx-gray pb20">
        <textarea placeholder="• 500자 이상 입력해 주세요.&#13;&#10;• 합격수기와 관련없는 내용은 삭제될 수 있습니다.&#13;&#10;• 합격인증 및 파일첨부는 필수사항이 아닙니다."></textarea>
        <div class="filetype p_re mt10">
            <input type="text" class="file-text"/>
            <span class="file-btn reset-Btn width25p ml1p">Search</span>
            <span class="file-select"><input type="file" class="input-file" size="3"></span>
            <input class="file-reset NSK" type="button" value="X" />
        </div>
        <div class="mt10 lh1_5">
            • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
            • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
        </div>
        <div class="agree-Chk mt10 toggle">
            <div class="chk">
                <div class="AllchkBox agree-All-Tit p_re">
                    아래 내용에 동의합니다. 
                    <div class="chkBox-Agree">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </div>
                </div>
            </div>
            <div class="agree-Tit">
                <a href="#none">
                    개인정보 수집 및 이용에 대한 안내 <span class="tx-blue">(필수)</span>  <span class="v_arrow">▼</span>
                </a>
            </div>
            <div class="agree-Txt">
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
            </div>
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