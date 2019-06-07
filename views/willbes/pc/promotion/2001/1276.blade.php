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

        .wb_cts01 {position:relative; overflow:hidden; background:#e8e46b url("https://static.willbes.net/public/images/promotion/2019/06/1276_top_bg.jpg") center top  no-repeat}
        .wb_cts02 {background:#ffff}
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#ece5dd;}
        .wb_cts05 {background:#0000a8 url("https://static.willbes.net/public/images/promotion/2019/06/1276_04_bg.jpg") center top  no-repeat}

  </style>

     <div class="p_re evtContent NGR" id="evtContainer">
    
	<div class="evtCtnsBox wb_cts01">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1276_top.png" usemap="#Map_1276" title="장정훈경찰학개론" border="0" />
      <map name="Map_1276">
        <area shape="rect" coords="703,900,1010,992" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153644" target="_blank">
      </map>
    </div>
    <!--wb_cts01//-->
    
    <div class="evtCtnsBox wb_cts02">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1276_01.jpg" usemap="#Map_1276_2" title="수강생이 증명해주는 장정훈경찰학개론" border="0" />
      <map name="Map_1276_2">
        <area shape="rect" coords="362,922,738,975" href="https://police.willbes.net/promotion/index/cate/3001/code/1024" target="_blank">
      </map>
    </div>
    <!--wb_cts02//-->
  
    <div class="evtCtnsBox wb_cts03">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1276_02.jpg" title="경찰학개론 고득점으로가는길은 단순합니다. 반영한 장정훈 경찰학개론 기본서 " />
    </div>
    <!--wb_cts03//-->
    
    <div class="evtCtnsBox wb_cts04">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1276_03.jpg" usemap="#Map_1276_3" title="수강신청" border="0" />
      <map name="Map_1276_3">
        <area shape="rect" coords="713,451,973,531" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153644" target="_blank">
      </map>
    </div>
    <!--wb_cts04//-->

	  <div class="evtCtnsBox wb_cts05">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1276_04.png" title="#" />
    </div>
    <!--wb_cts05//-->
    
</div>
<!-- End Container -->

@stop