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
    

    <div class="paymentWrap">
        <div class="paymentCts">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            유의사항 안내
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="pl0 pr0" colspan="2"> 
                            <div class="SubTit tx14">- 제출상태</div>
                            <div class="Txt">
                                <span class="aBox redBox NSK">답안제출</span>
                                <div class="SubTxt">‘답안제출’을 클릭하여 첨삭과제를 확인하고 답안을 제출하세요.</div>
                            </div>
                            <div class="Txt mt5">
                                <span class="aBox blueBox NSK">답안수정</span>
                                <div class="SubTxt">첨삭 체출을 완료했으나 답안수정이 필요한 경우 제출기간 내에 답안 수정이 가능합니다.</div>
                            </div>
                            <div class="SubTit mt10 tx14">- 채점상태</div>
                            <div class="Txt">
                                <span class="aBox blueBoxborder NSK">채점중</span>
                                <div class="SubTxt">
                                    제출기간이 지나면 채점이 진행됩니다. 채점은 2-3일 소요됩니다.‘채점중'을 클릭하여 제출한 답안을 확인할 수 있습니다.
                                </div>
                            </div>
                            <div class="Txt mt5">
                                <span class="aBox waitBox_block NSK">채점완료</span>
                                <div class="SubTxt">채점이 완료되었습니다. '채점완료'를 클릭하여 채점 결과를 확인하세요.</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="willbes-Txt2 tx-blue">
        1기스터디
    </div>

    <div class="lineTabs lecListTabs c_both">
        <div class="tabContent">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">한림법학원 온라인 첨삭 과제 6회차입니다</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>제출기간 2020-00-00~2020-00-00</li>
                            </ul>

                            <div class="mt10">
                                <a href="#none" class="btnSt03border mr10">답안제출</a>                             
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">한림법학원 온라인 첨삭 과제 5회차입니다</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>제출기간 2020-00-00~2020-00-00</li>
                            </ul>
                            <div class="mt10">
                                <a href="#none" class="btnSt01 mr10">답안수정</a>                           
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">한림법학원 온라인 첨삭 과제 4회차입니다</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>제출기간 2020-00-00~2020-00-00</li>
                            </ul>

                            <div class="mt10">
                                <a href="#none" class="btnSt02 mr10">제출완료</a>
                                <a href="#none" class="btnSt01border mr10">채점중</a>                             
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">한림법학원 온라인 첨삭 과제 3회차입니다</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>제출기간 2020-00-00~2020-00-00</li>
                            </ul>

                            <div class="mt10">
                                <a href="#none" class="btnSt02 mr10">제출완료</a>
                                <a href="#none" class="btnSt02border mr10">채점완료</a>                             
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">한림법학원 온라인 첨삭 과제 2회차입니다</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>제출기간 2020-00-00~2020-00-00</li>
                            </ul>

                            <div class="mt10">
                                <a href="#none" class="btnSt02 mr10">미제출</a>                           
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="#none">한림법학원 온라인 첨삭 과제 1회차입니다</a>
                            </div>
                            <ul class="w-info acad tx-gray">
                                <li>제출기간 2020-00-00~2020-00-00</li>
                            </ul>

                            <div class="mt10">
                                <a href="#none" class="btnSt02 mr10">미제출</a>                           
                            </div>
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