<table cellspacing="0" cellpadding="0" class="userPointTable h55 NG">
    <colgroup>
        <col style="width: 50%;"/>
        <col style="width: 50%;"/>
    </colgroup>
    <tbody>
    <tr>
        <td>
            사용가능한쿠폰 <span class="tx-light-blue">{{ $available_coupon_cnt }}</span>장 <span class="tBox t2Box black ml20"><a href="#none" onclick="openWin('CouponRegi')">쿠폰등록</a></span>
        </td>
        <td>
            당월소멸예정쿠폰 <span class="tx-light-blue">{{ $expiring_coupon_cnt }}</span>장
        </td>
    </tr>
    </tbody>
</table>
<div class="useDetailWrap mt25">
    <ul class="tabWrap tabDepthPass">
        <li><a id="hover_coupon_available" data-tab="coupon" data-stab="available" class="tab">보유쿠폰</a></li>
        <li><a id="hover_coupon_used" data-tab="coupon" data-stab="used" class="tab">사용/만료쿠폰</a></li>
    </ul>
    <div class="tabBox mt20">
        <div id="{{ $stab }}">
            <div class="willbes-Mypage-Tabs">
                <form id="search_form" name="search_form" method="GET">
                    <input type="hidden" name="tab" value="{{ $tab }}"/>
                    <input type="hidden" name="stab" value="{{ $stab }}"/>
                @if($stab == 'available')
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                        <span class="w-data">
                            기간검색 &nbsp;
                            <select id="search_date_type" name="search_date_type" title="검색일자" class="seleDays">
                                <option value="issue">발급일</option>
                                <option value="expire">만료일</option>
                            </select>
                            <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/> ~&nbsp;
                            <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/>
                        </span>
                        <span class="w-month">
                            <ul>
                                <li><a class="btn-set-search-date" data-period="0-all">전체</a></li>
                                <li><a class="btn-set-search-date" data-period="1-months">1개월</a></li>
                                <li><a class="btn-set-search-date" data-period="3-months">3개월</a></li>
                                <li><a class="btn-set-search-date" data-period="6-months">6개월</a></li>
                            </ul>
                        </span>
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                    <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="site_group" name="site_group" title="과정" class="seleProcess f_left mr10">
                            <option value="">과정</option>
                            @foreach($arr_site_group as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select id="order_date_type" name="order_date_type" title="정렬일자" class="seleDate">
                            <option value="issue">최근발급순</option>
                            <option value="expire">만료임박순</option>
                        </select>
                    </div>
                    <div class="LeclistTable pointTable">
                        <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 70px;">
                                <col style="width: 140px;">
                                <col style="width: 100px;">
                                <col style="width: 90px;">
                                <col style="width: 90px;">
                                <col style="width: 120px;">
                                <col style="width: 160px;">
                                <col style="width: 80px;">
                                <col style="width: 90px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>과정<span class="row-line">|</span></th>
                                    <th>쿠폰번호<span class="row-line">|</span></th>
                                    <th>쿠폰명<span class="row-line">|</span></th>
                                    <th>할인율(금액)<span class="row-line">|</span></th>
                                    <th>적용대상<span class="row-line">|</span></th>
                                    <th>적용제한금액<span class="row-line">|</span></th>
                                    <th>사용가능기간<span class="row-line">|</span></th>
                                    <th>남은일자<span class="row-line">|</span></th>
                                    <th>발급일</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(empty($data) === false)
                                @foreach($data as $idx => $row)
                                    <tr>
                                        <td class="w-process">{{ $row['SiteGroupName'] }}</td>
                                        <td class="w-c-num">{{ $row['CouponPin'] }}</td>
                                        <td class="w-list">{{ $row['CouponName'] }}</td>
                                        <td class="w-discount">{{ number_format($row['DiscRate']) }}{{ $row['DiscRateUnit'] }}</td>
                                        <td class="w-product">{{ $row['ApplyTypeCcdName'] }}</td>
                                        <td class="w-l-price">{{ number_format($row['DiscAllowPrice']) }}원 이상</td>
                                        <td class="w-period">{{ substr($row['IssueDatm'], 0, 16) }}<br/> ~ {{ substr($row['ExpireDatm'], 0, 16) }}</td>
                                        <td class="w-d-day">{{ $row['RemainDay'] }}일</td>
                                        <td class="w-date">{{ substr($row['IssueDatm'], 0, 10) }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">등록된 쿠폰이 없습니다</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {!! $paging['pagination'] !!}
                    </div>
                @else
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                        <span class="w-data">
                            기간검색 &nbsp;
                            <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/> ~&nbsp;
                            <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/>
                        </span>
                        <span class="w-month">
                            <ul>
                                <li><a class="btn-set-search-date" data-period="0-all">전체</a></li>
                                <li><a class="btn-set-search-date" data-period="1-months">1개월</a></li>
                                <li><a class="btn-set-search-date" data-period="3-months">3개월</a></li>
                                <li><a class="btn-set-search-date" data-period="6-months">6개월</a></li>
                            </ul>
                        </span>
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                    <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="site_group" name="site_group" title="과정" class="seleProcess f_left mr10">
                            <option value="">과정</option>
                            @foreach($arr_site_group as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select id="valid_status" name="valid_status" title="상태" class="seleState">
                            <option value="">상태</option>
                            <option value="all">전체</option>
                            <option value="expire">기간만료</option>
                            <option value="used">사용완료</option>
                        </select>
                    </div>
                    <div class="LeclistTable pointTable">
                        <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 70px;">
                                <col style="width: 140px;">
                                <col style="width: 100px;">
                                <col style="width: 90px;">
                                <col style="width: 90px;">
                                <col style="width: 150px;">
                                <col style="width: 140px;">
                                <col style="width: 70px;">
                                <col style="width: 90px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>과정<span class="row-line">|</span></th>
                                <th>쿠폰번호<span class="row-line">|</span></th>
                                <th>쿠폰명<span class="row-line">|</span></th>
                                <th>할인율(금액)<span class="row-line">|</span></th>
                                <th>적용대상<span class="row-line">|</span></th>
                                <th>쿠폰사용상품<span class="row-line">|</span></th>
                                <th>주문번호<span class="row-line">|</span></th>
                                <th>상태<span class="row-line">|</span></th>
                                <th>사용/소멸일</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($data) === false)
                                @foreach($data as $idx => $row)
                                    <tr>
                                        <td class="w-process">{{ $row['SiteGroupName'] }}</td>
                                        <td class="w-c-num">{{ $row['CouponPin'] }}</td>
                                        <td class="w-list">{{ $row['CouponName'] }}</td>
                                        <td class="w-discount">{{ number_format($row['DiscRate']) }}{{ $row['DiscRateUnit'] }}</td>
                                        <td class="w-product">{{ $row['ApplyTypeCcdName'] }}</td>
                                        <td class="w-l-price">{{ $row['ProdName'] }}</td>
                                        <td class="w-period">{{ $row['OrderNo'] }}</td>
                                        <td class="w-d-day">{{ $row['ValidStatusName'] }}</td>
                                        <td class="w-date">@if($row['ValidStatusName'] == '만료') {{ substr($row['ExpireDatm'], 0, 10) }} @else {{ substr($row['UseDatm'], 0, 10) }} @endif</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">등록된 쿠폰이 없습니다</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {!! $paging['pagination'] !!}
                    </div>
                @endif
                </form>
            </div>
        </div>
    </div>
</div>
<!-- useDetailWrap -->

<div id="CouponRegi" class="willbes-Layer-PassBox willbes-Layer-PassBox540 h400 abs">
    <a class="closeBtn" href="#none" onclick="closeWin('CouponRegi');">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit tx-dark-black NG">쿠폰등록</div>
    <div class="lecMoreWrap">
        <div class="PASSZONE-List widthAutoFull">
            <ul class="passzoneInfo tx-gray NGR">
                <li class="tit strong">· 쿠폰등록안내
                <li class="txt">- 오프라인에서 발급받은 쿠폰은 쿠폰등록후 사용할 수 있습니다.</li>
                <li class="txt">- <span class="tx-red">쿠폰등록시, '-' 를 제외한 숫자 16자리만 입력해 주세요.</span></li>
                <li class="txt">- 쿠폰발급후 등록된 쿠폰 내역에서 쿠폰적용상품과 사용기간을 확인하시기 바랍니다.</li>
                <li class="txt">- 사용기간내 사용하지 못한 쿠폰은 소멸처리됩니다.</li>
            </ul>
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="coupon_type" value="coupon"/>
                <table cellspacing="0" cellpadding="0" class="userPointTable userCouponTable NG">
                    <tbody>
                    <tr>
                        <td>
                            쿠폰 번호 &nbsp;
                            <input type="text" id="coupon_no" name="coupon_no" title="쿠폰번호" maxlength="16" style="width: 290px;">
                            <span class="tBox t2Box black" style="height: 26px;"><a href="#none" id="btn_coupon_regi" style="padding: 4px 0;">등록</a></span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!-- PASSZONE-List -->
    </div>
</div>
<!-- willbes-Layer-PassBox : 쿠폰등록 -->
