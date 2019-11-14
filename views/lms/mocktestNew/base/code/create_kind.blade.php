@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{ ($method == 'PUT') ? '직렬 수정' : '직렬 추가' }}
@stop

@section('layer_header')
    <form class="form-table" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['MmIdx'] : '' }}">
        @endsection

        @section('layer_content')
            <div class="text-right mt-15 mb-5">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <table class="table table-bordered">
                <tr>
                    <th style="width:15%">운영사이트 <span class="required">*</span></th>
                    <td style="width:35%">
                        {!! html_site_select($def_site_code, 'kind_site', 'site', 'show', '운영 사이트', '', '', false, $arr_site_code) !!}
                    </td>
                    <th style="width:15%">카테고리 <span class="required">*</span></th>
                    <td style="width:35%">
                        <select class="form-control" id="kind_cateD1" name="cateD1">
                            <option value="">카테고리 선택</option>
                            @foreach($arr_base['cateD1'] as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="1">직렬 <span class="required">*</span></th>
                    <td colspan="3">
                        <select class="form-control" style="width: 283px;" id="kind_cateD2" name="cateD2">
                            <option value="">직렬 선택</option>
                            @foreach($arr_base['cateD2'] as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="1">사용여부 <span class="required">*</span></th>
                    <td colspan="3">
                        <div>
                            <input type="radio" name="isUse" class="flat" value="Y" required="required" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="isUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                        </div>
                    </td>
                    {{--<th>정렬</th>--}}
                    {{--<td class="form-inline">--}}
                    {{--<input type="text" class="form-control mr-10" name="orderNum" value="@if($method == 'PUT') {{ ($data['OrderNum'] == '0') ? '' :$data['OrderNum'] }} @endif" style="width:50px;"> 미입력시 마지막 DP--}}
                    {{--</td>--}}
                </tr>
                <tr>
                    <th>등록자</th>
                    <td>@if($method == 'PUT') {{ $data['RegAdminName'] }} @endif</td>
                    <th>등록일</th>
                    <td>@if($method == 'PUT') {{ $data['RegDatm'] }} @endif</td>
                </tr>
                <tr>
                    <th>최종수정자</th>
                    <td>@if($method == 'PUT') {{ $data['UpdAdminName'] }} @endif</td>
                    <th>최종수정일</th>
                    <td>@if($method == 'PUT') {{ $data['UpdDatm'] }} @endif</td>
                </tr>
            </table>

            <script type="text/javascript">
                var $regi_form = $('#regi_form');

                $(document).ready(function() {
                    $regi_form.submit(function() {
                        var _url = '{{ ($method == 'PUT') ? site_url('/mocktestNew/base/code/updateKind') : site_url('/mocktestNew/base/code/storeKind') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/mocktestNew/base/code/') }}' + dtParamsToQueryString($datatable));
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    // Select 메뉴 정리
                    (function () {
                        @if($method == 'PUT') // 수정
                        $regi_form.find('#kind_site').val({{ $data['SiteCode'] }}).prop('disabled', true);
                        $regi_form.find('#kind_cateD1').val({{ $data['CateCode'] }}).prop('disabled', true);
                        $regi_form.find('#kind_cateD2').val({{ $data['Ccd'] }}).prop('disabled', true);
                        @else // 등록
                        // 이미 등록된 직렬 disable
                        $('#kind_cateD1').on('change', function () {
                            var that = $(this);
                            var mCateUsed = [];

                            $datatable.column(2).data().each(function (v) {
                                if( that.val() == $(v).data('gcate') ) {
                                    mCateUsed.push($(v).data('mcate'));
                                }
                            });

                            $regi_form.find('#kind_cateD2').val('');
                            $regi_form.find('#kind_cateD2 > option').each(function () {
                                $(this).prop('disabled', false).removeClass('aero');

                                if( $.inArray(parseInt($(this).attr('value')), mCateUsed) !== -1 ) {
                                    $(this).prop('disabled', true).addClass('aero');
                                }
                            });
                        });
                        $regi_form.find('#kind_cateD1').chained('#kind_site');
                        $regi_form.find('#kind_cateD2').chained('#kind_cateD1');
                        @endif
                    })();
                });
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection