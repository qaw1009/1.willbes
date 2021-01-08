@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        이벤트
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="" name="" title="" class="width49p">
            <option selected="selected">전체 이벤트</option>
            <option value="">진행중</option>
            <option value="">종료</option>
        </select>
        <select id="" name="" title="" class="width50p ml1p">
            <option selected="selected">유형</option>
            <option value="">설명회</option>
            <option value="">특강</option>
            <option value="">이벤트</option>
        </select>  
        <div class="willbes-Lec-Search NG width100p mt1p">
            <div class="inputBox width88p p_re">
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch width100p" placeholder="제목 및 내용 검색" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
            <div class="resetBtn width10p">
                <a href="#none"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
            </div>
        </div>      
    </div>

    {{--
    <div class="btnBox mb20">
        <ul class="f_right">
            <li class="InfoBtn btn_white"><a href="#none">마감된 이벤트</a></li>
            <li class="InfoBtn btn_white"><a href="#none">진행중인 이벤트</a></li>
        </ul>
    </div>
    --}}

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
                <tr class="bg-light-blue">
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[이벤트]</span> 막판 정리 '퀵써머리 패키지' 수강안내</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt class="tx-red">진행중<span class="row-line">|</span></dt>  
                            <dt>기간 : 2020-09-18 ~ 2020-10-20<span class="row-line">|</span></dt>                            
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                        <div><a href="#none" class="btnblue">바로가기 ></a></div>
                    </td>
                </tr>
                <tr class="bg-light-blue">
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[설명회]</span> 2021 합격 전략 설명회</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt class="tx-red">진행중<span class="row-line">|</span></dt> 
                            <dt>기간 : 2020-09-18 ~ 2020-10-20<span class="row-line">|</span></dt>                            
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                        <div><a href="#none" class="btnblue">바로가기 ></a></div>
                    </td>
                </tr>
                <tr>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[이벤트]</span> 인강체험/환승할인 이벤트를 연중이벤트로 진행</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>종료<span class="row-line">|</span></dt>  
                            <dt>기간 : 2020-09-18 ~ 2020-10-20<span class="row-line">|</span></dt>                            
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                        <div><a href="#none" class="btnblue">바로가기 ></a></div>
                    </td>
                </tr>
                <tr>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[특강]</span> 스승의 날 감사인사 전하기</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>종료<span class="row-line">|</span></dt>
                            <dt>기간 : 2020-09-18 ~ 2020-10-20<span class="row-line">|</span></dt>                            
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="Paging">
            <ul>
                <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                <li><a href="#none">2</a><span class="row-line">|</span></li>
                <li><a href="#none">3</a><span class="row-line">|</span></li>
                <li><a href="#none">4</a><span class="row-line">|</span></li>
                <li><a href="#none">5</a></li>
                <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
            </ul>
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