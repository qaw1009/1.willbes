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
        
        .evt_top {background:#E6EFF4 url(https://static.willbes.net/public/images/promotion/2020/07/1731_top_bg.jpg) no-repeat center top;}
        
        .evt_01 {background:#F1F0EB}

        .evtCtnsBox .buyLec {width:900px; margin:0 auto;padding:30px 0 100px;}
		.evtCtnsBox .buyLec a {display:block; text-align:center; font-size:35px;background:#ef5e47; color:#000; padding:20px 0; border-radius:50px;font-weight:bold;border:4px solid #ef5e47;}
		.evtCtnsBox .buyLec a:hover {background:#fff; box-shadow: 10px 10px 10px rgba(0,0,0,.2); color:#ef5e47;}

        .evt_02 {background:#fffefe}	

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1731_top.jpg" alt="경제학"/>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1731_01.jpg" alt="파격할인" />
            <div class="buyLec NSK-Black">
                <a href="https://job.willbes.net/package/show/cate/309003/pack/648001/prod-code/169267" target="_blank">수 강 신 청</a>
            </div>
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1731_02.jpg" alt="선택해야 하는 이유" />            
		</div>
        
	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>
@stop