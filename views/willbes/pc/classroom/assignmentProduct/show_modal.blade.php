<a class="closeBtn" href="#none" onclick="closeWin('assignmentCreateChoice')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">온라인 첨삭</div>

<div class=" lookover-cont">
    <div class="mt20 tx14 NG">· 채점결과</div>
    <div class="Layer-Cont">
        <div class="PASSZONE-Lec-Section">
            <div class="LeclistTable editTableList mt20">
                <table cellspacing="0" cellpadding="0" class="listTable editTable bdt-gray bdb-gray upper-gray fc-bd-none tx-gray">
                    <colgroup>
                        <col style="width: 115px;">
                        <col style="width: 235px;">
                        <col style="width: 115px;">
                        <col style="width: 235px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit bg-light-white strong">회차명</th>
                        <td class="w-data tx-left pl15">{{$data['Title']}}</td>
                        <th class="w-tit bg-light-white strong">점수</th>
                        <td class="w-data tx-left pl15">{{$data['ReplyScore']}}</td>
                    </tr>
                    <tr>
                        <th class="w-tit bg-light-white strong">제출일</th>
                        <td class="w-data tx-left pl15">{{$data['RegDatm']}}</td>
                        <th class="w-tit bg-light-white strong">채점일</th>
                        <td class="w-data tx-left pl15">{{$data['ReplyRegDatm']}}</td>
                    </tr>
                    </tbody>
                </table>

                <div class="editDetailWrap p_re mt30 mb60">
                    <ul class="tabWrap tabDepth2">
                        <li><a id="edit1" class="s_tab {{ ($edit_id == 1) ? 'on' : '' }}" data-active-id="1">과제보기</a></li>
                        <li><a id="edit2" class="s_tab {{ ($edit_id == 2) ? 'on' : '' }}" data-active-id="2">작성답안</a></li>
                        <li><a id="edit3" class="s_tab {{ ($edit_id == 3) ? 'on' : '' }}" data-active-id="3">채점결과</a></li>
                    </ul>
                    <div class="tabBox mt30">
                        <div id="ch1" class="tabLink" style="display: none;">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 100%;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero">
                                        <ul class="up-file">
                                            @if(empty($data['AttachData']) === false)
                                                @foreach($data['AttachData'] as $row)
                                                    <li>
                                                        <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$row['FileIdx'].'&attach_type=0' }}" target="_blank">
                                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30">
                                        {!! $data['Content'] !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn mt20 h36 p_re mb20">
                                <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right btn-list-assignment">
                                    <span class="tx-purple-gray">목록</span>
                                </button>
                            </div>
                        </div>

                        <div id="ch2" class="tabLink" style="display: none;">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 550px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                        <ul class="up-file">
                                            @if(empty($data['AttachAssignmentData_User']) === false)
                                                @foreach($data['AttachAssignmentData_User'] as $row)
                                                    <li>
                                                        <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$row['FileIdx'].'&attach_type=1' }}" target="_blank">
                                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                        {!! $data['AnswerContent'] !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn mt20 h36 p_re mb20">
                                <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right btn-list-assignment">
                                    <span class="tx-purple-gray">목록</span>
                                </button>
                            </div>
                        </div>

                        <div id="ch3" class="tabLink" style="display: none;">
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 550px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                        <ul class="up-file">
                                            @if(empty($data['AttachAssignmentData_User']) === false)
                                                @foreach($data['AttachAssignmentData_User'] as $row)
                                                    <li>
                                                        <a href="{{front_url('/classroom/assignment/download?file_idx=').$row['FileIdx'].'&attach_type=2' }}" target="_blank">
                                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                        {!! $data['ReplyContent'] !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 115px;">
                                    <col style="width: 585px;">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th class="w-tit bg-light-white strong">첨삭첨부</th>
                                    <td class="w-file tx-left pt-zero pb-zero">
                                        <ul class="up-file">
                                            @if(empty($data['AttachAssignmentData_Admin']) === false)
                                                @foreach($data['AttachAssignmentData_Admin'] as $row)
                                                    <li>
                                                        <a href="{{front_url('/classroom/assignment/download?file_idx=').$row['FileIdx'].'&attach_type=0' }}" target="_blank">
                                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn mt20 h36 p_re mb20">
                                <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right btn-list-assignment">
                                    <span class="tx-purple-gray">목록</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var edit_id = '{{$edit_id}}';
        $(function() {
            $('#ch'+edit_id).css('display', 'block');
            $('ul.tabWrap > li > a').on('click',function () {
                $('.s_tab').removeClass('on');
                $('.tabLink').css('display', 'none');
                $('#edit'+$(this).data("active-id")).addClass('on');
                $('#ch'+$(this).data("active-id")).css('display', 'block');
            });
        });

        $('.btn-list-assignment').on('click', function () {
            closeWin('assignmentCreateChoice');
            assignmentBoardModal('{{ $prod_code }}');
        });
    });
</script>