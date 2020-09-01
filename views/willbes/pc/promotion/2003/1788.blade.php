@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.subContainer {
    min-height:auto !important;
    margin-bottom:0 !important;
}
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

/*타이머*/
.time {width:100%; text-align:center; background:#000}
.time {text-align:center; padding:20px 0}
.time table {width:1120px; margin:0 auto}
.time table td:first-child {font-size:40px}
.time table td img {width:80%}
.time .time_txt {font-size:28px; color:#fff; letter-spacing: -1px; font-weight:600}
.time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
.time p {text-alig:center}
@@keyframes upDown{
from{color:#d63e4d}
50%{color:#eebd8f}
to{color:#d63e4d}
}
@@-webkit-keyframes upDown{
from{color:#d63e4d}
50%{color:#eebd8f}
to{color:#d63e4d}
}

.top_bg {background:url(https://static.willbes.net/public/images/promotion/2020/03/1330_top_bg.jpg) no-repeat center top;}
.top_bg .check{
    position:absolute; width:1000px; left:50%; top:1200px; margin-left:-500px; z-index:1;font-size:14px;text-align:center;line-height:1.5;
    letter-spacing:-1px;
}

.evtCtnsBox .check label{color:#333;font-size:16px;}
.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evtCtnsBox .check a:hover {color: #fff;background: #000;}

.evt01_1 {background:#fff}
.evt01 {background:#eef1f8; padding-bottom:100px}
.evt01 div {width:1120px; margin:0 auto; position:relative;}
.evt01 div span {position:absolute; z-index:5}
.evt01 div .img01 {width:441px; top:25px; left:306px;}
.evt01 div .img02 {width:176px; top:283px; left:160px;}
.evt01 div .img03 {width:191px; top:139px; left:795px;}

.evt04 {background:#2bb9a9}
.evt04 .check{
    position:absolute;width: 800px;left:50%;top:880px;margin-left:-400px;z-index:1;font-size:14px; text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.evt04 .check label{color:#333}
.evt05 {background:#eef1f8}

.evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
.evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
.evtInfoBox .infoTit {font-size:20px;}
.evtInfoBox ul {margin-bottom:30px}

</style>


    <div class="evtContent NGR" id="evtContainer">  
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB"  id="newTopDday">
            <div>
                <table>
                    <tr>                        
                        <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
                        <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
                        <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">일 </td>
                        <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>                        
                    </tr>
                </table>                
            </div>
        </div>

        <div class="evtCtnsBox top_bg">  
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1330_top.gif" alt="조민주 한국사" usemap="#Map1330a" border="0">
            <map name="Map1330a" id="Map1330a">
                <area shape="rect" coords="140,1061,975,1134" href="javascript:go_PassLecture(1);" alt="수강신청"/>
            </map>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>

        <div class="evtCtnsBox evt01_1"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1330_QandA.jpg" alt="한국사 정복">
        </div>

        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_01.jpg" alt="한국사 정복">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02.jpg" alt="모니터">
                <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02_1.gif" alt="강의1"></span>
                <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02_2.gif" alt="강의2"></span>
                <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02_3.gif" alt="강의3"></span>
            </div>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/aj_BQRFRe4M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1330_04.jpg" alt="수강신청" usemap="#Map1330b" border="0">
            <map name="Map1330b" id="Map1330b">
                <area shape="rect" coords="702,710,963,798" href="javascript:go_PassLecture('171313');" alt="수강신청" />
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
					<li>조민주 교수의 2020~2021년 대비 신규 개강 커리큘럼을 수강할 수 있는 상품입니다.</li>
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
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최초 1회에 한해 [내강의실]-[등록기기정보]에서 직접 초기화 가능하며, 
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
					<li>결결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다. 
                    강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주됩니다.</li>
                    <li>본 상품은 특별기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 참감되고 환불해드립니다.</li>
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

            var url = '{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        function goDesc(tab){
            location.href = '#careful';
        }
        
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop