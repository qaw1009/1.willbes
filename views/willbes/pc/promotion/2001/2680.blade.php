@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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

        .skybanner {position:fixed; top:200px; width:120px; right:10px; z-index:10;}        
        .skybanner a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both; background:#0c1e2a; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto; display:flex; justify-content: center;}
        .newTopDday ul li {margin-right:5px; text-align:center; font-weight:600; color:#fff}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:center; padding-left:110px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}


        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2680_top_bg.jpg) no-repeat center;}
        .wb_top span {position:absolute; left:50%; z-index: 10;}
        .wb_top span.img01 {width:577px; margin-left:-480px; top:170px}
        .wb_top span.img02 {width:597px; margin-left:40px; top:100px}

        .wb_01 {background:#f5f5f7}     
        
        .wb_03 {background:#f6f9fe;}   

      
        .evtInfo {padding:80px 0; background:#626262; color:#fff; font-size:17px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.75}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px;color:#FDF300;}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {margin-bottom:10px; font-size:14px; list-style:decimal; margin-left:20px}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="skybanner" id="QuickMenu">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2022/05/2680_sky01.jpg" alt="파이널패스" ></a>
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2022/05/2680_sky02.jpg" alt="최대10만원할인" ></a>
            <a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/196772" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/05/2680_sky03.jpg" alt="5만원이벤트" ></a>
        </div>      

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>FINAL PASS<br>판매종료까지</li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>남았습니다.</li>
                </ul>
            </div>
        </div>  
        
        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680_top.jpg" alt="2022 파이널 패스" />
		</div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680_01.jpg" alt="파이널 패스 하나면 끝" />
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680_03.jpg"  alt="지텔프,한능컴 특강" />
		</div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up" id="evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2680_04.jpg"  alt="파이널 패스"/>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2602" target="_blank" title="신규가입" style="position: absolute; left: 12.5%; top: 79.52%; width: 24.91%; height: 10.75%; z-index: 2;"></a>
                <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강" style="position: absolute; left: 37.59%; top: 79.52%; width: 24.91%; height: 10.75%; z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="타학원 수강이력" style="position: absolute; left: 62.59%; top: 79.52%; width: 24.91%; height: 10.75%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">신광은 경찰팀 FINAL PASS 이용안내</h4>
				<div class="infoTit NSK-Black">강좌 기본</div>
				<ul>               
                    <li>본 상품은 구매일로부터 22년 2차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                    <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                    - 2022년 대비 형사법, 경찰학, 헌법 전 강좌<br>
                    - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>
                    *형사소송법/형사법 : 신광은 교수님<br>
                    *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                    *형법 : 신광은 교수님 / 김원욱 교수님<br>
                    *헌법 : 김원욱 교수님 / 이국령 교수님 / 문태환 교수님 / 신기훈 교수님<br>
                    *범죄학 : 박상민 교수님<br>
                    *G-TELP : 김준기 교수님<br>
                    *한능검 : 오태진 교수님</li>
                    <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 3배수로 수강할 수 있습니다.</li>
                    <li>각 강좌 별 3배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show?board_idx=250648&s_keyword=%EB%B0%B0%EC%88%98" target="_blank">배수 제한 공지 자세히 보기></a>)</li>
                    <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">교재</div>
                <ul>
                    <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>             

                <div class="infoTit NSK-Black">환불</div>
				<ul>
                    <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일 수 만큼 차감 후
                    환불됩니다.</li>
				</ul>

                <div class="infoTit NSK-Black">PASS 수강</div>
				<ul>
                    <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                    총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시
                    내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
				</ul>
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

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });

        /*수강신청 동의*/ 
        function go_PassLecture(){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            code = $('input[name="y_pkg"]:checked').val();
            if (typeof code == 'undefined' || code == '') {
                alert('강좌를 선택해 주세요.');
                return;
            }
            location.href = "{{ front_url('/periodPackage/show/cate/3007/pack/648001/prod-code/') }}" + code;
        } 
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop