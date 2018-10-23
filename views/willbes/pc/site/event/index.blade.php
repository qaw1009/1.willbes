@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>
        <div class="willbes-Eventzone EVTZONE c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 진행중인 이벤트
                <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="willbes-Leclist c_both mt30">
            <div class="willbes-LecreplyList tx-gray c_both">
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                    <select id="event" name="event" title="event" class="seleEvt f_left">
                        <option selected="selected">전체 이벤트</option>
                        <option value="이벤트1">이벤트1</option>
                        <option value="이벤트2">이벤트2</option>
                    </select>
                    <select id="campus" name="campus" title="campus" class="seleCampus ml10 f_left">
                        <option selected="selected">전체 캠퍼스</option>
                        <option value="캠퍼스1">캠퍼스1</option>
                        <option value="캠퍼스2">캠퍼스2</option>
                    </select>
                </span>
            </div>
            <div class="LeclistTable orderTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 70px;">
                        <col style="width: 160px;">
                        <col style="width: 350px;">
                        <col style="width: 120px;">
                        <col style="width: 120px;">
                        <col style="width: 120px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>NO<span class="row-line">|</span></li></th>
                        <th colspan="2">이벤트 정보<span class="row-line">|</span></li></th>
                        <th>참여대상<span class="row-line">|</span></li></th>
                        <th>댓글수<span class="row-line">|</span></li></th>
                        <th>조회수</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="w-no"><img src="{{ img_url('sub/icon_HOT.gif') }}"></td>
                        <td class="w-img">
                            <a href="#none" onclick="openWin('APPLYPASS')"><img src="{{ img_url('sample/evt2.jpg') }}"></a>
                        </td>
                        <td class="w-data tx-left pl10">
                            <dl class="w-info">
                                <dt>
                                    노량진
                                </dt>
                            </dl><br/>
                            <div class="w-tit">
                                <a href="{{ site_url('/home/html/event_ing_read') }}"><strong><span class="tx-light-blue">[이벤트]</span> 18년 제1차 경찰공무원(순경) 채용 시험문제 - 국어</strong></a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                            </dl>
                        </td>
                        <td class="w-user">회원</td>
                        <td class="w-evt-reply">0</td>
                        <td class="w-view">123</td>
                    </tr>
                    <tr>
                        <td class="w-no">2</td>
                        <td class="w-img">
                            <img src="{{ img_url('sample/evt2.jpg') }}">
                        </td>
                        <td class="w-data tx-left pl10">
                            <dl class="w-info">
                                <dt>
                                    노량진<span class="row-line">|</span>
                                    기미진교수님
                                </dt>
                            </dl><br/>
                            <div class="w-tit">
                                <a href="#none"><strong><span class="tx-light-blue">[이벤트]</span> 이벤트/설명회/특강명이 노출됩니다.</strong></a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                            </dl>
                        </td>
                        <td class="w-user">회원+비회원</td>
                        <td class="w-evt-reply">0</td>
                        <td class="w-view">244</td>
                    </tr>
                    <tr>
                        <td class="w-no">1</td>
                        <td class="w-img">
                            <img src="{{ img_url('sample/evt2.jpg') }}">
                        </td>
                        <td class="w-data tx-left pl10">
                            <dl class="w-info">
                                <dt>
                                    노량진<span class="row-line">|</span>
                                    경찰학개론<span class="row-line">|</span>
                                    장정훈교수님
                                </dt>
                            </dl><br/>
                            <div class="w-tit">
                                <a href="#none"><strong><span class="tx-light-blue">[이벤트]</span> 이벤트/설명회/특강명이 노출됩니다.</strong></a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                            </dl>
                        </td>
                        <td class="w-user">회원</td>
                        <td class="w-evt-reply">0</td>
                        <td class="w-view">355</td>
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
                        <li><a href="#none">5</a><span class="row-line">|</span></li>
                        <li><a href="#none">6</a><span class="row-line">|</span></li>
                        <li><a href="#none">7</a><span class="row-line">|</span></li>
                        <li><a href="#none">8</a><span class="row-line">|</span></li>
                        <li><a href="#none">9</a><span class="row-line">|</span></li>
                        <li><a href="#none">10</a></li>
                        <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--
    TODO : 배너섹션 등록 후 설정 필요
    -->
    <div class="Quick-Bnr ml20">
        {!! banner('미정', '', $__cfg['SiteCode'], '0') !!}
    </div>
</div>
<!-- End Container -->
@stop