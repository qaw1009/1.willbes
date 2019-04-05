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
        상세설정{{--<br><button type="button" class="btn btn-dark btn-sm btn-add-file">추가</button><br><br>--}}
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
                                    {{--{{(empty($row['ProfNickName']) === true) ? '' : $row['ProfNickName']}}--}}
                                    <select class="form-control" name="other_prof_idx[]">
                                        <option value="">교수선택</option>
                                        @foreach($arr_professor as $prof_row)
                                            <option value="{{ $prof_row['ProfIdx'] }}" class="{{ $prof_row['SiteCode'] }}" @if($row['ProfIdx'] == $prof_row['ProfIdx'])selected="selected"@endif>{{ $prof_row['wProfName'] }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    {{--{{(empty($row['SubjectName']) === true) ? '' : $row['SubjectName']}}--}}
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
    <label class="control-label col-md-1">내용</label>
    <div class="col-md-7">
        <textarea id="promotion_content" name="promotion_content" class="form-control" rows="7" title="총평 내용" placeholder="">{!! $data['Content'] !!}</textarea>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var temp_other_idx = 1;
        $regi_form.on('click', '.btn-other-add', function() {
            /*if ($('#set_other_data_1').val() == '') {
                alert('교수를 선택해 주세요.');
                return false;
            }

            if ($('#set_other_data_2').val() == '') {
                alert('과목을 선택해 주세요.');
                return false;
            }*/

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
    });
</script>