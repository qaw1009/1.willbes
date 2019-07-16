@extends('lcms.layouts.master')
@section('content')
    <h5>- 광고 계약을 관리하는 메뉴입니다. </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">통합검색</label>
                    <div class="col-md-5 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:150px;"> 계약코드, 계약명, 업체정보 검색 가능
                    </div>
                    <label class="control-label col-md-1" for="search_type">계약일</label>
                    <div class="col-md-5 form-inline">
                        <select name="search_date_type" class="form-control mr-10">
                            <option value='StartDate'>시작일</option>
                            <option value='EndDate'>종료일</option>
                        </select>
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="">
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
                    <tr>
                        <th width="30">NO</th>
                        <th width="220">광고계약명</th>
                        <th width="150">광고계약기간</th>
                        <th>업체정보</th>
                        <th width="80">업체담당자</th>
                        <th width="120">광고집행금액</th>
                        <th>계약내용</th>
                        <th width="80">등록자</th>
                        <th width="120">등록일</th>
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

                // 페이징 번호에 맞게 일부 데이터 조회
                $datatable = $list_table.DataTable({
                    serverSide: true,
                    buttons: [
                        //{ text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                        { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist', action: function(e, dt, node, config) {
                               // location.href = '{{site_url('/site/gateway/contract/create')}}' + dtParamsToQueryString($datatable);
                            }}
                    ],
                    ajax: {
                        'url' : '{{ site_url('/site/marketing/contract/listAjax') }}',
                        'type' : 'POST',
                        'data' : function(data) {
                            return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                        }
                    },
                    columns: [

                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }},
                        //{'data' : 'ContName'},
                        {'data' : null, 'render' : function(data, type, row, meta){
                                return '<a href="javascript:;" class="btn-modify" data-idx="'+data.ContIdx+'"><u>'+ data.ContName +'</u></a>';
                            }},
                        {'data' : null, 'render' : function(data, type, row, meta) {
                                return data.StartDate + ' ~ '+ data.EndDate;
                            }},
                        {'data' : 'CompInfo'},
                        {'data' : 'CompPerson'},
                        //{'data' : 'ExecutePrice'},
                        {'data' : 'ExecutePrice', 'render' : function(data, type, row, meta) {
                                return addComma(data) +" 원";
                            }},
                        {'data' : 'Content'},
                        {'data' : 'RegAdminName'},
                        {'data' : 'RegDatm'},
                    ]
                });

                $('.btn-regist').setLayer({
                    'url' : '{{site_url('/site/marketing/contract/create')}}',
                    'width' : 900,
                    'modal_id' : 'contract_create'
                });

                $list_table.on('click', '.btn-modify', function() {
                    $('.btn-modify').setLayer({
                        'url' : '{{site_url('/site/marketing/contract/create/')}}' + $(this).data('idx'),
                        'width' : 900,
                        'modal_id' : 'contract_create'
                    });
                });


            });
        </script>
@stop