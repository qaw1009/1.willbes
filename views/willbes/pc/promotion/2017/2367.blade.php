@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1121px; margin:0 auto; position:relative;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/09/2367_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:#176291;}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/09/2367_03_bg.jpg) no-repeat center top; height:949px}
        .evt03 .gobtn {width:380px; margin: 50px auto 0; height:92px; line-height:92px}
        .evt03 .gobtn a {display:block; color:#fff; background:#37b5ff; font-size:26px}
        .evt03 .gobtn a:hover {background:#000}
        .evt04 {background:#f1f1f1}
        .evt04 a {display:block; position:absolute; left: 78.39%; width: 13.39%; height: 56px; line-height:56px; border-radius:30px; color:#fff; background:#1c5f89; font-size:22px; z-index: 2;}
        .evt04 a:hover {background:#37b5ff}
        .evt04 a:nth-of-type(1) {top:15.56%}
        .evt04 a:nth-of-type(2) {top:22.47%;}
        .evt04 a:nth-of-type(3) {top:28.97%;}
        .evt04 a:nth-of-type(4) {top:35%;}
        .evt04 a:nth-of-type(5) {top:41.28%;}
        .evt04 a:nth-of-type(6) {top:46.78%;}
        .evt04 a:nth-of-type(7) {top:52.25%;}
        .evt04 a:nth-of-type(8) {top:57.54%;}
        .evt04 a:nth-of-type(9) {top:63.12%;}
        .evt04 a:nth-of-type(10) {top:68.59%;}
        .evt04 a:nth-of-type(11) {top:74.09%;}
        .evt04 a:nth-of-type(12) {top:79.56%;}
        .evt04 a:nth-of-type(13) {top:84.89%;}
        .evt04 a:nth-of-type(14) {top:90.47%;}
        .evt05 {background:#d8d8d8}

        .slide_con {position:relative; width:1121px; margin:0 auto; padding-top:293px}
        .slide_con p {position:absolute; top:50%; width:57px; height:57px; z-index:100}
        .slide_con p a {cursor:pointer; display: block; opacity: .5;}
        .slide_con p a:hover {opacity:1;}
        .slide_con p.leftBtn {left:15px; top:72%;}
        .slide_con p.rightBtn {right:15px;top:72%;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/09/2367_top.jpg" alt="퀵 서머리 한정판매"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2367_01.jpg" alt="퀵 서머리 혜택"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2367_02.jpg" alt="퀵 서머리 특징"/>
        </div>

        <div class="evtCtnsBox evt03">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_03_04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/09/2367_arrowR.png"></a></p>
            </div> 
            <div class="gobtn"><a href="https://ssam.willbes.net/support/review/index" target="_blank">합격수기 자세히 보기 ></a></div>
        </div>

        <div class="evtCtnsBox evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2367_04.jpg" alt="수강신청"/>
                <a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/185741" target="_blank" title="교육학">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185814" target="_blank" title="국어">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185821" target="_blank" title="국어 문법">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185823" target="_blank" title="국어 중세국어">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185830" target="_blank" title="국어 문법기출">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185836" target="_blank" title="영어">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185837" target="_blank" title="수학 대수학 중심">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185838" target="_blank" title="수학 해석학 중심">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185839" target="_blank" title="수학 미분 기하학 중심">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185841" target="_blank" title="수학 교육론">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185842" target="_blank" title="도덕윤리">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185843" target="_blank" title="역사 기본심화">수강신청 →</a>
                <a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/185811" target="_blank" title="역사 기출">수강신청 →</a>
                <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/185844" target="_blank" title="음악">수강신청 →</a>
            </div>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2367_05.jpg" alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>
@stop