<h5>- 회원별 전체 쿠폰 사용 현황을 확인할 수 있습니다.</h5>
<form class="form-horizontal" id="search_form_coupon" name="search_form_coupon" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_member_idx" value="{{$memIdx}}" />
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">쿠폰/상품검색</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="search_value" name="search_value">
                </div>
                <div class="col-md-2">
                    <p class="form-control-static">명칭, 코드 검색 가능</p>
                </div>
                <label class="control-label col-md-1">쿠폰사용조건</label>
                <div class="col-md-5 form-inline">
                    <select class="form-control mr-10" id="search_issue_type" name="search_issue_type">
                        <option value="">발급구분</option>
                        @foreach($arr_issue_type_ccd as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <select class="form-control mr-10" id="search_is_use" name="search_is_use">
                        <option value="">사용여부</option>
                        <option value="Y">사용</option>
                        <option value="N">미사용</option>
                    </select>
                    <select class="form-control mr-10" id="search_valid_status" name="search_valid_status">
                        <option value="">유효여부</option>
                        <option value="Y">유효</option>
                        <option value="N">만료</option>
                        <option value="C">취소</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1">날짜검색</label>
                <div class="col-md-11 form-inline">
                    <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                        <option value="I">발급일</option>
                        <option value="U">사용일</option>
                        <option value="R">회수일</option>
                    </select>
                    <div class="input-group mb-0 mr-20">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
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
        </div>
    </div>
</form>
<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                <th>No</th>
                <th>쿠폰핀번호</th>
                <th>쿠폰정보</th>
                <th>발급구분</th>
                <th>발급일 (발급자)</th>
                <th>유효여부 (만료일)</th>
                <th>사용여부 (사용일)</th>
                <th>사용상품 (주문번호)</th>
                <th>발급회수일 (회수자)</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_coupon');
    var $list_table = $('#list_table');

    $(document).ready(function() {
        // 날짜검색 디폴트 셋팅
        if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
            setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
        }

        // 쿠폰발급 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [
//                { text: '<i class="fa fa-file-excel-o mr-5"></i> 쿠폰발급', className: 'btn-sm btn-success border-radius-reset mr-15 btn-regist' },
  //              { text: '<i class="fa fa-undo mr-5"></i> 쿠폰발급회수', className: 'btn-sm btn-success border-radius-reset mr-15 btn-retire' },
            ],
            ajax: {
                'url' : '{{ site_url('/service/coupon/issue/listAjax') }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : 'CdIdx', 'render' : function(data, type, row, meta) {
                        var is_retireable = row.IsUse === 'Y' || row.RetireDatm != null ? 'N' : 'Y';

                        return (data !== null) ? '<input type="checkbox" name="cd_idx" class="flat target-crm-member" value="' + data + '" data-idx="' + row.CouponIdx + '" data-is-retireable="' + is_retireable + '" data-mem-idx="' + row.MemIdx + '">' +
                            (is_retireable === 'N' ? '<br/><span class="pt-5">회수불가</span>' : '') : '';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'CouponPin'},
                {'data' : 'CouponName', 'render' : function(data, type, row, meta) {
                        return '<a href="#none" class="btn-modify" data-idx="' + row.CouponIdx + '"><u class="blue">' + data + '</u></a> [' + row.CouponIdx + ']';
                    }},
                {'data' : 'IssueTypeName'},
                {'data' : 'IssueDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 10) + '<br/>(' + row.IssueUserName + ')';
                    }},
                {'data' : 'ValidStatus', 'render' : function(data, type, row, meta) {
                        return ((data !== '유효') ? '<span class="red">' + row.ValidStatusName + '</span>' : row.ValidStatusName) + '<br/>(' + row.ExpireDatm.substr(0, 16) + ')';
                    }},
                {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용 (' + row.UseDatm.substr(0, 16) + ')' : '<span class="red">미사용</span>';
                    }},
                {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return (row.IsUse === 'Y') ? data + '<br/>(<u class="blue">' + row.OrderNo + '</u>)' : '';
                    }},
                {'data' : 'RetireDatm', 'render' : function(data, type, row, meta) {
                        return (data !== null) ? data.substr(0, 16) + '<br/>(' + row.RetireUserName + ')' : '';
                    }}
            ]
        });

        // 전체선택/해제
        $list_table.on('ifChanged', '#_is_all', function() {
            iCheckAll($list_table.find('input[name="cd_idx"]'), $(this));
        });

        $('.btn-regist').on('click', function(event) {

        });

        $('.btn-retire').on('click', function() {

        });

        // 쿠폰 수정 폼
        $list_table.on('click', '.btn-modify', function() {
            location.href = '{{ site_url('/service/coupon/regist/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
        });

        init_datatable();
    });
</script>