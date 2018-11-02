@extends('lcms.layouts.master_modal')

@section('layer_title')
    모의고사 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <table class="table table-bordered modal-table mt-30">
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
                        <select class="form-control" style="width: 283px;" id="sc_cateD2" name="sc_cateD2">
                            <option value="">직렬</option>
                            @foreach($cateD2 as $row)
                                <option value="{{ $row['Ccd'] }}" class="">{{ $row['CcdName'] }}</option>
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
                        <input type="text" class="form-control" style="width:300px;" name="sc_fi" value="{{ @$_GET['sc_fi'] }}">
                    </td>
                </tr>
            </table>
            <div class="form-group form-inline">
                <div class="col-md-5 text-right">
                    <button type="submit" class="btn btn-primary" id="act-s-search"><i class="fa fa-search"></i> 검색</button>
                    <button type="button" class="btn btn-default" id="act-s-searchInit">초기화</button>
                </div>
            </div>

            <div class="mt-50">
                <table id="_list_table" class="table table-bordered table-striped form-table table-head-row2">
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
                        <th class="text-center">Online</th>
                        <th class="text-center">Off</th>
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
                    // $parent_selected_professor.find('[name="ProfIdx"]').each(function () {
                    //     var code = $(this).val();
                    //     if(code) professorExist[code] = $(this).parent().text().trim();
                    // });


                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection