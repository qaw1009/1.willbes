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

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/04/2181_top_bg.jpg) no-repeat center top;}

.evt01 {background:#fff; padding-bottom:100px}
.evt01 div {width:1120px; margin:0 auto; position:relative;}
.evt01 div span {position:absolute; z-index:5}
.evt01 div .img01 {top:240px; left:168px;}
.evt01 div .img02 {top:125px; left:450px;}

.evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/04/2181_03_bg.jpg) no-repeat center top;}
.evt04 .check{
    position:absolute;left:50%;top:1040px;margin-left:-290px;z-index:1;font-size:17px; text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.evt04 .check label{color:#fff}
.evt04 .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
.evt04 .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evt04 .check a:hover {color: #fff;background: #000;}

.evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
.evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
.evtInfoBox h4 {font-size:35px; margin-bottom:50px}
.evtInfoBox .infoTit {font-size:20px;}
.evtInfoBox ul {margin-bottom:30px}

</style>

    <div class="evtContent NGR" id="evtContainer"> 

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2181_top.jpg" alt="조민주 한국사">  
        </div>
    
        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2181_01.jpg" alt="한국사 정복">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2181_02.jpg" alt="모니터">
                <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2021/04/2181_02_01.gif" alt="강의1"></span>
                <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2021/04/2181_02_02.gif" alt="강의2"></span>
            </div>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/aj_BQRFRe4M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2181_03.jpg" alt="수강신청" >
            <a href="javascript:go_PassLecture('181435');" title="" style="position: absolute; left: 62.77%; top: 72.45%; width: 8.73%; height: 7.43%; z-index: 2;"></a>
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
					<li>제공과정<br>
                        - 전 과정 T-PASS : 2021~2022 조민주 한국사 9급 국가직 대비 전 과정
                    </li>
                    <li>본 상품의 수강기간은 수강신청 상세 안내 화면에 표기된 기간만큼 제공됩니다.</li>
                    <li>개강 일정 및 교수님 사정에 따라 커리큘럼의 변동이 있을 수 있습니다.</li>
                    <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>                     
				</ul>
				<div class="infoTit NG"><strong>기기제한</strong></div>
				<ul>
					<li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                        - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                    </li>  
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최초 1회에 한해 [내강의실]-[등록기기정보]에서 직접 초기화 가능하며,<br>
                    그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006이나 1:1상담게시판으로 문의바랍니다.</li>                    				
				</ul>
                <div class="infoTit NG"><strong>수강안내</strong></div>
				<ul>
					<li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>               
                    <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                    <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>
                </ul>
				<div class="infoTit NG"><strong>결제/환불</strong></div>
				<ul>
					<li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                        - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)
                    </li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>                    				
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