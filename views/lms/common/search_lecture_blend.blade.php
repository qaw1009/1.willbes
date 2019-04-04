@extends('lcms.layouts.master_modal')

@section('layer_title')
    강좌검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" id="site_code" value="{{ $site_code }}"/>
        <!--input type="hidden" name="LearnPatternCcd" value="{{$LearnPatternCcd }}"/> //-->
        <input type="hidden" name="locationid" id="locationid" value="{{$locationid}}"/>

        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm no-border-bottom">
                <p class="form-control-static"><span class="required">*</span> 검색한 강좌 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
            </div>

            <div class="form-group no-padding">
                <ul class="nav nav-tabs nav-justified mb-10">
                    <li {{$LearnPatternCcd == '615001' || $LearnPatternCcd == '615005' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('615001');"><strong>온라인</strong></a></li>
                    <li {{$LearnPatternCcd == '615006' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('615006');"><strong>학원</strong></a></li>
                </ul>
            </div>


            @if(empty($wLecIdx) === true)
                <div class="form-group pt-10 pb-5">
                    <label class="control-label col-md-2 pt-5" for="search_value">@if($LearnPatternCcd === '615006')단과반@else강좌@endif검색
                    </label>

                    <div class="col-md-2 radio">
                        @if($LearnPatternCcd === '615006')
                            <input type="hidden" name="LearnPatternCcd" value="615006">
                        @else
                            <input type="radio" name="LearnPatternCcd" value="615001" class="flat" @if($LearnPatternCcd === '' || $LearnPatternCcd === '615001') checked="checked" @endif> 단강좌
                            &nbsp;
                            <input type="radio" name="LearnPatternCcd" value="615005" class="flat" @if($LearnPatternCcd === '615005') checked="checked" @endif> 무료강좌
                        @endif
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
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
                            <th width="3%"> <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                            <th width="10%">강좌기본정보</th>
                    @if($LearnPatternCcd === "615001")
                            <th width="6%">강좌유형</th>
                            <th width="6%">과정</th>
                            <th width="6%">과목</th>
                            <th width="6%">교수</th>
                            <th>단강좌명</th>
                            <th width="8%">진행상태</th>
                            <th width="7%">판매가</th>
                            <th width="4%">배수</th>
                            <th width="6%">판매여부</th>
                    @elseif($LearnPatternCcd === "615005")
                            <th width="6%">강좌유형</th>
                            <th width="6%">과목</th>
                            <th width="6%">교수</th>
                            <th>무료강좌명</th>
                            <th width="8%">진행상태</th>
                            <th width="6%">제공여부</th>
                    @elseif($LearnPatternCcd === "615006")
                            <th>캠퍼스</th>
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
                    @endif
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

                var $locationid = $('#locationid').val();

                var $groupvalue;
                switch ($locationid) {
                    case 'tar' :
                        $groupvalue = 'T';
                        break;
                    case 'ess' :
                        $groupvalue = 'E';
                        break;
                    case 'cho' :
                        $groupvalue = 'C';
                        break;
                }

                var $parent_location = $locationid+"Group";
                var $parent_location_span = $locationid+"List";

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
                            'url' : '{{ site_url('/common/searchLectureBlend/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },

                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    //var seq = meta.row + meta.settings._iDisplayStart;
                                    var seq = meta.row;     //무조건 0 부터 시작 하단에서 걸림 ( for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔... )
                                    var codeInfo= row.ProdCode+'@$['+row.ProdTypeCcd_Name+']'+ row.ProdName
                                        + ($locationid === 'tar' ? ( row.RealSalePrice === undefined ? '' :' ('+(addComma(row.RealSalePrice))+'원) ') : '')
                                    ;
                                    return '<input type="checkbox" id="checkIdx' + seq + '" name="checkIdx" class="flat" value="' + codeInfo + '" />';
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                                }},
                        @if($LearnPatternCcd === "615001")
                            {'data' : 'LecTypeCcd_Name'},//강좌유형
                            {'data' : 'CourseName'},//과정명
                            {'data' : 'SubjectName'},//과목명
                            {'data' : 'wProfName_String'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return '['+row.ProdCode+ '] ' + row.ProdName + '';
                                }},//단강좌명
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.wProgressCcd_Name+'<BR>('+row.wUnitLectureCnt+ (row.wScheduleCount == null ? '' : '/'+row.wScheduleCount)+')';
                                }},//진행상태
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.RealSalePrice === '' ? '' : (addComma(row.RealSalePrice))+'원<BR><strike>'+(addComma(row.SalePrice))+'원</strike>';

                                }},
                            {'data' : 'MultipleApply'},//배수
                            {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                                    return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                                }},//판매여부

                        @elseif($LearnPatternCcd === "615005")
                            {'data' : 'FreeLecTypeCcd_Name'},//강좌유형
                            {'data' : 'SubjectName'},//과목명
                            {'data' : 'wProfName_String'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return '['+row.ProdCode+ '] ' + row.ProdName + '';
                                }},//무료강좌명

                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.wProgressCcd_Name+'<BR>('+row.wUnitLectureCnt+ (row.wScheduleCount == null ? '' : '/'+row.wScheduleCount)+')';
                                }},//진행상태
                            {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                                    return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                                }},//판매여부

                        @elseif($LearnPatternCcd === "615006")
                            {'data' : 'CampusCcd_Name'},//캠퍼스
                            {'data' : 'StudyPatternCcd_Name'},
                            {'data' : 'StudyApplyCcd_Name'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SchoolStartYear+'/'+row.SchoolStartMonth;
                                }},
                            {'data' : 'CourseName'},//과정명
                            {'data' : 'SubjectName'},//과목명
                            {'data' : 'wProfName_String'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return '['+row.ProdCode+ '] <a href="#" class="btn-modify" data-idx="' + row.ProdCode + '"><u>' + row.ProdName + '</u></a> ';
                                }},//단강좌명

                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                                }},
                            {'data' : 'FixNumber'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.StudyStartDate +' ~ '+row.StudyEndDate
                                }},
                            {'data' : 'IsLecOpen', 'render' : function(data, type, row, meta) {
                                    return (data === 'Y') ? '개설' : '<span class="red">폐강</span>';
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SaleStartDatm +' ~ '+row.SaleEndDatm
                                }},
                            {'data' : 'AcceptStatusCcd_Name', 'render' : function(data, type, row, meta) {
                                    return  ((data === '접수마감') ? ' <span class="red">'+data+'</span>' :data);
                                }},
                        @endif

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
                        if(addCnt == 0) {alert("적용할 강좌가 없습니다. 선택 후 적용하여 주십시오.");return;}

                        if (!confirm('해당 강좌를 적용하시겠습니까?')) {return;}

                        for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                            //##
                            if ( $("input:checkbox[id='checkIdx"+i+"']").is(":checked") == true  ) {

                                temp_data = $("#checkIdx"+i).val();
                                temp_data_arr = temp_data.split("@$");

                                $(document).find("#"+$parent_location).append(
                                    "<span id='"+$parent_location_span+temp_data_arr[0]+"'>"
                                    +" <input type='hidden' name='ProdCode[]' value='"+ temp_data_arr[0] +"'><input type='hidden' name='BeforeLectureGroup[]' value='"+$groupvalue+"'>"
                                    +" "+temp_data_arr[1]+" <a href='javascript:;' onclick=\"rowDelete('"+$parent_location_span+temp_data_arr[0]+"')\"><i class='fa fa-times red'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;</span>"
                                );

                                //##
                            }
                            //#
                        }
                        $("#pop_modal").modal('toggle');
                    }


                });

                $search_form_modal.on('ifChecked', 'input[name="LearnPatternCcd"]', function () {
                    listChange($(this).val());
                });

                function listChange(learnpattern) {

                    var url = '{{ site_url('common/searchLectureBlend/')}}'+'?site_code='+$("#site_code").val()+'&LearnPatternCcd='+learnpattern+'&locationid='+$("#locationid").val();
                    sendAjax(url,
                        '',
                        function(d){
                            $("#pop_modal").find(".modal-content").html(d).end()
                        },
                        function(req, status, err){
                            showError(req, status);
                        }, false, 'GET', 'html'
                    );

                }
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection