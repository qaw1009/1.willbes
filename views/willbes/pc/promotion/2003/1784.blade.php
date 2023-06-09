@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            position:relative;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/08/1784_top_bg.jpg) no-repeat center top; position:relative;}

        .wb_01 {background:#fff}
        .wb_02 {background:#fff; padding-bottom:150px}
        .wb_02 .tabMenu {width:980px; margin:0 auto 30px}
        .wb_02 .tabMenu li {display:inline; float:left; width:50%}
        .wb_02 .tabMenu li a {display:block; background:#c5c5c5; color:#fff; padding:20px 0; text-align:center; font-size:24px; line-height:1.4}
        .wb_02 .tabMenu li a p {font-size:16px}
        .wb_02 .tabMenu li a:hover,
        .wb_02 .tabMenu li a.active {background:#1e1f23;}
        .wb_02 ul:after {content:''; display:block; clear:both}

        .check {margin-top:20px; color:#333; font-size:14px}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#d9312b}   

        .wb_03 {background:#fff;} 

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}

    </style>
    
    <div class="evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1784_top.gif" alt="김동진 법원팀"/>
        </div>

        <div class="evtCtnsBox wb_01" >           
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1784_01.jpg" alt="후기"/><br>       
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1784_02.gif" alt="혁신적인 커리큘럼"/>
        </div>

        <div class="evtCtnsBox wb_02" id="buyLec">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1784_03.jpg" alt="수강신청">
            <ul class="tabMenu NSK-Black">
                <li>
                    <a href="#tab01">
                        <p class="NSK">1~3순환/3~5순환</p>
                        패키지 특별 할인
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <p class="NSK">1·2·3·4·5순환</p>
                        각 순환별 패키지
                    </a>
                </li>
            </ul>
            <div id="tab01" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1784_03_01.jpg" alt="1~3순환/3~5순환" usemap="#Map1784_01">
                <map name="Map1784_01">
                    <area shape="rect" coords="639,176,861,261" href="javascript:go_PassLecture('171313');" alt="3~5순환" />
                    <area shape="rect" coords="641,473,858,555" href="javascript:go_PassLecture2('171369');" alt="1~3순환">
                </map>                    
            </div> 
            <div id="tab02" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1784_03_02.jpg" alt="1·2·3·4·5순환" usemap="#Map1784_02" border="0">
                <map name="Map1784_02">
                    <area shape="rect" coords="57,304,204,358" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/163599" target="_blank"  alt="1순환" >
                    <area shape="rect" coords="235,302,385,361" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/165364" target="_blank"  alt="2순환" >
                    <area shape="rect" coords="417,304,563,360" href="https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/171314" target="_blank"  alt="3순환" >
                </map>
            </div> 
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div>         
        </div>

        <div class="evtCtnsBox evtInfo NGR" id="ctsInfo">
			<div class="evtInfoBox">
				<h4 class="NGEB">윌비스김동진법원팀 순환별 패키지 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>본 상품은 윌비스김동진법원팀 교수진의 지정된 순환별 과정을 배수 제한 없이 무제한 수강 가능합니다.<br>
                        - 1~3순환 법과목 패키지 : 민법 김동진, 형법 문형석, 헌법 이국령, 민사소송법 이덕훈, 형사소송법 유안석 교수별 1~3순환 과정<br>
                        - 3~5순환 전과목 패키지 : 민법 김동진, 형법 문형석, 헌법 이국령, 민사소송법 이덕훈, 형사소송법 유안석, 국어 이현나, 영어 박초롱, 한국사 임진석 3~5순환 과정<br>
                            (3~5순환 전과목 패키지 과정의 경우, 강의 진행 일정에 맞추어 순차적으로 업데이트 될 예정입니다.)<br>
                    </li>                     
				</ul>
				<div class="infoTit NG"><strong>수강기간</strong></div>
				<ul>
					<li>구매일로부터 6개월 간 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li> 
                    <li>본 상품 이용 시 일시정지/연장/재수강은 제공되지 않습니다.</li>       
				</ul>
				<div class="infoTit NG"><strong>수강관련 <span class="tx-red">(*3~5순환 패키지의 경우에만 해당)</span></strong></div>
				<ul>
					<li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 상품 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                    - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                    <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 
                    계정당 최초 1회에 한해 직접 초기화가 가능하며 추후 단말기 초기화는 고객센터에서 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>                    				
				</ul>
                <div class="infoTit NG"><strong>교재관련 <span class="tx-red">(*3~5순환 패키지의 경우에만 해당)</span></strong></div>
				<ul>
					<li>본 상품은 교재를 별도 구매하셔야 하며, 각 강좌별 교재는 무한PASS존 내 [교재구매] 버튼을 통해 구매 가능합니다.</li>
                    <li>4~5순환 모의고사 진행 일정에 맞추어 회원정보에 등록된 휴대폰번호로 신청 방법 및 배송 기간이 문자 안내될 예정입니다.</li>                    				
				</ul>
				<div class="infoTit NG"><strong>환불관련</strong></div>
				<ul>
					<li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                    <li>단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                    <li>본 상품은 할인가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다.</li>                    				
				</ul>
                <div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>본 상품은 특별할인기획 상품으로 쿠폰 할인/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                    <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않거나 교수가 변경되는 경우 대체 강의가 제공되며 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>                    				
				</ul>
                <div class="infoTit NG"><strong>※ 이용 문의 : 윌비스 고객만족센터 1544-5006</strong></div>
			</div>
		</div>       
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
        function go_PassLecture2(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/package/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        $(document).ready(function(){
            $('.tabMenu').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function(){
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
                    e.preventDefault();
                });
            });
        });
    </script>
@stop