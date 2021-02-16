@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    온라인첨삭
                </div>
            </div>
        </div>

        <div class="willbes-Txt2">
            답안제출
            <div class="tx12 mt10">- 첨삭과제 학인</div>
        </div>

        <div class="paymentWrap">
            <div class="paymentCts">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    <tr>
                        <td class="tx14">{{ $data['Title'] }}</td>
                    </tr>
                    @if(empty($data['AttachData']) === false)
                    <tr class="flie">
                        <td class="w-file NGR">
                            @foreach($data['AttachData'] as $row)
                                <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$row['FileIdx'].'&attach_type=0&correct_idx='.$data['CorrectIdx'] }}" target="_blank">
                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    @endif
                    <tr class="txt">
                        <td class="w-txt NGR">{!! $data['Content'] !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <form id="regi_form_modal" name="regi_form_modal" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field($method) !!}
            <input type="hidden" name="prod_code" value="{{ $prod_code }}"/>
            <input type="hidden" name="correct_idx" value="{{ $correct_idx }}"/>
            <input type="hidden" name="cua_idx" value="{{ $data['CuaIdx'] }}"/>

            <div class="willbes-WriteBox pb20 mt20">
                <div class="tx14 mb10">- 답안작성</div>
                <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['temp_AnswerContent'] !!}</textarea>
                @for($i = 0; $i < 2; $i++)
                    <div class="filetype p_re mt10">
                        <input type="text" class="file-text"/>
                        <span class="file-btn reset-Btn width25p ml1p">파일찾기</span>
                        <span class="file-select"><input type="file" class="input-file" size="3" id="attach_file{{$i}}" name="attach_file[]"></span>
                        <input class="file-reset NSK" type="button" value="X" />
                    </div>
                @endfor
                @for($i = 0; $i < $attach_file_cnt; $i++)
                    @if(empty($data['AttachAssignmentData_User'][$i]) === false)
                        <div class="mt10">
                            <a href="{{front_url('/classroom/assignmentProduct/download?file_idx=').$data['AttachAssignmentData_User'][$i]['FileIdx'].'&attach_type=1' }}" target="_blank">
                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$data['AttachAssignmentData_User'][$i]['RealName']}}
                            </a>
                        </div>
                    @endif
                @endfor

                <div class="tx-gray mt20 lh1_3">
                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
                    • pdf 만 등록 가능합니다.
                </div>
            </div>
        </form>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>

        <div id="Fixbtn" class="Fixbtn two">
            <ul>
                <li class="btn_blue"><a href="javascript:;" id="btn_save">제출하기</a></li>
                <li class="btn_gray"><a href="javascript:;" onclick="history.back(-1);">취소</a></li>
            </ul>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>

    <script type="text/javascript">
        var $regi_form_modal = $('#regi_form_modal');
        $(document).ready(function() {
            //editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.templateType = 'mobile';
            $editor_profile.config.useSource = false;
            $editor_profile.config.usePreview = false;
            $editor_profile.config.useFullScreen = false;
            $editor_profile.config.editorHeight = '200px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'board_content';
            $editor_profile.run();

            $('#btn_save').click(function() {
                if (!confirm('답안제출 하시겠습니까?')) {
                    return;
                }
                getEditorBodyContent($editor_profile);
                var _url = '{{front_url('/classroom/assignmentProduct/store')}}';
                ajaxSubmit($regi_form_modal, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.href = "{{ front_url("/classroom/assignmentProduct?prod_code=") }}" + $regi_form_modal.find('input[name="prod_code"]').val();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function () {
                var file = true;
                $("input[name='attach_file[]']").each(function(index) {
                    if ($("#attach_file"+index).val() != "") {
                        var ext = $('#attach_file'+index).val().split('.').pop().toLowerCase();
                        if ($.inArray(ext, ['pdf']) == -1) {
                            file = false;
                        }
                    }
                });

                if (file == false) {
                    alert('pdf 파일만 업로드 할 수 있습니다.');
                    return false;
                }
                return true;
            }
        });
    </script>
@stop