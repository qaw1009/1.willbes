@extends('lcms.layouts.master_modal')
@section('layer_title')
    CP사정보
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}

        <input type="hidden" name="cpidx" value="{{$cpidx}}" />

        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="cpname">CP사명 <span class="required">*</span></label>
                <div class="col-md-4">
                    <input type="text" id="cpname" name="cpname" required="required" class="form-control" title="CP사명" value="{{ $data['wCpName'] }}">
                </div>
                <label class="control-label col-md-2" for="">CP사코드 <span class="required">*</span></label>
                <div class="col-md-4 form-control-static">
                    {{ $data['wCpIdx'] or '등록시 자동 생성'}}
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="cpmanagername">담당자명 <span class="required">*</span></label>
                <div class="col-md-10 form-inline">
                    <input type="text" id="cpmanagername" name="cpmanagername" required="required" class="form-control" title="담당자명" value="{{ $data['wCpManagerName'] }}" style="width: 100px">
                    &nbsp; • CP사 담당자명 입력
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="cptel1">전화번호</label>
                <div class="col-md-4 item multi form-inline">
                    <select name="cptel1" id="cptel1" class="form-control" title="전화번호1">
                        @foreach($tel_ccd as $key=>$val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    - <input type="number" id="cptel2" name="cptel2" class="form-control" maxlength="4" title="전화번호2" value="{{ $data['wCpTel2'] }}" style="width: 50px">
                    - <input type="number" id="cptel3" name="cptel3" class="form-control" maxlength="4" title="전화번호3" value="{{ $data['wCpTel3'] }}" style="width: 50px">
                </div>

                <label class="control-label col-md-2" for="cpphone1">휴대폰번호</label>
                <div class="col-md-4 item multi form-inline">
                    <select name="cpphone1" id="cpphone1" class="form-control" required="required" title="휴대폰번호1">>
                        @foreach($hp_ccd as $key=>$val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    - <input type="number" id="cpphone2" name="cpphone2" class="form-control" maxlength="4" title="휴대폰번호2" value="{{ $data['wCpPhone2'] }}" style="width: 50px">
                    - <input type="number" id="cpphone3" name="cpphone3" class="form-control" maxlength="4" title="휴대폰번호3" value="{{ $data['wCpPhone3'] }}" style="width: 50px">
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="cpmail">Email</label>
                <div class="col-md-4 item multi form-inline">
                    <input type="text" name="cpmail" id="cpmail" class="form-control" title="이메일" value="{{ $data['wCpMail'] }}" style="width: 230px">
                </div>
                <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span></label>
                <div class="col-md-4">
                    <div class="radio">
                        <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" @if($method=="POST" || $data['wIsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                        <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" required="required" @if($data['wIsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                    </div>
                </div>
            </div>


            @if($method==="PUT")
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2" for="">등록자 </label>
                    <div class="col-md-4 form-control-static">
                        {{ $data['wAdminName'] }}
                    </div>
                    <label class="control-label col-md-2" for="">등록일</label>
                    <div class="col-md-4 form-control-static">
                        {{ $data['wRegDatm'] }}
                    </div>
                </div>
                <div class="form-group form-group-sm item">
                    <label class="control-label col-md-2">최종수정자</label>
                    <div class="col-md-4 form-control-static">
                        {{ $data['wUpdAdminName'] }}
                    </div>
                    <label class="control-label col-md-2">최종수정일</label>
                    <div class="col-md-4 form-control-static">
                        {{ $data['wUpdDatm'] }}
                    </div>
                </div>
            @endif


            <script type="text/javascript">

                var $regi_form = $('#regi_form');

                $(document).ready(function() {

                    @if($method == 'PUT')
                    $("#cptel1").val("{{ $data['wCpTel1'] }}");
                    $("#cphp1").val("{{ $data['wCpPhone1'] }}");
                    @endif

                    // ajax submit
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/sys/cp/store') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/sys/cp/') }}' + dtParamsToQueryString($datatable));
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                });
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">Submit</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection