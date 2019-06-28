<form id="suggest_create_form" name="suggest_create_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
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
                <th>공개여부</th>
                <td class="tx-left">
                    <input type="radio" id="is_public_y" name="is_public" value="Y" @if($data['IsPublic']=='N')checked="checked"@endif><label for="is_public_y">공개</label>
                    <input type="radio" id="is_public_n" name="is_public" class="ml20" value="N" @if($method == 'POST' || $data['IsPublic']=='N')checked="checked"@endif><label for="is_public_n">비공개</label>
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
                                            <a href="#none" class="file-delete" data-attach-idx="{{ $data['AttachData'][$i]['FileIdx']  }}">파일삭제</a>
                                        @endif
                                    </p>
                                @endif
                            </li>
                        @endfor
                        {{--<li class="mb5">
                            <input type="file" class="input-file" size="3">
                        </li>
                        <li class="mb5">
                            <input type="file" class="input-file" size="3">
                        </li>--}}
                    </ul>
                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="search-Btn mt20 h36 p_re">
        <button type="button" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left btn-suggest-list">
            <span class="tx-purple-gray">취소</span>
        </button>
        <button type="submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center" id="btn_suggest_submit">
            <span>저장</span>
        </button>
    </div>
</form>

<script type="text/javascript">
    var $suggest_create_form = $('#suggest_create_form');
    $(document).ready(function(){
        $('.btn-suggest-list').click(function () {
            $('#suggest_create').hide();
            $('#suggest_list').show();
            Main_SuggestListAjax(1);
        });

        $('.file-delete').click(function() {
            var _url = '{{ front_url("/supporters/suggest/destroyFile/") }}';
            var data = {
                '{{ csrf_token_name() }}' : $suggest_create_form.find('input[name="{{ csrf_token_name() }}"]').val(),
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

        $suggest_create_form.submit(function() {
            var _url = '{!! front_url('/supporters/suggest/store') !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($suggest_create_form, _url, function(ret) {
                if(ret.ret_cd) {
                    console.log(1);
                    notifyAlert('success', '알림', ret.ret_msg);
                    $('#suggest_create').hide();
                    $('#suggest_list').show();
                    Main_SuggestListAjax(1);
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        function addValidate() {
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
    });
</script>