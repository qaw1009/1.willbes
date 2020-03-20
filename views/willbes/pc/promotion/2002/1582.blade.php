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
        
        .skybanner {
            position:fixed; 
            top:200px; 
            right:0;
            z-index:200;            
        }
       
        .evt00 {background:#404040}        
        .evtTop {background:#273d7e url(https://static.willbes.net/public/images/promotion/2020/03/1545_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fff; padding-bottom:150px}          
        
        .form_area{width:980px;background:#fff;margin:0 auto;padding:0 65px;}
        .form_area h4{height:60px;line-height:60px;font-size:30px; background:#14519d; color:#fff;}
        .form_area h5{font-size:16px;margin-bottom:10px;font-weight:bold; color:#14519d;}
        .form_area strong {display:inline-block; width:120px; color:#14519d}
        .form_area .star {color:#14519d; margin-right:5px;font-size:7px; vertical-align:middle}
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
        .form_area #look {width:100px;height:30px;}  
        .form_area #userId {vertical-align:bottom;}   
        .area li {display:inline !important; float:left; width:16.66666%; line-height:1.5; margin-bottom:5px} 
        .area:after {content:""; display:block; clear:both}    
        input:checked + label {color:#1087ef;}

        .privacy .info{padding:20px; border:1px solid #e4e4e4;margin-top:20px}
        .privacy .info li{font-size:12px; list-style:decimal; margin-left:15px; line-height:1.5}
        .detail{line-height:20px;}
        .accept{text-align: center;padding: 20px 0 50px 0;font-size: 17px;font-weight: bold;}        

        .btn a {font-size:30px; display:block; border-radius:50px; background:#14519d; color:#fff; padding:20px 0}
        .btn a:hover {background:#333;}   

        .evt02 {background:#393a3e;}
        .evt02 > div {width:700px; margin:0 auto}
        .evt02 div table {table-layout: auto; border-top:1px solid #757578;}
        .evt02 div table th,
        .evt02 div table td {padding:10px 5px; border-bottom:1px solid #757578; border-right:1px solid #757578; text-align: center; font-weight: 600; font-size:20px}
        .evt02 div table th {background: #252525; color:#fff;} 
        .evt02 div table td {font-size:18px; color:#fff;}
        .evt02 div table td div {position:relative}
        .evt02 div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
        .evt02 div table tbody th {background: #f9f9f9; color:#555;} 
        .evt02 div table tbody th:last-child,
        .evt02 div table tbody td:last-child {border-right:0;}
        .evt02 ul { width:1000px; margin:50px auto 0}
        .evt02 li {display:inline;margin-left:25px;}
        .evt02 ul:after {content:""; display:block; clear:both}

        .evt03 {background:#393a3e url(https://static.willbes.net/public/images/promotion/2020/02/1545_03.jpg) no-repeat center top; 
            padding-bottom:100px; height:1200px; position:relative}
        .evt03 .mapSec {width:1120px; height:400px; margin:0 auto; position:relative}
        .evt03 .tabs li {position:absolute; z-index:10; text-align:left}
        .evt03 .tabs li a {display:block; padding:3px 5px; font-weight:bold}
        .evt03 .tabs li a:hover,
        .evt03 .tabs li a.active {background:#ffff00;}
        .evt03 .tabs li span.on {display:none}
        .evt03 .tabs li span.off {display:block}
        .evt03 .tabs li a.active span.on {display:block}
        .evt03 .tabs li a.active span.off {display:none}
        .evt03 .tabs li:nth-child(1) {top:210px; left:322px} /*서울*/ 
        .evt03 .tabs li:nth-child(2) {top:460px; left:430px} /*부산*/ 
        .evt03 .tabs li:nth-child(3) {top:389px; left:417px} /*대구*/ 
        .evt03 .tabs li:nth-child(4) {top:196px; left:260px} /*인천*/
        .evt03 .tabs li:nth-child(5) {top:460px; left:280px} /*광주*/ 
        .evt03 .tabs li:nth-child(6) {top:325px; left:324px} /*대전*/ 
        .evt03 .tabs li:nth-child(7) {top:416px; left:474px} /*울산*/ 
        .evt03 .tabs li:nth-child(10) {top:178px; left:313px} /*강원*/  
        .evt03 .tabs li:nth-child(8) {top:185px; left:397px} /*경기남부*/
        .evt03 .tabs li:nth-child(9) {top:248px; left:309px} /*경기북부*/
        .evt03 .tabs li:nth-child(11) {top:278px; left:365px} /*충북*/ 
        .evt03 .tabs li:nth-child(12) {top:309px; left:270px} /*충남*/ 
        .evt03 .tabs li:nth-child(13) {top:389px; left:313px} /*전북*/  
        .evt03 .tabs li:nth-child(14) {top:500px; left:312px} /*전남*/ 
        .evt03 .tabs li:nth-child(15) {top:332px; left:418px} /*경북*/ 
        .evt03 .tabs li:nth-child(16) {top:463px; left:365px} /*경남*/ 
        .evt03 .tabs li:nth-child(17) {top:520px; left:455px} /*제주*/ 
        
        .areaData {border-bottom:1px solid #67686b; width:313px; position:absolute; top:331px; left:572px}
        .areaData li {border-top:1px solid #67686b; padding:10px; color:#fff; font-size:16px; text-align:left;}
        .areaData li span {display:inline-block; width:120px}
        .areaData li:first-child {font-size:18px}
        .areaData li:first-child strong {display:inline-block; color:#393a3e; background:#ffff00; padding:5px 10px; border-radius:20px}
        .graph {position:absolute; top:650px; left:50%; margin-left:-500px; height:400px; color:#fff; width:1000px; z-index:10;}
        .graph table {border-bottom:1px solid #7f7f81; margin:20px 0; color:#959597;}
        .graph tfoot th {height:40px; border-top:1px solid #7f7f81; position:relative;}
        .graph tbody th,
        .graph tbody td {position:relative; height:300px; border-top:1px solid #7f7f81; vertical-align:bottom; color:#fff;
            background: repeating-linear-gradient(
            0deg,
            #7f7f81,
            #393a3e 1px,/*연한색*/
            #393a3e 30px /*진한색*/
            );
        }                
        .graph tbody th ul {position:absolute; top:13px; left:45px}
        .graph tbody th li {text-align:center; height:30px; line-height:30px;}
        .graph tbody td div {/*position:absolute; bottom:0; left:50%; margin-left:-10px;*/ width:14px; margin:0 auto; background:#176dd7;
            -webkit-animation: shadow-pop-tr 3s cubic-bezier(0.470, 0.000, 0.745, 0.715) both;
	        animation: shadow-pop-tr 3s cubic-bezier(0.470, 0.000, 0.745, 0.715) both;
        }
        @@-webkit-keyframes shadow-pop-tr {
            0% {
                -webkit-box-shadow: 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222;
                        box-shadow: 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222;
                -webkit-transform: translateX(0) translateY(0);
                        transform: translateX(0) translateY(0);
            }
            100% {
                -webkit-box-shadow: 1px -1px #333, 2px -2px #333, 3px -3px #333, 4px -4px #333, 5px -5px #333, 6px -6px #333, 7px -7px #333, 8px -8px #333;
                        box-shadow: 1px -1px #333, 2px -2px #333, 3px -3px #333, 4px -4px #333, 5px -5px #333, 6px -6px #333, 7px -7px #333, 8px -8px #333;
                -webkit-transform: translateX(0) translateY(0);
                        transform: translateX(0) translateY(0);
            }
        }
        @@keyframes shadow-pop-tr {
            0% {
                -webkit-box-shadow: 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222;
                        box-shadow: 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222, 0 0 #222;
                -webkit-transform: translateX(0) translateY(0);
                        transform: translateX(0) translateY(0);
            }
            100% {
                -webkit-box-shadow: 1px -1px #333, 2px -2px #333, 3px -3px #333, 4px -4px #333, 5px -5px #333, 6px -6px #333, 7px -7px #333, 8px -8px #333;
                        box-shadow: 1px -1px #333, 2px -2px #333, 3px -3px #333, 4px -4px #333, 5px -5px #333, 6px -6px #333, 7px -7px #333, 8px -8px #333;
                -webkit-transform: translateX(0) translateY(0);
                        transform: translateX(0) translateY(0);
            }
        }


        .graph h5 {color:#fff; text-align:center; font-size:24px}
        .graph .txtinfo01 {color:#fff; text-align:center;}

        .stats-confirm {background:rgba(0,0,0,.8); width:1120px; height:100%; position:absolute; top:0;left:50%;margin-left:-560px;z-index:100}
        .stats-confirm div {margin-top:32%}

        .evt04 {padding-bottom:150px; background:#393a3e} 
        .evt04 .slide_con {position:relative; width:854px; margin:0 auto}
        .evt04 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:50px; height:50px; z-index:10}
        .evt04 .slide_con p.leftBtn {left:-25px}
        .evt04 .slide_con p.rightBtn {right:-25px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:1120px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0}
        .slide_con p.rightBtn {right:0}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

        /*유의사항*/
        .wb_ctsInfo {background:#fff; padding:150px 0}  
        .wb_ctsInfo div {
            width:900px; margin:0 auto; color:#333; font-size:14px; line-height:1.5;
            border:1px solid #909090; padding:50px;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important; text-align:left;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#b48023} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
        }
        .wb_ctsInfo div dl:before{
            background: #f97f7a none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
            display:none;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">    
        {{--
        <div class="skybanner">
            <a href="#evt"><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_sky01.jpg" alt="스카이베너" ></a>
        </div>
        --}}       
     
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1545_top.jpg" title="손꼽아 기다리던 합격봉투">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1545_01.jpg" title="완벽분석,개정법령">
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}
                <input type="hidden" name="target_params[]" value="register_data1[]"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_params[]" value="register_data2[]"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_params[]" value="register_data3[]"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="희망지원청"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="응시직렬"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="응시번호"/> {{-- 체크 항목 전송 --}}

                {{-- 시험응시번호 중복체크 --}}
                <input type="hidden" name="register_chk_other_col[]" value="EtcValue"/>
                <input type="hidden" name="register_chk_other_col[]" value="EtcValue2"/>
                <input type="hidden" name="register_chk_other_val[]" value=""/>
                <input type="hidden" name="register_chk_other_val[]" value=""/>
                <input type="hidden" name="register_chk_other_msg" value="이미 이벤트 신청된 응시번호입니다."/>

                <input type="hidden" name="register_chk[]" id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>

                <div id="apply">                    
                    <div class="form_area">
                        <h4 class="NGEB">신광은경찰팀 봉투 모의고사 이벤트</h4>
                        <div class="privacy">
                            <div class="contacts">
                                <p><strong><span class="star">▶</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" readonly /></p>
                                <p><strong><span class="star">▶</span>연락처</strong><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11" readonly/></p>
                                <p class="check_contact">
                                    <strong><span class="star">▶</span>20년 1차 응시지원청</strong><br>
                                    <ul class="area">
                                        <li><input type="checkbox" name="register_data1[]" id="aa1" value="서울청"><label for="aa1"> 서울청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa16" value="부산청"><label for="aa16"> 부산청</label></li>
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
                                        <li><input type="checkbox" name="register_data1[]" id="aa17" value="제주청"><label for="aa17"> 제주청</label></li>
                                    </ul>
                                </p>
                            </div>
                            <div class="formfield">
                                <select id="look" name="register_data2[]">
                                    <option value="">응시직렬</option>                         
                                    <option value="일반남자">일반남자</option>
                                    <option value="일반여자">일반여자</option>
                                    <option value="전의경경채">전의경경채</option>
                                    <option value="101단">101단</option>
                                    <option value="경력채용">경력채용</option>
                                </select>
                                <input type="text" id="userId" name="register_data3[]" maxlength="5" placeholder="응시번호 입력">
                            </div>
                            <div class="mt30 mb30 tx14">
                                * 이름 및 연락처 수정은 로그인 후 회원정보 수정을 통해 가능합니다.
                            </div>
                            <div class="info">
                                <h5><span class="star">▶</span>개인정보 수집 및 이용에 대한 안내</h5>
                                <ul>
                                    <li>이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대 </li>
                                    <li>이벤트 참여에 따른 강의 수강자 목록에 활용 </li>
                                    <li>개인정보 수집 항목<br>
                                        - 신청인의 이름, 연락처, 희망청 </li>
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
                                신광은경찰팀 봉투 모의고사 이벤트 참여하기 >
                            </a>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        
        <form id="add_apply_form" name="add_apply_form"> 
            <div class="evtCtnsBox evt02" id="evt">           
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
                @foreach($arr_base['add_apply_data'] as $row)
    {{--                    <input type="radio" name="add_apply_chk[]" id="add_apply_{{ $row['EaaIdx'] }}" value="{{$row['EaaIdx']}}" /> <label for="register_chk_{{ $row['EaaIdx'] }}">{{ $row['Name'] }}</label>--}}
    {{--                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyStartDatm']))--}}
                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                        <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                        @break;
                    @endif
                @endforeach

                <img src="https://static.willbes.net/public/images/promotion/2020/03/1545_02.jpg" title="봉투모의고사 선착순 증정">
                <div>
                    <table cellspacing="0" cellpadding="0">
                        <colgroup>
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                        </colgroup>
                        <tbody>
                        @if(empty($arr_base['add_apply_data']) === false)
                            @php $col_cnt = 5; @endphp
                            @for($i=0; $i < count($arr_base['add_apply_data']); $i++)
                                @if($i==0 || $i%$col_cnt == 0)
                                    @php $tr_i = $i; @endphp
                                    <tr>
                                @endif
                                    <td>{{$arr_base['add_apply_data'][$i]['Name']}}</td>
                                @if($i==($tr_i+$col_cnt-1) || $i == (count($arr_base['add_apply_data']))-1)
                                    @if($i == (count($arr_base['add_apply_data']))-1) {{-- 마지막일때 --}}
                                        @php
                                            $remain_cnt = $col_cnt - (count($arr_base['add_apply_data'])%$col_cnt);
                                            if($remain_cnt == $col_cnt) $remain_cnt = 0;
                                        @endphp
                                        @if($remain_cnt != 0)
                                            @for($r=0; $r < $remain_cnt; $r++)
                                                <td></td>
                                            @endfor
                                        @endif
                                    @endif
                                    </tr>
                                    @php $temp_j = 0; @endphp
                                    @for($j=($i-$col_cnt+1+(empty($remain_cnt)? 0 : $remain_cnt)); $j <= $i; $j++)
                                        @if($j==0 || ($j%$col_cnt == 0  && $temp_j == 0) || ($i == (count($arr_base['add_apply_data']))-1 && $temp_j == 0) )
                                            <tr>
                                        @endif
                                            <td>
                                                <div>
                                                    @if(time() >= strtotime($arr_base['add_apply_data'][$j]['ApplyEndDatm']) || $arr_base['add_apply_data'][$j]['PersonLimit'] <= $arr_base['add_apply_data'][$j]['MemberCnt'])
                                                        <span><img src="https://static.willbes.net/public/images/promotion/2020/03/1545_02_img02.png" alt="마감"></span>
                                                    @endif
                                                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1545_02_img01.png" alt="">
                                                </div>
                                            </td>
                                        @if($j==($tr_i+$col_cnt-1) || $j == (count($arr_base['add_apply_data']))-1)
                                            @if(empty($remain_cnt) === false && $remain_cnt != 0)
                                                @for($r=0; $r < $remain_cnt; $r++)
                                                    <td></td>
                                                @endfor
                                            @endif
                                            </tr>
                                        @endif
                                        @php $temp_j++; @endphp
                                    @endfor
                                @endif

                            @endfor
                        @endif

                        </tbody>
                    </table>
                </div>
                <ul>
                    <li><a onclick="javascript:fn_add_apply_submit();" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/03/1545_02_btn01.png"  alt="이벤트신청"/></a></li>
                    {{--<li><a onclick="javascript:fn_promotion_etc_submit();" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_02_btn02.png"  alt="빠른유료구매"/></a></li>--}}
                </ul>            
            </div>
        </form>
        @php
            // *** 그래프 데이터 ***
            $graph_data =  [
                '서울' => ['응시' => '16780', '채용' => '804'],
                '부산' => ['응시' => '2180', '채용' => '157'],
                '대구' => ['응시' => '1670', '채용' => '106'],
                '인천' => ['응시' => '2670', '채용' => '246'],
                '광주' => ['응시' => '1500', '채용' => '67'],
                '대전' => ['응시' => '1320', '채용' => '55'],
                '울산' => ['응시' => '1250', '채용' => '40'],
                '경기남부' => ['응시' => '8690', '채용' => '380'],
                '경기북부' => ['응시' => '5220', '채용' => '245'],
                '강원' => ['응시' => '1310', '채용' => '162'],
                '충북' => ['응시' => '1150', '채용' => '43'],
                '충남' => ['응시' => '2490', '채용' => '147'],
                '전북' => ['응시' => '1090', '채용' => '45'],
                '전남' => ['응시' => '1600', '채용' => '45'],
                '경북' => ['응시' => '1000', '채용' => '82'],
                '경남' => ['응시' => '2380', '채용' => '75'],
                '제주' => ['응시' => '1230', '채용' => '28']
            ];

            // 응시 데이터 더하기
            if(empty($arr_base['stats_data']) === false) {
                foreach ($arr_base['stats_data'] as $i_key => $i_val) {
                    foreach ($graph_data as $j_key => $j_val) {
                        if($j_key == str_replace('청', '', $i_val['Name'])) {
                            $graph_data[$j_key]['응시'] += $i_val['Count'];
                        }
                    }
                }
            }

        @endphp
        
        {{--
        <div class="evtCtnsBox evt03">
            <div class="mapSec">
                <ul class="tabs">
                    <li><a href="#area01" class="active"><span class="off">○ 서울</span><span class="on">● 서울</span></a></li>
                    <li><a href="#area02"><span class="off">○ 부산</span><span class="on">● 부산</span></a></li>
                    <li><a href="#area03"><span class="off">○ 대구</span><span class="on">● 대구</span></a></li>
                    <li><a href="#area04"><span class="off">○ 인천</span><span class="on">● 인천</span></a></li>
                    <li><a href="#area05"><span class="off">○ 광주</span><span class="on">● 광주</span></a></li>
                    <li><a href="#area06"><span class="off">○ 대전</span><span class="on">● 대전</span></a></li>           
                    <li><a href="#area07"><span class="off">○ 울산</span><span class="on">● 울산</span></a></li>
                    <li><a href="#area10"><span class="off">○ 강원</span><span class="on">● 강원</span></a></li>
                    <li><a href="#area08"><span class="off">○ 경기남부</span><span class="on">● 경기남부</span></a></li>
                    <li><a href="#area09"><span class="off">○ 경기북부</span><span class="on">● 경기북부</span></a></li>
                    <li><a href="#area11"><span class="off">○ 충북</span><span class="on">● 충북</span></a></li>
                    <li><a href="#area12"><span class="off">○ 충남</span><span class="on">● 충남</span></a></li>
                    <li><a href="#area13"><span class="off">○ 전북</span><span class="on">● 전북</span></a></li>
                    <li><a href="#area14"><span class="off">○ 전남</span><span class="on">● 전남</span></a></li>
                    <li><a href="#area15"><span class="off">○ 경북</span><span class="on">● 경북</span></a></li>
                    <li><a href="#area16"><span class="off">○ 경남</span><span class="on">● 경남</span></a></li>
                    <li><a href="#area17"><span class="off">○ 제주</span><span class="on">● 제주</span></a></li>                
                </ul>                                 

                <div id="area01" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>서울청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['서울']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['서울']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['서울']['응시'] / $graph_data['서울']['채용'])}} : 1</strong></li>
                    </ul>                    
                </div>                              

                <div id="area02" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>부산청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['부산']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['부산']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['부산']['응시'] / $graph_data['부산']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area03" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>대구청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['대구']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['대구']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['대구']['응시'] / $graph_data['대구']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area04" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>인천청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['인천']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['인천']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['인천']['응시'] / $graph_data['인천']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area05" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>광주청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['광주']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['광주']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['광주']['응시'] / $graph_data['광주']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area06" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>대전청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['대전']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['대전']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['대전']['응시'] / $graph_data['대전']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area07" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>울산청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['울산']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['울산']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['울산']['응시'] / $graph_data['울산']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area10" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>강원청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['강원']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['강원']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['강원']['응시'] / $graph_data['강원']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area08" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>경기남부청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['경기남부']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['경기남부']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['경기남부']['응시'] / $graph_data['경기남부']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area09" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>경기북부청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['경기북부']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['경기북부']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['경기북부']['응시'] / $graph_data['경기북부']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area11" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>충북청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['충북']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['충북']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['충북']['응시'] / $graph_data['충북']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area12" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>충남청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['충남']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['충남']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['충남']['응시'] / $graph_data['충남']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area13" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>전북청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['전북']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['전북']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['전북']['응시'] / $graph_data['전북']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area14" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>전남청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['전남']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['전남']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['전남']['응시'] / $graph_data['전남']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area15" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>경북청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['경북']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['경북']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['경북']['응시'] / $graph_data['경북']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area16" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>경남청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['경남']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['경남']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['경남']['응시'] / $graph_data['경남']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div id="area17" class="areaCts">
                    <ul class="areaData">
                        <li><span>예상 경쟁률</span> <strong>제주청</strong></li>
                        <li><span>- 채용인원</span> <strong>{{number_format($graph_data['제주']['채용'])}}명</strong></li>
                        <li><span>- 응시희망</span> <strong>{{number_format($graph_data['제주']['응시'])}}명</strong></li>
                        <li><span>- 예상경쟁률</span> <strong>{{round($graph_data['제주']['응시'] / $graph_data['제주']['채용'])}} : 1</strong></li>
                    </ul>
                </div>

                <div class="graph">     
                    <h5 class="NGEB">- 2020년 1차 경찰채용 예상 지원청 - </h5>
                    <table cellspacing="0" cellpadding="0">
                        <colgroup>
                            <col style="width:12%">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>
                                    <ul>
                                        <li>18,000</li>
                                        <li>16,000</li>
                                        <li>14,000</li>
                                        <li>12,000</li>
                                        <li>10,000</li>
                                        <li>8,000</li>
                                        <li>6,000</li>
                                        <li>4,000</li>
                                        <li>2,000</li>
                                        <li>0</li>
                                    </ul>
                                </th>
                                <td><div style="height:{{$graph_data['서울']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['부산']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['대구']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['인천']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['광주']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['대전']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['울산']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['경기남부']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['경기북부']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['강원']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['충북']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['충남']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['전북']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['전남']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['경북']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['경남']['응시']/20000*100}}%"> </div></td>
                                <td><div style="height:{{$graph_data['제주']['응시']/20000*100}}%"> </div></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>지역</th>
                                <th>서울</th>
                                <th>부산</th>
                                <th>대구</th>
                                <th>인천</th>
                                <th>광주</th>
                                <th>대전</th>
                                <th>울산</th>
                                <th>경기남부</th>
                                <th>경기북부</th>
                                <th>강원</th>
                                <th>충북</th>
                                <th>충남</th>
                                <th>전북</th>
                                <th>전남</th>
                                <th>경북</th>
                                <th>경남</th>
                                <th>제주</th>
                            </tr>
                            <tr>
                                <th>응시희망청 인원</th>
                                <th>{{number_format($graph_data['서울']['응시'])}}</th>
                                <th>{{number_format($graph_data['부산']['응시'])}}</th>
                                <th>{{number_format($graph_data['대구']['응시'])}}</th>
                                <th>{{number_format($graph_data['인천']['응시'])}}</th>
                                <th>{{number_format($graph_data['광주']['응시'])}}</th>
                                <th>{{number_format($graph_data['대전']['응시'])}}</th>
                                <th>{{number_format($graph_data['울산']['응시'])}}</th>
                                <th>{{number_format($graph_data['경기남부']['응시'])}}</th>
                                <th>{{number_format($graph_data['경기북부']['응시'])}}</th>
                                <th>{{number_format($graph_data['강원']['응시'])}}</th>
                                <th>{{number_format($graph_data['충북']['응시'])}}</th>
                                <th>{{number_format($graph_data['충남']['응시'])}}</th>
                                <th>{{number_format($graph_data['전북']['응시'])}}</th>
                                <th>{{number_format($graph_data['전남']['응시'])}}</th>
                                <th>{{number_format($graph_data['경북']['응시'])}}</th>
                                <th>{{number_format($graph_data['경남']['응시'])}}</th>
                                <th>{{number_format($graph_data['제주']['응시'])}}</th>
                            </tr>
                        <tfoot>
                    </table> 
                    <p class="txtinfo01">* 자사 수강생 응시희망청 조사 기반, 최근 5회차 평균 응시인원 반영</p>                       
                </div>
            </div>

            <div class="evtCtnsBox stats-confirm">
                <a href="javascript:fn_check_reg_member();">
                    <div class="first_confirm">
                        <img src="https://static.willbes.net/public/images/promotion/2020/02/1545_03_btn.png">
                    </div>
                </a>    
            </div>   
        </div>
        --}}

         

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04.jpg"  alt=""/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_01.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_02.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_03.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_04.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_05.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_06.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_07.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_08.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_09.jpg" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_btn_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_btn_arrowR.png"></a></p>
            </div>
        </div>
            
        <div class="wb_ctsInfo">
            <div>
                <h3 class="NGEB">유의사항</h3>
                <dd>                   
                    <dl> - 봉투모의고사 구성안내봉투 모의고사 구성은 한국사,영어,형법,형소법,경찰학개론 과목별 3회분 전범위모의고사 및 별도해설/OMR카드 포장하여 증정됩니다.</dl>
                    <dl> - 이벤트 상품은 비매품으로 절대 판매할수 없습니다.</dl>                 
                </dd>                
                <dd>
                    <dt>봉투모의고사 이벤트 신청안내신청기간</dt>
                    <dl>
                        - 2020년 3월 20일~3월 29일까지 ,매일 20시부터 선착순 40명<br>
                        - 매일 20시 총 10일 – 선착순 40명 / 총 400명<br>
                        - 로그인 이후 이벤트 페이지에서 신청가능합니다(희망응시청 및 응시번호 필수 체크)<br>
                        - 한ID 당 1회 신청가능(40명 이벤트 중복당첨불가)<br>
                        - 3월 31일(화) 일괄문자 안내공지 진행합니다.(무료 당첨자에 한함)<br>
                        - 이벤트 봉투모의고사 무료이벤트 진행 : 매일 20시 선착순 40권 , 총 400부<br>
                        - 무료이벤트 : 추후 배송비 2,500원
                    </dl>                   
                </dd>               
            </div>
        </div>    

	</div>
    <!-- End Container -->

    <script type="text/javascript">

        {{-- 유료 --}}
        function fn_promotion_etc_submit() {

            @if(date('YmdHi') < '202003202000' && ENVIRONMENT == 'production')
                alert('3월20일 20:00 부터 이벤트 참여 가능합니다.');
                return;
            @endif

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/promotionEtcStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    // location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        {{-- 무료 당첨 --}}
        function fn_add_apply_submit() {

            @if(date('YmdHi') < '202003202000' && ENVIRONMENT == 'production')
                alert('3월20일 20:00 부터 이벤트 참여 가능합니다.');
                return;
            @endif

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.'); return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        {{-- 통계그래프 보기 체크 --}}
        function fn_check_reg_member() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var $add_apply_form = $('#add_apply_form');
            var _check_url = '{!! front_url('/promotion/checkEventRegisterMember/') !!}?el_idx={{$data['ElIdx']}}';
            ajaxSubmit($add_apply_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    /*$('.stats-div').css('opacity',.1);*/
                    $('.stats-confirm').hide();
                }
            }, showValidateError, null, false, 'alert');
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['이미 신청하셨습니다.','이미 당첨되셨습니다.'],
                ['신청 되었습니다.','당첨을 축하합니다. 추후 안내 문자 발송 예정입니다.'],
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
                ['마감되었습니다.','이벤트 기간에 응모해주세요. 당일 20:00부터 시작됩니다.']
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length == 0) {
                alert('희망지원청을 선택 해주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length > 1) {
                alert('희망지원청은 1개까지만 선택 가능합니다.');
                return;
            }

            var $register_data2 = $regi_form_register.find('select[name="register_data2[]"]');
            if ($register_data2.val() == '') {
                alert('응시직렬을 선택해주세요.');
                $register_data2.focus();
                return;
            }

            var $register_data3 = $regi_form_register.find('input[name="register_data3[]"]');
            var exam_num = $register_data3.val();
            if (exam_num == '') {
                alert('응시번호를 입력해주세요.');
                $register_data3.focus();
                return;
            } else {
                var exam_num_check = true;
                switch ($register_data2.val()){
                    case '일반남자' :
                        if(exam_num < 10001 || exam_num > 19999) exam_num_check = false;
                        break;
                    case '일반여자' :
                        if(exam_num < 20001 || exam_num > 29999) exam_num_check = false;
                        break;
                    case '전의경경채' :
                        if(exam_num < 30001 || exam_num > 39999) exam_num_check = false;
                        break;
                    case '101단' :
                        if(exam_num < 40001 || exam_num > 49999) exam_num_check = false;
                        break;
                    case '경력채용' :
                        if(exam_num < 60001 || exam_num > 99999) exam_num_check = false;
                        break;
                }

                if(exam_num_check === false) {
                    alert('응시번호가 잘못 되었습니다.');
                    $register_data3.focus();
                    return;
                } else {
                    $regi_form_register.find('input[name="register_chk_other_val[]"]').eq(0).val($regi_form_register.find('input[name="register_data1[]"]:checked').val() + ',');
                    $regi_form_register.find('input[name="register_chk_other_val[]"]').eq(1).val(',' + exam_num);
                }
            }

            if (!confirm('신청하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

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

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop