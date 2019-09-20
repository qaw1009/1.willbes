@extends('willbes.m.layouts.master')

@section('page_title', '쿠폰/수강권 관리')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div class="paymentWrap">
        <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
            <li><a id="hover_coupon" data-tab="coupon" data-stab="available" class="tab">쿠폰</a><span class="row-line">|</span></li>
            <li><a id="hover_voucher" data-tab="voucher" data-stab="voucher" class="tab">수강권</a></li>
        </ul>

        <div id="{{ $tab }}" class="pointBox">
            @include('willbes.m.classroom.coupon.' . $tab . '_partial')
        </div>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script type="text/javascript">
    var $search_form = $('#search_form');
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        // 검색어 디폴트 설정
        var initSearch = function() {
            $search_form.find('select[name="site_group"]').val('{{ $arr_input['site_group'] or '' }}');
            $search_form.find('select[name="order_date_type"]').val('{{ $arr_input['order_date_type'] or 'issue' }}');
            $search_form.find('select[name="valid_status"]').val('{{ $arr_input['valid_status'] or '' }}');
        };

        initSearch();

        // 검색 버튼 클릭
        $search_form.on('click', '#btn_search, .btn-set-search-date', function() {
            $search_form.submit();
        });

        // 과정, 정렬일자, 상태 변경시 검색
        $search_form.on('change', 'select[name="site_group"], select[name="order_date_type"], select[name="valid_status"]', function () {
            $search_form.submit();
        });

        // 탭 선택할 경우 페이지 이동
        $('.tab').on('click', function() {
            var tab = $(this).data('tab');
            var stab = $(this).data('stab');

            location.replace('{{ front_url('/classroom/coupon/index') }}?tab=' + tab + '&stab=' + stab);
        });

        // 탭 active 처리
        $(function() {
            $('.paymentWrap .tabWrap li a').removeClass('on');
            $('.paymentWrap .tabWrap #hover_{{ $tab }}').addClass('on');
            $('.paymentWrap .myCouponTab #hover_{{ $tab . '_' .$stab }}').addClass('on');
        });

        // 쿠폰번호 등록 버튼 클릭
        $regi_form.on('click', '#btn_coupon_regi', function() {
            var $coupon_no = $regi_form.find('input[name="coupon_no"]');

            if ($coupon_no.val().trim() === '' || $coupon_no.val().length !== 16) {
                alert('16자리의 쿠폰번호를 입력해 주세요.');
                $coupon_no.focus();
                return;
            }

            if (confirm('쿠폰을 등록하시겠습니까?')) {
                var url = '{{ front_url('/classroom/coupon/store') }}';
                var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                    'coupon_no' : $coupon_no.val()
                });
                sendAjax(url, data, function(ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showAlertError, false, 'POST');
            }
        });
    });
</script>
@stop