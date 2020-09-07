@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "자동완성 단어 예외 처리" }}
@stop

@php
    $disabled = '';
    if($method == 'PUT') {
        $disabled = "disabled";
    }
@endphp

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form_modal" name="regi_form_modal" method="POST" onsubmit="return false;" >
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="SwaeIdx" id="SwIdx" value="">
        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="SiteCode">운영사이트 <span class="required">*</span></label>
                <div class="col-md-4">
                    {!! html_site_select($data['SiteCode'], 'SiteCode', 'SiteCode', '', '운영 사이트', 'required', $disabled, true, $arr_site_code) !!}
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="ExceptWord">예외단어<span class="required">*</span></label>
                <div class="col-md-8 form-inline item">
                    <div class="item inline-block">
                        <input type="text" id="ExceptWord" name="ExceptWord" maxlength="100" value="{{ $data['ExceptWord'] }}" style="width:270px" title="예외 단어"  class="form-control" required="required">
                        &nbsp;&nbsp;
                        <input type="radio" name="ExceptType" id="ExceptType0" value="E" class="flat" required="required" @if($data['LecTypeCcd']=='' || $data['LecTypeCcd']=='E') checked="checked"@endif> 단어만 예외
                        &nbsp;&nbsp;
                        <input type="radio" name="ExceptType" id="ExceptType1" value="L" class="flat" required="required" @if($data['LecTypeCcd']=='L') checked="checked"@endif> 단어포함 모두예외
                    </div>
                </div>
                <div class="col-md-2 form-inline item">
                    <button type="submit" class="btn btn-success"> 저 장 </button>
                    <!--<button type="submit" class="btn btn-primary btn-search" id="btn_search"> 검 색 </button>//-->
                </div>
            </div>

            <div class="form-group form-group-sm item">
                <div class="col-md-12 form-inline text-center">
                    <b>* 예외 단어를 프론트 사이트에 적용하려면 반드시<font color="red">'검색어 적용(캐쉬)'</font> 버튼을 클릭해야 합니다.</b>
                </div>
            </div>
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">NO</th>
                            <th width="20%" class="text-center">사이트</th>
                            <th>예외단어</th>
                            <th width="15%" class="text-center">예외타입</th>
                            <th width="12%" class="text-center">등록자</th>
                            <th width="15%" class="text-center">등록일</th>
                            <th width="5%" class="text-center">삭제</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $regi_form_modal = $('#regi_form_modal');
                var $list_ajax_table_modal = $('#list_ajax_table_modal');

                $(document).ready(function() {

                    $datatable_modal = $list_ajax_table_modal.DataTable({
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/site/search/searchWord/listExceptAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($regi_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},
                            {'data' : 'SiteName','class': 'text-center'},
                            {'data' : 'ExceptWord' , 'render' : function(data, type, row, meta) {
                                    return '<b>' + data.replace(/^\s+|\s+$/gm,'$nbsp;') + '</b>';
                                }},
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return (row.ExceptType == 'E' ? '단어만 예외' : '단어포함 모두예외' );
                                }},
                            {'data' : 'RegAdminName','class': 'text-center'},
                            {'data' : 'RegDatm','class': 'text-center'},
                            {'data' : null,'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return '<a href="#none" class="del_except" data-idx="'+ row.SwaeIdx+'"><i class="fa fa-times red"></i></a>';
                                }},
                        ]
                    });

                    $regi_form_modal.submit(function() {
                        var _url = '{{ site_url('/site/search/searchWord/storeExcept') }}';
                        ajaxSubmit($regi_form_modal, _url, function(ret) {
                            if(ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $datatable_modal.draw();
                                $regi_form_modal.resetForm();
                            }
                        }, showValidateError, null, false, 'alert');
                    });

                    $regi_form_modal.on('click', '.del_except', function () {
                        var data = {
                            '{{ csrf_token_name() }}' : $regi_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'SwaeIdx' : $(this).data('idx')
                        };
                        sendAjax('{{ site_url('/site/search/searchWord/deleteExcept') }}', data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $datatable_modal.draw();
                            }
                        }, showError, false, 'POST');

                    });
                });
            </script>
        @stop

        @section('add_buttons')

        @endsection

        @section('layer_footer')
    </form>
@endsection