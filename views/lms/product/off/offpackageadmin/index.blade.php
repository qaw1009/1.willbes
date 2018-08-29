@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원 종합반 상품 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_campus_code" name="search_campus_code">
                            <option value="">캠퍼스</option>
                            @foreach($campusList as $row)
                                <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_md_cate_code" name="search_md_cate_code">
                            <option value="">중분류</option>
                            @foreach($arr_md_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select name="search_schoolyear" id="search_schoolyear" class="form-control" title="대비학년도">
                            <option value="">대비학년도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        &nbsp;<!--
                        <select class="form-control mr-10" id="search_course_idx" name="search_course_idx">
                            <option value="">과정</option>
                            @foreach($arr_course as $row)
                                <option value="{{ $row['CourseIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CourseName'] }}</option>
                            @endforeach
                        </select>
                        //-->
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제공정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_studypattern_ccd" name="search_studypattern_ccd">
                            <option value="">수강형태</option>
                            @foreach($studypattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_studyapply_ccd" name="search_studyapply_ccd">
                            <option value="">수강신청구분</option>
                            @foreach($studyapply_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select name="search_schoolstartyear" id="search_schoolstartyear"  class="form-control" title="개강년도">
                            <option value="">개강년도</option>
                            @for($i=(date('Y')+1); $i>=2014; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        &nbsp;
                        <select name="search_schoolstartmonth" id="search_schoolstartmonth"  class="form-control" title="개강월">
                            <option value="">개강월</option>
                            @for($i=1;$i<=12;$i++)
                                @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                <option value="{{$ii}}">{{$ii}}</option>
                            @endfor
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_islecopen" name="search_islecopen">
                            <option value="">개설여부</option>
                            <option value="Y">개설</option>
                            <option value="N">폐강</option>
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_acceptccd" name="search_acceptccd">
                            <option value="">접수상태</option>
                            @foreach($accept_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                        &nbsp;
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">종합반검색</label>
                    <div class="col-md-3 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_sdate">날짜검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_date_type" name="search_date_type" style="width:120px;">
                            <option value="B.StudyStartDate">개강일</option>
                            <option value="B.StudyEndDate">종강일</option>
                            <option value="B.SaleStartDat">접수시작일</option>
                            <option value="B.SaleEndDat">접수종료일</option>
                            <option value="A.RegDatm">등록일</option>
                        </select>
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>복사<br>선택</th>
                    <th>캠퍼스</th>
                    <th>강좌기본정보</th>
                    <th>수강형태</th>
                    <th>수강신청<BR>구분</th>
                    <th>개강<BR>년/월</th>
                    <th>종합반명</th>
                    <th>판매가</th>
                    <th>정원</th>
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
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {

            $datatable = $list_table.DataTable({
                serverSide: true,

                buttons: [
                    /*{ text: '<i class="fa fa-pencil mr-5"></i> 개설여부/접수상태 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-new-best-modify'}
                    { text: '<i class="fa fa-copy mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-order'}*/
                    { text: '<i class="fa fa-copy mr-5"></i> 종합반복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy'}
                    ,{ text: '<i class="fa fa-pencil mr-5"></i> 종합반등록', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('product/off/offpackageadmin/create') }}';
                        }
                    }
                ],

                ajax: {
                    'url' : '{{ site_url('/product/off/offpackageadmin/listAjax') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                }
                ,
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat"  name="copyProdCode" value="'+row.ProdCode+'">';
                        }},
                    {'data' : 'CampusCcd_Name'},//캠퍼스
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SiteName+'<BR>'+(row.CateName_Parent == null ? '' : row.CateName_Parent+'<BR>')+(row.CateName)+'<BR>'+row.SchoolYear;
                        }},
                    {'data' : 'StudyPatternCcd_Name'},
                    {'data' : 'StudyApplyCcd_Name'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SchoolStartYear+'/'+row.SchoolStartMonth;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.ProdCode+ '] <a href="#" class="btn-modify" data-idx="' + row.ProdCode + '"><u>' + row.ProdName + '</u></a> ';
                        }},//상품명

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                        }},
                    {'data' : 'FixNumber'},

                    {'data' : 'IsLecOpen', 'render' : function(data, type, row, meta) {
                            var html = '';
                            html += '<input type="hidden" name="prodCode" value="'+row.ProdCode+'">';
                            html += '<select class="form-control input-sm" name="is_lecopen" data-idx="' + row.ProdCode + '">';
                            html += '<option value="Y"' + ((data === 'Y') ? ' selected="selected"' : '') + '>개설</option>';
                            html += '<option value="N"' + ((data === 'N') ? ' selected="selected"' : '') + '>폐강</option>';
                            html += '</select>';
                            return html;
                        }},

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.SaleStartDatm +' ~ '+row.SaleEndDatm;
                        }},

                    {'data' : 'AcceptStatusCcd', 'render' : function(data, type, row, meta) {
                            var html = '';
                            html += '<select class="form-control input-sm" name="AcceptStatusCcd" data-idx="' + row.ProdCode + '">';
                            @foreach($accept_ccd as $key => $val)
                                html += '<option value="{{ $key }}"' + ((data == '{{$key}}') ? ' selected="selected"' : '')+ '>{{ $val }}</option>';
                            @endforeach
                                html += '</select>';
                            return html;
                        }},

                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},//사용여부

                    {'data' : 'wAdminName'},//등록자
                    {'data' : 'RegDatm'}//등록일
                ]

            });

            // 과정, 과목, 교수 자동 변경
            $search_form.find('select[name="search_campus_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");
            $search_form.find('select[name="search_course_idx"]').chained("#search_site_code");

            //강의복사
            $('.btn-copy').on('click',function(){
                if ($('input:radio[name="copyProdCode"]').is(':checked') === false) {
                    alert('복사할 강좌를 선택해 주세요.');
                    return false;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'prodCode' : $('input:radio[name="copyProdCode"]:checked').val()
                };

                sendAjax('{{ site_url('/product/off/offpackageadmin/copy') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');

            });

            // 개설여부
            $list_table.on('change', 'select[name="is_lecopen"]', function() {
                if (!confirm('변경된 사항을 적용하시겠습니까??')) {
                    return;
                }
                var data = {
                    '_csrf_token' : $search_form.find('input[name="_csrf_token"]').val(),
                    '_method' : 'PUT',
                    'prodCode' : $(this).data('idx'),
                    'IsLecOpen' : $(this).val()
                };
                sendAjax('{{ site_url('/product/off/offpackageadmin/reoption') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 접수상태
            $list_table.on('change', 'select[name="AcceptStatusCcd"]', function() {
                if (!confirm('변경된 사항을 적용하시겠습니까??')) {
                    return;
                }
                var data = {
                    '_csrf_token' : $search_form.find('input[name="_csrf_token"]').val(),
                    '_method' : 'PUT',
                    'prodCode' : $(this).data('idx'),
                    'AcceptStatusCcd' : $(this).val()
                };
                sendAjax('{{ site_url('/product/off/offpackageadmin/reoption') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });


            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/product/off/offpackageadmin/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });



        });
    </script>
@stop
