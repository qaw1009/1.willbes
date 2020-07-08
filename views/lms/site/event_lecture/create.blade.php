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
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', true) !!}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="promotion_code">프로모션코드</label>
                    <div class="col-md-4 form-inline ml-12-dot">
                        @if($promotion_modify_type === true && $method == 'PUT')
                            <input type="text" class="form-control" name="promotion_code" id="promotion_code" value="{{$data['PromotionCode']}}">
                        @else
                            <input type="hidden" name="promotion_code" value="{{$data['PromotionCode']}}">
                            {{$data['PromotionCode']}}
                        @endif
                            <p class="form-control-static"> # 등록 시 자동 생성</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보
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
                    <label class="control-label col-md-1-1">캠퍼스
                    </label>
                    <div class="col-md-10 form-inline">
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
                    <label class="control-label col-md-1-1">신청유형 <span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            @foreach($arr_request_types as $key => $val)
                                <input type="radio" class="flat" id="request_type_{{$key}}" name="request_type" value="{{$key}}" title="{{$val}}" required="required" @if($loop->first || $data['RequestType']==$key)checked="checked"@endif> <label for="request_type_{{$key}}" class="input-label">{{$val}}</label>
                            @endforeach
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
                        </div>
                        <select class="form-control ml-5" id="register_start_hour" name="register_start_hour">
                            @php
                                for($i=0; $i<=23; $i++) {
                                    $str = (strlen($i) <= 1) ? '0' : '';
                                    $selected = ($i == $data['RegisterStartHour']) ? "selected='selected'" : "";
                                    echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                }
                            @endphp
                        </select>
                        <span>:</span>
                        <select class="form-control" id="register_start_min" name="register_start_min">
                            @php
                                for($i=0; $i<=59; $i++) {
                                    $str = (strlen($i) <= 1) ? '0' : '';
                                    $selected = ($i == $data['RegisterStartMin']) ? "selected='selected'" : "";
                                    echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                }
                            @endphp
                        </select>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_end_datm" name="register_end_datm" value="{{$data['RegisterEndDay']}}">
                        </div>
                        <select class="form-control ml-5" id="register_end_hour" name="register_end_hour">
                            @php
                                for($i=0; $i<=23; $i++) {
                                    $str = (strlen($i) <= 1) ? '0' : '';
                                    $selected = ($i == $data['RegisterEndHour']) ? "selected='selected'" : "";
                                    echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                }
                            @endphp
                        </select>
                        <span>:</span>
                        <select class="form-control" id="register_end_min" name="register_end_min">
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

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="promotion">
                @include('lms.site.event_lecture.partial.create_promotion')
                </div>

                <div class="event">
                @include('lms.site.event_lecture.partial.create_event')
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">관리옵션</label>
                    <div class="col-md-10 form-inline">
                        <div class="checkbox">
                            @foreach($arr_options as $key => $val)
                                <input type="checkbox" id="option_ccds_{{$key}}" name="option_ccds[]" class="flat optoin-ccds" title="관리옵션" value="{{$key}}" data-code="{{$key}}"
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
                        <div class="form-group hide" id="limit_{{$options_keys[0]}}">
                            <div class="row">
                                <div class="col-md-3 item form-inline">
                                    <div class="radio">
                                        <input type="radio" class="flat mr-10" id="limit_type_S" name="limit_type" data-limit-type="S" value="S" required="required_if:option_ccds,{{$options_keys[0]}}" title="단일리스트" @if($method == 'POST' || $data['LimitType']=='S')checked="checked"@endif>
                                        <label for="limit_type_S" class="input-label">단일리스트</label>
                                        <input type="radio" class="flat mr-10" id="limit_type_M" name="limit_type" data-limit-type="M" value="M" title="다중리스트" @if($data['LimitType']=='M')checked="checked"@endif>
                                        <label for="limit_type_M" class="input-label">다중리스트</label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <p class="form-control-static">• 한 페이지에서 여러개의 특강 접수 시 '다중리스트' 선택</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 form-limit-type hide" id="table_limit_type_S">
                                    <div class="form-group form-inline">
                                        <div class="col-md-11">
                                            <input type="hidden" name="er_idx" value="@if(empty($list_event_register['S']) === false && empty($list_event_register['S'][0]['ErIdx']) === false){{$list_event_register['S'][0]['ErIdx']}}@endif">
                                            <select class="form-control" id="person_limit_type" name="person_limit_type">
                                                <option value="L" @if((empty($list_event_register['S']) === false) && $list_event_register['S'][0]['PersonLimitType']=='L')selected="selected"@endif>인원제한</option>
                                                <option value="N" @if((empty($list_event_register['S']) === false) && $list_event_register['S'][0]['PersonLimitType']=='N')selected="selected"@endif>무제한</option>
                                            </select>
                                            <input type="text" id="person_limit" name="person_limit" class="form-control ml-5" required="required_if:person_limit_type,L" title="정원수" value="{{(empty($list_event_register['S']) === false) ? $list_event_register['S'][0]['PersonLimit'] : ''}}" style="width: 80px;"> 명
                                            <span class="ml-20">[특강명] </span><input type="text" id="register_name" name="register_name" class="form-control ml-5" required="required_if:person_limit_type,L" title="특강명" value="{{(empty($list_event_register['S']) === false) ? $list_event_register['S'][0]['Name'] : ''}}">
                                            <button type="button" class="btn btn-dark btn-register-submit" style="margin-bottom: 2px;" data-register-idx="{{empty($list_event_register['S']) === false ? $list_event_register['S'][0]['ErIdx'] : ''}}">단일특강수정</button>
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
                                        <div class="col-md-5">
                                            <p class="form-control-static">• 다중리스트 옵션 (관리차 필요값, 제어조건 없음)</p>
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
                                        <div class="col-md-12">
                                        <table class="table table-striped table-bordered" id="table_lecture">
                                            <thead>
                                            <tr>
                                                <th>구분</th>
                                                <th>정원</th>
                                                <th>특강/설명회명</th>
                                                <th>만료</th>
                                                <th>사용</th>
                                                <th>지급상품 <br> {!! html_site_select('', 'register_product_site_code', '', '', '운영 사이트', '') !!}</th>
                                                <th>수정</th>
                                                <th>삭제</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if (empty($list_event_register['M']) === false)
                                                @php $i=1; @endphp
                                                @foreach($list_event_register['M'] as $row)
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="event_register_er_idx[]" value="{{$row['ErIdx']}}">
                                                            {{--{{($row['PersonLimitType'] == 'L') ? '인원제한' : '무제한'}}
                                                            <input type="hidden" name="event_register_person_limit_type[]" value="{{$row['PersonLimitType']}}">--}}
                                                            <select class="form-control" name="event_register_person_limit_type[]" id="event_register_person_limit_type_{{$i}}" style="min-width: 70px;">
                                                                <option value="L" @if($row['PersonLimitType'] == 'L')selected="selected"@endif>인원제한</option>
                                                                <option value="N" @if($row['PersonLimitType'] == 'N')selected="selected"@endif>무제한</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            {{--{{$row['PersonLimit']}}--}}
                                                            <input type="text" name="event_register_person_limit[]" id="event_register_person_limit_{{$i}}" value="{{$row['PersonLimit']}}"  style="width: 50px;">
                                                        </td>
                                                        <td>
                                                            {{--{{$row['Name']}}--}}
                                                            <input type="text" name="event_register_name[]" id="event_register_name_{{$i}}" value="{{$row['Name']}}">
                                                        </td>
                                                        <td>
                                                            {{--@if($row['RegisterExpireStatus'] == 'Y')
                                                                <a href="#none" class="btn-lecture-expire-submit" data-register-idx="{{$row['ErIdx']}}" data-expire-status="N">[<u>만료</u>]</a>
                                                            @else
                                                                <a href="#none" class="btn-lecture-expire-submit" data-register-idx="{{$row['ErIdx']}}" data-expire-status="Y">[<u>복구</u>]</a>
                                                            @endif--}}
                                                            <select class="form-control" name="expire_status[]" id="expire_status_{{$i}}" style="min-width: 60px;">
                                                                <option value="Y" @if($row['RegisterExpireStatus'] == 'Y')selected="selected"@endif>복구</option>
                                                                <option value="N" @if($row['RegisterExpireStatus'] == 'N')selected="selected"@endif>만료</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="register_is_use[]" id="register_is_use_{{$i}}" style="min-width: 70px;">
                                                                <option value="Y" @if($row['IsUse'] == 'Y')selected="selected"@endif>사용</option>
                                                                <option value="N" @if($row['IsUse'] == 'N')selected="selected"@endif>미사용</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <button type="button" data-eridx="{{$row['ErIdx']}}" data-poptype="register" class="btn_product_search btn btn-sm btn-primary mb-0 ml-5">상품추가</button>
                                                            <span id="event_register_product_{{$row['ErIdx']}}" class="event_register_product">
                                                            @if(empty($row['arr_event_product']) === false)
                                                                @foreach($row['arr_event_product'] as $p_key => $p_val)
                                                                    <br/>
                                                                    <span class="pr-10">{{$p_val['ProdName']}}
                                                                        <a href="#none" data-prod-code="{{$p_val['ProdCode']}}" class="selected-product-delete">
                                                                            <i class="fa fa-times red"></i>
                                                                        </a>
                                                                        <input type="hidden" name="prod_code[]" value="{{$p_val['ProdCode']}}">
                                                                    </span>
                                                                @endforeach
                                                            @endif
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success mr-10 btn-lecture-expire-submit" data-register-idx="{{$row['ErIdx']}}" data-modify-number="{{$i}}">수정</button>
                                                        </td>
                                                        <td><a href="#none" class="btn-lecture-delete-submit" data-lecture-idx="{{$el_idx}}" data-register-idx="{{$row['ErIdx']}}"><i class="fa fa-times fa-lg red"></i></a></td>
                                                    </tr>
                                                @php $i++; @endphp
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hide" id="limit_{{$options_keys[1]}}">
                            <div class="form-group">
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
                            <div class="form-group">
                                <label class="control-label col-md-2">댓글Ui종류</label>
                                <div class="col-md-7 form-inline">
                                    <div class="checkbox">
                                        @foreach($arr_comment_ui_type_ccd as $key => $val)
                                            <input type="checkbox" id="comment_ui_type_{{$key}}" name="comment_ui_type_ccds[]" class="flat" title="댓글Ui종류" value="{{$key}}"
                                                   @if( ($method == 'POST' && $loop->first === true) || (empty($data['comment_ui_type_ccds']) === false && array_key_exists($key, $data['comment_ui_type_ccds']) === true) )checked="checked"@endif/>
                                            <label class="inline-block mr-5" for="comment_ui_type_{{$key}}">{{$val}}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-offset-2 form-inline">
                                    <p class="form-control-static">• 프로모션 댓글 종류에 따라 설정 할 수 있습니다.<br>
                                        • <b>일반 이벤트의 댓글</b>은 기본형으로만 가능.
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">자동지급포인트</label>
                                <div class="col-md-10">
                                    <div class="row">
                                        <label class="control-label col-md-1-1">적립대상</label>
                                        <div class="col-md-4 form-inline">
                                            <select name="comment_point_type" id="comment_point_type" class="form-control" title="포인트지급타입">
                                                <option value="">포인트종류</option>
                                                @foreach($pointapply_ccd as $key => $val)
                                                    <option value="{{$key}}" @if($data['CommentPointType'] == $key) selected="selected" @endif>{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <label class="control-label col-md-1-1">적립포인트</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="comment_point_amount" name="comment_point_amount" value="{{$data['CommentPointAmount']}}">
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <label class="control-label col-md-1-1">유효일수</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="comment_point_valid_days" name="comment_point_valid_days" value="{{$data['CommentPointValidDays']}}" style="width: 70px;">
                                        </div>
                                    </div>
                                    •  댓글 등록 시 지급될 포인트 정보를 등록해주세요. <br/>
                                    •  기본형 댓글에만 자동지급 포인트 기능 사용이 가능합니다.
                                </div>
                            </div>
                        </div>

                        <div class="form-group hide" id="limit_{{$options_keys[2]}}">
                            <label class="control-label col-md-2">자동문자정보</label>
                            <div class="col-md-10">
                                <div class="row">
                                    <label class="control-label col-md-1">발신번호</label>
                                    <div class="col-md-5 form-inline">
                                        {!! html_callback_num_select($arr_send_callback_ccd, $data['SendTel'], 'send_tel', 'send_tel', '', '발신번호', '') !!}
                                    </div>
                                    <div class="col-md-5">
                                        <p class="form-control-static">• 접수 완료 시 아래의 문구가 자동 발송됩니다.</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="control-label col-md-1">이름삽입</label>
                                    <div class="col-md-5 form-inline">
                                        <input type="checkbox" id="add_name_chk" name="add_name_chk" class="flat" value="Y"/>
                                    </div>
                                    <label class="control-label col-md-1-1">신청명삽입</label>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="add_register_info_name_chk" name="add_register_info_name_chk" class="flat" value="Y"/>
                                    </div>
{{--                                    <div class="col-md-5">--}}
{{--                                        <p class="form-control-static"></p>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="row mt-10">
                                    <label class="control-label col-md-1">내용</label>
                                    <div class="col-md-11">
                                        <textarea id="sms_content" name="sms_content" class="form-control" rows="6" title="내용" placeholder="">{{$data['SmsContent']}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-10">
                                    <label class="control-label col-md-1"></label>
                                    <div class="col-md-11">
                                        <input class="form-inline red" id="content_byte" style="width: 50px;" type="text" readonly="readonly" value="0">
                                        <span class="red">byte</span>
                                        (55byte 이상일 경우 MMS로 전환됩니다.)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group hide" id="limit_{{$options_keys[3]}}">
                            <label class="control-label col-md-2">바로신청팝업</label>
                            <div class="col-md-5">
                                <input type="text" id="popup_title" name="popup_title" class="form-control" value="{{$data['PopupTitle']}}" placeholder="팝업타이틀명" title="팝업타이틀명">
                            </div>
                            <div class="col-md-5">
                                <p class="form-control-static">• 사용자단에서 노출되는 신청 팝업 타이틀명 입니다.</p>
                            </div>
                        </div>

                        <div class="form-group form-banner hide" id="banner_{{$options_keys[3]}}">
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
                            <div class="col-md-10 col-lg-offset-2 form-inline">
                                <p class="form-control-static">• 사이트관리 > 배너관리 > 배너등록에서 링크방식을 '레이어팝업(이벤트 바로신청팝업)으로 등록한 배너만 노출됩니다.<br>
                                    • 배너를 선택하고 이벤트 등록한 후 해당 섹션의 배너 클릭 시 해당 이벤트의 바로신청 팝업이 자동 노출됩니다.</p>
                            </div>
                        </div>

                        {{-- DP강좌신청 --}}
                        <span id="temp_event_display_product" class="hide"></span>
                        <div class="form-group hide" id="limit_{{$options_keys[4]}}">
                            <div class="row">

                                <div class="col-md-11">
                                    <div class="form-group form-inline">
                                        <div class="col-md-11">
                                            {!! html_site_select('', 'display_product_site_code', '', '', '운영 사이트', '', '', false, $onLineSite_list) !!}
                                            <button type="button" data-poptype="display" class="btn_product_search btn btn-sm btn-primary mb-0 ml-5">상품추가</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-11">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered" id="table_display_product">
                                                <thead>
                                                    <tr>
                                                        <th>그룹</th>
                                                        <th>강좌명</th>
                                                        <th class="hide">장바구니</th>
                                                        <th class="hide">바로결제</th>
                                                        <th>상품종류</th>
                                                        <th>DP순서</th>
                                                        <th>삭제</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if (empty($list_event_display_product) === false)
                                                    @php $i=1; @endphp
                                                    @foreach($list_event_display_product as $row)
                                                        <tr>
                                                            <td>
                                                                <select name='event_display_product_group_order[]' data-ccd = "{{$row['LearnPatternCcd']}}" class="form-control mr-10" style="min-width: 50px;">
                                                                    @for($ii=1;$ii<10;$ii++)
                                                                        <option value='{{$ii}}' @if($ii ==$row['GroupOrderNum']) selected="selected" @endif>{{$ii}}</option>
                                                                    @endfor
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="edp_idx[]" value="{{$row['EdpIdx']}}">
                                                                <input type="hidden" name="event_display_product_prod_code[]" value="{{$row['ProdCode']}}">
                                                                [{{$row['ProdCode']}}] {{$row['ProdName']}}
                                                            </td>
                                                            <td class="hide">
                                                                <select class="form-control" name="event_display_product_is_disp_cart[]" style="min-width: 70px;">
                                                                    <option value="Y" @if($row['IsDispCart'] == 'Y')selected="selected"@endif>사용</option>
                                                                    <option value="N" @if($row['IsDispCart'] == 'N')selected="selected"@endif>미사용</option>
                                                                </select>
                                                            </td>
                                                            <td class="hide">
                                                                <select class="form-control" name="event_display_product_is_disp_direct_pay[]" style="min-width: 70px;">
                                                                    <option value="Y" @if($row['IsDispDirectPay'] == 'Y')selected="selected"@endif>사용</option>
                                                                    <option value="N" @if($row['IsDispDirectPay'] == 'N')selected="selected"@endif>미사용</option>
                                                                </select>
                                                            </td>
                                                            <td>{{$row['CcdName']}}</td>
                                                            <td>
                                                                <input type="text" name="event_display_product_order_num[]" value="{{$row['OrderNum']}}">
                                                            </td>
                                                            <td>
                                                                <a href="#none" class="btn-display-product-delete" data-edp-idx="{{$row['EdpIdx']}}">
                                                                    <i class="fa fa-times fa-lg red"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 프로모션 추가신청정보 --}}
                        <div class="form-group hide" id="limit_{{$options_keys[5]}}">
                            <div class="row">
                                <div class="col-md-1 item form-inline ml-10">
                                    <button type="button" class="btn btn-info btn-apply-add">추가</button>
                                </div>
                                <div class="col-md-9">
                                    <p class="form-control-static">• 신청리스트와 별개 프로세스 (활용 예: 출석체크 이벤트)</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 form-inline">
                                        <table class="table table-striped table-bordered" id="table_add_apply">
                                            <thead>
                                                <tr>
                                                    <th>인원제한</th>
                                                    <th>인원수</th>
                                                    <th>신청정보명</th>
                                                    <th>신청가능 시작일시</th>
                                                    <th>신청가능 종료일시</th>
                                                    <th>접수가능</th>
                                                    {{-- <th>사용</th> --}}
                                                    <th>수정</th>
                                                    <th>삭제</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $add_apply_index = 1; @endphp
                                            @if(empty($list_event_add_apply) === false)
                                                @foreach($list_event_add_apply as $row)
                                                    <tr id="event_add_apply_row_{{$add_apply_index}}">
                                                        <td>
                                                            <input type="hidden" name="event_add_apply_eaa_idx[]" value="{{$row['EaaIdx']}}">
                                                            <input type="hidden" name="add_apply_is_use[]" value="Y">
                                                            <select class="form-control" name="event_add_apply_person_limit_type[]" id="event_add_apply_person_limit_type_{{$add_apply_index}}" style="min-width: 70px;">
                                                                <option value="L" @if($row['PersonLimitType'] == 'L')selected="selected"@endif>제한</option>
                                                                <option value="N" @if($row['PersonLimitType'] == 'N')selected="selected"@endif>무제한</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="event_add_apply_person_limit[]" id="event_add_apply_person_limit_{{$add_apply_index}}" value="{{$row['PersonLimit']}}"  style="width: 50px;">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="event_add_apply_name[]" id="event_add_apply_name_{{$add_apply_index}}" value="{{$row['Name']}}" style="min-width: 170px;">
                                                        </td>
                                                        <td>
                                                            <div class="input-group mb-0">
                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                <input type="text" class="form-control datepicker" name="event_add_apply_start_date[]" id="event_add_apply_start_date_{{$add_apply_index}}" value="{{ $row['ApplyStartDate'] }}" style="min-width: 70px; max-width: 70px;">
                                                            </div>
                                                            <br>
                                                            <select class="form-control" name="event_add_apply_start_hour[]" id="event_add_apply_start_hour_{{$add_apply_index}}">
                                                                @php
                                                                    $start_hour = $row['ApplyStartHour'];
                                                                    for($j=0; $j<=23; $j++) {
                                                                        $str = (strlen($j) <= 1) ? '0' : '';
                                                                        $selected = ($str.$j == $start_hour) ? "selected='selected'" : "";
                                                                        echo "<option value='{$str}{$j}' {$selected}>{$str}{$j}</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                            <select class="form-control" name="event_add_apply_start_min[]" id="event_add_apply_start_min_{{$add_apply_index}}">
                                                                @php
                                                                    $start_min = $row['ApplyStartMin'];
                                                                    for($j=0; $j<=59; $j++) {
                                                                        $str = (strlen($j) <= 1) ? '0' : '';
                                                                        $selected = ($str.$j == $start_min) ? "selected='selected'" : "";
                                                                        echo "<option value='{$str}{$j}' {$selected}>{$str}{$j}</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="input-group mb-0">
                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                <input type="text" class="form-control datepicker" name="event_add_apply_end_date[]" id="event_add_apply_end_date_{{$add_apply_index}}" value="{{ $row['ApplyEndDate'] }}" style="min-width: 70px; max-width: 70px;">
                                                            </div>
                                                            <br>
                                                            <select class="form-control" name="event_add_apply_end_hour[]" id="event_add_apply_end_hour_{{$add_apply_index}}">
                                                                @php
                                                                    $end_hour = $row['ApplyEndHour'];
                                                                    for($j=0; $j<=23; $j++) {
                                                                        $str = (strlen($j) <= 1) ? '0' : '';
                                                                        $selected = ($str.$j == $end_hour) ? "selected='selected'" : "";
                                                                        echo "<option value='{$str}{$j}' {$selected}>{$str}{$j}</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                            <select class="form-control" name="event_add_apply_end_min[]" id="event_add_apply_end_min_{{$add_apply_index}}">
                                                                @php
                                                                    $end_min = $row['ApplyEndMin'];
                                                                    for($j=0; $j<=59; $j++) {
                                                                        $str = (strlen($j) <= 1) ? '0' : '';
                                                                        $selected = ($str.$j == $end_min) ? "selected='selected'" : "";
                                                                        echo "<option value='{$str}{$j}' {$selected}>{$str}{$j}</option>";
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="event_add_apply_register_expire_status[]" id="event_add_apply_register_expire_status_{{$add_apply_index}}" class="form-control" style="min-width: 60px;">
                                                                <option value="Y" @if($row['RegisterExpireStatus'] == 'Y')selected="selected"@endif>가능</option>
                                                                <option value="N" @if($row['RegisterExpireStatus'] == 'N')selected="selected"@endif>만료</option>
                                                            </select>
                                                        </td>
                                                        {{--
                                                        <td>
                                                            <select name="event_add_apply_is_use[]" id="event_add_apply_is_use_{{$add_apply_index}}" class="form-control" style="min-width: 70px;">
                                                                <option value="Y" @if($row['IsUse'] == 'Y')selected="selected"@endif>사용</option>
                                                                <option value="N" @if($row['IsUse'] == 'N')selected="selected"@endif>미사용</option>
                                                            </select>
                                                        </td>
                                                        --}}
                                                        <td>
                                                            <button type="button" class="btn btn-success mr-10 btn-add-apply-expire-submit" data-add-apply-idx="{{$row['EaaIdx']}}" data-modify-number="{{$add_apply_index}}">수정</button>
                                                        </td>
                                                        <td><a href="#none" class="btn-add-apply-delete-submit" data-add-apply-index="{{$add_apply_index}}"><i class="fa fa-times fa-lg red"></i></a></td>
                                                    </tr>
                                                    @php $add_apply_index++; @endphp
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                {{--
                TODO : 필요없는 항목
                --}}
                {{--<div class="form-group">
                    <label class="control-label col-md-1-1">프로모션 링크</label>
                    <div class="form-inline col-md-10">
                        <input type="text" id="promotion_link" name="promotion_link" class="form-control" value="{{$data['Link']}}" title="프로모션 링크">
                        &nbsp;&nbsp;&nbsp;&nbsp;• 관리할 프로모션 링크를 입력해주세요.
                    </div>
                </div>--}}

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="admin_mail_id">조회수</label>
                    <div class="col-md-10 form-inline">
                        실제 <input type="text" id="read_count" name="read_count" class="form-control" title="실제" readonly="readonly" value="{{$data['ReadCnt']}}" style="width: 60px; padding:5px">
                        +
                        생성 <input type="number" id="setting_readCnt" name="setting_readCnt" class="form-control" title="생성" value="{{$data['AdjuReadCnt']}}" style="width: 70px; padding:5px">
                        =
                        노출 <input type="text" id="total_read_count" name="total_read_count" class="form-control" title="노출" readonly="readonly" value="{{$data['TotalReadCnt']}}" style="width: 70px; padding:5px">
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

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            //editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'content';
            $editor_profile.run();

            var $promotion_editor_profile = new cheditor();
            $promotion_editor_profile.config.editorHeight = '170px';
            $promotion_editor_profile.config.editorWidth = '100%';
            $promotion_editor_profile.inputForm = 'promotion_content';
            $promotion_editor_profile.run();

            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="campus_ccd"]').chained('select[name="site_code"]');
            $regi_form.find('select[name="subject_code"]').chained('select[name="site_code"]');
            $regi_form.find('select[name="prof_code"]').chained('select[name="site_code"]');
            $regi_form.find('select[name="set_other_data_1"]').chained('select[name="site_code"]');
            $regi_form.find('select[name="set_other_data_2"]').chained('select[name="site_code"]');
            $regi_form.find('select[name="other_prof_idx[]"]').chained('select[name="site_code"]');
            $regi_form.find('select[name="other_subject_idx[]"]').chained('select[name="site_code"]');

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
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                $('#btn_category_search').setLayer({
                    'url' : '{{ site_url('/common/searchCategory/index/multiple/site_code/') }}' + site_code,
                    'width' : 900
                });
            });

            // 신청유형 선택
            $regi_form.on('ifChanged ifCreated', 'input[name="request_type"]:checked', function(evt) {
                if ($(this).val() == '5') {
                    $('.promotion').show();
                    $('.event').hide();
                } else {
                    $('.promotion').hide();
                    $('.event').show();
                }
            });

            //배너검색
            $('#btn_banner_search').on('click', function(event) {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
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

            // 파일삭제
            $regi_form.on('click', '.file-delete', function() {
                var _url = '{{ site_url("/site/eventLecture/destroyFile") }}' + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'attach_idx' : $(this).data('attach-idx')
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
            if ($('#person_limit_type').val() == 'N') { $regi_form.find('input[name="person_limit"]').prop('readonly', 'readonly'); }
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
                add_lists += '<td>';
                add_lists += '  <input type="hidden" name="event_register_er_idx[]" value="0">';
                add_lists += '  <input type="hidden" name="event_register_person_limit_type[]" value="'+temp_person_limit_type+'">'+temp_person_limit_type_text;
                add_lists += '</td>';
                add_lists += '<td><input type="text" name="event_register_person_limit[]" class="form-control" readonly="readonly" value="'+temp_person_limit+'"></td>';
                add_lists += '<td><input type="text" name="event_register_name[]" class="form-control no-border" readonly="readonly" value="'+temp_lecture_name+'"></td>';
                add_lists += '<td><input type="hidden" name="expire_status[]" value="Y"></td>';
                add_lists += '<td><input type="hidden" name="register_is_use[]" value="Y"></td>';
                add_lists += '<td></td>';
                add_lists += '<td></td>';
                add_lists += '<td><a href="#none" class="btn-lecture-delete" data-lecture-temp-idx="'+temp_idx+'"><i class="fa fa-times fa-lg red"></i></a></td>';
                add_lists += '</tr>';
                $('#table_lecture > tbody:last').append(add_lists);
                temp_idx = temp_idx + 1;

                $('#temp_person_limit').val('');
                $('#temp_lecture_name').val('');
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
                    'el_idx' : $(this).data('lecture-idx'),
                    'er_idx' : $(this).data('register-idx')
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

            // 만료,복구 상태 수정
            $regi_form.on('click', '.btn-lecture-expire-submit', function() {
                var modify_number = $(this).data('modify-number');
                var _url = '{{ site_url("/site/eventLecture/expireRegister") }}';
                var arr_p_prod_code = [];

                $(this).parent().parent().children().find('input[name="prod_code[]"]').each(function(i){
                    arr_p_prod_code.push($(this).val());
                });

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'er_idx' : $(this).data('register-idx'),
                    'person_limit_type' : $("#event_register_person_limit_type_"+modify_number).val(),
                    'person_limit' : $("#event_register_person_limit_"+modify_number).val(),
                    'register_name' : $("#event_register_name_"+modify_number).val(),
                    'expire_status' : $("#expire_status_"+modify_number).val(),
                    'is_use' : $("#register_is_use_"+modify_number).val(),
                    'prod_code[]' : arr_p_prod_code
                };

                if (!confirm('상태를 변경 하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 첨부파일 폼 추가
            $('.btn-add-file').click(function () {
                var add_file_box_text = '';
                var file_id = $('.file-input-box').length;

                add_file_box_text += '<div class="title file-input-box">';
                add_file_box_text += '<input type="file" id="attach_file_promotion'+file_id+'" name="attach_file_promotion[]" class="form-control input-file" title="첨부'+file_id+'"/>&nbsp;<input type="text" id="Ordering'+file_id+'" name="Ordering[]" style="width:20px;"/>';
                add_file_box_text += '<input type="hidden" name="ef_idx[]" value="" />';
                add_file_box_text += '</div>';
                $('.file-box').append(add_file_box_text);

                var $fileBox = $('.filetype');
                $fileBox.each(function() {
                    var $fileUpload = $(this).find('.input-file'),
                        $fileText = $(this).find('.file-text').attr('disabled', 'disabled'),
                        $fileReset = $(this).find('.file-reset');

                    $fileUpload.on('change', function() {
                        var fileName = $(this).val();
                        $fileText.attr('disabled', 'disabled').val(fileName);
                    });

                    $fileReset.click(function() {
                        $(this).parents($fileBox).find($fileText).val('');
                        $(this).parents($fileBox).find($fileUpload).val('');
                    });
                });
            });

            //단일리스트 특강 수정
            $regi_form.on('click', '.btn-register-submit', function() {
                if ($(this).data('register-idx') == '') {
                    alert('수정할 특강 정보가 없습니다.');
                    return;
                }
                if (!confirm('특강정보를 수정 하시겠습니까?')) {
                    return;
                }
                var _url = '{{ site_url("/site/eventLecture/updateRegister") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'er_idx' : $(this).data('register-idx'),
                    'person_limit_type' : $regi_form.find('select[name="person_limit_type"]').val(),
                    'person_limit' : $regi_form.find('input[name="person_limit"]').val(),
                    'register_name' : $regi_form.find('input[name="register_name"]').val()
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/eventLecture") }}/' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                var site_code_val = parseInt($regi_form.find('select[name="site_code"]').val());
                var arr_site_code = {{json_encode($arr_site_code)}};

                if( arr_site_code.indexOf(site_code_val) !== -1 && $regi_form.find('input[name="cate_code[]"]').length > 1 ){
                    alert('운영사이트가 학원인 경우 카테고리는 하나만 선택 가능합니다.');
                    return;
                }

                // 같은 상품종류만 그룹핑 가능 순차 비교
                var set_group_cnt = $regi_form.find("select[name^='event_display_product_group_order']").length;
                if(set_group_cnt > 1){
                    var is_break = false;
                    var s_pointer = 1;

                    $regi_form.find("select[name^='event_display_product_group_order']").each(function() {
                        for(var i=s_pointer;i<set_group_cnt;i++){
                            var group_idx = $("select[name^='event_display_product_group_order']").eq(i).val();
                            var group_ccd = $("select[name^='event_display_product_group_order']").eq(i).data('ccd');

                            if($(this).val() == group_idx){
                                if($(this).data('ccd') != group_ccd){
                                    is_break = true;
                                    break;
                                    return false;
                                }
                            }
                        }
                        s_pointer++;
                    });

                    if(is_break == true) {
                        alert('같은 상품종류로만 그룹 셋팅 가능합니다.');
                        return false;
                    }
                }

                getEditorBodyContent($editor_profile);
                getEditorBodyContent($promotion_editor_profile);
                var _url = '{{ site_url("/site/eventLecture/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/eventLecture/") }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            // 바이트 수
            $('#sms_content').on('change keyup input', function() {
                $('#content_byte').val(fn_chk_byte($(this).val()));
            });

            // 파일 다운로드
            $('.file-download').click(function() {
                var _url = '{{ site_url("/site/eventLecture/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            // 이름 삽입
            $regi_form.on('ifChanged', '#add_name_chk', function(){
                var $sms_content = $regi_form.find('#sms_content');
                var add_name_msg = '\{\{name\}\} 회원님 \n';
                if($(this).is(':checked')){
                    $sms_content.val(add_name_msg + $sms_content.val());
                }else{
                    $sms_content.val($sms_content.val().replace(new RegExp(add_name_msg,'gi'), ''));
                }
            });

            // 신청명 삽입
            $regi_form.on('ifChanged', '#add_register_info_name_chk', function(){
                var $sms_content = $regi_form.find('#sms_content');
                var add_name_msg = '\{\{register_info_name\}\}\n';
                if($(this).is(':checked')){
                    $sms_content.val(add_name_msg + $sms_content.val());
                }else{
                    $sms_content.val($sms_content.val().replace(new RegExp(add_name_msg,'gi'), ''));
                }
            });

            // 프로모션 지급상품 검색 버튼 클릭. 레이어 팝업 호출.
            $('.btn_product_search').on('click', function() {

                var pop_type = $(this).data('poptype');
                var event_product_target_id, event_product_target_field = null;
                switch (pop_type) {
                    case 'register' :
                        event_product_target_id = 'event_register_product_' + $(this).data('eridx');
                        //event_product_target_field = 'event_register_product_prod_code';
                        event_product_target_field = 'prod_code';
                        break;
                    case 'display' :
                        event_product_target_id = 'temp_event_display_product';
                        event_product_target_field = 'event_display_product_prod_code';
                        break;
                    default :
                        alert('오류가 발생하였습니다.');
                        return;
                }

                var site_code = $regi_form.find('#'+pop_type+'_product_site_code').val();    //지급상품 사이트코드
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    $regi_form.find('#'+pop_type+'_product_site_code').focus();  //지급상품 사이트코드
                    return;
                }
                var p_prod_type;
                var arr_online = ['2001', '2003', '2005', '2006', '2007', '2008', '2009'];
                var arr_offline = ['2002', '2004', '2011', '2013'];
                if(arr_online.lastIndexOf(site_code) !== -1) {
                    p_prod_type = 'on';
                } else if(arr_offline.lastIndexOf(site_code) !== -1) {
                    p_prod_type = 'off';
                } else {
                    alert('사이트코드가 잘못 되었습니다.');
                    return;
                }

                $('.btn_product_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code
                        + '&prod_type=' + p_prod_type + '&return_type=inline&target_id=' + event_product_target_id + '&target_field=' + event_product_target_field
                        + '&prod_tabs=' + p_prod_type + '&hide_tabs=off_pack_lecture&is_event=Y',
                    'width' : 1400
                });
                {{--
                $('.btn_product_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code
                        + '&prod_type=off&return_type=inline&target_id=event_register_product_' + ret_er_idx + '&target_field=prod_code'
                        + '&prod_tabs=off,book,reading_room,locker,mock_exam&hide_tabs=off_pack_lecture&is_event=Y',
                    'width' : 1400
                });
                --}}
            });

            // 지급상품 삭제 이벤트
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                var prod_code = that.data('prod-code');
                var remark = $regi_form.find('#prod_' + prod_code).find('[name="remark[]"]').val();
                that.parent().prev().remove(); // <br> 삭제
                that.parent().remove();
            });

            // 지급상품 결과 이벤트
            $regi_form.on('change', '.event_register_product', function() {
                $(this).children('br').remove();
                $(this).children('span').before('<br>');
            });

            // DP 강좌신청 삭제
            $regi_form.on('click', '.btn-display-product-delete', function() {
                var _url = '{{ site_url("/site/eventLecture/delDisplayProduct") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'edp_idx' : $(this).data('edp-idx')
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

            // DP 강좌신청 결과 이벤트
            $regi_form.on('change', '#temp_event_display_product', function() {
                var code, data, html = '';
                var dp_prod_num = 0;
                var $tbody = $('#table_display_product tbody');
                $(this).find('input[name="event_display_product_prod_code[]"]').each(function() {
                    code = $(this).val();
                    data = $(this).data();

                    html += '<tr>';
                    html += '	<td>';
                    html += '	<select name="event_display_product_group_order[]" data-ccd="' + data.learnPatternCcd + '" class="form-control mr-10" style="min-width: 50px;">';
                                for(var i=1;i<10;i++) {
                    html += '       <option value="' + i + '">' + i + '</option>';
                                }
                    html += '	</select>';
                    html += '	</td>';
                    html += '	<td>';
                    html += '		<input type="hidden" name="edp_idx[]" value=""> [' + code + '] ' + Base64.decode(data.prodName);
                    html += '		<input type="hidden" name="event_display_product_prod_code[]" value="' + code + '">';
                    html += '	</td>';
                    html += '	<td class="hide">';
                    html += '		<select class="form-control" name="event_display_product_is_disp_cart[]" style="min-width: 70px;">';
                    html += '			<option value="Y">사용</option>';
                    html += '			<option value="N">미사용</option>';
                    html += '		</select>';
                    html += '	</td>';
                    html += '	<td class="hide">';
                    html += '		<select class="form-control" name="event_display_product_is_disp_direct_pay[]" style="min-width: 70px;">';
                    html += '			<option value="Y">사용</option>';
                    html += '			<option value="N">미사용</option>';
                    html += '		</select>';
                    html += '	</td>';
                    html += '	<td>' + data.learnPatternCcdName + '</td>';
                    html += '	<td>';
                    html += '		<input type="text" name="event_display_product_order_num[]" value="999">';
                    html += '	</td>';
                    html += '	<td>';
                    // html += '		<a href="#none" class="btn-display-product-delete" data-edp-idx="">';
                    // html += '			<i class="fa fa-times fa-lg red"></i>';
                    // html += '		</a>';
                    html += '	</td>';
                    html += '</tr>';

                });

                $(this).html('');    // 임시 데이터 삭제
                $tbody.append(html);
            });

            $('#content_byte').val(fn_chk_byte($('#sms_content').val()));   // 초기 자동문자 Byte수 표시 호출
        });

        function addValidate() {
            var $method = '{{$method}}';
            var limit_type = $(":input:radio[name=limit_type]:checked").val();
            var event_register_length = $regi_form.find('input[name="event_register_person_limit_type[]"]').length;

            if ($method == 'POST' && limit_type == 'M' && event_register_length <= 0) {
                alert('다중리스트 정보를 입력해 주세요.');
                return false;
            }
            return true;
        }

        // 프로모션 추가신청정보 단일수정
        $regi_form.on('click', '.btn-add-apply-expire-submit', function() {
            var modify_number = $(this).data('modify-number');

            var apply_start_datm = $('#event_add_apply_start_date_' + modify_number).val() + ' ' + $('#event_add_apply_start_hour_' + modify_number).val() + ':' + $('#event_add_apply_start_min_' + modify_number).val() + ':00';
            var apply_end_datm = $('#event_add_apply_end_date_' + modify_number).val() + ' ' + $('#event_add_apply_end_hour_' + modify_number).val() + ':' + $('#event_add_apply_end_min_' + modify_number).val() + ':00';

            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'eaa_idx' : $(this).data('add-apply-idx'),
                'person_limit_type' : $('#event_add_apply_person_limit_type_' + modify_number).val(),
                'person_limit' : $('#event_add_apply_person_limit_' + modify_number).val(),
                'name' : $('#event_add_apply_name_' + modify_number).val(),
                'apply_start_datm' : apply_start_datm,
                'apply_end_datm' : apply_end_datm,
                'register_expire_status' : $('#event_add_apply_register_expire_status_' + modify_number).val()
            };

            if (!confirm('상태를 변경 하시겠습니까?')) {
                return;
            }
            sendAjax('{{ site_url("/site/eventLecture/updateAddApply") }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showError, false, 'POST');
        });

        // 프로모션 추가신청정보 추가
        var temp_apply_idx = {{$add_apply_index}};
        $regi_form.on('click', '.btn-apply-add', function() {
            var add_lists = '';
            add_lists += '<tr>';
            add_lists += '	<td>';
            add_lists += '		<input type="hidden" name="event_add_apply_eaa_idx[]" value="new' + temp_apply_idx + '">';
            add_lists += '		<input type="hidden" name="add_apply_is_use[]" value="Y">';
            add_lists += '		<select class="form-control" name="event_add_apply_person_limit_type[]" id="event_add_apply_person_limit_type_' + temp_apply_idx + '" style="min-width: 70px;">';
            add_lists += '			<option value="L">제한</option>';
            add_lists += '			<option value="N" selected="selected">무제한</option>';
            add_lists += '		</select>';
            add_lists += '	</td>';
            add_lists += '	<td>';
            add_lists += '		<input type="text" name="event_add_apply_person_limit[]" id="event_add_apply_person_limit_' + temp_apply_idx + '" value="0" style="width: 50px;">';
            add_lists += '	</td>';
            add_lists += '	<td>';
            add_lists += '		<input type="text" name="event_add_apply_name[]" id="event_add_apply_name_' + temp_apply_idx + '" value="" style="min-width: 170px;">';
            add_lists += '	</td>';
            add_lists += '	<td>';
            add_lists += '		<div class="input-group mb-0">';
            add_lists += '			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
            add_lists += '			<input type="text" class="form-control datepicker" name="event_add_apply_start_date[]" id="event_add_apply_start_date_' + temp_apply_idx + '" value="" style="min-width: 70px; max-width: 70px;">';
            add_lists += '		</div>';
            add_lists += '		<br>';
            add_lists += '		<select class="form-control" name="event_add_apply_start_hour[]" id="event_add_apply_start_hour_' + temp_apply_idx + '">';
            add_lists += '			<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>';
            add_lists += '		</select>';
            add_lists += '		<select class="form-control" name="event_add_apply_start_min[]" id="event_add_apply_start_min_' + temp_apply_idx + '">';
            add_lists += '			<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>';
            add_lists += '		</select>';
            add_lists += '	</td>';
            add_lists += '	<td>';
            add_lists += '		<div class="input-group mb-0">';
            add_lists += '			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
            add_lists += '			<input type="text" class="form-control datepicker" name="event_add_apply_end_date[]" id="event_add_apply_end_date_' + temp_apply_idx + '" value="" style="min-width: 70px; max-width: 70px;">';
            add_lists += '		</div>';
            add_lists += '		<br>';
            add_lists += '		<select class="form-control" name="event_add_apply_end_hour[]" id="event_add_apply_end_hour_' + temp_apply_idx + '">';
            add_lists += '			<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>';
            add_lists += '		</select>';
            add_lists += '		<select class="form-control" name="event_add_apply_end_min[]" id="event_add_apply_end_min_' + temp_apply_idx + '">';
            add_lists += '			<option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>';
            add_lists += '		</select>';
            add_lists += '	</td>';
            add_lists += '	<td>';
            add_lists += '		<select name="event_add_apply_register_expire_status[]" id="event_add_apply_register_expire_status_' + temp_apply_idx + '" class="form-control" style="min-width: 60px;">';
            add_lists += '			<option value="Y">가능</option>';
            add_lists += '			<option value="N">만료</option>';
            add_lists += '		</select>';
            add_lists += '	</td>';
            add_lists += '	<td>';
            // add_lists += '		<button type="button" class="btn btn-success mr-10 btn-add-apply-expire-submit" data-add-apply-idx="" data-modify-number="">수정</button>';
            add_lists += '	</td>';
            add_lists += '	<td>';
            // add_lists += '		<a href="#none" class="btn-add-apply-delete-submit" data-el-idx="" data-add-apply-idx="">';
            // add_lists += '			<i class="fa fa-times fa-lg red"></i>';
            // add_lists += '		</a>';
            add_lists += '	</td>';
            add_lists += '</tr>';

            $('#table_add_apply > tbody').prepend(add_lists);
            temp_apply_idx++;
        });

        // 프로모션 추가신청정보 삭제
        $regi_form.on('click', '.btn-add-apply-delete-submit', function() {
            $('#event_add_apply_row_' + $(this).data('add-apply-index')).remove();
        });

    </script>
    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
@stop