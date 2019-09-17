<div class="add-list"></div>
<div class="add-paging"></div>
<form class="form-horizontal form-label-left" id="_ajax_search_form" name="_ajax_search_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" id="search_cate_code" name="search_cate_code" value="{{element('cate_code', $arr_input)}}">
    <input type="hidden" id="search_subject_idx" name="search_subject_idx" value="{{element('subject_idx', $arr_input)}}">
    <input type="hidden" id="search_prof_idx" name="search_prof_idx" value="{{element('prof_idx', $arr_input)}}">
    <input type="hidden" id="search_prod_code" name="search_prod_code" value="{{element('prod_code', $arr_input)}}">
    <input type="hidden" id="orderby" name="orderby">
</form>

<script type="text/javascript">
    var $_ajax_search_form = $('#_ajax_search_form');
    var $mem_id = '{{sess_data('mem_id')}}';

    $(document).ready(function(){
        callAjax(1);
    });

    function callAjax(num) {
        listAjax(num);    //list data load
        ajaxPaging(num);  //page data load
        applyPagination();
    }

    function listAjax(page) {
        var add_table = '';
        var orderby = $_ajax_search_form.find('input[name="orderby"]').val();
        var _url = '{{ front_url("/support/studyComment/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $_ajax_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'search_cate_code' : $('#search_cate_code').val(),
            'search_subject_idx' : $('#search_subject_idx').val(),
            'search_prof_idx' : $('#search_prof_idx').val(),
            'search_prod_code' : $('#search_prod_code').val(),
            'page' : page,
            'orderby' : orderby
        };

        sendAjax(_url, data, function(ret) {
            var regName;
            var rownum = ret.paging.rownum;
            $("#tab04 > strong").text(ret.total_rows);

            if (ret.ret_data.length < 1) {
                add_table += '<div class="reply">수강후기 목록이 없습니다.</div>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    if (item.RegMemId == $mem_id) {
                        regName = item.RegMemName;
                    } else {
                        regName = sub_str(item.RegMemName, 2, '*');
                    }

                    add_table += '<div class="reply">';
                    add_table += (item.RegType == 1) ? item.Content : nl2br(item.Content);
                    add_table += '<p class="mt10">'+ regName + ' ' + item.RegDatm + '</p>';
                    add_table += '</div>';
                    rownum = rownum - 1;
                });
            }
            $('.add-list').html(add_table);
        }, showError, false, 'GET');
    }

    function ajaxPaging(page)
    {
        var _url = '{{ front_url("/support/studyComment/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $_ajax_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'search_cate_code' : $('#search_cate_code').val(),
            'search_subject_idx' : $('#search_subject_idx').val(),
            'search_prof_idx' : $('#search_prof_idx').val(),
            'search_prod_code' : $('#search_prod_code').val(),
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
            /*var num = $(this).text();
            callAjax(num);*/

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

    //문자열 길이 체크
    function sub_str(string, length, sing) {
        if(string != null && string.length > length) {
            return string.substr(0,length)+sing;
        } else {
            return string;
        }
    }

    function nl2br(str){
        return str.replace(/\n/g, "<br />");
    }
</script>