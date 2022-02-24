@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/02/2547_top_bg.jpg") no-repeat center top;}

    .evt01 {background:#eee}
    
    .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px;}
    .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
    .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
    .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox .only {color:#E80000;vertical-align:top;}
    </style>

    <!-- Container -->
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2547_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2547_01.jpg" alt="이벤트">
        </div>
        @include('willbes.pc.predict2.iframe_promotion_partial')
        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">이벤트 유의사항</h4>
				<ul>
                    <li>이벤트 진행 기간은 3.1(화)까지이며 합격예측 및 이벤트 당첨자 결과는 3.10(목) 홈페이지를 통해 공개합니다. (이벤트 참여자 문자알림)
                    <li>본 이벤트는 5급공채, 국립외교원 시험 응시자만 참여 가능합니다.
                    <li>설문조사 + 정답 또는 점수까지 입력이 완료된 이용자에 한하여 지급 및 추첨합니다.
                    <li>이벤트 2의 경우 중복당첨되지 않습니다.
                    <li>개인정보 수집 및 이용에 동의하지 않으신 분은 이벤트 참여가 불가능합니다.
                    <li>경품은 모바일 쿠폰(기프티콘) 형태로 발송되며, 발송은 1회로 제한합니다.
                    <li>기프티콘은 이벤트 참여시 기재된 전화번호로 발송됩니다.
                    <li>휴대폰번호 오류 시 기프티콘은 재발송 되지 않습니다.
                    <li>휴대전화 단말기의 MMS 수신상태가 양호하지 않은 경우, 기프티콘 수신이 불가할 수 있습니다.
                    <li>이벤트 참여 전 회원정보(휴대폰 번호)를 정확히 수정해주시기 바랍니다.
                    <li>기프티콘을 수신한 이후 개인사정에 의해 유효기간이 지나 사용하지 못한 경우 사용하지 않은 혜택에 대해서는 별도로 보상하지 않습니다.</li>
                </ul>
                <div>※ 유의사항을 읽지 않고 발생된 모든 상황의 불이익에 대해 한림법학원은 책임지지 않습니다.</div>
			</div>
		</div> 
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

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