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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/04/2612_top_bg.jpg) no-repeat center top;}

        .evt04 {margin:0 auto;background:#def8fd;padding:100px;}
        .evt04 .evtSns {margin:30px 0 40px; display:flex; justify-content:center; }
        .evt04 .evtSns a{color:#fff; font-size:16px; font-weight:bold; display:flex; align-items:center; justify-content:center; background-color:#22417e; width:110px; height:92px; border-radius:20px; margin-left:15px; line-height:22px;}
        .evt04 .evtSns a:hover {background:#000}

        .evt04 .evtBtns {margin:60px; display:flex; justify-content:center;}
        .evt04 .evtBtns a {display:inline-block; width:380px; font-size:18px; color:#fff; background:#f88a19; padding:20px 0; text-align:center; margin:0 10px}
        .evt04 .evtBtns a:hover {background:#000}

        .evtInfoBox {color:#555; font-size:14px; width:1000px; margin:0 auto; text-align:left; line-height:1.75}
        .evtInfoBox h4 {font-size:30px; margin-bottom:20px}
        
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
            <div class="evtSns">
                <a href="https://cafe.naver.com/polstudy" target="_blank">경꿈사</a>
                <a href="https://cafe.naver.com/tocop" target="_blank">경수모</a>
                <a href="https://cafe.naver.com/m2school" target="_blank">독공사</a>
                <a href="https://cafe.naver.com/gugrade" target="_blank">공드림</a>
                <a href="https://cafe.daum.net/policeacademy" target="_blank">경시모</a>
                <a href="https://gall.dcinside.com/board/lists/?id=police" target="_blank">경찰갤러리</a>
            </div>              

            <div class="evtBtns">
                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();">링크 복사하기 🔗</a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 다운">소문내기 이미지 다운받기 📢</a>
            </div>                     

            <div class="evtInfoBox">
                <h4 class="NSK-Black">[유의사항]</h4>                    
                1. 본 이벤트는 로그인 후 참여 가능합니다. <br>
                2. 이벤트 상품 지급을 위해 개인정보 제공(SMS수신)에 동의해주셔야 합니다.<br>
                3. 이벤트 상품은 ID에 등록된 연락처로 지급됩니다. 이벤트 참여 전 개인정보를 꼭 확인하시기 바랍니다. <br>
                4. 이벤트 참여자 증정품은 4월 22일(금) 이후 순차적으로 발송 됩니다. <br>
                5. 소문내기 이벤트 기간 외에 작성된 게시글은 인정되지 않습니다. <br>
                6. 모든 글은 [전체공개] 글만 인정되며, 삭제된 게시글 혹은 해당 이벤트와 무관한 글은 인정되지 않습니다. <br>
                7. 동일한 URL은 한 번 참여한 것으로 인정됩니다. <br>
                8. 같은 일자에 동일 커뮤니티에 올라간 여러 개의 글은 한 개의 글로 카운팅 됩니다. <br>
                9. 혜택은 한 ID 당 1회만 지급합니다.<br>
                10. 기타 부정한 방법으로 참여할 경우 당첨이 취소될 수 있습니다. 
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
        @endif

        {{--
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
        --}}
        {{--
        <div class="evtCtnsBox evt05 pb100" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2612_05.jpg" title="유의사항">         
        </div>        
        --}}
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