@extends('lcms.layouts.master_modal')

@section('layer_title')
    @if(empty($prod_tabs) === false)
        상품검색
    @else
        @if($prod_type === 'on')
            온라인강좌
        @elseif($prod_type === 'off')
            학원강좌
        @endif
    @endif
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" id="site_code" value="{{$site_code}}"/>
        <input type="hidden" name="LearnPatternCcd" id="LearnPatternCcd" value="{{$LearnPatternCcd}}"/>
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
        <p class="form-control-static"><span class="required">*</span> 검색한 강좌 선택 후 적용 버튼을 클릭해 주세요. (다중 선택 {{ $is_single == 'Y' ? '불가' : '가능' }}합니다.)</p>
    </div>
    <div class="form-group no-border-bottom no-padding">
        <ul class="nav nav-tabs nav-justified">
            @if($prod_type === 'on' || in_array('on', $prod_tabs) === true)
                <li class="{{$LearnPatternCcd == '615001' ? 'active':''}} {{ in_array('on_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('on', '615001');"><strong>단강좌</strong></a></li>
                <li class="{{$LearnPatternCcd == '615003' ? 'active':''}} {{ in_array('adminpack_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('on', '615003');"><strong>운영자패키지</strong></a></li>
                <li class="{{$LearnPatternCcd == '615004' ? 'active':''}} {{ in_array('periodpack_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('on', '615004');"><strong>기간제패키지</strong></a></li>
            @endif

            @if($prod_type === 'off' || in_array('off', $prod_tabs) === true)
                <li class="{{$LearnPatternCcd == '615006' ? 'active':''}} {{ in_array('off_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('off', '615006');"><strong>단과반</strong></a></li>
                <li class="{{$LearnPatternCcd == '615007' ? 'active':''}} {{ in_array('off_pack_lecture', $hide_tabs) === true ? 'hide' : '' }}"><a href="#none" onclick="prodListChange('off', '615007');"><strong>종합반</strong></a></li>
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
                <li><a href="#none" onclick="prodListChange('mock_exam', '');"><strong>모의고사</strong></a></li>
            @endif
        </ul>
    </div>
    <div class="form-group bdt-line mt-10 pt-10 pb-10">
        <label class="control-label col-md-1 pt-5 pl-20" for="">기본정보
        </label>
        <div class="col-md-9 form-inline">
            @if(empty($arr_campus) === false)
                <select class="form-control mr-10" id="search_campus_ccd" name="search_campus_ccd">
                    <option value="">캠퍼스</option>
                    @foreach($arr_campus as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            @endif
            @if(empty($arr_category) === false)
                <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                    <option value="">대분류</option>
                    @foreach($arr_category as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            @endif
            @if(empty($arr_course) === false)
                <select class="form-control mr-10" id="search_course_idx" name="search_course_idx">
                    <option value="">과정</option>
                    @foreach($arr_course as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            @endif
            @if(empty($arr_subject) === false)
                <select class="form-control mr-10" id="search_subject_idx" name="search_subject_idx">
                    <option value="">과목</option>
                    @foreach($arr_subject as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-2 text-right pr-5">
            <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
        </div>
    </div>
    <div class="form-group pt-10 pb-5">
        <label class="control-label col-md-1 pt-5 pl-20" for="search_value">강좌검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">명칭, 코드 검색 가능</p>
        </div>
    </div>
    @if($is_package === false)
        {{-- 단강좌/단과반만 노출 --}}
        <div class="form-group pt-10 pb-10">
            <label class="control-label col-md-1 pt-5 pl-20" for="search_prof_value">교수/과정
            </label>
            <div class="col-md-4">
                <input type="text" class="form-control input-sm" id="search_prof_value" name="search_prof_value">
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
                        <th>수강신청<br/>구분</th>
                        <th>개강<br/>년/월</th>
                        <th>종합반<br/>유형</th>
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
    <script src="/public/js/lms/search_product.js"></script>
    <script type="text/javascript">
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');
        var $return_type = $("#return_type").val();     // 리턴 방식
        var $target_id = '#' + $("#target_id").val();       // 리턴되는 타겟 레이어 id
        var $target_field = $("#target_field").val();       // 리턴되는 교재상품코드 input hidden name

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
                    'url' : '{{ site_url('/common/searchLectureAll/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },

                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        var seq = meta.row;
                        return '<input type="checkbox" id="checkIdx' + seq + '" name="checkIdx" class="flat" value="' + row.ProdCode + '" data-row-idx="' + meta.row + '"/>';
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
                        return row.RealSalePrice === '' ? '' : (addComma(row.RealSalePrice))+'원<BR><u>'+(addComma(row.SalePrice))+'원</u>';
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
                        return row.RealSalePrice === '' ? '' : (addComma(row.RealSalePrice))+'원<BR><u>'+(addComma(row.SalePrice))+'원</u>';
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
                        return '['+row.ProdCode+ '] ' + row.ProdName;
                    }},//단강좌명
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return addComma(row.RealSalePrice)+'원<BR><u>'+addComma(row.SalePrice)+'원</u>';
                    }},
                    {'data' : 'FixNumber'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.StudyStartDate +' ~ '+row.StudyEndDate;
                    }},
                    {'data' : 'IsLecOpen', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '개설' : '<span class="red">폐강</span>';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.SaleStartDatm +' ~ '+row.SaleEndDatm;
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
                    {'data' : 'PackTypeCcd_Name'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '['+row.ProdCode+ '] ' + row.ProdName + '';
                    }},//상품명
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return addComma(row.RealSalePrice)+'원<BR><u>'+addComma(row.SalePrice)+'원</u>';
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
            $datatable_modal.on('ifChanged', '#_is_all', function() {
                if ($(this).prop('checked') === true) {
                    $('input[name="checkIdx"]').iCheck('check');
                } else {
                    $('input[name="checkIdx"]').iCheck('uncheck');
                }
            });

            // 적용 버튼
            function sendContent() {
                var addCnt = $("input[name='checkIdx']:checked").length;		//적용할 갯수
                var allCnt = $("input[name='checkIdx']").length;		//노출된 전체 갯수
                var is_single = '{{ $is_single }}';

                if (addCnt < 1) {
                    alert("적용할 강좌가 없습니다. 선택 후 적용하여 주십시오.");
                    return;
                }

                if (is_single === 'Y' && addCnt > 1) {
                    alert('한번에 1개 상품만 적용 가능합니다.');
                    return;
                }

                var prod_type = $search_form_modal.find("input[name='prod_type']").val() + '_lecture'; // 상품타입 (on/off)
                var learn_pattern_ccd = $search_form_modal.find("input[name='LearnPatternCcd']").val(); // 학습형태
                var row, data, html = '';

                if (!confirm('해당 강좌를 적용하시겠습니까?')) {
                    return;
                }

                for (i=0;i<allCnt;i++)	 {	//노출된 갯수에서 선택한 것만 적용
                    if ($("input:checkbox[id='checkIdx"+i+"']").is(":checked") === true) {
                        row = $datatable_modal.row($("#checkIdx"+i).data('row-idx')).data();

                        data = ' data-prod-type="' + prod_type + '" data-learn-pattern-ccd="' + learn_pattern_ccd + '" data-w-lec-idx="' + (row.wLecIdx != null ? row.wLecIdx : '') + '"';
                        data += ' data-prod-name="' + Base64.encode(row.ProdName) + '" data-sale-price="' + row.SalePrice + '" data-real-sale-price="' + row.RealSalePrice + '"';
                        data += ' data-prod-type-ccd-name="' + row.ProdTypeCcd_Name + '" data-learn-pattern-ccd-name="' + row.LearnPatternCcd_Name + '"';
                        data += ' data-campus-ccd-name="' + (row.CampusCcd_Name != null ? row.CampusCcd_Name : '') + '"';
                        data += ' data-cate-name="' + row.CateName + '"';
                        data += ' data-study-pattern-ccd-name="' + (row.StudyPatternCcd_Name != null ? row.StudyPatternCcd_Name : '') + '"';

                        html += '<span class="pr-10">[' + row.ProdCode + '] ' + row.ProdName;
                        html += '   <a href="#none" data-prod-code="' + row.ProdCode + '" class="selected-product-delete"><i class="fa fa-times red"></i></a>';
                        html += '   <input type="hidden" name="' + $target_field + '[]" value="' + row.ProdCode + '"' + data + '/>';
                        html += '</span>';
                    }
                }

                $(document).find($target_id).append(html);

                // change 이벤트 발생
                if ($search_form_modal.find("input[name='is_event']").val() === 'Y') {
                    $(document).find($target_id).trigger('change');
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
