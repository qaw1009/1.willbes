@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:#00c0df url(https://static.willbes.net/public/images/promotion/2022/08/2761_top_bg.jpg) no-repeat center top;}


        .event03 {width:1120px; margin:0 auto; padding:100px 64px; background:#fff}
        .event03 h4 {font-size:40px; margin-bottom:50px}
        .evt_table table{width:100%;border-top:1px solid #333; border-left:1px solid #333}
        .evt_table table tr {border-bottom:1px solid #333}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666; line-height:1.5; padding:10px; border-right:1px solid #333;}
        .evt_table table th {background:#f2f2f2; color:#000; }
        .evt_table table th.st02 {background:#e5f8fc; color:#000;  vertical-align:top}
        .evt_table table th.st02 div {margin-bottom:10px; color:#14a0b7}
        .evt_table table td {text-align:left; padding:15px 40px}
        .evt_table table td.ctsBox .imgBox {max-width:40%; max-height:180px; overflow:hidden; float: left; margin:0 20px 10px 0}
        .evt_table table td.ctsBox img {max-width:100%}
        .evt_table table td.ctsBox .imgBoxFull {width:100%; max-height:360px; overflow:hidden; margin-bottom:10px}
        .evt_table table th .btnDel {display:block; background:#000; color:#fff; border-radius:4px; width:50px; padding:4px 0; margin:10px auto 0; font-size:12px}

        .evt_table input {vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:top; border:1px solid #666;}

        .evt_table .textarBx textarea {width:100%; padding:20px; border:1px solid #999; color:#666}
        .evt_table .btns {margin-top:40px}
        .evt_table .btns a {display:inline-block; width:300px; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#ee454a; margin:0 10px; border-radius:30px}
        .evt_table .btns a:last-child {background:#a4a4a4}
        .evt_table .btns a:hover {background:#000}

        .evt_table .txtInfo {padding:20px; text-align:left; font-size:14px; line-height:1.2; color:#999}
        .evt_table .txtInfo input[type=checkbox] {width:20px; height:20px}
        .evt_table .txtInfo p {margin-top:20px; color:#333; font-size:16px; border-top:1px solid #333; padding-top:10px}

        .evtSearch {margin-top:50px; font-size:14px}
        .evtSearch select,
        .evtSearch input {height:40px; line-height:40px; vertical-align:middle; padding:0 5px }
        .evtSearch input {width:300px; background:#f6f6f6; border:0}
        .evtSearch .search-Btn {display:inline-block; height:40px; line-height:40px; padding:0 20px; background:#ee454a; color:#fff; vertical-align:middle;}


        .event03 .Paging a.on {color:#fe544a; text-decoration:none}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        #del_btn { position:absolute; bottom:0; right:0; background:#333; color:#fff; font-size:14px; width:20px; line-height:20px; border-radius:4px; text-align: center}
    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/08/2761_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/08/2761_01.jpg" alt="이벤트 하나"/>
        </div>   
        
        <div class="evtCtnsBox event02" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/08/2761_02.jpg" alt="이벤트 둘"/>
        </div>  

        <div class="evtCtnsBox event03" data-aos="fade-up">
            <h4 class="NSK-Black">학습 인증샷 이벤트 참여하기</h4>
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="file_chk" value="Y"/>
                <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] or "" }}"/>
                <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>
                <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
                <input type="hidden" name="register_overlap_chk" value="Y"> {{-- 중복 신청 가능여부 --}}

                <div class="evt_table">
                    <table border="0" cellspacing="2" cellpadding="2">
                        <col width="20%" />
                        <col  />
                        <tbody>
                            <tr>
                                <th>학습 인증 첨부 (필수!)</th>
                                <td>
                                    <div>
                                        @if(sess_data('is_login') === true)
                                            <input type="file" id="attach_file" name="attach_file" onchange="chkUploadFile(this);" style="width:60%"/>&nbsp;&nbsp;
                                            <a href="javascript:void(0);" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a>
                                            <p class="tx12 mt10">* 첨부파일은 최대 10MB 이하의 이미지 파일(png, jpg, gif, bmp) 만 가능합니다. </p>
                                        @else
                                            <span onclick="loginCheck();">로그인 후 이용하여 주십시오.</span>
                                        @endif
                                    </div>
                                </td>                           
                            </tr>
                            <tr>
                                <th>
                                학습상황에 관한<br>
                                단한 글 작성 
                                </th>
                                <td>
                                    <div class="textarBx">
                                        <textarea id="etc_data" name="etc_data" cols="30" rows="5" maxlength="250" title="댓글" placeholder="학습상황에 관한 간단한 글을 작성해 주세요! &#10;(현재 공부과목, 합격 다짐, 계획대로 진행여부 등)" onclick="loginCheck();"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="txtInfo">
                        1. 개인정보 수집 이용 목적<br>
                            - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                            - 이벤트 참여에 따른 선물 추첨 시 활용<br>
                            <br>
                        2. 개인정보 수집 항목<br>
                            - 신청인의 이름, 연락처 <br>
                            <br>
                        3. 개인정보 이용기간 및 보유기간<br>
                            - 본 수집, 활용목적 달성 후 바로 파기<br>
                            <br>
                        4. 개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                        <p><input name="is_chk" id="is_chk" type="checkbox" value="Y"> <label for="is_chk">윌비스에 개인정보 제공 동의하기(필수)</label></p>
                    </div>
                    <div class="btns NSK-Black">
                        <a href="javascript:void(0);" onclick="fn_submit();">학습 인증샷 올리기</a>
                        <a href="javascript:void(0);" onclick="reset_form(this);">초기화</a>
                    </div>
                </div>

                <div class="evt_table mt100" id="studyCertWrap">
                </div>
            </form>
        </div> 


        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">추석맞이 열공지원 이벤트 유의사항</h4>
                <ul>
                    <li>본 추석맞이 열공지원 이벤트 기간은 2022. 09. 05.(월)~ 09. 30.(금)까지 입니다. </li>
                    <li>본 이벤트의 참여자중 추첨을 통하여 선물을 드립니다. <br>
                        (발표: 10.05.(수)-홈페이지 공지사항 / 선물지급: 10.07.(금)-개인별 지급) </li>
                    <li>이벤트1(이벤트 기간 수강신청하면 선물지급)의 대상강의는 패키지, 정규 단과입니다. (각종 특강은 제외합니다.)</li>
                    <li>이벤트1에 참여하고, 선물을 받으신 경우, 강의 환불 시 선물비용이 차감됩니다. (선물비용은 개인별 안내)</li>
                    <li>이벤트2(학습인증하고 선물받자)는 윌비스 임용의 수강생이거나 수강하였던 분이 참여 가능합니다. </li>
                    <li>이벤트2는 평소 공부하는 공간을 인증하여 올려 주시고, 학습 상황에 관한 (간단한) 글을 올려 주시면 됩니다. 
                        (윌비스임용의 컨텐츠를 활용한 학습인증은 당첨 확률을 높일 수 있습니다.)</li>
                </ul>
            </div>
        </div>  


    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form_register = $('#regi_form_register');

        $(function(){
            fnRegisterList();
        });

        function fnRegisterList(page,search_type,search_value,move){
            var _url = '{{ site_url('/event/listRegisterAjax') }}';
            var data = {
                'el_idx' : '{{ $data['ElIdx'] }}',
                'search_type' : search_type,
                'search_value' : search_value,
                'file_type': '_study_cert',
                'limit' : 15,
                'page' : page,
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#studyCertWrap").html(ret);
                    if(move){
                        var offset = $("#studyCertWrap").offset();
                        $('html, body').animate({scrollTop : offset.top}, 400)
                    }
                }
            }, showAlertError, false, 'GET', 'html');
        }

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var _url = '{!! front_url('/event/registerStore') !!}';

            if (!$regi_form_register.find('input[name="attach_file"]').val()) {
                alert('이미지를 등록해 주세요.');
                $regi_form_register.find('input[name="attach_file"]').focus();
                return;
            }

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 제공 동의는 필수입니다.');
                return;
            }

            if (confirm('저장하시겠습니까?')) {
                ajaxSubmit($regi_form_register, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert('등록되었습니다.');
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        function chkUploadFile(elem){
            if($(elem).val()){
                var filename =  $(elem).prop("files")[0].name;
                var ext = filename.split('.').pop().toLowerCase();

                if($.inArray(ext, ['gif','jpg','jpeg','png','bmp']) === -1) {
                    $(elem).val("");
                    alert('이미지 파일만 업로드 가능합니다.');
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

        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

@stop