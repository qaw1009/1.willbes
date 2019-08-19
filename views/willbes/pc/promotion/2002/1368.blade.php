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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .skyBanner {position:fixed; bottom:20px; right:20px; width:138px; border:1px solid #000; z-index:10;}

        .evtTop {background:#ad7d73;}
        .btnSet {position:absolute; bottom:80px; width:596px; left:50%; margin-left:-298px; z-index:1}
        .btnSet a {display:block; float:left}
        .btnSet:after {content:""; display:block; clear:both}

        .evt00 {background:#404040;}
        .evt01 {background:#342329;}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-80px;top:46%; width:67px; height:67px;}

        .evt02 {background:#484c57;}
        .evt03 {background:#bc6b2a;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1368_00.jpg" title="광은 서포터즈 1기 10명 중 7명은 최종합격생">
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1368_top.jpg" title="광은 서포터즈 2기">
            <div class="btnSet">
                @if (empty($file_data_promotion) === false)
                    @foreach($file_data_promotion as $key => $row)
                        <a href="{{front_url('/promotion/download?file_idx=').$row['EfIdx'].'&event_idx='.$data['ElIdx'] }}">
                            <img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_btn0{{ $loop->index }}.png" title="{{ $row['FileRealName'] }}">
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01.jpg" title="서포터즈 1기 리뷰">
            <div class="slide_con">
                <ul id="slidesImg">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_01.jpg" alt="서포터즈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_02.jpg" alt="서포터즈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_03.jpg" alt="서포터즈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_04.jpg" alt="서포터즈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_05.jpg" alt="서포터즈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_06.jpg" alt="서포터즈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_07.jpg" alt="서포터즈" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_next.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1368_01_bottom.jpg" title="이제 여러분이 광은 서포터즈 주인공입니다.">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1368_02.jpg" title="광은 서포터즈 어떤 활동을 하는 서포터즈인가요?">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1368_03.jpg" title="광은 서포터즈 신청안내">
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg = $("#slidesImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft").click(function (){
                    slidesImg.goToPrevSlide();
                });
            
                $("#imgBannerRight").click(function (){
                    slidesImg.goToNextSlide();
                });
        });

    </script>

@stop