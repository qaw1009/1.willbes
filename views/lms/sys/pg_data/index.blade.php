@extends('lcms.layouts.master')

@section('content')
    <h5>
        - PG업체 데이터(가상계좌) 와 실결제 내역을 비교하는 메뉴입니다.
        <span class="red bold">(toss 관리자 사이트내 가상결제 방식으로 입금완료된 데이터입니다.)</span> -> 매일 30분단위 엑셀파일 크롤링 및 DB 삽입 처리
    </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group no-border-bottom">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">회원명, 회원식별자, 주문번호, 주문식별자 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_mid">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_mid" name="search_mid" title="search_mid">
                            <option value="">사이트Mid</option>
                            @foreach($site_mid as $row)
                                <option value="{{$row['PgMid'] }}">[{{ $row['PgMid'] }}] {{ $row['SiteName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_match" name="search_match" title="결제정보불일치">
                            <option value="">데이터비교</option>
                            <option value="Y" selected="selected">일치</option>
                            <option value="N" >불일치</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="valign-middle bg-info">No</th>
                    <th class="valign-middle bg-info group rowspan">Mid [사이트]</th>
                    <th class="valign-middle bg-info group rowspan">주문번호</th>
                    <th class="valign-middle bg-info group rowspan">회원명</th>
                    <th class="valign-middle bg-info group rowspan">PG결제상태</th>
                    <th class="valign-middle bg-info group rowspan">PG결제완료일</th>
                    <th class="valign-middle">주문상품식별자</th>
                    <th class="valign-middle">개별주문상태</th>
                    <th class="valign-middle bg-info">최종수집일시</th>
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
                rowsGroup: ['.rowspan'],
                lengthMenu : [ 50, 70, 100 ],
                ajax: {
                    'url' : '{{ site_url('/sys/pgData/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                            return '['+row.PgMid_Site+'] ' + row.SiteName;
                        }},
                    {'data' : 'OrderNo'},
                    {'data' : 'MemName'},
                    {'data' : 'PayStatus'},
                    {'data' : 'PayDate'},
                    {'data' : 'OrderProdIdx'},
                    {'data' : 'PaysStatusCcd_Name', 'render' : function(data, type, row, meta) {
                            return data !== '결제완료' ? '<b><font class="red">'+data+'</font></b>' : data;
                        }},
                    {'data' : 'RegDatm'},
                ]
            });
        });
    </script>
@stop
