@extends('lcms.layouts.master_modal')

@section('layer_title')
    모의고사 상품 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-table">
                <table class="table table-bordered mt-30">
                    <tr>
                        <th>조건</th>
                        <td class="form-inline">
                            {!! html_site_select('', 'sc_site', 'sc_site') !!}
                            <select class="form-control" id="sc_cateD1" name="sc_cateD1">
                                <option value="">카테고리</option>
                                @foreach($cateD1 as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                            <select class="form-control" id="sc_cateD2" name="sc_cateD2">
                                <option value="">직렬</option>
                                @foreach($cateD2 as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                            <select class="form-control mr-5" id="sc_year" name="sc_year">
                                <option value="">연도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <select class="form-control mr-5" id="sc_round" name="sc_round">
                                <option value="">회차</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>통합검색</th>
                        <td>
                            <input type="text" class="form-control" style="width:300px;" name="sc_fi" value="">
                        </td>
                    </tr>
                </table>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="act-s-search"><i class="fa fa-search"></i> 검색</button>
                    <button type="button" class="btn btn-default" id="act-s-searchInit">초기화</button>
                </div>
            </div>

            <div class="mt-10 mb-50">
                <table id="_list_table" class="table table-striped table-bordered table-head-row2">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center">운영사이트</th>
                        <th rowspan="2" class="text-center">카테고리</th>
                        <th rowspan="2" class="text-center">직렬</th>
                        <th rowspan="2" class="text-center">연도</th>
                        <th rowspan="2" class="text-center">회차</th>
                        <th colspan="2" class="text-center">응시형태</th>
                        <th rowspan="2" class="text-center">모의고사명</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:50px;">Online</th>
                        <th class="text-center" style="width:50px;">Off</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_table');

                // 검색 Select 메뉴
                $search_form.find('#sc_cateD1').chained('#sc_site');
                $search_form.find('#sc_cateD2').chained('#sc_cateD1');

                // 검색초기화
                $('#act-s-searchInit').on('click', function () {
                    $search_form.find('[name^=sc_]').each(function () {
                        $(this).val('');
                    });
                    $search_form.find('#sc_site').trigger('change');
                    $datatable.draw();
                });

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable = $list_table.DataTable({
                        language: {
                            "info": "[ 총 _MAX_건 ]",
                        },
                        dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/mocktest/regGroup/searchGoodsList') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }},
                            {'data' : 'SiteName', 'class': 'text-center'},
                            {'data' : 'CateName', 'class': 'text-center'},
                            {'data' : 'MockPartName', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return data.join('<br>');
                            }},
                            {'data' : 'MockYear', 'class': 'text-center'},
                            {'data' : 'MockRotationNo', 'class': 'text-center'},
                            {'data' : 'TakePart_on', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                            }},
                            {'data' : 'TakePart_off', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                            }},
                            {'data' : null, 'class': '', 'render' : function(data, type, row, meta) {
                                return '<div class="blue underline-link act-sub-apply" data-row-idx="' + meta.row + '">[' + row.ProdCode + '] ' + row.ProdName + '</div>';
                            }}
                        ]
                    });

                    // 적용
                    $list_table.on('click', '.act-sub-apply', function () {
                        var row = $datatable.row( $(this).data('row-idx')).data();
                        var target = $('#mGoods-wrap table > tbody');

                        target.append('<tr data-goods-idx="">' + mAddField + '</tr>');

                        target.find('tr').last().find('td:eq(0)').text(row.SiteName);
                        target.find('tr').last().find('td:eq(1)').text(row.CateName);
                        target.find('tr').last().find('td:eq(2)').html(row.MockPartName.join('<br>'));
                        target.find('tr').last().find('td:eq(3)').text(row.MockYear);
                        target.find('tr').last().find('td:eq(4)').text(row.MockRotationNo);
                        target.find('tr').last().find('td:eq(5)').html((row.TakePart_on === 'Y') ? 'Y' : '<span class="red">N</span>');
                        target.find('tr').last().find('td:eq(6)').html((row.TakePart_off === 'Y') ? 'Y' : '<span class="red">N</span>');
                        target.find('tr').last().find('td:eq(7)').html('<span class="blue underline-link act-goto-goods">['+ row.ProdCode +'] '+ row.ProdName + '</span>');

                        target.find('tr').last().find('[name="ProdCode[]"]').val(row.ProdCode);
                        target.find('tr').last().find('[name="SiteGroupCode[]"]').val(row.SiteGroupCode);

                        $("#pop_modal").modal('toggle');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection