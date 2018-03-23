@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 사이트 운영 게시판 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>게시판기본정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="bm_idx" value="{{ $bm_idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="bm_type_ccd">게시판타입<span class="required">*</span></label>
                    <div class="col-md-2 item form-inline">
                        <div class="radio" id="bm_type">
                            @foreach($bmType_list as $key => $val)
                                <input type="radio" id="{{$key}}" name="bm_type_ccd" class="flat" value="{{$key}}" required="required" title="게시판타입" @if($key == $data['BmTypeCcd']) checked="checked"@endif/>
                                <label style="margin-right: 10px" for="{{$key}}">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static">•예시) 일방향–공지,FAQ| 쌍방향-1:1상담(사용자기준)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="bm_name">게시판명<span class="required">*</span></label>
                    <div class="col-md-3 item form-inline">
                        <input type="text" id="bm_name" name="bm_name" required="required" class="form-control" maxlength="20" title="게시판명" value="{{ $data['BmName'] }}">
                    </div>

                    <label class="control-label col-md-2">게시판코드<span class="required">*</span></label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['BmIdx'] or '등록시 자동 생성'}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="one_way_option">일방향선택옵션</label>
                    <div class="col-md-3 form-inline">
                        <div class="checkbox" id="one_way_option">
                            @foreach($set_onewayoptions as $key => $val)
                                <input type="checkbox" id="one_way_option_{{$key}}" name="one_way_option[]" value="{{$key}}" class="flat" @if(array_search($key, $data_onewayoptions) !== false)checked="checked"@endif>
                                <label class="inline-block mr-5" for="one_way_option_{{$key}}">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="two_way_option">쌍방향선택옵션</label>
                    <div class="col-md-4 form-inline">
                        <div class="checkbox" id="two_way_option">
                            @foreach($set_twowayoptions as $key => $val)
                                <input type="checkbox" id="two_way_option_{{$key}}" name="two_way_option[]" value="{{$key}}" class="flat" @if(array_search($key, $data_twowayoptions) !== false)checked="checked"@endif>
                                <label class="inline-block mr-5" for="two_way_option_{{$key}}">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="bm_desc">게시판설명</label>
                    <div class="col-md-3">
                        <input type="text" id="bm_desc" name="bm_desc" class="form-control" maxlength="50" title="게시판설명" value="{{ $data['BmDesc'] }}">
                    </div>
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="쌍방향" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/>
                            <label for="is_use_y">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" title="미사용" @if($data['IsUse']=='N')checked="checked"@endif/>
                            <label for="is_use_n">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/board/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sys/board/index') }}');
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/sys/board/index') }}');
            });
        });

    </script>
@stop
