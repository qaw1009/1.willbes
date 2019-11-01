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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evttop {background:url(https://static.willbes.net/public/images/promotion/2019/11/1445_top_bg.jpg) no-repeat center top; }
        .evt01 {background:#ec5155;}            
        .evt02 {background:#fff;}        
        .evt03 {background:#5b656e;}  
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop" >           
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1445_top.jpg" title="2020윌비스 기출문제풀이 DIY패키지">   
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1445_01.jpg" title="기출">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1445_02.jpg" title="기출의 중요성">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1445_03.jpg" usemap="#Map1445a" title="다이 패키지 신청하기" border="0">
            <map name="Map1445a" id="Map1445a">
                <area shape="rect" coords="100,892,1020,1010" href="https://pass.willbes.net/package/show/cate/3019/pack/648002/prod-code/157674" target="_blank" />
            </map>
        </div>      
	</div>
    <!-- End Container -->
@stop