@extends('lcms.layouts.master')

@section('content')
    <h5>- 모의고사 이의제기/정오표 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($prod_data['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($prod_data['SiteCode'] => $prod_data['SiteName'])) !!}
        <div class="x_panel">
            <div class="x_content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>카테고리</th>
                        <th>모의고사명</th>
                        <th>직렬</th>
                        <th>연도</th>
                        <th>회차</th>
                        <th>접수기간</th>
                        <th>접수상태</th>
                        <th>응시기간</th>
                        <th>사용여부</th>
                        <th>이의제기(미답변수/총건수)</th>
                        <th>정오표</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{$prod_data['CateName']}} {!! ($prod_data['IsUseCate'] == 'Y') ? '' : '<span class="red">(미사용)</span>' !!}
                        </td>
                        <td>
                            [{{$prod_data['ProdCode']}}] {{$prod_data['ProdName']}}
                        </td>
                        <td>
                            {!! (empty($prod_data['MockPartName']) === false) ? implode(',', $prod_data['MockPartName']) : '' !!}
                        </td>
                        <td>{{$prod_data['MockYear']}}</td>
                        <td>{{$prod_data['MockRotationNo']}}</td>
                        <td>
                            {{$prod_data['SaleStartDate']}} ~ {{$prod_data['SaleEndDate']}}
                        </td>
                        <td>{{$prod_data['AcceptStatusCcd_Name']}}</td>
                        <td>
                            {{$prod_data['TakeStartDate']}} ~ {{$prod_data['TakeEndDate']}}
                        </td>
                        <td>
                            {!! ($prod_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                        </td>
                        <td>
                            <a href="#none" class="btn-list-qna" data-idx="{{$prod_data['ProdCode']}}">
                                <u class="blue">{{$prod_data['qnaUnAnsweredCnt']}}/{{$prod_data['qnaTotalCnt']}}</u>
                            </a>
                        </td>
                        <td>
                            <a href="#none" class="btn-list-notice" data-idx="{{$prod_data['ProdCode']}}">
                                <u class="blue">{{$prod_data['noticeCnt']}}</u>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12 text-right form-inline">
                    <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">전체모의고사목록</button>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', true) !!}
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
                <div class="col-xs-12 text-right form-inline">
                    <button type="submit" class="btn btn-primary btn-search ml-10" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default ml-30 mr-30" id="_btn_reset">검색초기화</button>
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
                    <th>운영사이트</th>
                    <th>캠퍼스</th>
                    <th>카테고리</th>
                    <th>제목</th>
                    <th>첨부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>공지적용</th>
                    <th>사용</th>
                    <th>조회수</th>
                    <th>댓글수</th>
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
        var $set_is_best = {};

        //전체모의고사목록
        $('.btn-main-list').click(function() {
            location.href = '{{ site_url("/board/{$boardName}/mainList") }}/' + getQueryString();
        });

        //이의제기 목록
        $('.btn-list-qna').click(function() {
            location.href='{{ site_url("/board/mocktest/qna/detailList") }}/?bm_idx=95&prod_code=' + $(this).data('idx');
        });

        //정오표 목록
        $('.btn-list-notice').click(function() {
            location.href='{{ site_url("/board/mocktest/notice/detailList") }}/?bm_idx=96&prod_code=' + $(this).data('idx');
        });

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> 공지적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-is-best' },

                    { text: '<i class="fa fa-copy mr-10"></i> 복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy' },

                    { text: '<i class="fa fa-pencil mr-10"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url("/board/{$boardName}/createDetail") }}' + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url("/board/{$boardName}/detailListAjax?") }}' + '{!! $boardDefaultQueryString !!}',
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
                            if (row.IsBest == '1') {
                                return '공지적용';
                            } else {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CampusName'},
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
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'ReadCnt'},
                    {'data' : 'CommentCnt'},
                    {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                        }},
                ],
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url("/board/{$boardName}/createDetail") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            });

            // 데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.href='{{ site_url("/board/{$boardName}/readDetail") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            });

            // Best 적용
            $('.btn-is-best').on('click', function() {
                if (!confirm('상태를 적용하시겠습니까?')) {
                    return;
                }

                var $is_best = $list_table.find('input[name="is_best"]');
                var origin_val, this_val, this_best_val;
                var $params = {};
                var _url = '{{ site_url("/board/{$boardName}/storeIsBest/?") }}' + '{!! $boardDefaultQueryString !!}';

                $is_best.each(function(idx) {
                    // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                    this_best_val = $(this).filter(':checked').val() || '0';
                    this_val = this_best_val;
                    origin_val = $is_best.eq(idx).data('origin-is-best');
                    if (this_val != origin_val) {
                        $params[$(this).data('is-best-idx')] = { 'IsBest' : this_best_val };
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

            // 복사
            $('.btn-copy').on('click', function() {
                var _url = '{{ site_url("/board/{$boardName}/copy/?") }}' + '{!! $boardDefaultQueryString !!}';
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'board_idx' : $('input:radio[name="copy"]:checked').val()
                };

                if ($('input:radio[name="copy"]').is(':checked') === false) {
                    alert('복사할 게시글을 선택해 주세요.');
                    return false;
                }
                if (!confirm('해당 게시글을 복사하시겠습니까?')) {
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
