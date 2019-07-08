@extends('lcms.layouts.master_modal')

@section('layer_title')
    제휴사 정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}

        <input type="hidden" name="btobidx" id="btobidx" value="{{$btobidx}}"/>

        @endsection

        @section('layer_content')
            <div class="x_title text-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            {!! form_errors() !!}
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="BtobName">제휴사명 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <input type="text" id="BtobName" name="BtobName" required="required" class="form-control" title="제휴사명" value="{{ $data['BtobName'] }}">
                </div>
                <label class="control-label col-md-2" for="">제휴사 코드
                </label>
                <div class="col-md-4 form-control-static">
                    @if($method == 'PUT'){{ $data['BtobIdx'] }}@else # 등록 시 자동 생성 @endif
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="BtobId">제휴사 아이디 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                @if($method == 'POST')
                    <input type="text" id="BtobId" name="BtobId" required="required" class="form-control" title="제휴사아이디" value="" maxlength="20">
                @else
                    <p class="form-control-static pl-0">{{ $data['BtobId'] }}</p>
                @endif
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="ManagerName">담당자명
                </label>

                <div class="col-md-4 item form-inline">
                    <div class="item inline-block">
                        <input type="text" id="ManagerName" name="ManagerName" class="form-control" title="담당자명" style="width: 80px"  value="{{ $data['ManagerName'] }}">
                        <span class="pl-10"># 제휴사 담당자명</span>
                    </div>
                </div>

                <label class="control-label col-md-2" for="EmailEnc">이메일
                </label>
                <div class="col-md-4 item">
                    <input type="text" id="Email" name="Email" class="form-control" title="이메일" value="{{ $data['ManagerName'] }}">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="Tel1">전화번호
                </label>

                <div class="col-md-4 form-inline item">
                    <div class="item inline-block">
                        <select class="form-control" id="Tel1" name="Tel1" style="width: 105px;">
                            @foreach($tel as $key => $val)
                                <option value="{{$key}}" @if($data['Tel1'] == $key) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select> -
                        <input type="number" id="Tel2" name="Tel2" class="form-control" title="전화번호" value="{{ $data['Tel2'] }}" style="width: 60px" maxlength="4"> -
                        <input type="number" id="Tel3" name="Tel3" class="form-control" title="전화번호" value="{{ $data['Tel3'] }}" style="width: 60px" maxlength="4">
                    </div>
                </div>
                <label class="control-label col-md-2" for="Phone1">휴대폰번호
                </label>
                <div class="col-md-4 form-inline item">
                    <div class="item inline-block">
                        <select class="form-control" id="Phone1" name="Phone1" style="width: 105px;">
                            @foreach($hp as $key => $val)
                                <option value="{{$key}}"  @if($data['Phone1'] == $key) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select> -
                        <input type="number" id="Phone2" name="Phone2" class="form-control" title="휴대폰번호" value="{{ $data['Phone2'] }}" style="width: 60px" maxlength="4"> -
                        <input type="number" id="Phone3" name="Phone3" class="form-control" title="휴대폰번호" value="{{ $data['Phone3'] }}" style="width: 60px" maxlength="4">
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="site_code">제어구분
                </label>
                <div class="col-md-4 form-inline item">
                    <div class="item inline-block">
                        @foreach($control as $key=>$val)
                            <input type="checkbox" id="control_{{$key}}" name="IpControlTypeCcds[]" class="flat" value="{{$key}}" title="제어구분"
                                   @if(strpos($data['IpControlTypeCcds'],(string)$key) !== false)checked="checked"@endif/> <label for="control_{{$key}}" class="input-label">{{$val}}</label>
                        @endforeach
                    </div>
                </div>
                <label class="control-label col-md-2" for="is_use">사용 여부 <span class="required">*</span>
                </label>
                <div class="col-md-4 item">
                    <div class="radio">
                        <input type="radio" id="IsUse_y" name="IsUse" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                        <input type="radio" id="IsUse_n" name="IsUse" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="Desc">참조도메인
                </label>
                <div class="col-md-7 item">
                    <input type="text" id="ReferDomains" name="ReferDomains" class="form-control" title="참조도메인" placeholder="접속하는 도메인 정보 모두 입력 예) naver.com,daum.net" value="{{$data['ReferDomains'] }}">
                </div>
                <div class="col-md-3 item form-control-static">
                    ( ',' 로 연결 )
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="Desc">이동 URL
                </label>
                <div class="col-md-7 item">
                    <input type="text" id="ReturnUrl" name="ReturnUrl" class="form-control" title="이동 URL" placeholder="접속 후 이동 할 URL" value="{{$data['ReturnUrl'] }}">
                </div>
                <div class="col-md-3 item form-control-static">
                    (접속 후 이동 할 URL)
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2" for="Desc">설명
                </label>
                <div class="col-md-10 item">
                    <textarea id="Desc" name="Desc" class="form-control" rows="3" title="설명" placeholder="">{{ $data['Desc'] }}</textarea>
                </div>
            </div>
            @if($method==='PUT')
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
            @endif
            <script type="text/javascript">
                var $regi_form = $('#_regi_form');

                $(document).ready(function() {
                    // 과목 등록
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/sys/btob/btobInfo/store') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/sys/btob/btobInfo/') }}' + dtParamsToQueryString());
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