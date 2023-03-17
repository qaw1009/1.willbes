@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

    .evtTop {overflow:hidden}
        .evtTop div {position: absolute; top:23%; left:50%; margin-left:-250px; max-width:500px; z-index: 4;
            -webkit-animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
	        animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
        }
        @@keyframes slide-in-blurred-top {
            0% {
                -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                        transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                -webkit-transform-origin: 50% 0%;
                        transform-origin: 50% 0%;
                -webkit-filter: blur(40px);
                        filter: blur(40px);
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) scaleY(1) scaleX(1);
                        transform: translateY(0) scaleY(1) scaleX(1);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                -webkit-filter: blur(0);
                        filter: blur(0);
                opacity: 1;
            }
        }

        .evtTop span {position:absolute; left:50%; max-width:270px; top:25%; margin-left:-135px; z-index: 2; animation:circle 2s ease-in-out infinite;}
        @@keyframes circle {
            0% { transform: scale(0.9);}
            50% { transform: scale(1.1);}
            100% { transform: scale(0.9);}
        }

        .evt01 {background:#9762f8; padding-bottom:3vh}
        .evt01 .infoTxt {border:3px solid #000; margin:0 5% 3vh; border-radius:3vh; padding:2vh; background:#fff; font-size:1.6vh; text-align:left}
        .evt01 .infoTxt p {margin-top:1vh; color:#5308dc; font-size:1.7vh;}
        .evt01 .shinyBtn {margin:0 5%;}
        .evt01 .shinyBtn a {display:block; padding:1.8vh 0; color:#000; font-size:2vh; background:#fd9d1e; border-radius:0.6vh; overflow:hidden; position: relative; border:3px solid #000; font-weight:bold; margin-bottom:1vh}
        .evt01 .shinyBtn a:hover {color:#fd9d1e; background:#000; }
        .shinyBtn a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 30px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% { transform: scale(0) rotate(45deg); opacity: 0; }
            80% { transform: scale(0) rotate(45deg); opacity: 0.2; }
            81% { transform: scale(4) rotate(45deg); opacity: 0.5; }
            100% { transform: scale(60) rotate(45deg); opacity: 0; }
        }

        .evt02 {padding-bottom:1vh; background:#faffb1}   
        .evt02 .infoTxt {font-size:1.8vh; margin:0 5% 1vh}
        .evt02 .infoTxt h5 {margin-bottom:1.5vh}
        .evt02 .infoTxt h5 span {padding:5px 10px; color:#000; background:#ffb91c; font-size:2vh;}
        .evt02 .infoTxt p {margin-top:1vh; text-align:left; padding-top:1.5vh; border-top:1px solid #000}
        .evt02 .shinyBtn {width:80%; margin:0 auto;}

        .evt03 a strong {color:#fff799}

        /* 폰 가로, 태블릿 세로*/
        @@media only screen and (max-width: 374px)  {   
            .evtTop div {top:24%; margin-left:-35%; max-width:70%;}
            .evtTop span {top:23%; margin-left:-20%; max-width:40%;}
        }

        /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) { 
            .evtTop div {margin-left:-35%; max-width:70%;}
            .evtTop span {top:23%; margin-left:-20%; max-width:40%;}
        }

        /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {

        }

</style>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2930m_top.jpg" alt="전국 모의고사" />
        <div><img src="https://static.willbes.net/public/images/promotion/2023/03/2930_top_01.png" alt="무료" /></div>
        <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2930_top_02.png" alt="" /></span>
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2930m_01.jpg" alt="시험 미리 만나기" /> 
        <div class="infoTxt">
            ① ID당 1회 한정하여 신청이 가능합니다.<br>
            ② 여러 개의 ID로 참여하였더라도 중복 참여건으로 인정되며, 최초 참여한 ID로 1회 지급됩니다.<br>
            ③ 이벤트 참여일 기준 다음날 평일 오후 2시전까지 해당 강의가 ID로 등록됩니다.<br>
            ④ 소문내기 이미지 / 링크 주소 / 게시글 모두 포함되어 있어야 정상 인정됩니다.<br>
            ⑤ 이벤트와 무관한 글 또는 부정적인 방법 등으로 참여 시 관리자에 의해 삭제될 수 있습니다.<br>
            <p>★ 체험 PACK에 제공되는 강의는 [2023년 시험대비 Main Class] 강의이며, 학습 수강을 고려하여 <strong>각 과목당 3회차씩 제공</strong>됩니다 ★</p>
        </div>
        <div class="shinyBtn">                
            <a href="javascript:void(0);" onclick="copyTxt();">링크 복사하기 ></a>
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif">소문내기 이미지 다운받기 ></a>
        </div>
    </div>
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
@endif

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2930m_02.jpg" alt="접수 및 시행일정" />
        <div class="infoTxt">
            {{--<h5 class="NSK-Black"><span>2023 必! 합격 실전 PACK이란?</span></h5>
            <strong>Advanced Class(유형별 실전모의고사 + 심화이론강의) + Master Class(전범위 실전모의고사 + 해설 및 핵심정리강의)</strong><br>
            문제해결 능력과 시험 운영 능력을 급격하게 향상할 수 있는 PSAT 초격차 전략 강의--}}
            <p>
                ※ 후기 작성일 기준 다음날 평일 오후 2시 전까지 해당 ID로 쿠폰이 발급됩니다.<br>
                ※ 학원 방문 결제 하실 경우 할인 대상 여부를 말씀해주시면 할인된 금액으로 최종 결제 가능합니다.
            </p>
        </div>
    </div>

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_normal_partial')
    @endif

</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop