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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2084_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#b5e5fc;}
        
        .evt_02 {background:#fff;padding-bottom:100px;}
        .evt_02 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646;padding:25px;}
        .evt_02 .evt02_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	
 
        .evt_03 {background:#d7fcb5;}

        .evt_04 {background:#fff;padding-bottom:100px;}
        .evt_04 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646;padding:25px;}
        .evt_04 .evt04_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	
 
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2084_top.jpg" alt="변호사 시험 대비" />
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2084_01.jpg" alt="수강특전" />
		</div>

		<div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2084_02.jpg" alt="선택형 기출정리 특강" />
            <div class="evt02_box">       
                <div class="title NSK-Black">1. 선택형 기출정리 특강 3과목 종합반</div>                 
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                    @endif  
                <div class="title NSK-Black">2. 선택형 기출정리 특강 단과반</div>    
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                    @endif                    
            </div>
		</div> 
        
		<div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2084_03.jpg" alt="암기장 특강" />
		</div> 
        
		<div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2084_04.jpg" alt="핵심요약서 단기정리" />
            <div class="evt04_box">                   
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                    @endif                           
            </div>
		</div> 

	</div>
    <!-- End Container -->
@stop