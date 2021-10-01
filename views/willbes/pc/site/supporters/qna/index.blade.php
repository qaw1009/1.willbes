<form class="form-horizontal form-label-left" id="ajax_qna_list_form" name="ajax_qna_list_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" id="supporters_idx" name="supporters_idx" value="{{ element('supporters_idx', $arr_input) }}">
    <table class="tableTypeA" id="ajax_qna_table">
        <col width="8%"/>
        <col width="10%"/>
        <col width="13%"/>
        <col width=""/>
        <col width="8%"/>
        <col width="12%"/>
        <col width="10%"/>
        <thead>
        <tr>
            <th>NO</th>
            <th>질문유형</th>
            <th>과목</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
            <th>답변상태</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div class="Paging_qna add-qna-paging"></div>
</form>

<script type="text/javascript">
    var $ajax_qna_list_form = $('#ajax_qna_list_form');

    $(document).ready(function(){
        qnaCallAjax(1);
    });

    function qnaCallAjax(num) {
        qnaListAjax(num);    //list data load
        qnaAjaxPaging(num);  //page data load
        qnaApplyPagination();
    }

    //list ajax
    function qnaListAjax(page) {
        var add_table = '';
        var _url = '{{ front_url("/supporters/qna/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_qna_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
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
                    add_table += '<td>'+ item.TypeCcd_Name +'</td>';
                    add_table += '<td>'+ item.SubjectName +'</td>';
                    add_table += '<td class="tx-left">';
                    if (item.IsPublic == 'N' && item.RegMemIdx != {{ sess_data('mem_idx') }}) {
                        add_table += '<a href="javascript:alert(\'비밀글입니다.\');">';
                    } else {
                        add_table += '<a href="javascript:void(0);" onclick="javascript:goEditQna(\'' + item.BoardIdx + '\', \'' + item.SupportersIdx + '\');">';
                    }
                    add_table += (item.IsPublic == 'Y') ? '' : '<img src="{{ img_url('prof/icon_locked.gif') }}"> ';
                    add_table += item.Title;
                    add_table += '</a>';
                    add_table += (item.AttachData == 'N') ? '' : ' <img src="{{ img_url('sub/icon_file.gif') }}" alt="첨부파일">';
                    add_table += '</td>';
                    add_table += '<td>'+ (item.RegMemIdx == '{{sess_data('mem_idx')}}' ? item.RegName : item.RegName.substring(0,2)+'*') +'</td>';
                    add_table += '<td>'+ item.RegDatm +'</td>';
                    add_table += '<td><span class="workBox '+(item.ReplyStatusCcd == '621004' ? 'workBox3' : 'workBox4')+'">'+ item.ReplyStatusCcd_Name +'</span></td>';
                    add_table += '</tr>';
                    rownum = rownum - 1;
                });
            }
            $('#ajax_qna_table > tbody').html(add_table);
            $('.n-content').find("img").attr('width', '100%');
        }, showError, false, 'GET');
    }

    //page ajax
    function qnaAjaxPaging(page)
    {
        var _url = '{{ front_url("/supporters/qna/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_qna_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'supporters_idx' : $('#supporters_idx').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            $('.add-qna-paging').html(ret.paging.pagination);
        }, showError, false, 'GET');
    }

    //href 리턴 false, list,page ajax 호출
    function qnaApplyPagination() {
        $("div.Paging_qna a").on("click", function() {
            var link, temp_params, params, num;

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                qnaCallAjax(num);
            } else {
                qnaCallAjax(1);
            }
            return false;
        });
    }

    function goEditQna(board_idx, supporters_idx) {
        $('#qna_list').hide();
        $('#qna_show').show();

        var data = {'board_idx' : board_idx, 'supporters_idx' : supporters_idx};
        sendAjax('{{ front_url('/supporters/qna/show') }}', data, function(ret) {
            $('#qna_show').html(ret);
        }, showAlertError, false, 'GET', 'html');
    }
</script>