@extends('lcms.layouts.master_modal')

@section('layer_title')
    과목 추가
@stop

@section('layer_header')
    <form class="form-table" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {{--{!! csrf_field() !!}--}}
        {{--{!! method_field($method) !!}--}}
        {{--<input type="hidden" name="idx" value="{{ $idx }}"/>--}}
        @endsection

        @section('layer_content')
            <div class="text-right mt-15 mb-5">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <table class="table table-bordered modal-table">
                <tr>
                    <th style="width:15%">운영사이트 <span class="required">*</span></th>
                    <td style="width:35%">
                        <select class="form-control" name="">

                        </select>
                    </td>
                    <th style="width:15%">카테고리 <span class="required">*</span></th>
                    <td style="width:35%">
                        <select class="form-control" name="">

                        </select>
                    </td>
                </tr>
                <tr>
                    <th style="width:15%" colspan="1">직렬 <span class="required">*</span></th>
                    <td style="width:35%" colspan="3">
                        <select class="form-control" name="" style="width: 283px;">

                        </select>
                    </td>
                </tr>
                <tr>
                    <th style="width:15%" colspan="1">과목 <span class="required">*</span></th>
                    <td style="width:35%" colspan="3">
                        <div class="text-right mb-20">* 운영사이트>카테고리 정보 기준으로 등록된 과목 노출</div>
                        <div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="1">사용여부 <span class="required">*</span></th>
                    <td colspan="3">
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" checked="checked"> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="is_use" class="flat" value="N"> <span class="flat-text">미사용</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>등록자</th>
                    <td></td>
                    <th>등록일</th>
                    <td></td>
                </tr>
                <tr>
                    <th>최종수정자</th>
                    <td></td>
                    <th>최종수정일</th>
                    <td></td>
                </tr>
            </table>
            <script type="text/javascript">
                var $regi_form = $('#_regi_form');

                $(document).ready(function() {
                    $regi_form.submit(function() {
                        var _url = '{{ site_url('/product/base/course/store') }}';

                        ajaxSubmit($regi_form, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $("#pop_modal").modal('toggle');
                                location.replace('{{ site_url('/product/base/course/') }}' + dtParamsToQueryString($datatable));
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