@extends('lcms.layouts.master_modal')

@section('layer_title')
    단강좌 검색
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" value="{{ element('site_code', $arr_input) }}"/>
        <input type="hidden" name="learn_pattern" value="{{ element('learn_pattern', $arr_input) }}"/>
        <input type="hidden" name="prod_code" value="{{ element('prod_code', $arr_input) }}"/>
        <input type="hidden" name="parent_id" value="{{ element('parent_id', $arr_input) }}"/>
        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm mb-0">
                <p class="form-control-static"><span class="required">*</span> 검색한 단강좌 선택 후 적용 버튼을 클릭해 주세요. {{ element('choice_type', $arr_input) !== 'radio' ? '(다중 선택 가능합니다.)' : '' }}</p>
            </div>

                <div class="form-group pt-10 pb-5">
                    <label class="control-label col-md-2 pt-5" for="search_value">단강좌검색
                    </label>
                    <div class="col-md-8 form-inline">
                        <select class="form-control" id="cate_code" name="cate_code">
                            <option value="">카테고리</option>
                            @foreach($cate_list as $row)
                                <option value="{{ $row['CateCode'] }}" @if($row['CateCode'] == element('cate_code', $arr_input) ) selected="selected" @endif>
                                    {{ $row['ParentCateName']== '' ? $row['CateName'] : $row['ParentCateName'].' > '.$row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value" style="width:400px;">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                </div>
                <div class="form-group pt-10 pb-5">
                    <label class="control-label col-md-2 pt-5" for="search_professor">강사검색</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm" id="search_professor" name="search_professor">
                    </div>
                    <div class="col-md-1"><label class="control-label pt-5 pl-30">조건</label></div>
                    <div class="col-md-7 form-inline">
                        <select name="search_schoolyear" id="search_schoolyear" class="form-control" title="대비학년도">
                            <option value="">대비학년도</option>
                            @for($i=(date('Y')+2); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
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
                            @foreach($sales_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">전체</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 text-right pr-5 mt-10 mb-20">
                    <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
                    <button type="button" class="btn btn-default btn-search" id="searchInit">초기화</button>
                </div>

            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="3%"> @if(element('choice_type', $arr_input) !== 'radio')<input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/>@endif</th>
                            <th width="10%">강좌기본정보</th>
                            <th width="6%">강좌유형</th>
                            <th width="6%">과정</th>
                            <th width="6%">과목</th>
                            <th width="6%">교수</th>
                            <th>{{element('learn_pattern', $arr_input) !== "615005" ? '단강좌명' :'무료강좌명'}}</th>
                            <th width="8%">진행상태</th>
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
                var $parent_id = "{{element('parent_id', $arr_input)}}";
                var $input_type = "{{ empty(element('choice_type', $arr_input)) ? 'checkbox' : element('choice_type', $arr_input) }}";
                var $input_name = "{{ empty(element('input_name', $arr_input)) ? 'ProdCode' : element('input_name', $arr_input) }}";
                var $parent_selected_code = {};

                //본체에 등록된 상품 코드 배열
                var $selected_prodcode = {};

                $(document).ready(function() {
                    // 기존 선택된 상품코드 셋팅
                    $(function() {
                        var prod_code;
                        $parent_regi_form.find('input[name="'+ $input_name +'"]').each(function() {
                            prod_code = $(this).val();
                            $parent_selected_code[prod_code] = prod_code;
                        });
                    });

                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: true,
                        buttons: [
                            { text: '적용', className: 'btn btn-success btn-sm mb-0 _btn_apply_modal',action : function(e, dt, node, config) {
                                }
                            }
                        ],
                        ajax: {
                            'url' : '{{ site_url('/common/searchLectureVariable/listAjax') }}',
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },

                        columns: [
                                {'data' : 'ProdCode', 'render' : function(data, type, row, meta) {
                                        var checked = $parent_selected_code.hasOwnProperty(data) === true ? ' checked="checked"' : '';
                                        return '<input type="'+ $input_type + '" class="flat" name="prod_code" value="'+ data +'" data-row-idx="' + meta.row + '" '+ checked +'>';
                                }},
                                {'data' : null, 'render' : function(data, type, row, meta) {
                                        return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                                    }},
                                {!! element('learn_pattern', $arr_input) === '615005' ?  "{'data' : 'FreeLecTypeCcd_Name'}," : " {'data' : 'LecTypeCcd_Name'}," !!} //강좌유형
                                {'data' : 'CourseName'},//과정명
                                {'data' : 'SubjectName'},//과목명
                                {'data' : 'wProfName_String'},
                                {'data' : null, 'render' : function(data, type, row, meta) {
                                        return '['+row.ProdCode+ '] ' + row.ProdName + '';
                                    }},//단강좌명

                                {'data' : null, 'render' : function(data, type, row, meta) {
                                        return row.wProgressCcd_Name+'<BR>('+row.wUnitLectureCnt+ (row.wScheduleCount == null ? '' : '/'+row.wScheduleCount)+')';
                                    }},//진행상태
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

                    $('._btn_apply_modal').on('click', function() {
                        var $selected_code = $search_form_modal.find('input[name="prod_code"]:checked');
                        if ($selected_code.length < 1) {
                            alert("적용할 상품이 없습니다. 선택 후 적용하여 주십시오.");
                            return;
                        }
                        if (!confirm('해당 강좌상품을 선택하시겠습니까?')) {
                            return;
                        }
                        $selected_code.each(function () {
                            if ($parent_selected_code.hasOwnProperty($(this).val()) === false) {
                                row = $datatable_modal.row($(this).data('row-idx')).data();
                                html = '<tr class="prod_supp_tr">';
                                html += '   <td>' + row.CateName + '</td>';
                                html += '   <td>' + row.CourseName + '</td>';
                                html += '   <td>' + row.SubjectName + '</td>';
                                html += '   <td>' + row.wProfName_String + '</td>';
                                html += '   <td>[' + row.ProdCode + '] ' + row.ProdName;
                                html += '       <input type="hidden" name="' + $input_name + '" value="' + row.ProdCode + '"/>';
                                html += '   </td>';
                                html += '   <td>' + row.wProgressCcd_Name + ' (' + row.wUnitLectureCnt + (row.wScheduleCount == null ? '' : '/' + row.wScheduleCount) + ')</td>';
                                html += '   <td>' + addComma(row.RealSalePrice) + '원</td>';
                                html += '   <td>' + row.SaleStatusCcd_Name + '</td>';
                                html += '   <td><a href="#none" class="selected-product-delete"><i class="fa fa-times red"></i></a></td>';
                                html += '</tr>';
                                if($input_type === 'radio') {
                                    $parent_regi_form.find("#" + $parent_id + ' tr').remove('.prod_supp_tr');
                                }
                                $parent_regi_form.find("#" + $parent_id).append(html)
                            }
                        });
                        $("#pop_modal").modal('toggle');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection