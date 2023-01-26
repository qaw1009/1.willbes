<form name="_regi_recall_form" id="_regi_recall_form">
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="promotion_code"  id ="promotion_code" value="{{ $promotion_code }}"/>
    <input type="hidden" name="recall_question_id"  id ="recall_question_id" value="{{ $data['RecallQuestionIdx'] or '' }}"/>
    <input type="hidden" name="recall_params_cnt"  id ="recall_params_cnt" value="{{ $data['TitleUseCount'] or '' }}"/>
    <input type="hidden" name="recall_mid"  id ="recall_mid" value="{{ $data['RecallMemberIdx'] or '' }}"/>

    <div class="evt_table">
        @if (sess_data('is_login') !== true)
            <div class="before">
                <div>로그인해 주세요!<br>
                    문제복기 이벤트 참여는 로그인을 해주셔야 합니다.</div>
                <div class="popupbtn"><a href="{{ app_url('/member/login/?rtnUrl='.rawurlencode('//' . $login_url), 'www')}}">로그인</a></div>
            </div>
        @endif

        <div class="title NSK-Black recall-title">{{--2차 문제복기 이벤트 참여하기--}}</div>
        <table>
            <col width="18%"/>
            <col width="25%"/>
            <col width="15%"/>
            <col width=""/>
            <tr>
                <th>회원정보</th>
                <td>{{sess_data('mem_name')}}({{ substr(sess_data('mem_id'),0, (strlen(sess_data('mem_id'))-3)) }}***)</td>
                <th>응시정보</th>
                <td>
                    <select id="exam_subject_name" name="exam_subject_name" title="응시과목">
                        <option value="">응시과목</option>
                        <option value="유아" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '유아' ? 'selected="selected"' : '') }}>유아</option>
                        <option value="초등" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '초등' ? 'selected="selected"' : '') }}>초등</option>
                        <option value="국어" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '국어' ? 'selected="selected"' : '') }}>국어</option>
                        <option value="영어" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '영어' ? 'selected="selected"' : '') }}>영어</option>
                        <option value="수학" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '수학' ? 'selected="selected"' : '') }}>수학</option>
                        <option value="생물" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '생물' ? 'selected="selected"' : '') }}>생물</option>
                        <option value="화학" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '화학' ? 'selected="selected"' : '') }}>화학</option>
                        <option value="도덕윤리" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '도덕윤리' ? 'selected="selected"' : '') }}>도덕윤리</option>
                        <option value="일반사회" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '일반사회' ? 'selected="selected"' : '') }}>일반사회</option>
                        <option value="역사" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '역사' ? 'selected="selected"' : '') }}>역사</option>
                        <option value="체육" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '체육' ? 'selected="selected"' : '') }}>체육</option>
                        <option value="음악" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '음악' ? 'selected="selected"' : '') }}>음악</option>
                        <option value="전기" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '전기' ? 'selected="selected"' : '') }}>전기</option>
                        <option value="전자" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '전자' ? 'selected="selected"' : '') }}>전자</option>
                        <option value="정보컴퓨터" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '정보컴퓨터' ? 'selected="selected"' : '') }}>정보컴퓨터</option>
                        <option value="중국어" {{ (empty($data['ExamSubjectName']) === false && $data['ExamSubjectName'] == '중국어' ? 'selected="selected"' : '') }}>중국어</option>
                    </select>
                    <select id="exam_area_name" name="exam_area_name" title="응시지역">
                        <option value="">응시지역</option>
                        <option value="서울" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '서울' ? 'selected="selected"' : '') }}>서울</option>
                        <option value="경기" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '경기' ? 'selected="selected"' : '') }}>경기</option>
                        <option value="인천" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '인천' ? 'selected="selected"' : '') }}>인천</option>
                        <option value="강원" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '강원' ? 'selected="selected"' : '') }}>강원</option>
                        <option value="대전" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '대전' ? 'selected="selected"' : '') }}>대전</option>
                        <option value="세종" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '세종' ? 'selected="selected"' : '') }}>세종</option>
                        <option value="충북" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '충북' ? 'selected="selected"' : '') }}>충북</option>
                        <option value="충남" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '충남' ? 'selected="selected"' : '') }}>충남</option>
                        <option value="전북" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '전북' ? 'selected="selected"' : '') }}>전북</option>
                        <option value="전남" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '전남' ? 'selected="selected"' : '') }}>전남</option>
                        <option value="광주" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '광주' ? 'selected="selected"' : '') }}>광주</option>
                        <option value="대구" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '대구' ? 'selected="selected"' : '') }}>대구</option>
                        <option value="경북" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '경북' ? 'selected="selected"' : '') }}>경북</option>
                        <option value="부산" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '부산' ? 'selected="selected"' : '') }}>부산</option>
                        <option value="울산" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '울산' ? 'selected="selected"' : '') }}>울산</option>
                        <option value="경남" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '경남' ? 'selected="selected"' : '') }}>경남</option>
                        <option value="제주" {{ (empty($data['ExamAreaName']) === false && $data['ExamAreaName'] == '제주' ? 'selected="selected"' : '') }}>제주</option>
                    </select>
                </td>
            </tr>
        </table>

        <table class="mt20">
            <col width="18%"/>
            <col width=""/>
            @if(empty($data) === false)
                @for($i=1; $i<=$data['TitleUseCount']; $i++)
                    <tr>
                        <th>{!! $data['Title_'.$i] or '제목(미설정)' !!}
                            {!! (explode(',',$data['IsRequired'])[$i-1] == 'Y') ? '<strong class="tx-red">*</strong>' : '' !!}
                        </th>
                        <td><textarea class="recall-content" name="recall_content_{{$i}}" cols="30" rows="4"
                                      data-required="{{explode(',',$data['IsRequired'])[$i-1]}}"
                                      placeholder="{{$data['PlaceHolder_'.$i] or ''}}">{!! $data['RecallContent_'.$i] or '' !!}</textarea></td>
                    </tr>
                @endfor
            @endif
            <tr>
                <th>파일첨부</th>
                <td>
                    <div>
                        <input type="file" id="attach_file" name="attach_file" onChange="chkUploadFile(this)" style="width:60%"/>&nbsp;&nbsp;
                        <p class="tx12 mt10">* jpg 등의 이미지 형식과 hwp, doc, pdf, zip 파일 업로드 가능</p>
                    </div>
                </td>
            </tr>
        </table>
        <div class="btns"><a href="javascript:void(0)" onclick="fnRecallSubmit(); return false;">문제복기 자료 제출하기</a></div>
    </div>
