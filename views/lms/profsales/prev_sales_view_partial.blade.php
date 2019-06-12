@if($is_tzone === true)
    <div id="wrap_prev_sales_view" class="pull-left ml-15 mt-15 hide">
        <a href="#none" id="btn_prev_sales_view" class="btn btn-dark mb-0" target="_blank">~ {{ $limit_start_date }} 이전 매출보기</a>
        [안내사항] 리뉴얼 전({{ $limit_start_date }} 이전) 매출은 직전 <span id="txt_prev_sales_view"></span>에서 확인해 주시기 바랍니다.
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // 이전 매출보기 셋팅
            $('#search_form').on('change', '#search_site_code', function() {
                var tab_txt = $(this).find('option:selected').text();
                if (tab_txt.indexOf('경찰') > -1 || tab_txt.indexOf('공무원') > -1) {
                    $('#wrap_prev_sales_view').removeClass('hide');

                    if (tab_txt.indexOf('경찰') > -1) {
                        $('#txt_prev_sales_view').html('T존 관리자');
                        $('#btn_prev_sales_view').prop('href', 'http://c3.willbescop.net/TZON/login.html?userId={{ $tzone_admin_id }}');
                    } else {
                        $('#txt_prev_sales_view').html('강사 마이페이지');
                        $('#btn_prev_sales_view').prop('href', 'http://w1.willbesgosi.net/main/index.html?userId={{ $tzone_admin_id }}');
                    }
                }
            });
            $('#search_form').find('select[name="search_site_code"]').trigger('change');
        });
    </script>
@endif
