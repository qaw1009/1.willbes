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
    .tabs {border-bottom:2px solid #11755B; width:100%; margin:0 auto;display:flex; justify-content: center;}
    .tabs li {width:100%;}
    .tabs li a {display:block; color:#fff; background:#000; height:5vh; line-height:5vh; text-align:center; margin-right:1px; font-size:1.5vh;font-weight:bold;}
    .tabs li a:hover,
    .tabs li a.active {background:#11755B;}     
    .tabs li:last-child a {margin:0}

    .evtCtnsBox .check{margin:30px 20px 50px; font-size:15px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;}
    .evtCtnsBox .check label{color:#000}
    .evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
    .evtCtnsBox .check a {display: block; width:60%; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin:20px auto}
    .evtCtnsBox .check a:hover {background-color:#00FEBE; color:#000}

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
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_top.jpg" alt="1차 문제풀이 선택형종합반" />
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <div class="wrap">
			<img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_01.jpg" alt="특별혜택" />		
            <a href="#lecbuy" title="신청하기" style="position: absolute;left: 5.27%;top: 68.28%;width: 89.14%;height: 17.74%;z-index: 2;"></a>	  
            </div>
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_02.jpg" alt="강의일정"/>
            <ul class="tabs" id="lecbuy">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">노동법(1, 2)</a></li>
				<li><a href="#tab03">경영학</a></li>
				<li><a href="#tab04">경제학</a></li>
				<li><a href="#tab05">사회보험법</a></li>              
			</ul>
			<div id="tab01" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_02_01.png" alt="민법" />                          
			</div>
			<div id="tab02" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_02_02.png" alt="노동법" />
			</div>
			<div id="tab03" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_02_03.png" alt="경영학" />
			</div>
			<div id="tab04" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_02_04.png" alt="경제학" />
			</div>
			<div id="tab05" class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_02_05.png" alt="사회보험법" />
			</div>           
		</div>        
        
        <div class="evtCtnsBox evt_03">
            <div class="wrap">
			    <img src="https://static.willbes.net/public/images/promotion/2023/03/2916m_03.jpg" alt="강좌 선택하기" />
                <a href="javascript:go_PassLecture('205706');" title="신청하기" style="position: absolute;left: 0.51%;top: 80.28%;width: 98.74%;height: 18.74%;z-index: 2;"></a>	
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 노무 1차 기본이론 선택형 종합반 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div> 
		</div>

        <div class="evtCtnsBox wb_info" id="careful">
            <div class="guide_box">
                <h2 class="NSK-Black">상품 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                        <li>본 상품은 2023년 3월 6일(월)부터 2023년 4월 19(수)까지 진행되는 공인노무사 1차 문제풀이 강의가 제공됩니다.
                            이벤트 기간 내 본 상품 결제 시, 최대 수강료 30% 할인 수강혜택이 적용됩니다.
                        </li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                            <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
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
                            ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br>
                            ② 특별 기획 상품 등 할인이 적용된 상품은 해당 상품의 정가를 기준으로 환불하는 것을 원칙으로 합니다.<br>
                            ③ 특별 기획 상품 등 수강연장이 적용된 상품은 해당 상품의 정상 수강기간을 기준으로 환불하는 것을 원칙으로 합니다.<br>
                            ④ 최종 완강 되지 않은 강좌의 학습 회차 계산은 공지된 예정 강좌 수를 기준으로 환불 금액을 산출합니다.
                            </li>
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
                                MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.
                            </li>
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

            var url = '{{ front_url('/userPackage/show/cate/309002/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop