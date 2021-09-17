@extends('lcms.layouts.master_modal')

@section('layer_title')
    퀴즈결과 (퀴즈완료)
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
                    <option value="{{ $row['EqsIdx'] }}" {{(empty($arr_base['eqs_idx']) === false && $arr_base['eqs_idx'] == $row['EqsIdx'] ? 'selected="selected"' : '')}}>{{ $row['EqsGroupTitle'] }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-sm btn-info btn-show-question ml-10">등록된 질문 보기</button>
        </div>
        <div class="form-inline text-right">
            <button type="button" class="btn btn-sm btn-link btn-location">문항별 통계페이지 이동</button>
        </div>
    </div>

    <div class="form-group form-group-sm" id="question_box" style="display: none;">
        <div class="col-md-6 ml-15">
            @forelse($add_columns as $key => $val)
                <li>{!! nl2br($val) !!}</li>
            @empty
                "문제(그룹)명"을 선택해주세요.
            @endforelse
        </div>
    </div>

    <div class="form-group form-group-sm">
        <table id="_list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
            <colgroup>
                <col style="">
            </colgroup>
            <thead class="bg-white-gray">
            <tr>
                <th style="width: 3%;">NO</th>
                <th class="rowspan" style="width: 5%;">이름</th>
                <th class="rowspan" style="width: 8%;">ID</th>
                <th style="width: 10%;">참여일</th>
                <th style="width: 10%">문제(그룹)명</th>
                @forelse($add_columns as $key => $val)
                    <th id="add_columns_{{ $key }}" data-detail-idx="{{ $key }}">
                        {{--{{ $val }}--}}
                        {{ iconv_substr($val, 0, 19, "utf-8") }}{{ (iconv_strlen($val) > 19 ? '...' : '') }}
                    </th>
                @empty
                    @for($i=1; $i<=$arr_base['max_question_cnt']; $i++)
                        <th>질문{{ $i }}</th>
                    @endfor
                @endforelse
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
        var add_columns = {!!json_encode($add_columns)!!};
        var max_question_cnt = '{{ $arr_base['max_question_cnt'] }}';

        $(document).ready(function() {
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                buttons: [
                    {text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel mr-10'},
                ],
                ajax: {
                    'url' : '{{ site_url('/site/eventQuiz/lisAjaxQuizAnswerModal') }}',
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
                    {'data' : 'MemName'},
                    {'data' : 'MemId'},
                    {'data' : 'RegDatm'},
                    {'data' : 'EqsGroupTitle'},
                ],
                "createdRow": function( row, data, dataIndex ) {
                    var arr_info_detail = jQuery.parseJSON(data.info_detail);
                    if (Object.keys(add_columns).length > 0) {
                        //퀴즈그룹선택시
                        for (var i=0; i<Object.keys(add_columns).length; i++) {
                            if (typeof arr_info_detail[i] !== 'undefined') {
                                if (Object.keys(add_columns)[i] == arr_info_detail[i]['EqsqIdx']) {
                                    $(row).append('<td>' + arr_info_detail[i]['EqsqdQuestion'] + '</td>');
                                }
                            } else {
                                $(row).append('<td></td>');
                            }
                        }
                    } else {
                        //전체
                        for (var i=0; i<max_question_cnt; i++) {
                            if (typeof arr_info_detail[i] === 'undefined') {
                                $(row).append('<td></td>');
                            } else {
                                $(row).append('<td>' + arr_info_detail[i]['EqsqdQuestion'] + '</td>');
                            }
                        }
                    }
                },
                "initComplete": function( settings, json ) {
                    //추가된 th 삭제
                    if (json.recordsTotal <= 0) {
                        var arr_string = [];
                        for (var i=1; i<$('#_list_ajax_table > thead > tr > th').length; i++) {
                            if (typeof $('#_list_ajax_table > thead > tr > th').eq(i).data('detail-idx') !== 'undefined') {
                                arr_string.push($('#_list_ajax_table > thead > tr > th').eq(i).data('detail-idx'));
                            }
                        }
                        $.each(arr_string, function (key, val) {
                            $('#add_columns_'+val).remove();
                        });
                    }
                },
            });

            $("#search_eqs_idx").on('change', function () {
                var _replace_url = '{{ site_url('site/eventQuiz/quizAnswerModal/'.$arr_base['eq_idx']) }}';
                _replace_url += '?search_eqs_idx='+$(this).val();
                replaceModal(_replace_url,'');
            });

            // 엑셀 다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                formCreateSubmit('{{ site_url('/site/eventQuiz/answerExcel/'.$arr_base['eq_idx']) }}', $search_form_modal.serializeArray(), 'POST');
            });

            $('.btn-show-question').on('click', function(event) {
                $("#question_box").toggle();
            });

            $('.btn-location').on('click', function(event) {
                var _replace_url = '{{ site_url('site/eventQuiz/quizStatsModal/'.$arr_base['eq_idx']) }}';
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