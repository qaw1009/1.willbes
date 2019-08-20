@extends('lcms.layouts.master_modal')

@section('layer_title')
    @if(empty($prod_tabs) === false)
        상품검색
    @else
        @if(empty($wbook_idx) === false)
            동일한 마스터 교재로 등록된 교재
        @else
            교재검색
        @endif
    @endif
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" id="site_code" value="{{$site_code}}"/>
        <input type="hidden" name="wbook_idx" id="wbook_idx" value="{{$wbook_idx}}"/>
        <input type="hidden" name="prod_type" id="prod_type" value="{{$prod_type}}"/>
        <input type="hidden" name="return_type" id="return_type" value="{{$return_type}}"/>
        <input type="hidden" name="target_id" id="target_id" value="{{$target_id}}"/>
        <input type="hidden" name="target_field" id="target_field" value="{{$target_field}}"/>
        <input type="hidden" name="prod_tabs" id="prod_tabs" value="{{implode(',', $prod_tabs)}}"/>
        <input type="hidden" name="hide_tabs" id="hide_tabs" value="{{implode(',', $hide_tabs)}}"/>
        <input type="hidden" name="is_event" id="is_event" value="{{$is_event}}"/>
@endsection

@section('layer_content')
    @if(empty($wbook_idx) === true)
    <div class="form-group form-group-sm no-border-bottom">
        <p class="form-control-static pl-0"><span class="required">*</span> 검색한 교재 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
    </div>
    @endif
    @if(empty(array_filter($prod_tabs)) === false)
        <div class="form-group no-padding no-border-bottom">
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
                    <li class="active"><a href="#none" onclick="prodListChange('book', '');"><strong>교재</strong></a></li>
                @endif

                @if(in_array('reading_room', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('reading_room', '');"><strong>독서실</strong></a></li>
                @endif

                @if(in_array('locker', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('locker', '');"><strong>사물함</strong></a></li>
                @endif

                @if(in_array('mock_exam', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('mock_exam', '');"><strong>모의고사</strong></a></li>
                @endif
            </ul>
        </div>
    @endif
    @if(empty($wbook_idx) === true)
    <div class="form-group bdt-line">
        <label class="control-label col-md-1 pt-5" for="search_value">교재검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">명칭, 코드 검색 가능</p>
        </div>
        <div class="col-md-3 text-right pr-5">
            <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
        </div>
    </div>
    @endif
    <div class="row mt-20 mb-20">
        <div class="col-md-12 clearfix">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                @if(empty($wbook_idx) === true)
                    <th width="3%"><input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                @endif
                    <th>운영사이트</th>
                    <th>카테고리</th>
                    <th>교재코드</th>
                    <th>교재명</th>
                    <th>출판사</th>
                    <th>저자</th>
                    <th>판매가</th>
                    <th>판매여부</th>
                    <th>재고</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="/public/js/lms/search_product.js"></script>
    <script type="text/javascript">
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');
        var $parent_regi_form = $('#regi_form');
        var $return_type = $("#return_type").val();     // 리턴 방식
        var $target_id = '#' + $("#target_id").val();       // 리턴되는 타겟 레이어 id
        var $target_field = $("#target_field").val();       // 리턴되는 교재상품코드 input hidden name
        var $ori_selected_data = {};    // 기선택된 교재상품코드 json 변수

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                buttons: [
                @if(empty($wbook_idx) === true)
                    { text: '적용', className: 'btn btn-success btn-sm mb-0',action : function(e, dt, node, config) {
                            sendContent();
                        }
                    }
                @endif
                ],
                ajax: {
                    'url' : '{{ site_url('/common/searchBook/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                @if(empty($wbook_idx) === true)
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var seq = meta.row;
                        var codeInfo= row.ProdCode+'@$'+row.ProdName+'@$'+addComma(row.SalePrice)+'원@$'+addComma(row.RealSalePrice)+'원@$'+row.wSaleCcdName;
                        var checked = ($ori_selected_data.hasOwnProperty(row.ProdCode) === true) ? ' checked="checked"' : '';

                        return '<input type="checkbox" id="checkBook' + seq + '" name="checkBook" class="flat" value="' + codeInfo + '" data-row-idx="' + meta.row + '"' + checked + '/>';
                    }},
                @endif
                    {'data' : 'SiteName'},
                    {'data' : 'BCateName', 'render' : function(data, type, row, meta) {
                        return data + (row.MCateName !== '' ? ' > ' + row.MCateName : '');
                    }},
                    {'data' : 'ProdCode'},
                    {'data' : 'ProdName'},
                    {'data' : 'wPublName'},
                    {'data' : 'wAuthorNames'},
                    {'data' : 'RealSalePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '원';
                    }},
                    {'data' : 'wSaleCcdName'},
                    {'data' : 'wStockCnt'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 전체선택
            $datatable_modal.on('ifChanged', '#_is_all', function() {
                if ($(this).prop('checked') === true) {
                    $('input[name="checkBook"]').iCheck('check');
                } else {
                    $('input[name="checkBook"]').iCheck('uncheck');
                }
            });

            // 적용 버튼
            function sendContent() {
                var addCnt = $("input[name='checkBook']:checked").length;		//적용할 갯수
                var allCnt = $("input[name='checkBook']").length;		//노출된 전체 갯수
                if(addCnt === 0) {alert("적용할 교재가 없습니다. 선택 후 적용하여 주십시오.");return;}

                if (!confirm('해당 교재를 적용하시겠습니까?')) {
                    return;
                }

                if ($return_type === 'table') {
                    // table 형태로 리턴 ([온라인] 상품관리 > 단강좌 > 등록)
                    var nowRowCnt = ($parent_regi_form.find($target_id + " tr")).length - 1;
                    var seq = nowRowCnt+1;

                    for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                        //##
                        if ($("input:checkbox[id='checkBook"+i+"']").is(":checked") === true) {
                            var temp_data = $("#checkBook"+i).val();		//해당 id값 추출
                            var temp_data_arr = temp_data.split("@$");	    //문자열 분리

                            // 기존 선택된 것 이외의 것만 추가
                            if ($ori_selected_data.hasOwnProperty(temp_data_arr[0]) === false) {
                                $(document).find($target_id).append(
                                    "<tr id='bookTrId"+seq+"'>"
                                    +"		<input type='hidden' name='" + $target_field + "[]' id='" + $target_field + seq+ "' value='"+temp_data_arr[0]+"'>"
                                    +"		<td>"
                                    +"          <select name='OptionCcd[]' id='OptionCcd"+ seq +"' class=\"form-control\">"
                                        @foreach($bookprovision_ccd as $key=>$val)
                                    +"              <option value='{{$key}}'>{{$val}}</option>"
                                        @endforeach
                                    +"          </select>"
                                    +"      </td>"
                                    +"		<td style='text-align:left'>["+ temp_data_arr[0] +"] &nbsp;"+temp_data_arr[1]+"</td>"
                                    +"		<td>"+temp_data_arr[2]+"</td>"
                                    +"		<td>"+temp_data_arr[3]+"</td>"
                                    +"		<td>"+temp_data_arr[4]+"</td>"
                                    +"		<td><a href='#none' onclick=\"rowDelete(\'bookTrId"+seq+"')\"><i class=\"fa fa-times red\"></i></a></td>"
                                    +"	</tr>"
                                );
                                seq = seq + 1;
                            }
                        }
                    }
                } else if ($return_type === 'inline') {
                    var prod_type = $search_form_modal.find("input[name='prod_type']").val(); // 상품타입 (book)
                    var row, data;

                    $("input[name='checkBook']:checked").each(function() {
                        // 기존 선택된 것 이외의 것만 추가
                        if ($ori_selected_data.hasOwnProperty($(this).val()) === false) {
                            row = $datatable_modal.row($(this).data('row-idx')).data();

                            data = ' data-prod-type="' + prod_type + '" data-learn-pattern-ccd=""';
                            data += ' data-prod-name="' + Base64.encode(row.ProdName) + '" data-sale-price="' + row.SalePrice + '" data-real-sale-price="' + row.RealSalePrice + '"';
                            data += ' data-prod-type-ccd-name="교재" data-learn-pattern-ccd-name="" data-campus-ccd-name=""';

                            $(document).find($target_id).append(
                                '<span class="pr-10">[' + row.ProdCode + '] ' + row.ProdName +
                                '   <a href="#none" data-prod-code="' + row.ProdCode + '" class="selected-product-delete"><i class="fa fa-times red"></i></a>' +
                                '   <input type="hidden" name="' + $target_field + '[]" value="' + row.ProdCode + '"' + data + '/>' +
                                '</span>'
                            );
                        }
                    });

                    // change 이벤트 발생
                    if ($search_form_modal.find("input[name='is_event']").val() === 'Y') {
                        $(document).find($target_id).trigger('change');
                    }
                }

                $("#pop_modal").modal('toggle');
            }

            // 기존 선택된 정보 셋팅
            var setOriSelectedData = function() {
                var code;

                $parent_regi_form.find('input[name="' + $target_field + '[]"]').each(function() {
                    // 기존 선택된 정보 json 변수에 저장
                    code = $(this).val();
                    $ori_selected_data[code] = code;
                });
            };

            setOriSelectedData();
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection