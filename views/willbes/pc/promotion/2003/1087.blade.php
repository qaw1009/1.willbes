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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top{background:url(https://static.willbes.net/public/images/promotion/2019/08/1087_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#ebebeb;position:relative;}
        .wb_cts02 {background:#fff;}
        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2019/08/1087_03_bg.jpg)repeat;margin-bottom:50px;}
        .wb_cts02 .btn {width:1210px; margin:0 auto}
        .wb_cts02 .btn li {float:left; display:inline}
        .wb_cts04 {background:url(https://static.willbes.net/public/images/promotion/2019/08/EV170803_bg04.jpg) repeat;}

        .Pstyle {
            opacity:0;
            display:none;
            position:relative;
            width:auto;
            padding: 20px;
            background:#fff;
        }
        .b-close {
            position:absolute;
            right:0;
            top:0;
            padding:5px;
            display:block;
            cursor:pointer;
            color:#000;
        }
        .popcontent {height:auto; width:auto}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:266px;
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }

        @@keyframes upDown{
             from{margin-top:0}
             60%{margin-top:-30px}
             to{margin-top:0}
         }
        @@-webkit-keyframes upDown{
             from{margin-top:0}
             60%{margin-top:-30px}
             to{margin-top:0}
         }

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
         
    
        <div class="skybanner">
            <div><a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/08//EV180820_sky.png" alt="한권으로 공부하는 회계학"></a></div>
        </div>   

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1087_top.jpg" alt="클래스가 다른 회계학" />          
        </div>
       

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1087_01.jpg" alt="2020 김현식 공무원 회계학" usemap="#Map1087a" border="0" />
            <map name="Map1087a" id="Map1087a">
                <area shape="circle" coords="946,479,118" href="#event" />
            </map>         
        </div>
        
        <div class="evtCtnsBox wb_cts02">
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1087_02.jpg" alt="정답은 공무원 회계학">
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1087_02_01.jpg" alt="유일무이한 정상급 강의력">
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1087_02_02.jpg" alt="고효율 x 최대 학습효과 교재">
                </li>
                <li class="btn">
                    <ul>
                        <li>
                            <a onclick="go_popup()">
                                <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_c51.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a onclick="go_popup01()">
                                <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_c52.jpg" alt="" />
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1087_02_03.jpg" alt="합격의 신 김현식">
                </li>
            </ul>                             
        </div>

        <div id="popup" class="Pstyle">
            <span class="b-close"><img src="http://file.willbes.net/new_image/2016/popClose.png"></span>
            <div class="content">
                <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_pop01.png" alt="찾아오시는길"/>
            </div>
        </div>
        <div id="popup01" class="Pstyle">
            <span class="b-close"><img src="http://file.willbes.net/new_image/2016/popClose.png"></span>
            <div class="content">
                <img src="http://file3.willbes.net/new_gosi/2017/08/EV170803_pop02.png" alt="찾아오시는길"/>
            </div>
        </div>    

        <div class="evtCtnsBox wb_cts03 " id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1087_03.jpg" alt="수강 신청하기" usemap="#Map1087b" border="0" />
            <map name="Map1087b" id="Map1087b">
                <area shape="rect" coords="409,465,807,572" href="https://pass.willbes.net/lecture/show/cate/3022/pattern/only/prod-code/156372" target="_blank"  onFocus="this.blur();" />
            </map>          
        </div>
       
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        function go_popup() {
            $('#popup').bPopup();
        };

        function go_popup01() {
            $('#popup01').bPopup();
        };

    </script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop