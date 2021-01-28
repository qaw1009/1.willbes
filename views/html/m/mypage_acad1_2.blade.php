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
                강사선택현황
            </div>
        </div>
    </div>
   
    <div class="willbes-Txt2 NGR tx-blue">
        1기스터디
    </div>

    <ul class="paymentTxt NGR">
        <li>최종 선택한 과목 및 강사에 대한 현황을 확인하실 수 있습니다. </li>
    </ul>  

    <div class="lineTabs lecListTabs c_both">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a href="#leclist1" class="on">필수과목</a><span class="row-line">|</span></li>
            <li><a href="#leclist2">선택과목</a></li>            
        </ul>
        <div id="leclist1" class="tabContent">
            <div class="lec-info bd-none pt-zero">
                <h5>과정명이 출력됩니다.</h5>
                <div class="lec-choice-pkg">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <colgroup>
                            <col style="width: 100%;">
                        </colgroup>
                        <tbody>
                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    과목명이 출력됩니다
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="tx14">여지훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_여지훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li>
                                        </ul>
                                    </div>
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="tx14">여지훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_여지훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li> 
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    감정평가이론
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left" colspan="2">
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="chk">
                                                <label>[판매]</label>
                                                <input type="checkbox" id="" name="">
                                            </span>
                                            <span class="ml10 tx14">여지훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_여지훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li>
                                            <li>[강사선택기간] 2020-00-00 00:00 ~ 2020-00-00 00:00<li>   
                                        </ul>
                                    </div>
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="chk">
                                                <label>[판매]</label>
                                                <input type="checkbox" id="" name="">
                                            </span>
                                            <span class="ml10 tx14">여지훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_여지훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li>
                                            <li>[강사선택기간] 2020-00-00 00:00 ~ 2020-00-00 00:00<li>   
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
        <div id="leclist2" class="tabContent">
            <div class="lec-info bd-none pt-zero">
                <h5>과정명이 출력됩니다.</h5>
                <div class="lec-choice-pkg">
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                        <colgroup>
                            <col style="width: 100%;">
                        </colgroup>
                        <tbody>
                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    과목명이 출력됩니다
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="tx14">조훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_조훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li>
                                        </ul>
                                    </div>
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="tx14">여지훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_여지훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li> 
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    감정평가이론
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left" colspan="2">
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="chk">
                                                <label>[판매]</label>
                                                <input type="checkbox" id="" name="">
                                            </span>
                                            <span class="ml10 tx14">여지훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_여지훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li>
                                            <li>[강사선택기간] 2020-00-00 00:00 ~ 2020-00-00 00:00<li>   
                                        </ul>
                                    </div>
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="chk">
                                                <label>[판매]</label>
                                                <input type="checkbox" id="" name="">
                                            </span>
                                            <span class="ml10 tx14">여지훈 </span>
                                        </div>
                                        <div class="w-tit">
                                            실강 | 1기스터디_감정평가실무_여지훈
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] 2020-00-00~2020-00-00<li>
                                            <li>[요일(회차)] 월화수목금(20회차)<li>
                                            <li>[강사선택기간] 2020-00-00 00:00 ~ 2020-00-00 00:00<li>   
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>

    <div class="lec-btns w100p">
        <ul>
            <li><a href="#none" class="btn-purple">확인</a></li>
        </ul>
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