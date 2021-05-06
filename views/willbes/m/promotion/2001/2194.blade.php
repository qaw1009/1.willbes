@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}

        .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
        .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
        .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

        .evtTop {}
        .evtTop a {display:block; width:90%; margin:0 auto; background:#000; color:#fff; border-radius:30px; padding:10px 0; font-size:20px; font-weight:bold}

        .evt01 .slide_con {}
        .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
        .slide_con .bx-wrapper .bx-pager {
            width: auto;
            bottom: 15px;
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
        .evt02 .price {margin:20px 40px}
        .evt02 .price ul{margin-right:-10px}
        .evt02 .price li {display:inline-block; float:left; width:calc(50% - 10px); text-align:center; font-size:18px; font-weight:bold; color:#fff; background:#016bbf; border-radius:10px;
            padding:20px 10px; margin-bottom:10px; margin-right:10px; letter-spacing:-1px}
        .evt02 .price li label {display:block}
        .evt02 .price:after {content:''; display:block; clear:both}
        .evt02 .ext02txt {padding:0 20px;}
        .evt02 .ext02txt label {font-size:18px; font-weight:bold}
        .evt02 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt02 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle; margin-right:5px}
        .evt02 input:checked + label {color:#000}
        .evt02 .ext02txt ul {margin:10px 0 0 25px}
        .evt02 a {display:block; width:90%; margin:20px auto 0; background:#000; color:#fff; border-radius:30px; padding:10px 0; font-size:20px; font-weight:bold; text-align:center}

        .evt03 {background:#1a1a1a; padding-bottom:100px;}

        .video-container {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0 20px; height:0; overflow: hidden;}
        .video-container iframe,
        .video-container object,
        .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

        .evt09 {padding-bottom:25px;}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; margin:0 10; padding:30px 0 100px}
        .content_guide_wrap .guide_tit{text-align:center; font-size:26px; margin-bottom:30px}
        .content_guide_wrap .tabs li {display:inline; float:left; width:25%}
        .content_guide_wrap .tabs li a {display:block; text-align:center; padding:15px 0; font-size:16px; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box{border:2px solid #202020; border-top:0; padding-top:20px}
        .content_guide_box dl{word-break:keep-all; padding:10px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-weight:bold; margin-right:10px; font-size:120%}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px}
        .content_guide_box dd:after {content:""; display:block; clear:both}

        br { font-family:dotum;}

        /* 폰 가로, 태블릿 세로*/
        @@media only screen and (max-width: 374px)  {
            .dday {font-size:18px !important;}
            .dday a {padding:5px 10px;}
            .evt06 .slide_con {margin:0 10px; padding-bottom:40px}
            .content_guide_wrap .guide_tit{font-size:20px; margin-bottom:30px}
            .content_guide_wrap .tabs li a {font-size:14px !important; letter-spacing:-1px}
            .evt02 .price li {font-size:14px;}
            .slide_con .bx-wrapper .bx-pager {bottom:6px;}
            .slide_con .bx-wrapper .bx-pager.bx-default-pager a {width:10px;height:10px;}
            .evt01 {padding-bottom:25px;}
            .evt03 {padding-bottom:25px;}

        }

        /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) {
            .dday {font-size:18px !important;}
            .dday a {padding:5px 10px;}
            .evt02 .price li {font-size:16px;}
            .content_guide_wrap .tabs li a {font-size:15px !important; letter-spacing:-1px}
            .slide_con .bx-wrapper .bx-pager {bottom:6px;}
            .slide_con .bx-wrapper .bx-pager.bx-default-pager a {width:12px;height:12px;}
            .evt01 {padding-bottom:50px;}
            .evt03 {padding-bottom:50px;}

        }

        /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {
            .content_guide_wrap .tabs li a br {display:none}
            .evt02 .price li {font-size:17px;}
            .content_guide_wrap .tabs li a {font-size:16px !important; letter-spacing:-1px}
            .slide_con .bx-wrapper .bx-pager {bottom:6px;}
            .slide_con .bx-wrapper .bx-pager.bx-default-pager a {width:14px;height:14px;}
            .evt01 {padding-bottom:75px;}
            .evt03 {padding-bottom:75px;}

        }
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong class="NSK-Black">{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText"></span> </strong>
            <a href="#evt02">수강신청 ></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_top.jpg" alt="신광은경찰 PASS" >
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_01.png" alt="" >
            <div class="price">
                <ul>
                    <li><input type="radio" id="y_pkg1" name="y_pkg" value="182147" data-sale-price="1100000" onClick=""/> <label for="y_pkg1">110 만원<br>무제한 PASS</label></li>
                    <li><input type="radio" id="y_pkg2" name="y_pkg" value="182149" data-sale-price="770000" onClick=""/> <label for="y_pkg2">77 만원<br> 15개월 개편 PASS</label></li>
                    <li><input type="radio" id="y_pkg3" name="y_pkg" value="182150" data-sale-price="690000" onClick=""/> <label for="y_pkg3">69 만원<br> 11개월 개편 PASS</label></li>
                    <li><input type="radio" id="y_pkg4" name="y_pkg" value="182148" data-sale-price="550000" onClick=""/> <label for="y_pkg4">55 만원<br> 2021 PASS</label></li>
                </ul>
            </div>
            <div class="ext02txt">
                <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <ul>
                    <li>※ 강의공유, 콘텐츠 부정사용 적발 시,패스의 수강기간 갱신 및 환급이 불가합니다. </li>
                    <li>※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다. </li>
                    <li>※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강생관리]에서 확인 가능합니다. </li>
                    <li>※ 재수강 & 환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.</li>
                </ul>
            </div>
            <div><a href="javascript:void(0);" onclick="goCartNDirectPay('evt02', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">신광은경찰 PASS 신청하기 ></a></div>
        </div>

        <div class="evtCtnsBox evt04">
            <a href="https://police.willbes.net/support/qna/index" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/11/1864m_07.jpg" alt="재수강 쿠폰받기" ></a>
        </div>

        <div class="evtCtnsBox evt05">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/11/1864m_08.jpg" alt="환승 쿠폰받기" ></a>
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_02.jpg" alt="최정예 교수진" >
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1864m_05.jpg" alt="신광은경찰 PASS" >
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1864m_05_01.jpg" alt="95점 쾌거"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1864m_05_02.jpg" alt="상위 10% 성적달성"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/1864m_05_03.jpg" alt="꾸준한 고득점"/></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_03.jpg" alt="합격을 통한 검증한 기간" >
            <div class="slide_con">
                <ul id="slidesImg2">
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_01.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_02.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_03.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_04.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_05.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_06.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_07.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_08.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_09.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_10.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_11.jpg" alt="후기"/></a></li>
                    <li><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_06_12.jpg" alt="후기"/></a></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_04.jpg" alt="교수진" >
        </div>

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_05.jpg" alt="3법" >
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_06.jpg" alt="3법 전문" >
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_06s.jpg" alt="" >
            <div class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_03.jpg" alt="교수진" >
            <div class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2188m_04.jpg" alt="무제한 수강" >
            <div class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt10">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_07.jpg" alt="커리큘럼" >
        </div>

        <div class="evtCtnsBox evt11">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_08.jpg" alt="한능검 특강" >
        </div>

        <div class="evtCtnsBox evt12">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194m_09.jpg" alt="스폐셜 혜택" >
            <a href="javascript:void(0);" title="갓스물 인증하기" onclick="certOpen();" style="position: absolute; left: 24.19%; top: 50.11%; width: 51.75%; height: 3.75%; z-index: 2;"></a>
            <a href="javascript:void(0);" title="쿠폰 다운로드" onclick="giveCheck();" style="position: absolute; left: 59.19%; top: 84.05%; width: 28.75%; height: 2.75%; z-index: 2;"></a>
        </div>

        <div class="content_guide_wrap" id="tab">
            <p class="guide_tit NSK-Thin">윌비스 <span class="NSK-Black">신광은 경찰 PASS</span> 이용안내 </p>
            <ul class="tabs">
                <li><a href="#tab1">무제한<br> PASS</a></li>
                <li><a href="#tab2">15개월 개편<br> PASS</a></li>
                <li><a href="#tab3">11개월 개편<br> PASS</a></li>
                <li><a href="#tab4">2021<br> PASS</a></li>
            </ul>

            <!--합격보장-->
            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>무제한 PASS </h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 기본 수강기간(12개월) 내 불합격 인증 시 22년 2차까지 수강기간 연장되는 상품입니다.</li>
                            <li>본 상품은 일반경찰/경행경채, 기존과목/개편과목(일반경찰) 구분 없이 전 과정 수강 가능합니다.<br>
                                * 수강가능 교수진 ><br>
                                형사소송법/형사법/수사 : 신광은 교수님<br>
                                경찰학개론/경찰학(개편)/행정법 : 장정훈 교수님,<br>
                                형법/헌법 : 김원욱 교수님,<br>
                                영어/G-TELP : 하승민/김현정/김준기 교수님,<br>
                                한국사/한능검 : 원유철/오태진 교수님,<br>
                                실용글쓰기 : 박우찬 교수님
                            </li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>PASS 구매 시 관리자 확인 후 2022년 대비 기초입문서가 장바구니로 지급됩니다.<br/> (단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리)</li>
                            <li>지급되는 기초입문서는 장바구니에서 0원으로 교재 주문해야 합니다. (배송비 본인 부담)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강기간 연장</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>무제한 PASS는 갱신형 상품입니다. 시험 응시 후 불합격 인증하여야 수강기간이 갱신되며, 22년 2차 필기시험일까지 무료 연장됩니다.</li>
                            <li>수강기간 갱신이 필요한 경우 갱신 신청 기간 내에 직전 시험 불합격 증빙(응시표, 성적표)자료를 제출하셔야 합니다.</li>
                            <li>불합격 인증 시에 전과목 0점일 경우 수강기간 갱신은 불가능합니다.</li>
                            <li>시험 접수 후 시험에 응시하지 못한 경우 수강기간 갱신 불가합니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            <li>상품에 등록된 과목 이외의 다른 강의는 추가 제공되지 않습니다.</li>
                            <li>구매일로부터 12개월(365일)간 유료 수강 가능하며, 갱신 신청한 수강생에 한하여 22년 2차 필기시험일까지 무료 연장됩니다.</li>
                            <li>갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불대상이 아닙니다.</li>
                            <li>자세한 수강기간 갱신 방법은 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.
                                (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불대상이 아닙니다.</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)
                            </li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <!--0원-->
            <div class="content_guide_box" id="tab2">
                <dl>
                    <dt>
                        <h3>15개월 개편 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 15개월간 수강 가능합니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                                - 2021년 1차 대비 신광은 형사소송법 기본이론 (20년 9월)<br>
                                - 2021년 1차 대비 장정훈 경찰학개론 기본이론 (20년 12월)<br>
                                - 2021년 1차 대비 김원욱 형법 기본이론 (20년 11월)<br>
                                - 2021년 1차 대비 신광은 형사소송법 심화이론 + OX (20년 10월)<br>
                                - 2020년 2차 대비 장정훈 경찰학개론 심화이론 (20년 5월)<br>
                                - 2020년 2차 대비 김원욱 형법 기본서 판례 심화이론 (20년 5월)<br>
                                - 2021년 1차 대비 신광은 형법 심화이론 (20년 10월)<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다.<br>
                                * 수강가능 교수진 > <br>
                                형사법 : 신광은 교수님<br>
                                경찰학(개편) : 장정훈 교수님,<br>
                                헌법 : 김원욱 교수님
                            </li>
                            <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>PASS 구매 시 관리자 확인 후 2022년 대비 기초입문서가 장바구니로 지급됩니다.<br> (단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리)</li>
                            <li>지급되는 기초입문서는 장바구니에서 0원으로 교재 주문해야 합니다. (배송비 본인 부담)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강기간 연장</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>제공되는 수강기간 중 15개월은 정규 수강 기간이며, 이후 추가 제공되는 30일은 이벤트 수강 기간입니다.</li>
                            <li>이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(15개월)이 지나면 환불이 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여<br>
                                사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)
                            </li>
                            <li>이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(15개월)이 지나면 환불이 불가합니다.</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)
                            </li>
                            <li> PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>
                            <li> 일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <!--무제한-->
            <div class="content_guide_box" id="tab3">
                <dl>
                    <dt>
                        <h3>11개월 개편 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 11개월간 수강 가능합니다.</li>
                            <li>
                                본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                                - 2021년 1차 대비 신광은 형사소송법 기본이론 (20년 9월)<br>
                                - 2021년 1차 대비 장정훈 경찰학개론 기본이론 (20년 12월)<br>
                                - 2021년 1차 대비 김원욱 형법 기본이론 (20년 11월)<br>
                                - 2021년 1차 대비 신광은 형사소송법 심화이론 + OX (20년 10월)<br>
                                - 2020년 2차 대비 장정훈 경찰학개론 심화이론 (20년 5월)<br>
                                - 2020년 2차 대비 김원욱 형법 기본서 판례 심화이론 (20년 5월)<br>
                                - 2021년 1차 대비 신광은 형법 심화이론 (20년 10월)<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다. <br>
                                * 수강가능 교수진 > <br>
                                형사법 : 신광은 교수님<br>
                                경찰학(개편) : 장정훈 교수님,<br>
                                헌법 : 김원욱 교수님
                            </li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수 수강 할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>PASS 구매 시 관리자 확인 후 2022년 대비 기초입문서가 장바구니로 지급됩니다.<br> (단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리)</li>
                            <li>지급되는 기초입문서는 장바구니에서 0원으로 교재 주문해야 합니다. (배송비 본인 부담)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대
                            </li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <!--6개월-->
            <div class="content_guide_box" id="tab4">
                <dl>
                    <dt>
                        <h3>2021년 대비 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 21년 2차 시험일 8/21까지 수강 가능한 상품입니다.</li>
                            <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다.<br>
                                * 수강가능 교수진 ><br>
                                형사소송법/수시 : 신광은 교수님<br>
                                경찰학개론 : 장정훈 교수님,<br>
                                형법 : 김원욱 교수님,<br>
                                영어 : 하승민/김현정/김준기 교수님,<br>
                                한국사 : 원유철/오태진 교수님
                            </li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수 수강 할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은 경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매 하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)
                            </li>
                            <li> PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
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
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
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

        {{-- 쿠폰발급 --}}
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

        /* 팝업창 */
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
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