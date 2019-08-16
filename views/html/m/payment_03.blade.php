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
                주문/배송조회
            </div>
        </div>
    </div>
   

    <div class="paymentWrap">
        <div class="paymentDate">
            <div class="payLecList NGR">
                <strong>기간검색</strong>  
                <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" maxlength="15" style="width:120px" >
                ~ <input type="text" id="E-DATE" name="E-DATE" maxlength="15" style="width:120px"></span>                
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
            <select id="lecture" name="lecture" title="lecture" class="seleLec width30p ml1p">
                <option selected="selected">구분</option>
                <option value="구분1">구분1</option>
                <option value="구분2">구분2</option>
                <option value="구분3">구분3</option>
            </select>
            <span class="chk">                
                <input type="checkbox" id="bookinfo" name="">
                <label for="bookinfo">교재주문</label>
            </span>
        </div>

        <div class="paymentCheck">
            <h4>2019-07-02 <a href="#none">주문상세보기 ></a></h4>
            <ul>
                <li>경찰</li>
                <li>2019 신광은 형사소송법 기본이론 (19년 6월)</li>
                <li>신용카드</li>        
            </ul>
            <h4>2019-07-01 <a href="#none">주문상세보기 ></a></h4>
            <ul>
                <li>경찰</li>
                <li>2019 신광은 형사소송법 기본이론 (19년 6월)</li>
                <li>무통장입금(가상계좌)</li>        
            </ul>
        </div>

        <div class="paymentCheckInfo">
            <h4>주문/배송조회 안내</h4>
            <ul>
                <li>주문/배송상태는 입금대기→결제완료→발송준비→발송완료 단계로 이루어집니다.</li>
                <li>주문번호 혹은 주문내역을 클릭하시면 주문상세정보를 확인할 수 있습니다. </li>
                <li>무통장입금(가상계좌)는 주문 번호별 다른 계좌번호가 발급되오니 주문 상세정보에서 계좌번호를 확인해 주시기 바랍니다.</li>
            </ul>
            <h4>배송 안내</h4>
            <ul>
                <li>배송상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송처리되므로(토, 일, 공휴일 제외), '발송준비'로 변경된 배송상품의 주문취소/배송지 변경의 경우 고객센터를 통해서만 가능합니다.</li>
                <li>'발송완료'단계부터 배송조회가 가능하며, '배송조회'버튼 클릭시 배송상황을 확인할 수 있습니다.</li>
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