</form>

<script type="text/javascript">
    var $_regi_recall_form = $('#_regi_recall_form');
    $(document).ready(function() {
        $(".recall-title").text($("#_recallViewTable").data("title"));
    });

    function fnRecallSubmit()
    {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

        if ($("#recall_mid").val() != '') {
        alert('등록된 자료가 있습니다.');
        return false;
    }

        if ($("#exam_subject_name").val() == '') {
            alert('응시과목을 선택해주세요.');
            return false;
        }

        if ($("#exam_area_name").val() == '') {
            alert('응시지역을 선택해주세요.');
            return false;
        }

        var vali_msg = '';
        $('.recall-content').each(function(){
            if ($(this).data("required") == 'Y' && $(this).val() == '') {
                vali_msg = '문제복기 항목을 모두 입력해 주세요.';
                return false;
            }
        });
        if (vali_msg) { alert(vali_msg); return; }

        if ($('#attach_file').val() == '') {
        } else {
            if(fileExtCheck($('#attach_file').val()) == false) {
                return;
            }
        }

        if (!confirm('제출 후 수정 불가능합니다. 제출하시겠습니까?')) {
            return;
        }

        var _url = '{!! front_url('/promotion/storePromotionRecall') !!}';
        ajaxSubmit($_regi_recall_form, _url, function (ret) {
            if (ret.ret_cd) {
                alert('제출되었습니다.');
                window.parent.location.reload();
            }
        }, showValidateError, null, false, 'alert');
    }

    //파일 확장자 체크
    function fileExtCheck(strfile) {
        if( strfile != "" ){
            var ext = strfile.split('.').pop().toLowerCase();
            if($.inArray(ext, ['hwp', 'doc', 'pdf', 'jpg', 'gif', 'png', 'zip']) == -1) {
                alert('jpg 등의 이미지 형식과 hwp, doc, pdf, zip 파일만 업로드 할수 있습니다.');
                return false;
            }
        }
    }
</script>