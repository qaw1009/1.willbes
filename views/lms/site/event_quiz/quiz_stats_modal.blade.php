@extends('lcms.layouts.master_modal')

@section('layer_title')
    문항별 회원통계
@stop

@section('layer_header')
<form class="form-horizontal" id="_quiz_search_form" name="_quiz_search_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" name="search_eq_idx" value="{{ $arr_base['eq_idx'] }}">
@endsection

    @section('layer_content')
        <div class="form-group form-group-sm">
            <div class="col-md-4 form-inline">
                <select class="form-control" id="search_eqs_idx" name="search_eqs_idx">
                    <option value="">문제(그룹)명</option>
                    @foreach($arr_selectbox_data as $row)
                        <option value="{{ $row['EqsIdx'] }}">{{ $row['EqsGroupTitle'] }}</option>
                    @endforeach
                </select>
                <select class="form-control" id="search_orderby" name="search_orderby">
                    <option value="">정렬변경</option>
                    <option value="CountMemberRightAnswer">정답개수</option>
                </select>
            </div>
            <div class="form-inline text-right">
                <button type="button" class="btn btn-sm btn-link btn-location">퀴즈결과 페이지 이동</button>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <table id="_list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
                <colgroup>
                    <col style="">
                </colgroup>
                <thead class="bg-white-gray">
                <tr>
                    <th>NO</th>
                    <th class="rowspan">문제(그룹)명 (문제개수)</th>
                    <th>이름</th>
                    <th>아이디</th>
                    <th>완료여부</th>
                    <th>문제푼개수</th>
                    <th>정답개수</th>
                    <th>오답개수</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            var $datatable_modal;
            var $search_form_modal = $('#_quiz_search_form');
            var $list_table_modal = $('#_list_ajax_table');

            $(document).ready(function() {
                $datatable_modal = $list_table_modal.DataTable({
                    serverSide: true,
                    buttons: [
                        {text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel mr-10'},
                    ],
                    ajax: {
                        'url' : '{{ site_url('/site/eventQuiz/lisAjaxQuizStatsModal') }}',
                        'type' : 'POST',
                        'data' : function(data) {
                            return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                        }
                    },
                    rowsGroup: ['.rowspan'],
                    columns: [
                        {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }},
                        {'data' : 'EqsGroupTitle'},
                        {'data' : 'MemName'},
                        {'data' : 'MemId'},
                        {'data' : 'FinishType'},
                        {'data' : 'CountMemberAnswer'},
                        {'data' : 'CountMemberRightAnswer'},
                        {'data' : 'CountMemberWrongAnswer'},
                    ],
                });

                $("#search_eqs_idx,#search_orderby").on('change', function () {
                    $datatable_modal.draw();
                });

                // 엑셀 다운로드
                $('.btn-excel').on('click', function(event) {
                    event.preventDefault();
                    formCreateSubmit('{{ site_url('/site/eventQuiz/statsExcel/'.$arr_base['eq_idx']) }}', $search_form_modal.serializeArray(), 'POST');
                });

                $('.btn-location').on('click', function(event) {
                    var _replace_url = '{{ site_url('site/eventQuiz/quizAnswerModal/'.$arr_base['eq_idx']) }}';
                    replaceModal(_replace_url,'');
                });
            });
        </script>
    @stop

@section('add_buttons')
@endsection

@section('layer_footer')
</form>
@endsection