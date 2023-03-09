@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:100px; right:0; width:120px; text-align:center; z-index:10;}  
        .sky a {display: block; margin-bottom:-1px; font-size:16px; border-radius:10px 0 0 10px; background:#5300fe; color:#fff; padding:10px 0; border:1px solid #fff; border-right:0}
        .sky a:hover {background:#cfff00; color:#5300fe}
        .sky a span {font-size:12px; display:block}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2023/03/2354_top_bg.jpg) no-repeat center top;}
        .wb_top a {display: block; width:1112px; position: absolute; top:850px; left:50%; margin-left:-500px}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2022/02/2354_01_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:#5035c3 url(https://static.willbes.net/public/images/promotion/2022/02/2354_02_bg.jpg) no-repeat center top; padding:100px 0}
        .wb_cts02 .wrap {display:flex; flex-wrap: wrap; margin-top:30px; justify-content: space-between; width:1040px}
        .wb_cts02 a {display:inline-block; margin-bottom:30px}
        .wb_cts02 .wrap img {border-radius:30px}


        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:16px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 20px; font-weight:bold; font-size:18px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px; font-weight:bold;color:#000;} 

    </style>


    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">          
            <a href="#pass01"><span>국어</span>오대혁</a>    
            <a href="#pass02"><span>영어</span>한덕현</a>  
            <a href="#pass04"><span>한국사</span>김상범</a>  
            <a href="#pass05"><span>행정학</span>김 철</a>           
            <a href="#pass06"><span>행정법</span>임병주</a>   
            <a href="#pass07"><span>세무/회계</span>박창한/이윤호</a>         
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2354_top.jpg" alt="윌비스 T-pass" />                
            <a href="#wb_cts02"><img src="https://static.willbes.net/public/images/promotion/2023/03/2354_top_img.png" alt="윌비스 T-pass"  data-aos="fade-left" /></a>          
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2354_01.jpg" alt="같은과목을 공부해도, 어떻게 공부하냐에 따라 점수는 천차만별!"  />           
        </div> 

        <div class="evtCtnsBox wb_cts02" id="wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2354_02_title.png" alt="원하는 교수님의 커리큘럼 무제한 수강!"/> 
            <div class="wrap">
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2433" target="_blank" id="pass01"><img src="https://static.willbes.net/public/images/promotion/2022/05/2354_02_01.png" alt="국어 오대혁"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2180" target="_blank" id="pass02"><img src="https://static.willbes.net/public/images/promotion/2022/05/2354_02_02.png" alt="영어 한덕현"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2434" target="_blank" id="pass04"><img src="https://static.willbes.net/public/images/promotion/2022/05/2354_02_04.png" alt="한국사 김상범"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2346" target="_blank" id="pass05"><img src="https://static.willbes.net/public/images/promotion/2022/05/2354_02_05.png" alt="행정학 김철"></a>               
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2739" target="_blank" id="pass06"><img src="https://static.willbes.net/public/images/promotion/2022/09/2354_02_06.png" alt="행정법 임병주"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2707" target="_blank" id="pass07"><img src="https://static.willbes.net/public/images/promotion/2023/03/2354_02_08.jpg" alt="세무직 박창한/이윤호"></a>
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
 
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>



    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop