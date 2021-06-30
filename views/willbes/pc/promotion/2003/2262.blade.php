@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1); border-radius:8px}

        /************************************************************/
        .sky {position:fixed;top:250px;right:15px;z-index:200;}

        .evt00 {background:url("https://static.willbes.net/public/images/promotion/2021/06/2262_00_bg.jpg") no-repeat center top;}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2021/06/2262_top_bg.jpg") no-repeat center top;}

        .evt02 {background:#A735A7}

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px; line-height:1.4;font-weight:bold;}
        .evtInfoBox { width:1025px; margin:0 auto; text-align:left;}
        .evtInfoBox h4 {font-size:40px; margin-bottom:40px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style:disc; margin-left:20px; margin-bottom:10px;}
        .call {font-size:20px;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="sky">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2262_sky.png" alt="교재무료 자세히 보기">
            </a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2262_00.jpg" title="10일간의 혜택">
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2262_top.jpg" title="무료배포 이벤트">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2262_01.jpg" title="영어 합격 시크릿">
        </div>

        <div class="evtCtnsBox evt02" id="apply">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2262_02.jpg" title="30명 무료배포">
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" title="선착순 교재 무료로 받기" style="position: absolute;left: 26.36%;top: 74.5%;width: 48.25%;height: 6.5%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2262_03.jpg" title="소문내고,단과 할인 받자!">
                <a href="https://gall.dcinside.com/board/lists?id=government" target="_blank" title="공무원 갤러리" style="position: absolute;left: 51.86%;top: 75.5%;width: 14.75%;height: 7%;z-index: 2;"></a>
                <a href="http://cafe.daum.net/9glade" target="_blank" title="구꿈사" style="position: absolute;left: 67.86%;top: 75.5%;width: 14.75%;height: 7%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position: absolute;left: 51.86%;top: 85.2%;width: 14.75%;height: 7%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/willbes" target="_blank" title="윌비스" style="position: absolute;left: 67.86%;top: 85.2%;width: 14.75%;height: 7%;z-index: 2;"></a>
            </div>    
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evtInfo NGR">
            <div class="evtInfoBox">
                <h4 class="NGEB">이벤트 유의사항</h4>
                <ul>
                    <li>이벤트에 제공되는 [한덕현 영어 ONEDAY 문법요약서] 교재는 비매품으로, 유상 가치를 가진 상품/현금과의 교환/판매는 불법입니다.</li>
                    <li>본 이벤트 진행 기간은 2021.6.28.(월)~7.8.(목) ,총 10일간입니다.</li>
                    <li>본 이벤트는 이벤트 기간 내 해당되는 날짜 0시를 기준으로 신규 가입자 선착순 30명씩 총 300명을 대상으로 합니다.</li>
                    <li>이벤트 부정 참여를 방지하기 위하여 회원가입 후 익일 오전 10시에 관리자 확인을 통해 [9급]>[장바구니]에 교재를 담아드립니다.</li>
                    <li>
                        당첨된 회원분께서는 매일 오후 6시 회원정보에 등록한 전화번호로 수신된 SMS로 당첨 여부를 확인 후, 익일 오전 10시에 해당 교재를 0원으로 결제 진행해주시면 됩니다.<br>
                        (*금/토 당첨자의 경우, 별도의 SMS 고지 없이 월요일 오전 10시에 [9급]>[장바구니]에 지급)<br>
                        (*수신 거부 시 문자가 도착하지 않으므로, 수신거부 해제 바랍니다.)
                    </li>    
                    <li>회원가입 후 탈퇴 시 이벤트 대상에 적용되지 않습니다.</li>
                    <li>동일한 휴대폰번호로 가입한 계정은 최초 1회에 한해 수령 가능합니다.</li>
                    <li>중복/부정 참여 확인 시 별도 고지 없이 차순위 회원에게 이벤트 당첨 경품이 지급됩니다.</li>
                </ul>
                <div class="call">※윌비스 고객만족센터 : 1544-5006</div>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
    
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop