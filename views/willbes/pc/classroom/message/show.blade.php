<form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" name="send_idx" value="{{element('send_idx', $arr_input)}}">
</form>

<div id="MEMOPASS" class="willbes-Layer-Black" style="display: block">
    <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h590 fix of-hidden">
        <a class="closeBtn" href="#none" onclick="closeWin('{{ $arr_input['ele_id'] }}');">
            <img src="{{ img_url('sub/close.png') }}">
        </a>
        <div class="Layer-Tit tx-dark-black NG">쪽지</div>

        <div class="lecMoreWrap">
            <div class="PASSZONE-List widthAutoFull LeclistTable Memolist">
                <table cellspacing="0" cellpadding="0" class="listTable userMemoTable under-gray bdt-gray tx-gray GM">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit">과정</th>
                        <td class="w-list">{{$data['SiteName']}}</td>
                        <th class="w-tit">발송일</th>
                        <td class="w-list">{{$data['RegDatm']}}</td>
                    </tr>
                    <tr>
                        <th class="w-tit">확인일</th>
                        <td class="w-list" colspan="3">{{$data['RcvDatm']}}</td>
                    </tr>
                    <tr>
                        <th class="w-tit" rowspan="2">내용</th>
                        <td class="w-list w-file" colspan="3">
                            @if(empty($data['AttachData']) === false)
                                <a href="{{site_url('/classroom/message/download?').'send_idx='.$data['SendIdx']}}" target="_blank">
                                    {{$data['SendAttachRealFileName']}}</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="w-list w-content" colspan="3">
                            {!! nl2br($data['Content']) !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="w-btn">
                    <a class="answerBox_block NSK btn-delete" href="#none">삭제</a>
                </div>
            </div>
            <!-- PASSZONE-List -->
        </div>
    </div>
</div>

<script type="text/javascript">
    var $_regi_form = $('#_regi_form');

    $(document).ready(function() {
        $('.btn-delete').click(function () {
            var _url = '{{ site_url('/classroom/message/delete') }}';
            var data = {
                '{{ csrf_token_name() }}' : $_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                'send_idx' : $_regi_form.find('input[name="send_idx"]').val()
            };
            if (!confirm('삭제된 쪽지는 복원이 불가능합니다. 쪽지를 삭제 하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showAlertError, false, 'POST');
        });
    });
</script>