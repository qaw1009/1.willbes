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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evt_wrap {width:1120px; margin:0 auto; position: relative;}
        br { font-family:dotum;}   

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2227_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#B29E5F}
        /*탭(이미지)*/
        .tabs{width:1025px;margin:0 auto;}
        .tabs ul {width:1120px;margin:0 auto;}		
        .tabs li {display:inline; float:left;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}
        .tabcts {background:#F2F2F2;}

        .wb_cts03 {background:#303132}
        /* 이용안내 */
        .wb_info {padding:100px 0;background:#2f353b}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#fff;}
        .guide_box dt{margin-bottom:10px; color:#fff;font-weight:bold; font-size:17px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;color:#fff;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#fff;} 

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_top.jpg" alt="불꽃소방 티패스" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01.jpg" alt="10% 할인쿠폰" />
            <div class="tabs"> 
                <ul>
                    <li>
                        <a href="#tab1" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab01.png" alt="" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab01_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2">
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab02.png" alt="" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab02_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3">
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab03.png" alt="" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab03_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4">
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab04.png" alt="" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab04_on.png" alt="" class="on"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab5">
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab05.png" alt="" class="off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_01_tab05_on.png" alt="" class="on"/>
                        </a>
                    </li>
                </ul>
            </div>    
            <div id="tab1" class="tabcts"> 
                <div class="evt_wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_tab_c1.jpg" alt=""/>
                    <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2196" target="_blank" title="이종오" style="position: absolute;left: 17.77%;top: 79%;width: 65.27%;height: 4.8%;z-index: 2;"></a>
                </div>
            </div>
            <div id="tab2" class="tabcts"> 
                <div class="evt_wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_tab_c2.jpg" alt=""/>
                    <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2199" target="_blank" title="이석준" style="position: absolute;left: 72.77%;top: 71%;width: 14.27%;height: 8.8%;z-index: 2;"></a>
                </div>     
            </div>
            <div id="tab3" class="tabcts">
                <div class="evt_wrap"> 
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_tab_c3.jpg" alt=""/>
                    <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2200" target="_blank" title="이아림" style="position: absolute;left: 72.77%;top: 71%;width: 14.27%;height: 8.8%;z-index: 2;"></a>
                </div>    
            </div>
            <div id="tab4" class="tabcts">
                <div class="evt_wrap"> 
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_tab_c4.jpg" alt=""/>
                    <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2201" target="_blank" title="한경준" style="position: absolute;left: 72.77%;top: 71%;width: 14.27%;height: 8.8%;z-index: 2;"></a>
                </div>    
            </div>
            <div id="tab5" class="tabcts">
                <div class="evt_wrap"> 
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2227_tab_c5.jpg" alt=""/>
                    <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2197" target="_blank" title="김종상" style="position: absolute;left: 17.77%;top: 79%;width: 65.27%;height: 4.8%;z-index: 2;"></a>
                </div>     
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="careful">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>제공과정 : 각 교수의 2021~2022 대비 과목별 전 과정</li>
                            <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                            <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                            <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>         
                    <dt>기기제한</dt>
                    <dd>
                        <ol>
                            <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                                - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                            </li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최초 1회에 한해 [내강의실]-[등록기기정보]에서 직접 초기화 가능하며,<br>
                                그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006이나 1:1상담게시판으로 문의바랍니다.                              
                            </li>
                        </ol>
                    </dd>     
                    <dt>수강안내</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
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
                                - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)
                            </li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                        </ol>
                    </dd>                                  
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">    
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

        $(document).ready(function(){
            $(".tabCts").hide(); 
            $(".tabCts:first").show();        
            $(".evttab ul li a").click(function(){             
                var activeTab = $(this).attr("href"); 
                $(".evttab ul li a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabCts").hide(); 
                $(activeTab).fadeIn();             
                return false; 
            });
        });       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop