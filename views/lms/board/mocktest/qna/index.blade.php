@extends('lcms.layouts.master')

@section('content')
<h5>- 모의고사 이의제기/정오표 게시판을 관리하는 메뉴입니다.</h5>
<form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    {!! html_def_site_tabs($prod_data['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($prod_data['SiteCode'] => $prod_data['SiteName'])) !!}
    <input type="hidden" name="setting_bm_idx" value="{{$bm_idx}}">

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
                <label class="control-label col-md-1" for="search_category">조건</label>
                <div class="col-md-11 form-inline">
                    {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                    <select class="form-control" id="search_category" name="search_category">
                        <option value="">직렬</option>
                        @foreach($cateD1 as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="search_is_public" name="search_is_public">
                        <option value="">공개여부</option>
                        <option value="Y">공개</option>
                        <option value="N">비공개</option>
                    </select>

                    <select class="form-control" id="search_is_use" name="search_is_use">
                        <option value="">사용여부</option>
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
                    <p class="form-control-static">• 이름, 아이디, 휴대폰번호(끝 4자리) 검색 기능</p>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-xs-4">
                <button class="btn btn-info ml-20" type="button" id="btn_search_setting">기본화면셋팅</button>
            </div>
            <div class="col-xs-8 text-right form-inline">
                <div class="checkbox">
                    <input type="checkbox" name="search_chk_reply_display" value="1" class="flat" id="reply_display"/> <label for="reply_display">미답변 보기</label>
                    <input type="checkbox" name="search_chk_delete_display" value="1" class="flat" id="delete_display"/> <label for="delete_display">삭제글 보기</label>
                    <input type="checkbox" name="search_chk_hot_display" value="1" class="flat" id="notice_display"/> <label for="notice_display">공지 숨기기</label>
                </div>
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
                <th>NO</th>
                <th>운영사이트</th>
                <th>카테고리</th>
                <th>제목</th>
                <th>등록자</th>
                <th>등록일</th>
                <th>답변상태</th>
                <th>답변자</th>
                <th>답변일</th>
                <th>공개</th>
                <th>조회수</th>
                <th>사용</th>
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
                        location.href = '{{ site_url("/board/{$boardName}/createDetail/") }}' + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
                    }}
            ],
            ajax: {
                'url' : '{{ site_url("/board/{$boardName}/detailListAjax/?") }}' + '{!! $boardDefaultQueryString !!}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            "createdRow" : function( row, data, index ) {
                if (data['IsBest'] == '1') {
                    $(row).addClass('blue-sky');
                }

                if (data['IsStatus'] == 'N') {
                    $(row).addClass('bg-gray-custom');
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        if (row.IsBest == '1') {
                            return '<b>공지</b>';
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

                {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
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

        // 미답변 보기
        $search_form.on('ifChanged', '#reply_display', function() {
            $datatable.draw();
        });

        // 삭제글 보기
        $search_form.on('ifChanged', '#delete_display', function() {
            $datatable.draw();
        });

        // 공지 숨기기
        $search_form.on('ifChanged', '#notice_display', function() {
            $datatable.draw();
        });

        // 공지 데이터 수정 폼
        $list_table.on('click', '.btn-modify', function() {
            location.href='{{ site_url("/board/{$boardName}/createDetail") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
        });

        // 공지 데이터 Read 페이지
        $list_table.on('click', '.btn-admin-read', function() {
            location.href='{{ site_url("/board/{$boardName}/readDetail") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
        });
    });
</script>
@stop