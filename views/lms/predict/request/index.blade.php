@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 합격예측서비스 기본정보를 관리합니다.</h5>
    <h5 class="mt-20 red">- 사전등록페이지를 /view/willbes/pc/predict/+PredictIdx 와 /view/willbes/m/predict/+PredictIdx 경로에 생성해주세요.</h5>
    <h5 class="mt-20 red">- 프로모션 블레이드에 적중&합격예측 서비스 이용 건수 &#64;include('willbes.pc.predict.show_count_partial') 을 추가해주세요.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false, $arrtab , true, $arrsite) !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
                    </div>
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-2">
                        <select name="search_use" id="search_use" class="form-control mr-5">
                            <option value="" >사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                    <div class="col-md-3 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="mt-20">* 접수현황 : 결제대기, 결제완료, 환불완료 인원의 총합</div>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">연도</th>
                        <th class="text-center">회차</th>
                        <th class="text-center">합격예측서비스명</th>
                        <th class="text-center">사전신청팝업링크</th>
                        <th class="text-center">서비스이용건수 추가시</th>
                        <th class="text-center">응시직렬</th>
                        <th class="text-center">사용여부</th>
                        <th class="text-center">등록자</th>
                        <th class="text-center">등록일</th>
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

        $(document).ready(function() {

            // 검색 초기화
            $('#searchInit, #tabs_site_code > li').on('click', function () {

                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });

                //$search_form.find('#search_cateD1').trigger('change');

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
                buttons: [

                    { text: '<i class="fa fa-pencil mr-5"></i> 합격예측등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/predict/request/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/predict/request/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},

                    {'data' : 'MockYear', 'class': 'text-center'},
                    {'data' : 'MockRotationNo', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-edit"><input type="hidden" class="flat" name="prod" value="'+ row.PredictIdx + '">[' + row.PredictIdx + '] ' + row.ProdName + '</span>';
                        }},

                    {'data' : 'link', 'class': 'text-center'},
                    {'data' : 'include', 'class': 'text-center'},
                    {'data' : 'SerialStr', 'class': 'text-center'},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}

                ]
            });

            // 수정으로 이동
            $list_form.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/predict/request/create/') }}' + $(this).closest('tr').find('[name=prod]').val() + query;
            });


        });
    </script>
@stop
