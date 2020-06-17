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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/     

        .wb_top {background:#F9FAFC url(https://static.willbes.net/public/images/promotion/2020/06/1689_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#A8272B;}
        .wb_cts02 {background:#F5F5F5;}
        .wb_cts03 {background:#F5F5F5;padding-bottom:50px;}
        .wb_cts04 {background:#413dab url(https://static.willbes.net/public/images/promotion/2020/06/1689_04_bg.jpg) no-repeat center top;} 

        /* 탭 */
        .tabContaier {width:920px; margin:0 auto;padding-top:50px;}
        .tabContaier ul {margin-bottom:10px}
        .tabContaier li {display:inline; float:left; width:25%}
        .tabContaier ul:after {content:""; display:block; clear:both}
        .tabContaier a {display:block; text-align:center; font-size:24px; font-weight:bold; background:#323232; color:#fff;
                        padding:14px 0; border:1px solid #323232; margin-right:2px;height:80px;line-height:55px;}
        .tabContaier li:last-child a {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#fff; color:#000; border:1px solid #666;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_top.jpg" alt="소방합격 패스" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_01.jpg" alt="부산 윌비스로 오세요"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_02.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_03.jpg" alt=""/>
            <div class="tabContaier">  
                <ul class="NGEB">
                    <li><a href="#tab01" class="active">영어 이섬가</a></li>
                    <li><a href="#tab02">국어 이휘웅</a></li>
                    <li><a href="#tab03">한국사 김민규</a></li>
                    <li><a href="#tab04">소방학/법규 이중희</a></li>
                </ul>
            </div>
            <div id="tab01" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_03_contents01.jpg" alt=""/>
            </div>
            <div id="tab02" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_03_contents02.jpg" alt=""/>
            </div>
            <div id="tab03" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_03_contents03.jpg" alt=""/>
            </div>
            <div id="tab04" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_03_contents04.jpg" alt=""/>
            </div>
        </div>
        
        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1689_04.jpg" alt=""/>
        </div>     

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });
    </script>

@stop