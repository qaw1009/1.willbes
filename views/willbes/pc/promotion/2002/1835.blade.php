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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        .skybanner {position:fixed; top:200px; right:0; width:150px; z-index:1;}
        .skybanner a {display:block; margin-bottom:5px;}       

        .evtTop {background: url(https://static.willbes.net/public/images/promotion/2020/09/1835_top_bg.jpg) no-repeat center top;}   
        .nameBox {position:absolute; top:259px; left:50%; margin-left:-435px; width:870px; height:189px; 
            text-align:center; color:#fff; overflow:hidden; z-index:10}

        .evt01 {position:relative; 
        background: url(https://static.willbes.net/public/images/promotion/2020/09/1835_02.jpg) no-repeat center top; padding:536px 0 100px}
        .evt01 .youtube iframe{width:550px; margin:0 auto; height:300px; border:1px solid #000;box-shadow:10px 10px 20px rgba(0,0,0,.2);}

        .evt01 .btn {width:450px; margin:30px auto 0;}
        .evt01 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#000; padding:20px 0; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt02 {background: url(https://static.willbes.net/public/images/promotion/2020/09/1835_01_bg.jpg) no-repeat center top; padding-top:646px; height:1240px}
        .evt02 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt02 .request h3 {font-size:17px;}
        .evt02 .request td {padding:10px}
        .evt02 .request input {height:26px;}
        .evt02 .requestL {width:48%; float:left}
        .evt02 .requestR {width:48%; float:right; }
        .evt02 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:215px; overflow-y:scroll }
        .evt02 .requestL li {display:inline-block; margin-right:10px}
        .evt02 .requestR li {margin-bottom:5px}
        .evt02 .request:after {content:""; display:block; clear:both}
        .evt02 .btn {clear:both; width:450px; margin:0 auto;}
        .evt02 .btn a {display:block; text-align:center; font-size:28px; color:#000; background:#28fffc; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt02 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt03,
        .evt04,
        .evt05 {background:#f0f0f0}

        .evt04 {position:relative;}
        .evt04 .circle01{position:absolute;left:50%;top:130px;margin-left:-100px;}
        .evt04 .circle02{position:absolute;left:65%;top:280px;margin-left:-100px;}
        .evt04 .circle03{position:absolute;left:65%;top:580px;margin-left:-100px;}
        .evt04 .circle04{position:absolute;left:50%;top:760px;margin-left:-100px;}
        .evt04 .circle05{position:absolute;left:35%;top:580px;margin-left:-100px;}
        .evt04 .circle06{position:absolute;left:35%;top:280px;margin-left:-100px;}

        .evt04 div a img.on {display:none}
        .evt04 div a img.off {display:block}
        .evt04 div a.active img.on,
        .evt04 div a:hover img.on {display:block}
        .evt04 div a.active img.off,
        .evt04 div a:hover img.off {display:none}
        .evt04 div:after {content:""; display:block; clear:both}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            font-weight:bold;            
        }
        .Pstyle .content {height:auto; width:auto; background:#fff; padding:20px; min-width:300px; font-size:14px; border:3px solid #000; }
        .Pstyle .content h5 {font-size:16px; padding-bottom:10px; margin-bottom:10px; border-bottom:1px solid #ccc}       
        .Pstyle .content li {line-height:1.5; margin-bottom:5px}

        .evt06s {padding-bottom:100px;} 

        .evt07Tab {background:#fff}
        .evt07Tab ul {width:902px; margin:0 auto}
        .evt07Tab li { display:inline; float:left; width:33.3%}
        .evt07Tab li a {display:block; height:70px; line-height:70px; text-align:center; color:#14193a; border:2px solid #14193a; 
            border-bottom:0; font-size:24px; margin-right:2px}
        .evt07Tab li a.active {background:#14193a; color:#fff;}
        .evt07Tab li:nth-child(2) a {border:2px solid #14393a; color:#14393a; border-bottom:0;}
        .evt07Tab li:nth-child(2) a.active {background:#14393a; color:#fff}
        .evt07Tab li:last-child a {border:2px solid #3a1514; color:#3a1514; border-bottom:0; margin-right:0}
        .evt07Tab li:last-child a.active {background:#3a1514; color:#fff}
        .evt07Tab:after {content:""; display:block; clear:both}

        #tab01 {background:#14193a}
        #tab02 {background:#14393a}
        #tab03 {background:#3a1514}     

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

            <div class="skybanner">
               <a href="#evt07Tab"><img src="https://static.willbes.net/public/images/promotion/2020/09/1835_sky.jpg"  title="면접캠프 설명회" /></a>
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_top.jpg" title="면접캠프">
                <div class="nameBox">
                    <ul id="slider1" class="bxslider">
                        <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1835_top_img.jpg" title="합격자" ondragstart='return false'></li>
                    </ul>
                </div>
            </div>
            <!--
            <div class="evtCtnsBox evt02">
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 면접캠프 설명회  신청접수</h3>
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
                                                    /*****************************************************************************************
                                                        신청강의 날짜 형식. 텍스트를 읽어 날짜체크를 하기 때문에 신청리스트 등록시 예시에 맞게 넣을것.
                                                            ex)     12.14 프리미엄올공반2차 설명회
                                                                    2.8(토) 초시생을 위한 합격커리큘럼 설명회
                                                                    6/5 면접캠프설명회
                                                    *****************************************************************************************/
                                                    $reg_year = '2020';
                                                    $temp_date = explode(' ', $val['Name'])[0];
                                                    if(strpos($temp_date, '(') !== false) {
                                                        $temp_date = substr($temp_date, 0, strpos($temp_date, '('));
                                                    }
                                                    if(strpos($temp_date, '.') !== false) {
                                                        $reg_month_day = explode('.', $temp_date);
                                                    } else if (strpos($temp_date, '/') !== false) {
                                                        $reg_month_day = explode('/', $temp_date);
                                                    }
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
                                        <li><input type="radio" name="register_data2" id="CT5" value="경행경채" /> <label for="CT5">경행경채</label></li>                                    
                                        <li><input type="radio" name="register_data2" id="CT7" value="기타" /> <label for="CT7">기타</label></li>
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
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                                - 통계분석 및 마케팅<br>
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
                            <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                            <li>6. 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
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
            -->

            <div class="evtCtnsBox evt01">
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/VONRXLlADE4?rel=0" frameborder="0" allowfullscreen=""></iframe>         
                </div>
                <div class="btn NGEB">
                    <a href="https://www.youtube.com/watch?v=I_y6nf274II&list=PLl65lsiDN8NOR78sIh792GSrnfV_Zl_f8" target="_blank">더 많은 영상 보러가기 ></a>
                </div>
            </div> 

            <div class="evtCtnsBox evt03" >
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_01.jpg" title="합격 스토리"/>
            </div>

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_02.jpg" title="면접캠프의 강점"/>
                <div class="circle01">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c1.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c1h.png" alt="" class="on">
                    </a>    
                </div> 
                <div class="circle02">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c2.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c2h.png" alt="" class="on">
                    </a>    
                </div>  
                <div class="circle03">
                    <a href="#none;">                                 
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c3.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c3h.png" alt="" class="on">
                    </a>    
                </div>  
                <div class="circle04">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c4.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c4h.png" alt="" class="on">
                    </a>
                </div>  
                <div class="circle05">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c5.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c5h.png" alt="" class="on">
                    </a>   
                </div>  
                <div class="circle06">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c6.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_c6h.png" alt="" class="on">
                    </a>    
                </div>               
            </div>

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_02_03.jpg" usemap="#Map1835_profile" border="0" />
                <map name="Map1835_profile">
                    <area shape="rect" coords="114,724,214,752" href="javascript:go_popup1()" alt="송무빈" />
                    <area shape="rect" coords="312,723,412,752" href="javascript:go_popup2()" alt="강태중" />
                    <area shape="rect" coords="509,723,610,751" href="javascript:go_popup3()" alt="박형기" />
                    <area shape="rect" coords="706,723,806,751" href="javascript:go_popup4()" alt="박은순" />
                    <area shape="rect" coords="903,723,1004,752" href="javascript:go_popup5()" alt="백금철" />
                    <area shape="rect" coords="115,1110,216,1139" href="javascript:go_popup6()" alt="홍재희" />
                    <area shape="rect" coords="312,1111,412,1139" href="javascript:go_popup7()" alt="권병조" />
                    <area shape="rect" coords="508,1111,611,1139" href="javascript:go_popup8()" alt="강재구" />
                    <area shape="rect" coords="704,1110,809,1140" href="javascript:go_popup9()" alt="장현미" />
                    <area shape="rect" coords="902,1111,1008,1140" href="javascript:go_popup10()" alt="신영숙" />
                    <area shape="rect" coords="129,1645,232,1675" href="javascript:go_popup11()" alt="신승철" />
                    <area shape="rect" coords="325,1645,428,1677" href="javascript:go_popup12()" alt="정용옥" />
                    <area shape="rect" coords="523,1645,625,1676" href="javascript:go_popup13()" alt="유봉진">
                    <area shape="rect" coords="863,1661,967,1690" href="javascript:go_popup14()" alt="강인엽">
                    <area shape="rect" coords="91,2174,196,2204" href="javascript:go_popup15()" alt="이승아">
                    <area shape="rect" coords="288,2172,395,2202" href="javascript:go_popup16()" alt="김이선">
                    <area shape="rect" coords="529,2172,638,2204" href="javascript:go_popup17()" alt="장정훈">
                    <area shape="rect" coords="729,2174,835,2205" href="javascript:go_popup18()" alt="신광은">
                    <area shape="rect" coords="923,2173,1031,2206" href="javascript:go_popup19()" alt="김원욱">
                </map>
            </div>

             <!--레이어팝업-->
             <div id="popup1" class="Pstyle NSK">
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 송무빈 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>서울청 면접위원장</li>
                        <li>서울청 경비부장, 기동본부장</li>
                        <li>경찰서장(종로, 분당, 영동)</li>
                        <li>한양대학교 법학박사</li>
                        <li>경찰대학교 졸업</li>
                    </ul>                     
                </div> 
            </div>    
            <div id="popup2" class="Pstyle NSK">
                <span class="b-close">X</span>   
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 강태중 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경찰면접위원장</li>
                        <li>중앙경찰학교 교수</li>
                        <li>경기북부청 청문감사 계장</li>
                    </ul>                     
                </div> 
            </div>
            <div id="popup3" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 박형기 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>서울청(정보,인사,정보,교통)</li>
                        <li>중앙경찰학교 교수(경무, 정보통신)</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup4" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 박은순 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경기남부청 면접위원</li>
                        <li>경남부청 보안과장</li>
                        <li>112종합상황실장(성남,수원남부)</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup5" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 백금철 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경찰면접위원</li>
                        <li>101경비단 인사계장</li>
                        <li>경찰종합학교 교수</li>
                        <li>중앙경찰학교 교무계장</li>
                    </ul>                     
                </div>
            </div>   
            <div id="popup6" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 홍재희 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경찰청 특별 채용 면접위원</li>
                        <li>서울청 면접위원</li>
                        <li>경호실 22경호대 경호작전관</li>
                        <li>경기북부청(생활안전, 경비교통, 경무, 정보보안 과장)</li>
                        <li>경찰청 감사과, 홍보실</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup7" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 권병조 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>서울청 면접위원</li>
                        <li>청문감사관(서울청, 경기청)</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup8" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 강재구 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경찰면접위원</li>
                        <li>경찰청(인사,서무)</li>
                        <li>경찰인재개발원(인사,서무,경리)</li>
                        <li>운전면허시험단 인사담당</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup9" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 장현미 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경찰면접위원</li>
                        <li>경무과장(성동, 서초, 과천)</li>
                        <li>송파삼전지구대장</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup10" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 신영숙 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>서울청 면접위원</li>
                        <li>동작경찰서 경무과장</li>
                        <li>경찰청 여성청소년과</li>
                        <li>경무과, 교통과(성동, 강동, 서초, 강남, 용산)</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup11" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 신승철 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>신광은 경찰팀 사전조사서 교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경기남부청 면접위원</li>
                        <li>용인대학교 경찰학/범죄학 박사</li>
                        <li>화성서부경찰서 여성청소년과 과장</li>
                        <li>경기남부청 정보과 기획정보 팀장</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup12" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 정용옥 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>서울청 면접위원장</li>
                        <li>경찰교육원 교수(생활안전과)</li>
                        <li>서울 용산, 서초, 양천, 구로(경무, 생활안전, 보안과장)</li>
                        <li>광주 광산, 남부서(생활안전, 경비교통과장)</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup13" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 유봉진 교수님</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>서울청 면접위원장</li>
                        <li>청문감사관(성북, 노원, 마포, 강북)</li>
                        <li>정보계장, 수사2계장(강북, 도봉)</li>
                        <li>경찰청 정보과, 외사과, 101단</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup14" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 강인엽 교수</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접교수</li>
                        <li>신광은 경찰팀 사전조사 교수</li>
                        <li>프라임법학원 경찰간부면접 교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경찰면접위원</li>
                        <li>경찰대학교 졸업</li>
                        <li>아모르 이그잼 경찰면접 교수</li>
                        <li>KG패스원 경찰면접 교수</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup15" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 이승아 아나운서</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접큐레이터</li>
                        <li>한국경제 TV 아나운서</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>2019 KBS 아나테이너 우승 3rd</li>
                        <li>SPOTV 리포터</li>
                        <li>2017 미스코리아 대구</li>
                        <li>국회의원 및 경찰서장 대담 진행자</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup16" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 김이선 아나운서</h5>
                    <ul>
                        <li>현)</li>
                        <li>신광은 경찰팀 면접큐레이터</li>
                        <li>경찰대학(경감, 경정) 미디어 트레이닝 강사</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>경찰대학교 커뮤니케이션 기법 외래 교수</li>
                        <li>경찰 소통특강 강사(경기남부청)</li>
                        <li>경찰청 인권영화제 MC</li>
                        <li>MBC 뉴스투데이 연예 톡톡 리포터</li>
                        <li>XTM 프로야구 스포츠 아나운서</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup17" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 장정훈 교수</h5>
                    <ul>
                        <li>현)</li>
                        <li>윌비스 신광은경찰팀 경찰학개론, 경찰행정법 전임 </li>
                        <li>신림동 프라임법학원 경찰간부 경찰학개론 전임 </li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>EBS 명품강좌 강의 </li>
                        <li>케이블 TV 일자리방송 경찰학개론 전임</li>
                        <li>김재규경찰학원 경찰학개론 전임</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup18" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 신광은 교수</h5>
                    <ul>
                        <li>현)</li>
                        <li>윌비스 신광은 경찰학원 형사소송법/수사 전임</li>
                        <li>중앙경찰학교 형사법 교수</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>형사반장, 조사반장, 폭력주임, 형사계장</li>
                        <li>경찰종합학교(현, 경찰교육원) 수사학과 교수</li>
                        <li>경찰대학, 중앙경찰학교, 경찰수사연수원, 해양경찰청 외래교수</li>
                    </ul>                     
                </div>
            </div>
            <div id="popup19" class="Pstyle NSK">    
                <span class="b-close">X</span>
                <div class="content">                  
                    <h5 class="NSK-Black">약력 : 김원욱 교수</h5>
                    <ul>
                        <li>현)</li>
                        <li>윌비스 신광은 경찰학원 형법 대표 교수</li>
                        <li>프라임 법학원 경찰채용 간부 승진 형법 전임</li>
                        <li>&nbsp;</li>
                        <li>전)</li>
                        <li>서울대학교 경영학과 졸업</li>
                    </ul>                     
                </div>
            </div>
            
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_03.jpg" usemap="#Map1835B" title="면접캠프 일정안내" border="0"/>
                <map name="Map1835B">
                    <area shape="rect" coords="812,444,974,632" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1069&course_idx=1047&campus_ccd=605001" target="_blank" alt="인적성검사신청하기">
                    <area shape="rect" coords="817,1342,974,1526" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1070&course_idx=1047&campus_ccd=605001" target="_blank" alt="사전조사서신청하기">
                </map>
            </div>

            <div class="evtCtnsBox evt07Tab" id="evt07Tab">
                <ul class="tabs NGEB">
                    <li><a href="#tab01" class="active">참수리반</a></li>
                    <li><a href="#tab02">무궁화반</a></li>
                    <li><a href="#tab03">스파르타반</a></li>
                </ul>
            </div>

            <div class="evtCtnsBox" id="tab01">    
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_04_01.jpg" usemap="#Map1835_tab01" border="0" />
                <map name="Map1835_tab01">
                    <area shape="rect" coords="815,628,977,761" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" alt="참수리반신청" />
                </map>                
            </div>
            <div class="evtCtnsBox" id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_04_02.jpg" usemap="#Map1835_tab02" border="0" />
                <map name="Map1835_tab02">
                    <area shape="rect" coords="812,637,977,781" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" alt="무궁화반 신청" />
                </map>
            </div>
            <div class="evtCtnsBox" id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_04_03.jpg" usemap="#Map1835_tab03" border="0" />
                <map name="Map1835_tab03">
                    <area shape="rect" coords="807,627,973,764" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" alt="스파르타반 신청" />
                </map>         
            </div>

            <div class="evtCtnsBox evt08">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1835_05.jpg" usemap="#Map1835C" title="면접캠프 일정안내" border="0"/>
                <map name="Map1835C">
                  <area shape="rect" coords="860,381,988,478" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" alt="스페셜 캐어">
                  <area shape="rect" coords="859,692,991,787" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" alt="올캐어">
                  <area shape="rect" coords="859,975,989,1014" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1070&course_idx=1047&campus_ccd=605001" target="_blank" alt="사전조사서">
                  <area shape="rect" coords="859,1023,989,1064" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1069&course_idx=1047&campus_ccd=605001" target="_blank" alt="인적성특강">
                  <area shape="rect" coords="859,1070,989,1111" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank" alt="1:1과외반">
                </map>
            </div>

        </form>
	</div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
         $(function() {
             $(document).bind('keydown',function(e){
                 // f12 방지
                 if ( e.keyCode == 123) {
                     e.preventDefault();
                     e.returnValue = false;
                 }
             });

             $("body").contextmenu( function() {
                 return false;
             });

            //Count the number of li elements
            var bx_num01 = $("#slider1 li").length;
            var ticker01 = $('#slider1').bxSlider({
                slideMargin: 0,
                ticker: true,
                mode: 'vertical',
                /*tickerHover: true,*/
                speed:20000*bx_num01
            });
        });

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

         /*레이어팝업*/     

        function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }
        function go_popup3() {
            $('#popup3').bPopup();
        }
        function go_popup4() {
            $('#popup4').bPopup();
        }
        function go_popup5() {
            $('#popup5').bPopup();
        }        
        function go_popup6() {
            $('#popup6').bPopup();
        }
        function go_popup7() {
            $('#popup7').bPopup();
        }      
        function go_popup8() {
            $('#popup8').bPopup();
        }
        function go_popup9() {
            $('#popup9').bPopup();
        }
        function go_popup10() {
            $('#popup10').bPopup();
        }
        function go_popup11() {
            $('#popup11').bPopup();
        }        
        function go_popup12() {
            $('#popup12').bPopup();
        }
        function go_popup13() {
            $('#popup13').bPopup();
        }
        function go_popup14() {
            $('#popup14').bPopup();
        }
        function go_popup15() {
            $('#popup15').bPopup();
        } 
        function go_popup16() {
            $('#popup16').bPopup();
        } 
        function go_popup17() {
            $('#popup17').bPopup();
        }
        function go_popup18() {
            $('#popup18').bPopup();
        } 
        function go_popup19() {
            $('#popup19').bPopup();
        } 

        </script> 

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   