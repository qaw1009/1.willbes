@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 FAQ 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code', 'self') !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="">FAQ 조건</label>
                    <div class="col-md-11 form-control-static">
                        {{--@foreach($faqGroupTypeCcd as $key => $val)
                            <span class="mr-10">{{$val}} (5)</span>
                        @endforeach--}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_faq_type" name="search_faq_type">
                            <option value="">FAQ 분류</option>
                        </select>

                        <select class="form-control" id="search_is_best" name="search_is_best">
                            <option value="">BEST 여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
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
                    <th>NO</th>
                    <th>정렬</th>
                    <th>사이트</th>
                    <th>구분</th>
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

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> BEST적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-is-best' },

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
                            if (row.IsBest == 'Y') {
                                return 'BEST';
                            } else {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                            }
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'SiteName'},
                    {'data' : 'CateCode', 'render' : function(data, type, row, meta){
                            var obj = data.split(',');
                            var str = '';
                            for (key in obj) {
                                str += obj[key]+"<br>";
                            }
                            return str;
                        }},

                    {'data' : 'SiteName'},
                    {'data' : 'SiteName'},
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
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url("/board/{$boardName}/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
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