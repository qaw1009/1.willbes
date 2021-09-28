<div id="profQna" class="willbes-Layer-Board" style="display: block">
    <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">첨삭게시판</div>

    <div class="Layer-Cont">
        <div class="willbes-Leclist c_both">
            <div class="LecViewTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                    <colgroup>
                        <col style="width: 80px;">
                        <col style="width: 100px;">
                        <col>
                        <col style="width: 150px;">
                    </colgroup>
                    <thead>
                    @if($data['RegType'] == 1)
                        <tr>
                            <th colspan="3" class="w-list tx-left pl20">
                                <img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;"> <strong>{{$data['Title']}}</strong>
                            </th>
                            <th class="w-date tx-right pr20">{{$data['RegDatm']}}</th>
                        </tr>
                    @else
                        <tr><th colspan="4" class="w-list tx-left  pl20"><strong>{{$data['Title']}}</strong></th></tr>
                        <tr>
                            <td>{!! $data['RegMemIdx'] == sess_data('mem_idx') ? $data['RegName'] : hpSubString($data['RegName'],0,2,'*') !!}<span class="row-line">|</span></td>
                            <td>{{$data['TypeCcd_Name']}}<span class="row-line">|</span></td>
                            <td class="subTit tx-left pl20"><strong class="tx-light-blue" style="padding-right: 5px;">[강좌]</strong>{{$data['ProdName']}}<span class="row-line">|</span></td>
                            <td class="w-date">{{$data['RegDatm']}}</td>
                        </tr>
                    @endif
                    </thead>
                    <tbody>
                    @if(empty($data['AttachData']) === false)
                        <tr>
                            <td class="w-file tx-left pl20" colspan="4">
                                @foreach($data['AttachData'] as $row)
                                    @if($row['FileType'] == 0)
                                        <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td class="w-txt tx-left" colspan="4">
                            @if($data['RegType'] == 1)
                                {!! $data['Content'] !!}
                            @else
                                {!! nl2br($data['Content']) !!}
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>

                {{-- 답변 --}}
                @if($data['RegType'] == 0 && $data['ReplyStatusCcd'] == $reply_type_complete)
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 690px;">
                            <col style="width: 160px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <td class="w-answer">
                                <img src="{{ img_url('prof/icon_answer.gif') }}">
                            </td>
                            <td class="w-acad tx-left">
                                @if($data['ReplyStatusCcd'] == '621004')
                                    <span class="aBox answerBox NSK">답변완료</span>
                                @else
                                    <span class="aBox waitBox NSK">답변대기</span>
                                @endif
                            </td>
                            <td class="w-date">{{$data['ReplyRegDatm']}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(empty($data['AttachData']) === false)
                            <tr>
                                <td class="w-file tx-left pl20" colspan="4">
                                    @foreach($data['AttachData'] as $row)
                                        @if($row['FileType'] == 1)
                                            <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="w-txt answer tx-left" colspan="4">
                                @if($data['ReplyStatusCcd'] == '621004')
                                    {!! $data['ReplyContent'] !!}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endif

                {{--@if($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx'))
                    <div class="search-Btn btnAuto90 h36 mt20 mb30 f_left">
                        <button type="button" class="mem-Btn bg-white bd-dark-gray" id="_btn_qna_del">
                            <span class="tx-purple-gray">삭제</span>
                        </button>
                    </div>
                    @if($data['ReplyStatusCcd'] != $reply_type_complete)
                        <div class="search-Btn btnAuto90 h36 mt20 mb30 f_left">
                            <button type="button" class="mem-Btn bg-white bd-dark-gray" id="_btn_qna_modify">
                                <span class="tx-purple-gray">수정</span>
                            </button>
                        </div>
                    @endif
                @endif--}}
                <div class="search-Btn mt20 mb30 h36">
                    @if($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx'))
                        <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="_btn_qna_del">
                            <span class="tx-purple-gray">삭제</span>
                        </button>
                        @if($data['ReplyStatusCcd'] != $reply_type_complete)
                            <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center" id="_btn_qna_modify">
                                <span class="tx-purple-gray">수정</span>
                            </button>
                        @endif
                    @endif
                    <button type="button" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right" id="_btn_qna_list">
                        <span>목록</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="_regi_form" name="_regi_form">
    {!! csrf_field() !!}
</form>

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

        $("#_btn_qna_modify").click(function () {
            var ele_id = 'WrapReply';
            var _url = '{{ front_url($default_path."/popupCreate") }}';
            var data = {
                'ele_id' : ele_id,
                's_cate_code' : '{{ element('s_cate_code', $arr_input) }}',
                's_prof_idx' : '{{ element('s_prof_idx', $arr_input) }}',
                's_subject_idx' : '{{ element('s_subject_idx', $arr_input) }}',
                'board_idx' : '{{$board_idx}}'
            };
            sendAjax(_url, data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block');
            }, showAlertError, false, 'GET', 'html');
        });

        $("#_btn_qna_del").click(function () {
            if (!confirm('삭제하시겠습니까?')) { return; }
            var _url = '{{ front_url($default_path.'/delete') }}';
            var data = {
                '{{ csrf_token_name() }}' : $_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'del_method_type' : 'ajax',
                'board_idx' : '{{$board_idx}}'
            };

            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('error', '알림', ret.ret_msg);
                    $("#_btn_qna_list").trigger("click");
                }
            }, showError, false, 'POST');
        });
    });
</script>