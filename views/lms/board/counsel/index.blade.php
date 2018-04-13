@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 고객센터 1:1 상담 게시판을 관리하는 메뉴입니다. (괄호 안 붉은색 숫자는 미답변 카운트입니다.)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code', 'self', true, $arr_unAnswered) !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">구분</option>
                            @foreach($arr_category as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_counsel_type" name="search_counsel_type">
                            <option value="">상담유형</option>
                            @foreach($arr_counsel_type as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_reply_type" name="search_reply_type">
                            <option value="">답변상태</option>
                            @foreach($arr_reply as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_is_public" name="search_is_public">
                            <option value="">공개여부</option>
                            <option value="Y">공개</option>
                            <option value="N">비공개</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제목/내용</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <label class="control-label col-md-2" for="search_replay_value">답변</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="search_replay_value" name="search_replay_value">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">• 이름, 아이디, 휴대폰번호 검색 기능</p>
                    </div>

                    <label class="control-label col-lg-offset-1 col-md-1" for="search_start_date">등록일</label>
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
                        <input type="checkbox" name="search_chk_vod_value" value="1" class="flat" id="vod_value"/> <label for="vod_value">강성 클레임</label>
                        <input type="checkbox" name="search_chk_delete_value" value="1" class="flat" id="delete_value"/> <label for="delete_value">삭제글 보기</label>
                        <input type="checkbox" name="search_chk_notice_display" value="1" class="flat" id="notice_display"/> <label for="notice_display">공지 숨기기</label>
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
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>캠퍼스</th>
                    <th>구분</th>
                    <th>분류</th>
                    <th>상담유형</th>
                    <th>제목</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>답변상태</th>
                    <th>답변자</th>
                    <th>답변일</th>
                    <th>공개</th>
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
                    { text: '<i class="fa fa-pencil mr-10"></i> 공지 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
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
                "createdRow" : function( row, data, index ) {
                    if (data['RegType'] == '1') {
                        $(row).addClass('blue-sky');
                    }

                    if (data['IsStatus'] == 'N') {
                        $(row).addClass('bg-gray-custom');
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            if (row.RegType == '1') {
                                return '<b>공지</b>';
                            } else {
                                return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
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
                    {'data' : 'TypeCcdName'},
                    {'data' : 'TypeCcdName'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            if (row.RegType == 1) {
                                return '<a href="javascript:void(0);" class="btn-admin-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                            } else {
                                return '<a href="javascript:void(0);" class="btn-counsel-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                            }
                        }},
                    {'data' : 'RegType', 'render' : function(data, type, row, meta) {
                            if (data == 1) {
                                return row.wAdminName;
                            } else {
                                if (row.RegMemName == null) {
                                    return '';
                                } else {
                                    return row.RegMemName+'('+row.RegMemIdx+')';
                                }

                            }
                        }},
                    {'data' : 'RegDatm'},
                    {'data' : 'ReplyStatusCcdName', 'render' : function(data, type, row, meta) {
                            return (data == '미답변') ? '<p class="red">'+data+'</p>' : data;
                        }},
                    {'data' : 'ReplyRegAdminName'},
                    {'data' : 'ReplyRegDatm'},
                    {'data' : 'IsPublic', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '공개' : '<p class="red">비공개</p>';
                        }},

                    /*{'data' : 'ReadCnt'},*/
                    {'data' : 'ReadCnt', 'render' : function(data, type, row, meta) {
                            var cnt = Number(data) + Number(row.SettingReadCnt);
                            return cnt;
                        }},

                    {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                            if (row.RegType == 1) {
                                return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                            } else {
                                if (row.ReplyStatusCcd == '{{$arr_ccd_reply['finish']}}') {
                                    return '<a href="javascript:void(0);" class="btn-reply-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                                } else {
                                    return '<a href="javascript:void(0);" class="btn-reply-modify" data-idx="' + row.BoardIdx + '"><u>답변</u></a>';
                                }
                            }
                        }},
                ]
            });

            // 검색초기화
            $('#btn_search_del').on('click', function() {
                location.replace('{{ site_url("/board/{$boardName}") }}/?' + '{!! $boardDefaultQueryString !!}');
            });

            // 공지 숨기기
            $search_form.on('ifChanged', '#notice_display', function() {
                $datatable.draw();
            });

            // 삭제글 보기
            $search_form.on('ifChanged', '#delete_value', function() {
                $datatable.draw();
            });

            // 강성 클레임
            $search_form.on('ifChanged', '#vod_value', function() {
                $datatable.draw();
            });

            // 공지 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url("/board/{$boardName}/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}');
            });

            // 공지 데이터 Read 페이지
            $list_table.on('click', '.btn-admin-read', function() {
                location.replace('{{ site_url("/board/{$boardName}/read") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}');
            });

            // 답변 수정/등록 폼
            $list_table.on('click', '.btn-reply-modify', function() {
                location.replace('{{ site_url("/board/{$boardName}/createCounselReply") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}');
            });

        });
    </script>
@stop