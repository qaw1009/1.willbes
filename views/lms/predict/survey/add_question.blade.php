@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 조정점수를 수동반영하고 성적 통계를 확인하는 메뉴입니다.(개인 성적표 통계 처리를 위한 단계)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">

                </div>
            </div>
    </form>
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="MgIdx" name="MgIdx" value="">
    </form>

    <div class="mt-20">* 문항을 등록하는 페이지입니다.</div>
    <div style="text-align:right;"><button type="button" class="btn btn-primary" id="btn_search" onClick="addquestionCreate();">등록</button></div>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center" style="width:10%">NO</th>
                        <th class="text-center" style="width:20%">타입</th>
                        <th class="text-center">제목</th>
                        <th class="text-center" style="width:10%">사용유무</th>

                    </tr>

                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 검색 Select 메뉴
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');

            // 검색 초기화
            $('#searchInit, #tabs_site_code > li').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#search_cateD1').trigger('change');

                var eTarget = (event.target) ? event.target : event.srcElement;
                if($(eTarget).attr('id') == 'searchInit') $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/predict/survey/questionlist') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'Type', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-edit"><input type="hidden" name="target" value="' + row.SqIdx + '" />' + row.SqTitle  + '</span>';
                        }},

                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var SqUseYn = (row.SqUseYn === 'Y') ? '<span>사용</span>' : '<span class="red">미사용</span>';
                            return SqUseYn;
                        }},
                ]
            });

            // 수정으로 이동
            $list_form.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/predict/survey/addquestionCreate') }}' + query + '&idx=' + $(this).closest('tr').find('[name=target]').val();
            });

        });

        function addquestionCreate(){
            location.href = '{{ site_url('/predict/survey/addquestionCreate') }}';
        }

    </script>
@stop
