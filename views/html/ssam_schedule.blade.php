@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">임용<span class="row-line">|</span></li>
                <li class="subTit">윌비스임용</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">내강의실</a>
                </li>
                <li>
                    <a href="#none">강의안내/신청</a>
                </li>
                <li>
                    <a href="#none">무료강의</a>
                </li>
                <li>
                    <a href="#none">임용정보</a>
                </li>
                <li>
                    <a href="#none">고객센터</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth"><span class="depth-Arrow">></span><strong>임용정보</strong></span>
        <span class="depth"><span class="depth-Arrow">></span><strong>강의실 배정표</strong></span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Counsel c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 강의실 배정표</div>

            <div class="willbes-User-Info mt40">
                <div class="calendarTable widthAutoFull">
                    <table cellpadding="0" cellspacing="0" class="calendar NG">
                        <colgroup>
                            <col style="width: 14.28%"/>
                            <col style="width: 14.28%"/>
                            <col style="width: 14.28%"/>
                            <col style="width: 14.28%"/>
                            <col style="width: 14.28%"/>
                            <col style="width: 14.28%"/>
                            <col style="width: 14.28%"/>
                        </colgroup>
                        <thead>
                            <tr class="calendar_month">
                                <th colspan="7" class="">
                                    <span class="prev"><a href="#none"><img src="{{ img_url('counsel/calendar_prev.png') }}"></a></span>
                                    2020년&nbsp;&nbsp;&nbsp;&nbsp;09월
                                    <span class="next"><a href="#none"><img src="{{ img_url('counsel/calendar_next.png') }}"></a></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="calendar_week">
                                <td>일</td>
                                <td>월</td>
                                <td>화</td>
                                <td>수</td>
                                <td>목</td>
                                <td>금</td>
                                <td>토</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><a href="#noe" class="viewSchedule">1<span>배정표</span></a></td>
                                <td><a href="#noe" class="viewSchedule">2<span>배정표</span></a></td>
                                <td><a href="#noe" class="viewSchedule today">3<span>배정표</span></a></td>
                                <td><a href="#noe" class="viewSchedule">4<span>배정표</span></a></td>
                                <td><a href="#noe" class="viewSchedule">5<span>배정표</span></a></td>
                            </tr>
                            <tr class="calendar_day">
                                <td><a href="#noe" class="viewSchedule">6</a></td>
                                <td><a href="#noe" class="viewSchedule">7</a></td>
                                <td><a href="#noe" class="viewSchedule">8</a></td>
                                <td><a href="#noe" class="viewSchedule">9</a></td>
                                <td><a href="#noe" class="viewSchedule">10</a></td>
                                <td><a href="#noe" class="viewSchedule">11</a></td>
                                <td><a href="#noe" class="viewSchedule">12</a></td>
                            </tr>
                            <tr class="calendar_day">
                                <td><a href="#noe" class="viewSchedule">13</a></td>
                                <td><a href="#noe" class="viewSchedule">14</a></td>
                                <td><a href="#noe" class="viewSchedule">15</a></td>
                                <td><a href="#noe" class="viewSchedule">16</a></td>
                                <td><a href="#noe" class="viewSchedule">17</a></td>
                                <td><a href="#noe" class="viewSchedule active">18</a></td>
                                <td><a href="#noe" class="viewSchedule">19</a></td>
                            </tr>
                            <tr class="calendar_day">
                                <td><a href="#noe" class="viewSchedule">20</a></td>
                                <td><a href="#noe" class="viewSchedule">21</a></td>
                                <td><a href="#noe" class="viewSchedule">22</a></td>
                                <td><a href="#noe" class="viewSchedule">23</a></td>
                                <td><a href="#noe" class="viewSchedule">24</a></td>
                                <td><a href="#noe" class="viewSchedule">25</a></td>
                                <td><a href="#noe" class="viewSchedule">26</a></td>
                            </tr>
                            <tr class="calendar_day">
                                <td><a href="#noe" class="viewSchedule">27</a></td>
                                <td><a href="#noe" class="viewSchedule">28</a></td>
                                <td><a href="#noe" class="viewSchedule">29</a></td>
                                <td><a href="#noe" class="viewSchedule">30</a></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="scheduleImg">
                        <div class="scheduleDate NSK-Black"><span>2020년 09월 03일 (목)</span></div>  
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/schedule_sample.png" title="강의실 배정표">   
                        <div class="scheduleTxt">
                            {{--배정표 미 등록시--}}                  
                            등록된 강의실 배정표가 없습니다.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Counsel -->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop