@extends('lcms.layouts.master')

@section('content')
    <h5>- 현장 라이브강의를 학원사이트에서 실시간으로 송출하기 위한 관리 페이지입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs('', 'tabs_site_code', 'tab', true, [], false, $offLineSite_list) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}

                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">카테고리</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_onair_is_type" name="search_onair_is_type">
                            <option value="">진행여부</option>
                            <option value="Y">진행</option>
                            <option value="N">종료</option>
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-6 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="R">등록일</option>
                            <option value="I">송출일</option>
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default" id="_btn_reset">검색초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>복사</th>
                    <th>No</th>
                    <th>운영사이트</th>
                    <th>카테고리</th>
                    <th>개강일</th>
                    <th>요일</th>
                    <th>회차</th>
                    <th>노출시간</th>
                    <th>강사명</th>
                    <th>강좌명</th>
                    <th>진행여부</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
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
            // 날짜검색 디폴트 셋팅
            /*setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');*/

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_category"]').chained("#search_site_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> 복사', className: 'btn-sm btn-default btn-success border-radius-reset mr-15 btn-copy' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/onAir/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/onAir/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat" name="copy" value="' +row.OaIdx+ '">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CateCode', 'render' : function(data, type, row, meta){
                            var obj = data.split(',');
                            var str = '';
                            for (key in obj) {
                                str += obj[key]+"<br>";
                            }
                            return str;
                        }},
                    {'data' : 'StudyStartDate'},

                    {'data' : 'WeekArray', 'render' : function(data, type, row, meta) {
                            var return_week = '';
                            var set_arr_day = ['일','월','화','수','목','금','토'];
                            var arr_week_data = data.split(',');
                            $.each(arr_week_data, function(index, item){
                                if (item == 'Y') {
                                    return_week += set_arr_day[index]+',';
                                }
                            });
                            return_week = return_week.slice(0,-1);
                            return return_week;
                        }},

                    {'data' : 'OnAirNum'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.OnAirStartTime + ' ~ ' + row.OnAirEndTime;
                        }},
                    {'data' : 'ProfNickName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-modify" data-idx="' + row.OaIdx + '"><u>' + row.OnAirName + '</u></a>';
                        }},

                    {'data' : 'OnAirLastDate', 'render' : function(data, type, row, meta) {
                        var now_date = '{{$now_date}}';
                            if (data <= now_date) {
                                return '종료';
                            } else {
                                return '진행';
                            }
                            return data;
                            //return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/site/onAir/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });

            // 복사
            $('.btn-copy').on('click', function() {
                var _url = '{{ site_url("/site/onAir/copy/") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'oa_idx' : $('input:radio[name="copy"]:checked').val()
                };

                if ($('input:radio[name="copy"]').is(':checked') === false) {
                    alert('복사할 강좌를 선택해 주세요.');
                    return false;
                }
                if (!confirm('해당 강좌를 복사하시겠습니까?')) {
                    return;
                }
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
