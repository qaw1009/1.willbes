@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
 
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}        

        /************************************************************/

        .skyBanner {position:fixed; width:180px; top:250px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:10px}

        .evtTop {background:#464bdb url(https://static.willbes.net/public/images/promotion/2021/01/2038_top_bg.jpg) repeat-y center top;}
        .evt01 {background:#4346df}
        .evt02 {background:#383840}
        .evt03 {background:#e6e6e6}

        .evt04 {background:#ffd66a; padding-bottom:100px}
        .evt04 .evt04top {position:relative; width:1120px; margin:0 auto}
        .evt04 .evt04top a {position: absolute; width: 28.39%; height: 14%; top: 58.25%; z-index: 2;}
        .evt04 .evt04top a.link01 {left: 6.25%;}
        .evt04 .evt04top a.link02 {left: 35.45%;}
        .evt04 .evt04top a.link03 {left: 64.82%;}
        .evt04 > div {width:1045px; margin:0 auto}
        .evt04 ul {margin-right:-10px;}
        .evt04 li {display:inline; float:left; width:50%; margin-bottom:10px}
        .evt04 li a {margin-right:10px}
        .evt04 ul:after {content:''; display:block; clear:both}
        .evt05 {width:1120px; margin:0 auto; padding:100px 0}
        .evt05 table{width:100%;border-top:1px solid #c1c1c1}
        .evt05 table tr{border-bottom:1px solid #c1c1c1}
        .evt05 table th {color:#fff; background:#49569e; font-size:16px; font-weight:300; padding:15px 0; text-align:center;}
        .evt05 table td{padding:0 10px; font-size:14px; color:#000; text-align:left; padding:10px}
        .evt05 table td input[type=file] {width:300px}
        .evt05 table td a.delbtn {display:block; border-radius: 5px; background-color:#49569e; color:#fff; text-align:center; padding:5px; width:50px; margin:10px auto 0}
        .evt05 .btns {margin-top:50px}
        .evt05 .btns a {display:inline-block; padding:10px 20px; color:#fff; background:#4c49de; font-size:20px; border:1px solid #4c49de; margin-right:10px}
        .evt05 .btns a:last-child {background:#fff; color:#4c49de; margin:0}
        .evt05 .list td {text-align:center; color:#666}
        .evt05 .list td img {width:250px}
        .evt05 .list td:nth-child(3) {text-align:left}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="skyBanner">
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sky2.png" alt="영상 바로가기"/></a>
            <a href="#evt05"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_sky.png" alt="이벤트 참여"/></a>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_top.jpg" alt="윌비스 임용 유튜브 이벤트"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_01.jpg" alt="구독, 좋아요, 알림설정"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_02.jpg" alt="이벤트 상품"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_03.jpg" alt="참여방법"/>
        </div>

        <div class="evtCtnsBox evt04" id="evt04">
            <div class="evt04top">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04.jpg" alt=""/>
                <a href="https://www.youtube.com/channel/UCzF3YAxdQmtZcUqsEUFLRMQ" title="유튜브" target="_blank" class="link01"></a>
                <a href="https://tv.naver.com/wbssam" title="네이버TV" target="_blank" class="link02"></a>
                <a href="https://tv.kakao.com/channel/2687619/video" title="카카오TV" target="_blank" class="link03"></a>
            </div>
            <div>
                <ul>
                    <li><a href="https://youtu.be/sLuznU9Rmd0" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_01.jpg" alt="교육학 이인재"/></a></li>
                    <li><a href="https://youtu.be/Afj5ci5H2xg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_02.jpg" alt="교육학 홍의일"/></a></li>
                    <li><a href=https://youtu.be/Y2W3lUrn3aI?t=1" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_03.jpg" alt="유아 민정선"/></a></li>
                    <li><a href="https://youtu.be/1Tof3jVF__E" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_04.jpg" alt="초등 배재민"/></a></li>
                    <li><a href="https://youtu.be/nmqJSQbE0v4" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_05.jpg" alt="전공국어 송원영"/></a></li>
                    <li><a href="https://youtu.be/9XNWbFy2PWk" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_06.jpg" alt="도덕윤리 김병찬"/></a></li>
                    <li><a href="https://youtu.be/1arYo1DapLU" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_07.jpg" alt="전공영어 김유석"/></a></li>
                    <li><a href="https://youtu.be/eG64tzalqvg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_08.jpg" alt="영어학 김영문"/></a></li>
                    <li><a href="https://youtu.be/2ElZCe1dnCw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_09.jpg" alt="진공수학 김철홍"/></a></li>
                    <li><a href="https://youtu.be/ZinD4SnjwYg" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_10.jpg" alt="수학교육론 박태영"/></a></li>
                    <li><a href="https://youtu.be/hPXBthC1xmU" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_11.jpg" alt="전공생물 강치욱"/></a></li>
                    <li><a href="https://youtu.be/FBCYeuT0OmA" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_12.jpg" alt="생물교육론 양혜정"/></a></li>
                    <li><a href="https://youtu.be/9zke9kFEhNw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_13.jpg" alt="전공음악 다이애나"/></a></li>
                    <li><a href="https://youtu.be/mZDUnozVMB8" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_14.jpg" alt="전전통 최우영"/></a></li>
                    <li><a href="https://youtu.be/LMdBFMmmfUE" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_15.jpg" alt="정보컴퓨터 송광진"/></a></li>
                    <li><a href="https://youtu.be/GO1B5Hicnbw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_16.jpg" alt="정컴교육론 장순선"/></a></li>
                    <li><a href="https://youtu.be/Jed0DiKyYhw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_17.jpg" alt="전공역사 최용림"/></a></li>
                    <li><a href="https://youtu.be/JQ4KMa11Q-o" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2038_04_18.jpg" alt="전공중국어 정경미"/></a></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt05" id="evt05">
            <div>
                <form name="regi_form_register" id="regi_form_register">
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                    <input type="hidden" name="register_type" value="promotion"/>
                    <input type="hidden" name="register_overlap_chk" value="Y"> {{-- 중복 신청 가능여부 --}}
                    <input type="hidden" name="file_chk" value="Y"/>
                    <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
                    <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] }}"/>
                    <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>
                    <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">

                    <table>
                        <col width="15%">
                        <col width="35%">
                        <col width="15%">
                        <col width="*">
                        <tbody>
                        <tr>
                            <th>과목선택</th>
                            <td>
                                <select name="register_data1" id="register_data1">
                                    <option value="">선택</option>
                                    @foreach($arr_base['subject'] as $key => $val)
                                        @if($key <= $arr_base['max_subject_idx'])
                                            <option value="{{ $val }}">{{ $val }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <th>* 윌비스 ID</th>
                            <td>{{sess_data('mem_id')}}</td>
                        </tr>
                        <tr>
                            <th>* 캡쳐 이미지 첨부</th>
                            <td colspan="3">
                                <input type="file" id="attach_file" name="attach_file" onChange="chkUploadFile(this)"/>
                                <a href="#none" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="btns">
                        <a href="#none" onclick="fn_submit();">확인</a>
                        <a href="#none" onclick="reset_form(this);">취소</a>
                    </div>
                </form>
            </div>

            <div id="registerListWrap">
            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <ul>
                    <li>한 개의 인증 게시물로 추첨 선물 증정 대상으로 선정된 경우, 전원 증정 선물과 중복 증정은 되지 않습니다.</li>
                    <li>여러 개의 게시물을 업로드 했을 경우, 추첨과 전원 증정 각각 하나씩 증정은 가능하나, 같은 상품의 중복 증정은 되지 않습니다.</li>
                    <li>같은 이미지를 중복해서 올리는 것은 인정되지 않습니다. (각기 다른 영상에 ‘좋아요’ 인증만 인정)</li>
                    <li>이벤트 당첨 대상자는 2월 23일(화) 17시에 발표할 예정입니다.</li>
                    <li>상품은 모바일 기프티콘으로 2월 26일(금)에 일괄 발송될 예정입니다.</li>
                    <li>이벤트 참여는 유튜브 채널 구독 중인 경우만 가능합니다.</li>
                </ul>
            </div>
        </div>        
    </div>
    <!-- End Container -->



    <script>
        var $regi_form_register = $('#regi_form_register');

        $(function (){
            fnRegisterList();
        });

        function fnRegisterList(page){
            var _url = '{{ site_url('/event/listRegisterAjax') }}';
            var data = {
                'el_idx' : '{{ $data['ElIdx'] }}',
                'page' : page,
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#registerListWrap").html(ret);
                }
            }, showAlertError, false, 'GET', 'html');
        }

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var _url = '{!! front_url('/event/registerStore') !!}';

            if (!$regi_form_register.find('select[name="register_data1"]').val()) {
                alert('과목을 선택해 주세요.');
                $regi_form_register.find('select[name="register_data1"]').focus();
                return;
            }

            if (!$regi_form_register.find('input[name="attach_file"]').val()) {
                alert('이미지를 등록해 주세요.');
                $regi_form_register.find('input[name="attach_file"]').focus();
                return;
            }

            if (confirm('저장하시겠습니까?')) {
                ajaxSubmit($regi_form_register, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        function chkUploadFile(elem){
            if($(elem).val()){
                var filename =  $(elem).prop("files")[0].name;
                var ext = filename.split('.').pop().toLowerCase();

                if($.inArray(ext, ['jpg', 'png']) == -1) {
                    $(elem).val("");
                    alert('jpg, png 만 업로드 가능합니다.');
                }
            }
        }

        function reset_form(elem){
            $(elem).closest('form').get(0).reset();
        }

        function del_file(){
            if(confirm("첨부파일을 삭제 하시겠습니까?")) {
                $("#attach_file").val("");
            }
        }
    </script>
@stop