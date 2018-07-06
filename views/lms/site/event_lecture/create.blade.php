@extends('lcms.layouts.master')
@section('content')
    <h5>- 이벤트, 설명회, 특강 등을 등록하고 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>--}}
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/eventLecture/store") }}?bm_idx=45" novalidate>
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
                    <label class="control-label col-md-2" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', false, $offLineSite_list) !!}
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1" for="campus_ccd">캠퍼스<span class="required">*</span></label>
                    <div class="col-md-2 form-inline item">
                        <select class="form-control" id="campus_ccd" name="campus_ccd" title="캠퍼스" required="required">
                            <option value="">캠퍼스</option>
                            @php $temp='0'; @endphp
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && ($row['CampusCcd'] == $data['CampusCcd'])) selected="selected" @endif>{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
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
                    <label class="control-label col-md-2">신청유형 <span class="required">*</span></label>
                    <div class="col-md-2 item form-inline">
                        <div class="radio">
                            <input type="radio" class="flat" id="requst_type_1" name="requst_type" value="1" title="설명회" required="required" @if($method == 'POST' || $data['RequstType']=='1')checked="checked"@endif> <label for="requst_type_1" class="mr-10">설명회</label>
                            <input type="radio" class="flat" id="requst_type_2" name="requst_type" value="2" title="특강" @if($data['RequstType']=='2')checked="checked"@endif> <label for="requst_type_2" class="mr-10">특강</label>
                            <input type="radio" class="flat" id="requst_type_3" name="requst_type" value="3" title="이벤트" @if($data['RequstType']=='3')checked="checked"@endif> <label for="requst_type_3" class="mr-10">이벤트</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-lg-offset-1">특강구분</label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control mr-10" id="subject_code" name="subject_code">
                            <option value="">과목</option>
                            @foreach($arr_subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control mr-10" id="prof_code" name="prof_code">
                            <option value="">교수</option>
                            @foreach($arr_professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">참여구분</label>
                    <div class="col-md-2 form-inline">
                        <div class="radio">
                            <input type="radio" id="take_type_1" name="take_type" class="flat" value="1" title="회원" @if($method == 'POST' || $data['TakeType']=='1')checked="checked"@endif/><label for="take_type_1" class="hover mr-5">회원</label>
                            <input type="radio" id="take_type_2" name="take_type" class="flat" value="2" title="회원+비회원" @if($data['TakeType']=='2')checked="checked"@endif/> <label for="take_type_2" class="">회원+비회원</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-lg-offset-1">접수기간 <span class="required">*</span></label>
                    <div class="col-md-3 item">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_start_date" name="register_start_date" title="기간검색" required="required" value="{{$data['RegisterStartDate']}}">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_end_date" name="register_end_date" title="기간검색" required="required" value="{{$data['RegisterEndDate']}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">접수상태 <span class="required">*</span></label>
                    <div class="col-md-2 item form-inline">
                        <div class="radio">
                            <input type="radio" class="flat" id="is_register_y" name="is_register" value="Y" title="접수중" required="required" @if($method == 'POST' || $data['IsRegister']=='Y')checked="checked"@endif> <label for="is_register_y" class="mr-10">접수중</label>
                            <input type="radio" class="flat" id="is_register_n" name="is_register" value="N" title="마감" @if($data['IsRegister']=='N')checked="checked"@endif> <label for="is_register_n" class="mr-10">마감</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-lg-offset-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-2 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/><label for="is_use_y" class="hover mr-5">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="event_name">제목<span class="required">*</span></label>
                    <div class="col-md-7 item">
                        <input type="text" id="event_name" name="event_name" class="form-control" maxlength="100" title="제목" required="required" value="{{ $data['EventName'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="event_start_datm">진행일시</label>
                    <div class="col-md-6 form-inline">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="event_start_datm" name="event_start_datm" value="{{$data['EventStartDate']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="event_start_hour" name="event_start_hour">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['EventStartHour']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-1"><p class="form-control-static">:</p></div>
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="event_start_min" name="event_start_min">
                                    @php
                                        for($i=0; $i<=59; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['EventStartMin']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>

                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="event_end_datm" name="event_end_datm" value="{{$data['EventEndDatm']}}">
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="event_end_hour" name="event_end_hour">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['EventEndHour']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                            <div class="col-md-1"><p class="form-control-static">:</p></div>
                            <div class="input-group-btn">
                                <select class="form-control ml-5" id="event_end_min" name="event_end_min">
                                    @php
                                        for($i=0; $i<=59; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == $data['EventEndMin']) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="control-label col-md-1">[회차]</label>
                    <div class="col-md-1">
                        <input type="text" id="event_num" name="event_num" class="form-control" maxlength="3" title="회차" value="{{ $data['EventNum'] }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">내용옵션</label>
                    <div class="col-md-2 form-inline">
                        <div class="radio">
                            <input type="radio" id="content_type_I" name="content_type" data-input="file" class="flat content-type" value="I" required="required" title="내용옵션" @if($method == 'POST' || $data['ContentType']=='I')checked="checked"@endif/><label for="content_type_I" class="hover mr-5">이미지</label>
                            <input type="radio" id="content_type_E" name="content_type" data-input="editor" class="flat content-type" value="E" @if($data['ContentType']=='E')checked="checked"@endif/> <label for="content_type_E" class="">에디터</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">내용 <span class="required">*</span></label>
                    <div class="col-md-7 item form-inline form-content-input hide" id="content_file">
                        <input type="file" id="attach_file_C" name="attach_file[]" @if($method == 'POST')required="required"@endif class="form-control" title="내용 이미지">
                        @if(empty($data['FileName']) === false)
                            <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['FileFullPath'] . $data['FileName'] }}" rel="popup-image">{{ $data['FileRealName'] }}</a> ]
                                <a href="#none" class="file-delete" data-attach-idx="{{ $data['EfIdx']  }}"><i class="fa fa-times red"></i></a>
                            </p>
                        @endif
                    </div>

                    <div class="col-md-7 form-content-input hide" id="content_editor">
                        <textarea id="content" name="content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_file_F">첨부파일</label>
                    <div class="col-md-7 item form-inline">
                        <input type="file" id="attach_file_F" name="attach_file[]" class="form-control" title="첨부파일">
                        @if(empty($data['FileName']) === false)
                            <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['FileFullPath'] . $data['FileName'] }}" rel="popup-image">{{ $data['FileRealName'] }}</a> ]
                                <a href="#none" class="file-delete" data-attach-idx="{{ $data['EfIdx']  }}"><i class="fa fa-times red"></i></a>
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_file_S">리스트썸네일<span class="required">*</span></label>
                    <div class="col-md-7 item form-inline">
                        <input type="file" id="attach_file_S" name="attach_file[]" @if($method == 'POST')required="required"@endif class="form-control" title="리스트썸네일">
                        @if(empty($data['FileName']) === false)
                            <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['FileFullPath'] . $data['FileName'] }}" rel="popup-image">{{ $data['FileRealName'] }}</a> ]
                                <a href="#none" class="file-delete" data-attach-idx="{{ $data['EfIdx']  }}"><i class="fa fa-times red"></i></a>
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_file_I">이슈썸네일</label>
                    <div class="col-md-7 form-inline">
                        <input type="file" id="attach_file_I" name="attach_file[]" class="form-control" title="첨부파일">
                        @if(empty($data['FileName']) === false)
                            <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['FileFullPath'] . $data['FileName'] }}" rel="popup-image">{{ $data['FileRealName'] }}</a> ]
                                <a href="#none" class="file-delete" data-attach-idx="{{ $data['EfIdx']  }}"><i class="fa fa-times red"></i></a>
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">관리옵션<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <div class="checkbox">
                            @foreach($arr_options as $key => $val)
                                <input type="checkbox" id="option_ccds_{{$key}}" name="option_ccds[]" class="flat optoin-ccds" title="관리옵션" value="{{$key}}" data-code="{{$key}}" required="required" @if($data['OptionCcds']==$key)checked="checked"@endif/>
                                <label class="inline-block mr-5" for="option_ccds_{{$key}}">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">• '정원제한'을 설정해야만 온라인에서 접수를 받을 수 있습니다</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group hide" id="limit_{{$optoins_keys[0]}}">
                            <div class="row">
                                <label class="control-label col-md-1 pr-5">정원제한 <span class="required">*</span></label>
                                <div class="col-md-5 item form-inline">
                                    <div class="radio">
                                        <input type="radio" class="flat mr-10" id="limit_type_S" name="limit_type" data-limit-type="S" value="S" required="required_if:option_ccds,{{$optoins_keys[0]}}" title="단일리스트" @if($method == 'POST' || $data['LimitType']=='S')checked="checked"@endif> <label for="limit_type_S">단일리스트</label>
                                        <input type="radio" class="flat mr-10" id="limit_type_M" name="limit_type" data-limit-type="M" value="M" title="다중리스트" @if($data['LimitType']=='M')checked="checked"@endif> <label for="limit_type_M">다중리스트</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <p class="form-control-static">• 한 페이지에서 여러개의 특강 접수 시 '다중리스트' 선택</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 col-lg-offset-1 form-inline form-limit-type hide" id="table_limit_type_S">
                                    <select class="form-control ml-5" id="person_limit_type" name="person_limit_type">
                                        <option value="L" @if($data['PersonLimitType']=='L')selected="selected"@endif>인원제한</option>
                                        <option value="N" @if($data['PersonLimitType']=='M')selected="selected"@endif>무제한</option>
                                    </select>
                                    <input type="text" id="person_limit" name="person_limit" class="form-control ml-5" required="required_if:person_limit_type,L" title="정원수" value="{{$data['PersonLimit']}}" style="width: 80px;"> 명
                                </div>

                                <div class="col-md-11 col-lg-offset-1 form-limit-type hide" id="table_limit_type_M">
                                    <div class="form-group form-inline">
                                        <select class="form-control ml-5" id="select_type" name="select_type">
                                            <option value="S" @if($data['SelectType']=='S')selected="selected"@endif>단일선택</option>
                                            <option value="M" @if($data['SelectType']=='M')selected="selected"@endif>다중선택</option>
                                        </select>
                                        <select class="form-control ml-5" id="temp_person_limit_type" name="temp_person_limit_type">
                                            <option value="L">인원제한</option>
                                            <option value="N">무제한</option>
                                        </select>
                                        <input type="text" id="temp_person_limit" name="temp_person_limit" class="form-control ml-5" title="정원수" style="width: 80px;"> 명
                                        <p class="form-control-static ml-20">[특강명]</p>
                                        <input type="text" id="temp_lecture_name" name="temp_lecture_name" class="form-control ml-5" title="특강명">
                                        <button type="button" class="btn btn-info btn-lecture-add" style="margin-bottom: 2px;">등록</button>
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
                                            <tbody></tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group hide" id="limit_{{$optoins_keys[1]}}">
                            <label class="control-label col-md-1">댓글사용영역</label>
                            <div class="col-md-7 form-inline">
                                <div class="checkbox">
                                <input type="checkbox" id="comment_use_area_B" name="comment_use_area[]" value="B" class="flat" @if($data['CommentUseArea']=='B')checked="checked"@endif/>
                                <label class="inline-block mr-5" for="comment_use_area_B">이벤트페이지(하단)</label>

                                <input type="checkbox" id="comment_use_area_P" name="comment_use_area[]" value="P" class="flat" @if($data['CommentUseArea']=='P')checked="checked"@endif/>
                                <label class="inline-block mr-5" for="comment_use_area_P">바로신청팝업</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group hide" id="limit_{{$optoins_keys[2]}}">
                            <label class="control-label col-md-1">자동문자정보</label>
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
                            <label class="control-label col-md-1">바로신청팝업</label>
                            <div class="col-md-5">
                                <input type="text" id="popup_title" name="popup_title" class="form-control" value="{{$data['PopupTitle']}}" placeholder="팝업타이틀명" title="팝업타이틀명">
                            </div>
                            <div class="col-md-5">
                                <p class="form-control-static">• 사용자단에서 노출되는 신청 팝업 타이틀명 입니다.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">프로모션 링크</label>
                    <div class="col-md-4">
                        <input type="text" id="promotion_link" name="promotion_link" class="form-control" value="{{$data['Link']}}" title="프로모션 링크">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">• 관리할 프로모션 링크를 입력해주세요.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_mail_id">조회수</label>
                    <div class="col-md-4 form-inline">
                        실제 <input type="text" id="read_count" name="read_count" class="form-control" title="실제" readonly="readonly" value="{{$data['ReadCnt']}}" style="width: 60px; padding:5px">
                        +
                        생성 <input type="number" id="setting_readCnt" name="setting_readCnt" class="form-control" title="생성" value="{{$data['AdjuReadCnt']}}" style="width: 70px; padding:5px">
                        =
                        노출 <input type="text" id="total_read_count" name="total_read_count" class="form-control" title="노출" readonly="readonly" value="" style="width: 70px; padding:5px">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">• 사용자단에 노출되는 조회수는‘실조회수 + 조회수생성’입니다.</p>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group text-center">
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

            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
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
                } else {
                    $('#limit_' + set_val).removeClass('show').addClass('hide');
                }
            });

            //정원제한 옵션 선택
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

            //목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/site/eventLecture") }}/' + getQueryString());
            });

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                /*var _url = '{{ site_url("/site/eventLecture/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/eventLecture/") }}/' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');*/
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