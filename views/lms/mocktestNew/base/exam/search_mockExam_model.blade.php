@extends('lcms.layouts.master_modal')

@section('layer_title')
    과목검색 {{ ($suType == 'E') ? '[필수]' : '[선택]' }}
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="search_suType" value="{{$suType}}">
        <input type="hidden" name="search_use" value="Y">
        @endsection

        @section('layer_content')
            <div class="form-table">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:15%">운영사이트</th>
                        <td style="width:35%" class="form-group form-inline">
                            <input type="hidden" id="search_cateD1" name="search_site_code" value="{{$def_site_code}}">
                            {!! html_site_select($def_site_code, '_site_code', '_site_code', '', '운영 사이트', 'required', 'disabled', false, $arr_site_code) !!}
                        </td>
                        <th style="width:15%">카테고리</th>
                        <td style="width:35%" class="form-group form-inline">
                            <input type="hidden" class="{{$def_site_code}}" id="search_cateD1" name="search_cateD1" value="{{$cateD1Def}}">
                            <select class="form-control" id="_cate_code" name="_cate_code">
                                <option value="">카테고리 선택</option>
                                @foreach($arr_base['cateD1'] as $key => $val)
                                    <option value="{{$key}}" class="{{$def_site_code}}" @if($cateD1Def == $key) selected="selected" @endif>{{$val}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">조건</th>
                        <td colspan="3" class="form-group form-inline">
                            <select class="form-control" id="search_cateD2" name="search_cateD2">
                                <option value="">직렬</option>
                                @foreach($arr_base['cateD2'] as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
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
                            <select class="form-control mr-5" id="search_subject" name="search_subject">
                                <option value="">과목</option>
                                @foreach($arr_base['subject'] as $row)
                                    <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                                @endforeach
                            </select>
                            <select class="form-control mr-5" id="search_professor" name="search_professor">
                                <option value="">교수</option>
                                @foreach($professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">통합검색</th>
                        <td colspan="3">
                            <input type="text" class="form-control" style="width:300px;" name="search_fi" value="">
                        </td>
                    </tr>
                </table>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="btn_search"><i class="fa fa-search"></i> 검색</button>
                    <button type="button" class="btn btn-default" id="act-searchInit">초기화</button>
                </div>
            </div>

            <div class="mt-10 mb-50">
                <table id="list_table" class="table table-striped table-bordered">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">모의고사카테고리<br>(사이트 > 카테고리 > 직렬 > 과목)</th>
                        <th class="text-center" style="vertical-align:middle">연도</th>
                        <th class="text-center" style="vertical-align:middle">회차</th>
                        <th class="text-center" style="vertical-align:middle">문제수</th>
                        <th class="text-center" style="vertical-align:middle">교수</th>
                        <th class="text-center" style="vertical-align:middle">과목별문제지명</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#search_form');
                var $list_table = $('#list_table');

                $(document).ready(function() {
                    // 검색 Select 메뉴
                    $search_form.find('#_cate_code').chained('#_site_code');
                    $search_form.find('#search_cateD2').chained('#_cate_code');
                    $search_form.find('#search_subject').chained('#_site_code');
                    $search_form.find('#search_professor').chained('#_site_code');
                    $('#_cate_code').attr('disabled', 'true');

                    // 검색 초기화
                    $('#act-searchInit').on('click', function () {
                        $search_form.find("[name^=search_]:not('#_site_code, #_cate_code')").each(function () {
                            $(this).val('');
                        });
                        $search_form.find('#_cate_code').trigger('change');
                        $datatable.draw();
                    });

                    // DataTables
                    $datatable = $list_table.DataTable({
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/mocktestNew/base/exam/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                    if (row.CateRouteName == null) {
                                        return '매핑정보 없음';
                                    } else {
                                        var str = '';
                                        var obj = row.CateRouteName.split(',');
                                        for (key in obj) {
                                            str += obj[key] + "<br>";
                                        }
                                        return str;
                                    }
                                }},
                            {'data' : 'Year', 'class': 'text-center'},
                            {'data' : 'RotationNo', 'class': 'text-center'},
                            {'data' : 'ListCnt', 'class': 'text-center'},
                            {'data' : 'wProfName', 'class': 'text-center'},
                            {'data' : null, 'class': '', 'render' : function(data, type, row, meta) {
                                    return '<div class="blue underline-link act-sub-apply" data-row-idx="' + meta.row + '">[' + row.MpIdx + '] ' + row.PapaerName + '</div>';
                                }}
                        ]
                    });

                    // 적용
                    $list_table.on('click', '.act-sub-apply', function () {
                        var suType = $search_form.find('[name="search_suType"]').val();
                        var row = $datatable.row( $(this).data('row-idx')).data();
                        var target = (suType == 'E') ? $('#eSubject-wrap table > tbody') : $('#sSubject-wrap table > tbody');
                        var index = target.find('tr').length;

                        var str = '';
                        var obj = row.CateRouteName.split(',');
                        for (key in obj) {
                            str += obj[key] + "<br />";
                        }
                        target.append('<tr data-subject-idx="">' + suAddField + '</tr>');
                        target.find('tr').last().find('[name="OrderNum[]"]').val(++index);
                        target.find('tr').last().find('td:eq(1)').html(str);
                        target.find('tr').last().find('td:eq(2)').text(row.Year);
                        target.find('tr').last().find('td:eq(3)').text(row.RotationNo);
                        target.find('tr').last().find('td:eq(4)').text(row.wProfName);
                        target.find('tr').last().find('td:eq(5)').text('['+ row.MpIdx +'] '+ row.PapaerName);
                        target.find('tr').last().find('[name="MpIdx[]"]').val(row.MpIdx);
                        target.find('tr').last().find('[name="MockType[]"]').val(suType);
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