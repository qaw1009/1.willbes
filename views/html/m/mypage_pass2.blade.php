@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>    
                무한 PASS 강좌추가
            </div>
        </div>
    </div>

    <div class="willbes-Txt NGR c_both mt20">
        - 체크박스 선택 후 '강좌추가' 버튼을 클릭하시면 수강이 가능합니다.<br/>
        - 강좌상세정보는 PC 버전에서만 확인할 수 있습니다.
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="process" name="process" title="process" class="seleProcess width24p">
            <option selected="selected">과정</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="prof" name="prof" title="prof" class="seleProf width24p ml1p">
            <option selected="selected">교수님</option>
            <option value="교수님1">교수님1</option>
            <option value="교수님2">교수님2</option>
            <option value="교수님3">교수님3</option>
        </select>
        <select id="type" name="type" title="type" class="seleType width50p ml1p">
            <option selected="selected">학습유형</option>
            <option value="학습유형1">학습유형1</option>
            <option value="학습유형2">학습유형2</option>
        </select>
        <div class="willbes-Lec-Search NG width100p mt1p">
            <div class="inputBox width90p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="강좌명" maxlength="30">
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
        <div class="lecAllChk">
            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"><label>전체선택</label>
        </div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <colgroup>
                <col style="width: 13%;">
                <col style="width: 87%;">
            </colgroup>
            <tbody>
                <tr>
                    <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>경찰<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현교수님</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                            <dt>진행여부 : <span class="tx-blue">진행중</span></dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>경찰<span class="row-line">|</span>수학<span class="row-line">|</span>한덕현교수님</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                            <dt>진행여부 : <span class="tx-blue">진행중</span></dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>공무원<span class="row-line">|</span>영어<span class="row-line">|</span>OOO교수님</dt>
                        </dl>
                        <div class="w-tit">
                            <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                            <dt>진행여부 : <span class="tx-blue">진행중</span></dt>
                        </dl>
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

    <div id="Fixbtn" class="Fixbtn two">
        <ul>
            <li class="btn_blue"><a href="#none">선택강좌추가</a></li>
            <li class="btn_gray"><a href="#none">목록</a></li>
        </ul>
    </div>
    <!-- Fixbtn -->

</div>
<!-- End Container -->
@stop