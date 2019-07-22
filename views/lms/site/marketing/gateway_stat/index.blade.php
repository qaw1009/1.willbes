@extends('lcms.layouts.master')
@section('content')
    <h5>- 광고 통계를 확인 할 수 있는 메뉴입니다.  </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_type">통합검색</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:300px;"> 계약명, 광고명
                    </div>
                    <label class="control-label col-md-1" for="search_gwtype_ccd">광고형태</label>
                    <div class="col-md-5 form-inline">
                        <select name="search_gwtype_ccd" id="search_gwtype_ccd" class="form-control mr-10">
                            <option value=''>선택</option>
                            @foreach($adType_ccd as $key=>$val)
                                <option value='{{$key}}'>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <!--div class="form-group">
                    <label class="control-label col-md-1" for="search_type">기간검색</label>
                    <div class="col-md-5 form-inline">
                        <select name="search_date_type" class="form-control mr-10">
                            <option value='StartDate'>전체기간</option>
                            <option value='EndDate'>종료일</option>
                        </select>
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="">
                    </div>
                </div//-->
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
                    <th class="rowspan" width="220">계약명</th>
                    <th class="rowspan" width="220">광고명</th>
                    <th class="rowspan" width="100">광고형태</th>
                    <th class="rowspan" width="70">집행금액</th>
                    <th width="110">접속사이트</th>
                    <th width="60">클릭수</th>
                    <th width="60">회원가입수</th>
                    <th width="60">장바구니수</th>
                    <th width="60">결제건수</th>
                    <th width="80">결제금액</th>
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
                paging: false,
                buttons: [
                    //{ text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                ],
                ajax: {
                    'url' : '{{ site_url('/site/marketing/gatewayStat/gatewayStatListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'ContName', 'render' : function(data, type, row, meta){
                            return '<a href="javascript:;" class="btn-cont-modify" data-idx="'+row.ContIdx+'"><u>'+ data +'</u></a>';
                        }},
                    {'data' : 'GwName', 'render' : function(data, type, row, meta){
                            return '<a href="javascript:;" class="btn-modify" data-idx="'+row.GwIdx+'"><u>['+row.GwIdx+'] '+ row.GwName +'</u></a>';
                        }},
                    {'data' : 'GwTypeCcd_Name'},
                    {'data' : 'gwPrice', 'render' : function(data, type, row, meta) {
                            return addComma(data) +" 원";
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'ClickCnt', 'render' : function(data, type, row, meta) {
                            return "<B>"+addComma(data) +"";
                        }},
                    {'data' : 'MemCnt', 'render' : function(data, type, row, meta) {
                            return "<B>"+addComma(data) +"";
                        }},
                    {'data' : 'CartCnt', 'render' : function(data, type, row, meta) {
                            return "<B>"+addComma(data) +"";
                        }},
                    {'data' : 'OrderCnt', 'render' : function(data, type, row, meta) {
                            return "<B>"+addComma(data) +"";
                        }},
                    {'data' : 'OrderPrice', 'render' : function(data, type, row, meta) {
                            return "<B>"+addComma(data) +" 원";
                        }},
                ]
            });

            $list_table.on('click', '.btn-modify', function() {
                $('.btn-modify').setLayer({
                    'url' : '{{site_url('/site/marketing/gateway/create/')}}' + $(this).data('idx'),
                    'width' : 900,
                    'modal_id' : 'gateway_create'
                });
            });

            $list_table.on('click', '.btn-cont-modify', function() {
                $('.btn-cont-modify').setLayer({
                    'url' : '{{site_url('/site/marketing/contract/create/')}}' + $(this).data('idx'),
                    'width' : 900,
                    'modal_id' : 'contract_create'
                });
            });
        });
    </script>
@stop