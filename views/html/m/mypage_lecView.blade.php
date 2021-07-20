@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>    
                강의수강하기
            </div>
        </div>
    </div>

    <div>
        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td>
                            <div class="w-prof p_re">
                                <img src="{{ img_url('m/sample/prof2.jpg') }}">
                                <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                            </div>
                            <div class="w-data tx-left pl15 pb10">
                                <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                <dl class="w-info pt-zero">
                                    <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현</dt>
                                </dl>
                                <div class="w-tit">
                                    <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)</a>
                                </div> 
                                <div class="w-info tx-gray">
                                    <dl>
                                        <dt class="h22"><strong>강의정보</strong>진행중 <span class="row-line">|</span> 무제한</dt><br/>
                                        <dt class="h22"><strong>진도율 :</strong><span class="tx-blue">98%</span></dt><br/>
                                        <dt class="h22">
                                            <strong>잔여기간 :</strong><span class="tx-blue">46일</span>(2020.11.11~2021.02.18)
                                        </dt>
                                    </dl>
                                </div>                               
                            </div>  


                            <div class="w-info tx-gray bdt-bright-gray lh1_5">
                                ※ 해당 강좌는 회차별 자료 인쇄 제한이 있습니다.<br/>
                                자료는 PC에서만 확인 가능합니다.
                            </div> 

                            
                            <div class="lecReview bdt-bright-gray pt10">
                                <a href="#none">수강후기 작성하기</a>
                            </div> 
                            
                            <div class="tx-red lh1_5 mt20">
                                ※ 강의를 수강하지 않고 자료만 다운로드 받은 경우 수강한 것으로 간주합니다. (환불 시 해당 회차 차감)
                            </div> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="buttonTabs passTabs c_both">
            <div class="tabBox buttonBox passBox">
                <div id="notice1" class="tabContent">
                    <div class="passListTabs c_both">
                        <form name="downForm" id="downForm" >
                            <table class="lecTable">
                                <colgroup>
                                    <col style="width:50px;">
                                    <col>
                                </colgroup>
                                <thead>
                                <tr>
                                    <td class="w-chk" colspan="2"><input type="checkbox" id="allchk" name="allchk" class="goods_chk"> <label>전체선택</label></td>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-chk tx-center"><input type="checkbox" id="wUnitIdx" name="u[]" value="1205703" class="goods_chk unitchk" ></td>
                                        <td class="w-data tx-left">
                                            <div class="w-tit mb10">                                                                                                                                                                                                    1강
                                                hls.willbes.net
                                                <p>[설명] 테스트1</p> 
                                            </div>
                                            <dl class="w-info tx-gray mb10">
                                                <dt>강의시간 : 50분<span class="row-line">|</span></dt>
                                                <dt>수강시간 : 90분<span class="row-line">|</span></dt>
                                                <dt>잔여시간 : <span class="tx-blue">무제한</span></dt>
                                            </dl>
                                            <ul class="w-free NGEB">
                                                <li class="btn_black_line"><a href="#none">WIDE</a></li>
                                                <li class="btn_blue"><a href="#none">HIGH</a></li>
                                                <li class="btn_gray"><a href="#none">LOW</a></li>
                                                <li class="w-data">
                                                    <a href="javascript:;" onclick="alert('해당 강의자료는 PC에서만 확인 가능합니다.');">
                                                        <img src="{{ img_url('m/mypage/icon_lec.png') }}">                                                                
                                                        <span class="underline">강의자료</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="finish">
                                        <td class="w-chk tx-center"><input type="checkbox" id="wUnitIdx" name="u[]" value="1205703" class="goods_chk unitchk" ></td>
                                        <td class="w-data tx-left">
                                            <div class="w-tit mb10">                                                                                                                                                                                                    1강
                                                hls.willbes.net
                                                <p>[설명] 테스트1</p> 
                                            </div>
                                            <dl class="w-info tx-gray mb10">
                                                <dt>강의시간 : 50분<span class="row-line">|</span></dt>
                                                <dt>수강시간 : 90분<span class="row-line">|</span></dt>
                                                <dt>잔여시간 : <span class="tx-blue">무제한</span></dt>
                                            </dl>
                                            <ul class="w-free NGEB">
                                                <li class="btn_black_line"><a href="#none">WIDE</a></li>
                                                <li class="btn_blue"><a href="#none">HIGH</a></li>
                                                <li class="btn_gray"><a href="#none">LOW</a></li>
                                                <li class="w-data">
                                                    <a href="javascript:;" onclick="alert('해당 강의자료는 PC에서만 확인 가능합니다.');">
                                                        <img src="{{ img_url('m/mypage/icon_lec.png') }}">                                                                
                                                        <span class="underline">강의자료</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="w-data tx-center">개설된 강좌 목록이 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="lec-btns">
            <ul>
                <li class="btn_black_line"><a href="#none" onClick='alert("강좌 또는 교재를 선택하세요.")'>WIDE 다운</a></li>
                <li class="btn-purple"><a href="#none" onclick="openWin('LecBuyMessagePop')">HIGH 다운</a></li>
                <li class="btn_gray"><a href="#none" onClick='alert("도서구입비 소득공제 ...")' >LOW 다운</a></li>
            </ul>
        </div>--}}

        <div id="Fixbtn" class="Fixbtn three">
            <ul>
                <li class="btn_black_line"><a href="javascript:;" onclick="fnDown('WD');">WIDE 다운</a></li>
                <li class="btn-purple"><a href="javascript:;" onclick="fnDown('HD');">HIGH 다운</a></li>
                <li class="btn_gray"><a href="javascript:;" onclick="fnDown('SD');">LOW 다운</a></li>
            </ul>
        </div>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    <div id="LecBuyMessagePop" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                해당 상품이 장바구니에 담겼습니다.<br>
                장바구니로 이동하시겠습니까?
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray">예</a>
                <a href="#none" class="btn_white">계속구매</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
    </div>
    <!-- willbes-Layer-PassBox : 쪽지 -->

</div>
<!-- End Container -->
@stop