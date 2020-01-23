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
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}


        /************************************************************/

        .evt_police{background:#404040}

        .evt_top{background:url("https://static.willbes.net/public/images/promotion/2020/01/1527_top_bg.jpg")}
        .evt_top span {position:absolute; top:80px; left:50%; margin-left:400px; -webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{top:80px;}
            50%{top:130px;}
            100%{top:80px;}
        }

        .evt_01 {background:#f4f4f4; padding-bottom:100px}
        .evt_01 .tabs {width:930px; margin:0 auto 30px;}
        .evt_01 .tabs li {display:inline; float:left; width:50%}
        .evt_01 .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020;}
        .evt_01 .tabs li a:hover,
        .evt_01 .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #f4f4f4; color:#202020; font-weight:600}
        .evt_01 .tabs:after {content:""; display:block; clear:both}    

        .evt_02 {background:#fff; padding-bottom:100px}          
        
        .form_area{width:980px;background:#fff;margin:0 auto;padding:0 65px;}
        .form_area h4{height:50px;line-height:50px;font-size:30px;}
        .form_area h5{font-size:16px;margin-bottom:10px;font-weight:bold; color:#6585ab;}
        .form_area strong {display:inline-block; width:120px; color:#b2213f}
        .form_area .star {color:#363636; margin-right:5px;font-size:7px; vertical-align:middle}
        .privacy {text-align:left; border:20px solid #e9e9e9; margin-top:30px; padding:40px; font-size:16px;}
        .privacy p {margin-bottom:15px}

        .form_area label{font-weight:bold;font-size:14px;display:inline-block; margin-left:5px; margin-right:10px}
        .form_area label.username{letter-spacing:10px;letter-spacing:3.5px;}
        .form_area input[type=text],
        .form_area input[type=tel] { height:30px; line-height:30px}
        .form_area input[type=checkbox],
        .form_area input[type=radio]{padding-left:15px; width:18px; height:18px}
        .form_area .check_contact .check{font-weight:normal;}
        .form_area .check_contact strong {font-weight:bold; width:100%}   
        .area li {display:inline !important; float:left; width:16.66666%; line-height:1.5; margin-bottom:5px} 
        .area:after {content:""; display:block; clear:both}    
        input:checked + label {color:#1087ef;}

        .privacy .info{padding:20px; border:1px solid #e4e4e4;margin-top:20px}
        .privacy .info li{font-size:12px; list-style:decimal; margin-left:15px; line-height:1.5}
        .detail{line-height:20px;}
        .accept{text-align: center;padding: 20px 0 50px 0;font-size: 17px;font-weight: bold;}        

        .btn a {font-size:30px; display:block; border-radius:50px; background:#333; color:#fff; padding:20px 0}
        .btn a:hover {background:#b2213f;}    

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        온라인 강의<br>신청이벤트
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div> 
        
        <div class="evtCtnsBox evt_police">
            <img src="https://static.willbes.net/public/images/promotion/common/police_promotion_top.jpg" title="대학민국 경찰학원 1위 윌비스 신광은경찰팀">            
        </div>

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1527_top.jpg" usemap="#Map1522A" title="경찰학 장정훈 무료특강" border="0">
            <map name="Map1522A" id="Map1522A">
                <area shape="rect" coords="585,708,932,850" href="#evt_02" alt="온라인강의 신청하기" />
            </map>
            <span><img src="https://static.willbes.net/public/images/promotion/2020/01/1527_top_img.png" alt="꼭 들어보세요"></span>
        </div>

        <div class="evtCtnsBox evt_02" id="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1527_01.jpg" title="완벽분석,개정법령">
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}
                <input type="hidden" name="target_params[]" value="register_data1[]"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="희망지원청"/> {{-- 체크 항목 전송 --}}

                <div id="apply">                    
                    <div class="form_area">
                        <h4 class="NGEB">2020.2.1(토) 신광은 형소법 최신개정법령특강 14:00</h4>
                        <div class="privacy">
                            <div class="contacts">
                                <p><strong><span class="star">▶</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" /></p>
                                <p><strong><span class="star">▶</span>연락처</strong><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11"/></p>
                                <p class="check_contact">
                                    <strong><span class="star">▶</span>2020년 1차  희망지원청</strong><br>
                                    <ul class="area">
                                        <li><input type="checkbox" name="register_data1[]" id="aa1" value="서울청"><label for="aa1"> 서울청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa2" value="대구청"><label for="aa2"> 대구청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa3" value="인천청"><label for="aa3"> 인천청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa4" value="광주청"><label for="aa4"> 광주청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa5" value="대전청"><label for="aa5"> 대전청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa6" value="울산청"><label for="aa6"> 울산청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa7" value="경기남부"><label for="aa7"> 경기남부</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa8" value="경기북부"><label for="aa8"> 경기북부</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa9" value="강원청"><label for="aa9"> 강원청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa10" value="충북청"><label for="aa10"> 충북청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa11" value="충남청"><label for="aa11"> 충남청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa12" value="전북청"><label for="aa12"> 전북청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa13" value="전남청"><label for="aa13"> 전남청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa14" value="경북청"><label for="aa14"> 경북청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa15" value="경남청"><label for="aa15"> 경남청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa16" value="부산청"><label for="aa16"> 부산청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa17" value="제주청"><label for="aa17"> 제주청</label></li>
                                    </ul>
                                </p>
                                <p class="check_contact">
                                    <strong><span class="star">▶</span>참여 캠퍼스</strong><br><br>
                                    @foreach($arr_base['register_list'] as $row)
                                        <input type="radio" name="register_chk[]" id="register_chk_{{ $row['ErIdx'] }}" value="{{$row['ErIdx']}}" /> <label for="register_chk_{{ $row['ErIdx'] }}">{{ $row['Name'] }}</label>
                                    @endforeach
                                </p>
                            </div>
                            <div class="info">
                                <h5><span class="star">▶</span>개인정보 수집 및 이용에 대한 안내</h5>
                                <ul>
                                    <li>이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대 </li>
                                    <li>이벤트 참여에 따른 강의 수강자 목록에 활용 </li>
                                    <li>개인정보 수집 항목<br>
                                        - 신청인의 이름,연락처 </li>
                                    <li>개인정보 이용기간 및 보유기간<br>
                                        - 본 수집, 활용목적 달성 후 바로 파기 </li>
                                    <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익</li>
                                    <li>귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 
                                    위 제공사항은 이벤트 참여를 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.</li>
                                </ul>
                            </div>
                        </div>
                        <p class="accept">
                            <input type="checkbox" name="is_chk" id="is_chk" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </p>
                        <div class="btn NGEB">
                            <a onclick="javascript:fn_submit();">
                                신광은 형소법 무료특강 신청하기 >
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>    
    </div>
    <!-- End evtContainer -->
  
    <script type="text/javascript">
      
        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if (typeof $regi_form_register.find('input[name="register_chk[]"]:checked').val() === 'undefined') {
                alert('참여캠퍼스를 선택해 주세요.'); return;
            }
            
            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length == 0) {
                alert('희망지원청을 선택 해주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length > 2) {
                alert('희망지원청은 2개까지만 선택 가능합니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop   