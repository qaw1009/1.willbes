@extends('lcms.layouts.master')
@section('page_title')
    시스템 공통관리 <i class="fa fa-angle-right"></i> <span class="blue">공통코드관리</span>
@stop

@section('content')
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <label class="control-label col-md-1" for="search_value">선택조회</label>
                    <div class="col-md-3">
                        <select class="form-control" id="search_keyword" name="search_keyword">
                            <option value="">선택</option>
                            <option value="1234">1234</option>
                            <option value="홍길동">홍길동</option>
                            <option value="테스트">테스트</option>
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
                    <th class="no-sort">No</th>
                    <th>Idx</th>
                    <th class="searching rowspan">Title</th>
                    <th class="searching rowspan">Name</th>
                    <th>RegDate</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $row['idx'] }}</td>
                        <td>{{ $row['title'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['regi_date'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');

        $(document).ready(function() {
            // 전체 데이터 조회
            $datatable = $('#list_table').DataTable({
                ajax: false,
                //ordering: true,
                //order: [[1, 'desc']],
                paging: false,
                searching: true,
                rowsGroup: ['.rowspan'],
            });

            $search_form.submit(function() {
                $datatable
                    .column(2)
                    .search($('#search_value').val())
                    .column(3)
                    .search($('#search_keyword').val())
                    .draw();
            });

            $('#search_keyword, #search_value').on('keyup change', function() {
/*                // 다수의 컬럼을 동일한 검색어로 검색
                $datatable
                    .columns('.searching')
                    .data()
                    .flatten()
                    .search($(this).val())
                    .draw();*/
/*                // 각각의 컬럼을 상이한 검색어로 검색
                $datatable
                    .column(2)
                    .search($('#search_value').val())
                    .column(3)
                    .search($('#search_keyword').val())
                    .draw();*/
            });
        });
    </script>
@stop
