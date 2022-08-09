@extends('lcms.layouts.master')

@section('content')
    <h5>- PG키 정보를 관리하는 메뉴입니다. <span class="red bold">(PG결제 오류가 발생할 수 있습니다. 키 등록/수정에 주의하여 주십시오.)</span></h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>PG키 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="pg_driver">PG드라이버 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                    @if($method == 'POST')
                        <div class="radio">
                        @foreach($arr_pg_ccd as $val)
                            <input type="radio" id="pg_driver_{{ $loop->index }}" name="pg_driver" class="flat" value="{{ str_first_pos_after($val, ':') }}" @if($loop->first === true) required="required" title="PG드라이버" @endif/> <label for="pg_driver_{{ $loop->index }}" class="input-label">{{ str_first_pos_before($val, ':') }}</label>
                        @endforeach
                        </div>
                    @else
                        <p class="form-control-static">{{ $data['PgDriver'] }}</p>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="pg_mid">상점아이디 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <input type="text" id="pg_mid" name="pg_mid" required="required" class="form-control" title="상점 아이디" value="{{ $data['PgMid'] }}" @if($method == 'PUT') readonly="readonly" @endif>
                    </div>
                    <div class="col-md-8 form-control-static">
                        # PG드라이버와 상점아이디는 수정할 수 없습니다.
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="pg_mname">상점명 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="pg_mname" name="pg_mname" required="required" class="form-control" title="상점명" value="{{ $data['PgMName'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="client_key">클라이언트키 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="client_key" name="client_key" required="required" class="form-control" title="클라이언트키" value="{{ $data['ClientKey'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="secret_key">시크릿키 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="secret_key" name="secret_key" required="required" class="form-control" title="시크릿키" value="{{ $data['SecretKey'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="mert_key">상점키
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="mert_key" name="mert_key" class="form-control" title="상점키" value="{{ $data['MertKey'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="pg_key_desc">설명
                    </label>
                    <div class="col-md-6 item">
                        <textarea id="pg_key_desc" name="pg_key_desc" class="form-control" rows="3" title="설명" placeholder="">{{ $data['PgKeyDesc'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" @if($method == 'POST' || $data['IsUse'] == 'Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">등록자
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1">등록일
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">최종 수정자
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1">최종 수정일
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary btn_list" type="button">목록</button>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // PG키 정보 저장
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/pgKey/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sys/pgKey/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 목록 버튼 클릭
            $('.btn_list').click(function() {
                location.replace('{{ site_url('/sys/pgKey/index') }}' + getQueryString());
            });
        });
    </script>
@stop
