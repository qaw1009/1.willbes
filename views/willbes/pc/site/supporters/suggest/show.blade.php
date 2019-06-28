<form id="suggest_regi_form" name="suggest_regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <div class="mt30">
        <table class="tableTypeA">
            <col width="15%"/>
            <col width=""/>
            <tbody>
            <tr>
                <th class="tx-left">{{ $data['Title'] }}</th>
            </tr>
            <tr>
                <th class="tx-right normal">
                    {!! $data['RegMemIdx'] == sess_data('mem_idx') ? $data['RegName'] : hpSubString($data['RegName'],0,2,'*') !!}
                    <span class="ml10 mr10">|</span> {{$data['RegDatm']}}
                </th>
            </tr>
            @if(empty($data['AttachData']) === false)
            <tr>
                <td class="tx-left">
                    @foreach($data['AttachData'] as $row)
                        @if($row['FileType'] == 0)
                            <a href="{{front_url('/supporters/suggest/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                        @endif
                    @endforeach
                </td>
            </tr>
            @endif
            <tr>
                <td class="tx-left">
                    {!! nl2br($data['Content']) !!}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="search-Btn mt20 h36 p_re">
        @if ($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx'))
            <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="btn_del">
                <a href="#none" class="tx-purple-gray">삭제</a>
            </div>
            <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center" id="btn_modify">
                <a href="#none" class="tx-purple-gray">수정</a>
            </div>
        @endif
        <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right btn-suggest-list">
            <a href="#none">목록</a>
        </div>
    </div>
</form>

<script type="text/javascript">
    var $suggest_regi_form = $('#suggest_regi_form');
    $(document).ready(function(){
        $('.btn-suggest-list').click(function () {
            $('#suggest_show').hide();
            $('#suggest_list').show();
            Main_SuggestListAjax(1);
        });

        $('#btn_modify').click(function () {
            $('#suggest_show').hide();
            $('#suggest_create').show();

            var data = {'board_idx' : '{{ $board_idx }}', 'supporters_idx' : '{{ $supporters_idx }}'};
            sendAjax('{{ front_url('/supporters/suggest/create') }}', data, function(ret) {
                $('#suggest_create').html(ret);
            }, showAlertError, false, 'GET', 'html');
        });

        //삭제
        $('#btn_del').click(function() {
            if (!confirm('삭제하시겠습니까?')) { return; }
            var _url = '{{ front_url("/supporters/suggest/delete/") }}';
            var data = {
                '{{ csrf_token_name() }}' : $suggest_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'board_idx' : '{{ $board_idx }}'
            };
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $('#suggest_show').hide();
                    $('#suggest_list').show();
                    Main_SuggestListAjax(1);
                }
            }, showError, false, 'POST');
        });
    });
</script>