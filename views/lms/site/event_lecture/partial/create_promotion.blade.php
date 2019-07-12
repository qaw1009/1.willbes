<div class="form-group">
    <label class="control-label col-md-1-1" for="promotion_params">추가 파라미터(GET방식) </label>
    <div class="col-md-10 form-inline">
        <input type="text" id="promotion_params" name="promotion_params" class="form-control" value="{{ $data['PromotionParams'] }}" title="프로모션 파라미터" style="width: 40%;">
        &nbsp;&nbsp;&nbsp;&nbsp;• Ex) param=1&amp;param=2&amp;param=3&amp;param=4
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-1-1" for="attach_file_promotion">
        첨부파일<br><button type="button" class="btn btn-dark btn-sm btn-add-file">첨부필드추가</button><br><br>
    </label>
    <div class="col-md-3 form-inline file-box">
        @for($i = 0; $i < $promotion_attach_file_cnt; $i++)
            <div class="title file-input-box">
                <!--div class="filetype">
                    <input type="text" class="form-control file-text" disabled="">
                    <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                    <span class="file-select file-btn"-->
                        <input type="file" id="attach_file_promotion{{ $i }}" name="attach_file_promotion[]" class="form-control input-file" title="첨부{{ $i }}"/>
                        <input type="text" id="Ordering'{{ $i }}" name="Ordering[]" style="width:20px;" title="노출순서"/>
                    <!--/span>
                    <input class="file-reset btn-danger btn" type="button" value="X" />
                </div-->
                @if(empty($file_data_promotion[$i]) === false)
                    <p class="form-control-static ml-10 mr-10">[ <a href="{{ $file_data_promotion[$i]['FileFullPath'] . $file_data_promotion[$i]['FileName'] }}" rel="popup-image">{{ $file_data_promotion[$i]['FileRealName'] }}</a> ]
                        <a href="#none" class="file-delete" data-attach-idx="{{ $file_data_promotion[$i]['EfIdx']  }}"><i class="fa fa-times red"></i></a>
                        / 노출순서 : {{ $file_data_promotion[$i]['Ordering'] }}
                    </p>
                @endif
            </div>
        @endfor
    </div>
    <div class="col-md-5 col-lg-offset-1">
        • 첨부파일 우측의 칸은 노출순서입니다.(필수 X)<br>
        • <b>노출순서</b>는 기능이 첨가된 프로모션 한에서만 적용됩니다.
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-1-1 mt-5">
        라이브송출관리
    </label>
    <div class="col-md-10">
        <div class="col-md-10 mb-10">
            <div class="radio">
                <input type="radio" id="promotion_live_type_y" name="promotion_live_type" class="flat" value="Y" required="required" title="사용여부" @if($data['PromotionLiveType']=='Y')checked="checked"@endif/> <label for="promotion_live_type_y" class="input-label">사용</label>
                <input type="radio" id="promotion_live_type_n" name="promotion_live_type" class="flat" value="N" @if($method == 'POST' || $data['PromotionLiveType']=='N')checked="checked"@endif/> <label for="promotion_live_type_n" class="input-label">미사용</label>
            </div>
        </div>

        <div class="live-box">
            <div class="col-md-10 form-inline">
                <input type="text" class="form-control" id="set_live_title" name="set_live_title" placeholder="제목" style="width: 400px;">
                <div class="checkbox ml-20">
                    <input type="checkbox" id="set_live_auto_type" name="set_live_auto_type" class="flat" title="동영상자동실행" value="Y" checked="checked"/>
                    <label class="inline-block mr-5" for="set_live_auto_type">동영상자동실행</label>
                </div>
                <span class="ml-20">동영상비율</span>
                <input type="text" class="form-control" id="set_live_ratio" name="set_live_ratio" placeholder="동영상비율[16:9]" style="width: 50px;" value="16:9">
            </div>
            <div class="col-md-10 form-inline mt-10">
                기간설정
                <div class="input-group mb-0">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="text" class="form-control datepicker" id="set_live_start_date" name="set_live_start_date">
                </div>
                <span class="pl-5 pr-5">~</span>
                <div class="input-group mb-0">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="text" class="form-control datepicker" id="set_live_end_date" name="set_live_end_date">
                </div>

                <span class="ml-10">시간설정</span>
                <select class="form-control ml-5" id="set_live_start_hour" name="set_live_start_hour">
                    @php
                        for($i=0; $i<=23; $i++) {
                            $str = (strlen($i) <= 1) ? '0' : '';
                            echo "<option value='{$i}'>{$str}{$i}</option>";
                        }
                    @endphp
                </select>
                <span>:</span>
                <select class="form-control" id="set_live_start_min" name="set_live_start_min">
                    @php
                        for($i=0; $i<=59; $i++) {
                            $str = (strlen($i) <= 1) ? '0' : '';
                            echo "<option value='{$i}'>{$str}{$i}</option>";
                        }
                    @endphp
                </select>
                <span class="pl-5 pr-5">~</span>
                <select class="form-control ml-5" id="set_live_end_hour" name="set_live_end_hour">
                    @php
                        for($i=0; $i<=23; $i++) {
                            $str = (strlen($i) <= 1) ? '0' : '';
                            echo "<option value='{$i}'>{$str}{$i}</option>";
                        }
                    @endphp
                </select>
                <span>:</span>
                <select class="form-control" id="set_live_end_min" name="set_live_end_min">
                    @php
                        for($i=0; $i<=59; $i++) {
                            $str = (strlen($i) <= 1) ? '0' : '';
                            echo "<option value='{$i}'>{$str}{$i}</option>";
                        }
                    @endphp
                </select>
            </div>

            <div class="col-md-10 form-inline mt-10">
                <span>라이브송출경로</span>
                <input type="text" class="form-control" id="set_live_url" name="set_live_url" placeholder="willbes.flive.skcdn.com/willbeslive/livestreamcop501" style="width: 400px;">
                <button type="button" class="btn btn-info btn-live-add" style="margin-bottom: 2px;" data-add-type="all">셋팅</button>
                <button type="button" class="btn btn-info btn-live-add" style="margin-bottom: 2px;" data-add-type="add">추가</button>
            </div>

            <div class="col-md-12 form-inline mt-10">
                <table class="table table-striped table-bordered" id="table_promotion_live_detail">
                    <thead>
                    <tr>
                        <th>제목</th>
                        <th>자동실행</th>
                        <th>비율</th>
                        <th>송출일자</th>
                        <th>시작시간</th>
                        <th>종료시간</th>
                        <th>송출경로</th>
                        <th>첨부파일</th>
                        <th>사용유무</th>
                        <th>삭제</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (empty($data['promotion_live_video_data']) === false)
                        @foreach($data['promotion_live_video_data'] as $row)
                            <tr>
                                <td>
                                    <input type="hidden" name="eplv_idx[]" value="{{ $row['EplvIdx'] }}">
                                    <input type="hidden" name="live_file_full_path[]" value="{{ urlencode($row['FileFullPath']) }}">
                                    <input type="text" class="form-control" name="live_title[]" value="{{ $row['Title'] }}">
                                </td>
                                <td>
                                    <div class="input-group mb-0">
                                        <select class="form-control ml-5" name="live_auto_type[]">
                                            <option value="Y" @if($row['LiveAutoType'] == 'Y')selected="selected"@endif>사용</option>
                                            <option value="N" @if($row['LiveAutoType'] == 'N')selected="selected"@endif>미사용</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control" name="live_ratio[]" value="{{ $row['LiveRatio'] }}" style="width: 35px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-0">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" class="form-control datepicker" name="live_date[]" value="{{ $row['LiveDate'] }}">
                                    </div>
                                </td>
                                <td>
                                    <select class="form-control ml-5" name="live_start_hour[]">
                                        @php
                                            $start_hour = substr($row['LiveStartTime'],'0','2');
                                            for($i=0; $i<=23; $i++) {
                                                $str = (strlen($i) <= 1) ? '0' : '';
                                                $selected = ($str.$i == $start_hour) ? "selected='selected'" : "";
                                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                            }
                                        @endphp
                                    </select>
                                    <select class="form-control ml-5" name="live_start_min[]">
                                        @php
                                            $start_min = substr($row['LiveStartTime'],'2','4');
                                            for($i=0; $i<=59; $i++) {
                                                $str = (strlen($i) <= 1) ? '0' : '';
                                                $selected = ($str.$i == $start_min) ? "selected='selected'" : "";
                                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                            }
                                        @endphp
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control ml-5" name="live_end_hour[]">
                                        @php
                                            $end_hour = substr($row['LiveEndTime'],'0','2');
                                            for($i=0; $i<=23; $i++) {
                                                $str = (strlen($i) <= 1) ? '0' : '';
                                                $selected = ($str.$i == $end_hour) ? "selected='selected'" : "";
                                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                            }
                                        @endphp
                                    </select>
                                    <select class="form-control ml-5" name="live_end_min[]">
                                        @php
                                            $end_min = substr($row['LiveEndTime'],'2','4');
                                            for($i=0; $i<=59; $i++) {
                                                $str = (strlen($i) <= 1) ? '0' : '';
                                                $selected = ($str.$i == $end_min) ? "selected='selected'" : "";
                                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                            }
                                        @endphp
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="live_url[]" value="{{ $row['LiveUrl'] }}">
                                </td>
                                <td>
                                    @if(empty($row['FileRealName']) === true)
                                        <input type="file" name="live_attach_file[]" class="form-control input-file" title="첨부" style="width: 200px;"/>
                                    @else
                                        <input type="file" name="live_attach_file[]" class="form-control input-file" title="첨부" style="width: 200px;"/>
                                        <a href="javascript:void(0);" class="file-download ml-5" data-file-path="{{ urlencode($row['FileFullPath'])}}" data-file-name="{{ urlencode($row['FileRealName']) }}" target="_blank">
                                            [{{ $row['FileRealName'] }}]
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-control ml-5" name="live_is_use[]">
                                        <option value="Y" @if($row['IsUse'] == 'Y')selected="selected"@endif>사용</option>
                                        <option value="N" @if($row['IsUse'] == 'N')selected="selected"@endif>미사용</option>
                                    </select>
                                </td>
                                <td><a href="#none" class="btn-promotion-live-delete-submit" data-promotion-live-idx="{{$row['EplvIdx']}}"><i class="fa fa-times fa-lg red"></i></a></td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-1-1 mt-5">
        상세설정
    </label>
    <div class="col-md-10">
        <div class="form-group">
            <div class="col-md-5 form-inline">
                <select class="form-control" id="set_other_data_1" name="set_other_data_1">
                    <option value="">교수선택</option>
                    @foreach($arr_professor as $row)
                        <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                    @endforeach
                </select>

                <select class="form-control" id="set_other_data_2" name="set_other_data_2">
                    <option value="">과목선택</option>
                    @foreach($arr_subject as $row)
                        <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['SubjectIdx'] == $data['SubjectIdx'])selected="selected"@endif>{{ $row['SubjectName'] }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-info btn-other-add" style="margin-bottom: 2px;">추가</button>
            </div>
            <div class="col-md-6">
                • 프로모션의 기타 정보를 관리할 수 있습니다.<br>
                • <b>수정/삭제</b>는 각각 등록된 상세설정에서만 가능하며 <b>전체 수정</b>과는 무관합니다.
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10 form-inline">
                <table class="table table-striped table-bordered" id="table_promotion_detail">
                    <thead>
                    <tr>
                        <th>교수</th>
                        <th>과목</th>
                        <th>추가정보(TEXT)</th>
                        <th>추가정보(값)</th>
                        <th>첨부파일</th>
                        <th>노출순서</th>
                        <th>삭제</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (empty($data['promotion_other_data']) === false)
                        @foreach($data['promotion_other_data'] as $row)
                            <tr>
                                <td>
                                    <input type="hidden" name="epo_idx[]" value="{{ $row['EpoIdx'] }}">
                                    <input type="hidden" name="other_file_full_path[]" value="{{ urlencode($row['FileFullPath']) }}">
                                    <select class="form-control" name="other_prof_idx[]">
                                        <option value="">교수선택</option>
                                        @foreach($arr_professor as $prof_row)
                                            <option value="{{ $prof_row['ProfIdx'] }}" class="{{ $prof_row['SiteCode'] }}" @if($row['ProfIdx'] == $prof_row['ProfIdx'])selected="selected"@endif>{{ $prof_row['wProfName'] }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="other_subject_idx[]">
                                        <option value="">과목선택</option>
                                        @foreach($arr_subject as $subject_row)
                                            <option value="{{ $subject_row['SubjectIdx'] }}" class="{{ $subject_row['SiteCode'] }}" @if($row['SubjectIdx'] == $subject_row['SubjectIdx'])selected="selected"@endif>{{ $subject_row['SubjectName'] }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="other_data_1[]" class="form-control" title="추가정보" style="width: 230px;" value="{{$row['OtherData1']}}"></td>
                                <td><input type="text" name="other_data_2[]" class="form-control" title="추가정보" style="width: 230px;" value="{{$row['OtherData2']}}"></td>
                                <td>
                                    @if(empty($row['FileRealName']) === true)
                                        <input type="file" name="other_attach_file[]" class="form-control input-file" title="첨부"/>
                                    @else
                                        <input type="file" name="other_attach_file[]" class="form-control input-file" title="첨부"/>
                                        <a href="javascript:void(0);" class="file-download ml-5" data-file-path="{{ urlencode($row['FileFullPath'])}}" data-file-name="{{ urlencode($row['FileRealName']) }}" target="_blank">
                                            [{{ $row['FileRealName'] }}]
                                        </a>
                                    @endif
                                </td>
                                <td><input type="text" name="other_order_num[]" class="form-control" value="{{ $row['OrderNum'] }}" title="노출순서" style="width: 50px;"/></td>
                                <td><a href="#none" class="btn-promotion-other-delete-submit" data-promotion-other-idx="{{$row['EpoIdx']}}"><i class="fa fa-times fa-lg red"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-1-1">내용</label>
    <div class="col-md-7">
        <textarea id="promotion_content" name="promotion_content" class="form-control" rows="7" title="총평 내용" placeholder="">{!! $data['Content'] !!}</textarea>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        //라이브송출관리 -------------------
        // 신청유형 선택
        $regi_form.on('ifChanged ifCreated', 'input[name="promotion_live_type"]:checked', function() {
            if ($(this).val() == 'Y') {
                $('.live-box').show();
            } else {
                $('.live-box').hide();
            }
        });

        $regi_form.on('click', '.btn-live-add', function() {
            var listDate = [];
            var start_date = $('#set_live_start_date').val();
            var end_date = $('#set_live_end_date').val();
            var add_type = $(this).data('add-type');
            var live_auto_type = ($("input:checkbox[id='set_live_auto_type']").is(":checked"));
            var live_auto_checked_true = '';
            var live_auto_checked_false = '';

            if ((start_date == '' || end_date == '') || (start_date > end_date)) {
                alert('라이브 송출 기간을 확인해 주시기 바랍니다.');
                return false;
            }
            getDateRange(start_date, end_date, listDate);

            var tr_length = $("#table_promotion_live_detail tr").length;
            if (add_type == 'all') {
                $('#table_promotion_live_detail > tbody:last > tr').remove();   //초기화
            }
            $.each(listDate, function (tr_id,item) {
                if (add_type != 'all') {
                    tr_id = tr_length + tr_id;
                }

                var add_lists = '';
                add_lists += '<tr id="temp-promotion-live-'+tr_id+'">';
                add_lists += '<td><input type="hidden" name="eplv_idx[]" value=""><input type="text" class="form-control" name="live_title[]" value="'+$('#set_live_title').val()+'"></td>';
                add_lists += '<td>';
                if (live_auto_type == true) {
                    live_auto_checked_true = 'selected="selected"';
                } else {
                    live_auto_checked_false = 'selected="selected"';
                }
                add_lists += '<select class="form-control ml-5" name="live_auto_type[]">';
                add_lists += '<option value="Y" '+live_auto_checked_true+'>사용</option><option value="N" '+live_auto_checked_false+'>미사용</option>';
                add_lists += '</select>';
                add_lists += '</td>';
                add_lists += '<td><input type="text" class="form-control" name="live_ratio[]" title="동영상비율" value="'+$('#set_live_ratio').val()+'" style="width: 35px;"></td>';
                add_lists += '<td>';
                    add_lists += '<div class="input-group mb-0">';
                    add_lists += '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
                    add_lists += '<input type="text" class="form-control datepicker" name="live_date[]" value="'+item+'">';
                    add_lists += '</div>';
                add_lists += '</td>';
                add_lists += '<td>';
                add_lists += '<select class="form-control ml-5" name="live_start_hour[]">';
                for(var i=0; i<=23; i++) {
                    var str = (String(i).length <= 1) ? '0' : '';
                    var selected = ($('#set_live_start_hour').val() == i) ? 'selected="selected"' : '';
                    add_lists += '<option value="'+str+i+'" '+selected+'>'+str+i+'</option>';
                }
                add_lists += '</select>';
                add_lists += '<select class="form-control ml-5" name="live_start_min[]">';
                for(var i=0; i<=59; i++) {
                    var str = (String(i).length <= 1) ? '0' : '';
                    var selected = ($('#set_live_start_min').val() == i) ? 'selected="selected"' : '';
                    add_lists += '<option value="'+str+i+'" '+selected+'>'+str+i+'</option>';
                }
                add_lists += '</select>';
                add_lists += '</td>';
                add_lists += '<td>';
                add_lists += '<select class="form-control ml-5" name="live_end_hour[]">';
                for(var i=0; i<=23; i++) {
                    var str = (String(i).length <= 1) ? '0' : '';
                    var selected = ($('#set_live_end_hour').val() == i) ? 'selected="selected"' : '';
                    add_lists += '<option value="'+str+i+'" '+selected+'>'+str+i+'</option>';
                }
                add_lists += '</select>';
                add_lists += '<select class="form-control ml-5" name="live_end_min[]">';
                for(var i=0; i<=59; i++) {
                    var str = (String(i).length <= 1) ? '0' : '';
                    var selected = ($('#set_live_end_min').val() == i) ? 'selected="selected"' : '';
                    add_lists += '<option value="'+str+i+'" '+selected+'>'+str+i+'</option>';
                }
                add_lists += '</select>';
                add_lists += '</td>';
                add_lists += '<td><input type="text" class="form-control" name="live_url[]" value="'+$('#set_live_url').val()+'"></td>';
                add_lists += '<td><input type="file" name="live_attach_file[]" class="form-control input-file" title="첨부" style="width: 200px;"/></td>';
                add_lists += '<td>';
                add_lists += '<select class="form-control ml-5" name="live_is_use[]">';
                add_lists += '<option value="Y">사용</option><option value="N">미사용</option>';
                add_lists += '</select>';
                add_lists += '</td>';
                add_lists += '<td><a href="#none" class="btn-promotion-live-delete" data-temp-tr-idx="'+tr_id+'"><i class="fa fa-times fa-lg red"></i></a></td>';
                add_lists += '</tr>';
                $('#table_promotion_live_detail > tbody:last').append(add_lists);
            });
        });

        $regi_form.on('click', '.btn-promotion-live-delete', function() {
            var row_idx = $(this).data('temp-tr-idx');
            $('#temp-promotion-live-'+row_idx).remove();
        });

        // 라이브송출 데이터 삭제
        $regi_form.on('click', '.btn-promotion-live-delete-submit', function() {
            var _url = '{{ site_url("/site/eventLecture/deletePromotionLiveVideo") }}';
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'eplv_idx' : $(this).data('promotion-live-idx')
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
        //-------------------

        //상세설정 -------------------
        var temp_other_idx = 1;
        $regi_form.on('click', '.btn-other-add', function() {
            var add_lists;
            add_lists = '<tr id="temp-promotion-other-'+temp_other_idx+'">';
            add_lists += '<td><input type="hidden" name="epo_idx[]" value=""><input type="hidden" name="other_prof_idx[]" value="'+$('#set_other_data_1').val()+'">'+$("#set_other_data_1 option:selected").text()+'</td>';
            add_lists += '<td><input type="hidden" name="other_subject_idx[]" value="'+$('#set_other_data_2').val()+'">'+$("#set_other_data_2 option:selected").text()+'</td>';
            add_lists += '<td><input type="text" name="other_data_1[]" class="form-control" title="추가정보" style="width: 230px;"/></td>';
            add_lists += '<td><input type="text" name="other_data_2[]" class="form-control" title="추가정보" style="width: 230px;"/></td>';
            add_lists += '<td><input type="file" name="other_attach_file[]" class="form-control input-file" title="첨부"/></td>';
            add_lists += '<td><input type="text" name="other_order_num[]" class="form-control" title="노출순서" style="width: 50px;"/></td>';
            add_lists += '<td><a href="#none" class="btn-promotion-other-delete" data-temp-tr-idx="'+temp_other_idx+'"><i class="fa fa-times fa-lg red"></i></a></td>';
            add_lists += '<tr>';
            $('#table_promotion_detail > tbody:last').append(add_lists);
            temp_other_idx = temp_other_idx + 1;
            $('#set_other_data_2').val('');
        });

        $regi_form.on('click', '.btn-promotion-other-delete', function() {
            var row_idx = $(this).data('temp-tr-idx');
            $('#temp-promotion-other-'+row_idx).remove();
        });

        // 특강 데이터 삭제
        $regi_form.on('click', '.btn-promotion-other-delete-submit', function() {
            var _url = '{{ site_url("/site/eventLecture/deletePromotionOtherInfo") }}';
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'epo_idx' : $(this).data('promotion-other-idx')
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
        //-------------------
    });

    //시작,종료일 범위 배열 리턴
    function getDateRange(startDate, endDate, listDate) {
        var dateMove = new Date(startDate);
        var strDate = startDate;
        if (startDate == endDate) {
            var strDate = dateMove.toISOString().slice(0,10);
            listDate.push(strDate);
        } else {
            while (strDate < endDate) {
                var strDate = dateMove.toISOString().slice(0, 10);
                listDate.push(strDate);
                dateMove.setDate(dateMove.getDate() + 1);
            }
        }
        return listDate;
    }
</script>