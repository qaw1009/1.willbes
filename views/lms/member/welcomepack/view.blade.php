@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원가입시 증정되는 월컴팩 상세페이지 입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>등록 정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                <input type="hidden" name="wIdx" id="wIdx" value="{{$data['wIdx']}}" />
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">적용 관심직렬<span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        {{ $data['InterestName'] }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">월컴팩정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        {{ $data['wType'] == 'C' ? '쿠폰' : '강좌' }} |
                        {{ $data['ProdName'] }} [{{$data['wCode']}}]
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <label><input type="radio" name="IsStatus" value="Y" {{ $data['IsStatus'] == 'Y' ? 'checked' : '' }} /> <font color=blue>사용</font> </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" name="IsStatus" value="N" {{ $data['IsStatus'] == 'N' ? 'checked' : '' }} /> <font color=red>미사용</font> </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">설명 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <textarea name="wDesc" id="wDesc" style="width:300px;" >{!! $data['wDesc'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
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
                <div class="form-group">
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
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">변경</button>
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
                var _url = '{{ site_url('/member/welcomepack/set/') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/member/welcomepack/') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/member/welcomepack/') }}' + getQueryString());
            });

        });

    </script>
@stop
