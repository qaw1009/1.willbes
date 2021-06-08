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

        .skybanner {position:fixed; top:150px; width:120px; right:10px; z-index:1;}

        .wb_top {background:#FE8A8D url(https://static.willbes.net/public/images/promotion/2020/07/1721_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#FE8A8D;}
        .wb_cts03 {padding-top:50px;}
        .wb_cts04 {padding-top:50px;}
        .wb_cts04 .change {margin:0 auto;width:920px;text-align:right;padding:25px 0;color:#a8272b;font-size:13px;font-weight:bold;}
        .wb_cts05 {padding-top:50px;}
 
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

        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1721_sky.png" usemap="#Map1721sky" title="신규강의 개강" border="0"/>
            <map name="Map1721sky" id="Map1721sky">
                <area shape="rect" coords="1,129,120,266" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" />
                <area shape="rect" coords="4,291,121,435" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" />
            </map>
        </div> 

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1721_top.gif" alt="최우영 커리큘럼" usemap="#Map1721a" border="0" />
            <map name="Map1721a" id="Map1721a">
                <area shape="rect" coords="144,1112,546,1208" href="#t_pass_go" />
                <area shape="rect" coords="573,1112,980,1210" href="http://cafe.daum.net/sharkchoi" target="_blank" />
            </map>           
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_01.jpg" alt="수험과목 안내"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_02.jpg" alt="합경을 이끌어낸 그 과정"/>
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

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_03.jpg" alt="후기"/>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_04.jpg" alt="신규강좌 안내"/>
            <div class="tabContaier">  
                <ul class="NGEB">
                    <li><a href="#tab01" class="active">전기직 9급</a></li>
                    <li><a href="#tab02">전기직 7급</a></li>
                    <li><a href="#tab03">통신직</a></li>
                    <li><a href="#tab04">전자직</a></li>
                </ul>
            </div>
            <p class="change">*시험일정에 따른 개강/종강일 변동 가능</p>
            <div id="tab01" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1721_04_tab01.jpg" alt="전기직 9급"/>
            </div>
            <div id="tab02" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1721_04_tab02.jpg" alt="전기직 7급"/>
            </div>
            <div id="tab03" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1721_04_tab03.jpg" alt="통신직"/>
            </div>
            <div id="tab04" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/1721_04_tab04.jpg" alt="전자직"/>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" id="t_pass_go" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/1721_05.jpg" alt="수강신청" usemap="#Map1721b" border="0"/>
            <map name="Map1721b" id="Map1721b">
                <area shape="rect" coords="105,1043,520,1140" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" />
                <area shape="rect" coords="611,1042,1013,1143" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" />
            </map>
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
