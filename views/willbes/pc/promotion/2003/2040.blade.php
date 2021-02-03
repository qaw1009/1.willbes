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
        .sky {position:fixed;top:100px;right:10px; width:144px; z-index:200;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2040_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#fff;}

        .form_area{width:980px;background:#fff;margin:0 auto;padding:0 65px;}
        .form_area h4{height:60px;line-height:60px;font-size:30px; background:#03675f; color:#fff;}
        .form_area h5{font-size:16px;margin-bottom:10px;font-weight:bold; color:#03675f;}
        .form_area strong {display:inline-block; width:120px; color:#03675f}
        .form_area .star {color:#03675f; margin-right:5px;font-size:7px; vertical-align:middle}
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

        .btn a {font-size:30px; display:block; border-radius:50px; background:#03675f; color:#fff; padding:20px 0}
        .btn a:hover {background:#333;}

        .evt_guide {padding-bottom:25px;}

        .evt02 {background:#0160E0;}
        .evt02 > div {width:700px; margin:0 auto}
        .evt02 div table {table-layout: auto; border-top:1px solid #757578;}
        .evt02 div table th,
        .evt02 div table td {padding:10px 5px; border-bottom:1px solid #757578; border-right:1px solid #757578; text-align: center; font-weight: 600; font-size:20px}
        .evt02 div table th {background: #252525; color:#fff;}
        .evt02 div table td {font-size:18px; color:#fff;}
        .evt02 div table td div {position:relative}
        .evt02 div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
        .evt02 div table td span.first_come {position:absolute;width:100%;left:48%;margin-left:-59px;margin-top:-59px;}
        .evt02 div table td span.bubble {position:absolute;width:100%;left:125%;margin-left:-59px;margin-top:-69px;}
        .evt02 div table tbody th {background: #f9f9f9; color:#555;}
        .evt02 div table tbody th:last-child,
        .evt02 div table tbody td:last-child {border-right:0;}
        .evt02 ul { width:1000px; margin:50px auto 0}
        .evt02 li {display:inline;margin-left:25px;}
        .evt02 ul:after {content:""; display:block; clear:both}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2040_03_bg.jpg) no-repeat center top;}

        .evt04 {background:#0160E0;padding-bottom:100px;}
        .evt04 > div {width:700px; margin:0 auto}
        .evt04 div table {table-layout: auto; border-top:1px solid #757578;}
        .evt04 div table th,
        .evt04 div table td {padding:10px 5px; border-bottom:1px solid #757578; border-right:1px solid #757578; text-align: center; font-weight: 600; font-size:20px}
        .evt04 div table th {background: #252525; color:#fff;}
        .evt04 div table td {font-size:18px; color:#fff;}
        .evt04 div table td div {position:relative}
        .evt04 div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
        .evt04 div table td span.first_come {position:absolute;width:100%;left:48%;margin-left:-59px;margin-top:-59px;}
        .evt04 div table td span.bubble {position:absolute;width:100%;left:125%;margin-left:-59px;margin-top:-69px;}
        .evt04 div table tbody th {background: #f9f9f9; color:#555;}
        .evt04 div table tbody th:last-child,
        .evt04 div table tbody td:last-child {border-right:0;}
        .evt04 ul { width:1000px; margin:50px auto 0}
        .evt04 li {display:inline;margin-left:25px;}
        .evt04 ul:after {content:""; display:block; clear:both}

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

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:17px}
        .evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox .infoTit {font-size:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style:disc;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="sky">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_sky.png" alt="스카이베너" usemap="#Map2040_sky" border="0" >
            <map name="Map2040_sky" id="Map2040_sky">
                <area shape="rect" coords="1,80,148,225" href="#evt_01" />
                <area shape="rect" coords="1,228,144,374" href="#evt_02" />
                <area shape="rect" coords="1,378,155,526" href="#evt_03" />
                <area shape="rect" coords="1,530,160,697" href="#evt_coupon" />
            </map>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_top.jpg" title="더켠의 시크릿 무료배포 이벤트">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_01.jpg" title="영어 합격 시크릿">
        </div>

        <form id="add_apply_form2" name="add_apply_form2">
            <div class="evtCtnsBox evt02" id="evt_01">

                <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_02.jpg" title="신규회원 30명 10일간 300권">
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
                        {{--
                        <tr>
                            <td>
                                <div>
                                    <span class="bubble"><img src="https://static.willbes.net/public/images/promotion/2020/08/1730_02_img04.png" alt="마감"></span>
                                    <span class="first_come"><img src="https://static.willbes.net/public/images/promotion/2020/08/1730_02_img03.png" alt="선착순"></span>
                                </div>
                            </td>
                        </tr>
                        --}}
                        <div class="evt_guide">
                            <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_02_guide.png" title="이벤트 유의사항">
                        </div>                    
                        </tbody>
                    </table>                  
                </div>
                {{--기본댓글--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_normal_partial',array('write_yn'=>'N'))
                @endif    
                <ul>
                    <li><a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2040_02_btn.png"  alt="윌비스 회원가입하기"/></a></li>
                    {{--<li><a onclick="javascript:fn_promotion_etc_submit();" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_02_btn02.png"  alt="빠른유료구매"/></a></li>--}}
                </ul>
            </div>
        </form>

        <div class="evtCtnsBox evt03" id="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_03.jpg" usemap="#Map2040_apply" title="수강신청" border="0" />
            <map name="Map2040_apply" id="Map2040_apply">
                <area shape="rect" coords="188,1252,542,1317" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/177129" target="_blank" />
                <area shape="rect" coords="580,1252,934,1318" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/177803" target="_blank" />
            </map>
        </div>

        <form id="add_apply_form" name="add_apply_form">
            <div class="evtCtnsBox evt04" id="evt_03">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="event_register_chk" value="N"/>
                @foreach($arr_base['add_apply_data'] as $row)
                    {{--                    <input type="radio" name="add_apply_chk[]" id="add_apply_{{ $row['EaaIdx'] }}" value="{{$row['EaaIdx']}}" /> <label for="register_chk_{{ $row['EaaIdx'] }}">{{ $row['Name'] }}</label>--}}
                    {{--                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyStartDatm']))--}}
                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                        <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                        @break;
                    @endif
                @endforeach

                <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_04.jpg" title="매일 오후 8시, 선착순 21명">
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
                            @php $col_cnti = 5; @endphp
                            @for($ii=0; $ii < count($arr_base['add_apply_data']); $ii++)
                                @if($ii==0 || $ii%$col_cnti == 0)
                                    @php $tr_ii = $ii; @endphp
                                    <tr>
                                        @endif
                                        <td>{{$arr_base['add_apply_data'][$ii]['Name']}}</td>
                                        @if($ii==($tr_ii+$col_cnti-1) || $ii == (count($arr_base['add_apply_data']))-1)
                                            @if($ii == (count($arr_base['add_apply_data']))-1) {{-- 마지막일때 --}}
                                            @php
                                                $remain_cnti = $col_cnti - (count($arr_base['add_apply_data'])%$col_cnti);
                                                if($remain_cnti == $col_cnti) $remain_cnti = 0;
                                            @endphp
                                            @if($remain_cnti != 0)
                                                @for($ri=0; $ri < $remain_cnti; $ri++)
                                                    <td></td>
                                                @endfor
                                            @endif
                                            @endif
                                    </tr>
                                    @php $temp_jj = 0; @endphp
                                    @for($jj=($ii-$col_cnti+1+(empty($remain_cnti)? 0 : $remain_cnti)); $jj <= $ii; $jj++)
                                        @if($jj==0 || ($jj%$col_cnti == 0  && $temp_jj == 0) || ($ii == (count($arr_base['add_apply_data']))-1 && $temp_jj == 0) )
                                            <tr>
                                                @endif
                                                <td>
                                                    <div>
                                                        @if(time() >= strtotime($arr_base['add_apply_data'][$jj]['ApplyEndDatm']) || $arr_base['add_apply_data'][$jj]['PersonLimit'] <= $arr_base['add_apply_data'][$jj]['MemberCnt'])
                                                            <span><img src="https://static.willbes.net/public/images/promotion/2021/01/2040_04_dead_line.png" alt="마감"></span>
                                                        @endif

{{--                                                        {{ $arr_base['add_apply_data'][$jj]['PersonLimit'] - $arr_base['add_apply_data'][$jj]['MemberCnt'] }}--}}

                                                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_04_first_come.png" alt="선착순">
                                                    </div>
                                                </td>
                                                @if($jj==($tr_ii+$col_cnti-1) || $jj == (count($arr_base['add_apply_data']))-1)
                                                    @if(empty($remain_cnti) === false && $remain_cnti != 0)
                                                        @for($ri=0; $ri < $remain_cnti; $ri++)
                                                            <td></td>
                                                        @endfor
                                                    @endif
                                            </tr>
                                        @endif
                                        @php $temp_jj++; @endphp
                                    @endfor
                                @endif

                            @endfor
                        @endif
                        {{--
                        <tr>
                            <td>
                                <div>
                                    <span class="bubble"><img src="https://static.willbes.net/public/images/promotion/2020/08/1730_02_img04.png" alt="마감"></span>
                                    <span class="first_come"><img src="https://static.willbes.net/public/images/promotion/2020/08/1730_02_img03.png" alt="선착순"></span>
                                </div>
                            </td>
                        </tr>
                        --}}
                        </tbody>
                    </table>
                </div>
                <ul>
                    <li><a onclick="javascript:fn_add_apply_submit();" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2040_04_btn.png"  alt="문법요약서 받기"/></a></li>
                    {{--<li><a onclick="javascript:fn_promotion_etc_submit();" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_02_btn02.png"  alt="빠른유료구매"/></a></li>--}}
                </ul>
            </div>
        </form>

        <div class="evtCtnsBox evt05" id="evt_coupon">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2040_05.jpg" usemap="#Map2040_sns" title="소문내고,단과 할인 받자!" border="0">
            <map name="Map2040_sns" id="Map2040_sns">
                <area shape="rect" coords="576,610,741,673" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" />
                <area shape="rect" coords="755,608,915,674" href="http://cafe.daum.net/9glade" target="_blank" />
                <area shape="rect" coords="574,692,742,760" href="https://cafe.naver.com/gugrade" target="_blank" />
                <area shape="rect" coords="754,692,916,762" href="https://cafe.naver.com/willbes" target="_blank" />
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evtInfo NGR">
            <div class="evtInfoBox">
                <h4 class="NGEB">이벤트 유의사항</h4>
                <div class="infoTit NG"><strong>[공통 유의사항]</strong></div>
                <ul>
                    <li>이벤트에 제공되는 [한덕현 영어 ONEDAY 문법요약서] 교재는 비매품으로, 유상 가치를 가진 상품/현금과의 교환/판매는 불법입니다.</li>
                    <li>본 이벤트 진행 기간은 2021.01.25.(월)~02.03.(수), 총 10일간입니다.</li>
                </ul>
                <div class="infoTit NG"><strong>[EVENT 01. 신규회원 대상]</strong></div>
                <ul>
                    <li>본 이벤트는 이벤트 기간 내 해당되는 날짜 0시를 기준으로 신규 가입자 선착순 30명씩 총 300명을 대상으로 합니다.</li>
                    <li>이벤트 부정 참여를 방지하기 위하여 회원가입 후 익일 오전 10시에 관리자 확인을 통해 [장바구니]에 교재를 담아드립니다.<br>
                        당첨된 회원분께서는 해당 교재를 0원으로 결제 진행해주시면 됩니다.<br>
                        (*토/일 진행분의 경우, 월요일 오전 10시에 지급됩니다.)
                    </li>
                    <li>회원가입 후 탈퇴 시 이벤트 대상에 적용되지 않습니다.</li>
                    <li>동일한 휴대폰번호로 가입한 계정은 최초 1회에 한해 수령 가능합니다.</li>
                    <li>중복/부정 참여 확인 시 별도 고지 없이 차순위 회원에게 이벤트 당첨 경품이 지급됩니다.</li>
                </ul>
                <div class="infoTit NG"><strong>[EVENT 02. 강좌 수강생 대상]</strong></div>
                <ul>
                    <li>본 이벤트는 이벤트 시작일 0시 기준으로 유료 구매한 선착순 100명을 대상으로 합니다.</li>
                    <li>신규 수강생 신청방법 : 해당 강좌 수강신청 시 입력한 주소로 배송 처리<br>
                        기존 수강생 신청방법 : 문자를 통해 별도 공지 예정
                    </li>
                    <li>수량 마감 시 추가 공지 없이 사은품 지급 대상에서 제외됩니다.</li>
                </ul>
                <div class="infoTit NG"><strong>[EVENT 03. 기존회원 대상]</strong></div>
                <ul>
                    <li>본 이벤트는 이벤트 기간 내 매일 오후 8시를 기준으로 선착순 21명씩 총 210명을 대상으로 합니다.</li>
                    <li>동일한 휴대폰번호로 가입한 계정은 최초 1회에 한해 수령 가능합니다.</li>
                    <li>중복/부정 참여 확인 시 별도 고지 없이 차순위 회원에게 이벤트 당첨 경품이 지급됩니다.</li>
                </ul>
                <div class="infoTit NG"><strong>[소문내기 이벤트]</strong></div>
                <ul>
                    <li>본 이벤트는 신규회원/기존회원 모두 참여 가능합니다.</li>
                    <li>지정된 커뮤니티 외 타 커뮤니티/SNS 등에 작성한 글은 인정되지 않습니다.</li>
                    <li>이벤트 종료일을 기준으로 삭제/수정된 글 및 비공개 처리된 글은 정상 참여로 인정되지 않습니다.</li>
                    <li>소문내기 글 제목에 “윌비스”, “한덕현” 키워드가 반드시 포함되어야 정상 참여로 인정됩니다.</li>
                </ul>
                <ul>
                    <li><strong>※ 이용문의 : 고객만족센터 1544-5006</strong></li>
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">

        {{-- 유료 --}}
        {{--
        function fn_promotion_etc_submit() {
            @if(date('YmdHi') < '202008172000' && ENVIRONMENT == 'production')
                alert('8월17일 20:00 부터 이벤트 참여 가능합니다.');
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
        --}}

        {{-- 무료 당첨 --}}
        function fn_add_apply_submit() {
            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

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
        {{--
        function fn_check_reg_member() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var $add_apply_form = $('#add_apply_form');
            var _check_url = '{!! front_url('/promotion/checkEventRegisterMember/') !!}?el_idx={{$data['ElIdx']}}';
            ajaxSubmit($add_apply_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    $('.stats-confirm').hide();
                }
            }, showValidateError, null, false, 'alert');
        }
        --}}

        {{-- 이벤트 추가 신청 메세지 --}}
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['이미 신청하셨습니다.','이미 당첨되셨습니다.'],
                ['신청 되었습니다.','당첨을 축하합니다. 장바구니를 확인해 주세요.'],
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
                ['마감되었습니다.','내일 20시에 다시 도전해 주세요.']
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
                    case '경행경채' :
                        if(exam_num < 50001 || exam_num > 59999) exam_num_check = false;
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