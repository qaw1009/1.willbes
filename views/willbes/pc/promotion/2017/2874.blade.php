@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2023/01/2874_top_bg.jpg) no-repeat center top;}

        .event01 {background:#9701f8 url(https://static.willbes.net/public/images/promotion/2023/01/2874_01_bg.jpg) no-repeat center top;}
        .problem {width:1120px; margin:0 auto; background:url(https://static.willbes.net/public/images/promotion/2023/01/2874_01_02.jpg)}


        
        .evtCtnsBox .title {font-size:40px; font-weight:bold; margin-bottom:50px; color:#4c4c4c}
        .evt_table{width:1120px; margin:0 auto; background:url(https://static.willbes.net/public/images/promotion/2023/01/2874_01_02.jpg); padding:50px; position: relative; font-size:20px}

        .evt_table .before { position: absolute;top:0; left:50%; margin-left:-500px; height:100%; background:rgba(0,0,0,.7); width:1000px; border-radius:30px; z-index: 10; display: flex; flex-direction: column; justify-content: center; align-items: center; color:#fff}
        .evt_table .before .popupbtn {margin-top:30px;}
        .evt_table .before .popupbtn a {display:block; width:200px; border-radius:10px; color:#fff; padding:10px; background:#000; border:1px solid #fff}
        .evt_table .before .popupbtn a:hover {background:#9701f8;}
        .evt_table table{width:95%; border:1px solid #eee; margin:0 auto}
        .evt_table tr {border:1px solid #eee;}
        .evt_table th,
        .evt_table td {padding:10px 5px; font-size:16px}
        .evt_table th {background:#f0dbfe; color:#000; font-weight:300;}
        .evt_table td {text-align:left}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:top; font-size:16px}
        .evt_table select {padding:5px; min-width:40%}
        .evt_table textarea {padding:5px; border:1px solid #b8b8b8; width:100% }
        .evt_table .btns {margin-top:50px}
        .evt_table .btns a {display:block; text-align:center; width:400px; margin:0 auto; padding:10px 20px; font-size:30px; color:#fff; background:#2d2623; border-radius:10px}
        .evt_table .btns a:hover {background:#9701f8;}

        .event02 {position:relative; width:1120px; margin:0 auto; padding:100px 0}

        .event02 .Paging a.on {text-decoration:none}

        .event03 {background:#fff0bd;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .skyBanner {position:fixed; width:180px; top:250px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:10px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2023/01/2874_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
            <form name="regi_form" id="regi_form">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="promotion_code"  id ="promotion_code" value="{{ $data['PromotionCode'] }}"/>
                <input type="hidden" name="recall_question_id"  id ="recall_question_id" value="{{ $arr_base['recall_data']['RecallQuestionIdx'] or '' }}"/>
                <input type="hidden" name="recall_params_cnt"  id ="recall_params_cnt" value="{{ $arr_base['recall_data']['TitleUseCount'] or '' }}"/>
                <input type="hidden" name="recall_mid"  id ="recall_mid" value="{{ $arr_base['recall_data']['RecallMemberIdx'] or '' }}"/>

                <img src="https://static.willbes.net/public/images/promotion/2023/01/2874_01_01.jpg"/>
                <div class="evt_table">
                    @if (sess_data('is_login') !== true)
                        <div class="before">
                            <div>로그인해 주세요!<br>
                                문제복기 이벤트 참여는 로그인을 해주셔야 합니다.</div>
                            <div class="popupbtn btn-login-check"><a href="javascript:void(0)">로그인</a></div>
                        </div>
                    @endif

                    <div class="title NSK-Black">2차 문제복기 이벤트 참여하기</div>
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
                                    <option value="유아" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '유아' ? 'selected="selected"' : '') }}>유아</option>
                                    <option value="초등" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '초등' ? 'selected="selected"' : '') }}>초등</option>
                                    <option value="국어" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '국어' ? 'selected="selected"' : '') }}>국어</option>
                                    <option value="영어" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '영어' ? 'selected="selected"' : '') }}>영어</option>
                                    <option value="수학" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '수학' ? 'selected="selected"' : '') }}>수학</option>
                                    <option value="생물" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '생물' ? 'selected="selected"' : '') }}>생물</option>
                                    <option value="화학" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '화학' ? 'selected="selected"' : '') }}>화학</option>
                                    <option value="도덕윤리" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '도덕윤리' ? 'selected="selected"' : '') }}>도덕윤리</option>
                                    <option value="일반사회" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '일반사회' ? 'selected="selected"' : '') }}>일반사회</option>
                                    <option value="역사" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '역사' ? 'selected="selected"' : '') }}>역사</option>
                                    <option value="체육" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '체육' ? 'selected="selected"' : '') }}>체육</option>
                                    <option value="음악" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '음악' ? 'selected="selected"' : '') }}>음악</option>
                                    <option value="전기" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '전기' ? 'selected="selected"' : '') }}>전기</option>
                                    <option value="전자" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '전자' ? 'selected="selected"' : '') }}>전자</option>
                                    <option value="정보컴퓨터" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '정보컴퓨터' ? 'selected="selected"' : '') }}>정보컴퓨터</option>
                                    <option value="중국어" {{ (empty($arr_base['recall_data']['ExamSubjectName']) === false && $arr_base['recall_data']['ExamSubjectName'] == '중국어' ? 'selected="selected"' : '') }}>중국어</option>
                                </select>
                                <select id="exam_area_name" name="exam_area_name" title="응시지역">
                                    <option value="">응시지역</option>
                                    <option value="서울" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '서울' ? 'selected="selected"' : '') }}>서울</option>
                                    <option value="경기" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '경기' ? 'selected="selected"' : '') }}>경기</option>
                                    <option value="인천" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '인천' ? 'selected="selected"' : '') }}>인천</option>
                                    <option value="강원" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '강원' ? 'selected="selected"' : '') }}>강원</option>
                                    <option value="대전" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '대전' ? 'selected="selected"' : '') }}>대전</option>
                                    <option value="세종" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '세종' ? 'selected="selected"' : '') }}>세종</option>
                                    <option value="충북" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '충북' ? 'selected="selected"' : '') }}>충북</option>
                                    <option value="충남" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '충남' ? 'selected="selected"' : '') }}>충남</option>
                                    <option value="전북" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '전북' ? 'selected="selected"' : '') }}>전북</option>
                                    <option value="전남" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '전남' ? 'selected="selected"' : '') }}>전남</option>
                                    <option value="광주" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '광주' ? 'selected="selected"' : '') }}>광주</option>
                                    <option value="대구" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '대구' ? 'selected="selected"' : '') }}>대구</option>
                                    <option value="경북" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '경북' ? 'selected="selected"' : '') }}>경북</option>
                                    <option value="부산" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '부산' ? 'selected="selected"' : '') }}>부산</option>
                                    <option value="울산" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '울산' ? 'selected="selected"' : '') }}>울산</option>
                                    <option value="경남" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '경남' ? 'selected="selected"' : '') }}>경남</option>
                                    <option value="제주" {{ (empty($arr_base['recall_data']['ExamAreaName']) === false && $arr_base['recall_data']['ExamAreaName'] == '제주' ? 'selected="selected"' : '') }}>제주</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <table class="mt20">
                        <col width="18%"/>
                        <col width=""/>
                        @if($arr_promotion_params['exam_recall_type'] == 'Y' && empty($arr_base['recall_data']) === false)
                            @for($i=1; $i<=$arr_base['recall_data']['TitleUseCount']; $i++)
                                <tr>
                                    <th>{!! $arr_base['recall_data']['Title_'.$i] or '제목(미설정)' !!}</th>
                                    <td>
                                        <textarea class="recall-content" name="recall_content_{{$i}}" cols="30" rows="4"
                                                  placeholder="{{$arr_base['recall_data']['PlaceHolder_'.$i] or ''}}">{!! $arr_base['recall_data']['RecallContent_'.$i] or '' !!}</textarea>
                                    </td>
                                </tr>
                            @endfor
                        @endif
                        <tr>
                            <th>파일첨부</th>
                            <td>
                                <div>
                                    <input type="file" id="attach_file" name="attach_file" onChange="chkUploadFile(this)" style="width:60%"/>&nbsp;&nbsp;
                                    <p class="tx12 mt10">* jpg 등의 이미지 형식과 pdf, zip 파일 업로드 가능</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="btns"><a href="javascript:void(0)" onclick="fnRecallSubmit(); return false;">문제복기 자료 제출하기</a></div>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2874_01_03.jpg"/>
            </form>
        </div>

        <div class="evtCtnsBox event02" id="reviewListWrap">
        </div>

        <div class="evtCtnsBox event03">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2874_02.jpg"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <ul>
                    <li>윌비스임용의 문제복기/합격수기 작성 이벤트 참여는 2023. 02. 19(일)까지 진행됩니다.  </li>
                    <li>본 이벤트는 홈페이지 로그인 후 참여 가능합니다. </li>
                    <li>작성해 주신 문제복기 및 합격수기 정보는 윌비스 임용에 귀속되며, 마케팅에 활용될 수 있습니다. </li>
                    <li>본 이벤트1, 이벤트2는 중복 참여 가능합니다.</li>
                    <li>당첨 인원 미달시 상품의 일부만 제공될 수 있습니다.</li>
                    <li>당첨자는 소득신고를 위해 신분증 사본의 제출을 요구할 수 있습니다. (5만원이상 상품) </li>
                    <li>무성의한 글은 당첨에서 제외됩니다. </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            $('.btn-login-check').on('click', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            });
            fnReviewList();
        });

        function fnRecallSubmit()
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

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
                if ($(this).val() == '') {
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

            var _url = '{!! front_url('/promotion/storePromotionRecall/') !!}';
            ajaxSubmit($regi_form, _url, function (ret) {
                if (ret.ret_cd) {
                    alert('제출되었습니다.');
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function fnReviewList(page,cate_code,subject_idx,keyword){
            var _url = '{{ site_url('/support/review/listReviewAjax') }}';
            var data = {
                's_site_code' : '{{ $__cfg['SiteCode'] }}',
                'list_cate_code' : cate_code,
                'list_subject_idx' : subject_idx,
                'list_keyword' : keyword,
                'page' : page,
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#reviewListWrap").html(ret);
                }
            }, showAlertError, false, 'GET', 'html');
        }

        //파일 확장자 체크
        function fileExtCheck(strfile) {
            if( strfile != "" ){
                var ext = strfile.split('.').pop().toLowerCase();
                if($.inArray(ext, ['jpg','gif','png','pdf','zip']) == -1) {
                    alert('jpg 등의 이미지 형식과 pdf, zip 파일만 업로드 할수 있습니다.');
                    return false;
                }
            }
        }
    </script>

@stop