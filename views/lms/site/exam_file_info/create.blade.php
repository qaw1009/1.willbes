@extends('lcms.layouts.master')

@section('content')
    <h5>- 지역별 공고문 자료관리 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h5>학년도 정보</h5>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <input type="hidden" name="data_type" value="0"/>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required') !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="year_target">학년도 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        <select class="form-control mr-5" id="year_target" name="year_target" required="required" title="학년도">
                            <option value="">학년도</option>
                            @for($i=(date('Y')+1); $i>=2021; $i--)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['YearTarget']) selected="selected" @endif>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>

    <div class="x_panel {{($method == 'POST' ? 'hide' : '')}}">
        <div class="x_title">
            <h5>지역별 공고문 자료 정보</h5>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_file_form" name="regi_file_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="data_type" value="1"/>
                <input type="hidden" name="group_code" value="{{$data['GroupCode']}}"/>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="year_target">지역별 공고문 자료 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline mt-5">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>지역</th>
                                <th>유아 · 초등</th>
                                <th>사용여부</th>
                                <th>중등</th>
                                <th>사용여부</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($exam_area_ccd as $key => $val)
                                    <input type="hidden" name="arr_area_data[]" value="{{$key}}">
                                    <tr>
                                        <td>{{$val}}</td>
                                        <td>
                                            <input type="file" name="file_{{$key}}[]">
                                            @if(empty($file_list[$key][0]) === false)
                                                <input type="hidden" name="arr_file_idx_{{$key}}[0]" value="{{$file_list[$key][0]['ExamFileIdx']}}">
                                                <input type="hidden" name="arr_file_path_{{$key}}[0]" value="{{ urlencode($file_list[$key][0]['FilePath'].$file_list[$key][0]['FileName'])}}">
                                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($file_list[$key][0]['FilePath'].$file_list[$key][0]['FileName'])}}" data-file-name="{{ urlencode($file_list[$key][0]['FileRealName']) }}" target="_blank">
                                                    {{ $file_list[$key][0]['FileRealName'] }}
                                                </a> ]
                                            @endif
                                        </td>
                                        <td>
                                            <select class="form-control mr-5" name="is_use_{{$key}}[]">
                                                <option value="Y" {{(empty($file_list[$key][0]['IsUse']) === false && $file_list[$key][0]['IsUse'] == 'Y' ? 'selected="selected"' : '')}}>사용</option>
                                                <option value="N" {{(empty($file_list[$key][0]['IsUse']) === false && $file_list[$key][0]['IsUse'] == 'N' ? 'selected="selected"' : '')}}>미사용</option>
                                            </select>
                                            @if(empty($file_list[$key][0]) === false)
                                                <button type="button" class="btn btn-sm btn-primary btn-isuse" data-file-idx="{{$file_list[$key][0]['ExamFileIdx']}}" data-area-ccd="{{$key}}">여부수정</button>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="file" name="file_{{$key}}[]">
                                            @if(empty($file_list[$key][1]) === false)
                                                <input type="hidden" name="arr_file_idx_{{$key}}[1]" value="{{$file_list[$key][1]['ExamFileIdx']}}">
                                                <input type="hidden" name="arr_file_path_{{$key}}[1]" value="{{ urlencode($file_list[$key][1]['FilePath'].$file_list[$key][1]['FileName'])}}">
                                                [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($file_list[$key][1]['FilePath'].$file_list[$key][1]['FileName'])}}" data-file-name="{{ urlencode($file_list[$key][1]['FileRealName']) }}">
                                                    {{ $file_list[$key][1]['FileRealName'] }}
                                                </a> ]
                                            @endif
                                        </td>
                                        <td>
                                            <select class="form-control mr-5" name="is_use_{{$key}}[]">
                                                <option value="Y" {{(empty($file_list[$key][1]['IsUse']) === false && $file_list[$key][1]['IsUse'] == 'Y' ? 'selected="selected"' : '')}}>사용</option>
                                                <option value="N" {{(empty($file_list[$key][1]['IsUse']) === false && $file_list[$key][1]['IsUse'] == 'N' ? 'selected="selected"' : '')}}>미사용</option>
                                            </select>
                                            @if(empty($file_list[$key][1]) === false)
                                                <button type="button" class="btn btn-sm btn-primary btn-isuse" data-file-idx="{{$file_list[$key][1]['ExamFileIdx']}}" data-area-ccd="{{$key}}">여부수정</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $regi_file_form = $('#regi_file_form');

        $(document).ready(function() {
            //기본정보 저장
            $regi_form.submit(function() {
                var _url = '{{ site_url('/site/examFileInfo/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/site/examFileInfo/create/') }}'+ret.ret_data);
                    }
                }, showValidateError, null, false, 'alert');
            });

            //지역별 공고문 자료 저장
            $regi_file_form.submit(function() {
                var _url = '{{ site_url('/site/examFileInfo/storeFile') }}';

                if ($regi_file_form.find("input[name='group_code']").val() == '') {
                    alert('학년도정보 저장 후 자료를 등록해주세요.');
                    return false;
                }

                ajaxSubmit($regi_file_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        /*location.href = "{{ site_url('/site/examFileInfo/index') }}";*/
                        location.replace('{{ site_url('/site/examFileInfo/create/'.$idx) }}');
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('.btn-isuse').click(function() {
                var exam_file_idx = $(this).data("file-idx");
                var this_area_ccd = $(this).data("area-ccd");
                var is_use = $(this).parent().find("select[name='is_use_"+this_area_ccd+"[]']").val();

                var data = {
                    '{{ csrf_token_name() }}' : $regi_file_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'UPDATE',
                    'exam_file_idx' : exam_file_idx,
                    'is_use' : is_use
                };
                sendAjax('{{ site_url('/site/examFileInfo/storeIsuse') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showError, false, 'POST');
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/site/examFileInfo/download") }}' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            $('#btn_list').click(function() {
                location.href = "{{ site_url('/site/examFileInfo/index') }}";
            });
        });
    </script>
@stop