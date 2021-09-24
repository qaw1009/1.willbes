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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/   
        
        .sky {position:fixed;top:200px;right:5px;z-index:11;}
        .sky a {display:block; margin-bottom:5px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2240_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/09/2240_01_bg.jpg) no-repeat center top;}

        .wb_cts03 {background:#169adb}

        .wb_cts04 {padding-bottom:50px;}
        .wb_cts04 .slide_con {width:1120px; margin:0 auto; position:relative}
        .wb_cts04 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .wb_cts04 .slide_con p a {cursor:pointer}
        .wb_cts04 .slide_con p.leftBtn {left:-20px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .wb_cts04 .slide_con p.rightBtn {right:-20px; top:50%; width:62px; height:62px; margin-top:-30px;}  

        .wb_cts05 {background:#ECECEC}

        .wb_cts06 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2240_06_bg.jpg) no-repeat center top;}

        .wb_cts07 {padding-bottom:150px;}

        .wb_cts08 {background:#ECECEC;padding-bottom:50px;}
        .wb_cts08 .wrap {width:980px; margin:0 auto; position:relative}

        .wb_cts10 {background:#fff;}

        .wb_cts11 {background:#8e3e47; padding:100px 0}


 
        /*분할 유튜브*/
        .youtube_contents {position:relative;width:1050px;margin:auto;z-index:1;}
        .youtube_divide {margin:30px -15px 0;padding: 40px 0 0 30px;background:#fff;border-radius: 5px;box-shadow: -10px 10px 30px rgba(0,0,0,.1);}
        .youtube_divide .preview_area {display:inline-block;padding-bottom:40px;text-align:left;}
        .youtube_divide .preview_area .avi_box {width:730px;height:411px;margin-bottom:20px;} 
        .youtube_divide .preview_area h2 {display:block;font-size:24px;font-weight:700;line-height:32px;color:#000;overflow:hidden;text-overflow:ellipsis;word-wrap:normal;margin-bottom:4px;max-width:730px;}
        .youtube_divide .preview_area span {font-size:14px;font-weight:400;color:#555;}
        .youtube_divide .preview_list_area {display:inline-block;vertical-align:top;padding-left:12px;width:304px;text-align:left;}
        .youtube_divide .preview_list_area .preview_list {height:460px;box-sizing:border-box;overflow-y:scroll;}
        .youtube_divide .preview_list_area .preview_list ul li {margin-bottom:12px;}
        .youtube_divide .preview_list_area .preview_list ul li .num_box {
            width:26px;display:inline-block;font-size: 12px;font-weight:400;
            color:#666;padding-right:10px;text-indent: 2px;vertical-align:middle;box-sizing:border-box;
        }
        .youtube_divide .preview_list_area .preview_list ul li .thum_box {display: inline-block;width: 120px;height: 70px;box-sizing: border-box;vertical-align: middle;overflow: hidden;}
        /*.youtube_divide .preview_list_area .preview_list ul li.on .thum_box {border:3px solid #00E752;}*/
        .youtube_divide .preview_list_area .preview_list ul li .thum_box img {width:100%;transition:0.5s;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box {padding-left:10px;display:inline-block;width:123px;box-sizing:border-box;vertical-align: middle;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box p {
            font-size:13px;font-weight:400;line-height:18px;color:#000;margin-bottom: 2px;
            overflow:hidden;text-overflow:ellipsis;word-wrap:break-word;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;
        }
        .youtube_divide .preview_list_area .preview_list ul li .text_box span {font-size:12px;font-weight:400;line-height:18px;color:#666;}        

        /*탭(이미지)*/
        .tabs{width:100%; text-align:center; padding-top:30px}
        .tabs ul {width:980px;margin:0 auto;}		
        .tabs li {display:inline; float:left;padding-bottom:15px;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}

        /*TAB_tip*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%;}
        .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff;}
        .tab02 li:last-child a {margin:0}
        .tab02:after {content:""; display:block; clear:both}   

        .evtMenu {background:#4f7bf6; }            
        .evtMenu ul {width:1120px; margin:0 auto; text-align:left}        
        .evtMenu ul li{width:calc( 100% / 6); float:left;}
        .evtMenu ul li a{padding:15px 0; color:#fff; line-height:1.4; text-align:center; display:inline-block; width:100%; font-size:14px}
        .evtMenu ul li a.on{border-bottom:5px white solid;}
        .evtMenu ul:after{ content:""; display:block; clear:both;}

        .fixed {position:fixed; top:0; left:0; width:100%;box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}


        .wb_cts_notice {background:#fff; text-align:left; padding:100px 0}
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

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/offinfo/boardInfo/index/78?" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/09/2241_sky.png" alt="7월 new"></a>
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1297" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/07/2240_sky2.png" alt="새벽모의고사"></a>
            <a href="javascript:alert('Coming Soon!')"><img src="https://static.willbes.net/public/images/promotion/2021/08/2241_sky3.png" alt="신기훈 t"></a>
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3046&campus_ccd=605001&search_text=UHJvZE5hbWU67Ius7ZmU7J2066Gg" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_sky5.png" alt="세무직"></a>
        </div>

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_top.jpg" alt="너만바" />     
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_01.jpg" alt="9급 일반행정"/>
        </div>

        <nav class="evtMenu">
            <div class="widthAuto">
                <ul>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('.wb_cts08')" class="tab">
                            수강신청 &<br>시간표 
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('.wb_cts05')"  class="tab">
                            연간&특강<br>합격 커리
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('.wb_cts04')"  class="tab">
                            수강&합격<br>후기
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('.wb_cts03')"  class="tab">
                            라이브모드<br>신청
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('.wb_cts07')"  class="tab">
                            교수진<br>YOUTUBE
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onClick="scrolling('.wb_cts11')"  class="tab">
                            무료특강<br>
                            신청
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="evtCtnsBox wb_cts08" >
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_08.jpg" alt="기본 이론 종합반 클라쓰"/>
            <div class="tabs" id="buyLec">                
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2021/06/2249_09_tab_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/06/2249_09_tab_off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2021/06/2249_09_tab2_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/06/2249_09_tab2_off.png" class="off"/>
                        </a>
                    </li>                  
                </ul>
            </div>

            <div id="tab01s" class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_09_cts1.png" />
                <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU67Jew6rCE" title="9급 연간 패스" target="_blank" style="position: absolute; left: 9.9%; top: 33.26%; width: 38.27%; height: 8.7%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3046&campus_ccd=605001&search_text=UHJvZE5hbWU67Jew6rCE" title="9급 세무 연간 패스" target="_blank" style="position: absolute; left: 51.5%; top: 33.26%; width: 38.27%; height: 8.7%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU6MuqwnOyblA%3D%3D" title="9급 일행 2개월 패스" target="_blank" style="position: absolute; left: 9.9%; top: 80.65%; width: 38.27%; height: 8.7%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3046&campus_ccd=605001&search_text=UHJvZE5hbWU6MuqwnOyblA%3D%3D" title="9급 세무 2개월 패스" target="_blank" style="position: absolute; left: 51.5%; top: 80.65%; width: 38.27%; height: 8.7%; z-index: 2;"></a>


                <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU6" target="_blank" style="position: absolute; left: 22.86%; top: 81.15%; width: 54.29%; height: 10.38%; z-index: 2;"></a>
            </div> 

            <div id="tab02s" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_09_cts2.jpg" />
                <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU6bGl2ZQ%3D%3D" target="_blank" style="position: absolute; left: 18.37%; top: 71.73%; width: 61.22%; height: 15.58%; z-index: 2;"></a>
            </div>
        </section>  

        <div class="evtCtnsBox wb_cts10">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2240_10.jpg" alt="전기/통신 수강신청하기"/>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&campus_ccd=605001&search_text=UHJvZE5hbWU66riw67O47J2066Gg" target="_blank" title="수강신청하기" style="position: absolute; left: 45.63%; top: 40.13%; width: 28.57%; height: 8.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&campus_ccd=605001&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" title="수강신청하기" style="position: absolute; left: 45.63%; top: 71.92%; width: 28.57%; height: 8.08%; z-index: 2;"></a>
            </div>
        </div>

        <section class="evtCtnsBox wb_cts05" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_05.gif" alt="커리큘럼"/>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_05_1.gif" alt="커리큘럼"/>
                <a href="javascript:alert('Coming Soon');" title="한덕현" style="position: absolute; left: 85.27%; top: 24.81%; width: 10.45%; height: 20.19%; z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon');" title="신기훈" style="position: absolute; left: 85.27%; top: 48.52%; width: 10.45%; height: 20.19%; z-index: 2;"></a>
            </div>
        </section>

        <section class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_04_top.jpg" alt="소방직 합격"/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_04_01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_04_02.png" /></li>   
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/04/2156_right.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_04_bottom.jpg"  alt="이모티콘"/>
        </section>
        
        <section class="evtCtnsBox wb_cts03" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_03.jpg" alt="라이브 모드 구매하기"/>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank" title="9급 구매하기" style="position: absolute; left: 22.32%; top: 76.06%; width: 55.36%; height: 7.33%;  z-index: 2;"></a>                
            </div>
        </section>
      
        <section class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_07.jpg" alt="합격을 이끌어낸 그 과정"/>
            <div class="youtube_contents">
                <div class="youtube_divide">             
                    <div class="preview_area">
                        <div class="avi_box">
                            <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://youtube.com/embed/ipp-9NTYgXY"></iframe>
                        </div>
                        <h2 class="avi_title">한덕현 영어 - 제니스 영어 합격 커리큘럼!</h2>
                    </div>
                    <div class="preview_list_area">
                        <div class="preview_list">
                            <ul>

                                <li class="on">
                                    <a href="#tab1" class="active">
                                        <span class="num_box" data-num="1">1</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_thumbnail01.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>한덕현 영어 - 제니스 영어 합격 커리큘럼!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab2">
                                        <span class="num_box" data-num="2">2</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_thumbnail02.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>행정법 마스터! 신기훈 노량진 착륙😆</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab3">
                                        <span class="num_box" data-num="3">3</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_thumbnail03.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>영어 한덕현 ONE DAY OX특강 - those가 사람들로 쓰일 때</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab4">
                                        <span class="num_box" data-num="4">4</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_thumbnail04.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>한덕현 영어 2020년6월13일 지방직 해설강의</p>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="">
                                    <a href="#tab5">
                                        <span class="num_box" data-num="5">5</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_thumbnail05.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>김덕관 행정학 2021.04.17 국가직 9급 기출 해설</p>
                                        </div>
                                    </a>
                                </li>   
                                
                                <li class="">
                                    <a href="#tab6">
                                        <span class="num_box" data-num="6">6</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2021/09/2240_thumbnail06.jpg" alt=""></div>
                                        <div class="text_box">
                                            <p>김철 행정학 OT</p>
                                        </div>
                                    </a>
                                </li> 

                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
        </section>  


        <section class="evtCtnsBox wb_cts11" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2240_11.jpg" alt="교수진"/>
                <a href="javascript:alert('Coming Soon!');" title="무료특강 신청하기" style="position: absolute; left: 35.89%; top: 83.39%; width: 28.04%; height: 6%; z-index: 2;"></a>
            </div>
        </section>   


        <div class="evtCtnsBox wb_cts_notice">
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
                ▷ 학원 운영 시간: <span class="wb_tip_orange">월~토 7:30~21:00, 일 8:30~21:00 </span> (자습실 운영시간은 학원 운영 시간과 동일합니다.)<br />
                ▷ 데스크 운영 시간: <span class="wb_tip_orange"> 평일 8:30~18:00 </span><br />
                ▷ 사물함 등록/연장/반납, 교재구매, 수강환불 관련 업무시간 : <span class="wb_tip_orange"> 평일 8:30~18:00 </span><br />
                ▷ 연휴 당일은 건물 휴무로 운영되지 않습니다.<br />
                ▷ 기술직 강의는 남강빌딩에서 진행 됩니다.<br />
                </li>
                <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                ▷ TEST 프로그램은 일일, 월간 TEST가 제공됩니다.<br />
                ▷ DAILY, MONTHLY TEST 의 경우, 강사의 강의 계획에 따라 제공되지 않을 수 있습니다.<br />
                ▷ 전국모의고사는 2~3개월에 한번 진행 될 예정이나, 학원사정이나 시험 일정에 따라 기간이 변경될 수 있습니다.<br />
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
        let section02 = document.querySelector('.wb_cts08');
        let navBar = document.querySelector('nav');
        window.addEventListener('scroll', function(){
            // nav 아래로 스크롤시 nav 상단고정
            if ( window.pageYOffset > section02.offsetTop ) {
                navBar.classList.add('fixed');
            } else {
                navBar.classList.remove('fixed'); 
            }

            let tabs = $('.tab');
            let sections = $('section')
            sections.each( function(i,el){
                if(window.pageYOffset >= el.offsetTop && window.pageYOffset < el.offsetTop + el.offsetHeight){
                    tabs.eq(i).addClass('on');
                    tabs.eq(i).parent('li').siblings().children().removeClass('on');
                }
            })
        })
        
        function scrolling(target){
            $('html, body').stop().animate({scrollTop: $(target).offset().top});
        }
    </script>

    <script type="text/javascript">  
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
        var tab1_url = "https://www.youtube.com/embed/ipp-9NTYgXY?rel=0";
        var tab2_url = "https://www.youtube.com/embed/nQFyta6T3SM?rel=0";  
        var tab3_url = "https://www.youtube.com/embed/YitlBdAbtxU?rel=0";
        var tab4_url = "https://www.youtube.com/embed/swRWKKnOk8c?rel=0";  
        var tab5_url = "https://www.youtube.com/embed/IIokG25Sssg?rel=0";  
        var tab6_url = "https://www.youtube.com/embed/WDiAzplg_7k?rel=0";   
        
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

    </script>


@stop
