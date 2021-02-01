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
                강사선택
            </div>
        </div>
    </div>
   
    <div class="willbes-Txt2 tx-blue">
        1기스터디
    </div>

    <div class="paymentWrap">
        <div class="paymentCts">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            주문정보
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="pl0 pr0" colspan="2"> 
                            <ul class="payLecList payLecList02">
                                <li><strong>결제일</strong> 2020-10-13 00:00:00</li>
                                <li><strong>결제금액</strong> 2,600,000</li>
                                <li><strong>환불금액</strong> 0</li>
                                <li><strong>미납금액</strong> 0</li>
                                <li><strong>주문번호</strong> <a href="#none">20190000000000000000</a></li>
                                <li><strong>비고</strong> 2차납부</li>
                            </ul>
                            <ul class="payLecList payLecList02">
                                <li><strong>결제일</strong> 2020-10-13 00:00:00</li>
                                <li><strong>결제금액</strong> 2,600,000</li>
                                <li><strong>환불금액</strong> 0</li>
                                <li><strong>미납금액</strong> 0</li>
                                <li><strong>주문번호</strong> <a href="#none">20190000000000000000</a></li>
                                <li><strong>비고</strong> 1차납부</li>
                            </ul> 
                        </td>
                    </tr>
                </tbody>
            </table>

            <ul class="paymentTxt NGR">
                <li>수강할 강사를 선택해주세요.</li>
                <li>강사 선택 및 변경은 강사선택기간에만 가능하며, 기간이 지난 이후에는 변경이 불가능합니다.</li>
            </ul>  
        </div>
    </div>

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
                            <col style="width: 87%;">
                            <col style="width: 13%;">
                        </colgroup>
                        <tbody>
                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    과목명이 출력됩니다
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List">
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

                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    감정평가이론
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List">
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
                            <col style="width: 87%;">
                            <col style="width: 13%;">
                        </colgroup>
                        <tbody>
                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    과목명이 출력됩니다
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List">
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

                            <tr class="replyList willbes-Open-Table">
                                <td>
                                    감정평가이론
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List">
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
            <li><a href="#none" class="btn-purple">적용</a></li>
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