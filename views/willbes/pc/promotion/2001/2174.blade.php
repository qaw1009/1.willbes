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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .sky {position:fixed;top:400px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}
       
        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2174_top_bg.jpg) no-repeat center top;} 
      
        .evt02 {background:#1355E7}    

        .evt03 , .evt04 , .evt05 , .evt06 {background:#f2fafa}

        .evt03s {background:#f2fafa}
        .evt03s .slide_con {width:784px; margin:0 auto; position:relative;}
        .evt03s .slide_con p {position:absolute; top:45%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evt03s .slide_con p.leftBtn {left:-60px}
        .evt03s .slide_con p.rightBtn {right:-60px}
        .evt03s .slide_con li {display:inline; float:left}
        .evt03s .slide_con li img {width:100%}
        .evt03s .slide_con ul:after {content::""; display:block; clear:both}

        .evt05 .youtube iframe {width:510px; height:295px;} 
        .evt05 .youtube {position:absolute; top:281px; left:51.45%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .evt05 .youtube.you02 {top:611px; margin-left:-85px;}
        .evt05 .youtube.you03 {top:940px;}   

        .evt07 {background:#343434}    

        .evt07 .check {width:840px; margin:0 auto; padding:50px 100px 100px; font-size:17px; color:#d8d8d8; text-align:left; letter-spacing:-1px;}
        .evt07 .check a {display:inline-block; padding:10px; color:#343434; background:#b8b8b8; margin-left:40px; border-radius:20px; font-size:12px}
        .evt07 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evt07 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}

        .evt08 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2174_08_bg.jpg) no-repeat center top;}     

    

        /*탭(이미지)*/
        .tabs{width:100%; text-align:center;background:#f2fafa}
        .tabs ul {width:915px;margin:0 auto;}		
        .tabs li {display:inline; float:left;padding-right:3px;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday div {font-size:22pt;color:#000; margin-top:10px;}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:12px; color:#999; margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul li:last-child span {display:block; margin-top:10px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        /*이용안내*/        
        .evtInfo {padding:100px 0;background:#ededed}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#3a3a3a;}
        .guide_box dt{margin-bottom:10px; display:inline-block;font-weight:bold; font-size:17px; border-radius:30px;color:#3a3a3a;font-size:25px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;color:#3a3a3a;font-size:15px}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" id="chk_price" name="chk_price" value="0"/>
    </form>

    <div class="evtContent NSK" id="evtContainer">      

        <div class="sky">
            <a href="#evt_apply"><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_sky1.png" alt="신광은"/></a>
            <a href="#evt_apply"><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_sky2.png" alt="장정훈"/></a>
            <a href="#evt_apply"><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_sky3.png" alt="김원욱"/></a>
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <div class="NSK-Black">2021 몰입 PASS</div>
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <span class="NSK-Black">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_top.jpg" alt="몰입 패스" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_01.jpg" alt="우리가 몰입해야 하는 이우" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_02.jpg" alt="선택형 패스" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_03.jpg" alt="전문 교수진" />          
        </div>

        <div class="evtCtnsBox evt03s">  
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_03_01.png" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_03_02.png" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_03_03.png" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_03_04.png" alt="4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_03_05.png" alt="5" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_03_06.png" alt="6" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/04/2174_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_04.jpg" alt="무제한 수강" />
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_05.jpg" alt="커리큘럼" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube you02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube you03">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_06.jpg" alt="응시쿠폰 지급" />
        </div>

         <div class="evtCtnsBox evt07">  
            <div>   
                <div class="tabs" id="evt_apply">                
                    <ul>
                        <li>
                            <a href="#tab01s" class="active">
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_tab1_on.png" class="on"/>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_tab1_off.png" class="off"/>
                            </a>
                        </li>
                        <li>
                            <a href="#tab02s">
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_tab2_on.png" class="on"/>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_tab2_off.png" class="off"/>
                            </a>
                        </li>
                        <li>
                            <a href="#tab03s">
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_tab3_on.png" class="on"/>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_tab3_off.png" class="off"/>
                            </a>
                        </li>
                    </ul>
                </div>

                <div id="tab01s">            
                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_07_01.jpg" alt=""> 
                    <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51160?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" title="신광은 홈 바로가기" target="_blank" style="position: absolute; left: 31.34%; top: 51%; width: 10.23%; height: 4.37%; z-index: 2;"></a>
                    <a href="javascript:go_PassLecture('181675');" title="신광은 수강 신청하기" style="position: absolute; left: 58.34%; top: 62%; width: 12.23%; height: 10.37%; z-index: 2;"></a>              
                </div> 

                <div id="tab02s">
                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_07_02.jpg" alt="">
                    <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51161?subject_idx=2128&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%2822%EB%85%84%EB%8C%80%EB%B9%84%29" title="장정훈 홈 바로가기" target="_blank" style="position: absolute; left: 31.34%; top: 51%; width: 10.23%; height: 4.37%; z-index: 2;"></a>
                    <a href="javascript:go_PassLecture('181676');" title="장정훈 수강 신청하기" style="position: absolute; left: 58.34%; top: 62%; width: 12.23%; height: 10.37%; z-index: 2;"></a>   
                </div>

                <div id="tab03s">
                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_07_03.jpg" alt="">
                    <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51146?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" title="김원욱 홈 바로가기" target="_blank" style="position: absolute; left: 31.34%; top: 51%; width: 10.23%; height: 4.37%; z-index: 2;"></a>
                    <a href="javascript:go_PassLecture('181677');" title="김원욱 수강 신청하기" style="position: absolute; left: 58.34%; top: 62%; width: 12.23%; height: 10.37%; z-index: 2;"></a>   
                </div>
            </div>    
            <div class="check">
                    <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk" style="padding-left:10px;">페이지 하단 몰입 T패스 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#refer">이용안내확인하기 ↓</a>
                <p>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                    ※ 한정 상품으로 할인쿠폰이 사용불가한 상품입니다.(소문내기 쿠폰제외)
                </p>
            </div>    
        </div>  

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2174_08.jpg" alt="할인쿠폰 받기&이미지 다운" />
            <a href="javascript:void(0);" title="할인쿠폰 받기" style="position: absolute; left: 39.34%; top: 45%; width: 21.23%; height: 4.37%; z-index: 2;"></a> 
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif"  title="몰입 티패스 이미지 다운받기" style="position: absolute; left: 34.34%; top: 63%; width: 18.23%; height: 3.37%; z-index: 2;"></a>
            <a href="http://cafe.daum.net/policeacademy" target="_blank" title="다음카페 경시모" style="position: absolute; left: 35.34%; top: 74%; width: 9.23%; height: 4.37%; z-index: 2;"></a>
            <a href="https://cafe.naver.com/polstudy" target="_blank" title="네이버 경꿈사" style="position: absolute; left: 47.34%; top: 74%; width: 9.23%; height: 4.37%; z-index: 2;"></a>
            <a href="https://cafe.naver.com/kts9719" target="_blank" title="네이버 닥공사" style="position: absolute; left: 59.34%; top: 74%; width: 9.23%; height: 4.37%; z-index: 2;"></a>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif
        </div>  

        <div class="evtCtnsBox evtInfo NGR" id="refer"> 
            <div class="guide_box" >
                <h2 class="NSK-Black" >몰입 T패스 이용안내</h2>
                <dl>
                    <dt>▶ 몰입 T패스</dt>
                    <dd>
                        <ol>
                            <li>구매일 기준 12개월 동안 수강 가능합니다. (365일)</li>
                            <li>T-PASS 강좌는 결제가 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>선택한 T-PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>상품기간 종료 시 수강 중이던 강좌가 모두 종료됩니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>▶ 상품구성</dt>
                    <dd>
                        <ol>
                            <li>신광은 형사법 몰입T패스: 신광은 교수님의 형사법(개편) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                            <li>장정훈 경찰학 몰입T패스: 장정훈 교수님의 경찰학(개편) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                            <li>김원욱 헌법 몰입T패스: 김원욱 교수님의 헌법(개편) 전 강좌를 무제한으로 수강할 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>▶ 교재 </dt>
                    <dd>
                        <ol>
                            <li>몰입T패스 수강에 필요한 교재는 별도로 구매 하셔야 하며, 각 강좌 별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>      
                        </ol>
                    </dd>

                    <dt>▶ 수강 안내</dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] → [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>강의는 순차 업로드 예정이며 업로드 일정은 강의 진행일정에 따라 변경될 수 있습니다.</li>
                            <li>몰입T패스는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>몰입T패스 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다. 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.  ([내강의실] → [무한PASS존]에서 등록기기정보 확인) 추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>▶ 환불정책 </dt>
                    <dd>
                        <ol>
                            <li>전액환불 : 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>부분환불 : 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분 만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, T-PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. (온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>교재 포인트를 사용했을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다. (교재 포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                        </ol>
                    </dd>

                    <dt>▶ 유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 부탁드립니다.</li>
                            <li>몰입T패스 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시에 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS관련 발급된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수될 수 있으며, 동일한 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>
                    <br>

                    <dt>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</dt>
                    
                </dl>
            </div>
		</div>

    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or ""}}');
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

         /*수강신청 동의*/ 
         function go_PassLecture(code){
            if($("input[name='is_chk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    

        /* 수강평 슬라이드 */

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
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

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop