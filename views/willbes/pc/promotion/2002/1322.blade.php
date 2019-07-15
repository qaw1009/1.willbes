@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent { 
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .wbCommon {width:100%; text-align:center; min-width:1120px;}
        span {vertical-align:auto}

        /************************************************************/  

        .wb_00 {background:url(https://static.willbes.net/public/images/promotion/2019/07/1322_top_bg.jpg) no-repeat center top;}        
        .wb_01 {background:#202020 url(https://static.willbes.net/public/images/promotion/2019/07/1322_01_bg.jpg) no-repeat center top;}
        .wb_01 .tab {border-bottom:5px solid #68acff; width:854px; margin:0 auto}
        .wb_01 .tab li {display:inline; float:left; width:50%}
        .wb_01 .tab li a {display:block; text-align:center; font-size:26px; font-weight:bold; background:#515151; color:#7d7d7d; height:63px; line-height:63px}
        .wb_01 .tab li a:hover,
        .wb_01 .tab li a.active {background:#68acff; color:#fff;}
        .wb_01 .tab:after {content:""; display:block; clear:both}
        .wb_01 .youtube iframe {width:854px; height:480px; margin:0 auto}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:854px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px; top:46%; width:80px; height:80px;}
        .slide_con p.rightBtn {right:-40px;top:46%; width:80px; height:80px;}

        .wb_02 {background:#fae8d8 url(https://static.willbes.net/public/images/promotion/2019/07/1322_02_bg.jpg) no-repeat center top; line-height:1.4} 
        
        .wb_02 .request {
            width:1000px; text-align:left; background:#fff; padding:50px; font-size:14px; margin:0 auto 100px; 
            box-shadow: 10px 10px 10px rgba(010,0,0,.1);
        }
        .wb_02 .request h3 {font-size:30px; padding-bottom:10px; margin-bottom:30px; border-bottom:2px solid #c14842}
        .wb_02 .request h3 span {color:#c14842;}
        .wb_02 .request p {font-size:16px; margin-bottom:10px; font-weight:bold}
        .wb_02 .request li {margin-bottom:10px}
        .wb_02 .request .tit { display:inline-block; width:70px;}  
        .wb_02 .request input[type="text"] {width:160px; height:26px; border:1px solid #999; padding:0 10px; color:#666}
        .wb_02 .request input[type="checkbox"] {width:20px; height:20px; border:1px solid #999;}  
        .wb_02 .termsBx {margin-bottom:20px}
        .wb_02 .termsBx a {display:block; width:250px; border-radius:4px; color:#fff; background:#c14842; text-align:center; height:50px; line-height:50px;
            font-size:18px; border-bottom:5px solid #6b1612; margin-bottom:20px;
        }
        .wb_02 .termsBx a:hover {background:#a8312b;}
        .wb_02 .termsBx li {display:inline; float:left; margin-right:10px}
        .wb_02 .termsBx:after {content:''; display:block; clear:both} 
        .wb_02 .termsBx01 {margin:30px 0}
        .wb_02 .termsBx01 ul {height:100px; overflow-y:scroll; border:1px solid #999; margin-bottom:10px; font-size:12px; color:#666; padding:0 10px}
        .wb_02 .request .btn {clear:both; border-top:1px solid #c14842;}
        .wb_02 .request .btn a {width:100px; display:block; text-align:center; background:#c14842; color:#fff; margin:30px auto 0; height:40px; line-height:40px}
        .wb_02 .request .btn a:hover {background:#000;}
        .wb_02 .request:after {content:''; display:block; clear:both}  
        input[type=file]:focus {border:1px solid #1087ef}    
               	
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="wbCommon wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1322_top.jpg" title="합격자의밤" />
        </div>
		
		<div class="wbCommon wb_01">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_01.jpg" title=" " /></div>
            <ul class="tab">
                <li><a href="#tab01" class="active">18년 3차 합격자의 밤</a></li>
                <li><a href="#tab02">18년 2차 합격자의 밤</a></li>
            </ul>
            <div class="youtube" id="tab01"><iframe src="https://www.youtube.com/embed/Ugzo18tp4Ag?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div class="youtube" id="tab02"><iframe src="https://www.youtube.com/embed/NxsREWiD_ME?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_02.png" usemap="#Map1322A" title=" " border="0" />
                <map name="Map1322A" id="Map1322A">
                    <area shape="rect" coords="309,153,812,233" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ/search?query=%ED%95%A9%EA%B2%A9%EC%9E%90%EC%9D%98+%EB%B0%A4" target="_blank" alt="더 많은 영상 보러가기" />
                </map>
            </div>
            <div class="slide_con">
                <ul id="slidesImg7">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_img01.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_img02.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_img03.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_img04.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_img05.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_img06.jpg" alt="#" /></li>
                </ul>            
                <p class="leftBtn"><a id="imgBannerLeft7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_pre.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_next.png" alt="다음" /></a></p>
            </div>            
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1322_01_03.jpg" usemap="#Map1322B" title=" " border="0" />
                <map name="Map1322B" id="Map1322B">
                    <area shape="rect" coords="304,150,817,234" href="https://police.willbes.net/pass/offinfo/gallery/index" target="_blank" alt="더 많은 사진보기" />
                </map>
            </div>
		</div>

   		<div class="wbCommon NSK wb_02">            
            <div><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_02.jpg" title=" " /></div>
            <!--
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_name"  id ="register_name" value="{{ sess_data('mem_name') }}"/>
                <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
                <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="합격청"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="응시번호"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="register_type" value="promotion"/>

                
                <div class="request" id="request">
                    <h3>윌비스 신광은경찰 <span class="strong">합격자의 밤</span> 신청 </h3>
                    <div class="termsBx">
                        <p>수강생 정보</p>
                        <ul>
                            <li>
                                <input type="text" id="userName" name="userName" value="{{sess_data('mem_name')}}" placeholder="이름" title="이름" readonly="readonly"/>
                            </li>
                            <li>
                                <input type="text" id="userId" name="userId" value="{{sess_data('mem_id')}}" title="연락처" placeholder="아이디" readonly="readonly"/>
                            </li>
                            <li>
                                <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" placeholder="전화번호 숫자만 입력.">
                            </li>
                            <li>
                                <input type="text" id="register_data1" name="register_data1" value="" placeholder="합격청">
                            </li>
                            <li>
                                <input type="text" id="register_data2" name="register_data2" value="" placeholder="응시번호">
                            </li>
                        </ul>
                    </div>

                    <div class="termsBx">
                        <a href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" target="_blank" class="file">참여신청 양식 파일 받기 ↓</a> 

                        <p>참여신청 양식 등록</p>
                        <input type="file" name="ATTACH_FILE" id="ATTACH_FILE" style="width:300px"><br>
                        • 참여신청 양식 파일 2MB까지 업로드 가능하며, 이미지파일 (jpg, png, gif 등) 또는 PDF파일 형태로 첨부
                    </div>

                    <div class="termsBx01">
                        <p>개인정보 수집/이용 동의 안내</p>
                        <ul>
                            <li>
                            1. 개인정보 수집 이용 목적<br>
                            - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                            - 통계분석 및 마케팅<br>
                            - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                            </li>
                            <li>
                            2. 개인정보 수집 항목<br>
                            - 필수항목 : 성명, 연락처, 이메일
                            </li>
                            <li>
                            3. 개인정보 이용기간 및 보유기간<br>
                            - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                            </li>
                            <li>
                            4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                            </li>
                            <li>
                            5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                            </li>
                            <li>
                            6. 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
                            </li>
                        </ul>
                        <input type="checkbox" id="is_chk" name="is_chk" value="Y" title="개인정보 수집/이용 동의"> <label for="is_chk">윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>

                    <div class="btn">
                        <a href="#none" onclick="javascript:fn_submit();">신청하기</a>
                    </div>
                </div>
            </form>          
            -->
            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2019/07/1322_02_01.jpg" title=" " /></div>
        </div>  

        
    </div>
    <!-- End Container -->   

    <script>
        $(document).ready(function() {
            var slidesImg7 = $("#slidesImg7").bxSlider({
            //mode:'fade', option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            controls:false,
            slideWidth:980,
            autoHover: true,
            pager:false,
            });

            $("#imgBannerLeft7").click(function (){
            slidesImg7.goToPrevSlide();
            });
            $("#imgBannerRight7").click(function (){
            slidesImg7.goToNextSlide();
            });
	    });

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            var is_login = '{{sess_data('is_login')}}';
            if (is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    /*location.reload();*/
                }
            }, showValidateError, null, false, 'alert');
        }

        var tab1_url = "https://www.youtube.com/embed/Ugzo18tp4Ag?rel=0";
        var tab2_url = "https://www.youtube.com/embed/NxsREWiD_ME?rel=0";       


        $(function() {
            $(".youtube").hide();
            $(".youtube:first").show();
            $(".tab li a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#tab01"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab02"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }
                $(".tab a").removeClass("active");
                $(this).addClass("active");
                $(".youtube").hide();
                $(".youtube").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });
        }); 
    </script>
    
@stop