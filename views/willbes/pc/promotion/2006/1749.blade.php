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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        
        .evt_top {background:#02FCFB url(https://static.willbes.net/public/images/promotion/2020/07/1749_top_bg.jpg) no-repeat center top;}        

        /************************************************************/      
    </style>  

	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1749_top.jpg" alt="실전 모의고사"/>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1749_01.jpg" alt="출제위원 및 단과강좌" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @else
            @endif   
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1749_02.jpg" alt="실전모의고사 신청 바로가기" usemap="#Map1749_apply" border="0" />
            <map name="Map1749_apply" id="Map1749_apply">
                <area shape="rect" coords="126,372,998,483" href="https://job.willbes.net/lecture/index/cate/309002/pattern/only?search_order=regist&course_idx=1114" target="_blank" />
            </map>
		</div>

	</div>
    <!-- End Container -->

    <script type="text/javascript">
   
    </script>
@stop