<div id="profQna" class="willbes-Layer-Board" style="display: block">
    <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">학습Q&A</div>

    <form id="ajax_list_form" name="ajax_list_form" method="GET">
        {!! csrf_field() !!}
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
        <input type="hidden" id="temp_keyword" name="temp_keyword" value="">
        <input type="hidden" id="page" name="page" value="{{$arr_input['page'] or 1}}">
    </form>

    <div class="Layer-Cont">
        <div class="willbes-Prof-Subject NG tx-dark-black">
            <div class="willbes-Lec-Search GM f_right">
                <div class="inputBox p_re">
                    <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" value="{{ element('s_keyword', $arr_input) }}" maxlength="30">
                    <button type="button" onclick="_callAjaxQna(1);" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- List -->
        <div class="willbes-Leclist c_both">
            <div class="willbes-Lec-Selected tx-gray">
                <div class="willbes-Lec-Search GM">
                    <select id="s_consult_type" name="s_consult_type" title="질문유형" class="seleQuestion">
                        <option value="">질문유형</option>
                        @foreach($arr_base['consult_type'] as $key => $val)
                            <option value="{{$key}}" @if(element('s_consult_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                        @endforeach
                    </select>
                    <ul class="chkBox mt10">
                        <li>
                            <input type="checkbox" id="s_is_display" name="s_is_display" value="1" class="goods_chk" @if(element('s_is_display', $arr_input) == 1)checked="checked"@endif>
                            <label>공지숨기기</label>
                        </li>
                    </ul>
                    <div class="search-Btn btnAuto90 h27 f_right">
                        <button type="button" class="mem-Btn bg-blue bd-dark-blue" onclick="_createQna();">
                            <span>질문하기</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray" id="ajax_table">
                    <colgroup>
                        <col style="width: 65px;">
                        <col style="width: 100px;">
                        <col>
                        <col style="width: 90px;">
                        <col style="width: 110px;">
                        <col style="width: 90px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></th>
                        <th>질문유형<span class="row-line">|</span></th>
                        <th>제목<span class="row-line">|</span></th>
                        <th>작성자<span class="row-line">|</span></th>
                        <th>작성일<span class="row-line">|</span></th>
                        <th>답변상태</th>
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
        _callAjaxQna($("#page").val());

        //질문유형
        $('#s_consult_type').on('change', function() {
            _callAjaxQna(1);
        });

        //공지숨기기
        $('#s_is_display').on('click', function() {
            _callAjaxQna(1);
        });
    });

    function _callAjaxQna(num) {
        listAjax(num);    //list data load
        _applyPaginationQna();
    }

    //list ajax
    function listAjax(page) {
        console.log($('#s_keyword').val());

        var s_is_display = '';
        if ($('#s_is_display').prop('checked') == true) {
            s_is_display = 1;
        } else {
            s_is_display = 0;
        }

        var add_table = '';
        var _url = '{{ front_url($default_path."/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'prof_idx' : '{{$arr_input['prof_idx']}}',
            's_keyword': $('#s_keyword').val(),
            's_consult_type': $('#s_consult_type').val(),
            's_is_display': s_is_display,
            'page' : page
        };

        sendAjax(_url, data, function(ret) {
            var rownum = ret.paging.rownum;

            if (ret.ret_data.length < 1) {
                add_table += '<tr>';
                add_table += '<td colspan="6" class="w-list tx-center">검색 결과가 없습니다.</td>';
                add_table += '</tr>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    var bg_class = '', num_html = '', type_ccd_name = '', reply_status_name = '', reg_name = '';

                    if (item.IsBest == 1) {
                        num_html += '<img src="{{ img_url('prof/icon_notice.gif') }}">';
                        bg_class = 'top';
                    } else {
                        num_html += rownum;
                    }

                    if(item.TypeCcd_Name){
                        type_ccd_name = item.TypeCcd_Name;
                    }

                    if(item.RegType == 1){
                        reg_name = '관리자';
                    } else {
                        reg_name = item.RegName;
                    }

                    if (item.IsBest == 0) {
                        if (item.ReplyStatusCcd == 621004) {
                            reply_status_name = '<span class="aBox answerBox NSK">답변완료</span>';
                        } else {
                            reply_status_name = '<span class="aBox waitBox NSK">답변대기</span>';
                        }
                    }

                    add_table += '<tr class="'+ bg_class +'">';
                    add_table += '<td class="w-no">'+ num_html +'</td>';
                    add_table += '<td class="w-A">'+ type_ccd_name +'</td>';
                    add_table += '<td class="w-list tx-left pl20"><a href="javascript:void(0);" onclick="javascript:_showQna(this); return false;" data-board-idx="'+ item.BoardIdx +'">'+ item.Title +'</a></td>';
                    add_table += '<td class="w-write">'+ reg_name +'</td>';
                    add_table += '<td class="w-date">'+ item.RegDatm +'</td>';
                    add_table += '<td class="w-answer">'+ reply_status_name +'</td>';
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

    //뷰페이지
    function _showQna(obj)
    {
        var ele_id = 'WrapReply';
        var _url = '{{ front_url($default_path."/popupShow") }}';
        var data = {
            'ele_id' : ele_id,
            's_cate_code' : '{{$arr_input['cate_code']}}',
            's_prof_idx' : '{{$arr_input['prof_idx']}}',
            's_subject_idx' : '{{$arr_input['subject_idx']}}',
            'board_idx' : $(obj).data('board-idx'),
        };
        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block');
        }, showAlertError, false, 'GET', 'html');
    }

    //create ajax
    function _createQna() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
        var ele_id = 'WrapReply';
        var _url = '{{ front_url($default_path."/popupCreate") }}';
        var data = {
            'ele_id' : ele_id,
            's_cate_code' : '{{$arr_input['cate_code']}}',
            's_prof_idx' : '{{$arr_input['prof_idx']}}',
            's_subject_idx' : '{{$arr_input['subject_idx']}}'
        };

        sendAjax(_url, data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block');
        }, showAlertError, false, 'GET', 'html');
    }

    //href 리턴 false, list,page ajax 호출
    function _applyPaginationQna() {
        $("div.Paging a").on("click", function() {
            var link, temp_params, params, num;

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                _callAjaxQna(num);
            } else {
                _callAjaxQna(1);
            }
            return false;
        });
    }
</script>