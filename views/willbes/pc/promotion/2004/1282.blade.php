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
            background:#fff url("https://static.willbes.net/public/images/promotion/2019/06/1282_bg.jpg") no-repeat center top
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {}
        .wb_cts02 {padding-bottom:80px}
        .wb_cts02 .memo {width:1020px; margin:0 auto; background:#fff; padding:40px}
        .memoTab li {margin-bottom:10px}
        .memoTab li a {display:block; width:40px; height:40px; }

  </style>

  <div class="p_re evtContent NGR" id="evtContainer">
  
	<div class="evtCtnsBox wb_cts01">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1282_top.jpg" title="프로필"/>
	</div>

  
    <div class="evtCtnsBox wb_cts02">
	    <div class="memo">
            <ul class="memoTab">
                <li><a href="#tab01">1</a></li>
                <li><a href="#tab02">2</a></li>
                <li><a href="#tab03">3</a></li>
                {{--
                <li><a href="#tab04">4</a></li>
                <li><a href="#tab05">5</a></li>
                <li><a href="#tab06">6</a></li>
                <li><a href="#tab07">7</a></li>
                <li><a href="#tab08">8</a></li>
                --}}
            </ul>
            <div id="tab01">
            </div>
        </div>
    </div>


  
</div>
<!-- End Container -->

<script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
<script type="text/javascript">	
	/*레이어팝업*/
	function go_popup() {
		$('#popup').bPopup();
	}

	$(function(e){
		var targetOffset= $("#evtContainer").offset().top;
		$('html, body').animate({scrollTop: targetOffset}, 500);
		/*e.preventDefault(); */   
	});
</script>
@stop