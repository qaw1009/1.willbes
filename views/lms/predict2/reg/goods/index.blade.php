@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 정보를 등록하고 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false) !!}
                        <select class="form-control mr-5" id="search_cateD1" name="search_cateD1">
                            <option value="">카테고리</option>
                            @foreach($arr_base['cateD1'] as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_cateD2" name="search_cateD2">
                            <option value="">직렬</option>
                            @foreach($arr_base['cateD2'] as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_use" name="search_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="mt-20">* 접수현황 : 결제대기, 결제완료, 환불완료 인원의 총합</div>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered">
                <thead class="bg-white-gray">
                <tr>
                    {{--<th class="valign-middle">선택</th>--}}
                    <th class="valign-middle">NO</th>
                    <th class="valign-middle">카테고리</th>
                    <th class="valign-middle">직렬</th>
                    <th class="valign-middle">서비스명</th>
                    <th class="valign-middle">Research1 기간</th>
                    <th class="valign-middle">Research2 기간</th>
                    <th class="valign-middle">사용여부</th>
                    <th class="valign-middle">등록자</th>
                    <th class="valign-middle">등록일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');

            $datatable = $list_table.DataTable({
                buttons: [
                    /*{ text: '<i class="fa fa-copy mr-5"></i> 복사', className: 'btn btn-sm btn-primary mr-15 btn-copy' },*/
                    { text: '<i class="fa fa-pencil mr-5"></i> 서비스 등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/predict2/reg/goods/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/predict2/reg/goods/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    /*{'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat" name="target" value="' + row.PredictIdx2 + '">';
                        }},*/
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'CateName', 'class': 'text-center'},
                    {'data' : 'MockPartName', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data.join('<br>');
                        }},

                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-edit" data-predict_idx2="'+row.PredictIdx2+'">[' + row.PredictIdx2 + '] ' + row.Predict2Name + '</span>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.Research1StartDatm.substr(0,16) + ' ~ ' + row.Research1EndDatm.substr(0,16);
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return row.Research2StartDatm.substr(0,16) + ' ~ ' + row.Research2EndDatm.substr(0,16);
                    }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                    //{'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                    //        return '<span class="blue underline-link act-fake"><input type="hidden" class="flat" name="prod" value="'+ row.PredictIdx2 + '">' + row.RegDatm + '</span>';
                    //    }}
                ]
            });

            //수정
            $list_table.on('click', '.act-edit', function () {
                location.href = '{{ site_url('/predict2/reg/goods/create/') }}' + $(this).data('predict_idx2') + dtParamsToQueryString($datatable);
            });

            //복사
            $('.btn-copy').on('click', function() {
                if ($('input:radio[name="target"]').is(':checked') === false) {
                    alert('복사할 컨텐츠를 선택해 주세요.');
                    return false;
                }
                if (!confirm("복사하시겠습니까?")) return false;

                var _url = '{{ site_url('/predict2/reg/goods/copyData') }}';
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'predict_idx2' : $('input:radio[name="target"]:checked').val()
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showValidateError, false, 'POST');
            });
        });
    </script>
@stop