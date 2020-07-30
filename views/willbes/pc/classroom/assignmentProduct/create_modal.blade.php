<a class="closeBtn" href="#none" onclick="closeWin('assignmentCreateChoice')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">온라인 첨삭</div>

<div class=" lookover-cont">
    <form id="regi_form_modal" name="regi_form_modal" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="prod_code" value="{{ $prod_code }}"/>
        <input type="hidden" name="correct_idx" value="{{ $correct_idx }}"/>
        <input type="hidden" name="cua_idx" value="{{ $data['CuaIdx'] }}"/>

        <div class="mt20 tx14 NG">· 답안제출</div>
        <div class="mt10 NG"> - 첨삭과제 확인</div>
        <div class="Layer-Cont lookover-cont">
            <div class="lookoverList mt20">
                <table class="lookoverTable">
                    <colgroup>
                        <col width="150px"/>
                        <col/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th>회차명</th>
                        <td class="tx-left"> {{ $data['Title'] }}</td>
                    </tr>
                    <tr>
                        <th>첨부파일</th>
                        <td class="tx-left">
                            <ul class="up-file">
                                @if(empty($data['AttachData']) === false)
                                    @foreach($data['AttachData'] as $row)
                                        <li>
                                            <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$row['FileIdx'].'&attach_type=0&correct_idx='.$data['CorrectIdx'] }}" target="_blank">
                                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td class="tx-left">{!! $data['Content'] !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt40 NG"> - 답안작성</div>
        <div class="Layer-Cont">
            <div class="lookoverList mt20">
                <table class="lookoverTable">
                    <colgroup>
                        <col width="150px"/>
                        <col/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th>답안내용<span class="tx-red">(*)</span></th>
                        <td class="tx-left">
                            <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['AnswerContent'] !!}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>답안첨부<span class="tx-red">(*)</span></th>
                        <td class="tx-left">
                            <ul class="up-file">
                                @for($i = 0; $i < $attach_file_cnt; $i++)
                                    <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3">
                                    @if(empty($data['AttachAssignmentData_User'][$i]) === false)
                                        <span>
                                            <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$data['AttachAssignmentData_User'][$i]['FileIdx'].'&attach_type=1' }}" target="_blank">
                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$data['AttachAssignmentData_User'][$i]['RealName']}}</a>
                                        </span>
                                    @endif
                                @endfor
                                {{--<li><input type="file" class="input-file" size="3"></li>
                                <li><input type="file" class="input-file" size="3"></li>--}}

                                <li>
                                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="search-Btn mt20 h36 p_re mb20">
                <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="btn_close">
                    <span class="tx-purple-gray">취소</span>
                </button>
                <button class="btnAuto90 h36 mem-Btn bg-blue bd-dark-blue center" id="btn_save">
                    <span>제출하기</span>
                </button>
                <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right" id="btn_list_assignment">
                    <span class="tx-purple-gray">목록</span>
                </button>
            </div>
        </div>
    </form>
</div>

<link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
<script src="/public/vendor/cheditor/cheditor.js"></script>
<script src="/public/js/editor_util.js"></script>
<script type="text/javascript">
    var $regi_form_modal = $('#regi_form_modal');

    $(document).ready(function() {
        //editor load
        var $editor_profile = new cheditor();
        $editor_profile.config.editorHeight = '200px';
        $editor_profile.config.editorWidth = '100%';
        $editor_profile.inputForm = 'board_content';
        $editor_profile.run();

        $('#btn_close').on('click', function () {
            closeWin('assignmentCreateChoice');
        });
        $('#btn_list_assignment').on('click', function () {
            closeWin('assignmentCreateChoice');
            assignmentBoardModal('{{ $prod_code }}');
        });

        $('#btn_save').click(function() {
            if (!confirm('답안제출 하시겠습니까?')) {
                return;
            }

            getEditorBodyContent($editor_profile);
            var _url = '{{front_url('/classroom/assignmentProduct/store')}}';

            ajaxSubmit($regi_form_modal, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    closeWin('assignmentCreateChoice');
                    assignmentBoardModal('{{ $prod_code }}');
                }
            }, showValidateError, addValidate, false, 'alert');
        });
        var addValidate = function () {
            /*if($regi_form_modal.find('input[name="board_title"]').val == '') {
                alert('답안제목을 입력해 주세요.');
                return false;
            }*/
            return true;
        }
    });
</script>