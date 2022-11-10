@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /*****************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/11/2818_top_bg.jpg) no-repeat center top;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/11/2818_01_bg.jpg) left top;}

        .evt02 {background:#1c96a3;}

        .evt03 {width:1120px; margin:100px auto;}
        .evt03 .info {width:1050px; margin:0 auto; background:#1a174a; color:#fff; font-size:16px; padding:50px; text-align:left; line-height:1.5; border-radius:10px}
        .evt03 .info h5 {text-align:center; font-size:30px; font-weight:600; margin-bottom:30px; border-bottom:1px solid #5f5d81; padding-bottom:30px}
        .evt03 .info li {list-style:demical; list-style-position:inside; margin-bottom:10px;}
        .evt03 .info li span {color:#f2ed15;}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2818_top.jpg" title="PSAT 공부이야기">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2818_01.jpg" title="공부이야기">                
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2818_02.jpg" title="무료증정">
                <a href="https://pass.willbes.net/support/qna/index" target="_blank" title="1:1 상담게시판" style="position: absolute; left: 26.16%; top: 77.66%; width: 48.13%; height: 7.65%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <div class="info">
                <h5>유의사항</h5>
                <ul>
                    <li>본 이벤트는 로그인 후 참여 가능합니다.</li>
                    <li>무료 증정 안내를 위해 개인정보 제공(SMS 수신)에 동의해주셔야 합니다.</li>
                    <li>욕설, 비방 또는 한림법학원 7급과 무관한 글은 삭제되며, 참여 인정되지 않습니다.</li>
                    <li>한 ID당 최대 1권만 지급되며, 동일한 아이디로 여러 개 작성시 하나의 글로 인정됩니다. (중복 지급 불가)</li>
                    <li>교재 주문시(무료주문/무료배송) 주소 및 연락처를 정확히 기입하셔야 정상 배송됩니다.</li>
                    <li>공부이야기는 이벤트 참여자 및 유료 강의 수강자에 한하여만 무료 제공되며, 한 ID당 1권만 신청 가능합니다.</li>
                    <li>이벤트에 남겨주신 기대평 또는 강의평은 이후 한림법학원 7급 강의 홍보용으로 사용될 수 있습니다.</li>
                    <li>유의사항을 읽지 않고 발생한 모든 상황에 대해 한림법학원 7급팀은 책임지지 않습니다.</li>
                </ul>          
            </div>

            {{--
                기본댓글 todo : (조건 없을 경우 인자 제거 후 호출)
                login_url : 로그인 리턴 url
                min_byte : 댓글 글자 최소 바이트
                max_byte : 댓글 글자 최대 바이트
            --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial',['login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'min_byte'=>50])
            @endif
        </div>
    </div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

@stop