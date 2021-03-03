@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}    

    /************************************************************/

    .evt_top {}

    .evt01 {background:#eee}
    
    .evtInfo {padding:80px 20px; background:#333; color:#fff; font-size:16px;}
    .evtInfoBox {text-align:left; line-height:1.5}
    .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
    .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox .only {color:#E80000;vertical-align:top;}
    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2089m_top.jpg" alt="psat 합격을 예측하다">
        </div>
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2089m_01.jpg" alt="이벤트">
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