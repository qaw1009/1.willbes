@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 온라인 공지사항 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_send_pattern_ccd">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_send_pattern_ccd" name="search_send_pattern_ccd">
                            <option value="">메세지성격</option>
                            @foreach($arr_send_pattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_send_type_ccd" name="search_send_type_ccd">
                            <option value="">메세지종류</option>
                            @foreach($arr_send_type_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_send_status_ccd" name="search_send_status_ccd">
                            <option value="">발송상태</option>
                            @foreach($arr_send_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        {{--<select class="form-control" id="search_is_agree" name="search_is_agree">
                            <option value="">수신동의</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>--}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제목/내용</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">내용 가능</p>
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
                    <th>취소</th>
                    <th>NO</th>
                    <th>사이트</th>
                    <th>메세지성격</th>
                    <th>메세지종류</th>
                    <th>내용</th>
                    <th>발신번호</th>
                    <th>발신인</th>
                    <th>발송일</th>
                    <th>발송상태</th>
                    {{--<th>재발송</th>--}}
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
                    { text: '<i class="fa fa-copy mr-10"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sand-create' },

                    { text: '<i class="fa fa-copy mr-10"></i> 예약취소', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-send-cancel' },
                ],
                ajax: {
                    'url' : '{{ site_url("/crm/sms/listAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="send_cancel[]" value="' +row.SendIdx+ '">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'SendPatternCcdName'},
                    {'data' : 'SendTypeCcdName'},
                    {'data' : 'Content', 'render' : function(data, type, row, meta){
                            return data;
                        }},
                    {'data' : 'CsTel'},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'SendStatusCcdName'}
                ],
            });

            $('.btn-sand-create').click(function() {
                $('.btn-sand-create').setLayer({
                    "url" : "{{ site_url('crm/sms/createSendModal') }}",
                    width : "650"
                });
            });
        });
    </script>
@stop
