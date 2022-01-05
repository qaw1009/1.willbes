<div id="profQna" class="willbes-Layer-Board" style="display: block">
    <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">첨삭게시판</div>
    <form id="_regi_form" name="_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $board_idx }}"/>
        <input type="hidden" name="reg_type" value="{{$reg_type}}"/>
        <input type="hidden" name="s_cate_code" value="{{element('s_cate_code', $arr_input)}}"/>
        <input type="hidden" name="s_prof_idx" value="{{element('s_prof_idx', $arr_input)}}"/>
        <input type="hidden" name="s_subject_idx" value="{{element('s_subject_idx', $arr_input)}}"/>
        <input type="hidden" name="is_public" value="N"/>
        <div class="Layer-Cont">
            <div class="willbes-Leclist c_both">
                <div class="LecWriteTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                        <colgroup>
                            <col style="width: 120px;">
                            <col>
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="w-tit bg-light-white tx-center strong">제목<span class="tx-light-blue">(*)</span></td>
                            <td class="w-text tx-left pl30" colspan="3">
                                <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="{{$data['Title']}}">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-center strong">내용<span class="tx-light-blue">(*)</span></td>
                            <td class="w-textarea write tx-left pl30" colspan="3">
                                <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                            <td class="w-file answer tx-left" colspan="4">
                                <ul class="attach">
                                    @for($i = 0; $i < $attach_file_cnt; $i++)
                                        <li><input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3"></li>
                                    @endfor
                                    <li>
                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
                                        • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="search-Btn mt20 h36 p_re">
                        <button type="button" id="_btn_qna_list" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                            <span class="tx-purple-gray">취소</span>
                        </button>
                        <button type="submit" id="_btn_qna_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                            <span>저장</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="Layerprof" class="willbes-Layer-Black" style="display: block"></div>

<script type="text/javascript">
    var $_regi_form = $('#_regi_form');

    $(document).ready(function() {
        $("#_btn_qna_list").click(function() {
            var ele_id = 'WrapReply';
            var _url = '{{ front_url($default_path."/popupIndex") }}';
            var data = {
                'ele_id' : ele_id,
                'cate_code' : '{{ element('s_cate_code', $arr_input) }}',
                'prof_idx' : '{{ element('s_prof_idx', $arr_input) }}',
                'subject_idx' : '{{ element('s_subject_idx', $arr_input) }}'
            };

            sendAjax(_url, data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block');
            }, showAlertError, false, 'GET', 'html');
        });

        $('#_btn_qna_submit').click(function () {
            var _url = '{!! front_url($default_path.'/store') !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($_regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $("#_btn_qna_list").trigger("click");
                }
            }, showValidateError, addValidate, false, 'alert');
        });
    });

    function addValidate() {
        if ($('#board_title').val() == '') {
            alert('제목을 선택해 주세요.');
            return false;
        }

        if ($('#board_content').val() == '') {
            alert('내용을 선택해 주세요.');
            return false;
        }
        return true;
    }
</script>