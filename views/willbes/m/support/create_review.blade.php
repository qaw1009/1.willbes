@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field($method) !!}
            <input type="hidden" name="idx" value="{{ $board_idx }}"/>
            <input type="hidden" name="reg_type" value="{{$reg_type}}"/>
            <input type="hidden" name="put_site_code" value="{{($method=='PUT') ? $data['SiteCode'] : $__cfg['SiteCode']}}"/>

            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>
                합격수기
            </div>
            <div class="willbes-Lec-Selected NG tx-gray">
                <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess width50p d_none" @if($__cfg['SiteCode'] != config_item('app_intg_site_code') || $method == 'PUT') disabled @endif>
                    <option value="">과정선택</option>
                    @foreach($arr_base['site_list'] as $key => $val)
                        <option value="{{$key}}" @if($data['SiteCode'] == $key || $__cfg['SiteCode'] == $key)selected="selected"@endif>{{$val}}</option>
                    @endforeach
                </select>

                <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleCate width50p" @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y') disabled @endif>
                    <option value="">카테고리선택</option>
                    @php $temp_s_cate_code = ''; @endphp
                    @foreach($arr_base['category'] as $row)
                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if($data['Category_String'] == $row['CateCode'])selected="selected"@endif @if(empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) disabled @endif>{{$row['CateNameRoute']}}</option>
                        @php if($data['Category_String'] == $row['CateCode'] || (empty(element('s_cate_code', $arr_input)) === false && element('s_cate_code', $arr_input) == $row['CateCode']) || (empty(element('on_off_link_cate_code', $arr_input)) === false && element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode'])) $temp_s_cate_code = $row['CateCode']; @endphp
                    @endforeach
                </select>
                @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y')
                    <input type="hidden" name="s_cate_code" value="{{$temp_s_cate_code}}">
                @endif

                <select class="seleProcess width49p ml1p" id="subject_idx" name="subject_idx" title="과목선택" required="required" @if($method == 'POST') disabled="disabled" @endif>
                    <option value="">과목</option>
                </select>

                <select id="s_campus" name="s_campus" title="캠퍼스" class="seleCampus width34p mt1p d_none">
                    <option value="">캠퍼스 선택</option>
                    @foreach($arr_base['campus'] as $row)
                        <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" @if((empty($data['CampusCcd']) === false && $row['CampusCcd'] == $data['CampusCcd']) || (empty($data['CampusCcd']) === true && $row['CampusCcd'] == '605001'))selected="selected"@endif>{{$row['CcdName']}}</option>
                    @endforeach
                </select>

                <span class="chkBox line2 ">
                    <input type="checkbox" id="is_public" name="is_public" class="goods_chk" value="Y" @if($method == 'POST' || $data['IsPublic']=='Y')checked="checked"@endif>
                </span>
                <div class="willbes-Lec-Search NG width100p mt1p">
                    <input type="text" id="board_title" name="board_title" class="labelSearch width100p" placeholder="제목" maxlength="30" value="{{$data['Title']}}">
                </div>
            </div>

            <div class="willbes-WriteBox NG tx-gray pb20">
                <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder="• 500자 이상 입력해 주세요.&#13;&#10;• 합격수기와 관련없는 내용은 삭제될 수 있습니다.&#13;&#10;• 합격인증 및 파일첨부는 필수사항이 아닙니다.">{!! $data['Content'] !!}</textarea>

                @for($i = 0; $i < 2; $i++)
                    <div class="filetype p_re mt10">
                        <input type="text" class="file-text" value="{{ $data['AttachData'][$i]['RealName'] or ''}}"/>
                        <span class="file-btn reset-Btn width25p ml1p">Search</span>
                        <span class="file-select"><input type="file" name="attach_file[]" class="input-file" size="3"></span>
                        @if(empty($data['AttachData'][$i]) === false)
                            <input class="file-reset NSK" type="button" value="X" data-attach-idx="{{ $data['AttachData'][$i]['FileIdx'] }}"/>
                        @endif
                    </div>
                @endfor

                <div class="mt10 lh1_5">
                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                </div>
                <div class="agree-Chk mt10 toggle">
                    <div class="chk">
                        <div class="AllchkBox agree-All-Tit p_re">
                            아래 내용에 동의합니다.
                            <div class="chkBox-Agree">
                                <input type="checkbox" id="is_chk_y" name="is_chk_y">
                            </div>
                        </div>
                    </div>
                    <div class="agree-Tit">
                        <a href="#none">
                            개인정보 수집 및 이용에 대한 안내 <span class="tx-blue">(필수)</span>  <span class="v_arrow">▼</span>
                        </a>
                    </div>
                    <div class="agree-Txt">
                        <ul>
                            <li>
                                개인정보 수집 이용 목적<br>
                                - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대
                                - 이벤트 참여에 따른 강의 수강자 목록에 활용
                            </li>
                            <li>
                                개인정보 수집 항목<br>
                                - 신청인의 이름
                            </li>
                            <li>
                                개인정보 이용기간 및 보유기간<br>
                                - 본 수집, 활용목적 달성 후 바로 파기
                            </li>
                            <li>
                                개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                                - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은
                                이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="goTopbtn">
                <a href="javascript:link_go();">
                    <img src="{{ img_url('m/main/icon_top.png') }}">
                </a>
            </div>
            <!-- Topbtn -->

            <div id="Fixbtn" class="Fixbtn two">
                <ul>
                    <li class="btn_blue"><a href="javascript:void(0);" id="btn_submit">등록</a></li>
                    <li class="btn_gray"><a href="javascript:void(0);" id="btn_list">취소</a></li>
                </ul>
            </div>
            <!-- Fixbtn -->
        </form>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            @if(empty(element('s_cate_code_disabled', $arr_input)) === true || element('s_cate_code_disabled', $arr_input) != 'Y')
            $regi_form.find('select[name="s_cate_code"]').chained("#s_site_code");
            @endif
            $regi_form.find('select[name="s_campus"]').chained("#s_site_code");

            $('#btn_list').click(function() {
                location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
            });

            $('.file-reset').click(function() {
                var _url = '{{ front_url("{$default_path}/destroyFile/?".$get_params) }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'attach_idx' : $(this).data('attach-idx')
                };
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        alert('삭제 되었습니다.');
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            $('#btn_submit').click(function () {
                var _url = '{!! front_url($default_path.'/store?'.$get_params) !!}';
                if (!confirm('저장하시겠습니까?')) { return true; }

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                var is_public = $(":input:checkbox[name=is_public]:checked").length;

                if ($('#s_site_code option:selected').val() == '') {
                    alert('과정을 선택해 주세요.');
                    return false;
                }

                if ($('#s_cate_code option:selected').val() == '') {
                    alert('카테고리를 선택해 주세요.');
                    return false;
                }

                if ($('#subject_idx option:selected').val() == '') {
                    alert('과목을 선택해 주세요.');
                    return false;
                }

                if (is_public < 1) {
                    alert('공개여부를 선택해 주세요.');
                    return false;
                }

                if ($.trim($('#board_title').val()) == '') {
                    alert('제목을 입력해 주세요.');
                    $('#board_title').focus();
                    return false;
                }

                if ($.trim($('#board_content').val()) == '') {
                    alert('내용을 입력해 주세요.');
                    $('#board_content').focus();
                    return false;
                }

                if ($("#is_chk_y").is(':checked') === false) {
                    alert('개인정보 수집 및 이용에 동의하여 주십시오.');
                    return false;
                }

                return true;
            }

            // 카테고리 선택
            $regi_form.on('change', 'select[name="s_cate_code"]', function() {
                var obj_val = $(this).val();
                fn_cate_subject(obj_val);
            });

            @if($method == "PUT")
                fn_cate_subject($("#s_cate_code option:selected").val());
            @endif
        });

        // 과목 리스트 조회
        function fn_cate_subject(obj_val){
            $("#subject_idx").html('').prop("disabled",false);

            @if(empty($arr_cate_subject) === false)
            var json_data = {!! json_encode($arr_cate_subject) !!};

            if (typeof json_data[obj_val] === 'undefined') {
                return;
            }

            var subject_idx = "{{ $data['SubjectIdx'] or ''}}";
            var html = "<option value=''>과목</option>";
            $.each(json_data[obj_val], function(key, val) {
                var selected = "";
                if(key == subject_idx) selected = "selected";
                html += "<option value='" + key + "' " + selected + ">" + val + "</option>";
            });

            $("#subject_idx").html(html);
            @endif
        }
    </script>
@stop