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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
		/************************************************************/   
		.cert_top {background:url(https://static.willbes.net/public/images/promotion/2019/06/190618_certA_top_bg.jpg) no-repeat center top;}
		.cert00 {padding-top:85px}	
		.cert01 {background:#f5f5f5;}
		.cert02 {position:relative; width:1120px; margin:0 auto} 
		.cert03 {background:#fff;}
		.cert04 {position:relative; width:1120px; margin:0 auto; background:#fff;} 
		.cert05 {background:#f5f5f5;}
		.cert06 {position:relative; width:1120px; margin:0 auto} 
		label.check1 {top:355px; left:910px;}
		label.check2 {top:480px; left:930px;}
		label.check3 {top:610px; left:180px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
		label.check4 {top:1145px; left:675px;}
	
		label.check6 {top:1400px; left:205px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
		label.check7 {top:355px; left:425px;}
		label.check8 {top:385px; left:690px;}
		label.check9 {top:525px; left:910px;}
		label.check10 {top:644px; left:175px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}
		input + label {
			position:absolute; z-index:1; width:20px; height:20px; width:30px;height:30px; outline:5px solid #15365d; background:#fff
		}
		input:checked + label:after {
			position: relative;
			content: '\2714';
			font-size: 30px;
		}
		input:checked + label.check3:after,
		input:checked + label.check6:after,
		input:checked + label.check10:after {
			font-size: 20px;
		}		
		input {display:none}	 
		
		.skybanner{position: fixed; top: 280px;right: 2px;z-index: 1;}	
		.tipPopup{position: absolute;left: 49%;top: 100px;z-index: 1;display:none;}

		.ProfBox{width:1120px;margin:0 auto;}
		.ProfBox .PBtab li{display:inline;float:left;width:50%;}		
		.ProfBox .PBtab li a{display:block;text-align:center;font-size:22px;height:54px;line-height:54px;color:##b9b9b9;border:1px solid #b9b9b9;
							border-bottom:1px solid #5756a2;}	
		.ProfBox .PBtab li a.active{color:#5756a2;border:1px solid #5756a2;border-bottom:1px solid #fff;font-weight:600;}	
		.ProfBox .PBtab:after {content:""; display:block; clear:both}
        /************************************************************/      
    </style> 
	<div class="evtContent">
		<div class="skybanner">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/t-1300_sky.png" alt="전기기사 베너">
		</div>
		<div class="evtCtnsBox cert_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_top.jpg" alt="전기/소방 윌비스 자격증" />
		</div>

		<div class="evtCtnsBox ProfBox">
			<ul class="PBtab NGR">
				<li>
					<a href="#tab01" class="active">전기(산업)기사 PASS / 전기기능사 PASS</a>	
				</li>
				<li>
					<a href="#tab02" class>전기+소방분야 All PASS</a>	
				</li>
			</ul>
		</div>

		<div id="tab01">
			<div class="evtCtnsBox cert00">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_01.jpg" alt="취업난 돌파"/>
			</div>
			<div class="evtCtnsBox cert01">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_02.jpg" alt="윌비스와 함께" usemap="#Map1293A"/>
				<map name="Map1293A" id="Map1293A">
					<area shape="rect" coords="843,1443,1056,1506" href="#none" alt="교재 구매하기" />
				</map>
			</div>
			<div class="evtCtnsBox cert02">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certA.jpg" alt="수강신청" usemap="#Map1294A" />
				<map name="Map1294A" id="Map1294A">
				  	<area shape="rect" coords="719,605,884,640" href="#info" alt="이용안내 확인하기" />
					<area shape="rect" coords="300,700,819,785" href="#none" alt="전기기사 패스 신청하기" />
					<area shape="rect" coords="711,1395,873,1429" href="#info" alt="이용안내 확인하기" />
					<area shape="rect" coords="302,1527,826,1619" href="#none" alt="소방설비 패스 신청하기" />
				</map>
				<div class="tipPopup"id="textZone">
					<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobA_B_popup.png" alt="전기기사 상세보기 팝업">
				</div>
				<input name="ischk1" type="checkbox" value="Y" id="ischk1"><label for="ischk1" class="check1"></label>
				<input name="ischk2" type="checkbox" value="Y" id="ischk2"><label for="ischk2" class="check2"></label>
				<input name="ischk3" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label> 
				<input name="ischk4" type="checkbox" value="Y" id="ischk4"><label for="ischk4" class="check4"></label>
				<input name="ischk6" type="checkbox" value="Y" id="ischk6"><label for="ischk6" class="check6"></label> 
				<input name="ischk7" type="checkbox" value="Y" id="ischk7"><label for="ischk7" class="check7"></label> 
			</div>
			<div class="evtCtnsBox" id="info">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_03.jpg" alt="윌비스 수강 이용안내" />
			</div>
		</div>

		<div id="tab02">
			<div class="evtCtnsBox cert03">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_01.jpg" alt="취업난 돌파" />
			</div>
			<div class="evtCtnsBox cert04">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_02.jpg" alt="자격증 수강" />
			</div>
			<div class="evtCtnsBox cert05">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_03.jpg" alt="윌비스와 함께" usemap="#Map1288A"/>
				<map name="Map1288A" id="Map1288A">
					<area shape="rect" coords="843,1653,1060,1717" href="https://job.willbes.net/book/index/cate/308901" target="_blank" alt="교재 구매하기" />
				</map>
			</div>
			<div class="evtCtnsBox cert06">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_04.jpg" alt="수강신청" usemap="#Map1287A"/>
				<map name="Map1287A" id="Map1287A">
					<area shape="rect" coords="742,638,901,673" href="#info" alt="이용안내 확인하기" />
					<area shape="rect" coords="271,771,857,858" href="#none" alt="소방분야 패스 신청하기" />
				</map>
				<div class="tipPopup"id="textZone">
					<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobA_B_popup.png" alt="전기기사 상세보기 팝업">
				</div>
				<input name="ischk8" type="checkbox" value="Y" id="ischk8"><label for="ischk8" class="check8"></label>
				<input name="ischk9" type="checkbox" value="Y" id="ischk9"><label for="ischk9" class="check9"></label>
				<input name="ischk10" type="checkbox" value="Y" id="ischk10"><label for="ischk10" class="check10"></label>            
			</div>
			<div class="evtCtnsBox" id="info">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_05.jpg" alt="이용안내" />
			</div>
		</div>
		
	</div>
    <!-- End Container -->

    <script type="text/javascript">  
	$(document).ready(function(){
        $('.PBtab').each(function(){
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
	</script>
@stop