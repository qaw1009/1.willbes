<form id="_qna_create_form" name="_qna_create_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="supporters_idx" value="{{ element('supporters_idx', $arr_input) }}"/>
    <input type="hidden" name="idx" value="{{ $board_idx }}"/>
    <input type="hidden" name="reg_type" value="{{$reg_type}}"/>

    <div class="mt30">
        <table class="tableTypeA">
            <col width="15%"/>
            <col width=""/>
            <tbody>
            <tr>
                <th>상담유형<span class="tx-light-blue">(*)</span></th>
                <td class="tx-left">
                    <select id="consult_type" name="consult_type" title="상담유형선택" class="">
                        <option value="">상담유형선택</option>
                        @foreach($arr_base['consult_type'] as $key => $val)
                            <option value="{{$key}}" @if($data['TypeCcd'] == $key)selected="selected"@endif>{{$val}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>수강정보<span class="tx-light-blue">(*)</span></th>
                <td class="tx-left">
                    <select id="cate_code" name="cate_code" title="구분" style="width:49%">
                        <option value="">구분</option>
                        @foreach($arr_base['category'] as $row)
                            <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if($data['Category_String'] == $row['CateCode'])selected="selected"@endif>
                                {{$row['CateName']}}
                            </option>
                        @endforeach
                    </select>
                    <select id="subject_idx" name="subject_idx" title="과목" style="width:50%">
                        <option value="">과목</option>
                        @if(empty($arr_base['subject']) === false)
                            @foreach($arr_base['subject'] as $row)
                                <option value="{{$row['SubjectIdx']}}" class="{{$row['CateCode']}}" @if($data['SubjectIdx'] == $row['SubjectIdx'])selected="selected"@endif>{{$row['SubjectName']}}</option>
                            @endforeach
                        @endif
                    </select>
                    <select id="prod_code" name="prod_code" title="강좌" class="widthAutoFull mt5">
                        <option value="">강좌</option>
                        @foreach($arr_base['product_list'] as $row)
                            <option value="{{$row['ProdCode']}}" @if($data['ProdCode'] == $row['ProdCode'])selected="selected"@endif>{{$row['ProdCode']}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>공개여부</th>
                <td class="tx-left">
                    <input type="radio" id="is_public_y" name="is_public" value="Y" @if($data['IsPublic']=='Y')checked="checked"@endif><label for="is_public_y"> 공개</label>
                    <input type="radio" id="is_public_n" name="is_public" class="ml20" value="N" @if($method == 'POST' || $data['IsPublic']=='N')checked="checked"@endif><label for="is_public_n"> 비공개</label>
                </td>
            </tr>
            <tr>
                <th>제목<span class="tx-light-blue">(*)</span></th>
                <td class="tx-left">
                    <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="{{$data['Title']}}">
                </td>
            </tr>
            <tr>
                <th>내용<span class="tx-light-blue">(*)</span></th>
                <td class="tx-left">
                    <textarea id="board_content" name="board_content" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                </td>
            </tr>
            <tr>
                <th>첨부</th>
                <td class="tx-left">
                    <ul class="attach">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            <li class="mb5">
                                <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3">
                                @if(empty($data['AttachData'][$i]) === false)
                                    <p id="file_{{ $data['AttachData'][$i]['FileIdx']}}">[ {{ $data['AttachData'][$i]['RealName'] }} ]
                                        @if ($data['RegMemIdx'] == sess_data('mem_idx'))
                                            <a href="javascript:void(0);" class="file-delete tx-red" data-attach-idx="{{$data['AttachData'][$i]['FileIdx']}}">[파일삭제]</a>
                                        @endif
                                    </p>
                                @endif
                            </li>
                        @endfor
                    </ul>
                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="search-Btn mt20 h36 p_re">
        <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="_btn_qna_list_forCreate">
            <span class="tx-purple-gray">취소</span>
        </button>
        <button type="submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
            <span>{{($method == 'POST' ? '등록' : '수정')}}</span>
        </button>
    </div>
</form>

<script type="text/javascript">
    var $_qna_create_form = $('#_qna_create_form');

    $(document).ready(function(){
        $_qna_create_form.find('select[name="subject_idx"]').chained("#cate_code");

        $('#_btn_qna_list_forCreate').click(function () {
            $('#qna_create').hide();
            $('#qna_list').show();
            qnaCallAjax(1);
        });

        $('.file-delete').click(function() {
            var _url = '{{ front_url("/supporters/qna/destroyFile/") }}';
            var data = {
                '{{ csrf_token_name() }}' : $_qna_create_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'attach_idx' : $(this).data('attach-idx')
            };
            if (!confirm('정말로 삭제하시겠습니까?')) {
                return;
            }
            $('#file_'+$(this).data('attach-idx')).hide();
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                }
            }, showError, false, 'POST');
        });

        $_qna_create_form.submit(function() {
            var _url = '{!! front_url('/supporters/qna/store') !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($_qna_create_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $('#qna_create').hide();
                    $('#qna_list').show();
                    qnaCallAjax(1);
                }
            }, showValidateError, addValidate, false, 'alert');
        });
    });

    function addValidate() {
        if ($('#consult_type').val() == '') {
            alert('상담유형을 선택해 주세요.');
            return false;
        }

        if ($('#cate_code').val() == '') {
            alert('구분을 선택해 주세요.');
            return false;
        }

        if ($('#subject_idx').val() == '') {
            alert('과목을 선택해 주세요.');
            return false;
        }

        if ($('#prod_code').val() == '') {
            alert('강좌를 선택해 주세요.');
            return false;
        }

        if ($('#board_title').val() == '') {
            alert('제목을 입력해 주세요.');
            return false;
        }

        var is_public = $(":input:radio[name=is_public]:checked").length;
        if (is_public < 1) {
            alert('공개여부를 선택해 주세요.');
            return false;
        }

        if ($('#board_title').val() == '') {
            alert('제목을 입력해 주세요.');
            return false;
        }

        if ($('#board_content').val() == '') {
            alert('내용을 입력해 주세요.');
            return false;
        }
        return true;
    }
</script>