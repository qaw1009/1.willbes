@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#00c0df;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
  
        .eventTop {background:#00c0df url(https://static.willbes.net/public/images/promotion/2021/07/2286_top_bg.jpg) no-repeat center top;}


        .event02 {width:1120px; margin:0 auto; padding:100px 64px; background:#fff}
        .evt_table table{width:100%;border-top:1px solid #01bfdf; border-left:1px solid #01bfdf}
        .evt_table table tr {border-bottom:1px solid #01bfdf}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666; line-height:1.5; padding:10px; border-right:1px solid #01bfdf;}
        .evt_table table th {background:#14a0b7; color:#fff; }
        .evt_table table th.st02 {background:#e5f8fc; color:#000;  vertical-align:top}
        .evt_table table th.st02 div {margin-bottom:10px; color:#14a0b7}
        .evt_table table td {text-align:left; padding:15px 40px}
        .evt_table table td.ctsBox .imgBox {max-width:40%; max-height:180px; overflow:hidden; float: left; margin:0 20px 10px 0}
        .evt_table table td.ctsBox img {max-width:100%}
        .evt_table table td.ctsBox .imgBoxFull {width:100%; max-height:180px; overflow:hidden; margin-bottom:10px}
        .evt_table table th .btnDel {display:block; background:#000; color:#fff; border-radius:4px; width:50px; padding:4px 0; margin:10px auto 0; font-size:12px}

        .evt_table input {vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:top; border:1px solid #ccc;}

        .evt_table .textarBx textarea {width:100%; padding:20px; border:1px solid #7cdfef; color:#666}
        .evt_table .btns {margin-top:40px}
        .evt_table .btns a {display:inline-block; width:200px; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#0052a4; margin:0 10px;}
        .evt_table .btns a:last-child {background:#a4a4a4}
        .evt_table .btns a:hover {background:#ffca26}

        .evtSearch {margin-top:50px; font-size:14px}
        .evtSearch select,
        .evtSearch input {height:40px; line-height:40px; vertical-align:middle; padding:0 5px }
        .evtSearch input {width:300px; background:#f6f6f6; border:0}
        .evtSearch .search-Btn {display:inline-block; height:40px; line-height:40px; padding:0 20px; background:#0052a4; color:#fff; vertical-align:middle;}

        .event02 .Paging a.on {color:#fe544a; text-decoration:none}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        #del_btn { position:absolute; bottom:0; right:0; background:#333; color:#fff; font-size:14px; width:20px; line-height:20px; border-radius:4px; text-align: center}
    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/07/2286_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
        	<img src="https://static.willbes.net/public/images/promotion/2021/07/2286_01.jpg" alt="이벤트 하나"/>
        </div>        

        <div class="evtCtnsBox event02">
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
                                <th>공부 인증 첨부 (필수!)</th>
                                <td>
                                    <div>
                                        <input type="file" id="attach_file" name="attach_file" onchange="chkUploadFile(this);" style="width:60%"/>&nbsp;&nbsp;
                                        <a href="javascript:void(0);" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a>
                                        {{--<p class="tx12 mt10">*파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등)만 가능합니다.</p>--}}
                                    </div>
                                </td>                           
                            </tr>
                            <tr>
                                <th>
                                    나만의 슬럼프<br/>
                                    극복법 작성<br/>
                                    (당첨 확률 높이기~!)
                                </th>
                                <td>
                                    <div class="textarBx">
                                        <textarea id="register_data1" name="register_data1" cols="30" rows="5" maxlength="250" title="댓글" placeholder="더위를 이기는 법, 체력 관리 법,&#10;좋은 휴식 추천, 집중력을 높이는 법 등 &#10;추천하고 싶은 나만의 슬럼프 극복법을 남겨 주세요~~!"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btns NSK-Black">
                        <a href="javascript:void(0);" onclick="fn_submit();">등록하기</a>
                        <a href="javascript:void(0);" onclick="reset_form(this);">초기화</a>
                    </div>
                </div>

                <div class="evt_table mt100" id="studyCertWrap">
                </div>
            </form>
        </div> 

        <div class="evtCtnsBox event03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2286_02.jpg"/>
        </div>

        {{--
        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">이벤트 유의사항</h4>
                <ul>
                    <li>이벤트 기간: 4월 29일 ~ 5월 28일</li>
                    <li>당첨자 발표: 5월 31일</li>
                    <li>상품 증정: 6월 3일</li>
                    <li>이벤트 선물의 중복 제공은 되지 않습니다.</li>
                    <li>감사의 인사가 들어가지 않은 내용은 이벤트에서 제외됩니다.</li>
                    <li>선물은 모바일 기프티콘으로 제공됩니다.</li>
                    <li>이벤트 참여자 수가 기준보다 적은 경우 모든 상품이 증정되지 않을 수 있습니다.</li>
                </ul>
            </div>
        </div>  
        --}}

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form_register = $('#regi_form_register');

        $(function(){
            fnRegisterList();
        });

        function fnRegisterList(page,search_type,search_value){
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
                }
            }, showAlertError, false, 'GET', 'html');
        }

        function fn_submit() {
            @if(ENVIRONMENT == 'production')
                @if(date('YmdHi') > '202108160000')
                alert('종료된 이벤트 입니다.');
                return;
                @endif
            @endif

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var _url = '{!! front_url('/event/registerStore') !!}';

            if (!$regi_form_register.find('input[name="attach_file"]').val()) {
                alert('이미지를 등록해 주세요.');
                $regi_form_register.find('input[name="attach_file"]').focus();
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
    </script>

@stop