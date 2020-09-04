@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1792_top_bg.jpg) no-repeat center top;}

.evt01 {background:#fff;}

.evt02 {background:#363636}
.evt02 .check{
    position:absolute;width:800px;left:50%;top:1000px;margin-left:-250px;z-index:1;font-size:14px; text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.evt02 .check label{color:#fff}
.evt02 .check input {border:2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evt02 .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evt02 .check a:hover {color: #fff;background:#f58f40;}

.evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
.evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
.evtInfoBox h4 {font-size:35px; margin-bottom:50px}
.evtInfoBox .infoTit {font-size:20px;}
.evtInfoBox ul {margin-bottom:30px}

</style>


    <div class="evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1792_top.jpg" alt="조민주 한국사">  
        </div>

        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1792_01.jpg" alt="한국사 정복">
            <div>
                <iframe width="720" height="405" src="https://www.youtube.com/embed/8qeIZoyNyDo?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1792_01_01.jpg" alt="한국사 정복">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1792_02.jpg" alt="수강신청" usemap="#Map1788a" border="0">
            <map name="Map1788a" id="Map1788a">
                <area shape="rect" coords="719,691,911,769" href="javascript:go_PassLecture('171516');" alt="수강신청" />
            </map>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>

        <div class="evtCtnsBox evtInfo NGR" id="careful">
			<div class="evtInfoBox">
				<h4 class="NGEB">이용안내 및 유의사항</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>이석준 교수의 2020~2021년 대비 신규 개강 커리큘럼을 수강할 수 있는 상품입니다.</li>
                    <li>본 상품의 수강기간은 수강신청 상세 안내 화면에 표기된 기간만큼 제공됩니다.</li>
                    <li>개강 일정 및 교수님 사정에 따라 커리큘럼의 변동이 있을 수 있습니다.</li>
                    <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>                     
				</ul>
				<div class="infoTit NG"><strong>교재안내</strong></div>
				<ul>
					<li>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 [내강의실]-[무한PASS존] 내 [교재구매] 메뉴에서도 별도 구매 가능합니다.</li>       
				</ul>
				<div class="infoTit NG"><strong>기기제한</strong></div>
				<ul>
					<li>본 상품 수강 시 이용 간으한 기기는 다음과 같이 제한됩니다.<br>
                    - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>  
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최초 1회에 한해 [내강의실]-[등록기기정보]에서 직접 초기화 가능하며,<br>
                    그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006이나 1:1상담게시판으로 문의바랍니다.</li>                    				
				</ul>
                <div class="infoTit NG"><strong>수강안내</strong></div>
				<ul>
					<li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>                    				
				</ul>
				<div class="infoTit NG"><strong>결제/환불</strong></div>
				<ul>
					<li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.<br>
                    강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주됩니다.</li>
                    <li>본 상품은 특별기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감되고 환불해드립니다.</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의바랍니다.</li>                    				
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

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>
@stop