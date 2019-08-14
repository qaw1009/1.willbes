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
                쿠폰/수강권 관리
            </div>
        </div>
    </div>   

    <div class="paymentWrap">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a href="#pointlist1" class="on">쿠폰</a><span class="row-line">|</span></li>
            <li><a href="#pointlist2">수강권</a></li>
        </ul>          

        <div id="pointlist1" class="pointBox">
            <ul class="pointLec mb-zero mt20">
                <li>
                    사용가능<br>
                    <span class="tx-blue">3</span> 장
                </li>
                <li>
                    당월소멸예정<br>
                    <span class="tx-blue">3</span> 장
                </li>
            </ul>
            <div class="btnCoupon">
                <a href="#none" onclick="openWin('COUPON_SINGUP')">쿠폰등록 ></a>
            </div>

            <ul class="myCouponTab">
                <li><a href="#mycoupon1" class="on">보유 쿠폰</a></li>
                <li><a href="#mycoupon2">사용/만료 쿠폰</a></li>
            </ul>

            <div id="mycoupon1">
                <div class="paymentDate mt-zero pt20">                       
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
                    <select id="lecture" name="lecture" title="lecture" class="seleLec width30p ml1p">
                        <option selected="selected">최근발급순</option>
                        <option value="최근발급순1">최근발급순1</option>
                        <option value="최근발급순2">최근발급순2</option>
                    </select>
                </div>

                <div class="myCouponList">
                    <ul>
                        <li>[온라인시행] 7/14 실전 빅매치 모의고사 무료쿠폰</li>
                        <li><strong>할인율(금액)</strong> 100%</li>
                        <li><strong>사용기간</strong> 2019-07-01 17:52 ~ 2019-07-21 17:52 (유효)</li>
                        <li><strong>과정</strong> 경찰</li>
                        <li><strong>발급일</strong> 2019-07-01</li>
                    </ul>
                </div>
            </div>

            <div id="mycoupon2">
                <div class="paymentDate mt-zero pt20">                       
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
                    <select id="lecture" name="lecture" title="lecture" class="seleLec width30p ml1p">
                        <option selected="selected">최근발급순</option>
                        <option value="최근발급순1">최근발급순1</option>
                        <option value="최근발급순2">최근발급순2</option>
                    </select>
                </div>

                <div class="myCouponList">
                    <ul>
                        <li>[MOU] 신광은 경찰팀 단과 40%할인 쿠폰</li>
                        <li><strong>할인율(금액)</strong> 40%</li>
                        <li><strong>상태</strong> 회수</li>
                        <li><strong>과정</strong> 경찰</li>
                        <li><strong>사용/소멸일</strong> 2019-07-01</li>
                    </ul>
                    <ul>
                        <li>[웰컴팩] 신광은경찰 PASS 10,000원 할인쿠폰</li>
                        <li><strong>할인율(금액)</strong> 10,000원</li>
                        <li><strong>상태</strong> 만료</li>
                        <li><strong>과정</strong> 경찰</li>
                        <li><strong>사용/소멸일</strong> 2019-06-28</li>
                    </ul>
                </div>
            </div>

            <div class="paymentCheckInfo">
                <h4>쿠폰안내</h4>
                <ul>
                    <li>쿠폰은 유효기간 내에만 사용이 가능하며, 유효기간이 지난 쿠폰은 소멸됩니다.</li>
                    <li>자세한 포인트 적립 및 사용 내역은 PC버전에서 확인 가능합니다.</li>
                </ul>
            </div>        
        </div>
        
        <div id="pointlist2" class="pointBox">
            <div class="couponSingup"> 
                <p>수강권 번호</p>
                <input type="text" id="" name="" class="iptDate" maxlength="30" >
                <a href="#none" class="btnSearch">검색</a>
                <div>'-'를 제외한 숫자 16자리만 입력해 주세요.</div>
            </div>

            <div id="mycoupon1">
                <div class="paymentDate mt-zero pt20">                       
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
                    <select id="lecture" name="lecture" title="lecture" class="seleLec width30p ml1p">
                        <option selected="selected">최근발급순</option>
                        <option value="최근발급순1">최근발급순1</option>
                        <option value="최근발급순2">최근발급순2</option>
                    </select>
                </div>

                <div class="myCouponList">
                    <ul>
                        <li>수강권명이 노출됩니다.</li>
                        <li><strong>수강권번호</strong> 1234567</li>
                        <li><strong>수강권적용강좌</strong> 2019 신광은 형사소송법 기본이론 (19년 7월)</li>
                        <li><strong>과정</strong> 경찰</li>
                        <li><strong>등록일</strong> 2019-07-01</li>
                    </ul>
                    <ul>
                        <li class="tx-center pt20 pb20">등록된 수강권 정보가 없습니다.</li>
                    </ul>
                </div>
            </div>

            <div class="paymentCheckInfo">
                <h4>수강권안내</h4>
                <ul>
                    <li>수강권은 윌비스 제휴사를 통해서만 지급되며 특정 강좌만 수강할 수 있습니다.</li>
                    <li>수강권은 등록 후 즉시 수강중인강좌 > 관리자지급강좌에서 강좌 수강이 가능합니다.(결제 시 사용되지 않음)</li>
                    <li>수강권은 표기된 유효기간 내에만 사용이 가능하며, 유효기간이 지난 수강권은 등록되지 않습니다.</li>
                </ul>
            </div>        
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

    {{--쿠폰등록--}}
    <div id="COUPON_SINGUP" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 hauto fix">
            <a class="closeBtn" href="#none" onclick="closeWin('COUPON_SINGUP')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>
                쿠폰등록
            </h4>
            <div class="couponInfo">
                <p>쿠폰 등록 안내</p>
                <ul>
                    <li>오프라인에서 발급받은 쿠폰은 쿠폰등록후 사용할 수 있습니다.</li>
                    <li class="tx-red">쿠폰등록시, '-' 를 제외한 숫자 16자리만 입력해 주세요.</li>
                    <li>쿠폰발급후 등록된 쿠폰 내역에서 쿠폰적용상품과 사용기간을 확인하시기 바랍니다.</li>
                    <li>사용기간내 사용하지 못한 쿠폰은 소멸처리됩니다.</li>
                </ul>
            </div>
            <div class="couponSingup"> 
                <p>쿠폰 번호</p>
                <input type="text" id="" name="" class="iptDate" maxlength="30" >
                <a href="#none" class="btnSearch">검색</a>
            </div>                                  
        </div>
        <div class="dim" onclick="closeWin('COUPON_SINGUP')"></div>
    </div>
</div>
<!-- End Container -->
@stop