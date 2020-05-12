@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
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
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="btn_reset">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content mb-20">
            <table id="list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
                <thead class="bg-white-gray">
                <tr>
                    <th rowspan="2" class="text-center">선택</th>
                    <th rowspan="2" class="text-center">NO</th>
                    <th rowspan="2" class="text-center" style="min-width:350px">카테고리<br>(카테고리>직렬>과목)</th>
                    <th rowspan="2" class="text-center">교수</th>
                    <th rowspan="2" class="text-center">연도</th>
                    <th rowspan="2" class="text-center">회차</th>
                    <th rowspan="2" class="text-center">과목별문제지명</th>
                    <th rowspan="2" class="text-center">지문수</th>
                    <th rowspan="2" class="text-center">문항수</th>
                    <th colspan="2" class="text-center">응시현황</th>
                    <th rowspan="2" class="text-center">사용여부</th>
                    <th rowspan="2" class="text-center">문제보기</th>
                    <th rowspan="2" class="text-center">등록자</th>
                    <th rowspan="2" class="text-center" style="width:130px">등록일</th>
                </tr>
                <tr>
                    <th class="text-center">ON</th>
                    <th class="text-center">OFF</th>
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
            // 검색 Select 메뉴
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');
            $search_form.find('#search_subject').chained('#search_site_code');
            $search_form.find('#search_professor').chained('#search_site_code');

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-5"></i> 복사', className: 'btn btn-sm btn-primary mr-15 btn-copy' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 문제등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/predict2/base/exam/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ],
                ajax: {
                    'url' : '{{ site_url('/predict2/base/exam/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<input type="radio" class="flat" name="target" value="' + row.PpIdx + '">';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
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
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        var IsUseProfessor = (row.IsUseProfessor === 'Y') ? '' : '<span class="red">(미사용)</span>';
                        return row.wProfName + IsUseProfessor;
                    }},
                    {'data' : 'Year', 'class': 'text-center'},
                    {'data' : 'RotationNo', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<span class="blue underline-link btn-modify" data-idx="' + row.PpIdx + '">[' + row.PpIdx + '] ' + row.PapaerName + '</span>';
                    }},
                    {'data' : 'AnswerNum', 'class': 'text-center'},
                    {'data' : 'ListCnt', 'class': 'text-center'},
                    {'data' : 'OnlineCnt', 'class': 'text-center'},
                    {'data' : 'OfflineCnt', 'class': 'text-center'},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        upImgUrl = '{{$upImgUrl}}' + row.PpIdx + '/';
                        return '<a href="'+ row.FilePath + row.RealQuestionFile+'" target="_blank" class="blue underline_link">'+row.QuestionFile+'</span>';
                    }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDate', 'class': 'text-center'}
                ]
            });

            // 수정
            $list_table.on('click', '.btn-modify', function () {
                location.href = '{{ site_url('/predict2/base/exam/create/') }}' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            // 복사
            $('.btn-copy').on('click', function() {
                if ($('input:radio[name="target"]').is(':checked') === false) {
                    alert('복사할 문제영역을 선택해 주세요.');
                    return false;
                }
                if (!confirm("복사하시겠습니까?")) return false;

                var _url = '{{ site_url('/predict2/base/exam/copyData') }}';
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'idx' : $('input:radio[name="target"]:checked').val()
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop
