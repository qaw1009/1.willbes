@extends('lcms.layouts.master_modal')

@section('layer_title')
    교재 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" value="{{ $site_code }}"/>
        @endsection

        @section('layer_content')
            <div class="form-group form-group-sm mb-0">
                <p class="form-control-static"><span class="required">*</span> 검색한 교재 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
            </div>

            <div class="form-group form-group-bordered pt-10 pb-5">
                <label class="control-label col-md-2 pt-5" for="search_value">교재검색
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                </div>
                <div class="col-md-4">
                    <p class="form-control-static">명칭, 코드 검색 가능</p>
                </div>
                <div class="col-md-2 text-right pr-5">
                    <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
                </div>
            </div>
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="3%"><input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
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
            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_ajax_table');
                var $parent_regi_form = $('#regi_form');


                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable = $list_table.DataTable({
                        serverSide: true,
                        buttons: [

                            { text: '적용', className: 'btn btn-success btn-sm mb-0',action : function(e, dt, node, config) {
                                    sendContent();
                                }
                            }
                        ],

                        ajax: {
                            'url' : '{{ site_url('/common/searchBook/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },

                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    var seq = meta.row + meta.settings._iDisplayStart;
                                    var codeInfo= row.ProdCode+'@$'+row.ProdName+'@$'+addComma(row.SalePrice)+'원@$'+addComma(row.RealSalePrice)+'원@$'+row.wSaleCcdName;
                                    return '<input type="checkbox" id="checkBook' + seq + '" name="checkBook" class="flat" value="' + codeInfo + '" />';
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
                    $datatable.on('ifChanged', '#_is_all', function() {
                        if ($(this).prop('checked') === true) {
                            $('input[name="checkBook"]').iCheck('check');
                        } else {
                            $('input[name="checkBook"]').iCheck('uncheck');
                        }
                    });


                    // 적용 버튼
                    //$('#_btn_apply').on('click', function() {
                    function sendContent() {

                        var addCnt = $("input[name='checkBook']:checked").length;		//적용할 갯수
                        var allCnt = $("input[name='checkBook']").length;		//노출된 전체 갯수
                        if(addCnt == 0) {alert("적용할 교재가 없습니다. 선택 후 적용하여 주십시오.");return;}

                        if (!confirm('해당 교재를 적용하시겠습니까?')) {
                            return;
                        }

                        var nowRowCnt = ($parent_regi_form.find("#bookList tr")).length - 1;
                        var seq = nowRowCnt+1;

                        for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                            //##
                            if ( $("input:checkbox[id='checkBook"+i+"']").is(":checked") == true  ) {

                                temp_data = $("#checkBook"+i).val();		//해당 id값 추출

                                temp_data_arr = temp_data.split("@$")		//문자열 분리

                                $(document).find("#bookList").append(
                                    "<tr id='bookTrId"+seq+"'>"
                                    +"		<input type='hidden'  name='BookProdCode[]' id='BookProdCode"+seq+"' value='"+temp_data_arr[0]+"'>"
                                    +"		<td>"
                                    +"          <select name='BookProvisionCcd[]' id='BookProdCode"+seq+"' class=\"form-control\">"
                                        @foreach($bookprovision_ccd as $key=>$val)
                                    +"              <option value='{{$key}}'>{{$val}}</option>"
                                        @endforeach
                                    +"          </select>"
                                    +"      </td>"
                                    +"		<td style='text-align:left'>["+ temp_data_arr[0] +"] &nbsp;"+temp_data_arr[1]+"</td>"
                                    +"		<td>"+temp_data_arr[2]+"</td>"
                                    +"		<td>"+temp_data_arr[3]+"</td>"
                                    +"		<td>"+temp_data_arr[4]+"</td>"
                                    +"		<td><a href='javascript:;' onclick=\"rowDelete(\'bookTrId"+seq+"')\"><i class=\"fa fa-times red\"></i></a></td>"
                                    +"	</tr>"
                                );
                                seq = seq + 1;
                                //##
                            }
                            //#
                        }
                        $("#pop_modal").modal('toggle');
                    }


                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection