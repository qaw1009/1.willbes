@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2354_top_bg.jpg) no-repeat center top;}
        .wb_cts03 {background:#2f2250;}


        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2354_top.jpg" alt="윌비스 T-pass"  data-aos="fade-left" />
                <a href="#wb_cts02" title="자세히보기" style="position: absolute; left: 31.43%; top: 86.97%; width: 12.59%; height: 3.45%; z-index: 2;"></a>
            </div>           
        </div>

        <div class="evtCtnsBox wb_cts01"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2354_01.jpg" alt="같은과목을 공부해도, 어떻게 공부하냐에 따라 점수는 천차만별!" data-aos="fade-left" />           
        </div>
        <div class="evtCtnsBox wb_cts02" id="wb_cts02">
            <img  src="https://static.willbes.net/public/images/promotion/2021/09/2354_02.jpg" alt="실강 개강 일정에 맞추어 실시간 업데이트 되는 커리큘럼" data-aos="fade-left"/>        
        </div>       

        <div class="evtCtnsBox wb_cts03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2354_03.jpg" alt="원하는 교수님의 커리큘럼 무제한 수강!"  data-aos="fade-left"/>    
                <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/185704" title="국어 오대혁" target="_blank" style="position: absolute; left: 10.98%; top: 32.35%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2180" title="영어 한덕현" target="_blank" style="position: absolute; left: 56.61%; top: 32.38%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2207" title="영어 선석" target="_blank" style="position: absolute; left: 11.07%; top: 46.27%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/185705" title="한국사 김상범"  target="_blank" style="position: absolute; left: 56.52%; top: 46.27%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1392" title="한국사 오태진" target="_blank" style="position: absolute; left: 10.8%; top: 60.15%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/185706" title="신기훈 행정법" target="_blank" style="position: absolute; left: 56.52%; top: 60.08%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1077" title="행정법/헌법 황남기" target="_blank" style="position: absolute; left: 10.8%; top: 73.96%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2184" title="행정학 김덕관" target="_blank" style="position: absolute; left: 56.52%; top: 74%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/185707" title="행정학 김철" target="_blank"  style="position: absolute; left: 10.71%; top: 87.8%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2283" title="함다올 교정학" target="_blank" style="position: absolute; left: 56.43%; top: 87.88%; width: 17.41%; height: 2.1%; z-index: 2;"></a>
             </div>   
        </div>



        <div class="evtCtnsBox wb_info" id="careful">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>교수별 제공되는 커리큘럼은 상이할 수 있으니 각 T-PASS의 수강 기능 과목을 확인 후 신청해주시기 바랍니다.</li>
                            <li>수강기간은 각 교수님의 T-PASS마다 상이하니 구매전 수강기간을 확인해 주시기 바랍니다.</li>
                            <li>할인쿠폰은 본 페이지 내에 있는 T-PASS 구매 시에만 발급되며, 구매 즉시 내강의실에 자동 지급처리됩니다.</li>
                            <li>발급받으신 할인쿠폰은 동일한 T-PASS 상품이 아닌 다른 T-PASS를 구매하시는 경우 사용 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>교재안내</dt>
                    <dd>
                        <ol>
                            <li>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 강좌 소개 및 홈페이지 상단의 [교재구매] 메뉴에서 별도로 구매 가능합니다.</li>
                            <li>본 상품 이용 시 일시정지/연장/재수강은 제공되지 않습니다.</li>
                        </ol>
                    </dd>

                    <dt>기기제한</dt>
                    <dd>
                        <ol>
                            <li>PC/모바일 기기 대수 PC 2대 or 모바일 2대 or PC 1대 + 모바일 1대(총 2대)</li>
                        </ol>
                    </dd>            

                    <dt>수강안내</dt>
                    <dd>
                        <ol>
                            <li>본 상품 이용 시 일시정지/연장/재수강이 불가합니다.</li>
                            <li>[내강의실] - [무한PASS존]에 접속하여 상품명 옆의 [강좌추가] 버튼을 클릭하여 수강할 수 있습니다.</li>
                            <li>PC/모바일 기기변경 시, 최초 1회 직접 변경 가능하며, 이후 특별한 사유에 의한 기기 변경 요청은 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>결제/환불</dt>
                    <dd>
                        <ol>
                            <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                            <li>강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                            <li>본 상품은 특별 기획 강좌로 환불 시에는 수강하신 상품의 정가를 기준으로 이용기간을 공제하고 환불됩니다.<br>
                                - (강좌 정상가의 1일 이용대금×이용일수)</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                        </ol>
                    </dd>

             
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
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



    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop