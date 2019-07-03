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
            position:relative;
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }

        .WB_con01 {background:#65a285 url('https://static.willbes.net/public/images/promotion/2019/07/1304_top_bg.jpg') no-repeat center;}
        .WB_con02 {background:#fef6ef;}
        .WB_con03 {background:#f7e7d0 url('https://static.willbes.net/public/images/promotion/2019/07/1304_02_bg.jpg') no-repeat center;}
		    .WB_con04 {background:#ea592a;}

    </style>

  <div class="evtContent NSK" id="evtContainer">
  
  <div class="skybanner"> 
	 <a href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=316&" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/07/1304_sky.png" alt="신청하기" /></a>
  </div>
  <!-- skybnr //--> 
  
  <div class="evtCtnsBox WB_con01">
	  <img src="https://static.willbes.net/public/images/promotion/2019/07/1304_top.png" alt="#" usemap="#Map_1304_lec" border="0" />
	<map name="Map_1304_lec">
	  <area shape="rect" coords="191,659,855,784" href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=316&" target="_blank">
	</map>
</div>
  <!-- WB_con01//--> 

  <div class="evtCtnsBox WB_con02">
	 <img src="https://static.willbes.net/public/images/promotion/2019/07/1304_01.jpg" alt="#" />
  </div>
  <!-- WB_con02//--> 

<div class="evtCtnsBox WB_con03">
	 <img src="https://static.willbes.net/public/images/promotion/2019/07/1304_02.jpg" alt="#" />
  </div>
 <!-- WB_con03//-->

 <div class="evtCtnsBox WB_con04" id="1304_go">
	 <img src="https://static.willbes.net/public/images/promotion/2019/07/1304_03.jpg" alt="#" usemap="#Map_down" border="0" />
	<map name="Map_down">
	  <area shape="rect" coords="148,673,987,786" href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" target="_blank">
	</map>
  </div>
 <!-- WB_con03//-->
 
 </div>
<!-- End Container --> 

<script type="text/javascript">	
	$(function(e){
		var targetOffset= $("#evtContainer").offset().top;
		$('html, body').animate({scrollTop: targetOffset}, 500);
		/*e.preventDefault(); */   
	});
</script>


@stop