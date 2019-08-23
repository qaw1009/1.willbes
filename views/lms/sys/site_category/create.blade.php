@extends('lcms.layouts.master_modal')

@section('layer_title')
    카테고리 정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <input type="hidden" name="cate_depth" value="{{ $cate_depth }}"/>
@endsection

@section('layer_content')
        <div class="x_title text-right">
            <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
        </div>
        {!! form_errors() !!}
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="site_code">운영 사이트 <span class="required">*</span>
            </label>
            <div class="col-md-4 item">
                <select class="form-control parent_categories" id="site_code" name="site_code" required="required" title="운영 사이트" @if($method == 'PUT') disabled="disabled" @endif>
                    <option value="">사이트선택</option>
                    @foreach($site_codes as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
            <label class="control-label col-md-2" for="">운영 사이트 코드
            </label>
            <div class="col-md-4 form-control-static">
                <p id="selected_site_code">{{ $site_code }}</p>
            </div>
        </div>
        {{-- 중분류 등록 --}}
        @if(isset($parent_categories['LG']) === true)
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="group_cate_code">대분류 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <select class="form-control parent_categories" id="group_cate_code" name="group_cate_code" required="required" title="대분류" @if($method == 'PUT') disabled="disabled" @endif>
                        @foreach($parent_categories['LG'] as $row)
                            <option value="{{ $row['CateCode'] }}">{{ $row['CateName'] }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-2">대분류 코드
                </label>
                <div class="col-md-4 form-control-static">
                    <p id="selected_group_cate_code">{{ $group_cate_code }}</p>
                </div>
            </div>
        @endif
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">카테고리 정보
            </label>
            <div class="col-md-10 form-control-static">
                <p id="cate_route_name" class="pl-0"></p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="cate_name">분류명 <span class="required">*</span>
            </label>
            <div class="col-md-4 item">
                <input type="text" id="cate_name" name="cate_name" required="required" class="form-control" title="분류명" value="{{ $data['CateName'] }}">
            </div>
            <label class="control-label col-md-2">분류코드
            </label>
            <div class="col-md-4 form-control-static">
                @if($method == 'PUT'){{ $data['CateCode'] }}@else # 등록 시 자동 생성 @endif
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
            </label>
            <div class="col-md-4 item form-inline">
                <div class="radio">
                    <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                    <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                </div>
            </div>
            <label class="control-label col-md-2" for="is_default">디폴트 여부 <span class="required">*</span>
            </label>
            <div class="col-md-4 item form-inline">
                <div class="radio">
                    <input type="radio" id="is_default_y" name="is_default" class="flat" value="Y" required="required" title="디폴트여부" @if($method == 'POST' || $data['IsDefault']=='Y')checked="checked"@endif/> <label for="is_default_y" class="input-label">디폴트</label>
                    <input type="radio" id="is_default_n" name="is_default" class="flat" value="N" @if($data['IsDefault']=='N')checked="checked"@endif/> <label for="is_default_n" class="input-label">일반</label>
                </div>
                <span class="red pl-10"># 사이트별 1개만 설정</span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="order_num">정렬
            </label>
            <div class="col-md-1">
                <input type="text" name="order_num" class="form-control" value="{{ $data['OrderNum'] }}" style="width: 60px;" />
            </div>
            <div class="col-md-3 form-control-static">
                # 미 입력시 마지막 DP
            </div>
            <label class="control-label col-md-2" for="is_front_use">Front 사용 여부 <span class="required">*</span>
            </label>
            <div class="col-md-4 item form-inline">
                <div class="radio">
                    <input type="radio" id="is_front_use_y" name="is_front_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsFrontUse']=='Y')checked="checked"@endif/> <label for="is_front_use_y" class="input-label">사용</label>
                    <input type="radio" id="is_front_use_n" name="is_front_use" class="flat" value="N" @if($data['IsFrontUse']=='N')checked="checked"@endif/> <label for="is_front_use_n" class="input-label">미사용</label>
                </div>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">등록자
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['RegAdminName'] }}
            </div>
            <label class="control-label col-md-2">등록일
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['RegDatm'] }}
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">최종 수정자
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['UpdAdminName'] }}
            </div>
            <label class="control-label col-md-2">최종 수정일
            </label>
            <div class="col-md-4 form-control-static">
                {{ $data['UpdDatm'] }}
            </div>
        </div>
        <script type="text/javascript">
            var $regi_form = $('#_regi_form');

            $(document).ready(function() {
                // 입력값 셋팅
                $regi_form.find('select[name="site_code"]').val('{{ $site_code }}');
                $regi_form.find('select[name="group_cate_code"]').val('{{ $group_cate_code }}');

                // 카테고리 정보 셋팅
                $('.parent_categories').change(function() {
                    var route = $regi_form.find('select[name="site_code"] option:selected').text();
                    $('#selected_site_code').html($regi_form.find('select[name="site_code"]').val());

                    if ($regi_form.find('select[name="group_cate_code"] option:selected').text() !== '') {
                        route += ' > ' + $regi_form.find('select[name="group_cate_code"] option:selected').text();
                        $('#selected_group_cate_code').html($regi_form.find('select[name="group_cate_code"]').val());
                    }

                    $('#cate_route_name').html(route);
                });
                $('.parent_categories').change();

                // 카테고리 등록
                $regi_form.submit(function() {
                    var _url = '{{ site_url('/sys/site/store/category') }}';

                    ajaxSubmit($regi_form, _url, function(ret) {
                        if(ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            $("#pop_modal").modal('toggle');
                            location.replace('{{ site_url('/sys/site/index/category/') }}' + dtParamsToQueryString($datatable));
                        }
                    }, showValidateError, null, false, 'alert');
                });
            });
        </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection