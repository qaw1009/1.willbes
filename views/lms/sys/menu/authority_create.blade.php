@extends('lcms.layouts.master_modal')

@section('layer_title')
    관리자메뉴별 접근권한 설정
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="menu_idx" value="{{ $menu_idx }}"/>
@endsection

@section('layer_content')
            <div class="x_title text-left">
                <span class="required">*</span> <strong>대상 메뉴 :</strong> {{$menu_route}} [{{$menu_idx}}]
            </div>
            {!! form_errors() !!}

            <div class="form-group form-group-bordered bg-odd">
                <label class="control-label col-md-1">통합검색
                </label>
                <div class="col-md-3 form-inline">
                    <input type="text" id="search_value" name="search_value" class="form-control input-sm">
                    이름, 아이디
                </div>
                <label class="control-label col-md-1">조건
                </label>
                <div class="col-md-7 form-inline">
                    <select class="form-control" name="search_dept">
                        <option value="">소속</option>
                        @foreach($dept_ccd as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" name="search_position">
                        <option value="">직급</option>
                        @foreach($position_ccd as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" name="search_role">
                        <option value="">권한유형</option>
                        @foreach($role_list as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" id="search_is_use" name="search_is_use">
                        <option value="">사용여부</option>
                        <option value="Y">사용</option>
                        <option value="N">미사용</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 form-inline">
                    <p class="form-control-static">
                        <input type="checkbox" class="flat" name="search_is_write" value="Y"> 편집권한부여
                        <input type="checkbox" class="flat" name="search_is_excel" value="Y"> 엑셀다운로드권한부여
                        <input type="checkbox" class="flat" name="search_is_masking" value="Y"> 마스킹제거
                    </p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <p class="form-control-static">
                        <button type="submit" class="btn btn-primary btn-sm _btn-search mr-0" id="_btn_search">검 색</button>
                    </p>
                </div>
            </div>
    </form>

    <form class="form-horizontal" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="menu_idx" value="{{ $menu_idx }}"/>
            <div class="mt-10 text-right">
                <span class="required">*마스킹 처리 항목 : 휴대폰번호, 이메일, 집주소</span>
            </div>

            <div class="row mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 30px">NO</th>
                            <th>이름(아이디)</th>
                            <th>소속/직급</th>
                            <th>권한유형</th>
                            <th style="width: 40px">사용여부</th>
                            <th style="width: 80px">등록일</th>
                            <th style="width: 80px">편집가능 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="check-write" /></th>
                            <th style="width: 150px">엑셀다운로드가능 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="check-excel" /></th>
                            <th style="width: 95px">마스킹제거 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="check-masking" /></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#_search_form');
                var $regi_form_modal = $('#_regi_form');
                var $list_table_modal = $('#_list_ajax_table');

                $(document).ready(function(){
                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        paging: false,
                        ajax: {
                            'url' : '{{ site_url('/sys/menu/authorityListAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), {});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return (meta.row+1);
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.wAdminName + '('+ row.wAdminId +')';
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.DeptName + '/'+ row.PositionName;
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.RoleName;
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return (row.wIsUse === 'Y' ? '사용' : '<font color="red">미사용</font>');
                                }},
                            {'data' : 'wRegDatm'},
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return '<input type="checkbox" class="flat check-write" data-admin="'+ row.wAdminIdx + '|' + row.RoleIdx +'" data-idx="'+ row.SaaIdx +'" name="is_write" value="Y" '+ (row.IsWrite === 'Y' ? 'checked=checked' : '') +'>';
                                }},
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return '<input type="checkbox" class="flat check-excel" name="is_excel" value="Y" '+ (row.IsExcel === 'Y' ? 'checked=checked' : '') +'>';
                                }},
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return '<input type="checkbox" class="flat check-masking" name="is_masking" value="Y" '+ (row.IsMasking === 'Y' ? 'checked=checked' : '') +'>';
                                }},
                        ]
                    });

                    $('.btn-save').on('click', function() {

                        if(!confirm("권한을 적용하시겠습니까?")) {
                            return;
                        }
                        var $menu_idx = $regi_form_modal.find('input[name="menu_idx"]').val();
                        var $params = {'menu_idx' : $menu_idx , 'authority' : {}, 'saa_idx' : []};

                        var $is_write = $list_table_modal.find('input[name="is_write"]')
                        var $is_excel = $list_table_modal.find('input[name="is_excel"]')
                        var $is_masking = $list_table_modal.find('input[name="is_masking"]')

                        $is_write.each(function(idx){
                            this_idx = $(this).data('idx') || 'N';
                            this_admin = $(this).data('admin');
                            this_write = $(this).filter(':checked').val() || 'N';
                            this_excel = $is_excel.eq(idx).filter(':checked').val() || 'N';
                            this_masking = $is_masking.eq(idx).filter(':checked').val() || 'N';
                            if(this_write === 'Y' || this_excel === 'Y' || this_masking === 'Y') {
                                $params['authority'][this_admin] = {'IsWrite' : this_write, 'IsExcel' : this_excel, 'IsMasking' : this_masking};
                            }
                            // 삭제할 SaaIdx 값
                            if(this_idx !== 'N') {
                                $params['saa_idx'].push(this_idx);
                            }
                        });

                        var data = {
                            '{{ csrf_token_name() }}' : $regi_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'params' : JSON.stringify($params)
                        };

                        sendAjax('{{ site_url('/sys/menu/authorityStore') }}', data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $('#pop_modal').modal("toggle");
                            }
                        }, showError, false, 'POST');
                    });

                    $regi_form_modal.on('ifChanged', '#_is_all', function() {
                        $input_name =  $('.'+$(this).val());
                        if ($(this).prop('checked') === true) {
                            $input_name.iCheck('check');
                        } else {
                            $input_name.iCheck('uncheck');
                        }
                    });
                });
            </script>

@stop

@section('add_buttons')
            <button type="button" class="btn btn-success btn-save">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection