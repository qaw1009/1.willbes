<div class="willbes-Layer-Board" style="display: block">
    <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('create_board_box'); return false;">
        <img src="{{ img_url('prof/close.png') }}">
    </a>

    <form id="_review_regi_form" name="_review_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="promotion_code" value="{{ $promotion_code }}"/>

        <div class="Layer-Cont">
            <div class="psotSort">
                <input type="radio" name="board_type" value="1" id="sortA" checked="checked"><label for="sortA">합격수기</label>
                <input type="radio" name="board_type" value="2" id="sortB"><label for="sortB">수강후기</label>
            </div>

            <div class="willbes-Leclist">
                <div class="LeclistTable">
                    {{-- 합격수기 --}}
                    <table id="board_type_1" cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 100px;">
                            <col>
                            <col style="width: 100px;">
                            <col>
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>응시지역 <span>*</span></th>
                            <td>
                                <select id="area_name" name="area_name" title="응시지역" class="seleAcad">
                                    <option value="">응시지역</option>
                                    <option value="서울">서울</option>
                                    <option value="경기">경기</option>
                                    <option value="인천">인천</option>
                                    <option value="강원">강원</option>
                                    <option value="대전">대전</option>
                                    <option value="세종">세종</option>
                                    <option value="충북">충북</option>
                                    <option value="충남">충남</option>
                                    <option value="전북">전북</option>
                                    <option value="전남">전남</option>
                                    <option value="광주">광주</option>
                                    <option value="대구">대구</option>
                                    <option value="경북">경북</option>
                                    <option value="부산">부산</option>
                                    <option value="울산">울산</option>
                                    <option value="경남">경남</option>
                                    <option value="제주">제주</option>
                                </select>
                            </td>
                            <th>합격과목 <span>*</span></th>
                            <td>
                                <select id="subject_name_1" name="subject_name" title="과목선택" class="seleAcad">
                                    <option value="">과목선택</option>
                                    <option value="가정">가정</option>
                                    <option value="건설">건설</option>
                                    <option value="관광">관광</option>
                                    <option value="국어">국어</option>
                                    <option value="기계">기계</option>
                                    <option value="기계·금속">기계·금속</option>
                                    <option value="기술">기술</option>
                                    <option value="농공">농공</option>
                                    <option value="농산물유통">농산물유통</option>
                                    <option value="도덕·윤리">도덕·윤리</option>
                                    <option value="동물자원">동물자원</option>
                                    <option value="디자인·공예">디자인·공예</option>
                                    <option value="물리">물리</option>
                                    <option value="미술">미술</option>
                                    <option value="미용">미용</option>
                                    <option value="보건">보건</option>
                                    <option value="사서">사서</option>
                                    <option value="상업">상업</option>
                                    <option value="상업정보">상업정보</option>
                                    <option value="생물">생물</option>
                                    <option value="수산·해양">수산·해양</option>
                                    <option value="수학">수학</option>
                                    <option value="식물자원·조경">식물자원·조경</option>
                                    <option value="식품가공">식품가공</option>
                                    <option value="역사">역사</option>
                                    <option value="연극영화">연극영화</option>
                                    <option value="영양">영양</option>
                                    <option value="영어">영어</option>
                                    <option value="유아">유아</option>
                                    <option value="음악">음악</option>
                                    <option value="의상">의상</option>
                                    <option value="일반사회">일반사회</option>
                                    <option value="일본어">일본어</option>
                                    <option value="전기">전기</option>
                                    <option value="전기·전자·통신">전기·전자·통신</option>
                                    <option value="전문상담">전문상담</option>
                                    <option value="전자">전자</option>
                                    <option value="정보·컴퓨터">정보·컴퓨터</option>
                                    <option value="조리">조리</option>
                                    <option value="중국어">중국어</option>
                                    <option value="지구과학">지구과학</option>
                                    <option value="지리">지리</option>
                                    <option value="체육">체육</option>
                                    <option value="초등">초등</option>
                                    <option value="특수">특수</option>
                                    <option value="특수(유아)">특수(유아)</option>
                                    <option value="특수(초등)">특수(초등)</option>
                                    <option value="한문">한문</option>
                                    <option value="항해·기관">항해·기관</option>
                                    <option value="화공">화공</option>
                                    <option value="화공·섬유">화공·섬유</option>
                                    <option value="화학">화학</option>
                                    <option value="환경">환경</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>제목 <span>*</span></th>
                            <td colspan="3">
                                <input type="text" id="board_title_1" name="board_title">
                            </td>
                        </tr>
                        <tr>
                            <th>내용 <span>*</span></th>
                            <td colspan="3">
                                <textarea id="board_content_1" name="board_content" rows="5" placeholder="500자 이상 입력해 주세요.  &#13;&#10;합격수기와 관련없는 내용은 삭제될 수 있습니다.  &#13;&#10;파일첨부(합격인증)는 필수사항이 아닙니다."></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>첨부파일<br>(합격인증)</th>
                            <td colspan="3">
                                <ul class="attach">
                                    <li><input type="file" id="attach_file" name="attach_file[]" size="3"></li>
                                    <li>
                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
                                        • hwp, doc, pdf, jpg, gif, png, zip만 등록 가능합니다.
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    {{-- 수강후기 --}}
                    <table id="board_type_2" cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 100px;">
                            <col>
                            <col style="width: 100px;">
                            <col>
                            <col style="width: 100px;">
                            <col>
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>수강과목 <span>*</span></th>
                            <td>
                                <select id="subject_name_2" name="subject_name" title="과목선택" class="seleAcad">
                                    <option value="">과목선택</option>
                                    <option value="교육학">교육학</option>
                                    <option value="유아">유아</option>
                                    <option value="초등">초등</option>
                                    <option value="전공국어">전공국어</option>
                                    <option value="전공영어">전공영어</option>
                                    <option value="전공수학">전공수학</option>
                                    <option value="수학교육론">수학교육론</option>
                                    <option value="전공생물">전공생물</option>
                                    <option value="생물교육론">생물교육론</option>
                                    <option value="전공화학">전공화학</option>
                                    <option value="도덕윤리">도덕윤리</option>
                                    <option value="전공일반사회">전공일반사회</option>
                                    <option value="전공역사">전공역사</option>
                                    <option value="전공체육">전공체육</option>
                                    <option value="전공음악">전공음악</option>
                                    <option value="전기전자통신">전기전자통신</option>
                                    <option value="정보컴퓨터">정보컴퓨터</option>
                                    <option value="정컴교육론">정컴교육론</option>
                                    <option value="전공중국어">전공중국어</option>
                                </select>
                            </td>
                            <th>담당교수 <span>*</span></th>
                            <td>
                                <select id="prof_name" name="prof_name" title="담당교수" class="seleAcad">
                                    <option value="">교수선택</option>
                                    <option value="민정선">민정선</option>
                                    <option value="배재민">배재민</option>
                                    <option value="이경범">이경범</option>
                                    <option value="정현">정현</option>
                                    <option value="신태식">신태식</option>
                                    <option value="이인재">이인재</option>
                                    <option value="홍의일">홍의일</option>
                                    <option value="송원영">송원영</option>
                                    <option value="권보민">권보민</option>
                                    <option value="구동언">구동언</option>
                                    <option value="김유석">김유석</option>
                                    <option value="김영문">김영문</option>
                                    <option value="김철홍">김철홍</option>
                                    <option value="김현웅">김현웅</option>
                                    <option value="박태영">박태영</option>
                                    <option value="박혜향">박혜향</option>
                                    <option value="김병찬">김병찬</option>
                                    <option value="김민응">김민응</option>
                                    <option value="허역팀">허역 팀</option>
                                    <option value="김종권">김종권</option>
                                    <option value="강치욱">강치욱</option>
                                    <option value="양혜정">양혜정</option>
                                    <option value="강철">강철</option>
                                    <option value="최규훈">최규훈</option>
                                    <option value="다이애나">다이애나</option>
                                    <option value="최우영">최우영</option>
                                    <option value="송광진">송광진</option>
                                    <option value="장순선">장순선</option>
                                    <option value="장영희">장영희</option>
                                </select>
                            </td>

                            <th>평점 <span>*</span></th>
                            <td>
                                <select id="score" name="score" title="평점" class="seleAcad">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>제목 <span>*</span></th>
                            <td colspan="5">
                                <input type="text" id="board_title_2" name="board_title">
                            </td>
                        </tr>
                        <tr>
                            <th>내용 <span>*</span></th>
                            <td colspan="5">
                                <textarea id="board_content_2" name="board_content" rows="5" placeholder="100자 이상 입력해 주세요.  &#13;&#10;수강후기와 관련없는 내용은 삭제될 수 있습니다."></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="info">
                <ul>
                    <li>개인정보 수집 이용 목적<br>
                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대 - 이벤트 참여에 따른 강의 수강자 목록에 활용</li>
                    <li>개인정보 수집 항목<br>
                        - 신청인의 이름</li>
                    <li>개인정보 이용기간 및 보유기간<br>
                        - 본 수집, 활용목적 달성 후 바로 파기</li>
                    <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다. </li>
                </ul>
                <label><input type="checkbox" name="is_chk" value="Y"> 윌비스에 개인정보 제공 동의하기(필수)</label>
            </div>

            <div class="btn"><a href="javascript:void(0);" id="btn_submit">등록하기</a></div>
        </div>
    </form>
