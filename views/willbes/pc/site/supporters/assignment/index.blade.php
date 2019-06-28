<form class="form-horizontal form-label-left" id="ajax_assignment_list_form" name="ajax_assignment_list_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" id="supporters_idx" name="supporters_idx" value="{{ element('supporters_idx', $arr_input) }}">
    <table class="tableTypeA" id="ajax_assignment_table">
        <col width="8%"/>
        <col width=""/>
        <col width="15%"/>
        <thead>
        <tr>
            <th>NO</th>
            <th>과제</th>
            <th>과제 제출일</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div class="Paging_assingment add-assignment-paging"></div>
</form>

<script type="text/javascript">
    var $ajax_assignment_list_form = $('#ajax_assignment_list_form');

    $(document).ready(function(){
        AssignmentCallAjax(1);
    });

    function AssignmentCallAjax(num) {
        AssignmentListAjax(num);    //list data load
        AssignmentAjaxPaging(num);  //page data load
        AssignmentApplyPagination();
    }

    //list ajax
    function AssignmentListAjax(page) {
        var add_table = '';
        var _url = '{{ front_url("/supporters/assignment/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_assignment_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'supporters_idx' : $('#supporters_idx').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            var now_day = '{{ date('Ymd') }}';
            var rownum = ret.paging.rownum;

            if (ret.ret_data.length < 1) {
                add_table += '<tr>';
                add_table += '<td colspan="3">등록된 내용이 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    add_table += '<tr>';
                    add_table += '<td>'+ rownum +'</td>';
                    add_table += '<td class="tx-left">';
                    add_table += item.Title;
                    add_table += '<ul class="info">';
                    add_table += '<li>기간 : ' + item.SupportersStartDate + ' ~ ' + item.SupportersEndDate + '</li>';
                    add_table += (item.AttachData == 'N') ? '' : '<li><img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일"></li>';

                    add_table += '<li>';
                        if (item.am_AssignmentStatusCcd == '{{ $arr_input['arr_save_type_ccd'][1] }}') {
                            if (now_day >= item.SupportersStartDate.replace(/-/gi,'') && now_day <= item.SupportersEndDate.replace(/-/gi,'')) {
                                add_table += '<span class="workBox workBox2"><a href="#none" onclick="javascript:goEdit(\'modify\',\''+item.BoardIdx+'\');">과제수정</a></span>';
                            } else {
                                add_table += '<span class="workBox workBox3"><a href="#none" onclick="javascript:goEdit(\'show\',\''+item.BoardIdx+'\');">제출완료</a></span>';
                            }
                        } else {
                            if (now_day >= item.SupportersStartDate.replace(/-/gi,'') && now_day <= item.SupportersEndDate.replace(/-/gi,'')) {
                                add_table += '<span class="workBox workBox1"><a href="#none" onclick="javascript:goEdit(\'ing\',\''+item.BoardIdx+'\');">과제제출</a></span>';
                            } else {
                                add_table += '<span class="workBox workBox4">미제출</span>';
                            }
                        }
                    add_table += '</li>';
                    add_table += '</ul>';
                    add_table += '</td>';
                    add_table += (item.am_RegDatm === null || item.am_RegDatm == '') ? '<td></td>' : '<td>'+item.am_RegDatm+'</td>';
                    add_table += '</tr>';
                    rownum = rownum - 1;
                });
            }
            $('#ajax_assignment_table > tbody').html(add_table);
            $('.n-content').find("img").attr('width', '100%');
        }, showError, false, 'GET');
    }

    //page ajax
    function AssignmentAjaxPaging(page)
    {
        var _url = '{{ front_url("/supporters/assignment/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_assignment_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'supporters_idx' : $('#supporters_idx').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            $('.add-assignment-paging').html(ret.paging.pagination);
        }, showError, false, 'GET');
    }

    //href 리턴 false, list,page ajax 호출
    function AssignmentApplyPagination() {
        $("div.Paging_assingment a").on("click", function() {
            var link, temp_params, params, num;

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                AssignmentCallAjax(num);
            } else {
                AssignmentCallAjax(1);
            }
            return false;
        });
    }

    function goEdit(open_target, notice_idx) {
        var ele_id = '';
        var data = '';
        var _url = '';
        var supporters_idx = $ajax_assignment_list_form.find('input[name="supporters_idx"]').val();

        if (open_target == 'ing' || open_target == 'modify') {
            ele_id = 'EDITPASS';
            data = {'ele_id' : ele_id, 'board_idx' : notice_idx, 'supporters_idx' : supporters_idx};
            _url = '{{ site_url('/supporters/assignment/create') }}';
        } else {
            ele_id = 'MARKPASS';
            data = {'ele_id' : ele_id, 'board_idx' : notice_idx};
            _url = '{{ site_url('/supporters/assignment/show') }}';
        }

        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>