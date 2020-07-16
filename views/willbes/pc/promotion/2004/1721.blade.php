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

        .wb_top {background:#FE8A8D url(https://static.willbes.net/public/images/promotion/2020/07/1721_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#FE8A8D;}
 
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
        .youtube_contents + .youtube_contents{padding-top:100px;}
        .youtube_contents {position:relative;width:1050px;margin:auto;z-index:1;}
        .event_littlepop_wrap {margin:30px -15px 0;padding: 40px 0 0 30px;background:#fff;border-radius: 5px;box-shadow: -10px 10px 30px rgba(0,0,0,.1);}

        .event_littlepop_wrap .preview_area {display:inline-block;border-right:1px solid #ddd;padding-bottom:40px;text-align:left;}
        .event_littlepop_wrap .preview_area .avi_box {width:730px;height:411px;margin-bottom:20px;} 
        .event_littlepop_wrap .preview_area h2 {display:block;font-size:24px;font-weight:700;line-height:32px;color:#000;overflow:hidden;text-overflow:ellipsis;word-wrap:normal;margin-bottom:4px;max-width:730px;}
        .event_littlepop_wrap .preview_area span {font-size:14px;font-weight:400;color:#555;}
        .event_littlepop_wrap .preview_area span a {display:inline-block;vertical-align: middle;width:18px;height:15px;margin:-3px 0 0 4px;
                                                    background: url(https://static.willbes.net/public/images/promotion/2020/07/i_front_home.png) repeat;background-size:100% auto;font-size:0;}
        .event_littlepop_wrap .preview_list_area {display:inline-block;vertical-align:top;padding-left:12px;width:304px;text-align:left;}
        .event_littlepop_wrap .preview_list_area .preview_list {margin-top:15px;height:455px;box-sizing:border-box;overflow-y:scroll;}
        .event_littlepop_wrap .preview_list_area .preview_list ul li {margin-bottom:12px;}
        .event_littlepop_wrap .preview_list_area .preview_list ul li .num_box {width:21px;display:inline-block;font-size: 12px;font-weight:400;
                                                                                color:#666;padding-right:10px;text-indent: 2px;vertical-align:middle;box-sizing:border-box;}
        .event_littlepop_wrap .preview_list_area .preview_list ul li .thum_box {display: inline-block;width: 125px;height: 70px;box-sizing: border-box;vertical-align: middle;overflow: hidden;}
        .preview_list_area .preview_list ul li.on .thum_box {border:3px solid #00E752;}
        .event_littlepop_wrap .preview_list_area .preview_list ul li .thum_box img {width:100%;transition:0.5s;}
        .event_littlepop_wrap .preview_list_area .preview_list ul li .text_box {padding-left:10px;display:inline-block;width:123px;box-sizing:border-box;vertical-align: middle;}
        .event_littlepop_wrap .preview_list_area .preview_list ul li .text_box p {font-size:13px;font-weight:400;line-height:18px;color:#000;margin-bottom: 2px;
                                                                                  overflow:hidden;text-overflow:ellipsis;word-wrap:break-word;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;}
        .event_littlepop_wrap .preview_list_area .preview_list ul li .text_box span {font-size:12px;font-weight:400;line-height:18px;color:#666;}                                            



        
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_top.jpg" alt="최우영 커리큘럼" usemap="#Map1721a" border="0" />
            <map name="Map1721a" id="Map1721a">
                <area shape="rect" coords="144,1112,546,1208" href="#apply" />
                <area shape="rect" coords="573,1112,980,1210" href="http://cafe.daum.net/sharkchoi" target="_blank" />
            </map>           
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_01.jpg" alt="수험과목 안내"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_02.jpg" alt="합경을 이끌어낸 그 과정"/>
            <div class="youtube_contents" id="little">
                <div class="event_littlepop_wrap">                 
        
                    <div class="littlefovd_wrap">
                        <div class="preview_area">
                            <div class="avi_box">
                                <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/_RDnE7u4k8U?rel=0 "></iframe>
                            </div>
                            <h2 class="prt_bnr_ttl">[확인국어]  문명 교수님의 역대급 강의력 겁나 빠르게 확인하기!</h2>
                            <span class="prt_bnr_info">국어 / 문명교수님<a href="/tch/MM" target="_blank" class="adClick" data-adarea="맛보기영상팝업_교수님홈바로가기">교수님홈바로가기</a></span>
                        </div>
                        <div class="preview_list_area">
                            <div class="preview_list">
                                <ul>
                                    <li class="on">
                                        <a href="#tab1" class="active">
                                            <span class="num_box" data-num="1">1</span>
                                            <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200601/20200601185336_9429.png" alt=""></div>
                                            <div class="text_box">
                                                <p>[가비국어] 이근갑 교수님의 역대급 강의력 겁나 빠르게 확인하기! </p>
                                                <span>국어 / 이근갑</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab2">
                                            <span class="num_box" data-num="2">2</span>
                                            <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200605/20200605182708_3872.png" alt=""></div>
                                            <div class="text_box">
                                                <p>[리라클영어] 이리라 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                                <span>영어 / 이리라</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab3">
                                            <span class="num_box" data-num="3">3</span>
                                            <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200625/20200625152724_2686.png" alt=""></div>
                                            <div class="text_box">
                                                <p>[스마트행정학] 김덕관 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                                <span>행정학 / 김덕관</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab4">
                                            <span class="num_box" data-num="4">4</span>
                                            <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200615/20200615201504_5886.png" alt=""></div>
                                            <div class="text_box">
                                                <p>[확인국어]  문명 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                                <span>국어 / 문명</span>
                                            </div>
                                        </a>
                                    </li>                                   
                                </ul>
                            </div>
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
            <div id="tab01" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_04_tab01.jpg" alt="전기직 9급"/>
            </div>
            <div id="tab02" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_04_tab02.jpg" alt="전기직 7급"/>
            </div>
            <div id="tab03" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_04_tab03.jpg" alt="통신직"/>
            </div>
            <div id="tab04" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_04_tab04.jpg" alt="전자직"/>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" id="apply" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_05.jpg" alt="수강신청" usemap="#Map1721b" border="0"/>
            <map name="Map1721b" id="Map1721b">
                <area shape="rect" coords="109,907,516,997" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&search_text=UHJvZE5hbWU6KO2VmeybkOyLpOqwlXZlci4p" target="_blank" />
                <area shape="rect" coords="611,906,1013,1001" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&search_text=UHJvZE5hbWU6KO2VmeybkOyLpOqwlXZlci4p" target="_blank" />
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
        var tab1_url = "https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/GlE9EGMDF98?rel=0&modestbranding=1&showinfo=0";        
        var tab3_url = "https://www.youtube.com/embed/VEmBnYu8tcc?rel=0&modestbranding=1&showinfo=0";
        var tab4_url = "https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0";

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
                }
                html_str = '<iframe src="' + video_tab_url + '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no"></iframe>'
                $(this).addClass("active");
                $('.avi_box').html(html_str);
            });
        });

    </script>

@stop