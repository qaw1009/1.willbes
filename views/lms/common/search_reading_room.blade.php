@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{$mang_title}} 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" id="site_code" value="{{$site_code}}"/>
        <input type="hidden" name="prod_type" id="prod_type" value="{{$prod_type}}"/>
        <input type="hidden" name="return_type" id="return_type" value="{{$return_type}}"/>
        <input type="hidden" name="target_id" id="target_id" value="{{$target_id}}"/>
        <input type="hidden" name="target_field" id="target_field" value="{{$target_field}}"/>
        <input type="hidden" name="prod_tabs" id="prod_tabs" value="{{implode(',', $prod_tabs)}}"/>
        <input type="hidden" name="hide_tabs" id="hide_tabs" value="{{implode(',', $hide_tabs)}}"/>
        <input type="hidden" name="is_event" id="is_event" value="{{$is_event}}"/>
        <input type="hidden" name="is_single" id="is_single" value="{{$is_single}}"/>
@endsection

@section('layer_content')
    <div class="form-group no-border-bottom no-padding">
        <p class="form-control-static"><span class="required">*</span> 검색한 {{$mang_title}}을 클릭해 주세요. (다중 선택 불가합니다.)</p>
    </div>
    @if(empty(array_filter($prod_tabs)) === false)
        <div class="form-group no-border-bottom no-padding">
            <ul class="nav nav-tabs nav-justified mb-10">
                @if(in_array('on', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('on', '615001');"><strong>단강좌</strong></a></li>
                    <li class="{{ in_array('adminpack_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('on', '615003');"><strong>운영자패키지</strong></a></li>
                    <li class="{{ in_array('periodpack_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('on', '615004');"><strong>기간제패키지</strong></a></li>
                @endif

                @if(in_array('off', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('off', '615006');"><strong>단과반</strong></a></li>
                    <li class="{{ in_array('off_pack_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('off', '615007');"><strong>종합반</strong></a></li>
                @endif

                @if(in_array('book', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('book', '');"><strong>교재</strong></a></li>
                @endif

                @if(in_array('reading_room', $prod_tabs) === true)
                    <li class="{{$prod_type == 'reading_room' ? 'active':''}}"><a href="#none" onclick="prodListChange('reading_room', '');"><strong>독서실</strong></a></li>
                @endif

                @if(in_array('locker', $prod_tabs) === true)
                    <li class="{{$prod_type == 'locker' ? 'active':''}}"><a href="#none" onclick="prodListChange('locker', '');"><strong>사물함</strong></a></li>
                @endif

                @if(in_array('mock_exam', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('mock_exam', '');"><strong>모의고사</strong></a></li>
                @endif
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label class="control-label col-md-1 pt-5 pl-20" for="search_value">조건
        </label>
        <div class="col-md-4 form-inline">
            <select class="form-control" id="_search_campus_ccd" name="_search_campus_ccd">
                <option value="">캠퍼스</option>
                @foreach($arr_campus as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
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
        <label class="control-label col-md-1 pt-5 pl-20" for="_search_value">검색
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
                    <th>{{$mang_title}}코드</th>
                    <th>{{$mang_title}}명</th>
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

    <script src="/public/js/lms/search_product.js"></script>
    <script type="text/javascript">
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $_list_table = $('#_list_ajax_table');
        var $parent_regi_form = $('#regi_form');
        var $return_type = $("#return_type").val();     // 리턴 방식
        var $target_id = '#' + $("#target_id").val();       // 리턴되는 타겟 레이어 id
        var $target_field = $("#target_field").val();       // 리턴되는 교재상품코드 input hidden name
        var prod_type = $search_form_modal.find("input[name='prod_type']").val(); // 상품타입 (book)

        $(document).ready(function() {
            /*$search_form_modal.find('select[name="_search_campus_ccd"]').chained("#_search_site_code");*/

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable_modal = $_list_table.DataTable({
                serverSide: true,
                buttons: [],
                ajax: {
                    'url' : (prod_type === 'reading_room') ? '{{ site_url('/common/searchReadingRoom/listAjax') }}' : '{{ site_url('/common/searchLockerRoom/listAjax') }}',
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
                        return '<a href="javascript:void(0);" data-row-idx="' + meta.row + '" class="btn-select"><u>' + data + '</u></a>';
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
                if (!confirm("해당 {{$mang_title}}을 선택하시겠습니까?")) {
                    return;
                }

                var row = $datatable_modal.row($(this).data('row-idx')).data();

                // 독서실 or 사물함
                var data = ' data-prod-type="' + prod_type + '" data-learn-pattern-ccd=""';
                data += ' data-prod-name="' + Base64.encode(row.ReadingRoomName) + '" data-sale-price="' + row.main_SalePrice + '" data-real-sale-price="' + row.main_RealSalePrice + '"';
                data += ' data-prod-type-ccd-name="{{$mang_title}}" data-learn-pattern-ccd-name="" data-campus-ccd-name="' + (row.CampusName != null ? row.CampusName : '') + '"';

                var html = '<span class="pr-10">[' + row.ProdCode + '] ' + row.ReadingRoomName;
                html += '   <a href="#none" data-prod-code="' + row.ProdCode + '" class="selected-product-delete"><i class="fa fa-times red"></i></a>';
                html += '   <input type="hidden" name="' + $target_field + '[]" value="' + row.ProdCode + '"' + data + '/>';
                html += '</span>';

                // 예치금 (판매금액이 0원 이상일 경우만)
                if (row.sub_SalePrice > 0) {
                    data = ' data-prod-type="deposit" data-learn-pattern-ccd=""';
                    data += ' data-prod-name="' + Base64.encode(row.ReadingRoomName) + '" data-sale-price="' + row.sub_SalePrice + '" data-real-sale-price="' + row.sub_RealSalePrice + '"';
                    data += ' data-prod-type-ccd-name="예치금" data-learn-pattern-ccd-name="" data-campus-ccd-name=""';

                    html += '<span class="pr-10">[' + row.SubProdCode + '] ' + row.ReadingRoomName;
                    html += '   <a href="#none" data-prod-code="' + row.SubProdCode + '" class="selected-product-delete"><i class="fa fa-times red"></i></a>';
                    html += '   <input type="hidden" name="' + $target_field + '[]" value="' + row.SubProdCode + '"' + data + '/>';
                    html += '</span>';
                }

                $(document).find($target_id).append(html);

                // change 이벤트 발생
                if ($search_form_modal.find("input[name='is_event']").val() === 'Y') {
                    $(document).find($target_id).trigger('change');
                }

                $("#pop_modal").modal('toggle');
            });
        });
    </script>
@endsection
