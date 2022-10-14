@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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

        .sky {position:fixed; top:200px; width:131px; text-align:center; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2739_top_bg.jpg) no-repeat center top; }
        .wb_02{background-color: #e1e1e1;}
        .wb_03 .youtube{position: absolute; top:66%; left:50%; transform: translateX(-50%); width:80%;}
        .wb_03 .embed-container{position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;}
        .wb_03 .embed-container iframe, .embed-container object, .embed-container embed{
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
        }

        .wb_04 {padding-bottom: 100px; width:1120px; margin:0 auto}
        .wb_04 h5 {text-align:left; font-size:36px; margin:50px 0 30px; color:#974fa3}

        .check {width:980px; margin:0 auto; padding:20px 0px 20px 10px; letter-spacing:3;}
        .check label {cursor:pointer; font-size:16px; font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}


        /* 이용안내 */
        .wb_info {padding:100px 0; background:#f4f4f4}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:16px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 20px; font-weight:bold; font-size:18px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt01"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2739_sky01.jpg" alt="티패스" >
            </a>   
            <a href="#evt02"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2739_sky02.jpg" alt="단과" >
            </a>
            <a href="#evt02"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2739_sky3.jpg" alt="1만원 이벤트" >
            </a>                   
        </div>

        <div class="evtCtnsBox wb_top"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_top.jpg" alt="행정법의 신"/>
        </div>

        <div class="evtCtnsBox wb_01"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_01.jpg" alt="수험생들을 멘붕에 빠뜨린 행정법!"/>
        </div>

        <div class="evtCtnsBox wb_02"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_02.jpg" alt="임병주 교수님과 함께면 가능합니다."/>

        </div>

        <div class="evtCtnsBox wb_03"  data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_03.jpg" alt="임병주 교수님과 만나면 더 쉬워집니다."/>
                <div class="youtube">
                    <div class="embed-container">
                        <iframe src="https://www.youtube.com/embed/Gp4IU7Ouykc?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="evtCtnsBox wb_04"  data-aos="fade-up" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2739_04.jpg" alt="임병주 교수님만 믿고 따라오세요!"/>
                
            <div><a href="javascript:go_PassLecture('200879');"><img src="https://static.willbes.net/public/images/promotion/2022/09/2739_05.jpg" alt="임병주 t-pass 수강신청"/></a></div>
   
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info">이용안내확인하기 ↓</a>
            </div>

            <h5 class="NSK-Black" id="evt02">📕 단과 수강신청</h5>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif

        </div>

        <div class="evtCtnsBox wb_info" id="info" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>제공과정<br>                                
                                - 2022~2023 대비로 진행되는 신규과정 포함 임병주 행정법 전 과정 제공</li>
                            <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                            <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                            <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>기기제한</dt>
                    <dd>
                        <ol>
                            <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                                - PC 2대 or 모바일 2대 of PC 1대 + 모바일 1대(총 2대)</li> 
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최조 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며, 그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>                           
                        </ol>
                    </dd>

                    <dt>수강안내</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li>
                            <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>
                            <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                            <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>
                        </ol>
                    </dd>  

                    <dt>결제/환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                            <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                            <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                            - 결제금액 : (강좌 정상가의 1일 이용대금X이용일수)</li>
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
        $(document).ready( function() {
            AOS.init();
        });

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }  
    </script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop