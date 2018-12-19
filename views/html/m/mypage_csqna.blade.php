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
        <select id="faqDiv" name="faqDiv" title="FAQ구분" class="seleFAQdiv width50p">
            <option selected="selected">FAQ구분</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
        </select>
        <select id="faqCate" name="faqCate" title="FAQ분류" class="seleFAQcate width49p ml1p">
            <option selected="selected">FAQ분류</option>
            <option value="학원">학원</option>
            <option value="온라인">온라인</option>
        </select>
        <div class="willbes-Lec-Search NG width100p mt1p">
            <div class="inputBox width88p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목 및 내용 검색" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
            <div class="resetBtn width10p">
                <a href="#none"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
            </div>
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
        <div class="Paging">
            <ul>
                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                <li><a href="#none">2</a><span class="row-line">|</span></li>
                <li><a href="#none">3</a><span class="row-line">|</span></li>
                <li><a href="#none">4</a><span class="row-line">|</span></li>
                <li><a href="#none">5</a></li>
                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
            </ul>
        </div>
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