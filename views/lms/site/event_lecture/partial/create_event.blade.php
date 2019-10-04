<div class="form-group">
    <label class="control-label col-md-1-1">특강구분</label>
    <div class="col-md-4 form-inline">
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

    <label class="control-label col-md-1-1 d-line">HOT</label>
    <div class="col-md-4 ml-12-dot item form-inline">
        <div class="checkbox">
            <input type="checkbox" id="is_best" name="is_best" value="1" class="flat" @if($data['IsBest']=='1')checked="checked"@endif/> <label class="inline-block mr-5 red" for="is_best">HOT</label>
        </div>
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
    <label class="control-label col-md-1-1">내용옵션</label>
    <div class="col-md-10 form-inline">
        <div class="radio">
            <input type="radio" id="content_type_I" name="content_type" data-input="file" class="flat content-type" value="I" required="required" title="내용옵션" @if($method == 'POST' || $data['ContentType']=='I')checked="checked"@endif/> <label for="content_type_I" class="input-label">이미지</label>
            <input type="radio" id="content_type_E" name="content_type" data-input="editor" class="flat content-type" value="E" @if($data['ContentType']=='E')checked="checked"@endif/> <label for="content_type_E" class="input-label">에디터</label>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-1-1">내용</label>
    <div class="col-md-10 item form-inline form-content-input hide" id="content_file">
        <div class="title">
            <!--div class="filetype">
                <input type="text" class="form-control file-text" disabled="">
                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                <span class="file-select file-btn"-->
                    <input type="file" id="attach_file_C" name="attach_file[]" class="form-control input-file" title="내용 이미지">
                <!--/span>
                <input class="file-reset btn-danger btn" type="button" value="X" />
            </div-->
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
            <!--div class="filetype">
                <input type="text" class="form-control file-text" disabled="">
                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                <span class="file-select file-btn"-->
                    <input type="file" id="attach_file_F" name="attach_file[]" class="form-control input-file" title="첨부파일">
                <!--/span>
                <input class="file-reset btn-danger btn" type="button" value="X" />
            </div-->
            @if(empty($file_data['F']) === false)
                <p class="form-control-static ml-30 mr-10">[ <a href="{{ $file_data['F']['file_path'] }}" rel="popup-image">{{ $file_data['F']['file_real_name'] }}</a> ]
                    <a href="#none" class="file-delete" data-attach-idx="{{ $file_data['F']['file_idx'] }}"><i class="fa fa-times red"></i></a>
                </p>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-1-1" for="attach_file_S">리스트썸네일</label>
    <div class="col-md-10 item form-inline">
        <div class="title">
            <!--div class="filetype">
                <input type="text" class="form-control file-text" disabled="">
                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                <span class="file-select file-btn"-->
                    <input type="file" id="attach_file_S" name="attach_file[]" class="form-control input-file" title="리스트썸네일">
                <!--/span>
                <input class="file-reset btn-danger btn" type="button" value="X" />
            </div-->
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
            <!--div class="filetype">
                <input type="text" class="form-control file-text" disabled="">
                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                <span class="file-select file-btn"-->
                    <input type="file" id="attach_file_I" name="attach_file[]" class="form-control input-file" title="첨부파일">
                <!--/span>
                <input class="file-reset btn-danger btn" type="button" value="X" />
            </div-->
            @if(empty($file_data['I']) === false)
                <p class="form-control-static ml-30 mr-10">[ <a href="{{ $file_data['I']['file_path'] }}" rel="popup-image">{{ $file_data['I']['file_real_name'] }}</a> ]
                    <a href="#none" class="file-delete" data-attach-idx="{{ $file_data['I']['file_idx'] }}"><i class="fa fa-times red"></i></a>
                </p>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-1-1" for="attach_file_R">이벤트 신청자 자료</label>
    <div class="col-md-10 form-inline">
        <div class="title">
            <input type="file" id="attach_file_R" name="attach_file[]" class="form-control input-file" title="첨부파일">
            @if(empty($file_data['R']) === false)
                <p class="form-control-static ml-30 mr-10">[ <a href="{{ $file_data['R']['file_path'] }}" rel="popup-image">{{ $file_data['R']['file_real_name'] }}</a> ]
                    <a href="#none" class="file-delete" data-attach-idx="{{ $file_data['R']['file_idx'] }}"><i class="fa fa-times red"></i></a>
                </p>
            @endif
        </div>
    </div>
</div>
