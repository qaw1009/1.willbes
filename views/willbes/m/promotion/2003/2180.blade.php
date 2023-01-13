@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
        .evtCtnsBox img {max-width:100%;}
        .evtCtnsBox .wrap {position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        .evt01 .slide_con {max-width:684px; margin:0 auto}
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
            background: #00ced1;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
            width: 30px;
        }

        .evt01 {padding-bottom:8vh;}        

        .evt03 {padding-bottom:10vh}
        .evt03 .title {font-size:3.4vh; color:#2d363d; line-height:1.4; margin:5vh 0}
        .evt03 .title strong {color:#e66f1f}
        .evt03 .lecwrap {font-size:1.6vh; line-height:1.4}
        .evt03 .lecbox {border:2px solid #454c54; background:#fff; padding:1.8vh; width:90%; margin:0 auto 2vh; text-align:left; position: relative; display:flex; justify-content: space-between;}
        .evt03 .lecbox:hover {box-shadow:10px 10px 10px rgba(0,0,0,.2); border:2px solid #f06524;}
        .evt03 .lecbox ul {width:70%; word-break:keep-all;}
        .evt03 .lecbox li {margin-bottom:0.5vh}
        .evt03 .lecbox li:nth-child(1) {font-size:2.2vh; color:#f06524; margin-bottom:1.5vh}
        .evt03 .lecbox li:nth-child(2) {font-size:1.6vh}
        .evt03 .lecbox li:nth-child(3) {font-weight:bold; font-size:1.8vh}
        .evt03 .lecbox p {font-size:2.6vh; margin-bottom:1vh}
        .evt03 .lecbox a {background:#30353b; color:#fff; padding:0.5vh; font-size:1.6vh; display:block; text-align:center; }
        .evt03 .lecbox a:hover {background:#f06524;}

        .check { width:100%; padding:20px 0px 40px 10px; letter-spacing:0;  }
        .check label {cursor:pointer; font-size:1.6vh;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check > a {display:block; width:80%; padding:10px 20px; background:#01ced3; color:#fff; margin:20px auto 0; border-radius:20px; font-size:2vh;font-weight:bold;}

        .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4; background:#f0f0f0 }
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal;}

        /* 폰 가로, 태블릿 세로*/
        @@media only screen and (max-width: 374px)  {

        }

        /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) {

        }

        /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {

        }
    </style>

    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2180m_top.jpg" alt="한덕현 t-PASS" >
                <a href="#lec" title="" style="position: absolute; left: 9.44%; top: 78.82%; width: 78.89%; height: 11.41%; z-index: 2;">asdfasdf</a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01.jpg" alt="공무원 영어, 자신 있나요?" >
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_03.jpg" alt=""/></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2180m_02.jpg" alt="영어 정복 노하우" >
        </div>

        <div class="evtCtnsBox evt03" id="lec">
            <div class="title">
                <strong class="NSK-Black">2023 ~ 2024</strong>년에도, 한덕현 영어는<br>
                <strong class="NSK-Black">오직 합격</strong>에 <strong  class="NSK-Black">최적화된 공시 영어</strong>를 선보입니다.
            </div>
            <div class="lecwrap">
                <div class="lecbox">
                    <ul>
                        <li class="NSK-Black">전과정 T-PASS</li>
                        <li>2023~2024 시험대비</li>
                        <li>전과정 무제한 수강</li>                        
                    </ul>
                    <div>
                        <p class="NSK-Black">75만원</p>
                        <a href="javascript:go_PassLecture('204673');">수강신청</a>
                    </div>
                </div>
                <div class="lecbox">
                    <ul>
                        <li class="NSK-Black">실전 I T-PASS</li> 
                        <li>2023 국가직/지방직 실전대비</li>
                        <li>실전464 / 독해기적 / 스나이퍼32 / 아작내기 /새벽모의고사</li>                                               
                    </ul>
                    <div>
                        <p class="NSK-Black">49만원</p>
                        <a href="javascript:go_PassLecture('201426');">수강신청</a>
                    </div>
                </div>
                <div class="lecbox">
                    <ul>
                        <li class="NSK-Black">실전 II T-PASS</li> 
                        <li>2023 국가직/지방직 실전대비</li>
                        <li>실전464/스나이퍼32 / 새벽모의고사</li>                                               
                    </ul>
                    <div>
                        <p class="NSK-Black">39만원</p>
                        <a href="javascript:go_PassLecture('202103');">수강신청</a>
                    </div>
                </div>
                <div class="lecbox">
                    <ul>
                        <li class="NSK-Black">새벽모고 T-PASS</li>  
                        <li>2023 국가직/지방직 실전대비</li>
                        <li>새벽모의고사 전과정</li>                                                
                    </ul>
                    <div>
                        <p class="NSK-Black">29만원</p>
                        <a href="javascript:go_PassLecture('201425');">수강신청</a>
                    </div>
                </div>
                <div class="lecbox">
                    <ul>
                        <li class="NSK-Black">반반똑똑 T-PASS</li> 
                        <li>2023 국가직/지방직 대비</li>
                        <li>반반똑똑 영어 전과정</li>                                               
                    </ul>
                    <div>
                        <p class="NSK-Black">25만원</p>
                        <a href="javascript:go_PassLecture('199952');">수강신청</a>
                    </div>
                </div>

            </div>
            <div class="check">
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#infoText">이용안내 확인하기 ↓</a>
            </div>  
        </div>

        <div class="evtCtnsBox evtFooter" id="infoText">
            <h3 class="NSK-Black">이용안내 및 유의사항</h3>
            <p>● 상품구성 </p>
            <ul>
                <li>제공과정<br>
                    - 전과정 T-PASS : 2024년 6월까지 진행되는 한덕현 영어 신규강좌 전 과정 (반반똑똑영어 다시보기, 새벽모의고사 포함)<br>
                    - 실전Ⅰ T-PASS : 2023대비 실전 464, 독해기적, 스나이퍼32, 아작내기 특강, 새벽모의고사 전과정<br>
                    &nbsp;&nbsp;[2022 과정 및 2023 신규과정(독해기적은 신규 촬영없이 지존과정 제공)]<br>
                    - 실전Ⅱ T-PASS : 2023대비 실전 464, 스나이퍼32, 새벽모의고사 전과정(2022 과정 및 2023 신규과정)<br>
                    - 새벽모고 T-PASS : 2023년 대비 신규과정(2022.9월~2023.5월) 제공되며 , 2022년 대비 과정 중 9-10월 과정만 제외 제공됩니다.<br>
                    - 반반똑똑 T-PASS : 2023년 대비 반반똑똑영어 방송 다시보기 전과정 제공됩니다.<br>
                    - 수강기간 : 2023년 대비 과정은 6.월까지, 2023~2024년 대비 24년 6월까지 입니다.<br>
                </li>
                <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
            </ul>

            <p>● 기기제한</p>
            <ul>
                <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br/>
                - PC 2대 or 모바일 2대 of PC 1대 + 모바일 1대(총 2대)
                <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최조 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며,
                그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>
            </ul>

            <p>● 수강안내</p>
            <ul>
                <li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li>
                <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>
                <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>
            </ul>

            <p>● 결제/환불</p>
            <ul>
                <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br/>
                - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)</li>
                <li>6월 한정 EVENT 상품으로 구매하신 경우, 이용한 내역에 따라 환불 시 차감 금액이 달라집니다.<br>
                        - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)<br>
                        - 1:1 온라인 첨삭 관리반 : 판매가 150,000원 공제<br>
                        - 교재 : 고객센터로 반송(환불) 의사를 먼저 밝혀주시고, 낙서 및 훼손 등 이상이 없어야합니다. (환불 시 배송료 회원 부담)<br>
                        (이미 사용한 교재의 경우, 판매가 공제 후 환불 예정)</li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
            </ul>

            <p>● 이용 문의 : 윌비스 고객만족센터 1544-5006</p>
        </div>  

    </div>

    <!-- End Container -->
    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                auto: true,
                speed: 500,
                pause: 4000,
                mode:'fade',
                autoControls: false,
                touchEnabled: true,
                controls:false,
                pager:true,
            });
        });

        {{-- 수강신청 동의 --}}
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>


@stop