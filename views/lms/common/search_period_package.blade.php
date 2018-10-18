@extends('lcms.layouts.master_modal')

@section('layer_title')
        무한패스검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="search_site_code" value="{{ $site_code }}"/>
        <input type="hidden" name="locationid" value="{{ $locationid }}"/>

        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm mb-0">
                <p class="form-control-static"><span class="required">*</span> 검색한 무한패스를 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 불가합니다.)</p>
            </div>

            <div class="form-group form-group-bordered pt-10 pb-5">
                <label class="control-label col-md-2 pt-5" for="search_value">통합검색
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
                            <th width="3%"> <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                            <th>대비학년도</th>
                            <th>패키지유형</th>
                            <th>수강가긴</th>
                            <th>기간제패키지명</th>
                            <th>판매가</th>
                            <th>배수</th>
                            <th>판매여부</th>
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
            <script type="text/javascript">
                var $datatable;
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_ajax_table');

                var $parent_location = "{{$locationid}}";

                $(document).ready(function() {

                    $datatable = $list_table.DataTable({
                        serverSide: true,
                        buttons: [
                            { text: '적용', className: 'btn btn-success btn-sm mb-0',action : function(e, dt, node, config) {
                                    sendContent();
                                }
                            }
                        ],

                        ajax: {
                            'url': '{{ site_url('/common/searchPeriodPackage/listAjax') }}',
                            'type': 'POST',
                            'data': function (data) {
                                return $.extend(arrToJson($search_form.serializeArray()), {
                                    'start': data.start,
                                    'length': data.length
                                });
                            }
                        },

                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    var codeInfo = row.ProdCode + '@$'         //0
                                        + row.ProdName;                      //1
                                    return '<input type="checkbox" id="checkIdx' + row.ProdCode + '" name="checkIdx" class="flat" value="' + codeInfo + '" />';
                                }},
                            {'data': 'SchoolYear'},//대비학년도
                            {
                                'data': null, 'render': function (data, type, row, meta) {
                                    return row.PackTypeCcd_Name.replace('패키지', '');
                                }
                            },
                            {'data': 'StudyPeriod_Name'},//수강기간

                            {
                                'data': null, 'render': function (data, type, row, meta) {
                                    return '[' + row.ProdCode + '] ' + row.ProdName + '';
                                }
                            },//패키지명
                            {
                                'data': null, 'render': function (data, type, row, meta) {
                                    return addComma(row.RealSalePrice) + '원<BR><strike>' + addComma(row.SalePrice) + '원</strike>';
                                }
                            },
                            {'data': 'MultipleApply'},//배수
                            {
                                'data': 'SaleStatusCcd_Name', 'render': function (data, type, row, meta) {
                                    return (data !== '판매불가') ? data : '<span class="red">' + data + '</span>';
                                }
                            },//판매여부
                            {
                                'data': 'IsUse', 'render': function (data, type, row, meta) {
                                    return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                                }
                            },//사용여부
                            {'data': 'wAdminName'},//등록자
                            {'data': 'RegDatm'}//등록일
                        ]
                    });



                    // 전체선택
                    $datatable.on('ifChanged', '#_is_all', function() {
                        if ($(this).prop('checked') === true) {
                            $('input[name="checkIdx"]').iCheck('check');
                        } else {
                            $('input[name="checkIdx"]').iCheck('uncheck');
                        }
                    });


                    function sendContent() {
                        var addCnt = $("input[name='checkIdx']:checked").length;		//적용할 갯수
                        var allCnt = $("input[name='checkIdx']").length;		//노출된 전체 갯수
                        if(addCnt == 0) {alert("적용할 패키지가 없습니다. 선택 후 적용하여 주십시오.");return;}
                        if (!confirm('해당 기간제패키지를 적용하시겠습니까?')) {return;}

                        for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                            //##
                            //if ( $("input:checkbox[id='checkIdx"+i+"']").is(":checked") == true  ) {
                            if ( $("input:checkbox[name='checkIdx']:eq("+i+")").is(":checked") == true  ) {
                                //temp_data = $("#checkIdx"+i).val();
                                temp_data = $("input:checkbox[name='checkIdx']:eq("+i+")").val();
                                temp_data_arr = temp_data.split("@$");
                                $(document).find("#" + $parent_location).append(
                                    "<span id='prodcode_"+temp_data_arr[0]+"'><input type=\"hidden\" name=\"ProdCode[]\" value=\"" + temp_data_arr[0] + "\">" +
                                    "["+temp_data_arr[0]+"]" + temp_data_arr[1]+"" +
                                    "&nbsp;<a onclick='rowDelete(\"prodcode_"+temp_data_arr[0]+"\")' href=\"javascript:;\"><i class=\"fa fa-times red\"></i></a>" +
                                    "&nbsp;&nbsp;&nbsp;</span>"
                                );
                            }
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