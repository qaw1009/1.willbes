<div class="mt30">
    <table class="tableTypeA">
        <col width=""/>
        <col width="30%"/>
        <tbody>
        <tr>
            <th colspan="2" class="tx-left">{{$data['Title']}}</th>
        </tr>
        <tr>
            <th class="tx-left">{{$data['TypeCcd_Name']}}
                <span class="row-line">|</span> {{$data['SubjectName']}}
                <span class="row-line">|</span> {{$data['ProdName']}}
            </th>
            <th class="tx-right normal">
                {!! $data['RegMemIdx'] == sess_data('mem_idx') ? $data['RegName'] : hpSubString($data['RegName'],0,2,'*') !!}
                <span class="ml10 mr10">|</span> {{$data['RegDatm']}}
            </th>
        </tr>

        @if(empty($data['AttachData']) === false)
            @foreach($data['AttachData'] as $row)
                @if($row['FileType'] == 0)
                    <tr>
                        <td colspan="2" class="tx-left">
                            <a href="{{front_url('/supporters/qna/download?file_idx=').$row['FileIdx'].'&attach_type=0&board_idx='.$board_idx }}" target="_blank">
                                {{$row['RealName']}} <img src="{{ img_url('prof/icon_file.gif') }}" alt="첨부파일"></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif

        <tr>
            <td colspan="2" class="tx-left">
                {!! nl2br($data['Content']) !!}
            </td>
        </tr>
        </tbody>
    </table>
    {{--답변--}}
    @if($data['RegType'] == 0 && $data['ReplyStatusCcd'] == $reply_type_complete)
        <table class="tableTypeA">
            <col width=""/>
            <col width="20%"/>
            <tbody>
            <tr>
                <td class="tx-left">
                    @if($data['ReplyStatusCcd'] == '621004')
                        <span class="aBox workBox3">답변완료</span>
                    @else
                        <span class="aBox workBox4">답변대기</span>
                    @endif
                </td>
                <td class="tx-right normal">{{$data['ReplyRegDatm']}}</td>
            </tr>
            @if(empty($data['AttachData']) === false)
                @foreach($data['AttachData'] as $row)
                    @if($row['FileType'] == 1)
                        <tr>
                            <td colspan="2" class="tx-left">
                                <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                    {{$row['RealName']}} <img src="{{ img_url('prof/icon_file.gif') }}" alt="첨부파일"></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
            <tr>
                <td colspan="2" class="tx-left">
                    @if($data['ReplyStatusCcd'] == '621004')
                        {!! $data['ReplyContent'] !!}
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    @endif
</div>
<div class="search-Btn mt20 h36 p_re">
    @if($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx'))
        @if($data['ReplyStatusCcd'] == $reply_type_complete)
            <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                <a href="javascript:void(0);" class="tx-purple-gray" id="_btn_qna_del_forShow">삭제</a>
            </div>
        @else
            <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                <a href="javascript:void(0);" class="tx-purple-gray" id="_btn_qna_del_forShow">삭제</a>
            </div>
            <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                <a href="javascript:void(0);" class="tx-purple-gray" id="_btn_qna_modify_forShow">수정</a>
            </div>
        @endif
    @endif
    <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
        <a href="javascript:void(0);" id="_btn_qna_list_forShow">목록</a>
    </div>
</div>

<form id="_qna_show_form" name="_qna_show_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
</form>

<script type="text/javascript">
    var $_qna_show_form = $("#_qna_show_form");

    $(document).ready(function(){
        //목록
        $('#_btn_qna_list_forShow').click(function () {
            $('#qna_show').hide();
            $('#qna_list').show();
            qnaCallAjax(1);
        });

        //수정
        $('#_btn_qna_modify_forShow').click(function () {
            $('#qna_show').hide();
            $('#qna_create').show();

            var data = {'board_idx' : '{{ $board_idx }}', 'supporters_idx' : '{{ $supporters_idx }}'};
            sendAjax('{{ front_url('/supporters/qna/create') }}', data, function(ret) {
                $('#qna_create').html(ret);
            }, showAlertError, false, 'GET', 'html');
        });

        //삭제
        $('#_btn_qna_del_forShow').click(function() {
            if (!confirm('삭제하시겠습니까?')) { return; }
            var _url = '{{ front_url("/supporters/qna/delete/") }}';
            var data = {
                '{{ csrf_token_name() }}' : $_qna_show_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'board_idx' : '{{ $board_idx }}'
            };
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $('#qna_show').hide();
                    $('#qna_list').show();
                    qnaCallAjax(1);
                }
            }, showError, false, 'POST');
        });
    });
</script>