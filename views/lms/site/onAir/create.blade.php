@extends('lcms.layouts.master')
@section('content')
    <h5>- 현장 라이브강의를 학원사이트에서 실시간으로 송출하기 위한 관리 페이지입니다.</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <div class="x_title">
            <h2>On-AIR정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/onAir/store") }}" novalidate>--}}
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="oa_idx" value="{{ $oa_idx }}"/>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="form-inline inline-block item">
                            {{--{!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}--}}
                            {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', false, $offLineSite_list) !!}
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="campus_ccd">캠퍼스 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <div class="form-inline item">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" required="required" title="캠퍼스">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['CampusCcd'] == $data['CampusCcd'])) selected="selected" @endif>{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                        <span id="selected_category" class="pl-10">
                            @if(isset($data['CateCodes']) === true)
                                @foreach($data['CateCodes'] as $cate_code => $cate_name)
                                    <span class="pr-10">{{ $cate_name }}
                                        <a href="#none" data-cate-code="{{ $cate_code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="cate_code[]" value="{{ $cate_code }}"/>
                                        </span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">개강일/회차/요일 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <span class="blue pr-10">[개강일]</span> <input type="text" name="study_start_date" id="study_start_date" class="form-control datepicker" title="개강일" value="{{$data['StudyStartDate']}}" style="width:100px;" readonly required="required">
                        &nbsp;&nbsp;<span class="blue pr-10 pl-30">[회차]</span> <input type="text" name="on_air_num" id="on_air_num" value="{{$data['OnAirNum']}}" required="required" class="form-control" title="정원"  style="width:60px;" />회
                        &nbsp;&nbsp;<span class="blue pr-10 pl-30">[요일]</span>
                        <input type="checkbox" name="week[]" class="flat" @if($week_arr[0] == "Y") checked="checked" @endif> <span class="day">일</span>
                        <input type="checkbox" name="week[]" class="flat" @if($week_arr[1] == "Y") checked="checked" @endif> <span class="day">월</span>
                        <input type="checkbox" name="week[]" class="flat" @if($week_arr[2] == "Y") checked="checked" @endif> <span class="day">화</span>
                        <input type="checkbox" name="week[]" class="flat" @if($week_arr[3] == "Y") checked="checked" @endif> <span class="day">수</span>
                        <input type="checkbox" name="week[]" class="flat" @if($week_arr[4] == "Y") checked="checked" @endif> <span class="day">목</span>
                        <input type="checkbox" name="week[]" class="flat" @if($week_arr[5] == "Y") checked="checked" @endif> <span class="day">금</span>
                        <input type="checkbox" name="week[]" class="flat" @if($week_arr[6] == "Y") checked="checked" @endif> <span class="day">토</span>
                        &nbsp;
                        <button type="button" onclick="setOnAirDate();" class="btn btn-sm btn-primary">적용</button>
                        <input type="hidden" id="week_str" name="week_str" value="">
                    </div>
                </div>
                <div class="form-group" >
                    <label class="control-label col-md-1-1" >송출기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <div class="cal-wrap" style="height:250px; overflow: auto;">
                            <div id="cal_vw" style="width: 1870px;"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="on_air_start_type_a">강의시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="form-inline">
                            <div class="radio mr-30">
                                <input type="radio" id="on_air_start_type_a" name="on_air_start_type" class="flat" value="A" required="required" title="바로시작" @if($method == 'POST' || $data['OnAirStartType']=='A')checked="checked"@endif/>
                                <label for="on_air_start_type_a" class="input-label">바로시작</label>
                                <input type="radio" id="on_air_start_type_d" name="on_air_start_type" class="flat" value="D" title="직접입력" @if($data['OnAirStartType']=='D')checked="checked"@endif/>
                                <label for="on_air_start_type_d" class="input-label">직접입력</label>
                            </div>
                            <select class="form-control on-air-time" id="on_air_start_time" name="on_air_start_time" required="required" disabled>
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['OnAirStartHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> :
                            <select class="form-control on-air-time" id="on_air_start_min" name="on_air_start_min" required="on_air_start_min" disabled>
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['OnAirStartMin']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>
                            &nbsp; ~ &nbsp;&nbsp;
                            <select class="form-control on-air-time" id="on_air_end_time" name="on_air_end_time" required="required" disabled>
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['OnAirEndHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select> :
                            <select class="form-control on-air-time" id="on_air_end_min" name="on_air_end_min" required="required" disabled>
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $data['OnAirEndMin']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="on_air_name">강좌명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="on_air_name" name="on_air_name" class="form-control" title="강좌명" required="required" placeholder="" value="{{$data['OnAirName']}}">
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="class_room_idx">강의실 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <div class="form-inline item">
                            <select class="form-control" id="class_room_idx" name="class_room_idx" required="required" title="강의실명">
                                <option value="">강의실명</option>
                                @foreach($list_class_room as $row)
                                    <option value="{{ $row['CIdx'] }}" class="{{ $row['CampusCcd'] }}" @if($method == 'PUT' && ($row['CIdx'] == $data['CIdx'])) selected="selected" @endif>{{ $row['ClassRoomName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="on_air_tab_name">탭명칭 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="on_air_tab_name" name="on_air_tab_name" class="form-control" title="탭명칭" required="required" placeholder="" value="{{$data['OnAirTabName']}}">
                    </div>
                    <label class="control-label col-md-1-1 d-line">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용" checked="checked" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" title="미사용"/> <label for="is_use_n" class="input-label" @if($data['IsUse']=='N')checked="checked"@endif>미사용</label>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label class="control-label col-md-1-1">타이틀 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'POST')
                            <div class="title">
                                <input type="text" id="" name="title[]" class="form-control" title="타이틀" placeholder="" value="현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다." style="width: 80%;">
                                <button type="button" class="btn btn-primary btn-title-add mb-0">추가</button>
                            </div>
                        @elseif ($method == 'PUT')
                            @foreach($arr_title as $key => $val)
                                <div class="title @if($loop->last === true) mb-5 @endif">
                                <input type="text" name="title[]" class="form-control" title="타이틀" placeholder="" value="{{$val}}" style="width: 80%;">
                                    @if($loop->first === true)
                                        <button type="button" class="btn btn-primary btn-title-add mb-0">추가</button>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                        <div id="_add_title_input"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">교수한마디 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <select class="form-control" id="prof_idx" name="prof_idx" required="required" title="교수명">
                            <option value="">교수명</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['ProfIdx'] == $data['ProfIdx'])) selected="selected" @endif>{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                        <input type="text" id="prof_title" name="prof_title" class="form-control" title="교수한마디" required="required" value="{{$data['ProfTitle']}}" style="width: 80%">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-1-1" for="left_exposure_type_M">노출내용(좌) <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="radio">
                            <span class="blue pr-10">[타입]</span>
                            <input type="radio" id="left_exposure_type_M" name="left_exposure_type" data-input="link" class="flat" value="M" title="영상" @if($method == 'POST' || $data['LeftExposureType']=='M')checked="checked"@endif/> <label for="left_exposure_type_M" class="input-label">영상</label>
                            <input type="radio" id="left_exposure_type_I" name="left_exposure_type" data-input="file" class="flat" value="I" title="이미지" @if($data['LeftExposureType']=='I')checked="checked"@endif/> <label for="left_exposure_type_I" class="input-label">이미지</label>
                        </div>
                        <div class="form-left-exposure-input hide" id="left_type_link">
                            <input type="text" id="left_link" name="left_link" class="form-control" title="영상LINK" required="required" placeholder="영상 LINK를 입력하세요." value="{{$data['LeftLink']}}">
                        </div>
                        <div class="form-inline form-left-exposure-input hide" id="left_type_file">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                    <input type="file" name="attach_file[]" class="form-control input-file" title="첨부자료">
                                </span>
                            </div>
                            @if(empty($data['LeftFileName']) === false)
                                <p class="form-control-static ml-10 mr-10">[ <a href="{{ $data['LeftFileFullPath'] . $data['LeftFileName'] }}" rel="popup-image">{{ $data['LeftFileRealName'] }}</a> ]
                                    <a href="#none" class="file-left-delete" data-attach-idx="{{ $data['OaIdx']  }}"><i class="fa fa-times red"></i></a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="right_exposure_type_M">노출내용(우) <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="radio">
                            <span class="blue pr-10">[타입]</span>
                            <input type="radio" id="right_exposure_type_M" name="right_exposure_type" data-input="link" class="flat" value="M" title="영상" @if($method == 'POST' || $data['RightExposureType']=='M')checked="checked"@endif/> <label for="right_exposure_type_M" class="input-label">영상</label>
                            <input type="radio" id="right_exposure_type_I" name="right_exposure_type" data-input="file" class="flat" value="I" title="이미지" @if($data['RightExposureType']=='I')checked="checked"@endif/> <label for="right_exposure_type_I" class="input-label">이미지</label>
                        </div>
                        <div class="form-right-exposure-input hide" id="right_type_link">
                            <input type="text" id="right_link" name="right_link" class="form-control" title="영상LINK" required="required" placeholder="영상 LINK를 입력하세요." value="{{$data['RightLink']}}">
                        </div>
                        <div class="form-inline form-right-exposure-input hide" id="right_type_file">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                    <input type="file" name="attach_file[]" class="form-control input-file" title="첨부자료">
                                </span>
                            </div>
                            @if(empty($data['RightFileName']) === false)
                                <p class="form-control-static ml-10 mr-10">[ <a href="{{ $data['RightFileFullPath'] . $data['RightFileName'] }}" rel="popup-image">{{ $data['RightFileRealName'] }}</a> ]
                                    <a href="#none" class="file-right-delete" data-attach-idx="{{ $data['OaIdx']  }}"><i class="fa fa-times red"></i></a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>

            <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
            <script src="/public/vendor/cheditor/cheditor.js"></script>
            <script src="/public/js/editor_util.js"></script>
            <script type="text/javascript">
                var $regi_form = $('#regi_form');

                // site-code에 매핑되는 select box 자동 변경
                $regi_form.find('select[name="prof_idx"]').chained("#site_code");
                $regi_form.find('select[name="campus_ccd"]').chained("#site_code");
                $regi_form.find('select[name="class_room_idx"]').chained("#campus_ccd");

                //목록
                $('#btn_list').click(function() {
                    location.href='{{ site_url("/site/onAir/") }}' + getQueryString();
                });

                // ajax submit
                $regi_form.submit(function() {
                    var week_str = "";
                    for(var i=0; i<7; i++) {
                        if($('input:checkbox[name="week[]"]:eq('+i+')').prop("checked")) {
                            week_str += "Y,";
                        } else {
                            week_str += "N,";
                        }
                    }
                    $("#week_str").val(week_str);

                    var _url = '{{ site_url("/site/onAir/store") }}' + getQueryString();
                    ajaxSubmit($regi_form, _url, function(ret) {
                        if($regi_form.find('input[name="cate_code[]"]').length < 1) {
                            alert('카테고리 선택 필드는 필수입니다.');
                            return false;
                        }

                        if(ret.ret_cd) {
                            notifyAlert('success', '알림', ret.ret_msg);
                            location.replace('{{ site_url("/site/onAir/") }}' + getQueryString());
                        }
                    }, showValidateError, null, false, 'alert');
                });


                // 운영사이트 변경
                $regi_form.on('change', 'select[name="site_code"]', function() {
                    // 카테고리 검색 초기화
                    $regi_form.find('input[name="cate_code"]').val('');
                    $('#selected_category').html('');
                });

                // 카테고리 검색
                $('#btn_category_search').on('click', function(event) {
                    var site_code = $regi_form.find('select[name="site_code"]').val();
                    if (!site_code) {
                        alert('운영사이트를 먼저 선택해 주십시오.')
                        return;
                    }

                    $('#btn_category_search').setLayer({
                        'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code + '/cate_depth/1',
                        'width' : 900
                    });
                });

                // 카테고리 삭제
                $regi_form.on('click', '.selected-category-delete', function() {
                    var that = $(this);
                    that.parent().remove();
                });

                // 강의시간 직접입력 선택 값에 따른 시간 선택 박스 활성화,비활성와
                $regi_form.on('ifChanged ifCreated', 'input[name="on_air_start_type"]:checked', function() {
                    var set_val = $(this).val();
                    if (set_val == 'A') {
                        $('.on-air-time').attr('disabled','disabled');
                    } else {
                        $('.on-air-time').removeAttr('disabled');
                    }
                });

                // 동적 타이틀 input box 추가
                var temp_idx = 1;
                $regi_form.on('click', '.btn-title-add', function() {
                    var add_title;
                    add_title = '<div class="title" id="temp-title-'+temp_idx+'">';
                    add_title += '<input type="text" name="title[]" class="form-control" title="타이틀" placeholder="" value="" style="width: 80%;">';
                    add_title += '<button type="button" class="btn btn-primary mb-0 ml-5 btn-title-hide" data-temp-title-idx="'+temp_idx+'">삭제</button>';
                    add_title += '</div>';
                    $('#_add_title_input').append(add_title);
                    temp_idx = temp_idx + 1;
                });
                // 동적 타이틀 input box 삭제
                $regi_form.on('click', '.btn-title-hide', function() {
                    var this_idx = $(this).data('temp-title-idx');
                    $('#temp-title-'+this_idx).remove();
                });

                // 노출내용(좌)
                $regi_form.on('ifChanged ifCreated', 'input[name="left_exposure_type"]:checked', function() {
                    var set_val = $(this).data('input');
                    $('.form-left-exposure-input').removeClass('show').addClass('hide');
                    set_val !== 'no' && $('#left_type_' + set_val).removeClass('hide').addClass('show');
                });

                // 노출내용(우)
                $regi_form.on('ifChanged ifCreated', 'input[name="right_exposure_type"]:checked', function() {
                    var set_val = $(this).data('input');
                    $('.form-right-exposure-input').removeClass('show').addClass('hide');
                    set_val !== 'no' && $('#right_type_' + set_val).removeClass('hide').addClass('show');
                });

                // 송출기간 달력 생성 start --------------------------
                var total;
                var karr;
                function replace(str,s,d){
                    var i=0;
                    while(i > -1){
                        i = str.indexOf(s);
                        str = str.substr(0,i) + d + str.substr(i+1,str.length);
                    }
                    return str;
                }

                function setOnAirDate() {
                    if($("#study_start_date").val() == "") {alert("개강일을 선택해 주세요.");$("#study_start_date").focus();return;}
                    if($('#on_air_num').val() == '') {alert('회차를 입력해 주세요.'); $('#on_air_num').focus();return;}

                    var result = "";
                    total = 0;
                    karr = 0;

                    if( $("#on_air_num").val() != "" ) {
                        t = $('input:checkbox[name="week[]"]:checked').length;
                        if (t < 1) {
                            alert('요일을 선택하세요.');
                        } else {
                            var Months = new Array(12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
                            var syy = $("#study_start_date").val().substr(0, 4); //연도추출
                            var smm = $("#study_start_date").val().substr(5, 2); // 월추출
                            var yy = parseInt(syy, 10); // 연도2자리
                            var mm = parseInt(smm, 10); // 월2자리
                            var ty = 0;
                            var tm = 0;
                            var i = 0;

                            result += "<table border='0' cellpadding='0' cellspacing='0' style='float: left;'><tr>";
                            while (parseInt($("#on_air_num").val(), 10) > total ) {
                                ty = yy + parseInt((mm + i - 1) / 12);
                                tm = Months[((mm + i) % 12)];
                                result += "<td style='padding:5px;' valign='top'>";
                                result += Calendar(ty, tm);
                                result += "</td>";
                                i++;
                            }
                            result += "</tr></table>";

                            $("#cal_vw").show();
                            $("#cal_vw").html(result);
                        }
                    }
                }

                function Calendar( Year, Month ) {
                    var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
                    var weekDay = new Array("일", "월", "화", "수", "목", "금", "토");

                    firstDay = new Date(Year,Month-1,1).getDay();
                    days[1] = (((Year % 4 == 0) && (Year % 100 != 0)) || (Year % 400 == 0)) ? 29 : 28;

                    var output_string = "";
                    output_string += "<table border='0' cellpadding='0' cellspacing='0' width='176'>";
                    output_string += "<tr><td align='center'><b>";
                    output_string += Year + " / " + Month;
                    output_string += "</b></td></tr>";
                    output_string += "</table>";
                    output_string += "<table border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>";
                    output_string += "<tr align='center' bgcolor='#dadada' height='25'> ";
                    for (var dayNum= 0; dayNum <= 6; dayNum++) {
                        output_string += "<td width='24'>" + weekDay[dayNum] + "</td>";
                    }
                    output_string += "</tr>";

                    var kMonth = (Month < 10) ? "0"+Month : Month;
                    var nDay = 1;

                    for(var i=0; i<6; i++) {
                        output_string += "<tr align='center'>";
                        for(var j=0; j<7; j++) {
                            tarr = i*7+j;
                            if(firstDay <= tarr && days[Month-1] >= nDay ) {
                                var kDay = (nDay < 10) ? "0"+nDay : nDay;
                                var bg_color = "";
                                var frm_value = "";

                                if (
                                    $('input:checkbox[name="week[]"]:eq('+j+')').prop("checked") &&
                                    parseInt( $("#on_air_num").val(),10) > total &&
                                    parseInt((Year +""+ kMonth +""+ kDay),10)  >= parseInt(replace($("#study_start_date").val(), "-", ""),10)
                                ) {
                                    bg_color ="yellow";
                                    frm_value = Year +""+ kMonth +""+ kDay;
                                    total++;
                                } else {
                                    bg_color ="#ffffff";
                                    frm_value = "";
                                }

                                output_string += "<td id='"+ (Year +""+ kMonth +""+ kDay) +"' style='background-color:"+ bg_color +";cursor:hand;cursor:pointer;' width='24' height='20' ";
                                output_string += " onClick=\"javascript:chkDay('"+ parseInt((Year +""+ kMonth +""+ kDay),10)  +"', "+ karr +");\">";
                                output_string += nDay
                                output_string += "<input type='hidden' name='savDay[]' value='"+ frm_value +"'>";
                                output_string += "</td>";
                                nDay++;
                                karr++;
                            } else {
                                output_string += "<td bgcolor='#ffffff' width='24' height='20'>"+ "&nbsp;" +"</td>";
                            }
                        }
                    }

                    output_string += "</tr>";
                    output_string += "</table>";

                    return output_string;
                }

                function chkDay(clkDay, arr) {
                    var id = $("#"+clkDay);
                    var id_val = $('input[name="savDay[]"]:eq('+arr+')').val().length;

                    if( id_val == 0 ) {
                        id.css({"background-color":"yellow"});
                        $('input[name="savDay[]"]:eq('+arr+')').val(clkDay);
                    } else {
                        id.css({"background-color":"white"});
                        $('input[name="savDay[]"]:eq('+arr+')').val('');
                    }
                    var t=0;
                    $('input[name="savDay[]"]').each(function(idx){
                        if($(this).val().length > 0) {
                            t++;
                        }
                    });
                    $("#on_air_num").val(t);
                }

                @if($method === "PUT")setOnAirDate();@endif
                // 송출기간 달력 생성 end --------------------------
            </script>

        </div>
    </div>
@stop