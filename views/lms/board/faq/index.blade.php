@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 FAQ 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($ret_search_site_code, 'tabs_site_code', 'tab', true, [], true) !!}
        <input type="hidden" name="setting_bm_idx" value="{{$bm_idx}}">
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="">FAQ 조건</label>
                    <div class="col-md-11 form-control-static">
                        <a href="javascript:void(0);" class="blue btn-group-ccd"><u class="mr-10">전체</u></a>
                        @foreach($faq_group_ccd as $key => $val)
                            <span class="faq-group" id="faq_group_{{$key}}"></span>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="">조건</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', true) !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control hide" id="search_group_faq_ccd" name="search_group_faq_ccd">
                            <option value="">FAQ그룹</option>
                            @foreach($faq_group_ccd as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_faq_type" name="search_faq_type">
                            <option value="">FAQ 분류</option>
                            @foreach($faq_ccd_list as $row)
                                <option value="{{ $row['Ccd'] }}" class="{{ $row['GroupCcd'] }}">{{ $row['CcdName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_is_best" name="search_is_best">
                            <option value="">BEST 여부</option>
                            <option value="1">사용</option>
                            <option value="2">미사용</option>
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제목/내용</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <label class="control-label col-lg-offset-2 col-md-1" for="search_start_date">등록일</label>
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
                <button class="btn btn-default btn-search" type="button" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>정렬</th>
                    <th>사이트</th>
                    <th>카테고리</th>
                    <th>FAQ구분</th>
                    <th>분류</th>
                    <th width="20%">제목</th>
                    <th>첨부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>BEST</th>
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

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');
        var arr_search_data = {!! $arr_search_data !!};
        var $set_is_best = {};

        $(document).ready(function() {
            var set_group_html;
            $.each(arr_search_data,function(key,value) {
                $search_form.find('input[name="'+key+'"]').val(value);
                $search_form.find('select[name="'+key+'"]').val(value);
                $search_form.find('input[name="'+key+'"]').attr('checked', true);
            });

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> BEST/사용 적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-is-best' },

                    { text: '<i class="fa fa-pencil mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-regist-orderby' },

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
                            /*return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);*/
                        }},
                    {'data' : 'OrderNum', 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            if (row.IsBest == '1') {
                                return 'BEST';
                            } else {
                                return data;
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

                    {'data' : 'FaqGroupCcdName'},
                    {'data' : 'FaqCcdName'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'AttachFileName', 'render' : function(data, type, row, meta) {
                            var tmp_return;
                            (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                            return tmp_return;
                        }},
                    {'data' : 'wAdminName'},
                    {'data' : 'RegDatm'},

                    {'data' : 'IsBest', 'render' : function(data, type, row, meta) {
                            //return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
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
                        }},
                ],
                "drawCallback": function(settings) {
                    var arr_faq_count = settings.json.faq_group_ccd_countList;
                    var search_group_faq_ccd = settings.json.search_group_faq_ccd;
                    var set_faq_count;
                    var css_bold;

                    @foreach($faq_group_ccd as $key => $val)
                        if (typeof arr_faq_count['{{$key}}'] === 'undefined') {
                            set_faq_count = 0;
                        } else {
                            set_faq_count = arr_faq_count['{{$key}}'];
                        }
                        css_bold = (search_group_faq_ccd == '{{$key}}') ? 'bold' : '';
                        set_group_html = '<a href="javascript:void(0)" class="blue btn-group-ccd" data-group-ccd="{{$key}}">';
                        set_group_html += '<u class="mr-10 '+css_bold+'">{{$val}} ('+set_faq_count+')</u>';
                        set_group_html += '</a>';
                        $("#faq_group_{{$key}}").html(set_group_html);
                    @endforeach
                }
            });

            $search_form.on('click', '.btn-group-ccd', function() {
                var $temp_group_faq_ccd = $search_form.find('[name="search_group_faq_ccd"]');
                $temp_group_faq_ccd.val($(this).data('group-ccd'));
                $temp_group_faq_ccd.change();
                $search_form.submit();
            });

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_faq_type"]').chained("#search_group_faq_ccd");

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url("/board/{$boardName}/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.href='{{ site_url("/board/{$boardName}/read") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            });

            // Best 적용
            $('.btn-is-best').on('click', function() {
                if (!confirm('BEST/사용 상태를 적용하시겠습니까?')) {
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

            $('.btn-regist-orderby').click(function() {
                var uri_param = '{!! $boardDefaultQueryString !!}';

                $('.btn-regist-orderby').setLayer({
                    "url" : "{{ site_url('board/faq/createOrderByModal?') }}"+ uri_param
                    ,width : "650"
                });
            });
        });
    </script>
@stop