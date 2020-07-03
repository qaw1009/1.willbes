@extends('lcms.layouts.master')
@section('content')
    <h5>- 사용자가 검색한 내용을 확인하는 메뉴입니다. </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs(element('search_site_code',$arr_input), 'tabs_site_code', 'tab', true, [], true) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">분류</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select(element('search_site_code',$arr_input), 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', [], true) !!}
                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">대분류</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if(element('search_category',$arr_input) === $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_md_category" name="search_md_category">
                            <option value="">중분류</option>
                            @foreach($arr_m_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}" @if(element('search_md_category',$arr_input) === $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">설정 검색어</label>
                    <div class="col-md-11 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;" value="{{element('search_value',$arr_input)}}">
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr >
                    <th width="30" class="text-center">NO</th>
                    <th width="120" class="text-center">사이트</th>
                    <th width="150" class="text-center">분류</th>
                    <th class="text-center">설정 검색어</th>
                    <th width="150" class="text-center">설정기간</th>
                    <th width="90" class="text-center">연결구분</th>
                    <th width="90" class="text-center">정렬</th>
                    <th width="90" class="text-center">사용여부</th>
                    <th width="100" class="text-center">등록자</th>
                    <th width="120" class="text-center">등록일</th>
                    <th width="80" class="text-center">클릭수</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {

            $search_form.find('select[name="search_category"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_category"]').chained("#search_category");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-floppy-o mr-5"></i> 검색어 적용(캐쉬)', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-save-cache' },
                    @if(sess_data('admin_auth_data')['Role']['RoleIdx'] === '1030')
                    { text: '<i class="fa fa-floppy-o mr-5"></i> 캐쉬 확인', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-get-cache' },
                    @endif
                    { text: '<i class="fa fa-pencil mr-5"></i> 정렬순서 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-order-modify'},
                    { text: '<i class="fa fa-pencil mr-5"></i> 사용여부 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-use-modify'},
                    { text: '<i class="fa fa-pencil mr-5"></i> 검색어 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist'}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/search/searchWord/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName','class': 'text-center'},
                    {'data' : 'CateName','class': 'text-center'},
                    {'data' : null , 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-modify" data-idx="' + data.SwIdx + '"><b>' + row.SearchWord + '</b></a>';
                        }},
                    {'data' : null,'class': 'text-center', 'render' : function(data,type,row,meta) {
                            return row.StartDate.substr(0, 10) + ' ~ ' +row.EndDate.substr(0, 10);
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (row.TargetType =='S' ? '통합검색' : '개별링크')
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<input type="text" class="form-control" name="OrderNum[]" data-idx="'+ row.SwIdx +'"  value="'+row.OrderNum+'" style="width:30px" maxlength="3">';
                        }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="IsUse" value="Y" data-idx="'+ row.SwIdx +'" data-origin-is-use="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},//사용여부
                    {'data' : 'RegAdminName','class': 'text-center'},
                    {'data' : 'RegDatm','class': 'text-center'},
                    {'data' : 'Click_Cnt','class': 'text-center'}
                ]
            });

            $('.btn-regist').setLayer({
                'url' : '{{ site_url('/site/search/searchWord/create') }}',
                'width' : 900
                ,'modal_id' : 'word_create'
            });

            $list_table.on('click', '.btn-modify', function() {
                $('.btn-modify').setLayer({
                    'url' : '{{ site_url('/site/search/searchWord/create/') }}' + $(this).data('idx'),
                    'width' : 900
                    ,'modal_id' : 'word_create'
                });
            });

            // 사용 변경
            $('.btn-use-modify').on('click', function() {
                if (!confirm('사용 여부를 적용하시겠습니까?')) {
                    return;
                }
                var $is_use = $list_table.find('input[name="IsUse"]');
                var $params = {};
                var origin_val, this_val, this_use_val;

                $is_use.each(function(idx) {
                    this_use_val = $(this).filter(':checked').val() || 'N';
                    this_val = this_use_val;
                    origin_val = $(this).data('origin-is-use') ;
                    if (this_val !== origin_val) {
                        $params[$(this).data('idx')] = { 'IsUse' : this_use_val};
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                sendAjax('{{ site_url('/site/search/searchWord/redata') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });


            // 정렬순서 변경
            $('.btn-order-modify').on('click', function() {
                if (!confirm('정렬순서를 적용하시겠습니까?')) {
                    return;
                }
                var $order = $list_table.find('input[name="OrderNum[]"]');
                var $params = {};
                var this_idx,this_num;

                $order.each(function(idx) {
                    this_idx = $order.eq(idx).data('idx');
                    this_num = $order.eq(idx).val();
                    $params[this_idx] = this_num ;
                });

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                sendAjax('{{ site_url('/site/search/searchWord/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 수동캐시저장 버튼 클릭
            $('.btn-save-cache').on('click', function() {

                if($("#search_site_code").val() === '') {
                    alert("개별사이트를 선택 후 사용하여 주십시오.");
                    return;
                }
                if (!confirm('설정 검색어 캐시를 업데이트 하시겠습니까?\n(주의요망 : 자동 완성 검색어도 동시 업데이트 됨)')) {
                    return;
                }
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT'
                };

                sendAjax('{{ site_url('/site/search/searchWord/saveCache/') }}'+$("#search_site_code").val(), data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showError, false, 'POST');
            });

            //캐쉬확인
            $('.btn-get-cache').on('click', function() {
                $('.btn-get-cache').setLayer({
                    'url' : '{{ site_url('/site/search/searchWord/getCache/') }}'+$("#search_site_code").val(),
                    'width' : 900
                    ,'modal_id' : 'word_get'
                });
            });

        });
    </script>


@stop