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
                <label class="control-label col-md-2" for="campus_ccd">캠퍼스</span>
                </label>
                <div class="col-md-4 item">
                    <select class="form-control" id="campus_ccd" name="campus_ccd">
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
                    <input type="text" id="lec_room_name" name="lec_room_name" required="required" class="form-control" title="강의실명" value="{{ $data['LecRoomName'] }}">
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
                <label class="control-label col-md-2" for="live_video_route">영상경로 <span class="required">*</span>
                </label>
                <div class="col-md-7 item">
                    <input type="text" id="live_video_route" name="live_video_route" required="required" class="form-control" title="영상경로" value="{{ $data['LiveVideoRoute'] }}">
                </div>
                <div class="col-md-3">
                    <p class="form-control-static"># 강의실과 매칭될 영상정보</p>
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

                $(document).ready(function() {
                    // 등록
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/live/video/LiveManager/store/') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/live/video/LiveManager/') }}' + dtParamsToQueryString($datatable));
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