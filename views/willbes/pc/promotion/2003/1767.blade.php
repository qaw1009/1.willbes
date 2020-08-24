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

        
        .wb_ctstop {position:relative; overflow:hidden; background:url("https://static.willbes.net/public/images/promotion/2020/08/1767_top_bg.jpg") center top  no-repeat;}
        .wb_cts01 > div {width:1120px; margin:0 auto; position:relative;}
        .wb_ctstop span{position:absolute;top:702px;left:50%;margin-left:-271px;opacity:0;opacity:1 \0/IE9;animation: zoomAni .1s 1s ease-in-out both;} 
        @@keyframes zoomAni {
            0% {transform: scale(7); opacity: 0;}
            100% {transform: scale(1); opacity: 1;}
        }

        .wb_cts01 {background:url("https://static.willbes.net/public/images/promotion/2020/08/1767_01_bg.jpg") center top  no-repeat}
        .wb_cts02 {background:url("https://static.willbes.net/public/images/promotion/2020/08/1767_02_bg.jpg") center top  no-repeat}  
        .wb_cts03 {background:#fff;}

 </style>

 <div class="p_re evtContent NGR" id="evtContainer">
  
  <div class="evtCtnsBox wb_ctstop">
    <div class>
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1767_top.jpg" title="" />
        <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2020/08/1767_top_txt.png" title="" /></span>
	</div>
  </div>
  
  <div class="evtCtnsBox wb_cts01">
    <img src="https://static.willbes.net/public/images/promotion/2020/08/1767_01.jpg"  title="예비전력관리업무담당자 김도형 교수" />
  </div> 

  <div class="evtCtnsBox wb_cts02">
    <img src="https://static.willbes.net/public/images/promotion/2020/08/1767_02.jpg"  title="" />
  </div>
</div>
<!-- End Container -->
@stop