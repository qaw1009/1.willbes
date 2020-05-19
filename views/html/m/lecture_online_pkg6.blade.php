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
                수강신청 > 기간제 패키지
            </div>
        </div>
    </div>

    <div>
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">일반경찰</option>
                    <option value="">경행경채</option>
                    <option value="">경찰승진</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">2020년</option>
                    <option value="2019년">2019년</option>
                    <option value="2018년">2018년</option>
                    <option value="2017년">2017년</option>
                </select>
            </li>
            <li class="resetBtn2">
                <a href="#none">초기화</a>
            </li>           
        </ul>

        <div class="willbes-Lec-Selected NG c_both tx-gray pb-zero">
            <select id="process" name="process" title="process" class="seleProcess width30p">
                <option selected="selected">최근등록순</option>
                <option value="과정순">과정순</option>
            </select>
        </div>
        <div class="willbes-Lec-Search NG width100p pl20 pr20 pb20 mt10">
            <div class="inputBox width100p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="강좌명" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
        </div>

        <div class="lineTabs lecListTabs mb40 c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <colgroup>
                    <col style="width: 87%;">
                    <col style="width: 13%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="w-tit">
                                <a href="#none">2020 [합격을 깨우는 0교시] 기미진 기특한 국어 새벽실전모의고사 PASS</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2020년 3월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">120일</span> <span class="NSK ml10 nBox n1">무제한</span></dt><br>
                                <dt><span class="tx-blue">190,000원</span>(↓ 230,000원)</dt>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="w-tit">
                                <a href="#none">2020 [합격을 깨우는 0교시] 기미진 기특한 국어 새벽실전모의고사 PASS</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2020년 3월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">120일</span> <span class="NSK ml10 nBox n1">무제한</span></dt><br>
                                <dt><span class="tx-blue">190,000원</span>(↓ 230,000원)</dt>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="w-tit">
                                <a href="#none">2020 [합격을 깨우는 0교시] 기미진 기특한 국어 새벽실전모의고사 PASS</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2020년 3월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">120일</span> <span class="NSK ml10 nBox n1">무제한</span></dt><br>
                                <dt><span class="tx-blue">190,000원</span>(↓ 230,000원)</dt>
                            </dl>
                        </td>
                    </tr>                    
                </tbody>
            </table>
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