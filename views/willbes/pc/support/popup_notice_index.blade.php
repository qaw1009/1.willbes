<div id="profNotice" class="willbes-Layer-Board" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">공지사항</div>

    <form id="ajax_list_form" name="ajax_list_form" method="GET">
        {!! csrf_field() !!}
        <input type="hidden" id="temp_keyword" name="temp_keyword" value="">
        <input type="hidden" id="page" name="page" value="{{$arr_input['page'] or 1}}">
    </form>

    <div class="Layer-Cont">
        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
            <div class="willbes-Lec-Search GM f_right">
                <div class="inputBox p_re">
                    <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" value="{{ element('s_keyword', $arr_input) }}" maxlength="30">
                    <button type="button" onclick="callAjax(1);" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- List -->
        <div class="willbes-Leclist c_both">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray" id="ajax_table">
                    <colgroup>
                        <col style="width: 65px;">
                        <col>
                        <col style="width: 90px;">
                        <col style="width: 100px;">
                        <col style="width: 90px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></th>
                        <th>제목<span class="row-line">|</span></th>
                        <th>첨부파일<span class="row-line">|</span></th>
                        <th>작성일<span class="row-line">|</span></th>
                        <th>조회수</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-xs-12 add-paging"></div>
                </div>
            </div>
        </div>
        <!-- willbes-Leclist -->
    </div>
</div>

<div id="Layerprof" class="willbes-Layer-Black" style="display: block"></div>


<script type="text/javascript">
    var $ajax_list_form = $('#ajax_list_form');

    $(document).ready(function(){
        callAjax($("#page").val());
    });

    function callAjax(num) {
        listAjax(num);    //list data load
        applyPagination();
    }

    //list ajax
    function listAjax(page) {
        var add_table = '';
        var _url = '{{ front_url($default_path."/notice/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'prof_idx' : '{{$arr_input['prof_idx']}}',
            's_keyword': $('#s_keyword').val(),
            'page' : page
        };

        sendAjax(_url, data, function(ret) {
            var rownum = ret.paging.rownum;

            if (ret.ret_data.length < 1) {
                add_table += '<tr>';
                add_table += '<td colspan="5" class="w-list tx-center">검색 결과가 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    var file_icon = '';
                    var num_html = '';
                    var bg_class = '';

                    if(item.AttachData.length > 0){
                        file_icon = '<img src="{{ img_url('prof/icon_file.gif') }}">';
                    }

                    if (item.IsBest == 1) {
                        num_html += '<img src="{{ img_url('prof/icon_notice.gif') }}">';
                        bg_class = 'top';
                    } else {
                        num_html += rownum;
                    }

                    add_table += '<tr class="'+ bg_class +'">';
                    add_table += '<td class="w-no">'+ num_html +'</td>';
                    add_table += '<td class="w-list tx-left pl20"><a href="#none" data-board-idx="'+ item.BoardIdx +'" onclick="showAjax(this)">'+ item.Title +'</a></td>';
                    add_table += '<td class="w-file">'+ file_icon +'</td>';
                    add_table += '<td class="w-date">'+ item.RegDatm +'</td>';
                    add_table += '<td class="w-click">'+ item.TotalReadCnt +'</td>';
                    add_table += '</tr>';
                    rownum = rownum - 1;
                });

                $('#page').val(page);
                $('#temp_keyword').val($('#s_keyword').val());
            }

            $('#ajax_table > tbody').html(add_table);
            $('.add-paging').html(ret.paging.pagination);

        }, showError, false, 'GET');
    }

    //show ajax
    function showAjax(obj) {
        var ele_id = 'WrapReply';
        var _url = '{{ front_url($default_path."/notice/popupShow") }}';
        var data = {
            'ele_id' : ele_id,
            'prof_idx' : '{{$arr_input['prof_idx']}}',
            'board_idx' : $(obj).data('board-idx'),
            's_keyword' : $('#temp_keyword').val(),
            'page' : $('#page').val(),
        };

        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
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