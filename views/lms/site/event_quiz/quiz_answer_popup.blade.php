@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')

    <form class="form-horizontal" id="quiz_search_form" name="quiz_search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}

        <div class="form-group bg-green" style="padding: 15px; font-size:16px; font-weight: 700">퀴즈결과</div>

        <div class="form-group">
            <div class="col-md-4 form-inline">
                <select class="form-control" id="search_eqs_idx" name="search_eqs_idx">
                    <option value="">문제(그룹)명</option>
                    @foreach($data as $row)
                        <option value="{{ $row['EqsIdx'] }}">{{ $row['EqsGroupTitle'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <form class="form-horizontal" id="answer_list_form" name="answer_list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="answer_list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <colgroup>
                        <col style="">
                    </colgroup>
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">이름</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">참여일</th>
                        <th class="text-center">문제(그룹)명</th>
                        <th class="text-center">결과</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>


    </form>

    <script>
        var $datatable;
        var $quiz_search_form = $("#quiz_search_form");
        var $answer_list_table = $("#answer_list_table");

        $(document).ready(function() {
            $quiz_search_form.on('change', '#search_eqs_idx', function() {
                $datatable.draw();
            });

            $datatable = $answer_list_table.DataTable({
                info: true,
                pageLength: 20,
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' },
                ],
                ajax: {
                    'url' : '{{ site_url('/site/eventQuiz/listAnswerPopupAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($quiz_search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'MemName', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data;
                        }},
                    {'data' : 'MemId', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data;
                        }},
                    {'data' : 'AnswerDatm', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data;
                        }},
                    {'data' : 'EqsGroupTitle', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data;
                        }},
                    {'data' : 'MemAnswer', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data;
                        }},
                ]
            });

            // 엑셀 다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                formCreateSubmit('{{ site_url('/site/eventQuiz/answerExcel/?eq_idx=' . $eq_idx) }}', $quiz_search_form.serializeArray(), 'POST');
            });
        });

    </script>
@stop

@section('popup_footer')
@endsection