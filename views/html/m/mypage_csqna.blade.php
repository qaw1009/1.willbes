@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        자주하는 질문
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="process" name="process" title="process" class="seleProcess width24p">
            <option selected="selected">과정</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="acad" name="acad" title="구분" class="seleAcad width24p ml1p">
            <option selected="selected">구분</option>
            <option value="학원">학원</option>
            <option value="온라인">온라인</option>
        </select>
        <select id="A" name="A" title="A" class="seleLecA width50p ml1p">
            <option selected="selected">상담유형</option>
            <option value="기타">기타</option>
            <option value="강좌내용">강좌내용</option>
            <option value="학습상담">학습상담</option>
        </select>
        <div class="willbes-Lec-Search NG width100p mt1p mb30">
            <div class="inputBox width74p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="강좌명" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
            <div class="reset-Btn f_right width25p ml1p"><a href="#none">초기화</a></div>
        </div>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <colgroup>
                <col style="width: 87%;">
                <col style="width: 13%;">
            </colgroup>
            <tbody>
                <tr class="replyList willbes-Open-Table">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt><strong>학원</strong><span class="row-line">|</span><span class="tx-light-blue">회원정보 > 회원가입</span></dt>
                        </dl>
                        <div class="w-tit">
                            가입시 받게되는 혜택은 무엇이 있나요?<br/>
                            혜택은 무엇이 있나요?
                        </div>
                    </td>
                    <td class="MoreBtn tx-center">></td>
                </tr>
                <tr class="replyTxt willbes-Open-List bg-light-gray">
                    <td class="w-txt NGR" colspan="2">
                        로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/>
                    </td>
                </tr>
                <tr class="replyList willbes-Open-Table">
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt><strong>공통</strong><span class="row-line">|</span><span class="tx-light-blue">회원정보 > 회원가입</span></dt>
                        </dl>
                        <div class="w-tit">
                            가입시 받게되는 혜택은 무엇이 있나요?????<br/>
                            혜택은 무엇이 있나요222222?
                        </div>
                    </td>
                    <td class="MoreBtn tx-center">></td>
                </tr>
                <tr class="replyTxt willbes-Open-List bg-light-gray">
                    <td class="w-txt NGR" colspan="2">
                        수험생 여러분들께 보다 나은 수강환경을 제공해 드리기 위해<br/>
                        서버점검 및 개선작업이 진행될 예정입니다.<br/>
                        점검시간에는 수강이 원활하지 않으니 양해 부탁드립니다.<br/>
                        점검시간에는 수강이 원활하지 않으니 양해 부탁드립니다.<br/>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->
@stop