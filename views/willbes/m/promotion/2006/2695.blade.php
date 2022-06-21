@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_02 {padding-bottom:100px}
    .tabs {border-bottom:2px solid #d84541; display:flex}
    .tabs li {width:20%;}
    .tabs li a {display:block; color:#fff; background:#000; padding:10px 3px; text-align:center; margin-right:1px; font-size:1.4vh;font-weight:bold; width:100%; overflow:hidden;white-space:nowrap; text-overflow:ellipsis;}
    .tabs li a:hover,
    .tabs li a.active {background:#d84541;}
    .tabs:after {content:""; display:block; clear:both}     


    .evtCtnsBox .p_re a {position:absolute; bottom:3%; right:3%; padding:5px 10px; border-radius:30px; color:#fff; background:#d84541; font-size:1.4vh}
    .evtCtnsBox .p_re a:hover {background:#000;}
    

    .evt_04 {padding-bottom:150px}
  
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
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2695m_top.jpg" alt="박준희 태패스">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2695m_01.jpg" alt="박준희 지구과학">
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/06/2695_02_01.jpg" alt="수험전략 수립 1차" />
            <ul class="tabs">
				<li><a href="#tab01">민법</a></li>
				<li><a href="#tab02">감정평가관계법규</a></li>
				<li><a href="#tab03">부동산학원론</a></li>
				<li><a href="#tab04">경제학원론</a></li>
				<li><a href="#tab05">회계학</a></li>
			</ul>
			<div id="tab01" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/06/2695_02_02.jpg" alt="민법" />
			</div>
			<div id="tab02" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/06/2695_02_02.jpg" alt="감정평가관계법규"/>
			</div>
			<div id="tab03" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/06/2695_02_03.jpg" alt="부동산학원론"/>
			</div>
			<div id="tab04" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/06/2695_02_04.jpg" alt="경제학원론"/>
			</div>
			<div id="tab05" class="p_re">
				<img src="https://static.willbes.net/public/images/promotion/2022/06/2695_02_05.jpg" alt="회계학"/>
			</div>
		</div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2695m_03.jpg" alt="only.1">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2695m_04.jpg" alt="" />
                <a href="javascript:go_PassLecture('198572');" title="" style="position: absolute; left: 0%; top: 89.33%; width: 32.41%; height: 9.71%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('198573');" title="" style="position: absolute; left: 33.66%; top: 89.33%; width: 32.41%; height: 9.71%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('198574');" title="" style="position: absolute; left: 67.59%; top: 89.33%; width: 32.41%; height: 9.71%; z-index: 2;"></a>
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다 
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="notice">
            <div class="guide_box">
                <h2 class="NSK-Black">상품 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>1차 상품구성은 2022년 6월부터 2023년 3월까지 진행될 2022년 대비 감정평가사 1차 대비 강좌로 구성됩니다.</li>
                            <li>동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/주말 제외) 됩니다. </li>
                            <li>강사 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경될 수 있습니다.<br>
                            강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다. </li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>본 패스 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                            <li>본 패스 상품 강의의 경우 배수 제한 없이 무제한 수강이 가능합니다.</li>
                            <li>본 패스 상품 수강기간은 각 패스 상품별로 상이하오니 꼭 확인하시기 바랍니다.</li>
                            <li>본 패스 상품은 구매일로부터 바로 수강이 진행되며, 수강기간 조정 및 정지가 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
                            <li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>결제/환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                            <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
                            ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                            ② 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 패스상품 정가 기준으로 계산하여 사용일수만큼 차감 후 환불 됩니다.<br/>
                            ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.</li>
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
                            <li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
                            <li>[상담전화] 1566-4770</li>
                            <li>[상담내용] 강의 및 패키지 상품 안내</li>
                        </ol>
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

            var url = '{{ front_url('/periodPackage/show/cate/309003/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop