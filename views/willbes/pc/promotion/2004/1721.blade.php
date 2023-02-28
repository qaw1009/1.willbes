@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/     

        .sky {position:fixed;top:200px;right:10px; width:120px; z-index:1;}
        .sky a {display:block; margin-bottom:10px}

        .wb_top {background:#ffd0d6}
        .wb_cts01 {background:#343b6f;}
        .wb_cts01s {background:#fff8f2;}
        .wb_cts03 {padding-top:50px;}
        .wb_cts04 {background:#f4f4f4;padding-bottom:150px;}
        .wb_cts05 {background:#008ce5}
        .wb_cts05 span {position:absolute; top:400px; left:50%; margin-left:-700px; width:557px; z-index: 2; display: block;}


        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#f4f4f4;margin-top:50px;}
        .tabContaier ul{width:977px;margin:0 auto; height:75px; display:flex; justify-content: space-between;} 
        .tabContaier li {width:33.3333%; }
        .tabContaier li a{display:block; line-height:75px; color:#fff; background:#021f44; border-radius:13px 13px 0 0; border:3px solid #021f44; border-bottom:0;  font-size:25px; font-weight:bold;}
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
        .youtube_divide .preview_list_area .preview_list ul li .thum_box img {width:100%;transition:0.5s;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box {padding-left:10px;display:inline-block;width:123px;box-sizing:border-box;vertical-align: middle;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box p {font-size:13px;font-weight:400;line-height:18px;color:#000;margin-bottom: 2px;
                                                                            overflow:hidden;text-overflow:ellipsis;word-wrap:break-word;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box span {font-size:12px;font-weight:400;line-height:18px;color:#666;}

         /* tip */
        .wb_cts_notice {background:#f3f3f3; font-size:14px; padding:150px 0}
        .wb_tipBox {width:900px; margin:0 auto; text-align:left;}
        .wb_tipBox > strong {font-size:16px !important; font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-1px; margin:30px 0; color:#111}	
        .wb_tipBox ol li {margin-bottom:20px; line-height:1.4; list-style:decimal; margin-left:15px}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto; background:#fff}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {color:#c03011;}

        /*TAB_tip*/
        .tab02 {margin-bottom:20px; display:flex}
        .tab02 li {width:33.33333%;}
        .tab02 li a { display:block; text-align:center; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#f3f3f3; color:#000; border:1px solid #666; border-bottom:1px solid #f3f3f3; font-weight:bold; }
        .tab02 li:last-child a {margin:0}


    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU67LWc7Jqw7JiB&subject_idx=" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/1721_sky_title.png" alt="개강강의"></a>
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU67KCE6riw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/1721_sky1.png" alt="전기직"></a>
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU66rO17ZWZ&course_idx=" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/1721_sky3.png" alt="통신직"></a>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/07/1721_top.jpg" alt="역대급 성적상승"/>      
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/1721_01.jpg" alt="신청하기"/>
                <a href="https://cafe.daum.net/sharkchoi" target="_blank" title="카페" style="position: absolute;left: 13.46%;top: 73.99%;width: 14.23%;height: 9.57%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" title="단과강의" style="position: absolute;left: 43.46%;top: 73.99%;width: 14.23%;height: 9.57%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU6cGFzcw%3D%3D" target="_blank" title="t-pass" style="position: absolute;left: 72.96%;top: 73.99%;width: 14.23%;height: 9.57%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts01s" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_01_guide.jpg" alt="수험과목 안내"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
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
                                    <a href="#tab2">
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

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721_03.jpg" alt="믿고 따라만 오세요"/>
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/1721_04.jpg" alt="커리큘럼"/>
            <div class="tabContaier" id="apply">    
                <ul class="NSK-Black">    
                    <li><a href="#tab1" class="active">전기</a></li>                            
                    <li><a href="#tab2">무선/통신</a></li>      
                    <li><a href="#tab3">전자공학</a></li>      
                </ul>
            </div> 
            <div id="tab1" class="tabContents">   
                <img src="https://static.willbes.net/public/images/promotion/2022/07/1721_04_cts1.jpg" />
            </div>
            <div id="tab2" class="tabContents">    
                <img src="https://static.willbes.net/public/images/promotion/2022/07/1721_04_cts2.jpg" />                                     
            </div>  
            <div id="tab3" class="tabContents">    
                <img src="https://static.willbes.net/public/images/promotion/2022/07/1721_04_cts3.jpg" />                                     
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts05" id="t_pass_go" data-aos="fade-up">
            <span data-aos="flip-left" data-aos-duration="1500"><img src="https://static.willbes.net/public/images/promotion/2023/02/1721_05_img.png" /></span>
            <div id="tab01s" class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2023/02/1721_05.jpg" />
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU6MjIuMTE%3D" target="_blank" title="수강신청" style="position: absolute; left: 45.89%; top: 72.95%; width: 33.04%; height: 6.18%; z-index: 2;"></a>
            </div>

        </div>

        <div class="evtCtnsBox wb_cts_notice" data-aos="fade-up">
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
                        ▷ 총 교습 시간은 개강월로부터 종강월까지의 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br>
                        ▷ 환불 접수는 전화상담 후 진행 됩니다.<br>
                        ▷ 카드로 결제하신 경우 부분취소 가능하며, 현금/계좌이체로 결제하신 경우 수강생 본인 명의의 통장으로만 환불금 입금 처리됩니다.<br>
                        ▷ 환불 기준일은 실제 수강 여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.<br>
                        ▷ 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.<br>
                        ▷ 개강일이 지난 후에 강의 결제시, 지난 강의는 동영상으로 제공이 되며, 이후 강의 환불은 결제일과 상관없이 개강일을 기준으로 환불금이 산정됩니다.<br>
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
                    <li><strong>학원 운영시간</strong><br />
                    ▷ 기술직 강의는 남강빌딩에서 진행 됩니다.<br />
                    </li>
                    <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
                    ▷ 전국모의고사는 4~5회 진행 될 예정이나, 학원사정이나 시험 일정에 따라 기간이 변경될 수 있습니다.<br />
                    </li>
                    <li><strong>강의 수강</strong><br />
                    ▷ 수강 신청한 강의만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
                    ▷ 등록하신 강좌는 본인만 수강이 가능하며, 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다.<br />
                    ▷ 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다.<br />
                    ▷ 강의는 학원/강사 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다.
                    (폐강 시, 환불 규정에 의거 환불 처리됩니다.)<br />
                    ▷ 개인 사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다.<br />
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

    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

@stop
