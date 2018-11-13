@extends('lcms.layouts.master_modal')

@section('layer_title')
    @if($prod_type === 'on')
        온라인강좌
    @elseif($prod_type === 'off')
        학원강좌
    @endif
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" id="site_code" value="{{ $site_code }}"/>
        <input type="hidden" name="LearnPatternCcd" value="{{$LearnPatternCcd }}"/>
        <input type="hidden" name="prod_type" id="prod_type" value="{{$prod_type}}"/>
        <input type="hidden" name="return_type" id="return_type" value="{{$return_type}}"/>
        <input type="hidden" name="target_id" id="target_id" value="{{$target_id}}"/>
        <input type="hidden" name="target_field" id="target_field" value="{{$target_field}}"/>

        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm mb-0">
                <p class="form-control-static"><span class="required">*</span> 검색한 강좌 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 가능합니다.)</p>
            </div>

            <div class="form-group form-group-sm">
                <ul class="nav nav-tabs nav-justified">
                    @if($prod_type === 'on')
                        <li {{$LearnPatternCcd == '615001' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('615001');"><strong>단강좌</strong></a></li>
                        <li {{$LearnPatternCcd == '615003' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('615003');"><strong>운영자패키지</strong></a></li>
                        <li {{$LearnPatternCcd == '615004' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('615004');"><strong>기간제패키지</strong></a></li>
                    @elseif($prod_type === 'off')
                        <li {{$LearnPatternCcd == '615006' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('615006');"><strong>단과반</strong></a></li>
                        <li {{$LearnPatternCcd == '615007' ? 'class=active ':''}}><a href="javascript:;" onclick="listChange('615007');"><strong>종합반</strong></a></li>
                    @endif
                </ul>
            </div>

            <div class="form-group pt-10 pb-5">
                <label class="control-label col-md-2 pt-5" for="search_value">통합검색
                </label>
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
                            @elseif($LearnPatternCcd === "615003" || $LearnPatternCcd === "615004")
                                <th width="6%">패키지유형</th>
                                <th>패키지명</th>
                                <th width="7%">판매가</th>
                                <th width="4%">배수</th>
                                <th width="6%">판매여부</th>
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
                            @elseif($LearnPatternCcd === "615007")
                                <th>캠퍼스</th>
                                <th>수강형태</th>
                                <th>수강신청<BR>구분</th>
                                <th>개강<BR>년/월</th>
                                <th>종합반명</th>
                                <th>판매가</th>
                                <th>정원</th>
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
                var $datatable;
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_ajax_table');

                var $parent_location_span = $("#target_id").val();

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
                            'url' : '{{ site_url('/common/searchLectureAll/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },

                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    var seq = meta.row + meta.settings._iDisplayStart;
                                    var codeInfo= row.ProdCode+'@$['+row.ProdCode+'] '+ row.ProdName + '@$';
                                    codeInfo += row.wLecIdx != null ? row.wLecIdx : '';  // 마스터강의식별자 추가
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
                                    return row.wProgressCcd_Name+'<BR>('+row.wUnitCnt+'/'+row.wUnitLectureCnt+')';
                                }},//진행상태
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.RealSalePrice === '' ? '' : (addComma(row.RealSalePrice))+'원<BR><strike>'+(addComma(row.SalePrice))+'원</strike>';

                                }},
                            {'data' : 'MultipleApply'},//배수
                            {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                                    return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                                }},//판매여부

                        @elseif($LearnPatternCcd === "615003" || $LearnPatternCcd === "615004")
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.PackTypeCcd_Name.replace('패키지','');
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return '['+row.ProdCode+ '] ' + row.ProdName + '';
                                }},//패키지명
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.RealSalePrice === '' ? '' : (addComma(row.RealSalePrice))+'원<BR><strike>'+(addComma(row.SalePrice))+'원</strike>';

                                }},
                            {'data' : 'MultipleApply'},//배수
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
                                    return '['+row.ProdCode+ '] ' + row.ProdName ;
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
                        @elseif($LearnPatternCcd === "615007")
                            {'data' : 'CampusCcd_Name'},//캠퍼스
                            {'data' : 'StudyPatternCcd_Name'},
                            {'data' : 'StudyApplyCcd_Name'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SchoolStartYear+'/'+row.SchoolStartMonth;
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return '['+row.ProdCode+ '] ' + row.ProdName + '';
                                }},//상품명

                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                                }},
                            {'data' : 'FixNumber'},
                            {'data' : 'IsLecOpen', 'render' : function(data, type, row, meta) {
                                    return (data === 'Y') ? '개설' : '<span class="red">폐강</span>';
                                }},

                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.SaleStartDatm +' ~ '+row.SaleEndDatm;
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
                    $datatable.on('ifChanged', '#_is_all', function() {
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
                        if(addCnt === 0) {alert("적용할 강좌가 없습니다. 선택 후 적용하여 주십시오.");return;}
                        var prod_type = $search_form.find("input[name='prod_type']").val() + '_lecture'; // 상품타입 (on/off)
                        var learn_pattern_ccd = $search_form.find("input[name='LearnPatternCcd']").val(); // 학습형태
                        var html;

                        if (!confirm('해당 강좌를 적용하시겠습니까?')) {return;}

                        for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용되게끔...
                            //##
                            if ($("input:checkbox[id='checkIdx"+i+"']").is(":checked") === true) {
                                temp_data = $("#checkIdx"+i).val();
                                temp_data_arr = temp_data.split("@$");

                                html = '<span class="pr-10">' + temp_data_arr[1];
                                html += '   <a href="#none" data-prod-code="' + temp_data_arr[0]  + '" class="selected-product-delete"><i class="fa fa-times red"></i></a>';
                                html += '   <input type="hidden" name="prod_code[]" value="' + temp_data_arr[0]  + '" data-prod-type="' + prod_type + '" data-learn-pattern-ccd="' + learn_pattern_ccd + '" data-w-lec-idx="' + temp_data_arr[2]  + '"/>';
                                html += '</span>';
                                $(document).find("#"+$parent_location_span).append(html);
                                //##
                            }
                            //#
                        }
                        $("#pop_modal").modal('toggle');
                    }


                });

                $search_form.on('ifChecked', 'input[name="LearnPatternCcd"]', function () {
                    listChange($(this).val());
                });

                function listChange(learnpattern) {

                    var url = '{{ site_url('common/searchLectureAll/')}}'+'?site_code='+$("#site_code").val()+'&prod_type='+$("#prod_type").val()
                        +'&return_type='+$("#return_type").val()+'&target_id='+$("#target_id").val()+'&target_field='+$("#target_field").val()+'&LearnPatternCcd='+learnpattern;
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