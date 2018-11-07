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
                시작일변경
            </div>
        </div>
    </div>

    <div class="willbes-Txt NGR c_both mt30 mb50">
        <div class="willbes-Txt-Tit NG">· 수강시작일 설정 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
        - 수강시작일은 개강일 전까지만 변경 가능합니다.<br/>
        - '시작일변경'버튼을 클릭하면 강의별 <span class="tx-red">최대 3회, 개강일기준 30일까지</span>만 변경이 가능합니다.<br/>
        - 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.<br/>
        - 수강시작이 이루어진 강좌는 시작일 변경이 불가능합니다.<br/>
    </div>
    <div class="willbes-List-Tit NG">수강시작일 설정</div>
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
                    <div class="w-s-date">
                        <div class="grid calendarPickerBtn">
                            <a class="pl20" href="#none" onclick="openWin('DATAPICKERPASS')">
                                시작일 변경 : <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30" > (시작)
                                ~ <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30"> (종료)
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="AddlecMore">
        <a href="#none">변경하기</a>
    </div>

    <div class="daysListTabs willbes-Txt c_both">
        <div class="willbes-Txt-Tit NG">수강시작일 변경이력 ( <span class="tx-light-blue">1</span>회 <span class="row-line">|</span> <span class="tx-light-blue">10</span>일 ) <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
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
                            <dt>[수강변경일] 2018-00-00 ~ 2018-00-00</dt>
                        </dl>
                        <dl class="w-info tx-gray">
                            <dt>[변경자] 회원명<span class="row-line">|</span>[변경일] 2018-00-00</dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-num"><strong>2차</strong></td>
                    <td class="w-data tx-left pl2p">
                        <dl class="w-info">
                            <dt>[수강변경일] 2018-00-00 ~ 2018-00-00</dt>
                        </dl>
                        <dl class="w-info tx-gray">
                            <dt>[변경자] 회원명<span class="row-line">|</span>[변경일] 2018-00-00</dt>
                        </dl>
                    </td>
                </tr>
                <tr>
                    <td class="w-num"><strong>3차</strong></td>
                    <td class="w-data tx-left pl2p">
                        <dl class="w-info">
                            <dt>[수강변경일] 2018-00-00 ~ 2018-00-00</dt>
                        </dl>
                        <dl class="w-info tx-gray">
                            <dt>[변경자] 회원명<span class="row-line">|</span>[변경일] 2018-00-00</dt>
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

    <div id="DATAPICKERPASS" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h470 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('DATAPICKERPASS')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="calendarTable NG">
                <div class="datepicker-days">
                    <table cellspacing="0" cellpadding="0" class="table-condensed">
                        <colgroup>
                            <col style="width: 14.28%;"/>
                            <col style="width: 14.28%;"/>
                            <col style="width: 14.28%;"/>
                            <col style="width: 14.28%;"/>
                            <col style="width: 14.28%;"/>
                            <col style="width: 14.28%;"/>
                            <col style="width: 14.28%;"/>
                        </colgroup>
                        <thead>
                            <tr class="month">
                                <th colspan="7" class="datepicker-switch">
                                    <span class="prev Btn"><a href="#none"><img src="{{ img_url('m/calendar/calendar_prev.png') }}"></a></span>
                                    <span class="month tx-light-blue">July</span> 2018
                                    <span class="next Btn"><a href="#none"><img src="{{ img_url('m/calendar/calendar_next.png') }}"></a></span>
                                </th>
                            </tr>
                            <tr class="week">
                                <th class="dow">Sun</th>
                                <th class="dow">Mon</th>
                                <th class="dow">Tue</th>
                                <th class="dow">Wed</th>
                                <th class="dow">Thr</th>
                                <th class="dow">Fri</th>
                                <th class="dow">Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="empty">&nbsp;</td>
                                <td class="day"><div class="num">1</div></td>
                                <td class="day"><div class="num">2</div></td>
                                <td class="day"><div class="num">3</div></td>
                                <td class="day"><div class="num">4</div></td>
                                <td class="day"><div class="num">5</div></td>
                                <td class="day"><div class="num">6</div></td>
                            </tr>
                            <tr>
                                <td class="day"><div class="num">7</div></td>
                                <td class="day"><div class="num">8</div></td>
                                <td class="day"><div class="num">9</div></td>
                                <td class="day"><div class="num">10</div></td>
                                <td class="day"><div class="num">11</div></td>
                                <td class="day"><div class="num">12</div></td>
                                <td class="day"><div class="num">13</div></td>
                            </tr>
                            <tr>
                                <td class="day"><div class="num">14</div></td>
                                <td class="day"><div class="num">15</div></td>
                                <td class="day"><div class="num">16</div></td>
                                <td class="day start"><div class="num">17</div></td>
                                <td class="day ing"><div class="num">18</div></td>
                                <td class="day ing"><div class="num">19</div></td>
                                <td class="day ing"><div class="num">20</div></td>
                            </tr>
                            <tr>
                                <td class="day ing"><div class="num">21</div></td>
                                <td class="day end"><div class="num">22</div></td>
                                <td class="day"><div class="num">23</div></td>
                                <td class="day"><div class="num">24</div></td>
                                <td class="day"><div class="num">25</div></td>
                                <td class="day"><div class="num">26</div></td>
                                <td class="day"><div class="num">27</div></td>
                            </tr>
                            <tr>
                                <td class="day"><div class="num">28</div></td>
                                <td class="day"><div class="num">29</div></td>
                                <td class="day"><div class="num">30</div></td>
                                <td class="day"><div class="num">31</div></td>
                                <td class="empty">&nbsp;</td>
                                <td class="empty">&nbsp;</td>
                                <td class="empty">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
            <div class="AddlecMore">
                <a href="#none">확인</a>
            </div>
        </div>
        <!--<div class="dim" onclick="closeWin('DATAPICKERPASS')"></div>-->
    </div>
    <!-- willbes-Layer-PassBox : 쪽지 -->

</div>
<!-- End Container -->
@stop