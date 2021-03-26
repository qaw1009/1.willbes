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
                보강동영상 수강하기
            </div>
        </div>
    </div>

    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
        <tbody>
            <tr>
                <td class="w-data tx-left">
                    <dl class="w-info">
                        <dt>유아<span class="row-line">|</span>민정선 </dt>
                    </dl>
                    <div class="w-tit tx-blue">
                        <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>수강기간 : <span class="tx-black">2021.00.00 ~ 2021.00.00 </span><span class="row-line">|</span></dt>
                        <dt>보강동영상 신청일 : <span class="tx-black">2021. 00. 00</span>일</dt>
                    </dl>
                </td>
            </tr>
        </tbody>
    </table>

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

    <div id="Fixbtn" class="Fixbtn three">
        <ul>
            <li class="btn_black_line"><a href="javascript:;" onclick="fnDown('WD');">WIDE 다운</a></li>
            <li class="btn-purple"><a href="javascript:;" onclick="fnDown('HD');">HIGH 다운</a></li>
            <li class="btn_gray"><a href="javascript:;" onclick="fnDown('SD');">LOW 다운</a></li>
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