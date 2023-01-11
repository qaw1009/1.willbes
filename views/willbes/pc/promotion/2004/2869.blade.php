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

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2023/01/2869_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#333743;}
        .wb_cts01 .slide_con {width:954px; margin:0 auto; position:relative}
        .wb_cts01 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .wb_cts01 .slide_con p a {cursor:pointer}
        .wb_cts01 .slide_con p.leftBtn {left:-115px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts01 .slide_con p.rightBtn {right:-85px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts01s {background:#333743;}

        .wb_cts02 {background:#FFD236;}
        .wb_cts02 .slide_con {width:954px; margin:0 auto; position:relative}
        .wb_cts02 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .wb_cts02 .slide_con p a {cursor:pointer}
        .wb_cts02 .slide_con p.leftBtn {left:-115px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts02 .slide_con p.rightBtn {right:-85px; top:50%; width:62px; height:62px; margin-top:-30px;}

        .wb_cts03 {position:relative;}
        .youtube {position:absolute; top:423px; left:50%;z-index:1;margin-left:-516px}
        .youtube iframe {width:661px; height:361px}

        /* 이용안내 */      
        .guide_box{width:1000px; margin:0 auto;text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd strong {color:#555}
        .guide_box dd li{margin-bottom:3px; list-style:none;font-size:15px;}
        .guide_box dd:after {content:""; display:block; clear:both}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2869_top.jpg" alt="히어로" />            
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2869_01.jpg" alt="소방관을 영웅이라고 부르는 이유"/> 
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_01_01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_01_02.png" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_01_03.png" /></li>    
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_01_04.png" /></li>   
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_right.png"></a></p>
            </div>               
        </div>

        <div class="evtCtnsBox wb_cts01s pb50">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2869_01_bt.jpg" alt="사명감으로"/>            
        </div>

        <div class="evtCtnsBox wb_cts02 pb100">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2869_02.jpg" alt="불꽃 관리반 소개"/>
            <div class="slide_con">
                <ul id="slidesImg2">
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_02_01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_02_02.png" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_02_03.png" /></li>    
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_02_04.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_02_05.png" /></li> 
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft2"><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight2"><img src="https://static.willbes.net/public/images/promotion/2023/01/2869_right.png"></a></p>
            </div>       
        </div>

        <div class="evtCtnsBox wb_cts03">
            <div class="wrap">
                <a href="javascript:void(0);" title="url 복사하기" onclick="copyTxt('https://youtu.be/q6wusmfYGCM');" style="position: absolute;left: 64.46%;top: 24.99%;width: 29.53%;height: 8.97%;z-index: 2;"></a>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운로드" style="position: absolute;left: 64.46%;top: 33.99%;width: 29.53%;height: 8.97%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/im119" title="네이버 소사모" target="_blank" style="position: absolute;left: 13.46%;top: 94.99%;width: 16.13%;height: 4.27%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/im119" title="다음 소사모" target="_blank" style="position: absolute;left: 32.46%;top: 94.99%;width: 16.13%;height: 4.27%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/gsdccompany" title="네이버 소방꿈" target="_blank" style="position: absolute;left: 52.06%;top: 94.99%;width: 16.13%;height: 4.27%;z-index: 2;"></a>
                <a href="https://www.instagram.com" title="개인 sns" target="_blank" style="position: absolute;left: 71.06%;top: 94.99%;width: 16.13%;height: 4.27%;z-index: 2;"></a>
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2869_03.jpg" alt="이벤트1"/>
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/q6wusmfYGCM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox wb_info">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트</h2>
                <dl>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>* 본 이벤트와 관련없는 게시물의 경우 관리자에 의해 삭제될수 있습니다.</li>
                            <li>* 부정한 방법으로 이벤트에 참여하거나, 타인의 게시글 도용 시 당첨자에서 제외됩니다.</li>
                            <li>* 게시글 삭제 및비공개 처리등의 이유로 URL 조회가 안되는 경우 당첨자에서 제외됩니다</li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>    

        <div class="evtCtnsBox wb_cts04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2869_04.jpg" alt="이벤트2"/>
                <a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" title="쿠폰 다운로드" style="position: absolute; left: 27.05%; top: 62.8%; width: 45.89%; height: 11.1%; z-index: 2;"></a>
            </div>            
        </div>

    </div>

   <!-- End Container -->


    <script type="text/javascript">       
        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });
        });

        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });

    </script>
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>
    
<!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop