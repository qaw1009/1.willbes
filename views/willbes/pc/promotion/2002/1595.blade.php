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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_top {background:#283754 url(https://static.willbes.net/public/images/promotion/2020/04/1595_top_bg.jpg) no-repeat center; height:1604px;}
        .wb_top span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_top span.img1 {top:360px; margin-left:-270px; width:527px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_top span.img2 {top:410px; margin-left:-266px; width:562px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-858px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-858px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:532px; opacity: 0;}
        to{margin-left:0; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:532px; opacity: 0;}
        to{margin-left:0; opacity: 1;}
        }

        .wb_01 {background:#fff;}
        .wb_02 {background:#f1f1f1}
        .wb_03 {background:#4d79f6; position:relative; height:825px;} 
        .wb_03 .benefitBox {position:absolute; top:500px; left:0; width:100%; z-index:1}
        .wb_03 .benefitBox .bx-wrapper{max-width:100% !important;}
        .wb_03 .benefitBox li {display:inline; float:left; height: 320px;}
        .wb_03 .benefitBox li img {
            width: 229px;
            height: 269px;
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }

        .wb_04 {background:#fff}    

        .wb_05 {background:#23385e} 
        .wb_06 {background:#fff}   
        
    </style>

    <div class="evtContent NGR" id="evtContainer">      

        <div class="evtCtnsBox wb_top">
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/03/1489_top_img01.png" alt=" "></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2020/03/1489_top_img02.png" alt=" "></span>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1595_01.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1595_02.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_03" id="golec">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03.jpg"  alt=""  />
            <div class="benefitBox">
                <ul class="slidesbenefit">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_01.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_02.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_03.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_04.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_05.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_06.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_07.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_08.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_09.png" alt=""/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1595_03_10.png" alt=""/></li>                  
                </ul>
            </div> 
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1595_04.jpg"  alt=""  />
        </div>       

        <div class="evtCtnsBox wb_05 c_both">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1595_05.jpg"  alt="" usemap="#Map1595a" border="0"  />
            <map name="Map1595a" id="Map1595a">
                <area shape="rect" coords="269,1177,852,1330"
                 href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605006&course_idx=1085" target="_blank" onfocus='this.blur()' />
            </map>           
        </div>

        <div class="evtCtnsBox wb_06">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1595_06.jpg"  alt=""  />          
        </div>

    </div>

     
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });

        $(document).ready(function() {
            var BxBook = $('.slidesBook').bxSlider({
                slideWidth: 200,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        $(document).ready(function() {
            var BxBook = $('.slidesbenefit').bxSlider({
                slideWidth: 229,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });
    </script>

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop