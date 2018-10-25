@extends('lcms.layouts.master')
@section('content')
    <h5>- 이벤트, 설명회, 특강 등을 등록하고 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/eventLecture/store") }}" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="el_idx" value="{{ $el_idx }}"/>

        <div class="x_panel">
            <div class="x_title">
                <h2>이벤트/설명회/특강 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', false) !!}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="campus_ccd">캠퍼스</label>
                    <div class="col-md-4 form-inline ml-12-dot item">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" title="캠퍼스">
                            <option value="">캠퍼스</option>
                            @php $temp='0'; @endphp
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['CampusCcd'] == $data['CampusCcd'])) selected="selected" @endif>{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
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
                    <label class="control-label col-md-1-1">신청유형 <span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            @foreach($arr_requst_types as $key => $val)
                                <input type="radio" class="flat" id="requst_type_{{$key}}" name="requst_type" value="{{$key}}" title="{{$val}}" required="required" @if($loop->first || $data['RequstType']==$key)checked="checked"@endif> <label for="requst_type_{{$key}}" class="input-label">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-1 d-line">특강구분</label>
                    <div class="col-md-4 ml-12-dot form-inline">
                        <select class="form-control mr-10" id="subject_idx" name="subject_idx" title="과목">
                            <option value="">과목</option>
                            @foreach($arr_subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['SubjectIdx'] == $data['SubjectIdx'])selected="selected"@endif>{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control mr-10" id="prof_idx" name="prof_idx" title="교수">
                            <option value="">교수</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['ProfIdx'] == $data['ProfIdx'])selected="selected"@endif>{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">참여구분 <span class="required">*</span></label>
                    <div class="col-md-4 form-inline">
                        <div class="radio">
                            @foreach($arr_take_types as $key => $val)
                                <input type="radio" class="flat" id="take_type_{{$key}}" name="take_type" value="{{$key}}" title="{{$val}}" required="required" @if($loop->first || $data['TakeType']==$key)checked="checked"@endif> <label for="take_type_{{$key}}" class="input-label">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line">접수상태 <span class="required">*</span></label>
                    <div class="col-md-4 ml-12-dot item">
                        <div class="radio">
                            @foreach($arr_is_registers as $key => $val)
                                <input type="radio" class="flat" id="is_register_{{$key}}" name="is_register" value="{{$key}}" title="{{$val}}" required="required" @if($loop->first || $data['IsRegister']==$key)checked="checked"@endif> <label for="is_register_{{$key}}" class="input-label">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">HOT </label>
                    <div class="col-md-4 item form-inline">
                        <div class="checkbox">
                            <input type="checkbox" id="is_best" name="is_best" value="1" class="flat" @if($data['IsBest']=='1')checked="checked"@endif/> <label class="inline-block mr-5 red" for="is_best">HOT</label>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 ml-12-dot item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="event_name">제목<span class="required">*</span></label>
                    <div class="col-md-10 item">
                        <input type="text" id="event_name" name="event_name" class="form-control" maxlength="100" title="제목" required="required" value="{{ $data['EventName'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="register_start_datm">접수기간 <span class="required">*</span></label>
                    <div class="col-md-6 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_start_datm" name="register_start_datm" value="{{$data['RegisterStartDay']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="register_start_hour" name="register_start_hour">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['RegisterStartHour']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-1"><p class="form-control-static">:</p></div>
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="register_start_min" name="register_start_min">
                                    @php
                                        for($i=0; $i<=59; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['RegisterStartMin']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_end_datm" name="register_end_datm" value="{{$data['RegisterEndDay']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="register_end_hour" name="register_end_hour">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['RegisterEndHour']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-1"><p class="form-control-static">:</p></div>
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="register_end_min" name="register_end_min">
                                    @php
                                        for($i=0; $i<=59; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['RegisterEndMin']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">내용옵션</label>
                    <div class="col-md-10 form-inline">
                        <div class="radio">
                            <input type="radio" id="content_type_I" name="content_type" data-input="file" class="flat content-type" value="I" required="required" title="내용옵션" @if($method == 'POST' || $data['ContentType']=='I')checked="checked"@endif/> <label for="content_type_I" class="input-label">이미지</label>
                            <input type="radio" id="content_type_E" name="content_type" data-input="editor" class="flat content-type" value="E" @if($data['ContentType']=='E')checked="checked"@endif/> <label for="content_type_E" class="input-label">에디터</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">내용 <span class="required">*</span></label>
                    <div class="col-md-10 item form-inline form-content-input hide" id="content_file">
                        <div class="title">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                <input type="file" id="attach_file_C" name="attach_file[]" @if($method == 'POST')required="required"@endif class="form-control input-file" title="내용 이미지">
                                </span>
                            </div>
                            @if(empty($file_data['C']) === false)
                                <p class="form-control-static ml-30 mr-10">[ <a href="{{ $file_data['C']['file_path'] }}" rel="popup-image">{{ $file_data['C']['file_real_name'] }}</a> ]
                                    <a href="#none" class="file-delete" data-attach-idx="{{ $file_data['C']['file_idx'] }}"><i class="fa fa-times red"></i></a>
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-7 form-content-input hide" id="content_editor">
                        <textarea id="content" name="content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="attach_file_F">첨부파일</label>
                    <div class="col-md-10 item form-inline">
                        <div class="title">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                <input type="file" id="attach_file_F" name="attach_file[]" class="form-control input-file" title="첨부파일">
                                </span>
                            </div>
                            @if(empty($file_data['F']) === false)
                                <p class="form-control-static ml-30 mr-10">[ <a href="{{ $file_data['F']['file_path'] }}" rel="popup-image">{{ $file_data['F']['file_real_name'] }}</a> ]
                                    <a href="#none" class="file-delete" data-attach-idx="{{ $file_data['F']['file_idx'] }}"><i class="fa fa-times red"></i></a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="attach_file_S">리스트썸네일<span class="required">*</span></label>
                    <div class="col-md-10 item form-inline">
                        <div class="title">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                <input type="file" id="attach_file_S" name="attach_file[]" @if($method == 'POST')required="required"@endif class="form-control input-file" title="리스트썸네일">
                                </span>
                            </div>
                            @if(empty($file_data['S']) === false)
                                <p class="form-control-static ml-30 mr-10">[ <a href="{{ $file_data['S']['file_path'] }}" rel="popup-image">{{ $file_data['S']['file_real_name'] }}</a> ]
                                    <a href="#none" class="file-delete" data-attach-idx="{{ $file_data['S']['file_idx'] }}"><i class="fa fa-times red"></i></a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="attach_file_I">이슈썸네일</label>
                    <div class="col-md-10 form-inline">
                        <div class="title">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                <input type="file" id="attach_file_I" name="attach_file[]" class="form-control input-file" title="첨부파일">
                                </span>
                            </div>
                            @if(empty($file_data['I']) === false)
                                <p class="form-control-static ml-30 mr-10">[ <a href="{{ $file_data['I']['file_path'] }}" rel="popup-image">{{ $file_data['I']['file_real_name'] }}</a> ]
                                    <a href="#none" class="file-delete" data-attach-idx="{{ $file_data['I']['file_idx'] }}"><i class="fa fa-times red"></i></a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">관리옵션<span class="required">*</span></label>
                    <div class="col-md-10 form-inline item">
                        <div class="checkbox">
                            @foreach($arr_options as $key => $val)
                                <input type="checkbox" id="option_ccds_{{$key}}" name="option_ccds[]" class="flat optoin-ccds" title="관리옵션" value="{{$key}}" data-code="{{$key}}" required="required"
                                       @if( empty($data['data_option_ccd']) === false && array_key_exists($key, $data['data_option_ccd']) === true )checked="checked"@endif/>
                                <label class="inline-block mr-5" for="option_ccds_{{$key}}">{{$val}}</label>
                            @endforeach
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;• '신청리스트'을 설정해야만 온라인에서 접수를 받을 수 있습니다
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group hide" id="limit_{{$optoins_keys[0]}}">
                            <div class="row">
                                <div class="col-md-3 item form-inline">
                                    <div class="radio">
                                        <input type="radio" class="flat mr-10" id="limit_type_S" name="limit_type" data-limit-type="S" value="S" required="required_if:option_ccds,{{$optoins_keys[0]}}" title="단일리스트" @if($method == 'POST' || $data['LimitType']=='S')checked="checked"@endif>
                                        <label for="limit_type_S" class="input-label">단일리스트</label>
                                        <input type="radio" class="flat mr-10" id="limit_type_M" name="limit_type" data-limit-type="M" value="M" title="다중리스트" @if($data['LimitType']=='M')checked="checked"@endif>
                                        <label for="limit_type_M" class="input-label">다중리스트</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <p class="form-control-static">• 한 페이지에서 여러개의 특강 접수 시 '다중리스트' 선택</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 form-limit-type hide" id="table_limit_type_S">
                                    <div class="form-group form-inline">
                                        <div class="col-md-11">
                                        <select class="form-control" id="person_limit_type" name="person_limit_type">
                                            <option value="L" @if((empty($list_event_register['S']) === false) && $list_event_register['S'][0]['PersonLimitType']=='L')selected="selected"@endif>인원제한</option>
                                            <option value="N" @if((empty($list_event_register['S']) === false) && $list_event_register['S'][0]['PersonLimitType']=='M')selected="selected"@endif>무제한</option>
                                        </select>
                                        <input type="text" id="person_limit" name="person_limit" class="form-control ml-5" required="required_if:person_limit_type,L" title="정원수" value="{{(empty($list_event_register['S']) === false) ? $list_event_register['S'][0]['PersonLimit'] : ''}}" style="width: 80px;"> 명
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-11 form-limit-type hide" id="table_limit_type_M">
                                    <div class="form-group form-inline">
                                        <div class="col-md-3">
                                            <select class="form-control" id="select_type" name="select_type">
                                                <option value="S" @if($data['SelectType']=='S')selected="selected"@endif>단일선택</option>
                                                <option value="M" @if($data['SelectType']=='M')selected="selected"@endif>다중선택</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="form-control-static">• 다중리스트 옵션</p>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <div class="col-md-11">
                                        <select class="form-control" id="temp_person_limit_type" name="temp_person_limit_type">
                                            <option value="L">인원제한</option>
                                            <option value="N">무제한</option>
                                        </select>
                                        <input type="text" id="temp_person_limit" name="temp_person_limit" class="form-control ml-5" title="정원수" style="width: 80px;"> 명
                                        <p class="form-control-static ml-20">[특강명]</p>
                                        <input type="text" id="temp_lecture_name" name="temp_lecture_name" class="form-control ml-5" title="특강명">
                                        <button type="button" class="btn btn-info btn-lecture-add" style="margin-bottom: 2px;">등록</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-11">
                                        <table class="table table-striped table-bordered" id="table_lecture">
                                            <thead>
                                            <tr>
                                                <th>구분</th>
                                                <th>정원</th>
                                                <th>신청자</th>
                                                <th>특강/설명회명</th>
                                                <th>삭제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (empty($list_event_register['M']) === false)
                                                @foreach($list_event_register['M'] as $row)
                                                    <tr>
                                                        <td>
                                                            {{($row['PersonLimitType'] == 'L') ? '인원제한' : '무제한'}}
                                                            <input type="hidden" name="event_register_parson_limit_type[]" value="{{$row['PersonLimitType']}}">
                                                        </td>
                                                        <td>
                                                            {{$row['PersonLimit']}}
                                                            <input type="hidden" name="event_register_parson_limit[]" value="{{$row['PersonLimit']}}">
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            {{$row['Name']}}
                                                            <input type="hidden" name="event_register_name[]" value="{{$row['Name']}}">
                                                        </td>
                                                        <td><a href="#none" class="btn-lecture-delete-submit" data-lecture-idx="{{$row['ErIdx']}}"><i class="fa fa-times fa-lg red"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group hide" id="limit_{{$optoins_keys[1]}}">
                            <label class="control-label col-md-2">댓글사용영역</label>
                            <div class="col-md-7 form-inline">
                                <div class="checkbox">
                                <input type="checkbox" id="comment_use_area_B" name="comment_use_area[]" value="B" class="flat" @if( (empty($data['ArrCommentUseArea']['B']) === false) && $data['ArrCommentUseArea']['B']=='B' )checked="checked"@endif/>
                                <label class="inline-block mr-5" for="comment_use_area_B">이벤트페이지(하단)</label>

                                <input type="checkbox" id="comment_use_area_P" name="comment_use_area[]" value="P" class="flat" @if( (empty($data['ArrCommentUseArea']['P']) === false) && $data['ArrCommentUseArea']['P']=='P' )checked="checked"@endif/>
                                <label class="inline-block mr-5" for="comment_use_area_P">바로신청팝업</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group hide" id="limit_{{$optoins_keys[2]}}">
                            <label class="control-label col-md-2">자동문자정보</label>
                            <div class="col-md-10">
                                <div class="row">
                                    <label class="control-label col-md-1">발신번호</label>
                                    <div class="col-md-5 form-inline">
                                        <input type="text" id="send_tel" name="send_tel" class="form-control" value="{{$data['SendTel']}}" title="발신번호">
                                    </div>
                                    <div class="col-md-5">
                                        <p class="form-control-static">• 접수 완료 시 아래의 문구가 자동 발송됩니다.</p>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <label class="control-label col-md-1">내용</label>
                                    <div class="col-md-11">
                                        <textarea id="sms_content" name="sms_content" class="form-control" rows="6" title="내용" placeholder="">{{$data['SmsContent']}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group hide" id="limit_{{$optoins_keys[3]}}">
                            <label class="control-label col-md-2">바로신청팝업</label>
                            <div class="col-md-5">
                                <input type="text" id="popup_title" name="popup_title" class="form-control" value="{{$data['PopupTitle']}}" placeholder="팝업타이틀명" title="팝업타이틀명">
                            </div>
                            <div class="col-md-5">
                                <p class="form-control-static">• 사용자단에서 노출되는 신청 팝업 타이틀명 입니다.</p>
                            </div>
                        </div>

                        <div class="form-group form-banner hide" id="banner_{{$optoins_keys[3]}}">
                            <label class="control-label col-md-2">배너선택</label>
                            <div class="col-md-8 item form-inline">
                                <button type="button" id="btn_banner_search" class="btn btn-sm btn-primary">배너검색</button>
                                <span id="selected_banner" class="pl-10">
                                    @if (empty($data['BIdx']) === false)
                                    <span class="pr-10">{{ $data['BannerName'] }}
                                        <a href="#none" data-banner-idx="{{ $data['BIdx'] }}" class="selected-banner-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="banner_idx" value="{{ $data['BIdx'] }}"/>
                                    </span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">프로모션 링크</label>
                    <div class="form-inline col-md-10">
                        <input type="text" id="promotion_link" name="promotion_link" class="form-control" value="{{$data['Link']}}" title="프로모션 링크">
                        &nbsp;&nbsp;&nbsp;&nbsp;• 관리할 프로모션 링크를 입력해주세요.
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="admin_mail_id">조회수</label>
                    <div class="col-md-10 form-inline">
                        실제 <input type="text" id="read_count" name="read_count" class="form-control" title="실제" readonly="readonly" value="{{$data['ReadCnt']}}" style="width: 60px; padding:5px">
                        +
                        생성 <input type="number" id="setting_readCnt" name="setting_readCnt" class="form-control" title="생성" value="{{$data['AdjuReadCnt']}}" style="width: 70px; padding:5px">
                        =
                        노출 <input type="text" id="total_read_count" name="total_read_count" class="form-control" title="노출" readonly="readonly" value="" style="width: 70px; padding:5px">
                        &nbsp;&nbsp;&nbsp;&nbsp;• 사용자단에 노출되는 조회수는‘실조회수 + 조회수생성’입니다.
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            //editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'content';
            $editor_profile.run();

            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained("#site_code");
            $regi_form.find('select[name="subject_code"]').chained("#site_code");
            $regi_form.find('select[name="prof_code"]').chained("#site_code");

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

            //배너검색
            $('#btn_banner_search').on('click', function(event) {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.')
                    return;
                }

                $('#btn_banner_search').setLayer({
                    'url' : '{{ site_url('/site/banner/regist/searchBannerForEventLectureModal/') }}' + site_code,
                    'width' : 900
                });
            });

            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            // 배너삭제
            $regi_form.on('click', '.selected-banner-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

            //내용옵션 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="content_type"]:checked', function() {
                var set_val = $(this).data('input');
                $('.form-content-input').removeClass('show').addClass('hide');
                set_val !== 'no' && $('#content_' + set_val).removeClass('hide').addClass('show');
            });

            //관리옵션 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="option_ccds[]"]', function() {
                var set_val = $(this).data('code');
                if ($(this).is(":checked") == true) {
                    $('#limit_' + set_val).removeClass('hide').addClass('show');
                    $('#banner_' + set_val).removeClass('hide').addClass('show');
                } else {
                    $('#limit_' + set_val).removeClass('show').addClass('hide');
                    $('#banner_' + set_val).removeClass('show').addClass('hide');
                }
            });

            //신청리스트 옵션 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="limit_type"]:checked', function() {
                var set_val = $(this).data('limit-type');
                $('.form-limit-type').removeClass('show').addClass('hide');
                set_val !== 'no' && $('#table_limit_type_' + set_val).removeClass('hide').addClass('show');
            });

            //단일리스트 > 인원제한 선택
            $('#person_limit_type').change(function() {
                var set_val = $(this).val();
                if (set_val === 'L') {
                    $regi_form.find('input[name="person_limit"]').prop('readonly', '');
                } else {
                    $regi_form.find('input[name="person_limit"]').prop('readonly', 'readonly');
                }
            });

            //다중리스트 > 인원제한 선택
            $('#temp_person_limit_type').change(function() {
                var set_val = $(this).val();
                if (set_val === 'L') {
                    $regi_form.find('input[name="temp_person_limit"]').prop('readonly', '');
                } else {
                    $regi_form.find('input[name="temp_person_limit"]').prop('readonly', 'readonly');
                }
            });

            //다중리스트 > 등록(설정값 추가)
            var temp_idx = 1;
            $regi_form.on('click', '.btn-lecture-add', function() {
                var temp_person_limit_type = $('#temp_person_limit_type').val();
                var temp_person_limit_type_text = $("#temp_person_limit_type option:selected").text();
                var temp_person_limit = $('#temp_person_limit').val();
                var temp_lecture_name = $('#temp_lecture_name').val();

                if (temp_person_limit_type == 'L' && temp_person_limit == '') {
                    alert('제한할 인원 수를 입력해 주세요.');
                    return false;
                }

                if (temp_lecture_name == '') {
                    alert('특강명을 입력해 주세요.');
                    return false;
                }

                if (temp_person_limit_type == 'N') { temp_person_limit = ''; }
                var add_lists;
                add_lists = '<tr id="temp-lecture-'+temp_idx+'">';
                add_lists += '<td><input type="hidden" name="event_register_parson_limit_type[]" value="'+temp_person_limit_type+'">'+temp_person_limit_type_text+'</td>';
                add_lists += '<td><input type="text" name="event_register_parson_limit[]" class="form-control" readonly="readonly" value="'+temp_person_limit+'"></td>';
                add_lists += '<td></td>';
                add_lists += '<td><input type="text" name="event_register_name[]" class="form-control no-border" readonly="readonly" value="'+temp_lecture_name+'"></td>';
                add_lists += '<td><a href="#none" class="btn-lecture-delete" data-lecture-temp-idx="'+temp_idx+'"><i class="fa fa-times fa-lg red"></i></a></td>';
                add_lists += '<tr>';
                $('#table_lecture > tbody:last').append(add_lists);

                temp_idx = temp_idx + 1;
            });

            // 특강 tr 삭제, hidden 데이터 삭제
            $regi_form.on('click', '.btn-lecture-delete', function() {
                var row_idx = $(this).data('lecture-temp-idx');
                $('#temp-lecture-'+row_idx).remove();
            });

            // 특강 데이터 삭제
            $regi_form.on('click', '.btn-lecture-delete-submit', function() {
                var _url = '{{ site_url("/site/eventLecture/delRegister") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'er_idx' : $(this).data('lecture-idx')
                };
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 고객센터 전화번호
            $regi_form.on('change', 'select[name="site_code"]', function() {
                var $arr_site_csTel = {!! $site_csTel !!};
                var cs_tel = '';
                var this_site_code = $(this).val();
                if (this_site_code == '') {
                    cs_tel = '';
                } else {
                    cs_tel = $arr_site_csTel[this_site_code].replace('-','');
                }
                $('#send_tel').val(cs_tel);
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/eventLecture") }}/' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/site/eventLecture/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/eventLecture/") }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

        function addValidate() {
            var $method = '{{$method}}';
            var limit_type = $(":input:radio[name=limit_type]:checked").val();
            var event_register_length = $regi_form.find('input[name="event_register_parson_limit_type[]"]').length;
            var site_category_length = $("input[name='cate_code[]']").length;

            if (site_category_length < 1) {
                alert('카테고리 선택 필드는 필수입니다.');
                return false;
            }

            if ($method == 'POST' && limit_type == 'M' && event_register_length <= 0) {
                alert('다중리스트 정보를 입력해 주세요.');
                return false;
            }
            return true;
        }
    </script>
@stop