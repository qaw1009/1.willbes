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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop00 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1247_top_00_bg.jpg) no-repeat center top;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/05/1247_top_bg.jpg) no-repeat center top;}
     
        .evt01 {background:#f2f2f2; padding:0 0 130px}
        .evt01 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt01 .request h3 {font-size:18px;}
        .evt01 .request h3 span {color:#745ca8}
        .evt01 .request td {padding:10px 5px}
        .evt01 .request input {height:26px;}
        .evt01 .requestL {width:49%; float:left}
        .evt01 .requestR {width:49%; float:right; }
        .evt01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt01 .requestL li {display:inline-block; margin-right:10px}
        .evt01 .requestR li {margin-bottom:5px}
        .evt01 .request:after {content:""; display:block; clear:both}
        .evt01 .btn {clear:both; width:900px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#745ca8; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1247_02_bg.jpg) no-repeat center top;}
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1247_top_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1247_top.jpg" title="1:1맞춤형 설명회">        
        </div>

        <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2019/05/1247_01.jpg" title="푸짐한 경품 이벤트">
            <div class="request" id="request"> 
                <div class="requestL">
                    <h3 class="NGEB"><span>신광은경찰학원 1:1맟춤형 설명회</span> 신청접수</h3>                    
                    <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                        <col width="20%" />
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
                            <th>* 참여날짜</th>
                            <td>
                                <ul>
                                    <li><input type="checkbox" name="" id="dateA" value=""/> <label for="dateA">6/1(토)</label></li>
                                    <li><input type="checkbox" name="" id="dateB" value=""/> <label for="dateB">6/15(토)</label></li>
                                    <li><input type="checkbox" name="" id="dateC" value=""/> <label for="dateC">6/22(토)</label></li>
                                    <li><input type="checkbox" name="" id="dateD" value=""/> <label for="dateD">6/29(토)</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>* 참여캠퍼스</th>
                            <td>
                                <ul>
                                    <li><input type="radio" name="" id="campus" value=""/> <label for="campus">노량진</label></li>
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
                    <h3 class="NGEB">* 개인정보 수집 및 이용에 대한 안내</h3>
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
            <div class="btn NGEB">
                <a href="#none">신광은경찰학원 1:1맟춤형 설명회 신청하기 ></a>
            </div>           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1247_02.jpg" title="설명회 오시는 길"/>
        </div>
	</div>
    <!-- End Container -->

@stop