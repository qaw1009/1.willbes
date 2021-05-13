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
            position:relative;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/        

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2211_top_bg.jpg) no-repeat center top;}	
        .evtCtnsBox .title {color:#11153a; font-size:36px; margin:100px 0 50px;}
        .evt_01 {width:1120px; margin:0 auto; position:relative}
        .evt_01 a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evt_03 {padding-bottom:130px}

 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2211_top.jpg" alt="마스터 past 클래스" />
		</div> 

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2211_01.jpg" alt="마스터 past 클래스 일정안내" />
            <a href="https://pass.willbes.net/support/notice/show/cate/3019?board_idx=335962&s_cate_code=3103" target="_blank" title="" style="position: absolute; left: 3.3%; top: 42.99%; width: 43.3%; height: 3.68%; z-index: 2;"></a>
		</div> 

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2211_02.jpg" alt="수강특전" />
		</div>        

        <div class="evtCtnsBox evt_03">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2211_03_01.jpg" alt="석치수" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2211_03_02.jpg" alt="박준범" />         
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))            
            @endif  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2211_03_03.jpg" alt="이나우" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))            
            @endif  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2211_03_04.jpg" alt="한승아" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))            
            @endif  
        </div>        
	</div>
     <!-- End Container -->

@stop