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
                                <td>1<span class="roomTable">배정표</span></td>
                                <td>2<span class="roomTable">배정표</span></td>
                                <td class="today">3<span class="roomTable">배정표</span></td>
                                <td>4<span class="roomTable">배정표</span></td>
                                <td>5<span class="roomTable">배정표</span></td>
                            </tr>
                            <tr class="calendar_day">
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                                <td><a href="#noe" class="viewSchedule active">18</td>
                                <td>19</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>20</td>
                                <td>21</td>
                                <td>22</td>
                                <td>23</td>
                                <td>24</td>
                                <td>25</td>
                                <td>26</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                                <td>30</td>
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