@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            margin:0 auto;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}        
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evtTop {background:#92E8F9}     

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612_top.jpg" title="소문내기 이벤트">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612_01.jpg" title="필수과정">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612_02.jpg" title="이벤트 진행일">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612_03.jpg" title="이벤트 참여방법">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2612_04.jpg" title="이미지 다운 및 사이트 바로가기">
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운" style="position: absolute;left: 0.25%;top: 15.05%;width: 48.86%;height: 20.55%;z-index: 2;"></a>
                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute;left: 50.55%;top: 15.05%;width: 48.86%;height: 20.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute;left: 16.93%;top: 56.05%;width: 15.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/tocop" target="_blank" title="경수모" style="position: absolute;left: 33.53%;top: 56.05%;width: 15.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/m2school" target="_blank" title="독공사" style="position: absolute;left: 50.23%;top: 56.05%;width: 15.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position: absolute;left: 66.93%;top: 56.05%;width: 15.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute;left: 16.93%;top: 69.35%;width: 15.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://gall.dcinside.com/board/lists/?id=police" target="_blank" title="경찰 갤러리" style="position: absolute;left: 16.93%;top: 82.60%;width: 15.96%;height: 10.55%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt05 pb100" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612_05.jpg" title="유의사항">
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
            @endif
        </div>        

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop 