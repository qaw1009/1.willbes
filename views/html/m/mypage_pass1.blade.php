@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB">무한 PASS존</div>
    <div class="willbes-Line">이용중인 무한 PASS (2)</div>
    <div class="willbes-Lec-Selected GM tx-gray">
        <select id="process" name="process" title="process" class="seleProcess">
            <option selected="selected">과정</option>
            <option value="헌법">헌법</option>
            <option value="스파르타반">스파르타반</option>
            <option value="공직선거법">공직선거법</option>
        </select>
        <select id="name" name="name" title="name" class="seleName">
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
                    <div class="InfoBtn btn_white mt25"><a href="#none" onclick="openWin('MyTablets')">등록기기정보 <span>▶</span></a></div>
                </td>
            </tr>
        </tbody>
    </table>






    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap lecListWrap">
            <li><a href="#leclist1" class="on">즐겨찾기강좌 <span>3</span></a></li>
            <li><a href="#leclist2">수강중강좌 <span>6</span></a></li>
            <li><a href="#leclist3">숨긴강좌 <span>4</span></a></li>
        </ul>
        <div class="tabBox lineBox lecListBox">
            <div id="leclist1" class="tabContent">
                <div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col style="width: 10%;">
                        <col style="width: 90%;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-chk pl-zero"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진동율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일</dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk pl-zero"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>경찰<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n1">2배수</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사(4~5월) 영어제니스</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">16강</span><span class="row-line">|</span></dt>
                                    <dt>진동율 : <span class="tx-blue">50%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">100</span>일</dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-chk pl-zero"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n4">완강</span></dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">12강</span><span class="row-line">|</span></dt>
                                    <dt>진동율 : <span class="tx-blue">0%</span><span class="row-line">|</span></dt>
                                    <dt>잔여기간 : <span class="tx-blue">50</span>일</dt>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div id="leclist2" class="tabContent" style="display: none;">
                <div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>
                aaa
            </div>
            <div id="leclist3" class="tabContent" style="display: none;">
                <div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>
                bbb
            </div>
        </div>
    </div>


</div>
<!-- End Container -->
@stop