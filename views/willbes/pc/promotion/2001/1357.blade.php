@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1357_top_bg.jpg) no-repeat center top;}
        .evtTop .evtTopInmg {
            position:absolute;
            top:570px;
            left:50%;
            margin-left:-460px;
            z-index:5;
            animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;
        }

        @@keyframes upDown{
            from{top:570px}
            50%{top:590px}
            to{top:570px}
         }
        @@-webkit-keyframes upDown{
            from{top:570px}
            50%{top:590px}
            to{top:570px}
         }

        .evt01 {
            background:url(https://static.willbes.net/public/images/promotion/2019/08/1357_01.jpg) no-repeat center top;
            height:1469px;
        }
        /* 슬라이드배너 */
        .slide_con {position:relative; width:1013px; margin:0 auto; padding-top:553px;}	
        .slide_con p {position:absolute; top:70%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px; width:27px; height:45px;}
        .slide_con p.rightBtn {right:-40px; width:27px; height:45px;}
        
        .evt02 {background:#ebf3f5}        
        .evt03 {background:#fff; padding-bottom:100px}
        .evt04 {background:#36374d}

        .snslink {
            width: 980px;
            margin: 0 auto 50px;
        }
        .snslink li {
            display: inline;
            float: left;
            width: 25%;
            text-align: center;
        }
        .snslink:after {
            content:'';
            display: block;
            clear:both;
        }
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_top.jpg" title="적중은 신광은 경찰팀!">
            <div class="evtTopInmg">               
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_top_img.png" title="적중은 신광은 경찰팀!">
            </div>        
        </div>

        <div class="evtCtnsBox evt01">
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1357_01_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1357_01_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1357_01_03.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/08//arrow_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/08//arrow_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_02.jpg" title="">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_03.jpg" title="">
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1357_04.jpg" title="">
        </div>
	</div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            setTimeout(function() {
                $('.counter').show();
                $('.counter span').counterUp({
                    delay: 11, // the delay time in ms
                    time: 1000 // the speed time in ms
                });
            }, 1000);
        });

        function doEvent() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{front_url('/predict/index/' . (empty($arr_promotion_params['PredictIdx']) === true ? '' : $arr_promotion_params['PredictIdx']))}}";
            window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=660,height=700,top=50,left=100');
        }

        function doEvent2() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
            window.open(url,'event2', 'scrollbars=no,toolbar=no,resizable=yes,width=665,height=629,top=50,left=100');
        }

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
                moveSlides:1
                });
            
                $("#imgBannerLeft3").click(function (){
                    slidesImg1.goToPrevSlide();
                });
            
                $("#imgBannerRight3").click(function (){
                    slidesImg1.goToNextSlide();
                });
        });

    </script>

@stop