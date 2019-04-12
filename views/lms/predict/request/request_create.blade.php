@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 합격예측서비스 기본정보를 관리합니다.</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2>합격예측기본정보등록</h2>
        </div>
        <div class="x_content">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['ProdCode'] : '' }}">
                <input type="hidden" name="Info" value="">
                <input type="hidden" id="GroupCcd" name="GroupCcd" >

                <table class="table table-bordered modal-table">
                    <tr>
                        <th colspan="1">운영사이트 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <select name="SiteCode" id="SiteCode" onChange="selSiteCode(this.value,'');">
                                <option value="">사이트선택</option>
                                @if($method == 'PUT')
                                    <option value="2001" @if($data['SiteCode']=='2001') SELECTED @endif>온라인경찰</option>
                                    <option value="2003" @if($data['SiteCode']=='2003') SELECTED @endif>온라인공무원</option>
                                @else
                                    <option value="2001">온라인경찰</option>
                                    <option value="2003">온라인공무원</option>
                                @endif
                            </select>
                            <span class="ml-20">저장 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.</span>
                        </td>
                    </tr>

                    <tr>
                        <th>서비스명 <span class="required">*</span></th>
                        <td>
                            <input type="text" class="form-control" name="ProdName" value="@if($method == 'PUT'){{ $data['ProdName'] }}@endif" style="width:70%;">
                        </td>
                        <th>서비스코드</th>
                        <td>
                            @if($method == 'PUT'){{ $data['ProdCode'] }}@endif
                        </td>
                    </tr>

                    <tr>
                        <th>조회수</th>
                        <td colspan="3">
                            <input type="text" class="form-control" name="PreCnt" value="@if($method == 'PUT'){{ $data['PreCnt'] }}@endif" style="width:70%;">
                        </td>
                    </tr>

                    <tr>
                        <th>시험연도 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5" name="MockYear">
                                <option value="">연도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockYear']) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                        <th>시험차수 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5" name="MockRotationNo">
                                <option value="">회차</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockRotationNo']) selected @endif>{{$i}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="1">직렬 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <div id="chkArea"></div>
                        </td>
                    </tr>

                    {{--<tr>--}}
                        {{--<th colspan="1">응시가능기간 <span class="required">*</span></th>--}}
                        {{--<td colspan="3" class="form-inline">--}}
                            {{--<input type="text" class="form-control datepicker" style="width:100px;" name="TakeStartDatm_d" value="@if($method == 'PUT'){{ substr($data['TakeStartDatm'], 0, 10) }}@else{{ date("Y-m-d") }}@endif" readonly required="required" title="응시가능기간 시작일">--}}
                            {{--<select name="TakeStartDatm_h" class="form-control">--}}
                                {{--<!--option value="">선택</option//-->--}}
                                {{--@foreach(range(0, 23) as $i)--}}
                                    {{--@php $v = sprintf("%02d", $i); @endphp--}}
                                    {{--<option value="{{$v}}" @if($method==='PUT' && substr($data['TakeStartDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select> 시--}}
                            {{--<select name="TakeStartDatm_m" class="form-control">--}}
                                {{--<!--option value="">선택</option//-->--}}
                                {{--@foreach(range(0, 59) as $i)--}}
                                    {{--@php $v = sprintf("%02d", $i); @endphp--}}
                                    {{--<option value="{{$v}}" @if($method==='PUT' && substr($data['TakeStartDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select> 분--}}
                            {{--<span class="ml-10 mr-10"> ~ </span>--}}
                            {{--<input type="text" class="form-control datepicker" style="width:100px;" name="TakeEndDatm_d" value="@if($method == 'PUT'){{ substr($data['TakeEndDatm'], 0, 10) }}@else{{date("Y-m-d", strtotime(date("Y-m-d").'1year'))}} @endif" readonly  required="required" title="응시가능기간 종료일">--}}
                            {{--<select name="TakeEndDatm_h" class="form-control">--}}
                                {{--<!--option value="">선택</option//-->--}}
                                {{--@foreach(range(0, 23) as $i)--}}
                                    {{--@php $v = sprintf("%02d", $i); @endphp--}}
                                    {{--<option value="{{$v}}" @if($method==='PUT' && substr($data['TakeEndDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select> 시--}}
                            {{--<select name="TakeEndDatm_m" class="form-control">--}}
                                {{--<!--option value="">선택</option//-->--}}
                                {{--@foreach(range(0, 59) as $i)--}}
                                    {{--@php $v = sprintf("%02d", $i); @endphp--}}
                                    {{--<option value="{{$v}}" @if($method==='PUT' && substr($data['TakeEndDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select> 분--}}

                        {{--</td>--}}
                    {{--</tr>--}}

                    <tr>
                        <th colspan="1">사용여부 <span class="required">*</span></th>
                        <td colspan="3">
                            <div>
                                <input type="radio" name="IsUse" class="flat" value="Y" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                                <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>등록자</th>
                        <td>@if($method == 'PUT'){{ $data['wAdminName'] }}@endif</td>
                        <th>등록일</th>
                        <td>@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</td>
                    </tr>
                    <tr>
                        <th>최종수정자</th>
                        <td>@if($method == 'PUT'){{ $data['wAdminName2'] }}@endif</td>
                        <th>최종수정일</th>
                        <td>@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</td>
                    </tr>
                </table>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" style="position:absolute; right:0;" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var method = '{{ $method }}';
        var sitecode = '{{ $data['SiteCode'] }}';
        var mockpart = '{{ $data['MockPart'] }}'

        $(document).ready(function() {
            if(method == 'PUT'){
                selSiteCode(sitecode,mockpart);
            }
            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/predict/request') }}' + getQueryString());
            });

            // 등록,수정
            $regi_form.submit(function() {

                var _url = '{{ ($method == 'PUT') ? site_url('/predict/request/update') : site_url('/predict/request/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/predict/request') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');

            });

        });

        function selSiteCode(num, num2){
            if(num == 2001){
                $('#GroupCcd').val(0);
            } else {
                $('#GroupCcd').val('');
                $('#chkArea').html('');
            }

            if(num != null){
                url = "{{ site_url("/predict/request/getSerialAjax") }}";
                data = $('#regi_form').serialize();

                sendAjax(url,
                    data,
                    function(d){
                        var str = '';
                        if(num2 == ''){
                            for(var i=0; i < d.data.length; i++){
                                str += "<input type='checkbox' id='MockPart' name='MockPart[]' value='"+d.data[i].Ccd+"'><label for='MalIdx"+i+"'>"+d.data[i].CcdName+"</label> ";
                            }
                        } else {
                            var arrnum2 = num2.split(',');
                            for(var i=0; i < d.data.length; i++) {
                                var chkyn = '';
                                for (var j = 0; j < arrnum2.length; j++) {
                                    if(d.data[i].Ccd == arrnum2[j]){
                                        chkyn = 'checked';
                                    }
                                }
                                str += "<input type='checkbox' id='MockPart' name='MockPart[]' value='"+d.data[i].Ccd+"'" + chkyn + "><label for='MalIdx"+i+"'>"+d.data[i].CcdName+"</label> ";
                            }
                        }
                        $('#chkArea').html(str);
                    },
                    function(ret, status){
                        //alert(ret.ret_msg);
                    }, true, 'POST', 'json');
            }
        }
    </script>
@stop