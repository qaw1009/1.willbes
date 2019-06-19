@extends('lcms.layouts.master')
@section('content')
    <h5>- 서포터즈 기수 별 기본정보를 등록/관리합니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($arr_base['def_site_code'], 'tabs_site_code', 'tab', false, [], false, $arr_base['arr_site_code']) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_supporters_year">서포터즈 검색</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($arr_base['def_site_code'], 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', true) !!}
                        <select class="form-control" id="search_supporters_year" name="search_supporters_year">
                            <option value="">년도</option>
                            @foreach($arr_base['arr_supporters_year'] as $keys => $vals)
                                @foreach($vals as $key => $val)
                                    <option value="{{ $val }}" class="{{ $keys }}">{{ $val }}</option>
                                @endforeach
                            @endforeach
                        </select>

                        <select class="form-control" id="search_supporters_number" name="search_supporters_number">
                            <option value="">기수</option>
                            @foreach($arr_base['arr_supporters_number'] as $keys => $vals)
                                @foreach($vals as $key => $val)
                                    <option value="{{ $val }}" class="{{ $keys }}">{{ $val }}</option>
                                @endforeach
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
                    <div class="col-md-2">
                        <p class="form-control-static">코드, 서포터즈명 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1 col-md-offset-1" for="search_start_date">등록일</label>
                    <div class="col-md-4 form-inline">
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
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>코드</th>
                    <th>연도</th>
                    <th>기수</th>
                    <th>서포터즈명</th>
                    <th>운영기간</th>
                    <th>쿠폰자동발급</th>
                    <th>사용</th>
                    <th>등록자</th>
                    <th>등록일</th>
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
            $search_form.find('select[name="search_supporters_year"]').chained("#search_site_code");
            $search_form.find('select[name="search_supporters_number"]').chained("#search_supporters_year");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-10"></i> 기수 등록', className: 'btn-sm btn-primary border-radius-reset btn-create' }
                ],
                ajax: {
                    'url' : '{{ site_url("/site/supporters/regist/listAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'SupportersIdx'},
                    {'data' : 'SupportersYear'},
                    {'data' : 'SupportersNumber'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.SupportersIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.StartDate + ' ~ ' + row.EndDate;
                        }},
                    {'data' : 'CouponIssueCcdName'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'},
                ],
            });

            $('.btn-create').click(function (){
                $('.btn-create').setLayer({
                    "url" : '{{ site_url("/site/supporters/regist/create") }}/',
                    "width" : "1000",
                    'modal_id' : 'pop_modal2'
                });
            });

            $list_table.on('click', '.btn-modify', function() {
                $('.btn-modify').setLayer({
                    "url" : '{{ site_url("/site/supporters/regist/create") }}/' + $(this).data('idx'),
                    "width" : "1000",
                    'modal_id' : 'pop_modal2'
                });
            });
        });
    </script>
@stop