@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px; width:130px; z-index:1;}     
        .sky a {display:block; margin-bottom:10px}  

        .evt00 {background:#0a0a0a}

        .wb_top span {position:absolute; left:50%; top:0; width:442px; z-index: 2;}

        .wb_cts01 {background:#121212;}
        

        .wb_cts02 {background:#272727;}

        .wb_cts03 {background:#f5f5f7; padding:200px 0}
        .wb_cts03 .wrap {width:980px}
        .passBox {display:flex; margin:30px auto; justify-content: space-between;}
        .passBox .item {padding:30px 20px; background:#fff; border-radius:20px; text-align:left; line-height:1.2; font-size:24px; font-weight:bold; width:calc((100%/4) - 15px);
            position:relative; height:325px; letter-spacing:-1px;
            -webkit-box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.10);
            -moz-box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.10);
            box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.10);
        }
        .passBox .item p {color:#f46773; font-size:17px; margin-bottom:30px}
        .passBox .item strong {color:#a7a7a7}
        .passBox .item span {font-size:17px; vertical-align:bottom}        
        .passBox .item a {position: absolute; bottom:30px; left:50%; width:130px; margin-left:-65px; z-index: 2; font-size:17px; color:#fff; background:#000; text-align:center;
        padding:7px 0; border-radius:20px}
        .passBox .item a:hover {color:#fff; background:#b988d8;}
        .passBox:nth-child(3) .item p {color:#bc6bfb;}
        .passBox:nth-child(4) .item p {color:#65b7e1;}

        .passBoxT .item {padding:0; height:285px; width:calc((100%/5) - 15px);}

        .content_guide_wrap {padding:200px 0; background:#dedede}
        .content_guide_box {width:1000px; margin:0 auto; background:#fff; }
        .content_guide_box .guide_tit{margin-bottom:20px;}
        .content_guide_box dl{word-break:keep-all; padding:30px;}
        .content_guide_box dt{margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:14px; font-weight:bold; margin-right:10px;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}



    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="javascript:certOpen();"><img src="https://static.willbes.net/public/images/promotion/2022/04/2478_sky01.png" alt="현직경찰 인증하기"></a>
            <a href="#apply_01"><img src="https://static.willbes.net/public/images/promotion/2022/04/2478_sky02.png" alt="계급별 패스"></a>
            <a href="#apply_02"><img src="https://static.willbes.net/public/images/promotion/2022/04/2478_sky03.png" alt="교수님 패스"></a>
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox wb_top" id="main" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_top.jpg" alt="신광은 경찰 승진 패스" />
            <span data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/04/2478_top_img.png"></span>
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_01.jpg" alt="교수진 소개" />
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_02.jpg" alt="수험가이드" />
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <div class="wrap">
                <div class="mb100">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_03_01.png" alt="경찰승진 계급별 pass" id="apply_01"/>
                </div>      
                <div class="passBox">
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2023<br>
                        신광은 형소법 <strong>&</strong><br>
                        신광은 형법<br>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189899" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2023<br>
                        신광은 형소법 <strong>&</strong><br>
                        장정훈 실무종합<br>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189900" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2023<br>
                        신광은 형법 <strong>&</strong><br>
                        장정훈 실무종합<br>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189901" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2023<br>
                        신광은 형소법 <strong>&</strong><br>
                        신광은 형법 <strong>&</strong><br>
                        장정훈 실무종합
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189902" target="_blank">PASS 수강신청</a>
                    </div>
                </div>
                <div class="passBox">
                    <div class="item">
                        <p>경감</p>
                        2023<br>
                        신광은 형법 <strong>&</strong><br>
                        장정훈/오현웅<br>
                        실무종합
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189904" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경감</p>
                        2023<br>
                        장정훈/오현웅 <br>
                        실무종합 <strong>&</strong><br>
                        유시완 행정법<span>(주관식)</span>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189905" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경감</p>
                        2023<br>
                        신광은 형법 <strong>&</strong><br>
                        유시완 행정법<span>(주관식)</span><br>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189906" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경감</p>
                        2023<br>
                        신광은 형법 <strong>&</strong><br>
                        장정훈/오현웅<br>
                        실무종합 <strong>&</strong><br>
                        유시완 행정법<span>(주관식)</span>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189907" target="_blank">PASS 수강신청</a>
                    </div>
                </div>
                <div class="passBox">
                    <div class="item">
                        <p>경정</p>
                        2023<br>
                        황남기 헌법 <strong>&</strong><br>
                        김덕관 행정학 <strong>&</strong><br>
                        정주형 형소법<span>(주관식)</span>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189908" target="_blank">PASS 수강신청</a>
                    </div>
                </div>

                <div class="mb100 mt150">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_03_02.png" alt="경찰승진 교수님 pass" id="apply_02"/>
                </div>                
                <div class="passBox passBoxT">
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_03_t1.png" alt="신광은 형소법"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189909" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_03_t2.png" alt="신광은 형법"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189910" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_03_t3.png" alt="실무종합"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189911" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_03_t4.png" alt="황남기 헌법"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189913" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_03_t5.png" alt="김덕관 행정학"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/189914" target="_blank">PASS 수강신청</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2478_04.jpg" alt="인증방법 안내" />
        </div>

        <div class="content_guide_wrap" data-aos="fade-up">
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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script>
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
             @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
@stop