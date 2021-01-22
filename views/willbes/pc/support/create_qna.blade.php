@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="subContainer widthAuto c_both">
    @if (empty($__cfg['TabMenu']) === true)
        @include('willbes.pc.layouts.partial.site_menu')
    @else
        @include('willbes.pc.layouts.partial.site_tab_menu')
    @endif
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <!-- Write -->
        <div class="willbes-Leclist mt40 c_both">
            <div class="LecWriteTable">
                <form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $board_idx }}"/>
                    <input type="hidden" name="reg_type" value="{{$reg_type}}"/>
                    <input type="hidden" name="put_site_code" value="{{($method=='PUT') ? $data['SiteCode'] : $__cfg['SiteCode']}}"/>

                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 820px;">
                        </colgroup>
                        <tbody>
                        <tr class="{{$arr_swich['cate'] or ''}}">
                            <td class="w-tit bg-light-white tx-left strong pl30">과정선택<span class="tx-light-blue">(*)</span></td>
                            <td class="w-selected tx-left pl30">
                                <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess" style="width: 250px;" @if($__cfg['SiteCode'] != config_item('app_intg_site_code') || $method == 'PUT') disabled @endif>
                                    <option value="">과정선택</option>
                                    @foreach($arr_base['site_list'] as $key => $val)
                                        <option value="{{$key}}" @if($data['SiteCode'] == $key || $__cfg['SiteCode'] == $key)selected="selected"@endif>{{$val}}</option>
                                    @endforeach
                                </select>

                                <select id="s_cate_code" name="s_cate_code" title="구분" class="seleDiv" style="width: 250px;" @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y') disabled @endif>
                                    <option value="">구분</option>
                                    @php $temp_s_cate_code = ''; @endphp
                                    @foreach($arr_base['category'] as $row)
                                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if($data['Category_String'] == $row['CateCode'] || (empty(element('s_cate_code', $arr_input)) === false && element('s_cate_code', $arr_input) == $row['CateCode']) || (empty(element('on_off_link_cate_code', $arr_input)) === false && element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode']))selected="selected"@endif @if((empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) || empty($arr_swich['cate']) === false) disabled @endif>{{$row['CateNameRoute']}}</option>
                                        @php if($data['Category_String'] == $row['CateCode'] || (empty(element('s_cate_code', $arr_input)) === false && element('s_cate_code', $arr_input) == $row['CateCode']) || (empty(element('on_off_link_cate_code', $arr_input)) === false && element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode'])) $temp_s_cate_code = $row['CateCode']; @endphp
                                    @endforeach
                                </select>
                                @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y')
                                    <input type="hidden" name="s_cate_code" value="{{$temp_s_cate_code}}">
                                @endif

                                <select class="form-control" id="s_subject_idx" name="s_subject_idx" class="seleCampus" style="width: 250px;" title="과목명" required="required" @if($method == 'POST') disabled="disabled" @endif>
                                    <option value="">과목</option>
                                    @foreach($arr_base['subject'] as $arr)
                                        @if(empty($arr) === false)
                                            @foreach($arr as $row)
                                                <option value="{{$row['SubjectIdx']}}" class="{{$row['CateCode']}}" @if($data['SubjectIdx'] == $row['SubjectIdx'] || element('s_subject_idx',$arr_input) == $row['SubjectIdx'])selected="selected"@endif>{{$row['SubjectName']}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>

                                <select id="s_campus" name="s_campus" title="캠퍼스" class="seleCampus d_none" style="width: 250px;">
                                    <option value="">캠퍼스 선택</option>
                                    @foreach($arr_base['campus'] as $row)
                                        <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" @if($data['CampusCcd'] == $row['CampusCcd'] || element('s_campus',$arr_input) == $row['CampusCcd'])selected="selected"@endif>{{$row['CcdName']}}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>
                        <tr class="{{$arr_swich['consult_type'] or ''}}">
                            <td class="w-tit bg-light-white tx-left strong pl30">상담유형<span class="tx-light-blue">(*)</span></td>
                            <td class="w-selected full tx-left pl30" colspan="3">
                                <select id="s_consult_type" name="s_consult_type" title="상담유형" class="seleLecA">
                                    <option value="">상담 유형 선택</option>
                                    @foreach($arr_base['consult_type'] as $key => $val)
                                        <option value="{{$key}}" @if($data['TypeCcd'] == $key || (empty(element($arr_swich['default_consult_type'],$arr_base['consult_type'])) === false && element($arr_swich['default_consult_type'],$arr_base['consult_type']) == $val))selected="selected"@endif>{{$val}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">공개여부</td>
                            <td class="w-radio tx-left pl30" colspan="3">
                                <ul>
                                    @if ($arr_base['public_type'] === true)
                                        <li id="public_type_y"><input type="radio" id="is_public_y" name="is_public" class="goods_chk" value="Y" @if($data['IsPublic']=='Y')checked="checked"@endif><label>공개</label></li>
                                        <li><input type="radio" id="is_public_n" name="is_public" class="goods_chk" value="N" @if($method == 'POST' || $data['IsPublic']=='N')checked="checked"@endif><label>비공개</label></li>
                                    @else
                                        <li><input type="radio" name="is_public" class="goods_chk" id="is_public_n_2" value="N" checked="checked"><label>비공개</label></li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                            <td class="w-text tx-left pl30" colspan="3">
                                <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="{{$data['Title']}}">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                            <td class="w-textarea write tx-left pl30" colspan="3">
                                <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                            @if(empty($arr_swich['file_ver']) === false &&  $arr_swich['file_ver'] == 1)
                                <td class="w-file answer tx-left" colspan="4">
                                    <ul class="attach">
                                        @for($i = 0; $i < $attach_file_cnt; $i++)
                                            <li>
                                                <!--div class="filetype"-->
                                                <!--input type="text" class="file-text" />
                                                <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                <span class="file-select"-->
                                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3" onchange="chkUploadFile(this);">
                                                <!--/span>
                                                <input class="file-reset NSK" type="button" value="X" /-->
                                                @if(empty($data['AttachData'][$i]) === false)
                                                    <p class="">[ {{ $data['AttachData'][$i]['RealName'] }} ]
                                                        <a href="#none" class="file-delete" data-attach-idx="{{ $data['AttachData'][$i]['FileIdx']  }}">파일삭제</a>
                                                    </p>
                                                @endif
                                            <!--/div-->
                                            </li>
                                        @endfor
                                        <li>
                                            • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                            • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                        </li>
                                    </ul>
                                </td>
                            @else
                                <td class="w-file answer tx-left" colspan="4">
                                    <ul class="attach">
                                        <li>
                                            <div class="filetypeB">
                                                @if(empty($data['AttachData'][0]['RealName']) === false)
                                                    [ {{ $data['AttachData'][0]['RealName'] }} ]<br/>
                                                @endif
                                                <input type="file" name="attach_file[]" class="input-file" onchange="chkUploadFile(this);">
                                                <input class="file-reset NSK" type="button" value="+" onclick="addAttachFile()"/>
                                            </div>
                                        </li>
                                        @for($i = 1; $i < $attach_file_cnt - 1; $i++)
                                            @if(empty($data['AttachData'][$i]) === false)
                                                <li>
                                                    <div class="filetypeB">
                                                        [ {{ $data['AttachData'][$i]['RealName'] }} ]<br/>
                                                        <input type="file" name="attach_file[]" class="input-file" size="3" value="{{ $data['AttachData'][$i]['RealName'] }}" onchange="chkUploadFile(this);">
                                                        <input class="file-reset NSK file-delete" type="button" value="-" data-attach-idx="{{ $data['AttachData'][$i]['FileIdx'] }}"/>
                                                    </div>
                                                </li>
                                            @endif
                                        @endfor
                                        <li>
                                            • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                            • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                        </li>
                                    </ul>
                                </td>
                            @endif
                        </tr>
                        </tbody>
                    </table>

                <div class="search-Btn mt20 h36 p_re">
                    <button type="button" id="btn_list" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                        <span class="tx-purple-gray">취소</span>
                    </button>
                    <button type="submit" id="btn_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                        <span>저장</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {!! banner('고객센터_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
</div>

<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        @if(empty(element('s_cate_code_disabled', $arr_input)) === true || element('s_cate_code_disabled', $arr_input) != 'Y')
            $regi_form.find('select[name="s_cate_code"]').chained("#s_site_code");
        @endif
        $regi_form.find('select[name="s_subject_idx"]').chained("#s_cate_code");

        $('#s_site_code').on('change', function () {
            if ($(this).val() == '2017' || $(this).val() == '2018') {
                $('#public_type_y').hide();
                $("input:radio[id='is_public_y']:radio[value='Y']").prop('checked', false);
                $("input:radio[id='is_public_n']:radio[value='N']").prop('checked', true);
            } else {
                $('#public_type_y').show();
            }
        });

        $('#btn_list').click(function() {
            location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
        });

        $('.file-delete').click(function() {
            var attach_idx = $(this).data('attach-idx');
            var _url = '{{ front_url("{$default_path}/destroyFile/?".$get_params) }}';
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'attach_idx' : attach_idx
            };
            if (!confirm('정말로 삭제하시겠습니까?')) {
                return;
            }

            if(attach_idx){
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showError, false, 'POST');
            }

            @if(empty($arr_swich['file_ver']) === true)
                removeAttachFile($(this));
            @else
                location.reload();
            @endif
        });

        $regi_form.submit(function() {
            var _url = '{!! front_url($default_path.'/store?'.$get_params) !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        function addValidate() {
            var is_public = $(":input:radio[name=is_public]:checked").length;

            if ($('#s_site_code').val() == '') {
                alert('과정을 선택해 주세요.');
                return false;
            }

            if ($('#s_consult_type').val() == '') {
                alert('상담유형을 선택해 주세요.');
                return false;
            }

            if (is_public < 1) {
                alert('공개여부를 선택해 주세요.');
                return false;
            }

            if ($('#board_title').val() == '') {
                alert('제목을 입력해 주세요.');
                return false;
            }

            if ($('#board_content').val() == '') {
                alert('내용을 입력해 주세요.');
                return false;
            }
            return true;
        }
    });

    function addAttachFile(){
        var html = '';
        var file_length = $(".attach li .filetypeB").length;
        var file_max_cnt = '{{ $attach_file_cnt - 1}}';

        if(file_length > file_max_cnt){
            alert('첨부파일 영역 최대 ' + file_max_cnt + '개까지 추가 가능합니다.');
            return ;
        }else{
            html += '<li>';
            html += '<div class="filetypeB">';
            html += '<input type="file" name="attach_file[]" class="input-file" onchange="chkUploadFile(this);"> ';
            html += '<input class="file-reset NSK" type="button" value="-" onclick="removeAttachFile(this)"/>';
            html += '</div>';
            html += '</li>';
            $(".attach li:last").before(html);
        }
    }

    function removeAttachFile(obj){
        $(obj).closest("li").remove();
    }

    function chkUploadFile(elem){
        if($(elem).val()){
            var filename =  $(elem).prop("files")[0].name;
            var ext = filename.split('.').pop().toLowerCase();
            if($.inArray(ext, ['hwp', 'doc', 'pdf', 'jpg', 'gif', 'png', 'zip']) == -1) {
                $(elem).val("");
                alert('hwp, doc, pdf, jpg, gif, png, zip 만 업로드 가능합니다.');
            }
        }
    }
</script>
<!-- End Container -->
@stop