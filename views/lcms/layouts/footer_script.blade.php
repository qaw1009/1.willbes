{{-- 하단 공통 스크립트 --}}
<script src="/public/vendor/validator/multifield.js"></script>
<script src="/public/js/util.js"></script>
<script src="/public/js/validation_util.js"></script>
<script src="/public/js/lcms/app.js"></script>

{{-- PHP 변수를 사용하는 하단 공통 스크립트 --}}
<script type="text/javascript">
    $(document).ready(function() {
        // 즐겨찾기 버튼 클릭
        $('#btn_favorite').on('click', function() {
            var is_regist = $(this).children('i').prop('class').indexOf('red') < 0;
            var msg = (is_regist === true) ? '즐겨찾기에 추가하시겠습니까?' : '즐겨찾기를 삭제하시겠습니까?';

            if (!confirm(msg)) {
                return;
            }

            var data = {
                '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
                'menu_idx' : '{{ element('MenuIdx', $__menu['CURRENT']) }}'
            };
            sendAjax('{{ site_url('/sys/adminSettings/favorite') }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showError, false, 'POST');
        });

        // 사이트 탭 HTML 설정
        $tab_site_codes = $('.tabs-site-codes');
        if ($tab_site_codes.length > 0) {
            $tab_site_codes.each(function(idx, ele) {
                $('#' + ele.id).html(getSiteTabsHtml(ele.id, $(this).data()));
            });
        }
    });

    /**
     * 사이트 탭 HTML 리턴
     * param id {string} element id
     * param data {json} element data
     * returns {string} HTML
     */
    function getSiteTabsHtml(id, data) {
        var $json = {!! json_encode(array_pluck($__auth['Site'], 'SiteName', 'SiteCode')) !!};
        var $qs = queryStringToJson();

        var tab_attr, tab_txt, tab_active, tab_base_url = '#none';
        var tab_data = typeof data.tabData === 'undefined' ? {} : JSON.parse(data.tabData.replace(/'/gi, '"'));

        if (data.tabType !== 'tab') {
            tab_base_url = location.search.replace(/[\&|\?]site_code=(.)*/gi, '');
            if (tab_base_url.indexOf('?') === -1) {
                tab_base_url = './?site_code=';
            } else {
                tab_base_url = './' + tab_base_url + '&site_code=';
            }
        } else {
            tab_attr = 'role="tab" data-toggle="tab"';
        }

        var tab_html = '<ul class="nav nav-tabs bar_tabs mt-30" role="tablist">\n';
        if (data.isAllTab === 1) {
            tab_active = typeof $qs.site_code === 'undefined' ? 'active' : '';
            tab_txt = typeof tab_data.all === 'undefined' ? '' : ' <span class="red">(' + tab_data.all + ')</span>';
            tab_html += '<li role="presentation" class="' + tab_active + '"><a href="#none" ' + tab_attr + '><strong>전체</strong>' + tab_txt + '</a></li>\n';
        }

        $.each($json, function(site_code, site_name) {
            var tab_url = tab_base_url;
            if (data.tabType !== 'tab') {
                tab_url = tab_base_url + site_code;
            }
            tab_active = ($qs.site_code === site_code) ? 'active' : '';
            tab_txt = typeof tab_data[site_code] === 'undefined' ? '' : ' <span class="red">(' + tab_data[site_code] + ')</span>';

            tab_html += '<li role="presentation" class="' + tab_active + '"><a href="' + tab_url + '" ' + tab_attr + ' data-site-code="' + site_code + '"><strong>' + site_name + '</strong>' + tab_txt + '</a></li>\n';
        });

        return tab_html + '</ul>\n';
    }
</script>