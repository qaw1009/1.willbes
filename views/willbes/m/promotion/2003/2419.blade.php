@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}

        .wrap {position:relative;}
        .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /* 이용안내 */
        .evtInfo {padding:50px 0; background:#f4f4f4; color:#363636; line-height:1.5}
        .guide_box{padding:0 20px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dl{color:#555;font-size:15px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box span {color: #ca1919; vertical-align:top}
        .guide_box dd:last-child {margin:0}

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

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2419m_01.jpg" alt="한덕현 t-PASS" >
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2419m_02.jpg" alt="공무원 영어, 자신 있나요?" >
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2419m_03.jpg" alt="영어 정복 노하우" >
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2419m_04.jpg" alt="수강신청" >
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2419m_05.jpg" alt="수강신청" >
        </div>

        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 한림법학원 <span>온라인 T-PASS반</span> 이용안내</h2>
                <dl>
                    <dt>상품안내</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 2022년 7급공무원 1차시험(PSAT)을 준비하시는 분을 위해 준비되었습니다.<br>
                                [과목별 교수님] 자료해석 : 석치수, 상황판단 : 박준범, 언어논리(택1) : 이나우/한승아</li>
                            <li>수강기간 : 본 상품에 등록된 강의는 <span>강의신청일부터 240일 동안 수강</span>하실 수 있습니다.<br> 
                            ※ 패키지 과정은 특별할인 적용 상품으로, <span>일시중지/연장/재수강 적용되지 않으며 수강시작일 지정 불가</span>합니다.</li>
                            <li>강의배수  : 본 패키지 과정은 <span>3배수제한 적용 과정</span>입니다.</li>
                            <li><span>기기대수제한  : pc 2 또는 pc 1 + 모바일 기기 1</span>(스마트폰 또는 테블릿)</li>
                            <li>교재구매 : 수강중인 강의 > 강의보기 > 구매하지않은 교재 확인 후 결제 진행 하시면 됩니다.</li>
                            <li>CORE 특강 무료제공 : 신정하신 교수님의 <span>CORE특강이 자동 등록</span>됩니다.(자료해석 신청시 계산의 모든 것 특강 추가 무료제공)</li>
                            <li>진행(업로드) 강좌 순차 업로드 :<br> 
                            OPEN CLASS(기본, 21년 업로드), ADVANCED CLASS(심화, 22년 1~2월),   MASTER CLASS(실전모강, 22년 4~5월), 5급공채 9개년 기출해설 특강(업로드), Rescue 특강(21년 11~12월, 과목별 4회), Special 특강(22년 5~6월, 과목별 2회)이 순차적으로 업로드 될 예정입니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>                          
                        </ol>
                    </dd>

                    <dt>PASS 수강</dt>
                    <dd>
                        <ol>
                            <li>로그인 후 <span>[내강의실] 에서 [무한PASS존]</span>으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 <span>[강좌추가]</span>를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>          
                        </ol>
                    </dd>

                    <dt>교재</dt>
                    <dd>
                        <ol>
                            <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>          
                        </ol>
                    </dd>

                    <dt>환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 온라인 T-PASS반 결제가 기준으로 
                            계산하여 사용일수만큼 차감 후 환불됩니다.(환불시 CORE 특강 수강료도 정가기준 수강부분만큼 차감 후 환불됩니다.)</li>
                        </ol>
                    </dd>
                
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>온라인 T-PASS 반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며,  이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 온라인 T-PASS 반은 즉시 정지,  회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>                      
                        </ol>
                    </dd>
                </dl>
            </div>
        </div> 

    </div>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop