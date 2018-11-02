@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 성적을 통합관리하기 위해 그룹정보를 생성하는 메뉴입니다. (모의고사가 1개라도 성적 산출을 위해 모의고사 그룹등록 필요)</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2>모의고사 그룹등록</h2>
        </div>
        <div class="x_content">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data[''] : '' }}">

                <table class="table table-bordered">
                    <tr>
                        <th style="width:15%">모의고사 그룹명 <span class="required">*</span></th>
                        <td style="width:35%">
                            <input type="text" class="form-control" name="GroupName" value="@if($method == 'PUT'){{ $data['GroupName'] }}@endif">
                        </td>
                        <th style="width:15%">모의고사 그룹코드</th>
                        <td style="width:35%">@if($method == 'PUT'){{ $data['MgIdx'] }}@endif</td>
                    </tr>
                    <tr>
                        <th colspan="1">
                            모의고사선택 <span class="required">*</span>
                            <button type="button" class="btn btn-xs btn-primary ml-10 mt-5" id="act-searchGoods">선택</button>
                        </th>
                        <td colspan="3">
                            <div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>중복응시여부 <span class="required">*</span></th>
                        <td>
                            <input type="radio" name="IsDup" class="flat" value="Y" required="required" @if(($method == 'POST' || $method == 'PUT' && $data['IsDup'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="IsDup" class="flat" value="N" @if($method == 'PUT' && $data['IsDup'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                            <span style="position: relative; top: 2px; left: 8px;">[그룹핑된 모의고사간 교차 응시여부]</span>
                        </td>
                        <th>사용여부 <span class="required">*</span></th>
                        <td>
                            <input type="radio" name="IsUse" class="flat" value="Y" required="required" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">설명</th>
                        <td colspan="3">
                            <textarea name="GroupDesc" class="form-control" style="width: 100%; height: 70px;">@if($method == 'PUT'){{ $data['GroupDesc'] }}@endif</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>등록자</th>
                        <td>@if($method == 'PUT'){{ @$adminName[$data['RegAdminIdx']] }}@endif</td>
                        <th>등록일</th>
                        <td>@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</td>
                    </tr>
                    <tr>
                        <th>최종수정자</th>
                        <td>@if($method == 'PUT'){{ @$adminName[$data['UpdAdminIdx']] }}@endif</td>
                        <th>최종수정일</th>
                        <td>@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</td>
                    </tr>
                </table>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 모의고사 검색창 오픈
            $('#act-searchGoods').on('click', function() {
                $('#act-searchGoods').setLayer({
                    'url': '{{ site_url() }}' + 'mocktest/regGroup/searchGoods',
                    'width': 900
                });
            });

            // 기본정보 등록,수정
            $regi_form.submit(function() {
                var _url = '{{ ($method == 'PUT') ? site_url('/mocktest/regGroup/update') : site_url('/mocktest/regGroup/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regGroup') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

        });
    </script>
@stop