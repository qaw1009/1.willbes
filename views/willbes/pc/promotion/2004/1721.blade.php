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
        .event_contents + .event_contents{padding-top:100px;}
        .event_contents {position:relative;width:1050px;margin:auto;z-index:1;}
        .event_subtitle.type6 {font-size:28px;line-height:38px;font-weight:700;text-align:left;color:#000;}
        .event_subtitle.def, .event_subtitle.def + small, .event_subtitle.def + p {padding-left:90px;}
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
                <area shape="rect" coords="573,1112,980,1210" href="cafe.daum.net/sharkchoi" target="_blank" />
            </map>           
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_01.jpg" alt="수험과목 안내"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1721_02.jpg" alt="합경을 이끌어낸 그 과정"/>
            <div class="event_contents" id="little">
                <div class="event_subtitle def type6">놀라운 강의력 겁나 빠른 맛보기 TOP10</div>
                <div class="event_littlepop_wrap">
                    <div class="contents_g">
                        <div class="layout_w100">
                            <div class="littlefovd_wrap">
                                <div class="preview_area">
                                    <div class="avi_box" style="display: inline-flex;"><iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/_RDnE7u4k8U?rel=0 "></iframe></div>
                                    <h2 class="prt_bnr_ttl">[확인국어]  문명 교수님의 역대급 강의력 겁나 빠르게 확인하기!</h2>
                                    <span class="prt_bnr_info">국어 / 문명교수님<a href="/tch/MM" target="_blank" class="adClick" data-adarea="맛보기영상팝업_교수님홈바로가기">교수님홈바로가기</a></span>
                                </div>
                                <div class="preview_list_area">
                                    <div class="preview_list">
                                        <ul>
                                            <li class="on">
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_[가비국어] 이근갑 교수님의 역대급 강의력 겁나 빠르게 확인하기! " data-vodseq="929" data-ttl="[가비국어] 이근갑 교수님의 역대급 강의력 겁나 빠르게 확인하기! " data-tch="이근갑" data-subj="국어" data-nic="LGG">
                                                    <span class="num_box" data-num="1">1</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200601/20200601185336_9429.png" alt=""></div>
                                                    <div class="text_box">
                                                        <p>[가비국어] 이근갑 교수님의 역대급 강의력 겁나 빠르게 확인하기! </p>
                                                        <span>국어 / 이근갑</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_[리라클영어] 이리라 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-vodseq="445" data-ttl="[리라클영어] 이리라 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-tch="이리라" data-subj="영어" data-nic="LLL">
                                                    <span class="num_box" data-num="2">2</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200605/20200605182708_3872.png" alt=""></div>
                                                    <div class="text_box">
                                                        <p>[리라클영어] 이리라 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                                        <span>영어 / 이리라</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_[스마트행정학] 김덕관 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-vodseq="906" data-ttl="[스마트행정학] 김덕관 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-tch="김덕관" data-subj="행정학" data-nic="KDK">
                                                    <span class="num_box" data-num="3">3</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200625/20200625152724_2686.png" alt=""></div>
                                                    <div class="text_box">
                                                        <p>[스마트행정학] 김덕관 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                                        <span>행정학 / 김덕관</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_[확인국어]  문명 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-vodseq="434" data-ttl="[확인국어]  문명 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-tch="문명" data-subj="국어" data-nic="MM">
                                                    <span class="num_box" data-num="4">4</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200615/20200615201504_5886.png" alt=""></div>
                                                    <div class="text_box">
                                                        <p>[확인국어]  문명 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                                        <span>국어 / 문명</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_[도끼한국사] 김종우 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-vodseq="462" data-ttl="[도끼한국사] 김종우 교수님의 역대급 강의력 겁나 빠르게 확인하기!" data-tch="김종우" data-subj="한국사" data-nic="KJW">
                                                    <span class="num_box" data-num="5">5</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200615/20200615201528_4343.png" alt=""></div>
                                                    <div class="text_box">
                                                        <p>[도끼한국사] 김종우 교수님의 역대급 강의력 겁나 빠르게 확인하기!</p>
                                                        <span>한국사 / 김종우</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_역사를 가장 역사답게! 황현필교수님의 공무원 한국사 기본이론!" data-vodseq="980" data-ttl="역사를 가장 역사답게! 황현필교수님의 공무원 한국사 기본이론!" data-tch="황현필" data-subj="한국사" data-nic="HHP">
                                                    <span class="num_box" data-num="6">6</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200707/20200707152915_2272.jpg" alt=""></div>
                                                    <div class="text_box">
                                                        <p>역사를 가장 역사답게! 황현필교수님의 공무원 한국사 기본이론!</p>
                                                        <span>한국사 / 황현필</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_[덩허접영어] 이박사 교수님의 역대급 강의력 겁나 빠르게 확인하기! " data-vodseq="782" data-ttl="[덩허접영어] 이박사 교수님의 역대급 강의력 겁나 빠르게 확인하기! " data-tch="이박사" data-subj="영어" data-nic="LBS">
                                                    <span class="num_box" data-num="7">7</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200629/20200629180831_4508.png" alt=""></div>
                                                    <div class="text_box">
                                                        <p>[덩허접영어] 이박사 교수님의 역대급 강의력 겁나 빠르게 확인하기! </p>
                                                        <span>영어 / 이박사</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_행정법 기본이론 핵심만을 임팩트있게 뽑아내는 한수성 교수님의 개념강의!" data-vodseq="616" data-ttl="행정법 기본이론 핵심만을 임팩트있게 뽑아내는 한수성 교수님의 개념강의!" data-tch="한수성" data-subj="행정법" data-nic="HSS">
                                                    <span class="num_box" data-num="8">8</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200707/20200707152939_9678.jpg" alt=""></div>
                                                    <div class="text_box">
                                                        <p>행정법 기본이론 핵심만을 임팩트있게 뽑아내는 한수성 교수님의 개념강의!</p>
                                                        <span>행정법 / 한수성</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_행정법공부 키워드만 알면 완전정복이 가능?" data-vodseq="921" data-ttl="행정법공부 키워드만 알면 완전정복이 가능?" data-tch="김현민" data-subj="행정법" data-nic="KHMH">
                                                    <span class="num_box" data-num="9">9</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200707/20200707153030_9245.jpg" alt=""></div>
                                                    <div class="text_box">
                                                        <p>행정법공부 키워드만 알면 완전정복이 가능?</p>
                                                        <span>행정법 / 김현민</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="adClick" data-adarea="맛보기영상팝업_송하라 교수님의 기본이론 강좌로 헷갈리는 음운을 재미있게 암기! " data-vodseq="488" data-ttl="송하라 교수님의 기본이론 강좌로 헷갈리는 음운을 재미있게 암기! " data-tch="송하라" data-subj="국어" data-nic="SHR">
                                                    <span class="num_box" data-num="10">10</span>
                                                    <div class="thum_box"><img src="https://img.modoogong.com/upload/bnr/20200713/20200713114344_7501.png" alt=""></div>
                                                    <div class="text_box">
                                                        <p>송하라 교수님의 기본이론 강좌로 헷갈리는 음운을 재미있게 암기! </p>
                                                        <span>국어 / 송하라</span>
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
    </script>

@stop