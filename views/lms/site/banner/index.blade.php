@extends('lcms.layouts.master')

@section('content')
    <h5>- 사이트 섹션별 배너를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code', 'tab', true, [], true, []) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">배너검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">배너명 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_cate_code">조건</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', true) !!}
                        <select class="form-control mr-10" id="search_cate_code" name="search_cate_code" title="카테고리">
                            <option value="">카테고리</option>
                            @foreach($arr_cate_code as $row)
                                <option value="{{$row['SiteCode']}}_{{$row['CateCode']}}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control mr-10" id="search_banner_disp_idx" name="search_banner_disp_idx" title="노출섹션">
                            <option value="">노출섹션</option>
                            @foreach($arr_disp_data as $row)
                                <option value="{{$row['BdIdx']}}" class="{{$row['SiteCode']}}_{{$row['CateCode']}}">{{$row['DispName']}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mr-10" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="I">노출기간</option>
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
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date active" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
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
                    <th>삭제</th>
                    <th>No</th>
                    <th>운영사이트</th>
                    <th>카테고리</th>
                    <th>노출섹션</th>
                    <th>배너명</th>
                    <th width="20%">배너이미지</th>
                    <th>노출기간</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>최종수정자</th>
                    <th>최종수정일</th>
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
            $search_form.find('select[name="search_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_banner_disp_idx"]').chained("#search_cate_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-10"></i> 미사용 적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-is-use' },
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder-open' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 배너 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/banner/regist/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/banner/regist/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_use" value="N" data-is-use-idx="'+ row.BIdx +'">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CateName'},
                    {'data' : 'DispName'},
                    {'data' : 'BannerName', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BIdx + '"><u class="blue">' + data + '</u></a>';
                        }},
                    {'data' : 'BannerRealFullPath', 'render' : function(data, type, row, meta) {
                            var img_url = row.BannerFullPath + row.BannerImgName;
                            return "<img class='img_"+row.BIdx+"' src='"+img_url+"' width='100%' height='30%'>";
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.DispStartDatm + ' ~ ' + row.DispEndDatm;
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'UpdAdminName'},
                    {'data' : 'UpdDatm'}
                ]
            });

            $('.btn-reorder-open').click(function() {
                $('.btn-reorder-open').setLayer({
                    "url" : "{{ site_url('/site/banner/regist/listReOrderModal') }}",
                    "width" : "1400",
                });
            });

            // 삭제
            $('.btn-is-use').click(function() {
                var $params = {};
                var _url = "{{ site_url('/site/banner/regist/delBanner') }}"

                $('input[name="is_use"]:checked').each(function() {
                    $params[$(this).data('is-use-idx')] = $(this).val();
                });

                if (Object.keys($params).length <= '0') {
                    alert('삭제할 리스트를 선택해주세요.');
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

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/banner/regist/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