</div>
<div id="Layerprof" class="willbes-Layer-Black" style="display: block"></div>

<script type="text/javascript">
    $(document).ready(function() {
        var $_review_regi_form = $('#_review_regi_form');

        if ($('input:radio[name="board_type"]:checked').val() == 1) {
            $("#board_type_2").hide();
            $("#board_type_2").find("input, select, textarea").attr("disabled", true);
        }

        $('input:radio[name="board_type"]').click(function () {
            var val = $('input:radio[name="board_type"]:checked').val();
            $("#board_type_1, #board_type_2").hide();
            $("#board_type_1, #board_type_2").find("input, select, textarea").attr("disabled", true);
            $("#board_type_"+val).show();
            $("#board_type_"+val).find("input, select, textarea").attr("disabled", false);
        });

        $("#btn_submit").click(function () {
            var _url = '{{ front_url('/promotion/storePromotionBoard') }}';
            ajaxSubmit($_review_regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    fnReviewList(1);
                    closeWin('create_board_box');
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        var addValidate = function() {
            if ($_review_regi_form.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($('input:radio[name="board_type"]:checked').val() == 1) {
                if($_review_regi_form.find('select[name="area_name"]').val() == '') {alert('응시지역을 선택해 주세요.');return;}
                if($("#subject_name_1").val() == '') {alert('합격과목을 선택해 주세요.');return;}
                if($("#board_title_1").val() == '') {alert('제목을 입력해 주세요.');return;}
                if($("#board_content_1").val() == '') {alert('내용을 입력해 주세요.');return;}
            } else {
                if($("#subject_name_2").val() == ''){alert('수강과목을 선택해 주세요.'); return;}
                if($_review_regi_form.find('select[name="prof_name"]').val() == ''){alert('담당교수를 선택해주세요.');return;}
                if($("#board_title_2").val() == '') {alert('제목을 입력해 주세요.');return;}
                if($("#board_content_2").val() == '') {alert('내용을 입력해 주세요.');return;}
            }

            if (!confirm('저장하시겠습니까?')) {
                return false;
            }

            return true;
        };
    });
</script>