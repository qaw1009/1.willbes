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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {
            position:fixed; 
            top:200px; 
            right:0;
            z-index:1;            
        }

        .wb_top {background:#0e0d4b url(https://static.willbes.net/public/images/promotion/2020/03/1557_top_bg.jpg) no-repeat center top;}
            .nameBox {position:absolute; top:425px; left:50%; margin-left:-430px; border:7px solid #fff; width:860px; height:200px; text-align:center; background:#0a0e25; color:#fff; overflow:hidden; z-index:10}
        .wb_00 {background:#12172d;}

        .wb_01 {background:#e1e1e1;position:relative;}	
        .youtubeBox01 iframe{width:420px;height:240px;}
        .wb_01 .inter01{position:absolute;left:50%;margin-left:-450px;top:425px;}
        .wb_01 .inter02{position:absolute;left:50%;margin-left:30px;top:425px;}
        

       /*탭(이미지)*/
        .tabs{width:100%; text-align:center;}
        .tabs ul {width:920px;margin:0 auto;margin-bottom:15px;}		
        .tabs li {display:inline; float:left;margin-right:10px;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}

    
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_00">
			<img src="https://static.willbes.net/public/images/promotion/2019/09/1393_00.jpg" alt="대한민국 경찰학원 1위 윌비스 신광은 경찰학원"/>			
		</div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_top.jpg" alt="인천부평 스파르타 센터">
            <div class="nameBox">
                <ul id="slider1" class="bxslider">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/03/1557_top_txt.png"/></li>					
                </ul>
            </div>
		</div>

        <div class="evtCtnsBox wb_01">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1557_01.jpg" alt="최종합격생 인터뷰"/>	           
            <div id="tab1" class="youtubeBox01 inter01">
                <iframe src="https://www.youtube.com/embed/HVvraTegmuY" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div id="tab2" class="youtubeBox01 inter02">
                <iframe src="https://www.youtube.com/embed/4UiP-Q5VMyw" frameborder="0" allowfullscreen=""></iframe>
            </div> 		                  
		</div>

        <div class="evtCtnsBox wb_01s">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1557_01s.jpg" alt="왜 합격생이 많은가"/>			
		</div>

        <div class="evtCtnsBox wb_02">          
            <div class="tabs">
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t1_on.jpg" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t1.jpg" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t2_on.jpg" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t2.jpg" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab03s">
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t3_on.jpg" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t3.jpg" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab04s">
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t4_on.jpg" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t4.jpg" class="off"/>
                        </a>
                    </li>
                </ul>
                <div id="tab01s" class="white"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t_c1.jpg" />              
                </div>                                        
                <div id="tab02s" class="white">
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t_c2.jpg" />   
                </div>       
                <div id="tab03s" class="white">
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t_c3.jpg" />        
                </div>
                <div id="tab04s" class="white">
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02_t_c4.jpg" />                 
                </div>
            </div>
        </div> 

        <div class="evtCtnsBox wb_02s">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1557_02s.jpg" alt="오시는 길"/>			
		</div>       
   
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $(function() {
            //Count the number of li elements
            var bx_num01 = $("#slider1 li").length;
            var ticker01 = $('#slider1').bxSlider({
                minSlides: 0,
                maxSlides: 100,
                slideWidth: 980,
                slideMargin: 0,
                ticker: true,
                mode: 'vertical',
                /*tickerHover: true,*/
                speed:20000*bx_num01
            });
        });

         /*탭(이미지버전)*/
     $(document).ready(function(){
                $('.tabs ul').each(function(){
                    var $active, $content, $links = $(this).find('a');
                    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    //$active.addClass('active');
                    $content = $($active[0].hash);

                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function(e){
                        $active.removeClass('active');
                        $content.hide();
                        $active = $(this);
                        $content = $(this.hash);
                        $active.addClass('active');
                        $content.show();
                        e.preventDefault()
                    });
                });
            });

            $(document).ready(function(){
        $(".tabCts").hide(); 
        $(".tabCts:first").show();        
        $(".evttab ul li a").click(function(){             
            var activeTab = $(this).attr("href"); 
            $(".evttab ul li a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".tabCts").hide(); 
            $(activeTab).fadeIn();             
            return false; 
        });
    });

        var tab1_url = "https://www.youtube.com/embed/HVvraTegmuY";
        var tab2_url = "https://www.youtube.com/embed/4UiP-Q5VMyw";        

        $(function() {
            $(".youtubeBox").hide();
            $(".youtubeBox:first").show();
            $(".youtubetab li a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }
                $(".youtubetab a").removeClass("active");
                $(this).addClass("active");
                $(".youtubeBox").hide();
                $(".youtubeBox").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });
        }); 
    
    </script>
@stop