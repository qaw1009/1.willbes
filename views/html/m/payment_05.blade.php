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
                포인트 관리
            </div>
        </div>
    </div>
   

    <div class="paymentWrap">
        <div class="pointHead">
            <h4 class="NGEB">포인트 관리</h4>
            <ul>
                <li>
                    강좌<br>
                    <span class="tx-blue">12,000</span> P
                </li>
                <li>
                    교재<br>
                    <span class="tx-blue">3,000</span> P
                </li>
            </ul>
        </div>

        <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a href="#pointlist1" class="on">강좌</a><span class="row-line">|</span></li>
            <li><a href="#pointlist2">교재</a></li>
        </ul>

        <div id="pointlist1" class="pointBox">
            <ul class="pointLec">
                <li>
                    사용가능<br>
                    <span class="tx-blue">12,000</span> P
                </li>
                <li>
                    당월소멸예정<br>
                    <span class="tx-blue">3,000</span> P
                </li>
            </ul>

            <div class="paymentDate">        
                <div class="payLecList NGR">
                    <strong>기간검색</strong>  
                    <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="20" placeholder="주문일">
                    ~ <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="20" placeholder="주문일"></span>                
                </div>
                <ul class="c_both">
                    <li><a href="#none">전체</a></li>
                    <li><a href="#none">15일</a></li>
                    <li><a href="#none">1개월</a></li>
                    <li><a href="#none">3개월</a></li>
                    <li><a href="#none">6개월</a></li>
                </ul>
                <div class="btnSearch">
                    <a href="#none">검색</a>
                </div>
            </div>

            <div class="willbes-Lec-Selected NG c_both tx-gray pt-zero">
                <select id="process" name="process" title="process" class="seleProcess width30p">
                    <option selected="selected">과정</option>
                    <option value="과정1">과정1</option>
                </select>
            </div>

            <div class="pointList">
                <div>
                    <ul>    
                        <li>경찰</li>
                        <li>2019-06-26</li>
                        <li class="tx-blue">+ 10,000</li>
                    </ul>
                </div>
                <div>
                    <ul>    
                        <li>경찰</li>
                        <li>2019-06-15</li>
                        <li>- 3,000</li>
                    </ul>
                </div>
                <div>
                    <ul>    
                        <li>경찰</li>
                        <li>2019-06-10</li>
                        <li>- 3,000</li>
                    </ul>
                </div>
                <div>
                    <ul>    
                        <li>공무원</li>
                        <li>2019-06-26</li>
                        <li class="tx-blue">+ 3,000</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="pointlist2" class="pointBox">
            <ul class="pointLec">
                <li>
                    사용가능<br>
                    <span class="tx-blue">10,000</span> P
                </li>
                <li>
                    당월소멸예정<br>
                    <span class="tx-blue">2,000</span> P
                </li>
            </ul>

            <div class="paymentDate">        
                <div class="payLecList NGR">
                    <strong>기간검색</strong>  
                    <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="20" placeholder="주문일">
                    ~ <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="20" placeholder="주문일"></span>                
                </div>
                <ul class="c_both">
                    <li><a href="#none">전체</a></li>
                    <li><a href="#none">15일</a></li>
                    <li><a href="#none">1개월</a></li>
                    <li><a href="#none">3개월</a></li>
                    <li><a href="#none">6개월</a></li>
                </ul>
                <div class="btnSearch">
                    <a href="#none">검색</a>
                </div>
            </div>

            <div class="willbes-Lec-Selected NG c_both tx-gray pt-zero">
                <select id="process" name="process" title="process" class="seleProcess width30p">
                    <option selected="selected">과정</option>
                    <option value="과정1">과정1</option>
                </select>
            </div>

            <div class="pointList">
                <div>
                    <ul>    
                        <li>교재</li>
                        <li>2019-06-26</li>
                        <li class="tx-blue">+ 2,500</li>
                    </ul>
                </div>
                <div>
                    <ul>    
                        <li>교재</li>
                        <li>2019-06-10</li>
                        <li>- 3,000</li>
                    </ul>
                </div>
                <div>
                    <ul>    
                        <li>교재</li>
                        <li>2019-06-26</li>
                        <li class="tx-blue">+ 3,000</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="paymentCheckInfo">
            <h4>포인트안내</h4>
            <ul>
                <li><span class="tx-blue">강좌포인트</span>는 강좌구매시 적립 및 사용되는 포인트입니다.</li>
                <li><span class="tx-blue">교재포인트</span>는 교재구매시 적립 및 사용되는 포인트입니다.</li>
                <li>적립된포인트는 2,500P 이상인 경우 1P 단위로 유효기간까지 사용이 가능합니다.</li>
                <li>포인트의 사용/소멸시에는 유효기간이 가까운 포인트부터 차감됩니다.</li>
                <li>환불 시 사용된 포인트는 복원되지 않고 소멸되며, 적립된 포인트는 회수됩니다.</li>
                <li>자세한 포인트 적립 및 사용 내역은 PC버전에서 확인 가능합니다.</li>
            </ul>
        </div>        
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    {{--달력--}}
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
        <div class="dim" onclick="closeWin('DATAPICKERPASS')"></div>
    </div>
</div>
<!-- End Container -->
@stop