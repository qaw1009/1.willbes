<a class="closeBtn" href="javascript:closeWin('profNotice');">
    <img src="{{ img_url('prof/close.png') }}">
</a>

<div class="Layer-Tit NG tx-dark-black tx-left">합격수기 등록하기</div>
<div class="Layer-Cont">
    <div class="willbes-Leclist c_both mt20">
        <div class="LecWriteTable">
            <form id="review_regi_form" name="review_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $board_idx }}"/>
                <input type="hidden" name="reg_type" value="{{$reg_type}}"/>
                <input type="hidden" name="put_site_code" value="{{($method=='PUT') ? $data['SiteCode'] : $__cfg['SiteCode']}}"/>

                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                    <colgroup>
                        <col style="width: 120px;">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-tit bg-light-white strong">과정선택<span class="tx-light-blue">(*)</span></td>
                        <td class="w-selected tx-left pl30">
                            <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                                <option value="">과정</option>
                                @foreach($arr_base['site_list'] as $key => $val)
                                    <option value="{{$key}}" @if(($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['SiteCode'] == $key) || (element('s_site_code', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
                                @endforeach
                            </select>
                            <select id="s_cate_code" name="s_cate_code" title="구분" class="seleDiv" style="width: 250px;" required="required">
                                <option value="">구분</option>
                                @php $temp_s_cate_code = ''; @endphp
                                @foreach($arr_base['category'] as $row)
                                    <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if($data['Category_String'] == $row['CateCode'] || (empty(element('s_cate_code', $arr_input)) === false && element('s_cate_code', $arr_input) == $row['CateCode']) || (empty(element('on_off_link_cate_code', $arr_input)) === false && element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode']))selected="selected"@endif @if((empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) || empty($arr_swich['cate']) === false) disabled @endif>{{$row['CateNameRoute']}}</option>
                                    @php if($data['Category_String'] == $row['CateCode'] || (empty(element('s_cate_code', $arr_input)) === false && element('s_cate_code', $arr_input) == $row['CateCode']) || (empty(element('on_off_link_cate_code', $arr_input)) === false && element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode'])) $temp_s_cate_code = $row['CateCode']; @endphp
                                @endforeach
                            </select>
                            @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y')
                                <input type="hidden" name="s_cate_code" value="{{$temp_s_cate_code}}">
                            @endif

                            <select class="form-control" id="subject_idx" name="subject_idx" class="seleCampus" style="width: 250px;" title="과목명" required="required" @if($method == 'POST') disabled="disabled" @else @endif>
                                <option value="">과목</option>
                                @if(empty($arr_base['subject']) === false)
                                    @foreach($arr_base['subject'] as $row)
                                        <option value="{{$row['SubjectIdx']}}" class="{{$row['CateCode']}}" @if($data['SubjectIdx'] == $row['SubjectIdx'])selected="selected"@endif>{{$row['SubjectName']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr class="d_none">
                        <td class="w-tit bg-light-white tx-left strong pl30">공개여부</td>
                        <td class="w-radio tx-left pl30" colspan="3">
                            <ul>
                                <li><input type="radio" id="is_public_y" name="is_public" class="goods_chk" value="Y" @if($method == 'POST' || $data['IsPublic']=='Y')checked="checked"@endif><label>공개</label></li>
                                <li><input type="radio" id="is_public_n" name="is_public" class="goods_chk" value="N" ><label>비공개</label></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white strong">제목<span class="tx-light-blue">(*)</span></td>
                        <td class="w-text tx-left pl30">
                            <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="{{$data['Title']}}">
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white strong">내용<span class="tx-light-blue">(*)</span></td>
                        <td class="w-textarea write tx-left pl30">
                            <textarea id="board_content" name="board_content" placeholder="* 500자 이상 입력해 주세요.
                            &#13;&#10;* 합격수기와 관련없는 내용은 삭제할 수 있습니다.
                            &#13;&#10;* 합격인증 및 파일첨부는 필수사항이 아닙니다.">{!! $data['Content'] !!}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white strong">첨부</td>
                        <td class="w-file answer tx-left">
                            <ul class="attach">
                                @for($i = 0; $i < 2; $i++)
                                    <li>
                                        <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3" onchange="chkUploadFile(this);">

                                        @if(empty($data['AttachData'][$i]) === false)
                                            <p class="file_delete_{{ $data['AttachData'][$i]['FileIdx'] }}"><span>[ {{ $data['AttachData'][$i]['RealName'] }} ]</span>
                                                <a href="#none" class="file-delete" data-attach-idx="{{ $data['AttachData'][$i]['FileIdx'] }}">파일삭제</a>
                                            </p>
                                        @endif
                                    </li>
                                @endfor
                                <li>
                                    • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                    • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="tx-left" colspan="2">
                            <div class="info">
                                <h5>개인정보 수집 및 이용에 대한 안내<span class="tx-light-blue">(*)</span></h5>
                                <ul>
                                    <li>
                                        개인정보 수집 이용 목적<br>
                                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대
                                        - 이벤트 참여에 따른 강의 수강자 목록에 활용
                                    </li>
                                    <li>
                                        개인정보 수집 항목<br>
                                        - 신청인의 이름
                                    </li>
                                    <li>
                                        개인정보 이용기간 및 보유기간<br>
                                        - 본 수집, 활용목적 달성 후 바로 파기
                                    </li>
                                    <li>
                                        개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은
                                        이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                                    </li>
                                </ul>
                                <div>
                                    위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에
                                    <label class="ml10"><input type="radio" name="is_chk" id="is_chk_y"> 동의함</label> <label class="ml10"><input type="radio" name="is_chk" id="is_chk_n"> 동의하지 않습니다.</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="search-Btn mt20 h36 p_re">
                    <a href="javascript:closeWin('profNotice');" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                        <span class="tx-purple-gray">취소</span>
                    </a>
                    <button type="submit" id="btn_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                        <span>저장</span>
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>

<script>
    var $review_regi_form = $('#review_regi_form');

    $(document).ready(function() {
        @if(empty(element('s_cate_code_disabled', $arr_input)) === true || element('s_cate_code_disabled', $arr_input) != 'Y')
        $review_regi_form.find('select[name="s_cate_code"]').chained("#s_site_code");
        @endif
        $review_regi_form.find('select[name="subject_idx"]').chained("#s_cate_code");

        $('.file-delete').click(function() {
            var _url = '{{ front_url("{$default_path}/destroyFile/?".$get_params) }}';
            var file_idx = $(this).data('attach-idx');
            var data = {
                '{{ csrf_token_name() }}' : $review_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'attach_idx' : file_idx
            };
            if (!confirm('정말로 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    $(".file_delete_" + file_idx).html("");
                    notifyAlert('success', '알림', ret.ret_msg);
                }
            }, showError, false, 'POST');
        });

        $review_regi_form.submit(function() {
            var _url = '{!! front_url($default_path.'/store?'.$get_params) !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($review_regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    fnReviewList();
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        function addValidate() {
            var is_public = $(":input:radio[name=is_public]:checked").length;

            if ($('#s_site_code').val() == '') {
                alert('과정을 선택해 주세요.');
                return false;
            }

            if ($('#s_cate_code option:selected').val() == '') {
                alert('카테고리를 선택해 주세요.');
                return false;
            }

            if ($('#subject_idx').val() == '') {
                alert('과목을 선택해 주세요.');
                return false;
            }

            if (is_public < 1) {
                alert('공개여부를 선택해 주세요.');
                return false;
            }

            if ($.trim($('#board_title').val()) == '') {
                alert('제목을 입력해 주세요.');
                $('#board_title').focus();
                return false;
            }

            if ($.trim($('#board_content').val()) == '') {
                alert('내용을 입력해 주세요.');
                $('#board_content').focus();
                return false;
            }

            if (fn_chk_text_length($('#board_content').val(), 'space') < 500) {
                alert('내용은 500자 이상 입력하셔야 됩니다.');
                return false;
            }

            if ($("#is_chk_y").is(':checked') === false) {
                alert('개인정보 수집 및 이용에 동의하여 주십시오.');
                return false;
            }

            return true;
        }
    });

    function chkUploadFile(elem){
        if($(elem).val()){
            var filename =  $(elem).prop("files")[0].name;
            var ext = filename.split('.').pop().toLowerCase();
            if($.inArray(ext, ['hwp', 'doc', 'pdf', 'jpg', 'gif', 'png', 'zip']) == -1) {
                $(elem).val("");
                alert('hwp, doc, pdf, jpg, gif, png, zip 만 업로드 가능합니다.');
            }
        }
    }
</script>