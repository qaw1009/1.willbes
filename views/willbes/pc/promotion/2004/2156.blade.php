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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/   
        
        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
            width:200px;
        }
        .skybanner a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_01_bg.jpg) no-repeat center top;}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_02s_bg.jpg) no-repeat center top;}

        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2156_03_bg.jpg) no-repeat center top;position:relative;}

        .wb_cts04 {padding-bottom:50px;}
        .wb_cts04 .slide_con {width:954px; margin:0 auto; position:relative}
        .wb_cts04 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .wb_cts04 .slide_con p a {cursor:pointer}
        .wb_cts04 .slide_con p.leftBtn {left:-100px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts04 .slide_con p.rightBtn {right:-100px; top:50%; width:62px; height:62px; margin-top:-30px;}  

        .wb_cts05 {background:#ECECEC}

        .wb_cts06 {padding-bottom:150px;}

        .wb_cts07 {background:#ECECEC;padding-bottom:50px;}

        .wb_cts08 {background:#ECECEC;}
 
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

        /*탭(이미지)*/
        .tabs{width:100%; text-align:center; padding-top:30px}
        .tabs ul {width:927px;margin:0 auto;}		
        .tabs li {display:inline; float:left;margin-left:15px;margin-bottom:15px;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}


        /* tip */
        .wb_cts09 {background:#fff; text-align:left; padding:100px 0}
        .wb_tipBox {border:1px solid #333; padding:30px; width:980px; margin:0 auto; }
        .wb_tipBox > strong {font-size:16px !important; font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin:30px 0 10px; color:#111}	
        .wb_tipBox ol li {margin-bottom:10px; line-height:1.3; list-style:decimal; margin-left:15px}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {font-size:12px; color:#c03011;}

        /*TAB_tip*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%;}
        .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff;}
        .tab02 li:last-child a {margin:0}
        .tab02:after {content:""; display:block; clear:both}   

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3052/code/2176" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_sky01.png" alt="소방학/법규 암기노트 전원증정"></a>            
            <a href="#buyLec"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_sky03.png" alt="선착순 20명 무려 88% 할인!"></a>
            <a href="#buyLec"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_sky04.png" alt="연간 종합반"></a>
        </div>

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_top.jpg" alt="새로운 출발" />     
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_01.jpg" alt="윌비스 불꽃소방"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_02s.jpg" alt="적중 또 적중"/>
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3052/code/2176" target="_blank" title="적중사례 자세히 보기" style="position: absolute; left: 52.29%; top: 83.39%; width: 16.07%; height: 6.4%; z-index: 2;"></a>
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
                            <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/kkfisLsAzV0?rel=0"></iframe>
                        </div>
                        <h2 class="avi_title">[소방관계법규 빈출테마 마지막] 종사명령·강제처분·피난명령·긴급조치 빈칸 채우기 특강!</h2>
                    </div>
                    <div class="preview_list_area">
                        <div class="preview_list">
                            <ul>

                                <li class="on">
                                    <a href="#tab1" class="active">
                                        <span class="num_box" data-num="1">1</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방관계법규 빈출테마 마지막] 종사명령·강제처분·피난명령·긴급조치 빈칸 채우기 특강!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab2">
                                        <span class="num_box" data-num="2">2</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail02.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방관계법규 빈출테마 2탄] 화재경계지구 빈칸 채우기 특강!</p>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="">
                                    <a href="#tab3">
                                        <span class="num_box" data-num="3">3</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail03.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방관계법규 빈출테마 1탄] 소방기본법의 목적 빈칸 채우기 특강!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab4">
                                        <span class="num_box" data-num="4">4</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail04.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방학개론 빈출테마 3탄] 화재정의 중요 키워드 빈칸 채우기 & O/X</p>
                                        </div>
                                    </a>
                                </li> 
                              
                                <li class="">
                                    <a href="#tab5">
                                        <span class="num_box" data-num="5">5</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail05.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방학개론 빈출테마 2탄] 연소의 분류 빈칸 채우기 및 O/X 특강!</p>                                   
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab6">
                                        <span class="num_box" data-num="6">6</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail06.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방학개론 빈출테마 1탄] 열량 및 비열 빈칸 채우기 및 O/X 특강!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab7">
                                        <span class="num_box" data-num="7">7</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail07.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방학개론] 연소의 3요소 vs. 4요소의 차이를 알려주마~</p>
                                        </div>
                                    </a>
                                </li>                                
                             
                                <li class="">
                                    <a href="#tab8">
                                        <span class="num_box" data-num="8">8</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail08.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[행정법] 행정심판에서 가장 중요한 ‘의무이행심판‘ O / X로 쉽게 정리하기!</p>
                                        </div>
                                    </a>
                                </li>  
                               
                                <li class="">
                                    <a href="#tab9">
                                        <span class="num_box" data-num="9">9</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail09.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[행정법] 취소소송의 소송요건 - 『변경처분』에는 공식이 있다?!</p>
                                        </div>
                                    </a>
                                </li>              

                                <li class="">
                                    <a href="#tab10">
                                        <span class="num_box" data-num="10">10</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail10.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[행정법] 인생을 반영하는 드라마틱한😲❗ ‘기·승·전·결’ - 『취소소송의 구조』</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab11">
                                        <span class="num_box" data-num="11">11</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail11.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>행정법] 개인정보보호법 개정법령에 대한 출제 포인트 Pick!!😉</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab12">
                                        <span class="num_box" data-num="12">12</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail12.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방한국사] 중앙집권국가를 위한 4가지 요건은 뭘까?</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab13">
                                        <span class="num_box" data-num="13">13</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail13.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방경채영어] 빈출 『전화 관련 주요 표현』 암기하기!</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab14">
                                        <span class="num_box" data-num="14">14</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail14.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방영어] 우리 관계를 깔끔하게 정리해볼까? 『관계대명사 vs. 관계부사』 편!</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab15">
                                        <span class="num_box" data-num="15">15</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail15.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방영어] 우리 관계를 깔끔하게 정리해볼까? 『관계부사』 편!</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab16">
                                        <span class="num_box" data-num="16">16</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail16.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방영어] 우리 관계를 깔끔하게 정리해볼까? 『관계대명사』 편!</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab17">
                                        <span class="num_box" data-num="17">17</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail17.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방 영어] 『5형식』 바로 이거야! 이해하기 쉽지?</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab18">
                                        <span class="num_box" data-num="18">18</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail18.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>[소방영어] 『수·시제·태』 단 5분 만에 이해하기!</p>
                                        </div>
                                    </a>
                                </li>   

                                <li class="">
                                    <a href="#tab19">
                                        <span class="num_box" data-num="19">19</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_thumbnail19.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>소방 영어] 『1~5형식』 바로 이게 포인트야!</p>
                                        </div>
                                    </a>
                                </li>   

                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
        </div>  
        
        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07.jpg" alt="기초 입문 종합반"/>
            <div class="tabs" id="buyLec">                
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab2_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_tab2.png" class="off"/>
                        </a>
                    </li>                  
                </ul>
            </div>

            <div id="tab01s">            
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_cts.png" usemap="#Map2156a" border="0" />
                <map name="Map2156a" id="Map2156a">
                    <area shape="rect" coords="247,243,645,320" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU64piF67aIL%2Bq9gy%2FsnbQv67KkL%2B2KuOKYheyEoOywqeyInCAyMOuqhSDtlZzsoJUg6riI7JWh4piFIOu2iOq9gw%3D%3D" target="_blank"/>
                </map>
            </div> 

            <div id="tab02s">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_07_cts2.png" usemap="#Map2156b" border="0" />
                <map name="Map2156b" id="Map2156b">
                    <area shape="rect" coords="239,243,654,318" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU64piF67aIL%2Bq9gy%2FsnbQv67KkL%2B2KuOKYheyEoOywqeyInCA1MOuqhSDtlZzsoJUg6riI7JWh4piFW0xJVkU%3D" target="_blank"/>
                </map>
            </div>
        </div>  

        <div class="evtCtnsBox wb_cts08" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2156_08.jpg" alt="5월 개강 불꽃소방 연간 패스" usemap="#Map2156c" border="0"/>
            <map name="Map2156c" id="Map2156c">
                <area shape="rect" coords="215,446,453,507" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU6WzIxLjA1LTIyLjAzXVvrtojqvYPshozrsKldIOqzteyxhCDsl7DqsIQg7KKF7ZWp" target="_blank"/>
                <area shape="rect" coords="668,446,908,509" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU6WzIxLjA1LTIyLjAzXVvrtojqvYPshozrsKldIOqyveyxhCDsl7DqsIQg7KKF7ZWp" target="_blank"/>
            </map>
        </div>

         <div class="evtCtnsBox wb_cts09">
            <div class="wb_tipBox">
            <ul class="tab02">
                <li><a href="#txt1">수강료 환불규정</a></li>
                <li><a href="#txt2">수강생 혜택상세</a></li>
                <li><a href="#txt3">기타</a></li>
            </ul>
            <div id="txt1">
                <p>수강료 환불규정</p>
                <ol>
                <li><strong>수강료 환불규정<span class="wb_tip_gray"> (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</span></strong><br />
                    <br />
                    <table>
                    <col />
                    <col />
                    <col />
                    <tr>
                        <th>수강료징수기간</th>
                        <th>반환 사유발생일</th>
                        <th>반환금액</th>
                    </tr>
                    <tr>
                        <td rowspan="4">1개월 이내인 경우</td>
                        <td>교습개시 이전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/3 경과 전</td>
                        <td>이미 납부한수강료의 2/3 해당</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/2 경과 전</td>
                        <td>이미 납부한수강료의 1/2 해당</td>
                    </tr>
                    <tr>
                        <td>총 교습 시간의 1/2 경과 후</td>
                        <td>반환하지아니함</td>
                    </tr>
                    <tr>
                        <td rowspan="2">1개월 초과인 경우</td>
                        <td>교습 개시 이전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>교습 개시 이후</td>
                        <td>반환 사유가발생한 당해 월의 반환대상 수강료와</br />
                        나머지 월의 수강료 전액을 합산한 금액</td>
                    </tr>
                    </table>
                    <br />
                    ▷ 총 교습 시간은 개강월로부터 종강월까지의 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
                    ▷ 환불 접수는 학원 방문 접수만 가능하며, 수강증을 필히 제출하여야 합니다.<br />
                    ▷ 카드로 결제하신 경우 결제 하셨던 카드를 지참하셔야 하며, 현금/계좌이체로 결제하신 경우 수강생 본인 명의의 통장으로만 환불금 입금 처리됩니다.<br />
                    ▷ 환불 기준일은 실제 수강 여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.<br />           		
                    ▷ 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.<br />
                    ▷ 친구추천할인 이벤트 적용 대상자의 경우, 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결제 해야 환불이 진행됩니다.<br />
                    ▷ 개강일이 지난 후에 강의 결제시, 지난 강의는 동영상으로 제공이 되며, 이후 강의 환불은 결제일과 상관없이 개강일을 기준으로 환불금이 산정됩니다.<br />
                    ▷ 이미 개강한 강의를 구매하더라도 수강료는 동일합니다.<br />	
                </li>
                </ol>
            </div>
            <div id="txt2">
                <p>수강생 혜택상세</p>
                <ol>        
                <li><strong>복습 동영상</strong><br />
                ▷ 종합반 수강 기간 내에 신청 가능합니다.<br />
                ▷ 현재 진행중인 실강에 대한 복습동영상이 제공되며, 다른 과정은 제공되지 않습니다.<br />
                ▷ 복습동영상은 최대 30일까지 신청할 수 있습니다.<br />
                ▷ 복습 동영상은 학원에 직접 방문하여 신청하는 것이 원칙이며, 전화로는 신청이 불가합니다.<br />
                </li>
                <li><strong>전국 모의고사</strong><br />
                ▷ 윌비스 고시학원에서 진행되는 윌비스 Real 모의고사가 제공됩니다.<br />
                ▷ 선택과목/응시직렬에 따라 몇몇 과목의 모의고사가 제공되지 않을 수 있습니다.<br />
                </li>
                <li><strong>사물함</strong><br />           
                ▷ 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                ▷ 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
                ▷ 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
                ▷ 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
                </li>		 
                <li><strong>공통 사항</strong><br />
                ▷ 개인 사유에 의해 이용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
                ▷ 제공된 혜택은 수강생 본인만 사용할 수 있습니다. 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다<br />
                </li>
                </ol>
            </div>
            <div id="txt3">
                <p>기타</p>
                <ol>
                <li><strong>커리큘럼</strong><br />
                ▷ 커리큘럼은 시험일정이나 학원/강사의 사정에 따라 일부 수정될 수 있습니다.<br />
                </li>
                <li><strong>강사진</strong><br />
                ▷ 강사진은 강사 개인사정이나 학원사정에 따라 변경될 수 있습니다.<br />
                </li>
                <li><strong>자습실 및 학원 운영시간</strong><br />
                ▷ 학원 운영 시간: <span class="wb_tip_orange">월 ~ 금 06:30 ~ 22:50, 토 07:30 ~ 22:00, 일 08:00 ~ 21:00  </span> (자습실 운영시간은 학원 운영 시간과 동일합니다.)<br />
                ▷ 데스크 운영 시간: <span class="wb_tip_orange"> 평일 08:30 ~ 20:00, 토요일 08:30 ~ 18:00 </span><br />
                ▷ 사물함 등록/연장/반납, 교재구매, 수강환불 관련 업무시간 : <span class="wb_tip_orange"> 평일 09:00 ~ 18:00 </span><br />
                ▷ 연휴 당일은 건물 휴무로 운영되지 않습니다.<br />
                ▷ 기술직 강의는 남강빌딩에서 진행 됩니다.<br />
                </li>
                <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                ▷ TEST 프로그램은 일일, 월간 TEST가 제공됩니다.<br />
                ▷ DAILY, MONTHLY TEST 의 경우, 강사의 강의 계획에 따라 제공되지 않을 수 있습니다.<br />
                ▷ 전국모의고사는 2019. 11월 이후 2~3개월에 한번 진행 될 예정이나, 학원사정이나 시험 일정에 따라 기간이 변경될 수 있습니다.<br />
                ▷ 전국모의고사는 학원에서 진행되는 올백모의고사반과 다른 프로그램입니다.<br />
                </li>
                <li><strong>강의 수강</strong><br />
                ▷ 수강 신청한 강의만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
                ▷ 등록하신 강좌는 본인만 수강이 가능하며, 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다. <br />
                ▷ 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다. <br />
                ▷ 강의는 학원/강사 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다. <br />(폐강 시, 환불 규정에 의거 환불 처리됩니다.)<br />
                ▷ 개인 사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                ▷ 수강 확인은 수강증 검사가 수시로 진행되니 꼭 지참하시고 수강하시기 바랍니다.  (수강증 분실 및 미지참 등으로 강의 수강에 불편함이 발생할 수 있습니다.)<br />
                </li>
                <li><strong>교재</strong><br />
                ▷ 교재는 별도 구매입니다. <br />
                ▷ 강사의 강의계획에 따라 추가적인 교재가 사용될 수도 있습니다.<br />
                </li>
                </ol>
            </div>
            
            </div>
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


        $(document).ready(function(){
            $('.tab02').each(function(){
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
            
                e.preventDefault()})})}
        ); 
        
        //유툽
        var tab1_url = "https://www.youtube.com/embed/kkfisLsAzV0?rel=0";
        var tab2_url = "https://www.youtube.com/embed/nGvEN8pbthc?rel=0";  
        var tab3_url = "https://www.youtube.com/embed/z7YwNxte5Nk?rel=0";   
        var tab4_url = "https://www.youtube.com/embed/wb5Mc43sHSs?rel=0";   
        var tab5_url = "https://www.youtube.com/embed/DL0LRv6jync?rel=0"; 
        var tab6_url = "https://www.youtube.com/embed/2_x_ICBX4ao?rel=0";  
        var tab7_url = "https://www.youtube.com/embed/cUdpxUQGH2A?rel=0";  
        var tab8_url = "https://www.youtube.com/embed/-ZFVtnziStg?rel=0";   
        var tab9_url = "https://www.youtube.com/embed/fdGNM5rpknk?rel=0";     
        var tab10_url = "https://www.youtube.com/embed/pp7P8SxQgWk?rel=0";
        var tab11_url = "https://www.youtube.com/embed/s61SCJ1Hfhc?rel=0";  
        var tab12_url = "https://www.youtube.com/embed/Jx9cdA-EDmU?rel=0";   
        var tab13_url = "https://www.youtube.com/embed/NxPMaQ7k-wI?rel=0";   
        var tab14_url = "https://www.youtube.com/embed/fGLUOlZhdb8?rel=0"; 
        var tab15_url = "https://www.youtube.com/embed/Pup9zbe1yCw?rel=0";  
        var tab16_url = "https://www.youtube.com/embed/dD29o0WJhQ8?rel=0";  
        var tab17_url = "https://www.youtube.com/embed/MZBW_AccOb8?rel=0";   
        var tab18_url = "https://www.youtube.com/embed/1DIYl_bfjb8?rel=0";   
        var tab19_url = "https://www.youtube.com/embed/XWF7OymHBbQ?rel=0"; 
        
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
                }else if(activeTab == "#tab11"){
                    video_tab_url = tab11_url;
                }else if(activeTab == "#tab12"){
                    video_tab_url = tab12_url;
                }else if(activeTab == "#tab13"){
                    video_tab_url = tab13_url;
                }else if(activeTab == "#tab14"){
                    video_tab_url = tab14_url;
                }else if(activeTab == "#tab15"){
                    video_tab_url = tab15_url;
                }else if(activeTab == "#tab16"){
                    video_tab_url = tab19_url;
                }else if(activeTab == "#tab17"){
                    video_tab_url = tab17_url;
                }else if(activeTab == "#tab18"){
                    video_tab_url = tab18_url;
                }else if(activeTab == "#tab19"){
                    video_tab_url = tab19_url;
                }
                html_str = '<iframe src="' + video_tab_url + '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no"></iframe>'
                $(this).addClass("active");
                $('.avi_box').html(html_str);
                $('.avi_title').html($(this).find('p').html());
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
