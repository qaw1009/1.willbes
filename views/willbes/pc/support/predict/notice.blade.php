<span class="b-close">X</span>
<h3 class="NSK-Black">live 토크쇼 공지사항</h3>
<div class="content">
    <form class="form-horizontal form-label-left" id="ajax_list_form" name="ajax_list_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="predict_idx" name="predict_idx" value="{{ element('predict_idx', $arr_input) }}">
        <input type="hidden" id="promotion_code" name="promotion_code" value="{{ element('promotion_code', $arr_input) }}">

        {{--리스트--}}
        <table id="ajax_table">
            <col widht="10%"/>
            <col widht=""/>
            <col widht="20%"/>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>제목</th>
                    <th>등록일</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div class="row">
            <div class="col-xs-12 add-paging"></div>
        </div>
    </form>
</div>

<script type="text/javascript">
    var $ajax_list_form = $('#ajax_list_form');

    $(document).ready(function(){
        $ajax_list_form.on('click', 'tr.noticeList', function() {
            $('tr.noticeList').removeClass('hover');

            if ($(this).next().is(':visible')) {
                $(this).next().hide();
                $(this).removeClass('hover');
            } else {
                $('tr.noticeTxt').hide();
                $(this).next().show();
                $(this).addClass('hover');
            }
            $(this).next().find("img").attr('width', '100%');
        });

        callAjax(1);
    });

    function callAjax(num) {
        listAjax(num);    //list data load
        ajaxPaging(num);  //page data load
        applyPagination();
    }

    //list ajax
    function listAjax(page) {
        var add_table = '';
        var _url = '{{ front_url("/support/predictNotice/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'predict_idx' : $('#predict_idx').val(),
            'promotion_code' : $('#promotion_code').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            var set_table_style;
            var param_board_idx = "{{ element('board_idx', $arr_input) }}";
            var rownum = ret.paging.rownum;

            if (ret.ret_data.length < 1) {
                add_table += '<tr>';
                add_table += '<td colspan="3">등록된 내용이 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    if (item.BoardIdx == param_board_idx) {
                        set_table_style = "table-row";
                    } else {
                        set_table_style = 'none';
                    }
                    add_table += '<tr class="noticeList">';
                    add_table += '<td>'+ rownum +'</td>';
                    add_table += '<td>'+ item.Title +'</td>';
                    add_table += '<td>'+ item.RegDatm +'</td>';
                    add_table += '</tr>';
                    add_table += '<tr class="noticeTxt" style="display:' + set_table_style + '">';
                    add_table += '<td class="tx-left n-content" colspan="3">' + item.Content + '</td>';
                    add_table += '</tr>';
                    rownum = rownum - 1;
                });
            }
            $('#ajax_table > tbody').html(add_table);
            $('.n-content').find("img").attr('width', '100%');
        }, showError, false, 'GET');
    }

    //page ajax
    function ajaxPaging(page)
    {
        var _url = '{{ front_url("/support/predictNotice/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'predict_idx' : $('#predict_idx').val(),
            'promotion_code' : $('#promotion_code').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            $('.add-paging').html(ret.paging.pagination);
        }, showError, false, 'GET');
    }

    //href 리턴 false, list,page ajax 호출
    function applyPagination() {
        $("div.Paging a").on("click", function() {
            var link, temp_params, params, num;

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                callAjax(num);
            } else {
                callAjax(1);
            }
            return false;
        });
    }
</script>