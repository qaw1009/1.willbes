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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:#67c0c1}

        .event01 {background:#429697; padding:50px 0; color:#fff}
        .event01 .title {font-size:50px;}

        .event01_1 {background:#fff; width:1120px; margin:0 auto; padding:100px 0; font-size:14px}
        .event01_1 .title { font-size:40px; color:#67c0c1; margin-bottom:50px}
        .event01_1 span {vertical-align:top}

        .event02 {background:#65bebf; position:relative; padding:50px 0 100px}
        .evt_table{position:absolute; top:1170px; width:800px; left:50%; margin-left:-400px}
        .evt_table table{width:100%;}
        .evt_table table th,
        .evt_table table td {margin:10px 0}
        .evt_table table th div{background:#67c0c1; color:#fff; font-size:20px; font-weight:300; height:80px; line-height:80px}
        .evt_table table td div{font-size:20px; font-weight:300; height:80px; line-height:80px} 
        .evt_table table td{font-size:20px; color:#000; font-weight:300; text-align:left; padding:10px}   
        .evt_table table tr:nth-child(2) td div {border-bottom:2px solid #67c0c1}     
        .evt_table table tr:last-child td div {line-height:1.4; padding-top:15px}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:top; font-size:16px}
        .evt_table td div a {vertical-align:top; line-height:1}
        .evt_table select {font-size:20px; font-weight:300; height:80px; padding:0 10px}
        .evt_table .btns {margin-top:50px}
        .evt_table .btns a {display:inline-block; width:260px; text-align:center; height:80px; line-height:80px; font-size:30px; color:#000; background:#f6f859}
        .evt_table .btns a:last-child {background:#000; color:#fff; margin-left:30px;}

        .event02 .imgSlider {position:relative; width:100%; margin:100px auto 0;}
        .event02 .imgSlider > div {width:980px; margin:0 auto; height:228px; overflow:hidden;}
        .event02 .imgSlider li {display:inline-block; float:left; width:180px}
        .event02 .imgSlider p {position:absolute; top:50%; left:50%; width:38px; height:72px; margin-top:-36px; z-index:100}
        .event02 .imgSlider p a {cursor:pointer}
        .event02 .imgSlider p.leftBtn {margin-left:-588px}
        .event02 .imgSlider p.rightBtn {margin-left:550px}

        .event02 .imgSlider .imgWrap {background:#fff; border-radius:20px; width:180px; padding:0 15px 15px}
        .event02 .imgSlider .imgWrap .listTitle {color:#333; padding:15px 0; font-size:16px}
        .event02 .imgSlider .imgWrap .listTitle span {color:#3b9091; vertical-align:top}
        .event02 .imgSlider .imgWrap .listTitle a {display:inline-block; background:#333; color:#fff; font-size:14px; width:20px; line-height:20px;  border-radius:4px; float:right}
        .event02 .imgSlider .imgWrap .imgBox {width:150px; height:165px; margin:0 auto; overflow:hidden}

        .event02 .imgSlider > div {width:980px; margin:0 auto; height:auto; overflow:hidden;}
        .event02 .imgSlider .list ul {margin-right:-20px}
        .event02 .imgSlider .list li {display:inline-block; float:left; width:180px; margin-right:20px; margin-bottom:20px;}

        .event02 .Paging a {color:#fff}
        .event02 .Paging a.on {color:#f6f859; text-decoration:none}

        .event03 {background:#4ea5a6;}

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
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2052_top.jpg" alt="합격축하 이벤트"/>
        </div>


        <div class="evtCtnsBox event01">
            <div class="title NSK-Black"><img src="https://static.willbes.net/public/images/promotion/2021/04/2052_title_01.jpg"/></div>
        </div>       
        
        <div class="evtCtnsBox problem">
            <div class="title NSK-Black">2차 문제복기 이벤트 참여하기</div>
            <div>
                <table cellspacing="0" cellpadding="0">
                    <col />
                    <tr>
                        <th>회원정보</th>
                        <td>홍길동(아이디***)</td>
                        <th>응시정보</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div> 

        <div class="evtCtnsBox event01_1" id="reviewListWrap">
        </div>

        <div class="evtCtnsBox event01">
            <div class="title NSK-Black"><img src="https://static.willbes.net/public/images/promotion/2021/04/2052_title_02.jpg"/></div>
        </div>
        
        <div class="evtCtnsBox event02" id="event02">
            
            <!--<img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_01.jpg" alt="이벤트 둘"/>-
            
            <div class="evt_table">
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
                        <col width="35%" />
                        <col  />
                        <tbody>
                            <tr>
                                <th><div>과목</div></th>
                                <td>
                                    <select name="register_data1" id="register_data1" class="seleDiv" style="width:100%;">
                                        <option value="">선택</option>
                                        @foreach($arr_base['subject'] as $key => $val)
                                            @if($key <= $arr_base['max_subject_idx'] && $val != '교육학')
                                                <option value="{{ $val }}">{{ $val }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><div>이름</div></th>
                                <td><div>{{ sess_data('mem_name') }}</div></td>
                            </tr>
                            <tr>
                                <th><div>합격 인증 파일 첨부</div></th>
                                <td colspan="3">
                                    <div>
                                        <input type="file" id="attach_file" name="attach_file" onChange="chkUploadFile(this)" style="width:60%"/>&nbsp;&nbsp;
                                        <a href="#none" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a>

                                        <p class="tx12 mt10">*파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등)만 가능합니다.</p>
                                    </div>
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
            -->
            <div id="imgSliderWrap"></div>
        </div>        

        <div class="evtCtnsBox event03">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2052_03.jpg" alt="합격을 진심으로 축하합니다."/>
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
        var $regi_form_register = $('#regi_form_register');

        $(document).ready(function() {
            fnReviewList();
            fnRegisterList();

            var sliderImg = $("#sliderImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:5,
                maxSlides:5,
                slideWidth: 180,
                slideMargin:20,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft").click(function (){
                sliderImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                sliderImg.goToNextSlide();
            });
        });

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

        function fnRegisterList(page){
            var _url = '{{ site_url('/event/listRegisterAjax') }}';
            var data = {
                'el_idx' : '{{ $data['ElIdx'] }}',
                'file_type': '_pass_cert',
                'limit' : 25,
                'page' : page,
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#imgSliderWrap").html(ret);
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

                if($.inArray(ext, ['gif','jpg','jpeg','png','bmp']) == -1) {
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