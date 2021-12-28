@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2478_top_bg.jpg) no-repeat center;}     

        .wb_cts02 {background:#ecebf0;}

        .wb_cts03 {background:#17161b;}

        .wb_cts04 {background: linear-gradient( to right, #ba3baf, #a83cb5, #973dbb, #643fcc );}
        
        .wb_cts05 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2478_05_bg.jpg) no-repeat center;}

        .wb_cts06 {background:#ECECEC;}

        /* TAB */
        .tab {width:985px; margin:0 auto; bottom:120px;}		
        .tab li { float:left;padding-right:8px;}
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block;width:320px;height:100px;}
        .tab:after {content:""; display:block; clear:both}   

        .content_guide_wrap{min-width:1210px; margin:0 auto 50px; font-size:12px;padding-top:100px;}
        .content_guide_box{ position:relative; width:980px; margin:0 auto; padding:0 0 50px 0;}
        .content_guide_box .guide_tit{margin-bottom:20px;}
        .content_guide_box dl{ margin:0 ; word-break:keep-all;border:2px solid #e0e0e0;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:14px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}

        .sky {position:fixed;top:225px;right:10px;z-index:1;}       

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <div><a href="javascript:certOpen();"><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_sky.png" alt="현직경찰 인증하기"></a></div>
            <div style="margin-top:15px;"><a href="#apply_01"><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_sky2.png" alt="계급별 패스"></a></div>
            <div style="margin-top:15px;"><a href="#apply_02"><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_sky3.png" alt="교수별 패스"></a></div>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_top.jpg" alt="신광은 경찰 합격 패스" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_01.jpg" alt="교수진 소개" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_02.jpg" alt="경찰승진 패스를 말하다" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_03.jpg" alt="경찰승진 계급별 확인하기" />
        </div>

        <div class="evtCtnsBox wb_cts04" id="apply_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_04.jpg" alt="계급별 패스" />
            <ul class="tab">
                <li><a href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab01_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab01.png" class="on"  /></a></li>
                <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab02_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab02.png" class="on"  /></a></li>
                <li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab03_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab03.png" class="on"  /></a></li>
            </ul>
            <div id="tab1">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab01_apply.jpg" title="경장/경사/경위"/>
                    <a href="javascript:alert('Coming Soon!')" title="경장/경사/경위 승진대비" style="position: absolute;left: 74.01%;top: 13.08%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="경장/경사/경위 승진대비" style="position: absolute;left: 74.01%;top: 26.88%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="경장/경사/경위 승진대비" style="position: absolute;left: 74.01%;top: 41.08%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="경장/경사/경위 승진대비" style="position: absolute;left: 74.01%;top: 55.58%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="경장/경사/경위 승진대비" style="position: absolute;left: 74.01%;top: 69.78%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                </div>              
            </div>
            <div id="tab2">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab02_apply.jpg" title="경감"/>
                    <a href="javascript:alert('Coming Soon!')" title="경감 승진대비" style="position: absolute;left: 74.01%;top: 13.08%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="경감 승진대비" style="position: absolute;left: 74.01%;top: 26.88%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="경감 승진대비" style="position: absolute;left: 74.01%;top: 41.08%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="경감 승진대비" style="position: absolute;left: 74.01%;top: 55.58%;width: 14.93%;height: 8.08%;z-index: 2;"></a>
                </div>  
            </div>   
            <div id="tab3">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_tab03_apply.jpg" title="경정"/>
                    <a href="javascript:alert('Coming Soon!')" title="경정 승진대비" style="position: absolute;left: 74.01%;top: 13.08%;width: 14.93%;height: 8.08%;z-index: 2;"></a>                   
                </div>               
            </div>            
        </div>

        <div class="evtCtnsBox wb_cts05" id="apply_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_05.jpg" alt="교수별 패스" />
                <a href="javascript:alert('Coming Soon!')" title="신광은 형소법" style="position: absolute;left: 74.01%;top: 34.08%;width: 14.93%;height: 5.08%;z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="신광은 형법" style="position: absolute;left: 74.01%;top: 42.38%;width: 14.93%;height: 5.08%;z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="장정훈/오현웅 실무" style="position: absolute;left: 74.01%;top: 50.58%;width: 14.93%;height: 5.08%;z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="송광호 실무" style="position: absolute;left: 74.01%;top: 58.58%;width: 14.93%;height: 5.08%;z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="황남기 헌법" style="position: absolute;left: 74.01%;top: 67.01%;width: 14.93%;height: 5.08%;z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="김덕관 행정학" style="position: absolute;left: 74.01%;top: 75.08%;width: 14.93%;height: 5.08%;z-index: 2;"></a> 
            </div>   
        </div>

        <div class="evtCtnsBox wb_cts06">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2478_06.jpg" alt="인증방법 안내" />
        </div>

        <div class="content_guide_wrap NG">
            <div class="content_guide_box">               
                <dl>
                    <dt>
                        <h3>상품안내</h3>
                    </dt>
                    <dd>
                        <p>승진PASS는 현직경찰 인증이 완료 된 후 관련 PASS 수강신청이 가능합니다. 상품 구매전 상단 현직경찰 인증하기를 진행해주세요.</p>
                    </dd>
                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 2021년 승진시험대비로 계급별 , 교수님별 강좌로 제공합니다.</p>
                        <p>2. 수강기간은 상품에 표시된 기간에 따라 구매일로부터 2023년 1월 31일까지 제공되며 결제가 완료되는 즉시 수강 가능합니다.</p>
                        <p>3. 일부강좌는 경찰채용(일반공채)강좌와 동일한 강좌로 구성될 수있습니다.</p>                   
                        <p>4. 실무종합 강의일정은 2020년 5월 또는 6월 따로 공지됩니다.</p>
                        <p>5. 승진PASS는 강의 변경 불가 상품입니다.</p>                          
                    </dd>
                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <p>1. 먼저 내 강의실 메뉴에서 프리패스존로 접속합니다.</p>
                        <p>2. 구매하신 경찰승진PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후  수강하실 수 있습니다.</p>
                        <p>3. 경찰승진PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</p>
                        <p>4. 경찰승진PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.</p>
                        <p class="guide_txt_01"><strong>PC+Mobile 경찰승진PASS 수강 시</strong> : PC 2대 또는 PC 1대 + 모바일 1대 또는 모바일2대 (PMP 경찰승진PASS는 제공하지 않습니다.)</p>
                        <p>5. PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</p>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <p>경찰승진PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및  [교재구매] 메뉴에서 별도 구매 가능합니다. </p>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <p>1. 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</p>
                        <p>2. 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</p>
                        <p>3. 강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</p>
                        <p>4. 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</p>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <p>1. 본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</p>
                        <p>2. 경찰승진PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</p>
                        <p>3. 아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</p>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
             @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

         /*탭*/
         $(document).ready(function(){
        $('.tab').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        );

    </script>
@stop