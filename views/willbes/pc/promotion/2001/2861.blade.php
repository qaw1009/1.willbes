@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <style>
    @@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap');
    </style>
    <style type="text/css">

        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;
            font-size:14px;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/



        .sky {position:fixed;top:200px;right:10px; width:120px; z-index:1;}     
        .sky a {display:block; margin-bottom:10px}    

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2861_top_bg.jpg) no-repeat center top;}
        .wb_top span {position:absolute; left:50%; bottom:0; width:822px; margin-left:-100px; z-index: 2;}

        .wb_cts01 {background:#263140;}       

        .wb_cts02 {background:#d2d2d2;}

        .wb_cts03 {background:#f5f5f7; padding-bottom:200px}
        .wb_cts03 .wrap {width:980px}
        .passBox {display:flex; margin:30px auto; justify-content: space-between; flex-wrap: wrap;}
        .passBox .item {padding:30px 20px; background:#fff; border-radius:20px; text-align:left; line-height:1.3; font-size:24px; font-weight:bold; width:calc((100%/4) - 15px); color:#323232;
            position:relative; height:325px; letter-spacing:-1px;
            -webkit-box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.10);
            -moz-box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.10);
            box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.10);
        }
        .passBox .item.itemCS {background:#cecece url(https://static.willbes.net/public/images/promotion/2022/12/2861_03_cs.png) no-repeat center center;}
        .passBox .item p {color:#f46773; font-size:16px; margin-bottom:15px; }
        .passBox .item > strong {color:#a7a7a7}
        .passBox .item > span {font-size:16px; color:#a7a7a7; vertical-align: middle; display:inline-block;}
        .passBox .item div {position: absolute; bottom:65px;}
        .passBox .item div span {background:#e0474a; color:#fff; padding:4px 5px; line-height:1; vertical-align:bottom; margin-bottom:10px; display:inline-block; margin-right:10px; font-size:18px; } 
        .passBox .item div strong {font-size:50px; font-family: 'Oswald', sans-serif; color:#000}       
        .passBox .item a {position: absolute; bottom:22px; left:50%; width:134px; margin-left:-67px; z-index: 2; font-size:17px; color:#fff; background:#000; text-align:center;
        padding:7px 0; border-radius:20px}
        .passBox .item a:hover {color:#fff; background:#337c9f;}
        .passBox:nth-child(4) .item p {color:#30799a;}
        .passBox:nth-child(4) .item div span {background:#30799a;}

        .passBoxT .item {padding:0; height:295px; width:calc((100%/4) - 15px); margin-bottom:15px}

        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px; color:#ffe56e}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style-type: disc; margin-left:20px; margin-bottom:10px;}



    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="javascript:certOpen();"><img src="https://static.willbes.net/public/images/promotion/2022/12/2861_sky01.png" alt="현직경찰 인증하기"></a>
            <a href="#apply_01"><img src="https://static.willbes.net/public/images/promotion/2022/12/2861_sky02.png" alt="계급별 패스"></a>
            <a href="#apply_02"><img src="https://static.willbes.net/public/images/promotion/2022/12/2861_sky03.png" alt="교수님 패스"></a>
        </div>          

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_top.jpg" alt="임종희 경찰 승진 패스" />
            <span data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/12/2861_top_img.png"></span>
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_01.jpg" alt="교수진 소개" />
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_02.jpg" alt="수험가이드" />
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_01.jpg" alt="경찰승진 계급별 pass" id="apply_01"/>
            <div class="wrap">    
                <div class="passBox">
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        임종희 형소법 <strong>&</strong><br>
                        임종희 형법<br>
                        <div><span>2과목</span><strong>70</strong>만원</div>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204319" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        임종희 형소법 <strong>&</strong><br>
                        문형석 형법<br>
                        <div><span>2과목</span><strong>70</strong>만원</div>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204320" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        임종희 형소법 <strong>&</strong><br>
                        오현웅 실무종합
                        <div><span>2과목</span><strong>70</strong>만원</div>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204321" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item itemCS"></div>
                </div>
                <div class="passBox">
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        문형석 형법 <strong>&</strong><br>
                        오현웅 실무종합<br>
                        <div><span>2과목</span><strong>70</strong>만원</div>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204314" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        김원욱 형법<strong>&</strong><br>
                        오현웅 실무종합<br>
                        <div><span>2과목</span><strong>70</strong>만원</div>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204317" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        임종희 형법 <strong>&</strong><br>
                        오현웅 실무종합<br>
                        <div><span>2과목</span><strong>70</strong>만원</div>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204294" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item itemCS"></div>
                </div>
                <div class="passBox">
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        임종희 형소법 <strong>&</strong><br>
                        임종희 형법 <strong>&</strong><br>
                        오현웅 실무종합
                        <div><span>3과목</span><strong>89</strong>만원</div> 
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204318" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        임종희 형소법 <strong>&</strong><br>
                        문형석 형법 <strong>&</strong><br>
                        오현웅 실무종합
                        <div><span>3과목</span><strong>89</strong>만원</div> 
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204295" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경장/경사/경위</p>
                        2024<br>
                        임종희 형소법 <strong>&</strong><br>
                        김원욱 형법 <strong>&</strong><br>
                        오현웅 실무종합
                        <div><span>3과목</span><strong>89</strong>만원</div> 
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204300" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item itemCS"></div>
                </div>
                <div class="passBox">
                    <div class="item">
                        <p>경감</p>
                        2024<br>
                        임종희 형법 <strong>&</strong><br>
                        유시완 행정법<span>(주관식)</span>
                        <div><span>2과목</span><strong>80</strong>만원</div> 
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204322" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경감</p>
                        2024<br>
                        문형석 형법 <strong>&</strong><br>
                        유시완 행정법<span>(주관식)</span>
                        <div><span>2과목</span><strong>80</strong>만원</div> 
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204323" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경감</p>
                        2024<br>
                        임종희 형법 <strong>&</strong><br>
                        오현웅 실무종합 <strong>&</strong><br>
                        유시완 행정법<span>(주관식)</span>
                        <div><span>3과목</span><strong>90</strong>만원</div> 
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204324" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <p>경감</p>
                        2024<br>
                        문형석 형법 <strong>&</strong><br>
                        오현웅 실무종합 <strong>&</strong><br>
                        유시완 행정법<span>(주관식)</span>
                        <div><span>3과목</span><strong>90</strong>만원</div> 
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204325" target="_blank">PASS 수강신청</a>
                    </div>
                </div>
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_02.jpg" alt="경찰승진 교수님 pass" id="apply_02"/>
            
            <div class="wrap">            
                <div class="passBox passBoxT">
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_t01.png" alt="임종희 형소법"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204326" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_t02.png" alt="임종희 형법"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204327" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_t03.png" alt="형법 문형석"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204328" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_t04.png" alt="형법 김원욱"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204329" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_t05.png" alt="실무종합 오현웅"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204330" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item itemCS">
                        
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_t06.png" alt="헌법 황남기"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204338" target="_blank">PASS 수강신청</a>
                    </div>
                    <div class="item">
                        <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_03_t07.png" alt="행정학 김철"/>
                        <a href="https://police.willbes.net/periodPackage/show/cate/3006/pack/648001/prod-code/204348" target="_blank">PASS 수강신청</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2861_04.jpg" alt="인증방법 안내" />
        </div>

        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">2024 경찰승진PASS 이용안내</h4>
				<div class="infoTit NSK-Black">상품안내</div>
				<ul>
                    <li>승진PASS는 현직경찰 인증이 완료 된 후 관련 PASS 수강신청이 가능합니다. 상품 구매전 상단 현직경찰 인증하기를 진행해주세요.</li>
				</ul>

                <div class="infoTit NSK-Black">상품구성</div>
				<ul>
                    <li>본 상품은 2024년 승진시험대비로 계급별 , 교수님별 강좌로 제공합니다.</li>
                    <li>수강기간은 상품에 표시된 기간에 따라 구매일로부터 2024년 1월 31일까지 제공되며 결제가 완료되는 즉시 수강 가능합니다.</li>
                    <li>일부강좌는 경찰채용(일반공채)강좌와 동일한 강좌로 구성될 수있습니다.</li>
                    <li>실무종합 강의일정은 2023년 5월 또는 6월 따로 공지됩니다.</li>
                    <li>승진PASS는 강의 변경 불가 상품입니다.</li>
				</ul>

                <div class="infoTit NSK-Black">수강관련</div>
                <ul>
                    <li>먼저 내 강의실 메뉴에서 프리패스존로 접속합니다.</li>
                    <li>구매하신 경찰승진PASS 상품명 옆의 [강좌 선택하기] 버튼을 클릭, 원하시는 강좌를 선택 등록 후 수강하실 수 있습니다.</li>
                    <li>경찰승진PASS 이용 중에는 일시정지 기능을 이용할 수 없습니다.</li>
                    <li>경찰승진PASS 강좌 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    PC+Mobile 경찰승진PASS 수강 시 : PC 2대 또는 PC 1대 + 모바일 1대 또는 모바일2대 (PMP 경찰승진PASS는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
				</ul>       
                
                <div class="infoTit NSK-Black">교재구매</div>
                <ul>
                    <li>경찰승진PASS는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
				</ul> 

                <div class="infoTit NSK-Black">환불 안내</div>
				<ul>
                    <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>수강시작일 (당일 포함)로부터 7일이 경과되면, 윌비스경찰 승진PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
				</ul>

                <div class="infoTit NSK-Black">유의사항</div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                    <li>경찰승진PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                </ul>
                <div class="infoTit NSK-Black">※ 이용문의 : 고객센터 1544-5006</div>
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