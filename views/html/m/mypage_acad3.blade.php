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
                보강동영상
            </div>
        </div>
    </div>

    <div class="lineTabs lecListTabs c_both">
        <div class="tabBox lineBox lecListBox">
            <div class="tabContent">
                <div class="willbes-Txt NGR c_both mt20">
                    <div class="willbes-Txt-Tit NG">· 보강동영상 유의사항 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                    - 보강동영상은 내강의실 > 학원강좌 > 수강신청강좌에서 보강 신청한 강좌를 수강하실 수 있습니다.<br/>
                    - 보강동영상은 기본 2일 기간으로 제공되며, <span class="tx-red">수강시작을 하지 않으면 7일 이후에 자동으로 수강시작됩니다.</span>
                </div>
                <div class="willbes-Lec-Selected NG c_both tx-gray">
                    <select id="lecture" name="lecture" title="lecture" class="seleLec width21p ml1p">
                        <option selected="selected">과목</option>
                        <option value="헌법">헌법</option>
                        <option value="스파르타반">스파르타반</option>
                        <option value="공직선거법">공직선거법</option>
                    </select>
                    <select id="prof" name="prof" title="prof" class="seleProf width45p ml1p">
                        <option selected="selected">교수님</option>
                        <option value="교수님1">교수님1</option>
                        <option value="교수님2">교수님2</option>
                        <option value="교수님3">교수님3</option>
                    </select>
                    <div class="resetBtn width10p ml1p">
                        <a href="#none"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                    </div>
                </div>
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <tbody>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>유아<span class="row-line">|</span>민정선</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">2021.00.00 ~ 2021.00.00 </span><span class="row-line">|</span></dt>
                                    <dt>보강동영상 신청일 : <span class="tx-black">2021. 00. 00</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">
                                    <ul class="two">
                                        <li class="btn_blue"><a href="#none">강의보기</a></li>                                     
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left pb-zero">
                                <dl class="w-info">
                                    <dt>유아<span class="row-line">|</span>민정선</dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">2021.00.00 ~ 2021.00.00 </span><span class="row-line">|</span></dt>
                                    <dt>보강동영상 신청일 : <span class="tx-black">2021. 00. 00</span>일</dt>
                                </dl>
                                <div class="w-start tx-gray">
                                    <ul class="two">
                                        <li class="btn_white"><a href="#none">수강시작</a></li>
                                        <li class="btn_white"><a href="#none">수강대기</a></li>                                        
                                    </ul> 
                                </div>
                                <div class="w-line">-</div>
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