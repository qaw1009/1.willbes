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

        .wb_cts01 {position:relative; overflow:hidden; background:#ce7598 url("https://static.willbes.net/public/images/promotion/2020/08/1762_top_bg.jpg") center top  no-repeat;height:1025px;}
        .wb_cts02 {background:#203B7A url("https://static.willbes.net/public/images/promotion/2020/08/1762_01_bg.jpg") center top  no-repeat}
        .wb_cts03 {background:#E1E1E1;}  
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background:#223E7D;}

		/* txt_motion */
		.wb_cts01 > div {width:1120px; margin:0 auto; position:relative;}
		.wb_cts01 > div span {position:absolute; width:120px; z-index: 1;}
		.wb_cts01 > div span.txt1 {top:75px; left:150px; animation:slidein1 0.3s ease-in; -webkit-animation:slidein1 0.3s ease-in;}
		.wb_cts01 > div span.txt2 {top:300px; left:280px; animation:slidein2 0.6s ease-in; -webkit-animation:slidein2 0.6s ease-in;}
        .wb_cts01 > div span.txt3 {top:425px; left:250px; animation:slidein3 0.9s ease-in; -webkit-animation:slidein3 0.9s ease-in;}
        	
		@@keyframes slidein1 {from {left:605px; opacity: 0;}to {left:150px; opacity: 1}}
		@@keyframes slidein2 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}
		@@keyframes slidein3 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}	

 </style>

 <div class="p_re evtContent NGR" id="evtContainer">
  
  <div class="evtCtnsBox wb_cts01">
    <div class style="height:1025px;">
      <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2020/08/1762_txt1.png" title="" /></span>
      <span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2020/08/1762_txt2.png" title="" /></span>
      <span class="txt3"><img src="https://static.willbes.net/public/images/promotion/2020/08/1762_txt3.png" title="" /></span>
	  </div>
  </div>
  
  <div class="evtCtnsBox wb_cts02">
    <img src="https://static.willbes.net/public/images/promotion/2020/08/1762_01.jpg"  title="" />
  </div> 

  <div class="evtCtnsBox wb_cts03">
    <img src="https://static.willbes.net/public/images/promotion/2020/08/1762_02.jpg"  title="" />
  </div> 

  <div class="evtCtnsBox wb_cts04">
    <img src="https://static.willbes.net/public/images/promotion/2020/08/1762_03.jpg"  title="" />
  </div> 

  <div class="evtCtnsBox wb_cts05">
    <img src="https://static.willbes.net/public/images/promotion/2020/08/1762_04.jpg" usemap="#Map1762a"  title="" border="0" />
    <map name="Map1762a" id="Map1762a">
        <area shape="rect" coords="211,746,908,856" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50035/?subject_idx=1117&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95&tab=open_lecture" target="_blank" />
    </map>
  </div> 

</div>
<!-- End Container -->

<script type="text/javascript">

</script>
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop