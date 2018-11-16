@extends('lcms.layouts.master_modal')

@section('layer_title')
    독서실 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="form-group form-group-sm">
                <ul class="nav nav-tabs nav-justified">
                    <li {{$prod_type == 'on_lecture' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('on_lecture');"><strong>단과반</strong></a></li>
                    <li {{$prod_type == 'off_lecture' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('off_lecture');"><strong>종합반</strong></a></li>
                    <li {{$prod_type == 'book' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('book');"><strong>교재</strong></a></li>
                    <li {{$prod_type == 'reading_room' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('reading_room');"><strong>독서실</strong></a></li>
                    <li {{$prod_type == 'locker' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('locker');"><strong>사물함</strong></a></li>
                    <li {{$prod_type == 'mock_exam' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('mock_exam');"><strong>모의고사</strong></a></li>
                </ul>
            </div>

            <div class="form-group">
                <label class="control-label col-md-1 pt-5" for="search_value">조건
                </label>
                <div class="col-md-4 form-inline">
                    {!! html_site_select('', '_search_site_code', '_search_site_code', '', '운영 사이트', '', '', false) !!}
                    <select class="form-control" id="_search_campus_ccd" name="_search_campus_ccd">
                        <option value="">캠퍼스</option>
                        @foreach($arr_campus as $row)
                            <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="control-label col-md-1">기간검색</label>
                <div class="col-md-5 form-inline">
                    <div class="input-group mb-0 mr-20">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="_search_start_date" name="_search_start_date" value="" autocomplete="off">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="_search_end_date" name="_search_end_date" value="" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="form-group pt-10 pb-5">
                <label class="control-label col-md-1 pt-5" for="_search_value">검색
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" id="_search_value" name="_search_value">
                </div>
                <div class="col-md-4">
                    <p class="form-control-static">명칭, 코드 검색 가능</p>
                </div>
                <div class="col-md-1 text-right">
                    <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
                </div>
            </div>

            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>운영사이트</th>
                            <th>캠퍼스</th>
                            <th>독서실코드</th>
                            <th>독서실명</th>
                            <th>강의실</th>
                            <th>예치금</th>
                            <th>판매가</th>
                            <th>좌석현황</th>
                            <th>잔여석</th>
                            <th>자동문자</th>
                            <th>사용여부</th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
    <script type="text/javascript">
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $_list_table = $('#_list_ajax_table');

        $(document).ready(function() {
            $search_form_modal.find('select[name="_search_campus_ccd"]').chained("#_search_site_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable_modal = $_list_table.DataTable({
                serverSide: true,
                buttons: [],
                ajax: {
                    'url' : '{{ site_url('/common/searchReadingRoom/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CampusName'},
                    {'data' : 'ProdCode'},
                    {'data' : 'ReadingRoomName', 'render' : function(data, type, row, meta) {
                            var datas = 'data-idx="' + row.LrIdx + '" data-prod-name="'+row.ReadingRoomName+'" data-prod-code="'+row.ProdCode+'"';
                            datas += ' data-prod-price="' + row.main_RealSalePrice + '"';
                            return '<a href="javascript:void(0);" class="btn-select" '+datas+'><u>' + data + '</u></a>';
                        }},
                    {'data' : 'LakeLayer'},
                    {'data' : 'sub_RealSalePrice'},
                    {'data' : 'main_RealSalePrice'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.countY+'/'+row.UseQty;
                        }},
                    {'data' : 'countN'},
                    {'data' : 'IsSmsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            $datatable_modal.on('click', '.btn-select', function() {
                var html = '';
                if (!confirm('해당 독서실을 선택하시겠습니까?')) {
                    return;
                }

                //html append 부분


                $("#pop_modal").modal('toggle');
            });
        });

        function listChange(learnpattern) {
            /*var url = '{{ site_url('common/searchLectureAll/')}}'+'?site_code='+$("#site_code").val()+'&prod_type='+$("#prod_type").val()
                +'&return_type='+$("#return_type").val()+'&target_id='+$("#target_id").val()+'&target_field='+$("#target_field").val()+'&LearnPatternCcd='+learnpattern;
            sendAjax(url,
                '',
                function(d){
                    $("#pop_modal").find(".modal-content").html(d).end()
                },
                function(req, status, err){
                    showError(req, status);
                }, false, 'GET', 'html'
            );*/
        }
    </script>
@endsection