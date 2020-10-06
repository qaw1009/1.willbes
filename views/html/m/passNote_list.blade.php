@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        합격수기
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="" name="" title="" class="width49p">
            <option selected="selected">카테고리</option>
            <option value="">교육학</option>
            <option value="">유아</option>
            <option value="">국어</option>
        </select>
        <select id="" name="" title="" class="width50p ml1p">
            <option selected="selected">과목</option>
            <option value="">교육학</option>
            <option value="">유아</option>
            <option value="">국어</option>
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

    <div class="btnBox mb20">
        <ul class="width100p">
            <li class="InfoBtn btn_blue f_right mg0"><a href="#none">등록하기</a></li>
        </ul>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
                <tr>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[유아]</span> 2020학년도 최종합격수기</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>홍길*<span class="row-line">|</span></dt>
                            <dt>2018-00-00<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[유아]</span> 2020학년도 최종합격수기</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>홍길*<span class="row-line">|</span></dt>
                            <dt>2018-00-00<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[영어]</span> 2020학년도 최종합격수기</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>홍길*<span class="row-line">|</span></dt>
                            <dt>2018-00-00<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none"><span class="tx-blue">[전기·전자·통신]</span> 2020학년도 최종합격수기</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>홍길*<span class="row-line">|</span></dt>
                            <dt>2018-00-00<span class="row-line">|</span></dt>
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