@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_02 {padding-bottom:5vh}
    .tabs {border-bottom:2px solid #926054; width:100%; margin:0 auto 30px; display:flex; justify-content: center;}
    .tabs li {width:100%;}
    .tabs li a {display:block; color:#fff; background:#000; height:5vh; line-height:5vh; text-align:center; margin-right:1px; font-size:1.5vh;font-weight:bold;}
    .tabs li a:hover,
    .tabs li a.active {background:#926054;}     
    .tabs li:last-child a {margin:0}

    .evtCtnsBox .check{margin:30px 20px 50px; font-size:14px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;}
    .evtCtnsBox .check label{color:#000}
    .evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
    .evtCtnsBox .check a {display: block; width:60%; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin:20px auto}
    .evtCtnsBox .check a:hover {background-color:#613EE3; color:#fff}

    /* 이용안내 */
    .wb_info {padding:50px 20px; color:#3a3a3a; line-height:1.4; background:#f4f4f4}
    .guide_box{text-align:left; word-break:keep-all}
    .guide_box h2 {font-size:3vh; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:1.8vh;}        
    .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
    .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:1.5vh;font-weight:bold;}

    </style>

    <div id="Container" class="Container NSK c_both">  

        <div class="evtCtnsBox" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_top.jpg" alt="온라인 종합반">
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_02.jpg" alt="" />	
            <ul class="tabs">
				<li><a href="#tab01">노동법</a></li>
				<li><a href="#tab02">행정쟁송법</a></li>
				<li><a href="#tab03">인사노무관리</a></li>
				<li><a href="#tab04">경영조직론</a></li>
				<li><a href="#tab05">민사소송법</a></li>
                <li><a href="#tab06">노동경제학</a></li>
			</ul>
			<div id="tab01" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_02_01.jpg" alt="노동법" />
                <a href="javascript:go_PassLecture('200780');" title="이수진" style="position: absolute; left: 88.13%; top: 65.29%; width: 10.45%; height: 3.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200781');" title="이수진" style="position: absolute; left: 88.13%; top: 69.98%; width: 10.45%; height: 3.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200782');" title="이수진" style="position: absolute; left: 88.13%; top: 74.49%; width: 10.45%; height: 3.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200783');" title="이수진" style="position: absolute; left: 88.13%; top: 79.10%; width: 10.45%; height: 3.68%; z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200784');" title="김지현" style="position: absolute; left: 88.13%; top: 90.98%; width: 10.45%; height: 3.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200785');" title="김지현" style="position: absolute; left: 88.13%; top: 95.67%; width: 10.45%; height: 3.68%; z-index: 2;"></a>
			</div>
			<div id="tab02" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_02_02.jpg" alt="행정쟁송법"/>
                <a href="javascript:go_PassLecture('200786');" title="문일" style="position: absolute; left: 88.13%; top: 57.07%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200788');" title="문일" style="position: absolute; left: 88.13%; top: 59.95%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200789');" title="문일" style="position: absolute; left: 88.13%; top: 62.84%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200790');" title="문일" style="position: absolute; left: 88.13%; top: 65.67%; width: 10.45%; height: 2.26%; z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200791');" title="이승민" style="position: absolute; left: 88.13%; top: 72.96%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200793');" title="이승민" style="position: absolute; left: 88.13%; top: 75.90%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200794');" title="이승민" style="position: absolute; left: 88.13%; top: 78.68%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200795');" title="이승민" style="position: absolute; left: 88.13%; top: 81.56%; width: 10.45%; height: 2.26%; z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200796');" title="서창교" style="position: absolute; left: 88.13%; top: 88.91%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200797');" title="서창교" style="position: absolute; left: 88.13%; top: 91.74%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200799');" title="서창교" style="position: absolute; left: 88.13%; top: 94.57%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200800');" title="서창교" style="position: absolute; left: 88.13%; top: 97.45%; width: 10.45%; height: 2.26%; z-index: 2;"></a>
			</div>
			<div id="tab03" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_02_03.jpg" alt="인사노무관리"/>
                <a href="javascript:go_PassLecture('200801');" title="오은지" style="position: absolute; left: 88.04%; top: 56.38%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200802');" title="오은지" style="position: absolute; left: 88.04%; top: 58.48%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200803');" title="오은지" style="position: absolute; left: 88.04%; top: 60.62%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200804');" title="오은지" style="position: absolute; left: 88.04%; top: 62.72%; width: 10.45%; height: 1.68%; z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200805');" title="정준모" style="position: absolute; left: 88.04%; top: 68.14%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200806');" title="정준모" style="position: absolute; left: 88.04%; top: 70.28%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200807');" title="정준모" style="position: absolute; left: 88.04%; top: 72.43%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200808');" title="정준모" style="position: absolute; left: 88.04%; top: 74.48%; width: 10.45%; height: 1.68%; z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200809');" title="박건민" style="position: absolute; left: 88.04%; top: 79.97%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200810');" title="박건민" style="position: absolute; left: 88.04%; top: 82.07%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200811');" title="박건민" style="position: absolute; left: 88.04%; top: 84.17%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200812');" title="박건민" style="position: absolute; left: 88.04%; top: 86.23%; width: 10.45%; height: 1.68%; z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200813');" title="신현표" style="position: absolute; left: 88.04%; top: 91.77%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200814');" title="신현표" style="position: absolute; left: 88.04%; top: 93.91%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200815');" title="신현표" style="position: absolute; left: 88.04%; top: 95.97%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200816');" title="신현표" style="position: absolute; left: 88.04%; top: 98.03%; width: 10.45%; height: 1.68%; z-index: 2;"></a>
			</div>
			<div id="tab04" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_02_04.jpg" alt="경영조직론"/>
                <a href="javascript:go_PassLecture('200817');" title="오은지" style="position: absolute; left: 88.04%; top: 58.9%; width: 10.45%; height: 1.62%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200818');" title="오은지" style="position: absolute; left: 88.04%; top: 61.13%; width: 10.45%; height: 1.62%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200819');" title="오은지" style="position: absolute; left: 88.04%; top: 63.32%; width: 10.45%; height: 1.62%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200820');" title="오은지" style="position: absolute; left: 88.04%; top: 65.51%; width: 10.45%; height: 1.62%; z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200823');" title="정준모" style="position: absolute; left: 88.04%; top: 71.17%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200824');" title="정준모" style="position: absolute; left: 88.04%; top: 73.44%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200825');" title="박건민" style="position: absolute; left: 88.04%; top: 79.1%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200826');" title="박건민" style="position: absolute; left: 88.04%; top: 81.38%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200827');" title="박건민" style="position: absolute; left: 88.04%; top: 83.52%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200828');" title="박건민" style="position: absolute; left: 88.04%; top: 85.71%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>

                <a href="javascript:go_PassLecture('200829');" title="신현표" style="position: absolute; left: 88.04%; top: 91.41%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200830');" title="신현표" style="position: absolute; left: 88.04%; top: 93.65%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200831');" title="신현표" style="position: absolute; left: 88.04%; top: 95.88%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200832');" title="신현표" style="position: absolute; left: 88.04%; top: 98.12%; width: 10.45%; height: 1.62%;  z-index: 2;"></a>
			</div>
			<div id="tab05" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_02_05.jpg" alt="민사소송법"/>
                <a href="javascript:go_PassLecture('200855');" title="김춘환" style="position: absolute; left: 88.04%; top: 66.27%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200856');" title="김춘환" style="position: absolute; left: 88.04%; top: 75.04%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200857');" title="김춘환" style="position: absolute; left: 88.04%; top: 83.82%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200858');" title="김춘환" style="position: absolute; left: 88.04%; top: 92.25%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
			</div>
            <div id="tab06" class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2022/09/2747m_02_06.jpg" alt="노동경제학"/>
                <a href="javascript:go_PassLecture('200859');" title="이강희" style="position: absolute; left: 88.04%; top: 66.27%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200860');" title="이강희" style="position: absolute; left: 88.04%; top: 75.04%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200861');" title="이강희" style="position: absolute; left: 88.04%; top: 83.82%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('200862');" title="이강희" style="position: absolute; left: 88.04%; top: 92.25%; width: 10.45%; height: 6.37%; z-index: 2;"></a>
			</div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
		</div>


        <div class="evtCtnsBox wb_info" id="notice">
            <div class="guide_box">
                <h2 class="NSK-Black">상품 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 2022년 9월 ~ 2023년 8월까지 진행되는 각 과목 교수님별 GS0 ~ GS3순환 강의로 구성됩니다.<br>
                            동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/일요일제외) 됩니다.</li>
                            <li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경하실 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                            <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                            <li>본 상품은 수강기간 조정 및 일시 정지가 불가합니다.</li>
                            <li>상품별 수강기간 : 0순환+1순환+2순환+3순환 _ 2차 시험일까지  /  0순환+1순환 _ 210일 </li>
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
                        </ol>
                    </dd>

                    <dt>결제/환불관련</dt>
                    <dd>
                        <ol>
                            <li>본 패키지 강좌의 환불 시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                            <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br>
                                ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                                ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br>
                                ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.<br>
                                ④ 무료로 제공되는 특강 수강 후 환불 시, 특강 강의의 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                            <li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
                            <li>[MAC ADDRESS 안내]<br>
                            본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
                            윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
                            MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
                        </ol>
                    </dd>

                    <dt>상담 및 문의</dt>
                    <dd>
                        <ol>
                            <li>[상담시간] 평일 오전 9시 ~ 오후 5시</li>
                            <li>[상담전화] 1566-4770</li>
                            <li>[상담내용] 강의 및 패키지 상품 안내</li>
                        </ol>
                    </dd>

                </dl>
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
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ front_url('/periodPackage/show/cate/309002/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop