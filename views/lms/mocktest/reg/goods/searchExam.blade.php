@extends('lcms.layouts.master_modal')

@section('layer_title')
    과목검색 {{ ($suType == 'E') ? '[필수]' : '[선택]' }}
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" name="sc_suType" value="{{$suType}}">
        @endsection

        @section('layer_content')
            <div class="form-table">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:15%">운영사이트</th>
                        <td style="width:35%" class="form-group form-inline">
                            {!! html_site_select($siteCodeDef, 'sc_siteCode', 'sc_siteCode') !!}
                        </td>
                        <th style="width:15%">카테고리</th>
                        <td style="width:35%" class="form-group form-inline">
                            <select class="form-control" id="sc_cateD1" name="sc_cateD1">
                                @foreach($cateD1 as $row)
                                    @if($row['CateCode'] == $cateD1Def)
                                        <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" selected>{{ $row['CateName'] }}</option>
                                    @else
                                        @if(in_array(ENVIRONMENT, ['local','development']))
                                            <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" >{{ $row['CateName'] }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">조건</th>
                        <td colspan="3" class="form-group form-inline">
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
                            <select class="form-control mr-5" id="sc_subject" name="sc_subject">
                                <option value="">과목</option>
                                @foreach($subject as $row)
                                    <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                                @endforeach
                            </select>
                            <select class="form-control mr-5" id="sc_professor" name="sc_professor">
                                <option value="">교수</option>
                                @foreach($professor as $row)
                                    <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                                @endforeach
                            </select>
                            <select class="form-control mr-5" id="sc_questionOption" name="sc_questionOption">
                                <option value="">문제등록옵션</option>
                                <option value="S">객관식(단일)</option>
                                <option value="M">객관식(복수)</option>
                                <option value="J">주관식</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">통합검색</th>
                        <td colspan="3">
                            <input type="text" class="form-control" style="width:300px;" name="sc_fi" value="">
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
                        <th class="text-center">모의고사카테고리<br>(사이트 > 카테고리 > 직렬)</th>
                        <th class="text-center" style="vertical-align:middle">연도</th>
                        <th class="text-center" style="vertical-align:middle">회차</th>
                        <th class="text-center" style="vertical-align:middle">과목(문제수)</th>
                        <th class="text-center" style="vertical-align:middle">교수</th>
                        <th class="text-center" style="vertical-align:middle">과목별문제지명</th>
                        <th class="text-center" style="vertical-align:middle">문제등록옵션</th>
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
                    $search_form.find('#sc_cateD1').chained('#sc_siteCode');
                    $search_form.find('#sc_cateD2').chained('#sc_cateD1');
                    $search_form.find('#sc_subject').chained('#sc_siteCode');
                    $search_form.find('#sc_professor').chained('#sc_siteCode');

                    $search_form.find('#sc_siteCode > option').each(function () {
                        if( $(this).attr('value') != '{{$siteCodeDef}}' ) $(this).remove();
                    });

                    // 검색 초기화
                    $('#act-searchInit').on('click', function () {
                        $search_form.find("[name^=sc_]:not('#sc_siteCode, #sc_cateD1')").each(function () {
                            $(this).val('');
                        });
                        $search_form.find('#sc_cateD1').trigger('change');
                        $datatable.draw();
                    });

                    // DataTables
                    $datatable = $list_table.DataTable({
                        info: true,
                        language: {
                            "info": "[ 총 _MAX_건 ]",
                        },
                        dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/mocktest/regGoods/searchExamList') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : 'CateRouteName', 'class': ''},
                            {'data' : 'Year', 'class': 'text-center'},
                            {'data' : 'RotationNo', 'class': 'text-center'},
                            {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                return row.SubjectName + ' (' + row.ListCnt + ')';
                            }},
                            {'data' : 'wProfName', 'class': 'text-center'},
                            {'data' : null, 'class': '', 'render' : function(data, type, row, meta) {
                                return '<div class="blue underline-link act-sub-apply" data-row-idx="' + meta.row + '">[' + row.MpIdx + '] ' + row.PapaerName + '</div>';
                            }},
                            {'data' : 'QuestionOption', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                                var txt = '';
                                if(data === 'S') txt = '객관식(단일)';
                                else if(data === 'M') txt = '객관식(복수)';
                                else if(data === 'J') txt = '주관식';

                                return txt;
                            }},
                        ]
                    });
                    
                    // 적용
                    $list_table.on('click', '.act-sub-apply', function () {
                        var suType = $search_form.find('[name="sc_suType"]').val();
                        var row = $datatable.row( $(this).data('row-idx')).data();
                        var target = (suType == 'E') ? $('#eSubject-wrap table > tbody') : $('#sSubject-wrap table > tbody');
                        var index = target.find('tr').length;

                        target.append('<tr data-subject-idx="">' + suAddField + '</tr>');
                        target.find('tr').last().find('[name="OrderNum[]"]').val(++index);
                        target.find('tr').last().find('td:eq(1)').text(row.Year);
                        target.find('tr').last().find('td:eq(2)').text(row.RotationNo);
                        target.find('tr').last().find('td:eq(3)').text(row.SubjectName);
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