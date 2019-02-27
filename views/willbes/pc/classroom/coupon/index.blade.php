@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Mypage-PAYMENTZONE c_both">
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                <div class="Tit">쿠폰안내</div>
                                - 쿠폰은 유효기간 내에만 사용이 가능하며, 유효기간이 지난 쿠폰은 소멸됩니다.<br/>
                                - 쿠폰으로 구매한 상품 취소 시, 사용된 쿠폰은 복원되지 않고 소멸됩니다.<br/>

                                <div class="Tit pt30">수강권안내</div>
                                - 수강권은 윌비스 제휴사( <img src="{{ img_url('mypage/icon_company1.png') }}"> <img src="{{ img_url('mypage/icon_company2.png') }}"> <img src="{{ img_url('mypage/icon_company3.png') }}"> <img src="{{ img_url('mypage/icon_company4.png') }}"> )를 통해서만 지급되며 특정 강좌만 수강할 수 있습니다.<br/>
                                - 수강권은 등록 후 즉시 수강중인강좌 > 관리자지급강좌에서 강좌 수강이 가능합니다.(결제 시 사용되지 않음)<br/>
                                - 수강권은 표기된 유효기간 내에만 사용이 가능하며, 유효기간이 지난 수강권은 등록되지 않습니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-PAYMENTZONE -->

            <div class="willbes-Mypage-Tabs mt40">
                <div class="pointDetailWrap">
                    <ul class="tabWrap tabDepth3 NG">
                        <li><a id="hover_coupon" data-tab="coupon" data-stab="available" class="tab">쿠폰</a></li>
                        <li><a id="hover_voucher" data-tab="voucher" data-stab="voucher" class="tab">수강권</a></li>
                    </ul>
                    <div class="tabBox mt20">
                        <div id="{{ $tab }}">
                            @include('willbes.pc.classroom.coupon.' . $tab . '_partial')
                        </div>
                    </div>
                </div>
                <!-- pointDetailWrap -->
            </div>
            <!-- willbes-Mypage-Tabs -->
        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        var $search_form = $('#search_form');
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 검색어 디폴트 설정
            var initSearch = function() {
                $search_form.find('select[name="search_date_type"]').val('{{ $arr_input['search_date_type'] or 'issue' }}');
                $search_form.find('select[name="site_group"]').val('{{ $arr_input['site_group'] or '' }}');
                $search_form.find('select[name="order_date_type"]').val('{{ $arr_input['order_date_type'] or 'issue' }}');
                $search_form.find('select[name="valid_status"]').val('{{ $arr_input['valid_status'] or '' }}');
            };

            initSearch();

            // 과정, 정렬일자, 상태 변경시 검색
            $search_form.on('change', 'select[name="site_group"], select[name="order_date_type"], select[name="valid_status"]', function () {
                $search_form.submit();
            });

            // 탭 선택할 경우 페이지 이동
            $('.tab').on('click', function() {
                var tab = $(this).data('tab');
                var stab = $(this).data('stab');

                location.replace('{{ site_url('/classroom/coupon/index') }}?tab=' + tab + '&stab=' + stab);
            });

            // 탭 active 처리
            $(function() {
                $('.pointDetailWrap .tabWrap li a').removeClass('on');
                $('.pointDetailWrap .tabWrap #hover_{{ $tab }}').addClass('on');
                $('.pointDetailWrap .tabWrap #hover_{{ $tab . '_' .$stab }}').addClass('on');
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
                    var url = '{{ site_url('/classroom/coupon/store') }}';
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