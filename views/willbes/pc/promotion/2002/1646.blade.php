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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .sky {position:fixed; top:200px; right:0; z-index:1;}
        .sky ul li {padding-bottom:5px;}

        .evt00 {background:#404040}

        .evtTop {background:#070719 url(https://static.willbes.net/public/images/promotion/2020/05/1646_top_bg.jpg) no-repeat center top;}   
        
        .evt01 {position:relative;}
        .youtubeGod iframe{width:500px;height:300px;position:absolute;left:50%;top:50%;margin-left:-250px;margin-top:65px;}

        .evt01 .btn {clear:both; width:450px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt02 {background:#fff; padding-bottom:150px}
        .evt02 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt02 .request h3 {font-size:17px;}
        .evt02 .request td {padding:10px}
        .evt02 .request input {height:26px;}
        .evt02 .requestL {width:48%; float:left}
        .evt02 .requestR {width:48%; float:right; }
        .evt02 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:271px; overflow-y:scroll }
        .evt02 .requestL li {display:inline-block; margin-right:10px}
        .evt02 .requestR li {margin-bottom:5px}
        .evt02 .request:after {content:""; display:block; clear:both}
        .evt02 .btn {clear:both; width:450px; margin:0 auto;}
        .evt02 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt02 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evt02 .NGEBS{font-weight:bold;}

        .evt03,.evt04,.evt05 {background:#f0f0f0}

        .evt07Tab {background:#fff}
        .evt07Tab ul {width:920px; margin:0 auto}
        .evt07Tab li { display:inline; float:left; width:33.3%}
        .evt07Tab li a {display:block; height:70px; line-height:70px; text-align:center; color:#0336c5; border:2px solid #0336c5; border-bottom:0; font-size:24px}
        .evt07Tab li a.active {background:#0336c5; color:#fff}
        .evt07Tab:after {content:""; display:block; clear:both}

        .evt07 {background:#0336c5}        

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
{{--            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>--}}
            {{--@foreach($arr_base['register_list'] as $key => $val)
                <input type="hidden" name="register_chk[]" value="{{$val['ErIdx']}}"/>
            @endforeach--}}
{{--            <input type="hidden" name="target_params[]" value="register_data1"/> --}}{{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="참여캠퍼스"/> --}}{{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>
            <!--<input type="hidden" name="register_chk_col[]" value="EtcValue"/>
            <input type="hidden" name="register_chk_val[]" value=""/>-->

            <div class="sky">
                <ul>
                    <li><a href="#sky01"><img src="https://static.willbes.net/public/images/promotion/2020/05/1646_sky01.jpg"  title="면접캠프 설명회" /></a></li>
                    <li><a href="#sky02"><img src="https://static.willbes.net/public/images/promotion/2020/05/1646_sky02.jpg"  title="찐 교수님 자세히보기" /></a></li>  
                    <li><a href="#sky03"><img src="https://static.willbes.net/public/images/promotion/2020/05/1646_sky03.jpg"  title="인적성검사" /></a></li>  
                    <li><a href="#sky04"><img src="https://static.willbes.net/public/images/promotion/2020/05/1646_sky04.jpg"  title="사전조사서 특강" /></a></li>  
                    <li><a href="#sky05"><img src="https://static.willbes.net/public/images/promotion/2020/05/1646_sky05.jpg"  title="참수리반" /></a></li>  
                    <li><a href="#sky06"><img src="https://static.willbes.net/public/images/promotion/2020/05/1646_sky06.jpg"  title="무궁화반" /></a></li>  
                    <li><a href="#sky07"><img src="https://static.willbes.net/public/images/promotion/2020/05/1646_sky07.jpg"  title="스파르타반" /></a></li>                 
                </ul>
            </div>

            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_top.jpg" title="면접캠프">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_01.jpg" title="이제 당신이 주인공">
                <div class="youtubeGod">
                    <iframe src="https://www.youtube.com/embed/zEpL0f990qQ" frameborder="0" allowfullscreen=""></iframe>         
                </div>
                <div class="btn NGEB">
                    <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank">더 많은 영상 보러가기 ></a>
                </div>
            </div>

            <div class="evtCtnsBox evt02" id="sky01">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_02.jpg" title="면점캠프 설명회">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NGEBS">* 면접캠프 설명회  신청접수</h3>
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
                                                    $reg_year = '2020';
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
                                                    <li><input type="checkbox" name="register_disable[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" /> <label for="campus{{$key}}">{{$val['Name']}}</label></li>
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
                                    <ul>
                                        <li><input type="radio" name="register_data2" id="CT1" value="일반남자" /> <label for="CT1">일반남자</label></li>
                                        <li><input type="radio" name="register_data2" id="CT2" value="일반여자" /> <label for="CT2">일반여자</label></li>
                                        <li><input type="radio" name="register_data2" id="CT3" value="101단" /> <label for="CT3">101단</label></li>                                      
                                        <li><input type="radio" name="register_data2" id="CT5" value="전의경경채" /> <label for="CT5">전의경경채</label></li>                                    
                                        <li><input type="radio" name="register_data2" id="CT7" value="기타" /> <label for="CT7">기타</label></li>
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
                    <a href="#none" onclick="javascript:fn_submit();">면접캠프 설명회 신청하기 ></a>
                </div>
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_03.jpg" title="합격 스토리"/>
            </div>

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04.jpg" title="면접캠프의 강점"/>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c1.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c1h.png" alt="" class="on">
                </div> 
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c2.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c2h.png" alt="" class="on">
                </div>  
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c3.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c3h.png" alt="" class="on">
                </div>  
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c4.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c4h.png" alt="" class="on">
                </div>  
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c5.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c5h.png" alt="" class="on">
                </div>  
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c6.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_04_c6h.png" alt="" class="on">
                </div>               
            </div>

            <div class="evtCtnsBox evt05" id="sky02">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_05.jpg" usemap="#Map1646_professor" title="면접캠프 찐~교수진" border="0">
                <map name="Map1646_professor" id="Map1646_professor">
                    <area shape="rect" coords="155,542,253,571" href="https://police.willbes.net/pass/professor/show/prof-idx/50562/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="274,542,373,570" href="https://police.willbes.net/pass/professor/show/prof-idx/50720/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="395,542,493,570" href="https://police.willbes.net/pass/professor/show/prof-idx/51019/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="627,542,727,570" href="https://police.willbes.net/pass/professor/show/prof-idx/51019/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="748,542,845,571" href="https://police.willbes.net/pass/professor/show/prof-idx/51018/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="867,542,967,570" href="https://police.willbes.net/pass/professor/show/prof-idx/51023/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="185,922,283,951" href="https://police.willbes.net/pass/professor/show/prof-idx/50300/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="445,922,542,950" href="https://police.willbes.net/pass/professor/show/prof-idx/51021/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                    <area shape="rect" coords="564,922,664,950" href="https://police.willbes.net/pass/professor/show/prof-idx/51022/?cate_code=3010&subject_idx=1064&subject_name=%EB%A9%B4%EC%A0%91" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox evt06" id="sky03">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_06.jpg" usemap="#Map1646a" title="검사신청하기 " border="0"/>
                <map name="Map1646a" id="Map1646a">
                    <area shape="rect" coords="750,369,988,434"  href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1069" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox evt06s" id="sky04">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_06s.jpg" usemap="#Map1646ab" border="0" />
                <map name="Map1646ab" id="Map1646ab">
                    <area shape="rect" coords="750,369,988,434"  href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1069" target="_blank" />
                </map> 
            </div>        

            <div class="evtCtnsBox evt07Tab">
                <ul class="tabs NGEB">
                    <li><a href="#tab01" class="active">참수리반</a></li>
                    <li><a href="#tab02">무궁화반</a></li>
                    <li><a href="#tab03">스파르타반</a></li>
                </ul>
            </div>

            <div class="evtCtnsBox evt07" id="apply">
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_07_c1.jpg" usemap="#Map1646_tab01" title="4월 심화이론 일반경찰" border="0">
                    <map name="Map1646_tab01" id="Map1646_tab01">
                        <area shape="rect" coords="470,562,647,598" href="javascript:alert('Comimg Soon :-)')" />
                        <area shape="rect" coords="710,668,968,804" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                    </map>                    
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_07_c2.jpg" usemap="#Map1646_tab02" title="4월 심화이론 일반경찰" border="0">
                    <map name="Map1646_tab02" id="Map1646_tab02">
                        <area shape="rect" coords="471,562,647,597" href="javascript:alert('Comimg Soon :-)')" />
                        <area shape="rect" coords="707,667,968,804" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                    </map> 
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_07_c3.jpg" usemap="#Map1646_tab03" title="4월 심화이론 일반경찰" border="0"> 
                    <map name="Map1646_tab03" id="Map1646_tab03">
                        <area shape="rect" coords="470,561,647,598" href="javascript:alert('Comimg Soon :-)')" />
                        <area shape="rect" coords="710,666,970,804" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                    </map>                   
                </div>
            </div>

            <div class="evtCtnsBox evt08">
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1646_08.jpg" title="면접캠프 일정안내"/>
            </div>

        </form>
	</div>
    <!-- End Container -->

    <script>

          /*tab*/
          $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
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
                    e.preventDefault()
                });
            });
        });
                                                    
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
@stop 