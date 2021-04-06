@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/    

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_01_bg.jpg) no-repeat center top;}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_02_bg.jpg) no-repeat center top;}

        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_03_bg.jpg) no-repeat center top;position:relative;}

        .wb_cts04 {padding-bottom:50px;}
        .wb_cts04 .slide_con {width:915px; margin:0 auto; position:relative}
        .wb_cts04 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .wb_cts04 .slide_con p a {cursor:pointer}
        .wb_cts04 .slide_con p.leftBtn {left:-100px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts04 .slide_con p.rightBtn {right:-100px; top:50%; width:62px; height:62px; margin-top:-30px;}  

        .wb_cts05 {background:#ECECEC}

        .wb_cts06 {padding-bottom:150px;}

        .wb_cts07 {background:#ECECEC;padding-bottom:150px;}
 
        /* TAB */
        .tab {width:980px; margin:0 auto}		
        .tab li {display:inline; float:left;margin-left:14px;margin-bottom:14px;}	
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block}
        .tab:after {content:""; display:block; clear:both}

        /*분할 유튜브*/
        .youtube_contents {position:relative;width:1050px;margin:auto;z-index:1;}
        .youtube_divide {margin:30px -15px 0;padding: 40px 0 0 30px;background:#fff;border-radius: 5px;box-shadow: -10px 10px 30px rgba(0,0,0,.1);}
        .youtube_divide .preview_area {display:inline-block;border-right:1px solid #ddd;padding-bottom:40px;text-align:left;}
        .youtube_divide .preview_area .avi_box {width:730px;height:411px;margin-bottom:20px;} 
        .youtube_divide .preview_area h2 {display:block;font-size:24px;font-weight:700;line-height:32px;color:#000;overflow:hidden;text-overflow:ellipsis;word-wrap:normal;margin-bottom:4px;max-width:730px;}
        .youtube_divide .preview_area span {font-size:14px;font-weight:400;color:#555;}
        .youtube_divide .preview_area span a {display:inline-block;vertical-align: middle;width:18px;height:15px;margin:-3px 0 0 4px;
                                              background: url(https://static.willbes.net/public/images/promotion/2020/07/i_front_home.png) repeat;background-size:100% auto;font-size:0;}
        .youtube_divide .preview_list_area {display:inline-block;vertical-align:top;padding-left:12px;width:304px;text-align:left;}
        .youtube_divide .preview_list_area .preview_list {margin-top:15px;height:455px;box-sizing:border-box;overflow-y:scroll;}
        .youtube_divide .preview_list_area .preview_list ul li {margin-bottom:12px;}
        .youtube_divide .preview_list_area .preview_list ul li .num_box {width:26px;display:inline-block;font-size: 12px;font-weight:400;
                                                                         color:#666;padding-right:10px;text-indent: 2px;vertical-align:middle;box-sizing:border-box;}
        .youtube_divide .preview_list_area .preview_list ul li .thum_box {display: inline-block;width: 120px;height: 70px;box-sizing: border-box;vertical-align: middle;overflow: hidden;}
        /*.youtube_divide .preview_list_area .preview_list ul li.on .thum_box {border:3px solid #00E752;}*/
        .youtube_divide .preview_list_area .preview_list ul li .thum_box img {width:100%;transition:0.5s;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box {padding-left:10px;display:inline-block;width:123px;box-sizing:border-box;vertical-align: middle;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box p {font-size:13px;font-weight:400;line-height:18px;color:#000;margin-bottom: 2px;
                                                                            overflow:hidden;text-overflow:ellipsis;word-wrap:break-word;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box span {font-size:12px;font-weight:400;line-height:18px;color:#666;}        

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_top.jpg" alt="결정된다" />     
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_01.jpg" alt="윌비스 불꽃소방"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_02.jpg" alt="합격전략 설명회"/>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_03.jpg" alt="구매하기"/>
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank" title="불꽃소방 라이브 모드 구매하기" style="position: absolute; left: 32.29%; top: 79.39%; width: 36.07%; height: 7.4%; z-index: 2;"></a>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_04.jpg" alt="소방직 합격"/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_04_01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_04_02.png" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_04_03.png" /></li>     
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_right.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_04_emo.jpg"  alt="이모티콘"/>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_05.jpg" alt="커리큘럼"/>
        </div>  
        
        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_06.jpg" alt="합격을 이끌어낸 그 과정"/>
            <div class="youtube_contents">
                <div class="youtube_divide">             
                    <div class="preview_area">
                        <div class="avi_box">
                            <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/_RDnE7u4k8U?rel=0 "></iframe>
                        </div>
                        <h2 class="avi_title">[전기직] 듣기만 해도 합격! 최우영 전기직 커리큘럼</h2>
                    </div>
                    <div class="preview_list_area">
                        <div class="preview_list">
                            <ul>
                                <li class="on">
                                    <a href="#tab1" class="active">
                                        <span class="num_box" data-num="1">1</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>기초전기전자 직렬별 출제유형 전격 공개</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#tab2">
                                        <span class="num_box" data-num="2">2</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail02.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>전기이론 10분만에 정리하기</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#tab3">
                                        <span class="num_box" data-num="3">3</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>우영쌤의 &lt;무선/통신 공통 기초강의&gt; 10분만에 정리하기</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#tab4">
                                        <span class="num_box" data-num="4">4</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[전자] 기초 전기/전자 이론 『전기의 본질』 빠르게 확인하기!</p>
                                        </div>
                                    </a>
                                </li> 
                              
                                <li class="">
                                    <a href="#tab5">
                                        <span class="num_box" data-num="5">5</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!?😆</p>                                   
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab6">
                                        <span class="num_box" data-num="6">6</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>『전기회로 기본용어』 10분 핵심정리 확인하기!!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab7">
                                        <span class="num_box" data-num="7">7</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!?😆 2탄</p>
                                        </div>
                                    </a>
                                </li>                                
                             
                                <li class="">
                                    <a href="#tab8">
                                        <span class="num_box" data-num="8">8</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!? 피날레!</p>
                                        </div>
                                    </a>
                                </li>  
                               
                                <li class="">
                                    <a href="#tab9">
                                        <span class="num_box" data-num="9">9</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>『RLC회로의 특성』 바로 이거야!!</p>
                                        </div>
                                    </a>
                                </li>

                                {{--
                                <li class="">
                                    <a href="#tab10">
                                        <span class="num_box" data-num="10">10</span>
                                        <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200605/20200605182708_3872.png" alt=""></div>
                                        <div class="text_box">
                                            <p>[리라클영어] 이리라 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                            <span>영어 / 이리라</span>
                                        </div>
                                    </a>
                                </li>    
                                --}}                                     
                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
        </div>  

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07.jpg" alt="기초 입문 종합반"/>
            <ul class="tab">
                <li>
                    <a href="#tab1">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab.png" class="off" alt="01"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab_on.png" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab2.png" class="off" alt="02"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab2_on.png" class="on"  />
                    </a>
                </li>            
                <div id="tab1">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_cts.png" usemap="#Map2156a" title="" border="0" />
                        <map name="Map2156a" id="Map2156a">
                            <area shape="rect" coords="237,239,654,327" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001" target="_blank" />
                        </map>
                    </li>
                </div>
                <div id="tab2">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_cts2.png" usemap="#Map2156b" title="" border="0"/>
                        <map name="Map2156b" id="Map2156b">
                            <area shape="rect" coords="239,242,648,320" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001" target="_blank" />
                        </map>
                    </li>
            </ul>            
        </div>        

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


        $(document).ready(function(){
            $('.tab').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');

            $content = $($active[0].hash);

            $links.not($active).each(function () {
            $(this.hash).hide()});

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();

            $active = $(this);
            $content = $(this.hash);

            $active.addClass('active');
            $content.show();

            e.preventDefault()})});
            tabMenuSlider();
        }); 


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

        //유툽
        var tab1_url = "https://www.youtube.com/embed/_RDnE7u4k8U?rel=0";
        var tab2_url = "https://www.youtube.com/embed/sC9TJfUNkyc?rel=0";  
        var tab3_url = "https://www.youtube.com/embed/K_q0zcAGM3U?rel=0";   
        var tab4_url = "https://www.youtube.com/embed/FYzC6MElEzw?rel=0";   
        var tab5_url = "https://www.youtube.com/embed/rc-ZBbEhU_A?rel=0"; 
        var tab6_url = "https://www.youtube.com/embed/_crgLD0rmN8?rel=0";  
        var tab7_url = "https://www.youtube.com/embed/9dxrpJ6TOZg?rel=0";  
        var tab8_url = "https://www.youtube.com/embed/1zATq2Kydwg?rel=0";   
        var tab9_url = "https://www.youtube.com/embed/37yjw2mC8wY?rel=0";                        
    

        $(function() {
            $(".preview_list ul li a").click(function(){
                var activeTab = $(this).attr("href");
                var video_tab_url = '';
                var html_str = '';
                if(activeTab == "#tab1"){
                    video_tab_url = tab1_url;
                }else if(activeTab == "#tab2"){
                    video_tab_url = tab2_url;
                }else if(activeTab == "#tab3"){
                    video_tab_url = tab3_url;
                }else if(activeTab == "#tab4"){
                    video_tab_url = tab4_url;
                }else if(activeTab == "#tab5"){
                    video_tab_url = tab5_url;
                }else if(activeTab == "#tab6"){
                    video_tab_url = tab6_url;
                }else if(activeTab == "#tab7"){
                    video_tab_url = tab7_url;
                }else if(activeTab == "#tab8"){
                    video_tab_url = tab8_url;
                }else if(activeTab == "#tab9"){
                    video_tab_url = tab9_url;
                }
                html_str = '<iframe src="' + video_tab_url + '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no"></iframe>'
                $(this).addClass("active");
                $('.avi_box').html(html_str);
                $('.avi_title').html($(this).find('p').html());
            });
        });
        

    </script>

@stop
