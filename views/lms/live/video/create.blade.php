@extends('lcms.layouts.master_modal')

@section('layer_title')
    라이브송출관리
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        @endsection

        @section('layer_content')
            <div class="form-group form-group-sm">
                <div class="x_title text-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
            </div>
            {!! form_errors() !!}
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', '', '', false, $offLineSite_list) !!}
                </div>
                <label class="control-label col-md-2" for="campus_ccd">캠퍼스 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <select class="form-control" id="campus_ccd" name="campus_ccd" required="required" title="캠퍼스">
                        <option value="">캠퍼스</option>
                        @foreach($arr_campus as $row)
                            <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['CampusCcd'] == $data['CampusCcd'])) selected="selected" @endif>{{ $row['CampusName'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="lec_room_name">강의실명 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <select class="form-control" id="class_room_idx" name="class_room_idx" required="required" title="강의실명" @if($method == 'POST') disabled="disabled" @endif>
                        <option value="">강의실명</option>
                        @if(empty($arr_site_class_room[$data['SiteCode']][$data['CampusCcd']]) === false)
                            @foreach($arr_site_class_room[$data['SiteCode']][$data['CampusCcd']] as $room_idx => $room_name)
                                <option value="{{ $room_idx }}" @if($method == 'PUT' && ($room_idx == $data['CIdx'])) selected="selected" @endif>{{ $room_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <label class="control-label col-md-2" for="order_num">정렬
                </label>
                <div class="col-md-1">
                    <input type="text" name="order_num" class="form-control" value="{{ $data['OrderNum'] }}" style="width: 60px;" />
                </div>
                <div class="col-md-3">
                    <p class="form-control-static"># 미 입력시 마지막 DP</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="live_video_route">영상경로
                </label>
                <div class="col-md-7">
                    <input type="text" id="live_video_route" name="live_video_route" class="form-control" title="영상경로" placeholder="강의실코드 생성 후 입력이 가능합니다." value="{{ $data['LiveVideoRoute'] }}">
                </div>
                <div class="col-md-3">
                    <p class="form-control-static"># 강의실과 매칭될 영상정보</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="live_video_route">영상타입
                </label>
                <div class="col-md-7">
                    @foreach($arr_live_type as $key => $value)
                        <label for="live_type_{{$key}}" class="input-label"><input type="radio" id="live_type_{{$key}}" name="LiveTypeCcd" class="flat" value="{{$key}}" required="required" title="영상타입" @if($method == 'POST' || $data['LiveTypeCcd'] == $key)checked="checked"@endif/> {{$value}}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <div class="radio">
                        <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                        <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">등록자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                </div>
                <label class="control-label col-md-2">등록일
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">최종 수정자
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                </div>
                <label class="control-label col-md-2">최종 수정일
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                </div>
            </div>
            <script type="text/javascript">
                var $regi_form = $('#_regi_form');

                // site-code에 매핑되는 select box 자동 변경
                $regi_form.find('select[name="campus_ccd"]').chained("#site_code");
                // $regi_form.find('select[name="class_room_idx"]').chained("#campus_ccd");

                $(document).ready(function() {
                    // 운영사이트 선택
                    $regi_form.on('change', 'select[name="site_code"]', function() {
                        $("#class_room_idx").attr("disabled",true);
                        $('#campus_ccd, #class_room_idx').val('');
                    });

                    // 캠퍼스 선택
                    $regi_form.on('change', 'select[name="campus_ccd"]', function() {
                        var class_room_data = {!! json_encode($arr_site_class_room) !!};
                        var site_code = $('#site_code option:selected').val();
                        var campus_ccd = $(this).val();
                        var option_html = '<option value="">강의실명</option>';

                        if (typeof class_room_data[site_code][campus_ccd] !== 'undefined') {
                            $.each(class_room_data[site_code][campus_ccd], function (room_idx, room_name) {
                                option_html += '<option value="'+ room_idx +'">' + room_name + '</option>';
                            });
                        }
                        $("#class_room_idx").html(option_html).attr("disabled",false);
                    });

                    // 등록
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/live/videoManager/store/') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/live/videoManager/') }}' + dtParamsToQueryString($datatable));
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