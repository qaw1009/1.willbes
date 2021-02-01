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
                온라인첨삭
            </div>
        </div>
    </div> 

    <div class="willbes-Txt2">
        채점결과
        <div class="tx12 mt10">- 첨삭과제 학인</div>
    </div>    

    <div class="tx14 pd20">
        한림법학원 온라인 첨삭 과제 6회차입니다. 한림법학원 온라인 첨삭 과제를 제출해주세요. 
    </div>

    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
        <col width="80px"/>
        <col/>
        <tbody>
            <tr class="bgst01">
                <th>점수</th>
                <td>60</td>
            </tr>
            <tr class="bgst01">
                <th>제출일</th>
                <td>2020-00-00 00:00</td>
            </tr>
            <tr class="bgst01">
                <th>채점일</th>
                <td>2020-00-00 00:00</td>
            </tr>
        </tbody>
    </table>

    <div class="lineTabs lecListTabs mt50 bdt-gray">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap three mt-zero">
            <li><a href="#leclist1" class="on">과제보기</a><span class="row-line">|</span></li>
            <li><a href="#leclist2">작성답안</a></li>       
            <li><a href="#leclist3">채점결과</a></li>       
        </ul>

        <div id="leclist1" class="tabContent">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr class="flie">
                        <td class="w-file NGR">
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                        </td>
                    </tr>
                    <tr class="txt">
                        <td class="w-txt NGR">
                            과제를 제출해주세요.
                            과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다.
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>

        <div id="leclist2" class="tabContent">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr class="flie">
                        <td class="w-file NGR">
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일명이 노출됩니다.pdf</a>
                        </td>
                    </tr>
                    <tr class="txt">
                        <td class="w-txt NGR">
                            과제제출합니다
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>

        <div id="leclist3" class="tabContent">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr class="flie">
                        <td class="w-file NGR">
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일명이 노출됩니다.pdf</a>
                        </td>
                    </tr>
                    <tr class="txt">
                        <td class="w-txt NGR">
                            잘했어요!
                        </td>
                    </tr>
                    <tr class="flie">
                        <td class="w-file NGR">
                            <div class="tx-dark-blue strong">첨삭첨부</div>
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
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

    <div id="Fixbtn" class="Fixbtn one">
        <ul>
            <li class="btn_gray"><a href="#none">목록</a></li>
        </ul>
    </div>
    <!-- Topbtn -->
</div>
<!-- End Container -->
@stop