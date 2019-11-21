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
        .wbCommon {width:100%; text-align:center; min-width:1120px; position:relative}
        .subContainer span {vertical-align:auto}

        /************************************************************/  
        .wbCommon .btnBox a {display:block; width:600px; margin:0 auto;
            font-size:30px; color:#eeb4b5; border:3px solid #eeb4b5; border-radius:50px; text-align:center; height:60px; line-height:60px;
        }
        .wbCommon .btnBox a:hover {background:#eeb4b5; color:#333;}

        .wb_00 {background:url(https://static.willbes.net/public/images/promotion/2019/11/1454_top_bg.jpg) no-repeat center top;}        
        .wb_01 {background:#202020 url(https://static.willbes.net/public/images/promotion/2019/11/1454_01_bg.jpg) no-repeat center top; padding:414px 0 150px}
        .wb_01 .tab {border-bottom:5px solid #eeb4b5; width:854px; margin:0 auto}
        .wb_01 .tab li {display:inline; float:left; width:33.333333%}
        .wb_01 .tab li a {display:block; text-align:center; font-size:22px; font-weight:bold; background:#515151; color:#7d7d7d; height:63px; line-height:63px; margin-right:1px}
        .wb_01 .tab li a:hover,
        .wb_01 .tab li a.active {background:#eeb4b5; color:#333;}
        .wb_01 .tab li:last-child a {margin:0}
        .wb_01 .tab:after {content:""; display:block; clear:both}
        .wb_01 .youtube iframe {width:854px; height:480px; margin:0 auto}
        .wb_01 .btnBox {margin-top:158px;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:854px; margin:0 auto; padding-top:358px}	
        .slide_con p {position:absolute; top:630px; width:72px; height:72px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-36px;}
        .slide_con p.rightBtn {right:-36px;}

        .wb_02 {background:url(https://static.willbes.net/public/images/promotion/2019/11/1454_02_bg.jpg) no-repeat center top; position:relative;}
        .wb_02 .btnBox {position:absolute; top:1492px; width:600px; left:50%; margin-left:-300px; z-index:5}
        .wb_02_01 {background:url(https://static.willbes.net/public/images/promotion/2019/11/1454_02_bg2.jpg) no-repeat center top; line-height:1.4} 
        .request {
            width:1000px; text-align:left; background:#fff; padding:50px; font-size:14px; margin:150px auto; 
            box-shadow: 10px 10px 10px rgba(010,0,0,.1); line-height:1.4; border:1px solid #333;
        }
        .request h3 {font-size:30px; padding-bottom:10px; margin-bottom:30px; border-bottom:2px solid #c14842}
        .request h3 span {color:#c14842;}
        .request p {font-size:16px; margin-bottom:10px; font-weight:bold}
        .request li {margin-bottom:10px}
        .request .tit { display:inline-block; width:70px;}  
        .request input[type="text"] {width:160px; height:26px; border:1px solid #999; padding:0 10px; color:#666}
        .request input[type="checkbox"] {width:20px; height:20px; border:1px solid #999;}  
        .termsBx {margin-bottom:20px}
        .termsBx a {display:block; width:250px; border-radius:4px; color:#fff; background:#c14842; text-align:center; height:50px; line-height:50px;
            font-size:18px; border-bottom:5px solid #6b1612; margin-bottom:20px;
        }
        .termsBx a:hover {background:#a8312b;}
        .termsBx li {display:inline; float:left; margin-right:10px}
        .termsBx:after {content:''; display:block; clear:both} 
        .termsBx01 {margin:30px 0}
        .termsBx01 ul {height:100px; overflow-y:scroll; border:1px solid #999; margin-bottom:10px; font-size:12px; color:#666; padding:0 10px}
        .request .btn {clear:both; border-top:1px solid #c14842;}
        .request .btn a {width:100px; display:block; text-align:center; background:#c14842; color:#fff; margin:30px auto 0; height:40px; line-height:40px}
        .request .btn a:hover {background:#000;}
        .request:after {content:''; display:block; clear:both}  
        input[type=file]:focus {border:1px solid #1087ef}                   	
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="wbCommon wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1454_top.jpg" title="합격자의밤" />
        </div>
		
		<div class="wbCommon wb_01">
            <ul class="tab">
                <li><a href="#tab01" class="active">19년 1차 합격자의 밤 </a></li>
                <li><a href="#tab02">18년 3차 합격자의 밤</a></li>
                <li><a href="#tab03">18년 2차 합격자의 밤</a></li>
            </ul>
            <div class="youtube" id="tab01"><iframe src="https://www.youtube.com/embed/unImcehy2dI?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div class="youtube" id="tab02"><iframe src="https://www.youtube.com/embed/Ugzo18tp4Ag?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div class="youtube" id="tab03"><iframe src="https://www.youtube.com/embed/NxsREWiD_ME?rel=0" frameborder="0" allowfullscreen></iframe></div>
            <div class="btnBox"><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ/search?query=%ED%95%A9%EA%B2%A9%EC%9E%90%EC%9D%98+%EB%B0%A4" target="_blank">더 많은 영상 보러가기 ></a></div>
            <div class="slide_con">
                <ul id="slidesImg7">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1454_01_img01.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1454_01_img02.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1454_01_img03.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1454_01_img04.jpg" alt="#" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1454_01_img05.jpg" alt="#" /></li>
                </ul>            
                <p class="leftBtn"><a id="imgBannerLeft7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_pre.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight7"><img src="https://static.willbes.net/public/images/promotion/2019/03/1174_01_next.png" alt="다음" /></a></p>
            </div>         
            <div class="btnBox"><a href="https://police.willbes.net/pass/offinfo/gallery/index" target="_blank">더 많은 사진 보러가기 ></a></div>
		</div>

   		<div class="wbCommon wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1454_02.jpg" title=" " />
            <div class="btnBox">
                <a href="#none" onclick="javascript:popup();">합격자의 밤 신청하기 ></a>
            </div>
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

        var tab1_url = "https://www.youtube.com/embed/unImcehy2dI?rel=0";
        var tab2_url = "https://www.youtube.com/embed/Ugzo18tp4Ag?rel=0";
        var tab3_url = "https://www.youtube.com/embed/NxsREWiD_ME?rel=0";
        $(function() {
            $(".youtube").hide();
            $(".youtube:first").show();
            $(".tab li a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#tab01"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab02"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab03"){
                    html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";
                }

                $(".tab a").removeClass("active");
                $(this).addClass("active");
                $(".youtube").hide();
                $(".youtube").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });
        });

        function popup(){
            var is_login = '{{sess_data('is_login')}}';
            if (is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return;
            }

            var url = "{{ site_url('/pass/promotion/popup/' . $arr_base['promotion_code']) }}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
        }
    </script>
    
@stop