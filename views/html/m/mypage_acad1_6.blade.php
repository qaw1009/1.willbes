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
                좌석선택하기
            </div>
        </div>
    </div>    

    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
        <colgroup>
            <col style="width: 87%;">
            <col style="width: 13%;">
        </colgroup>
        <tbody>
            <tr class="replyList willbes-Open-Table">
                <td class="w-data tx-left">
                    <div class="w-tit tx16">결제정보 및 좌석정보 </div>
                </td>
                <td class="MoreBtn tx-center">></td>
            </tr>
            <tr class="willbes-Open-List">
                <td class="w-data tx-left" colspan="2">
                    <ul class="disc tx-gray">
                        <li><strong>주문번호</strong>    20190000000000000000</li>
                        <li><strong>회원정보</strong>    한주연(lilstar) <span class="row-line">|</span> 010-1243-0000 </li>
                        <li><strong>결제금액</strong>    300,000원</li>
                        <li><strong>결제일</strong>      2020-01-30 10:04:18</li>
                        <li><strong>결제상태</strong>    결제완료</li>
                        <li><strong>상품명</strong>       1기스터디</li>
                        <li><strong>단과반정보</strong> 1기스터디_감정평가실무_여지훈</li>
                        <li><strong>좌석정보</strong><br>
                            [강의실명] <span class="tx-blue">404호</span> | <span class="tx-blue">404호</span><br>
                            [좌석번호] <span class="tx-red">미선택</span><br>
                            [좌석선택기간] <span class="tx-blue">2020-07-23 ~ 2020-11-10</span>
                        </li>
                    </ul>
                </td>
            </tr>                
        </tbody>
    </table>

    <div class="seatChoiceSec">
        <div class="seatBtn"><a href="#none">좌석배치도 보기 ></a></div>
        <div class="seatInfo">
            <div class="tx-red">※ 좌석선택 주의사항</div> 
            하단 좌석 선택란의 좌석 위치는 실제 좌석 배치와 다르니, 첨부된 [좌석배치도]의 실제 좌석 위치 확인 후 해당하는 좌석 번호를 선택해 주시기 바랍니다. 
        </div>
        <div class="seatChoice"><span>선택가능</span> <span>선택완료</span></div>
        <div class="seatNumber">
            <ul>
                <li style="width:calc(100%/10);">
                    <button type="button" class="sNumberA">001</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberB">002</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberC">003</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="active">004</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberA">005</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberB">006</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberB">007</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberB">008</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberB">009</button>
                </li>
                <li style="width: calc(100%/10);">
                    <button type="button" class="sNumberB">010</button>
                </li>

                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberA">011</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberB">012</button>
                </li>
                <li style="width:calc(100%/5);">
                    <button type="button" class="sNumberB">013</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberA">014</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberB">015</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberB">016</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberB">017</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberB">018</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberB">019</button>
                </li>
                <li style="width: calc(100%/5);">
                    <button type="button" class="sNumberB">020</button>
                </li>

                <li style="width: calc(100%/2);">
                    <button type="button" class="sNumberB">019</button>
                </li>
                <li style="width: calc(100%/2);">
                    <button type="button" class="sNumberB">020</button>
                </li>
            </ul>   
        </div>
    </div>
    

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>

    <div class="lec-btns w100p">
        <ul>
            <li><a href="#none" class="btn-purple">적용</a></li>
        </ul>
    </div>
    <!-- Topbtn -->
</div>
<!-- End Container -->
@stop