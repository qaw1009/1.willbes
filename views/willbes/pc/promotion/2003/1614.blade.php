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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky_bottom{position: fixed; bottom:0; text-align:center; width:100%;background: rgba(0,0,0,0.75);z-index:100;}

		.evtTop {background:#191b20 url(https://static.willbes.net/public/images/promotion/2020/04/1614_graph_bg.jpg) no-repeat center top;}

		.evt01 {background:#a4a6ac url(https://static.willbes.net/public/images/promotion/2020/04/1614_top_bg.jpg) no-repeat center top;}
        
        .evt01_1 {background:#f5f5f5;}

		.evt02 {background:#fff; padding-bottom:150px}

		.evt03 {background:#7a2fec;}

        .evt04 {background:#f3f5f7;position:relative;padding-bottom:65px;}	
        .evt04 ul {position:absolute; left:50%;top:475px;}
        .evt04 li:nth-child(1) {margin-left:-830px;margin-top:422px;}
        .evt04 li:nth-child(2) {margin-left:-461px;margin-top:-31px;}
        .evt04 li:nth-child(3) {margin-left:-85px;margin-top:-29px;}   
        .evt04 li:nth-child(4) {margin-left:336px;margin-top:-28px;}  
        .evt04 li input {height:30px; width:30px;}
        .evt04 li label {display:none}     

        .evt04 .check04 {width:877px; height:112px; margin:20px auto 0;}   
        .evt04 .check_bg {background:#ccc;}  
        .evt04 .check {width:980px; margin:0 auto;  padding:50px 0px 30px 20px; letter-spacing:3; font-weight:bold; color:#362f2d; font-size:14px}
        .evt04 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .evt04 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fffbfb; background:#252525; margin-left:50px; border-radius:20px}

        .evt04 .buyLec {padding-top:50px;}
		.evt04 .buyLec a {width:1120px;margin:0 auto;display:block; text-align:cetner; font-size:30px; font-weight:600; background:#D43728; color:#fff; padding:20px 0; border-radius:50px}
		.evt04 .buyLec a:hover {background:#D43728; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

		.evt05 {background:#fff;padding-bottom:50px;}
		
		/* tab */
        .tabContaier{width:100%; text-align:center; padding-bottom:20px;}
        .tabContaier ul {margin:0 auto;  width:980px}		
        .tabContaier li {display:inline; float:left}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}

		/*타이머*/
        .time{width:100%; text-align:center; background:#000}
        .time_date {text-align:center; padding:20px 0}
        .time_date table {width:1120px; margin:0 auto}
        .time_date table td:first-child {font-size:40px}
        .time_date table td img {width:80%}
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:28px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
        .time_txt span {color:#ef6759; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ecd60f}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ecd60f}
        to{color:#d63e4d}
        }  

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky_bottom">
            <a href="#event">
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1614_bottom.png" title="바로가기" />    
            </a>        
        </div>

        <div class="evtCtnsBox evtTop">
			<img src="https://static.willbes.net/public/images/promotion/2020/04/1614_graph.gif" title="한덕현T-PASS" />			
		</div>		

		<!-- 타이머 -->
		<div class="evtCtnsBox time">
			<div class="time_date" id="newTopDday">
				<table>
					<tr>
						<td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} 마감!</span></td>
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
		<!-- 타이머 //-->	

		<div class="evtCtnsBox evt01">
			<img src="https://static.willbes.net/public/images/promotion/2020/04/1614_top.gif" title="합격전략 공개" />
		</div>

		<div class="evtCtnsBox evt01_1">
			<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_01.jpg" title="영어, 자신있나요?" />
		</div>

		<div class="evtCtnsBox evt02">
			<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02.jpg"  title="갓덕현이 모두 해결해드립니다." />
			<div class="tabContaier">
				<ul>
					<li>
						<a class="active" href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab1.jpg" class="off" />
						<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab1_on.jpg" class="on"  /></a></li>
					<li>
						<a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab2.jpg"  class="off"  />
						<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab2_on.jpg"  class="on" /></a>
					</li>
					<li>
						<a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab3.jpg"  class="off" />
						<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab3_on.jpg"  class="on" /></a>
					</li>
				</ul>
				<div class="tabContents" id="tab1">
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c1.jpg" alt="윌비스 영어 40~60점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab2">
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c2.jpg" alt="윌비스 영어 60~80점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab3">
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c3.jpg" alt="윌비스 영어 70점 이상 강력 추천! " />
				</div>
				<div class="mt20">*본 T-PASS에서는 기출+단원별+동형모의고사 및 FINAL특강만을 제공합니다.</div>
			</div>
		</div>

		<div class="evtCtnsBox evt03">
			<img src="https://static.willbes.net/public/images/promotion/2020/04/1614_03.jpg" title="수험생들이 선택하고 인정한 영어정복 노하우!" />
		</div>

        <div class="evtCtnsBox evt04" id="event">             
            <ul>                
                <li><input type="radio" id="y_pkg" name="y_pkg" value="164226" onClick=""/><label for="y_pkg">공채 12개월</label></li>
                <li><input type="radio" id="y_pkg" name="y_pkg" value="164227" onClick=""/><label for="y_pkg">특채 12개월</label></li>
                <li><input type="radio" id="y_pkg" name="y_pkg" value="163940" onClick=""/><label for="y_pkg">공채 3개월</label></li>
                <li><input type="radio" id="y_pkg" name="y_pkg" value="163829" onClick=""/><label for="y_pkg">특채 3개월</label></li>                
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1614_04.jpg" alt="수강신청"/>
            
            <div class="check_bg">
                <div class="check" id="chkInfo">
                    <label>
                        <input name="is_chk" type="checkbox" value="Y" /> 페이지 하단 한덕현 영어 T-PASS 이용안내를 모두 확인하였고,이에 동의합니다.             
                    </label>
                    <a href="#tip">이용안내확인하기 ↓</a>
                </div> 
            </div>
            <div>                
                <div class="buyLec">
                    {{--<a href="#none" onclick="goCartNDirectPay('event', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">--}}
                    <a href="#none" onclick="goPassLecture()">
                        수강신청 >
                    </a> <!--소방패스 신청하기-->
                </div>
            </div>                   
        </div><!--wb_cts03//-->

		<div class="evtCtnsBox evt05" id="tip">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1614_05.jpg" title="이용안내 및 유의사항" />
		</div>
	</div>
	<!-- End Container -->


	<script type="text/javascript">
		/*tab*/
		$(document).ready(function(){
			$(".tabContents").hide(); 
			$(".tabContents:first").show();

			$(".tabContaier ul li a").click(function(){ 

			var activeTab = $(this).attr("href"); 
			$(".tabContaier ul li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabContents").hide(); 
			$(activeTab).fadeIn(); 

			return false; 
			});
		});	

        function goPassLecture() {
            var frm = $('#event');
            var prod_code = frm.find('input[name="y_pkg"]:checked');
            var is_chk = frm.find('input[name="is_chk"]:checked');

            if (is_chk.length < 1) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }

            if (prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            location.href = '{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + prod_code.val();
        }
		

		/*디데이카운트다운*/
		$(document).ready(function() {
			dDayCountDown('{{$arr_promotion_params['edate']}}');
		});
	</script>

	{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
