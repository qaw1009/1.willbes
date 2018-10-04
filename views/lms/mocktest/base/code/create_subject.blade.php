@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{ ($method == 'PUT') ? '과목 수정' : '과목 추가' }}
@stop

@section('layer_header')
    <form class="form-table form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $baseDB['MmIdx'] }}">
        <input type="hidden" name="sjType" value="{{ $_GET['sjType'] }}">
        @endsection

        @section('layer_content')
            <div class="text-right mt-15 mb-5">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <table class="table table-bordered modal-table">
                <tr>
                    <th style="width:15%">운영사이트 <span class="required">*</span></th>
                    <td style="width:35%">
                        {!! html_site_select('', 'subject_site', 'site') !!}
                    </td>
                    <th style="width:15%">카테고리 <span class="required">*</span></th>
                    <td style="width:35%">
                        <select class="form-control" id="subject_cateD1" name="cateD1">
                            <option value="">카테고리 선택</option>
                            @foreach($cateD1 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="1">직렬 <span class="required">*</span></th>
                    <td colspan="3">
                        <select class="form-control" style="width: 283px;" id="subject_cateD2" name="cateD2">
                            <option value="">직렬 선택</option>
                            @foreach($cateD2 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="1">과목 <span class="required">*</span></th>
                    <td colspan="3">
                        <div class="text-right mb-10">* 운영사이트>카테고리 정보 기준으로 등록된 과목 노출</div>
                        <div class="">
                            @foreach($subjectDB as $row)
                                <div class="col-xs-4 checkbox">
                                    <input type="checkbox" class="flat" id="subject_idx_{{ $loop->index }}" name="subjectIdx[]" value="{{ $row['sSubjectIdx'] }}"
                                           @if(!empty($row['IsUse'] == 'Y')) checked="checked" @endif>
                                    <label for="subject_idx_{{ $loop->index }}" class="input-label">{{ $row['sSubjectName'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                {{--<tr>--}}
                {{--<th colspan="1">사용여부 <span class="required">*</span></th>--}}
                {{--<td colspan="3">--}}
                {{--<div>--}}
                {{--<input type="radio" name="isUse" class="flat" value="Y" required="required" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>--}}
                {{--<input type="radio" name="isUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>--}}
                {{--</div>--}}
                {{--</td>--}}
                {{--</tr>--}}
                <tr>
                    <th>등록자</th>
                    <td>{{ $adminInfo['RegAdminIdx'] }}</td>
                    <th>등록일</th>
                    <td>{{ $adminInfo['RegDatm'] }}</td>
                </tr>
                <tr>
                    <th>최종수정자</th>
                    <td>{{ $adminInfo['UpdAdminIdx'] }}</td>
                    <th>최종수정일</th>
                    <td>{{ $adminInfo['UpdDatm'] }}</td>
                </tr>
            </table>

            <script type="text/javascript">
                var $regi_form = $('#regi_form');

                $(document).ready(function() {
                    $regi_form.submit(function () {
                        var _url = '{{ site_url('/mocktest/baseCode/storeSubject') }}';

                        ajaxSubmit($regi_form, _url, function (ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/mocktest/baseCode/') }}' + dtParamsToQueryString($datatable));
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    // select 메뉴 정리
                    $regi_form.find('#subject_site').val({{ $baseDB['SiteCode'] }}).prop('disabled', true);
                    $regi_form.find('#subject_cateD1').val({{ $_GET['gcate'] }}).prop('disabled', true);
                    $regi_form.find('#subject_cateD2').val({{ $baseDB['CateCode'] }}).prop('disabled', true);
                });
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection