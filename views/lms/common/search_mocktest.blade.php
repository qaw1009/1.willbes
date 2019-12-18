@extends('lcms.layouts.master_modal')

@section('layer_title')
    모의고사검색
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
        <p class="form-control-static"><span class="required">*</span> 검색한 모의고사 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
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
                    <li><a href="#none" onclick="prodListChange('reading_room', '');"><strong>독서실</strong></a></li>
                @endif

                @if(in_array('locker', $prod_tabs) === true)
                    <li><a href="#none" onclick="prodListChange('locker', '');"><strong>사물함</strong></a></li>
                @endif

                @if(in_array('mock_exam', $prod_tabs) === true)
                    <li class="active"><a href="#none" onclick="prodListChange('mock_exam', '');"><strong>모의고사</strong></a></li>
                @endif
            </ul>
        </div>
    @endif
    <div class="form-group bdt-line pt-10 pb-5">
        <label class="control-label col-md-1 pt-5" for="search_value">모의고사검색
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
    <div class="row mt-20 mb-20">
        <div class="col-md-12 clearfix">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="3%"><input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                    <th>운영사이트</th>
                    <th>모의고사명</th>
                    <th>판매가</th>
                    <th>접수기간</th>
                    <th>응시형태</th>
                    <th>응시기간</th>
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
                    { text: '적용', className: 'btn btn-success btn-sm mb-0',action : function(e, dt, node, config) {
                            sendContent();
                        }
                    }
                ],
                ajax: {
                    'url' : '{{ site_url('/common/searchMockTest/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            var seq = meta.row;
                            var codeInfo= row.ProdCode+'@$'+row.ProdName+'@$'+addComma(row.SalePrice)+'원@$'+addComma(row.RealSalePrice)+'원@$'+row.wSaleCcdName;
                            var checked = ($ori_selected_data.hasOwnProperty(row.ProdCode) === true) ? ' checked="checked"' : '';

                            return '<input type="checkbox" id="checkProduct' + seq + '" name="checkProduct" class="flat" value="' + codeInfo + '" data-row-idx="' + meta.row + '"' + checked + '/>';
                        }},
                    {'data' : 'SiteName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+data.ProdCode+']' + data.ProdName;
                        }},
                    {'data' : 'RealSalePrice', 'render' : function(data, type, row, meta) {
                            return addComma(data) + '원';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.SaleStartDatm + '~<BR>' + data.SaleEndDatm;
                        }},
                    {'data' : 'TakeFormCcd_Name'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.TakeStartDatm + '~<BR>' + data.TakeEndDatm;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return (data.IsUse == 'Y') ? '사용' : '<font color="red">미사용</font>';
                        }},
                    {'data' : 'wAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });

            // 전체선택
            $datatable_modal.on('ifChanged', '#_is_all', function() {
                if ($(this).prop('checked') === true) {
                    $('input[name="checkProduct"]').iCheck('check');
                } else {
                    $('input[name="checkProduct"]').iCheck('uncheck');
                }
            });

            // 적용 버튼
            function sendContent() {
                var addCnt = $("input[name='checkProduct']:checked").length;		//적용할 갯수
                var allCnt = $("input[name='checkProduct']").length;		//노출된 전체 갯수
                if(addCnt === 0) {alert("적용할 모의고사가 없습니다. 선택 후 적용하여 주십시오.");return;}

                if (!confirm('해당 모의고사를 적용하시겠습니까?')) {
                    return;
                }

                if ($return_type === 'table') {
                    // table 형태로 리턴 ([온라인] 상품관리 > 단강좌 > 등록)
                    var nowRowCnt = ($parent_regi_form.find($target_id + " tr")).length - 1;
                    var seq = nowRowCnt+1;

                    for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                        //##
                        if ($("input:checkbox[id='checkProduct"+i+"']").is(":checked") === true) {
                            var temp_data = $("#checkProduct"+i).val();		//해당 id값 추출
                            var temp_data_arr = temp_data.split("@$");	    //문자열 분리

                            // 기존 선택된 것 이외의 것만 추가
                            if ($ori_selected_data.hasOwnProperty(temp_data_arr[0]) === false) {
                                $(document).find($target_id).append(
                                    "<tr id='mockTrId"+seq+"'>"
                                    +"		<input type='hidden' name='" + $target_field + "[]' id='" + $target_field + seq+ "' value='"+temp_data_arr[0]+"'>"
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

                    $("input[name='checkProduct']:checked").each(function() {
                        // 기존 선택된 것 이외의 것만 추가
                        if ($ori_selected_data.hasOwnProperty($(this).val()) === false) {
                            row = $datatable_modal.row($(this).data('row-idx')).data();

                            data = ' data-prod-type="' + prod_type + '" data-learn-pattern-ccd=""';
                            data += ' data-prod-name="' + Base64.encode(row.ProdName) + '" data-sale-price="' + row.SalePrice + '" data-real-sale-price="' + row.RealSalePrice + '"';
                            data += ' data-prod-type-ccd-name="모의고사" data-learn-pattern-ccd-name="" data-campus-ccd-name=""';

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
