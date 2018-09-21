@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 문제등록을 위한 과목별 문제영역(학습요소)을 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>문제영역정보</h2>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {{--{!! csrf_field() !!}--}}
                {{--{!! method_field($method) !!}--}}
                {{--<input type="hidden" name="idx" value="{{ $idx }}"/>--}}

            <table class="table table-bordered modal-table">
                <tr>
                    <th colspan="1">운영사이트 <span class="required">*</span></th>
                    <td colspan="3">
                        {{--{!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}--}}
                    </td>
                </tr>
                <tr>
                    <th colspan="1">모의고사카테고리 <span class="required">*</span></th>
                    <td colspan="3">
                        <button type="button" id="btn_subject_mapping_search" class="btn btn-sm btn-primary">카테고리검색</button>
                        <span id="selected_subject_mapping" class="pl-10">
                            {{--@if(empty($data['SubjectMapping']) === false)--}}
                                {{--@foreach($data['SubjectMapping'] as $key => $val)--}}
                                    {{--<span class="pr-10">{{ $val }}--}}
                                        {{--<a href="#none" data-subject-mapping-code="{{ $key }}" class="selected-subject-mapping-delete"><i class="fa fa-times red"></i></a>--}}
                                        {{--<input type="hidden" name="subject_mapping_code[]" value="{{ $key }}"/>--}}
                                    {{--</span>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th style="width:15%;">문제영역명 <span class="required">*</span></th>
                    <td style="width:35%;">
                        <input type="text" class="form-control" name="">
                    </td>
                    <th style="width:15%;">사용여부 <span class="required">*</span></th>
                    <td style="width:35%;">
                        <div>
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" checked="checked"> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="is_use" class="flat" value="N"> <span class="flat-text">미사용</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>등록자</th>
                    <td></td>
                    <th>등록일</th>
                    <td></td>
                </tr>
                <tr>
                    <th>최종수정자</th>
                    <td></td>
                    <th>최종수정일</th>
                    <td></td>
                </tr>
            </table>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success mr-10">저장</button>
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            </div>
            </form>
        </div>

        <div class="x_content mt-50">
            {!! form_errors() !!}
            <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {{--{!! csrf_field() !!}--}}
                {{--{!! method_field($method) !!}--}}
                {{--<input type="hidden" name="idx" value="{{ $idx }}"/>--}}

                <table class="table table-bordered modal-table">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">영영명</th>
                            <th class="text-center">정렬</th>
                            <th class="text-center">사용여부</th>
                            <th class="text-center">등록자</th>
                            <th class="text-center">등록일</th>
                            <th class="text-center">수정자</th>
                            <th class="text-center">수정일</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--@foreach($data as $row)--}}
                            {{--<tr>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                    </tbody>
                </table>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/base/professor/store') }}';

                // editor
                getEditorBodyContent($editor_curriculum);

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/base/professor/index') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 교수검색 초기화
                $regi_form.find('input[name="wprof_idx"]').val('');
                $regi_form.find('input[name="wsample_url"]').val('');
                $('#wprof_profile').html('');
                $('#wbook_content').html('');
                $('#selected_professor').html('');
                // 카테고리 검색 초기화
                $regi_form.find('input[name="subject_mapping_code[]"]').remove();
                $regi_form.find('input[name="del_prof_calc_idx[]"]').remove();
                $('#selected_subject_mapping').html('');
            });

            // 교수 검색 or 카테고리 + 과목 맵핑 검색
            $('#btn_professor_search, #btn_subject_mapping_search').on('click', function(event) {
                var btn_id = event.target.getAttribute('id');
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var search_url = (btn_id === 'btn_professor_search') ? '{{ site_url('/common/searchWProfessor/index/professor/') }}' : '{{ site_url('/common/searchSubjectMapping/index/') }}';

                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                $('#' + btn_id).setLayer({
                    'url' : search_url + site_code,
                    'width' : 900
                });
            });

            // 카테고리 + 과목 맵핑 삭제
            $regi_form.on('click', '.selected-subject-mapping-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 목록 이동
            $('#btn_list').on('click', function() {
                location.replace('{{ site_url('/mocktest/baseRange/index') }}' + getQueryString());
            });
        });

    </script>
@stop