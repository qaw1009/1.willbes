@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/
    .evt03 .profList {margin-top:1vh; display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom:6vh; max-width:560px; margin:0 auto}
    .evt03 .profList .profBox {width:49%; max-width:270px; margin-bottom:1.3vh; position: relative;}
    .evt03 .profList .profBox img {}
    .evt03 .profList .profBox .btns {position:absolute; bottom:1vh; width:80%; left:50%; margin-left:-40%; z-index: 2; font-size:1.6vh;}
    .evt03 .profList .profBox .btns a {display:block; padding:0.5vh 0; margin-top:1px; background:rgba(1,65,75,.7); color:#fff}
    .evt03 .profList .profBox .btns a:last-child {background:rgba(0,0,0,.7);}
    .evt03 .profList .profBox .btns a:first-child {background:rgba(1,65,75,.7);}
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox wb_top"  data-aos="fade-up">            
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2855m_top.jpg" alt="2023학년도 대비 윌비스 임용 합격전략 설명회" />
    </div>

    <div class="evtCtnsBox"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2855m_01.jpg" alt=""/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2855m_02.jpg" alt=""/>
    </div>

    <div class="evtCtnsBox evt03"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2855m_03.jpg" alt="교수진"/>
        <div class="profList">
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t01.jpg" alt="민정선 유아"/>
                    <div class="btns">
                        <a href="javascript:void(0);" onclick="alert('준비중입니다.'); return false;">설명회 보기</a>
                        <a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t02.jpg" alt="이경범 교육학"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204050&u=1391334&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t03.jpg" alt="정현 교육학"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204045&u=1391333&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t04.jpg" alt="송원영 국어"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204085&u=1391331&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">                    
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t05.jpg" alt="구동언 국어"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204060&u=1391330&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[5] == 'Y') {{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t06.jpg" alt="김유석 영어"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204048&u=1391329&q=HD", "{{config_item('starplayer_license')}}");'>설명회 1 보기</a>
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204048&u=1391612&q=HD", "{{config_item('starplayer_license')}}");'>설명회 2 보기</a>
                        <a href="@if($file_yn[6] == 'Y') {{ front_url($file_link[6]) }} @else {{ $file_link[6] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t07.jpg" alt="김영문 영어"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=189551&u=1327523&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[7] == 'Y') {{ front_url($file_link[7]) }} @else {{ $file_link[7] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t08.jpg" alt="김철홍 수학"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204066&u=1391549&q=HD", "{{config_item('starplayer_license')}}");'>설명회 1 보기</a>
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204066&u=1391550&q=HD", "{{config_item('starplayer_license')}}");'>설명회 2 보기</a>
                        <a href="@if($file_yn[8] == 'Y') {{ front_url($file_link[8]) }} @else {{ $file_link[8] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t09.jpg" alt="김현웅 수학"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=189555&u=1328677&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[9] == 'Y') {{ front_url($file_link[9]) }} @else {{ $file_link[9] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t10.jpg" alt="박태영 수학"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204212&u=1392134&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t11.jpg" alt="박혜향 수학"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204061&u=1391336&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[11] == 'Y') {{ front_url($file_link[11]) }} @else {{ $file_link[11] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t12.jpg" alt="양혜정 생물"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=174880&u=1258449&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t13.jpg" alt="강철 화학"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=203962&u=1391040&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[13] == 'Y') {{ front_url($file_link[13]) }} @else {{ $file_link[13] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t14.jpg" alt="도덕윤리 김병찬"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=174884&u=1256233&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t15.jpg" alt="일반사회 허역팀"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204062&u=1391656&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[15] == 'Y') {{ front_url($file_link[15]) }} @else {{ $file_link[15] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t16.jpg" alt="허역 일반사회"/>
                    <div class="btns">
                    <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204062&u=1393823&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[16] == 'Y') {{ front_url($file_link[16]) }} @else {{ $file_link[16] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t17.jpg" alt="이웅재 일반사회"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204055&u=1391326&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[17] == 'Y') {{ front_url($file_link[17]) }} @else {{ $file_link[17] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t18.jpg" alt="정인홍 일반사회"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204055&u=1391328&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[18] == 'Y') {{ front_url($file_link[18]) }} @else {{ $file_link[18] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t19.jpg" alt="김현중 일반사회"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204055&u=1391327&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[19] == 'Y') {{ front_url($file_link[19]) }} @else {{ $file_link[19] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t20.jpg" alt="김종권 역사"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204063&u=1391325&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[20] == 'Y') {{ front_url($file_link[20]) }} @else {{ $file_link[20] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t21.jpg" alt="다이애나 음악"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=203875&u=1386842&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t22.jpg" alt="최우영 전기전자통신"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204089&u=1391324&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t23.jpg" alt="장영희 중국어"/>
                    <div class="btns">
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p=204064&u=1391322&q=HD", "{{config_item('starplayer_license')}}");'>설명회 보기</a>
                        <a href="@if($file_yn[23] == 'Y') {{ front_url($file_link[23]) }} @else {{ $file_link[23] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>

                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_end.jpg" alt=""/>
                </div>
            </div>
    </div> 

    <div class="evtCtnsBox">
        <a href="https://ssam.willbes.net/promotion/index/cate/3137/code/2822" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2855m_04.jpg" alt="연간패키지"/></a>
    </div>

</div>

 <!-- End Container -->
<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
        AOS.init();
    });
</script>

@stop




