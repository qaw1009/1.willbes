@extends('lcms.layouts.master')

@section('content')

    <h5>- 컨텐츠를 등록하고 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" action="{{ site_url('/predict2/reg/goods/store') }}" novalidate>--}}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" id='predict_idx2' name="predict_idx2" value="{{$PredictIdx2}}">
        <input type="hidden" name="Info" value="">

        <div class="x_panel">
            <div class="x_title">
                <h2>모의고사정보등록</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span></label>
                    <div class="col-md-10 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'siteCode', '', '운영 사이트', 'required', ($method == 'PUT') ? 'disabled' : '', false) !!}
                        <span class="ml-20">저장 후 운영사이트, 모의고사카테고리 정보는 수정이 불가능합니다.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        @if($method == 'PUT' && empty($data['TakePart']) === false)
                            <p class="form-control-static">{{ $data['CateName'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">{{ $data['CateName'] }}</span>
                        @endif
                        <input type="hidden" id="cate_code" name="cate_code" value="{{ $data['TakePart'] }}" title="카테고리 선택" required="required"/>
                    </div>
                    <label class="control-label col-md-1-1">응시분야 <span class="required">*</span></th>
                    </label>
                    <div class="col-md-4 form-inline">
                        <span class="form-control-static" id="TakePartDisp">{{ $data['CateName'] }}</span>
                        <input type="hidden" name="TakePart" value="{{$data['TakePart']}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="mock_part">직렬 <span class="required">*</span></label>
                    <div class="col-md-4">
                        <div class="checkbox mock-part">
                            @foreach($arr_base['cateD2'] as $row)
                                <span class="mock-part-{{$row['ParentCateCode']}}">
                                    <input type="checkbox" id="mock_part_{{ $loop->index }}" name="mock_part[]" class="flat" value="{{$row['CateCode']}}" title="직렬" @if($method == 'PUT' && in_array($row['CateCode'], $data['arr_mock_part']) === true)checked="checked"@endif/>
                                    <label for="mock_part_{{ $loop->index }}" class="input-label mr-10">{{$row['CateName']}}</label>
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">• 사용자단에 노출될 항목 체크</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">서비스명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" class="form-control" name="predict2_name" title="서비스명" required="required" value="{{$data['Predict2Name']}}">
                    </div>
                    <label class="control-label col-md-1-1">서비스코드 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['PredictIdx2'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">Research1 기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <input type="text" class="form-control datepicker" style="width:100px;" name="Research1StartDatm_d" value="@if($method == 'PUT'){{ substr($data['Research1StartDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="Research1StartDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research1StartDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="Research1StartDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research1StartDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                        <span class="ml-10 mr-10"> ~ </span>
                        <input type="text" class="form-control datepicker" style="width:100px;" name="Research1EndDatm_d" value="@if($method == 'PUT'){{ substr($data['Research1EndDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="Research1EndDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research1EndDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="Research1EndDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research1EndDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">Research2 기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <input type="text" class="form-control datepicker" style="width:100px;" name="Research2StartDatm_d" value="@if($method == 'PUT'){{ substr($data['Research2StartDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="Research2StartDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research2StartDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="Research2StartDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research2StartDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                        <span class="ml-10 mr-10"> ~ </span>
                        <input type="text" class="form-control datepicker" style="width:100px;" name="Research2EndDatm_d" value="@if($method == 'PUT'){{ substr($data['Research2EndDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="Research2EndDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research2EndDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="Research2EndDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['Research2EndDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">필수과목 <span class="required">*</span>
                        <br><button type="button" class="btn btn-sm btn-primary act-su-search" data-su-type="E">검색</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="text-right mb-10">
                            <button type="button" class="btn btn-sm btn-success act-su-sort">정렬변경</button>
                        </div>
                        <div id="eSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">정렬</th>
                                    <th class="text-center">연도</th>
                                    <th class="text-center">회차</th>
                                    <th class="text-center">과목명</th>
                                    <th class="text-center">교수명</th>
                                    <th class="text-center">과목별시험지명</th>
                                    <th class="text-center">삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                                <tr data-subject-idx="">
                                    <td class="text-center form-inline">
                                        <input type="text" class="form-control" style="width:30px" name="OrderNum[]" value="">
                                        <input type="hidden" name="PpIdx[]" value="">
                                        <input type="hidden" name="MockType[]" value="">
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td></td>
                                    <td class="text-center"><span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                                </tr>
                                {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                                @if($method == 'PUT')
                                    @foreach($sData as $row)
                                        @continue($row['MockType'] == 'S')
                                        <tr data-subject-idx="{{ $row['PprpIdx'] }}">
                                            <td class="text-center form-inline">
                                                <input type="text" class="form-control" style="width:30px" name="OrderNum[]" value="{{ $row['OrderNum'] }}">
                                                <input type="hidden" name="PpIdx[]" value="{{ $row['PpIdx'] }}">
                                                <input type="hidden" name="MockType[]" value="{{ $row['MockType'] }}">
                                            </td>
                                            <td class="text-center">{{ $row['Year'] }}</td>
                                            <td class="text-center">{{ $row['RotationNo'] }}</td>
                                            <td class="text-center">{{ $row['SubjectName'] }}</td>
                                            <td class="text-center">{{ $row['wProfName'] }}</td>
                                            <td>{{ '['. $row['PpIdx'] .'] '. $row['PapaerName'] }}</td>
                                            <td class="text-center"><span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">선택과목 <span class="required">*</span>
                        <br><button type="button" class="btn btn-sm btn-primary act-su-search" data-su-type="S">검색</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="text-right mb-10">
                            노출개수 :
                            <select class="form-control" id="subject_s_view_count" name="subject_s_view_count">
                                <option value="1" @if($method==='PUT' && $data['SubjectSViewCount'] == '1') selected @endif>1</option>
                                <option value="2" @if($method==='POST' || $data['SubjectSViewCount'] == '2') selected @endif>2</option>
                                <option value="3" @if($method==='PUT' && $data['SubjectSViewCount'] == '3') selected @endif>3</option>
                                <option value="4" @if($method==='PUT' && $data['SubjectSViewCount'] == '4') selected @endif>4</option>
                                <option value="5" @if($method==='PUT' && $data['SubjectSViewCount'] == '5') selected @endif>5</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-success act-su-sort">정렬변경</button>
                        </div>
                        <div id="sSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">정렬</th>
                                    <th class="text-center">연도</th>
                                    <th class="text-center">회차</th>
                                    <th class="text-center">과목명</th>
                                    <th class="text-center">교수명</th>
                                    <th class="text-center">과목별시험지명</th>
                                    <th class="text-center">삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($method == 'PUT')
                                    @foreach($sData as $row)
                                        @continue($row['MockType'] == 'E')
                                        <tr data-subject-idx="{{ $row['PprpIdx'] }}">
                                            <td class="text-center form-inline">
                                                <input type="text" class="form-control" style="width:30px" name="OrderNum[]" value="{{ $row['OrderNum'] }}">
                                                <input type="hidden" name="PpIdx[]" value="{{ $row['PpIdx'] }}">
                                                <input type="hidden" name="MockType[]" value="{{ $row['MockType'] }}">
                                            </td>
                                            <td class="text-center">{{ $row['Year'] }}</td>
                                            <td class="text-center">{{ $row['RotationNo'] }}</td>
                                            <td class="text-center">{{ $row['SubjectName'] }}</td>
                                            <td class="text-center">{{ $row['wProfName'] }}</td>
                                            <td>{{ '['. $row['PpIdx'] .'] '. $row['PapaerName'] }}</td>
                                            <td class="text-center"><span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="grade_open_is_use">성적오픈 사용 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="grade_open_is_use_y" name="grade_open_is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['GradeOpenIsUse'] == 'Y')checked="checked"@endif/> <label for="grade_open_is_use_y" class="input-label">사용</label>
                            <input type="radio" id="grade_open_is_use_n" name="grade_open_is_use" class="flat" value="N" @if($data['GradeOpenIsUse'] == 'N')checked="checked"@endif/> <label for="grade_open_is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use">성적조회오픈일
                    </label>
                    <div class="col-md-10 form-inline item">
                        <input type="text" class="form-control datepicker" style="width:100px;" name="GradeOpenDatm_d" value="@if($method == 'PUT'){{ substr($data['GradeOpenDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="GradeOpenDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['GradeOpenDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="GradeOpenDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['GradeOpenDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse'] == 'Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </div>
        </div>


    </form>

    <script type="text/javascript">
        var method = '{{$method}}';
        var $regi_form = $('#regi_form');
        var suAddField;

        $(document).ready(function () {
            $(".mock-part > span").hide();
            $(".mock-part-" + $("#cate_code").val()).show();

            // 과목리스트 초기화
            var chapterExist = [];
            var chapterDel = [];
            var eList = $('#eSubject-wrap table tbody');
            var sList = $('#sSubject-wrap table tbody');
            suAddField = eList.find('tr:eq(0)').html();
            eList.find('tr:eq(0)').remove();

            eList.find('tr').each(function () {
                var sIDX = $(this).data('subject-idx');
                if(sIDX) chapterExist.push(sIDX);
            });
            sList.find('tr').each(function () {
                var sIDX = $(this).data('subject-idx');
                if(sIDX) chapterExist.push(sIDX);
            });

            // 과목리스트 삭제
            $regi_form.on('click', '.act-su-del', function () {
                var that = $(this);
                var suIdx = $(this).closest('tr').data('subject-idx');
                if( !suIdx ) { // 등록전
                    rowDel_Disp();
                } else { // 등록후
                    if (!confirm("삭제는 저장시 적용됩니다.\n삭제 대기목록에 추가하시겠습니까?")) return false;
                    chapterDel.push(suIdx);
                    rowDel_Disp();
                }

                function rowDel_Disp() {
                    var wrap = that.closest('tbody');
                    that.closest('tr').remove();
                    wrap.find('[name="OrderNum[]"]').each(function (i) {
                        $(this).val(++i);
                    });
                }
            });

            //운영사이트 변경시
            $regi_form.on('change', 'select[name="siteCode"]', function() {
                //카테고리 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                //직렬 체크 해제
                $("input:checkbox[name='mock_part[]']").prop("checked",false);

                $('#selected_category').html('');
                $(".mock-part").hide();
                $(".mock-part > span").hide();
            });

            //카테고리 변경시
            survey('#cate_code', function() {
                $("input:checkbox[name='mock_part[]']").prop("checked",false);
                $(".mock-part").show();
                $(".mock-part > span").hide();
                $(".mock-part-" + $("#cate_code").val()).show();

                //응시분야
                $regi_form.find('[name="TakePart"]').val($("#cate_code").val());
                $("#TakePartDisp").text($("#selected_category").text());
            });

            //카테고리검색
            $("#btn_category_search").on('click', function () {
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $("#btn_category_search").setLayer({
                    'url': '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + $("#site_code").val()
                    , 'width': 800
                })
            });

            // 과목검색창 오픈
            $('.act-su-search').on('click', function() {
                if(!$regi_form.find('#site_code').val() || !$regi_form.find('#cate_code').val()) {
                    alert('운영사이트와 카테고리를 먼저 선택해 주세요');
                    return false;
                }

                var param = '?siteCode=' + $regi_form.find('#site_code').val() + '&cateD1=' + $regi_form.find('#cate_code').val() + '&suType=' + $(this).data('su-type');
                $('.act-su-search').setLayer({
                    'url': '{{ site_url('/predict2/base/exam/searchExam') }}' + param,
                    'width': 1100
                });
            });

            // 과목리스트 정렬변경
            $regi_form.on('click', '.act-su-sort', function () {
                var that = $(this).closest('.subject-wrap').find('tbody');
                if(that.find('tr').length == 0) return false;
                var error = false;
                var sorting = {};
                that.find('tr').each(function () {
                    if($(this).data('subject-idx')) {
                        sorting[$(this).data('subject-idx')] = $(this).find('[name="OrderNum[]"]').val();
                    }
                    else {
                        error = true;
                    }
                });
                if(error || chapterDel.length) {
                    alert('저장된 과목만 정렬변경이 가능합니다. 저장 후 진행해 주세요');
                    return false;
                }

                var _url = '{{ site_url("/mocktest/regGoods/searchExamSort") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'sorting' : JSON.stringify(sorting),
                };

                sendAjax(_url, data, function(ret) {
                    var list = {};

                    if (ret.ret_cd) {
                        that.find('tr').each(function () {
                            list[ $(this).find('[name="OrderNum[]"]').val() ] = $(this);
                        });

                        that.empty();
                        $.each(list, function (i, v) {
                            that.append(v);
                        });

                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showValidateError, false, 'POST');
            });

            // 등록,수정
            $regi_form.submit(function() {
                var chapterTotal = [];
                eList.find('tr').each(function () { chapterTotal.push($(this).data('subject-idx')); });
                sList.find('tr').each(function () { chapterTotal.push($(this).data('subject-idx')); });
                $regi_form.find('[name="Info"]').val( JSON.stringify({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel}) );

                var _url = '{{ site_url('/predict2/reg/goods/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/predict2/reg/goods/') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/predict2/reg/goods/') }}' + getQueryString());
            });
        });

        function survey(selector, callback) {
            var input = $(selector);
            var oldvalue = input.val();
            setInterval(function(){
                if (input.val()!=oldvalue){
                    oldvalue = input.val();
                    callback();
                }
            }, 100);
        }

        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }
    </script>
@stop