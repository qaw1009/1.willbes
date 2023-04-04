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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evtCtnsBox object {width:860px; height:484px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/04/2943_top_bg.jpg) no-repeat center top;}
        .evtTop span {position: absolute; top:130px; left:50%; margin-left:-500px; width:544px; z-index: 2;
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

       
        .evt01 {padding-bottom:150px; line-height:1.5; font-size:15px;}
        .evt01 .wrap {text-align:left; width:1000px}
        .stitle {font-size:18px; font-weight:bold; border-left:4px solid #e12442; color:#000; padding-left:10px; margin:20px 0}
        .evt01 .wrap table {margin:10px 0; border:1px solid #ccc}
        .evt01 .wrap tr {border-bottom:1px solid #ccc}
        .evt01 .wrap th {font-weight:bold}
        .evt01 .wrap th,
        .evt01 .wrap td {padding:10px; text-align:center; border-right:1px solid #ccc}
        .evt01 .wrap thead th {background:#ededed}
        .evt01 .wrap tbody th {background:#fef0f2}
        

        .evt01 .wrap li {list-style-type:square; margin-left:20px; margin-bottom:10px}
        .evt02 {background:#f0f0f0}

        .evt03 {background:#ede7de}


        .request {width:885px; margin:100px auto 50px; text-align:left; font-size:14px; display:flex; justify-content: space-between;}
        .request h3 {font-size:17px; color:#000}
        .requestL h3 strong {color:#eb4626}
        .request td {padding:10px; line-height:1.5}
        .request input {height:26px;}
        .request input[type=checkbox],
        .request input[type=radio] {width:16px; height:16px}
        .requestL {width:49%;}
        .requestL .sort li {display:inline-block; width:31.3333%}
        .requestR {width:49%;}
        .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:212px; overflow-y:scroll}        
        .requestR li {margin-bottom:5px; list-style-type: decimal; margin-left:20px}

        .requestR div {margin-top:10px}
        
        .evt04 .btn {clear:both; width:885px; margin:0 auto; display:flex; justify-content: center;;}
        .evt04 .btn a {display:block; text-align:center; font-size:30px; color:#fff; background:#e12442; padding:20px 60px; margin-top:30px; border-radius:10px; line-height:1.4}
        .evt04 .btn a p {font-size:22px}
        .evt04 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2); background:#000;}

        .benefit {margin-top:50px; font-size:18px; line-height:1.5}
        .benefit p {font-size:28px;}
        .benefit strong {color:#e12442}

        .evt04 {padding-bottom:150px; width:1120px; margin:0 auto}

        .evt05 {background:#2c171a; padding-bottom:150px}
        .evt06 {padding:150px 0}
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


        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2943_top.jpg" alt="" />
            <span><img src="https://static.willbes.net/public/images/promotion/2023/04/2943_top_title.png" alt="" /></span>
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2943_01.jpg" alt=""/>
            <div class="wrap">
                <div>
                    <div class="stitle">소방공무원 종합적성검사(FFAT : FireFigther Aptitude Test)</div>
                    <table>
                        <col />
                        <col />
                        <col />
                        <thead>
                            <tr>
                                <th>구분</th>
                                <th>기존</th>
                                <th>변경</th>
                            </tr>
                        <thead>
                        <tbody>
                            <tr>
                                <th>시험명</th>
                                <td>인.적성검사</td>
                                <td>소방공무원 종합적성검사</td>
                            </tr>
                            <tr>
                                <th>응시방법</th>
                                <td>각 시.도 공고일에 따라 응시</td>
                                <td>전국 통합공고, 1개소 지정 통합검사</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul>
                        <li>[검사대상] 체력시험 합격자(면접시험 응시 대상자)</li>
                        <li>[검사방법] 소방청 주관 통합검사(1개소 지정 18개 시,도 통합검사)</li>
                        <li>[검사항목] 인성검사 및 적성검사<br>
                            1. 인성검사 : 소방조직 적합도와 직무 몰입에 필요한 개인의 가치,동기,태도등을 검증<br>
                            2. 적성검사 : 소방업무 수행에 필요한 종합적 사고능력, 학습능력등을 검증</li>
                        <li>[검사시간] 인성검사 : 30분 / 적성검사 : 80분</li>
                        <li>[응시방법] 소방청 통합공고(5.11)를 참고하여 지정된 장소에서 검사 수검</li>
                        <li>[응시자 준비물] 신분증, 응시표, 컴퓨터용 사인펜, 필기구 등</li>
                        <li>[검사결과 활용] 면접위원의 평정 참고자료로 활용</li>
                    </ul>
                    <div class="stitle">사전조사서</div>
                    <ul>
                        <li>[작성대상] 체력시험 합격자(면접시험 응시 대상자)</li>
                        <li>[작성일시] 종합적성검사 종료 직후(동일장소)</li>
                        <li>[작성방법] 사전조사서 문항에 대해 직접 자필로 작성(40분 소요)<br>
                        *사전조사서에 제시된 2~3개의 문항에 따라 응시자 본인의 생각 및 경험을 서술함.</li>
                        <li>[작성결과 활용] 평정 참고자료로 활용<br>
                        * 평정 - 평가하여 결정함</li>
                    </ul>
                </div>

                <div>
                    <div class="stitle">소방공무원 면접시험 응시요령</div>
                    <ul>
                        <li>[평가방법] 종합적성검사 결과 및 사전조사서 등의 자료와 함께 사전 설정된 동일한 평가기준에 따라 응시자를 평가함</li>
                        <li>[면접방법] 심층 개별면접(발표면접,인성면접)으로 통합
                            <table>
                                <col />
                                <col />
                                <col />
                                <thead>
                                    <tr>
                                        <th>구분</th>
                                        <th>기존</th>
                                        <th>변경</th>
                                    </tr>
                                <thead>
                                <tbody>
                                    <tr>
                                        <th>면접방법</th>
                                        <td>집단면접 + 개별면접</td>
                                        <td>심층개별면접</td>
                                    </tr>
                                    <tr>
                                        <th>응시시간</th>
                                        <td>집단 2분 / 개별  5~10분</td>
                                        <td>25분</td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li>면접순서  1.발표준비  > 2.발표면접  > 3.인성면접<br>
                            <table>
                                <col/>
                                <col />
                                <col />
                                <col/>
                                <col />
                                <thead>
                                    <tr>
                                        <th colspan="2">면접준비</th>
                                        <th colspan="3">면접실시</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="2">응시자교육</th>
                                        <th rowspan="2">1. 발표준비</th>
                                        <th colspan="2">2. 발표면접</th>
                                        <th>3. 인성면접</th>
                                    </tr>
                                    <tr>
                                        <th>발표</th>
                                        <th>질의.응답</th>
                                        <th>질의.응답</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>15분</td>
                                        <td>3분</td>
                                        <td>7분</td>
                                        <td>15분</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>발표주제 검토</td>
                                        <td colspan="2">주제 발표 및 질의.응답</td>
                                        <td>인성면접 질의.응답</td>
                                    </tr>
                                </tbody>
                            </table>
                            1. 발표준비 : 시험운영본부에서 제시한 발표주제를 본인이 직접 작성,검토<br>
                            2. 발표면접 : 본인이 작성,검토한 자료를 토대로 발표<br>
                            3. 인성면접 : 직무수행능력, 전문성 함양을 위해 평소 준비한 노력과 경험등을 평가</li>
                    </ul>

                </div>
            </div>
		</div> 

        <div class="evtCtnsBox evt02" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2943_02.jpg" alt=""/>
		</div> 

        <div class="evtCtnsBox evt03" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2943_03.jpg" alt=""/>
		</div> 

        <div class="evtCtnsBox evt04" data-aos="fade-top" id="link01">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2943_04.jpg" alt=""/>   
            <div class="btn mb100 NSK-Black">
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/206744" target="_blank" class="mr10">
                    프리미엄 소방면접 신청 >
                    <p class="NSK">(종합적성검사 미포함)</p>
                </a>
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/206745" target="_blank">
                    프리미엄 소방면접 신청 >
                    <p class="NSK">(종합적성검사 포함)</p>
                </a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2943_04_01.jpg" alt=""/>   
            <div class="request" id="request">
                <div class="requestL">
                    <h3 class="NSK-Black">* 소방 면접 설명회 신청접수</h3>
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
                                    <li><input type="radio" name="register_data2" id="CT1" value="공채" /> <label for="CT1">공채</label></li>
                                    <li><input type="radio" name="register_data2" id="CT2" value="구조경채" /> <label for="CT2">구조경채</label></li>
                                    <li><input type="radio" name="register_data2" id="CT3" value="구급경채" /> <label for="CT3">구급경채</label></li>
                                    <li><input type="radio" name="register_data2" id="CT4" value="기타경채" /> <label for="CT4">기타경채</label></li>
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
                        - 윌비스 소방학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li> 
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
                <a href="#none" onclick="javascript:fn_submit();">소방 면접 설명회 신청하기 ></a>
            </div>  
            
            <div class="benefit">
                <p class="NSK-Black">소방 면접 설명회 참가자 특전</p>
                1. 온라인 참여신청후 설명회 및 특강 참가자 전원 모의 <strong>종합적성검사 50% 할인</strong> 혜택(선착순 100명 한정)<br>
                2. 온라인참여 신청후 설명회 및 특강 참가자 <strong>소방 면접수강료 10% 할인</strong>  혜택(1시30분부터 선착순 20명한정)
            </div>
        </div> 
        
        <div class="evtCtnsBox evt05" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2943_05.jpg" alt=""/>    
            <object data="https://www.youtube.com/embed/HEVczcIriqw?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></object>
		</div>   

        <div class="evtCtnsBox evt06" data-aos="fade-top">  
            <object data="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></object>
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



@stop