@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 모의고사 결제현황 및 응시여부를 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false, $arrtab , true, $arrsite) !!}

        {!! csrf_field() !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value="{{$siteCodeDef}}">

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        <select class="form-control mr-5" id="search_year" name="search_year">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select class="form-control mr-5" id="search_round" name="search_round">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}">{{$i}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_takeArea" name="search_takeArea">
                            <option value="">응시지역</option>
                            @foreach($applyArea as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">모의고사검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 모의고사명, 코드 검색 가능
                    </div>
                </div>
                <div class="pt-10">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary mr-50 btn-excel" id="btn-excel">엑셀다운로드</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="act-searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="text-center">NO</th>
                        <th colspan="3" class="text-center">상품정보</th>
                        <th rowspan="2" class="text-center rowspan">응시형태</th>
                        <th rowspan="2" class="text-center rowspan">Off<BR>마감인원</th>
                        <th rowspan="2" class="text-center rowspan">응시지역</th>
                        <th colspan="2" class="text-center">접수현황</th>
                        <th rowspan="2" class="text-center blue">응시인원</th>
                    </tr>
                    <tr>
                        <th class="text-center rowspan">연도</th>
                        <th class="text-center rowspan">회차</th>
                        <th class="text-center rowspan">모의고사명</th>
                        <th class="text-center blue">결제완료</th>
                        <th class="text-center">환불완료</th>
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
            $('#act-searchInit, #tabs_site_code > li').on('click', function () {
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
                    'url' : '{{ site_url('/mocktest/applyExam/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'ProdCode', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span>' + row.MockYear +'</span>';
                        }},
                    {'data' : 'ProdCode', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span>' + row.MockRotationNo +'</span>';
                        }},
                    {'data' : 'ProdName', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span>[' + row.ProdCode + '] ' + row.ProdName + '</span>';
                        }},
                    {'data' : 'TakeForm_Name', 'class': 'text-center'},
                    {'data' : 'ClosingPerson', 'class': 'text-center' , 'render' : function(data, type, row, meta) {
                            return (data === '0') ? '-' : data;
                        }},
                    {'data' : 'TakeArea_Name', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === null) ? '없음' : data;
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/mocktest/applyUser/')}}?search_PayStatusCcd=676001&search_fi='+row.ProdCode+'&search_site_code='+$('#search_site_code').val()+'" target="_new">'+ row.pay_count +'</a>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/mocktest/applyUser/')}}?search_PayStatusCcd=676006&search_fi='+row.ProdCode+'&search_site_code='+$('#search_site_code').val()+'" target="_new">'+ row.refund_count +'</a>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/mocktest/applyUser/')}}?search_IsTake=Y&search_fi='+row.ProdCode+'&search_site_code='+$('#search_site_code').val()+'" target="_new">'+ row.take_count +'</a>';
                        }},
                ]
            });

            // 엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/mocktest/applyExam/list/Y') }}', $search_form.serializeArray(), 'POST');
                }
            });

        });
    </script>
@stop
