@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px; width:180px; z-index:1;}
        .sky a {display:block;margin-bottom:10px}

        .evtTop  {background:url(https://static.willbes.net/public/images/promotion/2023/03/2927_top_bg.jpg);}
        .evtTop span {position: absolute; top:350px; left:50%; margin-left:-437px; width:874px; z-index: 2;
            -webkit-animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
	        animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
        }
        @@keyframes slide-in-blurred-top {
            0% {
                -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                        transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                -webkit-transform-origin: 50% 0%;
                        transform-origin: 50% 0%;
                -webkit-filter: blur(40px);
                        filter: blur(40px);
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) scaleY(1) scaleX(1);
                        transform: translateY(0) scaleY(1) scaleX(1);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                -webkit-filter: blur(0);
                        filter: blur(0);
                opacity: 1;
            }
        }

       
        .evt01 {padding:150px 0}
        .request {width:1000px; margin:0 auto; padding:50px; text-align:left; font-size:14px;}
        .request h3 {font-size:17px; color:#000}
        .requestL h3 strong {color:#eb4626}
        .request td {padding:10px; line-height:1.5}
        .request input {height:26px;}
        .request input[type=checkbox],
        .request input[type=radio] {width:16px; height:16px}
        .requestL {width:49%; float:left}
        .requestL .sort li {display:inline-block; width:31.3333%}
        .requestR {width:49%; float:right;}
        .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:212px; overflow-y:scroll}        
        .requestR li {margin-bottom:5px; list-style-type: decimal; margin-left:20px}
        
        .requestR div {margin-top:10px}
        .request:after {content:""; display:block; clear:both}
        .evt01 .btn {clear:both; width:550px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt02 {background:#2d2638}
        .evt02 object {position: absolute; top:405px; left:50%; width:860px; height:484px; margin-left:-430px; z-index: 2; display:none}

        .evt03 {padding-top:150px}
        .evt03 .tabs {width:980px; margin:auto; display:flex}
        .evt03 .tabs a {display:block; padding:20px; font-size:48px; background:#ebebeb; color:#a8a8a8; width:50%}
        .evt03 .tabs a.active {background:#e95a50; color:#fff;}
        .evt03 .tabs a:last-child.active {background:#4f7bf6; color:#fff;}

        .evt04 {background:#eaeff5}

    </style>


<div class="evtContent NSK" id="evtContainer">
    <form name="regi_form_register" id="regi_form_register">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
        {{--@foreach($arr_base['register_list'] as $key => $val)
            <input type="hidden" name="register_chk[]" value="{{$val['ErIdx']}}"/>
        @endforeach--}}
        <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
        <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
        <input type="hidden" name="register_type" value="promotion"/>


        <div class="sky" id="QuickMenu">
            <a href="#link01"><img src="https://static.willbes.net/public/images/promotion/2023/03/2927_sky01.png" alt="면접캠프 설명회" ></a>
            <a href="#link02"><img src="https://static.willbes.net/public/images/promotion/2023/03/2927_sky02.png" alt="최종점검 실전면접캠프" ></a>       
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2927_top.jpg" alt="신승철 면접캠프" />
            <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2927_top_img.png" alt="신승철 면접캠프" /></span>
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2927_01.jpg" alt=""/>   
            <div class="request" id="request">
                <div class="requestL">
                    <h3 class="NSK-Black">* 실전면접캠프 설명회 신청접수</h3>
                    <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                        <col width="20%" />
                        <col  />
                        <tr>
                            <th>* 이름</th>
                            <td scope="col">
                                <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
                            </td>
                        </tr>
                        <tr>
                            <th>* 연락처</th>
                            <td>
                                <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" maxlength="11">
                            </td>
                        </tr>
                        <tr>
                            <th>* 참여일</th>
                            <td>
                                <ul>
                                    @foreach($arr_base['register_list'] as $key => $val)
                                        @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                                            @php
                                                // 강의 기간 지나면 자동 disabled 처리
                                                // 신청강의 날짜 형식. ex) 12.14 프리미엄올공반2차 설명회
                                                //                         2.8(토) 초시생을 위한 합격커리큘럼 설명회
                                                $reg_year = date('Y');
                                                $temp_date = explode(' ', $val['Name'])[0];
                                                if(strpos($temp_date, '(') !== false) {
                                                    $temp_date = substr($temp_date, 0, strpos($temp_date, '('));
                                                }
                                                $reg_month_day = explode('.', $temp_date);
                                                $reg_month = mb_strlen($reg_month_day[0], 'utf-8') == 1 ? '0'.$reg_month_day[0] : $reg_month_day[0] ;
                                                $reg_day = mb_strlen($reg_month_day[1], 'utf-8') == 1 ? '0'.$reg_month_day[1] : $reg_month_day[1] ;
                                                $reg_date = $reg_year.$reg_month.$reg_day.'0000';
                                                //echo date('YmdHi', strtotime($reg_date. '+1 days'));
                                            @endphp
                                            @if(time() >= strtotime($reg_date. '+1 days'))
                                                <li><input type="checkbox" name="register_disable[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" disabled="disabled"/> <label for="campus{{$key}}">{{$val['Name']}}</label></li>
                                            @else
                                                <li><input type="checkbox" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" /> <label for="campus{{$key}}">{{$val['Name']}}</label></li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>* 직렬</th>
                            <td>
                                <ul class="sort">
                                    <li><input type="radio" name="register_data2" id="CT1" value="일반남자" /> <label for="CT1">일반남자</label></li>
                                    <li><input type="radio" name="register_data2" id="CT2" value="일반여자" /> <label for="CT2">일반여자</label></li>
                                    <li><input type="radio" name="register_data2" id="CT3" value="101단" /> <label for="CT3">101단</label></li>
                                    <li><input type="radio" name="register_data2" id="CT4" value="경행경채" /> <label for="CT4">경행경채</label></li>
                                    <li><input type="radio" name="register_data2" id="CT5" value="기타" /> <label for="CT5">기타</label></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="requestR">
                    <h3 class="NSK-Black">* 개인정보 수집 및 이용에 대한 안내</h3>
                    <ul>
                        <li>
                        <strong>개인정보 수집 이용 목적</strong> <br>
                        - 신청자 본인 확인 및 신청 접수 및 문의사항 응대 <br>
                        - 통계분석 및 마케팅<br>
                        - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li> 
                        <li><strong>개인정보 수집 항목</strong><br>
                        - 필수항목 : 성명, 연락처, 직렬항목 </li>
                        <li><strong>개인정보 이용기간 및 보유기간</strong><br>
                        - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기 </li>
                        <li>신청자의 개인정보 수집 및 활용 동의 거부 시
                        - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
                        <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다. </li>
                        <li>신이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
                </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>
            </div>
            <div class="btn NSK-Black">
                <a href="#none" onclick="javascript:fn_submit();">면접캠프 설명회 신청하기 ></a>
            </div>         
        </div>         
        
        <div class="evtCtnsBox evt02" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2927_02.jpg" alt="왜 신승철 면접인가?"/>    
            <object data="https://www.youtube.com/embed/KNUV0otKQ1c?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></object>
		</div> 

        <div class="evtCtnsBox evt03" id="apply"  data-aos="fade-top">
            <div class="tabs NSK-Black">
                <a href="#tab01">신승철 미라클반</a>
                <a href="#tab02">I·K 실전면접반</a>
            </div>
            <div id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2927_03_01.jpg" alt="신승철 미라클반"/>
            </div>
            <div id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2927_03_02.jpg" alt="I·K 실전면접반"/>
            </div>           
		</div> 

        <div class="evtCtnsBox evt04" data-aos="fade-top">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2927_04.jpg" alt="면접 무료특강"/>   
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" title="검사신청" target="_blank" style="position: absolute; left: 59.73%; top: 21.26%; width: 22.59%; height: 3.56%; z-index: 2;" id="link01"></a>
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" title="검사신청" target="_blank" style="position: absolute; left: 72.86%; top: 65.29%; width: 10.18%; height: 2.84%; z-index: 2;" id="link02"></a>
                <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" title="검사신청" target="_blank" style="position: absolute; left: 72.86%; top: 68.92%; width: 10.18%; height: 2.84%; z-index: 2;"></a>
            </div>
		</div> 
    </form>      
</div>
<!-- End Container -->


    <script>
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == '') {
                alert('이름을 입력하셔야 합니다.');
                $("#register_name").focus();
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == '') {
                alert('연락처를 입력하셔야 합니다.');
                $("#register_tel").focus();
                return;
            }
            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('참여일을 선택하셔야 합니다.');
                return;
            }
            if ($regi_form_register.find('input[name="register_data2"]').is(':checked') === false) {
                alert('직렬을 선택하셔야 합니다.');
                return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }

            //전부 disabled 처리
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', true);

            //체크 disable 해제
            $regi_form_register.find('input[name="register_chk[]"]:checked').each(function(i){
                $(this).attr('disabled', false);
            });

            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', false); //disable 해제
        }
    </script>
<script>
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );
    </script>
@stop