@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        강의실 배정표
    </div>

    <div class="mt20">
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
                        <td>3<a href="#none" class="viewSchedule today">&nbsp;</a><span class="roomTable">배정표</span></td>
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
                        <td>18<a href="#noe" class="viewSchedule active">&nbsp;</a></td>
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
                <div class="scheduleTxt NG">
                    {{--배정표 미 등록시--}}                  
                    등록된 강의실 배정표가 없습니다.
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