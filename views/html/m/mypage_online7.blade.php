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
                수강연장
            </div>
        </div>
    </div>

    <div class="willbes-Txt NGR c_both mt30 ">
        <div class="willbes-Txt-Tit NG">· 수강연장 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
        - 수강연장된 강의는 일시정지를 신청할 수 없습니다.<br/>
        - 강좌별로 <span class="tx-red">최대3회까지</span>만 가능하며, <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span><br/>
        - 수강연장은 종료일까지만 신청이 가능하며 5일단위(5일, 10일, 15일)로 신청할 수 있습니다.
    </div>

    <div class="willbes-List-Tit NG">수강연장 신청</div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
        <tbody>
            <tr>
                <td class="w-data tx-left pb-zero">
                    <dl class="w-info">
                        <dt>영어<span class="row-line">|</span>한덕현교수님 <span class="NSK ml10 nBox n2">진행중</span></dt>
                    </dl>
                    <div class="w-tit">
                        <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>잔여기간 : <span class="tx-light-blue">50</span>일 (2018-00-00 ~ 2018-00-00)</dt>
                    </dl>
                    <div class="bdt-m-gray pt10 pb10">
                        <strong class="mr10">연장일수</strong>
                        <select id="" name="" title="" class="seleProcess">
                            <option selected="selected" value="5일">5일</option>
                            <option value="10일">10일</option>
                            <option value="15일">15일</option>
                        </select>
                        <strong class="mr10 ml10">[연장수강종료일]</strong> 2020-01-06                                            
                    </div>
                    <div class="bdt-m-gray pt15 pb15"><strong>결제금액</strong> 7,500원</div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="AddlecMore">
        <a href="#none">신청하기</a>
    </div>

    <div class="daysListTabs willbes-Txt c_both">
        <div class="willbes-Txt-Tit NG">수강연장 이력 ( 잔여횟수 <span class="tx-light-blue">1</span>회 <span class="row-line">|</span> 잔여기간 <span class="tx-light-blue">10</span>일 ) <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <colgroup>
                <col style="width: 13%;">
                <col style="width: 87%;">
            </colgroup>
            <tbody>
                <tr>
                    <td class="w-num"><strong>1차</strong></td>
                    <td class="w-data tx-left pl2p">
                        <dl class="w-info">
                            <dt>[연장일수] 5일</dt>
                        </dl>    
                        <dl class="w-info">
                            <dt>[신청일자] 2019-09-27 13:14:36</dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-num"><strong>2차</strong></td>
                    <td class="w-data tx-left pl2p">
                    <dl class="w-info">
                            <dt>[연장일수] 5일</dt>
                        </dl>    
                        <dl class="w-info">
                            <dt>[신청일자] 2019-09-27 13:14:36</dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-num"><strong>3차</strong></td>
                    <td class="w-data tx-left pl2p">
                    <dl class="w-info">
                            <dt>[연장일수] 5일</dt>
                        </dl>    
                        <dl class="w-info">
                            <dt>[신청일자] 2019-09-27 13:14:36</dt>
                        </dl>
                    </td>
                </tr>
            </tbody>
        </table> 
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