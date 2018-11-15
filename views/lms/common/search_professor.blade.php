@extends('lcms.layouts.master_modal')

@section('layer_title')
    교수 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="siteCode" value="{{ $siteCode }}">
        @endsection

        @section('layer_content')
            <div class="form-group form-group-sm no-border-bottom mb-0">
                <p class="form-control-static"><span class="required">*</span> 검색한 교수를 선택해 주세요. (다중 선택 불가능합니다.)</p>
            </div>
            <div class="form-group form-group-bordered">
                <div class="col-xs-9">
                    <div class="form-inline">
                        <label class="mr-15">통합검색</label>
                        <input type="text" class="form-control input-sm" name="sc_fi" style="width:50%">
                        <span class="ml-5">교수명, 코드, 아이디 검색 가능</span>
                    </div>
                </div>
                <div class="col-xs-3 text-right">
                    <button type="submit" class="btn btn-primary btn-sm" id="_btn_search">검색</button>
                    <button type="button" class="btn btn-default btn-sm" style="margin-right: -5px;" id="act-searchInit">초기화</button>
                </div>
            </div>
            <div class="mt-10 mb-50">
                <table id="_list_ajax_table" class="table table-striped table-bordered">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center">사이트</th>
                        <th class="text-center">교수명</th>
                        <th class="text-center">교수코드</th>
                        <th class="text-center">교수아이디</th>
                        <th class="text-center">사용여부</th>
                        <th class="text-center">등록자</th>
                        <th class="text-center" style="width: 140px;">등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_ajax_table');
                var $parent_selected_professor = $('#selected_professor');
                var professorExist = {};

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable = $list_table.DataTable({
                        language: {
                            "info": "[ 총 _MAX_건 ]",
                        },
                        dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/common/searchProfessor/list') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    var code = row.ProfIdx;
                                    var checked = (professorExist.hasOwnProperty(code) === true) ? 'checked="checked"' : '';

                                    return '<input type="radio" id="_prof_code_' + code + '" name="_prof_code" class="flat" value="' + code + '" data-row-idx="' + meta.row + '" ' + checked + '>';
                            }},
                            {'data' : 'SiteName', 'class': 'text-center'},
                            {'data' : 'wProfName', 'class': 'text-center'},
                            {'data' : 'ProfIdx', 'class': 'text-center'},
                            {'data' : 'wProfId', 'class': 'text-center'},
                            {'data' : 'BaseIsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                            }},
                            {'data' : 'wAdminName', 'class': 'text-center'},
                            {'data' : 'RegDatm', 'class': 'text-center'}
                        ]
                    });

                    // 적용
                    $datatable.on('ifChanged', '[name="_prof_code"]', function() {
                        var row = $datatable.row($(this).data('row-idx')).data();
                        var txt = '';

                        if ($(this).prop('checked') === true) {
                            txt = '<span>' + row.wProfName +' | '+ row.ProfIdx +' | '+ row.wProfId +' | '+ ((row.BaseIsUse == 'Y') ? '사용' : '<span class="red">미사용</span>');
                            txt += '<input type="hidden" name="ProfIdx" value="' + row.ProfIdx + '"></span>';

                            $parent_selected_professor.html(txt);

                            $("#pop_modal").modal('toggle');
                        }
                    });

                    // 초기화
                    $parent_selected_professor.find('[name="ProfIdx"]').each(function () {
                        var code = $(this).val();
                        if(code) professorExist[code] = $(this).parent().text().trim();
                    });

                    // 검색초기화
                    $('#act-searchInit').on('click', function () {
                        $('[name="sc_fi"]').val('');
                        $('#_btn_search').trigger('click');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection