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
                무한 PASS존
            </div>
        </div>
    </div>
    
    <div class="willbes-Line">이용중인 무한 PASS (2)</div>
    <div class="willbes-Lec-Selected NG c_both tx-gray">
        <select id="process" name="process" title="process" class="seleProcess width25p">
            <option selected="selected">과정</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="name" name="name" title="name" class="seleName width74p ml1p">
            <option selected="selected">무한 PASS명</option>
            <option value="PASS1">PASS1</option>
            <option value="PASS2">PASS2</option>
            <option value="PASS3">PASS3</option>
        </select>
    </div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
        <tbody>
            <tr>
                <td class="w-data tx-left">
                    <div class="w-tit">
                        <a href="#none">윌비스 페트라 PASS 7기 (1년)</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>[수강기간] <span class="tx-blue">2018.10.20 ~ 2018.11.20</span> <span class="tx-black">(잔여기간<span class="tx-pink">100일</span>)</span></dt>
                    </dl>
                    <div class="InfoBtn btn_white mt10"><a href="#none">등록기기정보 <span>▶</span></a></div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="AddlecMore">
        <a href="{{ site_url('/home/html/m/mypage_pass2') }}"><img src="{{ img_url('m/mypage/icon_add_black.png') }}"> 강좌추가</a>
    </div>
    <div class="willbes-Lec-Selected NG c_both tx-gray">
        <select id="lecture" name="lecture" title="lecture" class="seleLec width29n5p">
            <option selected="selected">과목</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="prof" name="prof" title="prof" class="seleProf width29n5p ml1p">
            <option selected="selected">교수님</option>
            <option value="교수님1">교수님1</option>
            <option value="교수님2">교수님2</option>
            <option value="교수님3">교수님3</option>
        </select>
        <select id="type" name="type" title="type" class="seleType width29n5p ml1p">
            <option selected="selected">학습유형</option>
            <option value="학습유형1">학습유형1</option>
            <option value="학습유형2">학습유형2</option>
        </select>
        <div class="resetBtn width8p ml1p">
            <a href="#none"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
        </div>
    </div>
    <div class="lineTabs lecListTabs c_both bdt-m-gray">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap four mt-zero">
            <li><a href="#leclist1" class="on">수강중 <span>3</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist2">즐겨찾기 <span>6</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist3">수강완료 <span>2</span></a><span class="row-line">|</span></li>
            <li><a href="#leclist4">숨긴강좌 <span>4</span></a></li>
        </ul>
        <div class="tabBox lineBox lecListBox">
            <div id="leclist1" class="tabContent pt20">
                {{--<div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>--}}
                <div class="btnBox mb20">
                    <div class="InfoBtn btn_white"><a href="#none">삭제</a></div>
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
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml5 nBox n2">진행중</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml5 nBox n1">2배수</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">50%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">100</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml5 nBox n4">완강</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
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
            <div id="leclist2" class="tabContent pt20" style="display: none;">
                {{--<div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>--}}
                <div class="btnBox mb20">
                    <div class="InfoBtn btn_white bdr-none"><a href="#none" style="padding: 0;"><img src="{{ img_url('m/mypage/icon_star_off.png') }}"></a></div>
                    <div class="InfoBtn btn_white"><a href="#none">숨기기</a></div>
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
                                    <dt>영어<span class="row-line">|</span>OOO교수님 <span class="NSK ml10 nBox n1">2배수</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n3">예정</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">50%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">100</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">완강</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일<span class="row-line">|</span><</dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
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
            <div id="leclist3" class="tabContent pt20" style="display: none;">
                {{--<div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>--}}
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
                                    <dt>영어<span class="row-line">|</span>OOO교수님 <span class="NSK ml10 nBox n1">2배수</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n3">예정</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">50%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">100</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
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
            <div id="leclist4" class="tabContent pt20" style="display: none;">
                {{--<div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>--}}
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
                                    <dt>영어<span class="row-line">|</span>OOO교수님 <span class="NSK ml10 nBox n1">2배수</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n3">예정</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                                    <dt>진도율 : <span class="tx-blue">50%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">100</span>일<span class="row-line">|</span></dt>
                                    <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
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