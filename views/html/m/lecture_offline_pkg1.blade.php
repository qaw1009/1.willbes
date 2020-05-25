@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="onSearch">
        <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
        <label for="onsearch"><button title="검색">검색</button></label>
    </div>

    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">  
                학원수강신청 > 종합반
            </div>
        </div>
    </div>

    <div>
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">9급공무원</option>
                    <option value="">7급공무원</option>
                    <option value="">세무직</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">캠퍼스전체</option>
                    <option value="">캠퍼스1</option>
                    <option value="">캠퍼스2</option>
                    <option value="">캠퍼스2</option>
                </select>
            </li>
            <li>
                <select id=" " name=" " title=" ">
                    <option selected="selected">과정전체</option>
                    <option value="">과정1</option>
                    <option value="">과정2</option>
                    <option value="">과정3</option>
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
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="강의명" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <colgroup>
                    <col style="width: 87%;">
                    <col style="width: 13%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>신림(본원)<span class="row-line">|</span>GS3순환
                            </dl>
                            <div class="w-tit">
                                <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n1">방문+온라인</span> <span class="NSK nBox n2">접수중</span></dt><br>
                                <dt><span class="tx-blue">350,000원</span>(↓50%)</dt>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>신림(본원)<span class="row-line">|</span>GS3순환
                            </dl>
                            <div class="w-tit">
                                <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt><br>
                                <dt><span class="tx-blue">350,000원</span>(↓0%)</dt>
                            </dl>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>신림(본원)<span class="row-line">|</span>GS3순환
                            </dl>
                            <div class="w-tit">
                                <a href="lecture_offline_pkg2">20_PSAT종합반_3월반</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강월 <span class="tx-blue">2020년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강형태 <span class="tx-blue">실강</span> <span class="NSK ml10 nBox n4">방문접수</span> <span class="NSK nBox n2">접수중</span></dt><br>
                                <dt><span class="tx-blue">350,000원</span>(↓0%)</dt>
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