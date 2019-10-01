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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/09/1408_top_bg.jpg) no-repeat center top;}    

        .skybanner{position: fixed; top: 845px;right: 2px;z-index: 1;}
        
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1408_02_bg.jpg) no-repeat center top;}

        .evt03 {background:#f9f9f9;padding-bottom:100px;}
         /* 슬라이드배너 */
         .slide_con {position:relative; width:900px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px;}
        .slide_con p.rightBtn {right:-100px;}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both}           

        .evt04 {background:red; padding:0 0 150px}    

        .evt05 .requestL li {display:inline-block; margin-right:10px}
        
        .evt05 {background:#fff;} 
        .evt06 {background:#fff;} 
        
        .evt04 div a,      
        .evt05 a,
        .evt06 a {display:block; width:800px; margin:50px auto 0; padding:20px 0; border-radius:30px; font-size:24px; background:#000; color:#fff;}
        .evt06 a {position:absolute; top:926px; left:50%; margin:0 !important; margin-left:-400px !important}
        .evt04 div a:hover,      
        .evt05 a:hover,  
        .evt06 a:hover {background:#ff8a00;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NGR" id="evtContainer">       
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_top.gif" title="올백 모의고사"  />
        </div>
      
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1048_scroll_b.png" usemap="#Map1408a" title="소문내고 혜택받기" border="0"  />
            <map name="Map1408a" id="Map1408a">
                <area shape="rect" coords="1249,20,1472,109" href="#to_go" />
            </map>       
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_02.jpg" title="고퀄리티 문항"  />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_03.jpg" title="올백모의 고사반"  />
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con1.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con2.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con.jpg" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2019/09/arr_l.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2019/09/arr_r.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt04">           
            추후수정
        </div>

        <div class="evtCtnsBox evt05" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_05.jpg" title="소문내고 무료쿠폰 받고"  />
            <div class="requestL">
                <ul>
                    <li><input type="radio" name="register_data2" id="CT1" value="일반남자" /> <label for="CT1">올백모의고사 1회 무료응시권</label></li>
                    <li><input type="radio" name="register_data2" id="CT2" value="일반여자" /> <label for="CT2">올백모의고사반 1만원 할인쿠폰</label></li>
                </ul>
            </div>    
        </div>

        <div class="evtCtnsBox evt06">
            
        </div>

        {{--홍보url댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
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

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });
    </script>


@stop