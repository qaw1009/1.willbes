@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    /************************************************************/

    .evtInfo {padding:60px 20px; background:#def8fd; color:#555;}
    .evtInfo {text-align:left; line-height:1.75}
    .evtInfo li {margin-bottom:8px; list-style:disc; margin-left:20px}
    .evtInfo strong {color:#ffff00}

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
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운" style="position: absolute;left: 1.75%;top: 22.55%;width: 47.16%;height: 18.55%;z-index: 2;"></a>
                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute;left: 51.25%;top: 22.55%;width: 47.16%;height: 18.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute;left: 17.63%;top: 57.29%;width: 15.46%;height: 9.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/tocop" target="_blank" title="경수모" style="position: absolute;left: 34.13%;top: 57.29%;width: 15.46%;height: 9.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/m2school" target="_blank" title="독공사" style="position: absolute;left: 50.63%;top: 57.29%;width: 15.46%;height: 9.55%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position: absolute;left: 66.83%;top: 57.29%;width: 15.46%;height: 9.55%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute;left: 17.63%;top: 68.69%;width: 15.46%;height: 9.55%;z-index: 2;"></a>
                <a href="https://gall.dcinside.com/board/lists/?id=police" target="_blank" title="경찰 갤러리" style="position: absolute;left: 17.63%;top: 79.79%;width: 15.46%;height: 9.55%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <ul>
                1. 본 이벤트는 로그인 후 참여 가능합니다. <br>
                2. 이벤트 상품 지급을 위해 개인정보 제공(SMS수신)에 동의해주셔야 합니다.<br>
                3. 이벤트 상품은 ID에 등록 된 연락처로 지급됩니다. 이벤트 참여 전 개인정보를 꼭 확인하시기 바랍니다. <br>
                4. 이벤트 참여자 증정품은 12월 12일(일) 이후 순차적으로 발송 됩니다. <br>
                5. 소문내기 이벤트 기간 외에 작성된 게시글은 인정되지 않습니다. <br>
                6. 모든 글은 [전체공개] 글만 인정되며, 삭제된 게시글 혹은 해당 이벤트와 무관한 글은 인정되지 않습니다. <br>
                7. 동일한 URL은 한 번 참여한 것으로 인정됩니다. <br>
                8. 같은 일자에 동일 커뮤니티에 올라간 여러 개의 글은 한 개의 글로 카운팅 됩니다. <br>
                9. 혜택은 한 ID 당 1회만 지급합니다.<br>
                10. 기타 부정한 방법으로 참여할 경우 당첨이 취소될 수 있습니다. 
            </ul>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
        @endif

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