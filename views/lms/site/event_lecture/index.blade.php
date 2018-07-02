@extends('lcms.layouts.master')

@section('content')
    <h5>- 이벤트, 설명회, 특강 등을 등록하고 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs('', 'tabs_site_code', 'tab', true, [], false, $offLineSite_list) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $offLineSite_list) !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">카테고리</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
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
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <label class="control-label col-md-1" for="search_start_date">기간검색</label>
                    <div class="col-md-7">
                        <div class="col-md-11 form-inline">
                            <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                                <option value="I">신청일</option>
                                <option value="R">등록일</option>
                            </select>
                            <div class="input-group mb-0 mr-20">
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
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20" id="_btn_reset">검색초기화</button>
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
                    <th>캠퍼스</th>
                    <th>카테고리</th>
                    <th>썸네일</th>
                    <th>신청유형</th>
                    <th>제목</th>
                    <th>신청기간</th>
                    <th>자동문자</th>
                    <th>신청현황</th>
                    <th>댓글현황</th>
                    <th>조회수</th>
                    <th>접수상태</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
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
            // 날짜검색 디폴트 셋팅
            /*setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');*/

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_category"]').chained("#search_site_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> 복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/eventLecture/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/eventLecture/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat" name="copy" value="' +row.ELIdx+ '">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
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

                    {'data' : 'AttachImgSmName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'Title'},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegDatm'},
                    {'data' : 'ReadCnt'},
                    {'data' : 'RegDatm'},

                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'ELIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.ELIdx + '"><u>수정</u></a>';
                        }},
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/site/eventLecture/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop