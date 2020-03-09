@extends('lcms.layouts.master_modal')

@section('layer_title')
    강사변경내역
@stop

@section('layer_header')
    <form class="form-horizontal" id="_prof_assign_log_form" name="_prof_assign_log_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
@endsection

@section('layer_content')
    <div class="form-group bdt-line bg-odd">
        <label class="control-label col-md-2" for="search_value">과정/과목/교수명
        </label>
        <div class="col-md-5">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-2 pl-0">
            <button type="button" name="_btn_prof_assign_log_search" class="btn btn-sm btn-primary">검색</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="_list_prof_assign_log_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="searching">과정</th>
                        <th class="searching">과목</th>
                        <th class="searching">교수</th>
                        <th class="searching">단과반명</th>
                        <th>변경자</th>
                        <th>변경일</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->remaining }}</td>
                        <td>{{ $row['CourseName'] }}</td>
                        <td>{{ $row['SubjectName'] }}</td>
                        <td>{{ $row['wProfName'] }}</td>
                        <td class="blue">{{ $row['ProdName'] }}</td>
                        <td>{{ $row['RegName'] }}</td>
                        <td>{{ $row['RegDatm'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $_assign_log_form = $('#_prof_assign_log_form');
        var $datatable_assign_log;
        var $list_assign_log_table = $('#_list_prof_assign_log_table');

        $(document).ready(function() {
            $datatable_assign_log = $list_assign_log_table.DataTable({
                ajax: false,
                paging: true,
                pageLength: 10,
                lengthChange: false,
                searching: true
            });

            // 검색
            $_assign_log_form.on('keyup change', 'input', function() {
                datatableSearching();
            });

            $_assign_log_form.on('click', 'button[name="_btn_prof_assign_log_search"]', function() {
                datatableSearching();
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable_assign_log
                .columns('.searching').flatten().search($_assign_log_form.find('input[name="search_value"]').val())
                .draw();
        }
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection