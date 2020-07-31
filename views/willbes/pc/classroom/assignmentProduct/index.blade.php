<a class="closeBtn" href="#none" onclick="closeWin('assignmentListChoice')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">온라인 첨삭</div>

<div class=" lookover-cont">
    <form name="assignmentForm" id="assignmentForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="prod_code" id="prod_code" value="{{ element('prod_code', $form_data) }}" />
        <input type="hidden" name="correct_idx" id="correct_idx" value="">
        <input type="hidden" name="cua_idx" id="cua_idx" value="">
        <input type="hidden" name="edit_id" id="edit_id" value="">
    </form>
    <div class="mt20 tx14 NG">· 답안제출 및 채점결과 보기</div>
    <div class="Layer-Cont">
        <ul class="lookoverInfo tx-gray NGR mt20 mb20">
            <li class="sTit">- 제출상태</li>
            <li><span class="stbox stbox-red mr10">답안제출</span> ‘답안제출’을 클릭하여 첨삭과제를 확인하고 답안을 제출하세요.</li>
            <li><span class="stbox stbox-blue mr10">답안수정</span> 첨삭 체출을 완료했으나 답안수정이 필요한 경우 제출기간 내에 답안 수정이 가능합니다.</li>
            <li class="sTit mt20">- 채점상태</li>
            <li><span class="stbox stbox-blue-line mr10">채점중</span> 제출기간이 지나면 채점이 진행됩니다. 채점은 2-3일 소요됩니다.＇채점중'을 클릭하여 제출한 답안을 확인할 수 있습니다.</li>
            <li><span class="stbox stbox-333-line mr10">채점완료</span> 채점이 완료되었습니다. '채점완료'를 클릭하여 채점 결과를 확인하세요.</li>
        </ul>
        <div class="mt20 tx14 NG">2018 [지방직/서울시] 정채영 국어 필살모고</div>
        <div class="lookoverList mt20">
            <table class="lookoverTable">
                <colgroup>
                    <col width="50px"/>
                    <col/>
                    <col width="100px"/>
                    <col width="200px"/>
                    <col width="100px"/>
                    <col width="100px"/>
                    <col width="100px"/>
                    <col width="100px"/>
                </colgroup>
                <thead>
                <tr>
                    <th>NO</th>
                    <th>회차명</th>
                    <th>첨부파일</th>
                    <th>제출기간</th>
                    <th>제출상태</th>
                    <th>제출일</th>
                    <th>채점상태</th>
                    <th>채점일</th>
                </tr>
                </thead>
                <tbody>
                @if (empty($list) === true)
                    <tr>
                        <td colspan="8">등록된 게시글이 없습니다.</td>
                    </tr>
                @else
                    @foreach($list as $row)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $row['Title'] }}</td>
                            <td>
                                @if (empty($row['AttachFileName']) === false)
                                    <img src="https://www.local.willbes.net/public/img/willbes/prof/icon_file.gif"/>
                                @endif
                            </td>
                            <td>{{ $row['StartDate'] }} ~ {{ $row['EndDate'] }}</td>
                            <td>
                                @if(str_replace('-','',$row['StartDate']) > date('Ymd'))
                                    -
                                @elseif(str_replace('-','',$row['StartDate']) <= date('Ymd') && str_replace('-','',$row['EndDate']) >= date('Ymd'))
                                    @if (empty($row['CuaIdx']) === true)
                                        <a href="#none"><span class="stbox stbox-red btn-create-assignment" data-correct-idx="{{ $row['CorrectIdx'] }}">답안제출</span></a>
                                    @else
                                        <a href="#none"><span class="stbox stbox-blue btn-create-assignment" data-correct-idx="{{ $row['CorrectIdx'] }}" data-cua-idx="{{ $row['CuaIdx'] }}">답안수정</span></a>
                                    @endif
                                @elseif(str_replace('-','',$row['EndDate']) < date('Ymd'))
                                    @if (empty($row['CuaIdx']) === true || $row['AssignmentStatusCcd'] == $arr_save_type_ccd[0])
                                        <span class="stbox stbox-red-txt">미제출</span>
                                    @else
                                        <span class="stbox stbox-blue-txt">제출완료</span>
                                    @endif
                                @endif
                            </td>
                            <td>{{ $row['RegDatm'] }}</td>
                            <td>
                                @if(empty($row['CuaIdx']) === false && $row['AssignmentStatusCcd'] != $arr_save_type_ccd[0])
                                    @if($row['IsReply'] == 'Y')
                                        <a href="#none"><span class="stbox stbox-333-line btn-show-assignment" data-edit-id="3" data-correct-idx="{{ $row['CorrectIdx'] }}" data-cua-idx="{{ $row['CuaIdx'] }}">채점완료</span></a>
                                    @else
                                        <a href="#none"><span class="stbox stbox-blue-line btn-show-assignment" data-edit-id="2" data-correct-idx="{{ $row['CorrectIdx'] }}" data-cua-idx="{{ $row['CuaIdx'] }}">채점중</span></a>
                                    @endif
                                @else - @endif
                            </td>
                            <td>
                                @if(empty($row['CuaIdx']) === false && $row['AssignmentStatusCcd'] != $arr_save_type_ccd[0])
                                    @if($row['IsReply'] == 'Y')
                                        {{ $row['ReplyRegDatm'] }}
                                    @else - @endif
                                @else - @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-create-assignment').on('click', function () {
            closeWin('assignmentListChoice');

            $('#correct_idx').val($(this).data('correct-idx'));
            $('#cua_idx').val($(this).data('cua-idx'));

            var url = "{{ site_url("/classroom/assignmentProduct/createModal/") }}";
            var data = $('#assignmentForm').serialize();
            sendAjax(url,
                data,
                function(d){
                    $("#assignmentCreateChoice").html(d).end();
                    openWin('assignmentCreateChoice');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'POST', 'html');
        });

        $('.btn-show-assignment').on('click', function () {
            closeWin('assignmentListChoice');

            $('#correct_idx').val($(this).data('correct-idx'));
            $('#edit_id').val($(this).data('edit-id'));
            $('#cua_idx').val($(this).data('cua-idx'));

            var url = "{{ site_url("/classroom/assignmentProduct/showModal/") }}";
            var data = $('#assignmentForm').serialize();
            sendAjax(url,
                data,
                function(d){
                    $("#assignmentCreateChoice").html(d).end();
                    openWin('assignmentCreateChoice');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'POST', 'html');
        });
    });
</script>