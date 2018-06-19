@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{$boardInfo[$bm_idx]}}
@stop

@section('layer_header')
    <form class="form-horizontal searching" id="search_modal_form" name="search_modal_form" method="POST" onsubmit="return false;">
        <input type="hidden" id="modal_site_code" name="modal_site_code" value="{{$site_code}}">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-group form-group-sm">
                <ul class="nav nav-tabs">
                    @foreach($boardInfo as $key => $val)
                        <li class="cs-pointer @if($key == $bm_idx) active @endif"><a data-toggle="tab" href="#board_idx_{{$key}}" class="btn-board-model" data-bm-idx-modal="{{$key}}">{{$val}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="form-group form-group-sm">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($site_code, 'search_modal_site_code', 'search_modal_site_code', 'hide', '운영 사이트', '', '', false, $offLineSite_list) !!}
                        <select class="form-control" id="search_modal_campus_ccd" name="search_modal_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_modal_category" name="search_modal_category">
                            <option value="">구분</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_modal_is_use" name="search_modal_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_modal_value">제목/내용</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_modal_value" name="search_modal_value">
                    </div>
                    <label class="control-label col-md-1" for="search_modal_start_date">등록일</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_modal_start_date" name="search_modal_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_modal_end_date" name="search_modal_end_date" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12 text-right form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="search_modal_chk_hot_display" value="1" class="flat hot-display" id="hot_display"/> <label for="hot_display">HOT 숨기기</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-search-modal ml-10" id="btn_search_modal"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                        <button type="button" class="btn btn-default ml-30 mr-30" id="_btn_reset_modal">검색초기화</button>
                    </div>
                </div>

                <div class="x_panel mt-10">
                    <div class="x_content">
                        <table id="list_ajax_table_model" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>복사</th>
                                <th>NO</th>
                                <th>운영사이트</th>
                                <th>캠퍼스</th>
                                <th>구분</th>
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
            </div>

            <script type="text/javascript">
                var $search_modal_form = $('#search_modal_form');
                var $datatable_modal;
                var $list_table_modal = $('#list_ajax_table_model');

                $(document).ready(function() {
                    // site-code에 매핑되는 select box 자동 변경
                    $search_modal_form.find('select[name="search_modal_campus_ccd"]').chained("#search_modal_site_code");
                    $search_modal_form.find('select[name="search_modal_category"]').chained("#search_modal_site_code");

                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/live/video/LiveManager/AjaxOfflineBoardModal/') }}' + '{{$bm_idx}}' + '?site_code=' + '{{$site_code}}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_modal_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
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
                                        return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                    }
                                }},
                            {'data' : 'SiteName'},
                            {'data' : 'CampusName'},
                            {'data' : 'CateCode', 'render' : function(data, type, row, meta){
                                    var obj = data.split(',');
                                    var str = '';
                                    for (key in obj) {
                                        str += obj[key]+"<br>";
                                    }
                                    return str;
                                }},
                            {'data' : 'Title', 'render' : function(data, type, row, meta) {
                                    var bm_idx = '{{$bm_idx}}';
                                    return '<a href="javascript:void(0);" class="btn-read-modal" data-idx="' + row.BoardIdx + '" data-bm-idx="'+bm_idx+'"><u>' + data + '</u></a>';
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

                    // hot 숨기기
                    $search_modal_form.on('ifChanged', '.hot-display', function() {
                        $datatable_modal.draw();
                    });

                    // 검색
                    $('.btn-search-modal').click(function (){
                        $datatable_modal.draw();
                    });

                    // 초기화 버튼 클릭
                    $search_modal_form.on('click', '#_btn_reset_modal', function() {
                        $search_modal_form[0].reset();
                        $datatable_modal.draw();
                    });

                    // tab click
                    $('.btn-board-model').click(function (){
                        var site_code = $('#modal_site_code').val();
                        var bm_idx = $(this).data('bm-idx-modal');
                        var path = '';

                        if (bm_idx == '82') {
                            path = 'ListOfflineBoardModal';
                        } else if (bm_idx == '83') {
                            path = 'ListLiveLectureMaterialModal';
                        }

                        var uri_route = path + '/' + bm_idx + '?site_code=' + site_code;
                        replaceModal('{{ site_url('/live/video/LiveManager/') }}' + uri_route, {});
                    });

                    // 데이터 Read 페이지
                    $list_table_modal.on('click', '.btn-read-modal', function() {
                        var site_code = $('#modal_site_code').val();
                        var bm_idx = $(this).data('bm-idx');
                        var path = '';

                        if (bm_idx == '82') {
                            path = 'readOfflineBoardModal';
                        } else if (bm_idx == '83') {
                            path = 'readLiveLectureMaterialModal';
                        }

                        var uri_route = path + '/' + $(this).data('idx') + dtParamsToQueryString($datatable_modal) + '&bm_idx=' + bm_idx + '&site_code=' + site_code;
                        replaceModal('{{ site_url('/live/video/LiveManager/') }}' + uri_route, {});
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection