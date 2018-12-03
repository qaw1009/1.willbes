@extends('lcms.layouts.master_modal')

@section('layer_title')
    자료실권한부여
@stop

@section('layer_header')
<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
{{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" novalidate action="{{ site_url("/board/professor/{$boardName}/storeMemberAuthority/{$prod_code}?{$boardDefaultQueryString}") }}">--}}
    {!! csrf_field() !!}
    {!! method_field($method) !!}

    @foreach($input_params as $key => $val)
        <input type="hidden" name="{{$key}}" value="{{$val}}">
    @endforeach
@endsection

@section('layer_content')
<div class="x_panel">
    <div class="x_content">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>대비학년도</th>
                <th>패키지유형</th>
                <th>운영자패키지명</th>
                <th>판매가</th>
                <th>판매여부</th>
                <th>사용여부</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$product_data['SchoolYear']}}</td>
                <td>{{str_replace('패키지','',$product_data['PackTypeCcd_Name'])}}</td>
                <td>[{{$product_data['ProdCode']}}] {{$product_data['ProdName']}}</td>
                <td>
                    {{number_format($product_data['RealSalePrice'])}}원<BR><strike>{{number_format($product_data['SalePrice'])}}원</strike>
                </td>
                <td>
                    @if($product_data['SaleStatusCcd_Name'] == '판매불가')
                        <span class="red">{{$product_data['SaleStatusCcd_Name']}}</span>
                    @else
                        {{$product_data['SaleStatusCcd_Name']}}
                    @endif
                </td>
                <td>
                    {!! ($product_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        - 메뉴 권한 부여
    </div>
    <div class="x_content">
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1" for="search_mem_type_1">등록구분 <span class="required">*</span>
            </label>
            <div class="col-md-10 item">
                <div class="radio">
                    <input type="radio" id="search_mem_type_1" name="search_mem_type" class="flat" value="S" title="등록구분" required="required" checked="checked"/> <label for="search_mem_type_1" class="input-label">개별등록</label>
                    <input type="radio" id="search_mem_type_2" name="search_mem_type" class="flat" value="F"/> <label for="search_mem_type_2" class="input-label">일괄등록</label>
                </div>
            </div>
        </div>
        <div id="search_mem_type_S" class="form-group form-group-sm form-regi-input">
            <label class="control-label col-md-1" for="search_mem_id">개별등록
            </label>
            <div class="col-md-10 form-inline">
                <input type="text" id="search_mem_id" name="search_mem_id" class="form-control" title="회원검색어" value="" style="width: 180px;">
                <button type="button" name="btn_member_search" data-result-type="multiple" class="btn btn-sm btn-primary mb-0">회원검색</button>
                <span id="selected_member" class="pl-10"></span>
            </div>
        </div>
        <div id="search_mem_type_F" class="form-group form-group-sm form-regi-input hide">
            <label class="control-label col-md-1" for="search_mem_file">일괄등록
            </label>
            <div class="col-md-10 form-inline">
                <input type="file" id="search_mem_file" name="search_mem_file" class="form-control" title="회원검색파일" value="">
                <button type="button" name="btn_member_file_upload" class="btn btn-primary mb-0">업로드하기</button>
                <span id="selected_member_file" class="hide"></span>
            </div>
            <div class="col-md-10 col-md-offset-1 mt-5">
                <p class="form-control-static"># 첨부파일은 한줄에 한 개의 아이디로 구성된 TXT 파일로 생성</p>
            </div>
            <div class="col-md-2 col-md-offset-1 mt-5">
                <select class="form-control" id="selected_member_file2" name="selected_member_file2" size="4" style="height: 80px;">
                </select>
            </div>
            <div class="col-md-2">
                <p class="form-control-static">&lt;총 <span id="selected_member_cnt">0</span>명&gt;</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1" for="valid_start_date">시작일 <span class="required">*</span>
            </label>
            <div class="col-md-10 form-inline item">
                <input type="text" class="form-control datepicker" title="시작일" id="valid_start_date" name="valid_start_date" required="required" value="">
        </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1" for="valid_days">유효기간 <span class="required">*</span>
            </label>
            <div class="col-md-3 form-inline item">
                <input type="text" class="form-control" title="유효기간" id="valid_days" name="valid_days" required="required" value="240">
            </div>
            <div class="col-md-5">
                <p class="form-control-static"># 240일로 자동 셋팅(유효기간 변경 가능)</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1" for="valid_reason">부여사유
            </label>
            <div class="col-md-9 item">
                <input type="text" id="valid_reason" name="valid_reason" class="form-control" title="부여사유" value="">
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="text-center">
            <button type="submit" class="btn btn-sm btn-success mr-10">권한부여</button>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        - 메뉴 권한 부여 현황
    </div>
    <div class="x_content">
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1" for="search_modal_value">회원검색</label>
            <div class="col-md-10 form-inline">
                <input type="text" id="search_modal_value" name="search_modal_value" class="form-control" title="회원검색어" value="" style="width: 180px;">
                <button type="button" class="btn btn-sm btn-primary mb-0 btn-search-modal">회원검색</button>
            </div>
        </div>
    </div>

    <div class="x_content">
        <table id="list_ajax_table_modal" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>선택</th>
                <th>NO</th>
                <th>회원명(ID)</th>
                <th>유효시작일</th>
                <th>유효기간(만료일)</th>
                <th>부여일(부여자)</th>
                <th>부여사유</th>
                <th>회수일(회수자)</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script src="/public/js/lms/search_member.js"></script>
<script type="text/javascript">
    var $datatable_modal;
    var $list_table_modal = $('#list_ajax_table_modal');
    var $regi_form = $('#regi_form');
    $(document).ready(function() {
        $datatable_modal = $list_table_modal.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-copy mr-10"></i> HOT적용', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-is-best' },

                { text: '<i class="fa fa-copy mr-10"></i> 복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy' },

                { text: '<i class="fa fa-pencil mr-10"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url("/board/professor/{$boardName}/createBoardForTpass/{$prod_code}") }}' + dtParamsToQueryString($datatable_modal) + '{!! $boardDefaultQueryString !!}';
                    }}
            ],
            ajax: {
                'url' : '{{ site_url("/board/professor/{$boardName}/memberAuthorityAjax/{$prod_code}?") }}' + '{!! $boardDefaultQueryString !!}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="cancel_authority" value="1" class="flat is-authority" data-is-authority-idx="' + row.BtmaIdx + '"/>';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : null, 'render' : function(data, type, row, meta){
                        return row.MemName+'('+row.MemId+')';
                    }},
                {'data' : 'ValidStartDate'},
                {'data' : null, 'render' : function(data, type, row, meta){
                        return row.ValidDay+' ('+row.ValidEndDate+')';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta){
                        return row.RegDatm+' ('+row.RegAdminName+')';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta){
                        return row.ValidReason;
                    }},
                {'data' : null, 'render' : function(data, type, row, meta){
                        return row.RetireDatm+' ('+row.RetireAdminName+')';
                    }},
            ]
        });

        //메뉴권한부여
        $regi_form.submit(function() {
            var _url = '{{ site_url("/board/professor/{$boardName}/storeMemberAuthority/{$prod_code}?") }}' + '{!! $boardDefaultQueryString !!}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_modal.draw();
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        var addValidate = function() {
            if($regi_form.find('input[name="mem_idx[]"]').length < 1) {
                alert('회원 선택은 필수입니다.');
                return false;
            }

            if (!confirm('해당 회원에게 권한을 부여하시겠습니까?')) {
                return false;
            }

            return true;
        };
    });
</script>
@stop

@section('add_buttons')
    {{--<button type="submit" class="btn btn-success">등록</button>--}}
@endsection

@section('layer_footer')
</form>
@endsection