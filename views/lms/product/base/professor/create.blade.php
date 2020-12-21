@extends('lcms.layouts.master')

@section('content')
    <h5>- 강좌 구성을 위한 교수 정보를 관리하는 메뉴입니다. (WBS > PMS 정보 연동)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>교수 정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <input type="hidden" name="wprof_idx" value="{{ $data['wProfIdx'] }}" title="교수 선택" required="required"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                    </div>
                    <div class="col-md-7">
                        @if($method == 'POST')
                        <p class="form-control-static"># 사이트 변경시 설정한 정보들이 초기화 됩니다. (교수정보, 카테고리정보, 과목정보)</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수정보 불러오기 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        @if($method == 'PUT')
                            <p class="form-control-static">{{ $data['wProfName'] }} | {{ $data['wProfIdx'] }} | {{ $data['wProfId'] }} | @if($data['wIsUse'] == 'Y') 사용 @else 미사용 @endif</p>
                        @else
                            <button type="button" id="btn_professor_search" class="btn btn-sm btn-primary">교수검색</button>
                            <span id="selected_professor" class="pl-10">교수명 | 교수코드 | 아이디 | 사용여부</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_nickname">교수닉네임 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <input type="text" id="prof_nickname" name="prof_nickname" class="form-control" title="교수닉네임" required="required" value="{{ $data['ProfNickName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 form-inline">
                        <button type="button" id="btn_subject_mapping_search" class="btn btn-sm btn-primary">카테고리검색</button>
                        <span id="selected_subject_mapping" class="pl-10">
                            @if(empty($data['SubjectMapping']) === false)
                                @foreach($data['SubjectMapping'] as $key => $val)
                                    <span class="pr-10">{{ $val }}
                                        <a href="#none" data-subject-mapping-code="{{ $key }}" class="selected-subject-mapping-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="subject_mapping_code[]" value="{{ $key }}"/>
                                    </span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="ot_url">OT설정
                    </label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="control-label col-md-1">OT
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="ot_url" name="ot_url" class="form-control optional" pattern="url" title="OT영상" value="{{ $data['ot_url'] or '' }}">
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-sm btn-primary btn-movie-view" data-movie-url="{{ $data['ot_url'] or '' }}" data-view-type="OT">보기</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="wsample_url">맛보기설정
                    </label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="control-label col-md-1">WBS맛보기
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="wsample_url" name="wsample_url" class="form-control optional bg-info" pattern="url" title="맛보기영상" value="{{ $data['wsample_url'] or '' }}" placeholder="교수 검색 시 맛보기 정보 자동 출력 (수정가능)">
                            </div>
                            <div class="col-md-2 pl-0">
                                <button type="button" class="btn btn-sm btn-primary btn-movie-view" data-movie-url="{{ $data['wsample_url'] or '' }}" data-view-type="WS">보기</button>
                            </div>
                        </div>
                        {{-- 맛보기 --}}
                        @for($i = 1; $i <= 3; $i++)
                            <div class="row mt-5">
                                <div class="control-label col-md-1">맛보기{{ $i }}
                                </div>
                                <div class="col-md-1-1">
                                    <select name="sample_url{{ $i }}_opt_code" class="form-control mr-5 chk-opt-code">
                                        <option value="">과목선택</option>
                                        @foreach($arr_subject_idx as $key => $val)
                                            <option value="{{ $key }}"{{ $key == element('sample_url' . $i . '_opt_code', $data) ? ' selected="selected"' : '' }}>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-7 pl-0">
                                    <input type="text" id="sample_url{{ $i }}" name="sample_url{{ $i }}" class="form-control optional" pattern="url" title="맛보기{{ $i }}" value="{{ $data['sample_url' . $i] or '' }}">
                                </div>
                                <div class="col-md-2 pl-0">
                                    <button type="button" class="btn btn-sm btn-primary btn-movie-view" data-movie-url="{{ $data['sample_url' . $i] or '' }}" data-view-type="S{{ $i }}">보기</button>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="use_board">게시판운영여부
                    </label>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <input type="checkbox" id="use_board1" name="use_board[]" class="flat" value="{{ $arr_bm_idx['notice'] }}" @if($data['IsNoticeBoard'] == 'Y' || $method=="POST") checked="checked" @endif/> <label for="use_board1" class="input-label">공지사항</label>
                            <input type="checkbox" id="use_board2" name="use_board[]" class="flat" value="{{ $arr_bm_idx['qna'] }}" @if($data['IsQnaBoard'] == 'Y') checked="checked" @endif/> <label for="use_board2" class="input-label">학습Q&A</label>
                            <input type="checkbox" id="use_board3" name="use_board[]" class="flat" value="{{ $arr_bm_idx['data'] }}" @if($data['IsDataBoard'] == 'Y' || $method=="POST") checked="checked" @endif/> <label for="use_board3" class="input-label">학습자료실</label>
                            <input type="checkbox" id="use_board4" name="use_board[]" class="flat" value="{{ $arr_bm_idx['tpass'] }}" @if($data['IsTpassBoard'] == 'Y') checked="checked" @endif/> <label for="use_board4" class="input-label">T-pass자료실</label>
                            <input type="checkbox" id="use_board5" name="use_board[]" class="flat" value="{{ $arr_bm_idx['assignment'] }}" @if($data['IsAssignmentBoard'] == 'Y') checked="checked" @endif/> <label for="use_board5" class="input-label">참삭게시판</label>
                            <input type="checkbox" id="use_board6" name="use_board[]" class="flat" value="{{ $arr_bm_idx['tcc'] }}" @if($data['IsTccBoard'] == 'Y') checked="checked" @endif/> <label for="use_board6" class="input-label">TCC게시판</label>
                            <input type="checkbox" id="use_board7" name="use_board[]" class="flat" value="{{ $arr_bm_idx['anonymous'] }}" @if($data['IsAnonymousBoard'] == 'Y') checked="checked" @endif/> <label for="use_board7" class="input-label">자유게시판</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static"># 체크시 사용자단 교수소개 영역에 노출됩니다. (단, 첨삭게시판 제외)</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsSmsUse">학습Q&A 새글 자동문자
                    </label>
                    <div class="col-md-10 form-inline item">
                        <input type="hidden" name="sms_bm_idx[]" value="66"/>
                        <div class="radio">
                            <span class="pr-10">[문자발송사용여부]</span>
                            <input type="radio" id="is_sms_use_y" name="is_sms_use[]" class="flat" value="Y" required="required" title="문자발송사용여부" @if(empty($data['BoardInfo']['qna']['IsSmsUse']) === false && $data['BoardInfo']['qna']['IsSmsUse'] == 'Y')checked="checked"@endif/> <label for="is_sms_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_sms_use_n" name="is_sms_use[]" class="flat" value="N" @if($method == 'POST' || (empty($data['BoardInfo']['qna']['IsSmsUse']) === false && $data['BoardInfo']['qna']['IsSmsUse'] == 'N'))checked="checked"@endif/> <label for="is_sms_use_n" class="input-label">미사용</label>
                        </div>
                        <p>
                            <textarea id="sms_content" name="sms_content[]" class="form-control" rows="5" cols="100" title="문자 발송" placeholder="">@if(empty($data['BoardInfo']['qna']['SmsContent']) === false){{ $data['BoardInfo']['qna']['SmsContent'] }}@endif</textarea>
                        </p>
                        <div class="text">
                            <div>
                                <span class="pr-5">[발신번호]</span>
                                {!! html_callback_num_select($arr_send_callback_ccd, (empty($data['BoardInfo']['qna']['SmsSendTel']) === false ? $data['BoardInfo']['qna']['SmsSendTel'] : ''), 'sms_send_tel', 'sms_send_tel[]', '', '발신번호', '') !!}
                                <input class="form-control border-red red" id="content_byte" style="width: 50px;" type="text" readonly="readonly" value="0"><span class="red">byte</span>   (55byte 이상일 경우 MMS로 전환됩니다.)
                            </div>
                            <div class="mt-5">
                                <span class="pr-5">[수신번호]</span>
                                <input type="text" id="sms_receive_tel" name="sms_receive_tel[]" class="form-control" title="문자수신번호" value="@if(empty($data['BoardInfo']['qna']['SmsReceiveTel']) === false){{ $data['BoardInfo']['qna']['SmsReceiveTel'] }}@endif">
                            </div>
                            <div class="mt-5">
                                <span class="pr-5">[문자 수신허용 시간]</span>
                                <select class="form-control" id="sms_limit_start_hour" name="sms_limit_start_hour[]">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == (empty($data['BoardInfo']['qna']['SmsLimitStartHour']) === false ? $data['BoardInfo']['qna']['SmsLimitStartHour'] : '')) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                                <span>:</span>
                                <select class="form-control" id="sms_limit_start_min" name="sms_limit_start_min[]">
                                    @php
                                        for($i=0; $i<=59; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == (empty($data['BoardInfo']['qna']['SmsLimitStartMin']) === false ? $data['BoardInfo']['qna']['SmsLimitStartMin'] : '')) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                                <span class="pl-5 pr-5">~</span>
                                <select class="form-control ml-5" id="sms_limit_end_hour" name="sms_limit_end_hour[]">
                                    @php
                                        for($i=0; $i<=23; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == (empty($data['BoardInfo']['qna']['SmsLimitEndHour']) === false ? $data['BoardInfo']['qna']['SmsLimitEndHour'] : '')) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                                <span>:</span>
                                <select class="form-control" id="sms_limit_end_min" name="sms_limit_end_min[]">
                                    @php
                                        for($i=0; $i<=59; $i++) {
                                            $str = (strlen($i) <= 1) ? '0' : '';
                                            $selected = ($i == (empty($data['BoardInfo']['qna']['SmsLimitEndMin']) === false ? $data['BoardInfo']['qna']['SmsLimitEndMin'] : '')) ? "selected='selected'" : "";
                                            echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_board_public">학습Q&A 공개/비공개 사용여부
                    </label>
                    <div class="col-md-10">
                        <div class="checkbox">
                            <input type="checkbox" id="is_board_public" name="is_board_public" class="flat" value="Y" @if($data['IsBoardPublic'] == 'Y' || $method=="POST") checked="checked" @endif/> <label for="is_board_public" class="input-label">공개</label>
                            <span class="pl-30"># 미체크시 사용자단 학습Q&A에서 공개로 자동 설정됩니다.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">단강좌 노출형태 <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="radio">
                            @foreach($arr_onlec_view_ccd as $key => $val)
                                <input type="radio" id="onlec_view_ccd_{{$key}}" name="onlec_view_ccd" value="{{$key}}" class="flat" @if($data['OnLecViewCcd'] == $key || ($method == 'POST' && $loop->index === 1))checked="checked"@endif> <label for="onlec_view_ccd_{{$key}}" class="input-label">{{$val}}</label>
                            @endforeach
                            <span class="pl-20"># 사용자단 교수소개 영역내 단강좌 노출형태를 설정합니다.</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">수강후기 노출여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="radio">
                            <input type="radio" id="is_open_studycomment_y" name="is_open_studycomment" class="flat" value="Y" required="required" title="수강후기노출여부" @if($method == 'POST' || $data['IsOpenStudyComment'] === 'Y') checked="checked" @endif/> <label for="is_open_studycomment_y" class="input-label">노출</label>
                            <input type="radio" id="is_open_studycomment_n" name="is_open_studycomment" class="flat" value="N" @if($data['IsOpenStudyComment'] === 'N') checked="checked" @endif/> <label for="is_open_studycomment_n" class="input-label">숨김</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">출력호칭 선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="radio">
                            @foreach($arr_appellation_ccd as $key => $val)
                                <input type="radio" id="appellation_ccd_{{$key}}" name="appellation_ccd" value="{{$key}}" class="flat" @if($data['AppellationCcd'] == $key || ($method == 'POST' && $loop->index === 1)) checked="checked" @endif> <label for="appellation_ccd_{{$key}}" class="input-label">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수진소개 사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="radio">
                            <input type="radio" id="is_disp_intro_y" name="is_disp_intro" class="flat" value="Y" required="required" title="교수진소개 사용여부" @if($method == 'POST' || $data['IsDispIntro'] === 'Y') checked="checked" @endif/> <label for="is_disp_intro_y" class="input-label">사용</label>
                            <input type="radio" id="is_disp_intro_n" name="is_disp_intro" class="flat" value="N" @if($data['IsDispIntro'] === 'N') checked="checked" @endif/> <label for="is_disp_intro_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                @if(empty($arr_intro_def_tab_ccd) === false)
                    <div class="form-group">
                        <label class="control-label col-md-2">교수진소개 디폴트탭 선택 (임용)
                        </label>
                        <div class="col-md-10">
                            <div class="radio">
                                @foreach($arr_intro_def_tab_ccd as $key => $val)
                                    <input type="radio" id="intro_def_tab_ccd_{{$key}}" name="intro_def_tab_ccd" value="{{$key}}" class="flat" @if($data['IntroDefTabCcd'] == $key) checked="checked" @endif @if($method == 'POST') disabled="disabled" @endif /> <label for="intro_def_tab_ccd_{{$key}}" class="input-label">{{$val}}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">교수진소개 노출탭 선택 (임용)
                        </label>
                        <div class="col-md-10">
                            <div class="checkbox">
                                @foreach($arr_intro_def_tab_ccd as $key => $val)
                                    <input type="checkbox" id="intro_disp_tab_ccd_{{$key}}" name="intro_disp_tab_ccd[]" value="{{$key}}" class="flat" @if(strpos($data['IntroDispTabCcds'], strval($key)) !== false) checked="checked" @endif @if($method == 'POST') disabled="disabled" @endif /> <label for="intro_disp_tab_ccd_{{$key}}" class="input-label">{{$val}}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="control-label col-md-2">교수 커뮤니티
                    </label>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="control-label col-md-1-1">[홈페이지 URL]</div>
                            <div class="col-md-6 item">
                                <input type="text" id="homep_url" name="homep_url" class="form-control" pattern="url" title="홈페이지 URL" value="{{ $data['homep_url'] or '' }}">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-1-1">[카페 URL]</div>
                            <div class="col-md-6 item">
                                <input type="text" id="cafe_url" name="cafe_url" class="form-control" pattern="url" title="카페 URL" value="{{ $data['cafe_url'] or '' }}">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-1-1">[블로그 URL]</div>
                            <div class="col-md-6 item">
                                <input type="text" id="blog_url" name="blog_url" class="form-control" pattern="url" title="블로그 URL" value="{{ $data['blog_url'] or '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 강사료 정산 계약정보 --}}
                @foreach($arr_calc_target as $on_off_type => $rows)
                    <div class="form-group">
                        <label class="control-label col-md-2">@if($on_off_type == 'on')온라인@elseif($on_off_type == 'off')학원@else모의고사@endif 상품강사료<br/>표준 계약정보 <span class="required">*</span>
                        </label>
                        <div class="col-md-9 item">
                            <div class="x_panel mb-0">
                                <div class="x_content pb-0">
                                    <div class="row">
                                        @if($on_off_type == 'on')
                                            <div class="col-md-12"><p class="form-control-static"><strong># 계약기간 시작일 시작 시간은 00:00:00 | 종료일 마감 시간은 23:59:59</strong></p></div>
                                        @endif

                                        @foreach($rows as $key => $val)
                                            <div class="col-md-6"><p class="form-control-static"><strong>[ {{ $val }} ]</strong></p></div>
                                            <div class="col-md-6 text-right"><button type="button" class="btn btn-sm btn-success btn-calc-add" data-learn-pattern-ccd="{{ $key }}">필드 추가</button></div>
                                            <div class="col-md-12">
                                                <table id="list_calc_table_{{ $key }}" class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td>정산율</td>
                                                        <td>기여도</td>
                                                        <td>계약기간</td>
                                                        <td>비고</td>
                                                        <td>삭제</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="form-group form-group-sm form-inline">
                                                    @php $_prefix_first_key = $on_off_type . '.' . $key . '.0'; @endphp
                                                    <tr>
                                                        <td class="no-border-bottom"><input type="number" name="calc_rate[]" class="form-control" title="정산율" value="@if($method==="POST"){{ $on_off_type == 'on' ? '30' : '50' }}@else{{ array_get($data['CalcRate'], $_prefix_first_key . '.CalcRate') }}@endif" style="width: 80px"/> %</td>
                                                        <td><input type="number" name="contrib_rate[]" class="form-control" title="기여도" value="@if($method==="POST"){{0}}@else{{ array_get($data['CalcRate'], $_prefix_first_key . '.ContribRate') }}@endif" style="width: 80px"/> %</td>
                                                        <td><input type="text" name="apply_start_date[]" class="form-control datepicker" title="계약기간 시작일" value="{{ array_get($data['CalcRate'], $_prefix_first_key . '.ApplyStartDate', '2000-01-01') }}" style="width: 100px">
                                                            ~ <input type="text"name="apply_end_date[]" class="form-control datepicker" title="계약기간 종료일" value="{{ array_get($data['CalcRate'], $_prefix_first_key . '.ApplyEndDate', '2030-12-31') }}" style="width: 100px">
                                                        </td>
                                                        <td><input type="text" name="calc_memo[]" class="form-control" title="비고" value="{{ array_get($data['CalcRate'], $_prefix_first_key . '.CalcMemo') }}"/></td>
                                                        <td><a href="#none" class="btn-calc-delete"><i class="fa fa-times fa-lg red"></i></a>
                                                            <input type="hidden" name="learn_pattern_ccd[]" value="{{ $key }}"/>
                                                            <input type="hidden" name="prof_calc_idx[]" value="{{ array_get($data['CalcRate'], $_prefix_first_key . '.ProfCalcIdx') }}"/>
                                                        </td>
                                                    </tr>
                                                    @foreach(array_get($data['CalcRate'], $on_off_type . '.' . $key, []) as $idx => $row)
                                                        @if($idx > 0)
                                                            <tr>
                                                                <td class="no-border-bottom"><input type="number" name="calc_rate[]" class="form-control" title="정산율" value="{{ $row['CalcRate'] }}" style="width: 80px"/> %</td>
                                                                <td><input type="number" name="contrib_rate[]" class="form-control" title="기여도" value="{{ $row['ContribRate'] }}" style="width: 80px"/> %</td>
                                                                <td><input type="text" name="apply_start_date[]" class="form-control datepicker" title="계약기간 시작일" value="{{ $row['ApplyStartDate'] }}" style="width: 100px">
                                                                    ~ <input type="text"name="apply_end_date[]" class="form-control datepicker" title="계약기간 종료일" value="{{ $row['ApplyEndDate'] }}" style="width: 100px">
                                                                </td>
                                                                <td><input type="text" name="calc_memo[]" class="form-control" title="비고" value="{{ $row['CalcMemo'] }}"/></td>
                                                                <td><a href="#none" class="btn-calc-delete"><i class="fa fa-times fa-lg red"></i></a>
                                                                    <input type="hidden" name="learn_pattern_ccd[]" value="{{ $key }}"/>
                                                                    <input type="hidden" name="prof_calc_idx[]" value="{{ $row['ProfCalcIdx'] }}"/>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="form-group">
                    <label class="control-label col-md-2">슬로건
                    </label>
                    <div class="col-md-9 item">
                        <textarea id="prof_slogan" name="prof_slogan" class="form-control" rows="3" title="슬로건" placeholder="">{{ $data['ProfSlogan'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_curriculum">커리큘럼
                    </label>
                    <div class="col-md-9 item">
                        <textarea id="prof_curriculum" name="prof_curriculum" class="form-control" rows="7" title="커리큘럼" placeholder="">{{ $data['ProfCurriculum'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="">커리큘럼 첨부
                    </label>
                    <div class="col-md-9">
                        @for($i = 1; $i <= 5; $i++)
                            <div class="row mb-5">
                                <div class="col-md-5">
                                    <input type="file" id="curri{{ $i }}_file" name="curri{{ $i }}_file" class="form-control" title="커리큘럼 첨부파일{{ $i }}"/>
                                </div>
                                <div class="col-md-7 pl-0">
                                    @if(empty($data['curri'. $i . '_file']) === false)
                                        <p class="form-control-static"><a href="{{ $data['curri'. $i . '_file'] }}" rel="popup-image">{{ str_last_pos_after($data['curri'. $i . '_file'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="{{ 'curri'. $i . '_file' }}"><i class="fa fa-times red"></i></a></p>
                                    @endif
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_content">내용
                    </label>
                    <div class="col-md-9 item">
                        <textarea id="prof_content" name="prof_content" class="form-control" rows="7" title="내용" placeholder="">{{ $data['ProfContent'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수프로필
                    </label>
                    <div class="col-md-9">
                        <div id="wprof_profile" class="form-control-static">{!! $data['wProfProfile'] !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">주요저서
                    </label>
                    <div class="col-md-9">
                        <div id="wbook_content" class="form-control-static">{!! $data['wBookContent'] !!}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="yt_url1">대표영상 (유튜브)
                    </label>
                    <div class="col-md-9">
                        {{-- 유튜브 URL --}}
                        @for($i = 1; $i <= 3; $i++)
                            <div class="row mb-5">
                                <div class="col-md-1-1">
                                    <select name="yt_url{{ $i }}_opt_code" class="form-control chk-opt-code">
                                        <option value="">과목선택</option>
                                        @foreach($arr_subject_idx as $key => $val)
                                            <option value="{{ $key }}"{{ $key == element('yt_url' . $i . '_opt_code', $data) ? ' selected="selected"' : '' }}>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 pl-0">
                                    <input type="text" id="yt_url{{ $i }}" name="yt_url{{ $i }}" class="form-control optional" pattern="url" title="대표영상{{ $i }}" value="{{ $data['yt_url' . $i] or '' }}">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_index_img">교수영역 이미지<br/>(jpg, png)
                    </label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="control-label col-md-2">교수 인덱스 (227X227)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="prof_index_img" name="prof_index_img" class="form-control" title="교수 인덱스 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                @if(empty($data['prof_index_img']) === false)
                                <p class="form-control-static"><a href="{{ $data['prof_index_img'] }}" rel="popup-image">{{ str_last_pos_after($data['prof_index_img'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="prof_index_img"><i class="fa fa-times red"></i></a></p>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">교수 상세 (348X461)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="prof_detail_img" name="prof_detail_img" class="form-control" title="교수 상세 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                @if(empty($data['prof_detail_img']) === false)
                                    <p class="form-control-static"><a href="{{ $data['prof_detail_img'] }}" rel="popup-image">{{ str_last_pos_after($data['prof_detail_img'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="prof_detail_img"><i class="fa fa-times red"></i></a></p>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">강좌 리스트 (104X104)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="lec_list_img" name="lec_list_img" class="form-control" title="강좌 리스트 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                @if(empty($data['lec_list_img']) === false)
                                    <p class="form-control-static"><a href="{{ $data['lec_list_img'] }}" rel="popup-image">{{ str_last_pos_after($data['lec_list_img'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="lec_list_img"><i class="fa fa-times red"></i></a></p>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">강좌 상세 (280X290)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="lec_detail_img" name="lec_detail_img" class="form-control" title="강좌 상세 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                @if(empty($data['lec_detail_img']) === false)
                                    <p class="form-control-static"><a href="{{ $data['lec_detail_img'] }}" rel="popup-image">{{ str_last_pos_after($data['lec_detail_img'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="lec_detail_img"><i class="fa fa-times red"></i></a></p>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">온에어 (175X208)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="lec_review_img" name="lec_review_img" class="form-control" title="온에어 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                @if(empty($data['lec_review_img']) === false)
                                    <p class="form-control-static"><a href="{{ $data['lec_review_img'] }}" rel="popup-image">{{ str_last_pos_after($data['lec_review_img'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="lec_review_img"><i class="fa fa-times red"></i></a></p>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="control-label col-md-2">내강의실 상세 (145X152)
                            </div>
                            <div class="col-md-5">
                                <input type="file" id="class_detail_img" name="class_detail_img" class="form-control" title="내강의실 상세 이미지"/>
                            </div>
                            <div class="col-md-5 pl-0">
                                @if(empty($data['class_detail_img']) === false)
                                    <p class="form-control-static"><a href="{{ $data['class_detail_img'] }}" rel="popup-image">{{ str_last_pos_after($data['class_detail_img'], '/') }}</a> <a href="#none" class="img-delete" data-img-type="class_detail_img"><i class="fa fa-times red"></i></a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수영역 이벤트 배너<br/>(jpg, png)
                    </label>
                    <div class="col-md-9">
                        <p class="form-control-static bold"># 배너 2개 이상 등록 시 자동 롤링됨</p>
                        @for($i = 1; $i <= 3; $i++)
                            <div class="row">
                                <div class="control-label col-md-2">배너 이미지{{$i}}
                                </div>
                                <div class="col-md-5">
                                    <input type="file" id="bnr_img_01_{{$i}}" name="bnr_img_01_{{$i}}" class="form-control" title="이벤트 배너 이미지{{$i}}"/>
                                </div>
                                <div class="col-md-5 pl-0">
                                    @if(empty($data['Bnr']['01'][$i]['BnrImgName']) === false)
                                        <p class="form-control-static"><a href="{{ $data['Bnr']['01'][$i]['BnrImgPath'] . $data['Bnr']['01'][$i]['BnrImgName'] }}" rel="popup-image">{{ $data['Bnr']['01'][$i]['BnrImgName'] }}</a> <a href="#none" class="img-delete" data-img-type="bnr_img_01_{{$i}}"><i class="fa fa-times red"></i></a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-label col-md-2">링크 주소{{$i}}
                                </div>
                                <div class="col-md-10 mt-5">
                                    <select class="form-control col-md-1 mr-5 mb-10" id="link_type_01_{{$i}}" name="link_type_01_{{$i}}" title="이벤트 배너 링크방식{{$i}}">
                                        <option value="self" @if(array_get($data['Bnr'], '01.' . $i . '.LinkType') == 'self') selected="selected" @endif>본창</option>
                                        <option value="blank" @if(array_get($data['Bnr'], '01.' . $i . '.LinkType') == 'blank') selected="selected" @endif>새창</option>
                                        <option value="script" @if(array_get($data['Bnr'], '01.' . $i . '.LinkType') == 'script') selected="selected" @endif>스크립트</option>
                                    </select>
                                    <input type="text" id="link_url_01_{{$i}}" name="link_url_01_{{$i}}" value="{{ $data['Bnr']['01'][$i]['LinkUrl'] or '' }}" class="form-control col-md-5" title="이벤트 배너 링크 주소{{$i}}">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수영역 이벤트 배너2<br/>(jpg, png)
                    </label>
                    <div class="col-md-9">
                        <p class="form-control-static bold"># 배너 2개 이상 등록 시 자동 롤링됨</p>
                        @for($i = 1; $i <= 3; $i++)
                            <div class="row">
                                <div class="control-label col-md-2">배너 이미지{{$i}}
                                </div>
                                <div class="col-md-5">
                                    <input type="file" id="bnr_img_04_{{$i}}" name="bnr_img_04_{{$i}}" class="form-control" title="이벤트 배너 이미지2 - {{$i}}"/>
                                </div>
                                <div class="col-md-5 pl-0">
                                    @if(empty($data['Bnr']['04'][$i]['BnrImgName']) === false)
                                        <p class="form-control-static"><a href="{{ $data['Bnr']['04'][$i]['BnrImgPath'] . $data['Bnr']['04'][$i]['BnrImgName'] }}" rel="popup-image">{{ $data['Bnr']['04'][$i]['BnrImgName'] }}</a> <a href="#none" class="img-delete" data-img-type="bnr_img_04_{{$i}}"><i class="fa fa-times red"></i></a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-label col-md-2">링크 주소{{$i}}
                                </div>
                                <div class="col-md-10 mt-5">
                                    <select class="form-control col-md-1 mr-5 mb-10" id="link_type_04_{{$i}}" name="link_type_04_{{$i}}" title="이벤트 배너 링크방식2 - {{$i}}">
                                        <option value="self" @if(array_get($data['Bnr'], '04.' . $i . '.LinkType') == 'self') selected="selected" @endif>본창</option>
                                        <option value="blank" @if(array_get($data['Bnr'], '04.' . $i . '.LinkType') == 'blank') selected="selected" @endif>새창</option>
                                        <option value="script" @if(array_get($data['Bnr'], '04.' . $i . '.LinkType') == 'script') selected="selected" @endif>스크립트</option>
                                    </select>
                                    <input type="text" id="link_url_04_{{$i}}" name="link_url_04_{{$i}}" value="{{ $data['Bnr']['04'][$i]['LinkUrl'] or '' }}" class="form-control col-md-5" title="이벤트 배너 링크 주소2 - {{$i}}">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수홈 띠 배너<br/>(940X91, jpg, png)
                    </label>
                    <div class="col-md-9">
                        <p class="form-control-static bold"># 배너 2개 이상 등록 시 자동 롤링됨</p>
                        @for($i = 1; $i <= 3; $i++)
                            <div class="row">
                                <div class="control-label col-md-2">배너 이미지{{$i}}
                                </div>
                                <div class="col-md-5">
                                    <input type="file" id="bnr_img_02_{{$i}}" name="bnr_img_02_{{$i}}" class="form-control" title="띠 배너 이미지{{$i}}"/>
                                </div>
                                <div class="col-md-5 pl-0">
                                    @if(empty($data['Bnr']['02'][$i]['BnrImgName']) === false)
                                        <p class="form-control-static"><a href="{{ $data['Bnr']['02'][$i]['BnrImgPath'] . $data['Bnr']['02'][$i]['BnrImgName'] }}" rel="popup-image">{{ $data['Bnr']['02'][$i]['BnrImgName'] }}</a> <a href="#none" class="img-delete" data-img-type="bnr_img_02_{{$i}}"><i class="fa fa-times red"></i></a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-label col-md-2">링크 주소{{$i}}
                                </div>
                                <div class="col-md-10 mt-5">
                                    <select class="form-control col-md-1 mr-5 mb-10" id="link_type_02_{{$i}}" name="link_type_02_{{$i}}" title="띠 배너 링크방식{{$i}}">
                                        <option value="self" @if(array_get($data['Bnr'], '02.' . $i . '.LinkType') == 'self') selected="selected" @endif>본창</option>
                                        <option value="blank" @if(array_get($data['Bnr'], '02.' . $i . '.LinkType') == 'blank') selected="selected" @endif>새창</option>
                                        <option value="script" @if(array_get($data['Bnr'], '02.' . $i . '.LinkType') == 'script') selected="selected" @endif>스크립트</option>
                                    </select>
                                    <input type="text" id="link_url_02_{{$i}}" name="link_url_02_{{$i}}" value="{{ $data['Bnr']['02'][$i]['LinkUrl'] or '' }}" class="form-control col-md-5" title="띠 배너 링크 주소{{$i}}">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">교수홈 홍보 배너<br/>(940X467, jpg, png)
                    </label>
                    <div class="col-md-9">
                        <p class="form-control-static bold"># 배너 2개 이상 등록 시 자동 롤링됨</p>
                        @for($i = 1; $i <= 3; $i++)
                            <div class="row mb-5">
                                <div class="control-label col-md-2">배너 이미지{{$i}}
                                </div>
                                <div class="col-md-5">
                                    <input type="file" id="bnr_img_03_{{$i}}" name="bnr_img_03_{{$i}}" class="form-control" title="홍보 배너 이미지{{$i}}"/>
                                </div>
                                <div class="col-md-5 pl-0">
                                    @if(empty($data['Bnr']['03'][$i]['BnrImgName']) === false)
                                        <p class="form-control-static"><a href="{{ $data['Bnr']['03'][$i]['BnrImgPath'] . $data['Bnr']['03'][$i]['BnrImgName'] }}" rel="popup-image">{{ $data['Bnr']['03'][$i]['BnrImgName'] }}</a> <a href="#none" class="img-delete" data-img-type="bnr_img_03_{{$i}}"><i class="fa fa-times red"></i></a></p>
                                    @endif
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // editor load
            var $editor_curriculum = new cheditor();
            $editor_curriculum.config.editorHeight = '170px';
            $editor_curriculum.config.editorWidth = '100%';
            $editor_curriculum.inputForm = 'prof_curriculum';
            $editor_curriculum.run();

            var $editor_content = new cheditor();
            $editor_content.config.editorHeight = '170px';
            $editor_content.config.editorWidth = '100%';
            $editor_content.inputForm = 'prof_content';
            $editor_content.run();

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/base/professor/store') }}';

                // editor
                getEditorBodyContent($editor_curriculum);
                getEditorBodyContent($editor_content);

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/base/professor/index') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if($regi_form.find('input[name="subject_mapping_code[]"]').length < 1) {
                    alert('카테고리 선택 필드는 필수입니다.');
                    return false;
                }
                {{--if (getEditorTextLength($editor_curriculum) < 1) {
                    alert('커리큘럼 필드는 필수입니다.');
                    return false;
                }--}}
                return true;
            }

            // 운영사이트 변경
            $regi_form.on('change', 'select[name="site_code"]', function() {
                // 교수검색 초기화
                $regi_form.find('input[name="wprof_idx"]').val('');
                $regi_form.find('input[name="wsample_url"]').val('');
                $('#wprof_profile').html('');
                $('#wbook_content').html('');
                $('#selected_professor').html('');

                // 카테고리 검색 초기화
                $regi_form.find('input[name="subject_mapping_code[]"]').remove();
                $regi_form.find('input[name="del_prof_calc_idx[]"]').remove();
                $('#selected_subject_mapping').html('');

                // 교수진소개 디폴트탭/노출탭 선택 초기화
                if ($(this).val().length > 0 && '{{ implode(',', $arr_intro_def_tab_use_site) }}'.indexOf($(this).val()) > -1) {
                    $regi_form.find('input[name="intro_def_tab_ccd"]').iCheck('enable');
                    $regi_form.find('input[name="intro_disp_tab_ccd[]"]').iCheck('enable');
                } else {
                    $regi_form.find('input[name="intro_def_tab_ccd"]').iCheck('disable');
                    $regi_form.find('input[name="intro_disp_tab_ccd[]"]').iCheck('disable');
                }
            });

            // 교수 검색 or 카테고리 + 과목 맵핑 검색
            $('#btn_professor_search, #btn_subject_mapping_search').on('click', function(event) {
                var btn_id = event.target.getAttribute('id');
                var site_code = $regi_form.find('select[name="site_code"]').val();
                var search_url = (btn_id === 'btn_professor_search') ? '{{ site_url('/common/searchWProfessor/index/professor/') }}' : '{{ site_url('/common/searchSubjectMapping/index/') }}';

                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return;
                }

                $('#' + btn_id).setLayer({
                    'url' : search_url + site_code,
                    'width' : 900
                });
            });

            // 카테고리 + 과목 맵핑 선택 이벤트
            $regi_form.on('change', '#selected_subject_mapping', function() {
                var that = $(this);
                var code, name;
                var input = $regi_form.find('.chk-opt-code');   // 설정 대상 과목 선택 select box
                var $set_subject_data = {};  // 설정 대상 과목 데이터
                var $selected_subject_idx = {}; // 이전 선택된 과목식별자

                // 카테고리정보에서 과목 데이터 추출
                that.find('span').each(function(idx) {
                    code = $(this).find('input[name="subject_mapping_code[]"]').val().split('_').slice(-1).pop();
                    name = $(this).text().split(' > ').slice(-1).pop().trim();

                    $set_subject_data[code] = name;
                });

                // 옵션코드에서 기선택된 과목식별자 추출
                input.each(function() {
                    $selected_subject_idx[$(this).prop('name')] = $(this).find('option:selected').val();
                });

                // 디폴트값 제외하고 select option 삭제
                input.find('option').not('[value=""]').remove();

                // select option 추가
                $.each($set_subject_data, function(k, v) {
                    input.append($('<option>', { 'value' : k, 'text' : v }));
                });

                // 기선택된 과목식별자 재설정
                $.each($selected_subject_idx, function(k, v) {
                    if ($set_subject_data.hasOwnProperty(v) === true) {
                        $regi_form.find('select[name="' + k + '"]').val(v);
                    } else {
                        $regi_form.find('select[name="' + k + '"]').val('');
                    }
                });
            });

            // 카테고리 + 과목 맵핑 삭제
            $regi_form.on('click', '.selected-subject-mapping-delete', function() {
                var that = $(this);
                that.parent().remove();

                $regi_form.find('#selected_subject_mapping').trigger('change');
            });

            $regi_form.on('click', 'button[name="btn_test"]', function() {
                $('#selected_subject_mapping').trigger('change');
            });

            // 샘플동영상 보기 버튼 클릭
            $regi_form.on('click', '.btn-movie-view', function() {
                if ($(this).data('movie-url') === '') {
                    alert('해당 영상 경로를 저장 후 보기가 가능합니다.');
                    return;
                }

                fnPlayerProf($regi_form.find('input[name="idx"]').val(), $(this).data('view-type'));
            });

            // 교수영역 이미지 삭제
            $('.img-delete').click(function() {
                if (!confirm('정말로 삭제하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'idx' : $regi_form.find('input[name="idx"]').val(),
                    'img_type' : $(this).data('img-type')
                };
                sendAjax('{{ site_url('/product/base/professor/destroyImg') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
            });

            // 정산 테이블 필드 추가
            $regi_form.on('click', '.btn-calc-add', function() {
                var key = $(this).data('learn-pattern-ccd');
                var $table = $('#list_calc_table_' + key);

                // 첫번째 tr 복사하여 추가
                $table.find('tbody tr:eq(0)').clone().appendTo($table).find('input[type="text"], [type="number"], [name="prof_calc_idx[]"]').val("");
            });

            // 정산 테이블 필드 삭제
            $regi_form.on('click', '.btn-calc-delete', function() {
                var that = $(this);

                if (that.parents('tbody').children('tr').length > 1) {
                    // 삭제된 정산 식별자 추가
                    var del_prof_cal_idx = $(this).parent().parent('tr').find('input[name="prof_calc_idx[]"]').val();
                    $regi_form.append('<input type="hidden" name="del_prof_calc_idx[]" value="' + del_prof_cal_idx + '"/>');

                    // 행 삭제
                    $(this).parent().parent('tr').remove();
                } else {
                    alert('최소 1개의 행이 필요합니다. 삭제하실 수 없습니다.');
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/product/base/professor/index') }}' + getQueryString());
            });

            // 문자 바이트 수 계산
            $('#sms_content').on('change keyup', function() {
                $('#content_byte').val(fn_chk_byte($(this).val()));
            });
        });
    </script>
@stop
