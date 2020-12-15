@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1979_top_bg.jpg) no-repeat center top;}	      

        .evt02 {background:#7cacdc;}

        .evt03 {width:1120px; margin:100px auto}
        .evt03 h5 {background:#7cacdc; color:#040000; padding:20px 0; text-align:center; font-size:24px; border-radius:30px; margin-bottom:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1979_top.jpg" alt="PSAT 공부이야기" />
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1979_01.jpg" alt="온라인 pass반" usemap="#Map1979B" border="0" />
            <map name="Map1979B">
                <area shape="rect" coords="45,363,1076,522" href="#evt03" alt="수강자 전원 무료제공">
            </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1979_02.jpg" alt="유튜브 구동 이벤트" usemap="#Map1979A" border="0"  />
            <map name="Map1979A">
                <area shape="rect" coords="95,820,1020,888" href="https://pass.willbes.net/promotion/index/cate/3103/code/1906" target="_blank" alt="유튜브구동하기">
            </map>
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <h5 class="NSK-Black">[7급 PSAT] CORE 특강</h5>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <h5 class="NSK-Black mt100">CORE 특강 PASS반</h5>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
            <h5 class="NSK-Black mt100">[7급 PSAT] Perfect PSAT Program 온라인 PASS반</h5>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif 
        </div>
    
	</div>
    <!-- End Container -->
@stop