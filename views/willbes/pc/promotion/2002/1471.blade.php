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
            min-width:1210px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/1471_top_bg.jpg) no-repeat center}
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2019/12/1471_01_bg.jpg) no-repeat center}
        .wb_02 {background:#222830}
        .wb_03 {background:url(https://static.willbes.net/public/images/promotion/2019/12/1471_03_bg.jpg) no-repeat center}        
        .wb_04 {
            background:url(https://static.willbes.net/public/images/promotion/2019/12/1471_04_bg.jpg) no-repeat center top; position:relative;
            height:843px;
            clear: both;
        }
        .wb_04 .wb_04Top {position:absolute; top:0; left:0; width:100%; z-index:10; text-align:left}
        .wb_04 .buyBook {position:absolute; top:220px; left:50%; width:400px; margin-left:-200px; z-index:1}
        .wb_04 .buyBook a {display: block; padding:15px; font-size:20px; color:#1b1f25; text-align: center; background: #76dccf; border-radius: 40px;}
        .wb_04 .buyBook a:hover {color:#fff; background:#bb332d}
        .wb_04 .box-book {position:absolute; top:320px; left:0; width:100%; z-index:1}
        .wb_04 .box-book .bx-wrapper{max-width:100% !important;}
        .wb_04 .box-book li {display:inline; float:left; height: 250px;}
        .wb_04 .box-book li img {
            width: 153px;
            height: 209px;
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }

        .wb_05 {background:#fff} 
        .wb_06 {background:#7f5fce}
        .wb_07 {background:#555} 

        .skybanner {
            position:fixed; 
            top:200px; 
            right:0;
            width:128px;
            z-index:10;            
        }       
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner"> 
            <a href="#golec"><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_sky.jpg"  alt=""  /></a>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_top.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_01.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_02.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_04">
            <div class="wb_04Top"><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_top.bg.png"  alt=""  /></div>
            <div class="box-book">
                <ul class="slidesBook">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b1.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b2.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b3.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b4.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b5.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b6.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b7.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b1.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b2.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b3.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b4.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b5.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b6.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b7.png" alt=""/></li>
                </ul>
            </div> 
        </div>

        <div class="evtCtnsBox wb_05 c_both">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_05.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_06" id="golec">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_06.jpg"  alt="" usemap="#Map1471" border="0"  />
            <map name="Map1471" id="Map1471">
                <area shape="rect" coords="227,805,884,903" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1085" target="_blank" alt="신청하기" />
            </map>
        </div>

        <div class="evtCtnsBox wb_07">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_07.jpg"  alt=""  />
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
                slideWidth: 153,
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
@stop