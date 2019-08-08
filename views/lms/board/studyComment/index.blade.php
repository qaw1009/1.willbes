@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원이 작성한 수강후기를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($ret_search_site_code,'tabs_site_code') !!}
        <input type="hidden" name="setting_bm_idx" value="{{$bm_idx}}">
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">카테고리</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_subject" name="search_subject">
                            <option value="">과목</option>
                            @foreach($arr_subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_professor" name="search_professor">
                            <option value="">교수</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>

                        <div class="checkbox ml-30">
                            <input type="checkbox" name="search_chk_create_by_admin" value="1" class="flat create-by-admin" id="create_by_admin"/> <label for="create_by_admin">관리자 등록글 보기</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제목/내용</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <label class="control-label col-md-1 col-md-offset-2" for="search_start_date">등록일</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2">
                <button class="btn btn-info" type="button" id="btn_search_setting">기본화면셋팅</button>
            </div>
            <div class="col-xs-8 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>카테고리</th>
                    <th>과목</th>
                    <th>교수명</th>
                    <th>제목</th>
                    <th>강좌명</th>
                    <th>평점</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>HOT</th>
                    <th>사용</th>
                    <th>조회수</th>
                    <th>수정</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- start rating -->
    <link href="/public/vendor/start-rating/starrating.css" rel="stylesheet">
    <script src="/public/vendor/start-rating/jquery.starrating.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');
        var arr_search_data = {!! $arr_search_data !!};
        var $set_is_best = {};

        $(document).ready(function() {
            // 기간 조회 디폴트 셋팅
            //setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');
            $.each(arr_search_data,function(key,value) {
                $search_form.find('input[name="'+key+'"]').val(value);
                $search_form.find('select[name="'+key+'"]').val(value);
                $search_form.find('input[name="'+key+'"]').attr('checked', true);
            });

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_category"]').chained("#search_site_code");
            $search_form.find('select[name="search_subject"]').chained("#search_site_code");
            $search_form.find('select[name="search_professor"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> HOT/사용 적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-is-best' },
                    { text: '<i class="fa fa-pencil mr-10"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url("/board/{$boardName}/create") }}' + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url("/board/{$boardName}/listAjax?") }}' + '{!! $boardDefaultQueryString !!}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            if (row.IsBest == '1') {
                                return 'BEST';
                            } else {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CateCode', 'render' : function(data, type, row, meta){
                            if (row.SiteCode == {{config_item('app_intg_site_code')}}) {
                                return '통합';
                            } else {
                                var str = '없음';
                                if (data != null) {
                                    str = '';
                                    var obj = data.split(',');
                                    for (key in obj) {
                                        str += obj[key] + "<br>";
                                    }
                                }
                                return str;
                            }
                        }},
                    {'data' : 'SubjectName'},
                    {'data' : 'ProfNickName'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        }},

                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-read-lecture" data-idx="' + row.ProdCode + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'LecScore', 'render' : function(data, type, row, meta) {
                            return '<ul class="star-rating" id="starRating' + row.BoardIdx + '" data-stars="5" data-current="'+data+'" data-static="true"></ul>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            if (row.RegType == '1') {
                                return row.RegMemName;
                            } else {
                                return row.RegMemName+'<br>'+'('+row.RegMemId+')';
                            }
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'IsBest', 'render' : function(data, type, row, meta) {
                            var chk = '';
                            if (data == '1') { chk = 'checked=checked'; $set_is_best[row.BoardIdx] = 1; } else { chk = ''; }
                            return '<input type="checkbox" name="is_best" value="1" class="flat is-best" data-is-best-idx="' + row.BoardIdx + '" '+chk+ ' data-origin-is-best = ' + ((data == '1') ? ' "1"' : "0") + '>';
                        }},

                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_use" value="Y" data-idx="'+ row.ProdCode +'" data-origin-is-use="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},
                    {'data' : 'ReadCnt'},
                    {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                        }}
                ],
                "drawCallback": function(settings) {
                    var api = new $.fn.dataTable.Api(settings);
                    $.each(api.rows( {page:'current'} ).data(), function(i, item) {
                        $('#starRating' + item.BoardIdx).starRating();
                    });
                }
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url("/board/{$boardName}/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.href='{{ site_url("/board/{$boardName}/read") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read-lecture', function() {
                location.href='{{ site_url("/board/{$boardName}/readLecture") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            });

            // Best 적용
            $('.btn-is-best').on('click', function() {
                if (!confirm('HOT/사용 상태를 적용하시겠습니까?')) {
                    return;
                }

                var $is_best = $list_table.find('input[name="is_best"]');
                var $is_use = $list_table.find('input[name="is_use"]');
                var origin_val, this_val, this_best_val, this_use_val;
                var $params = {};
                var _url = '{{ site_url("/board/{$boardName}/storeIsBest/?") }}' + '{!! $boardDefaultQueryString !!}';

                $is_best.each(function(idx) {
                    // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                    this_best_val = $(this).filter(':checked').val() || '0';
                    this_use_val = $is_use.eq(idx).filter(':checked').val() || 'N';
                    this_val = this_best_val + ':' + this_use_val;
                    origin_val = $is_best.eq(idx).data('origin-is-best') + ':' + $is_use.eq(idx).data('origin-is-use');;
                    if (this_val != origin_val) {
                        $params[$(this).data('is-best-idx')] = { 'IsBest' : this_best_val, 'IsUse' : this_use_val };
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 관리자등록글 보기
            $search_form.on('ifChanged', '.create-by-admin', function() {
                $datatable.draw();
            });
        });
    </script>
@stop
