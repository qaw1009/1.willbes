@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}
        /*.wrap a {border:1px solid #000}*/

        .dday {font-size:24px !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
        .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
        .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:14px !important;}

        .evt01 .txtinfo {margin:10% 8%; padding:40px 20px 20px; border:1px solid #000; border-radius:10px; margin-bottom:50px; font-size:1.6vh; text-align:left}
        .evt01 .txtinfo p {background:#000; color:#fff; padding:10px 5px; border-radius:30px; margin-top:-60px; margin-bottom:20px; font-size:1.8vh; text-align:center}

        .evt01 {background:#f5f5f7; padding-bottom:50px}
        .evt01 .price {text-align:center; font-size:25px; font-weight:bold; color:#000; letter-spacing:-1px; position:absolute; bottom:7%; width:100%; z-index: 10;}
        .evt01 .price p {margin-bottom:20px}
        .evt01 .price p span {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
        @@keyframes upDown{
            from{color:#d53a44}
            50%{color:#533fd1}
            to{color:#d53a44}
        }
        @@-webkit-keyframes upDown{
            from{color:#d53a44}
            50%{color:#533fd1}
            to{color:#d53a44}
        }

        .evt_01 .price label {display:inline-block}
        .evt01 .price input:checked + label {color:blue}
        .evt01 .ext01txt {padding:20px; text-align:left}
        .evt01 .ext01txt label {font-size:20px; font-weight:bold;}
        .evt01 input[type="radio"] {height:20px; width:20px; vertical-align:middle}
        .evt01 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle; margin-right:5px}
        .evt01 .ext01txt input:checked + label {color:blue}
        .evt01 .ext01txt ul {margin:10px 0 0 25px;}

        .evt01_coupon .coupon_btn {margin:0 auto; background-color:rgba(255,255,255,0.1)}     
      
        .evt02 {background:#f6f6f6; padding-bottom:10%}
        /*탭(텍스트)*/     
        .tabContaier {background:#fff; border-radius:10px; margin:0 3%; box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.1); padding:15px}
        .tabContaier ul{display:flex;} 
        .tabContaier li {width:17%;} 
        .tabContaier li a{display:block; background:#e9e9e9; color:#a6a6a6; font-size:16px; padding:15px 0; margin-right:2px; line-height:1.2}
        .tabContaier li a.active {color:#fff; background:#cf9c5d;}
        .tabContaier li:last-child a {margin:0}

         /*유튜브*/
        .video-container {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
        .video-container iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

        .tabContaier .tabContents div {font-size:3.6vh; color:#000; font-weight:bold; margin-top:20px; text-align:left; position: relative;}
        .tabContaier .tabContents div > a {color:#cf9c5d; font-size:2vh; background:url("https://static.willbes.net/public/images/promotion/2022/03/2595_icon01.png") no-repeat right center; padding-right:25px}
        .tabContaier .tabContents div span {position: absolute; bottom:0px; right:0}
        .tabContaier .tabContents div span a {font-size:2vh; font-weight:bold; color:#fff; background:#000; border-radius:30px; padding: 2px 10px}
        .tabContaier .tabContents div span a:hover {background:#cf9c5d}

        .passgo {position:absolute; width:80%; height:60px; line-height:60px; bottom:-30px; left:50%; margin-left:-40%; z-index: 10;}
        .passgo a {display:block; border-radius:50px; color:#fff; background:#000; font-size:22px}

        /* 이용안내 */
        .content_guide_wrap{background:#f3f3f3; padding:100px 20px}
        .content_guide_wrap .guide_tit{text-align:left; font-size:26px; margin-bottom:30px}
        .content_guide_wrap .tabs {display:flex; justify-content: space-around;} 
        .content_guide_wrap .tabs li {width:50%;}
        .content_guide_wrap .tabs li a {display:block; text-align:center; padding:15px 0; font-size:16px; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box{border:2px solid #202020; border-top:0; padding-top:20px; background:#fff}
        .content_guide_box dl{word-break:keep-all; padding:10px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-weight:bold; margin-right:10px; font-size:120%}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px}
        .content_guide_box dd:after {content:""; display:block; clear:both}


        @@media only screen and (max-width: 374px)  {
            .dday {font-size:18px !important;}
            .dday a {padding:5px 10px;}
            .content_guide_wrap .guide_tit{font-size:20px; margin-bottom:30px}
            .content_guide_wrap .tabs li a {font-size:12px !important; letter-spacing:-1px}
            .evt01 .ext01txt label {font-size:14px;}
            .evt01 .price {font-size:16px;}

            .reviewWrap .reviewList {height:300px}
            .reviewWrap .reviewList div {height:220px;}
            .reviewList p {top:130px;;}

            .tabContaier li a{font-size:12px;}
            .tabContaier .tabContents div {font-size:20px;}
            .tabContaier .tabContents div a {font-size:14px;}
        }

        @@media only screen and (min-width: 375px) and (max-width: 640px) {
            .evt01 .price {font-size:20px;}
            .content_guide_wrap .guide_tit{font-size:24px;}
            .content_guide_wrap .tabs li a {font-size:15px !important; letter-spacing:-1px}
            .evt01_coupon .coupon_btn {position:absolute !important;top:8.55% !important;margin:0 auto; background-color:rgba(255,255,255,0.1);}            

            .reviewWrap .reviewList {height:300px }            
            .reviewWrap .reviewList div {height:220px; font-size:2vh;}
            
            .reviewList p {top:130px;}

            .tabContaier li a{font-size:12px;}
        }

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin" data-aos="fade-down">
            <strong>{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>
            <a href="#pass">신청하기 ></a>
        </div>  

        <div class="evtCtnsBox evt_top" data-aos="fade-up">         
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_top.jpg" alt="제주 여행 보내드리자" >                 
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up" id="evt01"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_01.jpg" alt="합격률을 높이는 전략"/>
            <div class="evt01_coupon" id="pass">
                <div class="p_re">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_02_01.jpg" alt="23년 2차 PASS 신청하기" > 
                    <div class="price NSK-Black">                       
                        <input type="radio" id="y_pkg1" name="y_pkg" value="199729" onClick=""/>
                        <label for="y_pkg1"> 23년 2차 PASS 신청하기</label>
                    </div>
                </div>
                <div class="p_re">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_02_02.jpg" alt="23년 1차 PASS 신청하기" > 
                    <div class="price NSK-Black">                       
                        <input type="radio" id="y_pkg2" name="y_pkg" value="199728" onClick=""/>
                        <label for="y_pkg2"> 23년 1차 PASS 신청하기</label>
                    </div>
                </div>
                <div class="p_re">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_02_03.jpg" alt="FINAL PASS 신청하기" >
                    <div class="price NSK-Black">                     
                        <input type="radio" id="y_pkg3" name="y_pkg" value="199727" onClick=""/>
                        <label for="y_pkg3"> FINAL PASS 신청하기</label>
                    </div>
                </div>
                <div class="ext01txt">
                    <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 윌비스 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                    <ul>
                        <li>※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.</li>
                        <li>※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.</li>
                        <li>※ 쿠폰은 PASS 결제 후 [내 강의실>결제관리>쿠폰/수강권 관리] 에서 확인 가능합니다.</li>
                        <li>※ 재수강&환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.</li>
                    </ul>
                </div>
            </div>
            
            <div data-aos="fade-up" class="p_re mt50">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_03.jpg" alt="할일받고 구매하자">
                <a href="https://police.willbes.net/m/support/qna/index/cate/3001?s_cate_code=3001&s_is_my_contents=1" target="_blank" title="재수강 쿠폰받기" style="position: absolute; left: 8.47%; top: 25.65%; width: 38.75%; height: 34.57%; z-index: 2;"></a>

                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="환승 쿠폰받기" style="position: absolute; left: 52.5%; top: 25.65%; width: 38.75%; height: 34.57%; z-index: 2;"></a>

                <a href="javascript:void(0);" onclick="goCartNDirectPay('evt01', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');" title="패스상품 신청하기" style="position: absolute; left: 6.39%; top: 74.57%; width: 86.53%; height: 24.57%; z-index: 2;"></a>
            </div> 
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_04.jpg" alt="제주도 여행권" >
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_05.jpg" alt="교수진" >
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_06.jpg" alt="3법 전문가 경찰팀" >
            <div class="tabContaier" id="apply">    
                <ul>
                    <li><a href="#tab4"  class="active">헌법<br> 이국령</a></li> 
                    <li><a href="#tab1">형사법<br> 신광은</a></li>                            
                    <li><a href="#tab2">경찰학<br> 장정훈</a></li>
                    <li><a href="#tab3">헌법<br> 김원욱</a></li>        
                    <li><a href="#tab5">헌법<br> 문태환</a></li>                   
                    <li><a href="#tab7">범죄학<br> 박상민</a></li>           
                </ul>
                <div id="tab4" class="tabContents">
                    <div class="wrap">                       
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <p class="NSK-Black">NEW 헌법 전문가 경찰 헌법 이국령 교수</p>
                            <a href="{{front_url('/professor/show/cate/3001/prof-idx/51259?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29')}}" target="_blank">헌법 이국령</a>
                            <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2583" target="_blank">적중 보기 ></a></span>
                        </div>
                    </div>                                 
                </div> 
                <div id="tab1" class="tabContents">
                    <div class="wrap">                     
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <p class="NSK-Black">형사법 공부방법 & 커리큘럼</p>
                            <a href="{{front_url('/professor/show/cate/3001/prof-idx/51160?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29')}}" target="_blank">형사법 신광은</a>
                            <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2593" target="_blank">적중 보기 ></a></span>
                        </div>
                    </div>                         
                </div>
                <div id="tab2" class="tabContents">
                    <div class="wrap">                       
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <p class="NSK-Black">경찰학 공부방법 & 커리큘럼</p>
                            <a href="{{front_url('/professor/show/cate/3001/prof-idx/51161?subject_idx=2128&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%2822%EB%85%84%EB%8C%80%EB%B9%84%29')}}" target="_blank">경찰학 장정훈</a>
                            <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2592" target="_blank">적중 보기 ></a></span>
                        </div>
                    </div>                         
                </div> 
                <div id="tab3" class="tabContents">
                    <div class="wrap">                      
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/UB91DCctYgU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <p class="NSK-Black">헌법 김원욱 기본이론 오리엔테이션</p>
                            <a href="{{front_url('/professor/show/cate/3001/prof-idx/51146?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29')}}" target="_blank">헌법 김원욱</a>
                            <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2594" target="_blank">적중 보기 ></a></span>
                        </div>>
                    </div>                               
                </div>               
                <div id="tab5" class="tabContents">
                    <div class="wrap"> 
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/WeOyg1YPDfw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <p class="NSK-Black">헌법 문태환 기본이론 오리엔테이션</p>
                            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51369?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">헌범 문태환</a>
                        </div>      
                    </div>                    
                </div>              
                <div id="tab7" class="tabContents">
                    <div class="wrap">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div>
                            <p class="NSK-Black">[범죄학OT] 범죄학의 혁명! 박상민으로 끝!</p>
                            <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51278?subject_idx=2178&subject_name=%EB%B2%94%EC%A3%84%ED%95%99%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">범죄학 박상민</a>
                        </div>   
                    </div>                       
                </div>                                 
            </div>           
        </div>
        
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_07.jpg" alt="커리큘럼" >
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_08.jpg" alt="한능검특강" >
        </div>

        <div class="evtCtnsBox wrap" data-aos="fade-up">
            <form id="add_apply_form" name="add_apply_form">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2718m_09.jpg" alt="교재 신청하기" >
                <a href="javascript:void(0);" title="교재 신청하기" onclick="fn_promotion_etc_submit();" style="position: absolute; left: 58.89%; top: 32.29%; width: 25%; height: 2.67%; z-index: 2;"></a>
                <a href="https://police.willbes.net/m/lecture/show/cate/3001/pattern/free/prod-code/180566" target="_blank" title="경찰학" style="position: absolute; left: 28.06%; top: 51.31%; width: 21.94%; height: 2.22%; z-index: 2;"></a>
                <a href="https://police.willbes.net/m/lecture/show/cate/3001/pattern/free/prod-code/180748" target="_blank" title="형사법" style="position: absolute; left: 50.28%; top: 51.31%; width: 21.94%; height: 2.22%; z-index: 2;"></a>
                <a href="https://police.willbes.net/m/lecture/show/cate/3001/pattern/free/prod-code/180567" target="_blank" title="헌법(김)" style="position: absolute;left: 16.94%; top: 53.53%; width: 21.94%; height: 2.22%; z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="헌법(이)" style="position: absolute; left: 39.03%; top: 53.53%;; width: 21.94%; height: 2.22%; z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="범죄학" style="position: absolute; left: 61.39%; top: 53.53%; width: 21.94%; height: 2.22%; z-index: 2;"></a>
            </form>
            <div class="passgo NSK-Black"><a href="#pass">FINAL PASS 신청 ↑</a></div>
        </div>

        <div class="content_guide_wrap" id="tab">
            <div class="wrap">
                <p class="guide_tit">윌비스 <span class="NSK-Black tx-blue">경찰 PASS </span> 이용안내 </p>
                <ul class="tabs">
                    <li><a href="#tab01" class="active">23년 2차 경찰 PASS</a></li>
                    <li><a href="#tab02">23년 1차 PASS</a></li>
                    <li><a href="#tab03">FINAL PASS</a></li>
                </ul>

                <div class="content_guide_box" id="tab01">
                    <dl>
                        <dt>
                            <h3>23년 2차 경찰 PASS</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 구매일로부터 23년 2차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                    - 2022년 대비 형사법, 경찰학, 헌법, 범죄학 전 강좌<br>
                                    - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>                                
                                    <div class="tx-blue">
                                        *형사소송법/형사법 : 신광은 교수님<br>
                                        *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                        *형법 : 김원욱 교수님 / 신광은 교수님<br>
                                        *헌법 : 김원욱 교수님 / 이국령 교수님 / 문태환 교수님<br>
                                        *범죄학 : 박상민 교수님<br>
                                        *G-TELP : 김준기 교수님<br>
                                        *한능검 : 오태진 교수님<br>
                                        <span class="tx-red">
                                            ① 22년 8월30일까지 촬영되는 신광은 경찰팀 과목별 모든 강좌<br>
                                            - 기본이론/심화이론/심화기출/문제풀이 1,2,3단계 +22년 1차 대비 전과목 특강 전부<br>
                                            ② 22년 9월 이후 윌비스 신규 강사진(이국령 헌법 포함 과목별 복수 강사진)의 전과목 신규 촬영 모든 강좌<br>
                                            위 모든 강좌를 수강기간동안(23년 2차 필기시험까지) 동시수강 및 무제한 반복 수강이 가능한 상품입니다.
                                        </span>
                                    </div>
                                </li>
                                <li>선택한 윌비스 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                                <li>윌비스 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>                              
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재 및 포인트</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>윌비스 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                                <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>                           
                            </ol>
                        </dd>

                        <dt>
                            <h3>최종합격 시 여행권 지급 안내</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>최종합격 인증 완료 시 부모님(2인) 2박 3일 제주도 여행권이 지급됩니다.<br>
                                    <span class="tx-red">※ 70만원 상당 / 제세공과금 22%는  윌비스 경찰이 부담합니다.</span></li>
                                <li>수강기간 내에 진행된 순경 공채 시험 최종합격 및 인증 자료를 제출하여야 여행권 지급 대상이 됩니다.<br>
                                    ※ 합격 인증 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                                <li>합격 인증은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다. (22년 2차 또는 23년 1차·2차 최종합격)</li>
                                <li>패스 수강 기간 내에 합격예측 서비스 1회 이상 참여 해주셔야 합니다.<br>
                                    (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야 합니다.)</li>
                                <li>패스 수강기간 내에 모든 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                                    (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)</li>
                                <li>합격 인증 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게만 여행권 지급이 가능합니다.<br>
                                - 제출 서류 (모든 제출 서류는 반드시 윌비스 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                                ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                                ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                                ③ 신분증 사본 : 여행권 지급 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                                ④ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                                ⑤ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                                ⑥ 윌비스 경찰 합격예측 서비스 & 모의고사 내역 : 시험 후 오픈되는 합격예측서비스 참여 인증 캡쳐 및 윌비스 경찰 모의고사 전체 응시 내역<br>
                                * 전국모의고사 및 빅매치 모의고사 중 온라인 경행경채 직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다.<br>
                                (* 학원 모의고사에 따라 진행)</li>
                                <li>최종합격자 발표일로부터 1개월 경과 후 요청 시에는 여행권 지급이 불가합니다.</li>
                                <li>자세한 신청 방법은 공지사항에서 확인 바랍니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 윌비스 경찰PASS 결제가 기준으로 계산하여 
                                사용일 수 만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                                <li>포인트를 사용하였을 경우 사용한 포인트 만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>PASS 수강</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                                <li>윌비스 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                                <li>윌비스 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                    필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                    (단,이벤트시 쿠폰사용가능)</li>
                                <li>윌비스 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dd>
                            <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                        </dd>
                    </dl>
                </div>

                <div class="content_guide_box" id="tab02">
                    <dl>
                        <dt>
                            <h3>23년 1차 PASS</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 구매일로부터 23년 1차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                    - 2022년 대비 형사법, 경찰학, 헌법, 범죄학 전 강좌<br>
                                    - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>                                
                                    <div class="tx-blue">
                                        * 형사소송법/형사법 : 신광은 교수님<br>
                                        * 경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                        * 형법 : 김원욱 교수님 / 신광은 교수님<br>
                                        * 헌법 : 김원욱 교수님 / 이국령 교수님 / 문태환 교수님<br>
                                        * 범죄학 : 박상민 교수님<br>
                                        * G-TELP : 김준기 교수님<br>
                                        * 한능검 : 오태진 교수님<br>
                                        <span class="tx-red">
                                        ① 22년 8월30일까지 촬영되는 신광은 경찰팀 과목별 모든 강좌<br>
                                        - 기본이론/심화이론/심화기출/문제풀이 1,2,3단계 +22년 1차 대비 전과목 특강 전부<br>
                                        ② 22년 9월 이후 윌비스 신규 강사진(이국령 헌법 포함 과목별 복수 강사진)의 전과목 신규 촬영 모든 강좌<br>
                                        위 모든 강좌를 수강기간동안(23년 1차 필기시험까지) 동시수강 및 무제한 반복 수강이 가능한 상품입니다.
                                        </span>
                                    </div>
                                </li>
                                <li>선택한 윌비스 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                                <li>윌비스 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재 및 포인트</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>윌비스 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                                <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>최종합격 시 여행권 지급 안내</h3>
                        </dt>
                        <dd>
                           <ol>
                                <li>최종합격 인증 완료 시 부모님(2인) 제주도 2박 3일 여행권이 지급됩니다.<br>
                                    <span class="tx-red">60만원 상당/ 제세공과금22%는 윌비스 경찰 부담합니다.</span></li>
                                <li>수강기간 내에 진행된 순경 공채 시험 최종합격 및 인증 자료를 제출하여야 여행권 지급 대상이 됩니다.<br>
                                ※ 합격 인증 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                                <li>합격 인증은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다. (22년 2차 또는 23년 1차 최종합격)</li>
                                <li>패스 수강 기간 내에 합격예측 서비스 1회 이상 참여 해주셔야 합니다.<br>
                                (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야 합니다.)</li>
                                <li>패스 수강기간 내에 모든 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                                (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)</li>
                                <li>합격 인증 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게만 여행권 지급이 가능합니다.<br>
                                - 제출 서류 (모든 제출 서류는 반드시 윌비스 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                                ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                                ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                                ③ 신분증 사본 : 여행권 지급 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                                ④ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                                ⑤ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                                ⑥ 윌비스 경찰 합격예측 서비스 & 모의고사 내역 : 시험 후 오픈되는 합격예측 서비스 참여 인증 캡쳐 및 윌비스 경찰 모의고사 전체 응시 내역<br>
                                * 전국모의고사 및 빅매치 모의고사 중 온라인 경행경채 직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다.<br>
                                (* 학원 모의고사에 따라 진행)</li>
                                <li>최종합격자 발표일로부터 1개월 경과 후 요청 시에는 여행권 지급이 불가합니다.</li>
                                <li>자세한 신청 방법은 공지사항에서 확인 바랍니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 윌비스 경찰PASS 결제가 기준으로 계산하여 
                                사용일 수 만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                                <li>포인트를 사용하였을 경우 사용한 포인트 만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>PASS 수강</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                                <li>윌비스 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                                <li>윌비스 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                    필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                    (단,이벤트시 쿠폰사용가능)</li>
                                <li>윌비스 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dd>
                            <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                        </dd>
                    </dl>
                </div>

                <div class="content_guide_box" id="tab03">
                    <dl>
                        <dt>
                            <h3>FINAL PASS</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 구매일로부터 22년 2차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학, 헌법 전 강좌<br>
                                - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>
                                    <div class="tx-blue">
                                    * 형사소송법/형사법 : 신광은 교수님<br>
                                    * 경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                    * 형법 : 신광은 교수님 / 김원욱 교수님<br>
                                    * 헌법 : 김원욱 교수님 / 이국령 교수님 / 문태환 교수님 / 신기훈 교수님<br>
                                    * 범죄학 : 박상민 교수님<br>
                                    * G-TELP : 김준기 교수님<br>
                                    * 한능검 : 오태진 교수님
                                    </div>
                                </li>
                                <li>선택한 윌비스 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 3배수로 수강할 수 있습니다.</li>
                                <li>각 강좌 별 3배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show?board_idx=250648&s_keyword=%EB%B0%B0%EC%88%98" target="_banlk" class="tx-blue">배수 제한 공지 자세히 보기></a>)</li>
                                <li>윌비스 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재 및 포인트</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>윌비스 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                                <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                                <li>포인트가 포함된 상품을 구매할 경우 익일 오전 일괄 지급됩니다. (금요일~일요일 구매 시 월요일 오전 일괄지급)</li>
                                <li>포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 윌비스 경찰PASS 결제가 기준으로 계산하여 
                                사용일 수 만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                                <li>포인트를 사용하였을 경우 사용한 포인트 만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>PASS 수강</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                                <li>윌비스 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                                <li>윌비스 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                    필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                    (단,이벤트시 쿠폰사용가능)</li>
                                <li>윌비스 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dd>
                            <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });

        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    $is_chk.focus();
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            // 장바구니 저장 기본 파라미터
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            // 선택된 상품코드 파라미터
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            //장바구니 저장 URL로 전송
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

        // 쿠폰발급
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        // 팝업창
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }


        // 무료 교재지급
        function fn_promotion_etc_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt === 0){
                alert('구매자가 아닙니다.');
                return;
            }

            @if(empty($arr_promotion_params['arr_prod_code']) === false && empty($arr_promotion_params['cart_prod_code']) === false)
                var $add_apply_form = $('#add_apply_form');
                var _url = '{!! front_url('/event/promotionEtcStore') !!}';

                if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
                ajaxSubmit($add_apply_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert( getApplyMsg(ret.ret_msg) );
                        location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    }
                }, function(ret, status, error_view) {
                    alert( getApplyMsg(ret.ret_msg) );
                }, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }


        /*tab*/
        $(document).ready(function(){
            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });

            var url = window.location.href;
            if(url.indexOf("tab3") > -1){
                var activeTab = "#tab3";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab03']").addClass("active");
                $(".tabContents").hide();
                $(activeTab).show();
                return false;
            }else{
                $(".tabs li a").removeClass("active");
                $(".tabs li a[href='#tab01']").addClass("active");
                $(".content_guide_box").hide();
                $(".content_guide_box:first").show();
            }
        });

        //교수 tab
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop