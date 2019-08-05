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
        .skybanner{position: fixed; top: 280px;right: 2px;z-index: 1;}	
        .cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/08/1350_top_bg.jpg) no-repeat center top;}	        		
		.cert_01{background:#fff;}	
		.cert02{background:#f5f5f5;}
		.cert03{background:#fff;position:relative; width:1120px; margin:0 auto;}	
		label.check3 {top:610px; left:143px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}
		input + label {position:absolute; z-index:1; width:30px; height:30px; outline:5px solid #15365d; background:#fff}
		input:checked + label:after {position: relative;content: '\2714';font-size: 30px;}
		input:checked + label.check3:after{font-size: 20px;}		
        input {display:none}	 
        .cert04 h3{font-size:36px;color:#15365d;font-weight:bold;}
        .cert04 .sports{width:979px;margin:0 auto;border:5px solid #15365d;margin-top:65px;background:#fff;color:#15365d;font-weight:bold;}
        .cert04 .sports dl{width:969px;font-weight:bold;}
        .cert04 .sports dt{height:55px;line-height:55px;transition:all 1s;border-bottom:5px solid #15365d;position:relative;}
        .cert04 .sports dl dt:after{background:url(https://static.willbes.net/public/images/promotion/2019/08/1350_tab_off.png)no-repeat 0px 0px;
                                    content:"";display:inline-block;width:30px;height:30px;position:absolute;right:35px;top:10px;}                                             
        .cert04 .sports dl dt:hover{background:#15365d;color:#fff;cursor:pointer;}
        .cert04 .sports dl dt:hover:after{background:url(https://static.willbes.net/public/images/promotion/2019/08/1350_tab_on.png)no-repeat 0px 0px;
                                    content:"";display:inline-block;width:30px;height:30px;position:absolute;right:35px;top:10px;}
        .cert04 .sports dl dt dd{display:block;}
        .cert04 .sports dl p{height:250px;line-height:250px;}
        .cert05{background:#fff;}

    </style>
	<div class="evtContent">	
        
		<div class="skybanner">
			<img src="https://static.willbes.net/public/images/promotion/2019/08/1350_skybanner.png" alt="스포츠지도사 베너">
        </div>
        		
		<div class="evtCtnsBox cert_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/08/1350_top.jpg" alt="윌비스 2020 스포츠지도사" />
		</div>
		<div class="evtCtnsBox cert_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/08/1350_01.jpg" alt="취업난 돌파" />
		</div>
		<div class="evtCtnsBox cert02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1350_02.jpg" alt="윌비스와 함께" usemap="#Map1350a" border="0" />
            <map name="Map1350a" id="Map1350a">
                <area shape="rect" coords="551,1625,768,1693" href="#none;" />
            </map>
		</div>
		<div class="evtCtnsBox cert03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1350_03.jpg" alt="수강신청" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="188,435,426,537" href="#none;" />
                <area shape="rect" coords="688,435,925,538" href="#none;" />
                <area shape="rect" coords="738,603,902,636" href="#info3" />
            </map>
            <input name="is_chk" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label>
        </div>
        <div class="evtCtnsBox cert04">
            <h3>스포츠지도사 강의구성</h3>
            <div class="sports">
                <dl>
                    <dt>스포츠사회학</dt>         
                    <dd>
                        <p>1</p>
                    </dd>
                    <dt>스포츠교육학</dt>
                    <dd>
                        <p>2</p>
                    </dd>
                    <dt>스포츠심리학</dt>
                    <dd>
                        <p>3</p>
                    </dd>
                    <dt>스포츠심리학</dt>
                    <dd>
                       <p>4</p>
                    </dd>
                    <dt>운동생리학</dt>
                    <dd>
                        <p>5</p>
                    </dd>
                    <dt>운동역학</dt>
                    <dd>
                        <p>6</p>
                    </dd>
                    <dt style="border:0;">스포츠윤리</dt>
                    <dd>
                        <p>7</p>
                    </dd>
                </dl>            
            </div>
            <div></div>
		</div>
		<div class="evtCtnsBox cert05" id="info3">
			<img src="https://static.willbes.net/public/images/promotion/2019/08/1350_bottom.jpg" alt="이용안내" />  
		</div>  
	</div>
    <!-- End Container -->

	<script type="text/javascript">   

    $(document).ready(function(){
        /*#####################################*/
        $("#stoggleBtn").click(function(){
            $("#textZone1").slideToggle("fast");
        });		
		$("#stoggleBtn2").click(function(){
            $("#textZone2").slideToggle("fast");
        });		

         /*#####################################*/
        $("dd").css({"display":"none"});
            $("dt").click(function(){
                $("dd").css({"display":"none"});
                $(this).next().css({"display":"block"});      

        });
         /*#####################################*/
        $("dt").click(function(){
				$("dt").css({"height":"55px","lineHeight":"55px", "fontSize":"16px"});
		
				$(this).css({"height":"55px","lineHeight":"55px","fontSize":"20px"});		

			});

    });
	</script>

	{{-- 프로모션용 스크립트 include --}}
	@include('willbes.pc.promotion.promotion_script')
@stop