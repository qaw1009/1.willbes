@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .sky {position:fixed;top:200px; width:130px; right:10px;z-index:1;}        
        .sky a {display:block;margin-bottom:15px;}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2123_top_bg.jpg) no-repeat center;}  

        .wb_01 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .wb_01 .request h3 {font-size:17px;}
        .wb_01 .request td {padding:10px}
        .wb_01 .request input {height:26px;}
        .wb_01 .requestL {width:48%; float:left}
        .wb_01 .requestR {width:48%; float:right; }
        .wb_01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .wb_01 .requestL li {display:inline-block; margin-right:10px}
        .wb_01 .requestR li {margin-bottom:5px}
        .wb_01 .request:after {content:""; display:block; clear:both}
        .wb_01 .btn {clear:both; width:500px; margin:0 auto;}
        .wb_01 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .wb_01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evtInfo {padding:80px 0; background:#333333; color:#fff; font-size:17px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
{{--            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>--}}
            {{--@foreach($arr_base['register_list'] as $key => $val)
                <input type="hidden" name="register_chk[]" value="{{$val['ErIdx']}}"/>
            @endforeach--}}
{{--            <input type="hidden" name="target_params[]" value="register_data1"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_params[]" value="register_data2"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="참여캠퍼스"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="직렬"/> --}}{{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>
            <!--<input type="hidden" name="register_chk_col[]" value="EtcValue"/>
            <input type="hidden" name="register_chk_val[]" value=""/>-->
        
        
        <div class="sky">
            <a href="#event01"><img src="https://static.willbes.net/public/images/promotion/2021/03/2123_sky.png" alt="기본 완성반" ></a>
            <a href="#event02"><img src="https://static.willbes.net/public/images/promotion/2021/03/2123_sky2.png" alt="기초 입문서" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />            
		</div>     

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2123_top.jpg"  alt="기본 완성반" />
		</div>

        <div class="evtCtnsBox wb_01"  id="event01">
			<img src="https://static.willbes.net/public/images/promotion/2021/03/2123_01.jpg"  alt="이벤트01"/>	          
            <div class="request" id="request">
                <div class="requestL">
                    <h3 class="NSK-Black">* 기본완성반 첫날 공개강의 *</h3>
                    <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                        <col width="25%" />
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
                    </table>
                </div>
                <div class="requestR">
                    <h3 class="NSK-Black">* 개인정보 수집 및 이용에 대한 안내</h3>
                    <ul>
                        <li>
                            <strong>1. 개인정보 수집 이용 목적</strong> <br>
                            - 신청자 본인 확인 및 신청 접수 및 문의사항 응대
                            - 통계분석 및 마케팅
                            - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                        </li>
                        <li><strong>2. 개인정보 수집 항목</strong> <br>
                        - 필수항목 : 성명, 연락처, 직렬항목
                        </li>
                        <li><strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                        - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                        </li>
                        <li><strong>4. 신청자의 개인정보 수집 및 활용 동의 거부 시</strong><br>
                        - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                        </li>
                        <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                        </li>
                        <li>6. 신이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
                        </li>
                    </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>
            </div>
            <div class="btn NGEB">
                <a href="javascript:void(0);" onclick="fn_submit();">[학원] 첫날 무료 공개강의 신청하기 ></a>
            </div>
		</div>

		<div class="evtCtnsBox wb_02"  id="event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2123_02.jpg"  alt="이벤트02" usemap="#Map2123_image" border="0"/>
            <map name="Map2123_image" id="Map2123_image">
                <area shape="rect" coords="243,1036,569,1089" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
            </map>      
        </div>  

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'y'))
        @endif       

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">이벤트 유의사항</h4>
				<div class="infoTit NG"><strong>▶ 이벤트1 – 첫날공개강의 신청(노량진 본원)</strong></div>
				<ul>
					<li>3.29(월) 개강 형사법 기본완성반</li>
                    <li>3.31(수) 개강 헌법 기본완성반</li>   
                    <li>4.1(목) 개강 형사법 기본완성반</li>           
                    <li>* 신청후 노량진 본원으로 오시면 당일 입실 가능합니다.</li>                         
				</ul>
				<div class="infoTit NG"><strong>▶ 이벤트2 – 기초입문서 추첨 이벤트</strong></div>
				<ul>
                    <li>총329명 추첨을 통하여 진행됩니다. (~4/3 이벤트 종료)</li>
                    <li>4/6 장바구니 지급예정이며 유효기간은 7일 입니다.<br>
                        (택배비 2,500원 본인부담 , 추후재지급은 불가 )
                    </li>
                    <li>각 회원별 개별문자 진행예정입니다.</li>
                    <li>이벤트용 교재이며 판매불가 상품입니다.</li>
                    <li>* 발송일정은 내부사정에 의해 변동될 수 있습니다.</li>
                    <li>* 배송은 배송비 결제 시 입력한 배송 주소지로 발송되며, 입력된 배송지가 잘못되어있으면 배송이 되지 않을 수도 있습니다.</li>
                    <li>* 이 경우에는 본원에서 책임 지지 않습니다.</li>
				</ul>
				
			</div>
		</div>  

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
@stop 