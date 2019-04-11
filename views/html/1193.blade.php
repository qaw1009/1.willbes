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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1193_top_bg.jpg) no-repeat center top;}
		.evtTop ul {width:100%; margin:0 auto; }
		.evtTop .point {text-align:center; margin-left:500px; padding:120px 50px 0px 0px; }
		.evt01 {background:#f5f5f5}
        .evt02 {background:#fff; padding-bottom:100px}
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
		.tabContents {}	
		.tabContaier ul:after {content:""; display:block; clear:both}

		 /*타이머*/
        .time{width:100%; text-align:center; background:#000}
        .time_date {text-align:center; padding:20px 0}
        .time_date table {width:1120px; margin:0 auto}
        .time_date table td:first-child {font-size:40px}
        .time_date table td img {width:80%}
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:28px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
        .time_txt span {color:#ef6759}
        .time p {text-alig:center}

        .check {width:100%; margin:0 auto; padding:20px 0 50px; letter-spacing:3 !important; color:#333; font-size:14px; background:#ccc}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px;color:#27262c; background:#e3c0a2; margin-left:50px; border-radius:20px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
	<div class="evtCtnsBox evtTop">
		<p style="width:100%; margin:auto; position:absolute;  margin-top:140px; left:240px;"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_top_txt.gif" alt="2020 국가직대비 전격출시!" /></p>
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_top.png" usemap="#Map_1193_qna"  title="한덕현T-PASS" border="0"/>
			<map name="Map_1193_qna">
			  <area shape="rect" coords="123,1122,973,1211" href="#" target="_blank">
			  <area shape="rect" coords="27,560,108,585" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&subject_name=영어&tab=qna" target="_blank" alt="상담바로가기">
			</map>
		  <!-- 타이머 -->
        <div class="evtCtnsBox time">
            <div class="time_date">
                <table>
                    <tr>
                    <td class="time_txt"><span>4/24(수) 마감!</span></td>
                    <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
                    <td><img id="d1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="d2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="h1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="h2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="m1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="m2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="s1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="s2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- 타이머 //-->
		 <div class="check" id="chkInfo">
                <label>
                    <input name="ischk" type="checkbox" value="Y" />페이지 하단 한덕현 영어 T- PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tip">이용안내확인하기 ↓</a>
            </div>
        </div>
	  </div>
	  <!--evtCtnsBox evtTop//-->

	  <div class="evtCtnsBox evt01">
		  <img src="https://static.willbes.net/public/images/promotion/2019/04/1193_01.jpg" title="영어, 자신있나요?" />
	  </div>
	  <!--evt01//-->

	  <div class="evtCtnsBox evt02">
		  <img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02.jpg"  title="갓덕현이 모두 해결해드립니다." />
			<div class="tabContaier">
			  <ul>
				<li><a class="active" href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab1.jpg" class="off" />
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab1_on.jpg" class="on"  /></a></li>
				<li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab2.jpg"  class="off"  />
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab2_on.jpg"  class="on" /></a>
				</li>
				<li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab3.jpg"  class="off" />
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab3_on.jpg"  class="on" /></a>
				</li>
			  </ul>
			  <div class="tabContents" id="tab1">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c1.jpg" alt="윌비스 영어 40~60점대 강력 추천! " /></p>
			  </div>
			  <div class="tabContents" id="tab2">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c2.jpg" alt="윌비스 영어 60~80점대 강력 추천! " /></p>
			  </div>
			  <div class="tabContents" id="tab3">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c3.jpg" alt="윌비스 영어 70점 이상 강력 추천! " /></p>
			  </div>
			</div>
		<!--tabContaier//--> 
	  </div>
	  <!--evt02//-->

	  <div class="evtCtnsBox evt03">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_03.jpg" title="수험생들이 선택하고 인정한 영어정복 노하우!" />
	  </div>
	  <!--evt03//-->

	  <div class="evtCtnsBox evt04">
		  <img src="https://static.willbes.net/public/images/promotion/2019/04/1193_04.jpg" usemap="#Map_1193_lec2" title="한덕현T-PASS" border="0" />
			<map name="Map_1193_lec2">
			  <area shape="rect" coords="730,774,991,880" href="#" target="_blank">
			</map>
	  </div>
	  <!--evt04//-->

	  <div class="evtCtnsBox evt05" id="tip">
	  <img src="https://static.willbes.net/public/images/promotion/2019/04/1193_tip.jpg" title="이용약관" />
	  </div>
	  <!--evt05//-->

</div>
<!-- End Container -->
	
<!-- scripts -->

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
</script>

<script>
	/*D-day*/
	var DateDiff = {//타이머를 설정합니다.
	inDays: function(d1, d2) {
	var t2 = d2.getTime();
	var t1 = d1.getTime();

	return parseInt((t2-t1)/(24*3600*1000));
	},

	inWeeks: function(d1, d2) {
	var t2 = d2.getTime();
	var t1 = d1.getTime();

	return parseInt((t2-t1)/(24*3600*1000*7));
	},

	inMonths: function(d1, d2) {
	var d1Y = d1.getFullYear();
	var d2Y = d2.getFullYear();
	var d1M = d1.getMonth();
	var d2M = d2.getMonth();

	return (d2M+12*d2Y)-(d1M+12*d1Y);
	},

	inYears: function(d1, d2) {
	return d2.getFullYear()-d1.getFullYear();
	}
	}

	function countDown() {
	//event_day = new Date(2016,4,6,23,59,59);
	// 이벤트 종료일의 한달 전 날짜로 입력한다. 
	event_day = new Date(2019,3,25,23,59,59);
	now = new Date();

	var Monthleft = event_day.getMonth() - now.getMonth();
	var Dateleft = DateDiff.inDays(now, event_day);
	var Hourleft = event_day.getHours() - now.getHours();
	var Minuteleft = event_day.getMinutes() - now.getMinutes();
	var Secondleft = event_day.getSeconds() - now.getSeconds();

	//alert(Monthleft+"-"+Dateleft+"-"+Hourleft+"-"+Minuteleft+"-"+Secondleft)

	if((event_day.getTime() - now.getTime()) > 0) {
	$("#d1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft/10) + ".png");
	$("#d2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Dateleft%10) + ".png");

	$("#h1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft/10) + ".png");
	$("#h2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Hourleft%10) + ".png");

	$("#m1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft/10) + ".png");
	$("#m2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Minuteleft%10) + ".png");

	$("#s1").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft/10) + ".png");
	$("#s2").attr("src", "https://static.willbes.net/public/images/promotion/common/" + parseInt(Secondleft%10) + ".png");
	}
	else{
	}

	setTimeout(countDown, 1000);
	}
	countDown();
</script>

<script type="text/javascript">
	function go_PassLecture(no){

	if(parseInt(no)==1 || parseInt(no)==2){
	if($("input[name='ischk']:checked").size() < 1 && $("input[name='ischk2']:checked").size() < 1){
	alert("이용안내에 동의하셔야 합니다.");
	$("#chkInfo").focus();
	return;
	}

	}else if(parseInt(no)==3 || parseInt(no)==4){
	if($("input[name='ischk']:checked").size() < 1){
	  alert("이용안내에 동의하셔야 합니다.");
	  return;
	}
	}else if(parseInt(no)==5 || parseInt(no)==6){
	if($("input[name='ischk2']:checked").size() < 1){
	  alert("이용안내에 동의하셔야 합니다.");
	  return;
	}
	}

	var lUrl = "";

	if(parseInt(no)==1 || parseInt(no)==3 || parseInt(no)== 5){
	lUrl = "//pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/149331";
	}else{
	lUrl = "//pass.willbes.net/periodPackage/show/cate/3020/pack/648001/prod-code/149331";
	}

	location.href = lUrl;
	}
</script>

<!-- scripts -->


@stop