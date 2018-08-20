@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        무한 PASS존
    </div>

    <div class="passProfTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <colgroup>
                <col style="width: 15%;">
                <col style="width: 85%;">
            </colgroup>
            <tbody>
                <tr>
                    <td>
                        <div class="w-prof p_re">
                            <img src="{{ img_url('m/sample/prof2.jpg') }}">
                            <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                        </div>
                        <div class="w-data tx-left pl15">
                            <dl class="w-info">
                                <dt>경찰<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현교수님</dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)</a>
                            </div>
                        </div>
                        <div class="w-info tx-gray">
                            <dl>
                                <dt><strong>강좌정보 :</strong> 진행중<span class="row-line">|</span>2배수</dt>
                                <dt><strong>진도율 :</strong> <span class="tx-blue">2%</span>(1강/20강)<span class="row-line">|</span> <strong>잔여기간 :</strong> <span class="tx-blue">10일</span>(~2018-00-00)</dt>
                            </dl>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="buttonTabs passTabs c_both">
        <ul class="tabWrap buttonWrap noticeWrap">
            <li><a href="#notice1" class="on">일시정지</a></li>
            <li><a href="#notice2">수강연장</a></li>
            <li><a href="#notice3">수강후기</a></li>
            <li><a href="#notice4">학습 Q&A</a></li>
        </ul>
        <div class="tabBox buttonBox noticeBox">
            <div id="notice1" class="tabContent">
                aa
            </div>
            <div id="notice2" class="tabContent" style="display: none;">
                bb
            </div>
            <div id="notice3" class="tabContent" style="display: none;">
                cc
            </div>
            <div id="notice4" class="tabContent" style="display: none;">
                dd
            </div>
        </div>
    </div>

    <div class="BuylecMore">
        <a href="{{ site_url('/home/html/m/mypage_pass2') }}">강좌 교재구매 <img src="{{ img_url('m/mypage/icon_arrow.png') }}"></a>
    </div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable buylecTable">
        <colgroup>
            <col style="width: 13%;">
            <col style="width: 87%;">
        </colgroup>
        <tbody>
            <tr>
                <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                <td class="w-data tx-left">
                    <div class="w-tit">
                        <a href="#none"><span class="tx-light-blue">주교재</span>2018 정채영 국어 마무리시리즈[문학편]_137 작품을 알려주마 (제2판)</a>
                    </div>
                    <dl class="w-info">
                        <dt><span class="tx-light-blue">[판매중]</span> 30,000원↓ 20%</dt>
                    </dl> 
                </td>
            </tr>
        </tbody>
    </table>

    <div class="passListTabs c_both">
        <div class="passListWrap">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <colgroup>
                <col style="width: 13%;">
                <col style="width: 87%;">
            </colgroup>
            <thead>
                <tr>
                    <td class="w-chk" colspan="2"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전체선택</label></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none">1강. 강의명이 출력됩니다.</a>
                        </div>
                        <dl class="w-info tx-gray mb30">
                            <dt>강의시간 : 60분<span class="row-line">|</span></dt>
                            <dt>수강시간 : 60분<span class="row-line">|</span></dt>
                            <dt>잔여기간 : <span class="tx-blue">60분</span></dt>
                        </dl>
                        <ul class="w-free NGEB">
                            <li class="btn_black_line"><a href="#none">WIDE</a></li>
                            <li class="btn_blue"><a href="#none">HIGH</a></li>
                            <li class="btn_gray"><a href="#none">LOW</a></li>
                            <li class="w-data"><a href="#none"><img src="{{ img_url('m/mypage/icon_lec.png') }}"> <span class="underline">강의자료</span></a></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none">2강. 강의명이 출력됩니다.</a>
                        </div>
                        <dl class="w-info tx-gray mb30">
                            <dt>강의시간 : 60분<span class="row-line">|</span></dt>
                            <dt>수강시간 : 60분<span class="row-line">|</span></dt>
                            <dt>잔여기간 : <span class="tx-blue">60분</span></dt>
                        </dl>
                        <ul class="w-free NGEB">
                            <li class="btn_black_line"><a href="#none">WIDE</a></li>
                            <li class="btn_blue"><a href="#none">HIGH</a></li>
                            <li class="btn_gray"><a href="#none">LOW</a></li>
                            <li class="w-data"><a href="#none"><img src="{{ img_url('m/mypage/icon_lec.png') }}"> <span class="underline">강의자료</span></a></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none">3강. 강의명이 출력됩니다.</a>
                        </div>
                        <dl class="w-info tx-gray mb30">
                            <dt>강의시간 : 60분<span class="row-line">|</span></dt>
                            <dt>수강시간 : 60분<span class="row-line">|</span></dt>
                            <dt>잔여기간 : <span class="tx-blue">60분</span></dt>
                        </dl>
                        <ul class="w-free NGEB">
                            <li class="btn_black_line"><a href="#none">WIDE</a></li>
                            <li class="btn_blue"><a href="#none">HIGH</a></li>
                            <li class="btn_gray"><a href="#none">LOW</a></li>
                            <li class="w-data"><a href="#none"><img src="{{ img_url('m/mypage/icon_lec.png') }}"> <span class="underline">강의자료</span></a></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="lecMore">
        <a href="#none">더보기 (<span class="tx-black">10</span>/20)</a>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    <div id="Fixbtn" class="Fixbtn three">
        <ul>
            <li class="btn_black_line"><a href="#none">WIDE 다운</a></li>
            <li class="btn-purple"><a href="#none">HIGH 다운</a></li>
            <li class="btn_gray"><a href="#none">LOW 다운</a></li>
        </ul>
    </div>

</div>
<!-- End Container -->
@stop