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

		.skybanner {
            position:fixed;
            top:50px;
            right:10px;
            z-index:1;
			text-align:center;
        }
        .skybanner a {display:block; margin-bottom:5px}

		.evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/03/1193_top2_bg.jpg) no-repeat center top;}

		.evt01 {background:#fff; position:relative}
		.evt01 span {position:absolute; left:50%; margin-left:-442px; top:765px; width:300px; z-index:10}
		.evt01_1 {background:#f5f5f5}
		.evt02 {background:#fff; padding-bottom:150px}
		.evt03 {background:#f5f5f5}
		.evt04 {background:#35385b}
		.evt05 {background:#fff}
		
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

        .check {width:100%; text-align:center; margin:0 auto; padding:30px 0; letter-spacing:3 !important; color:#333; font-size:14px; background:#ccc}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a{display:inline-block; padding:12px 20px 10px 20px;color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
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
		{{--
		<div class="skybanner">
			<a href="#evt01_A">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1066_sky.png" title="실전문법" >
            </a>
			<a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/157982" target="_blank">
				<img src="https://static.willbes.net/public/images/promotion/2019/11/1193_sky1.png" />
			</a>
			<a href="#event">
				<img src="https://static.willbes.net/public/images/promotion/2019/11/1193_sky2.png" />
			</a>
		</div>
		--}}			
		<div class="evtCtnsBox evtTop">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1193_top2.gif" usemap="#Map_1193A"  title="한덕현T-PASS" border="0"/>
			<map name="Map_1193A" id="Map_1193A">					
				<area shape="rect" coords="463,177,544,202" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&subject_name=영어&tab=qna" target="_blank" alt="상담바로가기">
				<area shape="rect" coords="767,851,976,956" href="#chkInfo" onclick="go_PassLecture('158055');">
			</map>	 
		</div>		

		<div class="evtCtnsBox evt01" id="evt01">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1193_QandA.jpg" title="" />
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
			<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_03.jpg" title="수험생들이 선택하고 인정한 영어정복 노하우!" />
		</div>

		<div class="evtCtnsBox evt04" id="event">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1193_04.gif" usemap="#Map1193B" title="한덕현T-PASS" border="0" />
			<map name="Map1193B" id="Map1193B">
				<area shape="rect" coords="801,785,988,876" href="#chkInfo" onclick="go_PassLecture('162539');" title="69만원 수강신청">
			</map>
		</div>

		<div class="check" id="chkInfo">
			<input name="ischk" type="checkbox" value="Y" id="txt1"/> <label for="txt1">페이지 하단 한덕현 영어 T- PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
			<a href="#tip">이용안내확인하기 ↓</a>
		</div>

		<div class="evtCtnsBox evt05" id="tip">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1193_tip.jpg" title="이용약관" />
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

		function go_PassLecture(prod_code) {
			if($("input[name='ischk']:checked").length < 1) {
				alert("이용안내에 동의하셔야 합니다.");
				$("#chkInfo").focus();
				return;
			}
			location.href = "{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}" + prod_code;
		}

		/*디데이카운트다운*/
		$(document).ready(function() {
			dDayCountDown('{{$arr_promotion_params['edate']}}');
		});
	</script>

	{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
