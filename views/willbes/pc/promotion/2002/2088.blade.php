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
        .sky ul li {padding-bottom:25px;}

        .evt_top_banner {background: url(https://static.willbes.net/public/images/promotion/2021/03/2088_top_banner_bg.jpg) no-repeat center top;}   

        .evtTop {background: url(https://static.willbes.net/public/images/promotion/2021/03/2088_top_bg.jpg) no-repeat center top;padding-bottom:125px;} 
        .evtTop .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evtTop .request h3 {font-size:17px;}
        .evtTop .request td {padding:10px}
        .evtTop .request input {height:26px;}
        .evtTop .requestL {width:48%; float:left}
        .evtTop .requestR {width:48%; float:right; }
        .evtTop .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:271px; overflow-y:scroll }
        .evtTop .requestL li {display:inline-block; margin-right:10px}
        .evtTop .requestR li {margin-bottom:5px}
        .evtTop .request:after {content:""; display:block; clear:both}
        .evtTop .btn {clear:both; width:450px; margin:0 auto;}
        .evtTop .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evtTop .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evtTop .NGEBS{font-weight:bold;}

        .evt01 {position:relative;padding-bottom:100px;background:#F3F3F3}
        .evt01 .circle01{position:absolute;left:50%;top:22%;margin-left:-100px;}
        .evt01 .circle02{position:absolute;left:65%;top:35%;margin-left:-100px;}
        .evt01 .circle03{position:absolute;left:65%;top:59%;margin-left:-100px;}
        .evt01 .circle04{position:absolute;left:50%;top:69%;margin-left:-100px;}
        .evt01 .circle05{position:absolute;left:35%;top:59%;margin-left:-100px;}
        .evt01 .circle06{position:absolute;left:35%;top:35%;margin-left:-100px;}

        .evt01 div a img.on {display:none}
        .evt01 div a img.off {display:block}
        .evt01 div a.active img.on,
        .evt01 div a:hover img.on {display:block}
        .evt01 div a.active img.off,
        .evt01 div a:hover img.off {display:none}
        .evt01 div:after {content:""; display:block; clear:both}

        
        .evt02 {background:#F6AF47;}

        .evt03_tab {background:#fff}
        .evt03_tab ul {width:920px; margin:0 auto}
        .evt03_tab li { display:inline; float:left; width:25%}
        .evt03_tab li a {display:block; height:70px; line-height:70px; text-align:center; color:#232323; border:2px solid #0336c5;font-size:24px}
        .evt03_tab li a.active {background:#0336c5; color:#fff}
        .evt03_tab:after {content:""; display:block; clear:both}

        .evt03 {background:#fff;position:relative;}
        .youtube {position:absolute; top:330px; left:50%;z-index:1;margin-left:-161px}
        .youtube iframe {width:622px; height:365px}

        /*
        .evt01 {position:relative;padding-bottom:100px;}
        .youtubeGod iframe{width:500px;height:300px;position:absolute;left:50%;top:45%;margin-left:-250px;margin-top:65px;}

        .evt01 .btn {clear:both; width:450px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        */

       .evt04 {background:#29019F}

       .evt05 {background:#F0F0F0}

       
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
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}        

        .evt06s {padding-bottom:100px;} 

    

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
                    <li><a href="#sky01"><img src="https://static.willbes.net/public/images/promotion/2021/03/2088_sky.png"  title="면접캠프 신청하기" /></a></li>
                    <li><a href="#sky02"><img src="https://static.willbes.net/public/images/promotion/2021/03/2088_sky2.png"  title="무료특강 신청하기" /></a></li>                                             
                </ul>
            </div>

            <div class="evtCtnsBox evt_top_banner">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_top_banner.jpg" title="신광은 면접캠프">
            </div>

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_top.jpg" title="면접캠프">
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
                                                    /*****************************************************************************************
                                                        신청강의 날짜 형식. 텍스트를 읽어 날짜체크를 하기 때문에 신청리스트 등록시 예시에 맞게 넣을것.
                                                            ex)     12.14 프리미엄올공반2차 설명회
                                                                    2.8(토) 초시생을 위한 합격커리큘럼 설명회
                                                                    6/5 면접캠프설명회
                                                    *****************************************************************************************/
                                                    $reg_year = '2021';
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
                                        <li><input type="radio" name="register_data2" id="CT5" value="전의경" /> <label for="CT5">전의경</label></li>                                    
                                        &nbsp;&nbsp;&nbsp;<li><input type="radio" name="register_data2" id="CT7" value="기타" /> <label for="CT7">기타</label></li>
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

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01.jpg" title="면접캠프의 강점"/>
                <div class="circle01">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_01_off.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_01_on.png" alt="" class="on">
                    </a>    
                </div> 
                <div class="circle02">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_02_off.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_02_on.png" alt="" class="on">
                    </a>    
                </div>  
                <div class="circle03">
                    <a href="#none;">                                 
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_03_off.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_03_on.png" alt="" class="on">
                    </a>    
                </div>  
                <div class="circle04">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_04_off.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_04_on.png" alt="" class="on">
                    </a>
                </div>  
                <div class="circle05">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_05_off.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_05_on.png" alt="" class="on">
                    </a>   
                </div>  
                <div class="circle06">
                    <a href="#none;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_06_off.png" alt="" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_01_06_on.png" alt="" class="on">
                    </a>    
                </div>               
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_02.jpg" usemap="#Map2088a" title="면접캠프 스캐줄" border="0">
                <map name="Map2088a" id="Map2088a">
                    <area shape="rect" coords="814,448,1037,564" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1069" target="_blank" />
                    <area shape="rect" coords="816,988,1033,1101" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1070" target="_blank" />
                    <area shape="rect" coords="812,1509,1037,1625" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox evt03_tab">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03.jpg" title="교수진 자세히 보기">                                          
                <ul class="tabs NGEB">
                    <li><a href="#tab01" class="active">송무빈 DREAM반</a></li>
                    <li><a href="#tab02">무궁화반</a></li>
                    <li><a href="#tab03">스파르타반</a></li>
                    <li><a href="#tab04">POL IN 참수리반</a></li>
                </ul>
            </div>

            <div class="evtCtnsBox evt03">                
                <div id="tab01">    
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01.jpg" usemap="#Map2088_03_01" title="" border="0" />
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/wWr99H_olHc?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <map name="Map2088_03_01" id="Map2088_03_01">
                        <area shape="rect" coords="179,1555,261,1581" href="javascript:go_popup1()" />
                        <area shape="rect" coords="349,1554,431,1581" href="javascript:go_popup2()" />
                        <area shape="rect" coords="519,1554,600,1580" href="javascript:go_popup3()" />
                        <area shape="rect" coords="689,1555,771,1581" href="javascript:go_popup4()" />
                        <area shape="rect" coords="860,1555,940,1581" href="javascript:go_popup5()" />
                        <area shape="rect" coords="92,1937,172,1964" href="javascript:go_popup6()" />
                        <area shape="rect" coords="261,1937,343,1964" href="javascript:go_popup7()" />
                        <area shape="rect" coords="431,1937,512,1964" href="javascript:go_popup8()" />
                        <area shape="rect" coords="602,1938,683,1963" href="javascript:go_popup9()" />
                        <area shape="rect" coords="772,1937,852,1964" href="javascript:go_popup10()" />
                        <area shape="rect" coords="945,1938,1026,1964"href="javascript:go_popup11()" />
                        <area shape="rect" coords="413,1092,710,1142" href="https://police.willbes.net/pass/offinfo/boardInfo/show/109?board_idx=323851&" target="_blank" />
                        <area shape="rect" coords="394,2313,728,2407" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                    </map>
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_02.jpg" usemap="#Map2088_03_02" title="" border="0" />
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/W6q00GZLjDw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <map name="Map2088_03_02" id="Map2088_03_02">
                        <area shape="rect" coords="179,1477,260,1504" href="javascript:go_popup12()" />
                        <area shape="rect" coords="349,1477,430,1503" href="javascript:go_popup13()" />
                        <area shape="rect" coords="520,1477,601,1503" href="javascript:go_popup14()" />
                        <area shape="rect" coords="690,1478,770,1504" href="javascript:go_popup15()" />
                        <area shape="rect" coords="860,1478,940,1503" href="javascript:go_popup16()" />
                        <area shape="rect" coords="414,1081,710,1133" href="https://police.willbes.net/pass/offinfo/boardInfo/show/109?board_idx=323850&" target="_blank" />
                        <area shape="rect" coords="392,1828,730,1921" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                    </map> 
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_03.jpg" usemap="#Map2088_03_03" title="" border="0" />
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/sJq8vlXbBCA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <map name="Map2088_03_03" id="Map2088_03_03">
                        <area shape="rect" coords="179,1478,261,1503" href="javascript:go_popup17()" />
                        <area shape="rect" coords="413,1079,714,1134" href="https://police.willbes.net/pass/offinfo/boardInfo/show/109?board_idx=323852&" target="_blank" />
                        <area shape="rect" coords="393,1873,729,1975" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                    </map> 
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04.jpg" usemap="#Map2088_03_04" title="" border="0" />
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/nNSYvreT6rw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <map name="Map2088_03_04" id="Map2088_03_04">
                        <area shape="rect" coords="179,1473,261,1499" href="javascript:go_popup18()" />
                        <area shape="rect" coords="349,1473,431,1499" href="javascript:go_popup19()" />
                        <area shape="rect" coords="520,1473,600,1500" href="javascript:go_popup20()" />
                        <area shape="rect" coords="689,1474,771,1500" href="javascript:go_popup21()" />
                        <area shape="rect" coords="860,1474,941,1499" href="javascript:go_popup22()" />
                        <area shape="rect" coords="261,1794,342,1821" href="javascript:go_popup23()" />
                        <area shape="rect" coords="432,1794,512,1820" href="javascript:go_popup24()" />
                        <area shape="rect" coords="602,1795,682,1820" href="javascript:go_popup25()" />
                        <area shape="rect" coords="772,1794,853,1820" href="javascript:go_popup26()" />
                        <area shape="rect" coords="413,1076,712,1132" href="https://police.willbes.net/pass/offinfo/boardInfo/show/109?board_idx=323853&" target="_blank" /> 
                        <area shape="rect" coords="392,2189,733,2285" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                    </map>                                   
                </div> 
            </div>

            <div class="evtCtnsBox evt04" id="sky01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_04.jpg" usemap="#Map2088b" title="접수안내" border="0">
                <map name="Map2088b" id="Map2088b">
                    <area shape="rect" coords="331,916,790,1027" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1047&subject_idx=1064" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox evt05" id="sky02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_05.jpg" usemap="#Map2088c" title="무료특강" border="0">
                <map name="Map2088c" id="Map2088c">
                    <area shape="rect" coords="125,699,466,788" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179389" target="_blank" />
                    <area shape="rect" coords="658,700,994,787" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/179387" target="_blank" />
                </map>
            </div>      

             <!--레이어팝업-->
             <div id="popup1" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content1">                  
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab01.png" class="off" alt="" />    
                </div> 
            </div>    
            <div id="popup2" class="Pstyle">
                <span class="b-close">X</span>   
                <div class="content2">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab02.png" class="off" alt="" />  
                </div> 
            </div>
            <div id="popup3" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content3">            
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab03.png" class="off" alt="" />  
                </div>
            </div>
            <div id="popup4" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content4">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab04.png" class="off" alt="" />                           
                </div>
            </div>
            <div id="popup5" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content5">                  
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab05.png" class="off" alt="" />  
                </div> 
            </div>    
            <div id="popup6" class="Pstyle">
                <span class="b-close">X</span>   
                <div class="content6">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab06.png" class="off" alt="" />  
                </div> 
            </div>
            <div id="popup7" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content7">            
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab07.png" class="off" alt="" />  
                </div>
            </div>
            <div id="popup8" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content8">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab08.png" class="off" alt="" />                           
                </div>
            </div>
            <div id="popup9" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content9">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab09.png" class="off" alt="" />  
                </div>
            </div>
            <div id="popup10" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content10">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab10.png" class="off" alt="" />  
                </div>
            </div>
            <div id="popup11" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content11">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_01_tab11.png" class="off" alt="" />  
                </div>
            </div>
            <div id="popup12" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content12">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_02_tab01.png" class="off" alt="" />                           
                </div>
            </div>
            <div id="popup13" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content13">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_02_tab02.png" class="off" alt="" />
                </div>
            </div>
            <div id="popup14" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content14">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_02_tab03.png" class="off" alt="" />
                </div>
            </div>
            <div id="popup15" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content15">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_02_tab04.png" class="off" alt="" />
                </div>
            </div>
            <div id="popup16" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content16">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_02_tab05.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup17" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content17">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_03_tab01.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup18" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content18">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab01.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup19" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content19">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab02.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup20" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content20">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab03.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup21" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content21">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab04.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup22" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content22">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab05.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup23" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content23">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab06.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup24" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content24">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab07.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup25" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content25">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab08.png" class="off" alt="" />                         
                </div>
            </div>
            <div id="popup26" class="Pstyle">    
                <span class="b-close">X</span>
                <div class="content26">         
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2088_03_04_tab09.png" class="off" alt="" />                         
                </div>
            </div>                 

        </form>
	</div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
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
        function go_popup20() {
            $('#popup20').bPopup();
        } 
        function go_popup21() {
            $('#popup21').bPopup();
        } 
        function go_popup22() {
            $('#popup22').bPopup();
        } 
        function go_popup23() {
            $('#popup23').bPopup();
        } 
        function go_popup24() {
            $('#popup24').bPopup();
        } 
        function go_popup25() {
            $('#popup25').bPopup();
        } 
        function go_popup26() {
            $('#popup26').bPopup();
        } 

        </script> 

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   