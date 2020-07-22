<div class="x_content">
    <div class="form-group">
        <label class="control-label col-md-1-1">설문정보 </label>
        <div class="col-md-8 form-inline">
            <select id="survey_info" class="form-control">
                <option selected="selected">-선택하세요-</option>
                @foreach($survey_list as $key => $val)
                    <option value="{{$val['SpIdx']}}" @if(empty($data_survey['SpIdx']) === false && $data_survey['SpIdx'] == $val['SpIdx'])selected="selected" disabled="disabled"@endif>{{$val['SpTitle']}}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-sm btn-primary view_survey_info">불러오기</button>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-1-1" for="sp_title">제목 <span class="required">*</span></label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="sp_title" name="sp_title" maxlength="100" title="제목" required="required" value="{{ $data_survey['SpTitle'] or ''}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-1-1">설명</label>
        <div class="col-md-8">
            <textarea class="form-control" id="sp_comment" name="sp_comment" cols="50" rows="3" title="설명">{{ $data_survey['SpComment'] or ''}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-1-1" for="sp_take_type">조사범위 <span class="required">*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <input type="radio" class="flat" id="sp_take_y" name="sp_take_type" required="required" value="1" @if($method == 'POST' || (empty($data_survey['SpTakeType']) === false && $data_survey['SpTakeType']=='1'))checked="checked"@endif>
                <label for="sp_take_y" class="input-label">회원</label>
                <input type="radio" class="flat" id="sp_take_n" name="sp_take_type" required="required" value="2" @if(empty($data_survey['SpTakeType']) === false && $data_survey['SpTakeType']=='2')checked="checked"@endif>
                <label for="sp_take_n" class="input-label">회원 + 비회원</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-1-1" for="sp_is_duplicate">중복투표 <span class="required">*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <input type="radio" class="flat" id="sp_is_duplicate_n" name="sp_is_duplicate" required="required" value="N" @if($method == 'POST' || (empty($data_survey['SpIsDuplicate']) === false && $data_survey['SpIsDuplicate']=='N'))checked="checked"@endif>
                <label for="sp_is_duplicate_n" class="input-label">불가능</label>
                <input type="radio" class="flat" id="sp_is_duplicate_y" name="sp_is_duplicate" required="required" value="Y" @if(empty($data_survey['SpIsDuplicate']) === false && $data_survey['SpIsDuplicate']=='Y')checked="checked"@endif>
                <label for="sp_is_duplicate_y" class="input-label">가능</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-1-1" for="sp_is_use">사용여부 <span class="required">*</span></label>
        <div class="col-md-8">
            <div class="radio">
                <input type="radio" class="flat" id="sp_is_use_y" name="sp_is_use" title="사용여부" required="required" value="Y" @if($method == 'POST' || (empty($data_survey['SpIsUse']) === false && $data_survey['SpIsUse']=='Y'))checked="checked"@endif>
                <label for="sp_is_use_y" class="input-label">사용</label>
                <input type="radio" class="flat" id="sp_is_use_n" name="sp_is_use" required="required" value="N" @if(empty($data_survey['SpIsUse']) === false && $data_survey['SpIsUse']=='N')checked="checked"@endif>
                <label for="sp_is_use_n" class="input-label">미사용</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-1-1">설문기간 <span class="required">*</span></label>
        <div class="col-md-8 form-inline">
            <div class="input-group mb-0">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control datepicker" id="register_start_datm" name="register_start_datm" value="@if(empty($data_survey['StartDate']) === false) {{substr($data_survey['StartDate'],0,10)}} @endif">
            </div>
            <span class="pl-5 pr-5">~</span>
            <div class="input-group mb-0">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control datepicker" id="register_end_datm" name="register_end_datm" value="@if(empty($data_survey['EndDate']) === false) {{substr($data_survey['EndDate'],0,10)}} @endif">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label class="control-label col-md-1-1 ml-10">설문항목관리 <span class="required">*</span></label>
            <div class="col-md-8 mb-15">
                @if($method == 'PUT')
                    <button type="button" class="btn btn-sm btn-primary clearfix-r mr-20 add_question" data-id="add_question" data-sp-idx="{{$data_survey['SpIdx']}}" onclick="show_question_layer(this)">설문항목등록</button>
                @else
                    <span style="color: red"># 설문 저장후 항목 생성 가능합니다.</span>
                @endif
            </div>
        </div>

        <label class="control-label col-md-1-1"></label>
        <div class="col-md-8 form-inline">
            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="29%">
                    <col width="7%">
                    <col width="45%">
                    <col width="7%">
                    <col width="12%">
                </colgroup>
                <thead>
                <tr>
                    <th class="text-center">문항제목</th>
                    <th class="text-center">답변유형</th>
                    <th class="text-center">답변항목</th>
                    <th class="text-center">사용유무</th>
                    <th class="text-center">수정/삭제</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data_question as $row)
                    <tr>
                        <td>{{$row['SqTitle']}}</td>
                        <td class="text-center">{{$row['SqTypeTxt']}}</td>
                        <td>
                            @foreach($row['SqJsonData']['title'] as $key => $title)
                                <p>항목{{$key}}. {{$title}}
                                    @if(empty($row['SqJsonData']['item']) === false)
                                        @foreach($row['SqJsonData']['item'][$key] as $cnt => $item)
                                            <br/> {{$cnt}} => {{$item}}
                                        @endforeach
                                    @endif
                                </p>
                            @endforeach
                        </td>
                        <td class="text-center">{{$row['SqUseTxt']}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-modify mb-10" data-id="btn-modify" data-sp-idx="{{$row['SpIdx']}}" data-sq-data="{{json_encode($row)}}" onclick="show_question_layer(this)">수정</button>
                            <button type="button" class="btn btn-danger btn-delete mb-10" data-idx="{{$row['SqIdx']}}" onclick="delete_survey_question(this)">삭제</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-1-1">등록자</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data_survey['RegAdminName'] or '' }}</p>
        </div>
        <label class="control-label col-md-1-1 d-line">등록일</label>
        <div class="col-md-4 ml-12-dot">
            <p class="form-control-static">{{ $data_survey['RegDatm'] or '' }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-1-1">최종 수정자</label>
        <div class="col-md-4">
            <p class="form-control-static">{{ $data_survey['UpdAdminName'] or '' }}</p>
        </div>
        <label class="control-label col-md-1-1 d-line">최종 수정일</label>
        <div class="col-md-4 ml-12-dot">
            <p class="form-control-static">{{ $data_survey['UpdDatm'] or '' }}</p>
        </div>
    </div>

    <div class="form-group text-center btn-wrap mt-50">
        <button type="submit" class="btn btn-success mr-10">저장</button>
        <button class="btn btn-primary" type="button" id="goList">목록</button>
    </div>
</div>