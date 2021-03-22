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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2137_top_bg.jpg) no-repeat center top;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2137_01_bg.jpg) no-repeat center top;}

    </style>

    <div class="evtContent NSK">      
        <div class="evtCtnsBox evtTop">                       
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2137_top.jpg" title="박재현 교수" >
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2137_01.jpg" usemap="#Map2137_apply" title="바로 수강하기" border="0" >
            <map name="Map2137_apply" id="Map2137_apply">
                <area shape="rect" coords="220,971,891,1052" href="https://pass.willbes.net/lecture/show/cate/3035/pattern/free/prod-code/180482" target="_blank" />
            </map>          
        </div>
   
	</div>
    <!-- End Container -->
 
    <script type="text/javascript">    

    </script>

@stop