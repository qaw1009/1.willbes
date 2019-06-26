@extends('lcms.layouts.master_modal')

@section('layer_title')
    제휴사 메뉴 정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
@endsection

@section('layer_content')
        <div class="x_title text-right">
            <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
        </div>
    {!! form_errors() !!}
    @if($menu_depth == '1')
        {{-- GNB 메뉴 등록 --}}
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="menu_name">GNB 메뉴명 <span class="required">*</span>
            </label>
            <div class="col-md-4 item">
                <input type="text" id="menu_name" name="menu_name" required="required" class="form-control" title="GNB 메뉴명" value="{{ $data['MenuName'] }}">
            </div>
            <label class="control-label col-md-2" for="">GNB 메뉴 코드
            </label>
            <div class="col-md-4 form-control-static">
                @if($method == 'PUT'){{ $data['MenuIdx'] }}@else # 등록 시 자동 생성 @endif
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="btob_idx">제휴사 선택 <span class="required">*</span>
            </label>
            <div class="col-md-3 item">
                <select class="form-control" id="btob_idx" name="btob_idx" required="required" title="제휴사" @if($method == 'PUT') disabled="disabled" @endif>
                    <option value="">선택</option>
                @foreach($arr_btob_idx as $key => $val)
                    <option value="{{ $key }}" @if($btob_idx == $key) selected="selected" @endif>{{ $val }}</option>
                @endforeach
                </select>
            </div>
        </div>
    @else
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">제휴사 명
            </label>
            <div class="col-md-10 form-control-static item">
                {{ element($btob_idx, $arr_btob_idx) }}
                <input type="hidden" name="btob_idx" value="{{ $btob_idx }}" required="required" title="제휴사"/>
            </div>
        </div>
        {{-- LNB 메뉴 등록 --}}
        @if(isset($parent_menus['GNB']) === true)
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="group_menu_idx">GNB-2depth 메뉴명 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <select class="form-control parent_menus" id="group_menu_idx" name="group_menu_idx" required="required" title="GNB-2depth 메뉴명">
                        @foreach($parent_menus['GNB'] as $row)
                            <option value="{{ $row['MenuIdx'] }}">{{ $row['MenuName'] }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-2">GNB-2depth 메뉴 코드
                </label>
                <div class="col-md-4 form-control-static">
                    <p id="menu_group_code">{{ $group_menu_idx }}</p>
                </div>
            </div>
        @endif
        @if(isset($parent_menus['LNB']) === true)
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="parent_menu_idx">LNB-3depth 메뉴명 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <select class="form-control parent_menus" id="parent_menu_idx" name="parent_menu_idx" required="required" title="LNB-3depth 메뉴명">
                        @foreach($parent_menus['LNB'] as $row)
                            <option value="{{ $row['MenuIdx'] }}">{{ $row['MenuName'] }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-2">LNB-3depth 메뉴 코드
                </label>
                <div class="col-md-4 form-control-static">
                    <p id="menu_parent_code">{{ $parent_menu_idx }}</p>
                </div>
            </div>
        @endif
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2">메뉴 경로
            </label>
            <div class="col-md-10 form-control-static">
                <p id="menu_route_name" class="pl-0"></p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="menu_name">메뉴명 <span class="required">*</span>
            </label>
            <div class="col-md-4 item">
                <input type="text" id="menu_name" name="menu_name" required="required" class="form-control" title="GNB 메뉴명" value="{{ $data['MenuName'] }}">
            </div>
            <label class="control-label col-md-2">메뉴코드
            </label>
            <div class="col-md-4 form-control-static">
                @if($method == 'PUT'){{ $data['MenuIdx'] }}@else # 등록 시 자동 생성 @endif
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="menu_url">URL
            </label>
            <div class="col-md-8 item">
                <input type="text" id="menu_url" name="menu_url" class="form-control" title="URL" value="{{ $data['MenuUrl'] }}">
            </div>
        </div>
        @if($menu_depth == '2')
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="icon_class_name">아이콘 클래스명
            </label>
            <div class="col-md-4">
                <input type="text" id="icon_class_name" name="icon_class_name" class="form-control" title="아이콘 클래스명" value="{{ $data['IconClassName'] }}" placeholder="# 미 입력시 fa-file-text">
            </div>
        </div>
        @endif
        <div class="form-group form-group-sm">
            <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
            </label>
            <div class="col-md-4 item form-inline">
                <div class="radio">
                    <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                    <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                </div>
            </div>
            <label class="control-label col-md-2" for="order_num">정렬
            </label>
            <div class="col-md-1">
                <input type="text" name="order_num" class="form-control" value="{{ $data['OrderNum'] }}" style="width: 60px;" />
            </div>
            <div class="col-md-3 form-control-static">
                # 미 입력시 마지막 DP
            </div>
        </div>
    @endif
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
            $regi_form.find('select[name="group_menu_idx"]').val('{{ $group_menu_idx }}');
            $regi_form.find('select[name="parent_menu_idx"]').val('{{ $parent_menu_idx }}');

            // 메뉴경로 셋팅
            $('.parent_menus').change(function() {
                var route = $regi_form.find('select[name="group_menu_idx"] option:selected').text();
                $('#menu_group_code').html($regi_form.find('select[name="group_menu_idx"]').val());

                if ($regi_form.find('select[name="parent_menu_idx"] option:selected').text() !== '') {
                    route += ' > ' + $regi_form.find('select[name="parent_menu_idx"] option:selected').text();
                    $('#menu_parent_code').html($regi_form.find('select[name="parent_menu_idx"]').val());
                }

                $('#menu_route_name').html(route);
            });
            $('.parent_menus').change();

            // 그룹메뉴 변경시 자식 메뉴 조회
            $regi_form.find('select[name="group_menu_idx"]').change(function() {
                var $children = $regi_form.find('select[name="parent_menu_idx"]');

                if ($children.length > 0) {
                    var data = {
                        '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        'menu_idx' : $(this).val()
                    };
                    sendAjax('{{ site_url('/sys/btob/btobMenu/children') }}', data, function(ret) {
                        if (ret.ret_cd) {
                            $children.children('option').remove();

                            $.each(ret.ret_data, function(k, v) {
                                $children.append($('<option>', { 'value' : k, 'text' : v}));
                            });
                            $children.change();
                        }
                    }, showError, true, 'POST');
                }
            });

            // 메뉴 등록
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/btob/btobMenu/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
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