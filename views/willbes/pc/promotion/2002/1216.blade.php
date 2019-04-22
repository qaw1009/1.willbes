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
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1216_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f2f2f2}
        .evt02 {background:#7d7d7d}        
        .evt03 {background:#c93241 url(https://static.willbes.net/public/images/promotion/2019/04/1216_03_bg.jpg) no-repeat center top; padding:785px 0 130px}
        .evt03 .request { width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt03 .request h3 {font-size:18px;}
        .evt03 .request td {padding:10px}
        .evt03 .request input {height:26px;}
        .evt03 .requestL {width:48%; float:left}
        .evt03 .requestR {width:48%; float:right; }
        .evt03 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:276px; overflow-y:scroll }
        .evt03 .requestL li {display:inline-block; margin-right:10px}
        .evt03 .requestR li {margin-bottom:5px}
        .evt03 .request:after {content:""; display:block; clear:both}
        .evt03 .btn {clear:both; width:1000px; margin:0 auto;}
        .evt03 .btn a {display:block; text-align:center; font-size:30px; color:#fff; background:#000; padding:30px 0; margin-top:30px}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1216_04_bg.jpg) no-repeat center top;}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1216_05_bg.jpg) no-repeat center top;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="skyBanner">
            <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2019/04/1216_skybanner.png" title="합격전략설명회 신청"></a>
        </div>
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1216_top.jpg" title="합격전략설명회">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1216_01.jpg" title="합격전략설명회 스페셜 혜택">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1216_02.jpg" title="9개지역 동시생중계">
        </div>

        <div class="evtCtnsBox evt03">
            <div class="request" id="request"> 
                <div class="requestL">
                    <h3 class="NSK-Black"><span class="tx-bright-blue">2019.5.1(수)14:00 합격전략 설명회</span> 신청접수</h3>                    
                    <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                        <col width="25%" />
                        <col  />
                        <tr>
                            <th>* 이름</th>
                            <td scope="col">
                                <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" readonly="readonly"/>
                            </td>
                        </tr>
                        <tr>
                            <th>* 연락처</th>
                            <td>
                                <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11"/>
                            </td>
                        </tr>
                        <tr>
                            <th>* 참여캠퍼스</th>
                            <td>
                                <ul>
                                    <li><input type="radio" name="" id="campus1" value="" /> <label for="campus1">노량진</label></li>
                                    <li><input type="radio" name="" id="campus2" value="" /> <label for="campus2">신림</label></li>
                                    <li><input type="radio" name="" id="campus3" value="" /> <label for="campus3">부산</label></li>
                                    <li><input type="radio" name="" id="campus4" value="" /> <label for="campus4">대구</label></li>
                                    <li><input type="radio" name="" id="campus5" value="" /> <label for="campus5">인천</label></li>
                                    <li><input type="radio" name="" id="campus6" value="" /> <label for="campus6">광주</label></li>
                                    <li><input type="radio" name="" id="campus7" value="" /> <label for="campus7">전북(전주)</label></li>
                                    <li><input type="radio" name="" id="campus8" value="" /> <label for="campus8">진주</label></li>
                                    <li><input type="radio" name="" id="campus9" value="" /> <label for="campus9">제주</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>* 직렬</th>
                            <td>
                                <ul>
                                    <li><input type="radio" name="" id="CT1" value="" /> <label for="CT1">일반남자</label></li>
                                    <li><input type="radio" name="" id="CT2" value="" /> <label for="CT2">일반여자</label></li>
                                    <li><input type="radio" name="" id="CT3" value="" /> <label for="CT3">101단</label></li>
                                    <li><input type="radio" name="" id="CT4" value="" /> <label for="CT4">경행경채</label></li>
                                    <li><input type="radio" name="" id="CT5" value="" /> <label for="CT5">전의경경채</label></li>
                                    <li><input type="radio" name="" id="CT6" value="" /> <label for="CT6">법학경채</label></li>
                                    <li><input type="radio" name="" id="CT7" value="" /> <label for="CT7">기타</label></li>
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
                        - 필수항목 : 성명, 연락처, 참여캠퍼스, 직렬항목
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
            <div class="btn NSK-Black">
                <a href="#none">합격전략 설명회 신청하기</a>
            </div>           
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1216_04.jpg" title="대한민국 1등 경찰학원"/>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1216_05.jpg" title="학원 위치"/>
        </div>
	</div>
    <!-- End Container -->

@stop