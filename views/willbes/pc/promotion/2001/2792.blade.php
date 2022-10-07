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

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px} 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/10/2792_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#e6e6e6}
        .evt02 {background:#203139;}
        .evt03 {background:#c4bbaa;}
        .evt04 {background:#0f181d; padding-bottom:150px}
        .evt04 ul {display:flex; justify-content: space-between; width:1030px; margin:0 auto}
        .evt04 ul .off {display:block}
        .evt04 ul .on {display:none}
        .evt04 ul a.active .off {display:none}
        .evt04 ul a.active .on {display:block;}
        .tabCts {position:relative}
        .tabCts .request {position:absolute; width:100%; bottom:30px; color:#000; text-align:center}
        .tabCts .request p {font-size:80px}
        .tabCts .request a {display:block; margin:10px auto 0; width:550px; color:#0f181d; background:#fad34c; font-size:30px; padding:15px 0; border-radius:50px; font-weight:bold}
        .tabCts .request a:hover {color:#fad34c; background:#0f181d;}

        .check {letter-spacing:3; color:#fff; margin-top:30px}
        .check label {cursor:pointer; font-size:16px; font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check p {margin-top:20px; font-size:14px; line-height:1.5}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:16px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:50px}
		.evtInfoBox li {margin-bottom:8px; list-style:demical; margin-left:20px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#special_lecture"><img src="https://static.willbes.net/public/images/promotion/2022/10/2792_sky.png" alt="형사법 신청"></a>          
        </div>  

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_top.jpg" alt=""/>          
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_01.jpg" alt="" />         
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_02.jpg" alt="" />   
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_03.jpg" alt="" />  
            </div> 
        </div>

        <div class="evtCtnsBox evt04" id="special_lecture" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04.jpg" alt="" />
            <ul class="tabs">
                <li>
                    <a href="#tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t01.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t01_on.jpg" alt="" class="on" />
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t02.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t02_on.jpg" alt="" class="on" />
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t03.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t03_on.jpg" alt="" class="on" />
                    </a>
                </li>
                <li>
                    <a href="#tab04">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t04.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t04_on.jpg" alt="" class="on" />
                    </a>
                </li>
                <li>
                    <a href="#tab05">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t05.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t05_on.jpg" alt="" class="on" />
                    </a>
                </li>
                <li>
                    <a href="#tab06">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t06.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t06_on.jpg" alt="" class="on" />
                    </a>
                </li>
                <li>
                    <a href="#tab07">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t07.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t07_on.jpg" alt="" class="on" />
                    </a>
                </li>
                <li>
                    <a href="#tab08">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t08.jpg" alt="" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_t08_on.jpg" alt="" class="on" />
                    </a>
                </li>
            </ul>

            <div>
                <div class="tabCts" id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p01.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">27</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201461" onclick="go_PassLecture(this)">이국령 헌법 T-PASS 신청하기 👉</a>
                    </div>
                </div>
                <div class="tabCts" id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p02.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">27</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201689" onclick="go_PassLecture(this)">서영교 형소법 T-PASS 신청하기 👉</a>
                    </div>
                </div>
                <div class="tabCts" id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p03.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">29</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201532" onclick="go_PassLecture(this)">문형석 형법 T-PASS 신청하기 👉</a>
                    </div>
                </div>
                <div class="tabCts" id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p04.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">27</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201691" onclick="go_PassLecture(this)">선동주 헌법 T-PASS 신청하기 👉</a>
                    </div>
                </div>
                <div class="tabCts" id="tab05">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p05.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">27</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201686" onclick="go_PassLecture(this)">정진천 경찰학 T-PASS 신청하기 👉</a>
                    </div>
                </div>
                <div class="tabCts" id="tab06">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p06.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">27</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201692" onclick="go_PassLecture(this)">고태환 민법총칙 T-PASS 신청하기 👉</a>
                    </div>
                </div>
                <div class="tabCts" id="tab07">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p07.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">27</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201693" onclick="go_PassLecture(this)">이동호 행정학 T-PASS 신청하기 👉</a>
                    </div>
                </div>
                <div class="tabCts" id="tab08">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2792_04_p08.jpg" alt="" />
                    <div class="request">
                        <p><strong class="NSK-Black">27</strong>만원</p>
                        <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/201694" onclick="go_PassLecture(this)">김한기 범죄학 T-PASS 신청하기 👉</a>
                    </div>
                </div>
            </div>

            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내 확인하기 ↓</a>
                <p>※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                ※ 스페셜한정상품으로 할인쿠폰사용이 불가한 상품입니다.</p>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" id="careful" >
			<div class="evtInfoBox" >
				<h4 class="NSK-Black">윌비스경찰간부 T-PASS 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>				
                    <li>본 상품은 구매일로부터 2023년 10월 31일 까지만 들을수 있는 기간제 간부 T-PASS 입니다.<br>
                        (추후 간부 시험이 늦어지게 되면 자동으로 연장진행 예정입니다.)</li>
                    <li>본 상품 강좌 구성은  각 교수님별로 다음과 같습니다.<br>
                        * 형사법(형소법) : 서영교 교수님<br>
                        * 형사법(형법) : 문형석 교수님<br>
                        * 경찰학개론: 정진천 교수님<br>
                        * 헌법 : 이국령 교수님<br>
                        * 헌법 : 선동주 교수님 <br>
                        * 범죄학 : 김한기 교수님* 민법총칙 : 고태환 교수님* 행정학 : 이동호 교수님</li>
                    <li>선택한 윌비스 경찰간부 T-PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                    <li>윌비스경찰간부 T-PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>강좌 스케줄 및 커리큘럼은 학원 사정에 따라 변동될 수 있습니다.</li>
				</ul>

				<div class="infoTit"><strong>교재 및 포인트</strong></div>
				<ul>
					<li>윌비스 경찰간부 T-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
				</ul>

				<div class="infoTit"><strong>환불관련</strong></div>
				<ul>
					<li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 윌비스 경찰T-PASS 결제가 기준으로 계산하여 사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                    <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.(포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
				</ul>
                
				<div class="infoTit"><strong>간부 T-PASS 수강</strong></div>
				<ul>
					<li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>윌비스 경찰간부T- PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>윌비스 경찰간부 T-PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.
                        총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다.([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될수 있습니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
				</ul>
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
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
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

        /*수강신청 동의*/ 
        function go_PassLecture(obj){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }else{
                var _url = $(obj).data('url');
                window.open(_url);
            }
        }    
    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop   