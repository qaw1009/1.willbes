@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .sky {position:fixed; top:250px; right:10px; z-index:10;}
        .sky a {padding-bottom:15px; display:block}

        .wb_top_banner {background:#0A0A0A;}    
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1805_top_bg.jpg) no-repeat center top;}  

        .wb_branch {background:#fef51e;color:#000;position:relative;height:50px;} 
        .wb_branch .benefitBox {position:absolute; top:0; left:0; width:100%; z-index:1;line-height:50px;}
        .wb_branch .benefitBox .bx-wrapper{max-width:100% !important; z-index:1;}
        .wb_branch .benefitBox li {display:inline; float:left;font-size:15px;font-weight:bold;}

        .wb_03 {background:#fff;padding-bottom:150px;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:971px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-100px;top:46%; width:67px; height:67px;}

        .wb_04 {background:#66563f;} 

        /*유의사항*/
        .wb_ctsInfo {background:#fff; width:1000px; margin:100px auto; display:block; 
            border:17px solid #555; padding:80px; line-height:1.5;}  
        .wb_ctsInfo h3 {font-size:36px !important; letter-spacing:-1px; margin-bottom:40px; color:#000;}        
        .wb_ctsInfo .big {font-size:18px; font-weight:bold; color:#000; margin-bottom:10px} 
        .wb_ctsInfo ul {margin-bottom:30px}       
		.wb_ctsInfo li {list-style:disc; margin-left:20px}

    </style>

    <div class="evtContent NGR" id="evtContainer">
            
        <div class="sky">
            <a href="#none" onclick="javascript:certOpen()"><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_sky.png" title="집중소 인증하기" /></a>
        </div>

        <div class="evtCtnsBox wb_top_banner">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/zipzongso.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1805_top.jpg"  alt="" usemap="#Map1805a" border="0"  />
            <map name="Map1805a" id="Map1805a">
                <area shape="rect" coords="363,1205,753,1275" href="http://zipzoongso.cafe24.com" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_branch" id="golec">
            <div class="benefitBox">
                <ul class="slidesbenefit">
                    <li>[서울]목동1하임</li>
                    <li>[서울]목동2하임</li>
                    <li>[서울]목동3하임</li>
                    <li>[서울]신림1하임</li>
                    <li>[서울]신림2하임</li>
                    <li>[서울]신림3하임</li>
                    <li>[서울]신림4하임</li>
                    <li>[서울]중계1하임</li>
                    <li>[서울]중계2하임</li>                    
                    <li>[서울]하계1하임</li>
                    <li>[서울]대치1하임</li>
                    <li>[서울]당산1하임</li>
                    <li>[경기]김포1하임</li>
                    <li>[경기]광명1하임</li>
                    <li>[울산]옥동1하임</li>
                    <li>[충북]청주1하임</li>
                    <li>[대구]테그노폴리스1하임</li>
                    <li>[대구]범어1하임</li>
                    <li>[제주]제주1하임</li>
                </ul>
            </div> 
        </div>
        
        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1805_01.jpg"  alt=""  />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1805_02.jpg"  alt=""  />
        </div>


        <div class="evtCtnsBox wb_03 c_both">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1805_03.jpg"  alt=""  />
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_03_01.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_03_02.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_03_03.png" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_03_04.png" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1805_right.png"></a></p>
            </div>
        </div> 

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1805_04.jpg"  alt="" usemap="#Map1805b" border="0"  />
            <map name="Map1805b" id="Map1805b">
                <area shape="rect" coords="829,454,1018,527" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/172259" target="_blank" />
                <area shape="rect" coords="830,564,1018,639" href="https://police.willbes.net/periodPackage/show/cate/3002/pack/648001/prod-code/172264" target="_blank" />
                <area shape="rect" coords="830,678,1018,752" href="https://police.willbes.net/periodPackage/show/cate/3004/pack/648001/prod-code/172266" target="_blank" />
                <area shape="rect" coords="830,789,1018,863" href="https://police.willbes.net/periodPackage/show/cate/3003/pack/648001/prod-code/172265" target="_blank" />
            </map>
        </div> 

        <div class="wb_ctsInfo">
            <h3 class="NGEB">윌비스 신광은 경찰학원 1개월 PASS 이용안내</h3>
            <div class="big">상품 안내</div>
            <ul>
                <li>1개월 PASS는 집중소 독서실증 인증이 완료 된 후 관련 PASS 수강신청이 가능합니다. 상품 구매전  인증하기를 진행해주세요.</li> 
            </ul>
            <div class="big">상품 구성</div>
            <ul>
                <li>본상품은 일반/경행/해경/승진 각각 구성된 PASS 입니다.</li>                        
                <li>수강기간은 상품에 표시된 기간에 따라 구매일로 부터  30일 제공되며 결제가 완료되는 즉시 수강 가능합니다.</li>                                  
                <li>일부강좌는 경찰채용(일반공채)강좌와 동일한 강좌로 구성될 수있습니다.</li>			
            </ul>
            <div class="big">수강 관련</div>
            <ul>                  
                <li>먼저 내 강의실 메뉴에서 프리패스존로 접속합니다.</li>    					                 
                <li>구매하신 경찰승진PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후 수강하실 수 있습니다.</li>    					                   
                <li>1개월PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</li>    				                    
                <li>1개월PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    PC+Mobile 경찰승진PASS 수강 시 : PC 2대 또는 PC 1대 + 모바일 1대 또는 모바일2대 (PMP는 제공하지 않습니다.)
                </li>    				                    
                <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>    				                                 
   			</ul>
            <div class="big">교재 구매</div>
            <ul>
                <li>1개월PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다.</li> 
            </ul>
            <div class="big">환불 안내</div>
            <ul>
                <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li> 
                <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>
                <li>차감액이 결제 금액을 초과할 시 환불 불가합니다.</li>
            </ul>
            <div class="big">유의 사항</div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li> 
                <li>1개월 PASS 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
            </ul>
            <div class="big">※ 이용문의 : 고객만족센터 1544-5006</div>
        </div>
             
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        function certOpen() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($cert_apply) === false)
            alert("이미 인증이 완료된 상태입니다.");return;
            @endif
            @if(empty($arr_promotion_params) === false)
            var url = '{{ site_url('/certApply/index/page/'.$arr_promotion_params['page'].'/cert/'.$arr_promotion_params['cert']) }}';
            window.open(url,'cert_popup', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
            @endif
        }

        $(document).ready(function() {
            var BxBook = $('.slidesbenefit').bxSlider({
                slideWidth: 170,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft3").click(function (){
                    slidesImg3.goToPrevSlide();
                });
            
                $("#imgBannerRight3").click(function (){
                    slidesImg3.goToNextSlide();
                });
        });
    </script>

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop