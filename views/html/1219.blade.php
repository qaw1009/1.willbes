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
        .evtTop {background:#00acec}
        .evt01 {background:#2b3541}
        .evt02 {background:#fff; padding-bottom:100px}     
        .evt02 .request {width:1000px; margin:100px auto 0; padding:50px;text-align:left}
        .evt02 .request h3 {font-size:18px;}
        .evt02 .request td {padding:10px}
        .evt02 .request input {height:26px;}
        .evt02 .requestL {width:48%; float:left}
        .evt02 .requestR {width:48%; float:right; }
        .evt02 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:180px; overflow-y:scroll }
        .evt02 .requestL li {display:inline-block; margin-right:10px}
        .evt02 .requestR li {margin-bottom:5px}
        .evt02 .request:after {content:""; display:block; clear:both}
        .evt02 .btn {clear:both; width:1000px; margin:0 auto;}
        .evt02 .btn a {display:block; width:500px; margin:0 auto; text-align:center; font-size:30px; color:#fff; background:#00acec; padding:20px 0; margin-top:30px; border-radius:40px}
        .evt02 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="skyBanner">
            <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2019/04/1219_skybanner.png" title="합격전략설명회 신청"></a>
        </div>
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1219_top.jpg" title="합격전략설명회">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1219_01.jpg" title="합격전략설명회 스페셜 혜택">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1219_02.jpg" title="9개지역 동시생중계">    
            <div class="request" id="request"> 
                <div class="requestL">
                    <h3 class="NSK-Black"><span class="tx-bright-blue">학원무료 입문특강</span> 신청하기</h3>                    
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
                                    <li><input type="radio" name="" id="campus4" value="" /> <label for="campus4">인천</label></li>
                                    <li><input type="radio" name="" id="campus5" value="" /> <label for="campus5">광주</label></li>
                                    <li><input type="radio" name="" id="campus6" value="" /> <label for="campus6">전북(전주)</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>일정</th>
                            <td>2019.4.29 ~ 30 / 5.6 ~ 10</td>
                        </tr>
                    </table>                   
                </div>
                <div class="requestR">
                    <h3 class="NSK-Black">* 개인정보 수집 및 이용에 대한 안내</h3>
                    <ul>
                        <li>
                            <strong>1. 개인정보 수집 이용 목적</strong> <br>
                            - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                            - 이벤트 참여에 따른 강의 수강자 목록에 활용
                        </li>
                        <li><strong>2. 개인정보 수집 항목</strong> <br>
                        - 신청인의 이름 ,번호
                        </li>
                        <li><strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                        - 본 수집, 활용목적 달성 후 바로 파기  
                        </li>
                        <li><strong>4. 신청자의 개인정보 수집 및 활용 동의 거부 시</strong><br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                        </li>
                    </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label> 
                    </div>
                </div>                
            </div> 
            <div class="btn NSK-Black">
                <a href="#none">무료 입문특강 신청하기 ></a>
            </div>           
        </div>
	</div>
    <!-- End Container -->

@stop