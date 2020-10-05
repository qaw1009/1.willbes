@extends('willbes.pc.layouts.master_no_topnav')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
    .wrapper {
        weight: 100% !important;
        height: 100%;
        margin: 20px auto 0; 
        overflow: hidden;
        line-height:1.2;
    }
    .scroll {position: fixed; bottom:40px; left:50%; margin-left:-37px; width:74px; height:37px; text-align:center; 
        animation:iptimg1 1s infinite;-webkit-animation:iptimg1 1s infinite; z-index:10}
    @@keyframes iptimg1{
        from{bottom:40px;}
        50%{bottom:30px;}
        to{bottom:40px;}
    }
    @@-webkit-keyframes iptimg1{
        from{bottom:40px;}
        50%{bottom:30px;}
        to{bottom:40px;}
    }

    .mainEvt {
        /*float: left;*/
        width: 100%;
        margin: 0 auto;
    }
    .mainEvt section .page_container {
        position: relative;
        /*top: 25%;*/
        margin: 0 auto;
        z-index: 3;
        text-align:center;
        background: #fff;
    }
    .mainEvt section  {
        overflow: hidden;
    }
    /*
    .mainEvt section > img {
        position: absolute;
        max-width: 100%;
        z-index: 1;
    }*/
    .mainEvt section.page1 { }
    .slide {width:100% !important; height:750px; overflow:hidden; position:relative}
    .slide li img {width:1120px; margin:0 auto;}
    .slide ul {width:100% !important}
    .slide li {width:100% !important}
    .page1 .slide li:nth-child(1) {background:#0096ce}
    .page1 .slide li:nth-child(2) {background:#c59659 url(https://static.willbes.net/public/images/promotion/2020/10/1837_top02_bg.jpg) no-repeat center top}
    .page1 .slide li:nth-child(3) {background:#3e9d75}
    .page1 .slide li:nth-child(4) {background:#717eff}
    .slide p {position:absolute; top:50%; left:50%; margin-top:-35px; width:47px; height:70px; z-index:110}
    .slide p.leftBtn {margin-left:-677px}
    .slide p.rightBtn {margin-left:611px}

    .mainEvt section.page2 {}
    .page2 .txt01 {font-size:22px}
    .page2 .txt02 {font-size:56px; margin-top:30px;}
    .page2 .tabs {width:600px; margin:20px auto 0}
    .page2 li {display:inline; float:left; width:200px}
    .page2 li a {display:block; padding:15px 0; background:#ebebeb; color:#aeaeae; font-size:20px}
    .page2 li a:hover,
    .page2 li a.active {background:#000; color:#fff;}
    .page2 .tabs:after {content:""; display:block; clear:both}
    .page2 .youtube {width:800px; height:450px; margin:0 auto;}
    .page2 .youtube iframe {width:800px; height:450px;}    

    .mainEvt section.page3 {}
    .mainEvt section.page3 .slide {height:630px; margin-bottom:100px !important}
    .page3 .txt01 {font-size:63px}
    .page3 .txt02 {font-size:100px; margin-bottom:70px} 

    .mainEvt section.page4 .page_container {background:url(https://static.willbes.net/public/images/promotion/2020/10/1837_page4_bg.jpg) no-repeat center top}
    .mainEvt section.page5 .page_container {background:url(https://static.willbes.net/public/images/promotion/2020/10/1837_page5_bg.jpg) no-repeat center top}
    
    body.disabled-onepage-scroll .main section .page_container, 
    body.disabled-onepage-scroll .main section.page3 .page_container  {
      padding: 20px;
      margin-top: 150px;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    
    body.disabled-onepage-scroll section .page_container h1{
      text-align: center;
      font-size: 50px;
    }
    body.disabled-onepage-scroll section .page_container h2, 
    body.disabled-onepage-scroll section .page_container .credit, 
    body.disabled-onepage-scroll section .page_container .btns{
      text-align: center;
      width: 100%;
    }
    
    body.disabled-onepage-scroll .main section.page1 > img {
      position: absolute;
      width: 80%;
      left: 10%;
    }
    
    body.disabled-onepage-scroll .main section > img {
      position: relative;
      max-width: 80%;
      bottom: 0;
    }
    body.disabled-onepage-scroll code {
      width: 95%;
      margin: 0 auto 25px;
      float: none;
      overflow: hidden;
    }
    
    body.disabled-onepage-scroll .main section.page3 .page_container {
      width: 90%;
      margin-left: auto;
      margin-right: auto;
      right: 0;
    }
    </style>

    <div class="scroll"><span><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_scroll.png" /></span></div>
    <div class="wrapper NSK">
        <div class="mainEvt">                
            <section class="page1">
                <div class="page_container">
                    <div class="slide">
                        <ul id="slidetop">
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_top01.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_top02.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_top03.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_top04.jpg" /></li>
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2020/10//1837_arrowR.png"></a></p>
                    </div>
                </div>
            </section>
            
            <section class="page2">
                <div class="page_container">
                    <div class="txt01">
                        온라인 창업을 시작할 때 어떻게 시작해야 할지<br>
                        고민인 초보 창업자분들은 여기 주목!
                    </div>
                    <div class="txt02 NSK-Black">
                        1억뷰N잡 도매꾹&도매매<br>
                        성공사례 7인7색
                    </div>
                    <ul class="tabs NSK-Black">
                        <li><a href="#tab1" class="active">7인 7색</a></li>
                        <li><a href="#tab2">김예능 대표</a></li>
                        <li><a href="#tab3">김기현 대표 외 5인</a></li>
                    </ul>
                    <div id="tab1" class="youtube">
                        <iframe src="https://www.youtube.com/embed/tynb1Lva540?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div id="tab2" class="youtube">
                        <iframe src="https://www.youtube.com/embed/C-HvQpui8xI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div id="tab3" class="youtube">
                        <iframe src="https://www.youtube.com/embed/BsqW9fk1V6M?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </section>
            
            <section class="page3">
                <div class="page_container">
                    <div class="txt01">
                        N잡 선배들의
                    </div>
                    <div class="txt02 NSK-Black">
                        리얼한 성공사례
                    </div>
                    <div class="slide">
                        <ul id="slidetop2">
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page3_01.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page3_02.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page3_03.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page3_04.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page3_05.jpg" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page3_06.jpg" /></li>
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft2"><img src="https://static.willbes.net/public/images/promotion/2020/10/1837_arrowL2.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight2"><img src="https://static.willbes.net/public/images/promotion/2020/10//1837_arrowR2.png"></a></p>
                    </div>
                </div>
            </section>

            <section class="page4">
                <div class="page_container">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page4.jpg" />
                </div>
            </section>

            <section class="page5">
                <div class="page_container">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page5.jpg" />
                </div>
            </section>

            <section class="page6">
                <div class="page_container">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/1837_page6.jpg" />
                </div>
            </section>            
        </div>                  
    </div>

    

    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/onepage/jquery.onepage-scroll.js"></script>
    <link href='/public/js/willbes/onepage/onepage-scroll.css' rel='stylesheet' type='text/css'>
    <script>
        $(document).ready(function() {
            var slidetop = $("#slidetop").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto: true, 
                speed: 500, 
                pause: 4000, 
                mode:'fade', 
                autoControls: false, 
                pager:false,
            });

            $("#imgBannerLeft").click(function (){
                slidetop.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidetop.goToNextSlide();
            });
        });	

        $(document).ready(function() {
            var slidetop2 = $("#slidetop2").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto: true, 
                speed: 500, 
                pause: 4000, 
                mode:'fade', 
                autoControls: false, 
                pager:true,
            });

            $("#imgBannerLeft2").click(function (){
                slidetop2.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidetop2.goToNextSlide();
            });
        });	
        
        
        $(document).ready(function(){
            $(".mainEvt").onepage_scroll({
                sectionContainer: "section",
                responsiveFallback: 600,
                loop: true
            });
        });

        var tab1_url = "https://www.youtube.com/embed/tynb1Lva540?rel=0";
        var tab2_url = "https://www.youtube.com/embed/C-HvQpui8xI?rel=0";        
        var tab3_url = "https://www.youtube.com/embed/BsqW9fk1V6M?rel=0";


        $(function() {
            $(".youtube").hide(); 
            $(".youtube:first").show();
            $(".tabs li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab3"){
                    html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";                   
                }
                $(".tabs a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".youtube").hide(); 
                $(".youtube").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
        });        
	</script>
@stop