<div class="couponSingup">
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="coupon_type" value="voucher"/>
        <p>수강권 번호</p>
        <input type="text" id="coupon_no" name="coupon_no" title="쿠폰번호" maxlength="16"/>
        <a href="#none" id="btn_coupon_regi" class="btnSearch">등록</a>
        <div>'-'를 제외한 숫자 16자리만 입력해 주세요.</div>
    </form>
</div>

<div id="{{ $stab }}">
    <form id="search_form" name="search_form" method="GET">
        <input type="hidden" name="tab" value="{{ $tab }}"/>
        <input type="hidden" name="stab" value="{{ $stab }}"/>

        <div class="paymentDate mt-zero pt20">
            <div class="payLecList NGR">
                <strong>기간검색</strong>
                <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="datepicker" maxlength="10" autocomplete="off" style="width:100px">
                ~ <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="datepicker" maxlength="10" autocomplete="off" style="width:100px">
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
            <select id="order_date_type" name="order_date_type" title="정렬일자" class="seleLec width30p ml1p">
                <option value="issue">최근발급순</option>
                <option value="expire">만료임박순</option>
            </select>
        </div>

        @if(empty($data) === false)
            <div class="myCouponList">
                @foreach($data as $idx => $row)
                    <ul>
                        <li>{{ $row['CouponName'] }}</li>
                        <li><strong>수강권번호</strong> {{ $row['CouponPin'] }}</li>
                        <li><strong>수강권적용강좌</strong> {{ $row['ProdName'] }}</li>
                        <li><strong>과정</strong> {{ $row['SiteGroupName'] }}</li>
                        <li><strong>등록일</strong> {{ substr($row['IssueDatm'], 0, 10) }}</li>
                    </ul>
                @endforeach
            </div>
            {!! $paging['pagination'] !!}
        @else
            <div class="myCouponList tx-center pt20">
                <img src="{{ img_url('m/mypage/icon_warning.png') }}"/>
                <div class="mt10 pb20 bdb-dark-gray">등록된 수강권 정보가 없습니다.</div>
            </div>
        @endif
    </form>
</div>

<div class="paymentCheckInfo">
    <h4>수강권안내</h4>
    <ul>
        <li>수강권은 윌비스 제휴사를 통해서만 지급되며 특정 강좌만 수강할 수 있습니다.</li>
        <li>수강권은 등록 후 즉시 수강중인강좌 > 관리자지급강좌에서 강좌 수강이 가능합니다.(결제 시 사용되지 않음)</li>
        <li>수강권은 표기된 유효기간 내에만 사용이 가능하며, 유효기간이 지난 수강권은 등록되지 않습니다.</li>
    </ul>
</div>