@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1); border-radius:8px}

        /************************************************************/

        .sky {position:fixed;top:250px;right:0;z-index:1;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2267_top_bg.jpg) no-repeat center top}  
        .evtTop span {position:absolute; left:50%; top:80px; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .evtTop span.img1 {margin-left:-203px; width:406px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-800px; opacity: 0;}
        to{margin-left:-203px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-800px; opacity: 0;}
        to{margin-left:-203px; opacity: 1;}
        }


        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2267_02_bg.jpg) no-repeat top;}



        /* 슬라이드배너 */
        .slide_con {position:relative; width:916px; margin:0 auto}
        .slide_con p {position:absolute; top:40%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evtTop">          
            <div class="wrap">       
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2267_top.jpg" title="오태진 한국사">
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50027/?subject_idx=1109" title="교수홈" target="_blank" style="position: absolute; left: 29.91%; top: 76.52%; width: 16.07%; height: 3.91%; z-index: 2;"></a>
                <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2021/07/2267_top_txt.png" alt=" "></span>
            </div>
        </div>

        <div class="evtCtnsBox evt_01 pb100">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2267_01.jpg" title="오태진 한국사">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2267_img01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2267_img02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2267_img03.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2021/07/2267_img04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/07/2267_left.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/07/2267_right.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt_02">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2267_02.jpg"  alt="오태진 한국사 커리큘럼" />
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183420" title="수강신청" target="_blank" style="position: absolute; left: 29.2%; top: 83.41%; width: 30.71%; height: 3.7%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_03 pb100">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2267_03.jpg" title="댓글 이벤트"> 
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif
        </div>
    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
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