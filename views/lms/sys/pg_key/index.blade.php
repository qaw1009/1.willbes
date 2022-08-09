@extends('lcms.layouts.master')

@section('content')
    <h5>- PG키 정보를 관리하는 메뉴입니다. <span class="red bold">(PG결제 오류가 발생할 수 있습니다. 키 등록/수정에 주의하여 주십시오.)</span></h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group no-border-bottom">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_pg_driver" name="search_pg_driver" title="PG드라이버">
                            <option value="">PG드라이버</option>
                            @foreach($arr_pg_ccd as $val)
                                <option value="{{ str_first_pos_after($val, ':') }}">{{ str_first_pos_before($val, ':') }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use" title="사용여부">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
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
            <table id="list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="valign-middle">No</th>
                    <th class="searching_pg_driver valign-middle">PG드라이버</th>
                    <th class="searching valign-middle">상점아이디</th>
                    <th class="searching valign-middle">상점명</th>
                    <th class="valign-middle">클라이언트키</th>
                    <th class="valign-middle">시크릿키</th>
                    <th class="valign-middle">상점키</th>
                    <th class="searching_is_use valign-middle">사용여부</th>
                    <th class="valign-middle">등록자</th>
                    <th class="valign-middle">등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->remaining }}</td>
                        <td>{{ $row['PgDriver'] }}</td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['PgKeyIdx'] }}"><u class="blue">{{ $row['PgMid'] }}</u></a></td>
                        <td>{{ $row['PgMName'] }}</td>
                        <td>{{ $row['ClientKey'] }}</td>
                        <td>{{ $row['SecretKey'] }}</td>
                        <td>{{ $row['MertKey'] }}</td>
                        <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                            <span class="hide">{{ $row['IsUse'] }}</span>
                        </td>
                        <td>{{ $row['RegAdminName'] }}</td>
                        <td>{{ $row['RegDatm'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> PG키 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/sys/pgKey/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/sys/pgKey/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_pg_driver').search($search_form.find('select[name="search_pg_driver"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .draw();
        }
    </script>
@stop
