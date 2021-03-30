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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:0; z-index:10;}
        .skyBanner a{ display:block; padding-bottom:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1754_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#111;position:relative;}      

        .evt02 {background:#fff; padding-bottom:150px}
        .evt02 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt02 .request h3 {font-size:17px;}
        .evt02 .request td {padding:10px}
        .evt02 .request input {height:26px;}
        .evt02 .requestL {width:48%; float:left}
        .evt02 .requestR {width:48%; float:right; }
        .evt02 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt02 .requestL li {display:inline-block; margin-right:10px}
        .evt02 .requestR li {margin-bottom:5px}
        .evt02 .request:after {content:""; display:block; clear:both}

        .evtCtnsBox .btn {clear:both; width:550px; margin:0 auto;}
        .evtCtnsBox .btn a {display:block; text-align:center; font-size:30px; color:#fff; background:#000; 
        padding:20px 0; margin-top:30px; border-radius:50px; box-shadow:0 15px 0 rgba(0,0,0,.1);}
        .evtCtnsBox .btn a:hover {background:#95021a}

        .evt03 {background:#ebebeb;}
        .evt04 {background:#fff;}
        .evt04 ul {width:1070px; margin:0 auto}
        .evt04 li {width:20%; display:inline; float:left}
        .evt04 li img.on {display:none}
        .evt04 li img.off {display:block}
        .evt04 li:hover img.on {display:block}
        .evt04 li:hover img.off {display:none}
        .evt04 ul:after {content:""; display:block; clear:both}
        .evt05 {background:#fbfbfb; padding-bottom:100px}
        .evt06 {background:#fff; padding-bottom:150px}

        .evt07 {background:url(https://static.willbes.net/public/images/promotion/2021/03/1754_07_bg.jpg) no-repeat center top;}

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .tabsWrap {border:1px solid #e9e9e9; width:955px; margin:0 auto}
        .tabMenu li {display:inline; float:left; width:50%;}	
        .tabMenu a {display:block; font-size:18px; background:#e9e9e9; color:#949494; padding:20px 0}
        .tabMenu a:hover,
        .tabMenu a.active {background:#fff; color:#3a3a3a}
        .tabMenu ul:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <!--
            <input type="hidden" name="register_chk_col[]" value="EtcValue"/>
            <input type="hidden" name="register_chk_val[]" value=""/>
            -->

            <div class="skyBanner">
                <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2021/03/1754_sky.png" title="소방불꽃 면접캠프 설명회"></a>   
                <a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2021/03/1754_sky2.png" title="소방불꽃 면접캠프 개강"></a>      
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_top.jpg" title="불꽃 면접 캠프">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_01.jpg" title="소방불꽃 설명회">   
                <a href="#map" title="학원 위치보기" style="position: absolute; left: 42%; top: 80%; width: 16%; height: 6%; z-index: 2;"></a>
            </div>    

            <div class="evtCtnsBox evt02" id="apply">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_02.jpg" title="소방불꽃 설명회 신청">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black"> * 소방등불 설명회 신청접수</h3>
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
                                                    $reg_year = '2021';
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
                                                    <li><input type="checkbox" name="register_disable[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" disabled /> <label for="campus{{$key}}">{{$val['Name']}}</label></li>
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
                        <h3 class="NGEB">* 개인정보 수집 및 이용에 대한 안내</h3>
                        <ul>
                            <li>
                                <strong>1. 개인정보 수집 이용 목적</strong> <br>
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대
                                - 통계분석 및 마케팅
                                - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                            </li>
                            <li><strong>2. 개인정보 수집 항목</strong> <br>
                            - 필수항목 : 성명, 연락처</li>
                            <li><strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                            - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기</li>
                            <li><strong>4. 신청자의 개인정보 수집 및 활용 동의 거부 시</strong><br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.</li>
                            <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                            <li>6. 신이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
                        </ul>
                        <div>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </div>
                    </div>
                </div>
                <div class="btn NSK-Black">
                    <a href="#none" onclick="javascript:fn_submit();">소방불꽃 설명회 신청하기 ></a>
                </div>
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_03.jpg" title="소방불꽃 면접캠프 커리큘럼"/>
            </div>   

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_04_tit.jpg" title="소방불꽃 면접캠프의 강점"/>
                <ul>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_01.jpg" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_01_on.jpg" class="on">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_02.jpg" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_02_on.jpg" class="on">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_03.jpg" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_03_on.jpg" class="on">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_04.jpg" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_04_on.jpg" class="on">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_05.jpg" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1754_04_05_on.jpg" class="on">
                    </li>
                </ul>
            </div>   

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_05.jpg" title="소방불꽃 면접캠프 교수진"/>
                <div class="tabsWrap">
                    <ul class="tabMenu NSK-Black">
                        <li><a href="#tab01s">신승철 교수님</a></li>
                        <li><a href="#tab02s">김병찬 교수님</a></li>
                    </ul>
                    <div id="tab01s">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_05_01.png" title="신승철 교수님"/>
                    </div>
                    <div id="tab02s">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_05_02.png" title="김병찬 교수님"/>
                    </div>
                </div>
            </div>   

            <div class="evtCtnsBox evt06" id="evt06">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_06.jpg" title="소방불꽃 면접캠프"/>
                <div class="btn NGEB mt80">
                    <a href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank">소방불꽃 면접캠프 신청하기 ></a>
                </div>
            </div> 

            <div class="evtCtnsBox evt07" id="map">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1754_07.jpg" title="주소 및 시간"/>
            </div>            

        </form>
	</div>
    <!-- End Container -->

    <script>       

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == '') {
                alert('이름을 입력하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == '') {
                alert('연락처를 입력하셔야 합니다.');
                return;
            }
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        };  

        $(document).ready(function(){
            $('.tabMenu').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function(){
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
        });   
    </script>
@stop