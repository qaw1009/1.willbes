@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h920 fix" style="display: block">
<form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="idx" value="{{ $board_idx }}"/>
    <input type="hidden" name="ba_idx" value="{{ $data['am_BaIdx'] }}"/>
    <input type="hidden" name="save_type">

    <a class="closeBtn" href="#none" onclick="closeWin('EDITPASS')">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black">과제제출</div>
    <div class="Layer-Cont">
        <ul class="passzoneInfo tx-gray NGR mt20 mb20">
            <li>· 모든 답안이 완료된 후 [제출하기] 버튼을 눌러 답안을 제출할 수 있습니다.</li>
            <li>· [임시저장] 은 과제 제출이 완료된 상황이 아니므로, 교수님 채점이 불가합니다.</li>
            <li>· 답안제출 이후에는 답안을 수정할 수 없습니다.</li>
        </ul>
        <div class="PASSZONE-Lec-Section">
            <div class="LeclistTable editTableList editTableList-overflow">
                <div class="Search-Result strong mt10 mb20 tx-gray">· 과제확인</div>
                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                    <colgroup>
                        <col style="width: 115px;">
                        <col style="width: 585px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit bg-light-white strong">과제제목</th>
                        <td class="w-data tx-left tx-gray pl15">
                            {{$data['Title']}}
                            <span class="MoreBtn"><a class="arrow" href="#none"><span class="txt">열기</span> <span class="arrow-Btn">></span></a></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit bg-light-white strong">과제첨부</th>
                        <td class="w-file tx-left pt-zero pb-zero">
                            <ul class="up-file">
                                @if(empty($data['AttachData']) === false)
                                    @foreach($data['AttachData'] as $row)
                                        <li>
                                            <a href="{{front_url('/classroom/assignment/download?file_idx=').$row['FileIdx'].'&attach_type=0&board_idx='.$data['BoardIdx'] }}" target="_blank">
                                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                    </tr>
                    <tr class="editCont" style="display: none;">
                        <th class="w-tit bg-light-white strong">과제내용</th>
                        <td class="w-file tx-left pl15">
                            {!! $data['Content'] !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="Search-Result strong mt30 mb20 tx-gray">· 답안작성</div>
                <div class="EditWriteTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                        <colgroup>
                            <col style="width: 115px;">
                            <col style="width: 585px;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">답안제목<span class="tx-red">(*)</span></td>
                            <td class="w-text tx-left pl10 pr10">
                                <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="50" value="{{$data['temp_Title']}}">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">답안내용<span class="tx-red">(*)</span></td>
                            <td class="w-textarea write tx-left pl10 pr10">
                                <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['temp_Content'] !!}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">답안첨부</td>
                            <td class="w-file answer tx-left">
                                <ul class="attach">
                                    @for($i = 0; $i < $attach_file_cnt; $i++)
                                        <li>
                                            <div class="filetype">
                                                <!--input type="text" class="file-text" />
                                                <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                <span class="file-select"-->
                                                    <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3">
                                                <!--/span>
                                                <input class="file-reset NSK" type="button" value="X" /-->
                                                @if(empty($data['AttachAssignmentData_User'][$i]) === false)
                                                    <span>
                                                        <a href="{{front_url('/classroom/assignment/download?file_idx=').$data['AttachAssignmentData_User'][$i]['FileIdx'].'&attach_type=1' }}" target="_blank">
                                                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$data['AttachAssignmentData_User'][$i]['RealName']}}</a>
                                                    </span>
                                                @endif
                                            </div>
                                        </li>
                                    @endfor
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
                <div class="search-Btn mt20 h36 p_re">
                    <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left btn_save" data-save-type="{{$arr_save_type_ccd[0]}}">
                        <span class="tx-purple-gray">임시저장</span>
                    </button>
                    <button type="button" class="btnAuto90 h36 mem-Btn bg-blue bd-dark-blue center btn_save" data-save-type="{{$arr_save_type_ccd[1]}}">
                        <span>제출하기</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

<link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
<script src="/public/vendor/cheditor/cheditor.js"></script>
<script src="/public/js/editor_util.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        //editor load
        var $editor_profile = new cheditor();
        $editor_profile.config.editorHeight = '500px';
        $editor_profile.config.editorWidth = '100%';
        $editor_profile.inputForm = 'board_content';
        $editor_profile.run();

        $('.btn_save').click(function() {
            getEditorBodyContent($editor_profile);
            var save_type = $(this).data('save-type');
            var _url = '{{front_url('/classroom/assignment/store')}}';
            $regi_form.find('input[name="save_type"]').val(save_type);

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, addValidate, false, 'alert');
        });
        var addValidate = function () {
            if($regi_form.find('input[name="board_title"]').val == '') {
                alert('답안제목을 입력해 주세요.');
                return false;
            }
            return true;
        }
    });
</script>
@stop