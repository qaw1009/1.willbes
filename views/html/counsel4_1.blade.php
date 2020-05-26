@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/counsel1') }}">상담실</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">상담실</li>
                            <li><a href="{{ site_url('/home/html/counsel1') }}">일반상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel2') }}">인적성/면접상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel3_1') }}">심층상담예약</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>상담실</strong>
            <span class="depth-Arrow">></span><strong>1:1 전화상담</strong>
        </span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Counsel c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 1:1 전화상담 예약</div>
            <div class="willbes-counsel_step step mt40 NG c_both">
                <ul>
                    <li class="active"><div class="num">01</div>전화 상담일자/시간예약</li>
                    <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
                    <li><div class="num">02</div>사전정보입력</li>
                    <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
                    <li><div class="num">03</div>전화 상담 예약 완료</li>
                </ul>
                <div class="info-Box info-Box1 NG">
                    <dl>
                        <dt>
                            · 상담은 월 ~ 일요일 오전 10시부터 오후 5시까지 진행됩니다.<br/>
                            · 원하시는 상담일자를 선택하여 예약가능 버튼을 클릭해 주세요.<br/>
                            · 예약이 마감된 경우 또는 상담시간 이외 시간대는 예약신청이 불가능 합니다. (예약취소 발생시 ‘ 예약가능 ’ 버튼 재활성화)<br/>
                            · 예약하기를 신청하신후 반드시 사전정보 입력을 해 주셔야 상담신청이 완료됩니다.<br/>
                        </dt>
                    </dl>
                </div>
            </div>
            <div class="counsel_infoBox tx-black GM mb50">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 125px;">
                            <col style="width: 660px;">
                            <col style="width: 155px;">
                        </colgroup>
                        <tbody>
                            <tr class="userInfoBox">
                                <th><strong>캠퍼스 선택</strong></th>
                                <td class="w-list tx-left pl20">
                                    <select id="select" name="select" title="캠퍼스 선택" class="">
                                        <option selected="selected">캠퍼스 선택</option>
                                        <option value="노량진">노량진</option>
                                        <option value="노량진1">노량진1</option>
                                        <option value="노량진2">노량진2</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                                        <span><strong>나의 예약현황</strong></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="willbes-User-Info">
                <div class="calendarTable f_left">
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
                                    2018년&nbsp;&nbsp;&nbsp;&nbsp;12월
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
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>1</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>2<span class="calendar_btn btn_end">예약마감</span></td>
                                <td>3<span class="calendar_btn btn_ing">예약가능</span></td>
                                <td>4<span class="calendar_btn btn_end">예약마감</span></td>
                                <td>5<span class="calendar_btn btn_end">예약마감</span></td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>16</td>
                                <td>17</td>
                                <td>18</td>
                                <td>19</td>
                                <td>20</td>
                                <td><div class="highlight">21</div></td>
                                <td>22</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>23</td>
                                <td>24</td>
                                <td>25</td>
                                <td>26</td>
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                            </tr>
                            <tr class="calendar_day">
                                <td>30</td>
                                <td>31</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="timeTable f_right NG">
                    <div class="timeTit">
                        상담시간 선택<div class="timeSubTit">(*상담 시간을 선택해 주세요.)</div>
                    </div>
                    <div class="SelectDay NGR"><span class="NGEB">[날짜]</span>&nbsp;2018-10-25 (목)</div>
                    <div class="SelectTime NGR">
                        <ul>
                            <li class="SelectTxt">
                                <div class="Txt">
                                    캠퍼스 선택 후<br/>
                                    상담일자를 선택해 주세요.
                                </div>
                            </li>
                            <li>
                                <div class="Time">10:00 ~ 10:30</div>
                                <div class="Condition end">예약마감</div>
                            </li>
                            <li>
                                <div class="Time">10:40 ~ 11:00</div>
                                <div class="Condition end">예약마감</div>
                            </li>
                            <li>
                                <div class="Time">11:10 ~ 11:30</div>
                                <div class="Condition end">예약마감</div>
                            </li>
                            <li>
                                <div class="Time">11:40 ~ 12:00</div>
                                <div class="Condition end">예약마감</div>
                            </li>
                            <li class="lunchTime">
                                <div class="Time">12:00 ~ 14:00</div>
                                <div class="Condition">점심시간</div>
                            </li>
                            <li>
                                <div class="Time">14:10 ~ 14:30</div>
                                <div class="Condition ing"><a href="#none">예약가능 <img src="{{ img_url('counsel/icon_arrow.png') }}"></a></div>
                            </li>
                            <li>
                                <div class="Time">14:40 ~ 15:00</div>
                                <div class="Condition ing"><a href="#none">예약가능 <img src="{{ img_url('counsel/icon_arrow.png') }}"></a></div>
                            </li>
                            <li>
                                <div class="Time">15:10 ~ 15:30</div>
                                <div class="Condition end">예약마감</div>
                            </li>
                            <li>
                                <div class="Time">15:40 ~ 16:00</div>
                                <div class="Condition end">예약마감</div>
                            </li>
                            <li>
                                <div class="Time">16:10 ~ 16:30</div>
                                <div class="Condition ing"><a href="#none">예약가능 ></a></div>
                            </li>
                            <li>
                                <div class="Time">16:40 ~ 17:00</div>
                                <div class="Condition ing"><a href="#none">예약가능 <img src="{{ img_url('counsel/icon_arrow.png') }}"></a></div>
                            </li>
                            <li>
                                <div class="Time">17:10 ~ 17:30</div>
                                <div class="Condition ing"><a href="#none">예약가능 <img src="{{ img_url('counsel/icon_arrow.png') }}"></a></div>
                            </li>
                            <li>
                                <div class="Time">17:40 ~ 18:00</div>
                                <div class="Condition ing"><a href="#none">예약가능 <img src="{{ img_url('counsel/icon_arrow.png') }}"></a></div>
                            </li>
                        </ul>
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