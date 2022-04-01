@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    /************************************************************/

     /* 폰 가로, 태블릿 세로*/     
     @@media only screen and (max-width: 374px)  {

    }
    /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) {       

        }
    /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {

        }

    </style>

    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612m_top.jpg" title="소문내기 이벤트">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612m_01.jpg" title="필수과정">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612m_02.jpg" title="이벤트 진행일">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612m_03.jpg" title="이벤트 참여방법">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2612m_04.jpg" title="이미지 다운 및 사이트 바로가기">
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운" style="position: absolute;left: 6.25%;top: 17.05%;width: 42.86%;height: 20.55%;z-index: 2;"></a>
                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute;left: 51.55%;top: 17.05%;width: 42.86%;height: 20.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute;left: 20.33%;top: 57.29%;width: 14.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/tocop" target="_blank" title="경수모" style="position: absolute;left: 35.53%;top: 57.29%;width: 14.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/m2school" target="_blank" title="독공사" style="position: absolute;left: 50.13%;top: 57.29%;width: 14.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position: absolute;left: 65.43%;top: 57.29%;width: 14.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute;left: 20.33%;top: 70.29%;width: 14.96%;height: 10.55%;z-index: 2;"></a>
                <a href="https://gall.dcinside.com/board/lists/?id=police" target="_blank" title="경찰 갤러리" style="position: absolute;left: 20.33%;top: 82.99%;width: 14.96%;height: 10.55%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt05 pb50" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612m_05.jpg" title="유의사항">
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
        $(document).ready(function() {
            AOS.init();
        });
    </script>
@stop