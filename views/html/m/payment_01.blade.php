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
                결제하기
            </div>
        </div>
    </div>
   

    <div class="paymentWrap">
        <ul class="paymentTxt NGR">
            <li>해당 상품의 강좌시작일 설정은 결제일로부터 30일 범위 내로 설정 가능합니다.</li>
            <li>해당 상품의 강좌시작일을 설정하지 않은 경우 결제일(무통장입금 결제수단의 경우 가상계좌 신청일)로부터 7일 후 강좌가 자동 시작됩니다.</li>
            <li>해당 상품의 개강일이 설정한 강좌시작일 이후 인 경우 해당 강좌시작일은 개강일로 자동 셋팅됩니다.</li>
            <li>배송 상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일제외)</li>
        </ul>

        <div class="paymentCts">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            주문정보
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="payLecList">
                                <li><span>강좌</span></li>
                                <li>2019 신광은 형사소송법 기본이론 (19년 6월)</li>
                                <li><strong>정가(할인율)</strong> <span class="tx-blue">90,000원(↓0%)</span></li>
                                <li><strong>실 결제금액</strong> <span class="tx-blue">90,000원</span></li>
                                <li class="NGR"><strong>수강기간</strong> 80일</li>
                                <li class="NGR"><strong>강좌시작일</strong> 설정 
                                    <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" maxlength="20" placeholder="시작일">
                                    ~ <input type="text" id="E-DATE" name="E-DATE" maxlength="20" placeholder="종료일"></span>
                                </li>
                                <li><a href="#none" onclick="openWin('COUPON_LIST')">쿠폰적용</a></li>
                            </ul>
                            <ul class="payLecList">
                                <li><span>패키지</span></li>
                                <li>2019년 경찰 1차시험 황세웅 면접 풀패키지 (1.5배수)</li>
                                <li><strong>정가(할인율)</strong> <span class="tx-blue">90,000원(↓0%)</span></li>
                                <li><strong>실 결제금액</strong> <span class="tx-blue">90,000원</span></li>
                                <li class="NGR"><strong>수강기간</strong> 80일</li>
                                <li class="NGR"><strong>강좌시작일</strong> 설정 
                                    <span class="tx-blue"></span>
                                </li>
                                <li><a href="#none" onclick="openWin('COUPON_LIST')">쿠폰적용</a></li>
                            </ul>
                            <ul class="payLecList">
                                <li><span>교재</span></li>
                                <li>신광은 형사소송법 적중예상 문제풀이(2019년 2차대비)</li>
                                <li><strong>수량</strong> <span class="tx-blue">1</span></li>
                                <li><strong>실 결제금액</strong> <span class="tx-blue">162,000원(↓0%)</span></li>
                                <li><strong>판매가</strong> <span class="tx-blue">10,800원</span></li>
                                <li><a href="#none" onclick="openWin('COUPON_LIST')">쿠폰적용</a></li>
                            </ul>
                            <ul class="payLecList">
                                <li><span>배송</span></li>
                                <li>배송료</li>
                                <li><strong>수량</strong> <span class="tx-blue">1</span></li>
                                <li><strong>정가(할인율)</strong> <span class="tx-blue">2,500원(↓0%)</span></li>
                                <li><strong>실 결제금액</strong> <span class="tx-blue">2,500원</span></li>
                                <li><a href="#none" onclick="openWin('COUPON_LIST')">쿠폰적용</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            구매자정보
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <ul class="payLecList buyerLecList">
                                <li><strong>이름</strong> 한주연</li>
                                <li class="tx12"><strong>휴대폰번호</strong> 01012345678</li>
                                <li><strong>이메일</strong> abcsef@willbes.com</li>
                                <li class="tx-blue">구매자 정보는 회원가입 시 등록한 정보로 셋팅되며, 수정이 필요한 경우 회원 정보 페이지에서만 가능합니다.</li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            배송정보
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div>
                                <input type="radio" id="buyer01" name=""><label for="buyer01">구매자 정보와 동일</label>
                                <input type="radio" id="buyer02" name=""><label for="buyer02">직접입력</label>                                                  
                            </div>
                            <div class="delivery"><a href="#none" onclick="openWin('ADDRESS_LIST')">배송주소록</a></div>
                            <div class="buyerInfo">
                                <table>
                                    <col width="85px"/>
                                    <col width=""/>
                                    <tr>
                                        <th scope="row">이름</th>
                                        <td><input type="text" id="" name="" style="width:120px"></td>
                                    </tr>
                                    <tr>
                                        <th rowspan="3" scope="row">주소</th>
                                        <td><input type="text" id="" name="" style="width:120px"> <a href="#none" class="findaddress">주소찾기</a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" id="" name="" style="width:100%"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" id="" name="" style="width:100%"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">휴대폰번호</th>
                                        <td><input type="tel" id="" name="" maxlength="11" style="width:120px"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">전화</th>
                                        <td><input type="tel" id="" name="" maxlength="11" style="width:120px"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">배송요청사항</th>
                                        <td><input type="text" id="" name="" style="width:100%" placeholder="배송 메시지를 입력해주세요."></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            포인트
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="paymentPoint">포인트 [10,000P 보유] <input type="number" id="" name="" style="width:80px" > P 차감 <a href="#none">잔액사용</a></div>
                            <ul class="paymentTxt pd_all_none bd-none">
                                <li>강좌 포인트는 <span class="tx-blue">2,500P</span> 부터 <span class="tx-blue">1P</span> 단위로 사용 가능합니다. </li>
                                <li>포인트를 사용하여 결제할 경우 포인트가 적립되지 않습니다.</li>
                                <li>환불 시 사용된 포인트는 복원되지 않고 소멸되며, 적립된 포인트는 회수됩니다.</li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            총 결제금액
                            <span class="tx-blue f_right">42,300원</span>
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="priceBox">
                                <ul>
                                    <li><strong>상품주문금액</strong> <span>150,000원</span></li>
                                    <li><strong>쿠폰할인금액</strong> <span>0원</span></li>
                                    <li><strong>포인트 차감금액</strong> <span>0원</span></li>
                                    <li><strong>배송료</strong> <span>0원</span></li>
                                    <li class="NGEB">
                                        <strong>결제예상금액</strong> <span class="tx-blue">312,000원</span>
                                        <p class="NGR tx14 pt5"><strong>적립예정포인트</strong> <span class="tx-blue">426원</span></p>
                                    </li>
                                </ul>                
                            </div>
                        </td>
                    </tr>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            결제수단
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <ul class="method">
                                <li><a href="#none">신용카드</a></li>
                                <li><a href="#none">실시간 계좌이체</a></li>
                                <li><a href="#none">무통장입금(가상계좌)</a></li>             
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="policyInfo">
                <ul>
                    <li class="tx16">
                        <div class="AllchkBox">
                            전체동의
                            <span class="chkBox-Agree checked">
                                <input type="checkbox" id="" name="" class="" maxlength="30">
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="chkBox">
                            <p>유의사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                            <span class="chkBox-Agree checked">
                                <input type="checkbox" id="" name="" class="" maxlength="30">
                            </span>
                        </div>
                        <div class="txtBox NGR">
                            {{-- TODO : 임의 등록 --}}
                            <strong>신용카드 결제 시</strong><br/>
                            - 최종 결제승인 이전에 전자결제창을 닫지 마시기 바랍니다.<br/>
                            - 전자금융거래 기본법에 따라 결제금액이 30만원 이상일 경우 전자상거래법에 의해 발급된 공인인증서를 이용하여<br/>
                            본인 확인을 거쳐야 결제를 할 수 있습니다.<br/><br/>
                            <strong>무통장 입금 결제 시</strong><br/>
                            - 주문시마다 새로운 입금계좌번호가 생성됩니다.<br/>
                            - 상품을 나누어 주문하시는 경우 주문별로 생성되는 입금계좌로 각각 입금하여 주십시오.<br/>
                            - 입금기한 내에 입금을 하지 않을 경우, 생성된 입금계좌는 자동으로 사라집니다. 결제를 원할 시, 재주문을 해주시기 바랍니다.<br/>
                            - 수강료 입금 후(15분 이내) 입금 승인처리 되며, 현금 영수증은 입금이 완료 되면 발행됩니다.<br/><br/>
                            <strong>실시간 계좌이체 결제 시</strong><br/>
                            - 인터넷 뱅킹 사용 여부와 상관없이 공인인증서가 있어야 결제가 가능합니다.<br/>
                            - 지정하신 은행계좌에서 결제 금액이 실시간으로 이체되며 결제 승인 후 바로 수강이 가능합니다.<br/>
                            - 현금 영수증은 입금이 완료되면 발행됩니다.<br/>
                        </div>
                    </li>
                    <li>
                        <div class="chkBox">
                            <p>개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                            <span class="chkBox-Agree checked">
                                <input type="checkbox" id="" name="" class="" maxlength="30">
                            </span>
                        </div>
                        <div class="txtBox NGR">
                            {{-- TODO : 임의 등록 --}}
                            윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br/>
                            윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br/>
                            또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br/>
                            윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br/>
                            윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br/>
                            윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br/><br/>
                            <a href="javascript:;" onclick="popupOpen('{{app_url('/company/protect', 'www')}}', 'protect', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 개인정보 취급방침 보기]</a>
                        </div>
                    </li>
                    <li>
                        <div class="chkBox">
                            <p>환불정책 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span> <span class="MoreBtn tx-center">▼</span></p>
                            <span class="chkBox-Agree checked">
                                <input type="checkbox" id="" name="" class="" maxlength="30">
                            </span>
                        </div>
                        <div class="txtBox NGR">
                            {{-- TODO : 임의 등록 --}}
                            결제수단별 환불정책은 아래와 같습니다.<br/>
                            <br/>
                            <strong>신용카드 결제 시</strong><br/>
                            - 현금 환불은 불가능하며, 카드 취소만 가능합니다.<br/>
                            - 당일 결제 후 당일 취소 시 바로 승인 취소됩니다.<br/>
                            - 당일 결제 후 다음날 취소 시 카드사별로 2~3일 후에 승인 취소됩니다.<br/>
                            <br/>
                            <strong>무통장 입금 결제 시</strong><br/>
                            - 결제자가 제공한 계좌 정보로 환불됩니다.<br/>
                            - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                            <br/>
                            <strong>실시간 계좌이체 결제 시</strong><br/>
                            - 결제한 은행 계좌로 환불됩니다. <br/>
                            - 당일 결제 후 당일 환불하였더라도 은행별로 2~3일 후에 환불처리 됩니다.<br/>
                            <br/>
                            ※ 전체 윌비스 환불 정책과 관련한 상세 사항은 이용약관의 ‘제 4장 서비스 환불’ 항목에서 확인해 주세요.<br/>
                            <br/>
                            <a href="javascript:;" onclick="popupOpen('{{app_url('/company/agreement', 'www')}}', 'agreement', '1000', '600', null, null, 'yes');" class="tx-blue">[윌비스 이용약관 보기]</a>
                        </div>
                    </li>
                </ul>
            </div>           

            <div class="lec-btns w100p">
                <ul>
                    <li><a href="#none" class="btn-purple">결제하기</a></li>
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

    {{--배송주소록--}}
    <div id="ADDRESS_LIST" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h470 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('ADDRESS_LIST')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>
                나의 배송 주소록
            </h4>
            <div class="addressListBox">
                <div class="addList"> 
                    <ul>
                        <li><input type="radio" id="add1" name=""><label for="add1">집</label></li>
                        <li>한주연</li>
                        <li>08812</li>
                        <li>서울 관악구 신림로23길 16 (신림동, 일성트루엘)</li>
                        <li>2층 행정실3</li>
                        <li>010-1234-5678</li>
                    </ul>
                </div>
                <div class="addList"> 
                    <ul>
                        <li><input type="radio" id="add2" name=""><label for="add2">회사</label></li>
                        <li>홍길동</li>
                        <li>08812</li>
                        <li>서울 관악구 신림로23길 16 (신림동, 일성트루엘)</li>
                        <li>2층 행정실3</li>
                        <li>010-1234-5678</li>
                    </ul>
                </div>
                <ul class="addInfo">
                    <li>주소록은 최대 5개까지 등록 가능합니다.</li>
                    <li>주소록 수정/삭제는 PC에서만 가능합니다.</li>
                </ul>
            </div>            
        </div>
        <div class="dim" onclick="closeWin('ADDRESS_LIST')"></div>
    </div>

    {{--쿠폰적용--}}
    <div id="COUPON_LIST" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('COUPON_LIST')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <h4>
                쿠폰적용
            </h4>
            <div class="couponListBox">
                <ul class="payLecList">
                    <li><span>강좌</span></li>
                    <li>2019년 2차대비 신광은 형사소송법 심화이론 (19년 5월)</li>
                </ul>

                <div class="priceBox">
                    <ul>
                        <li><strong>상품금액</strong> <span>150,000원</span></li>
                        <li><strong>쿠폰할인금액</strong> <span class="tx-red">-0원</span></li>
                        <li class="NGEB">
                            <strong>할인적용금액</strong> <span class="tx-blue">150,000원</span>
                        </li>
                    </ul>                
                </div>

                <ul class="tabWrap two couponTab">
                    <li><a href="#coupon01" class="on">적용 가능 쿠폰</a></li>
                    <li><a href="#coupon02">전체 가능 쿠폰</a></li>
                </ul>

                <div class="couponList" id="coupon01"> 
                    <p>내가 보유한 쿠폰 중 해당상품에 사용 가능한 쿠폰만 확인 및 적용 가능합니다.</p>
                    <ul>
                        <li><input type="radio" id="cp1" name=""><label for="cp1">[MOU] 신광은 경찰팀 단과 50%할인 쿠폰</label></li>
                        <li><strong>할인율(금액)</strong> 50%</li>
                        <li><strong>사용기간</strong> 2019-05-24 14:16 ~ 2019-05-31 14:16 (유효)</li>
                        <li><strong>과정</strong> 경찰</li>
                        <li><strong>분류</strong> 온라인강좌</li>
                    </ul>
                    {{--
                    <div class="couponNo">
                        <img src="{{ img_url('m/mypage/icon_warning.png') }}"><br>
                        보유한 쿠폰이 없습니다.
                    </div>
                    --}}
                </div>
                
                <div class="couponList" id="coupon02"> 
                    <p>내가 보유한 전체 쿠폰을 확인 할 수 있습니다.</p>
                    <ul>
                        <li><input type="radio" id="add1" name=""><label for="add1">[웰컴팩] 신광은경찰 PASS 10,000</label></li>
                        <li><strong>할인율(금액)</strong> 50%</li>
                        <li><strong>사용기간</strong> 2019-05-24 14:16 ~ 2019-05-31 14:16 (유효)</li>
                        <li><strong>과정</strong> 경찰</li>
                        <li><strong>분류</strong> 온라인강좌</li>
                    </ul>
                    {{--
                    <div class="couponNo">
                        <img src="{{ img_url('m/mypage/icon_warning.png') }}"><br>
                        보유한 쿠폰이 없습니다.
                    </div>
                    --}}
                </div>
                
                <div class="couponInfo">
                    <p>쿠폰 이용 안내</p>
                    <ul>
                        <li>쿠폰은 유효기간 내에만 사용이 가능하며, 유효기간이 지난 쿠폰은 소멸됩니다.</li>
                        <li>쿠폰으로 구매한 상품 취소 시, 사용된 쿠폰은 복원되지 않고 소멸됩니다.</li>
                    </ul>
                </div>                
            </div>
            <div class="couponBtns">
                <ul>
                    <li><a href="#none" class="btn_black_line">쿠폰 적용 안함</a></li>
                    <li><a href="#none" class="btn-purple">쿠폰 적용</a></li>
                </ul>
            </div>
        </div>
        <div class="dim" onclick="closeWin('COUPON_LIST')"></div>
    </div>
</div>
<!-- End Container -->
@stop