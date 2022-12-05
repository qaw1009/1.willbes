@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/11/2821_top_bg.jpg) no-repeat center top; height: 1008px;}
        .eventTop span {position: absolute; top:300px; left:50%; margin-left:-420px}

        .evt02 .btns {margin:50px 0;}
        .evt02 .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#000; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt02 .btns a:hover {background:#5d46c0}

        .evt03 {width:1120px; margin:0 auto;}        
        .evt_table {width:980px; margin:0 auto; border:1px solid #000; padding:50px}       
        .evt_table table{width:100%;border-top:1px solid #e9e9e9;}
        .evt_table table tr.elementary {border-bottom:1px solid #666}
        .evt_table table tr {border-bottom:1px solid #e9e9e9}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666}
        .evt_table table th {background:#f9f9f9; color:#000;}
        .evt_table thead th {background:#d9d9d9; color:#000; font-size:24px; font-weight:bold; padding:20px; border:1px solid #000}
        .evt_table table td{text-align:left; padding:17px 10px}
        .evt_table label {margin-right:10px; line-height:28px;}
        .evt_table input {vertical-align:middle}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:90%; margin-bottom:5px}
        .evt_table td input[type=text]:last-child {margin-bottom:0}
        .evt_table input[type=radio],
        .evt_table input[type=checkbox] {height:20px; width:20px; margin-right:5px}
        .evt_table td ul {display:flex; flex-wrap: wrap;}
        .evt_table td li {letter-spacing:-1px;margin:20px 0;}
        .evt_table tr:nth-child(3) li {width:33.3333%;}
        .evt_table tr:nth-child(4) li {width:33.3333%;}
        .evt_table td .editBtn {padding:5px 15px; background:#5e46c0; color:#fff; border-radius:30px}
        .middle {background:#0070C0;color:#fff;display:inline-block;padding:0 10px;}
        .subject_line {border-bottom:1px solid #E9E9E9;}
        .subjct_title {font-weight:bold;vertical-align:unset;}
        .cms {font-weight:100;vertical-align:text-top;font-size:11px;background:#666;color:#fff;padding:0px 5px;margin-left:3px;}
        .check {margin:10px auto 30px; text-align:left}
        .check p {margin-bottom:50px;padding-top:75px;}
        .check label {cursor:pointer; font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        
        .evt_apply_table {width:980px; margin:0 auto;padding:50px}
        .evt_apply_table .btns_apply {text-align:center;}
        .evt_apply_table .btns_apply a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#000; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_apply_table .btns_apply a:hover {background:#af1e2d}

        .evt_cancle_table {width:980px; margin:0 auto;padding:50px}
        .evt_cancle_table .btns_cancel {text-align:center;}
        .evt_cancle_table .btns_cancel a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#000; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_cancle_table .btns_cancel a:hover {background:#af1e2d}

        .evt_table .txtinfo {text-align:left;}
        .evt_table .txtinfo div {font-size:18px; font-weight:bold; margin-bottom:20px}
        .evt_table .txtinfo ul {padding:20px; border:1px solid #ccc; height: 150px; overflow-y: auto;}
        .evt_table .txtinfo li {list-style: dimical; margin-left:15px; margin-bottom:10px;line-height:1.25;}
        .evt_table .txtinfo li a {display:inline-block; font-size:12px; color:#ffff00; border:1px solid #ffff00; border-radius:20px; padding:2px 10px}

        .evt_table .close {position: absolute; display:flex; background:rgba(0,0,0,0.5); width:100%; height: 100%; left:0; top:0; z-index: 10;justify-content: center;align-items: center;}
        .evt_table .close span {border:10px double #cc0000; color:#cc0000; font-size:50px; padding:40px; transform: rotate(-20deg)}

        .evt04 {background:#FFE7E7;}

        .maps {padding:50px 0;}        
      
        .evt05 {background:#eee;}

        .evt06 {padding:100px 0}
        .urlWrap {width:1030px; margin:0 auto}
        .urlWrap .urladd {padding:20px; background:#2e2e3c; color:#fff; margin:0 auto 20px; font-size:14px}
        .urlWrap .urladd input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:70%; margin:0 10px; color:#000}
        .urlWrap .urladd a {display:inline-block; height:28px; line-height:28px; color:#2e2e3c; background:#ffc943; padding:0 20px; vertical-align:middle}
        .urlWrap .evt_table {width:100%; background-color:#fff !important; padding:20px 0}
        .urlWrap .evt_table table td {font-size:14px; text-align:center}
        .urlWrap .evt_table table td:nth-child(2) {text-align:left}

        .evt07 {background:url(https://static.willbes.net/public/images/promotion/2022/11/2821_07_bg.jpg) no-repeat center top;}
        .evt08 {background:#171717; padding:150px 0}
        .evt08 .wrap {margin:50px auto 100px; display:flex; flex-wrap: wrap; justify-content: space-between; }
        .evt08 .wrap a {margin-bottom:20px}
        .evt08 .tableBox {width:1120px; margin:50px auto 0; padding:50px; background:#fff; border-radius:20px}
        .evt08 .tableBox th,
        .evt08 .tableBox td {padding:15px 10px; border:0; font-size:16px}
        .evt08 .tableBox td:nth-child(2) {text-align:left}
        .evt08 .tableBox tr {border-bottom:1px solid #ccc}
        .evt08 .tableBox tr:nth-child(1) {border-top:1px solid #ccc}
        .evt08 .tableBox tr:hover {background:#fdf1c9}
        .evt08 .tableBox td a {display:block}

        /*안내사항*/
        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

         /*레이어팝업*/
         .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: -39px;
            top: -39px;
            display: inline-block;
            cursor: pointer;
            width: 78px;
            height: 78px; 
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}
        
        .Pstyle .content {height:auto; width:auto;}
        .memoirs {background:#fff; padding:50px; width:900px; height:500px; overflow-y: scroll; font-size:15px; line-height:1.3}
        .memoirstitle {font-size:18px; padding-bottom:10px; border-bottom:1px solid #ccc; margin-bottom:10px; display:flex; justify-content: space-between;}
        .memoirstitle span {vertical-align:top}
        .memoirstitle strong {color:#1a4bba}


        .videoBox{position: relative; padding-top: 60%; width:760px;}
        .videoBox iframe{position: absolute; top:0; left:0; width:100%; height:100%; }

    </style>

    <div class="evtContent NSK" id="evtContainer">
        
        <div class="evtCtnsBox eventTop">
        	<span data-aos="flip-down"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_top.png" alt="합격전략 설명회"/></span>
        </div>

        <div class="evtCtnsBox evt08" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_title01.png" alt="윌비스 임용 합격생 간담회"/>
            <div class="wrap">
                <a href="javascript:videoPop('#vid1');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum.png"></a>
                <a href="javascript:videoPop('#vid2');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum.png"></a>
                <a href="javascript:videoPop('#vid3');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum.png"></a>
                <a href="javascript:videoPop('#vid4');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum.png"></a>
                <a href="javascript:videoPop('#vid5');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum.png"></a>
                <a href="javascript:videoPop('#vid6');"><img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_sum.png"></a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_08_title02.png" alt="윌비스 임용 합격생 간담회"/>
            <div class="tableBox">
                <table cellspacing="0" cellpadding="0">
                    <col width="15%">
                    <col>
                    <col width="10%">
                    <tbody>
                        <tr>
                            <td>도덕윤리</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">2차 고득점의 비결은 1차 고득점이다.</a></td>
                            <td>박동*</td>
                        </tr>
                        <tr>
                            <td>유아</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">21년대비유아민정선교수님/2022경기최종합격/일병행</a></td>
                            <td>한우*</td>
                        </tr>
                        <tr>
                            <td>전공일반사회</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">윌비스 일반사회 허역팀 강의를 수강하고 합격하였습니다.</a></td>
                            <td>유소*</td>
                        </tr>
                        <tr>
                            <td>전공생물</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">작년최탈 후 재도전, 올해는 최합 했습니다!</a></td>
                            <td>유지*</td>
                        </tr>
                        <tr>
                            <td>전문상담</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">임산부도 했어요~ 다들 할 수 있어요~!!</a></td>
                            <td>김미*</td>
                        </tr>
                        <tr>
                            <td>전기</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">일 병행 합격했습니다.</a></td>
                            <td>김은*</td>
                        </tr>
                        <tr>
                            <td>전공음악</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">음악임용의 종지부</a></td>
                            <td>김신*</td>
                        </tr>
                        <tr>
                            <td>전자</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">전자초수 합격</a></td>
                            <td>김소*</td>
                        </tr>
                        <tr>
                            <td>전공국어</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">꾸준함이 정말 최고입니다!</a></td>
                            <td>이현*</td>
                        </tr>
                        <tr>
                            <td>전공역사</td>
                            <td><a href="#none" onclick="javascript:go_popup3()">2022 역사 합격수기</a></td>
                            <td>임강*</td>
                        </tr>
                    </tbody>
                </table>
                <div class="Paging">
                    <ul>
                        <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"> </a></li>
                        <li><a class="on" href="#">1</a><span class="row-line">|</span></li>
                        <li><a href="#none">2</a><span class="row-line">|</span></li>
                        <li><a href="#none">3</a><span class="row-line">|</span></li>
                        <li><a href="#none">4</a><span class="row-line">|</span></li>
                        <li><a href="#none">5</a><span class="row-line">|</span></li>
                        <li><a href="#none">6</a><span class="row-line">|</span></li>
                        <li><a href="#none">7</a><span class="row-line">|</span></li>
                        <li><a href="#none">8</a><span class="row-line">|</span></li>
                        <li><a href="#none">9</a><span class="row-line">|</span></li>
                        <li><a href="#none">10</a></li>
                        <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"> </a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{--유튜브 영상--}}
        <div id="vid1" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/jJZRVBm3fCM?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid2" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/1KPVPoL63HY?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid3" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/4Njnhbcl7Xs?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid4" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/beHIn0F_2lI?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid5" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/hPXBthC1xmU?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
        <div id="vid6" style="display: none;">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span> 
            <div class="videoBox">
                <iframe src="https://www.youtube.com/embed/Y2W3lUrn3aI?rel=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>

        {{--수기 팝업--}}
        <div id="popup3" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>   
            <div class="content">         
                <div class="memoirs NSK">
                    <div class="memoirstitle"><span><strong>도덕윤리</strong> 2차 고득점의 비결은 1차 고득점이다.</span> <span>박동*</span></div>
                    <div>
                        안녕하세요. 2022년도 중등임용고시 도덕·윤리 과목에 응시하여 초수에 합격한 윌비스 수강생입니다. 우선 이 합격수기를 보고 계실 여러분께 힘찬 응원 보냅니다. 저 또한 1년간 지독하게 공부를 해보았기 때문에 그 힘듦과 괴로움,외로움을 잘 알고 있기에 여러분들의 수고에 공감을 하지 않을 수 없습니다. 여러분들은 정말 대단한 하루를 수행해나가고 계시기에 박수받아 마땅하다고 생각합니다.<br>
                        <br>
                        합격을 하기 위해 고군분투하고 계신 여러분 모두 대단하시고 수고많으십니다. 그러면 제 합격수기 시작하겠습니다.(1차컷+18.67 2차컷+8.1) <br>
                        <br>
                        제가 합격수기에서 알려드릴 것은 어떤 계획을 짜서 어떤 책을 보며 공부했다는 것을 알려드리기 보단 공부를 시작할 때 지켜야 할 점에 대해 알려드리고자 합니다.<br>
                        <br>
                        저는 공부를 시작하면서 제일 먼저 해야할 첫 단추는 자신이 어떤 공부에 적합한지를 파악하는 것이라 생각합니다.<br>
                        <br>
                        <br>
                        공부의 분류는 크게 두가지로 나눌 수 있습니다.<br>
                        <br>
                        첫번째 적자생존형 공부입니다.<br>
                        적자생존형은 기본서를 보고 노트에 중요한 내용을 필기하여 자신만의 서브노트를 만드는 공부방식입니다.<br>
                        이 공부방식의 장점은 깊은 암기가 가능하며 망각곡선중 망각이 시작되는 시점이 늦다는 점입니다.<br>
                        하지만 적자생존형 공부방식은 시간이 오래 걸리며 이해가 동반된 필기가 아니라면 손목만 아프고 시간만 낭비하는 공부가 될 수 있다는 단점을 가지고 있습니다.<br>
                        <br>
                        <br>
                        두번째 공부방식은 읽자생존형 공부방식입니다.<br>
                        읽자생존형은 기본서에 밑줄을 그어가며 눈으로 읽으며 밑줄친 부분을 이해될 때까지 반복하여 읽는 것입니다. 이 공부방식의 장점은 회독시간이 빠르며 짧은 시간내에 많은 암기가 가능하다는 점입니다.<br>
                        <br>
                        하지만 이 공부방식의 단점은 회독수가 굉장히 많지 않으면 쉽게 잊어 먹으며 쉽게 응용은 가능하나 완벽한 암기가 되지 않는다는 점입니다.<br>
                        <br>
                        저는 노트에 필기를 해놓아도 악필이여서 알아보지 못하는 경우가 많았고 노트를 볼 시간에 차라리 기본서를 읽는게 더 효과적인것 같아 읽자생존형 공부방식을 선택하였습니다.<br>
                    </div>
                </div> 
            </div> 
        </div>  

        <div class="evtCtnsBox evt01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_01.jpg" alt="윌비스 임용과 함께"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_02.jpg" alt="타임 테이블"/>
            {{--
            <div class="btns">
                <a href="javascript:go_popup1()" title="">유아 설명회 강의실 배정 현황 확인 ></a>
                <a href="javascript:go_popup2()" title="">중등 설명회 강의실 배정 현황 확인 ></a>        
            </div>
            --}}
        </div>

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" id="register_name" name="register_name" value="{{(sess_data('is_login') === true) ? $arr_base['member_info']['MemName'] : ''}}">
            <input type="hidden" id="register_tel" name="register_tel" value="{{(sess_data('is_login') === true && empty($arr_base['member_info']['Phone']) === false) ? $arr_base['member_info']['Phone'] : ''}}">

            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data3"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="출신학교/학부/학년"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="희망응시지역"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="응시횟수"/> {{-- 체크 항목 전송 --}}

            <div class="evtCtnsBox evt03" id="runningMate" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_03.jpg" alt="설명회 신청"/>
                <div class="evt_table p_re">
                    {{-- 신청완료 --}}
                    @if (empty($register_count) === false)
                        <div class="close NSK-Black"><span>설명회<br>신청 완료</span></div>
                    @endif

                    <div class="txtinfo">
                        <div>개인정보 제공 동의 문구</div>
                        <ul>
                            <li>개인정보 수집 이용 목적<br>
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                                - 통계분석 및 마케팅 <br>
                                - 윌비스 임용의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                            </li>
                            <li>개인정보 수집 항목<br>
                                - 필수항목 : 성명, 연락처, 출신학교, 출신학과, 시험응시횟수, 희망응시지역
                            </li>
                            <li>개인정보 이용기간 및 보유기간<br>
                                - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                            </li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                                - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                            </li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                            <li>이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
                        </ul>
                    </div>
                    <div class="check" id="chkInfo">
                        <label>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y" autocomplete="off"/>
                            윌비스에 개인정보 제공 동의하기 (필수)
                        </label>
                    </div>

                    <table>
                        <col width="10%" />
                        <col width="23%" />
                        <col width="10%" />
                        <col width="23%" />
                        <col width="10%" />
                        <col width="23%" />
                        <tbody>
                            <tr>
                                <th>윌비스 ID</th>
                                <td>{{sess_data('mem_id')}}</td>
                                <th>이 름</th>
                                <td>{{sess_data('mem_name')}}</td>
                                <th>연락처</th>
                                <td>
                                    {{(sess_data('is_login') === true && empty($arr_base['member_info']['Phone']) === false) ? $arr_base['member_info']['Phone'] : ''}}
                                </td>
                            </tr>
                            <tr>
                                <th>출신학교/<br />
                                    학부/학년
                                </th>
                                <td>
                                    <input type="text" name="register_data1" maxlength="100">
                                </td>
                                <th>희망응시지역</th>
                                <td>
                                    <select id="register_data2" name="register_data2" title="지역선택">
                                        <option value="">지역선택</option>
                                        <option value="서울">서울</option>
                                        <option value="경기">경기</option>
                                        <option value="인천">인천</option>
                                        <option value="강원">강원</option>
                                        <option value="대전">대전</option>
                                        <option value="세종">세종</option>
                                        <option value="충북">충북</option>
                                        <option value="충남">충남</option>
                                        <option value="대구">대구</option>
                                        <option value="경북">경북</option>
                                        <option value="부산">부산</option>
                                        <option value="울산">울산</option>
                                        <option value="경남">경남</option>
                                        <option value="전북">전북</option>
                                        <option value="광주">광주</option>
                                        <option value="전남">전남</option>
                                        <option value="제주">제주</option>
                                    </select>
                                </td>
                                <th>응시횟수</th>
                                <td>
                                    <select id="register_data3" name="register_data3" title="응시횟수">
                                        <option value="">응시횟수</option>
                                        <option value="초수">초수</option>
                                        <option value="재수">재수</option>
                                        <option value="삼수 이상">삼수 이상</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="elementary">
                                <th>유•초등</th>
                                <td colspan="5">
                                    <ul>
                                        <li><label><input class="btn-product-check" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][0]['PersonLimit'] or '0'}}" data-product-group="1" autocomplete="off"/><span class="subjct_title">유아</span> 민정선 교수</label></li>
                                        <li><label><input class="btn-product-check" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][1]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][1]['PersonLimit'] or '0'}}" data-product-group="1" autocomplete="off"/><span class="subjct_title">초등</span> 배재민 교수<em class="cms">일정추후공지</em></label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>중등</th>
                                <td colspan="5">
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][2]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][2]['PersonLimit'] or '0'}}" data-product-group="2" autocomplete="off"/><span class="subjct_title">교육학 논술</span> 이경범 교수</label></li>
                                        <li><label><input class="btn-product-check" type="radio" name="register_chk[]" value="{{ $arr_base['register_list'][3]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][3]['PersonLimit'] or '0'}}" data-product-group="2" autocomplete="off"/><span class="subjct_title">교육학 논술</span> 정현 교수</label></li>
                                        <li><p class="middle">※ 중등은 교육학을 반드시 선택!</p></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][4]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][4]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 국어</span> 송원영 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][5]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][5]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 국어</span> 권보민 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][6]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][6]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 국어</span> 구동언 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][7]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][7]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">일반영어/영미문학</span> 김유석 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][8]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][8]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">영어학</span> 김영문 교수 <em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][9]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 수학</span> 김철홍 교수<em class="cms">일정추후공지</em></label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][10]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][10]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 수학</span> 김현웅 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][11]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][11]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">수학 교육론</span> 박태영 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][12]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][12]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">수학 교육론</span> 박혜향 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][13]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][13]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 생물</span> 강치욱 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][14]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][14]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">생물 교육론</span> 앙혜정 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][15]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][15]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 화학</span> 강철 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][16]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][16]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">도덕 윤리</span> 김병찬 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][17]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][17]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">일반 사회</span> 허역 교수팀</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][18]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][18]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 역사</span> 김종권 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][19]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][19]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 음악</span> 다이애나 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][20]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][20]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 체육</span> 최규훈 교수<em class="cms">일정추후공지</em></label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][21]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][21]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전공 중국어</span> 장영희 교수</label></li>
                                    </ul>
                                    <ul class="subject_line">
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][22]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][22]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">전기·전자·통신</span> 최우영 교수</label></li>
                                        <li><label><input class="btn-product-check sub-product" type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][23]['ErIdx'] or ''}}" data-product-limit="{{ $arr_base['register_list'][23]['PersonLimit'] or '0'}}" data-product-group="3" autocomplete="off" disabled/><span class="subjct_title">정컴 교육론</span> 장순선 교수<em class="cms">일정추후공지</em></label></li>
                                    </ul>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        @if (empty($register_count) === true)
            <div class="evt_apply_table p_re">
                <div class="btns_apply">
                    <a href="javascript:void(0);" onclick="fn_submit(); return false;">설명회 참석 신청하기 ></a>
                </div>
            </div>
        @else
            <form name="delete_register" id="delete_register">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
                @foreach($register_count as $key => $row)
                    <input type="hidden" name="em_idx[]" value="{{$row['EmIdx']}}">
                @endforeach
            </form>
            <div class="evt_cancle_table p_re">
                <div class="btns_cancel">
                    <a href="javascript:void(0);" onclick="fn_register_delete(); return false;">설명회 참석 취소하기 ></a>
                </div>
            </div>
        @endif

        <div class="evtCtnsBox evt04" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_04.jpg" alt="푸짐한 선물"/>
        </div>
            
        <div id="Container" class="Container ssam NGR c_both maps">
            @include('willbes.pc.site.main_partial.map_' . $__cfg['SiteCode'])
        </div>
        
        <div class="evtCtnsBox evt05" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_05.jpg" alt="소문내기 이벤트"/>
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_06.jpg" alt="sns"/>
                <a href="https://cafe.daum.net/teacherexam" title="다음카페" target="_blank" style="position: absolute;left: 51.7%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/teacherexam2" title="네이버카페" target="_blank" style="position: absolute;left: 56.15%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://www.facebook.com" title="페이스북" target="_blank" style="position: absolute;left: 60.55%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://www.instagram.com" title="인스타그램" target="_blank" style="position: absolute;left: 64.25%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="https://section.blog.naver.com" title="블로그" target="_blank" style="position: absolute;left: 67.95%;top: 29.66%;width: 3.61%;height: 37.25%;z-index: 2;"></a>
                <a href="javascript:void(0);" title="주소복사하기" onclick="copyTxt();"  style="position: absolute;left: 72.41%;top: 29.66%;width: 9.13%;height: 38.25%;z-index: 2;"></a>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 82.25%;top: 29.66%;width: 9.13%;height: 38.25%;z-index: 2;"></a>
            </div>
            <div class="urlWrap">
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
                @endif
            </div> 
        </div>

        <div class="evtCtnsBox evt07" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/11/2821_07.jpg" alt="여러분 차례"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">※ 합격전략 설명회 신청 관련 안내 사항</h4>
                <ul>
                    <li>윌비스 임용의 합격 전략 설명회(이하, 설명회)는 2022년 12월17일(토)에 진행되며,<br>
                        유아는 15시부터, 증등(교육학)은 13시부터 진행됩니다.</li>
                    <li>본 설명회는 2024학년도 시험을 대비 하는 이벤트입니다. (대학(원)재학생, 졸업예정자가 참석하셔도 됩니다.)</li>
                    <li>설명회 참석을 위해서는 본 페이지를 통하여 사전에 신청해 주셔야 합니다.<br>
                        * 중등의 경우, 교육학과 전공과목을 신청할 수 있습니다. 
                    </li>
                    <li>설명회 참석 신청은 설명회장(강의실) 상황에 따라서 조기에 마감될 수 있습니다. (사전 신청 부탁드립니다.)</li>
                    <li>설명회 신청내역을 수정하실 분은 취소 후, 다시 작성해 주시면 됩니다.</li>
                    <li>설명회 관련 자세한 문의 사항은 홈페이지 1:1상담 게시판을 통하여 요청하시면 됩니다.</li>
                    <li>설명회장에는 무료로 운영하는 주차장이 없습니다. 가급적 대중교통을 이용해 주시면 되고, 부득이한 경우 노량진의 유료 주차장을 사전에 검색해 보시고 오시는 것이 좋습니다.</li> 
                    <li>설명회에 참석하시면 푸짐한 혜택이 있습니다. <br>
                        - 사전접수 후, 참석하시는 모든 분께 카카오 플래너(3종중 1종 랜덤)를 드립니다. <br>
                        - 추첨을 통하여 연간패키지 수강권, 아이패드, 애플워치, 스타벅스 교환권(3만원권)을 드립니다. <br>
                        - 설명회 당일, 연간패키지를 접수하시면 문화상품권(2만원권)을 드립니다. (연간패키지를 설명회 전에 접수하시고, 설명회에 참석하
                        셔도 문화상품권을 받을 수 있습니다.<br>
                        - 연간패키지 선착순 1,000명 접수 이벤트도 별도로 진행됩니다.</li>    
                </ul>
                <h4 class="NSK-Black mt100">※ 소문내기 이벤트 관련 유의사항</h4>
                <ul>
                    <li>SNS는 페이스북, 인스타그램이 해당되며, 카페와 블로그의 경우 정상적으로 운영 및 활동이 진행되는 곳이어야 합니다.<br>
                        (검색 창에 ‘교원 임용’ 검색 시, 상단에 노출되는 카페)
                    </li>
                    <li>윌비스 임용의 합격전략설명회 안내 링크 또는 캡처된 이미지가 포함되어 있을 경우에만 이벤트 참여로 인정됩니다.</li>
                    <li>본 이벤트와 관련 없는 글이나, 삭제 및 비공개로 설정 되어 있는 경우에는 당첨에서 제외될 수 있습니다.</li>
                    <li>이벤트 상품은 기프티콘으로 지급될 예정이며, 회원가입 시 입력한 휴대폰 번호로 전송됩니다.<br>
                        (회원 정보 수정이 필요한 경우, 12월 27일까지 수정해 주셔야 합니다.)
                    </li>
                </ul>
            </div>
        </div>
        

         <!--레이어팝업-->
         <div id="popup1" class="Pstyle">
            <span class="b-close"></span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_assign01.png" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close"></span>   
            <div class="content2">         
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2821_assign02.png" class="off" alt="" />  
            </div> 
        </div>      

    </div>
    <!-- End Container -->


    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();

            $('#regi_form_register').on("click", "input, select", function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            });

            $('.btn-product-check').on('click', function () {
                var this_group = $(this).data("product-group");
                var this_limit = $(this).data("product-limit");

                if (this_limit < 1) {
                    alert('해당 과목의 설명회 일정은 추후 공지됩니다.');
                    return false;
                }

                if (this_group > 1) {
                    $(".sub-product").prop("disabled", false);
                } else {
                    $(".sub-product").prop("disabled", true);
                }

                if (this_group != 3) {
                    $(".sub-product").prop("checked", false);
                }

                if (this_group == 3) {
                    if ($(".sub-product:checked").length >= 3) {
                        alert('전공과목은 2개까지 선택할 수 있습니다.');
                        return false;
                    }
                }
            });
        });

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($register_count) === false)
                alert('등록된 신청자 정보가 있습니다.');
                return;
            @endif

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1"]').val() == '') {
                alert('출식학교/학부/학년을 입력해 주세요.');
                return;
            }

            if ($regi_form_register.find('select[name="register_data2"]').val() == '') {
                alert('희망응시지역을 선택해 주세요.');
                return;
            }

            if ($regi_form_register.find('select[name="register_data3"]').val() == '') {
                alert('응시횟수를 선택해 주세요.');
                return;
            }

            var chk_length = $regi_form_register.find('input[name="register_chk[]"]:checked').length;
            if (chk_length < 1) {
                alert('과목을 선택해 주세요.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function fn_register_delete()
        {
            var $delete_register = $('#delete_register');
            var _url = '{!! front_url('/event/deleteAllRegister') !!}';

            if (!confirm('취소 하시겠습니까?')) { return; }
            ajaxSubmit($delete_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function pullOpen(){
            var url = "{{front_url('/promotion/index/cate/3137/code/2844_popup')}}";
            window.open(url,'arm_event', 'top=100,scrollbars=no,toolbar=no,resizable=yes,width=560,height=315');
        }

        // 비디오팝업
        function videoPop(id) { 
            $(id).bPopup({
                positionStyle:'fixed',            
                onClose: function(){
                    $('video').each(function(){
                        $(this).get(0).pause();
                    });
                }
            });
        } 

        /*레이어팝업*/     
        function go_popup1(){$('#popup1').bPopup();}
        function go_popup2(){$('#popup2').bPopup();}
        function go_popup3(){$('#popup3').bPopup();}

        </script>

{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop