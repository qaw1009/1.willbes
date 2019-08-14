@extends('lcms.layouts.master_modal')

@section('layer_title')
    @if(empty($wLecIdx) === true)
        단과반 검색
    @else
        동일한 마스터강좌로 등록된 단과반
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
        <input type="hidden" name="CampusCcd" value="{{ $CampusCcd }}"/>
        @endsection

        @section('layer_content')
            @if(empty($wLecIdx) === true)
                <div class="form-group form-group-sm mb-0">
                    <p class="form-control-static"><span class="required">*</span> 검색한 단과반 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
                </div>
            @endif

            @if(empty($wLecIdx) === true)
                <div class="form-group form-group-bordered pt-10 pb-5">
                    <label class="control-label col-md-2 pt-5" for="search_value">단과반검색
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
            @endif
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            @if(empty($wLecIdx) === true)
                                <th width="3%"> <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                            @endif
                            <th>캠퍼스</th>
                            <th>강좌기본정보</th>
                            <th>수강형태</th>
                            <th>수강신청<BR>구분</th>
                            <th>개강<BR>년/월</th>
                            <th>과정</th>
                            <th>과목</th>
                            <th>교수</th>
                            <th>단과반명</th>
                            <th>판매가</th>
                            <th>정원</th>
                            <th>개강~종강일</th>
                            <th>개설여부</th>
                            <th>접수기간</th>
                            <th>접수상태</th>
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
                var $datatable_modal;
                var $search_form_modal = $('#_search_form');
                var $list_table_modal = $('#_list_ajax_table');
                var $parent_regi_form = $('#regi_form');

                var $parent_location = "{{str_replace("Add",'List',$locationid)}}";
                var $parent_location_tr = @if($locationid === 'subLecAdd') 'subLecTrId'; @elseif($locationid === 'essLecAdd') 'essLecTrId'; @elseif($locationid === 'selLecAdd') 'selLecTrId'; @else 'lecTrId'; @endif
                var $parent_element = @if($locationid === 'subLecAdd' || $locationid === 'essLecAdd' || $locationid === 'selLecAdd' ) 'ProdCodeSub'; @else 'AutoProdCode'; @endif

                $(document).ready(function() {
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
                            'url' : '{{ site_url('/common/searchOffLecture/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },키

                        columns: [
                                @if(empty($wLecIdx) === true)
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    //var seq = meta.row + meta.settings._iDisplayStart;
                                    var seq = meta.row;     //무조건 0 부터 시작 하단에서 걸림 ( for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔... )
                                    var codeInfo= row.ProdCode+'@$'         //0
                                        +row.CateName+'@$'                      //1
                                        +row.CourseName+'@$'                    //2
                                        +row.SubjectName+'@$'                   //3
                                        +row.wProfName_String+'@$'             //4
                                        +row.ProdName+'@$'                      //5
                                        +''+'@$'      //6
                                        +addComma(row.RealSalePrice)+'원@$'      //7
                                        +row.CampusCcd_Name+'@$'            //8
                                        +row.SchoolStartYear+'/'+row.SchoolStartMonth+'@$'  //9
                                        +((row.IsLecOpen === 'Y') ? '개설' : '폐강')+'@$'       //10
                                        +row.AcceptStatusCcd_Name+'@$'    //11
                                    ;
                                    return '<input type="checkbox" id="checkIdx' + seq + '" name="checkIdx" class="flat" value="' + codeInfo + '" />';
                                }},
                                @endif
                            {'data' : 'CampusCcd_Name'},//캠퍼스
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                                }},
                            {'data' : 'StudyPatternCcd_Name'},
                            {'data' : 'StudyApplyCcd_Name'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SchoolStartYear+'/'+row.SchoolStartMonth;
                                }},
                            {'data' : 'CourseName'},//과정명
                            {'data' : 'SubjectName'},//과목명
                            {'data' : 'wProfName_String'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return '['+row.ProdCode+ '] ' + row.ProdName + '';
                                }},//단강좌명
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                                }},
                            {'data' : 'FixNumber'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.StudyStartDate +' ~ '+row.StudyEndDate
                                }},
                            {'data' : 'IsLecOpen', 'render' : function(data, type, row, meta) {
                                    return  ((data === 'Y') ? ' 개설 ' : ' <span class="red">폐강</span> ');
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SaleStartDatm +' ~ '+row.SaleEndDatm
                                }},
                            {'data' : 'AcceptStatusCcd_Name', 'render' : function(data, type, row, meta) {
                                    return  ((data === '접수마감') ? ' <span class="red">'+data+'</span>' : data);
                                }},
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


                    // 적용 버튼
                    //$('#_btn_apply').on('click', function() {
                    function sendContent() {

                        var addCnt = $("input[name='checkIdx']:checked").length;		//적용할 갯수
                        var allCnt = $("input[name='checkIdx']").length;		//노출된 전체 갯수
                        if(addCnt == 0) {alert("적용할 단과반이 없습니다. 선택 후 적용하여 주십시오.");return;}
                        if (!confirm('해당 단과반을 적용하시겠습니까?')) {return;}

                        var nowRowCnt = ($parent_regi_form.find("#"+$parent_location+" tr")).length - 1;
                        var seq = nowRowCnt+1;

                        for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                            //##
                            if ( $("input:checkbox[id='checkIdx"+i+"']").is(":checked") == true  ) {

                                temp_data = $("#checkIdx"+i).val();
                                temp_data_arr = temp_data.split("@$");

                                $(document).find("#"+$parent_location).append(
                                    "<tr id='"+$parent_location_tr+seq+"'>"
                                    +"		<input type='hidden'  name='"+$parent_element+"[]' id='"+$parent_element+seq+"' value='"+temp_data_arr[0]+"'>"
                                        @if($locationid === 'essLecAdd' || $locationid === 'selLecAdd')
                                    +"		<input type='hidden'  name='{{$locationid}}Check[]' id='{{$locationid}}"+seq+"' value='Y'>"
                                    +"		<input type='hidden'  name='IsEssential[]' id='IsEssential"+seq+"' value='{{$locationid === 'essLecAdd' ? 'Y' : 'N'}}'>"
                                    +"		<td>"
                                    +"     <select name='SubGroupName[]' id='SubGroupName"+seq+"' class=\"form-control mr-10\">"
                                        @for($i=1;$i<11;$i++)
                                    +"         <option value='{{$i}}'>{{$i}}</option>"
                                        @endfor
                                    +"     </select>"
                                    +"		</td>"
                                        @endif
                                    +"		<td>"+temp_data_arr[1]+"</td>"
                                    +"		<td>"+temp_data_arr[8]+"</td>"
                                    +"		<td>"+temp_data_arr[9]+"</td>"
                                    +"		<td>"+temp_data_arr[2]+"</td>"
                                    +"		<td>"+temp_data_arr[3]+"</td>"
                                    +"		<td>"+temp_data_arr[4]+"</td>"
                                    +"		<td style='text-align:left'>["+temp_data_arr[0]+"] "+temp_data_arr[5]+"</td>"
                                    +"		<td>"+temp_data_arr[7]+"</td>"
                                    +"		<td>"+temp_data_arr[10]+"</td>"
                                    +"		<td>"+temp_data_arr[11]+"</td>"
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