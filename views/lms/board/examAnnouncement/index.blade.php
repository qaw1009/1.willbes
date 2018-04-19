@extends('lcms.layouts.master')

@section('content')
    <h5>- 시험공고 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code', 'self') !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">구분</option>
                            @foreach($arr_category as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_area_ccd" name="search_area_ccd">
                            <option value="">구분</option>
                            @foreach($arr_area_ccd as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
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
                    <label class="control-label col-md-1" for="search_start_date">등록일</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group">
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
            <div class="form-group">
                <div class="col-xs-4">
                    <button class="btn btn-info ml-20" type="button">기본화면셋팅</button>
                </div>
                <div class="col-xs-8 text-right form-inline">
                    <div class="checkbox">
                        <input type="checkbox" name="search_chk_hot_display" value="1" class="flat hot-display" id="hot_display"/> <label for="hot_display">HOT 숨기기</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-search ml-10" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button class="btn btn-default ml-30 mr-30" type="button" id="btn_search_del">검색초기화</button>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>복사</th>
                    <th>NO</th>
                    <th>사이트</th>
                    <th>구분</th>
                    <th>유형</th>
                    <th>지역</th>
                    <th>제목</th>
                    <th>첨부</th>
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

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 기간 조회 디폴트 셋팅
            //setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> HOT적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-is-best' },

                    { text: '<i class="fa fa-copy mr-10"></i> 복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy' },

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
                            return '<input type="radio" class="flat" name="copy" value="' +row.BoardIdx+ '">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            if (row.IsBest == 'Y') {
                                return 'BEST';
                            } else {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }
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

                    {'data' : 'AnnouncementName'},
                    {'data' : 'AreaName'},

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
                            if (data == 'Y') { chk = 'checked=checked'; } else { chk = ''; }
                            return '<input type="checkbox" name="is_best" value="Y" class="flat is-best" data-is-best-idx="' + row.BoardIdx + '" '+chk+'/>';
                        }},

                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'ReadCnt'},
                    {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                        }},
                ],
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url("/board/{$boardName}/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}');
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.replace('{{ site_url("/board/{$boardName}/read") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}');
            });

            // Best 적용
            $('.btn-is-best').on('click', function() {
                var $params = {};
                var _url = '{{ site_url("/board/{$boardName}/storeIsBest/?") }}' + '{!! $boardDefaultQueryString !!}';

                $('input[name="is_best"]:checked').each(function() {
                    $params[$(this).data('is-best-idx')] = $(this).val();
                });

                if (Object.keys($params).length <= '0') {
                    alert('HOT 적용할 게시글을 선택해주세요.');
                    return false;
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

            // 검색초기화
            $('#btn_search_del').on('click', function() {
                location.replace('{{ site_url("/board/{$boardName}") }}/?' + '{!! $boardDefaultQueryString !!}');
            });

            // 복사
            $('.btn-copy').on('click', function() {
                var _url = '{{ site_url("/board/{$boardName}/copy/?") }}' + '{!! $boardDefaultQueryString !!}';
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'board_idx' : $('input:radio[name="copy"]:checked').val()
                };

                if ($('input:radio[name="copy"]').is(':checked') === false) {
                    alert('복사할 공지사항을 선택해 주세요.');
                    return false;
                }
                if (!confirm('해당 공지사항을 복사하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // hot 숨기기
            $search_form.on('ifChanged', '.hot-display', function() {
                $datatable.draw();
            });
        });


    </script>
@stop