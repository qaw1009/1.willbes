@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 사용자 운영 캠퍼스 정보를 생성하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>사이트 캠퍼스 정보</h2>
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
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : ''), false, $arr_site_code) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="campus_ccd">캠퍼스 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline item">
                        <select class="form-control mr-10" id="campus_ccd" name="campus_ccd" title="캠퍼스" required="required">
                            <option value="">선택</option>
                            @foreach($arr_campus as $row)
                                <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" {{ $data['CampusCcd'] == $row['CampusCcd'] ? 'selected' : '' }}>{{$row['CampusName']}}</option>
                            @endforeach
                        </select>
                        <div class="checkbox-inline">
                            <input type="checkbox" id="is_origin" name="is_origin" class="flat" value="Y" title="본원여부" @if($data['IsOrigin']=='Y')checked="checked"@endif/> <label for="is_origin" class="input-label no-line-height">본원여부</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="disp_name">대체표기명
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="disp_name" name="disp_name" class="form-control" title="대체표기명" value="{{ $data['DispName'] }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="tel">연락처 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="tel" name="tel" class="form-control" title="연락처" value="{{ $data['Tel'] }}" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="addr1">주소1 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="addr1" name="addr1" class="form-control" title="주소1" value="{{ $data['Addr1'] }}" required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="addr2">주소2
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="addr2" name="addr2" class="form-control" title="주소2" value="{{ $data['Addr2'] }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="map_img">맵이미지 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="file" id="map_img" name="map_img" class="form-control" title="맵이미지" {{ $method == 'POST' ? 'required="required"' : '' }}/>
                    </div>
                    <div class="col-md-5 pt-5">
                    @if(empty($data['MapPath']) === false)
                        <a href="{{ $data['MapPath'] }}" rel="popup-image"><i class="fa fa-picture-o"></i> {{ str_last_pos_after($data['MapPath'], '/') }}</a>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="order_num">정렬
                    </label>
                    <div class="col-md-1 item">
                        <input type="text" id="order_num" name="order_num" class="form-control" title="정렬순서" value="{{ $data['OrderNum'] }}"/>
                    </div>
                    <div class="col-md-3 pt-5">
                        # 미 입력시 `0`값으로 등록
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
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 캠퍼스 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");

            // 사이트 캠퍼스정보 등록/수정
            $regi_form.submit(function() {
                var _url = '{{ site_url('/site/siteCampus/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/site/siteCampus/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/site/siteCampus/index') }}' + getQueryString());
            });
        });
    </script>
@stop
