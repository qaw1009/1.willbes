@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 응시자 가준으로 개별 모의고사성적을 확인하는 메뉴입니다.<br>
    - 응시여부
        <ul>
            <li>응시 : 모든 답안입력 후 최종확인 페이지에서 '시험종료'를 진행한 상태</li>
            <li>미응시 : 답안입력을 안하거나 '시험종료'를 하지 않은 상태</li>
            <li>시험종료(미응시) : 시험 시간이 종료된 상태</li>
        </ul>
    </h5>

    <h5>- 문제/해설 조건 : 온라인응시 + 응시형태가 응시인 상태.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $arr_site_code) !!}
                        <select class="form-control mr-5" id="search_TakeFormsCcd" name="search_TakeFormsCcd">
                            <option value="">응시형태</option>
                            @foreach($arr_base['applyType'] as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_IsTake" name="search_IsTake">
                            <option value="">응시여부</option>
                            <option value="Y">응시</option>
                            <option value="N">미응시</option>
                            <option value="E">시험종료(미응시)</option>
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

                        <select class="form-control mr-5 selectpicker" id="search_subject" name="search_subject" data-size="10" data-live-search="true">
                            <option value="">과목</option>
                            @foreach($arr_base['subject'] as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_takeArea" name="search_takeArea">
                            <option value="">응시지역</option>
                            @foreach($arr_base['applyArea'] as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">상품검색</label>
                    <div class="col-md-11">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭검색
                        <input type="text" class="form-control ml-10" style="width:300px;" id="search_prod_code" name="search_prod_code" value=""> 코드검색
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">회원검색</label>
                    <div class="col-md-11">
                        <input type="text" class="form-control" style="width:300px;" id="search_member_fi" name="search_member_fi" value=""> 아이디, 이름 검색 가능
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 text-right">
                <button type="button" class="btn btn-primary mr-50 btn-excel" id="btn-excel">엑셀다운로드</button>
            </div>
            <div class="col-xs-9 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content mb-20">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center" style="min-width:40px">회원명</th>
                        <th class="text-center">연락처</th>
                        <th class="text-center">응시번호</th>
                        <th class="text-center">응시형태</th>
                        <th class="text-center">연도</th>
                        <th class="text-center">회차</th>
                        <th class="text-center">모의고사명</th>
                        <th class="text-center">카테고리</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">과목</th>
                        <th class="text-center">응시지역</th>
                        <th class="text-center">총점</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">응시여부</th>
                        <th class="text-center">응시상태변경</br>관리자</th>
                        <th class="text-center">성적확인</th>
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
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');
            $search_form.find('#search_subject').chained('#search_site_code');

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktestNew/statistics/memberPrivate/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a class="blue" href="{{ site_url('/member/manage/detail/') }}'+row.MemIdx+'" target="_blank">' + row.MemName + '<br>(' + row.MemId + ')</a>';
                        }},
                    {'data' : 'Phone', 'class': 'text-center'},
                    {'data' : 'TakeNumber', 'class': 'text-center'},
                    {'data' : 'TakeFormName', 'class': 'text-center'},
                    {'data' : 'MockYear', 'class': 'text-center'},
                    {'data' : 'MockRotationNo', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '[' + row.ProdCode + '] ' + row.ProdName;
                        }},
                    {'data' : 'CateName', 'class': 'text-center'},
                    {'data' : 'TakeMockPartName', 'class': 'text-center'},
                    {'data' : 'SubjectName', 'class': 'text-center'},
                    {'data' : 'TakeAreaName', 'class': 'text-center'},
                    {'data' : 'AdjustSum', 'class': 'text-center'},
                    {'data' : 'ExamRegDatm', 'class': 'text-center'},
                    {'data' : 'IsTake', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var str = '';
                            if (data === 'Y') {
                                str = '응시';
                            } else if (data === 'E') {
                                str = '시험종료(미응시)';
                            } else {
                                if (row.answerTempCnt > 0) { str = '임시저장'; } else { str = '미응시'; }
                            }
                            return str;
                        }},
                    {'data' : 'UpdAdminName', 'class': 'text-center'},
                    {'data' : 'ProdCode', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            /*return row.AdjustSum > 0 ? '<a href="javascript:void(0);" class="blue act-view" data-prod-code="'+row.ProdCode+'" data-mr-idx="'+row.MrIdx+'">확인</a>' : '';*/
                            return (row.tempCnt > 0 || row.answerCnt > 0) ? '<a href="javascript:void(0);" class="blue act-view" data-prod-code="' + row.ProdCode + '" data-mr-idx="' + row.MrIdx + '">확인</a>' : '';
                        }},
                ]
            });

            $list_table.on('click', '.act-view', function() {
                location.href='{{ site_url('/mocktestNew/statistics/memberPrivate/memberGrades/') }}'+$(this).data('prod-code')+'/'+$(this).data('mr-idx')+dtParamsToQueryString($datatable);
            });

            // 엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                if ($('#search_prod_code').val() == '') {
                    alert('상품코드검색 후 엑셀다운로드 가능합니다.');
                    return false;
                }

                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/mocktestNew/statistics/memberPrivate/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop