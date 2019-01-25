<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="coupon_type" value="voucher"/>
    <table cellspacing="0" cellpadding="0" class="userPointTable userCouponTable NG">
        <tbody>
        <tr>
            <td>
                수강권 번호 &nbsp;
                <input type="text" id="coupon_no" name="coupon_no" title="쿠폰번호" maxlength="16">
                <span class="tBox t2Box black" style="height: 26px;"><a href="#none" id="btn_coupon_regi" style="padding: 4px 0;">등록</a></span>
                <div class="tx-gray">'-'를 제외한 숫자 16자리만 입력해 주세요.</div>
            </td>
        </tr>
        </tbody>
    </table>
</form>
<div class="useDetailWrap mt20">
    <div class="willbes-Mypage-Tabs">
        <form id="search_form" name="search_form" method="GET">
            <input type="hidden" name="tab" value="{{ $tab }}"/>
            <input type="hidden" name="stab" value="{{ $stab }}"/>

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
            <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
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
                        <col style="width: 370px;">
                        <col style="width: 150px;">
                        <col style="width: 210px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>과정<span class="row-line">|</span></th>
                            <th>수강권번호<span class="row-line">|</span></th>
                            <th>수강권명<span class="row-line">|</span></th>
                            <th>수강권적용강좌<span class="row-line">|</span></th>
                            <th>등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(empty($data) === false)
                        @foreach($data as $idx => $row)
                            <tr>
                                <td class="w-process">{{ $row['SiteGroupName'] }}</td>
                                <td class="w-c-num">{{ $row['CouponPin'] }}</td>
                                <td class="w-list">{{ $row['CouponName'] }}</td>
                                <td class="w-l-price">{{ $row['ProdName'] }}</td>
                                <td class="w-date">{{ substr($row['IssueDatm'], 0, 10) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">등록된 수강권 정보가 없습니다.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {!! $paging['pagination'] !!}
            </div>
        </form>
    </div>
</div>
<!-- useDetailWrap -->
