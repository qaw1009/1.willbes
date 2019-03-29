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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .wbCommon {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/  

        .wb_00 {background:#0a1d4f url(https://static.willbes.net/public/images/promotion/2019/03/1174_top_bg.jpg) no-repeat center top;}        
        .wb_01 {background:#202020 url(https://static.willbes.net/public/images/promotion/2019/03/1174_01_bg.jpg) no-repeat center top;}
        .wb_01 .youtube {height:1418px}	
        .wb_01 .youtube iframe {margin-top:439px; width:854px; height:480px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:854px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-40px; top:46%; width:80px; height:80px;}
        .slide_con p.rightBtn {right:-40px;top:46%; width:80px; height:80px;}

        .wb_02 {background:#f297b8 url(https://static.willbes.net/public/images/promotion/2019/03/1174_02_bg.jpg) no-repeat center top;} 
        .wb_02 .request {width:1000px; margin:0 auto; text-align:left; background:#fff; padding:50px; font-size:14px; margin-bottom:150px}
        .wb_02 .request h3 {font-size:30px; padding-bottom:10px; margin-bottom:30px; border-bottom:2px solid #f297b8}
        .wb_02 .request h3 span {color:#f297b8;}
        .wb_02 .request p {font-size:16px; margin-bottom:20px; font-weight:bold}
        .wb_02 .request li {margin-bottom:10px}
        .wb_02 .request .tit { display:inline-block; width:70px;}  
        .wb_02 .request input {width:180px; height:26px;}  
        
               	
    </style>


    <div class="evtContent" id="evtContainer">

        <div class="wbCommon wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1174_top.jpg" title="합격자의밤" />
        </div>
		
		<div class="wbCommon wb_01">
            <div class="youtube"><iframe src="https://www.youtube.com/embed/-Q676VZ03FM?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_01.jpg" title=" " /></div>
            <div class="slide_con">
                <ul id="slidesImg7">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img01.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img02.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img03.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img04.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img05.jpg" alt="#" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_img06.jpg" alt="#" /></li>
                </ul>
            
                <p class="leftBtn"><a id="imgBannerLeft7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_pre.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_next.png" alt="다음" /></a></p>
          </div>
            
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_02.jpg" title=" " /></div>
		</div>

   		<div class="wbCommon NSK wb_02">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_02_01.jpg" title=" " /></div>
            <div class="request">
                <h3>윌비스 신광은경찰 <span class="strong">합격자의 밤</span> 신청 </h3>
                <div>
                    <p>수강생 정보</p>
                    <ul>
                        <li>
                            <span class="tit">이름</span>
                            <input type="text" id="" name="" value="" >
                        </li>
                        <li>
                            <span class="tit">아이디</span>
                            <input type="text" id="" name="" value="" >
                        </li>
                        <li>
                            <span class="tit">전화번호</span>
                            <input type="text" id="" name="" value="" >
                        </li>
                    </ul>
                </div>               
                
            </div>

            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_02_02.jpg" title=" " /></div>
        </div>
        
        <div>

        </div>
        
    </div>
    <!-- End Container -->   

    <script>
        $(document).ready(function() {
            var slidesImg7 = $("#slidesImg7").bxSlider({
            //mode:'fade', option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            controls:false,
            slideWidth:980,
            autoHover: true,
            pager:false,
            });

            $("#imgBannerLeft7").click(function (){
            slidesImg7.goToPrevSlide();
            });
            $("#imgBannerRight7").click(function (){
            slidesImg7.goToNextSlide();
            });
		
	    });
    </script>
    
@stop