@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li>
                    <a href="#none">모의고사관리</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                </li>
                <li>
                    <a href="#none">학습지원관리</a>
                </li>
                <li>
                    <a href="#none">회원정보</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>결제관리</strong>
            <span class="depth-Arrow">></span><strong>포인트관리</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 포인트관리
            </div>
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">포인트안내</div> 
                                - <span class="tx-light-blue">강좌포인트</span>는 강좌구매시 적립 및 사용되는 포인트입니다.<br/>
                                - <span class="tx-light-blue">교재포인트</span>는 교재구매시 적립 및 사용되는 포인트입니다.<br/>
                                - 적립된포인트는 2,500P 이상인 경우 1P 단위로 유효기간까지 사용이 가능합니다.<br/>
                                - 포인트의 사용/소멸시에는 유효기간이 가까운 포인트부터 차감됩니다.<br/>
                                - 환불 시 사용된 포인트는 복원되지 않고 소멸되며, 적립된 포인트는 회수됩니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="willbes-Mypage-PointBox NG mt70 c_both">
            <ul>
                <li class="Tit">포인트현황</li>
                <li>강좌포인트 <span class="tx-light-blue">105,000</span>P</li>
                <li>교재포인트 <span class="tx-light-blue">85,000</span>P</li>
            </ul>
        </div>
        <!-- willbes-Mypage-PointBox -->

        <div class="pointDetailWrap mt70">
            <ul class="tabWrap tabDepth1 NG">
                <li><a href="#point1">강좌포인트</a></li>
                <li><a href="#point2">교재포인트</a></li>
            </ul>
            <div class="tabBox">
                <div id="point1">
                    <table cellspacing="0" cellpadding="0" class="userPointTable NG mt40">
                        <colgroup>
                            <col style="width: 50%;"/>
                            <col style="width: 50%;"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>
                                    사용가능포인트 <span class="tx-light-blue">105,000</span>P<br/><br/>
                                    <div class="tx-gray">
                                        총적립포인트 200,000 P<br/>
                                        총사용포인트 95,000 P
                                    </div>
                                </td>
                                <td>
                                    당월소멸예정포인트 <span class="tx-light-blue">5,000</span>P
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="point2">
                    <table cellspacing="0" cellpadding="0" class="userPointTable NG mt40">
                        <colgroup>
                            <col style="width: 50%;"/>
                            <col style="width: 50%;"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>
                                    사용가능포인트 <span class="tx-light-blue">15,000</span>P<br/><br/>
                                    <div class="tx-gray">
                                        총적립포인트 198,000 P<br/>
                                        총사용포인트 23,000 P
                                    </div>
                                </td>
                                <td>
                                    당월소멸예정포인트 <span class="tx-light-blue">999,000</span>P
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- pointDetailWrap -->

        <div class="useDetailWrap mt70">
            <ul class="tabWrap tabDepth1 NG">
                <li><a href="#use1">적립내역</a></li>
                <li><a href="#use2">사용내역</a></li>
            </ul>
            <div class="tabBox mt40">
                <div id="use1">
                    <div class="willbes-Mypage-Tabs">
                        <div class="willbes-Lec-Selected willbes-Mypage-Selected center tx-gray">
                            <span class="w-data">
                                기간검색 &nbsp;
                                <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp; 
                                <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                            </span>
                            <span class="w-month">
                                <ul>
                                    <li><a href="#none">전체</a></li>
                                    <li><a class="on" href="#none">1개월</a></li>
                                    <li><a href="#none">3개월</a></li>
                                    <li><a href="#none">6개월</a></li>
                                </ul>
                            </span>
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                        <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                            <select id="process" name="process" title="process" class="seleProcess f_left">
                                <option selected="selected">과정</option>
                                <option value="헌법">헌법</option>
                                <option value="스파르타반">스파르타반</option>
                                <option value="공직선거법">공직선거법</option>
                            </select>
                        </div>
                        <div class="LeclistTable pointTable">
                            <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                <colgroup>
                                    <col style="width: 80px;">
                                    <col style="width: 130px;">
                                    <col style="width: 130px;">
                                    <col style="width: 300px;">
                                    <col style="width: 150px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>과정<span class="row-line">|</span></li></th>
                                        <th>적립일<span class="row-line">|</span></li></th>
                                        <th>적립액<span class="row-line">|</span></li></th>
                                        <th>적립내역<span class="row-line">|</span></li></th>
                                        <th>주문번호<span class="row-line">|</span></li></th>
                                        <th>유효기간</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-process">공무원</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 10,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">경찰</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 20,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">임용</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 30,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">공무원</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 10,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">경찰</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 20,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">임용</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 30,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">공무원</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 10,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">경찰</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 20,000</td>
                                        <td class="w-list">결제포인트적립</td>
                                        <td class="w-number">20180000</td>
                                        <td class="w-period">~ 2018-00-00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="use2">
                    <div class="willbes-Mypage-Tabs">
                        <div class="willbes-Lec-Selected willbes-Mypage-Selected center tx-gray">
                            <span class="w-data">
                                기간검색 &nbsp;
                                <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp; 
                                <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                            </span>
                            <span class="w-month">
                                <ul>
                                    <li><a href="#none">전체</a></li>
                                    <li><a class="on" href="#none">1개월</a></li>
                                    <li><a href="#none">3개월</a></li>
                                    <li><a href="#none">6개월</a></li>
                                </ul>
                            </span>
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                        <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                            <select id="process" name="process" title="process" class="seleProcess f_left">
                                <option selected="selected">과정</option>
                                <option value="헌법">헌법</option>
                                <option value="스파르타반">스파르타반</option>
                                <option value="공직선거법">공직선거법</option>
                            </select>
                        </div>
                        <div class="LeclistTable pointTable">
                            <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                <colgroup>
                                    <col style="width: 80px;">
                                    <col style="width: 130px;">
                                    <col style="width: 130px;">
                                    <col style="width: 450px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>과정<span class="row-line">|</span></li></th>
                                        <th>차감일<span class="row-line">|</span></li></th>
                                        <th>사용액<span class="row-line">|</span></li></th>
                                        <th>차감내역<span class="row-line">|</span></li></th>
                                        <th>유효기간</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-process">공무원</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 10,000</td>
                                        <td class="w-list">유효기간 만료로 인한 소멸</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">경찰</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 20,000</td>
                                        <td class="w-list">결제시 사용</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">임용</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 30,000</td>
                                        <td class="w-list">유효기간 만료로 인한 소멸</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">공무원</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 10,000</td>
                                        <td class="w-list">유효기간 만료로 인한 소멸</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">경찰</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 20,000</td>
                                        <td class="w-list">결제시 사용</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">임용</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 30,000</td>
                                        <td class="w-list">유효기간 만료로 인한 소멸</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">공무원</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 10,000</td>
                                        <td class="w-list">유효기간 만료로 인한 소멸</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                    <tr>
                                        <td class="w-process">경찰</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-point">+ 20,000</td>
                                        <td class="w-list">결제시 사용</td>
                                        <td class="w-number">20180000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- useDetailWrap -->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop