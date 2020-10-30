@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/
       
        .skybanner {
            position:fixed;
            top:250px;
            right:0;
            z-index:1;
        }
        .skybanner2{
            position:fixed;
            top:400px;
            right:0;
            z-index:1;
        }

        .wb_cts03 {background:#fff; width:1200px; margin:0 auto; padding-bottom:100px}
        .wb_cts03 ul {margin-bottom:30px;padding-top:40px;width:1120px;margin:0 auto;}
        .wb_cts03 li {display:inline; float:left; width:50%}
        .wb_cts03 li a {display:block; text-align:center; font-size:24px; padding:24px 0; font-weight:bold; color:#888787; background:#f4f4f4; border:1px solid #e5e5e5; border-bottom:1px solid #fff; margin-right:10px}
        .wb_cts03 li a:hover,
        .wb_cts03 li a.active {color:#de3b1f; background:#fff; padding:20px 0; border:5px solid #de3b1f; border-bottom:5px solid #fff}
        .wb_cts03 ul:after {content:""; display:block; clear:both}

        /*
        .skybanner ul {border:1px solid #000; border-bottom:none}
        .skybanner a {height:40px; line-height:40px; display:block; text-align:center; background:#009ef5; color:#fff; font-size:14px !important; font-weight:600 !important; border-bottom:1px solid #000}
        .skybanner a:hover {background:#fff; color:#000}
        .skybanner li:last-child a {background:#000; color:#fff;}
        */

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1024_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 span {position:absolute; width:520px; top:724px; left:50%; margin-left:-469px; background:#000; z-index:10}
        .wb_cts01 iframe {width:520px; margin:0 auto; height:300px}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1024_01_bg.jpg) no-repeat center top}
        .wb_cts03 {background:#fff;}
        .wb_cts04 {background:#029ffe}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:600px; margin:0 auto; padding:0 0 100px}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px}
        .slide_con p.rightBtn {right:-80px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_skybanner.png" alt="장정훈 경찰학" />
            <ul>
                <li><a href="#wb_cts02">수강생후기</a></li>
                <li><a href="#wb_cts03">완벽적중</a></li>
                <li><a href="#wb_cts04">커리큘럼</a></li>
                <li><a href="/professor/show/cate/3001/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank">온라인수강신청</a></li>
                <li><a href="/pass/professor/show/prof-idx/50032/?cate_code=3010&subject_idx=1058&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank">학원수강신청</a></li>
                <li><a href="#evtContainer">TOP ▲</a></li>
            </ul>
        </div>
        --}}
        <div class="skybanner" >
            <a href="https://police.willbes.net/support/notice/show?board_idx=238714&" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1404_sb1.png" alt="경찰학 베너"></a>            
        </div>
        <div class="skybanner2" >
            <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=239117&" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1404_sb2.png" alt="행정학 베너" ></a>
        </div>


      
        <div class="evtCtnsBox wb_cts01" id="wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_top.jpg" alt="장정훈 경찰학" />
            <span><iframe src="https://www.youtube.com/embed/HzPBkz4bptA?rel=0" frameborder="0" allowfullscreen></iframe></span> 
        </div>       

        <div class="evtCtnsBox wb_cts02" id="wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_01.jpg" alt="수강후기" />            
        </div>

        <div class="evtCtnsBox wb_cts03" id="wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1404_02.jpg" usemap="#Map1404a" border="0" />
            <map name="Map1404a" id="Map1404a">
                <area shape="rect" coords="155,356,564,450" href="https://police.willbes.net/support/notice/show?board_idx=238714&" target="_blank" />
                <area shape="rect" coords="576,355,988,452" href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=239117&" target="_blank" />
            </map>
            <ul class="tabs">   
                <li><a href="#tab01">경찰학개론</a></li>
                <li><a href="#tab02">행정법</a></li>
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1404_05.jpg" title="경찰학개론" id="tab01"/>
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1404_06.jpg" title="행정법" id="tab02"/> 
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1024_03.jpg" alt="커리큘럼" usemap="#Map190118" border="0"/>
            <map name="Map190118" id="Map190118">
                <area shape="rect" coords="72,878,532,966" href="{{ site_url('/professor/show/cate/3001/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture') }}" target="_blank" alt="온라인강의신청" />
                <area shape="rect" coords="594,877,1048,967" href="{{ site_url('/pass/professor/show/prof-idx/50032/?cate_code=3010&subject_idx=1058&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture') }}" target="_blank" alt="학원강의신청" />
            </map>
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
                slideWidth:600,
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


    <script>
        /*tab*/
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        ) 
    </script>
@stop