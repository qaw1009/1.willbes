<ul class="pointLec mb-zero mt20">
    <li>
        사용가능<br>
        <span class="tx-blue">{{ $available_coupon_cnt }}</span> 장
    </li>
    <li>
        당월소멸예정<br>
        <span class="tx-blue">{{ $expiring_coupon_cnt }}</span> 장
    </li>
</ul>
<div class="btnCoupon">
    <a href="#none" onclick="openWin('CouponRegi')">쿠폰등록 ></a>
</div>

<ul class="myCouponTab">
    <li><a id="hover_coupon_available" data-tab="coupon" data-stab="available" class="tab">보유 쿠폰</a></li>
    <li><a id="hover_coupon_used" data-tab="coupon" data-stab="used" class="tab">사용/만료 쿠폰</a></li>
</ul>

<div id="{{ $stab }}">
    <form id="search_form" name="search_form" method="GET">
        <input type="hidden" name="tab" value="{{ $tab }}"/>
        <input type="hidden" name="stab" value="{{ $stab }}"/>

        <div class="paymentDate mt-zero pt20">
            <div class="payLecList NGR">
                <strong>기간검색</strong>
                <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="datepicker" maxlength="10" autocomplete="off" style="width:120px">
                ~ <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="datepicker" maxlength="10" autocomplete="off" style="width:120px">
            </div>
            <ul class="c_both">
                <li><a href="#none" class="btn-set-search-date" data-period="0-all">전체</a></li>
                <li><a href="#none" class="btn-set-search-date" data-period="15-days">15일</a></li>
                <li><a href="#none" class="btn-set-search-date" data-period="1-months">1개월</a></li>
                <li><a href="#none" class="btn-set-search-date" data-period="3-months">3개월</a></li>
                <li><a href="#none" class="btn-set-search-date" data-period="6-months">6개월</a></li>
            </ul>
            <div class="btnSearch">
                <a href="#none" id="btn_search">검색</a>
            </div>
        </div>

        <div class="willbes-Lec-Selected NG c_both tx-gray pt-zero">
            <select id="site_group" name="site_group" title="과정" class="seleProcess width30p">
                <option value="">과정</option>
                @foreach($arr_site_group as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
            @if($stab == 'available')
                <select id="order_date_type" name="order_date_type" title="정렬일자" class="seleLec width30p ml1p">
                    <option value="issue">최근발급순</option>
                    <option value="expire">만료임박순</option>
                </select>
            @else
                <select id="valid_status" name="valid_status" title="상태" class="seleLec width30p ml1p">
                    <option value="">상태</option>
                    <option value="all">전체</option>
                    <option value="expire">기간만료</option>
                    <option value="used">사용완료</option>
                </select>
            @endif
        </div>

        @if(empty($data) === false)
            <div class="myCouponList">
                @foreach($data as $idx => $row)
                    <ul>
                        <li>{{ $row['CouponName'] }}</li>
                        <li><strong>할인율(금액)</strong> {{ number_format($row['DiscRate']) }}{{ $row['DiscRateUnit'] }}</li>
                        @if($stab == 'available')
                            <li><strong>사용기간</strong> {{ substr($row['IssueDatm'], 0, 16) }} ~ {{ substr($row['ExpireDatm'], 0, 16) }} ({{ $row['ValidStatusName'] }})</li>
                        @else
                            <li><strong>상태</strong> {{ $row['ValidStatusName'] }}</li>
                        @endif
                        <li><strong>과정</strong> {{ $row['SiteGroupName'] }}</li>
                        @if($stab == 'available')
                            <li><strong>발급일</strong> {{ substr($row['IssueDatm'], 0, 10) }}</li>
                        @else
                            <li><strong>사용/소멸일</strong> @if($row['ValidStatusName'] == '만료') {{ substr($row['ExpireDatm'], 0, 10) }} @else {{ substr($row['UseDatm'], 0, 10) }} @endif</li>
                        @endif
                    </ul>
                @endforeach
            </div>
            {!! $paging['pagination'] !!}
        @else
            <div class="myCouponList tx-center pt20">
                <img src="{{ img_url('m/mypage/icon_warning.png') }}"/>
                <div class="mt10 pb20 bdb-dark-gray">등록된 쿠폰이 없습니다.</div>
            </div>
        @endif
    </form>
</div>

<div class="paymentCheckInfo">
    <h4>쿠폰안내</h4>
    <ul>
        <li>쿠폰은 유효기간 내에만 사용이 가능하며, 유효기간이 지난 쿠폰은 소멸됩니다.</li>
        <li>쿠폰으로 구매한 상품 취소 시, 사용된 쿠폰은 복원되지 않고 소멸됩니다.</li>
    </ul>
</div>

{{--쿠폰등록--}}
<div id="CouponRegi" class="willbes-Layer-Black">
    <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h470 fix">
        <a class="closeBtn" href="#none" onclick="closeWin('CouponRegi')">
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
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="coupon_type" value="coupon"/>
                <p>쿠폰 번호</p>
                <input type="text" id="coupon_no" name="coupon_no" title="쿠폰번호" maxlength="16"/>
                <a href="#none" id="btn_coupon_regi" class="btnSearch">등록</a>
            </form>
        </div>
    </div>
    <div class="dim" onclick="closeWin('CouponRegi')"></div>
</div>