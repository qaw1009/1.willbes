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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/     

        .sky {position:fixed;top:200px;right:25px;z-index:1;}
        .sky a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/07/1721_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#343b6f;}
        .wb_cts01s {background:#fff8f2;}
        .wb_cts03 {padding-top:50px;}
        .wb_cts04 {background:#f4f4f4;padding-bottom:150px;}
        .wb_cts05 {background:#9fa75e;padding-bottom:150px;}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#f4f4f4;margin-top:50px;}
        .tabContaier ul{width:980px;margin:0 auto;height:75px;} 
        .tabContaier li{display:inline-block;width:326px;line-height:75px;background:#f4f4f4;color:#021f44;float:left;font-size:25px;font-weight:bold;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block; color:#fff; background:#021f44; border-radius:13px 13px 0 0; border:3px solid #021f44; border-bottom:0}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#021f44;font-size:35px;background:#fff;}

        /*탭(이미지)*/
        .tabs{width:100%; text-align:center; padding-top:30px}
        .tabs ul {width:980px;margin:0 auto;}		
        .tabs li {display:inline; float:left;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}

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

        <div class="sky" >
            <a href="#none;"><img src="https://static.willbes.net/public/images/promotion/2021/07/1721_sky_title.png" alt=""></a>
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3052/prod-code/183669" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1721_sky1.png" alt=""></a>
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3052/prod-code/183667" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1721_sky2.png" alt=""></a>
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3052/prod-code/183668" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/1721_sky3.png" alt=""></a>
        </div>

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_top.jpg" alt="역대급 성적상승"/>      
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_01.jpg" alt="신청하기"/>
                <a href="https://cafe.daum.net/sharkchoi" target="_blank" title="우영이집" style="position: absolute;left: 10.46%;top: 73.99%;width: 14.23%;height: 9.57%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU6WzIxLjA4LTA5XQ%3D%3D" target="_blank" title="단과강의" style="position: absolute;left: 38.46%;top: 73.99%;width: 14.23%;height: 9.57%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU6VC1QYXNz" target="_blank" title="t-pass" style="position: absolute;left: 70.96%;top: 73.99%;width: 14.23%;height: 9.57%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts01s" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_01_guide.jpg" alt="수험과목 안내"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_02.jpg" alt="합경을 이끌어낸 그 과정"/>
            <div class="youtube_contents">
                <div class="youtube_divide">             
                    <div class="preview_area">
                        <div class="avi_box">
                            <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/wSaPEaVIbbo?rel=0 "></iframe>
                        </div>
                        <h2 class="avi_title">합격하고자 하면~ 기출을 풀어라! 직접FM 기출 문풀 정리하기~ </h2>
                    </div>
                    <div class="preview_list_area">
                        <div class="preview_list">
                            <ul>

                                <li class="on">
                                    <a href="#tab1" class="active">
                                        <span class="num_box" data-num="1">1</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/06/1721_thumbnail01s.png" alt=""></div>
                                        <div class="text_box">
                                            <p>합격하고자 하면~ 기출을 풀어라! 직접FM 기출 문풀 정리하기~ </p>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class=>
                                    <a href="#tab2" class="active">
                                        <span class="num_box" data-num="2">2</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>기초전기전자 직렬별 출제유형 전격 공개</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab3">
                                        <span class="num_box" data-num="3">3</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail02.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>전기이론 10분만에 정리하기</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab4">
                                        <span class="num_box" data-num="4">4</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>우영쌤의 &lt;무선/통신 공통 기초강의&gt; 10분만에 정리하기</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab5">
                                        <span class="num_box" data-num="5">5</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[전자] 기초 전기/전자 이론 『전기의 본질』 빠르게 확인하기!</p>
                                        </div>
                                    </a>
                                </li> 
                              
                                <li class="">
                                    <a href="#tab6">
                                        <span class="num_box" data-num="6">6</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!?😆</p>                                   
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab7">
                                        <span class="num_box" data-num="7">7</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>『전기회로 기본용어』 10분 핵심정리 확인하기!!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab8">
                                        <span class="num_box" data-num="8">8</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!?😆 2탄</p>
                                        </div>
                                    </a>
                                </li>                                
                             
                                <li class="">
                                    <a href="#tab9">
                                        <span class="num_box" data-num="9">9</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>무선/통신 공통이론에서 『변조이론』 제일 중요한 거 알지!? 피날레!</p>
                                        </div>
                                    </a>
                                </li>  
                               
                                <li class="">
                                    <a href="#tab10">
                                        <span class="num_box" data-num="10">10</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2020/07/1721_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>『RLC회로의 특성』 바로 이거야!!</p>
                                        </div>
                                    </a>
                                </li>
                                                                                                 
                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_03.jpg" alt="믿고 따라만 오세요"/>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_04.jpg" alt="커리큘럼"/>
            <div class="tabContaier" id="apply">    
                <ul class="NSK-Black">    
                    <li><a href="#tab1" class="active">전기</a></li>                            
                    <li><a href="#tab2">무선/통신</a></li>      
                    <li><a href="#tab3">전자공학</a></li>      
                </ul>
            </div> 
            <div id="tab1" class="tabContents">   
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_04_cts1.png" />
            </div>
            <div id="tab2" class="tabContents">    
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_04_cts2.png" />                                     
            </div>  
            <div id="tab3" class="tabContents">    
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_04_cts3.png" />                                     
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts05" id="t_pass_go" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_05.jpg" alt="통신/전기/전자작의 대세" />
            <div class="tabs" id="buyLec">                
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_05_tab1_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_05_tab1.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_05_tab2_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_05_tab2.png" class="off"/>
                        </a>
                    </li>                  
                </ul>
            </div>

            <div id="tab01s" class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_05_cts1.png" />
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" title="" style="position: absolute;left: 26.46%;top: 77.99%;width: 47.23%;height: 15.57%;z-index: 2;"></a>
            </div> 

            <div id="tab02s" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_05_cts2.png" />
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&campus_ccd=605001&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" title="" style="position: absolute;left: 26.46%;top: 79.99%;width: 47.23%;height: 15.57%;z-index: 2;"></a>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">

        //유툽      
        var tab1_url = "https://www.youtube.com/embed/wSaPEaVIbbo?rel=0";
        var tab2_url = "https://www.youtube.com/embed/_RDnE7u4k8U?rel=0";
        var tab3_url = "https://www.youtube.com/embed/sC9TJfUNkyc?rel=0";  
        var tab4_url = "https://www.youtube.com/embed/K_q0zcAGM3U?rel=0";   
        var tab5_url = "https://www.youtube.com/embed/FYzC6MElEzw?rel=0";   
        var tab6_url = "https://www.youtube.com/embed/rc-ZBbEhU_A?rel=0"; 
        var tab7_url = "https://www.youtube.com/embed/_crgLD0rmN8?rel=0";  
        var tab8_url = "https://www.youtube.com/embed/9dxrpJ6TOZg?rel=0";  
        var tab9_url = "https://www.youtube.com/embed/1zATq2Kydwg?rel=0";   
        var tab10_url = "https://www.youtube.com/embed/37yjw2mC8wY?rel=0";                        
    

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
                }else if(activeTab == "#tab10"){
                    video_tab_url = tab10_url;
                }
                html_str = '<iframe src="' + video_tab_url + '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no"></iframe>'
                $(this).addClass("active");
                $('.avi_box').html(html_str);
                $('.avi_title').html($(this).find('p').html());
            });
        });

           /*탭(텍스터버전)*/
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

    </script>

@stop
