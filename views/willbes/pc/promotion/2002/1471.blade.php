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

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:30px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:36px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#a78de6}
        to{color:#000}
        }

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/12/1471_top_bg.jpg) no-repeat center; height:1186px}
        .wb_top span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .wb_top span.img1 {top:280px; margin-left:-858px; width:858px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        .wb_top span.img2 {top:280px; margin-left:0; width:532px; animation:iptimg2 0.5s ease-in;-webkit-animation:iptimg2 0.5s ease-in;}
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
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2019/12/1471_01_bg.jpg) no-repeat center}
        .wb_02 {background:#222830}
        .wb_03 {background:url(https://static.willbes.net/public/images/promotion/2019/12/1471_03_bg.jpg) no-repeat center; position:relative; height:1950px} 
        .wb_03 .benefitBox {position:absolute; top:1548px; left:0; width:100%; z-index:1}
        .wb_03 .benefitBox .bx-wrapper{max-width:100% !important;}
        .wb_03 .benefitBox li {display:inline; float:left; height: 320px;}
        .wb_03 .benefitBox li img {
            width: 229px;
            height: 269px;
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }

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
            width: 200px;
            height: 286px;
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
            right:10px;
            width:128px;
            z-index:10;            
        }   
        .skybanner a {margin-bottom:10px; display:block}    
    </style>

    <div class="evtContent NGR" id="evtContainer">
        <div class="skybanner"> 
            <a href="#golec"><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_sky.jpg"  alt=""  /></a>
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1053" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_sky02.jpg"  alt=""  /></a>
        </div>

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>끝장 PASS</span><br>사전접수 이벤트</td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><span>남았습니다!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top">
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_top_img01.png" alt=" "></span>
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_top_img02.png" alt=" "></span>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_01.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_02.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_03" id="golec">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03.jpg"  alt=""  />
            <div class="benefitBox">
                <ul class="slidesbenefit">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit03.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit04.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit05.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit06.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit07.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit08.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit03.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit04.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit05.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit06.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit07.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_03_benefit08.jpg" alt=""/></li> 
                </ul>
            </div> 
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
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b8.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b9.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b1.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b2.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b3.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b4.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b5.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b6.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b7.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b8.png" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1471_04_b9.png" alt=""/></li>
                </ul>
            </div> 
        </div>

        <div class="evtCtnsBox wb_05 c_both">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1471_05.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_06">
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