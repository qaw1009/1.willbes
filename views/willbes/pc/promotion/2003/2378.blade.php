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
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:100px;right:10px ;width:131px; text-align:center; z-index:111;}    
        .sky a {display: block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/02/2378_top_bg.jpg) no-repeat center top; background-size:cover; height: 1240px;}
        .wb_top span {position: absolute; width:865px; top:900px; left:50%; margin-left:-432px; z-index: 2;}

        .wb_cts01 {background:#454c53;position:relative; padding-top:100px}
        .youtube iframe {width:945px; height:531px}

        .wb_cts03 {background:#a6a651;}
        .check {color:#000; font-size:15px;font-weight:bold; width:1000px; margin:30px auto 50px; text-align:center}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#ffff00; color:#000} 

        .wb_cts04 {padding-bottom:100px}        
        .wb_cts04 .sTitle {width:1120px; margin:0 auto; margin-top:100px; padding-bottom:20px; font-size:40px; font-weight:bold; text-align:left; color:#a6a651}

        /* 이용안내 */
        .wb_info {padding:100px 0; background:#f4f4f4}
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
        <div class="sky" id="QuickMenu">          
            <a href="#lecbuy01"><img src="https://static.willbes.net/public/images/promotion/2022/02/2378_sky01.jpg" alt="축산직 티패스" /></a>    
            {{--<a href="#lecbuy02"><img src="https://static.willbes.net/public/images/promotion/2022/02/2378_sky02.jpg" alt="축산직 패키지" /></a>--}}
            <a href="#lecbuy03"><img src="https://static.willbes.net/public/images/promotion/2022/02/2378_sky03.jpg" alt="축산직 단과" /></a>        
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">           
            <span data-aos="fade-right"><a href="#lecbuy01"><img src="https://static.willbes.net/public/images/promotion/2022/02/2378_top_img.jpg" alt="축산직 윤용범" /></a></span>
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">         
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/jcr0AKg9yVk?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>  
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2378_01.jpg" alt="유튜브" />
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2378_02.jpg" alt="q&a"/>        
        </div>    

        <div class="evtCtnsBox wb_cts03 pb50" data-aos="fade-up" id="lecbuy01">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2378_03_01.jpg" alt="" />  
            <div class="wrap">
                <a href="javascript:go_PassLecture('195584');" title="티패스">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2378_03_02.jpg" alt="티패스" />   
                </a>                
            </div>
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info" class="infotxt">이용안내확인하기 ↓</a>
            </div>
            {{--
            <div class="wrap" id="lecbuy02">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2378_03_03.jpg" alt="패키지" />   
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/186238" title="이론패키지" target="_blank" style="position: absolute; left: 16.52%; top: 62.79%; width: 27.32%; height: 8.99%; z-index: 2;"></a> 
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/187659" title="기출문제패키지" target="_blank" style="position: absolute; left: 55.63%; top: 62.79%; width: 27.32%; height: 8.99%; z-index: 2;"></a>
            </div>
            --}}
        </div>  
        
        <div class="evtCtnsBox wb_cts04" data-aos="fade-up" id="lecbuy03">
            <div class="sTitle NSK-Black">* 단과 수강신청</div>
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
                            - 2023 대비로 진행된 가축육종학/가축사양학 축산직 전문과목 신규 전 과정</li>
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
 
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    <script type="text/javascript"> 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
            @endif
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop