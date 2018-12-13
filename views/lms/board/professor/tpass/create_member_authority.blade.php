@extends('lcms.layouts.master')

@section('content')
<h5>- 특정 강좌를 구매한 회원들에게 제공하는 학습자료를 관리하는 메뉴입니다. (운영자 패키지만 사용)</h5>
<h5>- {{$arr_prof_info['ProfNickName']}} 교수 T-pass 자료실</h5>
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
    <div class="row">
        <div class="col-xs-12 text-right form-inline">
            <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">전체강좌목록</button>
        </div>
    </div>
</div>

<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="modal_regi_form" name="modal_regi_form" method="POST" novalidate action="{{ site_url("/board/professor/{$boardName}/storeMemberAuthority/{$prod_code}?{$boardDefaultQueryString}") }}">--}}
    {!! csrf_field() !!}
    {!! method_field($method) !!}

    @foreach($input_params as $key => $val)
        <input type="hidden" name="{{$key}}" value="{{$val}}">
    @endforeach
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
                <label class="control-label col-md-1" for="search_value">회원검색</label>
                <div class="col-md-10 form-inline">
                    <input type="text" id="search_value" name="search_value" class="form-control" title="회원검색어" value="" style="width: 180px;">
                    <button type="button" class="btn btn-sm btn-primary mb-0 btn-search">회원검색</button>
                </div>
            </div>
        </div>

        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>발송</th>
                    <th>NO</th>
                    <th>회원명(ID)</th>
                    <th>유효시작일</th>
                    <th>유효기간(만료일)</th>
                    <th>부여일(부여자)</th>
                    <th>부여사유</th>
                    <th>권한보여회수</th>
                    <th>회수일(회수자)</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</form>

<script src="/public/js/lms/search_member.js"></script>
<script type="text/javascript">
    var $datatable;
    var $list_table = $('#list_ajax_table');
    var $regi_form = $('#regi_form');
    $(document).ready(function() {
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms' },
                { text: '<i class="fa fa-mobile mr-5"></i> 권한부여회수', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-update-authority' },
            ],
            ajax: {
                'url' : '{{ site_url("/board/professor/{$boardName}/memberAuthorityAjax/{$prod_code}?") }}' + '{!! $boardDefaultQueryString !!}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($regi_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_checked" value="1" class="flat target-crm-member" data-mem-idx="' + row.MemIdx + '"/>';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
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
                {'data' : null, 'render' : function(data, type, row, meta) {
                        var is_chk_type;
                        if (row.IsValid == 'N') {
                            is_chk_type = 'disabled';
                        } else {
                            is_chk_type = '';
                        }
                        return '<input type="checkbox" name="is_authority_checked" value="1" class="flat" '+is_chk_type+' data-idx="' + row.BtmaIdx + '"/>';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta){
                    if (row.RetireAdminName != '') {
                        return row.RetireDatm + ' (' + row.RetireAdminName + ')';
                    } else {
                        return '';
                    }
                    }},
            ]
        });

        //전체강좌목록
        $('.btn-main-list').click(function() {
            location.href = '{{ site_url("/board/professor/{$boardName}/productList") }}/' + getQueryString();
        });

        $regi_form.on('click', '.btn-search', function () {
            $datatable.draw();
        });

        //메뉴권한부여
        $regi_form.submit(function() {
            var _url = '{{ site_url("/board/professor/{$boardName}/storeMemberAuthority/{$prod_code}?") }}' + '{!! $boardDefaultQueryString !!}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();
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

        // 권한부여회수
        $('.btn-update-authority').click(function() {
            var $params = new Array();
            var $params_length = 0;

            $('input[name="is_authority_checked"]:checked').each(function(key) {
                $params[key] = $(this).data('idx');
            });

            $params_length = Object.keys($params).length;
            if ($params_length <= '0') {
                alert('권한을 회수할 명단을 선택해주세요.');
                return false;
            }

            if (!confirm('부여된 권한을 회수하시겠습니까?')) {
                return false;
            }

            data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'is_authority' : 'N',
                'params' : JSON.stringify($params)
            };

            var _url = '{{ site_url("/board/professor/{$boardName}/updateAuthority?") }}' + '{!! $boardDefaultQueryString !!}';
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();

                }
            }, showError, false, 'POST');
        });
    });
</script>
@stop