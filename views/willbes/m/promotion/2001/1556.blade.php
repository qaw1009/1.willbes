@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    .evtTop {background:#023032; padding-bottom:80px}
    .evtTop a {display:block; width:90%; margin:0 auto; background:#000; color:#fff; border-radius:30px; padding:10px 0; font-size:20px; font-weight:bold}

    .evt01 .slide_con {}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: 40px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #d5c15e;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

    .evt02 {background:#ececec; padding-bottom:80px; text-align:left}  
    .evt02 .price {background:url(https://static.willbes.net/public/images/promotion/2020/07/1556m_02_bg.jpg) no-repeat center bottom; padding-bottom:50px;
        background-size: cover;}
    .evt02 .price li {display:inline; float:left; width:33.333333%; text-align:center; font-size:16px; font-weight:bold}
    .evt02 .price:after {content:''; display:block; clear:both}
    .evt02 .ext02txt {padding:0 20px;} 
    .evt02 .ext02txt label {font-size:18px; font-weight:bold}
    .evt02 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
    .evt02 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle; margin-right:5px}
    .evt02 input:checked + label {border-bottom:1px dashed #0d3692; color:#0d3692}
    .evt02 .ext02txt ul {margin:10px 0 0 25px}
    .evt02 a {display:block; width:90%; margin:20px auto 0; background:#000; color:#fff; border-radius:30px; padding:10px 0; font-size:20px; font-weight:bold; text-align:center}

    .evt06 {background:#1a1a1a;}
    .evt06 .slide_con {margin:0 40px}
    .evt06 .slide_con .bx-wrapper .bx-pager {     
        bottom: -30px;
    }

    .evt08 {background:#1a1a1a;padding-bottom:80px;}
    .evt08 .slide_con {}
    .evt08 .slide_con .bx-wrapper .bx-pager {     
        bottom: -30px;
    }

    /* 이용안내 */
    .content_guide_wrap{background:#fff; margin:0 10; padding:30px 0}
    .content_guide_wrap .guide_tit{text-align:center; font-size:26px; margin-bottom:30px}
    .content_guide_wrap .tabs li {display:inline; float:left; width:25%}
    .content_guide_wrap .tabs li a {display:block; text-align:center; padding:15px 5px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
    .content_guide_wrap .tabs li a:hover,
    .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
    .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
    .content_guide_box{border:2px solid #202020; border-top:0; padding-top:20px}
    .content_guide_box dl{word-break:keep-all; padding:10px}
    .content_guide_box dt{margin-bottom:10px}
    .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-weight:bold; margin-right:10px; font-size:120%}
    .content_guide_box dt img.btn{padding:2px 0 0 0}
    .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
    .content_guide_box dd strong {color:#555}
    .content_guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px}
    .content_guide_box .step {border:1px solid #c4c4c4; margin-top:10px; text-align:center; line-height:1.2; text-align:left}
    .content_guide_box .step h4 {color:#fff; font-size:18px; background:#c4c4c4; padding:10px}
    .content_guide_box .step h5 {font-size:18px; color:#333; font-weight:bold; margin-bottom:20px}
    .content_guide_box .step div {padding:20px; font-size:14px}
    .content_guide_box .step span {color:#fd4e3d; font-size:10px;}
    .content_guide_box dd:after {content:""; display:block; clear:both}

    /*레이어팝업*/
    .Pstyle {
        opacity: 0;
        display: none;
        position: relative;
        width: auto;
        background-color: #fff;
    }
    .b-close {
        position: absolute;
        right: 10px;
        top: 10px;
        padding: 5px;
        display: inline-block;
        cursor: pointer;
    }
    .Pstyle .content {height:auto; width:auto;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
        .evt06 .slide_con {margin:0 10px; padding-bottom:40px}  
        .content_guide_wrap .guide_tit{font-size:20px; margin-bottom:30px}
        .content_guide_wrap .tabs li a {font-size:120% !important;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .content_guide_wrap .tabs li a br {display:none}
    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox dday NSK-Thin">
        <strong class="NSK-Black">{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText"></span> </strong>
        <a href="#evt02">수강신청 ></a>
    </div>

    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_top.jpg" alt="신광은경찰 PASS" > 
        <div><a href="#evt02">신광은경찰 PASS 신청하기 ></a></div>
    </div> 
    
    <div class="evtCtnsBox evt01">
        <div class="slide_con">
            <ul id="slidesImg1">
                <li><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_01_01.jpg" alt="95점 쾌거"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_01_02.jpg" alt="상위 10% 성적달성"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_01_03.jpg" alt="꾸준한 고득점"/></li>
            </ul>
        </div> 
    </div> 
    
    <div class="evtCtnsBox evt02" id="evt02">        
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_02.jpg" alt="" > 
        <ul class="price">
            <li><input type="radio" id="y_pkg1" name="y_pkg" value="167005" onClick=""/> <label for="y_pkg1">6개월 패스</label><li>
            <li><input type="radio" id="y_pkg4_1" name="y_pkg" value="167006" onClick=""/> <label for="y_pkg4_1">10개월 패스</label></li>
            <li><input type="radio" id="y_pkg3_1" name="y_pkg" value="167007" onClick=""/> <label for="y_pkg3_1">14개월 패스</label> </li>
        </ul>
        <div class="ext02txt">
            <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
            <ul>
                <li>※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다. </li>
                <li>※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다. </li>
                <li>※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강생관리]에서 확인 가능합니다. </li>
            </ul>
        </div> 
        <div><a href="#none" onclick="goCartNDirectPay('evt02', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">신광은경찰 PASS 신청하기 ></a></div>
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_03.jpg" alt="20%할인" >       
    </div> 

    <div class="evtCtnsBox evt04">
        <a href="https://www.willbes.net/classroom/qna/index" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_04.jpg" alt="재수강 쿠폰받기" ></a>    </div>

    <div class="evtCtnsBox evt05">        
        <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_05.jpg" alt="환승 쿠폰받기" ></a>
    </div>

    <div class="evtCtnsBox evt06">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06.jpg" alt="" >
        <div class="slide_con">
            <ul id="slidesImg2">
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_01.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_02.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_03.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_04.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_05.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_06.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_07.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_08.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_09.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_10.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_11.jpg" alt="후기"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_12.jpg" alt="후기"/></a></li>
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox evt07">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_07.jpg" alt="" >      
    </div>  

    <div class="evtCtnsBox evt08">
        <div class="slide_con">
            <ul id="slidesImg3">
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_08_01.jpg" alt="영어"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_08_02.jpg" alt="실용글쓰기 박우찬"/></a></li>
                <li><a href=""><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_08_03.jpg" alt="실전모의고사"/></a></li>
            </ul>
        </div> 
    </div>

    <div class="evtCtnsBox evt09">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_09.jpg" alt="" >      
    </div> 

    <div class="content_guide_wrap" id="tab">
        <p class="guide_tit NSK-Thin">윌비스 <span class="NSK-Black">신광은 경찰 PASS</span> 이용안내 </p>
        <ul class="tabs">
            <li><a href="#tab1">6개월<br> PASS</a></li>
            <li><a href="#tab2">10개월<br> PASS</a></li>
            <li><a href="#tab3">14개월<br> PASS</a></li>
            <li><a href="#tab4">합격 환승<br> 이벤트</a></li>
        </ul>

        <!--6개월-->
        <div class="content_guide_box" id="tab1">
            <dl>
                <dt>
                    <h3>6개월 PASS</h3>
                </dt>
                <dd>
                    <ol>
                        <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.( <a class="tx-blue" href="javascript:go_popup()">수강가능 교수진 확인하기 ></a> )</li>
                        <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 <span class="tx-red">2배수</span> 수강 할 수 있습니다.</li>
                        <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. ( <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                        <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.(결제완료자에 한함)</li>
                    </ol>
                </dd>

                <dt>
                    <h3>PASS 수강</h3>
                </dt>
                <dd>
                    <ol>
                        <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                        <li>구매한 PASS 상품 선택 후 [강좌추가하기] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                        <li>신광은경찰PASS는 일시 정지 및 수강 연장이 불가합니다.</li>
                        <li>신광은경찰pass 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<Br>
                        총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대<Br>
                        (신광은경찰PASS PMP강의는 제공하지 않습니다.)</li>
                        <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 
                            다만 추후 초기화가 필요할 시 내용 확인 후 가능 하오니 고객센터로 문의주시기 바랍니다. ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)</li>
                        <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                    </ol>
                </dd>

                <dt>
                    <h3>교재</h3>
                </dt>
                <dd>
                    <ol>
                        <li>신광은경찰PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및  [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
                    </ol>
                </dd>

                <dt>
                    <h3>환불</h3>
                </dt>
                <dd>
                    <ol>
                        <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                        <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                        <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.
                            (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                        <li>강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.</li>
                    </ol>
                </dd>

                <dt>
                    <h3>유의사항</h3>
                </dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                        <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                        <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<Br>
                            이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                        <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                        <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                        <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                    </ol>
                </dd>
                <dd>
                    <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                </dd>
            </dl>
        </div>

        <!--10개월-->
        <div class="content_guide_box" id="tab2">
            <dl>
                <dt>
                    <h3>10개월 PASS</h3>
                </dt>
                <dd>
                    <ol>
                        <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.( <a class="tx-blue" href="javascript:go_popup()">수강가능 교수진 확인하기 ></a> )</li>
                        <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                        <li>신광은경찰PASS는 결제 완료 후 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                    </ol>
                </dd>

                <dt>
                    <h3>PASS 수강</h3>
                </dt>
                <dd>
                    <ol>
                        <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                        <li>구매한 PASS 상품 선택 후 [강좌추가하기] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                        <li>신광은경찰PASS는 일시 정지 및 수강 연장이 불가합니다.</li>
                        <li>신광은경찰pass 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<Br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대<Br>
                            (신광은경찰PASS PMP강의는 제공하지 않습니다.)</li>
                        <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. <Br>
                            다만 추후 초기화가 필요할 시 내용 확인 후 가능 하오니 고객센터로 문의주시기 바랍니다. ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)</li>
                        <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                    </ol>
                </dd>

                <dt>
                    <h3>교재</h3>
                </dt>
                <dd>
                    <ol>
                        <li>신광은경찰PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                    </ol>
                </dd>

                <dt>
                    <h3>환불</h3>
                </dt>
                <dd>
                    <ol>
                        <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                        <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                        <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.<br>
                            (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                        <li>강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.</li>
                    </ol>
                </dd>

                <dt>
                    <h3>유의사항</h3>
                </dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁 드립니다.</li>
                        <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                        <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.
                            이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                        <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                        <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                        <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                    </ol>
                </dd>
                <dd>
                    <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                </dd>
            </dl>
        </div>

        <!--14개월PASS-->
        <div class="content_guide_box" id="tab3">
            <dl>
                <dt>
                    <h3>14개월 PASS</h3>
                </dt>
                <dd>
                    <ol>
                        <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.( <a class="tx-blue" href="javascript:go_popup()">수강가능 교수진 확인하기 ></a> )</li>
                        <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                        <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다.(결제완료자에 한함)</li>
                        <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>
                    <h3>PASS 수강</h3>
                </dt>
                <dd>
                    <ol>
                        <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.
                        <li>구매한 PASS 상품 선택 후 [강좌추가하기] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                        <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                        <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대<br>
                        (신광은경찰PASS PMP강의는 제공하지 않습니다.)</li>
                        <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. <br>
                            다만 추후 초기화가 필요할 시 내용 확인 후 가능 하오니 고객센터로 문의주시기 바랍니다. ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)</li>
                        <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                    </ol>
                </dd>

                <dt>
                    <h3>교재</h3>
                </dt>
                <dd>
                    <ol>
                        <li>신광은경찰PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                    </ol>
                </dd>

                <dt>
                    <h3>환불</h3>
                </dt>
                <dd>
                    <ol>
                        <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                        <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                        <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.<Br>
                            (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                        <li>강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.</li>
                    </ol>
                </dd>
                <dt>
                    <h3>유의사항</h3>
                </dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁 드립니다.</li>
                        <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                        <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<br>
                            이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                        <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                        <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                        <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                    </ol>
                </dd>

                <dd>
                    <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                </dd>
            </dl>
        </div>

        <!--환승이벤트-->
        <div class="content_guide_box" id="tab4">
            <dl>
                <dt>
                    <h3>이벤트 참여방법 안내</h3>
                </dt>
                <dd>
                    <div class="step">
                        <h4>STEP 1</h4>
                        <div>
                            <h5>합격 환승이벤트 참여하기</h5>
                            로그인후 <strong>타사 수강생 인증</strong> 버튼 클릭 <br>
                            <br>
                            온/오프라인수강이력
                        </div>                            
                    </div>
                    <div class="step">
                        <h4>STEP 2</h4>
                        <div>
                            <h5>수강이력 캡쳐 이미지 첨부</h5>
                            타사 사이트에서 수강이력을 확인 할 수 있는 화면 캡쳐<br>
                            <br>
                            <span>* PASS 수강이력(단과강의 제외)</span>
                        </div>                            
                    </div>
                    <div class="step">
                        <h4>STEP 3</h4>
                        <div>
                            <h5>관리자 인증</h5>
                            관리자 인증 완료 시 수강생 휴대폰으로 SMS 개별알림
                        </div>                            
                    </div>
                    <div class="step">
                        <h4>STEP 4</h4>
                        <div>
                            <h5>PASS 구매</h5>
                            합격 환승 회원 전용 쿠폰으로 PASS 구매
                        </div>                            
                    </div>
                </dd>

                <dt>
                    <h3>혜택적용안내</h3>
                </dt>
                <dd>
                    <ol>
                        <li>환승 인증완료 시, 쿠폰 즉시 발급 (내강의실 쿠폰함)</li>
                        <li>쿠폰 사용기간: 발급일로부터 3일, 일반/경행 PASS 구매시에 사용가능</li>                            
                    </ol>
                </dd>

                <dt>
                    <h3>주의사항</h3>
                </dt>
                <dd>
                    <ol>
                        <li>ID당 1회만 참여 가능합니다.</li>
                        <li>인증 완료 처리는 신청 후, 24시간 이내에 처리 됩니다.<br/>
                        단, 주말 및 공휴일 인증건의 경우, 휴일 다음 날 22시 이전에 일괄 처리 됩니다.</li>
                        <li>정확하게 본인의 이름, 수강중인 강좌 수강내역, 결제내역을 캡쳐하여 업로드 해주셔야 인증이 완료됩니다.(경찰직렬에 한함)<br/>
                        (결제내역 인증 시, 수강자 이름과 결제 금액, 강좌명이 보여야 합니다.)</li>
                        <li>유료단과, 무료강의 및 0원 수강이력, PASS 수강종료 6개월이 넘은 경우는 환승제외 대상입니다.</li>
                        <li>2020년 5월 이후  구입한상품은 적용되지 않습니다.</li>
                        <li>본 이벤트는 이벤트에 참여한 당사자가 결제한 상품에 한합니다.<br/>
                        수강 내역 확인이 어려운 증빙서류를 첨부하거나 부정한 방법으로 이벤트에 참여 했을 경우 별도 통보 없이<br/>
                        즉시 제공된 혜택 회수 및 환불조치 됩니다.</li>
                        <li>본 혜택은 강좌에 한하며, 교재는 별도 구매 하셔야 합니다.</li>
                        <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                        <li>발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                    </ol>
                </dd>

                <dd>
                    <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                </dd>
            </dl>
        </div>
    </div>

    <!--레이어팝업-->
    <div id="popup" class="Pstyle">
        <span class="b-close">X</span>
        <div class="content">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1009_pop01.jpg" />
        </div>
    </div>
</div>

<!-- End Container -->
<script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
    });

    function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
    {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        var $regi_form = $('#' + ele_id);
        var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
        var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
        var params;

        if ($is_chk.length > 0) {
            if ($is_chk.is(':checked') === false) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
        }

        if ($prod_code.length < 1) {
            alert('강좌를 선택해 주세요.');
            return;
        }

        {{-- 장바구니 저장 기본 파라미터 --}}
            params = [
            { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
            { 'name' : '_method', 'value' : 'POST' },
            { 'name' : 'cart_type', 'value' : cart_type },
            { 'name' : 'learn_pattern', 'value' : learn_pattern },
            { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
        ];

        {{-- 선택된 상품코드 파라미터 --}}
        $prod_code.each(function() {
            params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
        });

        {{-- 장바구니 저장 URL로 전송 --}}
        formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
    }


    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg1").bxSlider({
            auto: true, 
            speed: 500, 
            pause: 4000, 
            mode:'fade', 
            autoControls: false, 
            controls:false,
            pager:true,
        });

        var slidesImg1 = $("#slidesImg2").bxSlider({
            auto: true, 
            speed: 500, 
            pause: 4000, 
            mode:'horizontal', 
            autoControls: false, 
            controls:false,
            pager:true,
        });

        var slidesImg1 = $("#slidesImg3").bxSlider({
            auto: true, 
            speed: 500, 
            pause: 4000, 
            mode:'horizontal', 
            autoControls: false, 
            controls:false,
            pager:true,
        });
    });

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
        if(url.indexOf("tab4") > -1){
            var activeTab = "#tab4";
            $(".tabsl li a").removeClass("active");
            $(".tabs li a[href='#tab4']").addClass("active");
            $(".tabContents").hide();
            $(activeTab).show();
            return false;
        }else{
            $(".tabs li a").removeClass("active");
            $(".tabs li a[href='#tab1']").addClass("active");
            $(".content_guide_box").hide();
            $(".content_guide_box:first").show();
        }
    });

    /*레이어팝업*/
    function go_popup() {
        $('#popup').bPopup();
    }
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