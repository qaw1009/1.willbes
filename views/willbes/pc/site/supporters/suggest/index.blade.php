<form class="form-horizontal form-label-left" id="ajax_suggest_list_form" name="ajax_suggest_list_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" id="supporters_idx" name="supporters_idx" value="{{ element('supporters_idx', $arr_input) }}">
    <table class="tableTypeA" id="ajax_suggest_table">
        <col width="8%"/>
        <col width=""/>
        <col width="8%"/>
        <col width="12%"/>
        <col width="10%"/>
        <thead>
        <tr>
            <th>NO</th>
            <th>제목</th>
            <th>첨부</th>
            <th>작성일</th>
            <th>조회수</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div class="Paging_suggest add-suggest-paging"></div>
</form>

<script type="text/javascript">
    var $ajax_suggest_list_form = $('#ajax_suggest_list_form');

    $(document).ready(function(){
        SuggestCallAjax(1);
    });

    function SuggestCallAjax(num) {
        SuggestListAjax(num);    //list data load
        SuggestAjaxPaging(num);  //page data load
        SuggestApplyPagination();
    }

    //list ajax
    function SuggestListAjax(page) {
        var add_table = '';
        var _url = '{{ front_url("/supporters/suggest/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_suggest_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'supporters_idx' : $('#supporters_idx').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            var now_day = '{{ date('Ymd') }}';
            var rownum = ret.paging.rownum;

            if (ret.ret_data.length < 1) {
                add_table += '<tr>';
                add_table += '<td colspan="5">등록된 내용이 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    add_table += '<tr>';
                    add_table += '<td>'+ rownum +'</td>';
                    add_table += '<td class="tx-left">';

                    if (item.IsPublic == 'N' && item.RegMemIdx != {{ sess_data('mem_idx') }}) {
                        add_table += '<a href="javascript:alert(\'비밀글입니다.\');">';
                    } else {
                        add_table += '<a href="#none" onclick="javascript:goEditSugges(\'' + item.BoardIdx + '\', \'' + item.SupportersIdx + '\');">';
                    }

                    add_table += (item.IsPublic == 'Y') ? '' : '<img src="{{ img_url('prof/icon_locked.gif') }}">';
                    add_table += item.Title;
                    add_table += '</a>';
                    add_table += '</td>';
                    add_table += '<td>';
                    add_table += (item.AttachData == 'N') ? '' : '<img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일">';
                    add_table += '</td>';
                    add_table += '<td>'+ item.RegDatm +'</td>';
                    add_table += '<td>'+ item.TotalReadCnt +'</td>';
                    add_table += '</tr>';
                    rownum = rownum - 1;
                });
            }
            $('#ajax_suggest_table > tbody').html(add_table);
            $('.n-content').find("img").attr('width', '100%');
        }, showError, false, 'GET');
    }

    //page ajax
    function SuggestAjaxPaging(page)
    {
        var _url = '{{ front_url("/supporters/suggest/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_suggest_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'supporters_idx' : $('#supporters_idx').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            $('.add-suggest-paging').html(ret.paging.pagination);
        }, showError, false, 'GET');
    }

    //href 리턴 false, list,page ajax 호출
    function SuggestApplyPagination() {
        $("div.Paging_suggest a").on("click", function() {
            var link, temp_params, params, num;

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                SuggestCallAjax(num);
            } else {
                SuggestCallAjax(1);
            }
            return false;
        });
    }

    function goEditSugges(board_idx, supporters_idx) {
        $('#suggest_list').hide();
        $('#suggest_show').show();

        var data = {'board_idx' : board_idx, 'supporters_idx' : supporters_idx};
        sendAjax('{{ front_url('/supporters/suggest/show') }}', data, function(ret) {
            $('#suggest_show').html(ret);
        }, showAlertError, false, 'GET', 'html');
    }
</script>