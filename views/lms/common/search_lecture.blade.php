@extends('lcms.layouts.master_modal')

@section('layer_title')
    @if(empty($wLecIdx) === true)
        단강좌 검색
    @else
        동일한 마스터강좌로 등록된 @if($LearnPatternCcd==="615001")단강좌@else무료강좌@endif
    @endif
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" value="{{ $site_code }}"/>
        <input type="hidden" name="LearnPatternCcd" value="{{$LearnPatternCcd }}"/>
        <input type="hidden" name="ProdCode" value="{{ $ProdCode }}"/>
        <input type="hidden" name="locationid" value="{{ $locationid }}"/>
        <input type="hidden" name="wLecIdx" value="{{ $wLecIdx }}"/>
        <input type="hidden" name="cate_code" value="{{ $cate_code }}"/>

        @endsection

        @section('layer_content')
            @if(empty($wLecIdx) === true)
            <div class="form-group form-group-sm mb-0">
                <p class="form-control-static"><span class="required">*</span> 검색한 단강좌 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
            </div>
            @endif

    @if(empty($wLecIdx) === true)
            <div class="form-group pt-10 pb-5">
                <label class="control-label col-md-2 pt-5" for="search_value">단강좌검색
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                </div>
                <div class="col-md-4">
                    <p class="form-control-static">명칭, 코드 검색 가능</p>
                </div>
                <div class="col-md-2 text-right pr-5">
                </div>
            </div>
            <div class="form-group pt-10 pb-5">
                <label class="control-label col-md-2 pt-5" for="search_professor">강사검색</label>
                <div class="col-md-3">
                    <input type="text" class="form-control input-sm" id="search_professor" name="search_professor">
                </div>
                <div class="col-md-1"><label class="control-label pt-5 pl-30">조건</label></div>
                <div class="col-md-6 form-inline">
                    <select class="form-control" id="search_course_idx" name="search_course_idx">
                        <option value="">과정</option>
                        @foreach($arr_course as $row)
                            <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CourseName'] }}</option>
                        @endforeach
                    </select>
                    <select class="form-control" id="search_subject_idx" name="search_subject_idx">
                        <option value="">과목</option>
                        @foreach($arr_subject as $row)
                            <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="search_sales_ccd" name="search_sales_ccd">
                        <option value="">판매여부</option>
                        @foreach($Sales_ccd as $key=>$val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="search_is_use" name="search_is_use">
                        <option value="Y">사용</option>
                        <option value="N">미사용</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 text-right pr-5 mt-10 mb-20">
                <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
                <button type="button" class="btn btn-default btn-search" id="searchInit">초기화</button>
            </div>
    @endif
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            @if(empty($wLecIdx) === true)
                            <th width="3%"> <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                            @endif
                            <th width="10%">강좌기본정보</th>
                            <th width="6%">강좌유형</th>
                            <th width="6%">과정</th>
                            <th width="6%">과목</th>
                            <th width="6%">교수</th>
                            <th>@if($LearnPatternCcd !== "615005")단강좌명@else무료강좌명@endif</th>
                            <th width="8%">진행상태</th>
                        @if($LearnPatternCcd !== "615005")
                            <th width="7%">판매가</th>
                            <th width="4%">배수</th>
                        @endif
                            <th width="6%">판매여부</th>
                            <th width="6%">사용여부</th>
                            <th width="5%">등록자</th>
                            <th width="8%">등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#_search_form');
                var $list_table_modal = $('#_list_ajax_table');
                var $parent_regi_form = $('#regi_form');

                var $parent_location = "{{str_replace("Add",'List',$locationid)}}";
                var $parent_location_tr = @if($locationid === 'subLecAdd') 'subLecTrId'; @elseif($locationid === 'essLecAdd') 'essLecTrId'; @elseif($locationid === 'selLecAdd') 'selLecTrId'; @else 'lecTrId'; @endif
                var $parent_element = @if($locationid === 'subLecAdd' || $locationid === 'essLecAdd' || $locationid === 'selLecAdd' ) 'ProdCodeSub'; @else 'ProdCode_lecture'; @endif

                //본체에 등록된 상품 코드 배열
                var $selected_prodcode = {};

                $(document).ready(function() {

                    $("#"+$parent_location).find("tr").each(function() {
                        ele = $(this);
                        prod_code = ele.find('input[name="ProdCodeSub[]"]').val();
                        if(prod_code != undefined) {
                            console.log(prod_code);
                            $selected_prodcode[prod_code] = prod_code;
                        }
                    });

                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        buttons: [
                            @if(empty($wLecIdx) === true)
                            { text: '적용', className: 'btn btn-success btn-sm mb-0',action : function(e, dt, node, config) {
                                    sendContent();
                                }
                            }
                            @endif
                        ],
                        ajax: {
                            'url' : '{{ site_url('/common/searchLecture/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },

                        columns: [
                            @if(empty($wLecIdx) === true)
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    var checked = ($selected_prodcode.hasOwnProperty(row.ProdCode) === true) ? 'Y' : '';
                                    var seq = meta.row;     //무조건 0 부터 시작 하단에서 걸림 ( for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔... )
                                    var codeInfo= row.ProdCode+'@$'
                                        +row.CateName+'@$'
                                        +row.CourseName+'@$'
                                        +row.SubjectName+'@$'
                                        +row.wProfName_String+'@$'
                                        +row.ProdName+'@$'
                                        +row.wProgressCcd_Name+' ('+row.wUnitLectureCnt+ (row.wScheduleCount == null ? '' : '/'+row.wScheduleCount)+')@$'
                                        +addComma(row.RealSalePrice)+'원@$'
                                        +row.SaleStatusCcd_Name+'@$'
                                    ;
                                    return checked == 'Y' ? '<span class="red"><b>선택<BR>완료</b><input type="checkbox" id="checkIdx' + seq + '" name="checkIdx" class="hide"></span>':'<input type="checkbox" id="checkIdx' + seq + '" name="checkIdx" class="flat" value="' + codeInfo + '" />';
                                }},
                            @endif
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                                }},
                            @if($LearnPatternCcd==="615005")
                            {'data' : 'FreeLecTypeCcd_Name'},//강좌유형
                            @else
                            {'data' : 'LecTypeCcd_Name'},//강좌유형
                            @endif
                            {'data' : 'CourseName'},//과정명
                            {'data' : 'SubjectName'},//과목명
                            {'data' : 'wProfName_String'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return '['+row.ProdCode+ '] ' + row.ProdName + '';
                                }},//단강좌명

                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.wProgressCcd_Name+'<BR>('+row.wUnitLectureCnt+ (row.wScheduleCount == null ? '' : '/'+row.wScheduleCount)+')';
                                }},//진행상태

                            @if($LearnPatternCcd !== "615005")
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.MultipleApply == "1" ? "제한<BR>없음" : row.MultipleApply;
                                }},
                            @endif
                            {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                                    return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                                }},//판매여부
                            {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                                    return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                                }},//사용여부
                            {'data' : 'wAdminName'},//등록자
                            {'data' : 'RegDatm'}//등록일
                        ]
                    });

                    // 전체선택
                    $datatable_modal.on('ifChanged', '#_is_all', function() {
                        if ($(this).prop('checked') === true) {
                            $('input[name="checkIdx"]').iCheck('check');
                        } else {
                            $('input[name="checkIdx"]').iCheck('uncheck');
                        }
                    });

                    // 검색 초기화
                    $('#searchInit').on('click', function () {
                        $search_form_modal.find('[name^=search_]:not(#search_is_use)').each(function () {
                            $(this).val('');
                        });
                        $search_form_modal.find('[name=search_is_use]').each(function () {
                            $(this).val('Y');
                        });
                        $search_form_modal.find('#_btn_search').trigger('click');
                        $datatable_modal.draw();
                    });

                    // 적용 버튼
                    //$('#_btn_apply').on('click', function() {
                    function sendContent() {

                        var addCnt = $("input[name='checkIdx']:checked").length;		//적용할 갯수
                        var allCnt = $("input[name='checkIdx']").length;		//노출된 전체 갯수
                        if(addCnt == 0) {alert("적용할 단강좌가 없습니다. 선택 후 적용하여 주십시오.");return;}
                        if (!confirm('해당 단강좌를 적용하시겠습니까?')) {return;}

                        var nowRowCnt = ($parent_regi_form.find("#"+$parent_location+" tr")).length - 1;
                        var seq = nowRowCnt+1;

                        for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                            //##
                            if ( $("input:checkbox[id='checkIdx"+i+"']").is(":checked") == true  ) {

                                temp_data = $("#checkIdx"+i).val();
                                temp_data_arr = temp_data.split("@$");

                                $(document).find("#"+$parent_location).append(

                                    "<tr id='"+$parent_location_tr+seq+"' name='"+ $parent_location_tr +"'>"
                                    +"		<input type='hidden'  name='"+$parent_element+"[]' id='"+$parent_element+seq+"' value='"+temp_data_arr[0]+"'>"
                                        @if($locationid === 'essLecAdd' || $locationid === 'selLecAdd' )
                                    +"		<input type='hidden'  name='{{$locationid}}Check[]' id='{{$locationid}}"+seq+"' value='Y'>"
                                    +"		<input type='hidden'  name='IsEssential[]' id='IsEssential"+seq+"' value='{{$locationid === 'essLecAdd' ? 'Y' : 'N'}}'>"
                                    +"		<td>"
                                    +"     <select name='SubGroupName[]' id='SubGroupName"+seq+"' class=\"form-control mr-10\">"
                                            @for($i=1;$i<11;$i++)
                                    +"         <option value='{{$i}}'>{{$i}}</option>"
                                            @endfor
                                    +"     </select>"
                                    +"		</td>"
                                        @elseif($locationid === 'subLecAdd')
                                    +"		<input type='hidden'  name='IsEssential[]' id='IsEssential"+seq+"' value='N'>"
                                        @endif
                                    +"		<td>"+temp_data_arr[1]+"</td>"
                                    +"		<td>"+temp_data_arr[2]+"</td>"
                                    +"		<td>"+temp_data_arr[3]+"</td>"
                                    +"		<td>"+temp_data_arr[4]+"</td>"
                                    +"		<td style='text-align:left'>["+temp_data_arr[0]+"] "+temp_data_arr[5]+"</td>"
                                    +"		<td>"+temp_data_arr[6]+"</td>"
                                    +"		<td>"+temp_data_arr[7]+"</td>"
                                    +"		<td>"+temp_data_arr[8]+"</td>"
                                    +"		<td><a href='javascript:;' onclick=\"rowDelete('"+$parent_location_tr+seq+"')\"><i class=\"fa fa-times red\"></i></a></td>"
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