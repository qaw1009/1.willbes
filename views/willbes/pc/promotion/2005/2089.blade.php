@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <style type="text/css">
    .evtContent {
        width:100% !important;
        min-width:1120px !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
        font-size:14px;
    }

    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; line-height: 1.5}

    /************************************************************/

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2021/02/2089_top_bg.jpg") no-repeat center top;}

    .evt01 {background:#eee}
    
    .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px;}
    .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
    .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
    .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox .only {color:#E80000;vertical-align:top;}

    /**/
    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}
    select,
    input[type=email],
    input[type=tel],
    input[type=number],
    input[type=text] {padding:2px; margin-right:10px; height:26px; vertical-align: middle}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    label {margin:0 10px 0 5px}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

    .boardTypeB {width:100%; margin:0 auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid; background:#fff; line-height: 1.5}
    .boardTypeB caption {display:none}
    .boardTypeB thead th,
    .boardTypeB tbody th {color:#464646; font-weight:bold; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; text-align:center; padding:15px 8px;}
    .boardTypeB tbody td {letter-spacing:normal; padding:10px 8px;}
    .boardTypeB thead th {background:#e9e8e8;}
    .boardTypeB tbody th {background:#f3f3f3;}
    .boardTypeB tbody td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:center}
    .boardTypeB tbody tr.bg01 th {background:#e5f2fe}
    .boardTypeB tbody td input {margin:0 auto}
    .boardTypeB tbody td label {margin-right:10px}
    .boardTypeB tbody td span {vertical-align:text-top}

    .q_type li {margin:5px 0}
    .q_type li span {display:inline-block; width:70px}

    .btns {text-align:center; margin:30px 0}
    .btns span,
    .btns a {display:inline-block; padding:8px 16px; background:#1087ef; color:#fff !important; font-size:18px; border:1px solid #1087ef}
    .btns a.btn2 {background:#464646; color:#fff !important; border:1px solid #464646}
    .btns a:hover {background:#fff; color:#1087ef !important}
    .btns a.btn2:hover {background:#fff; color:#464646 !important}

    .txtinfo {border:1px solid #464646; padding:20px; height:150px; overflow-y:scroll}
    .txtinfo li {margin-left:20px; list-style-type: decimal;}

    .sub_warp {width:980px; margin:0 auto; padding:50px 10px; font-size:14px; line-height:1.5}
    .sub_warp h2 {clear:both; font-size:24px; font-weight:bold; padding-left:30px; margin-bottom:1em; color:#464646; background:url(https://static.willbes.net/public/images/promotion/2019/04/1211_passcop_icon1.png) no-repeat left center}
    .sub_warp h2 div {position:absolute; top:5px; right:0; font-size:12px; color:#adadad; letter-spacing:normal}
    .sub_warp h2 span {color:#C03}
    .sub_warp h2 select {padding:5px}

    .markingtitle {font-size:16px; font-weight:bold; padding:10px 0; text-align:center; background:#f4f4f4; border:1px solid #000}
    .markingBox {padding:30px 0; border-top:2px solid #000; border-bottom:2px solid #000}
    .markingBox h3 {font-size:16px; background:#444; color:#fff; height:40px; line-height:40px; padding:0 20px; margin-bottom:10px; border-radius:15px 15px 0 0}
    .markingBox .number li {display:inline; float:left; margin-right:30px}
    .markingBox .number:after {content:""; display:block; clear:both}

    .omrWarp {padding:1em 0}
    .omrL {float:left; width:77%;}
    .omrL .paper {width:100%; height:690px; overflow-y: scroll; background:#F0F0F0}
    .omrR {float:right; width:22%; padding-left:15px; border-left:1px solid #ccc;}

    .omrR p {margin-bottom:1em}
    .omrWarp th,
    .omrWarp td {text-align:center; padding:4px !important}
    .omrWarp tr.check {background:#eefafd}

    .omrWarp input[type=text] {width:80%; letter-spacing:5px; text-align:center}
    .omrWarp h4 {margin-bottom:0.5em; color:#000; font-size: 14px}
    .qMarking {margin-bottom:1em;}
    .qMarking h4 span {color:#666; vertical-align:bottom}

    .selfMarking input[type=text] {width:50%; margin:0 auto; letter-spacing:0}
    .selfMarking p {margin-top:1em}

    .errata {padding:0 10px}
    .errata li {display:inline; float:left; width:20%; padding-right:20px}
    .errata li:last-child {padding:0}
    .errata p {background:#333; color:#fff; text-align:center; padding:10px 0; margin-bottom:10px}
    .errata .boardTypeB tr td:nth-last-child(3) {color:#09F !important}
    .errata td:first-child {color:#09F !important}
    .mypoint {text-align:left !important}
    .mypoint input[type=text] {width:50px; margin:0 !important; text-align:right}
    .mypoint span {vertical-align: bottom}
    .omrWarp:after {content:""; display:block; clear:both}
    </style>

    <!-- Container -->
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2089_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2089_01.jpg" alt="이벤트">
        </div>
        @include('willbes.pc.predict2.2089_promotion_partial')
        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">이벤트 유의사항</h4>
				<ul>
                    <li>본 이벤트는 5급공채(일반행정·재경), 국립외교원 시험 응시자만 참여 가능합니다.</li>
                    <li>설문조사 + 정답 또는 점수까지 입력이 완료된 이용자에 한하여 지급 및 추첨합니다.</li>
                    <li>이벤트 2의 경우 중복당첨되지 않습니다.</li>
                    <li>개인정보 수집 및 이용에 동의하지 않으신 분은 이벤트 참여가 불가능합니다.</li>
                    <li>경품은 모바일 쿠폰(기프티콘) 형태로 발송되며, 발송은 1회로 제한합니다.</li>
                    <li>기프티콘은 이벤트 참여시 기재된 전화번호로 발송됩니다.</li>
                    <li>휴대폰번호 오류 시 기프티콘은 재발송 되지 않습니다.</li>
                    <li>휴대전화 단말기의 MMS 수신상태가 양호하지 않은 경우, 기프티콘 수신이 불가할 수 있습니다.</li>
                    <li>이벤트 참여 전 회원정보(휴대폰 번호)를 정확히 수정해주시기 바랍니다.</li>
                    <li>기프티콘을 수신한 이후 개인사정에 의해 유효기간이 지나 사용하지 못한 경우 사용하지 않은 혜택에 대해서는 별도로 보상하지 않습니다.</li>
                </ul>
                <div>※ 유의사항을 읽지 않고 발생한 모든 상황에 대해서 한림법학원은 책임지지 않습니다.</div>
			</div>
		</div> 
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            loginAlert();   {{-- 비로그인시 로그인 메세지 --}}
        });

        {{-- 초기 로그인 얼럿 --}}
        function loginAlert() {
            {!! login_check_inner_script('로그인 후 이벤트에 참여해주세요.','Y') !!}
        }
    </script>
@stop