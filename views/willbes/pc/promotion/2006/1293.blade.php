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
        }
        .evtContent span {vertical-align:auto}
		.evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
		
		/************************************************************/  

		.cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/06/190619_certD_top_bg.jpg) no-repeat center top;}	
		.cert02{background:#f5f5f5; position:relative}
		.cert02 ul {position:absolute; width:458px; height:278px; top:612px; left:50%; margin-left:-524px; z-index:10;}
		.cert02 ul li {display:inline; float:left;}
		.cert03 {position:relative; width:1120px; margin:0 auto} 
		label.check1 {top:370px; left:420px;}
		label.check2 {top:370px; left:905px;}
		label.check3 {top:480px; left:175px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}	
		input + label {
			position:absolute; z-index:1; width:20px; height:20px; width:30px;height:30px; outline:5px solid #15365d; background:#fff
		}
		input:checked + label:after {
			position: relative;
			content: '\2714';
			font-size: 30px;
		}
		input:checked + label.check3:after {
			font-size: 20px;
		}		
		input {display:none}		
		.tipPopup{position: absolute;left: 49%;top: 100px;z-index: 1;display:none;}
           
    </style>

	<div class="evtContent">
		<div class="evtCtnsBox cert_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_top.jpg" alt="소방공무원 논스탑" />
		</div>
		<div class="evtCtnsBox cert_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_01.jpg" alt="자격증 취득자" />
		</div>
		<div class="evtCtnsBox cert02">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_02.jpg" alt="윌비스와 함께" usemap="#Map1293A" />
			<map name="Map1293A" id="Map1293A">
				<area shape="rect" coords="841,1439,1059,1507" href="https://job.willbes.net/book/index/cate/308901" alt="교재 구매하기"/>
			</map>
			<ul>
				<li><img src="https://static.willbes.net/public/images/promotion/2019/06/308901_03_t1.gif" alt="김종상 교수" /></li>
				<li><img src="https://static.willbes.net/public/images/promotion/2019/06/308901_03_t2.gif" alt="이세령 교수" /></li>
				<li><img src="https://static.willbes.net/public/images/promotion/2019/06/308901_03_t3.gif" alt="이아람 교수" /></li>
				<li><img src="https://static.willbes.net/public/images/promotion/2019/06/308901_03_t4.gif" alt="한경준 교수" /></li>
			</ul>
		</div>
		<div class="evtCtnsBox cert03">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_03.jpg" alt="수강신청" usemap="#Map1293B"/>
			<map name="Map1293B" id="Map1293B">
			  	<area shape="rect" coords="721,470,881,504" href="#info" alt="이용안내 확인하기" />
			    <area shape="rect" coords="265,558,855,662" href="#none" alt="소방분야 논스톱 패스 신청하기" onclick="goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');"/>
			</map>
			<div class="tipPopup" id="textZone">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobA_B_popup.png" alt="전기기사 상세보기 팝업">
			</div>
			<div id="pass">
				<input name="y_pkg" type="checkbox" value="155178" id="ischk1" class="chk_pass" onchange="checkOnly('.chk_pass', this.value);"><label for="ischk1" class="check1"></label>
				<input name="y_pkg" type="checkbox" value="155179" id="ischk2" class="chk_pass" onchange="checkOnly('.chk_pass', this.value);"><label for="ischk2" class="check2"></label>
				<input name="is_chk" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label>
			</div>
		</div>
		<div class="evtCtnsBox cert04" id="info">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_04.jpg" alt="이용안내" />			
		</div>			
	</div>
    <!-- End Container -->

    <script type="text/javascript">   
    $(document).ready(function(){
        $("#stoggleBtn").click(function(){
            $("#textZone").slideToggle("fast");
        });        
    });
	</script>

	{{-- 프로모션용 스크립트 include --}}
	@include('willbes.pc.promotion.promotion_script')
@stop