@extends('lcms.layouts.master_modal')

@section('layer_title')
    과목 연결
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @foreach($params as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
@endsection

@section('layer_content')
    {!! form_errors() !!}
    <div class="form-group form-group-bordered bg-odd">
        <label class="control-label col-md-2">카테고리 정보
        </label>
        <div class="col-md-10 form-inline">
            <p class="form-control-static">{{ str_last_pos_before($cate_route_name, ' > ') }} > <span class="blue">{{ str_last_pos_after($cate_route_name, ' > ') }}</span></p>
            @if(count($arr_series) > 0)
                <select class="form-control input-sm ml-10" id="child_ccd" name="child_ccd" required="required" title="하위 구분">
                @foreach($arr_series as $key => $val)
                    <option value="{{ $key }}" @if($key == $params['_child_ccd']) selected="selected" @endif>{{ $val }}</option>
                @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="x_title mt-20 mb-0">
        <span class="required">*</span> 과목을 선택해 주세요. (다중 선택 가능합니다.)
    </div>
    <div class="form-group form-group-sm">
        @foreach($arr_subject_idx as $row)
            <div class="col-xs-3 checkbox">
                <input type="checkbox" id="subject_idx_{{ $loop->index }}" name="subject_idx[]" class="flat" value="{{ $row['SubjectIdx'] }}" @if($row['SubjectIdx'] == $row['RSubjectIdx']) checked="checked" @endif @if($loop->index == 1) required="required" title="과목" @endif/>
                <label for="subject_idx_{{ $loop->index }}" class="input-label">{{ $row['SubjectName'] }}</label>
            </div>
        @endforeach
    </div>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 기본 URI 파라미터
            var uri_param = $regi_form.find('input[name="_conn_type"]').val() + '/' + $regi_form.find('input[name="_site_code"]').val() + '/' + $regi_form.find('input[name="_cate_code"]').val();

            // 과목 등록
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/base/sortMapping/store/') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        if ($regi_form.find('input[name="_conn_type"]').val() === 'complex') {
                            // 복합연결 목록으로 이동
                            replaceModal('{{ site_url('/product/base/sortMapping/list/') }}' + uri_param, {});
                        } else {
                            $("#pop_modal").modal('toggle');
                            location.replace('{{ site_url('/product/base/sortMapping/') }}' + dtParamsToQueryString($datatable));
                        }
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 자식 코드 변경
            $('select[name="child_ccd"]').on('change', function() {
                uri_param += '/' + $(this).val();

                // 등록 폼 내용 변경
                replaceModal('{{ site_url('/product/base/sortMapping/create/') }}' + uri_param, {});
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">적용</button>
@endsection

@section('layer_footer')
    </form>
@endsection